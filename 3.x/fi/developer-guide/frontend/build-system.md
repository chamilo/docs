# Käännösjärjestelmä

Chamilo käyttää **Webpack 5** -työkalua **Symfony Webpack Encore** -laajennoksen kautta käyttöliittymäresurssien kääntämiseen. Koko käännöskonfiguraatio on tiedostossa `webpack.config.js` projektin juuressa.

Tuloste kirjoitetaan hakemistoon `public/build/`, ja sitä palvellaan julkisesta polusta `/build`.

## Sisääntulopisteet

### JavaScript

| Sisääntulo | Lähde | Tarkoitus |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Pääasiallinen Vue 3 -sovellus |
| `vue_installer` | `assets/vue/main_installer.js` | Asennusvelho |
| `legacy_app` | `assets/js/legacy/app.js` | Vanha JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Tehtäväsoitin |
| `legacy_lp` | `assets/js/legacy/lp.js` | Oppimispolun soitin |
| `legacy_document` | `assets/js/legacy/document.js` | Asiakirjakatselin |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Vanha ruudukkovimpain |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Kehysvalmiuden lataaja vanhoille iframe-kehyksille |
| `translatehtml` | `assets/js/translatehtml.js` | HTML-käännösavustaja |
| `glossary_auto` | `assets/js/glossary-auto.js` | Sanastotermien automaattinen korostus |

### CSS

| Sisääntulo | Lähde |
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

## Käännösominaisuudet

* **Vue 3 SFC** — `.vue`-yksitiedostokomponentit kääntää `vue-loader`; ajonaikainen kääntäjä on pois käytöstä (`runtimeCompilerBuild: false`), joten kaikki mallipohjat on esikäännettävä
* **TypeScript** — Vain transpilointitila (`transpileOnly: true`) nopeisiin käännöksiin, ei tyyppitarkistusta käännöksen aikana
* **Sass/SCSS** — Täysi SCSS-tuki `sass-loader`-lataimen kautta
* **Tailwind CSS** — Utility-first-CSS käsitellään linjassa PostCSS:llä (konfiguroitu tiedostossa `webpack.config.js`; erillistä `postcss.config.js`-tiedostoa ei ole)
* **Babel** — ES6+-transpilointi asetuksilla `@babel/preset-env` ja `core-js@3`-polyfilleillä (`useBuiltIns: "usage"`)
* **jQueryn automaattinen tarjonta** — `autoProvidejQuery()` tekee `$`- ja `jQuery`-tunnisteet globaalisti saataville ilman erillisiä tuonteja, vanhan koodin tueksi
* **Lähdekartat** — Käytössä vain kehitystilassa
* **Yksi runtime-chunk** — Jaettu runtime kaikille sisääntuloille
* **Tiedostojärjestelmävälimuisti** — Webpackin pysyvä tiedostojärjestelmävälimuisti on käytössä inkrementaalisten uudelleenkäännösten nopeuttamiseksi
* **Chunk-nimiavaruudet** — `output.uniqueName` ja `output.chunkLoadingGlobal` on asetettu arvoihin `"chamilo"` / `"webpackChunkChamilo"`, jotta chunk-lataus ei törmää, kun samalla sivulla on useita Webpack-paketteja

## Vain tuotantoon tarkoitetut ominaisuudet

* **Versiointi** — Sisältötiivisteen jälkiliitteet kaikissa tulostetiedostonimissä (`enableVersioning()`)
* **Aliresurssien eheys** — `integrity`-attribuutit `<script>`- ja `<link>`-tageissa (`enableIntegrityHashes()`)
* **Tulosteen siivous** — `public/build/` tyhjennetään ennen jokaista tuotantokäännöstä

### Tiivistettömät resurssikopiot (`CopyUnhashedAssetsPlugin`)

Jotkin vanhat PHP-sivut viittaavat resursseihin kiinteällä tiedostonimellä eivätkä voi käyttää Webpack-manifestia. Mukautettu `CopyUnhashedAssetsPlugin` (määritelty tiedoston `webpack.config.js` lopussa) kopioi tietyt tiivistetyt tuotantotiedostot lisäpolkuun ilman tiivistettä kunkin käännöksen jälkeen:

| Tiivistetty tiedosto | Tiivistetön kopio |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Kopioidut kirjastoresurssit

`copyFiles()` kopioi joukon npm-paketteja suoraan hakemistoon `public/build/libs/` niputtamatta niitä, jotta niitä voidaan käyttää `<script>`- / `<link>`-tageilla vanhoissa mallipohjissa:

* `flatpickr` (JS + CSS + kielitiedostot)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment`-kielitiedostot
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Käännöskomennot

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-konfiguraatio

Tailwind on konfiguroitu tiedostossa `tailwind.config.js`. Keskeiset kohdat:

* **`important: true`** — Kaikki generoidut utility-luokat sisältävät `!important`-määreen, jolloin ne voivat ylikirjoittaa PrimeVue-komponenttien tyylejä ilman ylimääräisiä spesifisyyskikkoja
* **Sisältöpolut** — Tailwind skannaa luokkien käyttöä poluista `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` ja `src/CoreBundle/Resources/views/**/*.html.twig`
* **CSS-muuttujiin perustuva värijärjestelmä** — Jokainen väritoken (primary, secondary, tertiary, success, info, warning, danger) perustuu CSS-muuttujaan (esim. `--color-primary-base`), joka määritellään teemakohtaisesti tiedostossa `var/themes/[theme-name]/colors.css`. Arvot ovat välilyönnein erotettuja RGB-kanavakolmikkoja, mikä mahdollistaa Tailwindin läpinäkyvyys-utilityt (`bg-primary/50`)
* **Mukautettu fonttiskaala** — `body-1`-, `body-2`-, `caption`- ja `tiny`-koko-/rivikorkeusparit lisätään kohdassa `theme.extend.fontSize`
* **Lisäosat** — `@tailwindcss/forms` ja `@tailwindcss/typography` ovat käytössä

PostCSS (Tailwind + Autoprefixer) on konfiguroitu suoraan tiedostossa `webpack.config.js` metodilla `enablePostCssLoader()` — erillistä `postcss.config.js`-tiedostoa ei ole.