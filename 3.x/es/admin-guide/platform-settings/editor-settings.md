# Configuración del editor

Configuración del editor de texto enriquecido (TinyMCE) utilizado en toda la plataforma: barras de herramientas, plugins y asistentes de IA en el editor.

Acceda a estos ajustes en **Administración > Configuración > Editor**. Esta categoría contiene **26 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_email_editor`

**Editor de correo electrónico en línea activado**

Si esta opción está activada, al hacer clic en una dirección de correo electrónico se abrirá un editor en línea.

### `allow_spellcheck`

**Corrector ortográfico**

Activar el corrector ortográfico

### `block_copy_paste_for_students`

**Bloquear copiar y pegar a los alumnos**

Impedir que los alumnos copien y peguen en el editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedir copiar y pegar imágenes en el editor WYSIWYG**

Impedir el uso de copiar y pegar imágenes como base64 en el editor para evitar llenar la base de datos de imágenes.

*Valor predeterminado: `false`*


### `editor_driver_list`

**Lista de controladores de archivos WYSIWYG**

Array que contiene los nombres de los controladores para el acceso a archivos desde el editor WYSIWYG.

### `editor_settings`

**Ajustes del editor WYSIWYG**

Array de configuración genérico para reconfigurar el editor WYSIWYG de forma global.

### `enable_iframe_inclusion`

**Permitir iframes en el editor HTML**

Permitir iframes arbitrarios en el editor HTML mejorará las capacidades de edición de los usuarios, pero puede representar un riesgo de seguridad. Asegúrese de poder confiar en sus usuarios (es decir, de saber quiénes son) antes de activar esta función.

### `enable_uploadimage_editor`

**Permitir arrastrar y soltar imágenes en el editor WYSIWYG**

Activar la carga de imágenes como archivo al copiar en el contenido o al arrastrar y soltar.

*Valor predeterminado: `false`*


### `enabled_asciisvg`

**Activar AsciiSVG**

Activar el plugin AsciiSVG en el editor WYSIWYG para dibujar gráficos a partir de funciones matemáticas.

### `enabled_googlemaps`

**Activar Google maps**

Activar el botón para insertar Google maps. La activación no se completa del todo si no se ha editado previamente el archivo main/inc/lib/fckeditor/myconfig.php y se ha añadido una clave de API de Google maps.

### `enabled_imgmap`

**Activar mapas de imagen**

Activar el botón para insertar mapas de imagen. Esto permite asociar URL a zonas de una imagen, creando hotspots.

### `enabled_insertHtml`

**Permitir la inserción de widgets**

Esto permite incrustar en sus páginas web sus vídeos y aplicaciones favoritos, como vimeo o slideshare, y todo tipo de widgets y gadgets

### `enabled_mathjax`

**Activar MathJax**

Activar la biblioteca MathJax para visualizar fórmulas matemáticas. Esto añade un botón de fórmulas a la barra de herramientas del editor, donde las fórmulas se escriben en LaTeX. Consulte [Fórmulas matemáticas](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Crear y editar archivos SVG**

Esta opción permite crear y editar SVG (Scalable Vector Graphics) en varias capas en línea, así como exportarlos a imágenes en formato png.

### `enabled_wiris`

**Editor matemático WIRIS**

Activar el editor matemático WIRIS. Al instalar este plugin se obtiene el editor WIRIS y WIRIS CAS.<br/>Esta activación no se completa del todo a menos que se haya descargado previamente el <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP para CKeditor WIRIS</a> y se haya descomprimido su contenido en el directorio de Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Esto es necesario porque Wiris es software propietario y sus servicios son <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciales</a>. Para ajustar el plugin, edite el archivo configuration.ini o reemplace su contenido por el archivo configuration.ini.default incluido con Chamilo.

### `force_wiki_paste_as_plain_text`

**Forzar el pegado como texto plano en la wiki**

Esto evitará que muchas etiquetas ocultas, incorrectas o no estándar, copiadas de otros textos, dejen de corromper el texto de la Wiki tras muchos problemas; pero se perderán algunas funciones al editar.

### `full_editor_toolbar_set`

**Barra de herramientas completa del editor WYSIWYG**

Mostrar la barra de herramientas completa en todos los recuadros del editor WYSIWYG de la plataforma.

*Valor predeterminado: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier en la Wiki**

Activar HTML purifier en la herramienta wiki (aumentará la seguridad pero reducirá las funciones de estilo)

### `include_asciimathml_script`

**Cargar la biblioteca Mathjax en todas las páginas del sistema**

Active este ajuste si desea mostrar fórmulas matemáticas basadas en MathML y gráficos matemáticos basados en ASCIIsvg no solo en la herramienta «Documentos», sino en el resto del sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Activar el editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botones extendida**

Habilitar las barras de botones extendidas cuando el editor WYSIWYG está maximizado

*Predeterminado: `true`*

### `save_titles_as_html`

**Guardar títulos como HTML**

Permitir a los usuarios incluir HTML en los campos de título en varios lugares. Esto permite cierto estilo en los títulos, especialmente en las preguntas de los exámenes. También permite que esos campos de título específicos utilicen el mismo etiquetado por idioma que `translate_html` más abajo, que los títulos de texto plano no pueden contener.

*Predeterminado: `false`*

### `translate_html`

**Compatibilidad con contenido HTML multiidioma**

Si está habilitada, esta opción permite a los usuarios usar un atributo ‘lang’ en elementos HTML para definir el idioma en el que está escrito el contenido de ese elemento. Habilite varios elementos con atributos ‘lang’ diferentes y Chamilo mostrará el contenido únicamente en el idioma del usuario.

*Predeterminado: `false`*

Consulte [Contenido multiidioma](../../teacher-guide/adding-content/multi-language-content.md) en la Guía del profesor para el recorrido completo de esta función orientado al docente.


### `video_context_menu_hidden`

**Ocultar el menú contextual del reproductor de vídeo**

Cuando está habilitada, se desactiva el menú contextual del clic derecho en los reproductores de vídeo HTML5.

*Predeterminado: `false`*


### `video_player_renderers`

**Renderizadores del reproductor de vídeo**

Habilitar renderizadores del reproductor para contenidos de YouTube, Vimeo, Facebook, DailyMotion y Twitch

### `youtube_for_students`

**Permitir a los alumnos insertar vídeos de YouTube**

Habilitar la posibilidad de que los alumnos inserten vídeos de Youtube