# Views und Routing

Chamilo verfügt über eine große Menge an Vue-Views (seitenbezogene Komponenten), die über Vue Router verbunden sind. Die eigentlichen Dateien befinden sich unter `assets/vue/views/`.

## Router-Architektur

Der Router ist in `assets/vue/router/index.js` definiert und verwendet `createWebHistory` für saubere URLs.

Routen sind modular aufgebaut — organisiert in feature-spezifischen Routendateien, die in den Hauprouter importiert werden:

| Routenmodul | Seiten |
|-------------|-------|
| `admin` | Seiten des Administrationspanels |
| `sessionAdmin` | Seiten der Session-Administration |
| `course` | Kursliste, Erstellung, Startseite, Katalog |
| `account` | Benutzerprofil und Einstellungen |
| `personalfile` | Persönlicher Dateibereich |
| `message` | Nachrichten / Posteingang |
| `user` | Seiten der Benutzerverwaltung |
| `usergroup` | Seiten der Benutzergruppen (Klassen) |
| `userreluser` | Seiten der Benutzerbeziehungen (Freund/Folgen) |
| `ccalendarevent` | Kurskalender und Agenda |
| `ctoolintro` | Seiten zur Einführung in Kurstools |
| `page` | Statische CMS-Seiten |
| `pageLayout` | Wrapper für Seitenlayouts |
| `publicPage` | Öffentlich zugängliche Seiten |
| `social` | Seiten des sozialen Netzwerks |
| `filemanager` | Dateimanager (Browser für Kursdokumente) |
| `skill` | Seiten für Kompetenzen und Fertigkeiten |
| `accessurl` | Seiten zur Verwaltung mehrerer URLs (Portale) |
| `branch` | Seiten für Zweigstellen / Netzwerk-Campusse |
| `room` | Seiten für virtuelle Räume |
| `buycourses` | Seiten zum Kurskauf |
| `documents` | Dokumentenverwaltung |
| `assignments` | Workflow für Aufgaben |
| `links` | Verwaltung externer Links |
| `glossary` | Glossarverwaltung |
| `attendance` | Anwesenheitserfassung |
| `lp` | Player und Editor für Lernpfade |
| `dropbox` | Dropbox / Dateiaustausch |
| `blog` | Blog-Seiten |
| `blogAdmin` | Blog-Administration |
| `coursemaintenance` | Kurssicherung und -wiederherstellung |
| `catalogue` | Kurs- und Session-Kataloge |

## Wichtige Routen

| Pfad | View | Beschreibung |
|------|------|-------------|
| `/` | `AppIndex.vue` (oder benutzerdefiniert) | Einstiegspunkt der Anwendung |
| `/home` | `pages/Home.vue` | Startseite der Plattform |
| `/login` | `pages/Login.vue` | Anmeldeseite |
| `/courses` | `views/user/courses/List.vue` | Eingeschriebene Kurse des Benutzers |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Aktuelle Sessions |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Vergangene Sessions |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Bevorstehende Sessions |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kursstartseite |
| `/account/home` | `views/account/Home.vue` | Benutzerprofil |
| `/admin` | Admin-Views | Administrationspanel |
| `/faq` | `pages/Faq.vue` | FAQ-Seite |

## Route Guards

Der Router verwendet Navigations-Guards (deklariert mit `beforeEach` und `afterEach`), um:

* Den Authentifizierungsstatus über `useSecurityStore` zu prüfen und nicht authentifizierte Benutzer nach `/login` umzuleiten
* Den Kurskontext über `useCidReqStore` zu verifizieren
* CSS-Klassen des Seitentypps während der SPA-Navigation anzuwenden (als Ersatz für das, was Twigs `PageHelper` bei einem vollständigen Seitenladen tun würde)
* Benutzerdefinierte Vue-Template-Overrides zu unterstützen — die Einstiegskomponente unter `/` wird durch eine benutzerdefinierte `AppIndex.vue` ersetzt, wenn ein benutzerdefiniertes Vue-Template aktiviert ist (`var/vue_templates/pages/AppIndex.vue`)

## Organisation der Views

Views liegen in `assets/vue/views/` und sind nach Feature organisiert:

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