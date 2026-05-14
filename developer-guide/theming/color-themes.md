# Farbthemen

Chamilo 2.0 verwendet ein datenbankgesteuertes Farbthemen-System. Themen werden über die Admin-Benutzeroberfläche verwaltet, in der Datenbank gespeichert und als CSS-Dateien auf die Festplatte geschrieben. Sie können pro Zugriffs-URL angepasst werden, sodass Multi-URL-Installationen unterschiedliche visuelle Identitäten haben können.

## Datenmodell

Zwei Entitäten steuern das Themensystem:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Feld | Typ | Beschreibung |
|------|-----|--------------|
| `id` | int | Primärschlüssel |
| `title` | string | Menschlich lesbarer Name |
| `slug` | string | Automatisch aus `title` generiert (z. B. `"Mein Thema"` → `mein-thema`); wird als Verzeichnisname in `var/themes/` verwendet |
| `variables` | array (JSON) | Zuordnung von CSS-Benutzerdefinierten Eigenschaftsnamen → Wert (z. B. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Verknüpft ein `ColorTheme` mit einer `AccessUrl`. Das `active`-Boolean-Flag markiert, welches Thema derzeit für diese URL aktiv ist. Pro Zugriffs-URL kann jeweils nur ein Thema aktiv sein.

## Wie Themen gespeichert werden

Wenn ein Thema über die API erstellt oder aktualisiert wird, generiert `ColorThemeStateProcessor` die CSS-Datei und schreibt sie in das Flysystem `themes_filesystem` (unterstützt durch `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generiert aus ColorTheme.variables
```

Die generierte `colors.css` umschließt alle Variablen in einem `:root`-Block:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Die Werte sind durch Leerzeichen getrennte RGB-Kanal-Tripletts (nicht `rgb()`), was es Tailwind ermöglicht, Transparenzvarianten wie `bg-primary/50` ohne zusätzliche Konfiguration zu erstellen.

## Priorität bei der Themenauflösung

`ThemeHelper::getVisualTheme()` bestimmt, welcher Thema-Slug auf einer gegebenen Seite angewendet wird, in folgender Reihenfolge:

1. **Aktives Thema für die aktuelle AccessUrl** — der `AccessUrlRelColorTheme`-Datensatz mit `active = true`
2. **Vom Benutzer ausgewähltes Thema** — das Thema, das in der `User`-Entität gespeichert ist, wenn die Plattformeinstellung `profile.user_selected_theme` aktiviert ist
3. **Kursthema** — die Kurseinstellung `course_theme`, wenn die Plattformeinstellung `course.allow_course_theme` aktiviert ist
4. **Lernpfad-Thema** — der `$lp_theme_css`-Wert des Lernpfads, wenn die Kurseinstellung `allow_learning_path_theme` aktiviert ist
5. **`THEME_FALLBACK` Umgebungsvariable** — in `.env` als `THEME_FALLBACK='chamilo'` gesetzt
6. **Standard** — `chamilo` (hartcodiert als `ThemeHelper::DEFAULT_THEME`)

## Bereitstellung von Assets

Themen-Assets werden vom `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) unter dem Präfix `/themes` bereitgestellt.

| Route | Zweck |
|-------|-------|
| `GET /themes/{name}/{path}` | Bereitstellung beliebiger Themen-Assets (CSS, JS, Bilder); fällt auf das `chamilo`-Thema zurück, wenn die Datei im angeforderten Thema nicht gefunden wird |
| `GET /themes/{slug}/logo/{type}` | Bereitstellung des bevorzugten Logos (`header` oder `email`), mit SVG → PNG-Rückfalloption |
| `POST /themes/{slug}/logos` | Hochladen von Header-/E-Mail-Logos (SVG und/oder PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Löschen eines bestimmten Logos |

Die allgemeine Asset-Route (`/{name}/{path}`) fällt automatisch auf das Standardthema `chamilo` zurück, wenn eine Datei im angeforderten Thema fehlt, sodass Themen nur Dateien enthalten müssen, die sie tatsächlich überschreiben.

## Wie Themen in Vorlagen geladen werden

Die Layout-Vorlage `head.html.twig` lädt die Assets des aktiven Themas über Twig-Hilfsfunktionen:

```twig
{# Einfügen der Farbvariablen des Themas #}
{{ theme_asset_link_tag('colors.css') }}

{# Einfügen der TinyMCE-Farbpalette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Verweis auf andere Themen-Assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Die drei Twig-Funktionen (registriert in `ChamiloExtension`) lösen den Asset-Pfad über `ThemeHelper` auf und wenden dieselbe Rückfallkette wie oben an:

| Funktion | Rückgabe |
|----------|----------|
| `theme_asset('path')` | URL zum Asset im aufgelösten Thema |
| `theme_asset_link_tag('path')` | Vollständiges `<link rel="stylesheet">`-Tag |
| `theme_asset_script_tag('path')` | Vollständiges `<script src="...">`-Tag |
| `theme_asset_base64('path')` | Base64-kodierter Daten-URI des Assets |
| `theme_logo('header'\|'email')` | URL zum bestverfügbaren Logo |

## API-Endpunkte

Die Themenverwaltung wird über die API Platform REST API freigegeben (nur für Administratoren):

| Methode | Endpunkt | Zweck |
|---------|----------|-------|
| `POST` | `/api/color_themes` | Erstellen eines neuen Themas |
| `PUT` | `/api/color_themes/{id}` | Aktualisieren eines bestehenden Themas |
| `POST` | `/api/access_url_rel_color_themes` | Zuordnen/Aktivieren eines Themas für eine Zugriffs-URL |
| `GET` | `/api/access_url_rel_color_themes` | Auflisten der Themenzuordnungen für die aktuelle Zugriffs-URL |

## Erstellen eines benutzerdefinierten Themes

Der Standard-Workflow erfolgt über die Admin-Benutzeroberfläche (**Admin → Farbthemen**), die die oben genannten API-Endpunkte aufruft. Um ein Theme programmgesteuert zu erstellen:

1. `POST /api/color_themes` mit einem JSON-Body:

```json
{
  "title": "Mein Theme",
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

Dies speichert die Entität und schreibt `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes`, um es mit der aktuellen Zugriffs-URL zu verknüpfen und zu aktivieren:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Um benutzerdefinierte Bilder (Logo, Favicon, Hintergründe) hinzuzufügen, laden Sie diese über `POST /themes/{slug}/logos` hoch oder platzieren Sie sie direkt in `var/themes/{slug}/images/`.

## Referenz für Farbvariablen

Alle Variablen, die von der Standard-Tailwind-Konfiguration erwartet werden:

| Variable | Zweck |
|----------|-------|
| `--color-primary-base` | Primäre Markenfarbe |
| `--color-primary-gradient` | Dunklerer Farbverlauf für Primärfarbe |
| `--color-primary-button-text` | Textfarbe auf primären Schaltflächen |
| `--color-primary-button-alternative-text` | Alternative Textfarbe auf primären Schaltflächen |
| `--color-secondary-base` | Sekundäre Akzentfarbe |
| `--color-secondary-gradient` | Farbverlauf für Sekundärfarbe |
| `--color-secondary-button-text` | Textfarbe auf sekundären Schaltflächen |
| `--color-tertiary-base` | Tertiäre Farbe |
| `--color-tertiary-gradient` | Farbverlauf für Tertiärfarbe |
| `--color-tertiary-button-text` | Textfarbe auf tertiären Schaltflächen |
| `--color-success-base` | Farbe für Erfolgszustand |
| `--color-success-gradient` | Farbverlauf für Erfolgszustand |
| `--color-success-button-text` | Textfarbe auf Erfolgsschaltflächen |
| `--color-info-base` | Farbe für Informationszustand |
| `--color-info-gradient` | Farbverlauf für Informationszustand |
| `--color-info-button-text` | Textfarbe auf Informationsschaltflächen |
| `--color-warning-base` | Farbe für Warnzustand |
| `--color-warning-gradient` | Farbverlauf für Warnzustand |
| `--color-warning-button-text` | Textfarbe auf Warnschaltflächen |
| `--color-danger-base` | Farbe für Gefahren-/Fehlerzustand |
| `--color-danger-gradient` | Farbverlauf für Gefahrenzustand |
| `--color-danger-button-text` | Textfarbe auf Gefahrenschaltflächen |
| `--color-form-base` | Akzentfarbe für Formularelemente |