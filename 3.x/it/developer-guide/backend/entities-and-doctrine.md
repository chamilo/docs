# Entità e Doctrine

Chamilo 3.0 dispone di 314 entità Doctrine distribuite in due bundle. Di seguito si menzionano solo quelle principali.

## Organizzazione delle entità

### Entità del CoreBundle (213)

Entità a livello di piattaforma:

| Categoria | Esempi |
|----------|---------|
| **Utenti** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Corsi** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessioni** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Risorse** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Impostazioni** | `SettingsCurrent`, `SettingsOptions` |
| **Messaggi** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracciamento** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Competenze** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugin** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entità del CourseBundle (101)

Entità dei contenuti del corso — tutte con prefisso `C`:

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

## Convenzione di denominazione

* Entità del CoreBundle: PascalCase standard (ad es. `User`, `Course`, `Session`)
* Entità del CourseBundle: prefisso `C` (ad es. `CDocument`, `CQuiz`, `CLp`)

Questo prefisso distingue le entità di contenuto con ambito corso dalle entità a livello di piattaforma (in linea con la denominazione delle tabelle del database legacy). Questa distinzione potrebbe scomparire nel lungo periodo, man mano che più strumenti vengono convertiti in strumenti globali senza un legame stretto con un corso specifico.

## Relazioni principali

Le relazioni sono di solito evidenziate dal separatore `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` memorizza lo stato di iscrizione (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (astrazione dei contenuti)

Tutte le entità di contenuto del corso si collegano al sistema delle risorse tramite `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Si veda [Sistema delle risorse](resource-system.md) per i dettagli.

## Estensioni Doctrine

Chamilo utilizza Gedmo Doctrine Extensions (tramite `stof/doctrine-extensions-bundle`):

* **Tree** — Dati gerarchici (ResourceNode usa il materialized path)
* **Timestampable** — Campi automatici `createdAt`/`updatedAt`
* **Sluggable** — Slug adatti agli URL
* **Sortable** — Collezioni ordinabili