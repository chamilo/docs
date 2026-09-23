# Entiteter och Doctrine

Chamilo 3.0 har 314 Doctrine-entiteter i två bundle. Nedan nämns endast de viktigaste.

## Entitetsorganisation

### CoreBundle-entiteter (213)

Plattformsnivåentiteter:

| Kategori | Exempel |
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

### CourseBundle-entiteter (101)

Kursinnehållsentiteter — alla med prefixet `C`:

| Kategori | Exempel |
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

## Namnkonvention

* CoreBundle-entiteter: standard PascalCase (t.ex. `User`, `Course`, `Session`)
* CourseBundle-entiteter: prefixade med `C` (t.ex. `CDocument`, `CQuiz`, `CLp`)

Detta prefix skiljer kursomfattande innehållsentiteter från plattformsnivåentiteter (i linje med namngivningen av äldre databastabeller). Distinktionen kan försvinna på sikt när fler verktyg konverteras till globala verktyg utan stark koppling till en specifik kurs.

## Nyckelrelationer

Relationer framgår vanligtvis av separatorn `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` lagrar inskrivningsstatus (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (innehållsabstraktion)

Alla kursinnehållsentiteter ansluter till resurssystemet via `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Se [Resurssystem](resource-system.md) för detaljer.

## Doctrine-tillägg

Chamilo använder Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarkiska data (ResourceNode använder materialiserad sökväg)
* **Timestampable** — Automatiska fält `createdAt`/`updatedAt`
* **Sluggable** — URL-vänliga slug:ar
* **Sortable** — Ordningsbara samlingar