# Configuración de itinerarios de aprendizaje

Valores predeterminados y comportamiento de la herramienta **Itinerarios de aprendizaje**: inicio automático, vista predeterminada, prerrequisitos, comportamiento de SCORM y similares.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Itinerarios de aprendizaje**. Esta categoría contiene **53 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_all_files_in_lp_export`

**Exportar todos los archivos al exportar un itinerario de aprendizaje**

Al exportar un itinerario de aprendizaje, también se exportarán todos los archivos y carpetas que se encuentren en la misma ruta de un HTML.

*Predeterminado: `false`*


### `allow_htaccess_import_from_scorm`

**Permitir .htaccess de paquetes SCORM**

Normalmente, todos los archivos .htaccess se filtran y se eliminan al importar contenido en Chamilo. Esta función permite importar .htaccess si está presente en un paquete SCORM.

*Predeterminado: `false`*


### `allow_import_scorm_package_in_course_builder`

**Importación de SCORM dentro de la importación de cursos**

Active esta opción para copiar la estructura de directorios de los paquetes SCORM al restaurar un curso (desde la herramienta de mantenimiento de cursos).

*Predeterminado: `false`*


### `allow_lp_chamilo_export`

**Exportar itinerarios de aprendizaje en el formato de copia de seguridad de Chamilo**

Active la posibilidad de exportar cualquiera de sus itinerarios de aprendizaje en un formato de copia de seguridad de curso de Chamilo.

*Predeterminado: `false`*


### `allow_lp_return_link`

**Mostrar el enlace de retorno de los itinerarios de aprendizaje**

Desactive esta opción para ocultar el botón «Volver a la página de inicio» en los itinerarios de aprendizaje.

*Predeterminado: `true`*


### `allow_lp_subscription_to_usergroups`

**Suscripción a itinerarios de aprendizaje para clases**

Active la suscripción a itinerarios de aprendizaje y a categorías de itinerarios de aprendizaje para grupos/clases.

*Predeterminado: `false`*


### `allow_session_lp_category`

**Las categorías de itinerarios de aprendizaje se pueden gestionar en las sesiones**

[inferido] Permita que los estudiantes y los docentes organicen y gestionen los itinerarios de aprendizaje por categorías dentro de los cursos de sesión.

*Predeterminado: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Los docentes pueden acceder a itinerarios de aprendizaje bloqueados**

Los docentes no necesitan completar los itinerarios de aprendizaje para acceder a un itinerario de aprendizaje bloqueado por prerrequisitos.

*Predeterminado: `false`*


### `disable_js_in_lp_view`

**Desactivar JS en la vista de itinerarios de aprendizaje**

Desactive los archivos JS que Chamilo suele añadir a los archivos HTML del itinerario de aprendizaje (al mostrarlos).

*Predeterminado: `false`*


### `disable_my_lps_page`

**Ocultar la página «Mis itinerarios de aprendizaje»**

La página «Mi itinerario de aprendizaje» se añadió en la versión 1.11. Utilice esta opción para ocultarla.

*Predeterminado: `false`*

### `download_files_after_all_lp_finished`

**Botón de descarga tras finalizar los itinerarios de aprendizaje**

Mostrar el botón de descarga de archivos después de finalizar todos los itinerarios de aprendizaje. Ejemplo: si ABC es el código del curso y 1 y 100 son los identificadores de documento, elija: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edición de pruebas incluidas en itinerarios de aprendizaje**

Active la edición de pruebas incluso si se han incluido en un itinerario de aprendizaje. El valor predeterminado es impedir la edición si la prueba está en un itinerario de aprendizaje, porque eso puede afectar a la coherencia del seguimiento entre muchos estudiantes si las modificaciones de la prueba son significativas.

*Predeterminado: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar la etiqueta de requisitos en los itinerarios de aprendizaje**

Oculte la información emergente de prerrequisitos en los elementos del itinerario de aprendizaje. Se trata principalmente de una elección estética.

*Predeterminado: `true`*

### `hide_lp_time`

**Ocultar el tiempo de los registros de itinerarios de aprendizaje**

Oculte el tiempo dedicado a los itinerarios de aprendizaje en los informes en general.

*Predeterminado: `false`*

### `hide_scorm_copy_link`

**Ocultar la copia de SCORM**

Oculte el icono de copia del itinerario de aprendizaje de la lista de itinerarios de aprendizaje.

*Predeterminado: `false`*

### `hide_scorm_export_link`

**Ocultar la exportación de SCORM**

Oculte el icono de exportación de SCORM de la lista de itinerarios de aprendizaje.

*Predeterminado: `false`*

### `hide_scorm_pdf_link`

**Ocultar la exportación a PDF del itinerario de aprendizaje**

Oculte el icono de exportación a PDF del itinerario de aprendizaje de la lista de itinerarios de aprendizaje.

*Predeterminado: `true`*

### `lp_allow_export_to_students`

**Los estudiantes pueden exportar itinerarios de aprendizaje**

Active esta opción para permitir que los estudiantes descarguen los itinerarios de aprendizaje como paquetes SCORM.

*Predeterminado: `false`*

### `lp_default_visibility_can_be_modified_in_course` **v3**

**La visibilidad predeterminada de los nuevos itinerarios de aprendizaje se puede cambiar por curso**

Cuando está activada, los docentes pueden elegir en la configuración del curso la visibilidad asignada a los nuevos itinerarios de aprendizaje de su curso, en lugar del valor predeterminado de la plataforma.

*Predeterminado: `false`*

Cuando esta opción está activada, aparece una opción **Visibilidad predeterminada para los nuevos itinerarios de aprendizaje** en la sección **Configuración de itinerarios de aprendizaje** de la configuración del curso. Un curso que no haya elegido un valor utiliza `lp_default_visibility_on_creation`.

### `lp_default_visibility_on_creation` **v3**

**Visibilidad predeterminada de las nuevas lecciones**

Visibilidad asignada a una nueva lección cuando un docente la crea en un curso. Los docentes pueden cambiar posteriormente la visibilidad de cada una.

*Predeterminado: `invisible`*

### `lp_enable_flow`

**Navegar entre lecciones**

Añade la posibilidad de seleccionar una lección «siguiente» y mostrar botones dentro de la lección para pasar de una a la siguiente.

*Predeterminado: `false`*

### `lp_fixed_encoding`

**Codificación fija en la lección**

Reduce el uso de recursos al omitir una comprobación de la codificación del texto en las lecciones importadas.

*Predeterminado: `false`*

### `lp_item_prerequisite_dates`

**Prerrequisitos de elementos de lección basados en fechas**

Añade la opción de definir prerrequisitos con fechas de inicio y fin para los elementos de la lección.

*Predeterminado: `false`*

### `lp_menu_location`

**Ubicación del menú de la lección**

Establezca este valor en 'left' o 'right' para cambiar el lado del menú de la lección.

*Predeterminado: `left`*

### `lp_minimum_time`

**Tiempo mínimo para completar la lección**

Añade un campo de tiempo mínimo a las lecciones. Si el usuario no ha dedicado ese tiempo a la lección, no se puede completar el último elemento de la lección.

*Predeterminado: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear el elemento de la lección si se alcanza el máximo de intentos del prerrequisito de examen**

[inferido] Desbloquea automáticamente los elementos posteriores de la lección cuando un estudiante agota el máximo de intentos de un examen prerrequisito.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear prerrequisitos tras el último intento del examen**

Permite a los usuarios continuar en una lección después de utilizar todos los intentos de un examen usado como prerrequisito de otros elementos.

*Predeterminado: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar la última puntuación en los prerrequisitos de examen de la lección**

Cuando un examen se usa como prerrequisito de un elemento de la lección, utiliza únicamente el último intento del examen como validación del prerrequisito (de forma predeterminada se usa el mejor intento).

*Predeterminado: `false`*

### `lp_prevents_beforeunload`

**Impedir el evento JS beforeunload en la lección**

Esto mejora la compatibilidad con el navegador al impedir que se ejecuten eventos JS problemáticos.

*Predeterminado: `false`*

### `lp_score_as_progress_enable`

**Usar la puntuación de la lección como progreso**

Esto es útil al usar contenido SCORM con un único SCO de gran tamaño. SCORM no comunica el progreso, por lo que este es un recurso para usar la puntuación como progreso. Al activar esta opción podrá configurarla para cada lección.

*Predeterminado: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar el progreso máximo en lugar del promedio en los informes de lecciones**

[inferido] Calcula el progreso de la lección a partir de la finalización máxima de los elementos en lugar de promediar todos los elementos.

*Predeterminado: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Seleccionar progreso máximo frente a promedio de las lecciones a nivel de curso**

Activa la redefinición del ajuste para mostrar el mejor progreso en lugar de los promedios en los informes de lecciones a nivel de curso.

*Predeterminado: `false`*

### `lp_show_reduced_report`

**Lecciones: mostrar informe reducido**

Dentro de la herramienta de lecciones, cuando un usuario revisa su propio progreso (mediante el icono de estadísticas), muestra una versión abreviada (menos detallada) del informe de progreso.

*Predeterminado: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostrar la disponibilidad de la lección a los estudiantes**

Muestra las lecciones a los estudiantes con sus fechas de disponibilidad, en lugar de ocultarlas hasta que llegue la fecha.

*Predeterminado: `false`*

### `lp_subscription_settings`

**Ajustes de suscripción a las lecciones**

Configura opciones adicionales de la función de suscripción a las lecciones. Las opciones incluyen 'allow_add_users_to_lp' y 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Elementos plegables de las lecciones**

[inferido] Muestra los elementos de la lección en formato de acordeón plegable para mejorar la navegación y la organización del contenido.

*Predeterminado: `false`*

### `lp_view_settings`

**Ajustes de visualización de la lección**

Configura opciones adicionales de la visualización de las lecciones. Las opciones incluyen 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' y 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar un campo adicional como student\_id en la comunicación SCORM**

Indique el nombre del campo adicional que se usará como student_id en toda la comunicación SCORM.

### `scorm_api_username_as_student_id`

**Usar el nombre de usuario como student\_id en la comunicación SCORM**

[inferido] Usa el nombre de usuario del estudiante como identificador de estudiante en la comunicación de la API SCORM en lugar del ID del estudiante.

*Predeterminado: `false`*

### `scorm_lms_update_sco_status_all_time`

**Actualizar el estado del SCO de forma autónoma**

Si el SCO no envía un estado, asumir el control y actualizar el estado según lo que se pueda observar en Chamilo.

*Predeterminado: `false`*

### `scorm_upload_from_cache`

**Cargar SCORM desde el directorio de caché**

Permite a los administradores cargar un paquete SCORM (en formato zip) en el directorio de caché y utilizarlo como origen de importación en la página de carga de SCORM.

*Valor predeterminado: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostrar las pruebas de las rutas de aprendizaje aunque sean invisibles**

Muestra los ejercicios ocultos que se añadieron a una ruta de aprendizaje en la lista de ejercicios. Si nos encontramos en una sesión, la prueba es invisible en el curso base, está incluida en una ruta de aprendizaje y la opción para mostrarla no está establecida específicamente en true, entonces se oculta.

*Valor predeterminado: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostrar las pruebas en la lista de pruebas de la ruta de aprendizaje aunque sean invisibles**

[inferido] Incluye las pruebas ocultas en la lista de pruebas disponibles al visualizar el contenido de la ruta de aprendizaje.

*Valor predeterminado: `false`*

### `show_invisible_exercise_in_lp_toc`

**Pruebas invisibles visibles en las rutas de aprendizaje**

Hace que las pruebas marcadas como «invisibles» en la herramienta de pruebas aparezcan cuando están incluidas en una ruta de aprendizaje.

*Valor predeterminado: `false`*

### `show_invisible_lp_in_course_home`

**Mostrar el enlace a la ruta de aprendizaje en la página de inicio del curso cuando es invisible**

Si una ruta de aprendizaje está configurada como invisible, pero el docente o tutor decidió hacerla disponible desde la página de inicio del curso, esta opción impide que Chamilo oculte el enlace en la página de inicio del curso.

*Valor predeterminado: `false`*

### `show_prerequisite_as_blocked`

**Prerrequisitos de la ruta de aprendizaje**

En las listas de rutas de aprendizaje, muestra un elemento visual para indicar que otras rutas de aprendizaje están actualmente bloqueadas por alguna regla de prerrequisitos.

*Valor predeterminado: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Añadir la columna de adquisición en el seguimiento del estudiante**

Añade una columna a la página de seguimiento del estudiante para mostrar el estado de adquisición de una ruta de aprendizaje por parte de un estudiante.

*Valor predeterminado: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Añadir información de visibilidad de las rutas de aprendizaje en la página de seguimiento del estudiante**

[inferido] Muestra un indicador del estado de visibilidad de las rutas de aprendizaje en la página de seguimiento del progreso del estudiante.

*Valor predeterminado: `false`*

### `student_follow_page_add_LP_subscription_info`

**Información de desbloqueo en la lista de rutas de aprendizaje**

Añade una columna «desbloqueada» en la lista de rutas de aprendizaje si el estudiante está inscrito en la ruta de aprendizaje indicada y tiene acceso a ella.

*Valor predeterminado: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar el signo de porcentaje en el promedio de las pruebas de las rutas de aprendizaje en el seguimiento del estudiante**

Oculta el icono de porcentaje en la indicación «Promedio de las pruebas en las rutas de aprendizaje» del seguimiento de un estudiante.

*Valor predeterminado: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Incluir las rutas de aprendizaje no suscritas en la página de seguimiento del estudiante**

[inferido] Muestra las rutas de aprendizaje en las páginas de progreso aunque los estudiantes no estén inscritos en ellas.

*Valor predeterminado: `false`*

### `ticket_lp_quiz_info_add`

**Añadir información de rutas de aprendizaje y pruebas a los informes de tickets**

[inferido] Incluye información de la ruta de aprendizaje y de las pruebas en los informes de tickets de soporte para un mejor seguimiento de las incidencias.

*Valor predeterminado: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usar el estado del elemento de la ruta de aprendizaje de otras sesiones**

Permite a los usuarios completar los prerrequisitos de una ruta de aprendizaje si el elemento correspondiente ya se completó en otra sesión.

*Valor predeterminado: `false`*