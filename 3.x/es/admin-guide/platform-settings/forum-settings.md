# Configuración de los foros

Comportamiento de la herramienta **Foros** del curso.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Foros**. Esta categoría contiene **16 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts mediante la API o cuando necesite modificar estos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_forum_category_language_filter`

**Filtro de idioma de las categorías del foro**

Añade un filtro de idioma a la vista del foro para ver únicamente las categorías configuradas en un idioma específico. Requiere el uso del campo adicional «language» en la entidad «forum_category».

*Valor predeterminado: `false`*

### `allow_forum_post_revisions`

**Revisión de mensajes del foro**

Active esta opción para permitir solicitar una revisión o una traducción de un mensaje propio en un foro. Cuando se configura de forma exhaustiva, puede utilizarse para colaborar con otros usuarios en un foro de aprendizaje de idiomas.

*Valor predeterminado: `false`*

### `community_managers_user_list`

**Lista de gestores de la comunidad**

Proporcione un array de identificadores de usuario que se considerarán gestores de la comunidad en el curso especial designado como foro global. Los gestores de la comunidad disponen de privilegios adicionales en el foro global.

### `default_forum_view`

**Vista predeterminada del foro**

Cuál debe ser la opción predeterminada al crear un foro nuevo. Cualquier formador puede, no obstante, elegir una vista distinta para cada foro individual.

*Valor predeterminado: `flat`*

### `display_groups_forum_in_general_tool`

**Mostrar los foros de grupo en el foro general**

Muestra los foros de grupo en la herramienta de foros a nivel de curso. Esta opción está activada de forma predeterminada (en este caso, las visibilidades individuales de los foros de grupo siguen actuando como criterio adicional). Si se desactiva, los foros de grupo solo serán visibles a través de la herramienta de grupos, sean públicos o no.

*Valor predeterminado: `true`*

### `first_reply_min_words`

**Mínimo de palabras para la primera respuesta del foro**

Longitud mínima de la respuesta cuando el usuario no tiene ningún mensaje previo en el mismo hilo del foro. Una respuesta más corta se rechaza con un mensaje que indica este mínimo y el número de palabras que contiene la respuesta. Solo cuentan las palabras del texto, no su formato. Se aplica a todos los usuarios que responden a un hilo, pero no al mensaje de apertura de un hilo nuevo. Establézcalo en 0 para aceptar respuestas de cualquier longitud.

*Valor predeterminado: `0`*

### `forum_fold_categories`

**Plegar las categorías del foro**

Efecto visual para activar el plegado y desplegado de las categorías del foro.

*Valor predeterminado: `false`*

### `forum_participation_can_be_modified_in_course`

**Los ajustes de participación en el foro pueden modificarse por curso**

Cuando está activado, los docentes pueden elegir en la sección Foro de los ajustes del curso si su curso oculta las respuestas del hilo hasta que el estudiante publique, muestra la descripción de la categoría en los hilos y cuántos mensajes espera la barra de progreso de participación, en lugar de seguir los ajustes de la plataforma.

*Valor predeterminado: `false`*

### `global_forums_course_id`

**Usar un curso como foro global**

Establezca el identificador de curso (numérico) de un curso reservado para utilizarlo como foro global. Esto sustituye el enlace «Grupos sociales» de la red social por un enlace al foro de ese curso.

*Valor predeterminado: `0`*

### `hide_forum_post_revision_language`

**Ocultar el idioma de la revisión de mensajes del foro**

Oculta la posibilidad de asignar un idioma a la revisión de un mensaje del foro.

*Valor predeterminado: `false`*

### `show_category_description_in_thread`

**Mostrar la descripción de la categoría del foro en los hilos**

Muestra el título de la categoría y una descripción abreviada encima de cada hilo, con **Leer más** disponible para una descripción larga.

*Valor predeterminado: `false`*

### `show_thread_replies_after_participation`

**Mostrar las respuestas del hilo solo después de participar**

Para los estudiantes, devuelve únicamente el mensaje de apertura de un hilo hasta que ellos mismos contribuyan con un mensaje. Los administradores, los docentes, los tutores de sesión y los tutores de grupo siguen viendo todos los mensajes; los mensajes en espera de moderación cuentan para la participación.

*Valor predeterminado: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificaciones del foro también desde el curso base**

Active esta opción para habilitar las notificaciones procedentes del foro del curso base, incluso si se sigue el curso a través de una sesión.

*Valor predeterminado: `false`*

### `subsequent_reply_min_words`

**Mínimo de palabras para las respuestas posteriores del foro**

Longitud mínima de la respuesta cuando el usuario ya tiene un mensaje en el mismo hilo del foro, para exigir, por ejemplo, una primera respuesta sustancial y permitir respuestas de seguimiento más breves. Una respuesta más corta se rechaza con un mensaje que indica este mínimo y el número de palabras que contiene la respuesta. Establézcalo en 0 para aceptar respuestas de cualquier longitud.

*Valor predeterminado: `0`*

### `thread_max_posts_for_non_admins`

**Número máximo de mensajes mostrados en un hilo del foro**

Muestra únicamente este número de mensajes de cada hilo del foro a todo usuario que no sea administrador de la plataforma, incluidos los profesores, y a todas las personas dentro de un itinerario de aprendizaje. En las vistas en hilo y anidadas, el límite se aplica a las respuestas de cada mensaje. Los mensajes se mantienen en el orden de la vista: los primeros, o los más recientes dentro de un itinerario de aprendizaje, donde los mensajes más recientes aparecen primero. Establezca el valor en 0 para mostrar todos los mensajes. La lista de hilos y la búsqueda del foro no están limitadas.

*Predeterminado: `0`*

### `thread_participation_progress_posts`

**Mensajes necesarios para completar un hilo del foro**

Número de mensajes del estudiante necesarios para que la barra de progreso alcance el 100 %. Los mensajes moderados pendientes de aprobación se contabilizan. Establezca el valor en `0` para ocultar la barra. Esto es independiente del requisito de un único mensaje para revelar las demás respuestas.

*Predeterminado: `0`*