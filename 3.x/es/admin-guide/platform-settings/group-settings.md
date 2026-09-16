# Configuración de grupos

Comportamiento de la herramienta **Grupos** del curso.

Acceda a estos ajustes en **Administración > Configuración > Grupos**. Esta categoría contiene **3 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_group_categories`

**Categorías de grupos**

¿Permitir a los profesores crear categorías en la herramienta Grupos?

*Valor predeterminado: `false`*


### `hide_course_group_if_no_tools_available`

**Ocultar el grupo del curso si no hay herramienta**

Si no hay ninguna herramienta disponible en un grupo y el usuario no está inscrito en el propio grupo, ocultar el grupo por completo en la lista de grupos.

*Valor predeterminado: `false`*


### `show_groups_to_users`

**Mostrar las clases a los usuarios**

Mostrar las clases a los usuarios. Las clases son una funcionalidad que permite inscribir o dar de baja grupos de usuarios en una sesión o un curso de forma directa, reduciendo la carga administrativa. Al activar esta opción, los estudiantes podrán ver a qué clase pertenecen a través de su interfaz de red social.

*Valor predeterminado: `false`*