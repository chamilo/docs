# Configuración de Visualización

Cómo se muestra la plataforma a los usuarios: diseño de la página de inicio, gravatar, menús, comportamiento de la marca y preferencias visuales similares.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Visualización**. Esta categoría contiene **24 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `accessibility_font_resize`

**Función de accesibilidad para redimensionar fuente**

Habilite esta opción para mostrar un conjunto de opciones de redimensionamiento de fuente en la esquina superior derecha de su campus. Esto permitirá a las personas con discapacidad visual leer el contenido de sus cursos más fácilmente.

*Predeterminado: `false`*

### `display_categories_on_homepage`

**Mostrar categorías en la página de inicio**

Esta opción mostrará u ocultará las categorías de cursos en la página de inicio del portal.

*Predeterminado: `false`*

### `enable_help_link`

**Habilitar enlace de ayuda**

El enlace de ayuda se encuentra en la parte superior derecha de la pantalla.

*Predeterminado: `true`*

### `gravatar_enabled`

**Imágenes de usuario de Gravatar**

Habilite esta opción para buscar en el repositorio de Gravatar imágenes del usuario actual, si el usuario no ha definido una imagen localmente. Esto es ideal para autocompletar imágenes en su sitio, especialmente si sus usuarios son activos en internet. Las imágenes de Gravatar se pueden configurar fácilmente basándose en la dirección de correo electrónico de un usuario en http://en.gravatar.com/

*Predeterminado: `false`*

### `gravatar_type`

**Tipo de avatar de Gravatar**

Si la opción de Gravatar está habilitada y el usuario no tiene una imagen configurada en Gravatar, esta opción le permite elegir el tipo de avatar que Gravatar generará para cada usuario. Consulte <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> para ejemplos de tipos de avatar.

*Predeterminado: `mm`*

### `hide_complete_name_in_whoisonline`

**Ocultar el nombre completo en 'quién está en línea'**

La página de 'quién está en línea' (si está habilitada) mostrará una imagen y un nombre para cada usuario actualmente conectado. Habilite esta opción para ocultar los nombres.

*Predeterminado: `false`*

### `hide_logout_button`

**Ocultar botón de cerrar sesión**

Oculta el botón de cerrar sesión. Esto suele ser útil solo cuando se utiliza un método de inicio/cierre de sesión externo, por ejemplo, al usar Single Sign On de algún tipo.

*Predeterminado: `false`*

### `hide_main_navigation_menu`

**Ocultar menú de navegación principal**

Cuando use Chamilo para un propósito específico (como un examen masivo en línea), es posible que desee reducir aún más las distracciones eliminando el menú lateral.

*Predeterminado: `false`*

### `hide_social_media_links`

**Ocultar enlaces a redes sociales**

Algunas páginas le permiten promocionar el portal o un curso en redes sociales. Habilite esta configuración para eliminar los enlaces.

*Predeterminado: `false`*

### `order_user_list_by_official_code`

**Ordenar usuarios por código oficial**

Use el 'código oficial' para ordenar la mayoría de las listas de estudiantes en la plataforma, en lugar de su apellido o nombre.

*Predeterminado: `false`*

### `pdf_logo_header`

**Logotipo de encabezado en PDF**

Si desea usar la imagen en var/themes/[su-tema]/images/pdf_logo_header.png como el logotipo de encabezado en PDF para todas las exportaciones de PDF (en lugar del logotipo normal del portal).

### `show_admin_toolbar`

**Mostrar barra de herramientas de administrador**

Muestra una barra de herramientas global en la parte superior de la página para los roles de usuario designados. Esta barra de herramientas, muy similar a las de Wordpress y Google, puede acelerar acciones complicadas y mejorar el espacio disponible para el contenido de aprendizaje, pero podría ser confusa para algunos usuarios.

*Predeterminado: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Mostrar enlaces de regreso desde categorías/cursos**

Muestra un enlace para regresar en la jerarquía de cursos. De todos modos, hay un enlace disponible al final de la lista.

*Predeterminado: `false`*

### `show_closed_courses`

**¿Mostrar cursos cerrados en la página de inicio de sesión y en la página de inicio del portal?**

¿Mostrar cursos cerrados en la página de inicio de sesión y en la página de inicio de cursos? En la página de inicio del portal aparecerá un ícono junto a los cursos para suscribirse rápidamente a cada uno. Esto solo aparecerá en la página de inicio del portal cuando el usuario esté conectado y cuando el usuario aún no esté suscrito al portal.

*Predeterminado: `false`*

### `show_email_addresses`

**Mostrar direcciones de correo electrónico**

Muestra las direcciones de correo electrónico a los usuarios.

*Predeterminado: `false`*

### `show_empty_course_categories`

**Mostrar categorías de cursos vacías**

Muestra las categorías de cursos en la página de inicio, incluso si están vacías.

*Predeterminado: `true`*

### `show_hot_courses`

**Mostrar cursos destacados**

La lista de cursos destacados se agregará en la página de índice.

*Predeterminado: `true`*

### `show_number_of_courses`

**Mostrar número de cursos**

Muestra el número de cursos en cada categoría en las categorías de cursos en la página de inicio.

*Predeterminado: `false`*

---
### `show_tabs`

**Entradas del menú principal**

Seleccione las entradas que desea que aparezcan en el menú principal.

*Predeterminado:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entradas del menú principal por rol**

Defina la visibilidad de las pestañas del encabezado según el rol.

*Predeterminado: `{}`*

### `showonline`

**Quién está en línea**

¿Mostrar el número de personas que están en línea?

*Predeterminado: `world`*

### `table_default_row`

**Número predeterminado de filas en tablas**

¿Cuántas filas deben mostrarse por defecto en todas las tablas?

*Predeterminado: `20`*

### `table_row_list`

**Números de paginación ofrecidos por defecto en tablas**

Establezca las opciones que desea que aparezcan en la navegación alrededor de una tabla para mostrar menos o más filas en una página. Por ejemplo, [50, 100, 200, 500].

*Predeterminado: `[10,20,50,100]`*

### `time_limit_whosonline`

**Límite de tiempo para Quién está en línea**

Este límite de tiempo define durante cuántos minutos después de su última acción un usuario será considerado *en línea*.

*Predeterminado: `30`*