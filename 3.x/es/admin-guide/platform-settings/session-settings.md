# Configuración de sesiones

Valores predeterminados y comportamiento de las **sesiones**: ciclo de vida de la sesión, ventanas de acceso de los tutores, visibilidad de los cursos dentro de una sesión y aspectos similares.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Sesiones**. Esta categoría contiene **68 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al automatizar mediante la API o cuando necesite modificar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_users_by_coach`

**Permitir que los tutores registren usuarios**

Los tutores pueden crear usuarios en la plataforma e inscribir usuarios en una sesión.

*Valor predeterminado: `false`*

### `allow_career_diagram`

**Habilitar diagramas de carreras**

Los diagramas de carreras permiten mostrar diagramas de carreras, competencias y cursos.

*Valor predeterminado: `false`*


### `allow_career_users`

**Habilitar diagramas de carreras para los usuarios**

Si los diagramas de carreras están habilitados, los usuarios solo pueden verlos (y únicamente los diagramas que correspondan a sus estudios) si activa esta opción.

*Valor predeterminado: `false`*

### `allow_coach_to_edit_course_session`

**Permitir que los tutores editen dentro de las sesiones de curso**

Permitir que los tutores editen dentro de las sesiones de curso

*Valor predeterminado: `true`*

### `allow_delete_user_for_session_admin`

**Los administradores de sesión pueden eliminar usuarios**

Los administradores de sesión pueden eliminar usuarios de la plataforma al gestionar su(s) sesión(es).

*Valor predeterminado: `false`*


### `allow_disable_user_for_session_admin`

**Los administradores de sesión pueden deshabilitar usuarios**

Los administradores de sesión pueden deshabilitar cuentas de usuario para impedir el inicio de sesión, conservando los registros de inscripción en su(s) sesión(es).

*Valor predeterminado: `false`*


### `allow_edit_tool_visibility_in_session`

**Permitir la edición de la visibilidad de las herramientas en las sesiones**

Al utilizar sesiones, el comportamiento predeterminado consiste en usar la visibilidad de las herramientas definida en el curso base. Este ajuste modifica ese comportamiento para permitir que los tutores de los cursos de sesión adapten la visibilidad de las herramientas a sus necesidades.

*Valor predeterminado: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirigir a la sesión tras el registro en la página «Acerca de» de la sesión**

Redirigir automáticamente a los nuevos usuarios a la página de su sesión después de completar el registro a través de la página Acerca de de una sesión.

*Valor predeterminado: `false`*


### `allow_search_diagnostic`

**Habilitar el diagnóstico de búsqueda de sesiones**

Permitir que los tutores obtengan un diagnóstico que les permita buscar las mejores sesiones para los estudiantes.

*Valor predeterminado: `false`*


### `allow_session_admin_extra_access`

**El administrador de sesión puede acceder a la importación, actualización y exportación masiva de usuarios**

Los administradores de sesión pueden acceder a la funcionalidad de importación, actualización y exportación masiva de usuarios, además de sus permisos habituales.

*Valor predeterminado: `false`*


### `allow_session_admin_login_as_teacher`

**Los administradores de sesión pueden «iniciar sesión como» docentes**

Los administradores de sesión pueden suplantar cuentas de docentes para previsualizar el contenido del curso y la experiencia del estudiante dentro de su(s) sesión(es).

*Valor predeterminado: `false`*


### `allow_session_admin_read_careers`

**Los administradores de sesión pueden ver las carreras**

[inferido] Los administradores de sesión pueden ver y acceder a las trayectorias de carrera y a los flujos de trabajo de promoción vinculados a las sesiones que gestionan.

*Valor predeterminado: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Permitir que los administradores de sesión vean todas las sesiones**

Cuando esta opción no está habilitada (valor predeterminado), los administradores de sesión solo pueden ver las sesiones que han creado. Esto resulta confuso en un entorno abierto en el que los administradores de sesión podrían necesitar compartir el tiempo de soporte entre dos sesiones.

*Valor predeterminado: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir la copia de sesión a sesión para los docentes**

Active esta opción para permitir que los docentes copien su contenido de un curso de una sesión a un curso de otra sesión. De forma predeterminada, esta opción solo está disponible para los administradores de la plataforma.

*Valor predeterminado: `false`*

### `allow_teachers_to_create_sessions`

**Permitir que los docentes creen sesiones**

Los docentes pueden crear, editar y eliminar sus propias sesiones.

*Valor predeterminado: `false`*

### `allow_tutors_to_assign_students_to_session`

**Los tutores pueden asignar estudiantes a las sesiones**

Cuando está habilitada, los tutores de curso en las sesiones pueden inscribir nuevos usuarios en su sesión. De lo contrario, esta opción solo está disponible para los administradores y los administradores de sesión.

*Valor predeterminado: `false`*

### `allow_user_session_collapsable`

**Permitir que el usuario contraiga las sesiones en Mis sesiones**

Los usuarios pueden contraer las tarjetas o los grupos de sesiones en la página Mis sesiones para reducir la saturación visual y mejorar la navegación.

*Valor predeterminado: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**El docente del curso base puede ver las tareas de todas las sesiones**

Mostrar todas las publicaciones de los estudiantes (del curso base y de todas las sesiones) en la página work/pending.php del curso base.

*Valor predeterminado: `false`*

### `career_diagram_disclaimer`

**Mostrar un aviso legal debajo del diagrama de carrera**

Añade un aviso legal debajo del diagrama de carrera. Debe existir una variable de idioma llamada «Career diagram disclaimer» en su subidioma.

*Valor predeterminado: `false`*

### `career_diagram_legend`

**Mostrar una leyenda debajo del diagrama de carrera**

Añade una leyenda de carrera debajo del diagrama de carrera. Debe existir una variable de idioma llamada «Career diagram legend» en su subidioma.

*Valor predeterminado: `false`*

### `courses_list_session_title_link`

**Tipo de enlace para el título de la sesión**

En la página de cursos/sesiones, el título de la sesión puede ser uno de los siguientes: 0 = sin enlace (ocultar el título de la sesión); 1 = enlazar el título a una página especial de la sesión; 2 = enlazar al curso si solo hay un curso; 3 = el título de la sesión hace que la lista de cursos sea plegable; 4 = sin enlace (mostrar el título de la sesión).

*Valor predeterminado: `1`*

### `default_session_list_view`

**Vista predeterminada de la lista de sesiones**

Seleccione la pestaña predeterminada que desea ver al abrir la lista de sesiones como administrador.

*Valor predeterminado: `all`*


### `hrm_can_access_all_session_content`

**Los directores de RR. HH. acceden a todo el contenido de la sesión**

Si está habilitado, los usuarios HRM pueden acceder al contenido y a los usuarios de las sesiones que siguen. La clave heredada `session.drh_can_access_all_session_content` sigue reconociéndose por compatibilidad.

*Valor predeterminado: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Habilitar la copia del contenido específico de la sesión a otra sesión**

Permite duplicar los recursos creados en la sesión al duplicar la sesión.

*Valor predeterminado: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Añadir el enlace de restablecimiento de contraseña a la notificación por correo electrónico de suscripción a la sesión**

Incluye un enlace de restablecimiento de contraseña en los correos electrónicos de confirmación de suscripción enviados a los usuarios cuando se inscriben en una sesión.

*Valor predeterminado: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Añadir el nombre de usuario a la notificación por correo electrónico de suscripción a la sesión**

Incluye el nombre de usuario en los correos electrónicos de confirmación de suscripción enviados cuando se inscriben en una sesión.

*Valor predeterminado: `false`*


### `enable_auto_reinscription`

**Habilitar la reinscripción automática**

Habilita o deshabilita la reinscripción automática cuando caduca la validez del curso. También debe activarse la tarea cron relacionada.

*Valor predeterminado: `false`*


### `enable_session_replication`

**Habilitar la replicación de sesiones**

Habilita o deshabilita la replicación automática de sesiones. También debe activarse la tarea cron relacionada.

*Valor predeterminado: `false`*


### `extend_rights_for_coach`

**Ampliar los derechos de los tutores**

Habilite esta opción para otorgar a los tutores los mismos permisos que a los formadores en las herramientas de autoría.

*Valor predeterminado: `false`*

### `hide_courses_in_sessions`

**Ocultar la lista de cursos en las sesiones**

Al mostrar el bloque de la sesión en la página de cursos, oculta la lista de cursos dentro de esa sesión (solo se muestran en la pantalla específica de la sesión).

*Valor predeterminado: `false`*

### `hide_reporting_session_list`

**Ocultar la lista de sesiones en la herramienta de informes**

Las sesiones que incluyen el curso se enumeran en la herramienta de informes dentro del propio curso, lo que puede añadir un peso considerable si el mismo curso se utiliza en cientos de sesiones. Esta opción elimina esa lista.

*Valor predeterminado: `false`*


### `hide_search_form_in_session_list`

**Ocultar el formulario de búsqueda en la lista de sesiones**

Elimina el campo de entrada de búsqueda de la vista de lista de sesiones en la interfaz de administración.

*Valor predeterminado: `false`*


### `hide_session_graph_in_my_progress`

**Ocultar el gráfico de la sesión en Mi progreso**

Oculta los gráficos y las visualizaciones del progreso de la sesión en la página Mi progreso de los paneles del alumno.

*Valor predeterminado: `false`*


### `hide_tab_list`

**Ocultar las pestañas en la página de la sesión**

Elimina las pestañas de navegación de la página de detalle de la sesión para simplificar la interfaz.

### `limit_session_admin_list_users`

**Los administradores de sesión no pueden acceder a la lista de usuarios**

Impide que los administradores de sesión accedan a la lista global de usuarios en la interfaz de administración.

*Valor predeterminado: `false`*


### `limit_session_admin_role`

**Limitar los permisos de los administradores de sesión**

Si está habilitado, los administradores de sesión solo verán el bloque Usuario con la opción «Añadir usuario» y el bloque Sesiones con la opción «Lista de sesiones».

*Valor predeterminado: `false`*

### `my_courses_session_order`

**Cambiar el orden predeterminado de las sesiones en Mis sesiones**

De forma predeterminada, las sesiones se ordenan por fecha de inicio. Cámbielo proporcionando un array del tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Ver mis cursos por sesión**

Habilita una página adicional «Mis cursos» en la que las sesiones aparecen como parte de los cursos, en lugar de lo contrario.

*Valor predeterminado: `false`*

### `my_progress_session_show_all_courses`

**Mi progreso: mostrar los detalles del curso en la sesión**

Muestra todos los detalles de cada curso de la sesión al hacer clic en los detalles de la sesión.

*Valor predeterminado: `false`*

### `prevent_session_admins_to_manage_all_users`

**Impedir que los administradores de sesión gestionen todos los usuarios**

Al activar esta opción, los administradores de sesión solo podrán ver, en la página de administración, los usuarios que ellos mismos hayan creado.

*Valor predeterminado: `false`*

### `remove_session_url`

**Ocultar el enlace a la página de la sesión**

Oculta el enlace a la página de la sesión en la lista de sesiones.

*Valor predeterminado: `false`*


### `session_admins_access_all_content`

**Los administradores de sesión pueden acceder a todo el contenido del curso**

Los administradores de sesión pueden ver todo el contenido del curso dentro de sus sesiones, incluidos los materiales restringidos o archivados.

*Valor predeterminado: `false`*

### `session_admins_edit_courses_content`

**Los administradores de sesión pueden editar el contenido del curso**

Los administradores de sesión pueden modificar el contenido del curso (documentos, ejercicios, herramientas) en los cursos asignados a sus sesiones.

*Valor predeterminado: `false`*

### `session_automatic_creation_user_id`

**ID del creador de las sesiones creadas automáticamente**

Establece el usuario que se utilizará como creador de las sesiones creadas automáticamente (para evitar asignar cada sesión al usuario «1», que suele ser el administrador del portal).

*Valor predeterminado: `1`*


### `session_classes_tab_disable`

**Desactivar la adición de clases en el curso de la sesión para usuarios no administradores**

Desactiva la pestaña para añadir clases en el curso de la sesión para los usuarios que no son administradores.

*Valor predeterminado: `false`*


### `session_coach_access_after_duration_end`

**Sesiones por duración siempre disponibles para los tutores**

De lo contrario, los tutores de sesión solo tienen acceso a las sesiones por duración durante el periodo de duración activo.

*Valor predeterminado: `false`*


### `session_course_ordering`

**Ordenación manual de los cursos de la sesión**

Active esta opción para permitir que los administradores de sesión ordenen manualmente los cursos dentro de una sesión. Si está desactivada, los cursos se ordenan alfabéticamente por el título del curso.

*Valor predeterminado: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitar las inscripciones al curso solo a los usuarios de la sesión**

Restringe la lista de estudiantes que se pueden inscribir en el curso de la sesión. Además, desactiva el registro de usuarios en todos los cursos desde la página Reanudar sesión.

*Valor predeterminado: `false`*


### `session_courses_read_only_mode`

**Establecer el curso en modo de solo lectura en la sesión**

Permite a los docentes establecer algunos cursos en modo de solo lectura cuando se abren a través de sesiones. En las propiedades del curso, marque la opción «Bloquear curso en la sesión».

*Valor predeterminado: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Establecer campos adicionales obligatorios en el formulario de creación de sesión**

Exige los campos indicados durante la creación de la sesión.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Rellenar previamente los campos de la sesión con campos del usuario**

Matriz de relaciones entre los campos adicionales del usuario y los campos adicionales de la sesión, de modo que la sesión pueda rellenarse previamente con datos que coincidan con los del usuario.

### `session_days_after_coach_access`

**Días de acceso del tutor después de la sesión, por defecto**

Número predeterminado de días durante los cuales un tutor puede acceder a una sesión después de la fecha oficial de finalización de la sesión

### `session_days_before_coach_access`

**Días de acceso del tutor antes de la sesión, por defecto**

Número predeterminado de días durante los cuales un tutor puede acceder a una sesión antes de la fecha oficial de inicio de la sesión

### `session_import_settings`

**Opciones para la importación de sesiones**

Matriz de opciones que se aplicarán como parámetros predeterminados en la importación de sesiones en CSV/XML.

### `session_list_order`

**Las sesiones admiten ordenación manual**

Activa la reordenación manual de las sesiones en la lista de sesiones de administración mediante arrastrar y soltar u otro mecanismo similar.

*Valor predeterminado: `false`*


### `session_list_show_count_users`

**Mostrar el número de usuarios en la lista de sesiones**

El administrador puede ver el número de usuarios de cada sesión. Esto añade una carga adicional a la lista de sesiones, por lo que, si la utiliza con frecuencia, valore con cuidado si desea el tiempo de espera adicional.

*Valor predeterminado: `false`*


### `session_list_view_remaining_days`

**Mostrar los días restantes en Mis sesiones**

Si está activada, las fechas de la sesión en la página «Mis sesiones» se sustituirán por el número de días restantes.

*Valor predeterminado: `false`*

### `session_model_list_field_ordered_by_id`

**Ordenar las plantillas de sesión por id en el formulario de creación de sesión**

[inferido] Ordena las plantillas de sesión por su ID numérico en el menú desplegable del formulario de creación de sesión, en lugar de alfabéticamente por nombre.

*Valor predeterminado: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Evitar vaciar los usuarios inscritos en la inscripción a la sesión**

Al utilizar la inscripción múltiple de estudiantes a una sesión, impide el comportamiento habitual, que consiste en dar de baja a los usuarios que no se encuentran en el panel derecho al hacer clic en enviar. Mantiene allí a todos los usuarios.

*Valor predeterminado: `false`*


### `show_all_sessions_on_my_course_page`

**Mostrar todas las sesiones en la página «Mis cursos»**

Si está activada, esta opción muestra todas las sesiones del usuario en la vista basada en el calendario.

*Valor predeterminado: `true`*


### `show_session_coach`

**Mostrar el tutor de la sesión**

Muestra el nombre del tutor general de la sesión en el recuadro del título de la sesión en la lista de cursos

*Valor predeterminado: `false`*

### `show_session_data`

**Mostrar el título de los datos de la sesión**

Mostrar el comentario de los datos de la sesión

*Valor predeterminado: `false`*

### `show_session_description`

**Mostrar la descripción de la sesión**

Muestra la descripción de la sesión allí donde esta opción esté implementada (páginas de seguimiento de sesiones, etc.).

*Predeterminado: `false`*

### `show_simple_session_info`

**Mostrar información simple de la sesión**

Añade el tutor y las fechas al subtítulo de la sesión en la lista de sesiones.

*Predeterminado: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostrar solo los usuarios de las sesiones activas en el seguimiento**

Muestra únicamente los usuarios de las sesiones actualmente activas en las vistas de seguimiento y de informes de los estudiantes.

*Predeterminado: `false`*


### `tracking_columns`

**Personalizar las columnas de seguimiento de curso-sesión**

Define una matriz de columnas para los siguientes informes: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duración de las sesiones creadas automáticamente**

Duración (en días) de las sesiones de un solo usuario creadas automáticamente. Tras la caducidad, el usuario no puede inscribirse en el mismo curso (no se crea ninguna otra sesión).

*Predeterminado: `1095`*


### `user_session_display_mode`

**Modo de visualización de Mis sesiones**

Elija cómo se muestra la página «Mis sesiones»: como una vista moderna de bloques visuales (tarjetas) o con el estilo clásico de lista.

*Predeterminado: `list`*