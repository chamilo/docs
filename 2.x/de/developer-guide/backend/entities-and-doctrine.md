# Entitäten und Doctrine

Chamilo 2.0 verfügt über 314 Doctrine-Entitäten, die auf zwei Bundles verteilt sind. Im Folgenden werden nur die wichtigsten erwähnt.

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
| **Fähigkeiten** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
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
* CourseBundle-Entitäten: mit Präfix `C` (z. B. `CDocument`, `CQuiz`, `CLp`)

Dieses Präfix unterscheidet kursbezogene Inhaltsentitäten von plattformweiten Entitäten (in Übereinstimmung mit der Benennung von Legacy-Datenbanktabellen). Diese Unterscheidung könnte langfristig verschwinden, da immer mehr Tools zu globalen Tools ohne starke Bindung an einen bestimmten Kurs umgewandelt werden.

## Wichtige Beziehungen

Beziehungen werden in der Regel durch den Separator `Rel` deutlich.

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

Siehe [Ressourcensystem](resource-system.md) für Details.

## Doctrine-Erweiterungen

Chamilo verwendet Gedmo Doctrine Extensions (über `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarchische Daten (ResourceNode verwendet materialisierten Pfad)
* **Timestampable** — Automatische Felder `createdAt`/`updatedAt`
* **Sluggable** — URL-freundliche Slugs
* **Sortable** — Sortierbare Sammlungen