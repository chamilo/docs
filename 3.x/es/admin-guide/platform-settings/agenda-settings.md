# Configuración de la agenda

Valores predeterminados y comportamiento de la herramienta **Agenda** (calendario / eventos).

Acceda a estos ajustes en **Administración > Configuración > Agenda**. Esta categoría contiene **11 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `agenda_colors`

**Colores de la agenda**

Establezca colores en código HTML para cada tipo de evento a fin de cambiar el color al mostrar el evento.

### `agenda_legend`

**Leyendas de colores de la agenda**

Añada un texto breve como leyenda que describa los colores utilizados para los eventos.

### `agenda_on_hover_info`

**Información al pasar el cursor en la agenda**

Personalice la agenda al pasar el cursor. Muestre el comentario y/o la descripción de la agenda.

### `agenda_reminders_sender_id`

**ID del usuario que envía oficialmente los recordatorios de la agenda**

Define qué usuario aparece como remitente de los correos de recordatorio de la agenda.

*Predeterminado: `0`*

### `allow_agenda_edit_for_hrm`

**Permitir al rol HRM editar o eliminar eventos de la agenda**

Otorga al HRM un poco más de capacidad al permitirle editar/eliminar eventos de la agenda en la sesión del curso.

*Predeterminado: `false`*

### `allow_careers_in_global_agenda`

**Vincular eventos del calendario global con carreras y promociones**

Cuando está habilitado, los eventos del calendario global pueden asociarse con carreras y promociones, lo que permite una planificación dirigida.

*Predeterminado: `false`*

### `allow_personal_agenda`

**Agenda personal**

¿Puede el alumno añadir eventos personales a la Agenda?

*Predeterminado: `true`*

### `default_calendar_view`

**Modo de visualización predeterminado del calendario**

Establezca esto en dayGridMonth, basicWeek, agendaWeek o agendaDay para cambiar la vista predeterminada del calendario.

*Predeterminado: `month`*

### `fullcalendar_settings`

**Personalización del calendario**

Ajustes adicionales para la agenda, que le permiten configurar la biblioteca de calendario específica que utilizamos.

### `personal_agenda_show_all_session_events`

**Mostrar todos los eventos de la agenda en la agenda personal**

No ocultar los eventos de las sesiones caducadas.

*Predeterminado: `false`*

### `personal_calendar_show_sessions_occupation`

**Mostrar ocupaciones de sesiones en la agenda personal**

Cuando está habilitado, los horarios y ocupaciones de las sesiones se muestran en los calendarios personales de los usuarios.

*Predeterminado: `false`*