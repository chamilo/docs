# Configuración de ejercicios (tests)

Valores predeterminados y comportamiento de la herramienta **Ejercicios (tests)**: visualización de preguntas, puntuación, intentos y aspectos similares.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Ejercicios (tests)**. Esta categoría contiene **66 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_exercise_best_attempt_in_report`

**Habilitar la visualización del intento con la mejor puntuación**

Proporcione una lista de cursos e identificadores de tests que mostrarán el intento con la mejor puntuación de cualquier estudiante en los informes.

### `allow_coach_feedback_exercises`

**Permitir que los tutores comenten al revisar ejercicios**

Permitir que los tutores editen la retroalimentación al revisar ejercicios

*Predeterminado: `true`*

### `allow_edit_exercise_in_lp`

**Permitir que los docentes editen tests en las rutas de aprendizaje**

De forma predeterminada, Chamilo impide editar tests incluidos dentro de una ruta de aprendizaje. Esto evita cambios que afectarían de manera distinta a los estudiantes (pasados y futuros) en cuanto a los resultados y/o el progreso en la ruta de aprendizaje. Esta opción permite a los docentes omitir esta restricción.


### `allow_exercise_categories`

**Habilitar categorías de tests**

Las categorías de tests no están habilitadas de forma predeterminada porque añaden un nivel de complejidad. Habilite esta función para que aparezcan todos los iconos de gestión relacionados con las categorías de tests.

*Predeterminado: `false`*

### `allow_mandatory_question_in_category`

**Habilitar la selección de preguntas obligatorias**

Habilitar la selección de preguntas obligatorias en un test al utilizar categorías aleatorias.

*Predeterminado: `false`*

### `allow_notification_setting_per_exercise`

**Ajustes de notificación de tests a nivel de test**

Habilitar la configuración de las notificaciones de envío de tests a nivel de test en lugar de a nivel de curso. Si no se define a nivel de test, se recurre a los ajustes a nivel de curso.

*Predeterminado: `false`*

### `allow_quick_question_description_popup`

**Adición rápida de imagen a la pregunta**

Habilitar un icono adicional en la lista de preguntas del test para añadir una imagen como descripción de la pregunta. Esto acelera considerablemente la edición de preguntas cuando las preguntas están en el título y la descripción solo incluye una imagen.

*Predeterminado: `false`*

### `allow_quiz_question_feedback`

**Añadir retroalimentación de la pregunta si la respuesta es incorrecta**

De forma predeterminada, Chamilo permite mostrar retroalimentación sobre cada respuesta de una pregunta. Con esta opción se crea un campo adicional para proporcionar una retroalimentación predefinida a toda la pregunta. Esta retroalimentación solo aparecerá si el usuario respondió de forma incorrecta.

*Predeterminado: `false`*

### `allow_quiz_results_page_config`

**Habilitar la configuración de la página de resultados del test**

Defina un array de ajustes que desee aplicar a todas las páginas de resultados de los tests. Los ajustes pueden ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ y posiblemente más en el futuro. Busque ‘getPageConfigurationAttribute’ en el código para ver qué está en uso.

*Predeterminado: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrar el botón «anterior» en el test para navegar entre preguntas**

Establezca este valor en false para deshabilitar el botón «anterior» al responder preguntas en un test, obligando así a los usuarios a avanzar siempre.

*Predeterminado: `false`*

### `allow_teacher_comment_audio`

**Retroalimentación de audio a las respuestas enviadas**

Permitir que los docentes proporcionen retroalimentación a los usuarios mediante audio (como alternativa al texto) en cada pregunta de un test.

*Predeterminado: `true`*

### `allow_time_per_question`

**Habilitar el tiempo por pregunta en los tests**

De forma predeterminada, solo es posible limitar el tiempo por test. Limitarlo por pregunta añade un nivel adicional de posibilidades, y puede (con cuidado) combinar ambas opciones.

*Predeterminado: `false`*

### `block_category_questions`

**Bloquear las preguntas de las categorías anteriores en un test**

Al utilizar esta opción, aparecerá una opción adicional en la configuración del test. Al utilizar un test con varias categorías de preguntas y solicitar una distribución por categoría, esto permitirá al usuario navegar por las preguntas por categoría. Una vez finalizada una categoría, pasa a la siguiente y no puede volver a la categoría anterior.

*Predeterminado: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear el envío de notificaciones de tests al tutor general**

Cuando los estudiantes completan un test, las notificaciones suelen enviarse a los tutores, incluido el tutor general de la sesión. Habilite esta opción para omitir al tutor general de estas notificaciones.

*Predeterminado: `false`*

### `configure_exercise_visibility_in_course`

**Habilitar para omitir la configuración de ejercicio invisible en la sesión a nivel del curso base**

Permite habilitar la configuración de la invisibilidad del ejercicio en la sesión en el curso base para omitir la configuración global. Si no se establece, se utiliza el parámetro global.

*Valor predeterminado: `false`*

### `disable_clean_exercise_results_for_teachers`

**Desactivar «limpiar resultados» para los docentes**

Desactiva la opción de eliminar los resultados de las pruebas desde la lista de pruebas. Se utiliza a menudo cuando docentes menos cuidadosos gestionan cursos, para evitar errores críticos.

*Valor predeterminado: `true`*

### `email_alert_manager_on_new_quiz`

**Configuración predeterminada de alerta por correo electrónico ante un nuevo cuestionario**

Indica si desea que los responsables del curso (docentes) reciban una notificación por correo electrónico cuando un estudiante responda un cuestionario. Este es el valor predeterminado que se asignará a todos los cursos nuevos, pero cada docente puede modificar esta configuración en su propio curso.

*Valor predeterminado: `true`*

### `enable_quiz_scenario`

**Habilitar escenario de cuestionario**

Desde aquí podrá crear ejercicios que propongan distintas preguntas en función de las respuestas del usuario.

*Valor predeterminado: `true`*

### `exercise_additional_teacher_modify_actions`

**Enlaces adicionales para docentes en la lista de pruebas**

Configure elementos de devolución de llamada para generar nuevos iconos de acción para los docentes en el lado derecho de la lista de pruebas, en forma de matriz, p. ej. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostrar el nombre de usuario en la página de resultados de la prueba**

Muestra el nombre de usuario (en lugar de, o además de, la información del usuario) en la página de resultados de la prueba.

*Valor predeterminado: `false`*

### `exercise_category_report_user_extra_fields`

**Añadir campos adicionales de usuario en el informe de categoría de ejercicio**

Defina una matriz con la lista de campos adicionales de usuario que se añadirán al informe.

### `exercise_category_round_score_in_export`

**Redondear la puntuación en las exportaciones de pruebas**

Cuando está habilitado, las puntuaciones de las pruebas se redondean al entero más cercano al exportar los informes de ejercicios.

*Valor predeterminado: `false`*

### `exercise_default_visibility_can_be_modified_in_course` **v3**

**La visibilidad predeterminada de las pruebas nuevas puede modificarse por curso**

Cuando está habilitado, los docentes pueden elegir en la configuración del curso la visibilidad que se asignará a las pruebas nuevas de su curso, en lugar del valor predeterminado de la plataforma.

*Valor predeterminado: `false`*

Cuando esta opción está habilitada, aparece una opción **Visibilidad predeterminada para las pruebas nuevas** en la sección **Pruebas** de la configuración del curso. Un curso que no haya elegido un valor utiliza `exercise_default_visibility_on_creation`.

### `exercise_default_visibility_on_creation` **v3**

**Visibilidad predeterminada de las pruebas nuevas**

Visibilidad asignada a una prueba nueva cuando un docente la crea en un curso. Los docentes pueden seguir modificando la visibilidad de cada una posteriormente.

*Valor predeterminado: `visible`*

### `exercise_embeddable_extra_types`

**Tipos de pregunta incrustables**

De forma predeterminada, solo las preguntas de respuesta única y de respuesta múltiple se tienen en cuenta al decidir si una prueba puede incrustarse en un vídeo o no. Con esta opción, puede decidir que estén disponibles más tipos de pregunta. Tenga en cuenta que no todos los tipos de pregunta se adaptan bien al espacio asignado a los vídeos. Los tipos de pregunta están disponibles en el código en question.class.php.

### `exercise_hide_ip`

**Ocultar la IP del usuario en los informes de pruebas**

De forma predeterminada, mostramos la información del usuario y su dirección IP, pero esto podría considerarse un dato personal, por lo que esta opción le permite eliminar esta información de todos los informes de pruebas.

*Valor predeterminado: `false`*

### `exercise_hide_label`

**Ocultar la cinta de la pregunta (correcta/incorrecta) en los resultados de la prueba**

En los resultados de la prueba, aparece de forma predeterminada una cinta para indicar si la respuesta fue correcta o incorrecta. Habilite esta opción para eliminar la cinta de forma global.

*Valor predeterminado: `false`*

### `exercise_invisible_in_session`

**Ejercicio invisible en la sesión**

Si un ejercicio es visible en el curso base, aparece como invisible en la sesión. Si un ejercicio es invisible en el curso base, no aparece en la sesión.

*Valor predeterminado: `false`*

### `exercise_max_editors_in_page`

**Número máximo de editores en la pantalla de resultados del ejercicio**

Debido a la gran cantidad de preguntas que pueden aparecer en un ejercicio, la pantalla de corrección, que permite al docente añadir comentarios a cada respuesta, puede tardar mucho en cargarse. Establezca este número en 5 para solicitar a la plataforma que solo muestre editores WYSIWYG hasta un determinado número de respuestas en la pantalla. Esto acelerará considerablemente el tiempo de carga de la página de corrección, pero eliminará los editores WYSIWYG y dejará únicamente un editor de texto sin formato.

*Valor predeterminado: `0`*


### `exercise_max_score`

**Puntuación máxima de los ejercicios**

Defina una puntuación máxima (generalmente 10, 20 o 100) para todos los ejercicios de la plataforma. Esto determinará cómo se muestran los resultados finales a los usuarios y a los docentes.

*Valor predeterminado: `20`*


### `exercise_min_score`

**Puntuación mínima de los ejercicios**

Defina una puntuación mínima (generalmente 0) para todos los ejercicios de la plataforma. Esto determinará cómo se muestran los resultados finales a los usuarios y a los docentes.

*Valor predeterminado: `0`*

### `exercise_result_end_text_html_strict_filtering`

**Omitir el filtrado HTML en los mensajes finales de los ejercicios**

Considera que los mensajes al final de los ejercicios son siempre seguros. Eliminar el filtro permite utilizar JavaScript en ellos.

*Valor predeterminado: `false`*


### `exercise_score_format`

**Formato de la puntuación de los ejercicios**

Seleccione entre las siguientes formas de visualización de la puntuación de los usuarios en los distintos informes: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50 %); 3 = SCORE_DIV_PERCENT (5 / 10 (50 %)). Utilice el identificador numérico del formato que desee emplear.

*Valor predeterminado: `0`*

### `exercises_disable_new_attempts`

**Desactivar nuevos intentos de ejercicios**

Desactiva de forma global los nuevos intentos de ejercicios. Suele utilizarse cuando existe un problema general con los ejercicios y se necesita tiempo para analizarlo sin bloquear toda la plataforma.

*Valor predeterminado: `false`*


### `hide_free_question_score`

**Ocultar la puntuación de las preguntas abiertas**

Oculta el hecho de que las preguntas abiertas (incluidas las de audio y las de anotaciones) tienen una puntuación, ocultando la visualización de la puntuación en todos los informes dirigidos al estudiante.

*Valor predeterminado: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar la información del usuario en la página de resultados del ejercicio**

La página de resultados del ejercicio muestra de forma predeterminada una ficha del usuario (foto, nombre, etc.) que, en algunos contextos, podría considerarse que sobrepasa los límites del tratamiento de datos personales. Active esta opción para eliminar los datos del usuario de los resultados del ejercicio.

*Valor predeterminado: `false`*


### `limit_exercise_teacher_access`

**Limitar los permisos de los docentes sobre los ejercicios**

Cuando está activada, los docentes no pueden eliminar ejercicios ni preguntas, cambiar la visibilidad de los ejercicios, descargar en QTI, limpiar los resultados, etc.

*Valor predeterminado: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de ejercicios pendientes**

Actívela para mostrar al usuario final una página con la lista de ejercicios pendientes de todos los cursos.

*Valor predeterminado: `false`*


### `question_exercise_html_strict_filtering`

**Omitir el filtrado HTML en las preguntas de los ejercicios**

Considera que el texto de las preguntas de los ejercicios es siempre seguro. Eliminar el filtro permite utilizar JavaScript en ellas.

*Valor predeterminado: `false`*


### `question_pagination_length`

**Longitud de la paginación de preguntas para docentes**

Número de preguntas que se muestran en cada página al utilizar la opción de paginación de preguntas para docentes.

*Valor predeterminado: `20`*


### `quiz_answer_extra_recording`

**Activar el registro adicional de respuestas de ejercicios**

Activa el registro de todas las respuestas (incluso las temporales) en la tabla track_e_attempt_recording. Esta función es experimental y puede generar problemas en las páginas de informes al intentar calificar un ejercicio.

*Valor predeterminado: `false`*


### `quiz_check_all_answers_before_end_test`

**Comprobar todas las respuestas antes de enviar el ejercicio**

Muestra una ventana emergente con la lista de preguntas respondidas y no respondidas antes de enviar el ejercicio.

*Valor predeterminado: `false`*


### `quiz_check_button_enable`

**Añadir una comprobación del proceso de guardado de respuestas antes del ejercicio**

Asegúrese de que los usuarios están preparados para iniciar el ejercicio ofreciendo una simulación del proceso de guardado de preguntas antes de entrar en el ejercicio. Esto permite detectar de forma temprana algunos problemas de conexión y reduce las fricciones en la experiencia de usuario.

*Valor predeterminado: `false`*


### `allow_final_exam_access_rule`

**Condiciones de acceso previas a un ejercicio**

Permite a los docentes mantener cerrado un ejercicio, como un examen final, hasta que el estudiante haya dedicado un tiempo mínimo al curso y haya completado un campo obligatorio del perfil. Los docentes establecen estas condiciones en la configuración avanzada de cada ejercicio. Mientras esta opción esté desactivada, las condiciones ni se muestran ni se aplican.

La opción se activa automáticamente cuando la plataforma se actualiza con ejercicios que ya contienen dichas condiciones, y mediante el comando `chamilo:migration:migrate-final-exam-access` cuando las escribe.

*Valor predeterminado: `false`*


### `quiz_confirm_saved_answers`

**Añadir una casilla de confirmación del número de respuestas**

Esta opción añade una casilla al final de cada ejercicio en la que se pide al usuario que confirme el número de respuestas guardadas. Esto proporciona mejores datos de auditoría para los ejercicios críticos.

*Valor predeterminado: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar las preguntas huérfanas en la exportación del curso**

Al exportar un curso, no exporta las preguntas que no forman parte de ningún ejercicio.

*Valor predeterminado: `false`*


### `quiz_generate_certificate_ending`

**Generar un certificado al finalizar el ejercicio**

Genera un certificado al finalizar un ejercicio. El ejercicio debe estar vinculado en la herramienta de libreta de calificaciones y tener configurado un porcentaje de aprobación.

*Valor predeterminado: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar la tabla de intentos en la página de inicio del ejercicio**

Oculta la tabla que muestra todos los intentos anteriores en la página de inicio del ejercicio.

*Valor predeterminado: `false`*


### `quiz_hide_question_number`

**Ocultar el número de pregunta**

Oculta la numeración incremental de las preguntas al realizar un ejercicio.

*Valor predeterminado: `false`*


### `quiz_image_zoom`

**Activar el zoom de las imágenes de los ejercicios**

Active esta función para permitir que los usuarios amplíen las imágenes utilizadas en los ejercicios.

### `quiz_keep_alive_ping_interval`

**Mantener la sesión activa en los ejercicios**

Mantiene la sesión activa enviando una señal de ping regular al servidor cada x segundos, definidos aquí. Recomendamos una vez cada 300 segundos.

*Valor predeterminado: `0`*

### `quiz_open_question_decimal_score`

**Puntuación decimal en los tipos de pregunta abierta**

Permitir que el docente califique los tipos de pregunta abierta, de expresión oral y de anotación con una puntuación decimal.

*Valor predeterminado: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar y pegar en los tests**

Bloquear las teclas de copiar/pegar/guardar/imprimir y los clics con el botón derecho en los ejercicios.

*Valor predeterminado: `false`*

### `quiz_question_category_destinations` **v3**

**Habilitar tests adaptativos progresivos por destino de categoría**

Habilitar tests adaptativos progresivos en los que cada categoría de preguntas puede redirigir a los estudiantes a otra categoría en función de su puntuación.

*Valor predeterminado: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Eliminar automáticamente las preguntas al eliminar el test**

El comportamiento predeterminado consiste en dejar huérfanas las preguntas cuando se elimina el único test que las utiliza. Cuando esta opción está habilitada, garantiza que también se eliminen todas las preguntas que, de otro modo, quedarían huérfanas.

*Valor predeterminado: `false`*


### `quiz_results_answers_report`

**Mostrar el enlace para descargar los resultados del test**

En la página de resultados del test, mostrar un enlace para descargar los resultados como archivo.

*Valor predeterminado: `false`*


### `quiz_show_description_on_results_page`

**Mostrar siempre la descripción del test en la página de resultados**

Cuando está habilitada, la descripción del test se muestra siempre en la página de resultados tras completar el test.

*Valor predeterminado: `false`*


### `score_grade_model`

**Modelo de calificaciones por puntuación**

Definir una matriz de rangos de puntuación y colores para mostrar los informes con este modelo. Esto permite mostrar colores en lugar de calificaciones numéricas.

### `send_score_in_exam_notification_mail_to_manager`

**Añadir la puntuación en la notificación por correo del envío del test**

Añadir la puntuación del estudiante a la notificación por correo electrónico enviada al docente después de que se haya enviado un test.

*Valor predeterminado: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar los intentos de test de todas las sesiones en el informe de tests pendientes**

Mostrar los intentos de test de los usuarios de todas las sesiones a las que el tutor general tiene acceso en el informe de tests pendientes.

*Valor predeterminado: `false`*


### `show_exercise_expected_choice`

**Mostrar la opción esperada en los resultados del test**

Mostrar la opción esperada y un estado (correcto/incorrecto) para cada respuesta en la página de resultados del test (si el test se ha configurado para mostrar los resultados).

*Valor predeterminado: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar la puntuación de las preguntas de grado de certeza**

De forma predeterminada, Chamilo no muestra una puntuación para los tipos de pregunta de grado de certeza.

*Valor predeterminado: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar los intentos de test de todas las sesiones en el curso base**

Mostrar al docente, en el curso base, los intentos de test de los usuarios de todas las sesiones.

*Valor predeterminado: `false`*


### `show_official_code_exercise_result_list`

**Mostrar el código oficial en los resultados de los ejercicios**

Indica si se muestra el código oficial de los estudiantes en los informes de resultados de los ejercicios.

*Valor predeterminado: `false`*

### `show_question_id`

**Mostrar los identificadores de las preguntas en los tests**

Mostrar los identificadores internos de las preguntas para que los usuarios puedan anotar incidencias sobre preguntas concretas e informar de ellas con mayor eficacia.

*Valor predeterminado: `false`*


### `show_question_pagination`

**Mostrar la paginación de preguntas para los docentes**

En los tests con muchas preguntas, utilizar la paginación si el número de preguntas es superior a este valor. Establecerlo en 0 para impedir el uso de la paginación.

*Valor predeterminado: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar los tests eliminados en «Mi progreso»**

Habilite esta opción para mostrar, en la página «Mi progreso», los resultados de todos los tests que haya realizado, incluso los que se hayan eliminado.

*Valor predeterminado: `false`*