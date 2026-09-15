# Système de compilation

Chamilo utilise **Webpack 5** via **Symfony Webpack Encore** pour compiler les ressources frontend. La configuration complète de compilation se trouve dans `webpack.config.js` à la racine du projet.

La sortie est écrite dans `public/build/`, servie sous le chemin public `/build`.

## Points d’entrée

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Application Vue 3 principale |
| `vue_installer` | `assets/vue/main_installer.js` | Assistant d’installation |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript héritage |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Lecteur d’exercices |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lecteur de parcours d’apprentissage |
| `legacy_document` | `assets/js/legacy/document.js` | Visionneuse de documents |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de grille héritage |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Chargeur frame-ready pour les iframes héritage |
| `translatehtml` | `assets/js/translatehtml.js` | Aide à la traduction HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Surlignage automatique des termes du glossaire |

### CSS

| Entry | Source |
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

## Fonctionnalités de compilation

* **Vue 3 SFC** — composants à fichier unique `.vue` compilés par `vue-loader` ; le compilateur d’exécution est désactivé (`runtimeCompilerBuild: false`), donc tous les templates doivent être précompilés
* **TypeScript** — mode transpile-only (`transpileOnly: true`) pour des compilations rapides, sans vérification de types pendant la compilation
* **Sass/SCSS** — prise en charge complète de SCSS via `sass-loader`
* **Tailwind CSS** — CSS utilitaire traité en ligne via PostCSS (configuré dans `webpack.config.js` ; il n’existe pas de `postcss.config.js` distinct)
* **Babel** — transpilation ES6+ avec `@babel/preset-env` et polyfills `core-js@3` (`useBuiltIns: "usage"`)
* **Provision automatique de jQuery** — `autoProvidejQuery()` rend `$` et `jQuery` disponibles globalement sans imports explicites, pour le code héritage
* **Source maps** — activées uniquement en développement
* **Chunk d’exécution unique** — runtime partagé pour tous les points d’entrée
* **Cache système de fichiers** — le cache persistant de Webpack sur le système de fichiers est activé pour accélérer les recompilations incrémentales
* **Espace de noms des chunks** — `output.uniqueName` et `output.chunkLoadingGlobal` sont définis sur `"chamilo"` / `"webpackChunkChamilo"` afin d’éviter les collisions de chargement de chunks lorsque plusieurs bundles Webpack coexistent sur une page

## Fonctionnalités réservées à la production

* **Versioning** — suffixes de hachage de contenu sur tous les noms de fichiers de sortie (`enableVersioning()`)
* **Subresource Integrity** — attributs `integrity` sur les balises `<script>` et `<link>` (`enableIntegrityHashes()`)
* **Nettoyage de la sortie** — `public/build/` est vidé avant chaque compilation de production

### Copies d’assets non hachés (`CopyUnhashedAssetsPlugin`)

Certaines pages PHP héritage référencent des assets par un nom de fichier fixe et ne peuvent pas utiliser le manifeste Webpack. Un plugin personnalisé `CopyUnhashedAssetsPlugin` (défini en bas de `webpack.config.js`) copie certains fichiers de production hachés vers un chemin supplémentaire non haché après chaque compilation :

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Assets de bibliothèques copiés

`copyFiles()` copie un certain nombre de paquets npm directement dans `public/build/libs/` sans les bundler, pour une utilisation via des balises `<script>` / `<link>` dans les templates héritage :

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* locales `moment`
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Commandes de compilation

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Configuration Tailwind

Tailwind est configuré dans `tailwind.config.js`. Points clés :

* **`important: true`** — Toutes les utilitaires générées incluent `!important`, ce qui leur permet de surcharger les styles des composants PrimeVue sans astuces de spécificité supplémentaires
* **Chemins de contenu** — Tailwind analyse `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` et `src/CoreBundle/Resources/views/**/*.html.twig` pour détecter l’usage des classes
* **Système de couleurs par variables CSS** — Chaque jeton de couleur (primary, secondary, tertiary, success, info, warning, danger) s’appuie sur une propriété CSS personnalisée (par ex. `--color-primary-base`) définie par thème dans `var/themes/[theme-name]/colors.css`. Les valeurs sont des triplets de canaux RGB séparés par des espaces, ce qui active les utilitaires d’opacité Tailwind (`bg-primary/50`)
* **Échelle de polices personnalisée** — Les paires taille/interligne `body-1`, `body-2`, `caption`, `tiny` sont ajoutées via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` et `@tailwindcss/typography` sont activés

PostCSS (Tailwind + Autoprefixer) est configuré en ligne dans `webpack.config.js` via `enablePostCssLoader()` — il n’existe pas de fichier autonome `postcss.config.js`.