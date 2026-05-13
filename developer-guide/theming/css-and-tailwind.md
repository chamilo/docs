# CSS et Tailwind

## Architecture des feuilles de style

Les styles de Chamilo sont organisés dans cet ordre :

1. **Tailwind CSS** — Classes utilitaires pour la mise en page, l'espacement et la couleur. Configuré avec `important: true` pour que les utilitaires surchargent les styles par défaut des composants PrimeVue.
2. **SCSS** — Styles personnalisés dans `assets/css/scss/`, organisés en couches d'atomes, de molécules, d'organismes, de mise en page et de composants.
3. **Styles des composants PrimeVue** — Surchargés par composant dans `assets/css/scss/atoms/`.
4. **Thème `colors.css`** — Propriétés CSS personnalisées pour le thème de couleur actif, chargées en dernier pour qu'elles prévalent sur tout le reste.

PrimeFlex est listé dans `package.json` mais n'est pas importé — Tailwind couvre tous les besoins en utilitaires.

## Feuille de style principale (`assets/css/app.scss`)

`app.scss` est le point d'entrée Webpack pour la feuille de style principale. Elle importe :

1. `_tailwind.scss` — Directives `@tailwind base / components / utilities` de Tailwind
2. `scss/index.scss` — Fichier baril qui importe tous les fichiers partiels SCSS
3. CSS tiers (cropper, select2, daterangepicker, skin TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Styles injectés dans le corps de l'iframe de l'éditeur TinyMCE

## Configuration de Tailwind (`tailwind.config.js`)

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

Les chemins de contenu scannent les composants Vue, les pages PHP héritées, les fichiers de plugins et les modèles Twig afin que les utilitaires inutilisés soient purgés lors des builds de production.

### Système de couleurs basé sur des variables CSS

Tous les jetons de couleur sont soutenus par des propriétés CSS personnalisées plutôt que par des valeurs codées en dur :

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

L'aide `colorWithOpacity` génère `rgb(var(--color-primary-base) / <opacity>)`, permettant des variantes d'opacité telles que `bg-primary/50`. Les valeurs RGB réelles sont définies par thème dans `var/themes/{slug}/colors.css` et chargées au moment de l'exécution — voir [Thèmes de couleur](color-themes.md).

### Plugins Tailwind

`@tailwindcss/forms` et `@tailwindcss/typography` sont activés.

### Échelle typographique personnalisée

Quatre paires supplémentaires de taille de police et d'interligne sont ajoutées via `theme.extend.fontSize` :

| Classe | Taille / Interligne |
|-------|---------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) est configuré directement dans `webpack.config.js` via `enablePostCssLoader()`. Il n'y a pas de fichier autonome `postcss.config.js`.

## Feuilles de style spécialisées

| Fichier | Point d'entrée Webpack | Objectif |
|------|-----------------------|----------|
| `assets/css/app.scss` | `app` | Styles principaux de l'application |
| `assets/css/chat.scss` | `css/chat` | Styles de l'interface de chat |
| `assets/css/document.scss` | `css/document` | Styles du visualiseur de documents |
| `assets/css/editor.scss` | `css/editor` | Styles de l'enveloppe de l'éditeur TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Styles injectés dans le corps de l'iframe de l'éditeur |
| `assets/css/markdown.scss` | `css/markdown` | Contenu rendu en Markdown |
| `assets/css/print.scss` | `css/print` | Feuille de style pour l'impression |
| `assets/css/responsive.scss` | `css/responsive` | Surcharges responsives |
| `assets/css/scorm.scss` | `css/scorm` | Styles du lecteur SCORM |

## Structure des modules SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Baril — importe tout ce qui suit
├── abstracts/        # Mixins et fonctions partagées
├── settings/         # Jetons de design (typographie, base des composants)
├── atoms/            # Surcharges PrimeVue par composant
├── molecules/        # Petits motifs composés (puces, barres d'outils, états vides)
├── organisms/        # Zones plus larges (barre latérale, tableau de données, dialogue, panneau LP)
├── layout/           # Squelette de page (barre supérieure, conteneur principal, fil d'Ariane)
├── components/       # Styles spécifiques aux fonctionnalités (blog, exercice, social, compétence, …)
└── libs/             # Surcharges tierces (FullCalendar, MediaElement.js)
```

## Utilisation de Tailwind dans les composants Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Puisque `important: true` est défini dans `tailwind.config.js`, les utilitaires Tailwind surchargent de manière fiable les styles des composants PrimeVue sans nécessiter de spécificité supplémentaire.