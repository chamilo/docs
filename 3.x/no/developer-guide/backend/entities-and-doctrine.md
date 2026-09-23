# Entiteter og Doctrine

Chamilo 3.0 har 314 Doctrine-entiteter fordelt på to bundles. Følgende omtaler kun de viktigste.

## Organisering av entiteter

### CoreBundle-entiteter (213)

Plattformnivå-entiteter:

| Kategori | Eksempler |
|----------|---------|
| **Brukere** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Kurs** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sesjoner** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Ressurser** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Innstillinger** | `SettingsCurrent`, `SettingsOptions` |
| **Meldinger** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Sporing** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Ferdigheter** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Sosialt** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle-entiteter (101)

Kursinnholdsentiteter — alle prefikset med `C`:

| Kategori | Eksempler |
|----------|---------|
| **Dokumenter** | `CDocument` |
| **Øvelser** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Læringsstier** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forum** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Oppgaver** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Undersøkelser** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Oppmøte** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogger** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Annet** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Navnekonvensjon

* CoreBundle-entiteter: standard PascalCase (f.eks. `User`, `Course`, `Session`)
* CourseBundle-entiteter: prefikset med `C` (f.eks. `CDocument`, `CQuiz`, `CLp`)

Dette prefikset skiller kursavgrensede innholdsentiteter fra plattformnivå-entiteter (i tråd med navngivingen av eldre databasetabeller). Dette skillet kan forsvinne på sikt etter hvert som flere verktøy konverteres til globale verktøy uten en sterk tilknytning til et bestemt kurs.

## Viktige relasjoner

Relasjoner vises vanligvis ved separatoren `Rel`.

### Bruker ↔ Kurs

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` lagrer påmeldingsstatus (TEACHER = 1, STUDENT = 5).

### Bruker ↔ Sesjon ↔ Kurs

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (innholdsabstraksjon)

Alle kursinnholdsentiteter kobles til ressurssystemet via `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Se [Ressurssystem](resource-system.md) for detaljer.

## Doctrine-utvidelser

Chamilo bruker Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarkiske data (ResourceNode bruker materialized path)
* **Timestampable** — Automatiske `createdAt`/`updatedAt`-felt
* **Sluggable** — URL-vennlige slugs
* **Sortable** — Sorterbare samlinger