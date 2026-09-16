# Configuración de encuestas

Valores predeterminados y comportamiento de la herramienta **Encuestas**.

Acceda a estos ajustes en **Administración > Configuración > Encuestas**. Esta categoría contiene **12 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `extend_rights_for_coach_on_survey`

**Ampliar derechos de los tutores en las encuestas**

Active esta opción para permitir que los tutores creen y editen encuestas

*Predeterminado: `true`*


### `hide_survey_edition`

**Impedir la edición de encuestas**

Impide la edición de todas las encuestas listadas aquí (por código). Use * para impedir la edición de todas las encuestas.

### `hide_survey_reporting_button`

**Ocultar el botón de informes de encuestas**

Permite a los administradores ocultar el botón de informes de encuestas si estas se utilizan para encuestar a los profesores.

*Predeterminado: `false`*


### `show_pending_survey_in_menu`

**Mostrar «Encuestas pendientes» en el menú**

Muestra un elemento de menú que permite a los usuarios acceder a sus encuestas pendientes.

*Predeterminado: `false`*


### `show_surveys_base_in_sessions`

**Mostrar las encuestas del curso base en todos los cursos de sesión**

[inferido] Hace que las encuestas del curso base sean visibles y estén disponibles para los alumnos en todos los cursos de sesión relacionados.

*Predeterminado: `false`*


### `survey_additional_teacher_modify_actions`

**Añadir acciones adicionales (como enlaces) a las listas de encuestas para profesores**

Añade acciones (normalmente conectadas a plugins) en la lista de encuestas. Use la sintaxis de array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permitir a los profesores editar las preguntas de la encuesta después de que los estudiantes hayan respondido**

[inferido] Permite a los instructores modificar las preguntas de la encuesta incluso después de que los alumnos hayan enviado respuestas.

*Predeterminado: `false`*


### `survey_anonymous_show_answered`

**Permitir a los profesores ver quién ha respondido en encuestas anónimas**

Permite a los profesores ver qué alumnos ya han respondido una encuesta anónima. Esto solo aparece una vez que más de un usuario ha respondido, de modo que sigue siendo difícil identificar quién respondió qué.

*Predeterminado: `false`*


### `survey_backwards_enable`

**Activar el botón «pregunta anterior» en las encuestas**

[inferido] Activa un botón de navegación «pregunta anterior» para que los alumnos puedan revisar preguntas anteriores de la encuesta.

*Predeterminado: `false`*


### `survey_duplicate_order_by_name`

**Ordenar por nombre del estudiante al usar la función de duplicación de encuestas**

La función de duplicación de encuestas está orientada a los profesores y sirve para pedirles que valoren a cada estudiante en orden. Esta opción ordenará las preguntas por el apellido del alumno.

*Predeterminado: `true`*


### `survey_email_sender_noreply`

**Remitente de correo electrónico de las encuestas (no-reply)**

¿Deben las invitaciones a encuestas usar la dirección de correo del tutor o la dirección no-reply definida en la sección de configuración principal?

*Predeterminado: `coach`* (la opción «Remitente de correo del tutor del curso» — el valor almacenado no ha cambiado respecto a versiones anteriores de Chamilo, pero la opción se etiqueta como «tutor» en la interfaz)


### `survey_mark_question_as_required`

**Marcar todas las preguntas de la encuesta como «obligatorias» de forma predeterminada**

[inferido] Marca automáticamente todas las preguntas de encuesta recién creadas como respuestas obligatorias de forma predeterminada.

*Predeterminado: `false`*