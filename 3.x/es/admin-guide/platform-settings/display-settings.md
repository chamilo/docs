# Configuración de visualización

Cómo se muestra la plataforma a los usuarios: diseño de la página de inicio, gravatar, menús, comportamiento de la marca y preferencias visuales similares.

Acceda a estos ajustes en **Administración > Configuración > Visualización**. Esta categoría contiene **28 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `accessibility_font_resize`

**Función de accesibilidad para redimensionar la fuente**

Active esta opción para mostrar un conjunto de opciones de redimensionado de fuente en la parte superior derecha de su campus. Esto permitirá a las personas con discapacidad visual leer más fácilmente los contenidos de sus cursos.

*Valor predeterminado: `false`*

### `display_categories_on_homepage`

**Mostrar categorías en la página de inicio**

Esta opción mostrará u ocultará las categorías de cursos en la página de inicio del portal

*Valor predeterminado: `false`*

### `enable_help_link`

**Activar el enlace de ayuda**

El enlace de Ayuda se encuentra en la parte superior derecha de la pantalla

*Valor predeterminado: `true`*

### `gravatar_enabled`

**Imágenes de usuario de Gravatar**

Active esta opción para buscar en el repositorio de Gravatar imágenes del usuario actual, si el usuario no ha definido una imagen de forma local. Es una excelente forma de rellenar automáticamente las imágenes en su sitio, en particular si sus usuarios son usuarios activos de Internet. Las imágenes de Gravatar se pueden configurar fácilmente, a partir de la dirección de correo electrónico de un usuario, en http://en.gravatar.com/

*Valor predeterminado: `false`*

### `gravatar_type`

**Tipo de avatar de Gravatar**

Si la opción de Gravatar está activada y el usuario no tiene una imagen configurada en Gravatar, esta opción le permite elegir el tipo de avatar que Gravatar generará para cada usuario. Consulte <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> para ver ejemplos de tipos de avatar.

*Valor predeterminado: `mm`*

### `hide_complete_name_in_whoisonline`

**Ocultar el nombre de usuario completo en «quién está en línea»**

La página «quién está en línea» (si está activada) mostrará una imagen y un nombre para cada usuario que esté en línea en ese momento. Active esta opción para ocultar los nombres.

*Valor predeterminado: `false`*

### `hide_home_top_when_connected` **v3**

**Ocultar el contenido superior de la página de inicio al iniciar sesión**

En la página de inicio de la plataforma, esta opción le permite ocultar el bloque de introducción (para dejar, por ejemplo, solo los anuncios) para todos los usuarios que ya hayan iniciado sesión. El bloque de introducción general seguirá apareciendo para los usuarios que aún no hayan iniciado sesión.

*Valor predeterminado: `false`*

### `hide_logout_button`

**Ocultar el botón de cierre de sesión**

Oculta el botón de cierre de sesión. Suele ser interesante únicamente cuando se utiliza un método externo de inicio/cierre de sesión, por ejemplo al usar algún tipo de inicio de sesión único (Single Sign On).

*Valor predeterminado: `false`*

### `hide_main_navigation_menu`

**Ocultar el menú de navegación principal**

Cuando se usa Chamilo para un propósito específico (como un examen masivo en línea), es posible que desee reducir aún más las distracciones eliminando el menú lateral.

*Valor predeterminado: `false`*

### `hide_social_media_links`

**Ocultar los enlaces a redes sociales**

Algunas páginas le permiten promocionar el portal o un curso en redes sociales. Active este ajuste para eliminar los enlaces.

*Valor predeterminado: `false`*

### `order_user_list_by_official_code`

**Ordenar usuarios por código oficial**

Utilice el «código oficial» para ordenar la mayoría de las listas de estudiantes en la plataforma, en lugar de su apellido o nombre.

*Valor predeterminado: `false`*

### `pdf_logo_header`

**Logotipo de cabecera PDF**

Si se debe usar la imagen en var/themes/[your-theme]/images/pdf_logo_header.png como logotipo de cabecera PDF para todas las exportaciones PDF (en lugar del logotipo normal del portal)

### `show_admin_toolbar`

**Mostrar la barra de herramientas de administración**

Muestra una barra de herramientas global en la parte superior de la página a los roles de usuario designados. Esta barra, muy similar a las barras negras de Wordpress y Google, puede acelerar realmente las acciones complejas y mejorar el espacio disponible para el contenido de aprendizaje, pero puede resultar confusa para algunos usuarios

*Valor predeterminado: `do_not_show`*

### `show_administrator_data` **v3**

**Información del administrador de la plataforma en el pie de página**

¿Mostrar la información del administrador de la plataforma en el pie de página?

*Valor predeterminado: `true`*

### `show_back_link_on_top_of_tree`

**Mostrar enlaces de retorno desde categorías/cursos**

Mostrar un enlace para volver atrás en la jerarquía de cursos. De todos modos hay un enlace disponible al final de la lista.

*Valor predeterminado: `false`*

### `show_closed_courses`

**¿Mostrar cursos cerrados en la página de inicio de sesión y en la página de inicio del portal?**

¿Mostrar los cursos cerrados en la página de inicio de sesión y en la página de inicio de cursos? En la página de inicio del portal aparecerá un icono junto a los cursos para inscribirse rápidamente en cada uno. Esto solo aparecerá en la página de inicio del portal cuando el usuario haya iniciado sesión y cuando el usuario aún no esté inscrito en el portal.

*Valor predeterminado: `false`*

### `show_email_addresses`

**Mostrar direcciones de correo electrónico**

Mostrar las direcciones de correo electrónico a los usuarios

*Predeterminado: `false`*

### `show_empty_course_categories`

**Mostrar categorías de cursos vacías**

Mostrar las categorías de cursos en la página de inicio, incluso si están vacías

*Predeterminado: `true`*

### `show_hot_courses`

**Mostrar cursos destacados**

La lista de cursos destacados se añadirá en la página de índice

*Predeterminado: `true`*

### `show_number_of_courses`

**Mostrar número de cursos**

Mostrar el número de cursos en cada categoría en las categorías de cursos de la página de inicio

*Predeterminado: `false`*

### `show_tabs`

**Entradas del menú principal**

Marque las entradas que desea que aparezcan en el menú principal

*Predeterminado:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entradas del menú principal por rol**

Definir la visibilidad de las pestañas de cabecera por rol.

*Predeterminado: `{}`*

### `show_teacher_data` **v3**

**Mostrar información del profesor en el pie de página**

¿Mostrar la referencia del profesor (nombre y correo electrónico si está disponible) en el pie de página?

*Predeterminado: `true`*

### `show_tutor_data` **v3**

**Los datos del tutor de la sesión se muestran en el pie de página.**

¿Mostrar la referencia del tutor de la sesión (nombre y correo electrónico si está disponible) en el pie de página?

*Predeterminado: `true`*

### `showonline`

**Quién está en línea**

¿Mostrar el número de personas que están en línea?

*Predeterminado: `world`*

### `table_default_row`

**Número predeterminado de filas de tabla**

Cuántas filas deben mostrarse en todas las tablas de forma predeterminada.

*Predeterminado: `20`*

### `table_row_list`

**Números de paginación ofrecidos de forma predeterminada en las tablas**

Establezca las opciones que desea que aparezcan en la navegación alrededor de una tabla para mostrar menos o más filas en una página. p. ej. [50, 100, 200, 500].

*Predeterminado: `[10,20,50,100]`*

### `time_limit_whosonline`

**Límite de tiempo en Quién está en línea**

Este límite de tiempo define durante cuántos minutos después de su última acción un usuario se considerará *en línea*

*Predeterminado: `30`*