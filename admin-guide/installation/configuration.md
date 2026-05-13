# Configuración

Chamilo 2.0 utiliza variables de entorno y archivos de configuración de Symfony para sus ajustes principales. Esta página cubre los archivos de configuración y variables clave.

## Variables de Entorno (.env)

El archivo de configuración principal es `.env`, ubicado en el directorio raíz de Chamilo. Este archivo contiene configuraciones específicas del entorno que no deben ser incluidas en el control de versiones.

Un archivo predeterminado `.env.dist` se incluye con Chamilo y contiene valores predeterminados documentados. Cree el archivo `.env` (requerido para iniciar la instalación) para sobrescribir los valores según su entorno.

### Variables Clave

| Variable | Descripción | Ejemplo |
|----------|-------------|---------|
| `APP_ENV` | El entorno de la aplicación, a nivel de Symfony. Use `prod` para producción, `dev` para desarrollo, 'test' para pruebas. | `prod` |
| `APP_SECRET` | Una cadena aleatoria utilizada para tokens CSRF, firma de cookies y otras operaciones criptográficas. Chamilo genera un valor único para cada instalación. No lo modifique. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | El host de la base de datos. Por defecto es localhost. | `localhost` |
| `DATABASE_PORT` | El puerto de la base de datos. Por defecto es 3306 para MySQL/MariaDB. | `3306` |
| `DATABASE_NAME` | El nombre de la base de datos, proporcionado por usted al asistente de instalación. | Ver abajo. |
| `DATABASE_USER` | El nombre de usuario de la base de datos, proporcionado por usted al asistente de instalación. | Ver abajo. |
| `DATABASE_PASSWORD` | La contraseña del usuario de la base de datos, proporcionada por usted al asistente de instalación. | Ver abajo. |
| `TRUSTED_PROXIES` | (Opcional) Si aloja Chamilo detrás de un proxy inverso, debe proporcionar la(s) IP(s) del proxy inverso aquí para que Chamilo pueda interpretar las llamadas y generar respuestas correctamente. | |

Otras configuraciones en .env se modifican con relativa poca frecuencia.

Tenga en cuenta que, en versiones futuras, las configuraciones DATABASE_* se combinarán en una única variable `DATABASE_URL`.

La configuración para el envío de correos electrónicos se presenta durante la instalación, pero puede modificarse más adelante en la sección `Configuración de la plataforma` del panel de administración.

## Configuración de Symfony (directorio config/)

La configuración a nivel de Symfony se encuentra en el directorio `config/`. Estos archivos YAML controlan el comportamiento del framework, las definiciones de servicios y las configuraciones específicas de paquetes.

No es frecuente tener que modificar estos archivos, y cambiarlos puede dejar su portal inoperativo, por lo que, por favor, no intente modificarlos si debe garantizar la disponibilidad del sistema.

### Archivos de Configuración Clave

| Archivo | Propósito |
|------|---------|
| `config/authentication.yaml` | Configuración de métodos de autenticación. |
| `config/packages/doctrine.yaml` | Configuración de base de datos y ORM. |
| `config/packages/security.yaml` | Autenticación, cortafuegos, control de acceso y jerarquías de roles. |
| `config/packages/cache.yaml` | Configuración del adaptador de caché (sistema de archivos, APCu, Redis). |
| `config/packages/framework.yaml` | Configuraciones generales del framework Symfony (sesión, CSRF, enrutador, caché HTTP). |
| `config/packages/twig.yaml` | Configuración del motor de plantillas. |
| `config/services.yaml` | Definiciones de servicios de la aplicación e inyección de dependencias. |

### Sobrescrituras Específicas por Entorno

Symfony admite configuraciones por entorno. Los archivos en `config/packages/prod/` sobrescriben los valores predeterminados cuando `APP_ENV=prod`, y los de `config/packages/dev/` sobrescriben cuando `APP_ENV=dev`.

Por ejemplo, `config/packages/prod/monolog.yaml` generalmente configura un registro menos detallado que su equivalente en desarrollo.

Chamilo no define ninguna configuración en `config/packages/prod/` en el software mismo, por lo que si desea personalizar ajustes de `config/packages/*.yaml`, simplemente cree una copia del archivo YAML dentro de ese directorio y cambie las configuraciones allí.

## Permisos de Archivos

Hemos hecho esfuerzos en la versión 2.0+ para asegurar que solo un directorio necesite permisos. Este es el directorio `var/`, y para evitar problemas complejos, basta con establecer toda la carpeta como escribible por el usuario del sistema del servidor web.

Establezca los permisos adecuadamente en sistemas basados en Debian:

```bash
# Para sistemas donde el servidor web se ejecuta como www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tareas de Configuración Comunes

### Cambiar al Modo de Producción

```bash
# En .env
APP_ENV=prod
APP_DEBUG=0
```

Luego, limpie y precaliente la caché:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Configurar Proxies de Confianza

Si Chamilo se ejecuta detrás de un proxy inverso o balanceador de carga, configure los proxies de confianza para que la detección de HTTPS y la resolución de IP del cliente funcionen correctamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar Almacenamiento de Sesiones

Por defecto, las sesiones se almacenan en el sistema de archivos. Para implementaciones en múltiples servidores, configure sesiones respaldadas por Redis o base de datos:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Consejos

* **Nunca edite `.env.dist` directamente** -- Siempre use `.env` para sus personalizaciones. El archivo `.env.dist` puede ser sobrescrito durante las actualizaciones.
* **Mantenga `APP_DEBUG=0` en producción** -- El modo de depuración expone información sensible en las páginas de error.
* **Haga una copia de seguridad de `.env`** por separado del código base, ya que contiene credenciales y está excluido del control de versiones.