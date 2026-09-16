# Configuración del Editor

Configuración del editor de texto enriquecido (TinyMCE) utilizado en toda la plataforma: barras de herramientas, complementos, asistentes de IA en el editor.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Editor**. Esta categoría contiene **26 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_email_editor`

**Editor de correo electrónico en línea habilitado**

Si esta opción está activada, al hacer clic en una dirección de correo electrónico se abrirá un editor en línea.

### `allow_spellcheck`

**Corrección ortográfica**

Habilitar la corrección ortográfica

### `block_copy_paste_for_students`

**Bloquear copiar y pegar para los estudiantes**

Bloquear a los estudiantes la capacidad de copiar y pegar en el editor WYSIWYG

### `editor_block_image_copy_paste`

**Evitar copiar y pegar imágenes en el editor WYSIWYG**

Evitar el uso de copiar y pegar imágenes como base64 en el editor para no llenar la base de datos con imágenes.

*Predeterminado: `false`*

### `editor_driver_list`

**Lista de controladores de archivos WYSIWYG**

Arreglo que contiene los nombres de los controladores para el acceso a archivos desde el editor WYSIWYG.

### `editor_settings`

**Configuraciones del editor WYSIWYG**

Arreglo de configuración genérico para reconfigurar el editor WYSIWYG de manera global.

### `enable_iframe_inclusion`

**Permitir iframes en el editor HTML**

Permitir iframes arbitrarios en el editor HTML mejorará las capacidades de edición de los usuarios, pero puede representar un riesgo de seguridad. Asegúrese de que puede confiar en sus usuarios (es decir, que sabe quiénes son) antes de habilitar esta función.

### `enable_uploadimage_editor`

**Permitir arrastrar y soltar imágenes en el editor WYSIWYG**

Habilitar la carga de imágenes como archivo al realizar una copia en el contenido o un arrastrar y soltar.

*Predeterminado: `false`*

### `enabled_asciisvg`

**Habilitar AsciiSVG**

Habilitar el complemento AsciiSVG en el editor WYSIWYG para dibujar gráficos a partir de funciones matemáticas.

### `enabled_googlemaps`

**Activar Google Maps**

Activar el botón para insertar Google Maps. La activación no se realiza completamente si no se ha editado previamente el archivo main/inc/lib/fckeditor/myconfig.php y se ha añadido una clave de API de Google Maps.

### `enabled_imgmap`

**Activar mapas de imágenes**

Activar el botón para insertar mapas de imágenes. Esto permite asociar URLs a áreas de una imagen, creando puntos de acceso.

### `enabled_insertHtml`

**Permitir inserción de widgets**

Esto permite incrustar en sus páginas web sus videos y aplicaciones favoritas como Vimeo o Slideshare, y todo tipo de widgets y gadgets.

### `enabled_mathjax`

**Habilitar MathJax**

Habilitar la biblioteca MathJax para visualizar fórmulas matemáticas. Esto solo es útil si las configuraciones de ASCIIMathML o ASCIISVG están habilitadas.

### `enabled_support_svg`

**Crear y editar archivos SVG**

Esta opción permite crear y editar archivos SVG (Scalable Vector Graphics) multicapa en línea, así como exportarlos a imágenes en formato PNG.

### `enabled_wiris`

**Editor matemático WIRIS**

Habilitar el editor matemático WIRIS. Al instalar este complemento, obtendrá el editor WIRIS y WIRIS CAS.<br/>Esta activación no se realiza completamente a menos que se haya descargado previamente el <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>complemento PHP para CKeditor WIRIS</a> y se haya descomprimido su contenido en el directorio de Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Esto es necesario porque Wiris es un software propietario y sus servicios son <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciales</a>. Para realizar ajustes al complemento, edite el archivo configuration.ini o reemplace su contenido por el archivo configuration.ini.default que se incluye con Chamilo.

### `force_wiki_paste_as_plain_text`

**Forzar pegar como texto plano en la wiki**

Esto evitará muchos problemas con etiquetas ocultas, incorrectas o no estándar, copiadas de otros textos, que corrompen el texto de la Wiki después de múltiples ediciones; pero se perderán algunas funciones durante la edición.

### `full_editor_toolbar_set`

**Barra de herramientas completa del editor WYSIWYG**

Mostrar la barra de herramientas completa en todas las cajas del editor WYSIWYG en la plataforma.

*Predeterminado: `false`*

### `htmlpurifier_wiki`

**HTMLPurifier en Wiki**

Habilitar HTML Purifier en la herramienta wiki (aumentará la seguridad pero reducirá las funciones de estilo)

### `include_asciimathml_script`

**Cargar la biblioteca MathJax en todas las páginas del sistema**

Active esta configuración si desea mostrar fórmulas matemáticas basadas en MathML y gráficos matemáticos basados en ASCIIsvg no solo en la herramienta 'Documentos', sino en cualquier otro lugar del sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Habilitar el editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botones extendida**

Habilitar barras de botones extendidas cuando el editor WYSIWYG está maximizado

*Predeterminado: `true`*

---
### `save_titles_as_html`

**Guardar títulos como HTML**

Permite a los usuarios incluir HTML en los campos de título en varios lugares. Esto permite cierto estilo en los títulos, especialmente en las preguntas de los exámenes.

*Default: `false`*

### `translate_html`

**Soportar contenido HTML multilingüe**

Si está habilitada, esta opción permite a los usuarios utilizar un atributo ‘lang’ en elementos HTML para definir el idioma en el que está escrito el contenido de ese elemento. Habilite múltiples elementos con diferentes atributos ‘lang’ y Chamilo mostrará el contenido únicamente en el idioma del usuario.

*Default: `false`*

### `video_context_menu_hidden`

**Ocultar el menú contextual en el reproductor de video**

Cuando está habilitado, el menú contextual que aparece al hacer clic derecho en los reproductores de video HTML5 se desactiva.

*Default: `false`*

### `video_player_renderers`

**Renderizadores de reproductor de video**

Habilita renderizadores de reproductor para medios de YouTube, Vimeo, Facebook, DailyMotion y Twitch.

### `youtube_for_students`

**Permitir a los estudiantes insertar videos de YouTube**

Habilita la posibilidad de que los estudiantes puedan insertar videos de YouTube.