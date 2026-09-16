# Struttura del Progetto

## Directory di Livello Superiore

```
chamilo/
├── assets/          # Codice sorgente frontend
│   ├── vue/         # Applicazione Vue 3 (componenti, viste, router, store)
│   ├── css/         # Fogli di stile SCSS
│   └── js/          # JavaScript legacy
├── config/          # Configurazione Symfony (rotte, servizi, pacchetti)
├── public/          # Radice web (index.php, pagine PHP legacy, plugin)
│   ├── main/        # Moduli PHP legacy (una sottodirectory per strumento)
│   └── plugin/      # Plugin integrati e personalizzati
├── src/             # Codice sorgente PHP (bundle Symfony)
│   ├── CoreBundle/  # Logica della piattaforma principale
│   ├── CourseBundle/# Funzionalità specifiche dei corsi
│   └── LtiBundle/   # Integrazione LTI 1.3
├── templates/       # Template Twig
├── var/             # Cache, log, upload (generati)
├── vendor/          # Dipendenze Composer (generate)
├── node_modules/    # Dipendenze npm (generate)
└── translations/    # File di traduzione
```

## Codice Sorgente (`src/`)

### CoreBundle

Il bundle più grande. Sottodirectory degne di nota:

| Directory | Contenuti |
|-----------|-----------|
| `Entity/` | Entità Doctrine (User, Course, Session, ResourceNode, ecc.) |
| `Controller/` | Controller per amministrazione, azioni API e pagine (la sottocartella Api/ contiene azioni personalizzate di API Platform) |
| `Settings/` | File di schema delle impostazioni (configurazione della piattaforma) |
| `Repository/` | Repository Doctrine |
| `AiProvider/` | Implementazioni di provider AI (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definizioni degli strumenti del corso |
| `Security/` | Voter, autenticatori, autorizzazioni |
| `EventListener/` | Listener di eventi |
| `EventSubscriber/` | Sottoscrittori di eventi |
| `Command/` | Comandi della console Symfony |
| `Migrations/` | Migrazioni del database |
| `Twig/` | Estensioni Twig |
| `Storage/` | Adattatori di storage Flysystem |

### CourseBundle

Entità e logica specifiche dei corsi:

| Directory | Contenuti |
|-----------|-----------|
| `Entity/` | Entità dei contenuti del corso (CDocument, CQuiz, CLp, CForum, CStudentPublication, ecc.) |
| `Controller/` | Controller dei corsi |
| `Settings/` | Schemi delle impostazioni a livello di corso |
| `Component/CourseCopy/` | Importazione/esportazione dei corsi (Common Cartridge, Moodle) |

### LtiBundle

Integrazione LTI 1.3:

| Directory | Contenuti |
|-----------|-----------|
| `Entity/` | Entità di piattaforma, strumento e distribuzione LTI |
| `Controller/` | Endpoint di avvio e configurazione LTI |

---
## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Punto di ingresso dell'applicazione
├── main_installer.js    # Punto di ingresso dell'installatore
├── components/          # Componenti Vue riutilizzabili
│   ├── accessurl/       # Componenti multi-URL (portale)
│   ├── admin/           # Componenti specifici per l'amministratore
│   ├── assignments/     # Moduli e elenchi per i compiti
│   ├── attendance/      # Componenti per il foglio di presenza
│   ├── basecomponents/  # Componenti di base condivisi (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, ecc.) e ChamiloIcons.js
│   ├── blog/            # Componenti per il blog
│   ├── branch/          # Componenti per campus di rete/filiale
│   ├── ccalendarevent/  # Componenti per eventi del calendario del corso
│   ├── chat/            # Chat e tutor AI
│   ├── course/          # Schede corso, cataloghi, moduli
│   ├── coursecategory/  # Componenti per categorie di corsi
│   ├── coursemaintenance/ # Componenti per backup/ripristino del corso
│   ├── ctoolintro/      # Componenti per l'introduzione agli strumenti del corso
│   ├── documents/       # Componenti per la gestione dei documenti
│   ├── dropbox/         # Componenti per Dropbox (scambio file)
│   ├── filemanager/     # Componenti per il browser di file
│   ├── glossary/        # Componenti per il glossario
│   ├── installer/       # Procedura guidata di installazione
│   ├── layout/          # Sidebar, Topbar, layout della shell
│   ├── links/           # Componenti per collegamenti esterni
│   ├── login/           # Componenti per il modulo di accesso
│   ├── lp/              # Componenti per il percorso di apprendimento
│   ├── message/         # Componenti per la messaggistica
│   ├── page/            # Componenti per pagine statiche
│   ├── pageLayout/      # Componenti wrapper per il layout di pagina
│   ├── personalfile/    # Componenti per lo spazio file personale
│   ├── platform/        # Componenti UI a livello di piattaforma
│   ├── resource_links/  # Componenti per la gestione dei collegamenti alle risorse
│   ├── room/            # Componenti per stanze virtuali
│   ├── session/         # Componenti per sessioni (campagne di apprendimento)
│   ├── sessionadmin/    # Componenti per l'amministrazione delle sessioni
│   ├── skill/           # Componenti per competenze e abilità
│   ├── social/          # Componenti per il social network
│   ├── systemannouncement/ # Componenti per annunci di sistema
│   ├── user/            # Componenti per il profilo e la gestione degli utenti
│   ├── usergroup/       # Componenti per gruppi di utenti (classi)
│   └── userreluser/     # Componenti per relazioni tra utenti (amico/segui)
├── views/               # Viste Vue a livello di pagina (rispecchia la struttura di components/)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + un modulo per area funzionale)
├── store/               # Store Pinia
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Funzioni di composizione condivise (sottodirectory per funzionalità)
├── services/            # Livello di servizio API (un file per entità/dominio)
├── utils/               # Helper di utilità (date, hydra, fetch, sanitizeHtml, ecc.)
├── config/              # Configurazione runtime (api.js, env.js)
├── constants/           # Costanti condivise
│   └── entity/          # Costanti specifiche per entità (sessione, messaggio, campo extra, ecc.)
├── layouts/             # Componenti di layout di alto livello (MyCourses.vue)
├── pages/               # Componenti di pagina standalone (Home, Login, Faq, Demo)
├── mixins/              # Mixin in stile Vue 2 legacy (ListMixin, CreateMixin, ecc.)
├── hooks/               # Hook componibili (useSidebar, useState)
├── plugins/             # Registrazioni di plugin Vue (httpErrors, vuetify)
├── validators/          # Validatori personalizzati Vuelidate
└── error/               # Componenti per la gestione degli errori
```

## Configurazione (`config/`)

```
config/
├── packages/            # Configurazione di bundle e framework (un file YAML per pacchetto)
│   ├── security.yaml    # Gerarchia dei ruoli, firewall, controllo accessi
│   ├── doctrine.yaml    # Impostazioni di Doctrine ORM e DBAL
│   ├── api_platform.yaml# Configurazione di API Platform
│   ├── framework.yaml   # Impostazioni principali di Symfony
│   ├── lexik_jwt_authentication.yaml  # Impostazioni dei token JWT
│   ├── nelmio_cors.yaml # Intestazioni CORS per i consumatori API
│   ├── oneup_flysystem.yaml  # Adattatori per l'archiviazione cloud
│   ├── webpack_encore.yaml   # Integrazione con Webpack Encore
│   ├── ... (oltre 30 file di pacchetto)
│   ├── dev/             # Sovrascritture solo per lo sviluppo (web profiler, debug, routing)
│   ├── prod/            # Sovrascritture solo per la produzione (attualmente placeholder vuoto)
│   └── test/            # Sovrascritture per l'ambiente di test (JWT, validatore, web profiler)
├── routes/              # Definizioni dei percorsi
│   ├── api_platform.yaml     # Prefisso dei percorsi di API Platform
│   ├── attributes.yaml       # Percorsi basati su annotazioni dei controller
│   ├── fos_js_routing.yaml   # Esposizione di FOS JS Routing
│   ├── legacy.yaml           # Percorsi per pagine PHP legacy sotto public/main/
│   ├── security.yaml         # Percorsi per login/logout/OAuth2
│   ├── dev/                  # Percorsi solo per lo sviluppo (profiler, bundle Maker)
│   └── test/                 # Sovrascritture dei percorsi solo per i test
├── jwt/                 # Coppia di chiavi JWT (chiavi private/pubbliche)
└── jwt-test/            # Chiavi JWT per l'ambiente di test
```

Symfony unisce automaticamente i file di base `packages/*.yaml` con quelli nella sottodirectory dell'ambiente corrispondente (`dev/`, `prod/` o `test/`), quindi i file specifici per ambiente devono solo sovrascrivere i valori che differiscono.

## Configurazione della Build

| File | Scopo |
|------|-------|
| `webpack.config.js` | Configurazione di Webpack Encore (entry point, loader, plugin) |
| `tailwind.config.js` | Configurazione di Tailwind CSS (percorsi dei contenuti, estensioni del tema, plugin) |
| `tsconfig.json` | Configurazione di TypeScript |
| `eslint.config.mjs` | Regole di ESLint (configurazione flat) |
| `.prettierrc.json` | Regole di formattazione di Prettier |

Tutti i file si trovano alla radice del progetto. I plugin PostCSS (Tailwind + Autoprefixer) sono configurati inline all'interno di `webpack.config.js` tramite `enablePostCssLoader()` — non esiste un file standalone `postcss.config.js`. `webpack.config.js` legge `tailwind.config.js` indirettamente tramite PostCSS, quindi le modifiche alle sezioni `content` o `theme` di Tailwind avranno effetto al successivo avvio di `yarn encore dev` / `yarn encore production`.

## Entry Point di Webpack

La build produce questi bundle:

**JavaScript:**
* `vue` — Applicazione principale Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Wizard di installazione (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS legacy per pagine non ancora migrate a Vue

**CSS:**
* `app` — Foglio di stile principale (`assets/css/app.scss`)
* Più fogli specializzati: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Struttura CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Punto di ingresso — importa Tailwind, l'indice SCSS e CSS di terze parti
├── _tailwind.scss       # Direttive Tailwind (@tailwind base / components / utilities)
├── chat.scss            # Stili per il pannello di chat e tutor AI
├── document.scss        # Stili per il visualizzatore di documenti
├── editor.scss          # Stili della shell dell'editor TinyMCE
├── editor_content.scss  # Stili iniettati nel corpo dell'iframe dell'editor
├── markdown.scss        # Stili per contenuti renderizzati in Markdown
├── print.scss           # Foglio di stile per la stampa
├── responsive.scss      # Sovrascritture responsive
├── scorm.scss           # Stili per il player SCORM
├── legacy/              # Stili per pagine PHP legacy (ad esempio frameReadyLoader.scss)
└── scss/                # Parziali SCSS modulari
    ├── index.scss           # File barrel — importa tutti i parziali sottostanti
    ├── abstracts/           # Mixin e funzioni condivise
    ├── settings/            # Token di design (tipografia, base dei componenti)
    ├── atoms/               # Sovrascritture di PrimeVue per componente (pulsanti, input, calendario, ecc.)
    ├── molecules/           # Piccoli pattern UI composti (chip, barre degli strumenti, stati vuoti)
    ├── organisms/           # Aree di funzionalità più grandi (sidebar, datatable, dialog, pannello LP, ecc.)
    ├── layout/              # Parziali dello scheletro della pagina (topbar, contenitore principale, breadcrumb)
    ├── components/          # File specifici per componenti legacy (blog, esercizio, social, skill, ecc.)
    └── libs/                # Sovrascritture di librerie di terze parti (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

Tailwind è integrato tramite PostCSS. Il file `assets/css/_tailwind.scss` genera i livelli base, componenti e utilità; `assets/css/app.scss` lo importa per primo, rendendo così le utilità di Tailwind disponibili in tutti gli altri file parziali. La configurazione di Tailwind — i percorsi dei contenuti per il purging, le estensioni del tema e i plugin — si trova in `tailwind.config.js` nella radice del progetto (`/var/www/chamilo/tailwind.config.js`).

Le classi di utilità personalizzate e le classi di componenti definite con `@layer` (visibili in `app.scss`) seguono la convenzione di stratificazione di Tailwind, in modo che le classi definite dall'utente rispettino le stesse regole di specificità delle utilità generate.

### Temi di Colore

Chamilo supporta un sistema di temi di colore che può essere configurato direttamente dall'interfaccia di amministrazione (**Admin > Temi di Colore**). Ogni tema salvato scrive i suoi file in una directory dedicata sotto `var/themes/`:

```
var/themes/
└── [nome-tema]/
    ├── colors.css       # Proprietà CSS personalizzate per la palette di colori completa
    ├── default.css      # Regole CSS personalizzate aggiuntive opzionali
    ├── learnpath.css    # Sovrascritture specifiche per i percorsi di apprendimento
    ├── tiny-settings.js # Impostazioni della palette di colori per l'editor TinyMCE
    └── images/          # Immagini del tema (logo, favicon, sfondi, icone PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Immagini di sfondo, immagini dei blocchi admin, ecc.
```

Il file `colors.css` definisce le proprietà CSS personalizzate come triplette di canali RGB separate da spazi anziché valori `rgb()`, il che consente a Tailwind di comporre varianti di opacità (ad esempio `bg-primary/50`) senza configurazione aggiuntiva:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Il livello del tema si trova sopra il bundle Tailwind/SCSS compilato: il browser carica `colors.css` dopo il foglio di stile principale, quindi le modifiche al tema hanno effetto immediato senza necessità di un passaggio di build.