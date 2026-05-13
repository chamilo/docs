# Configuración de Ejercicios (Pruebas)

Valores predeterminados y comportamiento de la herramienta **Ejercicios (Pruebas)** — visualización de preguntas, puntuación, intentos y similares.

Acceda a estas configuraciones en **Administración > Configuraciones > Ejercicios (Pruebas)**. Esta categoría contiene **63 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `add_exercise_best_attempt_in_report`

**Habilitar la visualización del mejor intento de puntuación**

Proporcione una lista de identificadores de cursos y pruebas que mostrarán el mejor intento de puntuación para cualquier estudiante en los informes.

### `allow_coach_feedback_exercises`

**Permitir a los entrenadores comentar en la revisión de ejercicios**

Permitir a los entrenadores editar comentarios durante la revisión de ejercicios.

*Predeterminado: `true`*

### `allow_edit_exercise_in_lp`

**Permitir a los profesores editar pruebas en rutas de aprendizaje**

Por defecto, Chamilo impide editar pruebas que están incluidas dentro de una ruta de aprendizaje. Esto es para evitar cambios que afecten de manera diferente a los estudiantes (pasados y futuros) en cuanto a los resultados y/o el progreso en la ruta de aprendizaje. Esta opción permite a los profesores omitir esta restricción.

### `allow_exercise_categories`

**Habilitar categorías de pruebas**

Las categorías de pruebas no están habilitadas por defecto porque añaden un nivel de complejidad. Habilite esta función para que aparezcan todos los iconos de gestión relacionados con las categorías de pruebas.

*Predeterminado: `false`*

### `allow_mandatory_question_in_category`

**Habilitar la selección de preguntas obligatorias**

Habilitar la selección de preguntas obligatorias en una prueba cuando se utilizan categorías aleatorias.

*Predeterminado: `false`*

### `allow_notification_setting_per_exercise`

**Configuraciones de notificación de pruebas a nivel de prueba**

Habilitar la configuración de notificaciones de envío de pruebas a nivel de prueba en lugar de a nivel de curso. Si no se define a nivel de prueba, se recurre a las configuraciones a nivel de curso.

*Predeterminado: `false`*

### `allow_quick_question_description_popup`

**Adición rápida de imágenes a preguntas**

Habilitar un icono adicional en la lista de preguntas de la prueba para añadir una imagen como descripción de la pregunta. Esto acelera enormemente la edición de preguntas cuando las preguntas están en el título y la descripción solo incluye una imagen.

*Predeterminado: `false`*

### `allow_quiz_question_feedback`

**Añadir retroalimentación a la pregunta si la respuesta es incorrecta**

Por defecto, Chamilo permite mostrar retroalimentación en cada respuesta de una pregunta. Con esta opción, se crea un campo adicional para proporcionar retroalimentación predefinida a toda la pregunta. Esta retroalimentación solo aparecerá si el usuario responde incorrectamente.

*Predeterminado: `false`*

### `allow_quiz_results_page_config`

**Habilitar la configuración de la página de resultados de pruebas**

Defina un arreglo de configuraciones que desee aplicar a todas las páginas de resultados de pruebas. Las configuraciones pueden ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ y posiblemente más en el futuro. Busque ‘getPageConfigurationAttribute’ en el código para ver qué se está utilizando.

*Predeterminado: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrar botón 'anterior' en la prueba para navegar por las preguntas**

Establezca esto en falso para deshabilitar el botón 'anterior' al responder preguntas en una prueba, obligando así a los usuarios a avanzar siempre.

*Predeterminado: `false`*

### `allow_teacher_comment_audio`

**Retroalimentación de audio para respuestas enviadas**

Permitir a los profesores proporcionar retroalimentación a los usuarios a través de audio (alternativamente al texto) en cada pregunta de una prueba.

*Predeterminado: `true`*

### `allow_time_per_question`

**Habilitar tiempo por pregunta en las pruebas**

Por defecto, solo es posible limitar el tiempo por prueba. Limitarlo por pregunta añade una capa adicional de posibilidades, y puede (con cuidado) combinar ambos.

*Predeterminado: `false`*

### `block_category_questions`

**Bloquear preguntas de categorías anteriores en una prueba**

Al usar esta opción, aparecerá una opción adicional en la configuración de la prueba. Cuando se utiliza una prueba con múltiples categorías de preguntas y se solicita una distribución por categoría, esto permitirá al usuario navegar por las preguntas por categoría. Una vez que se termina una categoría, pasa a la siguiente categoría y no puede regresar a la categoría anterior.

*Predeterminado: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear el envío de notificaciones de pruebas al entrenador general**

Los estudiantes que completan una prueba suelen enviar notificaciones a los entrenadores, incluyendo al entrenador general de la sesión. Habilite esta opción para omitir al entrenador general de estas notificaciones.

*Predeterminado: `false`*

---
### `configure_exercise_visibility_in_course`

**Habilitar para omitir la configuración de ejercicios invisibles en sesión a nivel de curso base**

Permite habilitar la configuración de invisibilidad de ejercicios en sesión en el curso base para anular la configuración global. Si no se establece, se utiliza el parámetro global.

*Predeterminado: `false`*

### `disable_clean_exercise_results_for_teachers`

**Deshabilitar 'limpiar resultados' para profesores**

Desactiva la opción de eliminar resultados de pruebas desde la lista de pruebas. Esto se utiliza a menudo cuando profesores menos cuidadosos gestionan cursos, para evitar errores críticos.

*Predeterminado: `true`*

### `email_alert_manager_on_new_quiz`

**Configuración predeterminada de alerta por correo electrónico para nuevos cuestionarios**

Define si deseas que los gestores de cursos (profesores) sean notificados por correo electrónico cuando un estudiante responde a un cuestionario. Este es el valor predeterminado para todos los cursos nuevos, pero cada profesor puede cambiar esta configuración en su propio curso.

*Predeterminado: `true`*

### `enable_quiz_scenario`

**Habilitar escenario de cuestionario**

Desde aquí podrás crear ejercicios que propongan diferentes preguntas dependiendo de las respuestas del usuario.

*Predeterminado: `true`*

### `exercise_additional_teacher_modify_actions`

**Enlaces adicionales para profesores en la lista de pruebas**

Configura elementos de devolución de llamada para generar nuevos íconos de acción para profesores en el lado derecho de la lista de pruebas, en forma de un arreglo, por ejemplo, ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostrar nombre de usuario en la página de resultados de pruebas**

Muestra el nombre de usuario (en lugar de, o junto con, la información del usuario) en la página de resultados de pruebas.

*Predeterminado: `false`*

### `exercise_category_report_user_extra_fields`

**Agregar campos adicionales de usuario en el informe de categoría de ejercicios**

Define un arreglo con la lista de campos adicionales de usuario para agregar al informe.

### `exercise_category_round_score_in_export`

**Redondear puntuación en exportaciones de pruebas**

Cuando está habilitado, las puntuaciones de las pruebas se redondean al entero más cercano al exportar informes de ejercicios.

*Predeterminado: `false`*

### `exercise_embeddable_extra_types`

**Tipos de preguntas incrustables**

Por defecto, solo las preguntas de respuesta única y múltiple se consideran al decidir si una prueba puede incrustarse en un video o no. Con esta opción, puedes decidir que más tipos de preguntas estén disponibles. Ten en cuenta que no todos los tipos de preguntas se ajustan bien al espacio asignado para videos. Los tipos de preguntas están disponibles en el código en question.class.php.

### `exercise_hide_ip`

**Ocultar IP del usuario en informes de pruebas**

Por defecto, mostramos la información del usuario y su dirección IP, pero esto podría considerarse datos personales, por lo que esta opción te permite eliminar esta información de todos los informes de pruebas.

*Predeterminado: `false`*

### `exercise_hide_label`

**Ocultar cinta de pregunta (correcto/incorrecto) en resultados de pruebas**

En los resultados de pruebas, por defecto aparece una cinta para indicar si la respuesta fue correcta o incorrecta. Habilita esta opción para eliminar la cinta de forma global.

*Predeterminado: `false`*

### `exercise_invisible_in_session`

**Ejercicio invisible en sesión**

Si un ejercicio es visible en el curso base, aparece como invisible en la sesión. Si un ejercicio es invisible en el curso base, no aparece en la sesión.

*Predeterminado: `false`*

### `exercise_max_editors_in_page`

**Máximo de editores en la pantalla de resultados de ejercicios**

Debido a la gran cantidad de preguntas que pueden aparecer en un ejercicio, la pantalla de corrección, que permite al profesor agregar comentarios a cada respuesta, puede ser muy lenta para cargar. Establece este número en 5 para pedirle a la plataforma que solo muestre editores WYSIWYG hasta un cierto número de respuestas en la pantalla. Esto acelerará considerablemente el tiempo de carga de la página de corrección, pero eliminará los editores WYSIWYG y dejará solo un editor de texto simple.

*Predeterminado: `0`*

### `exercise_max_score`

**Puntuación máxima de ejercicios**

Define una puntuación máxima (generalmente 10, 20 o 100) para todos los ejercicios en la plataforma. Esto definirá cómo se muestran los resultados finales a los usuarios y profesores.

*Predeterminado: `20`*

### `exercise_min_score`

**Puntuación mínima de ejercicios**

Define una puntuación mínima (generalmente 0) para todos los ejercicios en la plataforma. Esto definirá cómo se muestran los resultados finales a los usuarios y profesores.

*Predeterminado: `0`*

### `exercise_result_end_text_html_strict_filtering`

**Omitir filtrado HTML en mensajes finales de pruebas**

Considera que los mensajes al final de las pruebas siempre son seguros. Eliminar el filtro hace posible usar JavaScript allí.

*Predeterminado: `false`*

### `exercise_score_format`

**Formato de puntuación de pruebas**

Selecciona entre las siguientes formas para mostrar la puntuación de los usuarios en varios informes: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Usa el ID numérico de la forma que deseas utilizar.

*Predeterminado: `0`*

### `exercises_disable_new_attempts`

**Deshabilitar nuevos intentos de prueba**

Desactiva nuevos intentos de prueba de forma global. Generalmente se usa cuando hay un problema con las pruebas en general y deseas algo de tiempo para analizar sin bloquear toda la plataforma.

*Predeterminado: `false`*

---
### `hide_free_question_score`

**Ocultar la puntuación de preguntas abiertas**

Oculta el hecho de que las preguntas abiertas (incluyendo audio y anotaciones) tienen una puntuación al ocultar la visualización de la puntuación en todos los informes visibles para los estudiantes.

*Predeterminado: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar información del usuario en la página de resultados de la prueba**

La página de resultados de la prueba predeterminada muestra una ficha de datos del usuario (foto, nombre, etc.), lo que, en algunos contextos, podría considerarse como un límite en el tratamiento de datos personales. Habilite esta opción para eliminar los detalles del usuario de los resultados de la prueba.

*Predeterminado: `false`*


### `limit_exercise_teacher_access`

**Limitar los permisos de los profesores sobre las pruebas**

Cuando está habilitado, los profesores no pueden eliminar pruebas ni preguntas, cambiar la visibilidad de las pruebas, descargar a QTI, limpiar resultados, etc.

*Predeterminado: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de pruebas pendientes**

Habilite esta opción para mostrar al usuario final una página con la lista de pruebas pendientes en todos los cursos.

*Predeterminado: `false`*


### `question_exercise_html_strict_filtering`

**Evitar el filtrado HTML en preguntas de prueba**

Considera que el texto de las preguntas en las pruebas siempre es seguro. Eliminar el filtro permite usar JavaScript en ellas.

*Predeterminado: `false`*


### `question_pagination_length`

**Longitud de paginación de preguntas para profesores**

Número de preguntas a mostrar en cada página cuando se utiliza la opción de paginación de preguntas para profesores.

*Predeterminado: `20`*


### `quiz_answer_extra_recording`

**Habilitar grabación adicional de respuestas de prueba**

Habilita la grabación de todas las respuestas (incluso las temporales) en la tabla track_e_attempt_recording. Esta función es experimental y puede causar problemas en las páginas de informes al intentar calificar una prueba.

*Predeterminado: `false`*


### `quiz_check_all_answers_before_end_test`

**Verificar todas las respuestas antes de enviar la prueba**

Muestra una ventana emergente con la lista de preguntas respondidas/no respondidas antes de enviar la prueba.

*Predeterminado: `false`*


### `quiz_check_button_enable`

**Agregar verificación del proceso de guardado de respuestas antes de la prueba**

Asegúrese de que los usuarios estén listos para comenzar la prueba proporcionando una simulación del proceso de guardado de preguntas antes de ingresar a la prueba. Esto permite la detección temprana de algunos problemas de conexión y reduce las fricciones en la experiencia del usuario.

*Predeterminado: `false`*


### `quiz_confirm_saved_answers`

**Agregar casilla de verificación para confirmar el conteo de respuestas**

Esta opción agrega una casilla de verificación al final de cada prueba pidiendo al usuario que confirme el número de respuestas guardadas. Esto proporciona mejores datos de auditoría para pruebas críticas.

*Predeterminado: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar preguntas huérfanas en la exportación de cursos**

Al exportar un curso, no exportar las preguntas que no forman parte de ninguna prueba.

*Predeterminado: `false`*


### `quiz_generate_certificate_ending`

**Generar certificado al finalizar la prueba**

Genera un certificado al finalizar un cuestionario. El cuestionario debe estar vinculado en la herramienta de libro de calificaciones y tener configurado un porcentaje de aprobación.

*Predeterminado: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar tabla de intentos en la página de inicio de la prueba**

Oculta la tabla que muestra todos los intentos anteriores en la página de inicio de la prueba.

*Predeterminado: `false`*


### `quiz_hide_question_number`

**Ocultar número de pregunta**

Oculta la numeración incremental de las preguntas al realizar una prueba.

*Predeterminado: `false`*


### `quiz_image_zoom`

**Habilitar zoom en imágenes de pruebas**

Habilita esta función para permitir a los usuarios hacer zoom en las imágenes utilizadas en las pruebas.


### `quiz_keep_alive_ping_interval`

**Mantener la sesión activa en las pruebas**

Mantiene la sesión activa enviando una señal de ping regular al servidor cada x segundos, definidos aquí. Recomendamos una vez cada 300 segundos.

*Predeterminado: `0`*


### `quiz_open_question_decimal_score`

**Puntuación decimal en tipos de preguntas abiertas**

Permite al profesor calificar los tipos de preguntas abiertas, de expresión oral y de anotación con una puntuación decimal.

*Predeterminado: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar y pegar en las pruebas**

Bloquea las teclas de copiar/pegar/guardar/imprimir y los clics derechos en los ejercicios.

*Predeterminado: `false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Eliminar automáticamente preguntas al eliminar una prueba**

El comportamiento predeterminado es dejar las preguntas huérfanas cuando se elimina la única prueba que las utiliza. Cuando está habilitada, esta opción asegura que todas las preguntas que de otro modo quedarían huérfanas también se eliminen.

*Predeterminado: `false`*


### `quiz_results_answers_report`

**Mostrar enlace para descargar resultados de la prueba**

En la página de resultados de la prueba, muestra un enlace para descargar los resultados como un archivo.

*Predeterminado: `false`*


### `quiz_show_description_on_results_page`

**Mostrar siempre la descripción de la prueba en la página de resultados**

Cuando está habilitado, la descripción de la prueba siempre se muestra en la página de resultados después de completar la prueba.

*Predeterminado: `false`*


### `score_grade_model`

**Modelo de calificaciones por puntuación**

Define un arreglo de rangos de puntuación y colores para mostrar informes utilizando este modelo. Esto permite mostrar colores en lugar de calificaciones numéricas.

---
### `send_score_in_exam_notification_mail_to_manager`

**Agregar puntuación en la notificación por correo electrónico de la entrega de exámenes**

Incluye la puntuación del estudiante en la notificación por correo electrónico enviada al profesor después de que se haya entregado un examen.

*Predeterminado: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar intentos de examen de todas las sesiones en el informe de exámenes pendientes**

Muestra los intentos de examen de los usuarios en todas las sesiones a las que el entrenador general tiene acceso en el informe de exámenes pendientes.

*Predeterminado: `false`*


### `show_exercise_expected_choice`

**Mostrar la opción esperada en los resultados del examen**

Muestra la opción esperada y un estado (correcto/incorrecto) para cada respuesta en la página de resultados del examen (si el examen ha sido configurado para mostrar resultados).

*Predeterminado: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar puntuación para preguntas de grado de certeza**

Por defecto, Chamilo no muestra una puntuación para los tipos de preguntas de grado de certeza.

*Predeterminado: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar intentos de examen de todas las sesiones en el curso base**

Muestra los intentos de examen de los usuarios en todas las sesiones al profesor en el curso base.

*Predeterminado: `false`*


### `show_official_code_exercise_result_list`

**Mostrar código oficial en los resultados de los ejercicios**

Define si se debe mostrar el código oficial de los estudiantes en los informes de resultados de los ejercicios.

*Predeterminado: `false`*


### `show_question_id`

**Mostrar IDs de preguntas en los exámenes**

Muestra los IDs internos de las preguntas para permitir a los usuarios tomar nota de problemas en preguntas específicas y reportarlos de manera más eficiente.

*Predeterminado: `false`*


### `show_question_pagination`

**Mostrar paginación de preguntas para profesores**

Para exámenes con muchas preguntas, utiliza paginación si el número de preguntas es mayor que este valor. Establece en 0 para evitar el uso de paginación.

*Predeterminado: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar exámenes eliminados en 'Mi progreso'**

Habilita esta opción para mostrar, en la página 'Mi progreso', los resultados de todos los exámenes que hayas realizado, incluso los que han sido eliminados.

*Predeterminado: `false`*