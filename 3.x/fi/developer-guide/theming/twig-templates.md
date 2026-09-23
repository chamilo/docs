# Twig-mallit

Chamilo käyttää Twigiä palvelinpuolella renderöitäville sivuille. Mallit sijaitsevat hakemistossa `src/CoreBundle/Resources/views/` ja niihin viitataan nimitilan etuliitteellä `@ChamiloCore/` (esim. `@ChamiloCore/Layout/base-layout.html.twig`).

Ylimmän tason `templates/`-hakemistoa ei ole — kaikki Twig-mallit ovat hakemistossa `src/CoreBundle/Resources/views/`.

## Miten Twig ja Vue toimivat rinnakkain

Useimmat sivut noudattavat tätä kulkua:

1. Symfony-ohjain renderöi Twig-mallin, joka laajentaa asettelua.
2. Asettelu sisällyttää tiedoston `vue_setup.html.twig`, joka tuottaa elementin `<div id="app">` ja injektoi ajonaikaiset globaalit (`window.user`, `window.breadcrumb` jne.) tiedoston `vue_js_setup.html.twig` kautta.
3. Vue kiinnittyy elementtiin `#app` ja hoitaa kaiken käyttöliittymän renderöinnin sen sisällä.
4. Vue-sovellus kommunikoi taustajärjestelmän kanssa REST-rajapinnan kautta.

Vanhoilla sivuilla, joita ei ole vielä siirretty Vueen, Symfony renderöi koko sivun HTML:n Twigin kautta ja sisältö sijoitetaan elementtiin `#sectionMainContent`. Vue kiinnittyy silti (tarjoten sivupalkin ja yläpalkin kehyksen), mutta pääsisältöalue on palvelimella renderöityä HTML:ää.

## Asettelumallit

Kaikki asettelut laajentavat mallia `@ChamiloCore/Layout/base-layout.html.twig`, joka tarjoaa rakenteen `<html>`, `<head>` ja `<body>`. Käytettävissä olevat asetteluvariantit:

| Malli | Tarkoitus |
|----------|---------|
| `Layout/base-layout.html.twig` | Juurimalli — `<html>`-kehys, tuo Macrot, tuottaa `<head>`- ja `<body>`-osat |
| `Layout/layout.html.twig` | Vakioasettelu sivupalkilla, yläpalkilla ja sisältöalueella |
| `Layout/layout_one_col.html.twig` | Yksipalstainen asettelu (ei sivupalkkia) |
| `Layout/layout_two_col.html.twig` | Kaksipalstainen asettelu |
| `Layout/layout_content.html.twig` | Vain sisältöä sisältävä kääre |
| `Layout/layout_empty.html.twig` | Tyhjä asettelu minimaalisella kehyksellä |
| `Layout/no_layout.html.twig` | Ei ylätunnistetta/alatunnistetta; sisältö menee suoraan `<body>`-elementtiin |
| `Layout/no_layout_scorm.html.twig` | Paljas asettelu SCORM-sisältökehyksille |
| `Layout/blank.html.twig` | Täysin tyhjä sivu |
| `Layout/skill_layout.html.twig` | Asettelu taitopyöräsivulle |

## Keskeiset osamallit

| Malli | Tarkoitus |
|----------|---------|
| `Layout/head.html.twig` | `<head>`-sisältö: meta-tunnisteet, kaikki Encore CSS -merkinnät, teeman `colors.css`, vanhat JS-merkinnät, OpenGraph-/Twitter-tunnisteet |
| `Layout/foot.html.twig` | Body-osan loppu: Vuen JS-aloituspiste, `tracking.footer_extra_content`-injektio |
| `Layout/vue_setup.html.twig` | Tuottaa elementin `<div id="app">` ja sisällyttää tiedoston `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injektoi `window.user`, `window.breadcrumb`, `window.languages` jne. |
| `Layout/cookie_banner.html.twig` | GDPR-evästebanneri |
| `Layout/footer.html.twig` | Sivun alatunnistepalkki |
| `Layout/course_navigation.html.twig` | Kurssityökalujen navigointipolku |

## Webpack Encore -integraatio

`head.html.twig` lataa CSS:n kaikille merkinnöille; `foot.html.twig` lataa Vuen JS-paketin:

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

Vanhat JS-merkinnät (`legacy_app`, `legacy_lp` jne.) ladataan `<head>`-osassa, koska vanhat PHP-sivut edellyttävät niiden olevan käytettävissä ennen DOM:n valmiutta.

## Macrot

Uudelleenkäytettävät Twig-macrot ovat hakemistossa `Macros/` ja ne tuodaan tiedoston `base-layout.html.twig` alussa:

| Macro-tiedosto | Tarjoaa |
|-----------|---------|
| `Macros/box.html.twig` | Sisältölaatikon apufunktiot |
| `Macros/actions.html.twig` | Toimintopainikkeiden renderöinti |
| `Macros/buttons.html.twig` | Painikkeiden HTML-apufunktiot |
| `Macros/headers.html.twig` | Sivun otsikon apufunktiot |
| `Macros/image.html.twig` | Kuvien renderöinnin apufunktiot |
| `Macros/modals.html.twig` | Modaalidialogien apufunktiot |

Käyttö missä tahansa mallissa, joka laajentaa `base-layout.html.twig`-mallia:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Mukautetut Vue-mallit

Chamilo tukee asennuskohtaisia Vue-sivujen ohituksia ympäristömuuttujan `APP_CUSTOM_VUE_TEMPLATE` kautta. Kun se on asetettu, Webpack-koonti paljastaa vakion `ENV_CUSTOM_VUE_TEMPLATE` `DefinePlugin`-laajennuksen kautta, ja Vue-reititin tuo ehdollisesti ohituskomponentteja hakemistosta `var/vue_templates/`.

Nykyiset ohitussijainnit:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Vain hakemistossa `var/vue_templates/` olevat tiedostot ohitetaan — kaikki muut sivut ja komponentit käyttävät ytimen alkuperäisiä.

## Twig-funktioiden viite

Keskeiset Twig-funktiot, jotka ovat käytettävissä kaikissa mallipohjissa (rekisteröity `ChamiloExtension`-laajennuksessa):

| Funktio | Tarkoitus |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Lue alustan asetus |
| `chamilo_settings_has('ns.key')` | Tarkista, onko asetus olemassa |
| `chamilo_settings_all()` | Hae kaikki asetukset taulukkona |
| `theme_asset('path')` | URL aktiivisen teeman resurssiin |
| `theme_asset_link_tag('path')` | `<link>`-tunniste teeman CSS-tiedostolle |
| `theme_asset_script_tag('path')` | `<script>`-tunniste teeman JS-tiedostolle |
| `theme_asset_base64('path')` | Base64-data-URI teeman resurssille |
| `theme_logo('header'\|'email')` | URL ensisijaiseen logoon |
| `is_allowed_to_edit(...)` | Käyttöoikeuden tarkistuksen apufunktio |