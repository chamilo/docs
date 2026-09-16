# Configuración de mensajería

Comportamiento del sistema de **Mensajería / Bandeja de entrada**.

Acceda a estos ajustes en **Administración > Configuración > Mensajería**. Esta categoría contiene **7 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_message_tool`

**Herramienta de mensajería interna**

Activar la herramienta de mensajería interna permite a los usuarios enviar mensajes a otros usuarios de la plataforma y disponer de una bandeja de entrada.

*Valor predeterminado: `true`*

### `allow_send_message_to_all_platform_users`

**Permitir el envío de mensajes a cualquier usuario de la plataforma**

Permite enviar mensajes a cualquier usuario de la plataforma, no solo a sus amigos o a las personas que estén en línea en ese momento.

*Valor predeterminado: `false`*

### `allow_user_message_tracking`

**Los administradores pueden ver los mensajes personales**

Permite a los administradores ver los mensajes personales entre un profesor y un alumno. Asegúrese de incluir una nota en sus términos y condiciones, ya que esto puede afectar a la protección de la privacidad.

*Valor predeterminado: `false`*


### `filter_interactivity_messages`

**Los profesores solo pueden acceder a los mensajes de los alumnos dentro del periodo de la sesión**

Filtra los mensajes entre un profesor y un alumno entre las fechas de inicio y fin de la sesión

*Valor predeterminado: `false`*


### `message_max_upload_filesize`

**Tamaño máximo de archivo para subir en los mensajes**

Tamaño máximo para la subida de archivos en la herramienta de mensajería (en bytes)

*Valor predeterminado: `20971520`*

### `private_messages_about_user`

**Permitir mensajes privados entre profesores acerca de un alumno**

Permite el intercambio de mensajes de profesores/responsables acerca de un usuario desde la página de seguimiento de ese usuario.

*Valor predeterminado: `false`*


### `private_messages_about_user_visible_to_user`

**Permitir que los alumnos vean los mensajes sobre ellos entre profesores**

Si el intercambio de mensajes acerca de un usuario está activado, esta opción permitirá al usuario correspondiente ver los mensajes. Esto sirve para cumplir las normas de transparencia que la organización pueda necesitar respetar.

*Valor predeterminado: `false`*