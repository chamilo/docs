# Configuración de Idiomas

Idiomas disponibles, idioma predeterminado y cómo Chamilo determina qué idioma mostrar.

Acceda a estas configuraciones en **Administración > Configuraciones > Idiomas**. Esta categoría contiene **12 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_course_multiple_languages`

**Cursos en múltiples idiomas**

Habilita cursos gestionados en más de un idioma. Esta opción agrega un selector de idioma dentro de la página del curso para permitir a los usuarios cambiar fácilmente, y añade un campo extra 'multiple_language' a los cursos que permite procedimientos de gestión remota.

*Predeterminado: `false`*

### `allow_use_sub_language`

**Permitir definición y uso de subidiomas**

Al habilitar esta opción, podrá definir variaciones para cada uno de los términos de idioma utilizados en la interfaz de la plataforma, en forma de un nuevo idioma basado en y que extiende un idioma existente. Encontrará esta opción en la sección de idiomas del panel de administración.

*Predeterminado: `false`*

### `auto_detect_language_custom_pages`

**Habilitar detección automática de idioma en páginas personalizadas**

Si utiliza páginas personalizadas, habilite esta opción si desea que un detector de idioma presente la página en el idioma del navegador del usuario, o desactívela para forzar que el idioma sea el idioma predeterminado de la plataforma.

*Predeterminado: `true`*

### `language_flags_by_country`

**Banderas de idioma**

Usar banderas de países para los idiomas. Esto no está habilitado por defecto porque algunos idiomas no están estrictamente vinculados a un país, lo que puede generar frustración en algunos usuarios.

*Predeterminado: `false`*

### `language_priority_1`

**Idioma de mayor prioridad**

Idioma principal seleccionado cuando se establecen múltiples contextos de idioma.

*Predeterminado: `course_lang`*

### `language_priority_2`

**Idioma de prioridad secundaria**

Idioma de respaldo secundario si el de primera prioridad no está disponible o está fuera de contexto.

*Predeterminado: `user_profil_lang`*

### `language_priority_3`

**Idioma de tercera prioridad**

Idioma de respaldo terciario si las prioridades superiores fallan.

*Predeterminado: `user_selected_lang`*

### `language_priority_4`

**Idioma de cuarta prioridad**

Última opción de idioma de respaldo por orden de prioridad.

*Predeterminado: `platform_lang`*

### `platform_language`

**Idioma predeterminado de la plataforma**

Idioma principal, utilizado por defecto cuando no se ha establecido un idioma para el usuario.

*Predeterminado: `en`*

### `show_different_course_language`

**Mostrar idiomas de los cursos**

Mostrar el idioma en el que está cada curso, junto al título del curso, en la lista de cursos de la página de inicio.

*Predeterminado: `true`*

### `show_language_selector_in_menu`

**Selector de idioma en el menú principal**

Mostrar un selector de idioma en el menú principal que actualiza de inmediato la preferencia de idioma del usuario. Esto puede ser útil en portales multilingües donde los estudiantes necesitan cambiar de un idioma a otro para su aprendizaje.

*Predeterminado: `true`*

### `template_activate_language_filter`

**Plantillas de documentos en múltiples idiomas**

Habilitar que las plantillas de documentos (a nivel de plataforma o curso) se configuren para idiomas específicos.

*Predeterminado: `false`*