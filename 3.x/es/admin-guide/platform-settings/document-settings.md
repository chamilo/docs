# Configuración de documentos

Comportamiento de la herramienta **Documentos** del curso: cargas, extensiones permitidas, uso compartido y plantillas.

Acceda a estos ajustes en **Administración > Configuración > Documentos**. Esta categoría contiene **29 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `access_url_specific_files`

**Habilitar archivos específicos por URL**

Cuando esta función está habilitada en una configuración multi-URL, puede ir a la URL principal y proporcionar versiones específicas por URL de cualquier archivo (en la herramienta de documentos). El archivo original se sustituirá por la alternativa al verlo desde una URL distinta. Esto le permite personalizar aún más cada URL, al tiempo que reutiliza los mismos cursos muchas veces.

*Predeterminado: `false`*

### `default_document_quotum`

**Espacio en disco duro predeterminado**

¿Cuál es el espacio en disco disponible para un curso? Puede anular la cuota de un curso concreto en: administración de la plataforma > Cursos > modificar

*Predeterminado: `1000`*


### `default_group_quotum`

**Espacio en disco disponible para grupos**

¿Cuál es el espacio en disco duro predeterminado disponible para la herramienta de documentos de un grupo?

*Predeterminado: `250`*


### `documents_custom_cloud_link_list`

**Definir una lista estricta de hosts para enlaces en la nube**

La herramienta de documentos puede integrar enlaces a archivos en la nube. La lista de servicios en la nube está limitada a una lista codificada, pero puede definir el array ‘links’ que contendrá su propia lista de servicios/URL. La lista definida aquí sustituirá a la lista predeterminada.

### `documents_default_visibility_defined_in_course`

**Visibilidad de documentos definida en el curso**

La visibilidad predeterminada de los documentos para todos los cursos

*Predeterminado: `false`*

### `documents_hide_download_icon`

**Ocultar el icono de descarga de documentos**

En la herramienta de documentos, ocultar el icono de descarga a los usuarios.

*Predeterminado: `false`*


### `enable_x_sendfile_headers`

**Habilitar cabeceras X-sendfile**

Habilite esta opción si tiene X-sendfile activado a nivel del servidor web y desea añadir las cabeceras necesarias para que los navegadores las utilicen.

*Predeterminado: `false`*

### `group_category_document_access`

**Habilitar opciones de uso compartido para documentos dentro de la categoría de grupo**

Cuando está habilitado, los administradores pueden establecer el acceso a documentos y los permisos de uso compartido para grupos de documentos por categoría.

*Predeterminado: `false`*


### `group_document_access`

**Habilitar opciones de uso compartido para documentos de grupo**

Cuando está habilitado, el uso compartido de documentos y los permisos de acceso se pueden configurar a nivel de grupo.

*Predeterminado: `false`*


### `pdf_export_watermark_by_course`

**Habilitar la definición de marca de agua por curso**

Cuando esta opción está habilitada, los profesores pueden definir su propia marca de agua para los documentos de sus cursos.

*Predeterminado: `false`*


### `pdf_export_watermark_enable`

**Habilitar marca de agua en la exportación a PDF**

Al habilitar esta opción, puede cargar una imagen o un texto que se añadirá automáticamente como marca de agua a todas las exportaciones a PDF de documentos del sistema.

*Predeterminado: `false`*

### `pdf_export_watermark_text`

**Texto de marca de agua del PDF**

Este texto se añadirá como marca de agua a las exportaciones de documentos en PDF.

### `permanently_remove_deleted_files`

**Los archivos eliminados no se pueden restaurar**

Eliminar un archivo en la herramienta de documentos lo borra de forma permanente. El archivo no se puede restaurar

*Predeterminado: `false`*

### `permissions_for_new_directories`

**Permisos para directorios nuevos**

La posibilidad de definir los permisos que se asignan a cada directorio recién creado le permite mejorar la seguridad frente a ataques de piratas informáticos que suban contenido peligroso a su portal. El valor predeterminado (0770) debería ser suficiente para ofrecer a su servidor un nivel de protección razonable. El formato indicado usa la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución.

*Predeterminado: `0770`*


### `permissions_for_new_files`

**Permisos para archivos nuevos**

La posibilidad de definir los permisos que se asignan a cada archivo recién creado le permite mejorar la seguridad frente a ataques de piratas informáticos que suban contenido peligroso a su portal. El valor predeterminado (0550) debería ser suficiente para ofrecer a su servidor un nivel de protección razonable. El formato indicado usa la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución. Si usa Oogie, asegúrese de que el usuario que lanza LibreOffice pueda escribir archivos en la carpeta del curso.

*Predeterminado: `0660`*


### `send_notification_when_document_added`

**Enviar notificación a los estudiantes cuando se añade un documento**

Cada vez que alguien crea un elemento nuevo en la herramienta de documentos, enviar una notificación a los usuarios.

*Predeterminado: `false`*

### `show_default_folders`

**Mostrar en la herramienta documentos todas las carpetas que contienen recursos multimedia suministrados por defecto**

Carpetas de archivos multimedia que contienen archivos suministrados por defecto, organizados en categorías de vídeo, audio, imagen y animaciones flash para usarlos en sus cursos. Aunque las haga invisibles en la herramienta documentos, podrá seguir utilizando estos recursos en el editor web de la plataforma.

*Por defecto: `true`*

### `show_documents_preview`

**Mostrar vista previa de documentos**

Mostrar vistas previas de los documentos en la herramienta documentos evitará cargar una nueva página solo para mostrar un documento, pero puede resultar inestable con algunos navegadores antiguos o pantallas de menor anchura.

*Por defecto: `false`*

### `show_users_folders`

**Mostrar las carpetas de usuarios en la herramienta documentos**

Esta opción le permite mostrar u ocultar a los profesores las carpetas que el sistema genera para cada usuario que visita la herramienta documentos o envía un archivo a través del editor web. Si muestra estas carpetas a los profesores, estos podrán hacerlas visibles o no para los alumnos y permitir que cada alumno tenga un lugar específico en el curso donde no solo almacenar documentos, sino también crear y editar páginas web y exportarlas a PDF, hacer dibujos, crear plantillas web personales, enviar archivos, así como crear, mover y eliminar directorios y archivos y realizar copias de seguridad de sus carpetas. Cada usuario del curso tendrá un gestor de documentos completo. Recuerde también que cualquier usuario puede copiar un archivo que sea visible desde cualquier carpeta de la herramienta documentos (sea o no el propietario) a su portafolio o área de documentos personales de la red social, que estará disponible para que pueda usarlo en otros cursos.

*Por defecto: `true`*

### `students_download_folders`

**Permitir a los alumnos descargar directorios**

Permitir a los alumnos empaquetar y descargar un directorio completo desde la herramienta documentos

*Por defecto: `true`*


### `students_export2pdf`

**Permitir a los alumnos exportar documentos web a formato PDF en las herramientas documentos y wiki**

Esta función está habilitada por defecto, pero en caso de abuso que sobrecargue el servidor, o en entornos de aprendizaje específicos, podría desear deshabilitarla para todos los cursos.

*Por defecto: `true`*

### `thematic_pdf_orientation`

**Orientación del PDF para el progreso del curso**

En la herramienta de progreso del curso, puede imprimir un PDF de los distintos elementos. Establezca ‘portrait’ o ‘landscape’ (términos técnicos) para cambiarla.

*Por defecto: `landscape`*


### `upload_extensions_blacklist`

**Lista negra - configuración**

La lista negra se utiliza para filtrar las extensiones de los archivos eliminando (o renombrando) cualquier archivo cuya extensión figure en la lista negra siguiente. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;) como en el siguiente ejemplo:  exe;com;bat;scr;php. Se aceptan archivos sin extensión. No importa si las letras están en mayúsculas o minúsculas.

### `upload_extensions_list_type`

**Tipo de filtrado en las subidas de documentos**

Si desea utilizar el filtrado por lista negra o por lista blanca. Consulte a continuación la descripción de la lista negra o de la lista blanca para más detalles.

*Por defecto: `blacklist`*


### `upload_extensions_replace_by`

**Extensión de reemplazo**

Introduzca la extensión que desea utilizar para reemplazar las extensiones peligrosas detectadas por el filtro. Solo es necesario si ha seleccionado un filtro por reemplazo.

*Por defecto: `dangerous`*


### `upload_extensions_skip`

**Comportamiento del filtrado (omitir/renombrar)**

Si elige omitir, los archivos filtrados mediante la lista negra o la lista blanca no se subirán al sistema. Si elige renombrarlos, su extensión se reemplazará por la definida en el ajuste de extensión de reemplazo. Tenga en cuenta que renombrar no le protege realmente y puede provocar colisiones de nombres si existen varios archivos con el mismo nombre pero distintas extensiones.

*Por defecto: `true`*


### `upload_extensions_whitelist`

**Lista blanca - configuración**

La lista blanca se utiliza para filtrar las extensiones de los archivos eliminando (o renombrando) cualquier archivo cuya extensión *NO* figure en la lista blanca siguiente. En general se considera un enfoque de filtrado más seguro, aunque más restrictivo. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;) como en el siguiente ejemplo:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Se aceptan archivos sin extensión. No importa si las letras están en mayúsculas o minúsculas.

### `users_copy_files`

**Permitir a los usuarios copiar archivos de un curso a su área de archivos personales**

Permite a los usuarios copiar archivos de un curso a su área de archivos personales, visible a través de la red social o a través del editor HTML cuando están fuera de un curso

*Por defecto: `true`*


### `video_features`

**Funciones de vídeo**

Array de funciones adicionales que puede habilitar para el reproductor de vídeo en Chamilo. Las opciones incluyen 'speed', que le permite cambiar la velocidad de reproducción de un vídeo.