# Entities and Doctrine

Chamilo 3.0 has 314 Doctrine entities across two bundles. The following only mention the main ones.

## Entity Organization

### CoreBundle Entities (213)

Platform-level entities:

| Category | Examples |
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

### CourseBundle Entities (101)

Course content entities — all prefixed with `C`:

| Category | Examples |
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

## Naming Convention

* CoreBundle entities: standard PascalCase (e.g., `User`, `Course`, `Session`)
* CourseBundle entities: prefixed with `C` (e.g., `CDocument`, `CQuiz`, `CLp`)

This prefix distinguishes course-scoped content entities from platform-level entities (in line with legacy database tables naming). This distinction might disappear in the long run as more tools are converted to global tools without a strong link to a specific course.

## Key Relationships

Relationships are usually evidenced by the `Rel` separator.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` stores the enrollment status (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Content Abstraction)

All course content entities connect to the resource system through `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

See [Resource System](resource-system.md) for details.

## Doctrine Extensions

Chamilo uses Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`):

* **Tree** — Hierarchical data (ResourceNode uses materialized path)
* **Timestampable** — Automatic `createdAt`/`updatedAt` fields
* **Sluggable** — URL-friendly slugs
* **Sortable** — Orderable collections
