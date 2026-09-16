# Configuración de flujos de trabajo

Conmutadores de flujos de trabajo transversales: creación de cursos, validación de matrícula, flujos de trabajo de tareas y similares.

Acceda a estos ajustes en **Administración > Configuración > Flujos de trabajo**. Esta categoría contiene **23 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_user_course_subscription_by_course_admin`

**Permitir la suscripción de usuarios al curso por el administrador del curso**

Activar esta opción permitirá al administrador del curso suscribir usuarios dentro de un curso

*Predeterminado: `true`*


### `allow_users_to_create_courses`

**Permitir a no administradores crear cursos**

Permitir a no administradores (profesores) crear cursos nuevos en el servidor

*Predeterminado: `false`*


### `allow_working_time_edition`

**Habilitar la edición del tiempo de trabajo del curso**

Habilite esta función para que los profesores actualicen manualmente el tiempo que los alumnos han dedicado al curso.

*Predeterminado: `false`*


### `course_visibility_change_only_admin`

**Cambios de visibilidad del curso solo para administradores**

Elimina la posibilidad de que los no administradores cambien la visibilidad del curso. La visibilidad puede ser un problema cuando hay demasiados profesores para controlarlos de forma directa. Forzar las visibilidades permite a la organización gestionar mejor los catálogos de cursos.

*Predeterminado: `false`*


### `default_menu_entry_for_course_or_session`

**Entrada de menú predeterminada para cursos**

Define los subelementos predeterminados de la entrada «Cursos» que se mostrarán si el usuario no está inscrito en ningún curso ni sesión.

*Predeterminado: `my_courses`*


### `disable_user_conditions_sender_id`

**ID interno del usuario utilizado para enviar notificaciones de cuenta deshabilitada**

Evite ser demasiado personal con los usuarios utilizando una cuenta «bot» para enviar correos electrónicos a los usuarios cuando su cuenta se deshabilite por algún motivo.

*Predeterminado: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Deshabilitar la capacidad de editar tutores del curso**

Cuando está deshabilitado, los administradores no disponen de un enlace para asignar rápidamente tutores a los cursos de sesión en la página de edición del curso.

*Predeterminado: `false`*


### `drh_allow_access_to_all_students`

**RR. HH. puede acceder a todos los estudiantes desde las páginas de informes**

[inferido] Concede a los gestores de RR. HH./DRH acceso a las páginas de informes de todos los alumnos de la plataforma.

*Predeterminado: `false`*


### `gamification_mode`

**Modo de gamificación**

Activa el logro de estrellas en las rutas de aprendizaje

### `go_to_course_after_login`

**Ir directamente al curso después del inicio de sesión**

Cuando un usuario está inscrito en un solo curso, ir directamente al curso después del inicio de sesión

*Predeterminado: `false`*


### `load_term_conditions_section`

**Cargar la sección de condiciones legales**

El acuerdo legal aparecerá durante el inicio de sesión o al entrar en un curso.

*Predeterminado: `login`*


### `multiple_url_hide_disabled_settings`

**Ocultar ajustes deshabilitados en sub-URL**

Establezca en sí para ocultar por completo los ajustes en una sub-URL si el ajuste está deshabilitado en la URL principal (donde el campo access_url_changeable = 0)

*Predeterminado: `false`*


### `plugin_redirection_enabled`

**Habilitar el plugin de redirección**

Habilite solo si está utilizando el plugin Redirection

*Predeterminado: `false`*


### `redirect_index_to_url_for_logged_users`

**Redirigir index.php a una URL dada para usuarios autenticados**

Si no desea utilizar la página de índice (anuncios, cursos populares, etc.), puede definir aquí el script (desde la raíz de documentos) al que se redirigirá a los usuarios al intentar cargar el índice.

### `send_all_emails_to`

**Enviar todos los correos electrónicos a**

Indique una lista de direcciones de correo electrónico a las que se enviarán *todos* los correos electrónicos enviados desde la plataforma. Los correos se envían a estas direcciones como destino visible.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo extra de usuario utilizado para buscar y nombrar sesiones**

Este ajuste define la clave del campo extra de usuario (p. ej., «company») que se usará para buscar usuarios y para definir el nombre de la sesión al registrar estudiantes desde /admin-dashboard/register.

### `teacher_can_select_course_template`

**El profesor puede seleccionar un curso como plantilla**

Permitir elegir un curso como plantilla para el nuevo curso que el profesor está creando

*Predeterminado: `true`*


### `update_student_expiration_x_date`

**Establecer fecha de caducidad en el primer inicio de sesión**

Array que define los «días» y «meses» para establecer la fecha de caducidad de la cuenta cuando el usuario inicia sesión por primera vez.

### `user_edition_extra_field_to_check`

**Establecer un campo extra como disparador para el registro como exalumno**

Indique aquí la etiqueta de un campo extra. Si este campo extra se actualiza para cualquier usuario, se dispara un proceso para comprobar el acceso de este usuario a los cursos con el mismo campo extra indicado.

### `user_number_of_days_for_default_expiration_date_per_role`

**Días de caducidad predeterminados por rol**

Un array de rol => número que representa el número de días que tiene una cuenta antes de caducar, en función del rol.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desactivar la desinscripción del usuario del curso/sesión al desinscribirlo del grupo/clase**

[inferido] Al eliminar un usuario de un grupo/clase, no desinscribirlo automáticamente de los cursos o sesiones asociados.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desactivar la desinscripción del usuario del curso al quitar el curso del grupo/clase**

[inferido] Cuando se quita un curso de un grupo/clase, no desinscribir automáticamente a los usuarios de ese curso.

*Predeterminado: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desactivar la desinscripción del usuario de la sesión al quitar la sesión del grupo/clase**

[inferido] Cuando se quita una sesión de un grupo/clase, no desinscribir automáticamente a los usuarios de esa sesión.

*Predeterminado: `false`*