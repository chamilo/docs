# Coding Conventions

## PHP

* **Standard**: PSR-12 coding style
* **Type declarations**: Use PHP 8.2 type declarations (parameter types, return types, property types)
* **Strict types**: All PHP files should declare `strict_types=1`
* **Namespaces**: Follow PSR-4 autoloading (e.g., `Chamilo\CoreBundle\Entity\User`)
* **Symfony standards**: Follow Symfony's coding standards and best practices

## JavaScript/Vue

* **ESLint**: Code is linted with ESLint
* **Prettier**: Code is formatted with Prettier
* **Composition API**: Use Vue 3's `<script setup>` syntax for new components
* **TypeScript**: TypeScript is supported; use it for type-safe code

## CSS

* **Tailwind CSS**: Prefer utility classes over custom CSS
* **BEM naming**: When custom CSS is needed, use BEM naming convention
* **SCSS**: Use SCSS for complex stylesheets

## General

* **English**: All code comments, variable names, and documentation should be in English
* **Translations**: All user-facing text should use the translation system (Vue I18n for frontend, Symfony Translator for backend)
* **No magic values**: Use constants or enums instead of hardcoded values
