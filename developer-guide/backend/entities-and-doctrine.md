# Entitas dan Doctrine

Chamilo 2.0 memiliki 314 entitas Doctrine yang didistribusikan dalam dua bundle. Berikut ini, kami hanya menyebutkan yang utama.

## Organisasi Entitas

### Entitas CoreBundle (213)

Entitas pada tingkat platform:

| Kategori | Contoh |
|----------|---------|
| **Pengguna** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Kursus** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sesi** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Sumber Daya** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Pengaturan** | `SettingsCurrent`, `SettingsOptions` |
| **Pesan** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Pelacakan** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Keterampilan** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugin** | `Plugin`, `AccessUrlRelPlugin` |
| **Sosial** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entitas CourseBundle (101)

Entitas konten kursus — semuanya diawali dengan `C`:

| Kategori | Contoh |
|----------|---------|
| **Dokumen** | `CDocument` |
| **Latihan** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Jalur Pembelajaran** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forum** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Tugas** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Survei** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Kehadiran** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blog** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Lainnya** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Konvensi Penamaan

* Entitas CoreBundle: standar PascalCase (misalnya, `User`, `Course`, `Session`)
* Entitas CourseBundle: diawali dengan `C` (misalnya, `CDocument`, `CQuiz`, `CLp`)

Awalan ini membedakan entitas konten dalam lingkup kursus dari entitas pada tingkat platform (sejalan dengan penamaan tabel basis data warisan). Perbedaan ini mungkin akan hilang dalam jangka panjang, seiring dengan semakin banyak alat yang dikonversi menjadi alat global tanpa keterkaitan kuat dengan kursus tertentu.

## Hubungan Utama

Hubungan biasanya terlihat dari pemisah `Rel`.

### Pengguna ↔ Kursus

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` menyimpan status pendaftaran (TEACHER = 1, STUDENT = 5).

### Pengguna ↔ Sesi ↔ Kursus

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

Lihat [Sistem Sumber Daya](resource-system.md) untuk detail lebih lanjut.

## Ekstensi Doctrine

Chamilo menggunakan Ekstensi Doctrine dari Gedmo (melalui `stof/doctrine-extensions-bundle`):

* **Tree** — Data hierarkis (ResourceNode menggunakan jalur materialisasi)
* **Timestampable** — Kolom otomatis `createdAt`/`updatedAt`
* **Sluggable** — Slug yang ramah URL
* **Sortable** — Koleksi yang dapat diurutkan