# Sistema de Recursos

El sistema de recursos es uno de los conceptos arquitectónicos más importantes en Chamilo 2.0. Proporciona una abstracción unificada para todo el contenido del curso: documentos, ejercicios, rutas de aprendizaje, publicaciones en foros y más.

## Concepto Principal

Cada pieza de contenido del curso está representada por un **ResourceNode**. Esto otorga a todos los tipos de contenido un conjunto común de capacidades:

- **Control de visibilidad** — Mostrar/ocultar a los estudiantes
- **Control de acceso** — Los votantes de seguridad verifican permisos a través del ResourceNode
- **Almacenamiento de archivos** — Los archivos adjuntos se almacenan mediante ResourceFile
- **Estructura de árbol** — Los ResourceNodes forman un árbol (relaciones padre-hijo)
- **Registro de auditoría** — Creador, fecha de creación, seguimiento de modificaciones

## Entidades Clave

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

La entidad central. Cada entidad de contenido tiene una relación uno a uno con un ResourceNode.

Campos clave:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | integer | Clave primaria |
| `uuid` | UUID v4 | Identificador único para uso en API |
| `title` | string | Título visible |
| `creator` | User | El usuario que creó este recurso |
| `resourceFile` | ResourceFile | El archivo adjunto (si lo hay) |
| `resourceType` | ResourceType | El tipo de recurso (documento, cuestionario, etc.) |
| `parent` | ResourceNode | Padre en el árbol de recursos |
| `children` | Collection | ResourceNodes hijos |
| `resourceLinks` | Collection | Enlaces de visibilidad y acceso |

El árbol utiliza la estrategia de **materialized path** de Gedmo para consultas jerárquicas eficientes.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Almacena los datos reales del archivo para un recurso:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | integer | Clave primaria |
| `title` | string | Nombre de archivo original |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nombre original de la carga |
| `size` | integer | Tamaño del archivo en bytes |
| `crop` | string | Datos de recorte (para imágenes) |

El almacenamiento de archivos es manejado por Flysystem, por lo que los archivos pueden estar en disco local, S3, Azure o GCS dependiendo de la configuración.

### ResourceLink

Controla la visibilidad y el acceso por contexto. Hay 3 tipos principales de contexto:

1. Curso
2. Sesión
3. Grupo (en un curso)

Por lo tanto, la entidad ResourceLink refleja la combinación de esos 3 tipos de contexto y establece una visibilidad para ese contexto completo:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `course` | Course | A qué curso pertenece el recurso |
| `session` | Session | A qué sesión (nulo para curso base) |
| `group` | CGroup | A qué grupo (nulo para todo el curso) |
| `visibility` | integer | Visible, invisible o eliminado |

Esto permite que el mismo ResourceNode tenga diferente visibilidad en diferentes contextos (por ejemplo, visible en una sesión pero oculto en otra).

Esto se configura automáticamente al usar la interfaz y decidir, por ejemplo, que un recurso es específico de una sesión y será visible para todos los grupos en un curso dado en una sesión dada, pero invisible en el curso base o en otra sesión.

Por defecto, los recursos visibles en un curso base también son visibles en todas las sesiones de ese curso, pero el tutor del curso puede decidir ocultar un recurso de una sesión específica. En este caso, recuperaremos la visibilidad específica para este recurso en esta sesión y veremos que tiene una visibilidad de 0, por lo que el elemento no aparecerá a los estudiantes en esta sesión, mientras que la falta de visibilidad específica de sesión en otras sesiones hará que el recurso use la visibilidad del curso base (y el recurso se mostrará a los estudiantes).

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

## Cómo se Conectan las Entidades de Contenido

Las entidades de contenido del curso (CDocument, CQuiz, CLp, etc.) extienden `AbstractResource` o implementan `ResourceInterface`, lo que les otorga una relación `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Cuando creas un CDocument, se crea automáticamente un ResourceNode junto con él, proporcionando una gestión unificada de recursos.

## Implicaciones Prácticas

Al trabajar con contenido del curso:

1. **Crear contenido** — Crear tanto la entidad de contenido COMO su ResourceNode
2. **Verificar permisos** — Usar los votantes de seguridad del ResourceNode
3. **Gestionar archivos** — Adjuntar archivos a través de ResourceFile
4. **Controlar visibilidad** — Crear/modificar ResourceLinks
5. **Construir árboles** — Usar la relación padre-hijo en ResourceNode para estructuras de carpetas (por ejemplo, carpetas de documentos)