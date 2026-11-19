# Configuración de los asistentes de IA

Configuración de los asistentes de IA (generación de texto, generación de imágenes, generación de vídeo, tutor de IA, calificación con IA). Cada proveedor puede habilitarse por tipo de tarea. Véase también [Configuración de IA](../integrations/ai-configuration.md).

Acceda a estos ajustes en **Administración > Parámetros de configuración > Asistentes de IA**. Esta categoría contiene **15 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `ai_providers`

**Datos de conexión de los proveedores de IA**

Datos de configuración para conectarse con servicios externos de IA.

### `content_analyser`

**Analizador de contenido**

Analiza los materiales de aprendizaje para extraer información o mejorar la calidad.

*Valor predeterminado: `false`*

### `course_analyser`

**Analizador de cursos**

Analiza todos los recursos de uno o varios cursos y preentrena el modelo de IA para responder cualquier pregunta sobre este o estos cursos (asegúrese de que el contenido pueda compartirse con los servicios de IA configurados).

*Valor predeterminado: `false`*

### `disclose_ai_assistance`

**Divulgar la asistencia de IA**

Muestra una etiqueta en cualquier contenido o retroalimentación que haya sido generado o cogenerado por un sistema de IA, evidenciando al usuario que el contenido se elaboró con la ayuda de algún sistema de IA. Los detalles sobre qué sistema de IA se utilizó en cada caso se conservan en la base de datos para auditoría, pero no son accesibles directamente por el usuario final.

*Valor predeterminado: `true`*

### `enable_ai_helpers`

**Habilitar la herramienta de asistente de IA**

Habilita todas las funciones basadas en IA disponibles en la plataforma.

*Valor predeterminado: `false`*

### `exercise_generator`

**Generador de ejercicios**

Genera pruebas personalizadas con IA a partir del contenido del curso.

*Valor predeterminado: `false`*

### `glossary_terms_generator`

**Generador de términos del glosario**

Permite a los docentes solicitar términos de glosario generados por IA en su curso. Esto generará 20 términos a partir del título del curso y de la descripción general en la herramienta de descripción del curso. Si se utiliza más de una vez, excluirá los términos que ya estén presentes en ese glosario (asegúrese de que el contenido pueda compartirse con los servicios de IA configurados).

*Valor predeterminado: `false`*

### `image_generator`

**Generador de imágenes**

Genera imágenes a partir de indicaciones o contenido mediante IA.

*Valor predeterminado: `false`*

### `learning_path_generator`

**Generador de itinerarios de aprendizaje**

Genera itinerarios de aprendizaje personalizados mediante sugerencias de IA.

*Valor predeterminado: `false`*

### `open_answers_grader`

**Calificador de respuestas abiertas**

Califica automáticamente las respuestas abiertas mediante IA.

*Valor predeterminado: `false`*

### `task_grader`

**Calificador de tareas**

Utiliza la IA para evaluar y calificar las tareas cargadas.

*Valor predeterminado: `false`*

### `toolbox`

**Caja de herramientas de IA**

Permite a los docentes crear y versionar aplicaciones educativas asistidas por IA dentro de los cursos.

*Valor predeterminado: `false`*

### `tutor_chatbot`

**Chatbot tutor impulsado por IA**

Proporciona a los estudiantes un asistente de tutoría basado en IA.

*Valor predeterminado: `false`*

### `video_generator`

**Generador de vídeo**

Genera vídeos a partir de indicaciones o contenido mediante IA (esto puede consumir muchos tokens).

*Valor predeterminado: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Permitir la traducción con IA a todos los idiomas activos en los editores WYSIWYG**

Permite a los docentes generar traducciones para todos los idiomas activos de la plataforma en una sola acción del editor WYSIWYG. Esto puede consumir un gran número de tokens de IA.

*Valor predeterminado: `true`*