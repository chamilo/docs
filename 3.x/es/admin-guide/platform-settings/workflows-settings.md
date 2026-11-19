# Configuración de flujos de trabajo

Conmutadores transversales de flujos de trabajo: creación de cursos, validación de inscripciones, flujos de trabajo de tareas y similares.

Acceda a estos ajustes en **Administración > Configuración > Flujos de trabajo**. Esta categoría contiene **23 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts mediante la API o cuando necesite modificar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_user_course_subscription_by_course_admin`

**Permitir la inscripción de usuarios en el curso por el administrador del curso**

Activar esta opción permitirá al administrador del curso inscribir usuarios en un curso

*Valor predeterminado: `true`*


### `allow_users_to_create_courses`

**Permitir a usuarios no administradores crear cursos**

Permitir a usuarios no administradores (docentes) crear nuevos cursos en el servidor

*Valor predeterminado: `false`*


### `allow_working_time_edition`

**Habilitar la edición del tiempo de trabajo del curso**

Habilite esta función para que los docentes actualicen manualmente el tiempo dedicado al curso por los estudiantes.

*Valor predeterminado: `false`*


### `course_visibility_change_only_admin`

**Cambios de visibilidad del curso solo para administradores**

Elimina la posibilidad de que los usuarios no administradores cambien la visibilidad del curso. La visibilidad puede ser un problema cuando hay demasiados docentes para controlarlos directamente. Forzar las visibilidades permite a la organización gestionar mejor los catálogos de cursos.

*Valor predeterminado: `false`*


### `default_menu_entry_for_course_or_session`

**Entrada de menú predeterminada para los cursos**

Define los subelementos predeterminados de la entrada «Cursos» que se mostrarán si el usuario no está inscrito en ningún curso ni sesión.

*Valor predeterminado: `my_courses`*


### `disable_user_conditions_sender_id`

**ID interno del usuario utilizado para enviar notificaciones de cuenta deshabilitada**

Evite ser demasiado personal con los usuarios utilizando una cuenta «bot» para enviar correos electrónicos a los usuarios cuando su cuenta se deshabilite por algún motivo.

*Valor predeterminado: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Deshabilitar la posibilidad de editar tutores del curso**

Cuando está deshabilitado, los administradores no disponen de un enlace para asignar rápidamente tutores a los cursos de la sesión en la página de edición del curso.

*Valor predeterminado: `false`*


### `hrm_allow_access_to_all_students`

**El responsable de RR. HH. puede acceder a todos los estudiantes desde las páginas de informes**

Permite a los usuarios de RR. HH. acceder a todos los estudiantes desde las páginas de informes. La clave heredada `workflows.drh_allow_access_to_all_students` sigue reconociéndose por compatibilidad.

*Valor predeterminado: `false`*


### `gamification_mode`

**Modo de gamificación**

Activa el logro de estrellas en las lecciones

### `go_to_course_after_login`

**Ir directamente al curso después del inicio de sesión**

Cuando un usuario está inscrito en un solo curso, ir directamente al curso después del inicio de sesión

*Valor predeterminado: `false`*


### `load_term_conditions_section`

**Cargar la sección de términos y condiciones**

El acuerdo legal aparecerá durante el inicio de sesión o al entrar en un curso.

*Valor predeterminado: `login`*


### `multiple_url_hide_disabled_settings`

**Ocultar los ajustes deshabilitados en las sub-URL**

Establezca el valor en sí para ocultar por completo los ajustes en una sub-URL si el ajuste está deshabilitado en la URL principal (donde el campo access_url_changeable = 0)

*Valor predeterminado: `false`*


### `plugin_redirection_enabled`

**Habilitar el complemento de redirección**

Habilítelo solo si utiliza el complemento Redirection

*Valor predeterminado: `false`*


### `redirect_index_to_url_for_logged_users`

**Redirigir index.php a la URL indicada para usuarios autenticados**

Si no desea utilizar la página de inicio (anuncios, cursos populares, etc.), puede definir aquí el script (desde la raíz del documento) al que se redirigirá a los usuarios cuando intenten cargar el índice.

### `send_all_emails_to`

**Enviar todos los correos electrónicos a**

Indique una lista de direcciones de correo electrónico a las que se enviarán *todos* los correos electrónicos enviados desde la plataforma. Los correos electrónicos se envían a estas direcciones como destino visible.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo adicional de usuario utilizado para buscar y nombrar sesiones**

Este ajuste define la clave del campo adicional de usuario (p. ej., "company") que se utilizará para buscar usuarios y para definir el nombre de la sesión al inscribir estudiantes desde /admin-dashboard/register.

### `teacher_can_select_course_template`

**El docente puede seleccionar un curso como plantilla**

Permitir elegir un curso como plantilla para el nuevo curso que el docente está creando

*Valor predeterminado: `true`*


### `update_student_expiration_x_date`

**Establecer la fecha de caducidad en el primer inicio de sesión**

Array que define los «días» y los «meses» para establecer la fecha de caducidad de la cuenta cuando el usuario inicia sesión por primera vez.

### `user_edition_extra_field_to_check`

**Establecer un campo adicional como desencadenante del registro como exestudiante**

Indique aquí la etiqueta de un campo adicional. Si este campo adicional se actualiza para cualquier usuario, se desencadena un proceso para comprobar el acceso de este usuario a los cursos con el mismo campo adicional indicado.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Días de caducidad predeterminados por rol**

Un array de rol => número que representa el número de días que tiene una cuenta antes de su caducidad, en función del rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desactivar la desinscripción del usuario del curso/sesión al desinscribir al usuario del grupo/clase**

[inferido] Al eliminar a un usuario de un grupo/clase, no desinscribirlo automáticamente de los cursos o sesiones asociados.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desactivar la desinscripción del usuario del curso al eliminar el curso del grupo/clase**

[inferido] Cuando se elimina un curso de un grupo/clase, no desinscribir automáticamente a los usuarios de ese curso.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desactivar la desinscripción del usuario de la sesión al eliminar la sesión del grupo/clase**

[inferido] Cuando se elimina una sesión de un grupo/clase, no desinscribir automáticamente a los usuarios de esa sesión.

*Predeterminado: `false`*