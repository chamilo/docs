# Views en routing

Chamilo heeft een grote set Vue-views (componenten op paginaniveau) die via Vue Router zijn verbonden. De daadwerkelijke bestanden staan onder `assets/vue/views/`.

## Routerarchitectuur

De router is gedefinieerd in `assets/vue/router/index.js` met `createWebHistory` voor schone URL's.

Routes zijn modulair — georganiseerd in routebestanden per functionaliteit die in de hoofdrouter worden geïmporteerd:

| Routemodule | Pagina's |
|-------------|-------|
| `admin` | Pagina's van het beheerpaneel |
| `sessionAdmin` | Pagina's voor sessiebeheer |
| `course` | Cursuslijst, aanmaken, startpagina, catalogus |
| `account` | Gebruikersprofiel en instellingen |
| `personalfile` | Persoonlijke bestandsruimte |
| `message` | Berichten / inbox |
| `user` | Pagina's voor gebruikersbeheer |
| `usergroup` | Pagina's voor gebruikersgroepen (klassen) |
| `userreluser` | Pagina's voor gebruikersrelaties (vriend/volgen) |
| `ccalendarevent` | Cursuskalender en agenda |
| `ctoolintro` | Introductiepagina's van cursushulpmiddelen |
| `page` | Statische CMS-pagina's |
| `pageLayout` | Wrappers voor paginalay-out |
| `publicPage` | Openbaar toegankelijke pagina's |
| `social` | Pagina's van het sociale netwerk |
| `filemanager` | Bestandsbeheer (browser voor cursusdocumenten) |
| `skill` | Pagina's voor vaardigheden en competenties |
| `accessurl` | Pagina's voor beheer van meerdere URL's (portaal) |
| `branch` | Pagina's voor vestigingen / netwerkcampussen |
| `room` | Pagina's voor virtuele ruimtes |
| `buycourses` | Pagina's voor cursusaankoop |
| `documents` | Documentbeheer |
| `assignments` | Workflow voor opdrachten |
| `links` | Beheer van externe links |
| `glossary` | Beheer van de woordenlijst |
| `attendance` | Aanwezigheidsregistratie |
| `lp` | Speler en editor voor leerpaden |
| `dropbox` | Dropbox / bestandsuitwisseling |
| `blog` | Blogpagina's |
| `blogAdmin` | Blogbeheer |
| `coursemaintenance` | Back-up en herstel van cursussen |
| `catalogue` | Catalogi van cursussen en sessies |

## Belangrijke routes

| Pad | View | Beschrijving |
|------|------|-------------|
| `/` | `AppIndex.vue` (of aangepast) | Toegangspunt van de toepassing |
| `/home` | `pages/Home.vue` | Startpagina van het platform |
| `/login` | `pages/Login.vue` | Inlogpagina |
| `/courses` | `views/user/courses/List.vue` | Ingeschreven cursussen van de gebruiker |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Huidige sessies |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Afgelopen sessies |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Aankomende sessies |
| `/course/:id/home` | `views/course/CourseHome.vue` | Startpagina van de cursus |
| `/account/home` | `views/account/Home.vue` | Gebruikersprofiel |
| `/admin` | Admin-views | Beheerpaneel |
| `/faq` | `pages/Faq.vue` | FAQ-pagina |

## Route guards

De router gebruikt navigatie-guards (gedeclareerd met `beforeEach` en `afterEach`) om:

* De authenticatiestatus te controleren via `useSecurityStore` en niet-geauthenticeerde gebruikers om te leiden naar `/login`
* De cursuscontext te verifiëren via `useCidReqStore`
* CSS-klassen van het paginatype toe te passen tijdens SPA-navigatie (ter vervanging van wat Twig's `PageHelper` zou doen bij een volledige paginalading)
* Aangepaste Vue-sjabloonoverrides te ondersteunen — de entry-component op `/` wordt vervangen door een aangepaste `AppIndex.vue` wanneer een aangepast Vue-sjabloon is ingeschakeld (`var/vue_templates/pages/AppIndex.vue`)

## Organisatie van views

Views staan in `assets/vue/views/`, georganiseerd per functionaliteit:

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