# Entidades y Doctrine

Chamilo 2.0 cuenta con 314 entidades de Doctrine distribuidas en dos bundles. A continuación, se mencionan solo las principales.

## Organización de Entidades

### Entidades de CoreBundle (213)

Entidades a nivel de plataforma:

| Categoría | Ejemplos |
|-----------|----------|
| **Usuarios** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursos** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sesiones** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Recursos** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Configuraciones** | `SettingsCurrent`, `SettingsOptions` |
| **Mensajes** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Seguimiento** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Habilidades** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **IA** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entidades de CourseBundle (101)

Entidades de contenido de curso — todas con el prefijo `C`:

| Categoría | Ejemplos |
|-----------|----------|
| **Documentos** | `CDocument` |
| **Ejercicios** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Rutas de aprendizaje** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Foros** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Tareas** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Encuestas** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Asistencia** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Otros** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convención de Nomenclatura

* Entidades de CoreBundle: estándar PascalCase (por ejemplo, `User`, `Course`, `Session`)
* Entidades de CourseBundle: con prefijo `C` (por ejemplo, `CDocument`, `CQuiz`, `CLp`)

Este prefijo distingue las entidades de contenido específicas de un curso de las entidades a nivel de plataforma (en línea con la nomenclatura de tablas de base de datos heredadas). Esta distinción podría desaparecer a largo plazo a medida que más herramientas se conviertan en herramientas globales sin un vínculo fuerte con un curso específico.

## Relaciones Clave

Las relaciones suelen evidenciarse mediante el separador `Rel`.

### Usuario ↔ Curso

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` almacena el estado de inscripción (TEACHER = 1, STUDENT = 5).

### Usuario ↔ Sesión ↔ Curso

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstracción de Contenido)

Todas las entidades de contenido de curso se conectan al sistema de recursos a través de `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulta [Sistema de Recursos](resource-system.md) para más detalles.

## Extensiones de Doctrine

Chamilo utiliza las extensiones de Doctrine de Gedmo (a través de `stof/doctrine-extensions-bundle`):

* **Tree** — Datos jerárquicos (ResourceNode utiliza materialized path)
* **Timestampable** — Campos automáticos `createdAt`/`updatedAt`
* **Sluggable** — Slugs amigables para URL
* **Sortable** — Colecciones ordenables