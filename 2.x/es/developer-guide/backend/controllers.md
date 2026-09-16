# Controladores

Chamilo 2.0 utiliza una gran cantidad de controladores (en el orden de docenas) organizados en los diferentes bundles. El número exacto varía de versión en versión; considera los nombres a continuación como ilustrativos, no exhaustivos.

## Tipos de Controladores

### Controladores de Administración

Ubicados en `src/CoreBundle/Controller/Admin/`. Gestionan la administración de la plataforma:

* `AdminController` — Panel de control, información de archivos, pruebas de correo electrónico
* `UserListController` — CRUD de usuarios
* `CourseListController` — Gestión de cursos
* `SessionAdminController` — Gestión de sesiones
* `SettingsController` — Configuraciones de la plataforma
* `SecurityController` — Intentos de inicio de sesión, eventos de IDS
* `PluginsController` — Gestión de complementos
* `RoomController` — Gestión de salas

### Controladores de Acciones de API

Acciones personalizadas de API Platform en `src/CoreBundle/Controller/Api/`:

Estos extienden el CRUD integrado de API Platform con lógica de negocio personalizada. Ejemplos:

* `CreateDocumentFileAction` — Carga de archivos para documentos
* `CreateStudentPublicationFileAction` — Carga de entregas de tareas
* `UpdateVisibilityDocument` — Cambiar la visibilidad de un documento
* `ExportCGlossaryAction` — Exportar glosario
* `MoveDocumentAction` — Mover un documento a una carpeta diferente

Para operaciones de lectura/escritura que no necesitan un controlador HTTP dedicado, es decir, cuando solo deseas cambiar *cómo* se obtiene o persiste un elemento o colección, prefiere un **State Provider** o **State Processor** (ver más abajo). Los Controladores de Acciones de API se reservan mejor para endpoints que realmente necesitan lógica a nivel de solicitud (cargas de archivos, formatos de respuesta personalizados, flujos de varios pasos).

### Controlador de IA

`src/CoreBundle/Controller/AiController.php` es el punto de entrada para endpoints relacionados con IA (generación de preguntas Aiken, generación de rutas de aprendizaje, generación de imágenes/videos, calificación de respuestas abiertas, análisis de documentos...). El conjunto exacto de rutas evoluciona rápidamente; consulta los atributos `#[Route]` del controlador para obtener la lista actual en lugar de depender de una copia aquí.

### Controlador de Chat

`src/CoreBundle/Controller/ChatController.php` maneja el chat en tiempo real y el tutor de IA:

* Mensajería de usuario a usuario
* Chat con tutor de IA (panel de chat anclado)
* Historial de mensajes y sondeo

## Proveedores y Procesadores de Estado de API Platform

No todos los endpoints de API están respaldados por un controlador. API Platform 3 divide el trabajo entre dos interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — devuelven datos para operaciones `GET` (un solo elemento o una colección).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — manejan escrituras para operaciones `POST`, `PUT`, `PATCH` y `DELETE`.

Las implementaciones de Chamilo se encuentran en `src/CoreBundle/State/` (alrededor de 35+ clases). Están conectadas a las entidades a través de los argumentos `provider:` y `processor:` de las operaciones `#[ApiResource]` en lugar de mediante rutas.

### Cuándo usarlos

Opta por un proveedor/procesador, en lugar de un Controlador de Acciones de API, cuando:

* El endpoint sigue la forma estándar de REST (listar / leer / crear / actualizar / eliminar) pero necesita lógica personalizada de ensamblaje o persistencia de datos.
* Necesitas filtrar, desnormalizar o enriquecer el resultado de una colección o lectura de elementos (por ejemplo, respetando la URL de acceso actual, el contexto del curso o las reglas de visibilidad).
* Necesitas ejecutar efectos secundarios en la escritura (registros de auditoría, generación de archivos, actualizaciones de entidades relacionadas) mientras mantienes la normalización, validación y pipeline de paginación de API Platform.
* Deseas que la operación sea detectable en el esquema OpenAPI / Hydra sin registrar una ruta personalizada.

Si el endpoint, en cambio, necesita acceso directo a `Request`, devuelve una carga útil que no es un recurso (descarga de archivo, CSV, redirección) o coordina un flujo de varios pasos, un Controlador de Acciones de API en `src/CoreBundle/Controller/Api/` es una mejor opción.

### Conexión en la entidad

Referencia la clase en la operación:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Ejemplo de Proveedor

`src/CoreBundle/State/DocumentProvider.php` resuelve un `CDocument` por variable URI y lanza `NotFoundHttpException` cuando no se encuentra:

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

---
### Ejemplo de procesador

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega al procesador predeterminado de Doctrine `persistProcessor`, y luego ejecuta efectos secundarios (genera un archivo CSS en el sistema de archivos Flysystem de temas, vincula el tema a la URL de acceso actual):

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

### Patrones a conocer

* **Componer con el procesador predeterminado.** Decora `ProcessorInterface $persistProcessor` (el integrado de Doctrine) para que la lógica específica de Chamilo se ejecute *alrededor* de la persistencia estándar, no en lugar de ella.
* **Los proveedores de colecciones manejan su propia paginación.** Cuando un proveedor de colecciones construye una consulta personalizada, debe respetar `?page`, `?itemsPerPage` y los filtros de búsqueda — el paginador automático de API Platform solo se activa para el proveedor de colecciones predeterminado de Doctrine.
* **Una clase por recurso + tipo de operación es común**, pero un proveedor puede servir varias operaciones (ver `UsergroupStateProvider`, reutilizado en cuatro operaciones sobre `Usergroup`).
* **Convención de nomenclatura**: `<Entity>StateProvider` / `<Entity>StateProcessor` para manejadores de recursos completos; `<Entity><Action>Processor` (por ejemplo, `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) para operaciones más específicas.

## Enrutamiento

Los controladores utilizan **atributos de PHP 8** para definiciones de rutas:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Los recursos de API Platform utilizan atributos `#[ApiResource]` en las entidades, con operaciones personalizadas que apuntan a acciones de controladores.

## Traits

Los controladores utilizan traits compartidos para funcionalidades comunes:

* `ControllerTrait` — Acceso a configuraciones, serializador y servicios comunes
* `CourseControllerTrait` — Ayudantes de contexto de curso
* `ResourceControllerTrait` — Operaciones de nodos de recursos