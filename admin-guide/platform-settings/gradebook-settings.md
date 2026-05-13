# Configuración de la Libreta de Calificaciones (Evaluaciones)

Configuraciones predeterminadas aplicadas a la herramienta **Libreta de Calificaciones (Evaluaciones)** — visualización de puntajes, precisión decimal, umbrales de puntaje para certificados y agregación.

Accede a estas configuraciones en **Administración > Configuraciones de configuración > Libreta de Calificaciones (Evaluaciones)**. Esta categoría contiene **34 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando realices scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_gradebook_comments`

**Comentarios en la libreta de calificaciones**

Habilita los comentarios en la libreta de calificaciones para que los profesores puedan agregar un comentario sobre el desempeño general del estudiante en este curso. El comentario aparecerá en la exportación a PDF para el estudiante.

*Predeterminado: `false`*

### `allow_gradebook_stats`

**Almacenar resultados en caché en la libreta de calificaciones**

Coloca algunos de los cálculos grandes de promedios en campos en caché para los enlaces y evaluaciones, aumentando la velocidad (considerablemente). El impacto negativo potencial es que puede tomar algo de tiempo actualizar las tablas de resultados de la libreta de calificaciones.

*Predeterminado: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de insignias en la libreta de calificaciones**

Genera un bloque dentro del menú lateral donde se pueden mostrar algunas insignias pendientes de aprobación. Requiere que las libretas de calificaciones se listen aquí, por ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de calificación predeterminado**

Este valor se seleccionará de forma predeterminada al crear un curso.

### `gradebook_default_weight`

**Peso predeterminado en la libreta de calificaciones**

Este peso se usará de forma predeterminada en todos los cursos.

*Predeterminado: `100`*

### `gradebook_dependency`

**Dependencias entre libretas de calificaciones**

Habilita un mecanismo de dependencias entre libretas de calificaciones que permite a las personas saber qué otros elementos deben completar primero para finalizar la libreta de calificaciones.

*Predeterminado: `false`*

### `gradebook_dependency_mandatory_courses`

**Cursos obligatorios para dependencias de la libreta de calificaciones**

Al usar dependencias entre libretas de calificaciones, puedes elegir una lista de cursos obligatorios que serán requeridos antes de aprobar cualquier libreta de calificaciones que tenga dependencias.

### `gradebook_detailed_admin_view`

**Mostrar columnas adicionales en la libreta de calificaciones**

Muestra columnas adicionales en la vista de estudiante de la libreta de calificaciones con la mejor puntuación de todos los estudiantes, la posición relativa del estudiante que está viendo el informe y la puntuación promedio de todo el grupo de estudiantes.

*Predeterminado: `false`*

### `gradebook_display_extra_stats`

**Estadísticas adicionales en la libreta de calificaciones**

Agrega columnas adicionales al informe principal de la libreta de calificaciones (1 = clasificación, 2 = mejor puntuación, 3 = promedio).

### `gradebook_enable`

**Activación de la herramienta de evaluaciones**

La herramienta de Evaluaciones te permite evaluar competencias en tu organización al combinar evaluaciones de actividades presenciales y en línea en informes de desempeño. ¿Deseas activarla?

*Predeterminado: `true`*

### `gradebook_enable_grade_model`

**Habilitar modelo de libreta de calificaciones**

Habilita la creación automática de categorías de libreta de calificaciones dentro de un curso dependiendo de los modelos de libreta de calificaciones.

*Predeterminado: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Habilitar habilidades por subcategoría de la libreta de calificaciones**

Normalmente, las habilidades se otorgan por completar una libreta de calificaciones completa. Al habilitar esta opción, permites que las habilidades se asocien a subsecciones de las libretas de calificaciones.

*Predeterminado: `false`*

### `gradebook_flatview_extrafields_columns`

**Campos adicionales de usuario en la vista plana de la libreta de calificaciones**

Agrega las columnas dadas (arreglo de 'variables') a la tabla de resultados principal en la libreta de calificaciones.

### `gradebook_hide_graph`

**Ocultar gráficos de la libreta de calificaciones**

Si tu portal tiene recursos limitados, reducir la generación de gráficos dinámicos de la libreta de calificaciones con potencialmente miles de resultados es una buena opción.

*Predeterminado: `false`*

### `gradebook_hide_link_to_item_for_student`

**Ocultar enlaces a elementos para los estudiantes en la libreta de calificaciones**

Evita que los estudiantes hagan clic en los elementos desde la libreta de calificaciones eliminando los enlaces en los elementos.

*Predeterminado: `false`*

### `gradebook_hide_pdf_report_button`

**Ocultar botón de 'descargar informe PDF' en la libreta de calificaciones**

Elimina el botón de exportación a PDF de las vistas de la libreta de calificaciones para los estudiantes.

*Predeterminado: `false`*

### `gradebook_hide_table`

**Ocultar tabla de la libreta de calificaciones para los estudiantes**

Reduce el tiempo de carga de la libreta de calificaciones ocultando la tabla de resultados (pero aún permitiendo el acceso a certificados, habilidades, etc.).

*Predeterminado: `false`*

---
### `gradebook_locking_enabled`

**Habilitar el bloqueo de evaluaciones por parte de los docentes**

Una vez habilitada, esta opción permitirá el bloqueo de cualquier evaluación por parte de los docentes del curso correspondiente. Esto, a su vez, impedirá cualquier modificación de los resultados por parte del docente dentro de los recursos utilizados en la evaluación: exámenes, rutas de aprendizaje, tareas, etc. El único rol autorizado para desbloquear una evaluación bloqueada es el administrador. El docente será informado de esta posibilidad. El bloqueo y desbloqueo de los libros de calificaciones se registrará en el informe de actividades importantes del sistema.

*Predeterminado: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir múltiples intentos de evaluación en el libro de calificaciones**

Permite agregar comentarios a múltiples intentos de evaluación en el libro de calificaciones y en las tablas de resultados.

*Predeterminado: `false`*

### `gradebook_number_decimals`

**Número de decimales**

Permite establecer el número de decimales permitidos en una puntuación.

*Predeterminado: `0`*

### `gradebook_pdf_export_settings`

**Opciones de exportación a PDF del libro de calificaciones**

Modifica la exportación a PDF para los estudiantes según las configuraciones proporcionadas ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de puntuación en los informes del libro de calificaciones**

Agrega una configuración de estilo de puntuación en el libro de calificaciones en la vista plana. Consulta api.lib.php para encontrar las opciones: ejemplos SCORE_DIV = 1, SCORE_PERCENT = 2, etc.

*Predeterminado: `1`*

### `gradebook_score_display_colorsplit`

**Umbral**

El umbral (en %) por debajo del cual las puntuaciones se colorearán en rojo.

*Predeterminado: `50`*

### `gradebook_score_display_custom`

**Etiquetado de niveles de competencia**

Marca la casilla para habilitar el etiquetado de niveles de competencia.

*Predeterminado: `false`*

### `gradebook_score_display_custom_standalone`

**Visualización de puntuación personalizada en una columna independiente del libro de calificaciones**

Muestra valores de nivel de competencia personalizados en una columna separada en la vista plana del libro de calificaciones cuando se utiliza la visualización de puntuación personalizada.

*Predeterminado: `false`*

### `gradebook_score_display_upperlimit`

**Mostrar límite superior de puntuación**

Marca la casilla para mostrar el límite superior de la puntuación.

*Predeterminado: `false`*

### `gradebook_use_apcu_cache`

**Usar caché APCu para acelerar el libro de calificaciones**

Mejora la velocidad al renderizar los informes de estudiantes en el libro de calificaciones utilizando el caché APCu de Doctrine. APCu es una extensión de PHP opcional pero recomendada.

*Predeterminado: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Usar configuraciones de prueba para la visualización de calificaciones**

Aplica las configuraciones de visualización de puntuación de ejercicios (porcentaje vs. puntos) a las puntuaciones de categorías en el libro de calificaciones.

*Predeterminado: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Usar configuración global de visualización de puntuación en el libro de calificaciones**

Aplica las configuraciones globales de visualización de puntuación de ejercicios a los cálculos de puntuación total en el libro de calificaciones.

*Predeterminado: `false`*

### `hide_gradebook_percentage_user_result`

**Ocultar porcentaje en los resultados de mejor/promedio del libro de calificaciones**

Elimina la visualización de porcentajes de los resultados de puntuación mejor/promedio mostrados a los estudiantes en el libro de calificaciones.

*Predeterminado: `true`*

### `my_display_coloring`

**Mostrar colores para las puntuaciones en el libro de calificaciones**

Habilita la codificación de colores para una mejor visibilidad de las puntuaciones en el libro de calificaciones.

*Predeterminado: `false`*

### `student_publication_to_take_in_gradebook`

**Tarea considerada para el libro de calificaciones**

En la herramienta de tareas, los estudiantes pueden cargar más de un archivo. En caso de que haya más de uno para una sola tarea, ¿cuál debería considerarse al clasificarlos en el libro de calificaciones? Esto depende de tu metodología. Usa 'first' para poner énfasis en la atención al detalle (como entregar a tiempo y manejar el trabajo correcto primero). Usa 'last' para destacar el trabajo colaborativo y adaptativo.

*Predeterminado: `first`*

### `teachers_can_change_grade_model_settings`

**Los docentes pueden cambiar las configuraciones del modelo del libro de calificaciones**

Al editar un libro de calificaciones.

*Predeterminado: `true`*

### `teachers_can_change_score_settings`

**Los docentes pueden cambiar las configuraciones de puntuación del libro de calificaciones**

Al editar las configuraciones del libro de calificaciones.

*Predeterminado: `true`*