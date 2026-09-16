# Configuración de sesiones

Valores predeterminados y comportamiento de las **sesiones**: ciclo de vida de la sesión, ventanas de acceso de los tutores, visibilidad de los cursos dentro de una sesión y aspectos similares.

Acceda a estos ajustes en **Administración > Configuración > Sesiones**. Esta categoría contiene **68 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_users_by_coach`

**Permitir que los tutores inscriban usuarios**

Los tutores pueden crear usuarios en la plataforma e inscribir usuarios en una sesión.

*Predeterminado: `false`*

### `allow_career_diagram`

**Activar diagramas de carrera**

Los diagramas de carrera permiten mostrar diagramas de carreras, competencias y cursos.

*Predeterminado: `false`*


### `allow_career_users`

**Activar diagramas de carrera para los usuarios**

Si los diagramas de carrera están activados, los usuarios solo podrán verlos (y únicamente los diagramas que correspondan a sus estudios) si habilita esta opción.

*Predeterminado: `false`*

### `allow_coach_to_edit_course_session`

**Permitir que los tutores editen dentro de las sesiones de curso**

Permitir que los tutores editen dentro de las sesiones de curso

*Predeterminado: `true`*

### `allow_delete_user_for_session_admin`

**Los administradores de sesión pueden eliminar usuarios**

Los administradores de sesión pueden eliminar usuarios de la plataforma al gestionar su(s) sesión(es).

*Predeterminado: `false`*


### `allow_disable_user_for_session_admin`

**Los administradores de sesión pueden desactivar usuarios**

Los administradores de sesión pueden desactivar cuentas de usuario para impedir el inicio de sesión, conservando los registros de inscripción en su(s) sesión(es).

*Predeterminado: `false`*


### `allow_edit_tool_visibility_in_session`

**Permitir la edición de la visibilidad de las herramientas en las sesiones**

Al usar sesiones, el comportamiento predeterminado es utilizar la visibilidad de las herramientas definida en el curso base. Este ajuste lo modifica para permitir que los tutores en los cursos de sesión adapten las visibilidades de las herramientas a sus necesidades.

*Predeterminado: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirigir a la sesión tras el registro en la página «Acerca de» de la sesión**

Redirigir automáticamente a los nuevos usuarios a la página de su sesión después de completar el registro a través de la página Acerca de de una sesión.

*Predeterminado: `false`*


### `allow_search_diagnostic`

**Activar el diagnóstico de búsqueda de sesiones**

Permitir que los tutores obtengan un diagnóstico que les permita buscar las mejores sesiones para los alumnos.

*Predeterminado: `false`*


### `allow_session_admin_extra_access`

**El administrador de sesión puede acceder a la importación, actualización y exportación masiva de usuarios**

Los administradores de sesión pueden acceder a las funciones de importación, actualización y exportación masiva de usuarios, además de sus permisos habituales.

*Predeterminado: `false`*


### `allow_session_admin_login_as_teacher`

**Los administradores de sesión pueden «iniciar sesión como» profesores**

Los administradores de sesión pueden suplantar cuentas de profesor para previsualizar el contenido del curso y la experiencia del estudiante dentro de su(s) sesión(es).

*Predeterminado: `false`*


### `allow_session_admin_read_careers`

**Los administradores de sesión pueden ver las carreras**

[inferido] Los administradores de sesión pueden ver y acceder a los itinerarios de carrera y a los flujos de promoción vinculados a las sesiones que gestionan.

*Predeterminado: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Permitir que los administradores de sesión vean todas las sesiones**

Cuando esta opción no está activada (valor predeterminado), los administradores de sesión solo pueden ver las sesiones que han creado. Esto resulta confuso en un entorno abierto en el que los administradores de sesión podrían necesitar compartir el tiempo de soporte entre dos sesiones.

*Predeterminado: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir la copia de sesión a sesión para los profesores**

Active esta opción para que los profesores copien su contenido de un curso de una sesión a un curso de otra sesión. Por defecto, esta opción solo está disponible para los administradores de la plataforma.

*Predeterminado: `false`*

### `allow_teachers_to_create_sessions`

**Permitir que los profesores creen sesiones**

Los profesores pueden crear, editar y eliminar sus propias sesiones.

*Predeterminado: `false`*

### `allow_tutors_to_assign_students_to_session`

**Los tutores pueden asignar estudiantes a las sesiones**

Cuando está activada, los tutores de curso en las sesiones pueden inscribir nuevos usuarios en su sesión. De lo contrario, esta opción solo está disponible para administradores y administradores de sesión.

*Predeterminado: `false`*

### `allow_user_session_collabsable`

**Permitir que el usuario contraiga las sesiones en Mis sesiones**

Los usuarios pueden contraer tarjetas o grupos de sesiones en la página Mis sesiones para reducir el desorden visual y mejorar la navegación.

*Predeterminado: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**El profesor del curso base puede ver las tareas de todas las sesiones**

Mostrar todas las publicaciones de los alumnos (del curso base y de todas las sesiones) en la página work/pending.php del curso base.

*Predeterminado: `false`*

### `career_diagram_disclaimer`

**Mostrar un descargo de responsabilidad debajo del diagrama de carrera**

Añade un descargo de responsabilidad debajo del diagrama de carrera. Debe existir una variable de idioma llamada 'Career diagram disclaimer' en su subidioma.

*Predeterminado: `false`*

### `career_diagram_legend`

**Mostrar una leyenda debajo del diagrama de carrera**

Añade una leyenda de carrera debajo del diagrama de carrera. Debe existir una variable de idioma llamada 'Career diagram legend' en su subidioma.

*Predeterminado: `false`*

### `courses_list_session_title_link`

**Tipo de enlace para el título de la sesión**

En la página de cursos/sesiones, el título de la sesión puede ser uno de los siguientes: 0 = sin enlace (ocultar el título de la sesión) ; 1 = enlace del título a una página especial de sesión ; 2 = enlace al curso si solo hay un curso ; 3 = el título de la sesión hace plegable la lista de cursos ; 4 = sin enlace (mostrar el título de la sesión).

*Predeterminado: `1`*

### `default_session_list_view`

**Vista predeterminada de la lista de sesiones**

Seleccione la pestaña predeterminada que desea ver al abrir la lista de sesiones como administrador.

*Predeterminado: `all`*


### `drh_can_access_all_session_content`

**Los directores de RR. HH. acceden a todo el contenido de la sesión**

Si está habilitado, los directores de recursos humanos tendrán acceso a todo el contenido y a los usuarios de las sesiones que siguen.

*Predeterminado: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Habilitar la copia de contenido específico de la sesión a otra sesión**

Permite la duplicación de recursos que se crearon en la sesión al duplicar la sesión.

*Predeterminado: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Añadir enlace de restablecimiento de contraseña al correo de notificación de suscripción a la sesión**

Incluye un enlace de restablecimiento de contraseña en los correos de confirmación de suscripción enviados a los usuarios cuando se inscriben en una sesión.

*Predeterminado: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Añadir el nombre de usuario al correo de notificación de suscripción a la sesión**

Incluye el nombre de usuario en los correos de confirmación de suscripción enviados cuando se inscriben en una sesión.

*Predeterminado: `false`*


### `enable_auto_reinscription`

**Habilitar reinscripción automática**

Habilita o deshabilita la reinscripción automática cuando caduca la validez del curso. El trabajo cron relacionado también debe estar activado.

*Predeterminado: `false`*


### `enable_session_replication`

**Habilitar replicación de sesiones**

Habilita o deshabilita la replicación automática de sesiones. El trabajo cron relacionado también debe estar activado.

*Predeterminado: `false`*


### `extend_rights_for_coach`

**Ampliar derechos para tutores**

Habilite esta opción para otorgar a los tutores los mismos permisos que a los formadores en las herramientas de autoría

*Predeterminado: `false`*

### `hide_courses_in_sessions`

**Ocultar la lista de cursos en las sesiones**

Al mostrar el bloque de sesión en su página de cursos, oculta la lista de cursos dentro de esa sesión (solo se muestran dentro de la pantalla específica de la sesión).

*Predeterminado: `false`*

### `hide_reporting_session_list`

**Ocultar la lista de sesiones en la herramienta de informes**

Las sesiones que incluyen el curso se enumeran en la herramienta de informes dentro del propio curso, lo que puede añadir un peso considerable si el mismo curso se usa en cientos de sesiones. Esta opción elimina esa lista.

*Predeterminado: `false`*


### `hide_search_form_in_session_list`

**Ocultar el formulario de búsqueda en la lista de sesiones**

Elimina el campo de entrada de búsqueda de la vista de lista de sesiones en la interfaz de administración.

*Predeterminado: `false`*


### `hide_session_graph_in_my_progress`

**Ocultar el gráfico de sesión en Mi progreso**

Oculta los gráficos y visualizaciones de progreso de la sesión en la página Mi progreso de los paneles del alumno.

*Predeterminado: `false`*


### `hide_tab_list`

**Ocultar pestañas en la página de la sesión**

Elimina las pestañas de navegación de la página de detalle de la sesión para simplificar la interfaz.

### `limit_session_admin_list_users`

**Los administradores de sesión no tienen acceso a la lista de usuarios**

Impide que los administradores de sesión accedan a la lista global de usuarios en la interfaz de administración.

*Predeterminado: `false`*


### `limit_session_admin_role`

**Limitar los permisos de los administradores de sesión**

Si está habilitado, los administradores de sesión solo verán el bloque Usuario con la opción «Añadir usuario» y el bloque Sesiones con la opción «Lista de sesiones».

*Predeterminado: `false`*

### `my_courses_session_order`

**Cambiar el orden predeterminado de las sesiones en Mis sesiones**

De forma predeterminada, las sesiones se ordenan por fecha de inicio. Cámbielo proporcionando un array de tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Ver mis cursos por sesión**

Habilita una página adicional «Mis cursos» en la que las sesiones aparecen como parte de los cursos, en lugar de lo contrario.

*Predeterminado: `false`*

### `my_progress_session_show_all_courses`

**Mi progreso: mostrar detalles del curso en la sesión**

Muestra todos los detalles de cada curso en la sesión al hacer clic en los detalles de la sesión.

*Predeterminado: `false`*


### `prevent_session_admins_to_manage_all_users`

**Impedir que los administradores de sesión gestionen a todos los usuarios**

Al habilitar esta opción, los administradores de sesión solo podrán ver, en la página de administración, los usuarios que ellos crearon.

*Predeterminado: `false`*

### `remove_session_url`

**Ocultar enlace a la página de sesión**

Oculta el enlace a la página de la sesión en la lista de sesiones.

*Predeterminado: `false`*


### `session_admins_access_all_content`

**Los administradores de sesión pueden acceder a todo el contenido del curso**

Los administradores de sesión pueden ver todo el contenido de los cursos dentro de sus sesiones, incluidos materiales restringidos o archivados.

*Predeterminado: `false`*

### `session_admins_edit_courses_content`

**Los administradores de sesión pueden editar el contenido del curso**

Los administradores de sesión pueden modificar el contenido del curso (documentos, ejercicios, herramientas) en los cursos asignados a sus sesiones.

*Predeterminado: `false`*

### `session_automatic_creation_user_id`

**ID del creador de las sesiones creadas automáticamente**

Define el usuario que se usará como creador de las sesiones creadas automáticamente (para evitar asignar cada sesión al usuario «1», que suele ser el administrador del portal).

*Predeterminado: `1`*


### `session_classes_tab_disable`

**Desactivar añadir clase en el curso de sesión para no administradores**

Desactiva la pestaña para añadir clases en el curso de sesión para usuarios que no son administradores.

*Predeterminado: `false`*


### `session_coach_access_after_duration_end`

**Las sesiones por duración siempre disponibles para los tutores**

En caso contrario, los tutores de sesión solo tienen acceso a las sesiones por duración durante la duración activa.

*Predeterminado: `false`*


### `session_course_ordering`

**Ordenación manual de cursos de sesión**

Active esta opción para permitir que los administradores de sesión ordenen manualmente los cursos dentro de una sesión. Si está desactivada, los cursos se ordenan alfabéticamente por el título del curso.

*Predeterminado: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitar las suscripciones al curso solo a usuarios de la sesión**

Restringe la lista de estudiantes que se pueden suscribir en el curso de la sesión. Y desactiva el registro de usuarios en todos los cursos desde la página Resumen de sesión.

*Predeterminado: `false`*


### `session_courses_read_only_mode`

**Establecer el curso en solo lectura en la sesión**

Permite a los profesores establecer algunos cursos en modo de solo lectura cuando se abren a través de sesiones. En las propiedades del curso, marque la opción «Bloquear curso en sesión».

*Predeterminado: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Establecer campos extra obligatorios en el formulario de creación de sesión**

Exige los campos listados durante la creación de la sesión.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Rellenar previamente los campos de sesión con campos de usuario**

Array de relaciones entre campos extra de usuario y campos extra de sesión, de modo que la sesión pueda rellenarse previamente con datos coincidentes con los del usuario.

### `session_days_after_coach_access`

**Días de acceso del tutor por defecto después de la sesión**

Número predeterminado de días que un tutor puede acceder a una sesión después de la fecha oficial de finalización de la sesión

### `session_days_before_coach_access`

**Días de acceso del tutor por defecto antes de la sesión**

Número predeterminado de días que un tutor puede acceder a una sesión antes de la fecha oficial de inicio de la sesión

### `session_import_settings`

**Opciones para la importación de sesiones**

Array de opciones que se aplican como parámetros predeterminados en la importación de sesiones CSV/XML.

### `session_list_order`

**Las sesiones admiten ordenación manual**

Activa la reordenación manual de las sesiones en la lista de sesiones de administración mediante arrastrar y soltar o un mecanismo similar.

*Predeterminado: `false`*


### `session_list_show_count_users`

**Mostrar el número de usuarios en la lista de sesiones**

El administrador puede ver el número de usuarios de cada sesión. Esto añade carga adicional a la lista de sesiones, así que si la usa con frecuencia, considere con cuidado si desea el tiempo de espera extra.

*Predeterminado: `false`*


### `session_list_view_remaining_days`

**Mostrar días restantes en Mis sesiones**

Si está activada, las fechas de sesión en la página «Mis sesiones» se sustituirán por el número de días restantes.

*Predeterminado: `false`*

### `session_model_list_field_ordered_by_id`

**Ordenar plantillas de sesión por id en el formulario de creación de sesión**

[inferido] Ordena las plantillas de sesión por su ID numérico en el desplegable del formulario de creación de sesión en lugar de alfabéticamente por nombre.

*Predeterminado: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Evitar vaciar los usuarios suscritos en la suscripción a la sesión**

Al usar la suscripción múltiple de alumnos a una sesión, evita el comportamiento normal, que consiste en dar de baja a los usuarios que no están en el panel derecho al pulsar enviar. Conserva a todos los usuarios allí.

*Predeterminado: `false`*


### `show_all_sessions_on_my_course_page`

**Mostrar todas las sesiones en la página «Mis cursos»**

Si está activada, esta opción muestra todas las sesiones del usuario en una vista basada en calendario.

*Predeterminado: `true`*


### `show_session_coach`

**Mostrar tutor de sesión**

Muestra el nombre del tutor general de la sesión en el recuadro del título de la sesión en la lista de cursos

*Predeterminado: `false`*

### `show_session_data`

**Mostrar título de datos de sesión**

Mostrar comentario de datos de sesión

*Predeterminado: `false`*

### `show_session_description`

**Mostrar descripción de la sesión**

Muestra la descripción de la sesión allí donde esta opción esté implementada (páginas de seguimiento de sesiones, etc.)

*Predeterminado: `false`*

### `show_simple_session_info`

**Mostrar información simple de la sesión**

Añade el tutor y las fechas al subtítulo de la sesión en la lista de sesiones.

*Valor predeterminado: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostrar solo usuarios de sesiones activas en el seguimiento**

Muestra únicamente a los usuarios de las sesiones actualmente activas en las vistas de seguimiento y de informes del alumno.

*Valor predeterminado: `false`*


### `tracking_columns`

**Personalizar las columnas de seguimiento de curso-sesión**

Define un array de columnas para los siguientes informes: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duración de las sesiones creadas automáticamente**

Duración (en días) de las sesiones de un solo usuario creadas automáticamente. Tras su vencimiento, el usuario no puede inscribirse en el mismo curso (no se crea ninguna otra sesión).

*Valor predeterminado: `1095`*


### `user_session_display_mode`

**Modo de visualización de Mis sesiones**

Elija cómo se muestra la página «Mis sesiones»: como una vista moderna de bloques visuales (tarjetas) o con el estilo clásico de lista.

*Valor predeterminado: `list`*