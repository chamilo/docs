# Configuración de Servicios Web

Configuración de los servicios web SOAP / REST heredados (separados de los puntos finales modernos de la API Platform).

Acceda a estas configuraciones en **Administración > Configuraciones > Servicios Web**. Esta categoría contiene **7 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_download_documents_by_api_key`

**Permitir la descarga de documentos del curso mediante clave API**

Descargar documentos verificando la clave de la API REST para un usuario

*Predeterminado: `false`*

### `disable_webservices`

**Desactivar servicios web**

Si no utiliza servicios web, habilite esta opción para evitar cualquier riesgo de seguridad innecesario.

*Predeterminado: `false`*

### `messaging_allow_send_push_notification`

**Permitir notificaciones push a la aplicación móvil de mensajería de Chamilo**

Enviar notificaciones push mediante la consola de Firebase de Google

*Predeterminado: `false`*

### `messaging_gdc_api_key`

**Clave de servidor de la consola de Firebase para mensajería en la nube**

Clave de servidor (token heredado) de las credenciales del proyecto

### `messaging_gdc_project_number`

**ID de remitente de la consola de Firebase para mensajería en la nube**

Necesita registrar un proyecto en <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Habilitar servicios web exclusivos para administradores**

Algunos servicios web REST están marcados solo para administradores y están desactivados de forma predeterminada. Habilite esta función para otorgar acceso a estos servicios web (a usuarios con credenciales de administrador, obviamente).

*Predeterminado: `false`*

### `webservice_return_user_field`

**Campo de usuario devuelto por los servicios web**

Solicitar a los servicios web REST (v2.php) que devuelvan otro identificador para los campos relacionados con el ID de usuario. Esto es útil si el sistema externo no maneja realmente los ID de usuario como lo hace Chamilo, ya que ayuda al sistema externo a relacionar los datos de usuario devueltos con datos externos conocidos por Chamilo. Por ejemplo, si utiliza un sistema de autenticación externo, puede devolver el campo adicional utilizado para relacionar al usuario con el sistema de autenticación externo en lugar de user.id.

*Predeterminado: `oauth2_id`*