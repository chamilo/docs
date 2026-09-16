# Convenciones de código

## PHP

* **Estándar**: estilo de código PSR-12
* **Declaraciones de tipos**: utilice declaraciones de tipos de PHP 8.3 (tipos de parámetros, tipos de retorno, tipos de propiedades)
* **Tipos estrictos**: todos los archivos PHP deben declarar `strict_types=1`
* **Espacios de nombres**: siga la carga automática PSR-4 (p. ej., `Chamilo\CoreBundle\Entity\User`)
* **Estándares de Symfony**: siga los estándares de código y las buenas prácticas de Symfony

## JavaScript/Vue

* **ESLint + Prettier**: el código se analiza con ESLint y se formatea con Prettier; la configuración está en `eslint.config.mjs` en la raíz del proyecto. También está habilitado `prettier-plugin-tailwindcss` para la ordenación automática de clases de Tailwind.
* **Composition API**: utilice la sintaxis `<script setup>` de Vue 3 para los componentes nuevos
* **TypeScript**: TypeScript está soportado; úselo para código con seguridad de tipos

## CSS

* **Tailwind CSS**: prefiera las clases de utilidad frente a CSS personalizado
* **Nomenclatura BEM**: cuando se necesite CSS personalizado, use la convención de nomenclatura BEM
* **SCSS**: use SCSS para hojas de estilo complejas

## Análisis estático PHP y herramientas de refactorización

El proyecto incluye configuración para tres herramientas adicionales:

| Herramienta | Archivo de configuración | Propósito |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Análisis estático (nivel 5, analiza `src/` y los directorios de pruebas) |
| **Psalm** | `psalm.xml` | Segunda pasada de análisis estático; se ejecuta en CI en cada envío |
| **Rector** | `rector.php` | Transformaciones y actualizaciones de código automatizadas |

Ejecútelas mediante atajos de Composer: `composer phpstan`, `composer psalm`. Consulte [Pruebas](../contributing/testing.md) para los comandos completos.

## General

* **Inglés**: todos los comentarios de código, nombres de variables y documentación deben estar en inglés
* **Traducciones**: todo el texto visible para el usuario debe usar el sistema de traducción (Vue I18n en el frontend, Symfony Translator en el backend)
* **Sin valores mágicos**: use constantes o enumeraciones en lugar de valores escritos a mano