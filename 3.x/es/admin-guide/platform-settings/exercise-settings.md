# Configuración de ejercicios (pruebas)

Valores predeterminados y comportamiento de la herramienta **Ejercicios (pruebas)**: visualización de preguntas, puntuación, intentos y aspectos similares.

Acceda a estos ajustes en **Administración > Configuración > Ejercicios (pruebas)**. Esta categoría contiene **64 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_exercise_best_attempt_in_report`

**Activar la visualización del intento con mejor puntuación**

Proporcione una lista de identificadores de cursos y pruebas que mostrarán el intento con mejor puntuación de cualquier alumno en los informes.

### `allow_coach_feedback_exercises`

**Permitir que los tutores comenten al revisar ejercicios**

Permitir que los tutores editen la retroalimentación al revisar ejercicios

*Predeterminado: `true`*

### `allow_edit_exercise_in_lp`

**Permitir que los profesores editen pruebas en itinerarios de aprendizaje**

De forma predeterminada, Chamilo impide editar las pruebas incluidas en un itinerario de aprendizaje. Esto evita cambios que afectarían de forma distinta a los alumnos (pasados y futuros) en cuanto a resultados y/o progreso en el itinerario. Esta opción permite a los profesores eludir esa restricción.


### `allow_exercise_categories`

**Activar categorías de pruebas**

Las categorías de pruebas no están activadas de forma predeterminada porque añaden un nivel de complejidad. Active esta función para que aparezcan todos los iconos de gestión relacionados con las categorías de pruebas.

*Predeterminado: `false`*

### `allow_mandatory_question_in_category`

**Activar la selección de preguntas obligatorias**

Permite seleccionar preguntas obligatorias en una prueba cuando se usan categorías aleatorias.

*Predeterminado: `false`*

### `allow_notification_setting_per_exercise`

**Ajustes de notificación de prueba a nivel de prueba**

Activa la configuración de las notificaciones de envío de pruebas a nivel de prueba en lugar de a nivel de curso. Si no está definida a nivel de prueba, se usan los ajustes del curso.

*Predeterminado: `false`*

### `allow_quick_question_description_popup`

**Añadir imagen rápidamente a la pregunta**

Activa un icono adicional en la lista de preguntas de la prueba para añadir una imagen como descripción de la pregunta. Esto acelera enormemente la edición cuando las preguntas están en el título y la descripción solo incluye una imagen.

*Predeterminado: `false`*

### `allow_quiz_question_feedback`

**Añadir retroalimentación de la pregunta si la respuesta es incorrecta**

De forma predeterminada, Chamilo permite mostrar retroalimentación en cada respuesta de una pregunta. Con esta opción se crea un campo adicional para ofrecer retroalimentación predefinida a toda la pregunta. Esta retroalimentación solo aparecerá si el usuario respondió incorrectamente.

*Predeterminado: `false`*

### `allow_quiz_results_page_config`

**Activar la configuración de la página de resultados de la prueba**

Defina un array de ajustes que desee aplicar a todas las páginas de resultados de las pruebas. Los ajustes pueden ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ y posiblemente más en el futuro. Busque ‘getPageConfigurationAttribute’ en el código para ver qué está en uso.

*Predeterminado: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrar el botón «anterior» en la prueba para navegar entre preguntas**

Establézcalo en false para desactivar el botón «anterior» al responder preguntas en una prueba, forzando así a los usuarios a avanzar siempre.

*Predeterminado: `false`*

### `allow_teacher_comment_audio`

**Retroalimentación de audio a las respuestas enviadas**

Permite a los profesores ofrecer retroalimentación a los usuarios mediante audio (como alternativa al texto) en cada pregunta de una prueba.

*Predeterminado: `true`*

### `allow_time_per_question`

**Activar tiempo por pregunta en las pruebas**

De forma predeterminada, solo es posible limitar el tiempo por prueba. Limitarlo por pregunta añade una capa extra de posibilidades, y puede (con cuidado) combinar ambas.

*Predeterminado: `false`*

### `block_category_questions`

**Bloquear las preguntas de categorías anteriores en una prueba**

Al usar esta opción, aparecerá una opción adicional en la configuración de la prueba. Al usar una prueba con varias categorías de preguntas y solicitar una distribución por categoría, esto permitirá al usuario navegar las preguntas por categoría. Una vez terminada una categoría, pasa a la siguiente y no puede volver a la categoría anterior.

*Predeterminado: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear el envío de notificaciones de prueba al tutor general**

Cuando los alumnos completan una prueba, las notificaciones suelen enviarse a los tutores, incluido el tutor general de la sesión. Active esta opción para omitir al tutor general de estas notificaciones.

*Predeterminado: `false`*

### `configure_exercise_visibility_in_course`

**Habilitar para omitir la configuración de Ejercicio invisible en sesión a nivel de curso base**

Para habilitar la configuración de la invisibilidad del ejercicio en sesión en el curso base y así omitir la configuración global. Si no se establece, se utiliza el parámetro global.

*Predeterminado: `false`*

### `disable_clean_exercise_results_for_teachers`

**Deshabilitar «limpiar resultados» para los profesores**

Deshabilita la opción de eliminar los resultados de las pruebas desde la lista de pruebas. Se utiliza a menudo cuando los cursos son gestionados por profesores menos cuidadosos, para evitar errores críticos.

*Predeterminado: `true`*

### `email_alert_manager_on_new_quiz`

**Configuración predeterminada de alerta por correo electrónico en un nuevo cuestionario**

Si desea que los gestores del curso (profesores) reciban una notificación por correo electrónico cuando un estudiante responde un cuestionario. Este es el valor predeterminado que se asigna a todos los cursos nuevos, pero cada profesor puede cambiar esta configuración en su propio curso.

*Predeterminado: `true`*

### `enable_quiz_scenario`

**Habilitar escenario de cuestionario**

Desde aquí podrá crear ejercicios que propongan distintas preguntas en función de las respuestas del usuario.

*Predeterminado: `true`*

### `exercise_additional_teacher_modify_actions`

**Enlaces adicionales para profesores en la lista de pruebas**

Configure elementos de callback para generar nuevos iconos de acción para los profesores a la derecha de la lista de pruebas, en forma de array, p. ej. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostrar el nombre de usuario en la página de resultados de la prueba**

Muestra el nombre de usuario (en lugar de, o además de, la información del usuario) en la página de resultados de la prueba.

*Predeterminado: `false`*

### `exercise_category_report_user_extra_fields`

**Añadir campos extra de usuario en el informe de categoría de ejercicios**

Defina un array con la lista de campos extra de usuario que se añadirán al informe.

### `exercise_category_round_score_in_export`

**Redondear la puntuación en las exportaciones de pruebas**

Cuando está habilitado, las puntuaciones de las pruebas se redondean al entero más cercano al exportar los informes de ejercicios.

*Predeterminado: `false`*

### `exercise_embeddable_extra_types`

**Tipos de pregunta incrustables**

De forma predeterminada, solo se consideran las preguntas de respuesta única y de respuesta múltiple al decidir si una prueba puede incrustarse en un vídeo o no. Con esta opción, puede decidir que haya más tipos de pregunta disponibles. Tenga en cuenta que no todos los tipos de pregunta encajan bien en el espacio asignado a los vídeos. Los tipos de pregunta están disponibles en el código en question.class.php.

### `exercise_hide_ip`

**Ocultar la IP del usuario en los informes de pruebas**

De forma predeterminada, mostramos la información del usuario y su dirección IP, pero esto podría considerarse dato personal, por lo que esta opción le permite eliminar esta información de todos los informes de pruebas.

*Predeterminado: `false`*

### `exercise_hide_label`

**Ocultar la cinta de pregunta (correcto/incorrecto) en los resultados de la prueba**

En los resultados de la prueba, aparece de forma predeterminada una cinta que indica si la respuesta fue correcta o incorrecta. Habilite esta opción para eliminar la cinta de forma global.

*Predeterminado: `false`*

### `exercise_invisible_in_session`

**Ejercicio invisible en sesión**

Si un ejercicio es visible en el curso base, aparece invisible en la sesión. Si un ejercicio es invisible en el curso base, no aparece en la sesión.

*Predeterminado: `false`*

### `exercise_max_editors_in_page`

**Máximo de editores en la pantalla de resultados del ejercicio**

Debido al gran número de preguntas que pueden aparecer en un ejercicio, la pantalla de corrección, que permite al profesor añadir comentarios a cada respuesta, puede tardar mucho en cargar. Establezca este número en 5 para pedir a la plataforma que muestre editores WYSIWYG solo hasta un determinado número de respuestas en pantalla. Esto acelerará considerablemente el tiempo de carga de la página de corrección, pero eliminará los editores WYSIWYG y dejará solo un editor de texto plano.

*Predeterminado: `0`*


### `exercise_max_score`

**Puntuación máxima de los ejercicios**

Defina una puntuación máxima (generalmente 10, 20 o 100) para todos los ejercicios de la plataforma. Esto definirá cómo se muestran los resultados finales a usuarios y profesores.

*Predeterminado: `20`*


### `exercise_min_score`

**Puntuación mínima de los ejercicios**

Defina una puntuación mínima (generalmente 0) para todos los ejercicios de la plataforma. Esto definirá cómo se muestran los resultados finales a usuarios y profesores.

*Predeterminado: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Omitir el filtrado HTML en los mensajes de fin de prueba**

Considere que los mensajes al final de las pruebas son siempre seguros. Eliminar el filtro permite utilizar JavaScript en ellos.

*Predeterminado: `false`*


### `exercise_score_format`

**Formato de puntuación de las pruebas**

Seleccione entre las siguientes formas de visualización de la puntuación de los usuarios en diversos informes: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Utilice el identificador numérico de la forma que desee usar.

*Predeterminado: `0`*

### `exercises_disable_new_attempts`

**Deshabilitar nuevos intentos de prueba**

Deshabilita de forma global los nuevos intentos de prueba. Se utiliza habitualmente cuando hay un problema con las pruebas en general y se desea disponer de tiempo para analizar sin bloquear toda la plataforma.

*Predeterminado: `false`*

### `hide_free_question_score`

**Ocultar la puntuación de las preguntas abiertas**

Oculta el hecho de que las preguntas abiertas (incluidas las de audio y las anotaciones) tienen una puntuación, ocultando la visualización de la puntuación en todos los informes visibles para el alumno.

*Valor predeterminado: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar la información del usuario en la página de resultados de la prueba**

La página de resultados de la prueba muestra de forma predeterminada una ficha de datos del usuario (foto, nombre, etc.) que, en algunos contextos, podría considerarse que rebasa los límites del tratamiento de datos personales. Active esta opción para eliminar los detalles del usuario de los resultados de la prueba.

*Valor predeterminado: `false`*


### `limit_exercise_teacher_access`

**Limitar los permisos de los profesores sobre las pruebas**

Cuando está activada, los profesores no pueden eliminar pruebas ni preguntas, cambiar la visibilidad de las pruebas, descargar a QTI, limpiar resultados, etc.

*Valor predeterminado: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de pruebas pendientes**

Actívela para mostrar al usuario final una página con la lista de pruebas pendientes en todos los cursos.

*Valor predeterminado: `false`*


### `question_exercise_html_strict_filtering`

**Omitir el filtrado HTML en las preguntas de las pruebas**

Considere que el texto de las preguntas en las pruebas es siempre seguro. Eliminar el filtro permite utilizar JavaScript en ellas.

*Valor predeterminado: `false`*


### `question_pagination_length`

**Longitud de paginación de preguntas para profesores**

Número de preguntas que se muestran en cada página al utilizar la opción de paginación de preguntas para profesores.

*Valor predeterminado: `20`*


### `quiz_answer_extra_recording`

**Activar el registro extra de respuestas de las pruebas**

Activa el registro de todas las respuestas (incluso las temporales) en la tabla track_e_attempt_recording. Esta función es experimental y puede generar problemas en las páginas de informes al intentar calificar una prueba.

*Valor predeterminado: `false`*


### `quiz_check_all_answers_before_end_test`

**Comprobar todas las respuestas antes de enviar la prueba**

Muestra una ventana emergente con la lista de preguntas respondidas/sin responder antes de enviar la prueba.

*Valor predeterminado: `false`*


### `quiz_check_button_enable`

**Añadir comprobación del proceso de guardado de respuestas antes de la prueba**

Asegúrese de que los usuarios están listos para comenzar la prueba ofreciendo una simulación del proceso de guardado de preguntas antes de entrar en la prueba. Esto permite detectar de forma temprana algunos problemas de conexión y reduce las fricciones en la experiencia de usuario.

*Valor predeterminado: `false`*


### `quiz_confirm_saved_answers`

**Añadir casilla de confirmación del recuento de respuestas**

Esta opción añade una casilla al final de cada prueba pidiendo al usuario que confirme el número de respuestas guardadas. Esto proporciona mejores datos de auditoría para las pruebas críticas.

*Valor predeterminado: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar preguntas huérfanas en la exportación del curso**

Al exportar un curso, no exportar las preguntas que no forman parte de ninguna prueba.

*Valor predeterminado: `false`*


### `quiz_generate_certificate_ending`

**Generar certificado al finalizar la prueba**

Genera el certificado al terminar un cuestionario. El cuestionario debe estar vinculado en la herramienta de calificaciones y tener configurado un porcentaje de aprobado.

*Valor predeterminado: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar la tabla de intentos en la página de inicio de la prueba**

Oculta la tabla que muestra todos los intentos anteriores en la página de inicio de la prueba.

*Valor predeterminado: `false`*


### `quiz_hide_question_number`

**Ocultar el número de pregunta**

Oculta la numeración incremental de las preguntas al realizar una prueba.

*Valor predeterminado: `false`*


### `quiz_image_zoom`

**Activar el zoom de imágenes en las pruebas**

Active esta función para permitir a los usuarios ampliar las imágenes utilizadas en las pruebas.

### `quiz_keep_alive_ping_interval`

**Mantener la sesión activa en las pruebas**

Mantiene la sesión activa enviando una señal de ping periódica al servidor cada x segundos, definidos aquí. Recomendamos una vez cada 300 segundos.

*Valor predeterminado: `0`*


### `quiz_open_question_decimal_score`

**Puntuación decimal en tipos de pregunta abierta**

Permite al profesor calificar los tipos de pregunta abierta, de expresión oral y de anotación con una puntuación decimal.

*Valor predeterminado: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar y pegar en las pruebas**

Bloquea las teclas de copiar/pegar/guardar/imprimir y los clics con el botón derecho en los ejercicios.

*Valor predeterminado: `false`*

### `quiz_question_category_destinations` **v3**

**Activar pruebas adaptativas progresivas por destino de categoría**

Activa pruebas adaptativas progresivas en las que cada categoría de pregunta puede redirigir a los alumnos a otra categoría en función de su puntuación.

*Valor predeterminado: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Eliminar automáticamente las preguntas al eliminar la prueba**

El comportamiento predeterminado es dejar las preguntas huérfanas cuando se elimina la única prueba que las utiliza. Cuando está activada, esta opción garantiza que también se eliminen todas las preguntas que de otro modo quedarían huérfanas.

*Valor predeterminado: `false`*


### `quiz_results_answers_report`

**Mostrar enlace para descargar los resultados de la prueba**

En la página de resultados de la prueba, muestra un enlace para descargar los resultados como archivo.

*Valor predeterminado: `false`*


### `quiz_show_description_on_results_page`

**Mostrar siempre la descripción de la prueba en la página de resultados**

Cuando está activada, la descripción de la prueba se muestra siempre en la página de resultados tras completar la prueba.

*Valor predeterminado: `false`*

### `score_grade_model`

**Modelo de calificaciones por puntuación**

Defina un array de rangos de puntuación y colores para mostrar informes usando este modelo. Esto permite mostrar colores en lugar de calificaciones numéricas.

### `send_score_in_exam_notification_mail_to_manager`

**Añadir puntuación en el correo de notificación de envío de examen**

Añade la puntuación del alumno al correo electrónico de notificación enviado al profesor después de que se haya enviado un examen.

*Predeterminado: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar intentos de examen de todas las sesiones en el informe de exámenes pendientes**

Muestra los intentos de examen de los usuarios en todas las sesiones a las que el tutor general tiene acceso en el informe de exámenes pendientes.

*Predeterminado: `false`*


### `show_exercise_expected_choice`

**Mostrar la opción esperada en los resultados del examen**

Muestra la opción esperada y un estado (correcto/incorrecto) para cada respuesta en la página de resultados del examen (si el examen se ha configurado para mostrar resultados).

*Predeterminado: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar puntuación para preguntas de grado de certeza**

De forma predeterminada, Chamilo no muestra una puntuación para los tipos de pregunta de grado de certeza.

*Predeterminado: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar intentos de examen de todas las sesiones en el curso base**

Muestra al profesor, en el curso base, los intentos de examen de los usuarios en todas las sesiones.

*Predeterminado: `false`*


### `show_official_code_exercise_result_list`

**Mostrar el código oficial en los resultados de los ejercicios**

Indica si se muestra el código oficial de los estudiantes en los informes de resultados de los ejercicios

*Predeterminado: `false`*

### `show_question_id`

**Mostrar identificadores de pregunta en los exámenes**

Muestra los identificadores internos de las preguntas para que los usuarios puedan anotar incidencias en preguntas concretas y notificarlas de forma más eficiente.

*Predeterminado: `false`*


### `show_question_pagination`

**Mostrar paginación de preguntas para profesores**

En exámenes con muchas preguntas, use paginación si el número de preguntas es superior a este valor. Establezca 0 para no usar paginación.

*Predeterminado: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar exámenes eliminados en «Mi progreso»**

Active esta opción para mostrar, en la página «Mi progreso», los resultados de todos los exámenes que ha realizado, incluso los que se han eliminado.

*Predeterminado: `false`*