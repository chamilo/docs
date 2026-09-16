# Membuat Plugin

Panduan ini menuntun Anda membuat plugin Chamilo dasar. Untuk detail tambahan, lihat [halaman wiki pengembangan Plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Langkah 1: Buat Direktori Plugin

Buat direktori di `public/plugin/`. Nama direktori harus sesuai dengan pengidentifikasi plugin Anda:

```
public/plugin/MyPlugin/
```

## Langkah 2: Definisikan Kelas Plugin

Buat `src/MyPluginPlugin.php`. Kelas ini memperluas `Plugin` dan mengikuti pola singleton:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Jenis Pengaturan yang Tersedia

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

Untuk pengaturan `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Akses pengaturan saat runtime:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Langkah 3: Buat plugin.php

`plugin.php` di akar plugin **wajib** ada. File ini harus menetapkan `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Langkah 4: Buat Skrip Instalasi dan Uninstalasi

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Implementasikan pembuatan/penghapusan skema yang sebenarnya di dalam kelas menggunakan `SchemaTool` Doctrine.

## Langkah 5: Tambahkan Terjemahan

Buat berkas bahasa di `lang/` menggunakan kode lokal (misalnya, `en_US.php`, `fr_FR.php`, `es.php`). Cadangan (fallback) adalah `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Akses terjemahan melalui `$plugin->get_lang('key')`.

## Langkah 6: Sisipkan Konten melalui Display Regions

Plugin dapat menyisipkan HTML ke 18 region antarmuka yang telah ditentukan. Mekanisme yang merender suatu region bergantung pada region mana itu:

* **`course_tool_plugin`** adalah satu-satunya region yang dirender dengan menimpa `renderRegion(string $region): string` di kelas plugin Anda. Metode ini dipanggil (melalui `PluginRegionController`) hanya untuk plugin berskala kursus (`is_course_plugin`) saat halaman kursus terbuka:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **16 region umum** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — dirender dengan merujuk `index.php` milik plugin itu sendiri, bukan `renderRegion()`. Kerangka kerja menetapkan `$plugin_info['current_region']` sebelum merujuk berkas tersebut, sehingga dapat `echo` HTML secara langsung untuk region itu atau mendeklarasikan templat Twig untuk dirender melalui `$plugin_info['templates']`:

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` adalah contoh kerja yang lengkap — HelloWorld tidak menimpa `renderRegion()` sama sekali; setiap region yang diisinya melalui `index.php`.

* **`menu_administrator`** adalah kasus khusus yang dicadangkan untuk tautan khusus administrator yang ditampilkan di dasbor administrasi warisan, bukan dua mekanisme di atas. `Dashboard` dan `CleanDeletedFiles` adalah plugin nyata yang menggunakannya.

Mekanisme mana pun yang Anda gunakan, administrator tetap harus mengaktifkan region tersebut untuk plugin Anda dari tombol **Regions** di sampingnya pada halaman **Manage plugins** (lihat [Langkah 9](#step-9-activate)) — plugin tidak merender apa pun di region yang belum diaktifkan secara eksplisit di sana.

## Langkah 7: Bereaksi terhadap Peristiwa Platform (Opsional)

Plugin dapat bereaksi terhadap peristiwa platform menggunakan Symfony event subscriber. Buat berkas yang berakhiran `EventSubscriber.php` di dalam `src/EventSubscriber/` — berkas tersebut didaftarkan secara otomatis melalui `PluginEventSubscriberPass`.

Dua persyaratan, atau subscriber dilewati secara senyap: kelas harus berada di **global namespace** (pass meresolvenya dari nama berkas), dan Anda harus menjalankan `composer dump-autoload` setelah menambahkannya (`public/plugin` adalah entri classmap). Periksa hasilnya dengan `php bin/console debug:event-dispatcher <event.name>`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

Lihat `src/CoreBundle/Event/Events.php` untuk daftar lengkap peristiwa yang tersedia (pengguna, kursus, sesi, LP, latihan, portofolio, autentikasi, dan lainnya).

### Membersihkan data ketika kursus, sesi, atau pengguna dihapus

Jika plugin Anda menyimpan baris yang dikunci pada kursus, sesi, atau pengguna, berlanggananlah ke `Events::COURSE_DELETED`, `Events::SESSION_DELETED`, atau `Events::USER_DELETED`. Ini adalah satu-satunya cara untuk membersihkan data — metode lama `doWhenDeleting*` tidak lagi ada. Tiga aturan berlaku untuk listener ini:

* **Bertindak pada `AbstractEvent::TYPE_PRE`** — peristiwa dipicu sebelum baris dihapus, satu-satunya momen ketika kunci asing Anda masih teresolve dan data masih dapat dibaca. `USER_DELETED` juga dipicu sebagai `TYPE_POST`, sehingga pemeriksaan tersebut tidak bersifat opsional di sana.
* **Lindungi berdasarkan terpasang, bukan diaktifkan** — gunakan `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Baris Anda tetap ada meskipun plugin dinonaktifkan, atau hanya diaktifkan pada URL akses lain, dan kunci asingnya tetap memblokir penghapusan dalam kedua kasus.
* **Pada `USER_DELETED`, periksa `$event->isHardDelete()`** — penghapusan lunak menjaga pengguna tetap dapat dipulihkan, sehingga datanya harus tetap ada.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

Plugin `StudentFollowUp` adalah referensi untuk pengguna; `Bbb`, `BuyCourses`, dan `EmbedRegistry` membawa padanan untuk kursus dan sesi.

## Langkah 8: Hook Siklus Hidup

Timpa metode berikut di kelas plugin Anda untuk merespons tindakan platform:

| Metode | Dipicu ketika |
|--------|----------------|
| `install()` | Plugin diaktifkan |
| `uninstall()` | Plugin dihapus |
| `performActionsAfterConfigure()` | Admin menyimpan formulir konfigurasi |
| `course_settings_updated(array $values)` | Pengaturan tingkat kursus berubah |
| `validateCourseSetting(string $variable)` | Pengaturan kursus disimpan (kembalikan `false` untuk menolak) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()`, dan `doWhenDeletingSession()` telah dihapus, bersama dengan pemicu `AppPlugin::performActionsWhenDeletingItem()` yang memanggilnya — menimpanya sekarang tidak melakukan apa pun. Gunakan peristiwa penghapusan dari [Langkah 7](#cleaning-up-when-a-course-session-or-user-is-deleted) sebagai gantinya.

## Langkah 9: Aktifkan

Masuk sebagai administrator dan navigasikan ke blok **Platform** pada dasbor administrasi, lalu **Plugins** — ini membuka halaman **Manage plugins**. Temukan plugin Anda dan klik **Install**; setelah terpasang, klik **Enable** untuk mengaktifkannya (plugin yang diaktifkan menampilkan tombol **Disable** sebagai gantinya).

## Tips

* **Ikuti plugin yang sudah ada sebagai contoh** — `public/plugin/HelloWorld/` dan `public/plugin/TopLinks/` adalah referensi sederhana yang baik
* **Gunakan terjemahan** — Selalu gunakan sistem `lang/` untuk teks yang dihadapi pengguna
* **Bersihkan saat uninstall** — Hapus tabel basis data dan pengaturan dalam skrip uninstall
* **Periksa status diaktifkan** — Dalam event subscriber, panggil `$this->plugin->isEnabled()` sebelum mengeksekusi logika. Pengecualiannya adalah pembersihan saat penghapusan: lindungi berdasarkan terpasang, karena baris data tetap ada setelah plugin dinonaktifkan