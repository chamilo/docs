# Kodningskonventioner

## PHP

* **Standard**: PSR-12-kodestil
* **Typedeklarationer**: Brug PHP 8.3-typedeklarationer (parametertyper, returtyper, egenskabstyper)
* **Strikte typer**: Alle PHP-filer bør deklarere `strict_types=1`
* **Navnerum**: Følg PSR-4-autoloading (f.eks. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standarder**: Følg Symfonys kodestandarder og bedste praksis

## JavaScript/Vue

* **ESLint + Prettier**: Koden lintes med ESLint og formateres med Prettier; konfigurationen ligger i `eslint.config.mjs` i projektets rod. `prettier-plugin-tailwindcss` er også aktiveret til automatisk sortering af Tailwind-klasser.
* **Composition API**: Brug Vue 3's `<script setup>`-syntaks til nye komponenter
* **TypeScript**: TypeScript understøttes; brug det til typesikker kode

## CSS

* **Tailwind CSS**: Foretræk utility-klasser frem for tilpasset CSS
* **BEM-navngivning**: Når tilpasset CSS er nødvendig, skal BEM-navngivningskonventionen bruges
* **SCSS**: Brug SCSS til komplekse stylesheets

## PHP-værktøjer til statisk analyse og refaktorering

Projektet leveres med konfiguration til tre yderligere værktøjer:

| Værktøj | Konfigurationsfil | Formål |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Statisk analyse (niveau 5, scanner `src/` og testmapper) |
| **Psalm** | `psalm.xml` | Anden gennemgang med statisk analyse; kører i CI ved hvert push |
| **Rector** | `rector.php` | Automatiserede kodetransformationer og opgraderinger |

Kør dem via Composer-genveje: `composer phpstan`, `composer psalm`. Se [Test](../contributing/testing.md) for de fulde kommandoer.

## Generelt

* **Engelsk**: Alle kodekommentarer, variabelnavne og dokumentation skal være på engelsk
* **Oversættelser**: Al tekst, der vises til brugeren, skal bruge oversættelsessystemet (Vue I18n til frontend, Symfony Translator til backend)
* **Ingen magiske værdier**: Brug konstanter eller enums i stedet for hardkodede værdier