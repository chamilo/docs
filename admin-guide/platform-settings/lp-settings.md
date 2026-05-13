# Configuración de Rutas de Aprendizaje

Valores predeterminados y comportamiento de la herramienta **Rutas de Aprendizaje** — inicio automático, vista predeterminada, prerrequisitos, comportamiento de SCORM y similares.

Acceda a estas configuraciones en **Administración > Configuraciones > Rutas de Aprendizaje**. Esta categoría contiene **51 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `add_all_files_in_lp_export`

**Exportar todos los archivos al exportar una ruta de aprendizaje**

Al exportar una ruta de aprendizaje, también se exportarán todos los archivos y carpetas en la misma ruta de un archivo HTML.

*Predeterminado: `false`*

### `allow_htaccess_import_from_scorm`

**Permitir .htaccess de paquetes SCORM**

Normalmente, todos los archivos .htaccess se filtran y eliminan al importar contenido en Chamilo. Esta función permite importar .htaccess si está presente en un paquete SCORM.

*Predeterminado: `false`*

### `allow_import_scorm_package_in_course_builder`

**Importación de SCORM dentro de la importación de cursos**

Habilite esta opción para copiar la estructura de directorios de paquetes SCORM al restaurar un curso (desde la herramienta de mantenimiento de cursos).

*Predeterminado: `false`*

### `allow_lp_chamilo_export`

**Exportar rutas de aprendizaje en formato de respaldo de Chamilo**

Habilite la posibilidad de exportar cualquiera de sus rutas de aprendizaje en un formato de respaldo de curso de Chamilo.

*Predeterminado: `false`*

### `allow_lp_return_link`

**Mostrar enlace de retorno en rutas de aprendizaje**

Deshabilite esta opción para ocultar el botón 'Regresar a la página principal' en las rutas de aprendizaje.

*Predeterminado: `true`*

### `allow_lp_subscription_to_usergroups`

**Suscripción a rutas de aprendizaje para clases**

Habilite la suscripción a rutas de aprendizaje y categorías de rutas de aprendizaje para grupos/clases.

*Predeterminado: `false`*

### `allow_session_lp_category`

**Las categorías de rutas de aprendizaje pueden gestionarse en sesiones**

[inferido] Habilite a los estudiantes y profesores para organizar y gestionar rutas de aprendizaje por categorías dentro de los cursos de sesión.

*Predeterminado: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Los profesores pueden acceder a rutas de aprendizaje bloqueadas**

Los profesores no necesitan completar rutas de aprendizaje para tener acceso a una ruta de aprendizaje bloqueada por prerrequisitos.

*Predeterminado: `false`*

### `disable_js_in_lp_view`

**Deshabilitar JS en la vista de rutas de aprendizaje**

Deshabilite los archivos JS que Chamilo suele agregar a los archivos HTML en la ruta de aprendizaje (mientras se muestran).

*Predeterminado: `false`*

### `disable_my_lps_page`

**Ocultar la página 'Mis rutas de aprendizaje'**

La página 'Mis rutas de aprendizaje' se agregó en la versión 1.11. Use esta opción para ocultarla.

*Predeterminado: `false`*

### `download_files_after_all_lp_finished`

**Botón de descarga después de finalizar rutas de aprendizaje**

Muestra el botón de descarga de archivos después de finalizar todas las rutas de aprendizaje. Ejemplo: si ABC es el código del curso, y 1 y 100 son los identificadores de documentos, elija: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edición de pruebas incluidas en rutas de aprendizaje**

Habilite la edición de pruebas incluso si han sido incluidas en una ruta de aprendizaje. Por defecto, se impide la edición si la prueba está en una ruta de aprendizaje, ya que esto puede afectar la consistencia del seguimiento entre muchos estudiantes si las modificaciones de la prueba son significativas.

*Predeterminado: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar etiqueta de requisitos en rutas de aprendizaje**

Oculta la información sobre prerrequisitos en los elementos de la ruta de aprendizaje. Esto es principalmente una elección estética.

*Predeterminado: `true`*

### `hide_lp_time`

**Ocultar tiempo de rutas de aprendizaje en registros**

Oculta el tiempo invertido en rutas de aprendizaje en los informes en general.

*Predeterminado: `false`*

### `hide_scorm_copy_link`

**Ocultar Copia de SCORM**

Oculta el ícono de Copia de Ruta de Aprendizaje de la lista de Rutas de Aprendizaje.

*Predeterminado: `false`*

### `hide_scorm_export_link`

**Ocultar Exportación de SCORM**

Oculta el ícono de Exportación de SCORM de la lista de Rutas de Aprendizaje.

*Predeterminado: `false`*

### `hide_scorm_pdf_link`

**Ocultar exportación de PDF de Ruta de Aprendizaje**

Oculta el ícono de Exportación de PDF de Ruta de Aprendizaje de la lista de Rutas de Aprendizaje.

*Predeterminado: `true`*

### `lp_allow_export_to_students`

**Los estudiantes pueden exportar rutas de aprendizaje**

Habilite esta opción para permitir que los estudiantes descarguen las rutas de aprendizaje como paquetes SCORM.

*Predeterminado: `false`*

### `lp_enable_flow`

**Navegar entre rutas de aprendizaje**

Agrega la posibilidad de seleccionar una ruta de aprendizaje 'siguiente' y muestra botones dentro de la ruta de aprendizaje para pasar de una a la siguiente.

*Predeterminado: `false`*

### `lp_fixed_encoding`

**Codificación fija en ruta de aprendizaje**

Reduce el uso de recursos al ignorar una verificación de la codificación de texto en las rutas de aprendizaje importadas.

*Predeterminado: `false`*

### `lp_item_prerequisite_dates`

**Prerrequisitos de elementos de ruta de aprendizaje basados en fechas**

Agrega la opción de definir prerrequisitos con fechas de inicio y fin para los elementos de la ruta de aprendizaje.

*Predeterminado: `false`*

---
### `lp_menu_location`

**Ubicación del menú de la ruta de aprendizaje**

Establezca esto en 'left' o 'right' para cambiar el lado del menú de la ruta de aprendizaje.

*Predeterminado: `left`*

### `lp_minimum_time`

**Tiempo mínimo para completar la ruta de aprendizaje**

Añade un campo de tiempo mínimo a las rutas de aprendizaje. Si el usuario no ha pasado ese tiempo en la ruta de aprendizaje, el último elemento de la ruta no puede completarse.

*Predeterminado: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear elemento de la ruta de aprendizaje si se alcanza el máximo de intentos para el examen prerrequisito**

[inferido] Desbloquea automáticamente los elementos posteriores de la ruta de aprendizaje cuando un estudiante agota el máximo de intentos en un examen prerrequisito.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear prerrequisitos después del último intento de examen**

Permite a los usuarios continuar en una ruta de aprendizaje después de usar todos los intentos de un examen utilizado como prerrequisito para otros elementos.

*Predeterminado: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar solo el último intento en los prerrequisitos de examen de la ruta de aprendizaje**

Cuando un examen se utiliza como prerrequisito para un elemento en la ruta de aprendizaje, usa solo el último intento del examen como validación para el prerrequisito (por defecto se usa el mejor intento).

*Predeterminado: `false`*

### `lp_prevents_beforeunload`

**Prevenir evento JS beforeunload en la ruta de aprendizaje**

Esto ayuda con la compatibilidad del navegador al evitar que se ejecuten eventos JS complicados.

*Predeterminado: `false`*

### `lp_score_as_progress_enable`

**Usar la puntuación de la ruta de aprendizaje como progreso**

Esto es útil cuando se usa contenido SCORM con un solo SCO grande. SCORM no comunica el progreso, por lo que este es un truco para usar la puntuación como progreso. Habilitar esta opción le permitirá configurarlo por cada ruta de aprendizaje.

*Predeterminado: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar progreso máximo en lugar de promedio para informes de rutas de aprendizaje**

[inferido] Calcula el progreso de la ruta de aprendizaje basado en la máxima finalización de elementos en lugar de promediar todos los elementos.

*Predeterminado: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Seleccionar progreso máximo frente a promedio para rutas de aprendizaje a nivel de curso**

Habilita la redefinición de la configuración para mostrar el mejor progreso en lugar de promedios en los informes de rutas de aprendizaje a nivel de curso.

*Predeterminado: `false`*

### `lp_show_reduced_report`

**Rutas de aprendizaje: mostrar informe reducido**

Dentro de la herramienta de rutas de aprendizaje, cuando un usuario revisa su propio progreso (a través del ícono de estadísticas), muestra una versión abreviada (menos detallada) del informe de progreso.

*Predeterminado: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostrar disponibilidad de la ruta de aprendizaje a los estudiantes**

Muestra las rutas de aprendizaje a los estudiantes con sus fechas de disponibilidad, en lugar de ocultarlas hasta que llegue la fecha.

*Predeterminado: `false`*

### `lp_subscription_settings`

**Configuraciones de suscripción a rutas de aprendizaje**

Configura opciones adicionales para la función de suscripción a rutas de aprendizaje. Las opciones incluyen 'allow_add_users_to_lp' y 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Elementos de rutas de aprendizaje plegables**

[inferido] Muestra los elementos de la ruta de aprendizaje en formato de acordeón plegable para mejorar la navegación y la organización del contenido.

*Predeterminado: `false`*

### `lp_view_settings`

**Configuraciones de visualización de la ruta de aprendizaje**

Configura opciones adicionales para la visualización de las rutas de aprendizaje. Las opciones incluyen 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' y 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar campo adicional como student_id en la comunicación SCORM**

Proporciona el nombre del campo adicional que se usará como student_id para toda la comunicación SCORM.

### `scorm_api_username_as_student_id`

**Usar nombre de usuario como student_id en la comunicación SCORM**

[inferido] Usa el nombre de usuario del estudiante como identificador de estudiante en la comunicación de la API SCORM en lugar del ID del estudiante.

*Predeterminado: `false`*

### `scorm_lms_update_sco_status_all_time`

**Actualizar estado de SCO de forma autónoma**

Si el SCO no envía un estado, toma el control y actualiza el estado basado en lo que se puede observar en Chamilo.

*Predeterminado: `false`*

### `scorm_upload_from_cache`

**Cargar SCORM desde el directorio de caché**

Permite a los administradores cargar un paquete SCORM (en formato zip) en el directorio de caché y usarlo como fuente de importación en la página de carga de SCORM.

*Predeterminado: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostrar exámenes de rutas de aprendizaje incluso si están invisibles**

Muestra ejercicios ocultos que se agregaron a una ruta de aprendizaje en la lista de ejercicios. Si estamos en una sesión, el examen es invisible en el curso base, está incluido en una ruta de aprendizaje y la configuración para mostrarlo no está específicamente establecida en verdadero, entonces ocúltalo.

*Predeterminado: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostrar exámenes en la lista de exámenes de la ruta de aprendizaje incluso si están invisibles**

[inferido] Incluye exámenes ocultos en la lista de exámenes disponibles al ver el contenido de la ruta de aprendizaje.

*Predeterminado: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Pruebas invisibles visibles en rutas de aprendizaje**

Hacer que las pruebas marcadas como 'invisibles' en la herramienta de pruebas aparezcan cuando se incluyan en una ruta de aprendizaje.

*Predeterminado: `false`*

### `show_invisible_lp_in_course_home`

**Mostrar enlace a ruta de aprendizaje en la página principal del curso cuando está invisible**

Si una ruta de aprendizaje está configurada como invisible pero el profesor/entrenador decidió hacerla disponible desde la página principal del curso, esta opción evita que Chamilo oculte el enlace en la página principal del curso.

*Predeterminado: `false`*

### `show_prerequisite_as_blocked`

**Prerrequisitos de la ruta de aprendizaje**

En las listas de rutas de aprendizaje, mostrar un elemento visual para indicar que otras rutas de aprendizaje están actualmente bloqueadas por alguna regla de prerrequisitos.

*Predeterminado: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Agregar columna de adquisición en el seguimiento del estudiante**

Agregar una columna a la página de seguimiento del estudiante para mostrar el estado de adquisición de un estudiante en una ruta de aprendizaje.

*Predeterminado: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Agregar información de visibilidad para rutas de aprendizaje en la página de seguimiento del estudiante**

Mostrar un indicador de estado de visibilidad para las rutas de aprendizaje en la página de seguimiento del progreso del estudiante.

*Predeterminado: `false`*

### `student_follow_page_add_LP_subscription_info`

**Información de desbloqueo en la lista de rutas de aprendizaje**

Esto agrega una columna de 'desbloqueado' en la lista de rutas de aprendizaje si el estudiante está suscrito a la ruta de aprendizaje dada y tiene acceso a ella.

*Predeterminado: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar el signo de porcentaje en el promedio de pruebas en rutas de aprendizaje en el seguimiento del estudiante**

Oculta el ícono de porcentaje en la indicación de 'Promedio de pruebas en Rutas de Aprendizaje' en el seguimiento de un estudiante.

*Predeterminado: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Incluir rutas de aprendizaje no suscritas en la página de seguimiento del estudiante**

Mostrar rutas de aprendizaje en las páginas de progreso incluso cuando los estudiantes no están suscritos a ellas.

*Predeterminado: `false`*

### `ticket_lp_quiz_info_add`

**Agregar información de rutas de aprendizaje y pruebas al informe de tickets**

Incluir información de rutas de aprendizaje y pruebas en los informes de tickets de soporte para un mejor seguimiento de problemas.

*Predeterminado: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usar el estado de elementos de ruta de aprendizaje de otras sesiones**

Permitir a los usuarios completar prerrequisitos en una ruta de aprendizaje si el elemento correspondiente ya fue completado en otra sesión.

*Predeterminado: `false`*