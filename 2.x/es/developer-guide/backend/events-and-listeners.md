# Eventos y Oyentes

Chamilo utiliza el sistema de eventos de Symfony para la comunicación desacoplada entre componentes.

## Oyentes de Eventos

Chamilo utiliza dos ubicaciones para los oyentes:

* **`src/CoreBundle/EventListener/`** — Oyentes del kernel/HTTP de Symfony (solicitud, respuesta, excepción, inicio/cierre de sesión, acceso a cursos/sesiones, etc.). Ejemplos: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Oyentes de entidades de Doctrine asociados a entidades específicas. Ejemplos: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Elija la ubicación que coincida con lo que necesita reaccionar: los eventos del flujo HTTP van en `EventListener/`; los ganchos del ciclo de vida de las entidades van en `Entity/Listener/`.

## Suscriptores de Eventos

Ubicados en `src/CoreBundle/EventSubscriber/`:

Los suscriptores de eventos pueden escuchar múltiples eventos:

* **Suscriptores de seguridad** — Manejan eventos de inicio/cierre de sesión, rastrean intentos de inicio de sesión
* **Suscriptores de API** — Procesamiento previo/posterior para solicitudes de API
* **Suscriptores de Doctrine** — Reaccionan a eventos del ciclo de vida de las entidades

## Eventos del Ciclo de Vida de Doctrine

Las entidades utilizan `#[ORM\HasLifecycleCallbacks]` para eventos a nivel de base de datos:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creación de Oyentes Personalizados

Para agregar un comportamiento personalizado:

1. Cree una clase de oyente/suscriptor en el bundle correspondiente
2. Etiquétela como oyente o suscriptor de eventos en la configuración del servicio
3. Implemente el método de manejo

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Su lógica aquí
    }
}
```

## Eventos Clave

| Evento | Cuándo se dispara |
|-------|-------------------|
| `kernel.request` | Cada solicitud HTTP |
| `kernel.response` | Antes de enviar la respuesta HTTP |
| `security.interactive_login` | El usuario inicia sesión |
| `doctrine.prePersist` | Antes de que una entidad se guarde por primera vez |
| `doctrine.postUpdate` | Después de que una entidad se actualiza |

## Eventos Específicos de Chamilo

Estos eventos son despachados por el propio código de Chamilo y son los principales puntos de integración para los complementos. Las constantes están definidas en `Chamilo\CoreBundle\Event\Events`.

| Constante | Cadena de evento | Cuándo se dispara |
|----------|------------------|-------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Después de que se crea un curso |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Antes de que un usuario acceda a un curso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Antes de que un usuario se inscriba en un curso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Cuando un usuario intenta volver a suscribirse a una sesión |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Después de que se validan las credenciales de inicio de sesión |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Después de que se verifican condiciones adicionales de inicio de sesión |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Cuando se renderiza la barra de herramientas de la herramienta de documentos |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Cuando se renderizan los botones de acción por archivo |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Cuando se abre un documento para su visualización |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Cuando la página de informe de ejercicios renderiza sus enlaces de acción |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Después de que un estudiante envía un ejercicio |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Después de que se responde cada pregunta |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Después de que se crea una ruta de aprendizaje |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Cuando un estudiante abre un elemento de ruta de aprendizaje |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Después de que un estudiante completa una ruta de aprendizaje |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Cuando el panel de administración construye su lista de bloques |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Después de que se crea una cuenta de usuario |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Después de que se actualiza una cuenta de usuario |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Después de que se elimina una cuenta de usuario |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Después de que se crea un elemento de portafolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Cuando se formatea el cuerpo de una notificación |

## Ejemplo de Complemento: Agregar un Botón al Visor de Documentos

Esta sección explica cómo un complemento utiliza un suscriptor de eventos para insertar un botón en una página existente de Chamilo, sin necesidad de modificar el código principal.

### Escenario

Un complemento llamado **MyViewer** desea agregar un botón "Abrir en MyViewer" junto a cada documento en el gestor de archivos del curso. El evento relevante es `Events::DOCUMENT_ITEM_VIEW`, despachado por Chamilo cada vez que un documento está a punto de mostrarse, llevando la entidad `CDocument` y una lista mutable de enlaces.

### Estructura del directorio del complemento

```
public/plugin/MyViewer/
├── plugin.php                          # Declara $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Página de configuración del complemento
├── lang/                               # Cadenas de traducción
└── src/
    ├── MyViewerPlugin.php              # Clase principal del complemento (extiende Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Suscriptor de eventos
```

### Clase principal del complemento (`src/MyViewerPlugin.php`)

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

La clase base `Plugin` proporciona `isEnabled()`, `get($settingKey)` y ayudantes para instalar herramientas y configuraciones del curso. El patrón singleton (`static $instance`) es la convención estándar de Chamilo porque la clase del complemento también se instancia fuera del contenedor de Symfony (en páginas PHP heredadas).

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

`addLink()` agrega HTML al arreglo que la plantilla de vista de documentos de Chamilo renderiza junto con las acciones integradas de "Descargar" y "Vista previa". El suscriptor nunca modifica los archivos principales de Chamilo.

### Registro

No es necesario un registro manual de servicios. El archivo `config/services.yaml` de Chamilo habilita la bandera `autoconfigure` de Symfony de manera global, lo que etiqueta automáticamente cualquier clase que implemente `EventSubscriberInterface` como un `kernel.event_subscriber`. Siempre que el directorio del complemento esté cargado (a través del classmap de Composer o la carga automática PSR-4), Symfony detecta el suscriptor en la próxima limpieza de caché.

```bash
php bin/console cache:clear
```

### Cómo fluyen los datos del evento

```
Lista de documentos renderizada
        │
        ▼
Chamilo despacha DocumentItemViewEvent (lleva la entidad CDocument + links[] vacío)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → agrega enlace HTML
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → agrega botón "Editar"
        │   (cualquier número de complementos puede escuchar el mismo evento)
        ▼
La plantilla renderiza event->getLinks() junto con las acciones de archivo integradas
```

Varios complementos pueden suscribirse al mismo evento de manera independiente; cada uno agrega datos al conjunto compartido sin saber de los demás. El orden de ejecución sigue el sistema de prioridades de Symfony: pasa un entero de prioridad como segundo elemento de la tupla del manejador en `getSubscribedEvents()` si el orden es importante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // mayor = más temprano
    ];
}
```