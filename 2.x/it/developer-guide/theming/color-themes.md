# Temi di Colore

Chamilo 2.0 utilizza un sistema di temi di colore gestito tramite database. I temi sono amministrati attraverso l'interfaccia utente di amministrazione, memorizzati nel database e scritti su disco come file CSS. Possono essere personalizzati per ogni URL di accesso, consentendo alle installazioni multi-URL di avere identità visive diverse.

## Modello dei Dati

Due entità guidano il sistema dei temi:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `id` | int | Chiave primaria |
| `title` | string | Nome leggibile dall'utente |
| `slug` | string | Generato automaticamente da `title` (ad esempio `"Il Mio Tema"` → `il-mio-tema`); usato come nome della directory in `var/themes/` |
| `variables` | array (JSON) | Mappa di nome della proprietà CSS personalizzata → valore (ad esempio `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associa un `ColorTheme` a un `AccessUrl`. Il flag booleano `active` indica quale tema è attualmente attivo per quell'URL. Solo un tema può essere attivo per URL di accesso alla volta.

## Come Vengono Memorizzati i Temi

Quando un tema viene creato o aggiornato tramite l'API, `ColorThemeStateProcessor` genera il file CSS e lo scrive nel `themes_filesystem` di Flysystem (supportato da `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generato da ColorTheme.variables
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

I valori sono triplette di canali RGB separati da spazi (non `rgb()`), il che consente a Tailwind di comporre varianti di opacità come `bg-primary/50` senza configurazioni aggiuntive.

## Precedenza nella Risoluzione dei Temi

`ThemeHelper::getVisualTheme()` determina quale slug di tema applicare su una determinata pagina, seguendo questo ordine:

1. **Tema attivo per l'attuale AccessUrl** — il record `AccessUrlRelColorTheme` con `active = true`
2. **Tema selezionato dall'utente** — il tema memorizzato sull'entità `User`, se l'impostazione della piattaforma `profile.user_selected_theme` è abilitata
3. **Tema del corso** — l'impostazione del corso `course_theme`, se l'impostazione della piattaforma `course.allow_course_theme` è abilitata
4. **Tema del percorso di apprendimento** — il valore `$lp_theme_css` del percorso di apprendimento, se l'impostazione del corso `allow_learning_path_theme` è abilitata
5. **Variabile d'ambiente `THEME_FALLBACK`** — impostata in `.env` come `THEME_FALLBACK='chamilo'`
6. **Predefinito** — `chamilo` (codificato come `ThemeHelper::DEFAULT_THEME`)

## Distribuzione delle Risorse

Le risorse dei temi sono servite da `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sotto il prefisso `/themes`.

| Percorso | Scopo |
|----------|-------|
| `GET /themes/{name}/{path}` | Serve qualsiasi risorsa del tema (CSS, JS, immagini); torna al tema `chamilo` se non trovata nel tema richiesto |
| `GET /themes/{slug}/logo/{type}` | Serve il logo preferito (`header` o `email`), con fallback da SVG a PNG |
| `POST /themes/{slug}/logos` | Carica loghi per intestazione/email (SVG e/o PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Elimina un logo specifico |

Il percorso generale delle risorse (`/{name}/{path}`) torna automaticamente al tema predefinito `chamilo` quando un file manca nel tema richiesto, quindi i temi devono includere solo i file che effettivamente sovrascrivono.

## Come Vengono Caricati i Temi nei Modelli

Il modello di layout `head.html.twig` carica le risorse del tema attivo tramite funzioni di supporto Twig:

```twig
{# Inietta le variabili di colore del tema #}
{{ theme_asset_link_tag('colors.css') }}

{# Inietta la tavolozza dei colori di TinyMCE #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Riferimento ad altre risorse del tema #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Le tre funzioni Twig (registrate in `ChamiloExtension`) risolvono il percorso della risorsa tramite `ThemeHelper`, applicando la stessa catena di fallback descritta sopra:

| Funzione | Restituisce |
|----------|-------------|
| `theme_asset('path')` | URL della risorsa nel tema risolto |
| `theme_asset_link_tag('path')` | Tag completo `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Tag completo `<script src="...">` |
| `theme_asset_base64('path')` | URI di dati codificato in Base64 della risorsa |
| `theme_logo('header'\|'email')` | URL del miglior logo disponibile |

## Endpoint API

La gestione dei temi è esposta tramite l'API REST di API Platform (solo per amministratori):

| Metodo | Endpoint | Scopo |
|--------|----------|-------|
| `POST` | `/api/color_themes` | Crea un nuovo tema |
| `PUT` | `/api/color_themes/{id}` | Aggiorna un tema esistente |
| `POST` | `/api/access_url_rel_color_themes` | Associa/attiva un tema per un URL di accesso |
| `GET` | `/api/access_url_rel_color_themes` | Elenca le associazioni dei temi per l'URL di accesso corrente |

## Creazione di un Tema Personalizzato

Il flusso di lavoro standard avviene tramite l'interfaccia di amministrazione (**Admin → Temi di Colore**), che richiama gli endpoint API sopra indicati. Per creare un tema in modo programmatico:

1. `POST /api/color_themes` con un corpo JSON:

```json
{
  "title": "Il Mio Tema",
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

Questo salva l'entità e scrive `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` per associarlo e attivarlo per l'URL di accesso corrente:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Per aggiungere immagini personalizzate (logo, favicon, sfondi), caricale tramite `POST /themes/{slug}/logos` o posizionale direttamente in `var/themes/{slug}/images/`.

## Riferimento alle Variabili di Colore

Tutte le variabili previste dalla configurazione predefinita di Tailwind:

| Variabile | Scopo |
|----------|---------|
| `--color-primary-base` | Colore principale del marchio |
| `--color-primary-gradient` | Gradiente più scuro per il colore principale |
| `--color-primary-button-text` | Colore del testo sui pulsanti principali |
| `--color-primary-button-alternative-text` | Colore del testo alternativo sui pulsanti principali |
| `--color-secondary-base` | Colore di accento secondario |
| `--color-secondary-gradient` | Gradiente per il colore secondario |
| `--color-secondary-button-text` | Colore del testo sui pulsanti secondari |
| `--color-tertiary-base` | Colore terziario |
| `--color-tertiary-gradient` | Gradiente per il colore terziario |
| `--color-tertiary-button-text` | Colore del testo sui pulsanti terziari |
| `--color-success-base` | Colore per lo stato di successo |
| `--color-success-gradient` | Gradiente per lo stato di successo |
| `--color-success-button-text` | Colore del testo sui pulsanti di successo |
| `--color-info-base` | Colore per lo stato informativo |
| `--color-info-gradient` | Gradiente per lo stato informativo |
| `--color-info-button-text` | Colore del testo sui pulsanti informativi |
| `--color-warning-base` | Colore per lo stato di avviso |
| `--color-warning-gradient` | Gradiente per lo stato di avviso |
| `--color-warning-button-text` | Colore del testo sui pulsanti di avviso |
| `--color-danger-base` | Colore per lo stato di pericolo/errore |
| `--color-danger-gradient` | Gradiente per lo stato di pericolo |
| `--color-danger-button-text` | Colore del testo sui pulsanti di pericolo |
| `--color-form-base` | Colore di accento per gli elementi del modulo |