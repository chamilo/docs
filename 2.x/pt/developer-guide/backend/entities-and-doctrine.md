# Entidades e Doctrine

O Chamilo 2.0 possui 314 entidades Doctrine distribuídas em dois bundles. A seguir, mencionamos apenas as principais.

## Organização das Entidades

### Entidades do CoreBundle (213)

Entidades no nível da plataforma:

| Categoria | Exemplos |
|----------|---------|
| **Usuários** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursos** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessões** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Recursos** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Configurações** | `SettingsCurrent`, `SettingsOptions` |
| **Mensagens** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Rastreamento** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Habilidades** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
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
| **Caminhos de aprendizagem** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Fóruns** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Tarefas** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Pesquisas** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Frequência** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Outros** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convenção de Nomenclatura

* Entidades do CoreBundle: padrão PascalCase (por exemplo, `User`, `Course`, `Session`)
* Entidades do CourseBundle: prefixadas com `C` (por exemplo, `CDocument`, `CQuiz`, `CLp`)

Esse prefixo distingue entidades de conteúdo no escopo do curso de entidades no nível da plataforma (em linha com a nomenclatura de tabelas de banco de dados legadas). Essa distinção pode desaparecer a longo prazo, à medida que mais ferramentas forem convertidas para ferramentas globais sem um vínculo forte com um curso específico.

## Relacionamentos Principais

Os relacionamentos geralmente são evidenciados pelo separador `Rel`.

### Usuário ↔ Curso

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` armazena o status de matrícula (TEACHER = 1, STUDENT = 5).

### Usuário ↔ Sessão ↔ Curso

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstração de Conteúdo)

Todas as entidades de conteúdo de curso se conectam ao sistema de recursos por meio de `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulte [Sistema de Recursos](resource-system.md) para mais detalhes.

## Extensões do Doctrine

O Chamilo utiliza as Extensões do Doctrine da Gedmo (via `stof/doctrine-extensions-bundle`):

* **Tree** — Dados hierárquicos (ResourceNode utiliza o caminho materializado)
* **Timestampable** — Campos automáticos `createdAt`/`updatedAt`
* **Sluggable** — Slugs amigáveis para URL
* **Sortable** — Coleções ordenáveis