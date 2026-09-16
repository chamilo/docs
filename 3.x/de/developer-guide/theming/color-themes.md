# Farbschemen

Chamilo 3.0 verwendet ein datenbankgestütztes Farbschema-System. Schemen werden über die Admin-Oberfläche verwaltet, in der Datenbank gespeichert und als CSS-Dateien auf die Festplatte geschrieben. Sie können pro Zugriffs-URL angepasst werden, sodass Installationen mit mehreren URLs unterschiedliche visuelle Identitäten haben können.

## Datenmodell

Zwei Entitäten steuern das Schema-System:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Primärschlüssel |
| `title` | string | Menschenlesbarer Name |
| `slug` | string | Automatisch aus `title` erzeugt (z. B. `"My Theme"` → `my-theme`); wird als Verzeichnisname in `var/themes/` verwendet |
| `variables` | array (JSON) | Zuordnung von CSS-Custom-Property-Name → Wert (z. B. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Verknüpft ein `ColorTheme` mit einer `AccessUrl`. Das boolesche Flag `active` kennzeichnet, welches Schema für diese URL derzeit aktiv ist. Pro Zugriffs-URL kann jeweils nur ein Schema aktiv sein.

## Speicherung der Schemen

Wenn ein Schema über die API erstellt oder aktualisiert wird, erzeugt `ColorThemeStateProcessor` die CSS-Datei und schreibt sie in das Flysystem `themes_filesystem` (basiert auf `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Die erzeugte Datei `colors.css` kapselt alle Variablen in einem `:root`-Block:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Die Werte sind durch Leerzeichen getrennte RGB-Kanal-Tripel (nicht `rgb()`), sodass Tailwind Opazitätsvarianten wie `bg-primary/50` ohne zusätzliche Konfiguration zusammensetzen kann.

## Auflösungsreihenfolge der Schemen

`ThemeHelper::getVisualTheme()` ermittelt, welcher Schema-Slug auf einer gegebenen Seite angewendet wird, in dieser Reihenfolge:

1. **Aktives Schema für die aktuelle AccessUrl** — der Datensatz `AccessUrlRelColorTheme` mit `active = true`
2. **Vom Benutzer gewähltes Schema** — das auf der Entität `User` gespeicherte Schema, sofern die Plattformeinstellung `profile.user_selected_theme` aktiviert ist
3. **Kursschema** — die Kurseinstellung `course_theme`, sofern die Plattformeinstellung `course.allow_course_theme` aktiviert ist
4. **Lernpfad-Schema** — der Wert `$lp_theme_css` des LP, sofern die Kurseinstellung `allow_learning_path_theme` aktiviert ist
5. **Umgebungsvariable `THEME_FALLBACK`** — in `.env` gesetzt als `THEME_FALLBACK='chamilo'`
6. **Standard** — `chamilo` (hartcodiert als `ThemeHelper::DEFAULT_THEME`)

## Auslieferung der Assets

Schema-Assets werden von `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) unter dem Präfix `/themes` ausgeliefert.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Beliebiges Schema-Asset ausliefern (CSS, JS, Bilder); fällt auf das Schema `chamilo` zurück, wenn es im angeforderten Schema nicht gefunden wird |
| `GET /themes/{slug}/logo/{type}` | Das bevorzugte Logo ausliefern (`header` oder `email`), mit Fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Header-/E-Mail-Logos hochladen (SVG und/oder PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Ein bestimmtes Logo löschen |

Die allgemeine Asset-Route (`/{name}/{path}`) fällt automatisch auf das Standardschema `chamilo` zurück, wenn eine Datei im angeforderten Schema fehlt. Schemen müssen daher nur Dateien enthalten, die sie tatsächlich überschreiben.

## Laden der Schemen in Templates

Das Layout-Template `head.html.twig` lädt die Assets des aktiven Schemas über Twig-Hilfsfunktionen:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Die drei Twig-Funktionen (registriert in `ChamiloExtension`) lösen den Asset-Pfad über `ThemeHelper` auf und wenden dieselbe Fallback-Kette wie oben an:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL zum Asset im aufgelösten Schema |
| `theme_asset_link_tag('path')` | Vollständiges Tag `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Vollständiges Tag `<script src="...">` |
| `theme_asset_base64('path')` | Base64-kodierte Data-URI des Assets |
| `theme_logo('header'\|'email')` | URL zum bestverfügbaren Logo |

## API-Endpunkte

Die Schemaverwaltung wird über die REST-API von API Platform bereitgestellt (nur für Administratoren):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Ein neues Schema anlegen |
| `PUT` | `/api/color_themes/{id}` | Ein bestehendes Schema aktualisieren |
| `POST` | `/api/access_url_rel_color_themes` | Ein Schema einer Zugriffs-URL zuordnen/aktivieren |
| `GET` | `/api/access_url_rel_color_themes` | Schema-Zuordnungen für die aktuelle Zugriffs-URL auflisten |

## Erstellen eines benutzerdefinierten Themes

Der Standardablauf erfolgt über die Admin-Oberfläche (**Admin → Color Themes**), die die oben genannten API-Endpunkte aufruft. Um ein Theme programmatisch zu erstellen:

1. `POST /api/color_themes` mit einem JSON-Body:

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

Dadurch wird die Entität persistiert und `var/themes/my-theme/colors.css` geschrieben.

2. `POST /api/access_url_rel_color_themes`, um es der aktuellen Access-URL zuzuordnen und zu aktivieren:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Um benutzerdefinierte Bilder (Logo, Favicon, Hintergründe) hinzuzufügen, laden Sie diese über `POST /themes/{slug}/logos` hoch oder legen Sie sie direkt in `var/themes/{slug}/images/` ab.

## Referenz der Farbvariablen

Alle Variablen, die von der Standard-Tailwind-Konfiguration erwartet werden:

| Variable | Zweck |
|----------|---------|
| `--color-primary-base` | Primäre Markenfarbe |
| `--color-primary-gradient` | Dunklerer Verlaufspunkt für Primär |
| `--color-primary-button-text` | Textfarbe auf Primär-Schaltflächen |
| `--color-primary-button-alternative-text` | Alternative Textfarbe auf Primär-Schaltflächen |
| `--color-secondary-base` | Sekundäre Akzentfarbe |
| `--color-secondary-gradient` | Verlaufspunkt für Sekundär |
| `--color-secondary-button-text` | Textfarbe auf Sekundär-Schaltflächen |
| `--color-tertiary-base` | Tertiärfarbe |
| `--color-tertiary-gradient` | Verlaufspunkt für Tertiär |
| `--color-tertiary-button-text` | Textfarbe auf Tertiär-Schaltflächen |
| `--color-success-base` | Farbe für den Erfolgszustand |
| `--color-success-gradient` | Verlaufspunkt für Erfolg |
| `--color-success-button-text` | Textfarbe auf Erfolgs-Schaltflächen |
| `--color-info-base` | Farbe für den Info-Zustand |
| `--color-info-gradient` | Verlaufspunkt für Info |
| `--color-info-button-text` | Textfarbe auf Info-Schaltflächen |
| `--color-warning-base` | Farbe für den Warnzustand |
| `--color-warning-gradient` | Verlaufspunkt für Warnung |
| `--color-warning-button-text` | Textfarbe auf Warn-Schaltflächen |
| `--color-danger-base` | Farbe für den Gefahr-/Fehlerzustand |
| `--color-danger-gradient` | Verlaufspunkt für Gefahr |
| `--color-danger-button-text` | Textfarbe auf Gefahr-Schaltflächen |
| `--color-form-base` | Akzentfarbe für Formularelemente |