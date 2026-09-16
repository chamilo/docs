# Creación de un Plugin

Esta guía explica cómo crear un plugin básico para Chamilo. Para más detalles, consulta la [página del wiki sobre desarrollo de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Paso 1: Crear el Directorio del Plugin

Crea un directorio en `public/plugin/`. El nombre del directorio debe coincidir con el identificador de tu plugin:

```
public/plugin/MyPlugin/
```

## Paso 2: Definir la Clase del Plugin

Crea `src/MyPluginPlugin.php`. La clase extiende `Plugin` y sigue el patrón singleton:

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

### Tipos de Configuración Disponibles

| Tipo       | Descripción                     |
|------------|---------------------------------|
| `boolean`  | Casilla de verificación on/off |
| `text`     | Entrada de texto de una línea  |
| `select`   | Menú desplegable (proporciona un arreglo `options`) |
| `wysiwyg`  | Editor de texto enriquecido    |
| `html`     | Campo de HTML sin procesar     |
| `checkbox` | Casilla de verificación        |
| `user`     | Selector de usuario            |

Para configuraciones de tipo `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Accede a las configuraciones en tiempo de ejecución:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // valor único
$all  = $plugin->get_settings();       // todas las configuraciones
```

## Paso 3: Crear plugin.php

El archivo `plugin.php` en la raíz del plugin es **obligatorio**. Debe asignar `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Paso 4: Crear Scripts de Instalación y Desinstalación

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

Implementa la creación/eliminación del esquema real dentro de la clase usando `SchemaTool` de Doctrine.

## Paso 5: Añadir Traducciones

Crea archivos de idioma en `lang/` usando códigos de locale (por ejemplo, `en_US.php`, `fr_FR.php`, `es_ES.php`). El archivo de respaldo es `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Accede a las traducciones mediante `$plugin->get_lang('key')`.

## Paso 6: Inyectar Contenido mediante Regiones de Visualización

Los plugins pueden inyectar HTML en 18 regiones predefinidas del frontend de Vue. Sobrescribe `renderRegion()` en tu clase:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Las regiones disponibles incluyen: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Paso 7: Reaccionar a Eventos de la Plataforma (Opcional)

Los plugins pueden reaccionar a eventos de la plataforma usando suscriptores de eventos de Symfony. Crea un archivo que termine en `EventSubscriber.php` dentro de `src/EventSubscriber/` — se registra automáticamente mediante `PluginEventSubscriberPass`.

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
        // Las clases de plugins no son servicios de Symfony — usa el singleton create().
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
        // tu lógica aquí
    }
}
```

Consulta `src/CoreBundle/Event/Events.php` para ver la lista completa de eventos disponibles (usuario, curso, sesión, LP, ejercicio, portafolio, autenticación y más).

## Paso 8: Ganchos del Ciclo de Vida

Sobrescribe estos métodos en tu clase de plugin para responder a las acciones de la plataforma:

| Método | Se activa cuando |
|--------|------------------|
| `install()` | El plugin es activado |
| `uninstall()` | El plugin es eliminado |
| `performActionsAfterConfigure()` | El administrador guarda el formulario de configuración |
| `course_settings_updated(array $values)` | Cambian los ajustes a nivel de curso |
| `validateCourseSetting(string $variable)` | Se guarda un ajuste de curso (devuelve `false` para rechazar) |
| `doWhenDeletingUser(int $userId)` | Se elimina un usuario |
| `doWhenDeletingCourse(int $courseId)` | Se elimina un curso |
| `doWhenDeletingSession(int $sessionId)` | Se elimina una sesión |

## Paso 9: Activar

Inicia sesión como administrador, navega a **Gestionar plugins**, encuentra tu plugin y haz clic en **Activar**.

## Consejos

* **Sigue los plugins existentes como ejemplos** — `public/plugin/HelloWorld/` y `public/plugin/TopLinks/` son buenas referencias simples
* **Usa traducciones** — Siempre utiliza el sistema `lang/` para los textos visibles al usuario
* **Limpia al desinstalar** — Elimina tablas de base de datos y configuraciones en el script de desinstalación
* **Verifica el estado de habilitación** — En los suscriptores de eventos, siempre llama a `$this->plugin->isEnabled()` antes de ejecutar la lógica