# Configuración de Búsqueda

Configuración del sistema de búsqueda de texto completo (Xapian).

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Búsqueda**. Esta categoría contiene **3 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `search_enabled`

**Función de búsqueda de texto completo**

Seleccione 'Sí' para habilitar esta función. Depende en gran medida de la extensión Xapian para PHP, por lo que no funcionará si esta extensión no está instalada en su servidor, en la versión 1.x como mínimo.

*Predeterminado: `false`*

### `search_prefilter_prefix`

**Campo específico para prefiltro**

Esta opción le permite elegir el campo específico a usar en el tipo de búsqueda con prefiltro.

### `search_show_unlinked_results`

**Búsqueda de texto completo: mostrar resultados no vinculados**

Al mostrar los resultados de una búsqueda de texto completo, ¿qué se debe hacer con los resultados que no son accesibles para el usuario actual?

*Predeterminado: `true`*