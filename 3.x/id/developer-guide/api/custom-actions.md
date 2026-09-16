# Custom Actions

Selain operasi CRUD standar, Chamilo memiliki sejumlah pengontrol aksi API kustom (dalam urutan puluhan) yang menangani operasi khusus. Jumlah pastinya bervariasi antar rilis — daftar `src/CoreBundle/Controller/Api/` untuk himpunan saat ini.

## Location

Aksi kustom berada di `src/CoreBundle/Controller/Api/`.

## Notable Custom Actions

### Documents

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Mengunggah berkas atau membuat dokumen folder/tautan |
| `UpdateDocumentFileAction` | Mengganti berkas suatu dokumen |
| `ReplaceDocumentFileAction` | Mengganti berkas dokumen, dengan mempertahankan ID-nya |
| `MoveDocumentAction` | Memindahkan dokumen ke folder lain |
| `UpdateVisibilityDocument` | Mengalihkan visibilitas dokumen bagi peserta didik |
| `DownloadAllDocumentsAction` | Mengunduh semua dokumen dalam suatu folder sebagai ZIP |
| `DownloadSelectedDocumentsAction` | Mengunduh himpunan dokumen terpilih sebagai ZIP |
| `DocumentUsageAction` | Mencantumkan kursus/sesi tempat suatu dokumen digunakan |
| `DocumentLearningPathUsageAction` | Mencantumkan learning path tempat suatu dokumen digunakan |

### Glossary

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Membuat istilah glosarium |
| `UpdateCGlossaryAction` | Memperbarui istilah glosarium |
| `ExportCGlossaryAction` | Mengekspor glosarium ke berkas |
| `ImportCGlossaryAction` | Mengimpor glosarium dari berkas |
| `ExportGlossaryToDocumentsAction` | Mengekspor glosarium sebagai dokumen dalam kursus |
| `GetGlossaryCollectionController` | Mendapatkan koleksi glosarium dengan penyaringan kustom |

### Links

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Membuat tautan eksternal |
| `UpdateCLinkAction` | Memperbarui tautan eksternal |
| `CreateCLinkCategoryAction` | Membuat kategori tautan |
| `UpdateCLinkCategoryAction` | Memperbarui kategori tautan |
| `CheckCLinkAction` | Memeriksa apakah URL tautan dapat dijangkau |
| `ExportCLinksAction` | Mengekspor tautan ke berkas |
| `CLinkDetailsController` | Mendapatkan rincian tautan |
| `CLinkImageController` | Mendapatkan atau menetapkan gambar pratinjau tautan |
| `GetLinksCollectionController` | Mendapatkan koleksi tautan dengan penyaringan kustom |
| `UpdateVisibilityLink` | Mengalihkan visibilitas tautan |
| `UpdateVisibilityLinkCategory` | Mengalihkan visibilitas kategori tautan |
| `UpdatePositionLink` | Mengurutkan ulang tautan |

### Learning Paths

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Membuat learning path |
| `LpReorderController` | Mengurutkan ulang item learning path |

### Calendar

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Memperbarui peristiwa kalender kursus |
| `CalendarMyStudentsScheduleAction` | Mendapatkan jadwal peserta didik seorang pengajar |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Membuat pos blog |
| `CreateBlogAttachmentAction` | Melampirkan berkas pada pos blog |
| `UpdateVisibilityBlog` | Mengalihkan visibilitas blog |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Mengunggah berkas ke dropbox (alat pertukaran berkas) |

### Student Work (Assignments)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Mengirimkan berkas tugas |
| `CreateStudentPublicationCommentAction` | Menambahkan komentar pada suatu penyerahan |
| `CreateStudentPublicationCorrectionFileAction` | Mengunggah berkas koreksi untuk suatu penyerahan |

### Personal Files

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Mengunggah berkas ke ruang berkas pribadi pengguna |
| `UpdatePersonalFileAction` | Memperbarui berkas pribadi |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Menyukai pos sosial |
| `DislikeSocialPostController` | Membatalkan suka pada pos sosial |
| `CreateSocialPostAttachmentAction` | Melampirkan berkas pada pos sosial |
| `SocialPostAttachmentsController` | Mencantumkan lampiran pada pos sosial |
| `AbstractFeedbackSocialPostController` | Kelas dasar untuk aksi umpan balik pos sosial |

### Sessions

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Membuat sesi serta mendaftarkan pengguna dan kursus dalam satu panggilan |

### Users & Access URLs

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Membuat pengguna dan mengaitkannya dengan access URL |
| `UserAccessUrlsController` | Mencantumkan access URL tempat pengguna tergabung |
| `UserSkillsController` | Mencantumkan keterampilan yang diberikan kepada pengguna |

### Video Conference

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Menangani callback dari penyedia konferensi video eksternal |

### Base Classes

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Kelas dasar untuk aksi unggah berkas; menangani penguraian multipart, pembuatan resource node, dan penyimpanan |

## Mengimplementasikan Custom Action

Custom action adalah controller Symfony standar yang dirujuk dalam definisi operasi API Platform. Atribut `#[ApiResource]` berada pada **entitas**, dan parameter `controller:` setiap operasi menunjuk ke kelas action:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
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

Kelas action itu sendiri adalah controller invokable biasa — service diinjeksikan melalui argumen metode `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Poin penting:
- `deserialize: false` diatur ketika action membaca request secara langsung (misalnya unggahan file multipart) alih-alih membiarkan API Platform mendeserialisasi body JSON.
- Action unggah file biasanya memperluas `BaseResourceFileAction`, yang menangani parsing multipart dan wiring resource node.
- Keamanan ditegakkan melalui parameter `security:` pada operasi, bukan di dalam controller.