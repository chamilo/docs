# Entiteiten en Doctrine

Chamilo 2.0 heeft 314 Doctrine-entiteiten verdeeld over twee bundles. Hieronder worden alleen de belangrijkste genoemd.

## Organisatie van Entiteiten

### CoreBundle Entiteiten (213)

Entiteiten op platformniveau:

| Categorie | Voorbeelden |
|----------|---------|
| **Gebruikers** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursussen** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessies** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Bronnen** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Instellingen** | `SettingsCurrent`, `SettingsOptions` |
| **Berichten** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Vaardigheden** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Sociaal** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle Entiteiten (101)

Entiteiten voor cursusinhoud — allemaal met het voorvoegsel `C`:

| Categorie | Voorbeelden |
|----------|---------|
| **Documenten** | `CDocument` |
| **Oefeningen** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Leertrajecten** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Opdrachten** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Enquêtes** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Aanwezigheid** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Overig** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Naamconventie

* CoreBundle-entiteiten: standaard PascalCase (bijv. `User`, `Course`, `Session`)
* CourseBundle-entiteiten: met voorvoegsel `C` (bijv. `CDocument`, `CQuiz`, `CLp`)

Dit voorvoegsel onderscheidt inhoudsentiteiten op cursusniveau van entiteiten op platformniveau (in lijn met de naamgeving van oudere databasetabellen). Dit onderscheid kan op lange termijn verdwijnen naarmate meer tools worden omgezet naar globale tools zonder een sterke koppeling aan een specifieke cursus.

## Belangrijke Relaties

Relaties worden meestal aangeduid met de scheidingsteken `Rel`.

### Gebruiker ↔ Cursus

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` slaat de inschrijvingsstatus op (TEACHER = 1, STUDENT = 5).

### Gebruiker ↔ Sessie ↔ Cursus

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Inhoudsabstractie)

Alle inhoudsentiteiten van cursussen zijn verbonden met het bronnensysteem via `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Zie [Bronsysteem](resource-system.md) voor meer informatie.

## Doctrine Uitbreidingen

Chamilo gebruikt Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hiërarchische gegevens (ResourceNode gebruikt materialized path)
* **Timestampable** — Automatische `createdAt`/`updatedAt` velden
* **Sluggable** — URL-vriendelijke slugs
* **Sortable** — Sorteerbare collecties