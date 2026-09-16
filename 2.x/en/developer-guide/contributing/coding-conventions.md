# Coding Conventions

## PHP

* **Standard**: PSR-12 coding style
* **Type declarations**: Use PHP 8.2 type declarations (parameter types, return types, property types)
* **Strict types**: All PHP files should declare `strict_types=1`
* **Namespaces**: Follow PSR-4 autoloading (e.g., `Chamilo\CoreBundle\Entity\User`)
* **Symfony standards**: Follow Symfony's coding standards and best practices

## JavaScript/Vue

* **ESLint + Prettier**: Code is linted with ESLint and formatted with Prettier; configuration is in `eslint.config.mjs` at the project root. `prettier-plugin-tailwindcss` is also enabled for automatic Tailwind class sorting.
* **Composition API**: Use Vue 3's `<script setup>` syntax for new components
* **TypeScript**: TypeScript is supported; use it for type-safe code

## CSS

* **Tailwind CSS**: Prefer utility classes over custom CSS
* **BEM naming**: When custom CSS is needed, use BEM naming convention
* **SCSS**: Use SCSS for complex stylesheets

## PHP Static Analysis and Refactoring Tools

The project ships configuration for three additional tools:

| Tool | Config file | Purpose |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Static analysis (level 5, scans `src/` and test directories) |
| **Psalm** | `psalm.xml` | Second static analysis pass; runs in CI on every push |
| **Rector** | `rector.php` | Automated code transformations and upgrades |

Run them via composer shortcuts: `composer phpstan`, `composer psalm`. See [Testing](../contributing/testing.md) for full commands.

## General

* **English**: All code comments, variable names, and documentation should be in English
* **Translations**: All user-facing text should use the translation system (Vue I18n for frontend, Symfony Translator for backend)
* **No magic values**: Use constants or enums instead of hardcoded values
