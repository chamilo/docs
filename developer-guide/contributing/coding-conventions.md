# Convenciones de Codificación

## PHP

* **Estándar**: Estilo de codificación PSR-12
* **Declaraciones de tipo**: Utilizar declaraciones de tipo de PHP 8.2 (tipos de parámetros, tipos de retorno, tipos de propiedades)
* **Tipos estrictos**: Todos los archivos PHP deben declarar `strict_types=1`
* **Espacios de nombres**: Seguir la carga automática PSR-4 (por ejemplo, `Chamilo\CoreBundle\Entity\User`)
* **Estándares de Symfony**: Seguir los estándares de codificación y las mejores prácticas de Symfony

## JavaScript/Vue

* **ESLint + Prettier**: El código se verifica con ESLint y se formatea con Prettier; la configuración está en `eslint.config.mjs` en la raíz del proyecto. También está habilitado `prettier-plugin-tailwindcss` para la ordenación automática de clases Tailwind.
* **Composition API**: Utilizar la sintaxis `<script setup>` de Vue 3 para nuevos componentes
* **TypeScript**: TypeScript es compatible; úsalo para código seguro en cuanto a tipos

## CSS

* **Tailwind CSS**: Preferir clases de utilidad sobre CSS personalizado
* **Nomenclatura BEM**: Cuando se necesite CSS personalizado, usar la convención de nomenclatura BEM
* **SCSS**: Utilizar SCSS para hojas de estilo complejas

## Herramientas de Análisis Estático y Refactorización de PHP

El proyecto incluye configuraciones para tres herramientas adicionales:

| Herramienta | Archivo de configuración | Propósito |
|-------------|--------------------------|-----------|
| **PHPStan** | `phpstan.neon` | Análisis estático (nivel 5, escanea directorios `src/` y de pruebas) |
| **Psalm** | `psalm.xml` | Segunda pasada de análisis estático; se ejecuta en CI en cada push |
| **Rector** | `rector.php` | Transformaciones y actualizaciones de código automatizadas |

Ejecútalas mediante accesos directos de Composer: `composer phpstan`, `composer psalm`. Consulta [Pruebas](../contributing/testing.md) para ver los comandos completos.

## General

* **Inglés**: Todos los comentarios de código, nombres de variables y documentación deben estar en inglés
* **Traducciones**: Todo el texto visible para el usuario debe usar el sistema de traducción (Vue I18n para el frontend, Symfony Translator para el backend)
* **Sin valores mágicos**: Usar constantes o enumeraciones en lugar de valores codificados directamente