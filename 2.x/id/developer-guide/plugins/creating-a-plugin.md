# Membuat Plugin

Panduan ini akan memandu Anda dalam membuat plugin dasar untuk Chamilo. Untuk detail tambahan, lihat [halaman wiki pengembangan plugin](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Langkah 1: Membuat Direktori Plugin

Buat direktori di `public/plugin/`. Nama direktori harus sesuai dengan pengenal plugin Anda:

```
public/plugin/MyPlugin/
```

## Langkah 2: Mendefinisikan Kelas Plugin

Buat file `src/MyPluginPlugin.php`. Kelas ini memperluas `Plugin` dan mengikuti pola singleton:

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

### Tipe Pengaturan yang Tersedia

| Tipe | Deskripsi |
|------|-----------|
| `boolean` | Kotak centang aktif/nonaktif |
| `text` | Input teks satu baris |
| `select` | Dropdown (sediakan array `options`) |
| `wysiwyg` | Editor teks kaya |
| `html` | Bidang HTML mentah |
| `checkbox` | Kotak centang |
| `user` | Pemilih pengguna |

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

Mengakses pengaturan saat runtime:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // nilai tunggal
$all  = $plugin->get_settings();       // semua pengaturan
```

## Langkah 3: Membuat plugin.php

File `plugin.php` di root plugin adalah **wajib**. File ini harus menetapkan `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Langkah 4: Membuat Skrip Instalasi dan Uninstall

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

Implementasikan pembuatan/penghapusan skema aktual di dalam kelas menggunakan `SchemaTool` dari Doctrine.

## Langkah 5: Menambahkan Terjemahan

Buat file bahasa di `lang/` menggunakan kode lokal (misalnya, `en_US.php`, `fr_FR.php`, `es_ES.php`). File cadangan adalah `en_US.php`.

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

## Langkah 6: Menyisipkan Konten melalui Wilayah Tampilan

Plugin dapat menyisipkan HTML ke dalam 18 wilayah yang telah ditentukan sebelumnya di frontend Vue. Override metode `renderRegion()` di kelas Anda:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Wilayah yang tersedia meliputi: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Langkah 7: Bereaksi terhadap Peristiwa Platform (Opsional)

Plugin dapat bereaksi terhadap peristiwa platform menggunakan subscriber event Symfony. Buat file yang berakhiran `EventSubscriber.php` di dalam `src/EventSubscriber/` — file ini akan terdaftar secara otomatis melalui `PluginEventSubscriberPass`.

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
        // Kelas plugin bukan layanan Symfony — gunakan singleton create().
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
        // logika Anda di sini
    }
}
```

Lihat `src/CoreBundle/Event/Events.php` untuk daftar lengkap peristiwa yang tersedia (pengguna, kursus, sesi, LP, latihan, portofolio, autentikasi, dan lainnya).

## Langkah 8: Kait Siklus Hidup

Ganti metode-metode ini di kelas plugin Anda untuk merespons tindakan platform:

| Metode | Dipicu ketika |
|--------|---------------|
| `install()` | Plugin diaktifkan |
| `uninstall()` | Plugin dihapus |
| `performActionsAfterConfigure()` | Admin menyimpan formulir konfigurasi |
| `course_settings_updated(array $values)` | Pengaturan tingkat kursus berubah |
| `validateCourseSetting(string $variable)` | Pengaturan kursus disimpan (kembalikan `false` untuk menolak) |
| `doWhenDeletingUser(int $userId)` | Seorang pengguna dihapus |
| `doWhenDeletingCourse(int $courseId)` | Sebuah kursus dihapus |
| `doWhenDeletingSession(int $sessionId)` | Sebuah sesi dihapus |

## Langkah 9: Aktivasi

Masuk sebagai administrator, navigasikan ke **Kelola Plugin**, temukan plugin Anda, dan klik **Aktifkan**.

## Tips

* **Ikuti plugin yang sudah ada sebagai contoh** — `public/plugin/HelloWorld/` dan `public/plugin/TopLinks/` adalah referensi sederhana yang baik
* **Gunakan terjemahan** — Selalu gunakan sistem `lang/` untuk teks yang menghadap pengguna
* **Bersihkan saat uninstall** — Hapus tabel basis data dan pengaturan dalam skrip uninstall
* **Periksa status aktif** — Dalam pelanggan acara, selalu panggil `$this->plugin->isEnabled()` sebelum menjalankan logika