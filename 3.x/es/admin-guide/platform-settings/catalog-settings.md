# Configuración del catálogo de cursos

Comportamiento del catálogo de cursos (la lista pública en la que los usuarios pueden explorar e inscribirse por sí mismos).

Acceda a estos ajustes en **Administración > Configuración > Catálogo de cursos**. Esta categoría contiene **13 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_session_auto_subscription`

**Suscripción automática a sesiones**

Habilitar la suscripción automática a sesiones para los usuarios.

*Predeterminado: `false`*

### `allow_students_to_browse_courses`

**Permitir la exploración a los estudiantes**

Permitir que los estudiantes exploren y filtren el catálogo de cursos.

*Predeterminado: `true`*

### `course_catalog_display_in_home`

**Mostrar el catálogo en la página de inicio**

Mostrar el bloque del catálogo de cursos en la página de inicio de la plataforma.

*Predeterminado: `false`*

### `course_catalog_hide_private`

**Ocultar cursos privados**

Excluir los cursos privados de la visualización del catálogo.

*Predeterminado: `true`*

### `course_catalog_published`

**Publicar el catálogo de cursos**

Hacer que el catálogo de cursos esté disponible para usuarios anónimos (el público general) sin necesidad de iniciar sesión.

*Predeterminado: `false`*

### `course_catalog_settings`

**Ajustes del catálogo de cursos**

Configuración JSON del catálogo de cursos: ajustes de enlaces, filtros, opciones de ordenación y más.

### `course_subscription_in_user_s_session`

**Suscripción en la vista de sesión**

Permitir que los usuarios se suscriban a cursos directamente desde su página de sesión.

*Predeterminado: `false`*

### `hide_public_link`

**Ocultar enlace público**

Eliminar el enlace de URL pública de las tarjetas de curso.

*Predeterminado: `false`*

### `only_show_course_from_selected_category`

**Mostrar solo las categorías coincidentes en el catálogo de cursos**

Cuando no está vacío, solo aparecerán en el catálogo de cursos los cursos de las categorías indicadas.

### `only_show_selected_courses`

**Solo cursos seleccionados**

Mostrar en el catálogo únicamente los cursos seleccionados de forma manual.

*Predeterminado: `false`*

### `session_catalog_settings`

**Ajustes del catálogo de sesiones**

Configuración JSON del catálogo de sesiones: filtros y opciones de visualización.

### `show_courses_descriptions_in_catalog`

**Mostrar descripciones de cursos**

Mostrar las descripciones de los cursos dentro del listado del catálogo.

*Predeterminado: `false`*

### `show_courses_sessions`

**Mostrar cursos y sesiones**

Incluir tanto cursos como sesiones en los resultados del catálogo.

*Predeterminado: `0`*