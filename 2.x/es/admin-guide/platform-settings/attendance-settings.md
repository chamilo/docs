# Configuración de Asistencia

Valores predeterminados y comportamiento de la herramienta de **Asistencia**.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Asistencia**. Esta categoría contiene **4 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_delete_attendance`

**Asistencias: habilitar eliminación**

El comportamiento predeterminado en Chamilo es ocultar las hojas de asistencia en lugar de eliminarlas, por si el profesor lo hiciera por error. Habilite esta opción para permitir que los profesores *realmente* eliminen las hojas de asistencia.

*Predeterminado: `true`*

### `attendance_allow_comments`

**Permitir comentarios en hojas de asistencia**

Los profesores y estudiantes pueden comentar sobre cada asistencia individual (para justificarla).

*Predeterminado: `false`*

### `enable_sign_attendance_sheet`

**Firma de asistencia**

Habilite la toma de firmas para confirmar la asistencia de una persona.

*Predeterminado: `false`*

### `multilevel_grading`

**Habilitar calificación de asistencia multinivel**

Permite calificar la asistencia con múltiples niveles en lugar de un simple sistema de presente/ausente.

*Predeterminado: `false`*