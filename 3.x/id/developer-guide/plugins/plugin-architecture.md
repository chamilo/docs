# Arsitektur Plugin

## Lokasi Plugin

Plugin disimpan di `public/plugin/`. Setiap plugin memiliki direktorinya sendiri:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Struktur Plugin

Direktori plugin yang umum berisi:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
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

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registers the plugin as a course tool |
| `$isAdminPlugin` | bool | Adds an admin interface page |
| `$isMailPlugin` | bool | Integrates with the mail system |
| `$addCourseTool` | bool | Adds an icon to the course homepage |
| `$course_settings` | array | Defines per-course configuration fields |

## Siklus Hidup Plugin

1. **Instalasi** — Admin mengaktifkan plugin, yang menjalankan `install.php`
2. **Konfigurasi** — Pengaturan didefinisikan dan dikelola melalui panel admin; disimpan di `access_url_rel_plugin` (mendukung multi-tenant)
3. **Eksekusi** — Plugin menyuntikkan konten ke region tampilan atau merespons peristiwa platform
4. **Deaktivasi** — Plugin dinonaktifkan tetapi datanya tetap dipertahankan
5. **Uninstalasi** — Menjalankan `uninstall.php` untuk membersihkan data dan tabel

## Region Tampilan

Plugin menyuntikkan HTML ke 18 region yang telah ditentukan pada frontend Vue dengan menimpa `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Region yang tersedia: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integrasi Symfony

### Event Subscriber

Berkas yang berakhiran `EventSubscriber.php` yang diletakkan di dalam `src/EventSubscriber/` didaftarkan secara otomatis melalui `PluginEventSubscriberPass`. Mereka mengimplementasikan `EventSubscriberInterface` dan merespons peristiwa yang didefinisikan di `src/CoreBundle/Event/Events.php`.

Karena kelas plugin (`MyPluginPlugin`) bukan layanan Symfony, kelas tersebut tidak dapat di-autowire ke konstruktor subscriber. Gunakan singleton `create()` sebagai gantinya:

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

Entitas Doctrine yang diletakkan di `src/Entity/` ditemukan secara otomatis oleh `PluginEntityPass`. Gunakan atribut PHP 8 untuk pemetaan. Namespace harus mengikuti `Chamilo\PluginBundle\{PluginName}`. Gunakan prefiks nama tabel yang unik (misalnya, `my_plugin_*`) untuk menghindari tabrakan.

### Layanan PluginHelper

Untuk mengakses status plugin dari layanan Symfony inti, injeksikan `PluginHelper` alih-alih menginstansiasi kelas plugin secara langsung:

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

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Periksa apakah plugin terpasang dan aktif untuk URL akses saat ini |
| `loadLegacyPlugin(string $name): ?object` | Instansiasi dan kembalikan singleton plugin |
| `getPluginSetting(string $name, string $key): mixed` | Baca satu nilai pengaturan plugin |
| `getPluginOverrides(string $name): array` | Dapatkan override `plugin.yaml` (nilai default + spesifik URL akses) untuk suatu plugin |

## Referensi File Inti

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Kelas dasar plugin |
| `public/main/inc/lib/plugin.lib.php` | Pengelola plugin |
| `src/CoreBundle/Entity/Plugin.php` | Entitas Doctrine plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Layanan PluginHelper |
| `src/CoreBundle/Event/Events.php` | Konstanta event |
| `public/plugin/HelloWorld/` | Plugin contoh minimal |
| `public/plugin/TopLinks/` | Plugin contoh sederhana |