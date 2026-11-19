# Configuración de documentos

Comportamiento de la herramienta **Documentos** del curso: cargas, extensiones permitidas, uso compartido y plantillas.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Documentos**. Esta categoría contiene **30 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `access_url_specific_files`

**Habilitar archivos específicos por URL**

Cuando esta función está habilitada en una configuración multi-URL, puede ir a la URL principal y proporcionar versiones específicas por URL de cualquier archivo (en la herramienta de documentos). El archivo original será sustituido por la alternativa cada vez que se visualice desde una URL diferente. Esto le permite personalizar aún más cada URL, al tiempo que aprovecha la ventaja de reutilizar los mismos cursos muchas veces.

*Valor predeterminado: `false`*

### `default_document_quotum`

**Espacio predeterminado en disco duro**

¿Cuál es el espacio en disco disponible para un curso? Puede anular la cuota de un curso específico mediante: administración de la plataforma > Cursos > modificar

*Valor predeterminado: `1000`*


### `default_group_quotum`

**Espacio en disco disponible para el grupo**

¿Cuál es el espacio predeterminado en disco duro disponible para la herramienta de documentos de un grupo?

*Valor predeterminado: `250`*


### `document_default_visibility_can_be_modified_in_course` **v3**

**La visibilidad predeterminada de los documentos nuevos puede modificarse por curso**

Cuando está habilitado, los docentes pueden elegir en la configuración del curso la visibilidad asignada a los documentos nuevos de su curso, en lugar del valor predeterminado de la plataforma.

*Valor predeterminado: `false`*

Cuando esto está habilitado, aparece una opción **Visibilidad predeterminada para documentos nuevos** en la sección **Documentos** de la configuración del curso. Un curso que no haya elegido un valor utiliza `document_default_visibility_on_creation`.

### `document_default_visibility_on_creation` **v3**

**Visibilidad predeterminada de los documentos nuevos**

Visibilidad asignada a un documento, carpeta o archivo cargado nuevo cuando un docente lo crea en un curso. Los docentes pueden seguir cambiando después la visibilidad de cada uno.

*Valor predeterminado: `visible`*

### `documents_custom_cloud_link_list`

**Definir una lista estricta de hosts para enlaces en la nube**

La herramienta de documentos puede integrar enlaces a archivos en la nube. La lista de servicios en la nube se limita a una lista codificada de forma fija, pero puede definir el array ‘links’ que contendrá una lista propia de servicios/URL. La lista definida aquí sustituirá a la lista predeterminada.

### `documents_hide_download_icon`

**Ocultar el icono de descarga de documentos**

En la herramienta de documentos, oculta el icono de descarga a los usuarios.

*Valor predeterminado: `false`*


### `enable_x_sendfile_headers`

**Habilitar cabeceras X-sendfile**

Habilítelo si tiene X-sendfile habilitado a nivel del servidor web y desea añadir las cabeceras necesarias para que los navegadores lo detecten.

*Valor predeterminado: `false`*

### `group_category_document_access`

**Habilitar opciones de uso compartido para documentos dentro de la categoría de grupo**

Cuando está habilitado, los administradores pueden establecer el acceso a los documentos y los permisos de uso compartido para los grupos de documentos por categoría.

*Valor predeterminado: `false`*


### `group_document_access`

**Habilitar opciones de uso compartido para documentos de grupo**

Cuando está habilitado, el uso compartido de documentos y los permisos de acceso pueden configurarse a nivel de grupo.

*Valor predeterminado: `false`*


### `pdf_export_watermark_by_course`

**Habilitar la definición de marca de agua por curso**

Cuando esta opción está habilitada, los docentes pueden definir su propia marca de agua para los documentos de sus cursos.

*Valor predeterminado: `false`*


### `pdf_export_watermark_enable`

**Habilitar marca de agua en la exportación a PDF**

Al habilitar esta opción, puede cargar una imagen o un texto que se añadirá automáticamente como marca de agua a todas las exportaciones a PDF de documentos del sistema.

*Valor predeterminado: `false`*

### `pdf_export_watermark_text`

**Texto de la marca de agua del PDF**

Este texto se añadirá como marca de agua a las exportaciones de documentos en PDF.

### `permanently_remove_deleted_files`

**Los archivos eliminados no se pueden restaurar**

Eliminar un archivo en la herramienta de documentos lo borra de forma permanente. El archivo no se puede restaurar

*Valor predeterminado: `false`*

### `permissions_for_new_directories`

**Permisos para directorios nuevos**

La posibilidad de definir los permisos que se asignarán a cada directorio recién creado le permite mejorar la seguridad frente a ataques de piratas informáticos que carguen contenido peligroso en su portal. El ajuste predeterminado (0770) debería ser suficiente para proporcionar a su servidor un nivel de protección razonable. El formato indicado utiliza la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución.

*Valor predeterminado: `0770`*

### `permissions_for_new_files`

**Permisos para archivos nuevos**

La posibilidad de definir los permisos que se asignarán a cada archivo recién creado le permite mejorar la seguridad frente a ataques de hackers que suban contenido peligroso a su portal. La configuración predeterminada (0550) debería bastar para ofrecer a su servidor un nivel de protección razonable. El formato indicado utiliza la terminología UNIX de Propietario-Grupo-Otros con permisos de Lectura-Escritura-Ejecución. Si utiliza Oogie, asegúrese de que el usuario que inicia LibreOffice pueda escribir archivos en la carpeta del curso.

*Predeterminado: `0660`*


### `send_notification_when_document_added`

**Enviar notificación a los estudiantes cuando se añade un documento**

Cada vez que alguien crea un elemento nuevo en la herramienta de documentos, enviar una notificación a los usuarios.

*Predeterminado: `false`*


### `show_default_folders`

**Mostrar en la herramienta de documentos todas las carpetas que contienen recursos multimedia suministrados de forma predeterminada**

Carpetas de archivos multimedia que contienen archivos suministrados de forma predeterminada, organizados en categorías de vídeo, audio, imagen y animaciones flash para utilizarlos en sus cursos. Aunque las haga invisibles en la herramienta de documentos, podrá seguir utilizando estos recursos en el editor web de la plataforma.

*Predeterminado: `true`*

### `show_documents_preview`

**Mostrar vista previa del documento**

Mostrar vistas previas de los documentos en la herramienta de documentos evitará cargar una página nueva solo para mostrar un documento, pero puede resultar inestable con algunos navegadores antiguos o pantallas de menor anchura.

*Predeterminado: `false`*

### `show_users_folders`

**Mostrar las carpetas de los usuarios en la herramienta de documentos**

Esta opción le permite mostrar u ocultar a los docentes las carpetas que el sistema genera para cada usuario que visita la herramienta de documentos o envía un archivo a través del editor web. Si muestra estas carpetas a los docentes, podrán hacer visibles o no a los estudiantes y permitir que cada estudiante disponga de un espacio específico en el curso donde no solo almacenar documentos, sino también crear y editar páginas web y exportarlas a PDF, realizar dibujos, crear plantillas web personales, enviar archivos, así como crear, mover y eliminar directorios y archivos y realizar copias de seguridad de sus carpetas. Cada usuario del curso dispone de un gestor de documentos completo. Además, recuerde que cualquier usuario puede copiar un archivo visible de cualquier carpeta de la herramienta de documentos (sea o no el propietario) a sus portafolios o al área de documentos personales de la red social, donde estará disponible para que pueda utilizarlo en otros cursos.

*Predeterminado: `true`*

### `students_download_folders`

**Permitir a los estudiantes descargar directorios**

Permitir a los estudiantes empaquetar y descargar un directorio completo desde la herramienta de documentos

*Predeterminado: `true`*


### `students_export2pdf`

**Permitir a los estudiantes exportar documentos web a formato PDF en las herramientas de documentos y wiki**

Esta función está habilitada de forma predeterminada, pero en caso de abuso por sobrecarga del servidor, o en entornos de aprendizaje específicos, es posible que desee deshabilitarla para todos los cursos.

*Predeterminado: `true`*

### `thematic_pdf_orientation`

**Orientación del PDF para el progreso del curso**

En la herramienta de progreso del curso, puede imprimir un PDF de los distintos elementos. Establezca ‘portrait’ o ‘landscape’ (términos técnicos) para cambiarla.

*Predeterminado: `landscape`*


### `upload_extensions_blacklist`

**Lista negra - configuración**

La lista negra se utiliza para filtrar las extensiones de los archivos eliminando (o renombrando) cualquier archivo cuya extensión figure en la lista negra siguiente. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;) como en el siguiente ejemplo:  exe;com;bat;scr;php. Se aceptan los archivos sin extensión. El uso de mayúsculas o minúsculas no importa.

### `upload_extensions_list_type`

**Tipo de filtrado en las cargas de documentos**

Si desea utilizar el filtrado por lista negra o por lista blanca. Consulte la descripción de la lista negra o de la lista blanca más abajo para obtener más detalles.

*Predeterminado: `blacklist`*


### `upload_extensions_replace_by`

**Extensión de sustitución**

Introduzca la extensión que desea utilizar para sustituir las extensiones peligrosas detectadas por el filtro. Solo es necesaria si ha seleccionado un filtro por sustitución.

*Predeterminado: `dangerous`*


### `upload_extensions_skip`

**Comportamiento del filtrado (omitir/renombrar)**

Si elige omitir, los archivos filtrados mediante la lista negra o la lista blanca no se cargarán en el sistema. Si elige renombrarlos, su extensión se sustituirá por la definida en la configuración de extensión de sustitución. Tenga en cuenta que renombrar no le protege realmente y puede provocar colisiones de nombres si existen varios archivos con el mismo nombre pero con extensiones distintas.

*Predeterminado: `true`*

### `upload_extensions_whitelist`

**Lista blanca - ajuste**

La lista blanca se utiliza para filtrar las extensiones de archivo eliminando (o renombrando) cualquier archivo cuya extensión *NO* figure en la lista blanca siguiente. Por lo general se considera un enfoque más seguro, pero más restrictivo, para el filtrado. Las extensiones deben figurar sin el punto inicial (.) y separadas por punto y coma (;), como en el siguiente ejemplo:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Se aceptan los archivos sin extensión. No importa el uso de mayúsculas o minúsculas.

### `users_copy_files`

**Permitir a los usuarios copiar archivos de un curso en su área personal de archivos**

Permite a los usuarios copiar archivos de un curso en su área personal de archivos, visible a través de la Red social o a través del editor HTML cuando se encuentran fuera de un curso

*Predeterminado: `true`*


### `video_features`

**Funciones de vídeo**

Matriz de funciones adicionales que puede activar para el reproductor de vídeo en Chamilo. Las opciones incluyen 'speed', que permite cambiar la velocidad de reproducción de un vídeo.