# Acciones personalizadas

Más allá de las operaciones CRUD estándar, Chamilo dispone de un número de controladores de acciones de API personalizadas (del orden de decenas) que gestionan operaciones especializadas. El recuento exacto varía entre versiones: consulte `src/CoreBundle/Controller/Api/` para el conjunto actual.

## Ubicación

Las acciones personalizadas se encuentran en `src/CoreBundle/Controller/Api/`.

## Acciones personalizadas destacadas

### Documentos

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Cargar un archivo o crear una carpeta/documento de enlace |
| `UpdateDocumentFileAction` | Sustituir el archivo de un documento |
| `ReplaceDocumentFileAction` | Sustituir el archivo de un documento, conservando sus identificadores |
| `MoveDocumentAction` | Mover un documento a otra carpeta |
| `UpdateVisibilityDocument` | Alternar la visibilidad del documento para los estudiantes |
| `DownloadAllDocumentsAction` | Descargar todos los documentos de una carpeta como ZIP |
| `DownloadSelectedDocumentsAction` | Descargar un conjunto seleccionado de documentos como ZIP |
| `DocumentUsageAction` | Listar cursos/sesiones en los que se usa un documento |
| `DocumentLearningPathUsageAction` | Listar itinerarios de aprendizaje en los que se usa un documento |

### Glosario

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Crear un término de glosario |
| `UpdateCGlossaryAction` | Actualizar un término de glosario |
| `ExportCGlossaryAction` | Exportar el glosario a un archivo |
| `ImportCGlossaryAction` | Importar el glosario desde un archivo |
| `ExportGlossaryToDocumentsAction` | Exportar el glosario como documento en el curso |
| `GetGlossaryCollectionController` | Obtener la colección de glosario con filtrado personalizado |

### Enlaces

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Crear un enlace externo |
| `UpdateCLinkAction` | Actualizar un enlace externo |
| `CreateCLinkCategoryAction` | Crear una categoría de enlaces |
| `UpdateCLinkCategoryAction` | Actualizar una categoría de enlaces |
| `CheckCLinkAction` | Comprobar si la URL de un enlace es accesible |
| `ExportCLinksAction` | Exportar enlaces a un archivo |
| `CLinkDetailsController` | Obtener los detalles de un enlace |
| `CLinkImageController` | Obtener o establecer la imagen de vista previa de un enlace |
| `GetLinksCollectionController` | Obtener la colección de enlaces con filtrado personalizado |
| `UpdateVisibilityLink` | Alternar la visibilidad del enlace |
| `UpdateVisibilityLinkCategory` | Alternar la visibilidad de la categoría de enlaces |
| `UpdatePositionLink` | Reordenar enlaces |

### Itinerarios de aprendizaje

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Crear un itinerario de aprendizaje |
| `LpReorderController` | Reordenar los elementos del itinerario de aprendizaje |

### Calendario

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Actualizar un evento del calendario del curso |
| `CalendarMyStudentsScheduleAction` | Obtener el horario de los estudiantes de un profesor |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Crear una entrada de blog |
| `CreateBlogAttachmentAction` | Adjuntar un archivo a una entrada de blog |
| `UpdateVisibilityBlog` | Alternar la visibilidad del blog |

### Buzón (Dropbox)

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Cargar un archivo al buzón (herramienta de intercambio de archivos) |

### Trabajos de estudiantes (tareas)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Entregar un archivo de tarea |
| `CreateStudentPublicationCommentAction` | Añadir un comentario a una entrega |
| `CreateStudentPublicationCorrectionFileAction` | Cargar un archivo de corrección para una entrega |

### Archivos personales

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Cargar un archivo al espacio de archivos personales del usuario |
| `UpdatePersonalFileAction` | Actualizar un archivo personal |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Dar «me gusta» a una publicación social |
| `DislikeSocialPostController` | Quitar el «me gusta» de una publicación social |
| `CreateSocialPostAttachmentAction` | Adjuntar un archivo a una publicación social |
| `SocialPostAttachmentsController` | Listar los adjuntos de una publicación social |
| `AbstractFeedbackSocialPostController` | Clase base para las acciones de retroalimentación de publicaciones sociales |

### Sesiones

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Crear una sesión e inscribir usuarios y cursos en una sola llamada |

### Usuarios y URL de acceso

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Crear un usuario y asociarlo a una URL de acceso |
| `UserAccessUrlsController` | Listar las URL de acceso a las que pertenece un usuario |
| `UserSkillsController` | Listar las competencias otorgadas a un usuario |

### Videoconferencia

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Gestionar las devoluciones de llamada de proveedores externos de videoconferencia |

### Clases base

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Clase base para acciones de carga de archivos; gestiona el análisis multipart, la creación de nodos de recurso y el almacenamiento |

## Implementación de una acción personalizada

Las acciones personalizadas son controladores estándar de Symfony referenciados en las definiciones de operaciones de API Platform. El atributo `#[ApiResource]` reside en la **entidad**, y el parámetro `controller:` de cada operación apunta a la clase de la acción:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

La propia clase de la acción es un controlador invocable sencillo: los servicios se inyectan mediante los argumentos del método `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Puntos clave:
- `deserialize: false` se establece cuando la acción lee la petición directamente (p. ej., cargas de archivos multipart) en lugar de dejar que API Platform deserialice un cuerpo JSON.
- Las acciones de carga de archivos suelen extender `BaseResourceFileAction`, que se encarga del análisis multipart y del cableado del nodo de recurso.
- La seguridad se aplica mediante el parámetro `security:` de la operación, no dentro del controlador.