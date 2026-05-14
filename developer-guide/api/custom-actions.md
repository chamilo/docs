# Aksi Kustom

Selain operasi CRUD standar, Chamilo memiliki beberapa pengontrol aksi kustom API (dalam jumlah puluhan) yang menangani operasi khusus. Jumlah pastinya bervariasi antar versi — daftar `src/CoreBundle/Controller/Api/` untuk melihat kumpulan saat ini.

## Lokasi

Aksi kustom terletak di `src/CoreBundle/Controller/Api/`.

## Aksi Kustom yang Penting

### Dokumen

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateDocumentFileAction` | Mengunggah file atau membuat folder/tautan dokumen |
| `UpdateDocumentFileAction` | Mengganti file dari sebuah dokumen |
| `ReplaceDocumentFileAction` | Mengganti file dari sebuah dokumen, dengan mempertahankan ID-nya |
| `MoveDocumentAction` | Memindahkan dokumen ke folder yang berbeda |
| `UpdateVisibilityDocument` | Mengubah visibilitas dokumen untuk siswa |
| `DownloadAllDocumentsAction` | Mengunduh semua dokumen dari sebuah folder sebagai ZIP |
| `DownloadSelectedDocumentsAction` | Mengunduh kumpulan dokumen yang dipilih sebagai ZIP |
| `DocumentUsageAction` | Mendaftar kursus/sesi di mana dokumen digunakan |
| `DocumentLearningPathUsageAction` | Mendaftar jalur pembelajaran di mana dokumen digunakan |

### Glosarium

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateCGlossaryAction` | Membuat istilah glosarium |
| `UpdateCGlossaryAction` | Memperbarui istilah glosarium |
| `ExportCGlossaryAction` | Mengekspor glosarium ke file |
| `ImportCGlossaryAction` | Mengimpor glosarium dari file |
| `ExportGlossaryToDocumentsAction` | Mengekspor glosarium sebagai dokumen di kursus |
| `GetGlossaryCollectionController` | Mendapatkan koleksi glosarium dengan penyaringan kustom |

### Tautan

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateCLinkAction` | Membuat tautan eksternal |
| `UpdateCLinkAction` | Memperbarui tautan eksternal |
| `CreateCLinkCategoryAction` | Membuat kategori tautan |
| `UpdateCLinkCategoryAction` | Memperbarui kategori tautan |
| `CheckCLinkAction` | Memeriksa apakah URL tautan dapat diakses |
| `ExportCLinksAction` | Mengekspor tautan ke file |
| `CLinkDetailsController` | Mendapatkan detail tautan |
| `CLinkImageController` | Mendapatkan atau mengatur gambar pratinjau tautan |
| `GetLinksCollectionController` | Mendapatkan koleksi tautan dengan penyaringan kustom |
| `UpdateVisibilityLink` | Mengubah visibilitas tautan |
| `UpdateVisibilityLinkCategory` | Mengubah visibilitas kategori tautan |
| `UpdatePositionLink` | Mengatur ulang urutan tautan |

### Jalur Pembelajaran

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateCLpAction` | Membuat jalur pembelajaran |
| `LpReorderController` | Mengatur ulang item dalam jalur pembelajaran |

### Kalender

| Pengontrol | Tujuan |
|-----------|---------|
| `UpdateCCalendarEventAction` | Memperbarui acara kalender kursus |
| `CalendarMyStudentsScheduleAction` | Mendapatkan jadwal siswa dari seorang pengajar |

### Blog

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateCBlogAction` | Membuat postingan blog |
| `CreateBlogAttachmentAction` | Melampirkan file ke postingan blog |
| `UpdateVisibilityBlog` | Mengubah visibilitas blog |

### Dropbox

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateDropboxFileAction` | Mengunggah file ke dropbox (alat pertukaran file) |

### Tugas Siswa

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Mengirimkan file tugas |
| `CreateStudentPublicationCommentAction` | Menambahkan komentar pada pengajuan |
| `CreateStudentPublicationCorrectionFileAction` | Mengunggah file koreksi untuk pengajuan |

### File Pribadi

| Pengontrol | Tujuan |
|-----------|---------|
| `CreatePersonalFileAction` | Mengunggah file ke ruang file pribadi pengguna |
| `UpdatePersonalFileAction` | Memperbarui file pribadi |

### Sosial

| Pengontrol | Tujuan |
|-----------|---------|
| `LikeSocialPostController` | Menyukai postingan sosial |
| `DislikeSocialPostController` | Tidak menyukai postingan sosial |
| `CreateSocialPostAttachmentAction` | Melampirkan file ke postingan sosial |
| `SocialPostAttachmentsController` | Mendaftar lampiran pada postingan sosial |
| `AbstractFeedbackSocialPostController` | Kelas dasar untuk aksi umpan balik pada postingan sosial |

### Sesi

| Pengontrol | Tujuan |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Membuat sesi dan mendaftarkan pengguna serta kursus dalam satu panggilan |

---
### Pengguna dan URL Akses

| Kontroler | Tujuan |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Membuat pengguna dan mengaitkannya dengan URL akses |
| `UserAccessUrlsController` | Menampilkan daftar URL akses yang terkait dengan seorang pengguna |
| `UserSkillsController` | Menampilkan daftar keterampilan yang diberikan kepada seorang pengguna |

### Konferensi Video

| Kontroler | Tujuan |
|-----------|---------|
| `VideoConferenceCallbackController` | Menangani panggilan balik dari penyedia konferensi video eksternal |

### Kelas Dasar

| Kelas | Tujuan |
|-------|---------|
| `BaseResourceFileAction` | Kelas dasar untuk aksi unggah berkas; menangani analisis multipart, pembuatan simpul sumber daya, dan penyimpanan |

---
## Mengimplementasikan Aksi Kustom

Aksi kustom adalah kontroler standar Symfony yang dirujuk dalam definisi operasi API Platform. Atribut `#[ApiResource]` berada pada **entitas**, dan parameter `controller:` dari setiap operasi mengarah ke kelas aksi:

```php
// Dalam kelas entitas (misalnya, src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

Kelas aksi itu sendiri adalah kontroler yang dapat dipanggil sederhana — layanan disuntikkan melalui argumen metode `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... layanan lain yang disuntikkan
    ): CDocument {
        // Menangani unggahan dan mengembalikan entitas
    }
}
```

Poin utama:
- `deserialize: false` ditetapkan ketika aksi membaca permintaan secara langsung (misalnya, unggahan berkas multipart) alih-alih membiarkan API Platform mendeserialisasi tubuh JSON.
- Aksi unggahan berkas biasanya memperluas `BaseResourceFileAction`, yang mengelola analisis multipart dan koneksi simpul sumber daya.
- Keamanan diterapkan melalui parameter `security:` pada operasi, bukan di dalam kontroler.