# Pengontrol (Controladores)

Chamilo 2.0 menggunakan sejumlah besar pengontrol (dalam jumlah puluhan) yang diorganisasi berdasarkan bundle. Jumlah pasti bervariasi dari versi ke versi — anggap nama-nama di bawah ini sebagai ilustrasi, bukan daftar lengkap.

## Jenis Pengontrol

### Pengontrol Administrasi

Terletak di `src/CoreBundle/Controller/Admin/`. Mengelola administrasi platform:

* `AdminController` — Panel kontrol, informasi berkas, pengujian email
* `UserListController` — CRUD pengguna
* `CourseListController` — Manajemen kursus
* `SessionAdminController` — Manajemen sesi
* `SettingsController` — Pengaturan platform
* `SecurityController` — Upaya login, peristiwa IDS
* `PluginsController` — Manajemen plugin
* `RoomController` — Manajemen ruangan

### Pengontrol Aksi API

Aksi khusus API Platform di `src/CoreBundle/Controller/Api/`:

Ini memperluas CRUD bawaan API Platform dengan logika bisnis khusus. Contoh:

* `CreateDocumentFileAction` — Unggah berkas untuk dokumen
* `CreateStudentPublicationFileAction` — Unggah pengumpulan tugas
* `UpdateVisibilityDocument` — Mengubah visibilitas dokumen
* `ExportCGlossaryAction` — Ekspor glosarium
* `MoveDocumentAction` — Memindahkan dokumen ke folder lain

Untuk operasi baca/tulis yang tidak memerlukan pengontrol HTTP khusus — yaitu, ketika Anda hanya ingin mengubah *cara* suatu item atau koleksi diperoleh atau disimpan — lebih baik gunakan **State Provider** atau **State Processor** (lihat di bawah). Pengontrol Aksi API lebih cocok untuk endpoint yang benar-benar membutuhkan logika pada tingkat permintaan (unggahan berkas, format respons khusus, alur multi-langkah).

### Pengontrol AI

`src/CoreBundle/Controller/AiController.php` adalah titik masuk untuk endpoint terkait AI (pembuatan soal Aiken, pembuatan jalur pembelajaran, pembuatan gambar/video, penilaian jawaban terbuka, analisis dokumen...). Daftar rute yang pasti berkembang dengan cepat — baca atribut `#[Route]` pada pengontrol untuk daftar terkini, daripada mengandalkan salinan di sini.

### Pengontrol Obrolan

`src/CoreBundle/Controller/ChatController.php` mengelola obrolan waktu nyata dan tutor AI:

* Pesan antar pengguna
* Obrolan dengan tutor AI (panel obrolan yang ditambatkan)
* Riwayat pesan dan polling

## Penyedia dan Pemroses Status API Platform

Tidak semua endpoint API didukung oleh pengontrol. API Platform 3 membagi pekerjaan antara dua antarmuka:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — mengembalikan data untuk operasi `GET` (satu item atau koleksi).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — mengelola penulisan untuk operasi `POST`, `PUT`, `PATCH`, dan `DELETE`.

Implementasi Chamilo berada di `src/CoreBundle/State/` (sekitar 35+ kelas). Mereka terhubung ke entitas melalui argumen `provider:` dan `processor:` pada operasi `#[ApiResource]`, bukan melalui rute.

### Kapan Menggunakannya

Pilih penyedia/pemroses — daripada Pengontrol Aksi API — ketika:

* Endpoint mengikuti format REST standar (daftar / baca / buat / perbarui / hapus), tetapi membutuhkan logika khusus untuk pengumpulan atau penyimpanan data.
* Anda perlu menyaring, denormalisasi, atau memperkaya hasil dari koleksi atau pembacaan item (misalnya, menghormati URL Akses saat ini, konteks kursus, atau aturan visibilitas).
* Anda perlu menjalankan efek samping pada penulisan (log audit, pembuatan berkas, pembaruan entitas terkait) sambil mempertahankan pipeline normalisasi, validasi, dan paginasi API Platform.
* Anda ingin menjaga operasi tetap terdeteksi dalam skema OpenAPI / Hydra tanpa mendaftarkan rute khusus.

Jika endpoint, di sisi lain, membutuhkan akses langsung ke `Request`, mengembalikan payload yang bukan sumber daya (unduhan berkas, CSV, pengalihan) atau mengatur alur multi-langkah, Pengontrol Aksi API di `src/CoreBundle/Controller/Api/` adalah pilihan yang lebih tepat.

### Koneksi pada Entitas

Referensikan kelas dalam operasi:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

---
### Contoh Penyedia

`src/CoreBundle/State/DocumentProvider.php` menyelesaikan sebuah `CDocument` berdasarkan variabel URI dan melemparkan `NotFoundHttpException` ketika tidak ditemukan:

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

---
### Contoh Prosesor

`src/CoreBundle/State/ColorThemeStateProcessor.php` mendelegasikan ke `persistProcessor` bawaan Doctrine, kemudian menjalankan efek samping (menghasilkan file CSS pada sistem file Flysystem untuk tema, mengaitkan tema dengan URL Akses saat ini):

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

        // …menghasilkan colors.css, mengaitkan ke AccessUrl saat ini, memperbarui…

        return $colorTheme;
    }
}
```

### Pola yang Perlu Diketahui

* **Menggabungkan dengan prosesor bawaan.** Hiasi `ProcessorInterface $persistProcessor` (terintegrasi dengan Doctrine) sehingga logika khusus Chamilo dijalankan *di sekitar* persistensi bawaan, bukan sebagai pengganti.
* **Penyedia koleksi mengelola paginasi mereka sendiri.** Ketika penyedia koleksi membangun kueri khusus, ia harus menghormati `?page`, `?itemsPerPage`, dan filter pencarian — paginator otomatis API Platform hanya berlaku untuk penyedia koleksi bawaan Doctrine.
* **Satu kelas per sumber daya + jenis operasi adalah hal yang umum**, tetapi sebuah penyedia dapat melayani beberapa operasi (lihat `UsergroupStateProvider`, digunakan kembali dalam empat operasi pada `Usergroup`).
* **Konvensi penamaan**: `<Entity>StateProvider` / `<Entity>StateProcessor` untuk penangan sumber daya yang luas; `<Entity><Action>Processor` (misalnya, `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) untuk operasi yang lebih spesifik.

## Perutean

Pengontrol menggunakan **atribut PHP 8** untuk definisi rute:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Sumber daya API Platform menggunakan atribut `#[ApiResource]` pada entitas, dengan operasi khusus yang mengarah ke aksi pengontrol.

## Traits

Pengontrol menggunakan traits bersama untuk fungsionalitas umum:

* `ControllerTrait` — Akses ke pengaturan, serializer, dan layanan umum
* `CourseControllerTrait` — Pembantu konteks kursus
* `ResourceControllerTrait` — Operasi simpul sumber daya