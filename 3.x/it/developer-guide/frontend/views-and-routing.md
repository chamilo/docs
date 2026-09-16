# Views and Routing

Chamilo dispone di un ampio insieme di view Vue (componenti a livello di pagina) collegate tramite Vue Router. I file effettivi si trovano in `assets/vue/views/`.

## Router Architecture

Il router è definito in `assets/vue/router/index.js` utilizzando `createWebHistory` per URL puliti.

Le route sono modulari — organizzate in file di route per funzionalità importati nel router principale:

| Route module | Pages |
|-------------|-------|
| `admin` | Pagine del pannello di amministrazione |
| `sessionAdmin` | Pagine di amministrazione delle sessioni |
| `course` | Elenco corsi, creazione, home, catalogo |
| `account` | Profilo utente e impostazioni |
| `personalfile` | Spazio file personali |
| `message` | Messaggistica / casella di posta |
| `user` | Pagine di gestione utenti |
| `usergroup` | Pagine dei gruppi utente (classi) |
| `userreluser` | Pagine delle relazioni tra utenti (amici/segui) |
| `ccalendarevent` | Calendario e agenda del corso |
| `ctoolintro` | Pagine di introduzione agli strumenti del corso |
| `page` | Pagine CMS statiche |
| `pageLayout` | Wrapper di layout delle pagine |
| `publicPage` | Pagine accessibili pubblicamente |
| `social` | Pagine del social network |
| `filemanager` | File manager (browser dei documenti del corso) |
| `skill` | Pagine di competenze e competency |
| `accessurl` | Pagine di gestione multi-URL (portale) |
| `branch` | Pagine di campus di rete / branch |
| `room` | Pagine delle aule virtuali |
| `buycourses` | Pagine di acquisto dei corsi |
| `documents` | Gestione documenti |
| `assignments` | Flusso di lavoro dei compiti |
| `links` | Gestione dei collegamenti esterni |
| `glossary` | Gestione del glossario |
| `attendance` | Rilevazione delle presenze |
| `lp` | Player e editor dei learning path |
| `dropbox` | Dropbox / scambio file |
| `blog` | Pagine del blog |
| `blogAdmin` | Amministrazione del blog |
| `coursemaintenance` | Backup e ripristino del corso |
| `catalogue` | Cataloghi di corsi e sessioni |

## Key Routes

| Path | View | Description |
|------|------|-------------|
| `/` | `AppIndex.vue` (or custom) | Punto di ingresso dell'applicazione |
| `/home` | `pages/Home.vue` | Home page della piattaforma |
| `/login` | `pages/Login.vue` | Pagina di login |
| `/courses` | `views/user/courses/List.vue` | Corsi a cui l'utente è iscritto |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessioni correnti |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessioni passate |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessioni imminenti |
| `/course/:id/home` | `views/course/CourseHome.vue` | Homepage del corso |
| `/account/home` | `views/account/Home.vue` | Profilo utente |
| `/admin` | Admin views | Pannello di amministrazione |
| `/faq` | `pages/Faq.vue` | Pagina FAQ |

## Route Guards

Il router utilizza i navigation guard (dichiarati con `beforeEach` e `afterEach`) per:

* Verificare lo stato di autenticazione tramite `useSecurityStore` e reindirizzare gli utenti non autenticati a `/login`
* Verificare il contesto del corso tramite `useCidReqStore`
* Applicare classi CSS di tipo pagina durante la navigazione SPA (sostituendo ciò che il `PageHelper` di Twig farebbe in un caricamento di pagina completo)
* Supportare gli override dei template Vue personalizzati — il componente di ingresso in `/` viene sostituito da un `AppIndex.vue` personalizzato quando è abilitato un template Vue personalizzato (`var/vue_templates/pages/AppIndex.vue`)

## View Organization

Le view si trovano in `assets/vue/views/`, organizzate per funzionalità:

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