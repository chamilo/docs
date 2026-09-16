# Configuración de Mensajería

Comportamiento del sistema de **Mensajería / Bandeja de entrada**.

Accede a estas configuraciones en **Administración > Configuraciones > Mensajería**. Esta categoría contiene **7 configuraciones**, listadas a continuación con el título y el comentario incluidos en los ajustes predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando realices scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_message_tool`

**Herramienta de mensajería interna**

Habilitar la herramienta de mensajería interna permite a los usuarios enviar mensajes a otros usuarios de la plataforma y tener una bandeja de entrada de mensajería.

*Predeterminado: `true`*

### `allow_send_message_to_all_platform_users`

**Permitir enviar mensajes a cualquier usuario de la plataforma**

Permite enviar mensajes a cualquier usuario de la plataforma, no solo a tus amigos o a las personas que están actualmente en línea.

*Predeterminado: `false`*

### `allow_user_message_tracking`

**Los administradores pueden ver mensajes personales**

Permite a los administradores ver los mensajes personales entre un profesor y un estudiante. Asegúrate de incluir una nota en tus términos y condiciones, ya que esto podría afectar la protección de la privacidad.

*Predeterminado: `false`*

### `filter_interactivity_messages`

**Los profesores pueden acceder a los mensajes de los estudiantes solo dentro del período de la sesión**

Filtra los mensajes entre un profesor y un estudiante entre las fechas de inicio y fin de la sesión.

*Predeterminado: `false`*

### `message_max_upload_filesize`

**Tamaño máximo de archivo para subir en mensajes**

Tamaño máximo para la carga de archivos en la herramienta de mensajería (en Bytes).

*Predeterminado: `20971520`*

### `private_messages_about_user`

**Permitir mensajes privados entre profesores sobre un estudiante**

Permite el intercambio de mensajes entre profesores o superiores sobre un usuario desde la página de seguimiento de ese usuario.

*Predeterminado: `false`*

### `private_messages_about_user_visible_to_user`

**Permitir a los estudiantes ver los mensajes sobre ellos entre profesores**

Si el intercambio de mensajes sobre un usuario está habilitado, esta opción permitirá al usuario correspondiente ver los mensajes. Esto es para cumplir con las reglas de transparencia que la organización pueda necesitar cumplir.

*Predeterminado: `false`*