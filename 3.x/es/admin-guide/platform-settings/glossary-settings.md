# Configuración del glosario

Comportamiento de la herramienta **Glossary** del curso.

Acceda a estos ajustes en **Administración > Ajustes de configuración > Glosario**. Esta categoría contiene **3 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_remove_tags_in_glossary_export`

**Eliminar etiquetas HTML en la exportación del glosario**

Cuando está habilitado, las etiquetas HTML se eliminan de las definiciones de los términos del glosario al exportar.

*Valor predeterminado: `false`*

### `default_glossary_view`

**Vista predeterminada del glosario**

Elija qué vista ('table' o 'list') se utilizará de forma predeterminada en la herramienta de glosario.

*Valor predeterminado: `table`*

### `show_glossary_in_extra_tools`

**Mostrar los términos del glosario en herramientas adicionales**

Desde aquí puede configurar cómo añadir los términos del glosario en herramientas adicionales como la ruta de aprendizaje y la herramienta de ejercicios