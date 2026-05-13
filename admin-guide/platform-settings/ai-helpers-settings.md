# Configuración de Asistentes de IA

Configuración de los asistentes de IA (generación de texto, generación de imágenes, generación de videos, tutor de IA, calificación con IA). Cada proveedor puede habilitarse por tipo de tarea. Consulta también [Configuración de IA](../integrations/ai-configuration.md).

Accede a estas configuraciones en **Administración > Configuraciones > Asistentes de IA**. Esta categoría contiene **13 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando realices scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `ai_providers`

**Datos de conexión de proveedores de IA**

Datos de configuración para conectarse con servicios externos de IA.

### `content_analyser`

**Analizador de contenido**

Analiza materiales de aprendizaje para extraer información o mejorar la calidad.

*Predeterminado: `false`*

### `course_analyser`

**Analizador de cursos**

Analiza todos los recursos en uno o varios cursos y preentrena el modelo de IA para responder cualquier pregunta sobre este o estos cursos (asegúrate de que el contenido pueda compartirse con los servicios de IA configurados).

*Predeterminado: `false`*

### `disclose_ai_assistance`

**Divulgar asistencia de IA**

Muestra una etiqueta en cualquier contenido o retroalimentación que haya sido generado o co-generado por un sistema de IA, evidenciando al usuario que el contenido fue creado con la ayuda de algún sistema de IA. Los detalles sobre qué sistema de IA se utilizó en cada caso se guardan en la base de datos para auditoría, pero no son directamente accesibles por el usuario final.

*Predeterminado: `true`*

### `enable_ai_helpers`

**Habilitar la herramienta de asistentes de IA**

Habilita todas las funciones impulsadas por IA disponibles en la plataforma.

*Predeterminado: `false`*

### `exercise_generator`

**Generador de ejercicios**

Genera pruebas personalizadas con IA basadas en el contenido del curso.

*Predeterminado: `false`*

### `glossary_terms_generator`

**Generador de términos de glosario**

Permite a los profesores solicitar términos de glosario generados por IA en su curso. Esto generará 20 términos basados en el título del curso y la descripción general en la herramienta de descripción del curso. Si se usa más de una vez, excluirá los términos ya presentes en ese glosario (asegúrate de que el contenido pueda compartirse con los servicios de IA configurados).

*Predeterminado: `false`*

### `image_generator`

**Generador de imágenes**

Genera imágenes basadas en indicaciones o contenido utilizando IA.

*Predeterminado: `false`*

### `learning_path_generator`

**Generador de rutas de aprendizaje**

Genera rutas de aprendizaje personalizadas utilizando sugerencias de IA.

*Predeterminado: `false`*

### `open_answers_grader`

**Calificador de respuestas abiertas**

Califica automáticamente respuestas abiertas utilizando IA.

*Predeterminado: `false`*

### `task_grader`

**Calificador de tareas**

Utiliza IA para evaluar y calificar tareas enviadas.

*Predeterminado: `false`*

### `tutor_chatbot`

**Chatbot tutor impulsado por IA**

Proporciona a los estudiantes un asistente de tutoría impulsado por IA.

*Predeterminado: `false`*

### `video_generator`

**Generador de videos**

Genera videos basados en indicaciones o contenido utilizando IA (esto podría consumir muchos tokens).

*Predeterminado: `false`*