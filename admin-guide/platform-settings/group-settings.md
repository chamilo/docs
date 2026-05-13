# Configuración de Grupos

Comportamiento de la herramienta de **Grupos** del curso.

Acceda a estas configuraciones en **Administración > Configuraciones > Grupos**. Esta categoría contiene **3 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_group_categories`

**Categorías de grupos**

¿Permitir a los profesores crear categorías en la herramienta de Grupos?

*Predeterminado: `false`*

### `hide_course_group_if_no_tools_available`

**Ocultar grupo del curso si no hay herramientas**

Si no hay herramientas disponibles en un grupo y el usuario no está registrado en el grupo mismo, ocultar el grupo completamente en la lista de grupos.

*Predeterminado: `false`*

### `show_groups_to_users`

**Mostrar clases a los usuarios**

Mostrar las clases a los usuarios. Las clases son una funcionalidad que permite registrar/desregistrar grupos de usuarios en una sesión o un curso directamente, reduciendo la carga administrativa. Cuando selecciona esta opción, los estudiantes podrán ver en qué clase están a través de su interfaz de red social.

*Predeterminado: `false`*