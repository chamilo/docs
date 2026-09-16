# Creación de un plugin

Esta guía recorre la creación de un plugin básico de Chamilo. Para más detalle, consulte la [página wiki de desarrollo de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Paso 1: Crear el directorio del plugin

Cree un directorio en `public/plugin/`. El nombre del directorio debe coincidir con el identificador de su plugin:

```
public/plugin/MyPlugin/
```

## Paso 2: Definir la clase del plugin

Cree `src/MyPluginPlugin.php`. La clase extiende `Plugin` y sigue el patrón singleton:

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

### Tipos de ajustes disponibles

| Type | Description |
|------|-------------|
| `boolean` | Casilla de verificación activado/desactivado |
| `text` | Campo de texto de una sola línea |
| `select` | Lista desplegable (proporcione el array `options`) |
| `wysiwyg` | Editor de texto enriquecido |
| `html` | Campo HTML sin procesar |
| `checkbox` | Casilla de verificación |
| `user` | Selector de usuario |

Para ajustes de tipo `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Acceso a los ajustes en tiempo de ejecución:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Paso 3: Crear plugin.php

`plugin.php` en la raíz del plugin es **obligatorio**. Debe asignar `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Paso 4: Crear los scripts de instalación y desinstalación

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

Implemente la creación/eliminación real del esquema dentro de la clase utilizando `SchemaTool` de Doctrine.

## Paso 5: Añadir traducciones

Cree archivos de idioma en `lang/` usando códigos de locale (p. ej., `en_US.php`, `fr_FR.php`, `es.php`). El respaldo es `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Acceda a las traducciones mediante `$plugin->get_lang('key')`.

## Paso 6: Inyectar contenido mediante regiones de visualización

Los plugins pueden inyectar HTML en 18 regiones predefinidas de la interfaz. El mecanismo que renderiza una región depende de cuál sea:

* **`course_tool_plugin`** es la única región renderizada al sobrescribir `renderRegion(string $region): string` en la clase de su plugin. Se invoca (a través de `PluginRegionController`) solo para un plugin con ámbito de curso (`is_course_plugin`) mientras está abierta una página de curso:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **Las 16 regiones generales** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — se renderizan incluyendo el propio `index.php` del plugin, no `renderRegion()`. El framework establece `$plugin_info['current_region']` antes de incluir ese archivo, de modo que puede hacer `echo` del HTML directamente para esa región o declarar plantillas Twig para renderizar mediante `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` es un ejemplo completo y funcional: HelloWorld no sobrescribe `renderRegion()` en absoluto; cada región que rellena pasa por `index.php`.

* **`menu_administrator`** es un caso especial reservado para enlaces solo de administrador mostrados en el panel de administración heredado, no para los dos mecanismos anteriores. `Dashboard` y `CleanDeletedFiles` son plugins reales que lo utilizan.

Sea cual sea el mecanismo que use, un administrador debe activar la(s) región(es) para su plugin desde el botón **Regiones** situado junto a él en la página **Gestionar plugins** (véase [Paso 9](#step-9-activate)): un plugin no renderiza nada en una región que no se haya habilitado explícitamente allí.

## Paso 7: Reaccionar a eventos de la plataforma (opcional)

Los plugins pueden reaccionar a eventos de la plataforma mediante suscriptores de eventos de Symfony. Cree un archivo que termine en `EventSubscriber.php` dentro de `src/EventSubscriber/` — se registra automáticamente a través de `PluginEventSubscriberPass`.

Dos requisitos, o el suscriptor se omite en silencio: la clase debe estar en el **espacio de nombres global** (el pass la resuelve a partir del nombre del archivo), y debe ejecutar `composer dump-autoload` después de añadirla (`public/plugin` es una entrada de classmap). Compruebe el resultado con `php bin/console debug:event-dispatcher <event.name>`.

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

Consulte `src/CoreBundle/Event/Events.php` para la lista completa de eventos disponibles (usuario, curso, sesión, LP, ejercicio, portafolio, autenticación y más).

### Limpieza cuando se elimina un curso, una sesión o un usuario

Si su plugin almacena filas asociadas a un curso, una sesión o un usuario, suscríbase a `Events::COURSE_DELETED`, `Events::SESSION_DELETED` o `Events::USER_DELETED`. Esta es la única forma de limpiar — los antiguos métodos `doWhenDeleting*` ya no existen. A estos listeners se aplican tres reglas:

* **Actúe en `AbstractEvent::TYPE_PRE`** — el evento se dispara antes de que se elimine la fila, el único momento en que su clave foránea aún se resuelve y los datos siguen siendo legibles. `USER_DELETED` también se dispara como `TYPE_POST`, por lo que la comprobación no es opcional en ese caso.
* **Proteja por instalado, no por habilitado** — use `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Sus filas sobreviven a que el plugin se desactive, o a que esté habilitado solo en otra URL de acceso, y su clave foránea bloquea la eliminación de cualquier modo.
* **En `USER_DELETED`, compruebe `$event->isHardDelete()`** — una eliminación suave mantiene al usuario restaurable, por lo que sus datos deben sobrevivir.

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

El plugin `StudentFollowUp` es la referencia para usuarios; `Bbb`, `BuyCourses` y `EmbedRegistry` contienen los equivalentes de curso y sesión.

## Paso 8: Ganchos del ciclo de vida

Sobrescriba estos métodos en la clase de su plugin para responder a las acciones de la plataforma:

| Método | Se dispara cuando |
|--------|----------------|
| `install()` | Se activa el plugin |
| `uninstall()` | Se elimina el plugin |
| `performActionsAfterConfigure()` | El administrador guarda el formulario de configuración |
| `course_settings_updated(array $values)` | Cambian los ajustes a nivel de curso |
| `validateCourseSetting(string $variable)` | Se guarda un ajuste de curso (devuelva `false` para rechazarlo) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` y `doWhenDeletingSession()` se eliminaron, junto con el disparador `AppPlugin::performActionsWhenDeletingItem()` que los invocaba — sobrescribirlos ahora no hace nada. Use en su lugar los eventos de eliminación del [Paso 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Paso 9: Activar

Inicie sesión como administrador y vaya al bloque **Plataforma** del panel de administración, luego a **Plugins** — esto abre la página **Gestionar plugins**. Encuentre su plugin y haga clic en **Instalar**; una vez instalado, haga clic en **Habilitar** para activarlo (un plugin habilitado muestra un botón **Deshabilitar** en su lugar).

## Consejos

* **Siga plugins existentes como ejemplos** — `public/plugin/HelloWorld/` y `public/plugin/TopLinks/` son buenas referencias sencillas
* **Use traducciones** — Use siempre el sistema `lang/` para el texto visible al usuario
* **Limpie al desinstalar** — Elimine tablas de base de datos y ajustes en el script de desinstalación
* **Compruebe el estado habilitado** — En los suscriptores de eventos, llame a `$this->plugin->isEnabled()` antes de ejecutar la lógica. La excepción es la limpieza en la eliminación: proteja por instalado en su lugar, ya que las filas sobreviven a que el plugin se deshabilite