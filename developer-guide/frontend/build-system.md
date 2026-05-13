# Système de Build

Chamilo utilise **Webpack 5** via **Symfony Webpack Encore** pour la construction des ressources frontend. La configuration complète du build se trouve dans `webpack.config.js` à la racine du projet.

La sortie est écrite dans `public/build/` et servie sous le chemin public `/build`.

## Points d'entrée

### JavaScript

| Entrée | Source | Objectif |
|-------|--------|----------|
| `vue` | `assets/vue/main.js` | Application principale Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Assistant d'installation |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript legacy |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Lecteur d'exercices |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lecteur de parcours d'apprentissage |
| `legacy_document` | `assets/js/legacy/document.js` | Visionneuse de documents |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de grille legacy |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Chargeur prêt pour les iframes legacy |
| `translatehtml` | `assets/js/translatehtml.js` | Aide à la traduction HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Mise en évidence automatique des termes du glossaire |

### CSS

| Entrée | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Fonctionnalités de Build

* **Vue 3 SFC** — Composants de fichier unique `.vue` compilés par `vue-loader` ; le compilateur d'exécution est désactivé (`runtimeCompilerBuild: false`), donc tous les templates doivent être pré-compilés
* **TypeScript** — Mode de transpilation uniquement (`transpileOnly: true`) pour des builds rapides, sans vérification de type pendant le build
* **Sass/SCSS** — Support complet de SCSS via `sass-loader`
* **Tailwind CSS** — CSS utilitaire traité en ligne via PostCSS (configuré dans `webpack.config.js` ; il n'y a pas de fichier séparé `postcss.config.js`)
* **Babel** — Transpilation ES6+ avec `@babel/preset-env` et polyfills `core-js@3` (`useBuiltIns: "usage"`)
* **Provision automatique de jQuery** — `autoProvidejQuery()` rend `$` et `jQuery` disponibles globalement sans importations explicites, supportant le code legacy
* **Source maps** — Activés uniquement en développement
* **Chunk d'exécution unique** — Runtime partagé pour toutes les entrées
* **Cache du système de fichiers** — Le cache persistant du système de fichiers de Webpack est activé pour accélérer les rebuilds incrémentaux
* **Noms d'espaces pour les chunks** — `output.uniqueName` et `output.chunkLoadingGlobal` sont définis sur `"chamilo"` / `"webpackChunkChamilo"` pour éviter les collisions de chargement de chunks lorsque plusieurs bundles Webpack coexistent sur une page

## Fonctionnalités spécifiques à la production

* **Versionnement** — Suffixes de hachage de contenu sur tous les noms de fichiers de sortie (`enableVersioning()`)
* **Intégrité des sous-ressources** — Attributs `integrity` sur les balises `<script>` et `<link>` (`enableIntegrityHashes()`)
* **Nettoyage de la sortie** — `public/build/` est vidé avant chaque build de production

### Copies d'actifs non hachés (`CopyUnhashedAssetsPlugin`)

Certaines pages PHP legacy référencent des actifs par un nom de fichier fixe et ne peuvent pas utiliser le manifeste Webpack. Un plugin personnalisé `CopyUnhashedAssetsPlugin` (défini en bas de `webpack.config.js`) copie certains fichiers de production hachés vers un chemin supplémentaire non haché après chaque build :

| Fichier haché | Copie non hachée |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Actifs de bibliothèque copiés

`copyFiles()` copie un certain nombre de packages npm directement dans `public/build/libs/` sans les bundler, pour une utilisation via des balises `<script>` / `<link>` dans les templates legacy :

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Commandes de Build

```bash
# Build de développement
yarn encore dev

# Build de développement avec surveillance des fichiers
yarn encore dev --watch

# Build de production (minifié, versionné, hachages d'intégrité)
yarn encore production
```

## Configuration de Tailwind

Tailwind est configuré dans `tailwind.config.js`. Points clés :

* **`important: true`** — Toutes les utilités générées incluent `!important`, leur permettant de surcharger les styles des composants PrimeVue sans astuces de spécificité supplémentaires
* **Chemins de contenu** — Tailwind scanne `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}`, et `src/CoreBundle/Resources/views/**/*.html.twig` pour l'utilisation des classes
* **Système de couleurs par variables CSS** — Chaque token de couleur (primary, secondary, tertiary, success, info, warning, danger) est soutenu par une propriété personnalisée CSS (par exemple `--color-primary-base`) définie par thème dans `var/themes/[theme-name]/colors.css`. Les valeurs sont des triplets de canaux RGB séparés par des espaces, permettant les utilités d'opacité de Tailwind (`bg-primary/50`)
* **Échelle de police personnalisée** — Paires de taille/hauteur de ligne `body-1`, `body-2`, `caption`, `tiny` ajoutées via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` et `@tailwindcss/typography` sont activés

PostCSS (Tailwind + Autoprefixer) est configuré en ligne dans `webpack.config.js` via `enablePostCssLoader()` — il n'y a pas de fichier autonome `postcss.config.js`.