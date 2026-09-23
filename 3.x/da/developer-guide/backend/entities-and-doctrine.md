# Entiteter og Doctrine

Chamilo 3.0 har 314 Doctrine-entiteter fordelt på to bundles. Det følgende omtaler kun de vigtigste.

## Organisering af entiteter

### CoreBundle-entiteter (213)

Platformniveau-entiteter:

| Kategori | Eksempler |
|----------|---------|
| **Brugere** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Kurser** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessioner** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Ressourcer** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Indstillinger** | `SettingsCurrent`, `SettingsOptions` |
| **Beskeder** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Kompetencer** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Socialt** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle-entiteter (101)

Kursusindholdsentiteter — alle med præfikset `C`:

| Kategori | Eksempler |
|----------|---------|
| **Dokumenter** | `CDocument` |
| **Øvelser** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Læringsstier** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Fora** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Opgaver** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Spørgeskemaer** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Fremmøde** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Andet** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Navngivningskonvention

* CoreBundle-entiteter: standard PascalCase (f.eks. `User`, `Course`, `Session`)
* CourseBundle-entiteter: præfikset med `C` (f.eks. `CDocument`, `CQuiz`, `CLp`)

Dette præfiks skelner kursusafgrænsede indholdsentiteter fra platformniveau-entiteter (i tråd med navngivningen af ældre databasetabeller). Denne skelnen kan forsvinde på længere sigt, efterhånden som flere værktøjer konverteres til globale værktøjer uden en stærk tilknytning til et specifikt kursus.

## Centrale relationer

Relationer fremgår typisk af separatoren `Rel`.

### Bruger ↔ Kursus

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` gemmer tilmeldingsstatus (TEACHER = 1, STUDENT = 5).

### Bruger ↔ Session ↔ Kursus

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (indholdsabstraktion)

Alle kursusindholdsentiteter knyttes til ressourcessystemet via `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Se [Ressourcessystem](resource-system.md) for detaljer.

## Doctrine-udvidelser

Chamilo bruger Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarkiske data (ResourceNode bruger materialized path)
* **Timestampable** — Automatiske felter `createdAt`/`updatedAt`
* **Sluggable** — URL-venlige slugs
* **Sortable** — Sorterbare samlinger