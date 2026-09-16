# Configuración de tickets

Comportamiento del sistema de **Tickets** (mesa de ayuda).

Acceda a estos ajustes en **Administración > Configuración > Tickets**. Esta categoría contiene **7 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al escribir scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `show_link_bug_notification`

**Mostrar enlace para informar de un error**

Muestra un enlace en la cabecera para informar de un error en nuestra plataforma de soporte (http://support.chamilo.org). Al hacer clic en el enlace, el usuario es enviado a la plataforma de soporte, a una página wiki que describe el proceso de informe de errores.

*Predeterminado: `false`*


### `show_link_ticket_notification`

**Mostrar enlace de creación de tickets**

Muestra el enlace de creación de tickets a los usuarios en el lado derecho del portal

*Predeterminado: `false`*


### `ticket_allow_category_edition`

**Permitir la edición de categorías de tickets**

Permite la edición de categorías por parte de los administradores.

*Predeterminado: `false`*

### `ticket_allow_student_add`

**Permitir a los usuarios añadir tickets**

Permite a todos los usuarios añadir tickets, no solo a los administradores.

*Predeterminado: `false`*

### `ticket_project_user_roles`

**Acceso por rol a los proyectos de tickets**

Permite que los proyectos de tickets sean accedidos por roles de usuario específicos. Ejemplo: ['permissions' => [1 => [17]] donde project_id = 1, STUDENT_BOSS = 17.

> Este ajuste es obligatorio para usuarios que no son administradores: sin un mapeo de roles definido aquí, solo los administradores pueden acceder a los tickets de soporte. Para dar acceso a cualquier otro rol a un proyecto de tickets, añada su ID de rol a los permisos de este ajuste para ese proyecto.

### `ticket_send_warning_to_all_admins`

**Enviar mensajes de aviso de tickets a los administradores**

Envía un mensaje si se creó un ticket sin categoría o si una categoría no tiene ningún administrador asignado.

*Predeterminado: `false`*


### `ticket_warn_admin_no_user_in_category`

**Enviar alerta a los administradores si la categoría de tickets no tiene responsable**

Envía un mensaje de aviso (correo electrónico y mensaje de Chamilo) a todos los administradores si no hay un usuario asignado a una categoría.

*Predeterminado: `false`*