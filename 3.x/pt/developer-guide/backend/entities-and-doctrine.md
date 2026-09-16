# Entidades e Doctrine

O Chamilo 3.0 tem 314 entidades Doctrine em dois bundles. A seguir mencionam-se apenas as principais.

## Organização das Entidades

### Entidades do CoreBundle (213)

Entidades ao nível da plataforma:

| Categoria | Exemplos |
|----------|---------|
| **Utilizadores** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursos** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessões** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Recursos** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Definições** | `SettingsCurrent`, `SettingsOptions` |
| **Mensagens** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Acompanhamento** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Competências** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **IA** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entidades do CourseBundle (101)

Entidades de conteúdo de curso — todas prefixadas com `C`:

| Categoria | Exemplos |
|----------|---------|
| **Documentos** | `CDocument` |
| **Exercícios** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Percursos de aprendizagem** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Fóruns** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Trabalhos** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Inquéritos** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Assiduidade** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Outros** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convenção de Nomenclatura

* Entidades do CoreBundle: PascalCase padrão (p. ex., `User`, `Course`, `Session`)
* Entidades do CourseBundle: prefixadas com `C` (p. ex., `CDocument`, `CQuiz`, `CLp`)

Este prefixo distingue as entidades de conteúdo no âmbito do curso das entidades ao nível da plataforma (em linha com a nomenclatura das tabelas da base de dados legado). Esta distinção poderá desaparecer a longo prazo à medida que mais ferramentas forem convertidas em ferramentas globais sem uma ligação forte a um curso específico.

## Relacionamentos Principais

Os relacionamentos são normalmente evidenciados pelo separador `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` armazena o estado de inscrição (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstração de Conteúdo)

Todas as entidades de conteúdo de curso ligam-se ao sistema de recursos através de `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulte [Sistema de Recursos](resource-system.md) para mais pormenores.

## Extensões Doctrine

O Chamilo utiliza as Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Dados hierárquicos (ResourceNode usa materialized path)
* **Timestampable** — Campos automáticos `createdAt`/`updatedAt`
* **Sluggable** — Slugs amigáveis para URL
* **Sortable** — Coleções ordenáveis