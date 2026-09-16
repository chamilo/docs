# Configuración de tareas cron

Configuración de los trabajos programados (tareas cron) incluidos con Chamilo.

Acceda a estos ajustes en **Administración > Configuración > Tareas cron**. Esta categoría contiene **5 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `cron_remind_course_expiration_activate`

**Cron de recordatorio de caducidad del curso**

Activar el cron de recordatorio de caducidad del curso

*Predeterminado: `false`*

### `cron_remind_course_expiration_frequency`

**Frecuencia del cron de recordatorio de caducidad del curso**

Número de días antes de la caducidad del curso que se deben considerar para enviar el correo de recordatorio

### `cron_remind_course_finished_activate`

**Enviar notificación de curso finalizado**

Si se debe enviar un correo electrónico a los estudiantes cuando su curso (sesión) haya finalizado. Esto requiere que las tareas cron estén configuradas (véase el directorio main/cron/).

*Predeterminado: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron de recordatorio de caducidad de certificados**

Activar el cron `app:send-certificate-expiry-reminders`, que recuerda a los alumnos cuyos certificados han caducado o están a punto de caducar.

*Predeterminado: `false`*

### `cron_certificate_expiry_reminder_days`

**Ventana de recordatorio de caducidad de certificados (días)**

Número predeterminado de días de antelación para buscar certificados a punto de caducar, utilizado salvo que el cron se ejecute con `--days-ahead`.

*Predeterminado: `30`*

## Recordatorios de caducidad de certificados

A los certificados del libro de calificaciones se les puede asignar un periodo de validez (en días), configurado por categoría del libro de calificaciones — véase [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Una vez que un certificado tiene fecha de caducidad, Chamilo puede recordar al alumno por correo electrónico y mensaje interno a medida que se aproxima (o después de que transcurra) esa fecha de caducidad.

Activar `cron_certificate_expiry_reminder_activate` más arriba solo habilita la *funcionalidad*; el recordatorio lo envía realmente un comando de consola que aún debe programar a nivel del sistema operativo (p. ej. mediante `crontab`), ya que Chamilo no ejecuta su propio programador en segundo plano:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Opciones útiles:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | How many days ahead of expiry to include (defaults to `cron_certificate_expiry_reminder_days`) |
| `--force` | Actually send the reminders. Without it, the command only reports what it *would* send — safe to run to check before wiring it into cron |
| `--resend` | Re-send reminders even for a certificate/expiry-date pair already notified |
| `--access-url-id=N` | Restrict the scan to one portal (multi-URL installations) |
| `--include-unsubscribed-users` | Also notify learners who unsubscribed from platform e-mails |

Los profesores pueden enviar los mismos recordatorios de forma manual, sin necesidad de este cron — véase [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).