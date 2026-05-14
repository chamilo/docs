# Projektstruktur

## Verzeichnisse auf oberster Ebene

```
chamilo/
├── assets/          # Frontend-Quellcode
│   ├── vue/         # Vue 3 Anwendung (Komponenten, Ansichten, Router, Stores)
│   ├── css/         # SCSS-Stylesheets
│   └── js/          # Legacy JavaScript
├── config/          # Symfony-Konfiguration (Routen, Dienste, Pakete)
├── public/          # Web-Root (index.php, Legacy PHP-Seiten, Plugins)
│   ├── main/        # Legacy PHP-Module (ein Unterverzeichnis pro Tool)
│   └── plugin/      # Gebündelte und benutzerdefinierte Plugins
├── src/             # PHP-Quellcode (Symfony-Bundles)
│   ├── CoreBundle/  # Kernplattformlogik
│   ├── CourseBundle/# Kursspezifische Funktionen
│   └── LtiBundle/   # LTI 1.3 Integration
├── templates/       # Twig-Vorlagen
├── var/             # Cache, Logs, Uploads (generiert)
├── vendor/          # Composer-Abhängigkeiten (generiert)
├── node_modules/    # npm-Abhängigkeiten (generiert)
└── translations/    # Übersetzungsdateien
```

## Quellcode (`src/`)

### CoreBundle

Das größte Bundle. Wichtige Unterverzeichnisse:

| Verzeichnis | Inhalt |
|-------------|--------|
| `Entity/` | Doctrine-Entitäten (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Admin-, API-Aktions- und Seiten-Controller (der Unterordner Api/ enthält benutzerdefinierte API Platform-Aktionen) |
| `Settings/` | Einstellungsschemadateien (Plattformkonfiguration) |
| `Repository/` | Doctrine-Repositories |
| `AiProvider/` | KI-Anbieter-Implementierungen (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Kurs-Tool-Definitionen |
| `Security/` | Voters, Authentifikatoren, Autorisierung |
| `EventListener/` | Ereignis-Listener |
| `EventSubscriber/` | Ereignis-Abonnenten |
| `Command/` | Symfony-Konsolenbefehle |
| `Migrations/` | Datenbankmigrationen |
| `Twig/` | Twig-Erweiterungen |
| `Storage/` | Flysystem-Speicheradapter |

### CourseBundle

Kursspezifische Entitäten und Logik:

| Verzeichnis | Inhalt |
|-------------|--------|
| `Entity/` | Kursinhalts-Entitäten (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Kurs-Controller |
| `Settings/` | Einstellungsschemata auf Kursebene |
| `Component/CourseCopy/` | Kurs-Import/Export (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3 Integration:

| Verzeichnis | Inhalt |
|-------------|--------|
| `Entity/` | LTI-Plattform-, Tool- und Bereitstellungs-Entitäten |
| `Controller/` | LTI-Start- und Konfigurations-Endpunkte |

---
## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Einstiegspunkt der Anwendung
├── main_installer.js    # Einstiegspunkt des Installers
├── components/          # Wiederverwendbare Vue-Komponenten
│   ├── accessurl/       # Multi-URL (Portal)-Komponenten
│   ├── admin/           # Admin-spezifische Komponenten
│   ├── assignments/     # Aufgabenformulare und -listen
│   ├── attendance/      # Anwesenheitsblatt-Komponenten
│   ├── basecomponents/  # Gemeinsame Basiskomponenten (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) und ChamiloIcons.js
│   ├── blog/            # Blog-Komponenten
│   ├── branch/          # Zweig-/Netzwerk-Campus-Komponenten
│   ├── ccalendarevent/  # Kurskalender-Ereignis-Komponenten
│   ├── chat/            # Chat- und KI-Tutor-Komponenten
│   ├── course/          # Kurskarten, Kataloge, Formulare
│   ├── coursecategory/  # Kurskategorie-Komponenten
│   ├── coursemaintenance/ # Kurs-Sicherungs-/Wiederherstellungs-Komponenten
│   ├── ctoolintro/      # Einführungs-Komponenten für Kurstools
│   ├── documents/       # Dokumentenverwaltungs-Komponenten
│   ├── dropbox/         # Dropbox (Dateiaustausch)-Komponenten
│   ├── filemanager/     # Dateibrowser-Komponenten
│   ├── glossary/        # Glossar-Komponenten
│   ├── installer/       # Installationsassistent
│   ├── layout/          # Seitenleiste, Topbar, Shell-Layout
│   ├── links/           # Externe Links-Komponenten
│   ├── login/           # Anmeldeformular-Komponenten
│   ├── lp/              # Lernpfad-Komponenten
│   ├── message/         # Nachrichten-Komponenten
│   ├── page/            # Statische Seiten-Komponenten
│   ├── pageLayout/      # Seitenlayout-Wrapper-Komponenten
│   ├── personalfile/    # Persönlicher Dateibereich-Komponenten
│   ├── platform/        # Plattformweite UI-Komponenten
│   ├── resource_links/  # Ressourcenlink-Verwaltungs-Komponenten
│   ├── room/            # Virtuelle Raum-Komponenten
│   ├── session/         # Sitzung (Lernkampagne)-Komponenten
│   ├── sessionadmin/    # Sitzungsverwaltungs-Komponenten
│   ├── skill/           # Fähigkeiten- und Kompetenz-Komponenten
│   ├── social/          # Soziale Netzwerk-Komponenten
│   ├── systemannouncement/ # Systemankündigungs-Komponenten
│   ├── user/            # Benutzerprofil- und Verwaltungs-Komponenten
│   ├── usergroup/       # Benutzergruppen (Klasse)-Komponenten
│   └── userreluser/     # Benutzerbeziehungs (Freund/Folgen)-Komponenten
├── views/               # Seitenweite Vue-Ansichten (spiegelt die Struktur von components/)
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
├── router/              # Vue Router (index.js + ein Modul pro Funktionsbereich)
├── store/               # Pinia Stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Gemeinsame Kompositionsfunktionen (Unterverzeichnisse pro Funktion)
├── services/            # API-Dienstschicht (eine Datei pro Entität/Domäne)
├── utils/               # Hilfsfunktionen (Datum, Hydra, Fetch, sanitizeHtml, etc.)
├── config/              # Laufzeitkonfiguration (api.js, env.js)
├── constants/           # Gemeinsame Konstanten
│   └── entity/          # Entitätsspezifische Konstanten (Sitzung, Nachricht, Extrafeld, etc.)
├── layouts/             # Übergeordnete Layout-Komponenten (MyCourses.vue)
├── pages/               # Eigenständige Seitenkomponenten (Home, Login, Faq, Demo)
├── mixins/              # Legacy Vue 2-Style Mixins (ListMixin, CreateMixin, etc.)
├── hooks/               # Komponierbare Hooks (useSidebar, useState)
├── plugins/             # Vue-Plugin-Registrierungen (httpErrors, vuetify)
├── validators/          # Vuelidate benutzerdefinierte Validatoren
└── error/               # Fehlerbegrenzungs-Komponenten
```

---
## Konfiguration (`config/`)

```
config/
├── packages/            # Bundle- und Framework-Konfiguration (eine YAML-Datei pro Paket)
│   ├── security.yaml    # Rollenhierarchie, Firewalls, Zugriffskontrolle
│   ├── doctrine.yaml    # Doctrine ORM- und DBAL-Einstellungen
│   ├── api_platform.yaml# API Platform-Konfiguration
│   ├── framework.yaml   # Kern-Symfony-Einstellungen
│   ├── lexik_jwt_authentication.yaml  # JWT-Token-Einstellungen
│   ├── nelmio_cors.yaml # CORS-Header für API-Konsumenten
│   ├── oneup_flysystem.yaml  # Cloud-Speicher-Adapter
│   ├── webpack_encore.yaml   # Webpack Encore-Integration
│   ├── ... (30+ Paketdateien)
│   ├── dev/             # Nur für Entwicklung gültige Überschreibungen (Web Profiler, Debug, Routing)
│   ├── prod/            # Nur für Produktion gültige Überschreibungen (derzeit leerer Platzhalter)
│   └── test/            # Testumgebungs-Überschreibungen (JWT, Validator, Web Profiler)
├── routes/              # Routendefinitionen
│   ├── api_platform.yaml     # API Platform-Routenpräfix
│   ├── attributes.yaml       # Controller-Annotationsbasierte Routen
│   ├── fos_js_routing.yaml   # FOS JS Routing-Exposition
│   ├── legacy.yaml           # Routen für ältere PHP-Seiten unter public/main/
│   ├── security.yaml         # Login/Logout/OAuth2-Routen
│   ├── dev/                  # Nur für Entwicklung gültige Routen (Profiler, Maker Bundle)
│   └── test/                 # Nur für Tests gültige Routen-Überschreibungen
├── jwt/                 # JWT-Schlüsselpaar (privater/öffentlicher Schlüssel)
└── jwt-test/            # JWT-Schlüssel für die Testumgebung
```

Symfony fügt automatisch die Basisdateien `packages/*.yaml` mit denen im entsprechenden Umgebungsunterverzeichnis (`dev/`, `prod/` oder `test/`) zusammen, sodass umgebungsspezifische Dateien nur die Werte überschreiben müssen, die sich unterscheiden.

## Build-Konfiguration

| Datei | Zweck |
|------|---------|
| `webpack.config.js` | Webpack Encore-Konfiguration (Einstiegspunkte, Loader, Plugins) |
| `tailwind.config.js` | Tailwind CSS-Konfiguration (Inhaltspfade, Theme-Erweiterungen, Plugins) |
| `tsconfig.json` | TypeScript-Konfiguration |
| `eslint.config.mjs` | ESLint-Regeln (flache Konfiguration) |
| `.prettierrc.json` | Prettier-Formatierungsregeln |

Alle Dateien befinden sich im Projektstammverzeichnis. PostCSS-Plugins (Tailwind + Autoprefixer) werden inline in `webpack.config.js` über `enablePostCssLoader()` konfiguriert — es gibt keine eigenständige `postcss.config.js`. `webpack.config.js` liest `tailwind.config.js` indirekt über PostCSS, sodass Änderungen an den Abschnitten `content` oder `theme` von Tailwind bei der nächsten Ausführung von `yarn encore dev` / `yarn encore production` wirksam werden.

## Webpack-Einstiegspunkte

Der Build erzeugt folgende Bundles:

**JavaScript:**
* `vue` — Haupt-Vue-3-Anwendung (`assets/vue/main.js`)
* `vue_installer` — Installationsassistent (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Ältere JS für Seiten, die noch nicht zu Vue migriert wurden

**CSS:**
* `app` — Haupt-Stylesheet (`assets/css/app.scss`)
* Plus spezialisierte Stylesheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS-Struktur (`assets/css/`)

```
assets/css/
├── app.scss             # Einstiegspunkt — importiert Tailwind, den SCSS-Index und CSS von Drittanbietern
├── _tailwind.scss       # Tailwind-Direktiven (@tailwind base / components / utilities)
├── chat.scss            # Stile für Chat- und KI-Tutor-Panel
├── document.scss        # Stile für Dokumenten-Viewer
├── editor.scss          # Stile für TinyMCE-Editor-Shell
├── editor_content.scss  # Stile, die in den Editor-Iframe-Body eingefügt werden
├── markdown.scss        # Stile für Markdown-gerenderte Inhalte
├── print.scss           # Druck-Stylesheet
├── responsive.scss      # Responsive Überschreibungen
├── scorm.scss           # Stile für SCORM-Player
├── legacy/              # Stile für ältere PHP-Seiten (z. B. frameReadyLoader.scss)
└── scss/                # Modulare SCSS-Teil-Dateien
    ├── index.scss           # Barrel-Datei — importiert alle untenstehenden Teil-Dateien
    ├── abstracts/           # Mixins und gemeinsame Funktionen
    ├── settings/            # Design-Token (Typografie, Komponentenbasis)
    ├── atoms/               # PrimeVue-Überschreibungen pro Komponente (Buttons, Inputs, Kalender etc.)
    ├── molecules/           # Kleine zusammengesetzte UI-Muster (Chips, Toolbars, leere Zustände)
    ├── organisms/           # Größere Funktionsbereiche (Sidebar, Datatable, Dialog, LP-Panel etc.)
    ├── layout/              # Seitenstruktur-Teil-Dateien (Topbar, Hauptcontainer, Breadcrumb)
    ├── components/          # Ältere komponentenspezifische Dateien (Blog, Übung, Soziales, Fähigkeit etc.)
    └── libs/                # Überschreibungen von Drittanbieter-Bibliotheken (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

Tailwind ist über PostCSS integriert. `assets/css/_tailwind.scss` gibt die Basis-, Komponenten- und Utility-Ebenen aus; `assets/css/app.scss` importiert es zuerst, sodass Tailwind-Utilities in allen anderen Teil-Dateien verfügbar sind. Die Tailwind-Konfiguration – Inhaltspfade für das Bereinigen, Theme-Erweiterungen und Plugins – befindet sich in `tailwind.config.js` im Projektstammverzeichnis (`/var/www/chamilo/tailwind.config.js`).

Benutzerdefinierte Utility-Klassen und Komponentenklassen, die mit `@layer` definiert sind (sichtbar in `app.scss`), folgen der Layering-Konvention von Tailwind, sodass benutzerdefinierte Klassen die gleichen Spezifitätsregeln wie die generierten Utilities einhalten.

### Farbthemen

Chamilo unterstützt ein Farbthemen-System, das direkt über die Admin-Oberfläche konfiguriert werden kann (**Admin > Farbthemen**). Jedes gespeicherte Thema schreibt seine Dateien in ein dediziertes Verzeichnis unter `var/themes/`:

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS benutzerdefinierte Eigenschaften für die gesamte Farbpalette
    ├── default.css      # Optionale zusätzliche benutzerdefinierte CSS-Regeln
    ├── learnpath.css    # Lernpfad-spezifische Überschreibungen
    ├── tiny-settings.js # TinyMCE-Editor-Farbpaletteneinstellungen
    └── images/          # Theme-Bilder (Logo, Favicon, Hintergründe, PWA-Icons)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Hintergrundbilder, Admin-Block-Bilder, etc.
```

`colors.css` definiert CSS benutzerdefinierte Eigenschaften als durch Leerzeichen getrennte RGB-Kanal-Tripletts anstelle von `rgb()`-Werten, was es Tailwind ermöglicht, Opazitätsvarianten (z. B. `bg-primary/50`) ohne zusätzliche Konfiguration zu erstellen:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Die Theme-Ebene liegt über dem kompilierten Tailwind/SCSS-Bundle: Der Browser lädt `colors.css` nach dem Haupt-Stylesheet, sodass Theme-Änderungen sofort wirksam werden, ohne dass ein Build-Schritt erforderlich ist.