# Requisitos del servidor

Antes de instalar Chamilo 3.0, verifique que su servidor cumpla los siguientes requisitos.

## Requisitos de software

### PHP

| Requisito | Mínimo | Recomendado |
|-------------|---------|-------------|
| **Versión de PHP** | 8.3 | 8.5 |

### Extensiones de PHP requeridas

| Extensión | Finalidad |
|-----------|---------|
| **bcmath** | Matemáticas de precisión arbitraria |
| **ctype** | Comprobación de tipos de caracteres |
| **curl** | Peticiones HTTP (integraciones de API, servicios externos) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Análisis de XML y manejo del DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Lectura de metadatos de imágenes (p. ej., orientación automática de fotos cargadas) |
| **fileinfo** | Detección del tipo MIME de los archivos cargados |
| **gd** | Procesamiento de imágenes (miniaturas, CAPTCHA) |
| **iconv** | Conversión de conjuntos de caracteres |
| **intl** | Internacionalización (formato de fechas, números y cadenas) |
| **json** | Codificación y decodificación de JSON |
| **ldap** | Conector LDAP. Aunque probablemente no utilice LDAP, Chamilo lo requiere |
| **mbstring** | Manejo de cadenas multibyte (compatibilidad con UTF-8) |
| **openssl** | Operaciones criptográficas (HTTPS, hash de contraseñas, tokens JWT) |
| **pdo**, más **pdo_mysql** | Conectividad con la base de datos (el controlador PDO de MySQL/MariaDB) |
| **soap** | Manejo de servicios web SOAP |
| **zip** | Manejo de archivos ZIP (paquetes SCORM, importaciones y exportaciones masivas) |
| **zlib** | Compresión utilizada internamente por varias dependencias |
| **apcu** | Caché a nivel de usuario (recomendada; el instalador la comprueba, pero no la exige) |
| **opcache** | Caché de opcodes (muy recomendada para el rendimiento; el instalador la comprueba, pero no la exige) |
| **xapian** | Búsqueda de texto completo (opcional, solo si utiliza la búsqueda) |

### Base de datos

| Base de datos | Versión mínima | Recomendada |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 o superior |
| **MySQL** | 5.7 | 8.0 o superior |

Las versiones de MariaDB anteriores a 10.2.2 (y las versiones de MySQL anteriores a 5.7) necesitan que la compatibilidad con índices y prefijos de gran tamaño se habilite manualmente en la configuración del servidor antes de instalar Chamilo.

### Servidor web

| Servidor | Notas |
|--------|-------|
| **Apache** | Requiere que estén habilitados `mod_rewrite` (y `ssl`, `headers`, `expires`). Chamilo incluye un vhost de ejemplo en `public/main/install/apache.dist.conf`. |
| **Nginx** | Requiere configuración manual para la reescritura de URL; Chamilo no incluye una configuración de ejemplo de Nginx. Consulte la documentación de Nginx de Symfony para una configuración de referencia. |

### Herramientas de compilación

| Herramienta | Finalidad |
|------|---------|
| **Composer** (^2.8) | Gestión de dependencias de PHP. Necesario para instalar las bibliotecas PHP de Chamilo. |
| **Node.js** (20+ LTS) | Entorno de ejecución de JavaScript. Necesario para compilar los recursos del frontend. |
| **Yarn** (^4, mediante Corepack) | Gestor de paquetes de JavaScript utilizado para compilar los recursos del frontend (`yarn install`, `yarn encore production`). |

## Requisitos de hardware

| Recurso | Mínimo | Recomendado |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB o más (compilar los recursos del frontend a partir del código fuente requiere al menos 4 GB por sí solo) |
| **CPU** | 2 vCPU | 2 o más núcleos |
| **Espacio en disco** | 4 GB (solo la aplicación) | 20+ GB (incluido el contenido cargado); la compilación a partir del código fuente necesita unos 10 GB libres durante el proceso |
| **Tipo de disco** | HDD | SSD (mejora de forma significativa el rendimiento de la base de datos y de la caché) |

Estas son cifras de referencia de la propia guía de instalación de Chamilo. Los requisitos reales dependen del número de usuarios concurrentes y del volumen de contenido alojado.

## Sistema operativo

| SO | Notas |
|----|-------|
| **Linux** | Recomendado. Ubuntu 24.04 LTS o superior, Debian 12 o superior, AlmaLinux 9 o superior, o equivalente. |
| **Windows** | Posible, pero no probado de forma exhaustiva. Utilice WSL2 para el desarrollo. |
| **macOS** | Solo para desarrollo / no probado. |

## Requisitos de red

* Un nombre de dominio que apunte a su servidor.
* Un certificado SSL/TLS para HTTPS (Let's Encrypt proporciona certificados gratuitos).
* Acceso SMTP saliente si se envían correos electrónicos directamente (o utilice un servicio de correo electrónico de terceros).
* Puerto 443 (HTTPS) y, opcionalmente, puerto 80 (HTTP, para la redirección a HTTPS).

## Comprobación de los requisitos

Después de colocar el código fuente de Chamilo en su servidor, puede comprobar la configuración de PHP directamente:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Consejos

* **Utilice PHP-FPM** con Apache o Nginx para obtener un mejor rendimiento que con mod_php.
* **Separe la base de datos** en un servidor dedicado para plataformas que esperen más de 500 usuarios concurrentes.
* **Utilice almacenamiento SSD**: las aplicaciones con un uso intensivo de la base de datos, como Chamilo, se benefician de forma significativa de una E/S de disco rápida.