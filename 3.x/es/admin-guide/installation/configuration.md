# Configuración

Chamilo 3.0 utiliza variables de entorno y archivos de configuración de Symfony para sus ajustes principales. Esta página cubre los archivos y las variables de configuración clave.

## Variables de entorno (.env)

El archivo de configuración principal es `.env` en el directorio raíz de Chamilo. Este archivo contiene ajustes específicos del entorno que no deben incluirse en el control de versiones.

Chamilo incluye un archivo `.env.dist` predeterminado con valores por defecto documentados. Cree `.env` (necesario para iniciar la instalación) para sobrescribir los valores de su entorno.

### Variables clave

| Variable | Descripción | Ejemplo |
|----------|-------------|---------|
| `APP_ENV` | El entorno de la aplicación, a nivel de Symfony. Use `prod` para producción, `dev` para desarrollo, 'test' para pruebas. | `prod` |
| `APP_SECRET` | Una cadena aleatoria utilizada para tokens CSRF, firma de cookies y otras operaciones criptográficas. Chamilo genera un valor único para cada instalación. No lo modifique. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | El host de la base de datos. El valor predeterminado es localhost | `localhost` |
| `DATABASE_PORT` | El puerto de la base de datos. El valor predeterminado es 3306 para MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | El nombre de la base de datos, tal como lo indicó en el asistente de instalación. | Véase más abajo. |
| `DATABASE_USER` | El nombre de usuario de la base de datos, tal como lo indicó en el asistente de instalación. | Véase más abajo. |
| `DATABASE_PASSWORD` | La contraseña del usuario de la base de datos, tal como la indicó en el asistente de instalación. | Véase más abajo. |
| `TRUSTED_PROXIES` | (Opcional) Si aloja Chamilo detrás de un proxy inverso, debe indicar aquí la(s) IP del proxy inverso para que Chamilo pueda interpretar las llamadas y generar las respuestas correctamente. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Opcional) Expone la documentación interactiva de la API (Swagger/OpenAPI) en `/api`. Desactivada por defecto. Requiere vaciar la caché para que surta efecto; véase [Habilitar la documentación de la API](#enable-the-api-documentation) más abajo. | `true` |

El resto de ajustes de .env se modifican con relativa poca frecuencia.

Tenga en cuenta que, en versiones futuras, los ajustes DATABASE_* se combinarán en una única variable `DATABASE_URL`.

La configuración del envío de correo electrónico se presenta durante la instalación, pero puede modificarse más adelante en la sección `Ajustes de la plataforma` del panel de administración.

## Configuración de Symfony (directorio config/)

La configuración a nivel de Symfony se encuentra en el directorio `config/`. Estos archivos YAML controlan el comportamiento del framework, las definiciones de servicios y los ajustes específicos de cada paquete.

Todo el directorio `config/` se incluye con cada paquete de Chamilo y con cada actualización; a diferencia, por ejemplo, de `.env`, no se excluye ni se conserva de forma especial durante una actualización. **Cualquier cambio realizado directamente en un archivo de `config/` o `config/packages/` se sobrescribirá de forma silenciosa la próxima vez que actualice Chamilo.** Consulte [Sobrescrituras específicas del entorno](#environment-specific-overrides) más abajo para conocer la forma admitida de personalizar la configuración sin perder los cambios.

No es frecuente tener que modificar esos archivos, y cambiarlos puede dejar el portal inoperativo, así que no intente modificarlos si debe garantizar la disponibilidad del sistema.

### Archivos de configuración clave

| Archivo | Propósito |
|------|---------|
| `config/authentication.yaml` | Configuración de los métodos de autenticación. |
| `config/packages/doctrine.yaml` | Configuración de la base de datos y del ORM. |
| `config/packages/security.yaml` | Autenticación, cortafuegos, control de acceso y jerarquías de roles. |
| `config/packages/cache.yaml` | Configuración del adaptador de caché (sistema de archivos, APCu, Redis). |
| `config/packages/framework.yaml` | Ajustes generales del framework Symfony (sesión, CSRF, enrutador, caché HTTP). |
| `config/packages/twig.yaml` | Configuración del motor de plantillas. |
| `config/services.yaml` | Definiciones de servicios de la aplicación e inyección de dependencias. |

### Sobrescrituras específicas del entorno

Symfony admite configuración por entorno. Los archivos de `config/packages/prod/` sobrescriben los valores predeterminados cuando `APP_ENV=prod`, y `config/packages/dev/` los sobrescribe cuando `APP_ENV=dev`.

Por ejemplo, `config/packages/prod/monolog.yaml` suele configurar un registro menos verboso que el equivalente de desarrollo.

Chamilo no define ninguna configuración en `config/packages/prod/` en el propio software, así que si desea personalizar un ajuste de `config/packages/*.yaml`, **no edite el archivo base**: cree un archivo con el mismo nombre dentro de `config/packages/prod/` (o `dev/`/`test/`, según el entorno que desee afectar) que contenga únicamente las claves que quiera sobrescribir, y ponga ahí sus cambios.

Esto es importante porque los archivos base `config/packages/*.yaml` forman parte del paquete de Chamilo: cada actualización los vuelve a incluir y sobrescribe lo que haya en ellos, de modo que las ediciones hechas directamente no sobreviven a una actualización. Como Chamilo nunca incluye nada en `config/packages/prod/` (ni en `dev/`/`test/`), ese directorio está a salvo de ser sobrescrito por una actualización y es el lugar admitido para conservar las personalizaciones locales.

## Permisos de archivos

En 2.0+ nos esforzamos por garantizar que un único directorio necesitara permisos, y esto sigue siendo cierto en 3.0. Se trata del directorio `var/` y, para evitar problemas complejos, basta con establecer toda la carpeta como escribible por el usuario del sistema del servidor web.

Establezca los permisos de forma adecuada en sistemas basados en Debian:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tareas de configuración habituales

### Cambiar al modo de producción

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

A continuación, vacíe y precaliente la caché:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Habilitar la documentación de la API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

A continuación, vacíe la caché para que el cambio surta efecto:

```bash
php bin/console cache:clear
```

La documentación interactiva de la API (Swagger/OpenAPI) estará entonces disponible en `/api`. Editar únicamente `.env` no es suficiente: el valor resuelto queda incrustado en la caché compilada de Symfony, de modo que `/api` sigue devolviendo su estado anterior (habilitado o no) hasta que se vacíe la caché. La acción **Sistema > Limpiar archivos temporales** del panel de administración *no* lo hace — consulte [Herramientas del sistema](../system/system-tools.md#clean-temporary-files) para saber por qué —, por lo que este cambio concreto requiere acceso a la consola para ejecutar `cache:clear`.

### Configurar proxies de confianza

Si Chamilo se ejecuta detrás de un proxy inverso o un equilibrador de carga, configure los proxies de confianza para que la detección de HTTPS y la resolución de la IP del cliente funcionen correctamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar el almacenamiento de sesiones

De forma predeterminada, las sesiones se almacenan en el sistema de archivos. Para despliegues con varios servidores, configure sesiones respaldadas por Redis o por base de datos:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Consejos

* **Nunca edite `.env.dist` directamente** -- Utilice siempre `.env` para sus anulaciones. El archivo `.env.dist` puede sobrescribirse durante las actualizaciones.
* **Mantenga `APP_DEBUG=0` en producción** -- El modo de depuración expone información sensible en las páginas de error.
* **Haga una copia de seguridad de `.env`** por separado del código, ya que contiene credenciales y está excluido del control de versiones.