# Configuración de Foros

Comportamiento de la herramienta de **Foros** del curso.

Accede a estas configuraciones en **Administración > Configuraciones > Foros**. Esta categoría contiene **9 configuraciones**, listadas a continuación con el título y comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando hagas scripting a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_forum_category_language_filter`

**Filtro de idioma para categorías de foro**

Añade un filtro de idioma a la vista del foro para ver solo las categorías configuradas en un idioma específico. Requiere usar el campo adicional 'language' en la entidad 'forum_category'.

*Predeterminado: `false`*

### `allow_forum_post_revisions`

**Revisión de publicaciones en el foro**

Habilita esta opción para permitir solicitar una revisión o traducción de una publicación en el foro. Cuando se configura de manera extensiva, puede usarse para colaborar con otros usuarios en un foro de aprendizaje de idiomas.

*Predeterminado: `false`*

### `community_managers_user_list`

**Lista de gestores de comunidad**

Proporciona un arreglo de IDs de usuarios que serán considerados gestores de comunidad en el curso especial designado como foro global. Los gestores de comunidad tienen privilegios adicionales en el foro global.

### `default_forum_view`

**Vista predeterminada del foro**

Cuál debería ser la opción predeterminada al crear un nuevo foro. Sin embargo, cualquier formador puede elegir una vista diferente para cada foro individual.

*Predeterminado: `flat`*

### `display_groups_forum_in_general_tool`

**Mostrar foros de grupo en el foro general**

Muestra los foros de grupo en la herramienta de foro a nivel del curso. Esta opción está habilitada por defecto (en este caso, las visibilidades individuales de los foros de grupo aún actúan como un criterio adicional). Si se desactiva, los foros de grupo solo serán visibles a través de la herramienta de grupos, sean públicos o no.

*Predeterminado: `true`*

### `forum_fold_categories`

**Plegar categorías de foro**

Efecto visual para habilitar el plegado/desplegado de categorías de foro.

*Predeterminado: `false`*

### `global_forums_course_id`

**Usar curso como foro global**

Establece el ID del curso (numérico) de un curso reservado para usar como foro global. Esto reemplaza el enlace de 'Grupos sociales' en la red social por un enlace al foro de ese curso.

*Predeterminado: `0`*

### `hide_forum_post_revision_language`

**Ocultar idioma de revisión de publicaciones en el foro**

Oculta la posibilidad de asignar un idioma a una revisión de publicación en el foro.

*Predeterminado: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificaciones de foro también desde el curso base**

Habilita esta opción para permitir notificaciones provenientes del foro del curso base, incluso si se sigue el curso a través de una sesión.

*Predeterminado: `false`*