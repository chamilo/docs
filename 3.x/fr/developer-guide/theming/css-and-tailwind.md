# CSS et Tailwind

## Architecture des feuilles de style

Les styles de Chamilo sont empilés dans cet ordre :

1. **Tailwind CSS** — Classes utilitaires pour la mise en page, l’espacement et la couleur. Configuré avec `important: true` afin que les utilitaires surchargent les valeurs par défaut des composants PrimeVue.
2. **SCSS** — Styles personnalisés dans `assets/css/scss/`, organisés en couches atoms, molecules, organisms, layout et components.
3. **Styles des composants PrimeVue** — Surchargés composant par composant dans `assets/css/scss/atoms/`.
4. **`colors.css` du thème** — Propriétés CSS personnalisées du thème de couleurs actif, chargées en dernier afin qu’elles se propagent au-dessus de tout le reste.

PrimeFlex a été retiré de `package.json` — Tailwind couvre tous les besoins en utilitaires.

## Feuille de style principale (`assets/css/app.scss`)

`app.scss` est le point d’entrée Webpack de la feuille de style principale. Il importe :

1. `_tailwind.scss` — Directives Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — Fichier baril qui importe tous les partiels SCSS
3. CSS tiers (cropper, select2, daterangepicker, skin TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Styles injectés dans le corps de l’iframe de l’éditeur TinyMCE

## Configuration Tailwind (`tailwind.config.js`)

Paramètres clés :

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

Les chemins de contenu parcourent les composants Vue, les pages PHP héritées, les fichiers de plugins et les modèles Twig afin que les utilitaires inutilisés soient purgés lors des builds de production.

### Système de couleurs par variables CSS

Tous les jetons de couleur s’appuient sur des propriétés CSS personnalisées plutôt que sur des valeurs en dur :

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

L’assistant `colorWithOpacity` émet `rgb(var(--color-primary-base) / <opacity>)`, ce qui permet des variantes d’opacité telles que `bg-primary/50`. Les valeurs RGB réelles sont définies par thème dans `var/themes/{slug}/colors.css` et chargées à l’exécution — voir [Thèmes de couleurs](color-themes.md).

### Plugins Tailwind

`@tailwindcss/forms` et `@tailwindcss/typography` sont activés.

### Échelle typographique personnalisée

Quatre paires supplémentaires taille de police / interligne sont ajoutées via `theme.extend.fontSize` :

| Classe | Taille / Interligne |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) est configuré en ligne dans `webpack.config.js` via `enablePostCssLoader()`. Il n’existe pas de fichier autonome `postcss.config.js`.

## Feuilles de style spécialisées

| Fichier | Entrée Webpack | Rôle |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Styles principaux de l’application |
| `assets/css/chat.scss` | `css/chat` | Styles de l’interface de discussion |
| `assets/css/document.scss` | `css/document` | Styles du visualiseur de documents |
| `assets/css/editor.scss` | `css/editor` | Styles de l’enveloppe de l’éditeur TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Styles injectés dans le corps de l’iframe de l’éditeur |
| `assets/css/markdown.scss` | `css/markdown` | Contenu rendu en Markdown |
| `assets/css/print.scss` | `css/print` | Feuille de style d’impression |
| `assets/css/responsive.scss` | `css/responsive` | Surcharges responsives |
| `assets/css/scorm.scss` | `css/scorm` | Styles du lecteur SCORM |

## Structure des modules SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Utiliser Tailwind dans les composants Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Parce que `important: true` est défini dans `tailwind.config.js`, les utilitaires Tailwind surchargent de façon fiable les styles des composants PrimeVue sans spécificité supplémentaire.