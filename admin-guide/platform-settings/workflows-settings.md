# Configuración de Flujos de Trabajo

Configuraciones transversales de flujos de trabajo: creación de cursos, validación de inscripción, flujos de trabajo de asignaciones y similares.

Acceda a estas configuraciones en **Administración > Configuraciones de sistema > Flujos de Trabajo**. Esta categoría contiene **23 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_user_course_subscription_by_course_admin`

**Permitir la inscripción de usuarios en cursos por parte del administrador del curso**

Activar esta opción permitirá al administrador del curso inscribir usuarios dentro de un curso.

*Predeterminado: `true`*

### `allow_users_to_create_courses`

**Permitir a no administradores crear cursos**

Permitir a no administradores (profesores) crear nuevos cursos en el servidor.

*Predeterminado: `false`*

### `allow_working_time_edition`

**Habilitar la edición del tiempo de trabajo en el curso**

Habilitar esta función para permitir a los profesores actualizar manualmente el tiempo dedicado al curso por parte de los estudiantes.

*Predeterminado: `false`*

### `course_visibility_change_only_admin`

**Cambios de visibilidad de cursos solo para administradores**

Eliminar la posibilidad de que los no administradores cambien la visibilidad del curso. La visibilidad puede ser un problema cuando hay demasiados profesores para controlar directamente. Forzar las visibilidades permite a la organización gestionar mejor los catálogos de cursos.

*Predeterminado: `false`*

### `default_menu_entry_for_course_or_session`

**Entrada de menú predeterminada para cursos**

Definir los subelementos predeterminados de la entrada 'Cursos' que se mostrarán si el usuario no está registrado en ningún curso ni sesión.

*Predeterminado: `my_courses`*

### `disable_user_conditions_sender_id`

**ID interno del usuario utilizado para enviar notificaciones de cuentas desactivadas**

Evitar ser demasiado personal con los usuarios utilizando una cuenta 'bot' para enviar correos electrónicos a los usuarios cuando su cuenta se desactiva por alguna razón.

*Predeterminado: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Desactivar la capacidad de editar entrenadores de cursos**

Cuando está desactivado, los administradores no tienen un enlace para asignar rápidamente entrenadores a cursos de sesión en la página de edición del curso.

*Predeterminado: `false`*

### `drh_allow_access_to_all_students`

**El gestor de RRHH puede acceder a todos los estudiantes desde las páginas de informes**

[Inferido] Otorgar a los gestores de RRHH/DRH acceso a las páginas de informes de todos los estudiantes en la plataforma.

*Predeterminado: `false`*

### `gamification_mode`

**Modo de gamificación**

Activar el logro de estrellas en las rutas de aprendizaje.

### `go_to_course_after_login`

**Ir directamente al curso después del inicio de sesión**

Cuando un usuario está registrado en un curso, ir directamente al curso después del inicio de sesión.

*Predeterminado: `false`*

### `load_term_conditions_section`

**Cargar la sección de términos y condiciones**

El acuerdo legal aparecerá durante el inicio de sesión o al entrar a un curso.

*Predeterminado: `login`*

### `multiple_url_hide_disabled_settings`

**Ocultar configuraciones desactivadas en sub-URLs**

Establecer en sí para ocultar completamente las configuraciones en una sub-URL si la configuración está desactivada en la URL principal (donde el campo `access_url_changeable` = 0).

*Predeterminado: `false`*

### `plugin_redirection_enabled`

**Habilitar el plugin de redirección**

Habilitar solo si está utilizando el plugin de Redirección.

*Predeterminado: `false`*

### `redirect_index_to_url_for_logged_users`

**Redirigir index.php a una URL dada para usuarios autenticados**

Si no desea usar la página de índice (anuncios, cursos populares, etc.), puede definir aquí el script (desde la raíz del documento) a donde serán redirigidos los usuarios al intentar cargar el índice.

### `send_all_emails_to`

**Enviar todos los correos electrónicos a**

Proporcione una lista de direcciones de correo electrónico a las que se enviarán *todos* los correos electrónicos enviados desde la plataforma. Los correos se envían a estas direcciones como destino visible.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo de usuario adicional utilizado para buscar y nombrar sesiones**

Esta configuración define la clave del campo de usuario adicional (por ejemplo, "company") que se utilizará para buscar usuarios y definir el nombre de la sesión al registrar estudiantes desde /admin-dashboard/register.

### `teacher_can_select_course_template`

**El profesor puede seleccionar un curso como plantilla**

Permitir elegir un curso como plantilla para el nuevo curso que el profesor está creando.

*Predeterminado: `true`*

### `update_student_expiration_x_date`

**Establecer fecha de vencimiento en el primer inicio de sesión**

Arreglo que define los 'días' y 'meses' para establecer la fecha de vencimiento de la cuenta cuando el usuario inicia sesión por primera vez.

### `user_edition_extra_field_to_check`

**Establecer un campo adicional como desencadenante para el registro como ex-alumno**

Proporcione aquí una etiqueta de campo adicional. Si este campo adicional se actualiza para cualquier usuario, se desencadena un proceso para verificar el acceso de este usuario a cursos con el mismo campo adicional dado.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Días de vencimiento predeterminados por rol**

Un arreglo de rol => número que representa la cantidad de días que una cuenta tiene antes de vencer, dependiendo del rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desactivar la cancelación de suscripción de usuarios de cursos/sesiones al cancelar la suscripción de un usuario de un grupo/clase**

[inferido] Al eliminar a un usuario de un grupo/clase, no cancelar automáticamente su suscripción a los cursos o sesiones asociados.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desactivar la cancelación de suscripción de usuarios de un curso al eliminar el curso de un grupo/clase**

[inferido] Cuando se elimina un curso de un grupo/clase, no cancelar automáticamente la suscripción de los usuarios a ese curso.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desactivar la cancelación de suscripción de usuarios de una sesión al eliminar la sesión de un grupo/clase**

[inferido] Cuando se elimina una sesión de un grupo/clase, no cancelar automáticamente la suscripción de los usuarios a esa sesión.

*Predeterminado: `false`*