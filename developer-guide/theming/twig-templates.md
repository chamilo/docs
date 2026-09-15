# Modèles Twig

Chamilo utilise Twig pour les pages rendues côté serveur. Les modèles se trouvent dans `src/CoreBundle/Resources/views/` et sont référencés avec le préfixe d’espace de noms `@ChamiloCore/` (par exemple `@ChamiloCore/Layout/base-layout.html.twig`).

Il n’existe pas de répertoire `templates/` à la racine — tous les modèles Twig se trouvent sous `src/CoreBundle/Resources/views/`.

## Comment Twig et Vue coexistent

La plupart des pages suivent ce flux :

1. Un contrôleur Symfony rend un modèle Twig qui étend une mise en page.
2. La mise en page inclut `vue_setup.html.twig`, qui émet `<div id="app">` et injecte des globales d’exécution (`window.user`, `window.breadcrumb`, etc.) via `vue_js_setup.html.twig`.
3. Vue se monte sur `#app` et gère tout le rendu de l’interface à l’intérieur de cet élément.
4. L’application Vue communique avec le backend via l’API REST.

Pour les pages héritées non encore migrées vers Vue, Symfony rend le HTML complet de la page via Twig et le contenu est placé dans `#sectionMainContent`. Vue se monte tout de même (en fournissant le cadre de la barre latérale et de la barre supérieure), mais la zone de contenu principal est du HTML rendu côté serveur.

## Modèles de mise en page

Toutes les mises en page étendent `@ChamiloCore/Layout/base-layout.html.twig`, qui fournit la structure `<html>`, `<head>` et `<body>`. Variantes de mise en page disponibles :

| Modèle | Objet |
|----------|---------|
| `Layout/base-layout.html.twig` | Modèle racine — enveloppe `<html>`, importe les Macros, émet `<head>` et `<body>` |
| `Layout/layout.html.twig` | Mise en page complète standard avec barre latérale, barre supérieure et zone de contenu |
| `Layout/layout_one_col.html.twig` | Mise en page à une colonne (sans barre latérale) |
| `Layout/layout_two_col.html.twig` | Mise en page à deux colonnes |
| `Layout/layout_content.html.twig` | Enveloppe contenu uniquement |
| `Layout/layout_empty.html.twig` | Mise en page vide avec un habillage minimal |
| `Layout/no_layout.html.twig` | Sans en-tête/pied de page ; le contenu va directement dans `<body>` |
| `Layout/no_layout_scorm.html.twig` | Mise en page nue pour les cadres de contenu SCORM |
| `Layout/blank.html.twig` | Page entièrement blanche |
| `Layout/skill_layout.html.twig` | Mise en page pour la page de la roue des compétences |

## Partiels clés

| Modèle | Objet |
|----------|---------|
| `Layout/head.html.twig` | Contenu de `<head>` : balises meta, toutes les entrées CSS Encore, `colors.css` du thème, entrées JS héritées, balises OpenGraph/Twitter |
| `Layout/foot.html.twig` | Fin du body : point d’entrée JS Vue, injection de `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Émet `<div id="app">` et inclut `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injecte `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | Bannière de consentement aux cookies RGPD |
| `Layout/footer.html.twig` | Barre de pied de page |
| `Layout/course_navigation.html.twig` | Fil d’Ariane de navigation des outils de cours |

## Intégration Webpack Encore

`head.html.twig` charge le CSS de toutes les entrées ; `foot.html.twig` charge le bundle JS Vue :

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

Les entrées JS héritées (`legacy_app`, `legacy_lp`, etc.) sont chargées dans `<head>` car les pages PHP héritées dépendent de leur disponibilité avant que le DOM ne soit prêt.

## Macros

Les macros Twig réutilisables se trouvent dans `Macros/` et sont importées en haut de `base-layout.html.twig` :

| Fichier de macro | Fournit |
|-----------|---------|
| `Macros/box.html.twig` | Aides pour les boîtes de contenu |
| `Macros/actions.html.twig` | Rendu des boutons d’action |
| `Macros/buttons.html.twig` | Aides HTML pour les boutons |
| `Macros/headers.html.twig` | Aides pour les en-têtes de page |
| `Macros/image.html.twig` | Aides pour le rendu d’images |
| `Macros/modals.html.twig` | Aides pour les boîtes de dialogue modales |

Utilisation dans tout modèle qui étend `base-layout.html.twig` :

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Modèles Vue personnalisés

Chamilo prend en charge les substitutions de pages Vue par installation via la variable d’environnement `APP_CUSTOM_VUE_TEMPLATE`. Lorsqu’elle est définie, la compilation Webpack expose une constante `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, et le routeur Vue importe conditionnellement des composants de substitution depuis `var/vue_templates/`.

Emplacements de substitution actuels :

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Seuls les fichiers présents dans `var/vue_templates/` sont substitués — toutes les autres pages et tous les autres composants utilisent les originaux du cœur.

## Référence des fonctions Twig

Fonctions Twig essentielles disponibles dans tous les modèles (enregistrées dans `ChamiloExtension`) :

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Lire un paramètre de la plateforme |
| `chamilo_settings_has('ns.key')` | Vérifier si un paramètre existe |
| `chamilo_settings_all()` | Obtenir tous les paramètres sous forme de tableau |
| `theme_asset('path')` | URL d’une ressource du thème actif |
| `theme_asset_link_tag('path')` | Balise `<link>` pour un fichier CSS du thème |
| `theme_asset_script_tag('path')` | Balise `<script>` pour un fichier JS du thème |
| `theme_asset_base64('path')` | URI de données Base64 pour une ressource du thème |
| `theme_logo('header'\|'email')` | URL du logo préféré |
| `is_allowed_to_edit(...)` | Aide à la vérification des permissions |