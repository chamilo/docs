# Entità e Doctrine

Chamilo 2.0 conta 314 entità Doctrine distribuite in due bundle. Di seguito vengono menzionate solo le principali.

## Organizzazione delle Entità

### Entità di CoreBundle (213)

Entità a livello di piattaforma:

| Categoria | Esempi |
|----------|---------|
| **Utenti** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Corsi** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessioni** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Risorse** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Impostazioni** | `SettingsCurrent`, `SettingsOptions` |
| **Messaggi** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Monitoraggio** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Competenze** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugin** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entità di CourseBundle (101)

Entità relative ai contenuti dei corsi — tutte con prefisso `C`:

| Categoria | Esempi |
|----------|---------|
| **Documenti** | `CDocument` |
| **Esercizi** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Percorsi di apprendimento** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forum** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Compiti** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Sondaggi** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Presenze** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blog** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Altro** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convenzione di Denominazione

* Entità di CoreBundle: standard PascalCase (ad esempio, `User`, `Course`, `Session`)
* Entità di CourseBundle: con prefisso `C` (ad esempio, `CDocument`, `CQuiz`, `CLp`)

Questo prefisso distingue le entità dei contenuti specifici di un corso dalle entità a livello di piattaforma (in linea con la denominazione delle tabelle del database legacy). Questa distinzione potrebbe scomparire nel lungo termine, man mano che più strumenti vengono convertiti in strumenti globali senza un forte legame con un corso specifico.

## Relazioni Chiave

Le relazioni sono generalmente evidenziate dal separatore `Rel`.

### Utente ↔ Corso

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` memorizza lo stato di iscrizione (TEACHER = 1, STUDENT = 5).

### Utente ↔ Sessione ↔ Corso

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Astrazione dei Contenuti)

Tutte le entità dei contenuti dei corsi si collegano al sistema delle risorse tramite `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Consulta [Sistema delle Risorse](resource-system.md) per maggiori dettagli.

## Estensioni di Doctrine

Chamilo utilizza le estensioni Gedmo Doctrine (tramite `stof/doctrine-extensions-bundle`):

* **Tree** — Dati gerarchici (ResourceNode utilizza il materialized path)
* **Timestampable** — Campi automatici `createdAt`/`updatedAt`
* **Sluggable** — Slug compatibili con URL
* **Sortable** — Collezioni ordinabili