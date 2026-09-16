# Controller

Chamilo 3.0 menggunakan sejumlah besar controller (dalam urutan puluhan) yang diorganisasikan di seluruh bundle. Jumlah pastinya berubah dari versi ke versi — anggap nama-nama di bawah sebagai ilustratif, bukan lengkap.

## Jenis Controller

### Controller Admin

Berada di `src/CoreBundle/Controller/Admin/`. Menangani administrasi platform:

* `AdminController` — Dasbor, info berkas, pengujian email
* `UserListController` — CRUD pengguna
* `CourseListController` — Pengelolaan kursus
* `SessionAdminController` — Pengelolaan sesi
* `SettingsController` — Pengaturan platform
* `SecurityController` — Percobaan login, peristiwa IDS
* `PluginsController` — Pengelolaan plugin
* `RoomController` — Pengelolaan ruang

### Controller Aksi API

Aksi API Platform kustom di `src/CoreBundle/Controller/Api/`:

Ini memperluas CRUD bawaan API Platform dengan logika bisnis kustom. Contoh:

* `CreateDocumentFileAction` — Unggah berkas untuk dokumen
* `CreateStudentPublicationFileAction` — Unggah pengumpulan tugas
* `UpdateVisibilityDocument` — Alihkan visibilitas dokumen
* `ExportCGlossaryAction` — Ekspor glosarium
* `MoveDocumentAction` — Pindahkan dokumen ke folder lain

Untuk operasi baca/tulis yang tidak memerlukan HTTP controller khusus — yaitu ketika Anda hanya ingin mengubah *cara* suatu item atau koleksi diambil atau disimpan — utamakan **State Provider** atau **State Processor** (lihat di bawah). Controller Aksi API paling baik dicadangkan untuk endpoint yang benar-benar membutuhkan logika tingkat permintaan (unggah berkas, format respons kustom, alur multi-langkah).

### Controller AI

`src/CoreBundle/Controller/AiController.php` adalah titik masuk untuk endpoint terkait AI (pembuatan soal Aiken, pembuatan learning path, pembuatan gambar/video, penilaian jawaban terbuka, analisis dokumen…). Kumpulan rute yang tepat berkembang dengan cepat — baca atribut `#[Route]` pada controller untuk daftar terkini daripada mengandalkan salinan di sini.

### Controller Chat

`src/CoreBundle/Controller/ChatController.php` menangani chat waktu nyata dan tutor AI:

* Pesan antar pengguna
* Chat tutor AI (panel chat yang ditambatkan)
* Riwayat pesan dan polling

## State Provider & Processor API Platform

Tidak setiap endpoint API didukung oleh sebuah controller. API Platform 4 membagi pekerjaan antara dua antarmuka:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — mengembalikan data untuk operasi `GET` (satu item atau sebuah koleksi).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — menangani penulisan untuk operasi `POST`, `PUT`, `PATCH`, dan `DELETE`.

Implementasi Chamilo berada di `src/CoreBundle/State/` (sekitar 35+ kelas). Mereka dihubungkan ke entitas melalui argumen `provider:` dan `processor:` pada operasi `#[ApiResource]` alih-alih melalui rute.

### Kapan menggunakannya

Gunakan provider/processor — alih-alih Controller Aksi API — ketika:

* Endpoint mengikuti bentuk REST standar (daftar / baca / buat / perbarui / hapus) tetapi membutuhkan perakitan data atau logika persistensi kustom.
* Anda perlu memfilter, men-denormalisasi, atau memperkaya hasil pembacaan koleksi atau item (mis. menghormati Access URL saat ini, konteks kursus, atau aturan visibilitas).
* Anda perlu menjalankan efek samping pada penulisan (log audit, pembuatan berkas, pembaruan entitas terkait) sambil tetap mempertahankan pipeline normalisasi, validasi, dan paginasi API Platform.
* Anda ingin menjaga operasi tetap dapat ditemukan dalam skema OpenAPI / Hydra tanpa mendaftarkan rute kustom.

Jika endpoint justru membutuhkan akses `Request` mentah, mengembalikan payload non-resource (unduh berkas, CSV, pengalihan), atau mengorkestrasi alur multi-langkah, Controller Aksi API di `src/CoreBundle/Controller/Api/` lebih sesuai.

### Penghubungan pada entitas

Rujuk kelas pada operasi:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Contoh provider

`src/CoreBundle/State/DocumentProvider.php` menyelesaikan `CDocument` berdasarkan variabel URI dan melempar `NotFoundHttpException` jika tidak ada:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

### Contoh processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` mendelegasikan ke `persistProcessor` Doctrine bawaan, lalu menjalankan efek samping (menghasilkan berkas CSS pada filesystem Flysystem tema, menautkan tema ke Access URL saat ini):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Pola yang perlu diketahui

* **Susun bersama processor bawaan.** Dekorasi `ProcessorInterface $persistProcessor` (bawaan Doctrine) agar logika khusus Chamilo berjalan *di sekitar* persist standar, bukan menggantikannya.
* **Provider koleksi menangani paginasinya sendiri.** Ketika provider koleksi membangun kueri kustom, ia harus menghormati `?page`, `?itemsPerPage`, dan filter pencarian — paginator otomatis API Platform hanya aktif untuk provider koleksi Doctrine bawaan.
* **Satu kelas per resource + jenis operasi adalah hal yang umum**, tetapi sebuah provider dapat melayani beberapa operasi (lihat `UsergroupStateProvider`, digunakan ulang di empat operasi pada `Usergroup`).
* **Konvensi penamaan**: `<Entity>StateProvider` / `<Entity>StateProcessor` untuk penangan di seluruh resource; `<Entity><Action>Processor` (mis. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) untuk operasi yang lebih sempit.

## Routing

Controller menggunakan **atribut PHP 8** untuk definisi rute:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Resource API Platform menggunakan atribut `#[ApiResource]` pada entitas, dengan operasi kustom yang menunjuk ke aksi controller.

## Trait

Controller menggunakan trait bersama untuk fungsionalitas umum:

* `ControllerTrait` — Akses ke pengaturan, serializer, dan layanan umum
* `CourseControllerTrait` — Pembantu konteks kursus
* `ResourceControllerTrait` — Operasi node resource