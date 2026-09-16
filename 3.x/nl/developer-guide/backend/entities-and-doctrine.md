# Entiteiten en Doctrine

Chamilo 3.0 heeft 314 Doctrine-entiteiten verspreid over twee bundles. Hieronder worden alleen de belangrijkste genoemd.

## Organisatie van entiteiten

### CoreBundle-entiteiten (213)

Entiteiten op platformniveau:

| Categorie | Voorbeelden |
|----------|---------|
| **Gebruikers** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cursussen** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessies** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Resources** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Instellingen** | `SettingsCurrent`, `SettingsOptions` |
| **Berichten** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Vaardigheden** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Sociaal** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle-entiteiten (101)

Entiteiten voor cursusinhoud — allemaal voorafgegaan door `C`:

| Categorie | Voorbeelden |
|----------|---------|
| **Documenten** | `CDocument` |
| **Oefeningen** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Leerpaden** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Opdrachten** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Enquêtes** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Aanwezigheid** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Overig** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Naamgevingsconventie

* CoreBundle-entiteiten: standaard PascalCase (bijv. `User`, `Course`, `Session`)
* CourseBundle-entiteiten: voorafgegaan door `C` (bijv. `CDocument`, `CQuiz`, `CLp`)

Dit voorvoegsel onderscheidt cursusgebonden inhoudsentiteiten van entiteiten op platformniveau (in lijn met de naamgeving van legacy-databasetabellen). Dit onderscheid kan op termijn verdwijnen naarmate meer tools worden omgezet naar globale tools zonder sterke koppeling aan een specifieke cursus.

## Belangrijke relaties

Relaties worden meestal aangeduid met de scheiding `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` slaat de inschrijvingsstatus op (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (abstractie van inhoud)

Alle entiteiten voor cursusinhoud zijn via `ResourceNode` verbonden met het resourcesysteem:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Zie [Resourcesysteem](resource-system.md) voor details.

## Doctrine-extensies

Chamilo gebruikt Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hiërarchische gegevens (ResourceNode gebruikt materialized path)
* **Timestampable** — Automatische velden `createdAt`/`updatedAt`
* **Sluggable** — URL-vriendelijke slugs
* **Sortable** — Sorteerbare collecties