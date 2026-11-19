# Asistente de instalación

Chamilo 3.0 incluye un asistente de instalación basado en web que le guía a través de la configuración inicial. El asistente se ejecuta automáticamente cuando accede a la plataforma por primera vez.

## Antes de empezar

Asegúrese de que se cumplen los siguientes requisitos previos:

1. Su servidor cumple todos los [requisitos del servidor](server-requirements.md).
2. Ha descargado una versión empaquetada (zip o tar.gz) de Chamilo.
3. Su servidor web está configurado para servir el directorio `public/` como raíz de documentos.
4. Su archivo `.env` existe y está vacío (el asistente le guiará en la configuración de la base de datos).

## Paso 1: Idioma de instalación

![Paso 1 del asistente de instalación — selección de idioma](../../.gitbook/assets/install-step1-language.png)

El primer paso le permite seleccionar el idioma del proceso de instalación. Elija su idioma preferido en el menú desplegable.

Si Chamilo detecta una instalación existente (para una actualización), mostrará el estado de la migración y ofrecerá una ruta de actualización en lugar de una instalación nueva.

## Paso 2: Comprobación de requisitos

![Paso 2 del asistente de instalación — comprobación de requisitos que muestra la versión de PHP, las extensiones y los permisos de directorio](../../.gitbook/assets/install-step2-requirements.png)

El asistente comprueba el entorno de su servidor:

* La **versión de PHP** es 8.3, 8.4 u 8.5
* Las **extensiones de PHP requeridas** están instaladas (intl, gd, curl, zip, mbstring, xml, etc.)
* La **configuración de PHP recomendada** — `date.timezone` está configurado y los límites de carga y memoria son adecuados
* Los **permisos de directorios y archivos** — `var/`, `config/` y `public/upload/` son escribibles por el servidor web

Si no se cumple algún requisito, el asistente muestra advertencias o errores. Resuélvalos antes de continuar.

## Paso 3: Licencia

![Paso 3 del asistente de instalación — aceptación de la licencia](../../.gitbook/assets/install-step3-license.png)

Este paso muestra la licencia GNU/GPLv3. Debe marcar la casilla **"Acepto"** para continuar.

Opcionalmente, puede expandir la sección **Información de contacto** para proporcionar datos sobre su organización (nombre, correo electrónico, empresa, país). Esto es voluntario y ayuda a la comunidad de Chamilo a comprender quién utiliza la plataforma, pero también nos permitirá contactarle *muy raramente* acerca de eventos que tengan lugar cerca de usted.

## Paso 4: Configuración de la base de datos

![Paso 4 del asistente de instalación — configuración de la conexión a la base de datos](../../.gitbook/assets/install-step4-database.png)

Introduzca los datos de conexión a su base de datos:

| Campo | Descripción |
|-------|-------------|
| **Host de la base de datos** | El nombre de host o la IP de su servidor de base de datos (p. ej., `localhost` o `127.0.0.1`) |
| **Puerto de la base de datos** | Predeterminado: 3306 para MySQL/MariaDB |
| **Nombre de la base de datos** | El nombre de la base de datos que se utilizará (solo caracteres alfanuméricos y guiones bajos) |
| **Usuario de la base de datos** | Un usuario de base de datos con privilegios completos sobre la base de datos especificada |
| **Contraseña de la base de datos** | La contraseña del usuario de la base de datos |

Haga clic en **Comprobar conexión a la base de datos** para probarla. El asistente no le permitirá continuar hasta que la conexión sea correcta. Si la base de datos ya existe, se muestra una advertencia.

## Paso 5: Configuración

![Paso 5 del asistente de instalación — cuenta de administrador, configuración del portal y configuración del correo electrónico](../../.gitbook/assets/install-step5-config.png)

Este paso combina la creación de la cuenta de administrador, la configuración del portal y la configuración del correo electrónico.

### Cuenta de administrador

| Campo | Descripción |
|-------|-------------|
| **Inicio de sesión** | El nombre de usuario del administrador |
| **Contraseña** | Elija una contraseña segura: esta cuenta tiene acceso completo a la plataforma |
| **Nombre** | El nombre del administrador |
| **Apellidos** | Los apellidos del administrador |
| **Correo electrónico** | Se utiliza para las notificaciones del sistema y el restablecimiento de contraseñas |
| **Teléfono** | Número de contacto opcional |

Estos datos del administrador también serán utilizados por Chamilo para completar los datos de contacto de soporte, así que asegúrese de reconfigurarlos en los ajustes una vez concluida la instalación.

### Configuración del portal

| Campo | Descripción |
|-------|-------------|
| **Idioma** | El idioma predeterminado de la interfaz |
| **Nombre del portal** | El nombre de su plataforma (p. ej., "LMS de mi organización") |
| **Nombre abreviado de la empresa** | El nombre abreviado de su organización |
| **URL de la empresa** | El sitio web de su organización |
| **Método de cifrado** | Algoritmo de hash de contraseñas: se recomienda **bcrypt** |
| **Permitir el autorregistro** | Sí / No / Tras aprobación |
| **Permitir el autorregistro como formador** | Sí / No |

### Configuración del correo electrónico

La sección de configuración del correo electrónico le permite configurar el transporte de correo (SMTP, Amazon SES, Mailjet, etc.) y probar el envío de correo. Consulte [Configuración del correo electrónico](email-configuration.md) para obtener más detalles.

Todos estos ajustes pueden modificarse más adelante desde el panel de administración.

## Paso 6: Última comprobación antes de la instalación

![Asistente de instalación, paso 6 — revisión de todos los ajustes antes de la instalación](../../.gitbook/assets/install-step6-review.png)

Este paso muestra un resumen de todo lo introducido para su revisión:

* Credenciales del administrador (la contraseña está oculta de forma predeterminada; haga clic en el icono del ojo para mostrarla)
* Ajustes del portal
* Datos de conexión a la base de datos

Revise con atención y, a continuación, haga clic en **Install Chamilo** para ejecutar la instalación. El asistente crea todas las tablas de la base de datos, carga los datos iniciales y configura la plataforma.

## Paso 7: Instalación completada

![Asistente de instalación, paso 7 — finalización con recomendaciones de seguridad y enlace al portal](../../.gitbook/assets/install-step7-complete.png)

Una vez que la instalación se completa correctamente, el asistente muestra:

* **Consejos para empezar** — Sugiere crear su primer curso para explorar la plataforma (como administrador, debe hacerlo desde el panel de administración)
* **Recomendaciones de seguridad**:
  * Hacer que el directorio `config/` sea de solo lectura (`chmod 0555`)
  * Eliminar el directorio `public/main/install/`
* Un **enlace a su portal** para iniciar sesión con las credenciales de administrador que acaba de crear

## Después de la instalación

Tras completar el asistente:

* **Elimine o restrinja el acceso al instalador** -- El asistente no debe ser accesible después de la instalación. Chamilo normalmente lo bloquea de forma automática, pero compruebe que al volver a visitar la URL de instalación se redirige a la página de inicio de sesión.
* **Configure el envío de correo electrónico** -- Consulte [Configuración del correo electrónico](email-configuration.md).
* **Configure las copias de seguridad** -- Antes de añadir contenido, configure copias de seguridad automatizadas de la base de datos y de los archivos (Chamilo no ofrece una solución para ello, pero copiar la carpeta var/ y la base de datos son los 2 elementos más importantes).
* **Revise los ajustes de seguridad** -- Consulte [Ajustes de seguridad](../platform-settings/security-settings.md).

## Resolución de problemas

| Problema | Solución |
|---------|----------|
| Página en blanco en la URL de instalación | Compruebe los registros de errores de PHP. Cambie temporalmente a `APP_ENV=dev` en .env para ver los errores en el navegador. |
| Falla la conexión a la base de datos | Verifique las credenciales, confirme que la base de datos existe y compruebe que el servidor de base de datos permite conexiones desde el host del servidor web. |
| Errores de permiso denegado | Asegúrese de que `var/` tiene permisos de escritura para el usuario del servidor web. |
| Los recursos no se cargan (sin CSS/JS) | Ejecute `yarn install && yarn build` para compilar los recursos del frontend. |