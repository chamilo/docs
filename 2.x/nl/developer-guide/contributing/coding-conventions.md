# Codeerconventies

## PHP

* **Standaard**: PSR-12 coderingsstijl
* **Typeverklaringen**: Gebruik PHP 8.2 typeverklaringen (parametertypes, retourtypes, eigenschapstypes)
* **Strikte types**: Alle PHP-bestanden moeten `strict_types=1` declareren
* **Namespaces**: Volg PSR-4 autoloading (bijv. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standaarden**: Volg de coderingsstandaarden en best practices van Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Code wordt gelint met ESLint en geformatteerd met Prettier; configuratie bevindt zich in `eslint.config.mjs` in de projectroot. `prettier-plugin-tailwindcss` is ook ingeschakeld voor automatische sortering van Tailwind-klassen.
* **Composition API**: Gebruik Vue 3's `<script setup>` syntaxis voor nieuwe componenten
* **TypeScript**: TypeScript wordt ondersteund; gebruik het voor typeveilige code

## CSS

* **Tailwind CSS**: Geef de voorkeur aan utility-klassen boven aangepaste CSS
* **BEM-naamgeving**: Gebruik bij aangepaste CSS de BEM-naamgevingsconventie
* **SCSS**: Gebruik SCSS voor complexe stylesheets

## PHP Statische Analyse- en Refactoringtools

Het project wordt geleverd met configuratie voor drie aanvullende tools:

| Tool | Configuratiebestand | Doel |
|------|---------------------|------|
| **PHPStan** | `phpstan.neon` | Statische analyse (niveau 5, scant `src/` en testmappen) |
| **Psalm** | `psalm.xml` | Tweede statische analyse; wordt uitgevoerd in CI bij elke push |
| **Rector** | `rector.php` | Geautomatiseerde codetransformaties en upgrades |

Voer ze uit via Composer-snelkoppelingen: `composer phpstan`, `composer psalm`. Zie [Testen](../contributing/testing.md) voor volledige commando's.

## Algemeen

* **Engels**: Alle codecommentaar, variabelenamen en documentatie moeten in het Engels zijn
* **Vertalingen**: Alle tekst die zichtbaar is voor gebruikers moet gebruikmaken van het vertalingssysteem (Vue I18n voor frontend, Symfony Translator voor backend)
* **Geen magische waarden**: Gebruik constanten of enums in plaats van hardcoded waarden