# Configuración de Encuestas

Valores predeterminados y comportamiento de la herramienta **Encuestas**.

Acceda a estas configuraciones en **Administración > Configuraciones > Encuestas**. Esta categoría contiene **12 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `extend_rights_for_coach_on_survey`

**Ampliar derechos para entrenadores en encuestas**

Activar esta opción permitirá a los entrenadores crear y editar encuestas.

*Predeterminado: `true`*

### `hide_survey_edition`

**Evitar la edición de encuestas**

Impide la edición de todas las encuestas listadas aquí (por código). Use * para evitar la edición de todas las encuestas.

### `hide_survey_reporting_button`

**Ocultar botón de informe de encuestas**

Permite a los administradores ocultar el botón de informe de encuestas si las encuestas se utilizan para evaluar a los profesores.

*Predeterminado: `false`*

### `show_pending_survey_in_menu`

**Mostrar "Encuestas pendientes" en el menú**

Muestra un elemento en el menú que permite a los usuarios acceder a sus encuestas pendientes.

*Predeterminado: `false`*

### `show_surveys_base_in_sessions`

**Mostrar encuestas del curso base en todos los cursos de sesión**

[inferido] Hace que las encuestas del curso base sean visibles y estén disponibles para los estudiantes en todos los cursos de sesión relacionados.

*Predeterminado: `false`*

### `survey_additional_teacher_modify_actions`

**Agregar acciones adicionales (como enlaces) a las listas de encuestas para profesores**

Añade acciones (generalmente conectadas a complementos) en la lista de encuestas. Use la sintaxis de arreglo ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permitir a los profesores editar preguntas de encuestas después de que los estudiantes hayan respondido**

[inferido] Permite a los instructores modificar preguntas de encuestas incluso después de que los estudiantes hayan enviado sus respuestas.

*Predeterminado: `false`*

### `survey_anonymous_show_answered`

**Permitir a los profesores ver quién respondió en encuestas anónimas**

Permite a los profesores ver qué estudiantes han respondido en una encuesta anónima. Esto solo aparece una vez que más de un usuario ha respondido, por lo que sigue siendo difícil identificar quién respondió qué.

*Predeterminado: `false`*

### `survey_backwards_enable`

**Habilitar botón de 'pregunta anterior' en encuestas**

[inferido] Habilita un botón de navegación de "pregunta anterior" para permitir a los estudiantes revisar preguntas anteriores de la encuesta.

*Predeterminado: `false`*

### `survey_duplicate_order_by_name`

**Ordenar por nombre del estudiante al usar la función de duplicación de encuestas**

La función de duplicación de encuestas está orientada a los profesores y tiene como objetivo pedirles que den su apreciación sobre cada estudiante en orden. Esta opción ordenará las preguntas por el apellido del estudiante.

*Predeterminado: `true`*

### `survey_email_sender_noreply`

**Remitente de correo electrónico de encuestas (sin respuesta)**

¿Las invitaciones a encuestas deben usar la dirección de correo electrónico del entrenador o la dirección de no-respuesta definida en la sección de configuración principal?

*Predeterminado: `coach`*

### `survey_mark_question_as_required`

**Marcar todas las preguntas de encuestas como 'requeridas' por defecto**

[inferido] Marca automáticamente todas las preguntas de encuestas recién creadas como respuestas requeridas por defecto.

*Predeterminado: `false`*