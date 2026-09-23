# CSS ja Tailwind

## Tyylitiedostojen arkkitehtuuri

Chamilon tyylit kerrostuvat tässä järjestyksessä:

1. **Tailwind CSS** — Apuluokat asettelulle, välistykselle ja väreille. Määritetty asetuksella `important: true`, jotta apuluokat ohittavat PrimeVue-komponenttien oletukset.
2. **SCSS** — Mukautetut tyylit hakemistossa `assets/css/scss/`, järjestettynä atomien, molekyylien, organismien, asettelun ja komponenttien kerroksiin.
3. **PrimeVue-komponenttien tyylit** — Ohitetaan komponenttikohtaisesti hakemistossa `assets/css/scss/atoms/`.
4. **Teeman `colors.css`** — CSS-muuttujat aktiiviselle väriteemalle, ladataan viimeisenä, jotta ne kaskadoituvat kaiken muun päälle.

PrimeFlex on poistettu tiedostosta `package.json` — Tailwind kattaa kaikki apuluokkatarpeet.

## Päätyylitiedosto (`assets/css/app.scss`)

`app.scss` on Webpackin sisääntulopiste päätyylitiedostolle. Se tuo sisään:

1. `_tailwind.scss` — Tailwindin direktiivit `@tailwind base / components / utilities`
2. `scss/index.scss` — Barrel-tiedosto, joka tuo sisään kaikki SCSS-osatiedostot
3. Kolmannen osapuolen CSS (cropper, select2, daterangepicker, TinyMCE-teema, fancybox, timepicker, qtip)
4. `editor_content.scss` — Tyylit, jotka injektoidaan TinyMCE-editorin iframe-runkoon

## Tailwind-määritys (`tailwind.config.js`)

Keskeiset asetukset:

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

Sisältöpolut skannaavat Vue-komponentit, vanhat PHP-sivut, liitännäistiedostot ja Twig-mallit, jotta käyttämättömät apuluokat poistetaan tuotantokäännöksissä.

### CSS-muuttujiin perustuva värijärjestelmä

Kaikki väritunnisteet perustuvat CSS-muuttujiin kovakoodattujen arvojen sijaan:

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

Apufunktio `colorWithOpacity` tuottaa muodon `rgb(var(--color-primary-base) / <opacity>)`, mikä mahdollistaa läpinäkyvyysvariantit kuten `bg-primary/50`. Varsinaiset RGB-arvot määritellään teemakohtaisesti tiedostossa `var/themes/{slug}/colors.css` ja ladataan ajonaikaisesti — katso [Väriteemat](color-themes.md).

### Tailwind-liitännäiset

`@tailwindcss/forms` ja `@tailwindcss/typography` ovat käytössä.

### Mukautettu tyyppiasteikko

Neljä ylimääräistä fonttikoko/rivikorkeus-paria lisätään asetuksella `theme.extend.fontSize`:

| Luokka | Koko / rivikorkeus |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) on määritetty suoraan tiedostossa `webpack.config.js` funktiolla `enablePostCssLoader()`. Erillistä tiedostoa `postcss.config.js` ei ole.

## Erikoistuneet tyylitiedostot

| Tiedosto | Webpack-sisääntulo | Tarkoitus |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Sovelluksen päätyylit |
| `assets/css/chat.scss` | `css/chat` | Keskustelukäyttöliittymän tyylit |
| `assets/css/document.scss` | `css/document` | Asiakirjakatselimen tyylit |
| `assets/css/editor.scss` | `css/editor` | TinyMCE-editorin kuoren tyylit |
| `assets/css/editor_content.scss` | `css/editor_content` | Tyylit, jotka injektoidaan editorin iframe-runkoon |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-renderöity sisältö |
| `assets/css/print.scss` | `css/print` | Tulostustyylitiedosto |
| `assets/css/responsive.scss` | `css/responsive` | Responsiiviset ohitukset |
| `assets/css/scorm.scss` | `css/scorm` | SCORM-soittimen tyylit |

## SCSS-moduulirakenne (`assets/css/scss/`)

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

## Tailwindin käyttö Vue-komponenteissa

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Koska `important: true` on asetettu tiedostossa `tailwind.config.js`, Tailwind-apuluokat ohittavat luotettavasti PrimeVue-komponenttien tyylit ilman lisäspesifisyyttä.