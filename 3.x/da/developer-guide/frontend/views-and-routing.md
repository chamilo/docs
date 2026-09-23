# Views og routing

Chamilo har et stort sæt Vue-views (komponenter på sideniveau) forbundet via Vue Router. De faktiske filer ligger under `assets/vue/views/`.

## Routerarkitektur

Routeren er defineret i `assets/vue/router/index.js` ved brug af `createWebHistory` til rene URL'er.

Ruter er modulære — organiseret i rutefiler pr. funktion, som importeres i hovedrouteren:

| Rutemodul | Sider |
|-------------|-------|
| `admin` | Sider i administrationspanelet |
| `sessionAdmin` | Sider til sessionsadministration |
| `course` | Kursusliste, oprettelse, startside, katalog |
| `account` | Brugerprofil og indstillinger |
| `personalfile` | Personligt filområde |
| `message` | Beskeder / indbakke |
| `user` | Sider til brugeradministration |
| `usergroup` | Sider til brugergrupper (klasser) |
| `userreluser` | Sider til brugerrelationer (ven/følg) |
| `ccalendarevent` | Kursuskalender og dagsorden |
| `ctoolintro` | Introduktionssider til kursusværktøjer |
| `page` | Statiske CMS-sider |
| `pageLayout` | Wrappere til sidelayout |
| `publicPage` | Offentligt tilgængelige sider |
| `social` | Sider til socialt netværk |
| `filemanager` | Filhåndtering (browser til kursusdokumenter) |
| `skill` | Sider til færdigheder og kompetencer |
| `accessurl` | Sider til administration af flere URL'er (portal) |
| `branch` | Sider til afdelinger / netværkscampus |
| `room` | Sider til virtuelle rum |
| `buycourses` | Sider til køb af kurser |
| `documents` | Dokumenthåndtering |
| `assignments` | Arbejdsgang for opgaver |
| `links` | Administration af eksterne links |
| `glossary` | Administration af glossar |
| `attendance` | Fremmødeovervågning |
| `lp` | Afspiller og editor til læringsstier |
| `dropbox` | Dropbox / filudveksling |
| `blog` | Blogsider |
| `blogAdmin` | Blogadministration |
| `coursemaintenance` | Sikkerhedskopiering og gendannelse af kurser |
| `catalogue` | Kataloger over kurser og sessioner |

## Centrale ruter

| Sti | View | Beskrivelse |
|------|------|-------------|
| `/` | `AppIndex.vue` (eller tilpasset) | Applikationens indgangspunkt |
| `/home` | `pages/Home.vue` | Platformens startside |
| `/login` | `pages/Login.vue` | Loginside |
| `/courses` | `views/user/courses/List.vue` | Brugerens tilmeldte kurser |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Aktuelle sessioner |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Tidligere sessioner |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Kommende sessioner |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kursusstartside |
| `/account/home` | `views/account/Home.vue` | Brugerprofil |
| `/admin` | Admin-views | Administrationspanel |
| `/faq` | `pages/Faq.vue` | FAQ-side |

## Ruteguards

Routeren bruger navigationsguards (erklæret med `beforeEach` og `afterEach`) til at:

* Kontrollere autentificeringsstatus via `useSecurityStore` og omdirigere uautentificerede brugere til `/login`
* Verificere kursuskontekst via `useCidReqStore`
* Anvende CSS-klasser for sidetype under SPA-navigation (som erstatning for det, Twigs `PageHelper` ville gøre ved en fuld sideindlæsning)
* Understøtte tilpassede Vue-skabelonoverskrivninger — indgangskomponenten på `/` udskiftes med en tilpasset `AppIndex.vue`, når en tilpasset Vue-skabelon er aktiveret (`var/vue_templates/pages/AppIndex.vue`)

## Organisering af views

Views ligger i `assets/vue/views/` og er organiseret efter funktion:

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