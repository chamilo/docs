# Arsitektur Plugin

## Lokasi Plugin

Plugin disimpan di `public/plugin/`. Setiap plugin memiliki direktori sendiri:

```
public/plugin/
├── Bbb/                    # Integrasi BigBlueButton
├── Zoom/                   # Integrasi Zoom
├── Onlyoffice/             # Pengeditan dokumen OnlyOffice
├── XApi/                   # xAPI/Tin Can
├── ...                     # plugin bawaan disertakan di bawah public/plugin/
```

## Struktur Plugin

Direktori plugin tipikal berisi:

```
public/plugin/MyPlugin/
├── plugin.php              # WAJIB — menetapkan $plugin_info
├── install.php             # Skrip instalasi
├── uninstall.php           # Skrip penghapusan instalasi
├── index.php               # Titik masuk rendering wilayah (jika berlaku)
├── admin.php               # Antarmuka admin (opsional)
├── lang/                   # File terjemahan (kode lokal: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Kelas utama plugin (memperluas Plugin)
│   ├── Entity/                   # Entitas Doctrine (ditemukan secara otomatis)
│   ├── Repository/               # Repositori Doctrine
│   └── EventSubscriber/          # Pelanggan acara Symfony (terdaftar otomatis)
├── templates/              # Template Twig
└── resources/              # Aset CSS/JS
```

## Kelas Plugin

Setiap plugin memperluas kelas dasar `Plugin` (`public/main/inc/lib/plugin.class.php`) dan mengikuti pola singleton:

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Properti Kelas Utama

| Properti | Tipe | Efek |
|----------|------|--------|
| `$isCoursePlugin` | bool | Mendaftarkan plugin sebagai alat kursus |
| `$isAdminPlugin` | bool | Menambahkan halaman antarmuka admin |
| `$isMailPlugin` | bool | Berintegrasi dengan sistem email |
| `$addCourseTool` | bool | Menambahkan ikon ke beranda kursus |
| `$course_settings` | array | Menentukan bidang konfigurasi per kursus |

## Siklus Hidup Plugin

1. **Instalasi** — Admin mengaktifkan plugin, yang menjalankan `install.php`
2. **Konfigurasi** — Pengaturan ditentukan dan dikelola melalui panel admin; disimpan di `access_url_rel_plugin` (mendukung multi-tenant)
3. **Eksekusi** — Plugin menyuntikkan konten ke wilayah tampilan atau bereaksi terhadap acara platform
4. **Deaktivasi** — Plugin dinonaktifkan tetapi datanya tetap dipertahankan
5. **Penghapusan Instalasi** — Menjalankan `uninstall.php` untuk membersihkan data dan tabel

## Wilayah Tampilan

Plugin menyuntikkan HTML ke 18 wilayah yang telah ditentukan sebelumnya di frontend Vue dengan mengganti `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Konten footer Plugin Saya</p>';
}
```

Wilayah yang tersedia: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integrasi Symfony

### Pelanggan Acara

File yang berakhiran `EventSubscriber.php` yang ditempatkan di dalam `src/EventSubscriber/` terdaftar secara otomatis melalui `PluginEventSubscriberPass`. Mereka mengimplementasikan `EventSubscriberInterface` dan bereaksi terhadap acara yang didefinisikan di `src/CoreBundle/Event/Events.php`.

Karena kelas plugin (`MyPluginPlugin`) bukan layanan Symfony, ia tidak dapat di-autowire ke dalam konstruktor pelanggan. Gunakan singleton `create()` sebagai gantinya:

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Entitas Doctrine

Entitas Doctrine yang ditempatkan di `src/Entity/` ditemukan secara otomatis oleh `PluginEntityPass`. Gunakan atribut PHP 8 untuk pemetaan. Namespace harus mengikuti `Chamilo\PluginBundle\{PluginName}`. Gunakan awalan nama tabel yang unik (misalnya, `my_plugin_*`) untuk menghindari tabrakan.

---
### Layanan PluginHelper

Untuk mengakses status plugin dari layanan inti Symfony, injeksikan `PluginHelper` daripada membuat instance kelas plugin secara langsung:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

Metode yang tersedia:

| Metode | Tujuan |
|--------|--------|
| `isPluginEnabled(string $name): bool` | Memeriksa apakah plugin terpasang dan aktif untuk URL akses saat ini |
| `loadLegacyPlugin(string $name): ?object` | Membuat instance dan mengembalikan singleton plugin |
| `getPluginSetting(string $name, string $key): mixed` | Membaca nilai pengaturan tunggal plugin |
| `getPluginOverrides(string $name): array` | Mendapatkan penggantian `plugin.yaml` (default + spesifik URL akses) untuk plugin |

## Referensi File Inti

| File | Tujuan |
|------|--------|
| `public/main/inc/lib/plugin.class.php` | Kelas dasar plugin |
| `public/main/inc/lib/plugin.lib.php` | Manajer plugin |
| `src/CoreBundle/Entity/Plugin.php` | Entitas Doctrine plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Layanan PluginHelper |
| `src/CoreBundle/Event/Events.php` | Konstanta acara |
| `public/plugin/HelloWorld/` | Contoh plugin minimal |
| `public/plugin/TopLinks/` | Contoh plugin sederhana |