# Configuración de Anuncios

Comportamiento de la herramienta de **Anuncios** del curso: cómo se envían y programan los anuncios.

Accede a estas configuraciones en **Administración > Configuraciones de configuración > Anuncios**. Esta categoría contiene **9 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando hagas scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_careers_in_global_announcements`

**Vincular anuncios globales con carreras y promociones**

Cuando está habilitado, los anuncios globales pueden asociarse con carreras y promociones para una distribución dirigida.

*Predeterminado: `false`*

### `allow_coach_to_edit_announcements`

**Permitir a los entrenadores editar siempre los anuncios**

Permite a los entrenadores editar siempre los anuncios dentro de sesiones activas o pasadas.

*Predeterminado: `false`*

### `allow_scheduled_announcements`

**Habilitar anuncios programados en sesiones**

Permite a los gestores de sesiones configurar anuncios que se activarán en fechas específicas o después/antes de un número de días del inicio/fin de la sesión. Habilitar esta función requiere configurar una tarea cron.

*Predeterminado: `false`*

### `announcements_hide_send_to_hrm_users`

**Ocultar la opción de enviar anuncios a usuarios de RRHH**

Elimina la casilla de verificación para habilitar el envío de anuncios a usuarios con roles de RRHH (aún requiere confirmación en la herramienta de anuncios).

*Predeterminado: `true`*

### `course_announcement_scheduled_by_date`

**Anuncios basados en fechas**

Permite a los profesores configurar anuncios que se enviarán en fechas específicas. Esto requiere configurar una tarea cron en cron/course_announcement.php que se ejecute al menos una vez al día.

*Predeterminado: `false`*

### `disable_announcement_attachment`

**Deshabilitar adjuntos en anuncios**

Aunque en esta versión los adjuntos se manejan de manera elegante y no se multiplican en el disco, podrías querer deshabilitar los adjuntos por completo si deseas evitar excesos.

*Predeterminado: `false`*

### `disable_delete_all_announcements`

**Deshabilitar el botón para eliminar todos los anuncios**

Selecciona 'Sí' para eliminar el botón que permite borrar todos los anuncios, ya que los profesores podrían usarlo por error.

*Predeterminado: `false`*

### `hide_announcement_sent_to_users_info`

**Ocultar 'enviado a' en los anuncios**

Selecciona 'Sí' para evitar mostrar a quién se ha enviado un anuncio.

*Predeterminado: `false`*

### `hide_send_to_hrm_users`

**Ocultar la opción de enviar una copia del anuncio a RRHH**

En el formulario de anuncios, normalmente aparece una opción que permite a los profesores enviar una copia del anuncio al RRHH del usuario. Configura esto en 'Sí' para eliminar la opción (y *no* enviar la copia).