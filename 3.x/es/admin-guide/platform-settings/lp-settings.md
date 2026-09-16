# Ajustes de itinerarios de aprendizaje

Valores predeterminados y comportamiento de la herramienta **Learning Paths** (itinerarios de aprendizaje): inicio automático, vista predeterminada, prerrequisitos, comportamiento SCORM y similares.

Acceda a estos ajustes en **Administración > Ajustes de configuración > Learning Paths**. Esta categoría contiene **51 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_all_files_in_lp_export`

**Exportar todos los archivos al exportar un itinerario de aprendizaje**

Al exportar un LP, también se exportarán todos los archivos y carpetas que se encuentren en la misma ruta que un HTML.

*Predeterminado: `false`*


### `allow_htaccess_import_from_scorm`

**Permitir .htaccess desde paquetes SCORM**

Normalmente, todos los archivos .htaccess se filtran y se eliminan al importar contenido en Chamilo. Esta función permite importar .htaccess si está presente en un paquete SCORM.

*Predeterminado: `false`*


### `allow_import_scorm_package_in_course_builder`

**Importación SCORM dentro de la importación de cursos**

Permite copiar la estructura de directorios de los paquetes SCORM al restaurar un curso (desde la herramienta de mantenimiento del curso).

*Predeterminado: `false`*


### `allow_lp_chamilo_export`

**Exportar itinerarios de aprendizaje en el formato de copia de seguridad de Chamilo**

Habilita la posibilidad de exportar cualquiera de sus itinerarios de aprendizaje en un formato de copia de seguridad de curso de Chamilo.

*Predeterminado: `false`*


### `allow_lp_return_link`

**Mostrar el enlace de retorno de los itinerarios de aprendizaje**

Desactive esta opción para ocultar el botón «Volver a la página de inicio» en los itinerarios de aprendizaje

*Predeterminado: `true`*


### `allow_lp_subscription_to_usergroups`

**Suscripción a itinerarios de aprendizaje para clases**

Habilita la suscripción a itinerarios de aprendizaje y a categorías de itinerarios de aprendizaje para grupos/clases.

*Predeterminado: `false`*


### `allow_session_lp_category`

**Las categorías de itinerarios de aprendizaje se pueden gestionar en las sesiones**

[inferido] Permite a alumnos e instructores organizar y gestionar los itinerarios de aprendizaje por categorías dentro de los cursos de sesión.

*Predeterminado: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Los profesores pueden acceder a itinerarios de aprendizaje bloqueados**

Los profesores no necesitan completar itinerarios de aprendizaje para acceder a un itinerario bloqueado por prerrequisitos.

*Predeterminado: `false`*


### `disable_js_in_lp_view`

**Desactivar JS en la vista de itinerarios de aprendizaje**

Desactiva los archivos JS que Chamilo suele añadir a los archivos HTML en el itinerario de aprendizaje (al mostrarlos).

*Predeterminado: `false`*


### `disable_my_lps_page`

**Ocultar la página «Mis itinerarios de aprendizaje»**

La página «Mi itinerario de aprendizaje» se añadió en 1.11. Use esta opción para ocultarla.

*Predeterminado: `false`*

### `download_files_after_all_lp_finished`

**Botón de descarga al finalizar los itinerarios de aprendizaje**

Muestra el botón de descarga de archivos después de finalizar todos los LP. Ejemplo: si ABC es el código del curso, y 1 y 100 son los id de documento, elija: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edición de pruebas incluidas en itinerarios de aprendizaje**

Permite editar las pruebas aunque se hayan incluido en un itinerario de aprendizaje. El valor predeterminado es impedir la edición si la prueba está en un itinerario de aprendizaje, porque ello puede afectar a la coherencia del seguimiento entre muchos alumnos si las modificaciones de la prueba son significativas.

*Predeterminado: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar la etiqueta de requisitos en los itinerarios de aprendizaje**

Oculta la información emergente de prerrequisitos en los elementos del itinerario de aprendizaje. Se trata sobre todo de una elección estética.

*Predeterminado: `true`*

### `hide_lp_time`

**Ocultar el tiempo en los registros de itinerarios de aprendizaje**

Oculta el tiempo dedicado a los itinerarios de aprendizaje en los informes en general.

*Predeterminado: `false`*

### `hide_scorm_copy_link`

**Ocultar copia SCORM**

Oculta el icono Copiar itinerario de aprendizaje de la lista de itinerarios de aprendizaje

*Predeterminado: `false`*

### `hide_scorm_export_link`

**Ocultar exportación SCORM**

Oculta el icono Exportar SCORM de la lista de itinerarios de aprendizaje

*Predeterminado: `false`*

### `hide_scorm_pdf_link`

**Ocultar la exportación PDF del itinerario de aprendizaje**

Oculta el icono Exportar PDF del itinerario de aprendizaje de la lista de itinerarios de aprendizaje

*Predeterminado: `true`*

### `lp_allow_export_to_students`

**Los alumnos pueden exportar itinerarios de aprendizaje**

Actívelo para permitir que los alumnos descarguen los itinerarios de aprendizaje como paquetes SCORM.

*Predeterminado: `false`*

### `lp_enable_flow`

**Navegar entre itinerarios de aprendizaje**

Añade la posibilidad de seleccionar un itinerario de aprendizaje «siguiente» y muestra botones dentro del itinerario para pasar de uno al siguiente.

*Predeterminado: `false`*

### `lp_fixed_encoding`

**Codificación fija en el itinerario de aprendizaje**

Reduce el uso de recursos al omitir una comprobación de la codificación de texto en los itinerarios de aprendizaje importados.

*Predeterminado: `false`*

### `lp_item_prerequisite_dates`

**Prerrequisitos de elementos del itinerario de aprendizaje basados en fechas**

Añade la opción de definir prerrequisitos con fechas de inicio y fin para los elementos del itinerario de aprendizaje.

*Predeterminado: `false`*

### `lp_menu_location`

**Ubicación del menú de itinerario de aprendizaje**

Establezca este valor en 'left' o 'right' para cambiar el lado del menú del itinerario de aprendizaje.

*Predeterminado: `left`*

### `lp_minimum_time`

**Tiempo mínimo para completar el itinerario de aprendizaje**

Añade un campo de tiempo mínimo a los itinerarios de aprendizaje. Si el usuario no ha dedicado ese tiempo al itinerario, el último elemento no se puede completar.

*Predeterminado: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear el elemento del itinerario si se alcanza el máximo de intentos del test prerrequisito**

[inferido] Desbloquea automáticamente los elementos posteriores del itinerario de aprendizaje cuando el alumno agota el máximo de intentos de un test usado como prerrequisito.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear prerrequisitos tras el último intento del test**

Permite a los usuarios continuar en un itinerario de aprendizaje después de agotar todos los intentos de un test usado como prerrequisito de otros elementos.

*Predeterminado: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar la última puntuación en los prerrequisitos de tests del itinerario**

Cuando un test se usa como prerrequisito de un elemento del itinerario, usar solo el último intento del test como validación del prerrequisito (el valor predeterminado es usar el mejor intento).

*Predeterminado: `false`*

### `lp_prevents_beforeunload`

**Impedir el evento JS beforeunload en el itinerario de aprendizaje**

Ayuda a la compatibilidad con el navegador al impedir la ejecución de eventos JS problemáticos.

*Predeterminado: `false`*

### `lp_score_as_progress_enable`

**Usar la puntuación del itinerario como progreso**

Resulta útil al usar contenido SCORM con un único SCO grande. SCORM no comunica el progreso, por lo que este es un truco para usar la puntuación como progreso. Al activar esta opción podrá configurarlo por itinerario de aprendizaje.

*Predeterminado: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar el progreso máximo en lugar de la media en los informes de itinerarios**

[inferido] Calcular el progreso del itinerario de aprendizaje según la máxima finalización de elementos en lugar de promediar todos los elementos.

*Predeterminado: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Seleccionar progreso máximo frente a media para itinerarios a nivel de curso**

Permite redefinir el ajuste para mostrar el mejor progreso en lugar de las medias en los informes de itinerarios a nivel de curso.

*Predeterminado: `false`*

### `lp_show_reduced_report`

**Itinerarios de aprendizaje: mostrar informe reducido**

Dentro de la herramienta de itinerarios de aprendizaje, cuando un usuario revisa su propio progreso (mediante el icono de estadísticas), mostrar una versión abreviada (menos detallada) del informe de progreso.

*Predeterminado: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostrar la disponibilidad del itinerario a los alumnos**

Mostrar los itinerarios de aprendizaje a los alumnos con sus fechas de disponibilidad, en lugar de ocultarlos hasta que llegue la fecha.

*Predeterminado: `false`*

### `lp_subscription_settings`

**Ajustes de suscripción a itinerarios de aprendizaje**

Configure opciones adicionales para la función de suscripción a itinerarios de aprendizaje. Las opciones incluyen 'allow_add_users_to_lp' y 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Elementos plegables de los itinerarios de aprendizaje**

[inferido] Mostrar los elementos del itinerario de aprendizaje en formato de acordeón plegable para mejorar la navegación y la organización del contenido.

*Predeterminado: `false`*

### `lp_view_settings`

**Ajustes de visualización del itinerario de aprendizaje**

Configure opciones adicionales para la visualización de los itinerarios de aprendizaje. Las opciones incluyen 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' y 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar un campo extra como student\_id en la comunicación SCORM**

Indique el nombre del campo extra que se usará como student_id en toda la comunicación SCORM.

### `scorm_api_username_as_student_id`

**Usar el nombre de usuario como student\_id en la comunicación SCORM**

[inferido] Usar el nombre de usuario del alumno como identificador de estudiante en la comunicación de la API SCORM en lugar del ID del alumno.

*Predeterminado: `false`*

### `scorm_lms_update_sco_status_all_time`

**Actualizar el estado del SCO de forma autónoma**

Si el SCO no envía un estado, tomar el control y actualizar el estado según lo que se pueda observar en Chamilo.

*Predeterminado: `false`*

### `scorm_upload_from_cache`

**Cargar SCORM desde el directorio de caché**

Permite a los administradores cargar un paquete SCORM (en formato zip) en el directorio de caché y usarlo como origen de importación en la página de carga SCORM.

*Predeterminado: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostrar tests de itinerarios de aprendizaje aunque estén invisibles**

Mostrar ejercicios ocultos que se añadieron a un LP en la lista de ejercicios. Si estamos en una sesión, el test es invisible en el curso base, está incluido en un LP y el ajuste para mostrarlo no está específicamente establecido en verdadero, entonces ocultarlo.

*Predeterminado: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostrar tests en la lista de tests del itinerario aunque estén invisibles**

[inferido] Incluir tests ocultos en la lista de tests disponibles al ver el contenido del itinerario de aprendizaje.

*Predeterminado: `false`*

### `show_invisible_exercise_in_lp_toc`

**Pruebas invisibles visibles en itinerarios de aprendizaje**

Hace que las pruebas marcadas como «invisibles» en la herramienta de pruebas aparezcan cuando se incluyen en un itinerario de aprendizaje.

*Predeterminado: `false`*

### `show_invisible_lp_in_course_home`

**Mostrar el enlace al itinerario de aprendizaje en la página de inicio del curso cuando está invisible**

Si un itinerario de aprendizaje está configurado como invisible pero el profesor/tutor decidió hacerlo disponible desde la página de inicio del curso, esta opción impide que Chamilo oculte el enlace en la página de inicio del curso.

*Predeterminado: `false`*

### `show_prerequisite_as_blocked`

**Prerrequisitos de los itinerarios de aprendizaje**

En las listas de itinerarios de aprendizaje, muestra un elemento visual para indicar que otros itinerarios de aprendizaje están bloqueados actualmente por alguna regla de prerrequisitos.

*Predeterminado: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Añadir columna de adquisición en el seguimiento del alumno**

Añade una columna a la página de seguimiento del alumno para mostrar el estado de adquisición de un itinerario de aprendizaje por parte de un alumno.

*Predeterminado: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Añadir información de visibilidad de los itinerarios de aprendizaje en la página de seguimiento del alumno**

[inferido] Muestra un indicador de estado de visibilidad de los itinerarios de aprendizaje en la página de seguimiento del progreso del alumno.

*Predeterminado: `false`*

### `student_follow_page_add_LP_subscription_info`

**Información de desbloqueo en la lista de itinerarios de aprendizaje**

Esto añade una columna «desbloqueado» en la lista de itinerarios de aprendizaje si el alumno está inscrito en el itinerario de aprendizaje dado y tiene acceso a él.

*Predeterminado: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar el signo de porcentaje en el promedio de pruebas de itinerarios de aprendizaje en el seguimiento del alumno**

Oculta el icono de porcentaje en la indicación «Promedio de pruebas en itinerarios de aprendizaje» en el seguimiento de un estudiante.

*Predeterminado: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Incluir itinerarios de aprendizaje no suscritos en la página de seguimiento del alumno**

[inferido] Muestra los itinerarios de aprendizaje en las páginas de progreso incluso cuando los alumnos no están inscritos en ellos.

*Predeterminado: `false`*

### `ticket_lp_quiz_info_add`

**Añadir información de itinerarios de aprendizaje y pruebas a los informes de tickets**

[inferido] Incluye información de itinerarios de aprendizaje y pruebas en los informes de tickets de soporte para un mejor seguimiento de incidencias.

*Predeterminado: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usar el estado de los elementos del itinerario de aprendizaje de otras sesiones**

Permite a los usuarios completar prerrequisitos en un itinerario de aprendizaje si el elemento correspondiente ya se completó en otra sesión.

*Predeterminado: `false`*