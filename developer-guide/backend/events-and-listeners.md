# Eventos dan Listeners

Chamilo menggunakan sistem eventos dari Symfony untuk komunikasi yang terpisah antara komponen-komponen.

## Listeners Eventos

Chamilo menggunakan dua lokasi untuk listeners:

* **`src/CoreBundle/EventListener/`** — Listeners kernel/HTTP dari Symfony (permintaan, respons, pengecualian, login/logout, akses ke kursus/sesi, dll.). Contoh: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Listeners entitas Doctrine yang terkait dengan entitas tertentu. Contoh: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Pilih lokasi yang sesuai dengan kebutuhan Anda untuk bereaksi: eventos pipeline HTTP ditempatkan di `EventListener/`; pengait siklus hidup entitas ditempatkan di `Entity/Listener/`.

## Subscribers Eventos

Terletak di `src/CoreBundle/EventSubscriber/`:

Subscribers eventos dapat mendengarkan beberapa eventos:

* **Subscribers keamanan** — Menangani eventos login/logout, melacak upaya login
* **Subscribers API** — Pra/pasca-pemrosesan untuk permintaan API
* **Subscribers Doctrine** — Bereaksi terhadap eventos siklus hidup entitas

## Eventos Siklus Hidup Doctrine

Entitas menggunakan `#[ORM\HasLifecycleCallbacks]` untuk eventos pada tingkat basis data:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Membuat Listeners Kustom

Untuk menambahkan perilaku kustom:

1. Buat kelas listener/subscriber di bundle yang sesuai
2. Tandai sebagai listener atau subscriber eventos dalam konfigurasi layanan
3. Implementasikan metode penanganan

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Logika Anda di sini
    }
}
```

## Eventos Utama

| Evento | Kapan Dipicu |
|-------|--------------|
| `kernel.request` | Pada setiap permintaan HTTP |
| `kernel.response` | Sebelum mengirim respons HTTP |
| `security.interactive_login` | Ketika pengguna melakukan login |
| `doctrine.prePersist` | Sebelum entitas disimpan untuk pertama kalinya |
| `doctrine.postUpdate` | Setelah entitas diperbarui |

---
## Peristiwa Khusus Chamilo

Peristiwa-peristiwa ini dipicu oleh kode Chamilo itu sendiri dan merupakan titik integrasi utama untuk plugin. Konstanta didefinisikan dalam `Chamilo\CoreBundle\Event\Events`.

| Konstanta | String Peristiwa | Kapan Dipicu |
|----------|------------------|--------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Setelah pembuatan kursus |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Sebelum pengguna mengakses kursus |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Sebelum pengguna mendaftar ke kursus |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Ketika pengguna mencoba mendaftar ulang ke sesi |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Setelah validasi kredensial login |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Setelah pemeriksaan kondisi tambahan login |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Ketika bilah alat dokumen dirender |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Ketika tombol aksi per berkas dirender |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Ketika dokumen dibuka untuk dilihat |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Ketika halaman laporan latihan merender tautan aksi |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Setelah siswa mengirimkan latihan |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Setelah setiap pertanyaan dijawab |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Setelah pembuatan jalur pembelajaran |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Ketika siswa membuka item jalur pembelajaran |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Setelah siswa menyelesaikan jalur pembelajaran |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Ketika panel administrasi membangun daftar bloknya |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Setelah pembuatan akun pengguna |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Setelah pembaruan akun pengguna |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Setelah penghapusan akun pengguna |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Setelah pembuatan item portofolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Ketika isi notifikasi diformat |

## Contoh Plugin: Menambahkan Tombol ke Penampil Dokumen

Bagian ini menjelaskan bagaimana sebuah plugin menggunakan subscriber peristiwa untuk menyisipkan tombol pada halaman Chamilo yang sudah ada — tanpa perlu modifikasi kode utama.

### Skenario

Sebuah plugin bernama **MyViewer** ingin menambahkan tombol "Buka di MyViewer" di samping setiap dokumen di pengelola berkas kursus. Peristiwa yang relevan adalah `Events::DOCUMENT_ITEM_VIEW`, yang dipicu oleh Chamilo setiap kali dokumen akan ditampilkan, memuat entitas `CDocument` dan daftar tautan yang dapat diubah.

### Struktur Direktori Plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Mendeklarasikan $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Halaman pengaturan plugin
├── lang/                               # String terjemahan
└── src/
    ├── MyViewerPlugin.php              # Kelas utama plugin (memperluas Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Pelanggan peristiwa
```

---
### Kelas Utama Plugin (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

Kelas dasar `Plugin` menyediakan `isEnabled()`, `get($settingKey)`, dan fungsi pembantu untuk menginstal alat kursus dan pengaturan. Pola singleton (`static $instance`) adalah konvensi standar Chamilo karena kelas plugin juga diinstansiasi di luar kontainer Symfony (pada halaman PHP lama).

### Pelanggan Acara (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` menambahkan HTML ke array yang dirender oleh template tampilan dokumen Chamilo di samping tindakan bawaan "Download" dan "Preview". Pelanggan acara tidak pernah mengubah berkas inti Chamilo.

### Pendaftaran

Tidak diperlukan pendaftaran layanan secara manual. Berkas `config/services.yaml` Chamilo mengaktifkan tanda `autoconfigure` secara global, yang secara otomatis menandai setiap kelas yang mengimplementasikan `EventSubscriberInterface` sebagai `kernel.event_subscriber`. Selama direktori plugin dimuat (melalui classmap Composer atau autoload PSR-4), Symfony akan mendeteksi pelanggan acara pada pembersihan cache berikutnya.

```bash
php bin/console cache:clear
```

### Bagaimana Data Acara Mengalir

```
Daftar dokumen dirender
        │
        ▼
Chamilo memicu DocumentItemViewEvent (memuat entitas CDocument + links[] kosong)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → menambahkan tautan HTML
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → menambahkan tombol "Edit"
        │   (sejumlah plugin dapat mendengarkan acara yang sama)
        ▼
Template merender event->getLinks() di samping tindakan berkas bawaan
```

Beberapa plugin dapat berlangganan ke acara yang sama secara independen; masing-masing menambahkan data bersama tanpa mengetahui yang lain. Urutan eksekusi mengikuti sistem prioritas Symfony — berikan bilangan bulat prioritas sebagai elemen kedua dari tupel penangan di `getSubscribedEvents()` jika urutan penting:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // lebih besar = lebih awal
    ];
}
```