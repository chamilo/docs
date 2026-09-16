# Views και Δρομολόγηση

Το Chamilo διαθέτει ένα μεγάλο σύνολο Vue views (συστατικών επιπέδου σελίδας) συνδεδεμένων μέσω Vue Router. Τα πραγματικά αρχεία βρίσκονται στο `assets/vue/views/`.

## Αρχιτεκτονική Router

Το router ορίζεται στο `assets/vue/router/index.js` χρησιμοποιώντας το `createWebHistory` για καθαρές URLs.

Οι διαδρομές είναι modular — οργανωμένες σε αρχεία διαδρομών ανά χαρακτηριστικό που εισάγονται στο κύριο router:

| Route module | Σελίδες |
|-------------|---------|
| `admin` | Σελίδες πίνακα διαχείρισης |
| `sessionAdmin` | Σελίδες διαχείρισης συνεδρίας |
| `course` | Λίστα μαθημάτων, δημιουργία, αρχική, κατάλογος |
| `account` | Προφίλ χρήστη και ρυθμίσεις |
| `personalfile` | Χώρος προσωπικού αρχείου |
| `message` | Μηνύματα / εισερχόμενα |
| `user` | Σελίδες διαχείρισης χρηστών |
| `usergroup` | Σελίδες ομάδας χρηστών (τάξη) |
| `userreluser` | Σελίδες σχέσεων χρηστών (φίλοι/παρακολούθηση) |
| `ccalendarevent` | Ημερολόγιο και ατζέντα μαθήματος |
| `ctoolintro` | Σελίδες εισαγωγής εργαλείων μαθήματος |
| `page` | Στατικές CMS σελίδες |
| `pageLayout` | Περιτυλίξεις διάταξης σελίδας |
| `publicPage` | Δημόσια προσβάσιμες σελίδες |
| `social` | Σελίδες κοινωνικού δικτύου |
| `filemanager` | Διαχειριστής αρχείων (περιηγητής εγγράφων μαθήματος) |
| `skill` | Σελίδες δεξιοτήτων και ικανοτήτων |
| `accessurl` | Σελίδες διαχείρισης πολλαπλών URL (portal) |
| `branch` | Σελίδες υποκαταστήματος / δικτύου campus |
| `room` | Σελίδες εικονικού δωματίου |
| `buycourses` | Σελίδες αγοράς μαθημάτων |
| `documents` | Διαχείριση εγγράφων |
| `assignments` | Ροή εργασιών αναθέσεων |
| `links` | Διαχείριση εξωτερικών συνδέσμων |
| `glossary` | Διαχείριση γλωσσαρίου |
| `attendance` | Παρακολούθηση προσέλευσης |
| `lp` | Player και επεξεργαστής μονοπατιού μάθησης |
| `dropbox` | Dropbox / ανταλλαγή αρχείων |
| `blog` | Σελίδες blog |
| `blogAdmin` | Διαχείριση blog |
| `coursemaintenance` | Αντίγραφο ασφαλείας και αποκατάσταση μαθήματος |
| `catalogue` | Κατάλογοι μαθημάτων και συνεδριών |

## Κύριες Διαδρομές

| Διαδρομή | View | Περιγραφή |
|----------|------|-----------|
| `/` | `AppIndex.vue` (ή προσαρμοσμένο) | Σημείο εισόδου εφαρμογής |
| `/home` | `pages/Home.vue` | Αρχική σελίδα πλατφόρμας |
| `/login` | `pages/Login.vue` | Σελίδα σύνδεσης |
| `/courses` | `views/user/courses/List.vue` | Εγγεγραμμένα μαθήματα χρήστη |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Τρέχουσες συνεδρίες |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Προηγούμενες συνεδρίες |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Επερχόμενες συνεδρίες |
| `/course/:id/home` | `views/course/CourseHome.vue` | Αρχική σελίδα μαθήματος |
| `/account/home` | `views/account/Home.vue` | Προφίλ χρήστη |
| `/admin` | Admin views | Πίνακας διαχείρισης |
| `/faq` | `pages/Faq.vue` | Σελίδα ΣΣΣ |

## Φύλακες Διαδρομών

Το router χρησιμοποιεί φύλακες πλοήγησης (δηλωμένους με `beforeEach` και `afterEach`) για να:

* Ελέγχει την κατάσταση πιστοποίησης μέσω `useSecurityStore` και να ανακατευθύνει μη πιστοποιημένους χρήστες στο `/login`
* Επαληθεύει το πλαίσιο μαθήματος μέσω `useCidReqStore`
* Εφαρμόζει CSS κλάσεις τύπου σελίδας κατά την πλοήγηση SPA (αντικαθιστώντας αυτό που θα έκανε το Twig's `PageHelper` σε πλήρη φόρτωση σελίδας)
* Υποστηρίζει προσαρμοσμένες παρακάμψεις προτύπων Vue — το συστατικό εισόδου στο `/` αντικαθίσταται με προσαρμοσμένο `AppIndex.vue` όταν ενεργοποιείται προσαρμοσμένο Vue πρότυπο (`var/vue_templates/pages/AppIndex.vue`)

## Οργάνωση Views

Τα views βρίσκονται στο `assets/vue/views/`, οργανωμένα ανά χαρακτηριστικό:

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