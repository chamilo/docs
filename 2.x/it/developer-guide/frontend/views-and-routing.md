# Viste e Routing

Chamilo dispone di un ampio insieme di viste Vue (componenti a livello di pagina) collegate tramite Vue Router. I file effettivi si trovano in `assets/vue/views/`.

## Architettura del Router

Il router è definito in `assets/vue/router/index.js` utilizzando `createWebHistory` per URL puliti.

Le rotte sono modulari — organizzate in file di rotte per funzionalità, importati nel router principale:

| Modulo di rotta | Pagine |
|-----------------|--------|
| `admin` | Pagine del pannello di amministrazione |
| `sessionAdmin` | Pagine di amministrazione delle sessioni |
| `course` | Elenco corsi, creazione, home, catalogo |
| `account` | Profilo utente e impostazioni |
| `personalfile` | Spazio file personale |
| `message` | Messaggistica / casella di posta |
| `user` | Pagine di gestione utenti |
| `usergroup` | Pagine dei gruppi utente (classi) |
| `userreluser` | Pagine delle relazioni utente (amici/seguiti) |
| `ccalendarevent` | Calendario e agenda del corso |
| `ctoolintro` | Pagine di introduzione agli strumenti del corso |
| `page` | Pagine CMS statiche |
| `pageLayout` | Wrapper per il layout delle pagine |
| `publicPage` | Pagine accessibili pubblicamente |
| `social` | Pagine del social network |
| `filemanager` | Gestore file (browser dei documenti del corso) |
| `skill` | Pagine delle competenze e abilità |
| `accessurl` | Pagine di gestione multi-URL (portale) |
| `branch` | Pagine delle sedi/reti campus |
| `room` | Pagine delle stanze virtuali |
| `buycourses` | Pagine per l'acquisto di corsi |
| `documents` | Gestione documenti |
| `assignments` | Flusso di lavoro per i compiti |
| `links` | Gestione dei link esterni |
| `glossary` | Gestione del glossario |
| `attendance` | Monitoraggio delle presenze |
| `lp` | Player ed editor del percorso di apprendimento |
| `dropbox` | Dropbox / scambio file |
| `blog` | Pagine del blog |
| `blogAdmin` | Amministrazione del blog |
| `coursemaintenance` | Backup e ripristino del corso |
| `catalogue` | Cataloghi di corsi e sessioni |

## Rotte Principali

| Percorso | Vista | Descrizione |
|----------|-------|-------------|
| `/` | `AppIndex.vue` (o personalizzato) | Punto di ingresso dell'applicazione |
| `/home` | `pages/Home.vue` | Pagina iniziale della piattaforma |
| `/login` | `pages/Login.vue` | Pagina di accesso |
| `/courses` | `views/user/courses/List.vue` | Corsi a cui l'utente è iscritto |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessioni correnti |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessioni passate |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessioni future |
| `/course/:id/home` | `views/course/CourseHome.vue` | Homepage del corso |
| `/account/home` | `views/account/Home.vue` | Profilo utente |
| `/admin` | Viste Admin | Pannello di amministrazione |
| `/faq` | `pages/Faq.vue` | Pagina delle FAQ |

## Guardie di Rotta

Il router utilizza guardie di navigazione (dichiarate con `beforeEach` e `afterEach`) per:

* Verificare lo stato di autenticazione tramite `useSecurityStore` e reindirizzare gli utenti non autenticati a `/login`
* Verificare il contesto del corso tramite `useCidReqStore`
* Applicare classi CSS per il tipo di pagina durante la navigazione SPA (sostituendo ciò che farebbe `PageHelper` di Twig durante un caricamento completo della pagina)
* Supportare override di template Vue personalizzati — il componente di ingresso a `/` viene sostituito con un `AppIndex.vue` personalizzato quando è abilitato un template Vue personalizzato (`var/vue_templates/pages/AppIndex.vue`)

## Organizzazione delle Viste

Le viste si trovano in `assets/vue/views/`, organizzate per funzionalità:

```
views/
├── account/          # Profilo utente e impostazioni
├── admin/            # Pagine di amministrazione
├── assignments/      # Invio e valutazione dei compiti
├── attendance/       # Fogli di presenza
├── blog/             # Post e commenti del blog
├── branch/           # Gestione delle sedi/reti campus
├── buycourses/       # Flusso di acquisto corsi
├── ccalendarevent/   # Calendario del corso
├── course/           # Elenco corsi, home, creazione, catalogo
├── coursecategory/   # Gestione delle categorie di corsi
├── coursemaintenance/# Backup/ripristino del corso
├── ctoolintro/       # Pagine di introduzione agli strumenti
├── documents/        # Elenco documenti, creazione, generazione media
├── dropbox/          # Dropbox / scambio file
├── filemanager/      # Browser dei file
├── glossary/         # Elenco glossario e gestione termini
├── links/            # Link esterni
├── lp/               # Player ed editor del percorso di apprendimento
├── message/          # Casella di posta e messaggistica
├── page/             # Pagine CMS statiche
├── pageLayout/       # Wrapper per il layout delle pagine
├── personalfile/     # Spazio file personale
├── room/             # Stanze virtuali
├── sessionadmin/     # Amministrazione delle sessioni
├── skill/            # Competenze e abilità
├── social/           # Social network
├── terms/            # Termini di servizio
├── user/             # Gestione utenti ed elenchi corsi/sessioni
├── usergroup/        # Gruppi utente (classi)
└── userreluser/      # Relazioni utente (amici/seguiti)
```