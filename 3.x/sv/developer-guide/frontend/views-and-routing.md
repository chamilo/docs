# Vyer och routing

Chamilo har en stor uppsättning Vue-vyer (komponenter på sidnivå) som kopplas samman via Vue Router. De faktiska filerna ligger under `assets/vue/views/`.

## Routerarkitektur

Routern definieras i `assets/vue/router/index.js` med `createWebHistory` för rena URL:er.

Rutter är modulära — organiserade i ruttfiler per funktion som importeras till huvudroutern:

| Ruttmodul | Sidor |
|-------------|-------|
| `admin` | Sidor i administrationspanelen |
| `sessionAdmin` | Sidor för sessionsadministration |
| `course` | Kurslista, skapande, startsida, katalog |
| `account` | Användarprofil och inställningar |
| `personalfile` | Personligt filutrymme |
| `message` | Meddelanden / inkorg |
| `user` | Sidor för användarhantering |
| `usergroup` | Sidor för användargrupper (klasser) |
| `userreluser` | Sidor för användarrelationer (vän/följ) |
| `ccalendarevent` | Kurskalender och agenda |
| `ctoolintro` | Sidor för introduktion till kursverktyg |
| `page` | Statiska CMS-sidor |
| `pageLayout` | Omslag för sidlayout |
| `publicPage` | Offentligt tillgängliga sidor |
| `social` | Sidor för socialt nätverk |
| `filemanager` | Filhanterare (webbläsare för kursdokument) |
| `skill` | Sidor för färdigheter och kompetenser |
| `accessurl` | Sidor för hantering av flera URL:er (portal) |
| `branch` | Sidor för filial / nätverkscampus |
| `room` | Sidor för virtuella rum |
| `buycourses` | Sidor för kursköp |
| `documents` | Dokumenthantering |
| `assignments` | Arbetsflöde för uppgifter |
| `links` | Hantering av externa länkar |
| `glossary` | Glossariehantering |
| `attendance` | Närvaroregistrering |
| `lp` | Spelare och redigerare för lärstig |
| `dropbox` | Dropbox / filutbyte |
| `blog` | Bloggsidor |
| `blogAdmin` | Bloggadministration |
| `coursemaintenance` | Säkerhetskopiering och återställning av kurs |
| `catalogue` | Kataloger för kurser och sessioner |

## Viktiga rutter

| Sökväg | Vy | Beskrivning |
|------|------|-------------|
| `/` | `AppIndex.vue` (eller anpassad) | Programmets ingångspunkt |
| `/home` | `pages/Home.vue` | Plattformens startsida |
| `/login` | `pages/Login.vue` | Inloggningssida |
| `/courses` | `views/user/courses/List.vue` | Användarens registrerade kurser |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Aktuella sessioner |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Tidigare sessioner |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Kommande sessioner |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kursens startsida |
| `/account/home` | `views/account/Home.vue` | Användarprofil |
| `/admin` | Admin-vyer | Administrationspanel |
| `/faq` | `pages/Faq.vue` | FAQ-sida |

## Ruttvakter

Routern använder navigeringsvakter (deklarerade med `beforeEach` och `afterEach`) för att:

* Kontrollera autentiseringsstatus via `useSecurityStore` och omdirigera oautentiserade användare till `/login`
* Verifiera kurskontext via `useCidReqStore`
* Tillämpa CSS-klasser för sidtyp under SPA-navigering (ersätter vad Twigs `PageHelper` skulle göra vid en full sidladdning)
* Stödja anpassade Vue-mallöverstyrningar — ingångskomponenten på `/` byts ut mot en anpassad `AppIndex.vue` när en anpassad Vue-mall är aktiverad (`var/vue_templates/pages/AppIndex.vue`)

## Vyorganisation

Vyer finns i `assets/vue/views/`, organiserade efter funktion:

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