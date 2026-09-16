# Οντότητες και Doctrine

Το Chamilo 3.0 διαθέτει 314 οντότητες Doctrine σε δύο bundles. Ακολουθούν μόνο οι κυριότερες.

## Οργάνωση οντοτήτων

### Οντότητες CoreBundle (213)

Οντότητες επιπέδου πλατφόρμας:

| Κατηγορία | Παραδείγματα |
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

### Οντότητες CourseBundle (101)

Οντότητες περιεχομένου μαθήματος — όλες με πρόθεμα `C`:

| Κατηγορία | Παραδείγματα |
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

## Σύμβαση ονοματοδοσίας

* Οντότητες CoreBundle: τυπικό PascalCase (π.χ. `User`, `Course`, `Session`)
* Οντότητες CourseBundle: με πρόθεμα `C` (π.χ. `CDocument`, `CQuiz`, `CLp`)

Αυτό το πρόθεμα διακρίνει τις οντότητες περιεχομένου με εμβέλεια μαθήματος από τις οντότητες επιπέδου πλατφόρμας (σε συμφωνία με την ονοματοδοσία των παλαιών πινάκων βάσης δεδομένων). Η διάκριση αυτή ενδέχεται να εξαφανιστεί μακροπρόθεσμα, καθώς περισσότερα εργαλεία μετατρέπονται σε καθολικά εργαλεία χωρίς ισχυρό δεσμό με συγκεκριμένο μάθημα.

## Κύριες σχέσεις

Οι σχέσεις συνήθως δηλώνονται με τον διαχωριστή `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

Το `CourseRelUser` αποθηκεύει την κατάσταση εγγραφής (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (αφαίρεση περιεχομένου)

Όλες οι οντότητες περιεχομένου μαθήματος συνδέονται με το σύστημα πόρων μέσω του `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Δείτε το [Σύστημα πόρων](resource-system.md) για λεπτομέρειες.

## Επεκτάσεις Doctrine

Το Chamilo χρησιμοποιεί τις Gedmo Doctrine Extensions (μέσω του `stof/doctrine-extensions-bundle`):

* **Tree** — Ιεραρχικά δεδομένα (το ResourceNode χρησιμοποιεί materialized path)
* **Timestampable** — Αυτόματα πεδία `createdAt`/`updatedAt`
* **Sluggable** — Φιλικά προς URL slugs
* **Sortable** — Συλλογές με δυνατότητα ταξινόμησης