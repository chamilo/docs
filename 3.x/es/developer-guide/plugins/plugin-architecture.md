# Arquitectura de plugins

## Ubicación de los plugins

Los plugins se almacenan en `public/plugin/`. Cada plugin tiene su propio directorio:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Estructura de un plugin

Un directorio típico de plugin contiene:

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

## Clase del plugin

Cada plugin extiende la clase base `Plugin` (`public/main/inc/lib/plugin.class.php`) y sigue el patrón singleton:

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

### Propiedades clave de la clase

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registers the plugin as a course tool |
| `$isAdminPlugin` | bool | Adds an admin interface page |
| `$isMailPlugin` | bool | Integrates with the mail system |
| `$addCourseTool` | bool | Adds an icon to the course homepage |
| `$course_settings` | array | Defines per-course configuration fields |

## Ciclo de vida del plugin

1. **Instalación** — El administrador activa el plugin, lo que ejecuta `install.php`
2. **Configuración** — Los ajustes se definen y gestionan a través del panel de administración; se almacenan en `access_url_rel_plugin` (admite multi-tenant)
3. **Ejecución** — El plugin inyecta contenido en las regiones de visualización o reacciona a eventos de la plataforma
4. **Desactivación** — El plugin se deshabilita, pero sus datos se conservan
5. **Desinstalación** — Ejecuta `uninstall.php` para limpiar datos y tablas

## Regiones de visualización

Los plugins inyectan HTML en 18 regiones predefinidas del frontend Vue sobrescribiendo `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Regiones disponibles: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integración con Symfony

### Event subscribers

Los archivos que terminan en `EventSubscriber.php` situados dentro de `src/EventSubscriber/` se registran automáticamente mediante `PluginEventSubscriberPass`. Implementan `EventSubscriberInterface` y reaccionan a los eventos definidos en `src/CoreBundle/Event/Events.php`.

Dado que la clase del plugin (`MyPluginPlugin`) no es un servicio de Symfony, no puede inyectarse por autowiring en el constructor del subscriber. Utilice en su lugar el singleton `create()`:

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

### Entidades Doctrine

Las entidades Doctrine situadas en `src/Entity/` se descubren automáticamente mediante `PluginEntityPass`. Utilice atributos de PHP 8 para el mapeo. El espacio de nombres debe seguir `Chamilo\PluginBundle\{PluginName}`. Use prefijos de nombre de tabla únicos (p. ej., `my_plugin_*`) para evitar colisiones.

### Servicio PluginHelper

Para acceder al estado de un plugin desde servicios Symfony del núcleo, inyecte `PluginHelper` en lugar de instanciar la clase del plugin de forma directa:

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

Métodos disponibles:

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Comprueba si un plugin está instalado y activo para la URL de acceso actual |
| `loadLegacyPlugin(string $name): ?object` | Instancia y devuelve el singleton del plugin |
| `getPluginSetting(string $name, string $key): mixed` | Lee el valor de un único ajuste del plugin |
| `getPluginOverrides(string $name): array` | Obtiene las anulaciones de `plugin.yaml` (valores predeterminados + específicas de la URL de acceso) de un plugin |

## Referencias de archivos del núcleo

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Clase base de plugin |
| `public/main/inc/lib/plugin.lib.php` | Gestor de plugins |
| `src/CoreBundle/Entity/Plugin.php` | Entidad Doctrine de plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Servicio PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes de eventos |
| `public/plugin/HelloWorld/` | Plugin de ejemplo mínimo |
| `public/plugin/TopLinks/` | Plugin de ejemplo sencillo |