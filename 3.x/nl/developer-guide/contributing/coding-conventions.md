# Codeerconventies

## PHP

* **Standaard**: PSR-12-codestijl
* **Typedeclaraties**: Gebruik PHP 8.3-typedeclaraties (parametertypen, retourtypen, propertytypen)
* **Strict types**: Alle PHP-bestanden moeten `strict_types=1` declareren
* **Namespaces**: Volg PSR-4-autoloading (bijv. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standaarden**: Volg de coderingsstandaarden en best practices van Symfony

## JavaScript/Vue

* **ESLint + Prettier**: Code wordt gelint met ESLint en geformatteerd met Prettier; de configuratie staat in `eslint.config.mjs` in de projectroot. `prettier-plugin-tailwindcss` is ook ingeschakeld voor automatische sortering van Tailwind-klassen.
* **Composition API**: Gebruik de `<script setup>`-syntaxis van Vue 3 voor nieuwe componenten
* **TypeScript**: TypeScript wordt ondersteund; gebruik het voor typeveilige code

## CSS

* **Tailwind CSS**: Geef de voorkeur aan utility classes boven eigen CSS
* **BEM-naamgeving**: Wanneer eigen CSS nodig is, gebruik de BEM-naamgevingsconventie
* **SCSS**: Gebruik SCSS voor complexe stylesheets

## PHP-static-analysis- en refactoringtools

Het project levert configuratie voor drie extra tools:

| Tool | Configuratiebestand | Doel |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Statische analyse (niveau 5, scant `src/` en testdirectories) |
| **Psalm** | `psalm.xml` | Tweede static-analysis-pass; draait in CI bij elke push |
| **Rector** | `rector.php` | Geautomatiseerde codetransformaties en upgrades |

Voer ze uit via Composer-snelkoppelingen: `composer phpstan`, `composer psalm`. Zie [Testen](../contributing/testing.md) voor de volledige commando's.

## Algemeen

* **Engels**: Alle codecommentaar, variabelenamen en documentatie moeten in het Engels zijn
* **Vertalingen**: Alle tekst die de gebruiker te zien krijgt, moet het vertaalsysteem gebruiken (Vue I18n voor de frontend, Symfony Translator voor de backend)
* **Geen magische waarden**: Gebruik constanten of enums in plaats van hardcoded waarden