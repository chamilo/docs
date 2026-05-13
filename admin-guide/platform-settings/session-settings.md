# Configuración de Sesiones

Valores predeterminados y comportamiento para las **Sesiones** — ciclo de vida de la sesión, ventanas de acceso para entrenadores, visibilidad de cursos dentro de una sesión y similares.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Sesiones**. Esta categoría contiene **68 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `add_users_by_coach`

**Registrar usuarios por Entrenador**

Los usuarios entrenadores pueden crear usuarios en la plataforma y suscribir usuarios a una sesión.

*Predeterminado: `false`*

### `allow_career_diagram`

**Habilitar diagramas de carreras**

Los diagramas de carreras permiten mostrar diagramas de carreras, habilidades y cursos.

*Predeterminado: `false`*

### `allow_career_users`

**Habilitar diagramas de carreras para usuarios**

Si los diagramas de carreras están habilitados, los usuarios solo pueden verlos (y solo los diagramas que corresponden a sus estudios) si habilita esta opción.

*Predeterminado: `false`*

### `allow_coach_to_edit_course_session`

**Permitir a los entrenadores editar dentro de las sesiones de cursos**

Permitir a los entrenadores editar dentro de las sesiones de cursos.

*Predeterminado: `true`*

### `allow_delete_user_for_session_admin`

**Los administradores de sesión pueden eliminar usuarios**

Los administradores de sesión pueden eliminar usuarios de la plataforma al gestionar sus sesiones.

*Predeterminado: `false`*

### `allow_disable_user_for_session_admin`

**Los administradores de sesión pueden deshabilitar usuarios**

Los administradores de sesión pueden deshabilitar cuentas de usuario para evitar el inicio de sesión mientras se conservan los registros de inscripción en sus sesiones.

*Predeterminado: `false`*

### `allow_edit_tool_visibility_in_session`

**Permitir la edición de visibilidad de herramientas en sesiones**

Cuando se usan sesiones, el comportamiento predeterminado es usar la visibilidad de herramientas definida en el curso base. Esta configuración cambia eso para permitir a los entrenadores en cursos de sesión adaptar las visibilidades de herramientas a sus necesidades.

*Predeterminado: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirigir a la sesión después del registro en la página 'Acerca de' de la sesión**

Redirigir automáticamente a los nuevos usuarios a su página de sesión después de que completen el registro a través de la página Acerca de de una sesión.

*Predeterminado: `false`*

### `allow_search_diagnostic`

**Habilitar diagnóstico de búsqueda de sesiones**

Permitir a los tutores obtener un diagnóstico que les permita buscar las mejores sesiones para los estudiantes.

*Predeterminado: `false`*

### `allow_session_admin_extra_access`

**El administrador de sesión puede acceder a la importación, actualización y exportación masiva de usuarios**

Los administradores de sesión pueden acceder a la funcionalidad de importación, actualización y exportación masiva de usuarios además de sus permisos estándar.

*Predeterminado: `false`*

### `allow_session_admin_login_as_teacher`

**Los administradores de sesión pueden 'iniciar sesión como' profesores**

Los administradores de sesión pueden impersonar cuentas de profesores para previsualizar el contenido del curso y la experiencia del estudiante dentro de sus sesiones.

*Predeterminado: `false`*

### `allow_session_admin_read_careers`

**Los administradores de sesión pueden ver carreras**

[inferido] Los administradores de sesión pueden ver y acceder a las rutas de carrera y flujos de trabajo de promoción vinculados a las sesiones que gestionan.

*Predeterminado: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Permitir a los administradores de sesión ver todas las sesiones**

Cuando esta opción no está habilitada (predeterminada), los administradores de sesión solo pueden ver las sesiones que han creado. Esto es confuso en un entorno abierto donde los administradores de sesión podrían necesitar compartir tiempo de soporte entre dos sesiones.

*Predeterminado: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir copia de sesión a sesión para profesores**

Habilite esta opción para permitir a los profesores copiar su contenido de un curso en una sesión a un curso en otra sesión. Por defecto, esta opción solo está disponible para los administradores de la plataforma.

*Predeterminado: `false`*

### `allow_teachers_to_create_sessions`

**Permitir a los profesores crear sesiones**

Los profesores pueden crear, editar y eliminar sus propias sesiones.

*Predeterminado: `false`*

### `allow_tutors_to_assign_students_to_session`

**Los tutores pueden asignar estudiantes a sesiones**

Cuando está habilitado, los entrenadores/tutores de cursos en sesiones pueden suscribir nuevos usuarios a su sesión. Esta opción de lo contrario solo está disponible para administradores y administradores de sesión.

*Predeterminado: `false`*

### `allow_user_session_collapsable`

**Permitir al usuario colapsar sesiones en Mis sesiones**

Los usuarios pueden colapsar tarjetas o grupos de sesiones en la página Mis sesiones para reducir el desorden visual y mejorar la navegación.

*Predeterminado: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**El profesor del curso base puede ver las tareas de todas las sesiones**

Mostrar todas las publicaciones de los estudiantes (del curso base y de todas las sesiones) en la página work/pending.php del curso base.

*Predeterminado: `false`*

---
### `career_diagram_disclaimer`

**Mostrar un descargo de responsabilidad debajo del diagrama de carrera**

Añade un descargo de responsabilidad debajo del diagrama de carrera. Debe existir una variable de idioma llamada 'Career diagram disclaimer' en tu subidioma.

*Predeterminado: `false`*

### `career_diagram_legend`

**Mostrar una leyenda debajo del diagrama de carrera**

Añade una leyenda de carrera debajo del diagrama de carrera. Debe existir una variable de idioma llamada 'Career diagram legend' en tu subidioma.

*Predeterminado: `false`*

### `courses_list_session_title_link`

**Tipo de enlace para el título de la sesión**

En la página de cursos/sesiones, el título de la sesión puede ser uno de los siguientes: 0 = sin enlace (ocultar el título de la sesión); 1 = enlazar el título a una página especial de la sesión; 2 = enlazar al curso si solo hay un curso; 3 = el título de la sesión hace que la lista de cursos sea plegable; 4 = sin enlace (mostrar el título de la sesión).

*Predeterminado: `1`*

### `default_session_list_view`

**Vista predeterminada de la lista de sesiones**

Selecciona la pestaña predeterminada que deseas ver al abrir la lista de sesiones como administrador.

*Predeterminado: `all`*

### `drh_can_access_all_session_content`

**Directores de recursos humanos acceden a todo el contenido de la sesión**

Si está habilitado, los directores de recursos humanos tendrán acceso a todo el contenido y usuarios de las sesiones que sigan.

*Predeterminado: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Habilitar la copia de contenido específico de la sesión a otra sesión**

Permite la duplicación de recursos que fueron creados en la sesión al duplicar la sesión.

*Predeterminado: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Añadir enlace de restablecimiento de contraseña a la notificación por correo electrónico de suscripción a la sesión**

Incluye un enlace de restablecimiento de contraseña en los correos electrónicos de confirmación de suscripción enviados a los usuarios cuando se inscriben en una sesión.

*Predeterminado: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Añadir nombre de usuario a la notificación por correo electrónico de suscripción a la sesión**

Incluye el nombre de usuario del usuario en los correos electrónicos de confirmación de suscripción enviados cuando se inscriben en una sesión.

*Predeterminado: `false`*

### `enable_auto_reinscription`

**Habilitar reinscripción automática**

Habilita o deshabilita la reinscripción automática cuando la validez del curso expira. También debe activarse el trabajo cron relacionado.

*Predeterminado: `false`*

### `enable_session_replication`

**Habilitar replicación de sesiones**

Habilita o deshabilita la replicación automática de sesiones. También debe activarse el trabajo cron relacionado.

*Predeterminado: `false`*

### `extend_rights_for_coach`

**Ampliar derechos para el entrenador**

Activar esta opción otorgará al entrenador los mismos permisos que al formador en las herramientas de autoría.

*Predeterminado: `false`*

### `hide_courses_in_sessions`

**Ocultar lista de cursos en sesiones**

Al mostrar el bloque de sesión en tu página de cursos, oculta la lista de cursos dentro de esa sesión (solo muéstralos dentro de la pantalla específica de la sesión).

*Predeterminado: `false`*

### `hide_reporting_session_list`

**Ocultar lista de sesiones en la herramienta de informes**

Las sesiones que incluyen el curso se enumeran en la herramienta de informes dentro del propio curso, lo que puede añadir un peso considerable si el mismo curso se usa en cientos de sesiones. Esta opción elimina esa lista.

*Predeterminado: `false`*

### `hide_search_form_in_session_list`

**Ocultar formulario de búsqueda en la lista de sesiones**

Elimina el campo de entrada de búsqueda de la vista de lista de sesiones en la interfaz de administración.

*Predeterminado: `false`*

### `hide_session_graph_in_my_progress`

**Ocultar gráfico de sesión en Mi progreso**

Oculta los gráficos y visualizaciones de progreso de la sesión en la página de Mi progreso en los paneles de control de los estudiantes.

*Predeterminado: `false`*

### `hide_tab_list`

**Ocultar pestañas en la página de la sesión**

Elimina las pestañas de navegación de la página de detalles de la sesión para simplificar la interfaz.

### `limit_session_admin_list_users`

**Los administradores de sesión tienen prohibido acceder a la lista de usuarios**

Impide que los administradores de sesión accedan a la lista global de usuarios en la interfaz de administración.

*Predeterminado: `false`*

### `limit_session_admin_role`

**Limitar permisos de los administradores de sesión**

Si está habilitado, los administradores de sesión solo verán el bloque de Usuarios con la opción 'Añadir usuario' y el bloque de Sesiones con la opción 'Lista de sesiones'.

*Predeterminado: `false`*

### `my_courses_session_order`

**Cambiar el ordenamiento predeterminado de sesiones en Mis sesiones**

Por defecto, las sesiones se ordenan por fecha de inicio. Cambia esto proporcionando un arreglo del tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Ver mis cursos por sesión**

Habilita una página adicional de 'Mis cursos' donde las sesiones aparecen como parte de los cursos, en lugar de lo contrario.

*Predeterminado: `false`*

### `my_progress_session_show_all_courses`

**Mi progreso: mostrar detalles del curso en la sesión**

Muestra todos los detalles de cada curso en la sesión al hacer clic en los detalles de la sesión.

*Predeterminado: `false`*

### `prevent_session_admins_to_manage_all_users`

**Impedir que los administradores de sesión gestionen a todos los usuarios**

Al habilitar esta opción, los administradores de sesión solo podrán ver, en la página de administración, los usuarios que ellos crearon.

*Predeterminado: `false`*

---
### `remove_session_url`

**Ocultar enlace a la página de sesión**

Oculta el enlace a la página de sesión en la lista de sesiones.

*Predeterminado: `false`*

### `session_admins_access_all_content`

**Los administradores de sesión pueden acceder a todo el contenido del curso**

Los administradores de sesión pueden ver todo el contenido del curso dentro de sus sesiones, incluidos los materiales restringidos o archivados.

*Predeterminado: `false`*

### `session_admins_edit_courses_content`

**Los administradores de sesión pueden editar el contenido del curso**

Los administradores de sesión pueden modificar el contenido del curso (documentos, ejercicios, herramientas) en los cursos asignados a sus sesiones.

*Predeterminado: `false`*

### `session_automatic_creation_user_id`

**ID del creador de sesiones creadas automáticamente**

Establece el usuario que se utilizará como creador de las sesiones creadas automáticamente (para evitar asignar todas las sesiones al usuario '1', que a menudo es el administrador del portal).

*Predeterminado: `1`*

### `session_classes_tab_disable`

**Desactivar la pestaña de agregar clase en el curso de sesión para no administradores**

Desactiva la pestaña para agregar clases en el curso de sesión para usuarios que no sean administradores.

*Predeterminado: `false`*

### `session_coach_access_after_duration_end`

**Sesiones por duración siempre disponibles para los tutores**

De lo contrario, los tutores de sesión solo tienen acceso a las sesiones por duración durante el período activo.

*Predeterminado: `false`*

### `session_course_ordering`

**Ordenamiento manual de cursos en sesión**

Habilita esta opción para permitir a los administradores de sesión ordenar manualmente los cursos dentro de una sesión. Si está desactivada, los cursos se ordenan alfabéticamente por título.

*Predeterminado: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitar suscripciones al curso solo a usuarios de la sesión**

Restringe la lista de estudiantes que pueden suscribirse en la sesión del curso. Y desactiva el registro de usuarios en todos los cursos desde la página de Resumen de Sesión.

*Predeterminado: `false`*

### `session_courses_read_only_mode`

**Establecer curso en modo de solo lectura en sesión**

Permite a los profesores establecer algunos cursos en modo de solo lectura cuando se abren a través de sesiones. En las propiedades del curso, marca la opción 'Bloquear curso en sesión'.

*Predeterminado: `false`*

### `session_creation_form_set_extra_fields_mandatory`

**Establecer campos adicionales obligatorios en el formulario de creación de sesión**

Requiere los campos listados durante la creación de la sesión.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Rellenar previamente campos de sesión con campos de usuario**

Arreglo de relaciones entre campos adicionales de usuario y campos adicionales de sesión, para que la sesión pueda ser rellenada previamente con datos que coincidan con los del usuario.

### `session_days_after_coach_access`

**Días de acceso predeterminados para tutores después de la sesión**

Número predeterminado de días que un tutor puede acceder a su sesión después de la fecha oficial de finalización de la sesión.

### `session_days_before_coach_access`

**Días de acceso predeterminados para tutores antes de la sesión**

Número predeterminado de días que un tutor puede acceder a su sesión antes de la fecha oficial de inicio de la sesión.

### `session_import_settings`

**Opciones para la importación de sesiones**

Arreglo de opciones para aplicar como parámetros predeterminados en la importación de sesiones CSV/XML.

### `session_list_order`

**Las sesiones admiten ordenamiento manual**

Habilita el reordenamiento manual de sesiones en la lista de administración de sesiones mediante arrastrar y soltar o un mecanismo similar.

*Predeterminado: `false`*

### `session_list_show_count_users`

**Mostrar número de usuarios en la lista de sesiones**

El administrador puede ver el número de usuarios en cada sesión. Esto agrega peso adicional a la lista de sesiones, por lo que si la usas con frecuencia, considera cuidadosamente si deseas el tiempo de espera adicional.

*Predeterminado: `false`*

### `session_list_view_remaining_days`

**Mostrar días restantes en Mis Sesiones**

Si está habilitado, las fechas de la sesión en la página "Mis Sesiones" serán reemplazadas por el número de días restantes.

*Predeterminado: `false`*

### `session_model_list_field_ordered_by_id`

**Ordenar plantillas de sesión por ID en el formulario de creación de sesión**

Ordena las plantillas de sesión por su ID numérico en el menú desplegable del formulario de creación de sesión en lugar de alfabéticamente por nombre.

*Predeterminado: `false`*

### `session_multiple_subscription_students_list_avoid_emptying`

**Evitar vaciar los usuarios suscritos en la suscripción de sesión**

Cuando se utiliza la suscripción múltiple de estudiantes a una sesión, evita el comportamiento normal que consiste en desuscribir a los usuarios que no están en el panel derecho al hacer clic en enviar. Mantiene a todos los usuarios allí.

*Predeterminado: `false`*

### `show_all_sessions_on_my_course_page`

**Mostrar todas las sesiones en la página 'Mis cursos'**

Si está habilitada, esta opción muestra todas las sesiones del usuario en una vista basada en calendario.

*Predeterminado: `true`*

### `show_session_coach`

**Mostrar tutor de sesión**

Muestra el nombre del tutor global de la sesión en el cuadro de título de la sesión en la lista de cursos.

*Predeterminado: `false`*

### `show_session_data`

**Mostrar título de datos de sesión**

Muestra el comentario de datos de sesión.

*Predeterminado: `false`*

### `show_session_description`

**Mostrar descripción de sesión**

Muestra la descripción de la sesión dondequiera que esta opción esté implementada (páginas de seguimiento de sesiones, etc.).

*Predeterminado: `false`*

---
### `show_simple_session_info`

**Mostrar información simple de la sesión**

Añade el nombre del tutor y las fechas al subtítulo de la sesión en la lista de sesiones.

*Predeterminado: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostrar solo usuarios de sesiones activas en el seguimiento**

Muestra únicamente a los usuarios de sesiones actualmente activas en las vistas de seguimiento y reportes de aprendices.

*Predeterminado: `false`*


### `tracking_columns`

**Personalizar columnas de seguimiento de curso-sesión**

Define un arreglo de columnas para los siguientes informes: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duración de sesiones creadas automáticamente**

Duración (en días) de las sesiones creadas automáticamente para un solo usuario. Después de la expiración, el usuario no puede registrarse en el mismo curso (no se crea otra sesión).

*Predeterminado: `1095`*


### `user_session_display_mode`

**Modo de visualización de Mis Sesiones**

Elige cómo se muestra la página de "Mis Sesiones": como una vista de bloques visuales modernos (tarjetas) o el estilo clásico de lista.

*Predeterminado: `list`*