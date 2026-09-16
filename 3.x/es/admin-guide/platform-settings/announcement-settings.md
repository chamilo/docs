# Configuración de anuncios

Comportamiento de la herramienta **Anuncios** del curso: cómo se envían y se programan los anuncios.

Acceda a estos ajustes en **Administración > Configuración > Anuncios**. Esta categoría contiene **10 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_careers_in_global_announcements`

**Vincular anuncios globales con carreras y promociones**

Cuando está activado, los anuncios globales pueden asociarse con carreras y promociones para una distribución dirigida.

*Valor predeterminado: `false`*

### `allow_coach_to_edit_announcements`

**Permitir que los tutores editen siempre los anuncios**

Permite que los tutores editen siempre los anuncios dentro de sesiones activas o pasadas.

*Valor predeterminado: `false`*

### `allow_scheduled_announcements`

**Activar anuncios programados en las sesiones**

Permite a los gestores de sesiones definir anuncios que se dispararán en fechas concretas o un número de días antes o después del inicio o del fin de la sesión. Activar esta función requiere configurar una tarea cron.

*Valor predeterminado: `false`*

### `announcements_hide_send_to_hrm_users`

**Ocultar la opción de enviar anuncios a usuarios de RR. HH.**

Elimina la casilla para habilitar el envío de anuncios a usuarios con roles de RR. HH. (sigue siendo necesario confirmarlo en la herramienta de anuncios).

*Valor predeterminado: `true`*

### `course_announcement_scheduled_by_date`

**Anuncios basados en fecha**

Permite a los profesores configurar anuncios que se enviarán en fechas concretas. Esto requiere configurar una tarea cron sobre cron/course_announcement.php que se ejecute al menos una vez al día.

*Valor predeterminado: `false`*

### `disable_announcement_attachment`

**Desactivar adjuntos en los anuncios**

Aunque en esta versión los adjuntos se gestionan de forma elegante y no se multiplican en disco, es posible que desee desactivar los adjuntos por completo si quiere evitar excesos.

*Valor predeterminado: `false`*

### `disable_delete_all_announcements`

**Desactivar el botón para eliminar todos los anuncios**

Seleccione «Sí» para quitar el botón de eliminar todos los anuncios, ya que los profesores pueden usarlo por error.

*Valor predeterminado: `false`*

### `hide_announcement_sent_to_users_info`

**Ocultar «enviado a» en los anuncios**

Seleccione «Sí» para evitar mostrar a quién se ha enviado un anuncio.

*Valor predeterminado: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Ocultar anuncios globales para anónimos**

Oculta los anuncios de la plataforma a los usuarios anónimos y solo los muestra a los usuarios autenticados.

*Valor predeterminado: `false`*

### `hide_send_to_hrm_users`

**Ocultar la opción de enviar una copia del anuncio al HRM**

En el formulario de anuncios suele aparecer una opción que permite a los profesores enviar una copia del anuncio al HRM del usuario. Establézcalo en «Sí» para quitar la opción (y *no* enviar la copia).