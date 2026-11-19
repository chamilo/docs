# Configuración del editor

Configuración del editor de texto enriquecido (TinyMCE) utilizado en toda la plataforma: barras de herramientas, complementos y asistentes de IA en el editor.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Editor**. Esta categoría contiene **29 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts mediante la API o cuando necesite modificar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_email_editor`

**Editor de correo electrónico en línea habilitado**

Si esta opción está activada, al hacer clic en una dirección de correo electrónico se abrirá un editor en línea.

### `allow_spellcheck`

**Corrector ortográfico**

Habilitar el corrector ortográfico

### `block_copy_paste_for_students`

**Bloquear copiar y pegar a los estudiantes**

Impedir que los estudiantes copien y peguen en el editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedir copiar y pegar imágenes en el editor WYSIWYG**

Impedir el uso de copiar y pegar imágenes como base64 en el editor para evitar llenar la base de datos con imágenes.

*Valor predeterminado: `false`*


### `editor_driver_list`

**Lista de controladores de archivos WYSIWYG**

Array que contiene los nombres de los controladores para el acceso a archivos desde el editor WYSIWYG.

### `editor_settings`

**Ajustes del editor WYSIWYG**

Array de configuración genérico para reconfigurar el editor WYSIWYG de forma global.

### `enable_iframe_inclusion`

**Permitir iframes en el editor HTML**

Permitir iframes arbitrarios en el editor HTML mejorará las capacidades de edición de los usuarios, pero puede representar un riesgo de seguridad. Asegúrese de poder confiar en sus usuarios (es decir, de saber quiénes son) antes de habilitar esta función.

### `enable_uploadimage_editor`

**Permitir arrastrar y soltar imágenes en el editor WYSIWYG**

Habilitar la carga de imágenes como archivo al copiar contenido o al arrastrar y soltar.

*Valor predeterminado: `false`*


### `enabled_asciisvg`

**Habilitar AsciiSVG**

Habilitar el complemento AsciiSVG en el editor WYSIWYG para dibujar gráficos a partir de funciones matemáticas.

### `enabled_googlemaps`

**Activar Google Maps**

Activar el botón para insertar mapas de Google Maps. La activación no se completa por completo si no se ha editado previamente el archivo main/inc/lib/fckeditor/myconfig.php y no se ha añadido una clave de API de Google Maps.

### `enabled_imgmap`

**Activar mapas de imagen**

Activar el botón para insertar mapas de imagen. Esto permite asociar URL a zonas de una imagen, creando zonas activas.

### `enabled_insertHtml`

**Permitir la inserción de widgets**

Esto permite incrustar en sus páginas web sus vídeos y aplicaciones favoritos, como Vimeo o SlideShare, y todo tipo de widgets y gadgets

### `enabled_mathjax`

**Habilitar MathJax**

Habilitar la biblioteca MathJax para visualizar fórmulas matemáticas. Esto añade un botón de fórmulas a la barra de herramientas del editor, donde las fórmulas se escriben en LaTeX. Consulte [Fórmulas matemáticas](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Crear y editar archivos SVG**

Esta opción permite crear y editar en línea gráficos vectoriales escalables (SVG) multicapa, así como exportarlos a imágenes en formato png.

### `enabled_wiris`

**Editor matemático WIRIS**

Habilitar el editor matemático WIRIS. Al instalar este complemento se obtiene el editor WIRIS y WIRIS CAS.<br/>Esta activación no se completa por completo a menos que se haya descargado previamente el <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>complemento PHP para CKeditor WIRIS</a> y se haya descomprimido su contenido en el directorio de Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Esto es necesario porque Wiris es software propietario y sus servicios son <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciales</a>. Para ajustar el complemento, edite el archivo configuration.ini o sustituya su contenido por el archivo configuration.ini.default incluido con Chamilo.

### `etherpad_api_key`

**Clave de API de Etherpad**

Credencial de API del lado del servidor utilizada para crear el pad y las sesiones del editor. Trátela como un secreto; no la comparta en tickets ni en capturas de pantalla de la documentación.

*Valor predeterminado: vacío*

### `etherpad_enabled`

**Habilitar Etherpad para la edición de Wiki**

Cuando está habilitado y configurado correctamente, el formulario de edición de una página Wiki existente carga el editor colaborativo Etherpad. Al guardar se crea una revisión normal de Wiki a partir de su contenido actual.

*Valor predeterminado: `false`*

### `etherpad_url`

**URL de Etherpad**

URL base del servidor Etherpad utilizada para abrir el editor Wiki compartido. Para sesiones incrustadas seguras, exponga Etherpad en **el mismo origen que Chamilo**, por ejemplo detrás de un proxy inverso en `https://campus.example.org/etherpad`. No incruste un servidor de origen cruzado no relacionado.

*Valor predeterminado: vacío*

### `force_wiki_paste_as_plain_text`

**Forzar el pegado como texto sin formato en el wiki**

Esto impedirá que muchas etiquetas ocultas, incorrectas o no estándar, copiadas de otros textos, dejen de corromper el texto del wiki tras numerosos problemas; pero se perderán algunas funciones durante la edición.

### `full_editor_toolbar_set`

**Barra de herramientas completa del editor WYSIWYG**

Mostrar la barra de herramientas completa en todos los cuadros del editor WYSIWYG de la plataforma.

*Valor predeterminado: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier en el wiki**

Activar el purificador HTML en la herramienta wiki (aumentará la seguridad, pero reducirá las funciones de estilo)

### `include_asciimathml_script`

**Cargar la biblioteca Mathjax en todas las páginas del sistema**

Active esta opción si desea mostrar fórmulas matemáticas basadas en MathML y gráficos matemáticos basados en ASCIIsvg no solo en la herramienta «Documentos», sino también en el resto del sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Activar el editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botones ampliada**

Activar las barras de botones ampliadas cuando el editor WYSIWYG está maximizado

*Valor predeterminado: `true`*

### `save_titles_as_html`

**Guardar los títulos como HTML**

Permitir a los usuarios incluir HTML en los campos de título en varios lugares. Esto permite aplicar cierto estilo a los títulos, en particular en las preguntas de los exámenes. También permite que esos campos de título específicos utilicen el mismo etiquetado por idioma que `translate_html` más abajo, que los títulos en texto sin formato no pueden contener de otro modo.

*Valor predeterminado: `false`*

### `translate_html`

**Compatibilidad con contenido HTML multilingüe**

Si está activada, esta opción permite a los usuarios utilizar un atributo «lang» en los elementos HTML para definir el idioma en el que está escrito el contenido de ese elemento. Active varios elementos con distintos atributos «lang» y Chamilo mostrará el contenido únicamente en el idioma del usuario.

*Valor predeterminado: `false`*

Consulte [Contenido multilingüe](../../teacher-guide/adding-content/multi-language-content.md) en la Guía del docente para obtener la explicación completa de esta función orientada al profesorado.


### `video_context_menu_hidden`

**Ocultar el menú contextual del reproductor de vídeo**

Cuando está activada, se desactiva el menú contextual del clic derecho en los reproductores de vídeo HTML5.

*Valor predeterminado: `false`*


### `video_player_renderers`

**Renderizadores del reproductor de vídeo**

Activar los renderizadores del reproductor para medios de YouTube, Vimeo, Facebook, DailyMotion y Twitch

### `youtube_for_students`

**Permitir a los estudiantes insertar vídeos de YouTube**

Activar la posibilidad de que los estudiantes puedan insertar vídeos de Youtube