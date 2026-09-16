# Entitäten und Doctrine

Chamilo 3.0 umfasst 314 Doctrine-Entitäten in zwei Bundles. Im Folgenden werden nur die wichtigsten genannt.

## Organisation der Entitäten

### CoreBundle-Entitäten (213)

Plattformweite Entitäten:

| Kategorie | Beispiele |
|----------|---------|
| **Benutzer** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Kurse** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sitzungen** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Ressourcen** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Einstellungen** | `SettingsCurrent`, `SettingsOptions` |
| **Nachrichten** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Kompetenzen** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **KI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Soziales** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle-Entitäten (101)

Kursinhalts-Entitäten — alle mit dem Präfix `C`:

| Kategorie | Beispiele |
|----------|---------|
| **Dokumente** | `CDocument` |
| **Übungen** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Lernpfade** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Foren** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Aufgaben** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Umfragen** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Anwesenheit** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Sonstiges** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Namenskonvention

* CoreBundle-Entitäten: Standard-PascalCase (z. B. `User`, `Course`, `Session`)
* CourseBundle-Entitäten: Präfix `C` (z. B. `CDocument`, `CQuiz`, `CLp`)

Dieses Präfix unterscheidet kursbezogene Inhaltsentitäten von plattformweiten Entitäten (in Anlehnung an die Namensgebung der Legacy-Datenbanktabellen). Diese Unterscheidung könnte langfristig entfallen, wenn mehr Werkzeuge in globale Tools ohne starke Bindung an einen bestimmten Kurs überführt werden.

## Wichtige Beziehungen

Beziehungen werden üblicherweise durch den Trenner `Rel` kenntlich gemacht.

### Benutzer ↔ Kurs

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` speichert den Einschreibestatus (TEACHER = 1, STUDENT = 5).

### Benutzer ↔ Sitzung ↔ Kurs

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Inhaltsabstraktion)

Alle Kursinhalts-Entitäten sind über `ResourceNode` mit dem Ressourcensystem verbunden:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Einzelheiten siehe [Ressourcensystem](resource-system.md).

## Doctrine-Erweiterungen

Chamilo verwendet Gedmo Doctrine Extensions (über `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarchische Daten (ResourceNode verwendet materialisierten Pfad)
* **Timestampable** — Automatische Felder `createdAt`/`updatedAt`
* **Sluggable** — URL-freundliche Slugs
* **Sortable** — Sortierbare Sammlungen