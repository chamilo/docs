# Configuración de asistencia

Valores predeterminados y comportamiento de la herramienta **Attendance**.

Acceda a estos ajustes en **Administración > Configuración > Attendance**. Esta categoría contiene **5 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_delete_attendance`

**Asistencias: habilitar eliminación**

El comportamiento predeterminado en Chamilo es ocultar las hojas de asistencia en lugar de eliminarlas, por si el docente lo hiciera por error. Active esta opción para permitir que los docentes *realmente* eliminen las hojas de asistencia.

*Default: `true`*

### `attendance_allow_comments`

**Permitir comentarios en las hojas de asistencia**

Docentes y estudiantes pueden comentar cada asistencia individual (para justificarla).

*Default: `false`*

### `attendance_calendar_set_duration` **v3**

**Duración de los eventos de asistencia**

Opción para definir la duración de un evento en la hoja de asistencia.

*Default: `false`*

### `enable_sign_attendance_sheet`

**Firma de asistencia**

Habilita la toma de firmas para confirmar la asistencia.

*Default: `false`*

### `multilevel_grading`

**Habilitar calificación multinivel de asistencia**

Permite calificar la asistencia con varios niveles en lugar de un sistema simple de presente/ausente.

*Default: `false`*