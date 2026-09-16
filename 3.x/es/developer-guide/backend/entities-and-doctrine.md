# Entidades y Doctrine

Chamilo 3.0 tiene 314 entidades Doctrine en dos bundles. A continuación se mencionan únicamente las principales.

## Organización de entidades

### Entidades de CoreBundle (213)

Entidades a nivel de plataforma:

| Categoría | Ejemplos |
|----------|---------|
| **Users** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Courses** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessions** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Resources** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Settings** | `SettingsCurrent`, `SettingsOptions` |
| **Messages** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Skills** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entidades de CourseBundle (101)

Entidades de contenido de curso — todas con el prefijo `C`:

| Categoría | Ejemplos |
|----------|---------|
| **Documents** | `CDocument` |
| **Exercises** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Learning paths** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Assignments** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Surveys** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Attendance** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Other** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convención de nomenclatura

* Entidades de CoreBundle: PascalCase estándar (p. ej., `User`, `Course`, `Session`)
* Entidades de CourseBundle: prefijo `C` (p. ej., `CDocument`, `CQuiz`, `CLp`)

Este prefijo distingue las entidades de contenido con ámbito de curso de las entidades a nivel de plataforma (en línea con la nomenclatura de las tablas de la base de datos heredada). Esta distinción podría desaparecer a largo plazo a medida que más herramientas se conviertan en herramientas globales sin un vínculo fuerte con un curso concreto.

## Relaciones clave

Las relaciones suelen evidenciarse mediante el separador `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` almacena el estado de inscripción (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (abstracción de contenido)

Todas las entidades de contenido de curso se conectan al sistema de recursos a través de `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulte [Sistema de recursos](resource-system.md) para más detalles.

## Extensiones de Doctrine

Chamilo utiliza Gedmo Doctrine Extensions (mediante `stof/doctrine-extensions-bundle`):

* **Tree** — Datos jerárquicos (ResourceNode usa materialized path)
* **Timestampable** — Campos automáticos `createdAt`/`updatedAt`
* **Sluggable** — Slugs amigables para URL
* **Sortable** — Colecciones ordenables