# Visninger og ruting

Chamilo har et stort sett Vue-visninger (sidekomponenter) koblet via Vue Router. Selve filene ligger under `assets/vue/views/`.

## Ruterarkitektur

Ruteren er definert i `assets/vue/router/index.js` ved bruk av `createWebHistory` for rene URL-er.

Ruter er modulære — organisert i rutefiler per funksjon som importeres inn i hovedruteren:

| Rutemodul | Sider |
|-------------|-------|
| `admin` | Sider i administrasjonspanelet |
| `sessionAdmin` | Sider for sesjonsadministrasjon |
| `course` | Kursliste, opprettelse, hjem, katalog |
| `account` | Brukerprofil og innstillinger |
| `personalfile` | Personlig filområde |
| `message` | Meldinger / innboks |
| `user` | Sider for brukeradministrasjon |
| `usergroup` | Sider for brukergrupper (klasser) |
| `userreluser` | Sider for brukerrelasjoner (venn/følg) |
| `ccalendarevent` | Kurskalender og agenda |
| `ctoolintro` | Sider for innledning til kursverktøy |
| `page` | Statiske CMS-sider |
| `pageLayout` | Omslag for sidelayout |
| `publicPage` | Offentlig tilgjengelige sider |
| `social` | Sider for sosialt nettverk |
| `filemanager` | Filbehandler (nettleser for kursdokumenter) |
| `skill` | Sider for ferdigheter og kompetanser |
| `accessurl` | Sider for administrasjon av flere URL-er (portal) |
| `branch` | Sider for avdeling / nettverkscampus |
| `room` | Sider for virtuelle rom |
| `buycourses` | Sider for kurskjøp |
| `documents` | Dokumentadministrasjon |
| `assignments` | Arbeidsflyt for innleveringer |
| `links` | Administrasjon av eksterne lenker |
| `glossary` | Ordlisteadministrasjon |
| `attendance` | Fraværsregistrering |
| `lp` | Avspiller og redigerer for læringssti |
| `dropbox` | Dropbox / filutveksling |
| `blog` | Bloggsider |
| `blogAdmin` | Bloggadministrasjon |
| `coursemaintenance` | Sikkerhetskopi og gjenoppretting av kurs |
| `catalogue` | Kataloger for kurs og sesjoner |

## Viktige ruter

| Sti | Visning | Beskrivelse |
|------|------|-------------|
| `/` | `AppIndex.vue` (eller tilpasset) | Inngangspunkt for applikasjonen |
| `/home` | `pages/Home.vue` | Plattformens hjemmeside |
| `/login` | `pages/Login.vue` | Innloggingsside |
| `/courses` | `views/user/courses/List.vue` | Brukerens påmeldte kurs |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Gjeldende sesjoner |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Tidligere sesjoner |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Kommende sesjoner |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kursets hjemmeside |
| `/account/home` | `views/account/Home.vue` | Brukerprofil |
| `/admin` | Admin-visninger | Administrasjonspanel |
| `/faq` | `pages/Faq.vue` | FAQ-side |

## Ruteguards

Ruteren bruker navigasjonsguards (deklarert med `beforeEach` og `afterEach`) for å:

* Kontrollere autentiseringsstatus via `useSecurityStore` og omdirigere uautentiserte brukere til `/login`
* Verifisere kurskontekst via `useCidReqStore`
* Anvende CSS-klasser for sidetype under SPA-navigasjon (som erstatter det Twigs `PageHelper` ville gjort ved full sideinnlasting)
* Støtte tilpassede Vue-maloverstyringer — inngangskomponenten på `/` byttes ut med en tilpasset `AppIndex.vue` når en tilpasset Vue-mal er aktivert (`var/vue_templates/pages/AppIndex.vue`)

## Organisering av visninger

Visninger ligger i `assets/vue/views/`, organisert etter funksjon:

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