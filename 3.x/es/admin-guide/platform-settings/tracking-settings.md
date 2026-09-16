# Ajustes de seguimiento

Valores predeterminados relacionados con el seguimiento: qué se registra, qué informes se exponen y las reglas de cálculo de tiempo.

Acceda a estos ajustes en **Administración > Ajustes de configuración > Seguimiento**. Esta categoría contiene **10 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `block_my_progress_page`

**Impedir el acceso a «Mi progreso»**

En implementaciones concretas, como exámenes en línea, es posible que desee impedir el acceso de los usuarios a la página «Mi progreso».

*Predeterminado: `false`*

### `footer_extra_content`

**Contenido extra en el pie de página**

Puede añadir código HTML, como metaetiquetas

### `header_extra_content`

**Contenido extra en la cabecera**

Puede añadir código HTML, como metaetiquetas

### `meta_description`

**Meta descripción**

Esto mostrará una meta OpenGraph Description (og:description) en las cabeceras de su sitio

### `meta_image_path`

**Ruta de la imagen meta**

Esta ruta de imagen meta es la ruta a un archivo dentro de su directorio de Chamilo (p. ej. home/image.png) que debería mostrarse en una tarjeta de Twitter o en una tarjeta OpenGraph al mostrar un enlace a su LMS. Twitter recomienda una imagen de 120 x 120 píxeles, que a veces puede recortarse a 120x90.

### `meta_title`

**Título meta OpenGraph**

Esto mostrará una meta OpenGraph Title (og:title) en las cabeceras de su sitio

### `meta_twitter_creator`

**Cuenta de creador de Twitter**

El creador de Twitter es una cuenta de Twitter (p. ej. @ywarnier) que representa a la *persona* que creó el sitio. Este campo es opcional.

### `meta_twitter_site`

**Cuenta del sitio de Twitter**

El sitio de Twitter es una cuenta de Twitter (p. ej. @chamilo_news) relacionada con su sitio. Suele ser una cuenta más temporal que la del creador de Twitter, o representa a una entidad (en lugar de a una persona). Este campo es obligatorio si desea que se muestren los campos meta de la tarjeta de Twitter.

### `my_progress_course_tools_order`

**Orden de las herramientas en la página «Mi progreso»**

Cambie el orden de las herramientas mostradas en la página «Mi progreso» para los alumnos. Las opciones incluyen 'quizzes', 'learning_paths' y 'skills'.

### `tracking_skip_generic_data`

**Omitir datos genéricos en la página de auto-seguimiento del alumno**

Si la página «Mi progreso» tarda demasiado en cargar, es posible que desee eliminar el procesamiento de estadísticas genéricas del usuario. En ese caso, active este ajuste.

*Predeterminado: `false`*