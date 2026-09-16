# Configuración del Glosario

Comportamiento de la herramienta **Glosario** del curso.

Acceda a estas configuraciones en **Administración > Configuraciones > Glosario**. Esta categoría contiene **3 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_remove_tags_in_glossary_export`

**Eliminar etiquetas HTML en la exportación del glosario**

Cuando está habilitado, las etiquetas HTML se eliminan de las definiciones de los términos del glosario al exportar.

*Predeterminado: `false`*

### `default_glossary_view`

**Vista predeterminada del glosario**

Elija qué vista ('table' o 'list') se utilizará de forma predeterminada en la herramienta de glosario.

*Predeterminado: `table`*

### `show_glossary_in_extra_tools`

**Mostrar los términos del glosario en herramientas adicionales**

Desde aquí puede configurar cómo agregar los términos del glosario en herramientas adicionales como la ruta de aprendizaje y la herramienta de ejercicios.