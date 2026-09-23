# Kodkonventioner

## PHP

* **Standard**: PSR-12-kodstil
* **Typdeklarationer**: Använd typdeklarationer för PHP 8.3 (parametertyper, returtyper, egenskapstyper)
* **Strikta typer**: Alla PHP-filer ska deklarera `strict_types=1`
* **Namnrymder**: Följ PSR-4-autoladdning (t.ex. `Chamilo\CoreBundle\Entity\User`)
* **Symfony-standarder**: Följ Symfony:s kodstandarder och bästa praxis

## JavaScript/Vue

* **ESLint + Prettier**: Koden lintas med ESLint och formateras med Prettier; konfigurationen finns i `eslint.config.mjs` i projektets rot. `prettier-plugin-tailwindcss` är också aktiverat för automatisk sortering av Tailwind-klasser.
* **Composition API**: Använd Vue 3:s `<script setup>`-syntax för nya komponenter
* **TypeScript**: TypeScript stöds; använd det för typsäker kod

## CSS

* **Tailwind CSS**: Föredra utility-klasser framför egen CSS
* **BEM-namngivning**: När egen CSS behövs, använd BEM-namngivningskonventionen
* **SCSS**: Använd SCSS för komplexa stilmallar

## Verktyg för statisk analys och refaktorering av PHP

Projektet levereras med konfiguration för tre ytterligare verktyg:

| Verktyg | Konfigurationsfil | Syfte |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Statisk analys (nivå 5, skannar `src/` och testkataloger) |
| **Psalm** | `psalm.xml` | Andra passet av statisk analys; körs i CI vid varje push |
| **Rector** | `rector.php` | Automatiserade kodtransformationer och uppgraderingar |

Kör dem via Composer-genvägar: `composer phpstan`, `composer psalm`. Se [Testning](../contributing/testing.md) för fullständiga kommandon.

## Allmänt

* **Engelska**: Alla kodkommentarer, variabelnamn och dokumentation ska vara på engelska
* **Översättningar**: All text som visas för användaren ska använda översättningssystemet (Vue I18n för frontend, Symfony Translator för backend)
* **Inga magiska värden**: Använd konstanter eller enums i stället för hårdkodade värden