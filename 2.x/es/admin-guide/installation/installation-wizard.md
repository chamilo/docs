# Asistente de Instalación

Chamilo 2.0 incluye un asistente de instalación basado en web que te guía a través de la configuración inicial. El asistente se ejecuta automáticamente cuando accedes a la plataforma por primera vez.

## Antes de Comenzar

Asegúrate de que se cumplan los siguientes requisitos previos:

1. Tu servidor cumple con todos los [requisitos del servidor](server-requirements.md).
2. Has descargado una versión empaquetada (zip o tar.gz) de Chamilo.
3. Tu servidor web está configurado para servir el directorio `public/` como raíz de documentos.
4. Tu archivo `.env` existe y está vacío (el asistente guiará la configuración de la base de datos).

## Paso 1: Idioma de Instalación

![Asistente de instalación Paso 1 — selección de idioma](/.gitbook/assets/install-step1-language.png)

El primer paso te permite seleccionar el idioma para el proceso de instalación. Elige tu idioma preferido desde el menú desplegable.

Si Chamilo detecta una instalación existente (para una actualización), mostrará el estado de la migración y ofrecerá una ruta de actualización en lugar de una instalación nueva.

## Paso 2: Verificación de Requisitos

![Asistente de instalación Paso 2 — verificación de requisitos mostrando la versión de PHP, extensiones y permisos de directorios](/.gitbook/assets/install-step2-requirements.png)

El asistente verifica el entorno de tu servidor:

* **Versión de PHP** es 8.2 o superior
* **Extensiones de PHP requeridas** están instaladas (intl, gd, curl, zip, mbstring, xml, etc.)
* **Configuraciones de PHP recomendadas** — `date.timezone` está configurado, límites adecuados de carga/memoria
* **Permisos de directorios y archivos** — `var/`, `config/` y `public/upload/` tienen permisos de escritura para el servidor web

Si no se cumplen algunos requisitos, el asistente mostrará advertencias o errores. Resuélvelos antes de continuar.

## Paso 3: Licencia

![Asistente de instalación Paso 3 — aceptación de la licencia](/.gitbook/assets/install-step3-license.png)

Este paso muestra la licencia GNU/GPLv3. Debes marcar la casilla **"Acepto"** para continuar.

Opcionalmente, puedes expandir la sección **Información de contacto** para proporcionar detalles sobre tu organización (nombre, correo electrónico, empresa, país). Esto es voluntario y ayuda a la comunidad de Chamilo a entender quién usa la plataforma, pero también nos permitirá contactarte *muy raramente* sobre eventos cercanos a ti.

## Paso 4: Configuración de la Base de Datos

![Asistente de instalación Paso 4 — configuración de la conexión a la base de datos](/.gitbook/assets/install-step4-database.png)

Ingresa los detalles de conexión de tu base de datos:

| Campo | Descripción |
|-------|-------------|
| **Host de la base de datos** | El nombre de host o IP de tu servidor de base de datos (por ejemplo, `localhost` o `127.0.0.1`) |
| **Puerto de la base de datos** | Predeterminado: 3306 para MySQL/MariaDB |
| **Nombre de la base de datos** | El nombre de la base de datos a usar (solo alfanuméricos y guiones bajos) |
| **Usuario de la base de datos** | Un usuario de base de datos con privilegios completos sobre la base de datos especificada |
| **Contraseña de la base de datos** | La contraseña para el usuario de la base de datos |

Haz clic en **Verificar conexión a la base de datos** para probar. El asistente no te permitirá continuar hasta que la conexión sea exitosa. Si la base de datos ya existe, se mostrará una advertencia.

## Paso 5: Configuraciones Generales

![Asistente de instalación Paso 5 — cuenta de administrador, configuraciones del portal y configuración de correo electrónico](/.gitbook/assets/install-step5-config.png)

Este paso combina la creación de la cuenta de administrador, las configuraciones del portal y la configuración de correo electrónico.

### Cuenta de Administrador

| Campo | Descripción |
|-------|-------------|
| **Inicio de sesión** | El nombre de usuario del administrador |
| **Contraseña** | Elige una contraseña segura — esta cuenta tiene acceso completo a la plataforma |
| **Nombre** | El nombre del administrador |
| **Apellido** | El apellido del administrador |
| **Correo electrónico** | Usado para notificaciones del sistema y restablecimiento de contraseña |
| **Teléfono** | Número de contacto opcional |

Estos detalles del administrador también serán utilizados por Chamilo para completar los datos de contacto de soporte, así que asegúrate de reconfigurarlos en los ajustes después de que concluya la instalación.

### Configuraciones del Portal

| Campo | Descripción |
|-------|-------------|
| **Idioma** | El idioma predeterminado de la interfaz |
| **Nombre del portal** | El nombre de tu plataforma (por ejemplo, "LMS de mi Organización") |
| **Nombre corto de la empresa** | El nombre abreviado de tu organización |
| **URL de la empresa** | El sitio web de tu organización |
| **Método de encriptación** | Algoritmo de hash de contraseñas — se recomienda **bcrypt** |
| **Permitir auto-registro** | Sí / No / Después de aprobación |
| **Permitir auto-registro como formador** | Sí / No |

### Configuración de Correo Electrónico

La sección de configuraciones de correo te permite configurar el transporte de correo (SMTP, Amazon SES, Mailjet, etc.) y probar el envío de correos. Consulta [Configuración de Correo Electrónico](email-configuration.md) para más detalles.

Todas estas configuraciones pueden modificarse más adelante desde el panel de administración.

## Paso 6: Última Verificación Antes de la Instalación

![Asistente de instalación Paso 6 — revisión de todas las configuraciones antes de la instalación](/.gitbook/assets/install-step6-review.png)

Este paso muestra un resumen de todo lo que ingresaste para su revisión:

* Credenciales del administrador (la contraseña está oculta por defecto — haz clic en el ícono del ojo para revelarla)
* Configuraciones del portal
* Detalles de la conexión a la base de datos

Revisa cuidadosamente y luego haz clic en **Instalar Chamilo** para ejecutar la instalación. El asistente creará todas las tablas de la base de datos, poblará los datos iniciales y configurará la plataforma.

## Paso 7: Instalación Completada

![Asistente de instalación Paso 7 — finalización con consejos de seguridad y enlace al portal](/.gitbook/assets/install-step7-complete.png)

Una vez que la instalación se completa con éxito, el asistente muestra:

* **Consejos para comenzar** — Sugiere crear tu primer curso para explorar la plataforma (como administrador, debes hacerlo desde el panel de administración)
* **Recomendaciones de seguridad**:
  * Haz que el directorio `config/` sea de solo lectura (`chmod 0555`)
  * Elimina el directorio `public/main/install/`
* Un **enlace a tu portal** para iniciar sesión con las credenciales de administrador que acabas de crear

## Post-Instalación

Después de completar el asistente:

* **Eliminar o restringir el acceso al instalador** — El asistente no debería ser accesible después de la instalación. Chamilo generalmente lo bloquea automáticamente, pero verifica que al volver a visitar la URL de instalación se redirija a la página de inicio de sesión.
* **Configurar el envío de correos electrónicos** — Consulta [Configuración de Correo Electrónico](email-configuration.md).
* **Configurar copias de seguridad** — Antes de agregar contenido, configura copias de seguridad automáticas de la base de datos y los archivos (Chamilo no proporciona una solución para esto, pero copiar la carpeta var/ y la base de datos son los 2 elementos más importantes).
* **Revisar las configuraciones de seguridad** — Consulta [Configuraciones de Seguridad](../platform-settings/security-settings.md).

## Solución de Problemas

| Problema | Solución |
|---------|----------|
| Página en blanco en la URL de instalación | Revisa los registros de errores de PHP. Cambia temporalmente a `APP_ENV=dev` en .env para ver los errores en el navegador. |
| Falla en la conexión a la base de datos | Verifica las credenciales, confirma que la base de datos existe, asegúrate de que el servidor de la base de datos permite conexiones desde el host del servidor web. |
| Errores de permisos denegados | Asegúrate de que `var/` tenga permisos de escritura para el usuario del servidor web. |
| Los recursos no se cargan (sin CSS/JS) | Ejecuta `yarn install && yarn build` para compilar los recursos del frontend. |