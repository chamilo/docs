# Entitas dan Doctrine

Chamilo 3.0 memiliki 314 entitas Doctrine di dua bundle. Berikut ini hanya menyebutkan yang utama.

## Organisasi Entitas

### Entitas CoreBundle (213)

Entitas tingkat platform:

| Kategori | Contoh |
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

### Entitas CourseBundle (101)

Entitas konten kursus — semuanya diawali dengan `C`:

| Kategori | Contoh |
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

## Konvensi Penamaan

* Entitas CoreBundle: PascalCase standar (misalnya, `User`, `Course`, `Session`)
* Entitas CourseBundle: diawali dengan `C` (misalnya, `CDocument`, `CQuiz`, `CLp`)

Awalan ini membedakan entitas konten yang bersifat lingkup kursus dari entitas tingkat platform (selaras dengan penamaan tabel basis data warisan). Distingsi ini mungkin akan hilang dalam jangka panjang seiring lebih banyak alat dikonversi menjadi alat global tanpa kaitan kuat dengan kursus tertentu.

## Relasi Utama

Relasi biasanya ditandai oleh pemisah `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` menyimpan status pendaftaran (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstraksi Konten)

Semua entitas konten kursus terhubung ke sistem sumber daya melalui `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Lihat [Sistem Sumber Daya](resource-system.md) untuk rincian.

## Ekstensi Doctrine

Chamilo menggunakan Gedmo Doctrine Extensions (melalui `stof/doctrine-extensions-bundle`):

* **Tree** — Data hierarkis (ResourceNode menggunakan materialized path)
* **Timestampable** — Bidang `createdAt`/`updatedAt` otomatis
* **Sluggable** — Slug yang ramah URL
* **Sortable** — Koleksi yang dapat diurutkan