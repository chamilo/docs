# Configuración de tickets

Comportamiento del sistema de **Tickets** (mesa de ayuda).

Acceda a estos ajustes en **Administración > Parámetros de configuración > Tickets**. Esta categoría contiene **8 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `show_link_bug_notification`

**Mostrar enlace para informar de un error**

Muestra un enlace en la cabecera para informar de un error dentro de nuestra plataforma de soporte (http://support.chamilo.org). Al hacer clic en el enlace, el usuario es enviado a la plataforma de soporte, a una página wiki que describe el proceso de informe de errores.

*Valor predeterminado: `false`*


### `show_link_ticket_notification`

**Mostrar enlace de creación de tickets**

Muestra el enlace de creación de tickets a los usuarios en el lado derecho del portal

*Valor predeterminado: `false`*


### `ticket_allow_category_edition`

**Permitir la edición de categorías de tickets**

Permite la edición de categorías por parte de los administradores.

*Valor predeterminado: `false`*

### `ticket_allow_student_add`

**Permitir a los usuarios añadir tickets**

Permite a todos los usuarios añadir tickets, no solo a los administradores.

*Valor predeterminado: `false`*

### `ticket_project_user_roles`

**Acceso por rol a los proyectos de tickets**

Permite que los proyectos de tickets sean accedidos por roles de usuario específicos. Ejemplo: ['permissions' => [1 => [17]] donde project_id = 1, STUDENT_BOSS = 17.

> Este ajuste es obligatorio para los usuarios que no son administradores: sin una asignación de roles definida aquí, solo los administradores pueden acceder a los tickets de soporte. Para dar a cualquier otro rol acceso a un proyecto de tickets, añada su ID de rol a los permisos de este ajuste para ese proyecto.

### `ticket_send_warning_to_all_admins`

**Enviar mensajes de advertencia de tickets a los administradores**

Envía un mensaje si se creó un ticket sin categoría o si una categoría no tiene ningún administrador asignado.

*Valor predeterminado: `false`*


### `ticket_support_bot_enabled`

**Activar el bot de soporte**

Activa el asistente de soporte basado en un árbol de decisión en el chat acoplado. Está desactivado de forma predeterminada. Los administradores también deben configurar y publicar un árbol de soporte válido con una pregunta de entrada y opciones antes de que el bot esté disponible. El bot utiliza opciones predefinidas en lugar de IA generativa y puede crear un ticket para las preguntas no resueltas.

*Valor predeterminado: `false`*

Consulte [Bot de soporte](../support-bot.md) para la configuración y el flujo de usuario (PR #9224, issue #8754).

### `ticket_warn_admin_no_user_in_category`

**Enviar alerta a los administradores si la categoría de tickets no tiene responsable**

Envía un mensaje de advertencia (correo electrónico y mensaje de Chamilo) a todos los administradores si no hay un usuario asignado a una categoría.

*Valor predeterminado: `false`*