# Acciones Personalizadas

Más allá de las operaciones CRUD estándar, Chamilo cuenta con una serie de controladores de acciones API personalizadas (en el orden de docenas) que manejan operaciones especializadas. El número exacto varía entre versiones; consulta `src/CoreBundle/Controller/Api/` para ver el conjunto actual.

## Ubicación

Las acciones personalizadas se encuentran en `src/CoreBundle/Controller/Api/`.

## Acciones Personalizadas Destacadas

### Documentos

| Controlador | Propósito |
|-----------|---------|
| `CreateDocumentFileAction` | Subir un archivo o crear una carpeta/enlace de documento |
| `UpdateDocumentFileAction` | Reemplazar el archivo de un documento |
| `ReplaceDocumentFileAction` | Reemplazar un archivo de documento, preservando sus IDs |
| `MoveDocumentAction` | Mover un documento a una carpeta diferente |
| `UpdateVisibilityDocument` | Alternar la visibilidad del documento para los estudiantes |
| `DownloadAllDocumentsAction` | Descargar todos los documentos de una carpeta como ZIP |
| `DownloadSelectedDocumentsAction` | Descargar un conjunto seleccionado de documentos como ZIP |
| `DocumentUsageAction` | Listar cursos/sesiones donde se utiliza un documento |
| `DocumentLearningPathUsageAction` | Listar rutas de aprendizaje donde se utiliza un documento |

### Glosario

| Controlador | Propósito |
|-----------|---------|
| `CreateCGlossaryAction` | Crear un término de glosario |
| `UpdateCGlossaryAction` | Actualizar un término de glosario |
| `ExportCGlossaryAction` | Exportar glosario a un archivo |
| `ImportCGlossaryAction` | Importar glosario desde un archivo |
| `ExportGlossaryToDocumentsAction` | Exportar glosario como un documento en el curso |
| `GetGlossaryCollectionController` | Obtener colección de glosario con filtrado personalizado |

### Enlaces

| Controlador | Propósito |
|-----------|---------|
| `CreateCLinkAction` | Crear un enlace externo |
| `UpdateCLinkAction` | Actualizar un enlace externo |
| `CreateCLinkCategoryAction` | Crear una categoría de enlace |
| `UpdateCLinkCategoryAction` | Actualizar una categoría de enlace |
| `CheckCLinkAction` | Verificar si la URL de un enlace es accesible |
| `ExportCLinksAction` | Exportar enlaces a un archivo |
| `CLinkDetailsController` | Obtener detalles de un enlace |
| `CLinkImageController` | Obtener o establecer una imagen de vista previa de un enlace |
| `GetLinksCollectionController` | Obtener colección de enlaces con filtrado personalizado |
| `UpdateVisibilityLink` | Alternar la visibilidad de un enlace |
| `UpdateVisibilityLinkCategory` | Alternar la visibilidad de una categoría de enlace |
| `UpdatePositionLink` | Reordenar enlaces |

### Rutas de Aprendizaje

| Controlador | Propósito |
|-----------|---------|
| `CreateCLpAction` | Crear una ruta de aprendizaje |
| `LpReorderController` | Reordenar elementos de una ruta de aprendizaje |

### Calendario

| Controlador | Propósito |
|-----------|---------|
| `UpdateCCalendarEventAction` | Actualizar un evento del calendario del curso |
| `CalendarMyStudentsScheduleAction` | Obtener el horario de los estudiantes de un profesor |

### Blog

| Controlador | Propósito |
|-----------|---------|
| `CreateCBlogAction` | Crear una publicación de blog |
| `CreateBlogAttachmentAction` | Adjuntar un archivo a una publicación de blog |
| `UpdateVisibilityBlog` | Alternar la visibilidad del blog |

### Dropbox

| Controlador | Propósito |
|-----------|---------|
| `CreateDropboxFileAction` | Subir un archivo a la dropbox (herramienta de intercambio de archivos) |

### Trabajos de Estudiantes (Tareas)

| Controlador | Propósito |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Enviar un archivo de tarea |
| `CreateStudentPublicationCommentAction` | Agregar un comentario a una entrega |
| `CreateStudentPublicationCorrectionFileAction` | Subir un archivo de corrección para una entrega |

### Archivos Personales

| Controlador | Propósito |
|-----------|---------|
| `CreatePersonalFileAction` | Subir un archivo al espacio de archivos personales del usuario |
| `UpdatePersonalFileAction` | Actualizar un archivo personal |

### Social

| Controlador | Propósito |
|-----------|---------|
| `LikeSocialPostController` | Dar "Me gusta" a una publicación social |
| `DislikeSocialPostController` | Quitar "Me gusta" a una publicación social |
| `CreateSocialPostAttachmentAction` | Adjuntar un archivo a una publicación social |
| `SocialPostAttachmentsController` | Listar adjuntos en una publicación social |
| `AbstractFeedbackSocialPostController` | Clase base para acciones de retroalimentación en publicaciones sociales |

### Sesiones

| Controlador | Propósito |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Crear una sesión e inscribir usuarios y cursos en una sola llamada |

### Usuarios y URLs de Acceso

| Controlador | Propósito |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Crear un usuario y asociarlo con una URL de acceso |
| `UserAccessUrlsController` | Listar URLs de acceso a las que pertenece un usuario |
| `UserSkillsController` | Listar habilidades otorgadas a un usuario |

### Videoconferencia

| Controlador | Propósito |
|-----------|---------|
| `VideoConferenceCallbackController` | Manejar callbacks de proveedores externos de videoconferencia |

### Clases Base

| Clase | Propósito |
|-------|---------|
| `BaseResourceFileAction` | Clase base para acciones de carga de archivos; maneja el análisis multipart, la creación de nodos de recursos y el almacenamiento |

---
## Implementación de una Acción Personalizada

Las acciones personalizadas son controladores estándar de Symfony referenciados en las definiciones de operaciones de API Platform. El atributo `#[ApiResource]` reside en la **entidad**, y el parámetro `controller:` de cada operación apunta a la clase de acción:

```php
// En la clase de la entidad (por ejemplo, src/CourseBundle/Entity/CDocument.php):
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

La clase de acción en sí es un controlador invocable simple — los servicios se inyectan a través de los argumentos del método `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... otros servicios inyectados
    ): CDocument {
        // Manejar la carga y devolver la entidad
    }
}
```

Puntos clave:
- `deserialize: false` se establece cuando la acción lee la solicitud directamente (por ejemplo, cargas de archivos multipart) en lugar de permitir que API Platform deserialice un cuerpo JSON.
- Las acciones de carga de archivos generalmente extienden `BaseResourceFileAction`, que maneja el análisis multipart y la conexión de nodos de recursos.
- La seguridad se aplica a través del parámetro `security:` en la operación, no dentro del controlador.