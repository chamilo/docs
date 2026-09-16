# Οντότητες και Doctrine

Το Chamilo 2.0 διαθέτει 314 οντότητες Doctrine σε δύο bundles. Παρακάτω αναφέρονται μόνο οι κύριες.

## Οργάνωση Οντοτήτων

### Οντότητες CoreBundle (213)

Οντότητες επιπέδου πλατφόρμας:

| Κατηγορία | Παραδείγματα |
|-----------|-------------|
| **Χρήστες** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Μαθήματα** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Συνεδρίες** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Πόροι** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Ρυθμίσεις** | `SettingsCurrent`, `SettingsOptions` |
| **Μηνύματα** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Παρακολούθηση** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Δεξιότητες** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **Τεχνητή Νοημοσύνη** | `AiRequests` |
| **Πρόσθετα** | `Plugin`, `AccessUrlRelPlugin` |
| **Κοινωνικά** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Οντότητες CourseBundle (101)

Οντότητες περιεχομένου μαθήματος — όλες προθεματοποιημένες με `C`:

| Κατηγορία | Παραδείγματα |
|-----------|-------------|
| **Έγγραφα** | `CDocument` |
| **Ασκήσεις** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Μονοπάτια Μάθησης** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Φόρουμ** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Αναθέσεις** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Έρευνες** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Παρακολούθηση** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Άλλα** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Σύμβαση Ονοματοδοσίας

* Οντότητες CoreBundle: τυπική PascalCase (π.χ. `User`, `Course`, `Session`)
* Οντότητες CourseBundle: προθεματοποιημένες με `C` (π.χ. `CDocument`, `CQuiz`, `CLp`)

Αυτό το πρόθεμα διακρίνει τις οντότητες περιεχομένου εύρους μαθήματος από τις οντότητες επιπέδου πλατφόρμας (σύμφωνα με την ονοματοδοσία των πινάκων της παλαιότερης βάσης δεδομένων). Αυτή η διάκριση ενδέχεται να εξαφανιστεί μακροπρόθεσμα καθώς περισσότερα εργαλεία μετατρέπονται σε παγκόσμια εργαλεία χωρίς ισχυρό δεσμό με συγκεκριμένο μάθημα.

## Κύριες Σχέσεις

Οι σχέσεις συνήθως φανερώνουν από τον διαχωριστή `Rel`.

### Χρήστης ↔ Μάθημα

```
User --[CourseRelUser]--> Course
```

Το `CourseRelUser` αποθηκεύει την κατάσταση εγγραφής (TEACHER = 1, STUDENT = 5).

### Χρήστης ↔ Συνεδρία ↔ Μάθημα

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Αφαίρεση Περιεχομένου)

Όλες οι οντότητες περιεχομένου μαθήματος συνδέονται με το σύστημα πόρων μέσω `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Δείτε το [Σύστημα Πόρων](resource-system.md) για λεπτομέρειες.

## Επεκτάσεις Doctrine

Το Chamilo χρησιμοποιεί Gedmo Doctrine Extensions (μέσω `stof/doctrine-extensions-bundle`):

* **Tree** — Ιεραρχικά δεδομένα (το ResourceNode χρησιμοποιεί materialized path)
* **Timestampable** — Αυτόματα πεδία `createdAt`/`updatedAt`
* **Sluggable** — Slugs φιλικά προς URL
* **Sortable** — Ταξινομήσιμες συλλογές