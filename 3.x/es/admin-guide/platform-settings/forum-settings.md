# Configuración de foros

Comportamiento de la herramienta **Foros** del curso.

Acceda a estos ajustes en **Administración > Ajustes de configuración > Foros**. Esta categoría contiene **9 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_forum_category_language_filter`

**Filtro de idioma de las categorías de foro**

Añade un filtro de idioma a la vista del foro para ver únicamente las categorías configuradas en un idioma concreto. Requiere el uso del campo extra «language» en la entidad «forum_category».

*Valor predeterminado: `false`*

### `allow_forum_post_revisions`

**Revisión de mensajes del foro**

Active esta opción para permitir solicitar una revisión o una traducción de un mensaje propio en un foro. Con una configuración exhaustiva, puede usarse para colaborar con otros usuarios en un foro de aprendizaje de idiomas.

*Valor predeterminado: `false`*

### `community_managers_user_list`

**Lista de gestores de la comunidad**

Proporcione un array de identificadores de usuario que se considerarán gestores de la comunidad en el curso especial designado como foro global. Los gestores de la comunidad tienen privilegios adicionales en el foro global.

### `default_forum_view`

**Vista predeterminada del foro**

Cuál debe ser la opción predeterminada al crear un foro nuevo. Cualquier formador puede, no obstante, elegir una vista distinta para cada foro individual.

*Valor predeterminado: `flat`*

### `display_groups_forum_in_general_tool`

**Mostrar foros de grupo en el foro general**

Muestra los foros de grupo en la herramienta de foro a nivel de curso. Esta opción está activada de forma predeterminada (en ese caso, las visibilidades individuales de los foros de grupo siguen actuando como criterio adicional). Si se desactiva, los foros de grupo solo serán visibles a través de la herramienta de grupos, sean públicos o no.

*Valor predeterminado: `true`*

### `forum_fold_categories`

**Plegar categorías de foro**

Efecto visual para permitir plegar y desplegar las categorías de foro.

*Valor predeterminado: `false`*

### `global_forums_course_id`

**Usar un curso como foro global**

Establezca el ID de curso (numérico) de un curso reservado para usarlo como foro global. Esto sustituye el enlace «Grupos sociales» de la red social por un enlace al foro de ese curso.

*Valor predeterminado: `0`*

### `hide_forum_post_revision_language`

**Ocultar el idioma de la revisión del mensaje del foro**

Oculta la posibilidad de asignar un idioma a la revisión de un mensaje del foro.

*Valor predeterminado: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificaciones de foro también del curso base**

Active esta opción para habilitar las notificaciones procedentes del foro del curso base, incluso si se sigue el curso a través de una sesión.

*Valor predeterminado: `false`*