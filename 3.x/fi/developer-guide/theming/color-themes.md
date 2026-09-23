# Väriteemat

Chamilo 3.0 käyttää tietokantapohjaista väriteemajärjestelmää. Teemoja hallitaan ylläpitokäyttöliittymän kautta, ne tallennetaan tietokantaan ja kirjoitetaan levylle CSS-tiedostoina. Niitä voidaan mukauttaa käyttö-URL-kohtaisesti, jolloin usean URL-osoitteen asennuksilla voi olla erilaiset visuaaliset identiteetit.

## Tietomalli

Teemajärjestelmää ohjaa kaksi entiteettiä:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Ensisijainen avain |
| `title` | string | Ihmisen luettava nimi |
| `slug` | string | Generoidaan automaattisesti kentästä `title` (esim. `"My Theme"` → `my-theme`); käytetään hakemistonimenä polussa `var/themes/` |
| `variables` | array (JSON) | Kuvaus CSS-muuttujan nimestä arvoon (esim. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Liittää `ColorTheme`-entiteetin `AccessUrl`-entiteettiin. Boolean-lippu `active` merkitsee, mikä teema on tällä hetkellä aktiivinen kyseiselle URL-osoitteelle. Vain yksi teema voi olla aktiivinen yhtä käyttö-URL-osoitetta kohden kerrallaan.

## Miten teemat tallennetaan

Kun teema luodaan tai päivitetään API:n kautta, `ColorThemeStateProcessor` generoi CSS-tiedoston ja kirjoittaa sen Flysystem-tiedostojärjestelmään `themes_filesystem` (taustalla `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Generoitu `colors.css` käärii kaikki muuttujat `:root`-lohkoon:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Arvot ovat välilyönnein erotettuja RGB-kanavakolmikkoja (eivät `rgb()`), mikä mahdollistaa Tailwindin koostaa läpinäkyvyysvariantteja kuten `bg-primary/50` ilman lisämäärityksiä.

## Teeman ratkaisun prioriteetti

`ThemeHelper::getVisualTheme()` ratkaisee, mitä teeman slugia sovelletaan millä tahansa sivulla, tässä järjestyksessä:

1. **Nykyisen AccessUrl-osoitteen aktiivinen teema** — `AccessUrlRelColorTheme`-tietue, jossa `active = true`
2. **Käyttäjän valitsema teema** — `User`-entiteettiin tallennettu teema, jos alusta-asetus `profile.user_selected_theme` on käytössä
3. **Kurssiteema** — kurssiasetus `course_theme`, jos alusta-asetus `course.allow_course_theme` on käytössä
4. **Oppimispolun teema** — LP:n arvo `$lp_theme_css`, jos kurssiasetus `allow_learning_path_theme` on käytössä
5. **Ympäristömuuttuja `THEME_FALLBACK`** — asetetaan tiedostossa `.env` muodossa `THEME_FALLBACK='chamilo'`
6. **Oletus** — `chamilo` (koodattu vakiona `ThemeHelper::DEFAULT_THEME`)

## Resurssien tarjoaminen

Teema-aineistot tarjoaa `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) etuliitteellä `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Tarjoa mikä tahansa teema-aineisto (CSS, JS, kuvat); palaa `chamilo`-teemaan, jos tiedostoa ei löydy pyydetystä teemasta |
| `GET /themes/{slug}/logo/{type}` | Tarjoa ensisijainen logo (`header` tai `email`), SVG → PNG -varamenettelyllä |
| `POST /themes/{slug}/logos` | Lataa ylätunniste-/sähköpostilogot (SVG ja/tai PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Poista tietty logo |

Yleinen aineistoreitti (`/{name}/{path}`) palaa automaattisesti `chamilo`-oletusteemaan, kun tiedosto puuttuu pyydetystä teemasta, joten teemojen tarvitsee sisältää vain tiedostot, jotka ne todella ylikirjoittavat.

## Miten teemat ladataan mallipohjissa

Asettelumallipohja `head.html.twig` lataa aktiivisen teeman aineistot Twig-apufunktioilla:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Kolme Twig-funktiota (rekisteröity luokassa `ChamiloExtension`) ratkaisevat aineistopolun `ThemeHelper`-luokan kautta käyttäen samaa varaketjua kuin yllä:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL ratkaistun teeman aineistoon |
| `theme_asset_link_tag('path')` | Täysi `<link rel="stylesheet">`-tunniste |
| `theme_asset_script_tag('path')` | Täysi `<script src="...">`-tunniste |
| `theme_asset_base64('path')` | Aineiston Base64-koodattu data-URI |
| `theme_logo('header'\|'email')` | URL parhaiten saatavilla olevaan logoon |

## API-päätepisteet

Teemojen hallinta on tarjolla API Platform REST API:n kautta (vain ylläpitäjille):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Luo uusi teema |
| `PUT` | `/api/color_themes/{id}` | Päivitä olemassa oleva teema |
| `POST` | `/api/access_url_rel_color_themes` | Liitä/aktivoi teema käyttö-URL-osoitteelle |
| `GET` | `/api/access_url_rel_color_themes` | Listaa teema-assosiaatiot nykyiselle käyttö-URL-osoitteelle |

## Mukautetun teeman luominen

Vakiotyönkulku kulkee hallintakäyttöliittymän kautta (**Admin → Color Themes**), joka kutsuu yllä olevia API-päätepisteitä. Teeman luominen ohjelmallisesti:

1. `POST /api/color_themes` JSON-rungolla:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Tämä tallentaa entiteetin ja kirjoittaa tiedoston `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` teeman liittämiseksi ja aktivoimiseksi nykyiselle access URL:lle:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Mukautettujen kuvien (logo, favicon, taustat) lisäämiseksi lataa ne osoitteeseen `POST /themes/{slug}/logos` tai sijoita ne suoraan hakemistoon `var/themes/{slug}/images/`.

## Väri muuttujien viite

Kaikki muuttujat, joita oletusarvoinen Tailwind-konfiguraatio odottaa:

| Muuttuja | Tarkoitus |
|----------|---------|
| `--color-primary-base` | Ensisijainen brändiväri |
| `--color-primary-gradient` | Tummempi liukuvärin pysähdyskohta ensisijaiselle |
| `--color-primary-button-text` | Tekstiväri ensisijaisissa painikkeissa |
| `--color-primary-button-alternative-text` | Vaihtoehtoinen tekstiväri ensisijaisissa painikkeissa |
| `--color-secondary-base` | Toissijainen korostusväri |
| `--color-secondary-gradient` | Liukuvärin pysähdyskohta toissijaiselle |
| `--color-secondary-button-text` | Tekstiväri toissijaisissa painikkeissa |
| `--color-tertiary-base` | Kolmannen tason väri |
| `--color-tertiary-gradient` | Liukuvärin pysähdyskohta kolmannelle tasolle |
| `--color-tertiary-button-text` | Tekstiväri kolmannen tason painikkeissa |
| `--color-success-base` | Onnistumistilan väri |
| `--color-success-gradient` | Liukuvärin pysähdyskohta onnistumiselle |
| `--color-success-button-text` | Tekstiväri onnistumispainikkeissa |
| `--color-info-base` | Infotilan väri |
| `--color-info-gradient` | Liukuvärin pysähdyskohta infolle |
| `--color-info-button-text` | Tekstiväri infopainikkeissa |
| `--color-warning-base` | Varoitustilan väri |
| `--color-warning-gradient` | Liukuvärin pysähdyskohta varoitukselle |
| `--color-warning-button-text` | Tekstiväri varoituspainikkeissa |
| `--color-danger-base` | Vaara-/virhetilan väri |
| `--color-danger-gradient` | Liukuvärin pysähdyskohta vaaralle |
| `--color-danger-button-text` | Tekstiväri vaarapainikkeissa |
| `--color-form-base` | Lomake-elementtien korostusväri |