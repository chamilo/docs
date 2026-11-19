# Configuración

Chamilo 3.0 utiliza variables de entorno y archivos de configuración de Symfony para sus ajustes principales. Esta página describe los archivos y variables de configuración clave.

## Variables de entorno (.env)

El archivo de configuración principal es `.env`, situado en el directorio raíz de Chamilo. Este archivo contiene ajustes específicos del entorno que no deben incluirse en el control de versiones.

Con Chamilo se distribuye un archivo `.env.dist` predeterminado que contiene valores documentados. Cree `.env` (necesario para iniciar la instalación) para sobrescribir los valores de su entorno.

### Variables clave

| Variable | Descripción | Ejemplo |
|----------|-------------|---------|
| `APP_ENV` | El entorno de la aplicación, a nivel de Symfony. Utilice `prod` para producción, `dev` para desarrollo y 'test' para pruebas. | `prod` |
| `APP_SECRET` | Una cadena aleatoria utilizada para los tokens CSRF, la firma de cookies y otras operaciones criptográficas. Chamilo genera un valor único para cada instalación. No lo modifique. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | El host de la base de datos. El valor predeterminado es localhost | `localhost` |
| `DATABASE_PORT` | El puerto de la base de datos. El valor predeterminado es 3306 para MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | El nombre de la base de datos, tal como lo indicó en el asistente de instalación. | Véase más abajo. |
| `DATABASE_USER` | El nombre de usuario de la base de datos, tal como lo indicó en el asistente de instalación. | Véase más abajo. |
| `DATABASE_PASSWORD` | La contraseña del usuario de la base de datos, tal como la indicó en el asistente de instalación. | Véase más abajo. |
| `TRUSTED_PROXIES` | (Opcional) Si aloja Chamilo detrás de un proxy inverso, debe indicar aquí la(s) IP del proxy inverso para que Chamilo pueda interpretar las llamadas y generar las respuestas correctamente. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Opcional) Expone la documentación interactiva de la API (Swagger/OpenAPI) en `/api`. Desactivado de forma predeterminada. Requiere vaciar la caché para que surta efecto; véase [Habilitar la documentación de la API](#enable-the-api-documentation) más abajo. | `true` |

Los demás ajustes de .env se modifican con relativa poca frecuencia.

Tenga en cuenta que, en versiones futuras, los ajustes DATABASE_* se combinarán en una única variable `DATABASE_URL`.

La configuración del envío de correo electrónico se presenta durante la instalación, pero puede modificarse posteriormente en la sección `Platform settings` del panel de administración.

## Configuración de Symfony (directorio config/)

La configuración a nivel de Symfony se encuentra en el directorio `config/`. Estos archivos YAML controlan el comportamiento del framework, las definiciones de servicios y los ajustes específicos de los paquetes.

El directorio `config/` completo se distribuye con cada paquete de Chamilo y con cada actualización; a diferencia, por ejemplo, de `.env`, no se excluye ni se conserva de forma especial durante una actualización. **Cualquier cambio realizado directamente en un archivo de `config/` o `config/packages/` se sobrescribirá silenciosamente la próxima vez que actualice Chamilo.** Véase [Sustituciones específicas del entorno](#environment-specific-overrides) más abajo para conocer la forma admitida de personalizar la configuración sin perder los cambios.

No es frecuente tener que modificar esos archivos, y cambiarlos puede dejar el portal inoperativo; por tanto, no intente modificarlos si debe garantizar la disponibilidad del sistema.

### Archivos de configuración clave

| Archivo | Finalidad |
|------|---------|
| `config/authentication.yaml` | Configuración de los métodos de autenticación. |
| `config/packages/doctrine.yaml` | Configuración de la base de datos y del ORM. |
| `config/packages/security.yaml` | Autenticación, firewalls, control de acceso y jerarquías de roles. |
| `config/packages/cache.yaml` | Configuración del adaptador de caché (sistema de archivos, APCu, Redis). |
| `config/packages/framework.yaml` | Ajustes generales del framework Symfony (sesión, CSRF, enrutador, caché HTTP). |
| `config/packages/twig.yaml` | Configuración del motor de plantillas. |
| `config/services.yaml` | Definiciones de servicios de la aplicación e inyección de dependencias. |

### Sustituciones específicas del entorno

Symfony admite configuración por entorno. Los archivos de `config/packages/prod/` sustituyen los valores predeterminados cuando `APP_ENV=prod`, y `config/packages/dev/` los sustituye cuando `APP_ENV=dev`.

Por ejemplo, `config/packages/prod/monolog.yaml` suele configurar un registro menos detallado que el equivalente de desarrollo.

Chamilo no define ninguna configuración en `config/packages/prod/` dentro del propio software; por tanto, si desea personalizar un ajuste de `config/packages/*.yaml`, **no edite el archivo base**: cree un archivo con el mismo nombre dentro de `config/packages/prod/` (o `dev/`/`test/`, según el entorno que desee afectar) que contenga únicamente las claves que desea sustituir, y coloque allí sus cambios.

Esto es importante porque los archivos base `config/packages/*.yaml` forman parte del paquete de Chamilo: cada actualización los vuelve a distribuir y sobrescribe lo que haya allí, de modo que las ediciones realizadas directamente en ellos no sobreviven a una actualización. Dado que Chamilo nunca distribuye nada en `config/packages/prod/` (ni en `dev/`/`test/`), ese directorio no corre el riesgo de ser sobrescrito por una actualización y es el lugar admitido para conservar las personalizaciones locales.

## Permisos de archivos

Hemos hecho esfuerzos en 2.0+ para garantizar que un único directorio necesitara permisos, y esto sigue siendo cierto en 3.0. Se trata del directorio `var/`, y para evitar problemas complejos, basta con establecer toda la carpeta como escribible por el usuario de sistema del servidor web.

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

La documentación interactiva de la API (Swagger/OpenAPI) queda entonces disponible en `/api`. Editar únicamente `.env` no es suficiente: el valor resuelto queda incorporado en la caché compilada de Symfony, por lo que `/api` sigue devolviendo su estado anterior (habilitado o no) hasta que se vacíe la caché. La acción **Sistema > Limpiar archivos temporales** del panel de administración *no* hace esto — consulte [Herramientas del sistema](../system/system-tools.md#clean-temporary-files) para saber por qué —, de modo que este cambio concreto requiere acceso al shell para ejecutar `cache:clear`.

### Configurar proxies de confianza

Si Chamilo se ejecuta detrás de un proxy inverso o un equilibrador de carga, configure los proxies de confianza para que la detección de HTTPS y la resolución de la IP del cliente funcionen correctamente:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurar el almacenamiento de sesiones

Chamilo utiliza de forma predeterminada el gestor de sesiones nativo de PHP (normalmente almacenamiento en el sistema de archivos, según la configuración de PHP). En despliegues en los que varios servidores de aplicaciones comparten una misma base de datos, Chamilo puede almacenar en su lugar las sesiones de PHP en su tabla `php_session`. Esta opción respaldada por base de datos se restableció en [Chamilo LMS PR #9146](https://github.com/chamilo/chamilo-lms/pull/9146).

Antes de habilitarla, asegúrese de que existe la tabla de base de datos `php_session`. La crea la migración `V310` `Version20260928234500` (o el esquema en una instalación nueva). Compruebe primero el estado de la migración y la tabla en un entorno de preproducción; no habilite el almacenamiento en base de datos contra una base de datos que no tenga esa tabla.

Establezca lo siguiente en el `.env` del despliegue o en la configuración de entorno equivalente:

```dotenv
SESSION_STORED_IN_DB=true
```

Deje `SESSION_STORED_IN_DB` sin definir o establézcalo en `false` para conservar el gestor de sesiones nativo de PHP. La configuración de Symfony ya selecciona `Chamilo\CoreBundle\Session\ConfigurableSessionHandler`, que delega en el backend adecuado. **No sustituya `framework.session.handler_id` por un DSN de Redis no verificado**: esto omitiría la configuración de Chamilo y no es el cambio documentado a sesiones en base de datos.

Tras modificar el ajuste de entorno, reconstruya o vacíe la caché de la aplicación Symfony según su procedimiento de despliegue, y pruebe el inicio de sesión, la navegación y el cierre de sesión. Planifique el cambio durante una ventana de mantenimiento: los datos de sesión existentes no se transfieren entre el almacén nativo de PHP y la base de datos, por lo que es posible que los usuarios tengan que iniciar sesión de nuevo. Cuando esté habilitado, incluya `php_session` en la planificación de copias de seguridad y retención de la base de datos.

## Consejos

* **Nunca edite `.env.dist` directamente** -- Utilice siempre `.env` para sus anulaciones. El archivo `.env.dist` puede sobrescribirse durante las actualizaciones.
* **Mantenga `APP_DEBUG=0` en producción** -- El modo de depuración expone información sensible en las páginas de error.
* **Haga una copia de seguridad de `.env`** por separado del código base, ya que contiene credenciales y está excluido del control de versiones.