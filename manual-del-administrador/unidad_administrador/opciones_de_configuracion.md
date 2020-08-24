# Administrar la configuración del sistema

Chamilo 1.11 ofrece cerca de 300 parámetros de configuración en la parte _Parámetros de configuración de Chamilo_, sin contar unas docenas de parámetros adicionales en su archivo de configuración _app/config/configuration.php_. Estas opciones impactan el funcionamiento de la plataforma y la cantidad de opciones adicionales que aparecerán en todas partes de la plataforma.

Por lo tanto, consideramos importante tener un registro centralizado así como una pequeña explicación de una mayoría de estos parámetros.

Algunos de estos parámetros solo se pueden configurar en el archivo de configuración de Chamilo \(_app/config/configuration.php_\). De estos, algunos están ahí temporalmente hasta la próxima versión mayor de Chamilo y su integración a la lista normal de opciones, mientras otros están en este archivo principalmente porque su cambio implica algún tipo de cambio adicional paralelo en el servidor, el cual solo puede ser gestionado por alguien que tenga acceso al sistema de archivos, y por lo tanto no ayudaría ponerlos en la interfaz web.

> **Nota:** Si su portal Chamilo ha sido actualizado desde una versión anterior, puede que no todas las opciones disponibles aparezcan en _app/config/configuration.php_. En este caso, verifique la existencia de nuevos parámetros en el archivo _main/install/configuration.dist.php_ y cópielos en _app/config/configuration.php_ antes de activarlos.

## Lista de opciones de configuración <a id="lista-de-opciones-de-configuraci-n"></a>

Algunos valores predeterminados importantes de la siguiente lista han sido indicados, no todos.

| Titulo | Descripción | Valor por defecto |
| :--- | :--- | :--- |
| Plataforma |  |  |
| Nombre de la Institución | Nombre de la Institución \(aparece en el lado izquierdo de la cabecera\) | Chamilo |
| URL de la Institución | URL de la Institución \(enlace que aparece en el lado izquierdo de la cabecera\) | www.chamilo.org |
| Nombre del Sitio Web de su plataforma | El nombre del Sitio Web de su plataforma \(aparece en la cabecera\) |  |
| Administrador del portal: E-mail | La dirección de correo electrónico del administrador de la plataforma \(aparece en el lado derecho del pie\) |  |
| Administrador del portal: apellidos | Los apellidos del administrador de la plataforma \(aparecen en el lado derecho del pie\) | Doe |
| Administrador del portal: nombre | El nombre del administrador de la plataforma \(aparece en el lado derecho del pie\) | John |
| Información del administrador de la plataforma en el pie | ¿ Mostrar la información del administrador de la plataforma en el pie ? |  |
| Información del profesor en el pié | ¿Mostrar la información del profesor en el pie de página? |  |
| Tipo de servidor | ¿ Qué tipo de servidor utiliza ? Esto activa o desactiva algunas opciones específicas. En un servidor de desarrollo hay una funcionalidad que indica las cadenas de caracteres no traducidas. |  |
| Quién está en línea | ¿ Mostrar el número de personas que están en línea ? |  |
| Registro | ¿ Está permitido que los nuevos usuarios puedan registrarse por sí mismos ? ¿ Pueden los usuarios crear cuentas nuevas ? | Sí |
| Registro como profesor | ¿ Alguien puede registrarse como docente y por lo tanto poder crear cursos\) ? | Sí |
| Olvidé mi contraseña | ¿ Cuando un usuario ha perdido su contraseña, puede pedir que el sistema se la envíe automáticamente ? |  |
| Mostrar el código del curso en el título de éste | Mostrar el código del curso en cada uno de los cursos del listado |  |
| Mostrar al profesor en el título del curso | Mostrar el nombre de cada docente en cada uno de los cursos del listado |  |
| Administrador del portal: Teléfono | Número de teléfono del administrador de la plataforma |  |
| Activar la Vista de estudiante | Habilitar la Vista de alumno, que permite que un docente o un administrador pueda ver un curso como lo vería un alumno | Sí |
| Página después de identificarse | Página que será visualizada por los usuarios que se conecten |  |
| Límite de tiempo de Usuarios en línea | Este límite de tiempo define cuantos segundos han de pasar después de la última acción de un usuario para seguir considerándolo “en línea” |  |
| Validez de la cuenta | Una cuenta de usuario es válida durante este número de días a partir de su creación |  |
| Mostrar la dirección de correo electrónico | Mostrar a los usuarios las direcciones de correo electrónico |  |
| Mostrar el número de cursos | Mostrar el número de cursos de cada categoría, en las categorías de cursos de la página principal |  |
| Mostrar las categorías de cursos vacías | Mostrar las categorías de cursos en la página principal aunque estén vacías |  |
| Mostrar un enlace para volver atrás encima del árbol de las categorías/cursos | Mostrar un enlace para volver a la jerarquía del curso. De todos modos, un enlace siempre estará disponible al final de la lista. |  |
| Mostrar los idiomas de los cursos | Mostrar el idioma de cada curso \(después de su título\) en la lista los cursos de la página principal |  |
| Mostrar categorías en la página principal | Esta opción mostrará u ocultará las categorías de cursos en la página principal de la plataforma |  |
| Pestañas en la cabecera | Marca las pestañas que deseas que aparezca en la cabecera. Las pestañas no seleccionadas, si fueran necesarias, aparecerán en el menú derecho de la página principal de la plataforma y en la página de mis cursos |  |
| No responder a este correo | Esta es la dirección de correo electrónico que se utiliza cuando se envía un correo para solicitar que no se realice ninguna respuesta. |  |
| Selección de tema por el usuario | Permitir a los usuarios elegir su propio tema visual en su perfil |  |
| Mostrar cursos cerrados en la página de registro y en la página principal de la plataforma | ¿ Mostrar los cursos cerrados en la página de registro y en la página principal de la plataforma ? En la página de inicio de la plataforma aparecerá un icono junto al curso, para inscribirse rápidamente en el mismo. Esto solo se mostrará en la página principal de la plataforma tras la autentificación del usuario y siempre que ya no esté inscrito en el curso. |  |
| Permitir la creación de cursos | Los docentes pueden crear cursos en la plataforma |  |
| Los estudiantes pueden consultar el catálogo de cursos | Permitir a los alumnos consular el catálogo de cursos en los que pueden matricularse |  |
| Habilitar Términos y Condiciones | Esta opción mostrará los “Términos y condiciones” en el formulario de registro de los nuevos usuarios |  |
| Aviso por correo electrónico, de la creación de un nuevo curso | Enviar un correo electrónico al administrador de la plataforma, cada vez que un docente cree un curso nuevo |  |
| Mostrar el enlace para informar de errores | Mostrar un enlace en la cabecera para informar de un error a la plataforma de apoyo \([http://support.chamilo.org](http://support.chamilo.org)\). Al hacer clic en el enlace el usuario será dirigido al sistema de soporte de Chamilo, en el que una página wiki describe el procedimiento para informar de errores. |  |
| Solicitud de cursos | Cuando la solicitud de cursos está activada, un docente no podrá crear un curso por si mismo sino que tendrá que rellenar una solicitud. El administrador de la plataforma revisará la solicitud y la aprobará o rechazará. Esta funcionalidad se basa en mensajes de correo electrónico automáticos por lo que debe asegurarse de que su instalación de Chamilo usa un servidor de correo y una dirección de correo dedicada a ello. |  |
| Solicitud de cursos - enlace a términos y condiciones | La URL que enlaza el documento "Términos y condiciones" que rige la solicitud de un curso. Si esta dirección está configurada, el usuario tendrá que leer y aceptar los términos y condiciones antes de enviar su solicitud de curso. Si activa el módulo "Términos y condiciones" de Chamilo y quiere usar éste en lugar de términos y condiciones propias, deje este campo vacío. |  |
| Marcas de agua en las exportaciones a PDF | Si activa esta opción podrá cargar una imagen o un texto que serán automáticamente añadidos como marca de agua en los documentos resultantes de todas las exportaciones a PDF que realice el sistema. |  |
| Cargar una imagen para marca de agua | Permite subir una imagen como marca de agua |  |
| Activar la definición de marcas de agua por curso | Cuando esta opción está activada, los docentes podrán definir sus propias marcas de agua en los documentos de sus cursos. |  |
| Texto de marca de agua para PDF | Este texto se añadirá como marca de agua en los documentos resultantes de las exportaciones al formato PDF. |  |
| Mostrar las clases a los usuarios | Mostrar las clases a los usuarios. Las clases son una funcionalidad que de forma directa permite suscribir o dar de baja a grupos de usuarios dentro de una sesión o de un curso, reduciendo así el trabajo de administración. Cuando activa esta opción, los alumnos podrán ver la clase de la que forman parte mediante el interfaz de red social. |  |
| Funcionalidad de redimensiona-miento de fuentes | Activar esta opción mostrará una serie de opciones de redimensionamiento de fuentes en la parte superior derecha del Campus. Esto permitirá a las personas con problemas de vista leer más fácilmente los contenidos de sus cursos. |  |
| Página del alumno después de identificarse | Esta página será la que vean todos los alumnos después de identificarse. |  |
| Página del profesor después de identificarse | Esta página será la que se cargue después de que un profesor se haya identificado |  |
| Página del Director de Recursos Humanos tras haberse identificado | Esta página será la que se cargue después de que un Director de Recursos Humanos se haya identificado |  |
| Inscripción por el propio alumno |  |  |
| Inscripción por el propio profesor |  |  |
| Inscripción por el propio Director de Recursos Humanos |  |  |
| Habilitar el vínculo de ayuda | El vínculo de ayuda se encuentra en la parte superior derecha de la pantalla |  |
| Mostrar barra de administración | Muestra a los usuarios, según su perfil, una barra global en la parte superior de la página. Esta barra, muy similar a las de Wordpress y Google, puede aumentar considerablemente su eficiencia al realizar actividades complejas y aumenta el espacio disponible para el contenido de aprendizaje. |  |
| Habilitar el chat global | Los usuarios pueden conversar entre si mediante un chat global |  |
| Usar el correo electrónico como nombre de usuario | El correo electrónico será usado para ingresar al sistema |  |
| Habilitar la herramienta de competencias | Los usuarios pueden ver sus competencias en la red social y en un bloque en la página principal. |  |
| Permitir darse de baja de la plataforma | Al activar esta opción, se permitirá a cualquier usuario eliminar definitivamente su propia cuenta y todos los datos relacionados a la misma desde la plataforma. Esto es una acción radical, pero es necesario que los portales abiertos al público donde los usuarios pueden registrarse automáticamente. Una entrada adicional se publicará en el perfil del usuario de darse de baja después de la confirmación. |  |
| Activar plantillas de correos | Use plantillas de correos para ciertos eventos y a usuarios específicos |  |
| Mostrar cursos con mayor popularidad | La lista de los cursos con mayor popularidad será añadida a la página principal |  |
| Usar páginas personalizadas | Activar esta funcionalidad para configurar páginas específicas de identificación \(login\) según el perfil del usuario |  |
| Dirección de la institución |  |  |
| Esconder el contenido de la página principal una vez ingresado | Esta opción le permite esconder el bloque de introducción en la página principal de la plataforma \(para dejar solamente anuncios, por ejemplo\), para todos los usuarios que ya han ingresado al sistema. El bloque de introducción general seguirá apareciendo para el público general. |  |
| Esconder anuncios globales para anónimos | Esconder los anuncios globales de la plataforma de los usuarios anónimos, de tal manera que se puedan dirigir estos anuncios solo para los usuarios registrados. |  |
| Ordenar usuarios por código oficial | Usar el campo de código oficial para reordenar la mayoría de las listas de usuario en la plataforma, en vez de usar su nombre o apellido. |  |
| Esconder los cursos privados del catálogo | Activar para esconder los cursos privados del catálogo de curso. Este parámetro tiene sentido cuando se usa el catálogo solo para permitir a los alumnos auto-inscribirse en los cursos \(en este caso no tiene sentido mostrarles cursos a los cuales no pueden inscribirse\). |  |
| Catálogo de cursos y sesiones | Mostrar alternativamente solo los cursos, solo las sesiones, o ambos en el catálogo de cursos. |  |
| Auto-detección de idiomas en custom pages | Si usa los custom pages \(páginas de bienvenida personalizadas\), active este parámetro si desea activar el detector de idioma para presentar esta página de bienvenida en su idioma. Desactive para usar el idioma por defecto de la plataforma. A considerar si no tiene los términos de las páginas personalizadas traducidos para todos los idiomas, por ejemplo. |  |
| Esconder el botón de logout | Activar para esconder el botón de logout. Esta opción es util únicamente en caso de uso de un método externo de login y logout, por ejemplo usando un mecanismo de Single Sign On de algún tipo. |  |
| Redirigir el admin a la lista de cursos | El comportamiento por defecto es de mandar el administrador directamente al panel de administración luego del login \(mientras los profesores y alumnos van a la lista de cursos o la página principal de la plataforma\). Activar para redirigir el administrador también a su lista de cursos. |  |
| Servicios web: decodificar UTF-8 | Decodificar el UTF-8 de las llamadas por servicios web. Activar esta opción \(pasada al parseador SOAP\) si tiene problemas con la codificación de los títulos y nombres cuando se insertan o editan a través de servicios web. |  |
| Fotos Gravatar | Activar esta opción para buscar en el repositorio de Gravatar para fotos de los usuarios actuales, cuando el usuario no tenga una foto subida localmente. Esta es una funcionalidad muy interesante para auto-llenar las fotos en su sitio web, en particular si sus usuarios son muy activos en internet. Las fotos de Gravatar pueden ser configuradas fácilmente en [http://en.gravatar.com/](http://en.gravatar.com/) en base a una dirección de correo. |  |
| Tipo de Gravatar | Si la opción de Gravatar está activada y el usuario no tiene una foto configurada en Gravatar, esta opción permite elegir el tipo de avatar \(pequeña representación gráfica\) que Gravatar generará para cada usuario. Ver [http://en.gravatar.com/site/implement/images\#default-image](http://en.gravatar.com/site/implement/images#default-image) para los distintos tipos de avatares. |  |
| Modo ludificación | Activar el logro de estrellas en las lecciones |  |
| Mostrar nombre completo de la competencias en rueda de competencias | En la rueda de competencias, permite mostrar el nombre de la competencia cuando ésta tiene código corto. |  |
| Cursos |  |  |
| Vista de la página principal | ¿ Cómo quiere que se presente la página principal del curso ? |  |
| Barra de acceso rápido a las herramientas | ¿ Mostrar la barra de acceso rápido a las herramientas en la cabecera ? |  |
| Categorías de grupos | Permitir a los administradores de un curso crear categorías en el módulo grupos |  |
| Cuota de espacio por defecto para un curso en el servidor | ¿ Cuál es la cuota de espacio por defecto en el servidor para la herramienta documentos ? Se puede cambiar este espacio para un curso específico a través de: administración de la plataforma -&gt; Cursos -&gt; modificar | 95.4 MB |
| Cuota de espacio por defecto en el servidor para los grupos | ¿ Cuál es la cuota de espacio por defecto en el servidor para la herramienta documentos de los grupos ? | 4.8 MB |
| Permitir encabezados de usuarios | ¿ El administrador de un curso puede definir cabeceras para obtener información adicional de los usuarios ? |  |
| Mostrar el menú de navegación del curso | Mostrar el menú de navegación facilitará el acceso a las diferentes áreas del curso. |  |
| Activar introducción a las herramientas | Habilitar una introducción en cada herramienta de la página principal del curso |  |
| Barra de navegación de la página principal del curso | La barra de navegación es un sistema de navegación horizontal mediante enlaces que generalmente se sitúa en la zona superior izquierda de su página. Esta opción le permite seleccionar el contenido de esta barra en la página principal de cada curso |  |
| Vista del foro por defecto | Cuál es la opción por defecto cuando se crea un nuevo foro. Sin embargo, cualquier administrador de un curso puede elegir una vista diferente en cada foro |  |
| Remitente de la encuesta \(no responder\) | ¿ Los correos electrónicos utilizados para enviar las encuestas, deben usar el correo electrónico del tutor o una dirección especial de correo electrónico a la que el destinatario no responde \(definida en los parámetros de configuración de la plataforma\) ? |  |
| Permitir temas para personalizar el aspecto del curso | Permitir que los cursos puedan tener un tema gráfico distinto, cambiando la hoja de estilo usada por una de las disponibles en Chamilo. Cuando un usuario entra en un curso, la hoja de estilo del curso tiene preferencia sobre la del usuario y sobre la que esté definida por defecto para la plataforma. |  |
| Mostrar los términos del glosario en los documentos | Desde aquí puede configurar la forma en que se añadirán los términos del glosario a los documentos |  |
| Mostrar las descripciones de los cursos en el catálogo | Mostrar las descripciones de los cursos como ventanas emergentes al hacer clic en un icono de información del curso en el catálogo de cursos |  |
| Muestra los términos del glosario en las herramientas lecciones y ejercicios | Desde aquí puede configurar como añadir los términos del glosario en herramientas como lecciones y ejercicios |  |
| Ir directamente al curso tras identificarse | Cuando un usuario está inscrito solamente en un curso, ir directamente al curso después de identificarse |  |
| Puntuación mínima de los ejercicios | Establezca una puntuación mínima \(generalmente 0\) para todos los ejercicios de la plataforma. Esto configurará la forma en que los resultados finales se mostrarán a los alumnos y docentes. |  |
| Puntuación máxima de los ejercicios | Establezca una puntuación máxima \(generalmente 10, 20 o 100\) para todos los ejercicios de la plataforma. Esto configurará la manera en que los resultados finales se mostrarán a los docentes y a los alumnos. |  |
| Escenarización de ejercicios | Al activar esta funcionalidad hará que estén disponibles los ejercicios tipo escenario, los cuales proponen nuevas preguntas al alumno en función de sus respuestas. El docente diseñará el escenario completo de la prueba, con todas sus posibilidades, a través de una interfaz sencilla pero extendida. |  |
| Tiempo acumulado de sesión para SCORM | Cuando se activa el tiempo de una sesión para una secuencia de aprendizaje SCORM será acumulativo, de lo contrario, sólo se contará desde el momento en la última actualización. |  |
| Visibilidad del curso por defecto | Visibilidad por defecto del curso cuando se está creando un curso |  |
| Permitir certificados públicos | Los certificados pueden ser vistos por personas no registradas en el portal. |  |
| Usar plantilla para nuevos cursos | Configure este parámetro para usar el mismo curso plantilla \(identificado por su ID numérico de la base de datos\) para todos los cursos que se crearán en la plataforma en adelante. Ojo que si el uso de esta funcionalidad no está bien planificado, podría tener un impacto tremendo sobre el uso de espacio en disco \(por ejemplo si el curso-plantilla contiene archivos muy pesados\). El curso-plantilla se usará como si un profesor estuviera copiando un curso a través de la herramienta de mantenimiento de curso, por lo que ningun dato de alumno se copiará, solo el material creado por el profesor. Todas las demás reglas de copias de cursos aplican. Dejar este campo vacío \(o en 0\) desactiva la funcionalidad. |  |
| Mostrar el enlace de regreso de las lecciones | Desactivar esta opción para esconder el botón 'Regresar a la página principal' dentro de las lecciones. |  |
| Esconder exportación SCORM | Activar esta opción para esconder la opción de exportación SCORM dentro de la lista de lecciones. |  |
| Esconder enlace de copia de lecciones | Activar esta opción para esconder la opción de copia dentro de la lista de lecciones. |  |
| Esconder exportación a PDF de lecciones | Activar esta opción para esconder la opción de exportación a PDF dentro de la lista de lecciones. |  |
| Logo de cabecera PDF | Activar para usar la imagen en css/themes/\[su-css\]/images/pdf\_logo\_header.png como el logo de cabecera de todas las exportaciones en formato PDF \(en vez del logo normal del portal\) |  |
| Iconos de cursos personalizados | Usar las imágenes de cursos como iconos en las listas de cursos \(en vez del icono verde por defecto\) |  |
| Publicar catálogo de cursos | Hace que el catálogo de cursos sea disponible para el público en general, sin necesidad de tener una cuenta en el portal. |  |
| Sesiones |  |  |
| Información del tutor de sesión en el pie | ¿ Mostrar la información del tutor de sesión en el pie ? |  |
| Registro de usuarios por el tutor | El tutor puede registrar nuevos usuarios en la plataforma e inscribirlos en una sesión. |  |
| Mostrar el tutor de la sesión | Mostrar el nombre del tutor global de la sesión dentro de la caja de título de la página del listado de cursos |  |
| Mostrar datos del período de la sesión | Mostrar comentarios de datos de la sesion |  |
| Permitir a los tutores editar dentro de los cursos de las sesiones | Permitir a los tutores editar comentarios dentro de los cursos de las sesiones |  |
| Mostrar las clases a los usuarios | Mostrar las clases a los usuarios. Las clases son una funcionalidad que permite subscribir/desuscribir grupos de usuarios dentro de una sesión o un curso directamente, reduciendo el trabajo administrativo. Cuando activa esta opción, los estudiantes pueden ver de que clase forman parte, a través de su interfaz de red social. |  |
| Ocultar cursos en la lista de sesiones | Cuando muestra los bloques de sesiones en la página de cursos, ocultar la lista de cursos dentro de la sesión \(solo mostrarlos en la página específica de sesión\). |  |
| Página del administrador de sesiones después de identificarse | Página que será cargada después de que un administrador de sesiones se haya identificado |  |
| Inscripción por el propio administrador de sesiones | Un usuario podrá registrarse a sí mismo como administrador de sesiones |  |
| Permitir a los administradores de sesión ver todas las sesiones | Cuando esta opción está desactivada los administradores de sesión solamente podrán ver sus sesiones. |  |
| Impedir a los admins de sesiones de gestionar todos los usuarios | Por activar esta opción, los administradores de sesiones podrán ver, en las páginas de administración, exclúsivamente los usuarios que ellos mismos han creado. |  |
| Permitir a los profesores crear sesiones | Los profesores pueden crear, editar y borrar sus propias sesiones. |  |
| Permitir a los tutores comentar la revisión de ejercicios | Permitir a los tutores editar comentarios durante la revisión de ejercicios |  |
| Directores R.H. pueden acceder al contenido de sesiones | Si activada, esta opción permite que un director de recursos humanos accedan a todo el contenido y los usuarios de las sesiones que esté siguiendo. |  |
| Tutores pueden asignar estudiantes a sesiones | Cuando está activada esta opción, los tutores de cursos dentro de las sesiones pueden inscribir nuevos usuarios a sus sesiones. Sino, esta opción solo está disponible para administradores y administradores de sesión. |  |
| Días de acceso previo a sesiones para tutores | La cantidad de días previos al inicio de la sesión durante los cuales el tutor puede acceder a la sesión. |  |
| Días de acceso del tutor posterior al fin de la sesión | Cantidad por defecto de días posteriores a la fecha de fin de la sesión, durante los cuales el tutor puede seguir accediendo a esta sesión. |  |
| Copia sesión-a-sesión para tutores | Activar esta opción para permitir a los tutores de cursos dentro de sesiones de copiar su contenido dentro de otro curso de otra sesión. Por defecto, esta funcionalidad está desactivada y solo los administradores de la plataforma pueden usarla. |  |
| Auto-suscripción en el catálogo de sesiones | Auto-suscripción en el catálogo de sesiones |  |
| Limitar permisos de administradores de sesión | Activar para solo permitir a los administradores de sesión de ver la opción 'Añadir usuarios' en el bloque de usuarios y la opción de 'Lista de sesiones' en el bloque de sesiones. |  |
| Mostrar descripción de sesión | Mostrar la descripción de la sesión en todos los lugares en los cuales esta opción está implementada \(página de seguimiento de sesiones, etc\). |  |
| Ordenamiento manual de cursos en sesiones | Activar esta opción para permitir a los administradores de sesiones reordenar los cursos dentro de una sesión manualmente. Si esta opción está desactivada, los cursos se ordenan por orden alfabético \(sobre el título del curso\). |  |
| Ver las sesiones por curso | Activa una página "Mis cursos" adicional en la cual las sesiones aparecen como partes del curso, en vez de lo contrario. |  |
| Idiomas |  |  |
| Idioma de la plataforma | Posibilita determinar un idioma diferente para la plataforma del que se establece para la administración siguiendo el siguiente enlace: [Chamilo Platform Languages](http://my.chamilo.net/main/admin/languages.php) |  |
| Ocultar las marcas DLTT | Ocultar la marca \[=...=\] cuando una variable de idioma no esté traducida | Sí |
| Permite definir sub-idiomas | Al activar esta opción, podrá definir variaciones para cada término de idioma usado en la interfaz de la plataforma, como un nuevo idioma basado en un idioma ya existente. Podrá encontrar esta opción en el menú de idiomas de su página de administración. |  |
| Prioridad del idioma 1 | El idioma con la más alta prioridad |  |
| Prioridad del idioma 2 | Prioridad del idioma 2 |  |
| Prioridad del idioma 3 | Prioridad del idioma 3 |  |
| Prioridad del idioma 4 | Prioridad del idioma 4 |  |
| Usuarios |  |  |
| Registro: campos obligatorios | Campos que obligatoriamente deben ser rellenados \(además del nombre, apellidos, nombre de usuario y contraseña\). En el caso de idioma será visible o invisible. |  |
| Agenda personal | ¿ El usuario puede añadir elementos de la agenda personal a la sección 'Mi agenda' ? | No |
| Perfil extendido | Si se configura como 'Verdadero', un usuario puede rellenar los siguientes campos \(opcionales\): 'Mis competencias', 'Mis títulos', '¿Qué puedo enseñar?' y 'Mi área personal pública' |  |
| Campos del perfil extendido del registro | ¿ Qué campos del perfil extendido deben estar disponibles en el proceso de registro de un usuario ? Esto requiere que el perfil extendido esté activado \(ver más arriba\). |  |
| Campos requeridos en el perfil extendido del registro | ¿ Qué campos del perfil extendido son obligatorios en el proceso de registro de un usuario ? Esto requiere que el perfil extendido esté activado y que el campo también esté disponible en el formulario de registro \(véase más arriba\). |  |
| Perfil | ¿Qué parte de su perfil desea que el usuario pueda modificar? |  |
| Permitir que los usuarios puedan cambiar su correo electrónico sin necesidad de solicitar la contraseña | Cuando se modifica la cuenta del usuario |  |
| Módulos |  |  |
| Módulos activos al crear un curso | ¿ Qué herramientas serán activadas \(visibles\) por defecto al crear un curso ? |  |
| Los archivos eliminados no pueden ser recuperados | Si en el área de documentos elimina un archivo, esta eliminación será definitiva. El archivo no podrá ser recuperado después | No |
| Compartir documentos: los documentos se sobrescribirán | ¿ Puede sobrescribirse el documento original cuando un alumno o docente sube un documento con el mismo nombre de otro que ya existe ? Si responde sí, perderá la posibilidad de conservar sucesivas versiones |  |
| Compartir documentos: tamaño máximo de los documentos | ¿ Qué tamaño \(en bytes\) puede tener un documento ? | 95.4 MB |
| ¿ Compartir documentos: subir al propio espacio ? | Permitir a los docentes y a los alumnos subir documentos en su propia sección de documentos compartidos sin enviarlos a nadie más \(=enviarse un documento a uno mismo\) |  |
| Compartir documentos: alumno **Illegal HTML tag removed :** alumno | Permitir a los alumnos enviar documentos a otros alumnos \(peer to peer, intercambio P2P\). Tenga en cuenta que los alumnos pueden usar esta funcionalidad para enviarse documentos poco relevantes \(mp3, soluciones,...\). Si deshabilita esta opción los alumnos sólo podrán enviar documentos a sus docentes | No |
| Compartir documentos: permitir al grupo | Los usuarios pueden enviar archivos a los grupos |  |
| Compartir documentos: permitir el envío por correo | Con la funcionalidad de envío por correo, Ud. puede enviar un documento personal a cada alumno |  |
| Activar el editor de correo electrónico en línea | Si se activa esta opción, al hacer clic en un correo electrónico, se abrirá un editor en línea. | No |
| Habilitar la herramienta mensajes | Activar la herramienta de mensajería interna permite a los usuarios enviar mensajes a otros usuarios de la plataforma y tener una bandeja de entrada de mensajes. | Sí |
| Habilita la herramienta de red social | La herramienta de red social permite a los usuarios definir las relaciones con otros usuarios y con sus grupos de amigos. En combinación con la herramienta de mensajería interna, esta herramienta permite una estrecha comunicación en el entorno del portal. | Sí |
| Permitir a los estudiantes descargar directorios | Permite a los alumnos empaquetar y descargar un directorio completo en la herramienta documentos |  |
| Permitir a los usuarios copiar archivos de un curso en su área de archivos personales | Permite a los usuarios copiar archivos de un curso en su área personal, visible a través de la herramienta de red social o mediante el editor de HTML cuando se encuentran fuera de un curso |  |
| Permitir a los usuarios crear grupos en la red social | Permitir a los usuarios crear sus propios grupos en la red social |  |
| Permitir enviar mensajes a todos los usuarios de la plataforma | Permite poder enviar mensajes a todos los usuarios de la plataforma |  |
| Tamaño máximo del archivo en mensajes | Tamaño máximo del archivo permitido para adjuntar a un mensaje \(en Bytes\) | 20 MB |
| Creación y edición de archivos SVG | Esta opción le permitirá crear y editar archivos SVG \(Gráficos vectoriales escalables\) multicapa en línea, así como exportarlos a imágenes en formato png. | No |
| Permitir a los estudiantes exportar documentos web al formato PDF en las herramientas documentos y wiki | Esta prestación está habilitada por defecto, pero en caso de sobrecarga del servidor por un uso abusivo o en entornos de formación específicos, puede que desee desactivarla en todos los cursos. |  |
| Mostrar las carpetas de los usuarios en la herramienta documentos | Esta opción le permitirá mostrar u ocultar a los docentes las carpetas que el sistema genera para cada usuario que visita la herramienta documentos o envía un archivo a través del editor web... |  |
| Mostrar en la herramienta documentos las carpetas que contienen los recursos multimedia suministrados por defecto. | Las carpetas de archivos multimedia suministradas por defecto contienen archivos de libre distribución organizados en las categorías de video, audio, imagen y animaciones flash que para que las pueda utilizar en sus cursos. Aunque las oculte en la herramienta documentos, podrá seguir usándolas en el editor web de la plataforma. |  |
| Mostrar la carpeta del historial de las conversaciones del chat | Esto mostrará al profesorado la carpeta que contiene todas las sesiones que se han realizado en el chat, así el docente podrá decidir hacerlas visibles o no a los alumnos y utilizarlas como un recurso más. |  |
| Activar servicios de conversión de texto en audio | Herramienta on-line para convertir texto en voz. Utiliza tecnología y sistemas de síntesis del habla para ofrecer recursos de voz. | No |
| Ocultar las herramientas a los docentes | Seleccione las herramientas que desea ocultar al docente. Esto no prohibirá el acceso a la herramienta \(no tiene vocación de seguridad\), pero hará invisible la herramienta para evitar posibles confusiones debidas a una gran cantidad de herramientas \(vocación de usabilidad\). |  |
| Activar los servicios externos de Pixlr | Pixlr le permitirá editar, ajustar y filtrar sus fotografías con prestaciones similares a las de Photoshop. Es el complemento ideal para tratar imágenes basadas en mapas de bits | No |
| Activar el grabador - reproductor de voz Nanogong | Nanogong es un grabador - reproductor de voz que le permite grabar su voz y enviarla a la plataforma o descargarla en su disco duro. También permite reproducir la grabación. Los alumnos sólo necesitan un micrófono y unos altavoces, y aceptar la carga del applet cuando se cargue por primera vez. Es muy útil para que los alumnos de idiomas puedan oír su voz después de oir la correcta pronunciación propuesta por el docente en otro archivo wav o mp3. | No |
| Mostrar vista previa de documento | Mostrar vista previa de documentos en la herramienta de documentos. Este modo permite evitar la carga de una nueva página para mostrar un documento, pero puede resultar inestable en antigüos navegadores o poco práctico en pantallas pequeñas. |  |
| Activar Wami-recorder | Wami-recorder es una herramienta de grabación de voz sobre Flash |  |
| Activar Webcam Clip | Webcam Clip permite a los usuarios capturar imágenes desde su webcam y enviarlas al servidor en formato jpeg |  |
| Herramienta visible al crear un curso | Seleccione las herramientas que serán visibles cuando se crean los cursos |  |
| Visibilidad de documentos definida en curso | La visibilidad por defecto de los documentos en los cursos |  |
| Mostrar los foros de grupo en el foro general | Mostrar los foros de grupo en la herramienta de foro a nivel del curso. Esta opción está habilitada por defecto \(en este caso, las visibilidades individuales de cada foro de grupo siguen teniendo efecto como criterio adicional\). Si está desactivada, los foros de grupo solo se verán en la herramienta de grupo, que estén visibles o no. |  |
| Notificación de respuesta de ejercicio por correo | Valor por defecto para el envío de un correo cuando un ejercicio ha sido completado por un alumno. Este parámetro viene por defecto para cada nuevo curso, pero el profesor puede cambiarlo en su propio curso individualmente. |  |
| Mostrar el código oficial en los resultados de ejercicios | Activar para mostrar el código oficial en los resultados de ejercicios. |  |
| Lecciones: mostrar reporte reducido | Dentro de la herramienta de lecciones, cuando un usuario revisa su propio progreso \(a través del icono de estadísticas\), mostrar una versión más corta \(menos detallada\) del reporte de progreso. |  |
| Cantidad WYSIWYG en resultados de ejercicios | Debido a la alta cantidad de preguntas que pueden aparecer en un ejercicio, la pantalla de corrección, que permite al profesor dejar comentarios en cada respuesta, puede demorar bastante en cargar. Configure este número a 5 para pedir a la plataforma de mostrar editores solo para ejercicios que contienen hasta 5 preguntas. Esto reducirá considerablemente el tiempo de carga de la página de correcciones \(no afecta a los alumnos\), pero eliminará los editores WYSIWYG en la página y dejará solo campos de comentarios en texto plano. |  |
| Modo de subida de documentos por defecto | Método de subida de documentos por defecto. Este parámetro puede ser cambiado al momento de subir documentos por cualquier usuario. Solo representa el valor por defecto de esta configuración. |  |
| Auto-generación de certificados por webservice | Cuando esta opción se encuentra habilitada, y cuando se usa el web service WSCertificatesList, el sistema verificará que todos los certificados pendientes han sido generados para los usuarios que han obtenido los resultados suficientes en todos los elementos definidos en las evaluaciones de todos los cursos y sesiones. Aunque esta opción quede muy práctica, puede generar una sobrecarga notable en portales con miles de usuarios. A usar con la debida precaución. |  |
| Cookies: Notificación de privacidad | Activar esta opción para mostrar un banner en la parte superior de la página que pida al usuario de aprobar el uso de cookies en esta plataforma para permitir darle una experiencia de usuario normal. Este banner puede fácilmente ser aprobado y escondido por el usuario. Permite a Chamilo cumplir con las regulaciones de la Unión Europea en cuanto al uso de cookies. |  |
| Esconder grupos en ausencia de herramientas | Si ninguna herramienta está disponible en un grupo y el usuario no está registrado al grupo mismo, esconder el grupo por completo en la lista de grupos. |  |
| Asistencias: permitir borrado | El comportamiento por defecto de Chamilo es de esconder las hojas de asistencias en vez de borrarlas, en caso el profesor lo haga por error. Activar esta opción si desea permitir al profesor de _realmente_ borrar hojas de asistencias. |  |
| Compartir documentos: esconder tutor de curso | Esconder el tutor del curso en la sesión en la herramienta de 'compartir documentos' si fue enviado por el tutor a estudiantes |  |
| Editor HTML |  |  |
| Editor matemático ASCIIMathML | Habilitar el editor matemático ASCIIMathML |  |
| Activar AsciiSVG | Activar el plugin AsciiSVG en el editor WYSIWYG para dibujar diágramas a partir de funciones matemáticas. |  |
| Cargar la librería Mathjax para todas las páginas de la plataforma | Active este parámetro si desea mostrar fórmulas matemáticas basadas en MathML y gráficos matemáticos basados en ASCIIsvg, no solo en la herramienta "Documentos", pero también en otras herramientas de la plataforma. |  |
| Permitir a los estudiantes insertar videos de YouTube | Habilitar la posibilidad de que los alumnos puedan insertar videos de Youtube |  |
| Bloquear a los estudiantes copiar y pegar | Bloquear a los alumnos la posibilidad de copiar y pegar en el editor WYSIWYG |  |
| Barras de botones extendidas | Habilitar las barras de botones extendidas cuando el editor WYSIWYG está maximizado |  |
| Editor matemático WIRIS | Activar el editor matemático WIRIS. Instalando este plugin obtendrá WIRIS editor y WIRIS CAS... |  |
| Corrector ortográfico | Activar el corrector ortográfico |  |
| Obligar a pegar como texto plano en el Wiki | Esto impedirá que muchas etiquetas ocultas, incorrectas o no estándar, copiadas de otros textos acaben corrompiendo el texto del Wiki después de muchas ediciones. A cambio perderá algunas posibilidades durante la edición. |  |
| Activar Google maps | Activar el botón para insertar mapas de Google. La activación no se realizará completamente si previamente no ha editado el archivo main/inc/lib/fckeditor/myconfig.php y añadido una clave API de Google maps. |  |
| Activar Mapas de imagen | Activar el botón para insertar Mapas de imagen. Esto le permitirá asociar direcciones url a zonas de una imagen, generando zonas interactivas. |  |
| Permitir la inserción de Widgets | Esto le permitirá embeber en sus páginas web sus videos y aplicaciones favoritas como vimeo o slideshare y todo tipo de widgets y gadgets |  |
| HTMLPurifier en el wiki | Activar HTMLPurifier en la herramienta de wiki \(aumentará la seguridad pero reducirá las opciones de estilo\) |  |
| Permitir iframes en el editor HTML | Permitir iframes en el editor HTML aumentará las capacidades de edición de los usuarios, pero puede representar un riesgo de seguridad. Asegúrese de que puede confiar en sus usuarios \(por ejemplo, usted sabe quienes son\) antes de activar esta prestación. |  |
| Activar MathJax | Activar el editor matemático MathJax. |  |
| Seguridad |  |  |
| Tipo de filtrado en los envíos de documentos | Utilizar un filtrado blacklist o whitelist. Para más detalles, vea más abajo la descripción ambos filtros. |  |
| Blacklist - parámetros | La blacklist o lista negra, se usa para filtrar los ficheros según sus extensiones, eliminando \(o renombrando\) cualquier fichero cuya extensión se encuentre en la lista inferior. Las extensiones deben figurar sin el punto \(.\) y separadas por punto y coma \(;\) por ejemplo: exe; COM; palo; SCR; php. Los archivos sin extensión serán aceptados. Que las letras estén en mayúsculas o en minúsculas no tiene importancia. |  |
| Whitelist - parámetros | La whitelist o lista blanca, se usa para filtrar los ficheros según sus extensiones, eliminando \(o renombrando\) cualquier fichero cuya extensión _NO_ figure en la lista inferior. Es el tipo de filtrado más seguro, pero también el más restrictivo. Las extensiones deben figurar sin el punto \(.\) y separadas por punto y coma \(;\) por ejemplo: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Los archivos sin extensión serán aceptados. Que las letras estén en mayúsculas o en minúsculas no tiene importancia. | htm;html;jpg;jpeg;gif;png; swf;avi;mpg;mpeg;mov;flv; doc;docx;xls;xlsx;ppt;pptx;odt;odp;ods;pdf |
| Comportamiento del filtrado \(eliminar/renombrar\) | Si elige eliminar, los archivos filtrados a través de la blacklist o de la whitelist no podrán ser enviados al sistema. Si elige renombrarlos, su extensión será sustituida por la definida en la configuración del reemplazo de extensiones. Tenga en cuenta que renombrarlas realmente no le protege y que puede ocasionar un conflicto de nombres si previamente existen varios ficheros con el mismo nombre y diferentes extensiones. |  |
| Reemplazo de extensiones | Introduzca la extensión que quiera usar para reemplazar las extensiones peligrosas detectadas por el filtro. Sólo es necesario si ha seleccionado filtrar por reemplazo. | dangerous |
| Permisos para los nuevos directorios | La posibilidad de definir la configuración de los permisos asignados a los nuevos directorios, aumenta la seguridad contra los ataques de hackers que puedan enviar material peligroso a la plataforma. La configuración por defecto \(0770\) debe ser suficiente para dar a su servidor un nivel de protección razonable. El formato proporcionado utiliza la terminología de UNIX Propietario-Grupo-Otros con los permisos de Lectura-Escritura-Ejecución. |  |
| Permisos para los nuevos archivos | La posibilidad de definir la configuración de los permisos asignados a los nuevos archivos, aumenta la seguridad contra los ataques de hackers que puedan enviar material peligroso a la plataforma. La configuración por defecto \(0550\) debe ser suficiente para dar a su servidor un nivel de protección razonable. El formato proporcionado utiliza la terminología de UNIX Propietario-Grupo-Otros, con los permisos de Lectura-Escritura-Ejecución. |  |
| Autenticación OpenID | Activar la autenticación basada en URL OpenID \(muestra un formulario adicional de identificación en la página principal de la plataforma\) |  |
| Ampliar los permisos del tutor | La activación de esta opción dará a los tutores los mismos permisos que tenga un docente sobre las herramientas de autoría |  |
| Ampliar los permisos de los tutores en las encuestas | La activación de esta opción dará a los tutores el derecho de crear y editar encuestas |  |
| Permitir a los docentes registrar usuarios en un curso | Al activar esta opción permitirá que los docentes puedan inscribir usuarios en su curso |  |
| Single Sign On \(registro único\) | La activación de Single Sign On le permite conectar esta plataforma como cliente de un servidor de autenticación, por ejemplo una web de Drupal que tenga el módulo Drupal-Chamilo o cualquier otro servidor con una configuración similar. |  |
| Dominio del servidor de Single Sign On | Dominio del servidor de Single Sign On \(dirección web del servidor que permitirá el registro automático dentro de Chamilo\). La dirección del servidor debe escribirse sin el protocolo al comienzo y sin la barra al final, por ejemplo www.example.com |  |
| URL del servidor de Single Sign On | Dirección de la página encargada de verificar la autenticación. Por ejemplo, en el caso de Drupal: /?q=user |  |
| URL de logout del servidor de Single Sign Out | Dirección de la página del servidor que desconecta a un usuario. Esta opción únicamente es útil si desea que los usuarios que se desconectan de Chamilo también se desconecten del servidor de autenticación. |  |
| Protocolo del servidor Single Sign On | que indica el protocolo del dominio del servidor de Single Sign On \(si su servidor lo permite, recomendamos https:// pues protocolos no seguros son un peligro para un sistema de autenticación\) |  |
| Filtrar términos | Proporcione una lista de términos, uno por línea, que serán filtrados para que no aparezcan en sus páginas web y correos electrónicos. Estos términos serán reemplazados por _\*_ |  |
| Validar complejidad de contraseña | Al activar esta opción, aparecerá un indicador de complejidad de contraseña cuando el usuario cambie su contraseña. Esto _NO_ prohibe el ingreso de una mala contraseña. Solamente actua como una ayuda visual. |  |
| CAPTCHA | Al activar esta opción, aparecerá un CAPTCHA en el formulario de ingreso, para evitar los intentos de ingreso por fuerza bruta |  |
| Margen de errores en CAPTCHA | Cuantas veces uno se puede equivocar al ingresar su usuario y contraseña con el CAPTCHA antes de que su cuenta quede congelada por un tiempo. |  |
| Tiempo bloqueo CAPTCHA | Si el usuario alcanza el máximo de veces que se puede equivocar de contraseña \(con el CAPTCHA activado\), su cuenta será congelada \(bloqueada\) por esta cantidad de minutos. | 5 |
| Single Sign On: forzar la redirección | Activar esta opción para forzar los usuarios a autentificarse en el portal maestro cuando se usa un método de Single Sign On externo. Solo activarlo cuando esté seguro que su procedimiento de Single Sign On esté correctamente configurado, sino podría impedirse a si mismo de volver a conectarse \(en este caso, cambie los parámetros SSO dentro de la tabla settings\_current a través de un acceso directo a la base de datos para desbloquearlo\). |  |
| Prevenir logins simultáneos | Impide la conexión simultánea de varios navegadores con la misma cuenta de usuario. Se trata de una buena opción si ofrece un campus virtual de pago, pero puede ser algo complejo si realiza pruebas ya que un solo navegador podrá conectarse para cada cuenta de usuario. |  |
| Llave de reinicio de contraseña | Esta opción permite la generación de una llave de reinicio de contraseña que expira después de un rato y solo se puede usar una vez. La llave se envía por correo electrónico, y el usuario puede seguir el enlace para volver a generar su contraseña. |  |
| Clave de reinicio de contraseña: límite de tiempo | El número de segundos antes de que la llave generada se venza automáticamente y no pueda ser usada por nadie. En este caso, una nueva llave tiene que ser generada. | 3600 |
| Mejorar el rendimiento |  |  |
| Dividir el directorio de transferencias \(upload\) de los usuarios | En plataformas que tengan un uso muy elevado, donde están registrados muchos usuarios que envían sus fotos, el directorio al que se transfieren \(main/upload/users/\) puede contener demasiados archivos para que el sistema los maneje de forma eficiente \(se ha documentado el caso de un servidor Debian con más de 36000 archivos\)... |  |
| Activar el investigador de navegadores | Esto activará un investigador de las capacidades que soportan los navegadores que se conectan a Chamilo. Por lo tanto, mejorará la experiencia del usuario, adaptando las respuestas de la plataforma al tipo de navegador que se conecta, pero reducirá la velocidad de carga de la página inicial de los usuarios cada vez que entren a la plataforma. | No |
| Evaluaciones |  |  |
| Coloreado de puntuación | Seleccione la casilla para habilitar el coloreado de las puntuaciones \(por ejemplo, tendrá que definir qué puntuaciones serán marcadas en rojo\) |  |
| Personalización de la presentación de las puntuaciones | Marque la casilla para activar la personalización de las puntuaciones \(seleccione el nivel que se asociará a cada puntuación\) |  |
| Límite para el coloreado de las puntuaciones | Porcentaje límite por debajo del cual las puntuaciones se colorearán en rojo |  |
| Mostrar el límite superior de puntuación | Marque la casilla para mostrar el límite superior de la puntuación |  |
| Número de decimales | Establecer el número de decimales permitidos en una puntuación | 0 |
| Permitir al perfil RRHH administrar las competencias | El usuario podrá crear y editar competencias |  |
| Los profesores pueden cambiar la configuración de puntuación de las evaluaciones | Al editar la configuración de las Evaluaciones |  |
| Habilitar el modelo de calificación en el cuaderno de evaluaciones | Permite utilizar un modelo de calificacíón en el cuaderno de evaluaciones |  |
| Los profesores pueden cambiar el modelo de calificación dentro del cuaderno de evaluaciones | Cuando se edita una evaluación |  |
| Peso total por defecto en la herramienta "Evaluaciones" | Este peso será utilizado en todos los cursos |  |
| Activar bloqueo de Evaluaciones por los profesores | Una vez activada, esta opción permitirá a los profesores bloquear cualquier evaluación dentro de su curso. Esto prohibirá al profesor cualquier modificación posterior de los resultados de sus alumnos en los recursos usados para esta evaluación: exámenes, lecciones, tareas, etc. El único rol autorizado a desbloquear una evaluación es el administrador. El profesor estará informado de esta posibilidad al intentar desbloquear la evaluación. El bloqueo como el desbloqueo estarán guardados en el registro de actividades importantes del sistema. |  |
| Modelo de calificación por defecto | Este valor será seleccionado por defecto cuando se crea un curso |  |
| Tareas consideradas para evaluaciones | En la herramienta de tareas, los estudiantes pueden subir más de un archivo. En caso haya más de un archivo del mismo estudiante para una sola tarea, cual de estos debe ser considerado para la nota en las evaluaciones? Esto depende de su metodología. Seleccione 'primero' para poner el acento sobre la atención al detalle \(como entregar a tiempo y el trabajo finalizado desde la primera vez\). Use 'último' para poner el acento sobre el trabajo colaborativo y la adaptabilidad. |  |
| Certificados: filtro por código oficial | Añadir un filtro sobre los códigos oficiales de los estudiantes en la lista de certificados. |  |
| OpenBadges: URL de backpack | La URL de servidor de mochilas de OpenBadges que será usada para todos los usuarios que deseen exportar sus badges. Por defecto, se usa el repositorio abierto de la Fundación Mozilla: [https://backpack.openbadges.org/](https://backpack.openbadges.org/) |  |
| Certificados: esconder exportación para estudiantes | Al activar esta opción, los estudiantes no podrán exportar su certificado en PDF. Esta opción es disponible porque, dependiendo del tipo preciso de estructura HTML usada para la plantilla del certificado, el PDF generado puede tener defectos. En este caso, puede ser mejor solo permitir a los alumnos visualizar los certificados en HTML \(es decir en su navegador\). |  |
| Certificados: esconder exportación PDF de todos | Activar para eliminar completamente la posibilidad de exportar certificados \(para cualquier usuario\). Si está activado, sobreescribe el valor configurado para el acceso a certificados para estudiantes. |  |
| Columnas adicionales en evaluaciones | Muestra columnas adicionales en la vista estudiante de la herramienta de evaluaciones. Estas columnas dan el mejor resultado del salón, la posición corelativa del alumno frente a los demás, y el promedio de todas las notas del salón. |  |
| Zonas horarias |  |  |
| Utilizar las zonas horarias de los usuarios | Activar la selección por los usuarios de su zona horaria. El campo de zona horaria debe seleccionarse como visible y modificable antes de que los usuarios elijan su cuenta. Una vez configurada los usuarios podrán verla. |  |
| Zona horaria | Esta es la zona horaria de este portal. Si la deja vacía, se usará la zona horaria del servidor. Si la configura, todas las horas del sistema se mostrarán en función de ella. Esta configuración tiene una prioridad más baja que la zona horaria del usuario si éste habilita y selecciona otra. | Valor definido en php.ini |
| Informes |  |  |
| Contenido extra en la cabecera | Puede agregar código HTML como los meta tags |  |
| Contenido extra en el pie | Puede incluir contenido HTML como meta tags |  |
| Cuenta Twitter Site | La cuenta Twitter Site es una cuenta Twitter \(ej: @chamilo\_news\) que se relaciona con su portal. Usualmente, se trata de una cuenta temporal o institucional, más no de una cuenta de un indivíduo en particular \(como la es la del Twitter Creator\). Este campo es obligatorio para mostrar el resto de campos de las Twitter Cards. |  |
| Cuenta Twitter Creator | Cuenta personal de Twitter \(ej: @ywarnier\) que representa la _persona_ que está a cargo de o representa este portal. Este campo es opcional. |  |
| Título meta OpenGraph | Esto incluirá el tag OpenGraph Title \(og:title\) en las cabeceras \(invisibles\) de su portal. |  |
| Descripción Meta | Esto incluirá el tag de descripción OpenGraph \(og:description\) en las cabeceras \(invisibles\) de su portal. |  |
| Ruta de imagen Meta | Esta es la ruta hacia una imagen, dentro de la estructura de carpetas de Chamilo \(ej: home/image.png\) que representará su portal en una Twitter Card o una OpenGraph Card cuando alguien publique un enlace a su portal en un sitio que soporte uno de estos dos formatos. Twitter recomienda que la imagen sea de 120 x 120 píxeles de dimensiones, pero a veces se reduce a 120x90, por lo que debería quedar bien en ambas dimensiones. |  |
| Buscar |  |  |
| Búsqueda a texto completo | Esta funcionalidad permite la indexación de la mayoría de los documentos subidos a su portal, con lo que permite la búsqueda para los usuarios.Esta funcionalidad no indexa los documentos que ya fueron subidos, por lo que es importante \(si se quiere\) activarla al comienzo de su implementación.Una vez activada, una caja de búsqueda aparecerá en la lista de cursos de cada usuario. Buscar un término específico suministra una lista de documentos, ejercicios o temas de foro correspondientes, filtrados dependiendo de su disponibilidad para el usuario. | No |
| Hojas de estilo |  |  |
| Nombre de la hoja de estilo |  | Chamilo |
| Plantillas |  |  |
| Lista de plantillas de documentos |  |  |
| Plugins |  |  |
| Página de plugins | Esta sección incluye plugins, plugins del panel de control y configuración de servicios |  |
| LDAP |  |  |
| Información | Esta sección solía integrar distintos parámetros para configurar un servidor LDAP, pero debido a carencias de flexibilidad de este método de configuración, se ha movido esta configuración y ahora se encuentra en un archivo de configuración \(app/config/auth.conf.php\) |  |
| CAS |  |  |
| Activar la autentificación CAS | Activar la autentificación CAS permitirá a usuarios autentificarse con sus credenciales CAS |  |
| Servidor CAS principal | Es el servidor CAS principal que será usado para la autentificación \(dirección IP o nombre\) |  |
| URI del servidor CAS principal | El camino hasta el servicio CAS en el servidor |  |
| Puerto del servidor CAS principal | El puerto en el cual uno se puede conectar al servidor CAS principal |  |
| Protocolo del servidor CAS principal | Protocolo con el que nos conectamos al servidor CAS |  |
| Activar registrar usuarios mediante CAS | Permite crear cuentas de usuarios con CAS |  |
| Actualizar la información con LDAP \(parámetro de configuración interno de CAS\) | Actualizar la información de usuario con LDAP \(Parámetro de configuración CAS\) |  |
| Shibboleth |  |  |
| Información | Esta sección describe la configuración que tiene que estar en un archivo de configuración \(main/auth/shibboleth/config/aai.class.php\) |  |
| Facebook |  |  |
| Autenticación con Facebook | En primer lugar, se tiene que crear una aplicación de Facebook \(ver [https://developers.facebook.com/apps](https://developers.facebook.com/apps)\) con una cuenta de Facebook. En los parámetros de aplicaciones de Facebook, el valor de dirección URL del sitio debe tener "una acción = fbconnect" un parámetro GET \([http://mychamilo.com/?action=fbconnect](http://mychamilo.com/?action=fbconnect), por ejemplo\). Entonces, editar el archivo main/auth/external\_login/facebook.conf.php e ingresar en "appId" y "secret" los valores de $facebook\_config. Ir a Plug-in para añadir un botón configurable "Facebook Login" para el campus de Chamilo. |  |
| Crons |  |  |
| Enviar notificación de finalización de curso | Enviar un correo electrónico a los estudiantes cuando su curso \(o sesión\) ha finalizado. Esto requiere tareas cron para ser configurado \(ver directorio main/cron/\). |  |
| Frecuencia del recordatorio de expiración de curso \(sesión\) | Número de días antes de la expiración del curso a considerar para enviar el correo electrónico de recordatorio |  |
| Cron de Recordatorio de Expiración de Curso | Habilitar el cron de envío de recordatorio de expiración de cursos |  |

