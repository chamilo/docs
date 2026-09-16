# Convenzioni di codifica

## PHP

* **Standard**: stile di codifica PSR-12
* **Dichiarazioni di tipo**: utilizzare le dichiarazioni di tipo di PHP 8.3 (tipi dei parametri, tipi di ritorno, tipi delle proprietà)
* **Tipi rigorosi**: tutti i file PHP devono dichiarare `strict_types=1`
* **Namespace**: seguire l'autoloading PSR-4 (ad es. `Chamilo\CoreBundle\Entity\User`)
* **Standard Symfony**: seguire gli standard di codifica e le best practice di Symfony

## JavaScript/Vue

* **ESLint + Prettier**: il codice è sottoposto a linting con ESLint e formattato con Prettier; la configurazione si trova in `eslint.config.mjs` nella radice del progetto. È inoltre abilitato `prettier-plugin-tailwindcss` per l'ordinamento automatico delle classi Tailwind.
* **Composition API**: per i nuovi componenti utilizzare la sintassi `<script setup>` di Vue 3
* **TypeScript**: TypeScript è supportato; utilizzarlo per codice type-safe

## CSS

* **Tailwind CSS**: preferire le classi utility rispetto al CSS personalizzato
* **Nomenclatura BEM**: quando è necessario CSS personalizzato, utilizzare la convenzione di nomenclatura BEM
* **SCSS**: utilizzare SCSS per i fogli di stile complessi

## Analisi statica PHP e strumenti di refactoring

Il progetto include la configurazione per tre strumenti aggiuntivi:

| Tool | Config file | Purpose |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Static analysis (level 5, scans `src/` and test directories) |
| **Psalm** | `psalm.xml` | Second static analysis pass; runs in CI on every push |
| **Rector** | `rector.php` | Automated code transformations and upgrades |

Eseguirli tramite le scorciatoie Composer: `composer phpstan`, `composer psalm`. Vedere [Testing](../contributing/testing.md) per i comandi completi.

## Generale

* **Inglese**: tutti i commenti nel codice, i nomi delle variabili e la documentazione devono essere in inglese
* **Traduzioni**: tutto il testo visibile all'utente deve utilizzare il sistema di traduzione (Vue I18n per il frontend, Symfony Translator per il backend)
* **Niente valori magici**: utilizzare costanti o enum al posto di valori hardcoded