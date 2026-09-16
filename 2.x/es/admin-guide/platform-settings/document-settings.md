# Configuración de Documentos

Comportamiento de la herramienta **Documentos** del curso: cargas, extensiones permitidas, compartición y plantillas.

Acceda a estas configuraciones en **Administración > Configuraciones > Documentos**. Esta categoría contiene **29 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `access_url_specific_files`

**Habilitar archivos específicos por URL**

Cuando esta función está habilitada en una configuración de múltiples URL, puede ir a la URL principal y proporcionar versiones específicas de cualquier archivo (en la herramienta de documentos). El archivo original será reemplazado por la alternativa cada vez que se vea desde una URL diferente. Esto le permite personalizar aún más cada URL, mientras disfruta de la ventaja de reutilizar los mismos cursos varias veces.

*Predeterminado: `false`*

### `default_document_quotum`

**Espacio en disco duro predeterminado**

¿Cuál es el espacio en disco disponible para un curso? Puede anular la cuota para un curso específico a través de: administración de la plataforma > Cursos > modificar

*Predeterminado: `1000`*

### `default_group_quotum`

**Espacio en disco disponible para grupos**

¿Cuál es el espacio en disco duro predeterminado disponible para la herramienta de documentos de grupos?

*Predeterminado: `250`*

### `documents_custom_cloud_link_list`

**Establecer lista estricta de hosts para enlaces en la nube**

La herramienta de documentos puede integrar enlaces a archivos en la nube. La lista de servicios en la nube está limitada a una lista codificada, pero puede definir el arreglo ‘links’ que contendrá una lista de sus propios servicios/URLs. La lista definida aquí reemplazará la lista predeterminada.

### `documents_default_visibility_defined_in_course`

**Visibilidad de documentos definida en el curso**

La visibilidad predeterminada de los documentos para todos los cursos.

*Predeterminado: `false`*

### `documents_hide_download_icon`

**Ocultar ícono de descarga de documentos**

En la herramienta de documentos, ocultar el ícono de descarga a los usuarios.

*Predeterminado: `false`*

### `enable_x_sendfile_headers`

**Habilitar encabezados X-sendfile**

Habilite esto si tiene X-sendfile activado a nivel del servidor web y desea agregar los encabezados necesarios para que los navegadores lo reconozcan.

*Predeterminado: `false`*

### `group_category_document_access`

**Habilitar opciones de compartición para documentos dentro de categorías de grupo**

Cuando está habilitado, los administradores pueden establecer permisos de acceso y compartición de documentos para grupos de documentos por categoría.

*Predeterminado: `false`*

### `group_document_access`

**Habilitar opciones de compartición para documentos de grupo**

Cuando está habilitado, los permisos de acceso y compartición de documentos pueden configurarse a nivel de grupo.

*Predeterminado: `false`*

### `pdf_export_watermark_by_course`

**Habilitar definición de marca de agua por curso**

Cuando esta opción está habilitada, los profesores pueden definir su propia marca de agua para los documentos en sus cursos.

*Predeterminado: `false`*

### `pdf_export_watermark_enable`

**Habilitar marca de agua en exportación de PDF**

Al habilitar esta opción, puede cargar una imagen o un texto que se agregará automáticamente como marca de agua a todas las exportaciones de documentos en PDF en el sistema.

*Predeterminado: `false`*

### `pdf_export_watermark_text`

**Texto de marca de agua en PDF**

Este texto se agregará como marca de agua a las exportaciones de documentos en formato PDF.

### `permanently_remove_deleted_files`

**Los archivos eliminados no se pueden restaurar**

Eliminar un archivo en la herramienta de documentos lo elimina permanentemente. El archivo no se puede restaurar.

*Predeterminado: `false`*

### `permissions_for_new_directories`

**Permisos para nuevos directorios**

La capacidad de definir los ajustes de permisos para asignar a cada directorio recién creado le permite mejorar la seguridad contra ataques de hackers que suban contenido peligroso a su portal. La configuración predeterminada (0770) debería ser suficiente para brindar a su servidor un nivel de protección razonable. El formato dado utiliza la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución.

*Predeterminado: `0770`*

### `permissions_for_new_files`

**Permisos para nuevos archivos**

La capacidad de definir los ajustes de permisos para asignar a cada archivo recién creado le permite mejorar la seguridad contra ataques de hackers que suban contenido peligroso a su portal. La configuración predeterminada (0550) debería ser suficiente para brindar a su servidor un nivel de protección razonable. El formato dado utiliza la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución. Si usa Oogie, asegúrese de que el usuario que ejecuta LibreOffice pueda escribir archivos en la carpeta del curso.

*Predeterminado: `0660`*

### `send_notification_when_document_added`

**Enviar notificación a los estudiantes cuando se agrega un documento**

Cada vez que alguien crea un nuevo elemento en la herramienta de documentos, enviar una notificación a los usuarios.

*Predeterminado: `false`*

---
### `show_default_folders`

**Mostrar en la herramienta de documentos todas las carpetas con recursos multimedia proporcionados por defecto**

Carpetas de archivos multimedia que contienen archivos proporcionados por defecto, organizados en categorías de video, audio, imagen y animaciones flash para usar en sus cursos. Aunque las hagas invisibles en la herramienta de documentos, aún puedes utilizar estos recursos en el editor web de la plataforma.

*Default: `true`*

### `show_documents_preview`

**Mostrar vista previa de documentos**

Mostrar vistas previas de los documentos en la herramienta de documentos evitará cargar una nueva página solo para mostrar un documento, pero puede resultar inestable con algunos navegadores más antiguos o pantallas de menor ancho.

*Default: `false`*

### `show_users_folders`

**Mostrar carpetas de usuarios en la herramienta de documentos**

Esta opción permite mostrar u ocultar a los profesores las carpetas que el sistema genera para cada usuario que visita la herramienta de documentos o envía un archivo a través del editor web. Si muestras estas carpetas a los profesores, ellos pueden hacerlas visibles o no a los estudiantes y permitir que cada estudiante tenga un lugar específico en el curso donde no solo almacenar documentos, sino también crear y editar páginas web, exportar a PDF, hacer dibujos, crear plantillas web personales, enviar archivos, así como crear, mover y eliminar directorios y archivos, y hacer copias de seguridad de sus carpetas. Cada usuario del curso tiene un administrador de documentos completo. Además, recuerda que cualquier usuario puede copiar un archivo visible desde cualquier carpeta en la herramienta de documentos (sea o no el propietario) a sus portafolios o área de documentos personales de la red social, lo que estará disponible para que lo use en otros cursos.

*Default: `true`*

### `students_download_folders`

**Permitir a los estudiantes descargar directorios**

Permite a los estudiantes empaquetar y descargar un directorio completo desde la herramienta de documentos.

*Default: `true`*

### `students_export2pdf`

**Permitir a los estudiantes exportar documentos web a formato PDF en las herramientas de documentos y wiki**

Esta función está habilitada por defecto, pero en caso de abuso por sobrecarga del servidor, o en entornos de aprendizaje específicos, podrías querer deshabilitarla para todos los cursos.

*Default: `true`*

### `thematic_pdf_orientation`

**Orientación del PDF para el progreso del curso**

En la herramienta de progreso del curso, puedes imprimir un PDF de los diferentes elementos. Configura ‘portrait’ o ‘landscape’ (términos técnicos) para cambiarlo.

*Default: `landscape`*

### `upload_extensions_blacklist`

**Lista negra - configuración**

La lista negra se utiliza para filtrar las extensiones de archivos eliminando (o renombrando) cualquier archivo cuya extensión figure en la lista negra a continuación. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;) como en el siguiente ejemplo: exe;com;bat;scr;php. Los archivos sin extensión son aceptados. El uso de mayúsculas o minúsculas no importa.

### `upload_extensions_list_type`

**Tipo de filtrado en la carga de documentos**

Si deseas usar el filtrado de lista negra o lista blanca. Consulta la descripción de lista negra o lista blanca a continuación para más detalles.

*Default: `blacklist`*

### `upload_extensions_replace_by`

**Extensión de reemplazo**

Ingresa la extensión que deseas usar para reemplazar las extensiones peligrosas detectadas por el filtro. Solo es necesario si has seleccionado un filtro por reemplazo.

*Default: `dangerous`*

### `upload_extensions_skip`

**Comportamiento del filtrado (omitir/renombrar)**

Si eliges omitir, los archivos filtrados a través de la lista negra o lista blanca no se cargarán al sistema. Si eliges renombrarlos, su extensión será reemplazada por la definida en la configuración de reemplazo de extensión. Ten en cuenta que renombrar no te protege realmente y puede causar colisiones de nombres si existen varios archivos con el mismo nombre pero diferentes extensiones.

*Default: `true`*

### `upload_extensions_whitelist`

**Lista blanca - configuración**

La lista blanca se utiliza para filtrar las extensiones de archivos eliminando (o renombrando) cualquier archivo cuya extensión *NO* figure en la lista blanca a continuación. Generalmente se considera un enfoque más seguro pero más restrictivo para el filtrado. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;) como en el siguiente ejemplo: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Los archivos sin extensión son aceptados. El uso de mayúsculas o minúsculas no importa.

### `users_copy_files`

**Permitir a los usuarios copiar archivos de un curso a su área de archivos personales**

Permite a los usuarios copiar archivos de un curso a su área de archivos personales, visible a través de la Red Social o a través del editor HTML cuando están fuera de un curso.

*Default: `true`*

### `video_features`

**Características de video**

Arreglo de características adicionales que puedes habilitar para el reproductor de video en Chamilo. Las opciones incluyen 'speed', que permite cambiar la velocidad de reproducción de un video.