# Acciones personalizadas

Más allá de las operaciones CRUD estándar, Chamilo dispone de un número de controladores de acciones de API personalizadas (del orden de decenas) que gestionan operaciones especializadas. El recuento exacto varía entre versiones: enumere `src/CoreBundle/Controller/Api/` para obtener el conjunto actual.

## Ubicación

Las acciones personalizadas se encuentran en `src/CoreBundle/Controller/Api/`.

## Acciones personalizadas destacadas

### Documentos

| Controlador | Propósito |
|-----------|---------|
| `CreateDocumentFileAction` | Cargar un archivo o crear un documento de carpeta o de enlace |
| `UpdateDocumentFileAction` | Sustituir el archivo de un documento |
| `ReplaceDocumentFileAction` | Sustituir el archivo de un documento, conservando sus ID |
| `MoveDocumentAction` | Mover un documento a otra carpeta |
| `UpdateVisibilityDocument` | Alternar la visibilidad del documento para los estudiantes |
| `DownloadAllDocumentsAction` | Descargar todos los documentos de una carpeta como ZIP |
| `DownloadSelectedDocumentsAction` | Descargar un conjunto seleccionado de documentos como ZIP |
| `DocumentUsageAction` | Enumerar los cursos y las sesiones en los que se utiliza un documento |
| `DocumentLearningPathUsageAction` | Enumerar las rutas de aprendizaje en las que se utiliza un documento |

### Glosario

| Controlador | Propósito |
|-----------|---------|
| `CreateCGlossaryAction` | Crear un término del glosario |
| `UpdateCGlossaryAction` | Actualizar un término del glosario |
| `ExportCGlossaryAction` | Exportar el glosario a un archivo |
| `ImportCGlossaryAction` | Importar el glosario desde un archivo |
| `ExportGlossaryToDocumentsAction` | Exportar el glosario como documento del curso |
| `GetGlossaryCollectionController` | Obtener la colección del glosario con filtrado personalizado |

### Enlaces

| Controlador | Propósito |
|-----------|---------|
| `CreateCLinkAction` | Crear un enlace externo |
| `UpdateCLinkAction` | Actualizar un enlace externo |
| `CreateCLinkCategoryAction` | Crear una categoría de enlaces |
| `UpdateCLinkCategoryAction` | Actualizar una categoría de enlaces |
| `CheckCLinkAction` | Comprobar si la URL de un enlace es accesible |
| `ExportCLinksAction` | Exportar los enlaces a un archivo |
| `CLinkDetailsController` | Obtener los detalles del enlace |
| `CLinkImageController` | Obtener o establecer la imagen de vista previa de un enlace |
| `GetLinksCollectionController` | Obtener la colección de enlaces con filtrado personalizado |
| `UpdateVisibilityLink` | Alternar la visibilidad del enlace |
| `UpdateVisibilityLinkCategory` | Alternar la visibilidad de la categoría de enlaces |
| `UpdatePositionLink` | Reordenar los enlaces |

### Rutas de aprendizaje

| Controlador | Propósito |
|-----------|---------|
| `CreateCLpAction` | Crear una ruta de aprendizaje |
| `LpReorderController` | Reordenar los elementos de una ruta de aprendizaje |

### Calendario

| Controlador | Propósito |
|-----------|---------|
| `UpdateCCalendarEventAction` | Actualizar un evento del calendario del curso |
| `CalendarMyStudentsScheduleAction` | Obtener el horario de los estudiantes de un profesor |

### Blog

| Controlador | Propósito |
|-----------|---------|
| `CreateCBlogAction` | Crear una entrada de blog |
| `CreateBlogAttachmentAction` | Adjuntar un archivo a una entrada de blog |
| `UpdateVisibilityBlog` | Alternar la visibilidad del blog |

### Dropbox

| Controlador | Propósito |
|-----------|---------|
| `CreateDropboxFileAction` | Cargar un archivo en el dropbox (herramienta de intercambio de archivos) |

### Trabajos de estudiantes (tareas)

| Controlador | Propósito |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Entregar un archivo de tarea |
| `CreateStudentPublicationCommentAction` | Añadir un comentario a una entrega |
| `CreateStudentPublicationCorrectionFileAction` | Cargar un archivo de corrección para una entrega |

### Archivos personales

| Controlador | Propósito |
|-----------|---------|
| `CreatePersonalFileAction` | Cargar un archivo en el espacio de archivos personales del usuario |
| `UpdatePersonalFileAction` | Actualizar un archivo personal |

### Social

| Controlador | Propósito |
|-----------|---------|
| `LikeSocialPostController` | Indicar que gusta una publicación social |
| `DislikeSocialPostController` | Quitar el me gusta de una publicación social |
| `CreateSocialPostAttachmentAction` | Adjuntar un archivo a una publicación social |
| `SocialPostAttachmentsController` | Enumerar los adjuntos de una publicación social |
| `AbstractFeedbackSocialPostController` | Clase base para las acciones de retroalimentación de publicaciones sociales |

### Sesiones

| Controlador | Propósito |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Crear una sesión e inscribir usuarios y cursos en una sola llamada |
| `SessionDuplicateProcessor` (`POST /api/sessions/{id}/duplicate`) | Crear una sesión a partir de una sesión modelo — véase [Duplicación de sesiones](session-duplication.md) |

### Usuarios y URL de acceso

| Controlador | Propósito |
|-----------|---------|
| `CreateUserOnAccessUrlAction` (`POST /api/access_urls/{id}/user`) | Crear un usuario y asociarlo a una URL de acceso — véase [Creación de usuarios](user-creation.md) |
| `UserAccessUrlsController` | Enumerar las URL de acceso a las que pertenece un usuario |
| `UserSkillsController` | Enumerar las competencias otorgadas a un usuario |

### Videoconferencia

| Controlador | Propósito |
|-----------|---------|
| `VideoConferenceCallbackController` | Gestionar los callbacks de proveedores externos de videoconferencia |

### Clases base

| Clase | Propósito |
|-------|---------|
| `BaseResourceFileAction` | Clase base para acciones de carga de archivos; gestiona el análisis multipart, la creación del nodo de recurso y el almacenamiento |

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
- `deserialize: false` se establece cuando la acción lee la petición directamente (por ejemplo, cargas de archivos multipart) en lugar de dejar que API Platform deserialice un cuerpo JSON.
- Las acciones de carga de archivos suelen extender `BaseResourceFileAction`, que gestiona el análisis multipart y la conexión del nodo de recurso.
- La seguridad se aplica mediante el parámetro `security:` de la operación, no dentro del controlador.