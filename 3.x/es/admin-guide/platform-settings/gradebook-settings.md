# Configuración del libro de calificaciones (evaluaciones)

Valores predeterminados aplicados en toda la herramienta **Libro de calificaciones (evaluaciones)**: visualización de puntuaciones, precisión decimal, umbrales de puntuación para certificados y agregación.

Acceda a estos ajustes en **Administración > Configuración > Libro de calificaciones (evaluaciones)**. Esta categoría contiene **34 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_gradebook_comments`

**Comentarios del libro de calificaciones**

Active los comentarios del libro de calificaciones para que los docentes puedan añadir un comentario sobre el rendimiento global del alumno en este curso. El comentario aparecerá en la exportación PDF del alumno.

*Predeterminado: `false`*


### `allow_gradebook_stats`

**Almacenar en caché los resultados del libro de calificaciones**

Coloque algunos de los cálculos grandes de promedios en campos en caché para los enlaces y las evaluaciones, a fin de aumentar la velocidad (considerablemente). El posible impacto negativo es que puede tardar un tiempo en actualizarse las tablas de resultados del libro de calificaciones.

*Predeterminado: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de insignias del libro de calificaciones**

Genera un bloque en el menú lateral donde se pueden mostrar algunas insignias pendientes de aprobación. Requiere que los libros de calificaciones se listen aquí, por ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de calificación predeterminado**

Este valor se seleccionará de forma predeterminada al crear un curso

### `gradebook_default_weight`

**Peso predeterminado en el libro de calificaciones**

Este peso se usará en todos los cursos de forma predeterminada

*Predeterminado: `100`*

### `gradebook_dependency`

**Dependencias entre libros de calificaciones**

Activa un mecanismo de dependencias entre libros de calificaciones que permite saber qué otros elementos hay que completar primero para finalizar el libro de calificaciones.

*Predeterminado: `false`*


### `gradebook_dependency_mandatory_courses`

**Cursos obligatorios para las dependencias del libro de calificaciones**

Al usar dependencias entre libros de calificaciones, puede elegir una lista de cursos obligatorios que se exigirán antes de aprobar cualquier libro de calificaciones que tenga dependencias.

### `gradebook_detailed_admin_view`

**Mostrar columnas adicionales en el libro de calificaciones**

Muestra columnas adicionales en la vista del alumno del libro de calificaciones con la mejor puntuación de todos los alumnos, la posición relativa del alumno que consulta el informe y la puntuación media de todo el grupo de alumnos.

*Predeterminado: `false`*


### `gradebook_display_extra_stats`

**Estadísticas adicionales del libro de calificaciones**

Añade columnas adicionales al informe principal del libro de calificaciones (1 = ranking, 2 = mejor puntuación, 3 = media).

### `gradebook_enable`

**Activación de la herramienta Evaluaciones**

La herramienta Evaluaciones permite evaluar competencias en su organización fusionando las evaluaciones de actividades presenciales y en línea en informes de rendimiento. ¿Desea activarla?

*Predeterminado: `true`*


### `gradebook_enable_grade_model`

**Activar el modelo de libro de calificaciones**

Permite la creación automática de categorías del libro de calificaciones dentro de un curso en función de los modelos de libro de calificaciones.

*Predeterminado: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Activar competencias por subcategoría del libro de calificaciones**

Las competencias se atribuyen normalmente al completar un libro de calificaciones completo. Al activar esta opción, permite asociar competencias a subsecciones de los libros de calificaciones.

*Predeterminado: `false`*


### `gradebook_flatview_extrafields_columns`

**Campos extra de usuario en la vista plana del libro de calificaciones**

Añade las columnas indicadas (array 'variables') a la tabla principal de resultados del libro de calificaciones.

### `gradebook_hide_graph`

**Ocultar gráficos del libro de calificaciones**

Si su portal tiene recursos limitados, reducir la generación de los gráficos dinámicos del libro de calificaciones, con potencialmente miles de resultados, es una buena opción.

*Predeterminado: `false`*


### `gradebook_hide_link_to_item_for_student`

**Ocultar enlaces a elementos para los alumnos en el libro de calificaciones**

Evita que los alumnos hagan clic en los elementos del libro de calificaciones eliminando los enlaces de los elementos.

*Predeterminado: `false`*


### `gradebook_hide_pdf_report_button`

**Ocultar el botón «descargar informe PDF» del libro de calificaciones**

Elimina el botón de exportación PDF de las vistas del libro de calificaciones para los alumnos.

*Predeterminado: `false`*


### `gradebook_hide_table`

**Ocultar la tabla del libro de calificaciones para los alumnos**

Reduce el tiempo de carga del libro de calificaciones ocultando la tabla de resultados (pero sigue dando acceso a certificados, competencias, etc.).

*Predeterminado: `false`*

### `gradebook_locking_enabled`

**Habilitar el bloqueo de evaluaciones por parte de los profesores**

Una vez activada, esta opción permitirá el bloqueo de cualquier evaluación por parte de los profesores del curso correspondiente. Esto, a su vez, impedirá cualquier modificación de los resultados por parte del profesor dentro de los recursos utilizados en la evaluación: exámenes, itinerarios de aprendizaje, tareas, etc. El único rol autorizado para desbloquear una evaluación bloqueada es el administrador. Se informará al profesor de esta posibilidad. El bloqueo y desbloqueo de los libretos de calificaciones se registrará en el informe de actividades importantes del sistema

*Predeterminado: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir múltiples intentos de evaluación en el libreto de calificaciones**

Permite añadir comentarios a múltiples intentos de evaluación en el libreto de calificaciones y en las tablas de resultados.

*Predeterminado: `false`*


### `gradebook_number_decimals`

**Número de decimales**

Permite establecer el número de decimales permitidos en una puntuación

*Predeterminado: `0`*

### `gradebook_pdf_export_settings`

**Opciones de exportación PDF del libreto de calificaciones**

Modifica la exportación PDF para los alumnos según la configuración proporcionada ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de puntuación de los informes del libreto de calificaciones**

Añade la configuración del estilo de puntuación del libreto de calificaciones en la vista plana. Consulte api.lib.php para encontrar las opciones: ejemplos SCORE_DIV = 1, SCORE_PERCENT = 2, etc

*Predeterminado: `1`*


### `gradebook_score_display_colorsplit`

**Umbral**

El umbral (en %) por debajo del cual las puntuaciones se colorearán de rojo

*Predeterminado: `50`*


### `gradebook_score_display_custom`

**Etiquetado de niveles de competencia**

Marque la casilla para habilitar el etiquetado de niveles de competencia

*Predeterminado: `false`*


### `gradebook_score_display_custom_standalone`

**Visualización personalizada de puntuación en la columna independiente del libreto de calificaciones**

Muestra valores personalizados de nivel de competencia en una columna independiente en la vista plana del libreto de calificaciones cuando se utiliza la visualización personalizada de puntuación.

*Predeterminado: `false`*


### `gradebook_score_display_upperlimit`

**Mostrar el límite superior de la puntuación**

Marque la casilla para mostrar el límite superior de la puntuación

*Predeterminado: `false`*


### `gradebook_use_apcu_cache`

**Usar caché APCu para acelerar el libreto de calificaciones**

Mejora la velocidad al generar los informes de alumnos del libreto de calificaciones mediante la caché Doctrine APCU. APCu es una extensión PHP opcional pero recomendada.

*Predeterminado: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Usar la configuración de las pruebas para la visualización de las calificaciones**

Aplica la configuración de visualización de puntuación de los ejercicios (porcentaje frente a puntos) a las puntuaciones de las categorías en el libreto de calificaciones.

*Predeterminado: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Usar la configuración global de visualización de puntuación en el libreto de calificaciones**

Aplica la configuración global de visualización de puntuación de los ejercicios a los cálculos de la puntuación total en el libreto de calificaciones.

*Predeterminado: `false`*


### `hide_gradebook_percentage_user_result`

**Ocultar el porcentaje en los resultados de mejor/promedio del libreto de calificaciones**

Elimina la visualización del porcentaje de los resultados de mejor/promedio mostrados a los alumnos en el libreto de calificaciones.

*Predeterminado: `true`*


### `my_display_coloring`

**Mostrar colores para las puntuaciones en el libreto de calificaciones**

Habilita la codificación por colores para una mejor visibilidad de las puntuaciones en el libreto de calificaciones.

*Predeterminado: `false`*


### `student_publication_to_take_in_gradebook`

**Tarea considerada para el libreto de calificaciones**

En la herramienta de tareas, los alumnos pueden subir más de un archivo. En caso de que haya más de uno para una misma tarea, ¿cuál debe considerarse al clasificarlos en el libreto de calificaciones? Esto depende de su metodología. Use 'first' para poner el acento en la atención al detalle (como entregar a tiempo y entregar primero el trabajo correcto). Use 'last' para destacar el trabajo colaborativo y adaptativo.

*Predeterminado: `first`*


### `teachers_can_change_grade_model_settings`

**Los profesores pueden cambiar la configuración del modelo del libreto de calificaciones**

Al editar un libreto de calificaciones

*Predeterminado: `true`*


### `teachers_can_change_score_settings`

**Los profesores pueden cambiar la configuración de puntuación del libreto de calificaciones**

Al editar la configuración del libreto de calificaciones

*Predeterminado: `true`*