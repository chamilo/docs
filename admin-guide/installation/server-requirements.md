# Requisitos del Servidor

Antes de instalar Chamilo 2.0, verifica que tu servidor cumpla con los siguientes requisitos.

## Requisitos de Software

### PHP

| Requisito | Mínimo | Recomendado |
|-----------|--------|-------------|
| **Versión de PHP** | 8.2 | 8.3 o superior |

### Extensiones de PHP Requeridas

| Extensión | Propósito |
|-----------|-----------|
| **curl** | Solicitudes HTTP (integraciones API, servicios externos) |
| **fileinfo** | Detección de tipo MIME para archivos subidos |
| **gd** | Procesamiento de imágenes (miniaturas, CAPTCHA) |
| **intl** | Internacionalización (formato de fechas, números y cadenas) |
| **json** | Codificación/decodificación de JSON |
| **ldap** | Conector LDAP. Aunque probablemente no uses LDAP, Chamilo lo requiere |
| **mbstring** | Manejo de cadenas multibyte (soporte UTF-8) |
| **openssl** | Operaciones criptográficas (HTTPS, hash de contraseñas, tokens) |
| **pdo_mysql** o **pdo_pgsql** | Conectividad con bases de datos (instala el que corresponda a tu base de datos) |
| **xml** | Análisis de XML (SCORM, RSS, SOAP) |
| **zip** | Manejo de archivos ZIP (paquetes SCORM, importaciones/exportaciones masivas) |
| **apcu** | Caché a nivel de usuario (recomendado) |
| **opcache** | Caché de código de operación (muy recomendado para rendimiento) |
| **xapian** | Búsqueda de texto completo (opcional, solo si usas búsqueda) |

### Base de Datos

| Base de Datos | Versión Mínima |
|---------------|----------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Servidor Web

| Servidor | Notas |
|----------|-------|
| **Apache** | Requiere `mod_rewrite` habilitado. |
| **Nginx** | Requiere configuración manual para reescritura de URL. Consulta la documentación de Symfony Nginx para una configuración de referencia. |

### Herramientas de Construcción

| Herramienta | Propósito |
|-------------|-----------|
| **Composer** | Gestión de dependencias de PHP. Requerido para instalar las bibliotecas PHP de Chamilo. |
| **Node.js** (18+) | Entorno de ejecución de JavaScript. Requerido para construir activos de frontend. |
| **npm** | Gestor de paquetes de JavaScript. Se instala con Node.js. |

## Requisitos de Hardware

| Recurso | Mínimo | Recomendado |
|---------|--------|-------------|
| **RAM** | 2 GB | 4 GB o más |
| **CPU** | 1 núcleo | 2+ núcleos |
| **Espacio en disco** | 2 GB (solo aplicación) | 20+ GB (incluyendo contenido subido) |
| **Tipo de disco** | HDD | SSD (mejora significativamente el rendimiento de la base de datos y la caché) |

Estas son cifras base. Los requisitos reales dependen del número de usuarios concurrentes y del volumen de contenido alojado.

## Sistema Operativo

| SO | Notas |
|----|-------|
| **Linux** | Recomendado. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+, o equivalente. |
| **Windows** | Posible pero no probado exhaustivamente. Usa WSL2 para desarrollo. |
| **macOS** | Solo para desarrollo / no probado. |

## Requisitos de Red

* Un nombre de dominio que apunte a tu servidor.
* Un certificado SSL/TLS para HTTPS (Let's Encrypt proporciona certificados gratuitos).
* Acceso SMTP saliente si envías correos directamente (o usa un servicio de correo electrónico de terceros).
* Puerto 443 (HTTPS) y opcionalmente puerto 80 (HTTP, para redirección a HTTPS).

## Verificación de Requisitos

Después de colocar el código fuente de Chamilo en tu servidor, puedes verificar tu configuración de PHP directamente:

```bash
php -m          # Lista las extensiones instaladas
php -i          # Información completa de PHP
```

## Consejos

* **Usa PHP-FPM** con Apache o Nginx para un mejor rendimiento que mod_php.
* **Separa tu base de datos** en un servidor dedicado para plataformas que esperen más de 500 usuarios concurrentes.
* **Usa almacenamiento SSD** -- Las aplicaciones con alta carga de base de datos como Chamilo se benefician significativamente de una E/S de disco rápida.