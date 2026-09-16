# Eventos y Listeners

Chamilo utiliza el sistema de eventos de Symfony para la comunicación desacoplada entre componentes.

## Event Listeners

Chamilo utiliza dos ubicaciones de listeners:

* **`src/CoreBundle/EventListener/`** — Listeners del kernel/HTTP de Symfony (request, response, exception, login/logout, acceso a curso/sesión, etc.). Ejemplos: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Listeners de entidades Doctrine asociados a entidades concretas. Ejemplos: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Elija la ubicación que coincida con aquello a lo que necesita reaccionar: los eventos del pipeline HTTP van en `EventListener/`; los ganchos del ciclo de vida de las entidades van en `Entity/Listener/`.

## Event Subscribers

Ubicados en `src/CoreBundle/EventSubscriber/`:

Los event subscribers pueden escuchar varios eventos:

* **Security subscribers** — Gestionan eventos de login/logout y registran intentos de inicio de sesión
* **API subscribers** — Pre/post procesamiento de peticiones API
* **Doctrine subscribers** — Reaccionan a eventos del ciclo de vida de las entidades

## Eventos del ciclo de vida de Doctrine

Las entidades utilizan `#[ORM\HasLifecycleCallbacks]` para eventos a nivel de base de datos:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creación de listeners personalizados

Para añadir comportamiento personalizado:

1. Cree una clase listener/subscriber en el bundle adecuado
2. Etiquétela como event listener o subscriber en la configuración de servicios
3. Implemente el método manejador

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Eventos clave

| Evento | Cuándo se dispara |
|-------|--------------|
| `kernel.request` | Cada petición HTTP |
| `kernel.response` | Antes de enviar la respuesta HTTP |
| `security.interactive_login` | El usuario inicia sesión |
| `doctrine.prePersist` | Antes de que una entidad se guarde por primera vez |
| `doctrine.postUpdate` | Después de que una entidad se actualice |

## Eventos específicos de Chamilo

Estos eventos los dispara el propio código de Chamilo y constituyen los principales puntos de integración para plugins. Las constantes se definen en `Chamilo\CoreBundle\Event\Events`.

| Constante | Cadena del evento | Cuándo se dispara |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Después de crear un curso |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Antes de que un usuario acceda a un curso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Antes de que un usuario se inscriba en un curso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Cuando un usuario intenta reinscribirse en una sesión |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Después de validar las credenciales de inicio de sesión |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Después de comprobar condiciones adicionales de inicio de sesión |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Cuando se renderiza la barra de herramientas de la herramienta de documentos |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Cuando se renderizan los botones de acción por archivo |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Cuando se abre un documento para su visualización |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Cuando la página de informe de ejercicios renderiza sus enlaces de acción |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Después de que un alumno envíe un ejercicio |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Después de responder cada pregunta |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Después de crear un itinerario de aprendizaje |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Cuando un alumno abre un elemento de un LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Después de que un alumno complete un itinerario de aprendizaje |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Cuando el panel de administración construye su lista de bloques |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Después de crear una cuenta de usuario |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Después de actualizar una cuenta de usuario |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Después de eliminar una cuenta de usuario |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Después de crear un elemento de portafolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Cuando se formatea el cuerpo de una notificación |

## Ejemplo de plugin: añadir un botón al visor de documentos

Esta sección explica cómo un plugin utiliza un event subscriber para inyectar un botón en una página existente de Chamilo, sin modificar el código del núcleo.

### Escenario

Un plugin llamado **MyViewer** desea añadir un botón «Abrir en MyViewer» junto a cada documento en el gestor de archivos del curso. El evento pertinente es `Events::DOCUMENT_ITEM_VIEW`, despachado por Chamilo cada vez que un documento está a punto de mostrarse, y que transporta la entidad `CDocument` y una lista mutable de enlaces.

### Estructura de directorios del plugin

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

### Clase principal del plugin (`src/MyViewerPlugin.php`)

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

La clase base `Plugin` proporciona `isEnabled()`, `get($settingKey)` y auxiliares para instalar herramientas de curso y ajustes. El patrón singleton (`static $instance`) es la convención estándar de Chamilo porque la clase del plugin también se instancia fuera del contenedor de Symfony (en páginas PHP heredadas).

### Suscriptor de eventos (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` añade HTML al array que la plantilla de vista de documentos de Chamilo renderiza junto a las acciones integradas «Descargar» y «Vista previa». El suscriptor nunca modifica archivos del núcleo de Chamilo.

### Registro

No se necesita registro manual de servicios. El archivo `config/services.yaml` de Chamilo activa de forma global el indicador `autoconfigure` de Symfony, que etiqueta automáticamente cualquier clase que implemente `EventSubscriberInterface` como `kernel.event_subscriber`. Siempre que el directorio del plugin esté cargado (mediante el classmap de Composer o el autoload PSR-4), Symfony detecta el suscriptor en el siguiente vaciado de caché.

```bash
php bin/console cache:clear
```

### Flujo de los datos del evento

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

Varios plugins pueden suscribirse al mismo evento de forma independiente; cada uno añade datos compartidos sin conocer a los demás. El orden de ejecución sigue el sistema de prioridades de Symfony: pase un entero de prioridad como segundo elemento de la tupla del manejador en `getSubscribedEvents()` si el orden importa:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```