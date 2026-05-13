# Configuración de la Agenda

Valores predeterminados y comportamiento de la herramienta **Agenda** (calendario / eventos).

Acceda a estas configuraciones en **Administración > Configuraciones > Agenda**. Esta categoría contiene **11 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `agenda_colors`

**Colores de la agenda**

Establezca colores en código HTML para cada tipo de evento y así cambiar el color al mostrar el evento.

### `agenda_legend`

**Leyendas de colores de la agenda**

Agregue un pequeño texto como leyenda que describa los colores utilizados para los eventos.

### `agenda_on_hover_info`

**Información al pasar el cursor sobre la agenda**

Personalice la agenda al pasar el cursor. Muestre el comentario y/o la descripción de la agenda.

### `agenda_reminders_sender_id`

**ID del usuario que envía oficialmente los recordatorios de la agenda**

Establece qué usuario aparece como el remitente de los correos electrónicos de recordatorio de la agenda.

*Predeterminado: `0`*

### `allow_agenda_edit_for_hrm`

**Permitir al rol HRM editar o eliminar eventos de la agenda**

Esto otorga un poco más de poder al HRM al permitirle editar/eliminar eventos de la agenda en el curso-sesión.

*Predeterminado: `false`*

### `allow_careers_in_global_agenda`

**Vincular eventos del calendario global con carreras y promociones**

Cuando está habilitado, los eventos del calendario global pueden asociarse con carreras y promociones, permitiendo una programación dirigida.

*Predeterminado: `false`*

### `allow_personal_agenda`

**Agenda personal**

¿Puede el estudiante agregar eventos personales a la Agenda?

*Predeterminado: `true`*

### `default_calendar_view`

**Modo de visualización predeterminado del calendario**

Establezca esto como dayGridMonth, basicWeek, agendaWeek o agendaDay para cambiar la vista predeterminada del calendario.

*Predeterminado: `month`*

### `fullcalendar_settings`

**Personalización del calendario**

Configuraciones adicionales para la agenda, que le permiten configurar la biblioteca de calendario específica que utilizamos.

### `personal_agenda_show_all_session_events`

**Mostrar todos los eventos de la agenda en la agenda personal**

No ocultar eventos de sesiones expiradas.

*Predeterminado: `false`*

### `personal_calendar_show_sessions_occupation`

**Mostrar ocupaciones de sesiones en la agenda personal**

Cuando está habilitado, los horarios y ocupaciones de las sesiones se muestran en los calendarios personales de los usuarios.

*Predeterminado: `false`*