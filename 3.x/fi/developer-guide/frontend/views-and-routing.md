# Näkymät ja reititys

Chamilolla on laaja joukko Vue-näkymiä (sivutason komponentteja), jotka on yhdistetty Vue Routerilla. Varsinaiset tiedostot sijaitsevat hakemistossa `assets/vue/views/`.

## Reitittimen arkkitehtuuri

Reititin määritellään tiedostossa `assets/vue/router/index.js` käyttäen `createWebHistory`-toimintoa puhtaita URL-osoitteita varten.

Reitit ovat modulaarisia — ne on organisoitu ominaisuuskohtaisiin reititystiedostoihin, jotka tuodaan pääreitittimeen:

| Reititysmoduuli | Sivut |
|-------------|-------|
| `admin` | Hallintapaneelin sivut |
| `sessionAdmin` | Istuntojen hallintasivut |
| `course` | Kurssiluettelo, luonti, etusivu, katalogi |
| `account` | Käyttäjäprofiili ja asetukset |
| `personalfile` | Henkilökohtainen tiedostotila |
| `message` | Viestintä / saapuneet |
| `user` | Käyttäjähallinnan sivut |
| `usergroup` | Käyttäjäryhmien (luokkien) sivut |
| `userreluser` | Käyttäjäsuhteiden (ystävä/seuraaminen) sivut |
| `ccalendarevent` | Kurssikalenteri ja agenda |
| `ctoolintro` | Kurssityökalujen esittelysivut |
| `page` | Staattiset CMS-sivut |
| `pageLayout` | Sivuasettelun kääreet |
| `publicPage` | Julkisesti saatavilla olevat sivut |
| `social` | Sosiaalisen verkon sivut |
| `filemanager` | Tiedostonhallinta (kurssin asiakirjaselain) |
| `skill` | Taitojen ja osaamisten sivut |
| `accessurl` | Moni-URL- (portaali)hallinnan sivut |
| `branch` | Toimipiste- / verkostokampussivut |
| `room` | Virtuaalihuoneiden sivut |
| `buycourses` | Kurssien ostosivut |
| `documents` | Asiakirjojen hallinta |
| `assignments` | Tehtävätyönkulku |
| `links` | Ulkoisten linkkien hallinta |
| `glossary` | Sanaston hallinta |
| `attendance` | Läsnäolon seuranta |
| `lp` | Oppimispolun soitin ja editori |
| `dropbox` | Dropbox / tiedostovaihto |
| `blog` | Blogisivut |
| `blogAdmin` | Blogin hallinta |
| `coursemaintenance` | Kurssin varmuuskopiointi ja palautus |
| `catalogue` | Kurssi- ja istuntokatalogit |

## Keskeiset reitit

| Polku | Näkymä | Kuvaus |
|------|------|-------------|
| `/` | `AppIndex.vue` (tai mukautettu) | Sovelluksen sisääntulopiste |
| `/home` | `pages/Home.vue` | Alustan etusivu |
| `/login` | `pages/Login.vue` | Kirjautumissivu |
| `/courses` | `views/user/courses/List.vue` | Käyttäjän ilmoittautuneet kurssit |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Nykyiset istunnot |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Menneet istunnot |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Tulevat istunnot |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kurssin etusivu |
| `/account/home` | `views/account/Home.vue` | Käyttäjäprofiili |
| `/admin` | Admin-näkymät | Hallintapaneeli |
| `/faq` | `pages/Faq.vue` | UKK-sivu |

## Reittivahdit

Reititin käyttää navigointivahteja (määritelty `beforeEach`- ja `afterEach`-koukuilla) seuraaviin tarkoituksiin:

* Tarkistaa todennustilan `useSecurityStore`-kaupan kautta ja ohjaa tunnistautumattomat käyttäjät osoitteeseen `/login`
* Varmistaa kurssikontekstin `useCidReqStore`-kaupan kautta
* Soveltaa sivutyypin CSS-luokkia SPA-navigoinnin aikana (korvaa sen, mitä Twigin `PageHelper` tekisi täydessä sivulatauksessa)
* Tukee mukautettuja Vue-mallipohjan ohituksia — sisääntulokomponentti osoitteessa `/` vaihdetaan mukautettuun `AppIndex.vue`-tiedostoon, kun mukautettu Vue-mallipohja on käytössä (`var/vue_templates/pages/AppIndex.vue`)

## Näkymien organisointi

Näkymät sijaitsevat hakemistossa `assets/vue/views/` ja ne on organisoitu ominaisuuden mukaan:

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