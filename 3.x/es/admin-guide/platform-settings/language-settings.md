# Configuración de idiomas

Idiomas disponibles, idioma predeterminado y cómo Chamilo determina qué idioma mostrar.

Acceda a estos ajustes en **Administración > Configuración > Idiomas**. Esta categoría contiene **13 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_course_multiple_languages`

**Cursos en varios idiomas**

Permite gestionar cursos en más de un idioma. Esta opción añade un selector de idioma en la página del curso para que los usuarios puedan cambiar fácilmente, y añade un campo extra `multiple_language` a los cursos que permite procedimientos de gestión remota.

*Predeterminado: `false`*


### `allow_use_sub_language`

**Permitir la definición y el uso de subidiomas**

Al activar esta opción, podrá definir variaciones para cada uno de los términos de idioma utilizados en la interfaz de la plataforma, en forma de un nuevo idioma basado en uno existente y que lo amplía. Encontrará esta opción en la sección de idiomas del panel de administración.

*Predeterminado: `false`*

### `auto_detect_language_custom_pages`

**Activar la detección automática de idioma en páginas personalizadas**

Si utiliza páginas personalizadas, actívelo si desea que un detector de idioma presente la página en el idioma del navegador del usuario, o desactívelo para forzar el idioma predeterminado de la plataforma.

*Predeterminado: `true`*


### `language_by_resource` **v3**

**Idioma por recurso**

Permite asignar un idioma específico a recursos individuales.

*Predeterminado: `false`*

### `language_flags_by_country`

**Banderas de idioma**

Utilizar banderas de países para los idiomas. No está activado de forma predeterminada porque algunos idiomas no están estrictamente vinculados a un país, lo que puede generar frustración en algunos usuarios.

*Predeterminado: `false`*


### `language_priority_1`

**Idioma de máxima prioridad**

Idioma principal seleccionado cuando hay varios contextos de idioma definidos.

*Predeterminado: `course_lang`*


### `language_priority_2`

**Idioma de prioridad secundaria**

Idioma de respaldo secundario si la primera prioridad no está disponible o está fuera de contexto.

*Predeterminado: `user_profil_lang`*


### `language_priority_3`

**Idioma de tercera prioridad**

Idioma de respaldo terciario si fallan las prioridades superiores.

*Predeterminado: `user_selected_lang`*


### `language_priority_4`

**Idioma de cuarta prioridad**

Última opción de idioma de respaldo por orden de prioridad.

*Predeterminado: `platform_lang`*


### `platform_language`

**Idioma predeterminado de la plataforma**

Idioma principal, utilizado de forma predeterminada cuando no hay un idioma de usuario definido.

*Predeterminado: `en`*


### `show_different_course_language`

**Mostrar idiomas de los cursos**

Mostrar el idioma de cada curso, junto al título del curso, en la lista de cursos de la página de inicio

*Predeterminado: `true`*


### `show_language_selector_in_menu`

**Selector de idioma en el menú principal**

Mostrar un selector de idioma en el menú principal que actualiza de inmediato la preferencia de idioma del usuario. Puede resultar útil en portales multilingües en los que los estudiantes deben cambiar de un idioma a otro para su aprendizaje.

*Predeterminado: `true`*


### `template_activate_language_filter`

**Plantillas de documentos en varios idiomas**

Permite configurar las plantillas de documentos (a nivel de plataforma o de curso) para idiomas específicos.

*Predeterminado: `false`*