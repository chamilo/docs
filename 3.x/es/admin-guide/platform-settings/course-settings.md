# Configuración de cursos

Valores predeterminados y políticas que se aplican a los cursos en toda la plataforma: visibilidad, derechos de creación, herramientas permitidas, permisos de los alumnos y similares.

Acceda a estos ajustes en **Administración > Configuración > Curso**. Esta categoría contiene **45 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `active_tools_on_create`

**Herramientas activas al crear un curso**

Seleccione las herramientas que estarán *activas* tras la creación de un curso.

*Predeterminado:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Usar categorías de curso de la URL principal**

En configuraciones multi-URL, permite a administradores y profesores asignar categorías de la URL principal a cursos de las URL hijas.

*Predeterminado: `false`*

### `allow_course_theme`

**Permitir temas de curso**

Permite temas gráficos de curso y hace posible cambiar la hoja de estilo usada por un curso a cualquiera de las hojas de estilo disponibles en Chamilo. Cuando un usuario entra en el curso, la hoja de estilo del curso tendrá prioridad sobre la del usuario y sobre la hoja de estilo predeterminada de la plataforma.

*Predeterminado: `true`*

### `allow_public_course_with_no_terms_conditions`

**Acceso a cursos públicos con términos y condiciones**

Con esta opción activada, si un curso tiene visibilidad pública y términos y condiciones, dichos términos se desactivan mientras el curso sea público.

*Predeterminado: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquear el acceso de usuarios autenticados a cursos públicos**

Mostrar solo cursos públicos. No permitir que los usuarios registrados accedan a cursos con visibilidad «abierta» a menos que estén inscritos en cada uno de esos cursos.

*Predeterminado: `false`*

### `breadcrumbs_course_homepage`

**Miga de pan de la página de inicio del curso**

La miga de pan es el sistema de navegación por enlaces horizontales, normalmente en la parte superior izquierda de la página. Esta opción selecciona qué desea que aparezca en la miga de pan de las páginas de inicio de los cursos

*Predeterminado: `course_title`*

### `course_about_teacher_name_hide`

**Ocultar información del profesor en la página de detalles del curso**

En la página de detalles del curso, ocultar la información del profesor.

*Predeterminado: `false`*

### `course_category_code_to_use_as_model`

**Restringir las plantillas de curso a una categoría de curso**

Indique un código de categoría para usarla como plantillas de curso. Solo esos cursos aparecerán en el desplegable al crear un curso, y los usuarios no verán los cursos de esta categoría en el catálogo de cursos.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campos extra que mostrar en la configuración del curso**

Los campos definidos en este array aparecerán en la página de configuración del curso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campos extra que mostrar en el formulario de creación de curso**

Los campos definidos en este array aparecerán como campos adicionales en el formulario de creación de curso.

### `course_creation_donate_link`

**Enlace de donación en la página de creación de curso**

La página a la que debe enlazar el mensaje de donación (URL completa).

### `course_creation_donate_message_show`

**Mostrar mensaje de donación en la página de creación de curso**

Añadir un recuadro de mensaje en la página de creación de curso para los profesores, pidiéndoles que donen al proyecto.

*Predeterminado: `false`*

### `course_creation_form_hide_course_code`

**Quitar el campo de código de curso del formulario de creación**

Si no se indica, el código de curso se genera por defecto a partir del título del curso, así que active esta opción para eliminar por completo el campo de código del formulario de creación de curso.

*Predeterminado: `false`*

### `course_creation_form_set_course_category_mandatory`

**Hacer obligatoria la categoría del curso**

Al crear un curso, hacer que la categoría del curso sea un ajuste obligatorio.

*Predeterminado: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campos extra obligatorios en el formulario de creación de curso**

Los campos definidos en este array serán obligatorios en el formulario de creación de curso.

### `course_creation_splash_screen`

**Pantalla de bienvenida para cursos**

Mostrar una pantalla de bienvenida al crear un curso nuevo.

*Predeterminado: `true`*

### `course_creation_use_template`

**Usar un curso plantilla para los cursos nuevos**

Configure esta opción para utilizar el mismo curso plantilla (identificado por su ID numérico de curso en la base de datos) para todos los cursos nuevos que se creen en la plataforma. Tenga en cuenta que, si no se planifica adecuadamente, este ajuste puede tener un impacto masivo en el uso de espacio. El curso plantilla se utilizará como si el docente hubiera realizado una copia del curso con las herramientas de copia de seguridad del curso, de modo que no se copia contenido de usuarios, solo material del docente. Se aplican el resto de las reglas de copia de seguridad de cursos. Déjelo vacío (o establézcalo en 0) para desactivarlo.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Rellenar previamente los campos del curso con campos del usuario**

Si no está vacío, el proceso de creación de cursos buscará algunos campos en el perfil del usuario y los rellenará automáticamente para el curso. Por ejemplo, un docente especializado en marketing digital podría establecer automáticamente una marca de «marketing digital» en cada curso que cree.

### `course_hide_tools`

**Ocultar herramientas a los docentes**

Marque las herramientas que desea ocultar a los docentes. Esto prohibirá el acceso a la herramienta.

### `course_images_in_courses_list`

**Iconos personalizados de los cursos**

Utilizar las imágenes del curso como icono del curso en las listas de cursos (en lugar del icono predeterminado de pizarra verde).

*Predeterminado: `true`*

### `course_log_default_extra_fields`

**Campos extra de usuario por defecto en la página de estadísticas del curso**

Configure este array con los ID internos de los campos extra que desea mostrar por defecto en la página principal de estadísticas del curso.

### `course_log_hide_columns`

**Ocultar columnas de los registros del curso**

Este array le permite configurar qué columnas ocultar en la página principal de estadísticas del curso y en el informe de tiempo total.

### `course_sequence_valid_only_in_same_session`

**Validar los prerrequisitos solo dentro de la misma sesión**

Cuando está habilitado, un curso se considerará validado solo si se ha superado dentro de la sesión actual. Si está deshabilitado, los cursos superados en otras sesiones también desbloquearán los cursos dependientes.

*Predeterminado: `false`*


### `course_student_info`

**Visualización de la información del estudiante en el curso**

En las páginas «Mis cursos»/«Mis sesiones», mostrar información adicional relativa a la puntuación, el progreso y/o la obtención de certificados por parte del estudiante.

### `course_validation`

**Validación de cursos**

Cuando la función «Validación de cursos» está habilitada, un docente no puede crear un curso por sí solo. Completa una solicitud de curso. El administrador de la plataforma revisa la solicitud y la aprueba o la rechaza.<br />Esta función se basa en el envío automatizado de correo electrónico; configure Chamilo para acceder a un servidor de correo electrónico y para utilizar una cuenta de correo electrónico dedicada.

*Predeterminado: `false`*


### `course_validation_terms_and_conditions_url`

**Validación de cursos: un enlace a los términos y condiciones**

Esta es la URL del documento de «Términos y condiciones» que es válido para realizar una solicitud de curso. Si se establece la dirección aquí, el usuario deberá leer y aceptar estos términos y condiciones antes de enviar una solicitud de curso.<br />Si habilita el módulo de «Términos y condiciones» de Chamilo y desea que se utilice su URL, deje este ajuste vacío.

### `courses_default_creation_visibility`

**Visibilidad predeterminada del curso**

Visibilidad predeterminada del curso al crear un curso nuevo

*Predeterminado: `2`*


### `display_coursecode_in_courselist`

**Mostrar el código en el nombre del curso**

Mostrar el código del curso en la lista de cursos

*Predeterminado: `false`*


### `display_teacher_in_courselist`

**Mostrar al docente en el nombre del curso**

Mostrar al docente en la lista de cursos

*Predeterminado: `true`*


### `enable_tool_introduction`

**Habilitar la introducción de la herramienta**

Habilitar introducciones en la página de inicio de cada herramienta

*Predeterminado: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Mostrar el botón de cancelación de inscripción en «Mis cursos»**

Añadir un botón para cancelar la inscripción en un curso en la página «Mis cursos».

*Predeterminado: `false`*

### `example_material_course_creation`

**Material de ejemplo al crear un curso**

Crear material de ejemplo automáticamente al crear un curso nuevo

*Predeterminado: `true`*


### `hide_course_rating`

**Ocultar la valoración del curso**

La función de valoración del curso aparece por defecto en distintos lugares. Si no la desea, habilite esta opción.

*Predeterminado: `false`*

### `hide_course_sidebar`

**Ocultar el bloque de cursos en la barra lateral**

En las pantallas en las que el menú izquierdo es visible, no mostrar la sección «Cursos».

*Predeterminado: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostrar el marcador de curso compartido en multi-URL**

Añade un icono de enlace a los cursos que se comparten entre URL, para que los usuarios (en particular los docentes) sepan que deben extremar las precauciones al editar el contenido del curso.

*Predeterminado: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostrar solo los cursos en el idioma del usuario**

Si está habilitada, esta opción ocultará todos los cursos que no estén configurados en el idioma del usuario.

*Predeterminado: `false`*

### `profiling_filter_adding_users`

**Filtrar usuarios por campos de perfil al suscribirlos al curso**

Permite a los profesores filtrar a los usuarios según campos extra en la página de suscripción de usuarios a su curso.

*Valor predeterminado: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostrar dependencias en la introducción del curso**

Al usar la secuenciación de recursos con cursos o sesiones, muestra las dependencias del curso en la página de inicio del curso.

*Valor predeterminado: `false`*

### `scorm_cumulative_session_time`

**Tiempo de sesión acumulativo para SCORM**

Cuando está habilitado, el tiempo de sesión de las rutas de aprendizaje SCORM será acumulativo; en caso contrario, solo se contará a partir de la última hora de actualización. Se trata de un ajuste global. Se utiliza al crear una nueva ruta de aprendizaje, pero luego puede redefinirse para cada una.

*Valor predeterminado: `true`*


### `send_email_to_admin_when_create_course`

**Alerta por correo electrónico al crear un curso**

Envía un correo electrónico al administrador de la plataforma cada vez que un profesor crea un curso nuevo

*Valor predeterminado: `false`*


### `show_course_duration`

**Mostrar la duración de los cursos**

Muestra la duración del curso junto al título del curso en el catálogo de cursos y en la lista de cursos.

*Valor predeterminado: `false`*

### `show_navigation_menu`

**Mostrar el menú de navegación del curso**

Muestra un menú de navegación que agiliza el acceso a las herramientas

*Valor predeterminado: `false`*


### `show_toolshortcuts`

**Accesos directos a las herramientas**

¿Mostrar los accesos directos a las herramientas en el banner?

*Valor predeterminado: `false`*

### `student_view_enabled`

**Habilitar la vista de alumno**

Habilita la vista de alumno, que permite a un profesor o administrador ver un curso tal como lo vería un alumno

*Valor predeterminado: `true`*


### `view_grid_courses`

**Ver los cursos en un diseño de cuadrícula**

Muestra los cursos en un diseño con varios cursos por línea. En caso contrario, el diseño mostrará un curso por línea.

*Valor predeterminado: `true`*