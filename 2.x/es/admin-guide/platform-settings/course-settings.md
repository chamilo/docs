# Configuración de Cursos

Valores predeterminados y políticas que se aplican a los cursos en toda la plataforma: visibilidad, derechos de creación, herramientas permitidas, permisos de los estudiantes y similares.

Accede a estas configuraciones en **Administración > Configuraciones de configuración > Curso**. Esta categoría contiene **45 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando hagas scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `active_tools_on_create`

**Herramientas activas al crear un curso**

Selecciona las herramientas que estarán *activas* después de la creación de un curso.

*Predeterminado:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Usar categorías de cursos desde la URL principal**

En configuraciones de múltiples URL, permite a los administradores y profesores asignar categorías de la URL principal a los cursos en las URL secundarias.

*Predeterminado: `false`*

### `allow_course_theme`

**Permitir temas de curso**

Permite temas gráficos para los cursos y hace posible cambiar la hoja de estilo utilizada por un curso a cualquiera de las hojas de estilo disponibles en Chamilo. Cuando un usuario ingresa al curso, la hoja de estilo del curso tendrá prioridad sobre la hoja de estilo personal del usuario y la hoja de estilo predeterminada de la plataforma.

*Predeterminado: `true`*

### `allow_public_course_with_no_terms_conditions`

**Acceder a cursos públicos con términos y condiciones**

Con esta opción habilitada, si un curso tiene visibilidad pública y términos y condiciones, dichos términos se deshabilitan mientras el curso sea público.

*Predeterminado: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquear acceso a cursos públicos para usuarios autenticados**

Solo muestra cursos públicos. No permite a los usuarios registrados acceder a cursos con visibilidad 'abierta' a menos que estén inscritos en cada uno de estos cursos.

*Predeterminado: `false`*

### `breadcrumbs_course_homepage`

**Migas de pan en la página principal del curso**

Las migas de pan son el sistema de navegación de enlaces horizontales que suele estar en la parte superior izquierda de tu página. Esta opción selecciona lo que deseas que aparezca en las migas de pan en las páginas principales de los cursos.

*Predeterminado: `course_title`*

### `course_about_teacher_name_hide`

**Ocultar información del profesor en la página de detalles del curso**

En la página de detalles del curso, oculta la información del profesor.

*Predeterminado: `false`*

### `course_category_code_to_use_as_model`

**Restringir plantillas de curso a una categoría de curso**

Proporciona un código de categoría para usar como plantillas de curso. Solo esos cursos se mostrarán en el menú desplegable al momento de la creación del curso, y los usuarios no verán los cursos de esta categoría en el catálogo de cursos.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campos adicionales para mostrar en la configuración del curso**

Los campos definidos en este arreglo aparecerán en la página de configuración del curso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campos adicionales para mostrar en el formulario de creación de curso**

Los campos definidos en este arreglo aparecerán como campos adicionales en el formulario de creación de curso.

### `course_creation_donate_link`

**Enlace de donación en la página de creación de curso**

La página a la que debe enlazar el mensaje de donación (URL completa).

### `course_creation_donate_message_show`

**Mostrar mensaje de donación en la página de creación de curso**

Añade un cuadro de mensaje en la página de creación de curso para los profesores, pidiéndoles que donen al proyecto.

*Predeterminado: `false`*

### `course_creation_form_hide_course_code`

**Eliminar el campo de código de curso del formulario de creación de curso**

Si no se proporciona, el código del curso se genera de forma predeterminada basado en el título del curso, por lo que habilita esta opción para eliminar completamente el campo de código del formulario de creación de curso.

*Predeterminado: `false`*

### `course_creation_form_set_course_category_mandatory`

**Hacer obligatoria la categoría de curso**

Al crear un curso, haz que la categoría del curso sea una configuración obligatoria.

*Predeterminado: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campos adicionales requeridos en el formulario de creación de curso**

Los campos definidos en este arreglo serán obligatorios en el formulario de creación de curso.

### `course_creation_splash_screen`

**Pantalla de bienvenida para cursos**

Muestra una pantalla de bienvenida al crear un nuevo curso.

*Predeterminado: `true`*

---
### `course_creation_use_template`

**Usar curso plantilla para nuevos cursos**

Configura esta opción para usar el mismo curso plantilla (identificado por su ID numérico de curso en la base de datos) para todos los nuevos cursos que se creen en la plataforma. Ten en cuenta que, si no se planifica adecuadamente, esta configuración podría tener un impacto masivo en el uso del espacio. El curso plantilla se utilizará como si el profesor realizara una copia del curso con las herramientas de respaldo de cursos, por lo que no se copia contenido de los usuarios, solo material del profesor. Se aplican todas las demás reglas de respaldo de cursos. Déjalo vacío (o establece en 0) para desactivar.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Rellenar campos del curso con campos del usuario**

Si no está vacío, el proceso de creación de cursos buscará algunos campos en el perfil del usuario y los autocompletará para el curso. Por ejemplo, un profesor especializado en marketing digital podría establecer automáticamente una bandera de «marketing digital» en cada curso que cree.

### `course_hide_tools`

**Ocultar herramientas a los profesores**

Marca las herramientas que deseas ocultar a los profesores. Esto prohibirá el acceso a la herramienta.

### `course_images_in_courses_list`

**Íconos personalizados de cursos**

Usa imágenes de cursos como ícono del curso en las listas de cursos (en lugar del ícono predeterminado de pizarra verde).

*Predeterminado: `true`*

### `course_log_default_extra_fields`

**Campos adicionales de usuario por defecto en la página de estadísticas del curso**

Configura este arreglo con los ID internos de los campos adicionales que deseas mostrar por defecto en la página principal de estadísticas del curso.

### `course_log_hide_columns`

**Ocultar columnas de los registros del curso**

Este arreglo te permite configurar qué columnas ocultar en la página principal de estadísticas del curso y en el informe de tiempo total.

### `course_sequence_valid_only_in_same_session`

**Validar prerrequisitos solo dentro de la misma sesión**

Cuando está habilitado, un curso se considerará validado solo si se aprueba dentro de la sesión actual. Si está desactivado, los cursos aprobados en otras sesiones también desbloquearán los cursos dependientes.

*Predeterminado: `false`*

### `course_student_info`

**Mostrar información del estudiante en el curso**

En las páginas de ‘Mis cursos’/’Mis sesiones’, muestra información adicional sobre la puntuación, el progreso y/o la obtención de certificados por parte del estudiante.

### `course_validation`

**Validación de cursos**

Cuando la función de 'Validación de cursos' está habilitada, un profesor no puede crear un curso por sí solo. Él/ella completa una solicitud de curso. El administrador de la plataforma revisa la solicitud y la aprueba o la rechaza.<br />Esta función depende de la mensajería automatizada por correo electrónico; configura Chamilo para que acceda a un servidor de correo electrónico y use una cuenta de correo electrónico dedicada.

*Predeterminado: `false`*

### `course_validation_terms_and_conditions_url`

**Validación de cursos - enlace a los términos y condiciones**

Esta es la URL del documento de 'Términos y Condiciones' que es válido para realizar una solicitud de curso. Si la dirección se establece aquí, el usuario debe leer y aceptar estos términos y condiciones antes de enviar una solicitud de curso.<br />Si habilitas el módulo de 'Términos y Condiciones' de Chamilo y deseas que se use su URL, deja esta configuración vacía.

### `courses_default_creation_visibility`

**Visibilidad predeterminada del curso**

Visibilidad predeterminada del curso al crear un nuevo curso.

*Predeterminado: `2`*

### `display_coursecode_in_courselist`

**Mostrar código en el nombre del curso**

Mostrar el código del curso en la lista de cursos.

*Predeterminado: `false`*

### `display_teacher_in_courselist`

**Mostrar profesor en el nombre del curso**

Mostrar el profesor en la lista de cursos.

*Predeterminado: `true`*

### `enable_tool_introduction`

**Habilitar introducción de herramientas**

Habilita introducciones en la página principal de cada herramienta.

*Predeterminado: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Mostrar botón de cancelar inscripción en ‘Mis cursos’**

Añade un botón para cancelar la inscripción de un curso en la página de ‘Mis cursos’.

*Predeterminado: `false`*

### `example_material_course_creation`

**Material de ejemplo al crear un curso**

Crear material de ejemplo automáticamente al crear un nuevo curso.

*Predeterminado: `true`*

### `hide_course_rating`

**Ocultar calificación del curso**

La función de calificación de cursos aparece por defecto en diferentes lugares. Si no la deseas, habilita esta opción.

*Predeterminado: `false`*

### `hide_course_sidebar`

**Ocultar bloque de cursos en la barra lateral**

En pantallas donde el menú izquierdo es visible, no mostrar la sección de «Cursos».

*Predeterminado: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostrar marcador de curso compartido en múltiples URL**

Añade un ícono de enlace a los cursos que se comparten entre URL, para que los usuarios (en particular los profesores) sepan que deben tener especial cuidado al editar el contenido del curso.

*Predeterminado: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostrar solo cursos en el idioma del usuario**

Si está habilitado, esta opción ocultará todos los cursos que no estén configurados en el idioma del usuario.

*Predeterminado: `false`*

---
### `profiling_filter_adding_users`

**Filtrar usuarios por campos de perfil al inscribirse en un curso**

Permite a los profesores filtrar a los usuarios según campos adicionales en la página para inscribir usuarios en su curso.

*Predeterminado: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostrar dependencias en la introducción del curso**

Cuando se utiliza la secuenciación de recursos con cursos o sesiones, muestra las dependencias del curso en la página principal del curso.

*Predeterminado: `false`*


### `scorm_cumulative_session_time`

**Tiempo de sesión acumulativo para SCORM**

Cuando está habilitado, el tiempo de sesión para los itinerarios de aprendizaje SCORM será acumulativo; de lo contrario, solo se contará desde la última actualización. Esta es una configuración global. Se utiliza al crear un nuevo itinerario de aprendizaje, pero luego puede redefinirse para cada uno.

*Predeterminado: `true`*


### `send_email_to_admin_when_create_course`

**Alerta por correo electrónico al crear un curso**

Enviar un correo electrónico al administrador de la plataforma cada vez que un profesor cree un nuevo curso.

*Predeterminado: `false`*


### `show_course_duration`

**Mostrar duración de los cursos**

Mostrar la duración del curso junto al título del curso en el catálogo de cursos y en la lista de cursos.

*Predeterminado: `false`*


### `show_navigation_menu`

**Mostrar menú de navegación del curso**

Mostrar un menú de navegación que facilita el acceso rápido a las herramientas.

*Predeterminado: `false`*


### `show_toolshortcuts`

**Accesos directos a herramientas**

¿Mostrar los accesos directos a las herramientas en el banner?

*Predeterminado: `false`*


### `student_view_enabled`

**Habilitar vista de estudiante**

Habilitar la vista de estudiante, que permite a un profesor o administrador ver un curso como lo vería un estudiante.

*Predeterminado: `true`*


### `view_grid_courses`

**Ver cursos en un diseño de cuadrícula**

Ver los cursos en un diseño con varios cursos por línea. De lo contrario, el diseño mostrará un curso por línea.

*Predeterminado: `true`*