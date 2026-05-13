# Pila Tecnológica

A continuación se describe la pila tecnológica de Chamilo 2.0. Todas las versiones mencionadas aquí probablemente cambiarán a medida que se lancen nuevas versiones de Chamilo. Los números de versión utilizan la [notación de versiones de Composer](https://getcomposer.org/doc/articles/versions.md), que establece reglas para permitir cierta flexibilidad en torno a las versiones.

Incluyendo dependencias jerárquicas, Chamilo utiliza varios cientos de bibliotecas de Software Libre. Esta lista solo incluye las que usamos con mayor frecuencia y que probablemente afectarán el trabajo de un desarrollador de Chamilo cada semana aproximadamente. Estamos agradecidos a todos los demás desarrolladores de Software Libre que hacen nuestro trabajo más fácil, mantenible y seguro.

## Backend

| Tecnología | Versión | Propósito |
|-----------|---------|---------|
| PHP | 8.2+ | Entorno de ejecución |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Abstracción de base de datos |
| API Platform | ^3.0 | Framework para API REST |
| oneup/flysystem-bundle | ~4.0 | Abstracción de almacenamiento de archivos |
| vich/uploader-bundle | ^2.8 | Manejo de carga de archivos |
| stof/doctrine-extensions-bundle | ^1.12 | Extensiones de Doctrine (árbol, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autenticación JWT |
| nelmio/cors-bundle | ^2.2 | Encabezados CORS |
| mpdf/mpdf | ~8.0 | Generación de PDF |
| phpoffice/phpspreadsheet | ~1.16 | Manejo de hojas de cálculo/Excel |
| firebase/php-jwt | ^7.0 | Manejo de tokens JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integración con BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementación de LTI 1.3 |

## Frontend

| Tecnología | Versión | Propósito |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework de interfaz de usuario |
| PrimeVue | ^4.5 | Biblioteca de componentes |
| Pinia | ^3.0 | Gestión de estado |
| Vue Router | 5.0 | Enrutamiento del lado del cliente |
| Vue I18n | 11.3 | Internacionalización |
| Axios | ^1.13 | Cliente HTTP |
| TinyMCE | ^5.10 | Editor de texto enriquecido |
| Chart.js | ^4.5 | Gráficos y visualizaciones |
| FullCalendar | ^6.1 | Componente de calendario |
| Uppy | ^4.5 | Widget de carga de archivos |
| PrimeFlex | ^4.0 | Framework de utilidades CSS |

## Herramientas de Construcción

| Tecnología | Versión | Propósito |
|-----------|---------|---------|
| Composer | ^2.8 | Gestor de dependencias de PHP |
| Webpack | ^5.105 | Agrupador de módulos |
| Symfony Webpack Encore | ^5.3 | Envoltura de Webpack para Symfony |
| Tailwind CSS | ^3.4 | Framework CSS basado en utilidades |
| Sass | ^1.98 | Preprocesador CSS |
| TypeScript | ^5.9 | JavaScript con tipado seguro |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Formateo de código |

## Iconos

| Biblioteca | Versión | Uso |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (clases CSS `mdi mdi-*`) |

## Base de Datos

Chamilo soporta:

* MySQL 5.7+
* MariaDB 10.11.2+

## Almacenamiento en la Nube

A través de adaptadores Flysystem:

* Sistema de archivos local (por defecto)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)