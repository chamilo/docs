# Configuraciones de Seguimiento

Valores predeterminados relacionados con el seguimiento: qué se registra, qué informes se exponen, reglas de cómputo de tiempo.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Seguimiento**. Esta categoría contiene **10 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `block_my_progress_page`

**Evitar el acceso a 'Mi progreso'**

En implementaciones específicas como exámenes en línea, es posible que desee impedir el acceso de los usuarios a la página 'Mi progreso'.

*Predeterminado: `false`*

### `footer_extra_content`

**Contenido adicional en el pie de página**

Puede agregar código HTML como etiquetas meta.

### `header_extra_content`

**Contenido adicional en el encabezado**

Puede agregar código HTML como etiquetas meta.

### `meta_description`

**Descripción meta**

Esto mostrará una meta descripción de OpenGraph (og:description) en los encabezados de su sitio.

### `meta_image_path`

**Ruta de la imagen meta**

Esta ruta de imagen meta es la ruta a un archivo dentro de su directorio de Chamilo (por ejemplo, home/image.png) que debería mostrarse en una tarjeta de Twitter o una tarjeta de OpenGraph al mostrar un enlace a su LMS. Twitter recomienda una imagen de 120 x 120 píxeles, que a veces puede recortarse a 120x90.

### `meta_title`

**Título meta de OpenGraph**

Esto mostrará un meta título de OpenGraph (og:title) en los encabezados de su sitio.

### `meta_twitter_creator`

**Cuenta de creador en Twitter**

El Creador de Twitter es una cuenta de Twitter (por ejemplo, @ywarnier) que representa a la *persona* que creó el sitio. Este campo es opcional.

### `meta_twitter_site`

**Cuenta de sitio en Twitter**

El sitio de Twitter es una cuenta de Twitter (por ejemplo, @chamilo_news) que está relacionada con su sitio. Generalmente es una cuenta más temporal que la cuenta del creador de Twitter, o representa una entidad (en lugar de una persona). Este campo es obligatorio si desea que se muestren los campos meta de la tarjeta de Twitter.

### `my_progress_course_tools_order`

**Orden de las herramientas en la página 'Mi progreso'**

Cambie el orden de las herramientas mostradas en la página 'Mi progreso' para los estudiantes. Las opciones incluyen 'quizzes', 'learning_paths' y 'skills'.

### `tracking_skip_generic_data`

**Omitir datos genéricos en la página de auto-seguimiento del estudiante**

Si la página 'Mi progreso' tarda demasiado en cargar, es posible que desee eliminar el procesamiento de estadísticas genéricas para el usuario. En este caso, habilite esta configuración.

*Predeterminado: `false`*