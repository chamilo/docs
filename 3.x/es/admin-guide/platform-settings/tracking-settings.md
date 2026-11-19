# Configuración de seguimiento

Valores predeterminados relacionados con el seguimiento: qué se registra, qué informes se exponen y las reglas de cálculo del tiempo.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Seguimiento**. Esta categoría contiene **14 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `block_my_progress_page`

**Impedir el acceso a «Mi progreso»**

En implementaciones específicas, como los exámenes en línea, es posible que desee impedir el acceso de los usuarios a la página «Mi progreso».

*Valor predeterminado: `false`*

### `footer_extra_content`

**Contenido adicional en el pie de página**

Puede añadir código HTML, como metaetiquetas

### `header_extra_content`

**Contenido adicional en la cabecera**

Puede añadir código HTML, como metaetiquetas

### `meta_description`

**Meta descripción**

Esto mostrará una meta descripción de OpenGraph (og:description) en las cabeceras de su sitio

### `meta_image_path`

**Ruta de la imagen meta**

Esta ruta de imagen meta es la ruta a un archivo dentro de su directorio de Chamilo (p. ej., home/image.png) que debe mostrarse en una tarjeta de Twitter o en una tarjeta de OpenGraph al mostrar un enlace a su LMS. Twitter recomienda una imagen de 120 x 120 píxeles, que a veces puede recortarse a 120x90.

### `meta_title`

**Título meta de OpenGraph**

Esto mostrará un título meta de OpenGraph (og:title) en las cabeceras de su sitio

### `meta_twitter_creator`

**Cuenta de creador de Twitter**

El creador de Twitter es una cuenta de Twitter (p. ej., @ywarnier) que representa a la *persona* que creó el sitio. Este campo es opcional.

### `meta_twitter_site`

**Cuenta del sitio de Twitter**

El sitio de Twitter es una cuenta de Twitter (p. ej., @chamilo_news) relacionada con su sitio. Suele ser una cuenta más temporal que la cuenta del creador de Twitter, o representa a una entidad (en lugar de a una persona). Este campo es obligatorio si desea que se muestren los campos meta de la tarjeta de Twitter.

### `my_progress_course_tools_order`

**Orden de las herramientas en la página «Mi progreso»**

Cambie el orden de las herramientas que se muestran en la página «Mi progreso» para los estudiantes. Las opciones incluyen 'quizzes', 'learning_paths' y 'skills'.

### `tracking_skip_generic_data`

**Omitir datos genéricos en la página de autoseguimiento del estudiante**

Si la página «Mi progreso» tarda demasiado en cargarse, es posible que desee eliminar el procesamiento de estadísticas genéricas del usuario. En ese caso, active este ajuste.

*Valor predeterminado: `false`*

### `hide_ip_address`

**Ocultar la dirección IP en los informes**

Oculta las direcciones IP de los informes visuales y de las exportaciones de informes. El ajuste está activado de forma predeterminada; ocultar los valores en los informes no borra las direcciones IP ya almacenadas ni impide el acceso mediante procedimientos autorizados de datos personales.

*Valor predeterminado: `true`*

Consulte [PR de visibilidad de IP n.º 9312](https://github.com/chamilo/chamilo-lms/pull/9312).

### `maximum_inactive_time_to_consider`

**Tiempo máximo de inactividad a considerar (minutos)**

Una página de curso que permanece abierta puede generar solicitudes automáticas. Tras este intervalo sin una acción significativa del usuario, el periodo deja de contribuir al tiempo de actividad del curso registrado. Se trata de una regla de informes, no de un mecanismo de cierre de sesión automático.

*Valor predeterminado: `15` minutos*

### `max_time_spent_per_session_threshold`

**Umbral de tiempo máximo dedicado por sesión (minutos)**

Limita la cantidad de una única sesión de inicio de sesión que se contabiliza como actividad en los informes, de modo que una sesión abierta excepcionalmente larga no infle los totales de tiempo de estudio. Las sesiones de inicio de sesión independientes pueden seguir contribuyendo al tiempo total. Esto no finaliza la sesión del estudiante.

*Valor predeterminado: `360` minutos*

Consulte [PR de límite de tiempo de sesión n.º 9445](https://github.com/chamilo/chamilo-lms/pull/9445).

### `recycle_bin_retention_hours`

**Retención de la papelera de reciclaje (horas)**

Antigüedad mínima de los intentos de ejercicio eliminados y del progreso de las lecciones antes de que se permita la purga permanente. El comando de limpieza `chamilo:recycle-bin:purge` muestra una vista previa de forma predeterminada; la limpieza permanente requiere `--execute`. El ajuste no programa por sí mismo una limpieza automática.

*Valor predeterminado: `720` horas (30 días)*

Consulte [PR de papeleras de reciclaje de ejercicios y lecciones n.º 9383](https://github.com/chamilo/chamilo-lms/pull/9383).