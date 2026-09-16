# Events and Listeners

Chamilo menggunakan sistem event Symfony untuk komunikasi terpisah antar komponen.

## Event Listeners

Chamilo menggunakan dua lokasi listener:

* **`src/CoreBundle/EventListener/`** — listener kernel/HTTP Symfony (request, response, exception, login/logout, akses course/session, dll.). Contoh: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Doctrine entity listener yang terikat pada entitas tertentu. Contoh: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Pilih lokasi yang sesuai dengan apa yang perlu Anda tanggapi: event pipeline HTTP berada di `EventListener/`; hook siklus hidup entitas berada di `Entity/Listener/`.

## Event Subscribers

Berada di `src/CoreBundle/EventSubscriber/`:

Event subscriber dapat mendengarkan beberapa event:

* **Security subscribers** — Menangani event login/logout, melacak percobaan login
* **API subscribers** — Pra/pasca pemrosesan untuk permintaan API
* **Doctrine subscribers** — Bereaksi terhadap event siklus hidup entitas

## Doctrine Lifecycle Events

Entitas menggunakan `#[ORM\HasLifecycleCallbacks]` untuk event tingkat basis data:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Membuat Listener Kustom

Untuk menambahkan perilaku kustom:

1. Buat kelas listener/subscriber di bundle yang sesuai
2. Tandai sebagai event listener atau subscriber dalam konfigurasi service
3. Implementasikan metode handler

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Event Utama

| Event | Kapan dijalankan |
|-------|--------------|
| `kernel.request` | Setiap permintaan HTTP |
| `kernel.response` | Sebelum mengirim respons HTTP |
| `security.interactive_login` | Pengguna masuk |
| `doctrine.prePersist` | Sebelum entitas disimpan pertama kali |
| `doctrine.postUpdate` | Setelah entitas diperbarui |

## Event Khusus Chamilo

Event ini dikirim oleh kode Chamilo sendiri dan merupakan titik integrasi utama untuk plugin. Konstanta didefinisikan di `Chamilo\CoreBundle\Event\Events`.

| Konstanta | String event | Kapan dijalankan |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Setelah course dibuat |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Sebelum pengguna mengakses course |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Sebelum pengguna mendaftar ke course |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Ketika pengguna mencoba mendaftar ulang ke session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Setelah kredensial login divalidasi |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Setelah kondisi login tambahan diperiksa |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Ketika toolbar alat dokumen dirender |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Ketika tombol aksi per berkas dirender |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Ketika dokumen dibuka untuk dilihat |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Ketika halaman laporan exercise merender tautan aksinya |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Setelah peserta didik mengirimkan exercise |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Setelah setiap pertanyaan dijawab |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Setelah learning path dibuat |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Ketika peserta didik membuka item LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Setelah peserta didik menyelesaikan learning path |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Ketika dasbor admin membangun daftar bloknya |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Setelah akun pengguna dibuat |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Setelah akun pengguna diperbarui |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Setelah akun pengguna dihapus |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Setelah item portofolio dibuat |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Ketika isi notifikasi diformat |

## Contoh Plugin: Menambahkan Tombol ke Document Viewer

Bagian ini menelusuri cara plugin menggunakan event subscriber untuk menyisipkan tombol ke halaman Chamilo yang sudah ada — tanpa perlu memodifikasi kode inti.

### Skenario

Sebuah plugin bernama **MyViewer** ingin menambahkan tombol "Open in MyViewer" di samping setiap dokumen pada pengelola berkas kursus. Peristiwa yang relevan adalah `Events::DOCUMENT_ITEM_VIEW`, yang dikirim oleh Chamilo setiap kali sebuah dokumen akan ditampilkan, membawa entitas `CDocument` dan daftar tautan yang dapat diubah.

### Tata letak direktori plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### Kelas plugin utama (`src/MyViewerPlugin.php`)

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

Kelas dasar `Plugin` menyediakan `isEnabled()`, `get($settingKey)`, serta helper untuk memasang alat kursus dan pengaturan. Pola singleton (`static $instance`) adalah konvensi standar Chamilo karena kelas plugin juga diinstansiasi di luar kontainer Symfony (pada halaman PHP warisan).

### Subscriber peristiwa (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` menambahkan HTML ke array yang dirender templat tampilan dokumen Chamilo bersama aksi bawaan "Download" dan "Preview". Subscriber tidak pernah mengubah berkas inti Chamilo.

### Pendaftaran

Tidak diperlukan pendaftaran layanan secara manual. Berkas `config/services.yaml` Chamilo mengaktifkan bendera `autoconfigure` Symfony secara global, yang secara otomatis menandai setiap kelas yang mengimplementasikan `EventSubscriberInterface` sebagai `kernel.event_subscriber`. Selama direktori plugin dimuat (melalui classmap Composer atau autoload PSR-4), Symfony akan mengambil subscriber tersebut pada pembersihan cache berikutnya.

```bash
php bin/console cache:clear
```

### Alur data peristiwa

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

Beberapa plugin dapat berlangganan ke peristiwa yang sama secara independen; masing-masing menambahkan ke data bersama tanpa mengetahui yang lain. Urutan eksekusi mengikuti sistem prioritas Symfony — berikan bilangan bulat prioritas sebagai elemen kedua pada tuple handler di `getSubscribedEvents()` jika urutan penting:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```