# Twig-Vorlagen

Chamilo verwendet Twig für serverseitig gerenderte Seiten. Die Vorlagen befinden sich in `src/CoreBundle/Resources/views/` und werden mit dem Namensraum-Präfix `@ChamiloCore/` referenziert (z. B. `@ChamiloCore/Layout/base-layout.html.twig`).

Es gibt kein übergeordnetes Verzeichnis `templates/` – alle Twig-Vorlagen befinden sich unter `src/CoreBundle/Resources/views/`.

## Wie Twig und Vue zusammenarbeiten

Die meisten Seiten folgen diesem Ablauf:

1. Ein Symfony-Controller rendert eine Twig-Vorlage, die ein Layout erweitert.
2. Das Layout bindet `vue_setup.html.twig` ein, das `<div id="app">` ausgibt und Laufzeit-Globalvariablen (`window.user`, `window.breadcrumb` usw.) über `vue_js_setup.html.twig` einfügt.
3. Vue wird auf `#app` gemountet und übernimmt das gesamte UI-Rendering innerhalb dieses Elements.
4. Die Vue-App kommuniziert mit dem Backend über die REST-API.

Für ältere Seiten, die noch nicht auf Vue migriert wurden, rendert Symfony die gesamte Seiten-HTML über Twig, und der Inhalt wird in `#sectionMainContent` platziert. Vue wird dennoch gemountet (und stellt die Seitenleiste und die obere Leiste bereit), aber der Hauptinhaltsbereich besteht aus serverseitig gerendertem HTML.

## Layout-Vorlagen

Alle Layouts erweitern `@ChamiloCore/Layout/base-layout.html.twig`, das die Struktur für `<html>`, `<head>` und `<body>` bereitstellt. Verfügbare Layout-Varianten:

| Vorlage | Zweck |
|----------|---------|
| `Layout/base-layout.html.twig` | Basisvorlage – `<html>`-Shell, importiert Makros, gibt `<head>` und `<body>` aus |
| `Layout/layout.html.twig` | Standard-Layout mit Seitenleiste, oberer Leiste und Inhaltsbereich |
| `Layout/layout_one_col.html.twig` | Einspaltiges Layout (ohne Seitenleiste) |
| `Layout/layout_two_col.html.twig` | Zweispaltiges Layout |
| `Layout/layout_content.html.twig` | Nur-Inhalt-Wrapper |
| `Layout/layout_empty.html.twig` | Leeres Layout mit minimalem Rahmen |
| `Layout/no_layout.html.twig` | Kein Header/Footer; Inhalt wird direkt in `<body>` eingefügt |
| `Layout/no_layout_scorm.html.twig` | Minimales Layout für SCORM-Inhaltsframes |
| `Layout/blank.html.twig` | Komplett leere Seite |
| `Layout/skill_layout.html.twig` | Layout für die Kompetenzrad-Seite |

## Wichtige Teilvorlagen

| Vorlage | Zweck |
|----------|---------|
| `Layout/head.html.twig` | `<head>`-Inhalt: Meta-Tags, alle Encore-CSS-Einträge, Theme-`colors.css`, ältere JS-Einträge, OpenGraph/Twitter-Tags |
| `Layout/foot.html.twig` | Ende des Body: Vue-JS-Einstiegspunkt, Einfügen von `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Gibt `<div id="app">` aus und bindet `vue_js_setup.html.twig` ein |
| `Layout/vue_js_setup.html.twig` | Fügt `window.user`, `window.breadcrumb`, `window.languages` usw. ein |
| `Layout/cookie_banner.html.twig` | DSGVO-Cookie-Zustimmungsbanner |
| `Layout/footer.html.twig` | Seitenfußleiste |
| `Layout/course_navigation.html.twig` | Kurs-Tool-Navigations-Breadcrumb |

## Webpack Encore Integration

`head.html.twig` lädt CSS für alle Einträge; `foot.html.twig` lädt das Vue-JS-Bundle:

```twig
{# In head.html.twig — CSS-Einträge #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (geladen am Ende des Body) #}
{{ encore_entry_script_tags('vue') }}
```

Ältere JS-Einträge (`legacy_app`, `legacy_lp` usw.) werden in `<head>` geladen, da ältere PHP-Seiten darauf angewiesen sind, dass sie verfügbar sind, bevor der DOM bereit ist.

## Makros

Wiederverwendbare Twig-Makros befinden sich in `Macros/` und werden am Anfang von `base-layout.html.twig` importiert:

| Makro-Datei | Bereitgestellt |
|-----------|---------|
| `Macros/box.html.twig` | Hilfsfunktionen für Inhaltsboxen |
| `Macros/actions.html.twig` | Rendering von Aktionsschaltflächen |
| `Macros/buttons.html.twig` | HTML-Hilfsfunktionen für Schaltflächen |
| `Macros/headers.html.twig` | Hilfsfunktionen für Seitenüberschriften |
| `Macros/image.html.twig` | Hilfsfunktionen für Bild-Rendering |
| `Macros/modals.html.twig` | Hilfsfunktionen für Modal-Dialoge |

Verwendung innerhalb jeder Vorlage, die `base-layout.html.twig` erweitert:

```twig
{{ macro_buttons.submit('Speichern') }}
{{ macro_box.content_box('Titel', content) }}
```

## Benutzerdefinierte Vue-Vorlagen

Chamilo unterstützt installationsspezifische Vue-Seitenüberschreibungen über die Umgebungsvariable `APP_CUSTOM_VUE_TEMPLATE`. Wenn diese gesetzt ist, macht der Webpack-Build eine Konstante `ENV_CUSTOM_VUE_TEMPLATE` über `DefinePlugin` verfügbar, und der Vue-Router importiert bedingt Überschreibungskomponenten aus `var/vue_templates/`.

Aktuelle Überschreibungspfade:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Ersetzt die Standard-Einstiegsseite /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Nur die Dateien, die in `var/vue_templates/` vorhanden sind, werden überschrieben – alle anderen Seiten und Komponenten verwenden die ursprünglichen Kern-Dateien.

---
## Twig-Funktionen-Referenz

Wichtige Twig-Funktionen, die in allen Vorlagen verfügbar sind (registriert in `ChamiloExtension`):

| Funktion | Zweck |
|----------|-------|
| `chamilo_settings_get('ns.key')` | Eine Plattformeinstellung auslesen |
| `chamilo_settings_has('ns.key')` | Prüfen, ob eine Einstellung existiert |
| `chamilo_settings_all()` | Alle Einstellungen als Array abrufen |
| `theme_asset('path')` | URL zu einem Asset im aktiven Theme |
| `theme_asset_link_tag('path')` | `<link>`-Tag für eine Theme-CSS-Datei |
| `theme_asset_script_tag('path')` | `<script>`-Tag für eine Theme-JS-Datei |
| `theme_asset_base64('path')` | Base64-Daten-URI für ein Theme-Asset |
| `theme_logo('header'\|'email')` | URL zum bevorzugten Logo |
| `is_allowed_to_edit(...)` | Hilfsfunktion zur Berechtigungsprüfung |