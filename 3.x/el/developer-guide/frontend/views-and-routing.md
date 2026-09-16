# Προβολές και Δρομολόγηση

Το Chamilo διαθέτει ένα μεγάλο σύνολο προβολών Vue (συστατικά σε επίπεδο σελίδας) συνδεδεμένων μέσω του Vue Router. Τα πραγματικά αρχεία βρίσκονται στο `assets/vue/views/`.

## Αρχιτεκτονική του δρομολογητή

Ο δρομολογητής ορίζεται στο `assets/vue/router/index.js` με χρήση του `createWebHistory` για καθαρά URL.

Οι διαδρομές είναι αρθρωτές — οργανωμένες σε αρχεία διαδρομών ανά λειτουργία που εισάγονται στον κύριο δρομολογητή:

| Άρθρωμα διαδρομών | Σελίδες |
|-------------|-------|
| `admin` | Σελίδες πίνακα διαχείρισης |
| `sessionAdmin` | Σελίδες διαχείρισης συνεδριών |
| `course` | Λίστα μαθημάτων, δημιουργία, αρχική, κατάλογος |
| `account` | Προφίλ χρήστη και ρυθμίσεις |
| `personalfile` | Χώρος προσωπικών αρχείων |
| `message` | Μηνύματα / εισερχόμενα |
| `user` | Σελίδες διαχείρισης χρηστών |
| `usergroup` | Σελίδες ομάδων χρηστών (τάξεων) |
| `userreluser` | Σελίδες σχέσεων χρηστών (φίλοι/ακολούθηση) |
| `ccalendarevent` | Ημερολόγιο μαθήματος και ατζέντα |
| `ctoolintro` | Σελίδες εισαγωγής εργαλείων μαθήματος |
| `page` | Στατικές σελίδες CMS |
| `pageLayout` | Περιτυλίγματα διάταξης σελίδας |
| `publicPage` | Δημόσια προσβάσιμες σελίδες |
| `social` | Σελίδες κοινωνικού δικτύου |
| `filemanager` | Διαχειριστής αρχείων (περιηγητής εγγράφων μαθήματος) |
| `skill` | Σελίδες δεξιοτήτων και ικανοτήτων |
| `accessurl` | Σελίδες διαχείρισης πολλαπλών URL (πύλης) |
| `branch` | Σελίδες παραρτημάτων / δικτύου campus |
| `room` | Σελίδες εικονικών αιθουσών |
| `buycourses` | Σελίδες αγοράς μαθημάτων |
| `documents` | Διαχείριση εγγράφων |
| `assignments` | Ροή εργασίας εργασιών |
| `links` | Διαχείριση εξωτερικών συνδέσμων |
| `glossary` | Διαχείριση γλωσσαρίου |
| `attendance` | Παρακολούθηση παρουσιών |
| `lp` | Αναπαραγωγέας και επεξεργαστής μαθησιακής διαδρομής |
| `dropbox` | Dropbox / ανταλλαγή αρχείων |
| `blog` | Σελίδες ιστολογίου |
| `blogAdmin` | Διαχείριση ιστολογίου |
| `coursemaintenance` | Αντίγραφο ασφαλείας και επαναφορά μαθήματος |
| `catalogue` | Κατάλογοι μαθημάτων και συνεδριών |

## Κύριες διαδρομές

| Διαδρομή | Προβολή | Περιγραφή |
|------|------|-------------|
| `/` | `AppIndex.vue` (ή προσαρμοσμένη) | Σημείο εισόδου της εφαρμογής |
| `/home` | `pages/Home.vue` | Αρχική σελίδα της πλατφόρμας |
| `/login` | `pages/Login.vue` | Σελίδα σύνδεσης |
| `/courses` | `views/user/courses/List.vue` | Μαθήματα στα οποία είναι εγγεγραμμένος ο χρήστης |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Τρέχουσες συνεδρίες |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Παρελθούσες συνεδρίες |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Επερχόμενες συνεδρίες |
| `/course/:id/home` | `views/course/CourseHome.vue` | Αρχική σελίδα μαθήματος |
| `/account/home` | `views/account/Home.vue` | Προφίλ χρήστη |
| `/admin` | Προβολές διαχείρισης | Πίνακας διαχείρισης |
| `/faq` | `pages/Faq.vue` | Σελίδα συχνών ερωτήσεων |

## Φρουροί διαδρομών

Ο δρομολογητής χρησιμοποιεί φρουρούς πλοήγησης (δηλωμένους με `beforeEach` και `afterEach`) για:

* Έλεγχο κατάστασης αυθεντικοποίησης μέσω του `useSecurityStore` και ανακατεύθυνση μη αυθεντικοποιημένων χρηστών στο `/login`
* Επαλήθευση του πλαισίου μαθήματος μέσω του `useCidReqStore`
* Εφαρμογή κλάσεων CSS τύπου σελίδας κατά την πλοήγηση SPA (αντικαθιστώντας ό,τι θα έκανε το `PageHelper` του Twig σε πλήρη φόρτωση σελίδας)
* Υποστήριξη προσαρμοσμένων αντικαταστάσεων προτύπων Vue — το συστατικό εισόδου στο `/` αντικαθίσταται από προσαρμοσμένο `AppIndex.vue` όταν είναι ενεργοποιημένο προσαρμοσμένο πρότυπο Vue (`var/vue_templates/pages/AppIndex.vue`)

## Οργάνωση προβολών

Οι προβολές βρίσκονται στο `assets/vue/views/`, οργανωμένες ανά λειτουργία:

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```