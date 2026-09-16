# Requisitos del servidor

Antes de instalar Chamilo 3.0, verifique que su servidor cumpla los siguientes requisitos.

## Requisitos de software

### PHP

| Requisito | Mínimo | Recomendado |
|-------------|---------|-------------|
| **Versión de PHP** | 8.3 | 8.5 |

### Extensiones PHP requeridas

| Extensión | Propósito |
|-----------|---------|
| **bcmath** | Matemática de precisión arbitraria |
| **ctype** | Comprobación de tipos de caracteres |
| **curl** | Peticiones HTTP (integraciones API, servicios externos) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Análisis XML y manejo del DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Lectura de metadatos de imagen (p. ej., orientación automática de fotos subidas) |
| **fileinfo** | Detección del tipo MIME de los archivos subidos |
| **gd** | Procesamiento de imágenes (miniaturas, CAPTCHA) |
| **iconv** | Conversión de conjuntos de caracteres |
| **intl** | Internacionalización (formato de fechas, números y cadenas) |
| **json** | Codificación/decodificación JSON |
| **ldap** | Conector LDAP. Aunque probablemente no use LDAP, Chamilo lo requiere |
| **mbstring** | Manejo de cadenas multibyte (soporte UTF-8) |
| **openssl** | Operaciones criptográficas (HTTPS, hash de contraseñas, tokens JWT) |
| **pdo**, más **pdo_mysql** o **pdo_pgsql** | Conectividad con la base de datos (instale el controlador correspondiente a su base de datos) |
| **soap** | Manejo de servicios web SOAP |
| **zip** | Manejo de archivos ZIP (paquetes SCORM, importaciones/exportaciones masivas) |
| **zlib** | Compresión utilizada internamente por varias dependencias |
| **apcu** | Caché a nivel de usuario (recomendado; el instalador lo comprueba pero no lo exige) |
| **opcache** | Caché de opcode (muy recomendado para el rendimiento; el instalador lo comprueba pero no lo exige) |
| **xapian** | Búsqueda de texto completo (opcional, solo si utiliza la búsqueda) |

### Base de datos

| Base de datos | Versión mínima | Recomendada |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 o superior |
| **MySQL** | 5.7 | 8.0 o superior |

Las versiones de MariaDB anteriores a 10.2.2 (y las de MySQL anteriores a 5.7) necesitan que el soporte de índices/prefijos grandes se active manualmente en la configuración del servidor antes de instalar Chamilo.

### Servidor web

| Servidor | Notas |
|--------|-------|
| **Apache** | Requiere `mod_rewrite` (y `ssl`, `headers`, `expires`) habilitados. Chamilo incluye un vhost de ejemplo en `public/main/install/apache.dist.conf`. |
| **Nginx** | Requiere configuración manual para la reescritura de URL — Chamilo no incluye una configuración de ejemplo para Nginx. Consulte la documentación de Nginx de Symfony para una configuración de referencia. |

### Herramientas de compilación

| Herramienta | Propósito |
|------|---------|
| **Composer** (^2.8) | Gestión de dependencias PHP. Necesario para instalar las bibliotecas PHP de Chamilo. |
| **Node.js** (20+ LTS) | Entorno de ejecución de JavaScript. Necesario para construir los recursos del frontend. |
| **Yarn** (^4, vía Corepack) | Gestor de paquetes JavaScript usado para construir los recursos del frontend (`yarn install`, `yarn encore production`). |

## Requisitos de hardware

| Recurso | Mínimo | Recomendado |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB o más (construir los recursos del frontend desde el código fuente necesita al menos 4 GB por sí solo) |
| **CPU** | 2 vCPU | 2 o más núcleos |
| **Espacio en disco** | 4 GB (solo la aplicación) | 20+ GB (incluido el contenido subido); la construcción desde el código fuente necesita ~10 GB libres durante la compilación |
| **Tipo de disco** | HDD | SSD (mejora de forma significativa el rendimiento de la base de datos y de la caché) |

Estas cifras son de referencia según la propia guía de instalación de Chamilo. Los requisitos reales dependen del número de usuarios concurrentes y del volumen de contenido alojado.

## Sistema operativo

| SO | Notas |
|----|-------|
| **Linux** | Recomendado. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ o equivalente. |
| **Windows** | Posible, pero no se ha probado a fondo. Use WSL2 para desarrollo. |
| **macOS** | Solo desarrollo / no probado. |

## Requisitos de red

* Un nombre de dominio que apunte a su servidor.
* Un certificado SSL/TLS para HTTPS (Let's Encrypt ofrece certificados gratuitos).
* Acceso SMTP saliente si envía correos electrónicos de forma directa (o use un servicio de correo de terceros).
* Puerto 443 (HTTPS) y, opcionalmente, puerto 80 (HTTP, para redirección a HTTPS).

## Comprobación de requisitos

Tras colocar el código fuente de Chamilo en su servidor, puede comprobar su configuración de PHP de forma directa:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Consejos

* **Use PHP-FPM** con Apache o Nginx para un mejor rendimiento que mod_php.
* **Separe su base de datos** en un servidor dedicado para plataformas que esperen más de 500 usuarios concurrentes.
* **Use almacenamiento SSD** -- Las aplicaciones intensivas en base de datos como Chamilo se benefician de forma significativa de una E/S de disco rápida.