# Temi colore

Chamilo 3.0 utilizza un sistema di temi colore basato sul database. I temi sono gestiti tramite l'interfaccia di amministrazione, memorizzati nel database e scritti su disco come file CSS. Possono essere personalizzati per access URL, consentendo alle installazioni multi-URL di avere identità visive diverse.

## Data Model

Due entità guidano il sistema dei temi:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Chiave primaria |
| `title` | string | Nome leggibile |
| `slug` | string | Generato automaticamente da `title` (es. `"My Theme"` → `my-theme`); usato come nome della directory in `var/themes/` |
| `variables` | array (JSON) | Mappa nome proprietà personalizzata CSS → valore (es. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associa un `ColorTheme` a un `AccessUrl`. Il flag booleano `active` indica quale tema è attualmente attivo per quell'URL. Solo un tema può essere attivo per access URL alla volta.

## How Themes Are Stored

Quando un tema viene creato o aggiornato tramite l'API, `ColorThemeStateProcessor` genera il file CSS e lo scrive nel Flysystem `themes_filesystem` (basato su `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Il file `colors.css` generato racchiude tutte le variabili in un blocco `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

I valori sono triplette di canali RGB separate da spazi (non `rgb()`), il che consente a Tailwind di comporre varianti di opacità come `bg-primary/50` senza configurazione aggiuntiva.

## Theme Resolution Precedence

`ThemeHelper::getVisualTheme()` determina quale slug di tema applicare su una data pagina, in questo ordine:

1. **Tema attivo per l'AccessUrl corrente** — il record `AccessUrlRelColorTheme` con `active = true`
2. **Tema selezionato dall'utente** — il tema memorizzato sull'entità `User`, se l'impostazione di piattaforma `profile.user_selected_theme` è abilitata
3. **Tema del corso** — l'impostazione del corso `course_theme`, se l'impostazione di piattaforma `course.allow_course_theme` è abilitata
4. **Tema del learning path** — il valore `$lp_theme_css` del LP, se l'impostazione del corso `allow_learning_path_theme` è abilitata
5. **Variabile d'ambiente `THEME_FALLBACK`** — impostata in `.env` come `THEME_FALLBACK='chamilo'`
6. **Predefinito** — `chamilo` (codificato come `ThemeHelper::DEFAULT_THEME`)

## Asset Serving

Gli asset dei temi sono serviti da `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sotto il prefisso `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Serve qualsiasi asset del tema (CSS, JS, immagini); ricade sul tema `chamilo` se non trovato nel tema richiesto |
| `GET /themes/{slug}/logo/{type}` | Serve il logo preferito (`header` o `email`), con fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Carica i loghi header/email (SVG e/o PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Elimina un logo specifico |

La route generale degli asset (`/{name}/{path}`) ricade automaticamente sul tema predefinito `chamilo` quando un file manca nel tema richiesto, quindi i temi devono includere solo i file che effettivamente sovrascrivono.

## How Themes Are Loaded in Templates

Il template di layout `head.html.twig` carica gli asset del tema attivo tramite funzioni helper Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Le tre funzioni Twig (registrate in `ChamiloExtension`) risolvono il percorso dell'asset tramite `ThemeHelper`, applicando la stessa catena di fallback di cui sopra:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL dell'asset nel tema risolto |
| `theme_asset_link_tag('path')` | Tag completo `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Tag completo `<script src="...">` |
| `theme_asset_base64('path')` | Data URI dell'asset codificato in Base64 |
| `theme_logo('header'\|'email')` | URL del logo migliore disponibile |

## API Endpoints

La gestione dei temi è esposta tramite l'API REST di API Platform (solo amministratori):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Crea un nuovo tema |
| `PUT` | `/api/color_themes/{id}` | Aggiorna un tema esistente |
| `POST` | `/api/access_url_rel_color_themes` | Associa/attiva un tema per un access URL |
| `GET` | `/api/access_url_rel_color_themes` | Elenca le associazioni di temi per l'access URL corrente |

## Creazione di un tema personalizzato

Il flusso di lavoro standard passa dall'interfaccia di amministrazione (**Amministrazione → Temi di colore**), che chiama gli endpoint API indicati sopra. Per creare un tema in modo programmatico:

1. `POST /api/color_themes` con un corpo JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Questo persiste l'entità e scrive `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` per associarlo e attivarlo per l'URL di accesso corrente:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Per aggiungere immagini personalizzate (logo, favicon, sfondi), caricarle tramite `POST /themes/{slug}/logos` oppure collocarle direttamente in `var/themes/{slug}/images/`.

## Riferimento delle variabili di colore

Tutte le variabili attese dalla configurazione Tailwind predefinita:

| Variabile | Scopo |
|----------|---------|
| `--color-primary-base` | Colore primario del brand |
| `--color-primary-gradient` | Stop del gradiente più scuro per il primario |
| `--color-primary-button-text` | Colore del testo sui pulsanti primari |
| `--color-primary-button-alternative-text` | Colore del testo alternativo sui pulsanti primari |
| `--color-secondary-base` | Colore di accento secondario |
| `--color-secondary-gradient` | Stop del gradiente per il secondario |
| `--color-secondary-button-text` | Colore del testo sui pulsanti secondari |
| `--color-tertiary-base` | Colore terziario |
| `--color-tertiary-gradient` | Stop del gradiente per il terziario |
| `--color-tertiary-button-text` | Colore del testo sui pulsanti terziari |
| `--color-success-base` | Colore dello stato di successo |
| `--color-success-gradient` | Stop del gradiente per il successo |
| `--color-success-button-text` | Colore del testo sui pulsanti di successo |
| `--color-info-base` | Colore dello stato informativo |
| `--color-info-gradient` | Stop del gradiente per l'informazione |
| `--color-info-button-text` | Colore del testo sui pulsanti informativi |
| `--color-warning-base` | Colore dello stato di avviso |
| `--color-warning-gradient` | Stop del gradiente per l'avviso |
| `--color-warning-button-text` | Colore del testo sui pulsanti di avviso |
| `--color-danger-base` | Colore dello stato di pericolo/errore |
| `--color-danger-gradient` | Stop del gradiente per il pericolo |
| `--color-danger-button-text` | Colore del testo sui pulsanti di pericolo |
| `--color-form-base` | Colore di accento degli elementi del modulo |