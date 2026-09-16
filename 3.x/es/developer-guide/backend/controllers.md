# Controladores

Chamilo 3.0 utiliza un gran número de controladores (del orden de decenas) organizados a lo largo de los bundles. El recuento exacto varía de una versión a otra: trate los nombres siguientes como ilustrativos, no exhaustivos.

## Tipos de controladores

### Controladores de administración

Ubicados en `src/CoreBundle/Controller/Admin/`. Gestionan la administración de la plataforma:

* `AdminController` — Panel de control, información de archivos, prueba de correo electrónico
* `UserListController` — CRUD de usuarios
* `CourseListController` — Gestión de cursos
* `SessionAdminController` — Gestión de sesiones
* `SettingsController` — Configuración de la plataforma
* `SecurityController` — Intentos de inicio de sesión, eventos IDS
* `PluginsController` — Gestión de plugins
* `RoomController` — Gestión de aulas

### Controladores de acciones de API

Acciones personalizadas de API Platform en `src/CoreBundle/Controller/Api/`:

Estas extienden el CRUD integrado de API Platform con lógica de negocio personalizada. Ejemplos:

* `CreateDocumentFileAction` — Carga de archivos para documentos
* `CreateStudentPublicationFileAction` — Carga de entrega de tareas
* `UpdateVisibilityDocument` — Alternar la visibilidad de un documento
* `ExportCGlossaryAction` — Exportar glosario
* `MoveDocumentAction` — Mover un documento a otra carpeta

Para operaciones de lectura/escritura que no necesitan un controlador HTTP dedicado — es decir, cuando solo se desea cambiar *cómo* se obtiene o persiste un elemento o una colección — prefiera un **State Provider** o un **State Processor** (véase más adelante). Los controladores de acciones de API se reservan mejor para endpoints que realmente necesitan lógica a nivel de petición (cargas de archivos, formatos de respuesta personalizados, flujos de varios pasos).

### Controlador de IA

`src/CoreBundle/Controller/AiController.php` es el punto de entrada para los endpoints relacionados con IA (generación de preguntas Aiken, generación de itinerarios de aprendizaje, generación de imagen/vídeo, calificación de respuestas abiertas, análisis de documentos…). El conjunto exacto de rutas evoluciona con rapidez: consulte los atributos `#[Route]` del controlador para la lista actual en lugar de basarse en una copia aquí.

### Controlador de chat

`src/CoreBundle/Controller/ChatController.php` gestiona el chat en tiempo real y el tutor de IA:

* Mensajería de usuario a usuario
* Chat del tutor de IA (panel de chat acoplado)
* Historial de mensajes y sondeo (polling)

## State Providers y Processors de API Platform

No todos los endpoints de API están respaldados por un controlador. API Platform 4 divide el trabajo entre dos interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — devuelven datos para operaciones `GET` (un único elemento o una colección).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — gestionan las escrituras para operaciones `POST`, `PUT`, `PATCH` y `DELETE`.

Las implementaciones de Chamilo viven en `src/CoreBundle/State/` (unas 35+ clases). Se vinculan a las entidades mediante los argumentos `provider:` y `processor:` de las operaciones `#[ApiResource]`, no mediante rutas.

### Cuándo utilizarlos

Recurra a un provider/processor — en lugar de un controlador de acciones de API — cuando:

* El endpoint sigue la forma REST estándar (listar / leer / crear / actualizar / eliminar) pero necesita ensamblado de datos o lógica de persistencia personalizados.
* Necesita filtrar, desnormalizar o enriquecer el resultado de la lectura de una colección o de un elemento (p. ej. respetando la Access URL actual, el contexto del curso o las reglas de visibilidad).
* Necesita ejecutar efectos secundarios en la escritura (registros de auditoría, generación de archivos, actualizaciones de entidades relacionadas) manteniendo el pipeline de normalización, validación y paginación de API Platform.
* Desea que la operación sea descubrible en el esquema OpenAPI / Hydra sin registrar una ruta personalizada.

Si el endpoint, en cambio, necesita acceso directo a `Request`, devuelve una carga útil que no es un recurso (descarga de archivo, CSV, redirección) u orquesta un flujo de varios pasos, un controlador de acciones de API en `src/CoreBundle/Controller/Api/` encaja mejor.

### Vinculación en la entidad

Referencie la clase en la operación:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Ejemplo de provider

`src/CoreBundle/State/DocumentProvider.php` resuelve un `CDocument` por variable de URI y lanza `NotFoundHttpException` cuando falta:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

### Ejemplo de processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega en el `persistProcessor` de Doctrine por defecto y, a continuación, ejecuta efectos secundarios (genera un archivo CSS en el sistema de archivos Flysystem de temas y vincula el tema a la Access URL actual):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Patrones que conviene conocer

* **Componer con el processor por defecto.** Decore `ProcessorInterface $persistProcessor` (el integrado de Doctrine) para que la lógica específica de Chamilo se ejecute *alrededor* de la persistencia estándar, no en su lugar.
* **Los collection providers gestionan su propia paginación.** Cuando un collection provider construye una consulta personalizada, debe respetar `?page`, `?itemsPerPage` y los filtros de búsqueda: el paginador automático de API Platform solo entra en juego con el collection provider de Doctrine por defecto.
* **Es habitual una clase por recurso y tipo de operación**, pero un provider puede atender varias operaciones (véase `UsergroupStateProvider`, reutilizado en cuatro operaciones sobre `Usergroup`).
* **Convención de nomenclatura**: `<Entity>StateProvider` / `<Entity>StateProcessor` para manejadores a nivel de recurso; `<Entity><Action>Processor` (p. ej. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) para operaciones más específicas.

## Enrutamiento

Los controladores usan **atributos de PHP 8** para las definiciones de rutas:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Los recursos de API Platform usan atributos `#[ApiResource]` en las entidades, con operaciones personalizadas que apuntan a acciones de controlador.

## Traits

Los controladores usan traits compartidos para funcionalidad común:

* `ControllerTrait` — Acceso a ajustes, serializador y servicios comunes
* `CourseControllerTrait` — Ayudantes de contexto de curso
* `ResourceControllerTrait` — Operaciones de nodos de recurso