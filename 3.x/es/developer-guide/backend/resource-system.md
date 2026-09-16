# Sistema de recursos

El sistema de recursos es uno de los conceptos arquitectónicos más importantes de Chamilo 3.0. Proporciona una abstracción unificada para todo el contenido del curso: documentos, ejercicios, itinerarios de aprendizaje, mensajes de foro y más.

## Concepto central

Cada elemento de contenido del curso se representa mediante un **ResourceNode**. Esto otorga a todos los tipos de contenido un conjunto común de capacidades:

* **Control de visibilidad** — Mostrar/ocultar a los alumnos
* **Control de acceso** — Los votantes de seguridad comprueban los permisos a través del ResourceNode
* **Almacenamiento de archivos** — Los archivos adjuntos se almacenan mediante ResourceFile
* **Estructura de árbol** — Los ResourceNode forman un árbol (relaciones padre-hijo)
* **Pista de auditoría** — Creador, fecha de creación, seguimiento de modificaciones

## Entidades clave

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

La entidad central. Cada entidad de contenido tiene una relación uno a uno con un ResourceNode.

Campos clave:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `uuid` | UUID v4 | Unique identifier for API use |
| `title` | string | Display title |
| `creator` | User | The user who created this resource |
| `resourceFile` | ResourceFile | The attached file (if any) |
| `resourceType` | ResourceType | The type of resource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent in the resource tree |
| `children` | Collection | Child ResourceNodes |
| `resourceLinks` | Collection | Visibility and access links |

El árbol utiliza la estrategia de **ruta materializada** de Gedmo para consultas jerárquicas eficientes.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Almacena los datos reales del archivo de un recurso:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `title` | string | Original filename |
| `mimeType` | string | MIME type |
| `originalName` | string | Original upload name |
| `size` | integer | File size in bytes |
| `crop` | string | Crop data (for images) |

El almacenamiento de archivos lo gestiona Flysystem, de modo que los archivos pueden estar en disco local, S3, Azure o GCS según la configuración.

### ResourceLink

Controla la visibilidad y el acceso por contexto. Hay 3 tipos principales de contexto:

1. Course
2. Session
3. Group (in a course)

Así, la entidad ResourceLink refleja la combinación de esos 3 tipos de contexto y establece una visibilidad para ese contexto completo:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Which course the resource belongs to |
| `session` | Session | Which session (null for base course) |
| `group` | CGroup | Which group (null for whole course) |
| `visibility` | integer | Visible, invisible, or deleted |

Esto permite que el mismo ResourceNode tenga distinta visibilidad en distintos contextos (p. ej., visible en una sesión pero oculto en otra).

Esto se establece automáticamente al usar la interfaz y decidir, por ejemplo, que un recurso es específico de una sesión, visible para todos los grupos de un curso dado en una sesión dada, pero invisible en el curso base o en otra sesión.

Por defecto, los recursos visibles en un curso base también son visibles en todas las sesiones de ese curso, pero el tutor del curso puede decidir ocultar un recurso de una sesión concreta. En ese caso, se recuperará la visibilidad específica de este recurso en esta sesión y se verá que tiene una visibilidad de 0, de modo que el elemento no aparecerá a los alumnos en esta sesión, mientras que la ausencia de visibilidad específica de sesión en otras sesiones hará que el recurso use la visibilidad del curso base (y el recurso se mostrará a los alumnos).

## Integración con API Platform

ResourceNode se expone como un recurso de API Platform con seguridad:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Cómo se conectan las entidades de contenido

Las entidades de contenido del curso (CDocument, CQuiz, CLp, etc.) extienden `AbstractResource` o implementan `ResourceInterface`, lo que les otorga una relación `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Cuando se crea un CDocument, se crea automáticamente un ResourceNode junto a él, lo que proporciona una gestión unificada de recursos.

## Implicaciones prácticas

Al trabajar con contenido del curso:

1. **Crear contenido** — Crear tanto la entidad de contenido COMO su ResourceNode
2. **Comprobar permisos** — Usar los votantes de seguridad del ResourceNode
3. **Gestionar archivos** — Adjuntar archivos a través de ResourceFile
4. **Controlar la visibilidad** — Crear/modificar ResourceLinks
5. **Construir árboles** — Usar la relación padre-hijo en ResourceNode para estructuras de carpetas (p. ej., carpetas de documentos)