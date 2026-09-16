# Twig-Templates

Chamilo verwendet Twig für serverseitig gerenderte Seiten. Templates liegen in `src/CoreBundle/Resources/views/` und werden mit dem Namespace-Präfix `@ChamiloCore/` referenziert (z. B. `@ChamiloCore/Layout/base-layout.html.twig`).

Es gibt kein Verzeichnis `templates/` auf oberster Ebene — alle Twig-Templates befinden sich unter `src/CoreBundle/Resources/views/`.

## Wie Twig und Vue koexistieren

Die meisten Seiten folgen diesem Ablauf:

1. Ein Symfony-Controller rendert ein Twig-Template, das ein Layout erweitert.
2. Das Layout bindet `vue_setup.html.twig` ein, das `<div id="app">` ausgibt und Laufzeit-Globals (`window.user`, `window.breadcrumb` usw.) über `vue_js_setup.html.twig` injiziert.
3. Vue wird auf `#app` gemountet und übernimmt die gesamte UI-Darstellung innerhalb dieses Elements.
4. Die Vue-App kommuniziert mit dem Backend über die REST-API.

Bei Legacy-Seiten, die noch nicht nach Vue migriert wurden, rendert Symfony die vollständige Seiten-HTML über Twig, und der Inhalt wird in `#sectionMainContent` platziert. Vue wird trotzdem gemountet (und stellt die Sidebar- und Topbar-Hülle bereit), der Hauptinhaltsbereich bleibt jedoch serverseitig gerendertes HTML.

## Layout-Templates

Alle Layouts erweitern `@ChamiloCore/Layout/base-layout.html.twig`, das die Struktur von `<html>`, `<head>` und `<body>` bereitstellt. Verfügbare Layout-Varianten:

| Template | Zweck |
|----------|---------|
| `Layout/base-layout.html.twig` | Wurzel-Template — `<html>`-Hülle, importiert Macros, gibt `<head>` und `<body>` aus |
| `Layout/layout.html.twig` | Standard-Voll-Layout mit Sidebar, Topbar und Inhaltsbereich |
| `Layout/layout_one_col.html.twig` | Einspaltiges Layout (ohne Sidebar) |
| `Layout/layout_two_col.html.twig` | Zweispaltiges Layout |
| `Layout/layout_content.html.twig` | Nur-Inhalt-Wrapper |
| `Layout/layout_empty.html.twig` | Leeres Layout mit minimalem Chrome |
| `Layout/no_layout.html.twig` | Kein Header/Footer; Inhalt steht direkt in `<body>` |
| `Layout/no_layout_scorm.html.twig` | Karges Layout für SCORM-Inhaltsframes |
| `Layout/blank.html.twig` | Vollständig leere Seite |
| `Layout/skill_layout.html.twig` | Layout für die Skills-Wheel-Seite |

## Wichtige Partials

| Template | Zweck |
|----------|---------|
| `Layout/head.html.twig` | `<head>`-Inhalt: Meta-Tags, alle Encore-CSS-Einträge, Theme-`colors.css`, Legacy-JS-Einträge, OpenGraph-/Twitter-Tags |
| `Layout/foot.html.twig` | Ende des Body: Vue-JS-Einstiegspunkt, Injektion von `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Gibt `<div id="app">` aus und bindet `vue_js_setup.html.twig` ein |
| `Layout/vue_js_setup.html.twig` | Injiziert `window.user`, `window.breadcrumb`, `window.languages` usw. |
| `Layout/cookie_banner.html.twig` | GDPR-Cookie-Einwilligungsbanner |
| `Layout/footer.html.twig` | Seiten-Fußleiste |
| `Layout/course_navigation.html.twig` | Breadcrumb der Kurs-Werkzeugnavigation |

## Webpack-Encore-Integration

`head.html.twig` lädt CSS für alle Einträge; `foot.html.twig` lädt das Vue-JS-Bundle:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Legacy-JS-Einträge (`legacy_app`, `legacy_lp` usw.) werden in `<head>` geladen, weil Legacy-PHP-Seiten darauf angewiesen sind, dass sie vor dem Bereitsein des DOM verfügbar sind.

## Macros

Wiederverwendbare Twig-Macros liegen in `Macros/` und werden am Anfang von `base-layout.html.twig` importiert:

| Macro-Datei | Stellt bereit |
|-----------|---------|
| `Macros/box.html.twig` | Hilfsfunktionen für Inhaltsboxen |
| `Macros/actions.html.twig` | Darstellung von Aktions-Schaltflächen |
| `Macros/buttons.html.twig` | HTML-Hilfsfunktionen für Schaltflächen |
| `Macros/headers.html.twig` | Hilfsfunktionen für Seitenüberschriften |
| `Macros/image.html.twig` | Hilfsfunktionen für die Bilddarstellung |
| `Macros/modals.html.twig` | Hilfsfunktionen für Modaldialoge |

Verwendung in jedem Template, das `base-layout.html.twig` erweitert:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Benutzerdefinierte Vue-Templates

Chamilo unterstützt installationsbezogene Vue-Seitenüberschreibungen über die Umgebungsvariable `APP_CUSTOM_VUE_TEMPLATE`. Ist sie gesetzt, stellt der Webpack-Build über `DefinePlugin` eine Konstante `ENV_CUSTOM_VUE_TEMPLATE` bereit, und der Vue-Router importiert bedingt Override-Komponenten aus `var/vue_templates/`.

Aktuelle Override-Pfade:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Nur die in `var/vue_templates/` vorhandenen Dateien werden überschrieben — alle übrigen Seiten und Komponenten verwenden die Originaldateien des Kerns.

## Twig-Funktionsreferenz

Wichtige Twig-Funktionen, die in allen Templates verfügbar sind (registriert in `ChamiloExtension`):

| Funktion | Zweck |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Eine Plattformeinstellung lesen |
| `chamilo_settings_has('ns.key')` | Prüfen, ob eine Einstellung existiert |
| `chamilo_settings_all()` | Alle Einstellungen als Array abrufen |
| `theme_asset('path')` | URL zu einem Asset im aktiven Theme |
| `theme_asset_link_tag('path')` | `<link>`-Tag für eine Theme-CSS-Datei |
| `theme_asset_script_tag('path')` | `<script>`-Tag für eine Theme-JS-Datei |
| `theme_asset_base64('path')` | Base64-Data-URI für ein Theme-Asset |
| `theme_logo('header'\|'email')` | URL zum bevorzugten Logo |
| `is_allowed_to_edit(...)` | Hilfsfunktion zur Berechtigungsprüfung |