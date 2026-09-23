# Entiteetit ja Doctrine

Chamilo 3.0:ssa on 314 Doctrine-entiteettiä kahdessa bundlessa. Seuraavassa mainitaan vain keskeisimmät.

## Entiteettien organisointi

### CoreBundle-entiteetit (213)

Alustatason entiteetit:

| Kategoria | Esimerkkejä |
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

### CourseBundle-entiteetit (101)

Kurssisisällön entiteetit — kaikilla etuliite `C`:

| Kategoria | Esimerkkejä |
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

## Nimeämiskäytäntö

* CoreBundle-entiteetit: tavanomainen PascalCase (esim. `User`, `Course`, `Session`)
* CourseBundle-entiteetit: etuliite `C` (esim. `CDocument`, `CQuiz`, `CLp`)

Tämä etuliite erottaa kurssikohtaiset sisältöentiteetit alustatason entiteeteistä (perinteisen tietokantataulujen nimeämisen mukaisesti). Erottelu saattaa hävitä pitkällä aikavälillä, kun yhä useammat työkalut muunnetaan globaaleiksi työkaluiksi ilman vahvaa sidosta tiettyyn kurssiin.

## Keskeiset suhteet

Suhteet ilmenevät yleensä `Rel`-erottimesta.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` tallentaa ilmoittautumisen tilan (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (sisällön abstraktio)

Kaikki kurssisisällön entiteetit liittyvät resurssijärjestelmään `ResourceNode`-entiteetin kautta:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Yksityiskohdat: [Resurssijärjestelmä](resource-system.md).

## Doctrine-laajennukset

Chamilo käyttää Gedmo Doctrine Extensions -laajennuksia (`stof/doctrine-extensions-bundle`-paketin kautta):

* **Tree** — Hierarkkinen data (ResourceNode käyttää materialized path -rakennetta)
* **Timestampable** — Automaattiset `createdAt`-/`updatedAt`-kentät
* **Sluggable** — URL-ystävälliset slugit
* **Sortable** — Järjestettävät kokoelmat