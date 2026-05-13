# Configuración de Tickets

Comportamiento del sistema de **Tickets** (mesa de ayuda).

Acceda a estas configuraciones en **Administración > Configuraciones > Tickets**. Esta categoría contiene **7 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `show_link_bug_notification`

**Mostrar enlace para reportar errores**

Muestra un enlace en el encabezado para reportar un error dentro de nuestra plataforma de soporte (http://support.chamilo.org). Al hacer clic en el enlace, el usuario es redirigido a la plataforma de soporte, a una página wiki que describe el proceso de reporte de errores.

*Predeterminado: `false`*

### `show_link_ticket_notification`

**Mostrar enlace de creación de ticket**

Muestra el enlace de creación de ticket a los usuarios en el lado derecho del portal.

*Predeterminado: `false`*

### `ticket_allow_category_edition`

**Permitir edición de categorías de tickets**

Permite la edición de categorías por parte de los administradores.

*Predeterminado: `false`*

### `ticket_allow_student_add`

**Permitir a los usuarios agregar tickets**

Permite a todos los usuarios agregar tickets, no solo a los administradores.

*Predeterminado: `false`*

### `ticket_project_user_roles`

**Acceso por rol a proyectos de tickets**

Permite que los proyectos de tickets sean accesibles por roles de usuario específicos. Ejemplo: ['permissions' => [1 => [17]] donde project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Enviar mensajes de advertencia de tickets a los administradores**

Envía un mensaje si se creó un ticket sin categoría o si una categoría no tiene ningún administrador asignado.

*Predeterminado: `false`*

### `ticket_warn_admin_no_user_in_category`

**Enviar alerta a administradores si la categoría de tickets no tiene responsable**

Envía un mensaje de advertencia (correo electrónico y mensaje de Chamilo) a todos los administradores si no hay un usuario asignado a una categoría.

*Predeterminado: `false`*