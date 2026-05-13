# Configuración de Tareas Programadas (Cron Jobs)

Configuración de las tareas programadas (tareas cron) incluidas con Chamilo.

Acceda a estas configuraciones en **Administración > Configuraciones > Tareas Programadas (Cron Jobs)**. Esta categoría contiene **3 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `cron_remind_course_expiration_activate`

**Recordatorio de Vencimiento de Curso (cron)**

Habilita el cron de Recordatorio de Vencimiento de Curso

*Predeterminado: `false`*

### `cron_remind_course_expiration_frequency`

**Frecuencia para el cron de Recordatorio de Vencimiento de Curso**

Número de días antes del vencimiento del curso para considerar el envío de un correo de recordatorio

### `cron_remind_course_finished_activate`

**Enviar notificación de curso finalizado**

Indica si se debe enviar un correo electrónico a los estudiantes cuando su curso (sesión) haya finalizado. Esto requiere que las tareas cron estén configuradas (consulte el directorio main/cron/).

*Predeterminado: `false`*