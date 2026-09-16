# Arquitectura de Plugins

## Ubicación de los Plugins

Los plugins se almacenan en `public/plugin/`. Cada plugin tiene su propio directorio:

```
public/plugin/
├── Bbb/                    # Integración con BigBlueButton
├── Zoom/                   # Integración con Zoom
├── Onlyoffice/             # Edición de documentos con OnlyOffice
├── XApi/                   # xAPI/Tin Can
├── ...                     # los plugins incluidos se encuentran en public/plugin/
```

## Estructura de un Plugin

Un directorio típico de un plugin contiene:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUERIDO — asigna $plugin_info
├── install.php             # Script de instalación
├── uninstall.php           # Script de desinstalación
├── index.php               # Punto de entrada para renderizado de regiones (si aplica)
├── admin.php               # Interfaz de administración (opcional)
├── lang/                   # Archivos de traducción (códigos de idioma: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Clase principal del plugin (extiende Plugin)
│   ├── Entity/                   # Entidades de Doctrine (detectadas automáticamente)
│   ├── Repository/               # Repositorios de Doctrine
│   └── EventSubscriber/          # Suscriptores de eventos de Symfony (registrados automáticamente)
├── templates/              # Plantillas Twig
└── resources/              # Recursos CSS/JS
```

## Clase del Plugin

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

### Propiedades Clave de la Clase

| Propiedad | Tipo | Efecto |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registra el plugin como una herramienta de curso |
| `$isAdminPlugin` | bool | Añade una página de interfaz de administración |
| `$isMailPlugin` | bool | Se integra con el sistema de correo |
| `$addCourseTool` | bool | Añade un ícono a la página principal del curso |
| `$course_settings` | array | Define campos de configuración por curso |

## Ciclo de Vida del Plugin

1. **Instalación** — El administrador activa el plugin, lo que ejecuta `install.php`
2. **Configuración** — Los ajustes se definen y gestionan a través del panel de administración; se almacenan en `access_url_rel_plugin` (soporta multi-tenant)
3. **Ejecución** — El plugin inyecta contenido en regiones de visualización o reacciona a eventos de la plataforma
4. **Desactivación** — El plugin se desactiva, pero sus datos se preservan
5. **Desinstalación** — Ejecuta `uninstall.php` para limpiar datos y tablas

## Regiones de Visualización

Los plugins inyectan HTML en 18 regiones predefinidas del frontend de Vue al sobrescribir `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Contenido del pie de página de My Plugin</p>';
}
```

Regiones disponibles: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integración con Symfony

### Suscriptores de Eventos

Los archivos que terminan en `EventSubscriber.php` ubicados dentro de `src/EventSubscriber/` se registran automáticamente mediante `PluginEventSubscriberPass`. Implementan `EventSubscriberInterface` y reaccionan a eventos definidos en `src/CoreBundle/Event/Events.php`.

Dado que la clase del plugin (`MyPluginPlugin`) no es un servicio de Symfony, no puede ser inyectada automáticamente en el constructor del suscriptor. En su lugar, usa el singleton `create()`:

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

### Entidades de Doctrine

Las entidades de Doctrine ubicadas en `src/Entity/` son detectadas automáticamente por `PluginEntityPass`. Usa atributos de PHP 8 para el mapeo. El espacio de nombres debe seguir `Chamilo\PluginBundle\{PluginName}`. Usa prefijos únicos para los nombres de las tablas (por ejemplo, `my_plugin_*`) para evitar colisiones.

### Servicio PluginHelper

Para acceder al estado de los complementos desde los servicios principales de Symfony, inyecta `PluginHelper` en lugar de instanciar directamente la clase del complemento:

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

| Método | Propósito |
|--------|-----------|
| `isPluginEnabled(string $name): bool` | Verifica si un complemento está instalado y activo para la URL de acceso actual |
| `loadLegacyPlugin(string $name): ?object` | Instancia y devuelve el singleton del complemento |
| `getPluginSetting(string $name, string $key): mixed` | Lee un valor de configuración específico de un complemento |
| `getPluginOverrides(string $name): array` | Obtiene las anulaciones de `plugin.yaml` (valores predeterminados + específicos de la URL de acceso) para un complemento |

## Referencias a Archivos Principales

| Archivo | Propósito |
|---------|-----------|
| `public/main/inc/lib/plugin.class.php` | Clase base de complementos |
| `public/main/inc/lib/plugin.lib.php` | Gestor de complementos |
| `src/CoreBundle/Entity/Plugin.php` | Entidad Doctrine de complementos |
| `src/CoreBundle/Helpers/PluginHelper.php` | Servicio PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes de eventos |
| `public/plugin/HelloWorld/` | Ejemplo mínimo de complemento |
| `public/plugin/TopLinks/` | Ejemplo sencillo de complemento |