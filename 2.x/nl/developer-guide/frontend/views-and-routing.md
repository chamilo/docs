# Weergaven en Routering

Chamilo beschikt over een uitgebreide set Vue-weergaven (componenten op paginaniveau) die verbonden zijn via Vue Router. De daadwerkelijke bestanden bevinden zich onder `assets/vue/views/`.

## Router Architectuur

De router is gedefinieerd in `assets/vue/router/index.js` met gebruik van `createWebHistory` voor schone URL's.

Routes zijn modulair — georganiseerd in routebestanden per functie die worden geïmporteerd in de hoofdrouter:

| Routemodule | Pagina's |
|-------------|----------|
| `admin` | Beheerpanelen |
| `sessionAdmin` | Sessiebeheerderspagina's |
| `course` | Cursuslijst, aanmaak, startpagina, catalogus |
| `account` | Gebruikersprofiel en instellingen |
| `personalfile` | Persoonlijke bestandsruimte |
| `message` | Berichten / inbox |
| `user` | Gebruikersbeheerpagina's |
| `usergroup` | Gebruikersgroep (klas) pagina's |
| `userreluser` | Gebruikersrelatie (vriend/volgen) pagina's |
| `ccalendarevent` | Cursuskalender en agenda |
| `ctoolintro` | Introductiepagina's voor cursusgereedschappen |
| `page` | Statische CMS-pagina's |
| `pageLayout` | Paginalay-out wrappers |
| `publicPage` | Publiek toegankelijke pagina's |
| `social` | Sociale netwerkpagina's |
| `filemanager` | Bestandsbeheerder (cursusdocumentenbrowser) |
| `skill` | Vaardigheden en competentiepagina's |
| `accessurl` | Multi-URL (portaal) beheerpagina's |
| `branch` | Filiaal / netwerkcampussen pagina's |
| `room` | Virtuele ruimte pagina's |
| `buycourses` | Cursusaankoop pagina's |
| `documents` | Documentbeheer |
| `assignments` | Opdrachtenworkflow |
| `links` | Beheer van externe links |
| `glossary` | Woordenlijstbeheer |
| `attendance` | Aanwezigheidsregistratie |
| `lp` | Leerpadspeler en -editor |
| `dropbox` | Dropbox / bestandsuitwisseling |
| `blog` | Blogpagina's |
| `blogAdmin` | Blogbeheer |
| `coursemaintenance` | Cursusback-up en herstel |
| `catalogue` | Cursus- en sessiecatalogi |

## Belangrijke Routes

| Pad | Weergave | Beschrijving |
|------|----------|--------------|
| `/` | `AppIndex.vue` (of aangepast) | Toegangspunt van de applicatie |
| `/home` | `pages/Home.vue` | Startpagina van het platform |
| `/login` | `pages/Login.vue` | Inlogpagina |
| `/courses` | `views/user/courses/List.vue` | Cursussen waarvoor de gebruiker is ingeschreven |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Huidige sessies |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Voorbije sessies |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Aankomende sessies |
| `/course/:id/home` | `views/course/CourseHome.vue` | Startpagina van de cursus |
| `/account/home` | `views/account/Home.vue` | Gebruikersprofiel |
| `/admin` | Beheerweergaven | Beheerpaneel |
| `/faq` | `pages/Faq.vue` | FAQ-pagina |

## Routebewaking

De router gebruikt navigatiebewakers (gedeclareerd met `beforeEach` en `afterEach`) om:

* De authenticatiestatus te controleren via `useSecurityStore` en niet-geauthenticeerde gebruikers door te sturen naar `/login`
* De cursuscontext te verifiëren via `useCidReqStore`
* CSS-klassen voor paginatypes toe te passen tijdens SPA-navigatie (ter vervanging van wat Twig's `PageHelper` zou doen bij een volledige paginalading)
* Aangepaste Vue-sjabloonoverschrijvingen te ondersteunen — het toegangsonderdeel op `/` wordt vervangen door een aangepaste `AppIndex.vue` wanneer een aangepast Vue-sjabloon is ingeschakeld (`var/vue_templates/pages/AppIndex.vue`)

## Organisatie van Weergaven

Weergaven bevinden zich in `assets/vue/views/`, georganiseerd per functie:

```
views/
├── account/          # Gebruikersprofiel en instellingen
├── admin/            # Beheerpagina's
├── assignments/      # Opdrachten indienen en beoordelen
├── attendance/       # Aanwezigheidslijsten
├── blog/             # Blogberichten en reacties
├── branch/           # Netwerkcampusbeheer
├── buycourses/       # Cursusaankoopproces
├── ccalendarevent/   # Cursuskalender
├── course/           # Cursuslijst, startpagina, aanmaak, catalogus
├── coursecategory/   # Cursuscategoriebeheer
├── coursemaintenance/# Cursusback-up/herstel
├── ctoolintro/       # Introductiepagina's voor gereedschappen
├── documents/        # Documentlijst, aanmaak, mediageneratie
├── dropbox/          # Dropbox / bestandsuitwisseling
├── filemanager/      # Bestandsbrowser
├── glossary/         # Woordenlijst en termenbeheer
├── links/            # Externe links
├── lp/               # Leerpadspeler en -editor
├── message/          # Inbox en berichten
├── page/             # CMS statische pagina's
├── pageLayout/       # Paginalay-out wrappers
├── personalfile/     # Persoonlijke bestandsruimte
├── room/             # Virtuele ruimtes
├── sessionadmin/     # Sessiebeheer
├── skill/            # Vaardigheden en competenties
├── social/           # Sociaal netwerk
├── terms/            # Gebruiksvoorwaarden
├── user/             # Gebruikersbeheer en cursus-/sessielijsten
├── usergroup/        # Gebruikersgroepen (klassen)
└── userreluser/      # Gebruikersrelaties (vrienden/volgers)
```