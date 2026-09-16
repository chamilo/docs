# Entidades e Doctrine

O Chamilo 3.0 possui 314 entidades Doctrine em dois bundles. A seguir são mencionadas apenas as principais.

## Organização das Entidades

### Entidades do CoreBundle (213)

Entidades em nível de plataforma:

| Categoria | Exemplos |
|----------|---------|
| **Usuários** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursos** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessões** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Recursos** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Configurações** | `SettingsCurrent`, `SettingsOptions` |
| **Mensagens** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Rastreamento** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Competências** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **IA** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entidades do CourseBundle (101)

Entidades de conteúdo do curso — todas prefixadas com `C`:

| Categoria | Exemplos |
|----------|---------|
| **Documentos** | `CDocument` |
| **Exercícios** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Percursos de aprendizagem** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Fóruns** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Tarefas** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Pesquisas** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Frequência** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Outros** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convenção de Nomenclatura

* Entidades do CoreBundle: PascalCase padrão (por exemplo, `User`, `Course`, `Session`)
* Entidades do CourseBundle: prefixadas com `C` (por exemplo, `CDocument`, `CQuiz`, `CLp`)

Esse prefixo distingue as entidades de conteúdo no escopo do curso das entidades em nível de plataforma (em linha com a nomenclatura das tabelas de banco de dados legadas). Essa distinção pode desaparecer a longo prazo, à medida que mais ferramentas forem convertidas em ferramentas globais sem um vínculo forte com um curso específico.

## Relacionamentos Principais

Os relacionamentos costumam ser evidenciados pelo separador `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` armazena o status de matrícula (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstração de Conteúdo)

Todas as entidades de conteúdo do curso se conectam ao sistema de recursos por meio de `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulte [Sistema de Recursos](resource-system.md) para mais detalhes.

## Extensões Doctrine

O Chamilo utiliza as Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Dados hierárquicos (ResourceNode usa materialized path)
* **Timestampable** — Campos automáticos `createdAt`/`updatedAt`
* **Sluggable** — Slugs amigáveis a URLs
* **Sortable** — Coleções ordenáveis