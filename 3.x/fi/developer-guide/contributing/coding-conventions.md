# Koodauskäytännöt

## PHP

* **Standardi**: PSR-12-koodityyli
* **Tyyppimääritykset**: Käytä PHP 8.3:n tyyppimäärityksiä (parametrityypit, paluutyypit, ominaisuustyypit)
* **Tiukat tyypit**: Kaikissa PHP-tiedostoissa tulee olla ilmoitus `strict_types=1`
* **Nimiavaruudet**: Noudata PSR-4-autolatausta (esim. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standardit**: Noudata Symfonyn koodausstandardeja ja parhaita käytäntöjä

## JavaScript/Vue

* **ESLint + Prettier**: Koodi tarkistetaan ESLintillä ja muotoillaan Prettierillä; määritys on projektin juuressa tiedostossa `eslint.config.mjs`. Myös `prettier-plugin-tailwindcss` on käytössä Tailwind-luokkien automaattista järjestämistä varten.
* **Composition API**: Käytä uusissa komponenteissa Vue 3:n `<script setup>` -syntaksia
* **TypeScript**: TypeScriptia tuetaan; käytä sitä tyyppiturvalliseen koodiin

## CSS

* **Tailwind CSS**: Suosi apuluokkia mukautetun CSS:n sijaan
* **BEM-nimeäminen**: Kun tarvitaan mukautettua CSS:ää, käytä BEM-nimeämiskäytäntöä
* **SCSS**: Käytä SCSS:ää monimutkaisissa tyylitiedostoissa

## PHP:n staattisen analyysin ja refaktoroinnin työkalut

Projekti sisältää määritykset kolmelle lisätyökalulle:

| Työkalu | Määritystiedosto | Tarkoitus |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Staattinen analyysi (taso 5, skannaa `src/`- ja testihakemistot) |
| **Psalm** | `psalm.xml` | Toinen staattisen analyysin kierros; ajetaan CI:ssä jokaisella pushilla |
| **Rector** | `rector.php` | Automaattiset koodimuunnokset ja päivitykset |

Aja ne Composer-oikoteillä: `composer phpstan`, `composer psalm`. Katso täydet komennot kohdasta [Testaus](../contributing/testing.md).

## Yleistä

* **Englanti**: Kaikkien koodikommenttien, muuttujanimien ja dokumentaation tulee olla englanniksi
* **Käännökset**: Kaiken käyttäjälle näkyvän tekstin tulee käyttää käännösjärjestelmää (Vue I18n käyttöliittymässä, Symfony Translator taustajärjestelmässä)
* **Ei taika-arvoja**: Käytä vakioita tai enum-tyyppejä kovakoodattujen arvojen sijaan