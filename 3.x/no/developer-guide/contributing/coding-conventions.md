# Kodestandarder

## PHP

* **Standard**: PSR-12-kodestil
* **Typedeklarasjoner**: Bruk PHP 8.3-typedeklarasjoner (parametertyper, returtyper, egenskapstyper)
* **Strenge typer**: Alle PHP-filer skal deklarere `strict_types=1`
* **Navnerom**: Følg PSR-4-autolasting (f.eks. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standarder**: Følg Symfonys kodestandarder og beste praksis

## JavaScript/Vue

* **ESLint + Prettier**: Koden lintes med ESLint og formateres med Prettier; konfigurasjonen ligger i `eslint.config.mjs` i prosjektets rot. `prettier-plugin-tailwindcss` er også aktivert for automatisk sortering av Tailwind-klasser.
* **Composition API**: Bruk Vue 3s `<script setup>`-syntaks for nye komponenter
* **TypeScript**: TypeScript støttes; bruk det for typesikker kode

## CSS

* **Tailwind CSS**: Foretrekk utility-klasser fremfor egendefinert CSS
* **BEM-navngiving**: Når egendefinert CSS er nødvendig, bruk BEM-navnekonvensjonen
* **SCSS**: Bruk SCSS for komplekse stilark

## PHP-verktøy for statisk analyse og refaktorering

Prosjektet leveres med konfigurasjon for tre tilleggsverktøy:

| Verktøy | Konfigurasjonsfil | Formål |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Statisk analyse (nivå 5, skanner `src/` og testkataloger) |
| **Psalm** | `psalm.xml` | Andre pass med statisk analyse; kjører i CI ved hver push |
| **Rector** | `rector.php` | Automatiserte kodetransformasjoner og oppgraderinger |

Kjør dem via Composer-snarveier: `composer phpstan`, `composer psalm`. Se [Testing](../contributing/testing.md) for fullstendige kommandoer.

## Generelt

* **Engelsk**: Alle kodekommentarer, variabelnavn og dokumentasjon skal være på engelsk
* **Oversettelser**: All brukervendt tekst skal bruke oversettelsessystemet (Vue I18n for frontend, Symfony Translator for backend)
* **Ingen magiske verdier**: Bruk konstanter eller enums i stedet for hardkodede verdier