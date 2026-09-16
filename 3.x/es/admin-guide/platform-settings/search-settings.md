# Configuración de búsqueda

Configuración del sistema de búsqueda de texto completo (Xapian).

Acceda a estos ajustes en **Administración > Configuración > Búsqueda**. Esta categoría contiene **3 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `search_enabled`

**Función de búsqueda de texto completo**

Seleccione «Sí» para activar esta función. Depende en gran medida de la extensión Xapian para PHP, por lo que no funcionará si esta extensión no está instalada en su servidor, en la versión 1.x como mínimo.

*Predeterminado: `false`*


### `search_prefilter_prefix`

**Campo específico para el prefiltro**

Esta opción le permite elegir el campo específico que se usará en el tipo de búsqueda con prefiltro.

### `search_show_unlinked_results`

**Búsqueda de texto completo: mostrar resultados no vinculados**

Al mostrar los resultados de una búsqueda de texto completo, ¿qué debe hacerse con los resultados a los que el usuario actual no tiene acceso?

*Predeterminado: `true`*