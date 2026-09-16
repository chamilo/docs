# Configuración de servicios web

Configuración de los servicios web SOAP / REST heredados (independientes de los endpoints modernos de API Platform).

Acceda a estos ajustes en **Administración > Configuración > Servicios web**. Esta categoría contiene **7 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_download_documents_by_api_key`

**Permitir la descarga de documentos del curso mediante clave API**

Descargar documentos verificando la clave API REST de un usuario

*Valor predeterminado: `false`*


### `disable_webservices`

**Desactivar los servicios web**

Si no utiliza servicios web, active esta opción para evitar cualquier riesgo de seguridad innecesario.

*Valor predeterminado: `false`*


### `messaging_allow_send_push_notification`

**Permitir notificaciones push en la aplicación móvil Chamilo Messaging**

Enviar notificaciones push mediante la consola de Firebase de Google

*Valor predeterminado: `false`*


### `messaging_gdc_api_key`

**Clave de servidor de Firebase Console para Cloud Messaging**

Clave de servidor (token heredado) de las credenciales del proyecto

### `messaging_gdc_project_number`

**ID de remitente de Firebase Console para Cloud Messaging**

Debe registrar un proyecto en <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Activar servicios web solo para administradores**

Algunos servicios web REST están marcados solo para administradores y están desactivados de forma predeterminada. Active esta función para dar acceso a estos servicios web (a usuarios con credenciales de administrador, obviamente).

*Valor predeterminado: `false`*

### `webservice_return_user_field`

**Campo de usuario devuelto por los servicios web**

Solicitar a los servicios web REST (v2.php) que devuelvan otro identificador para los campos relacionados con el ID de usuario. Esto resulta útil si el sistema externo no trabaja realmente con los ID de usuario tal como existen en Chamilo, ya que ayuda al sistema externo a hacer coincidir los datos de usuario devueltos con algún dato externo conocido por Chamilo. Por ejemplo, si utiliza un sistema de autenticación externo, puede devolver el campo extra usado para asociar al usuario con el sistema de autenticación externo en lugar de user.id.

*Valor predeterminado: `oauth2_id`*