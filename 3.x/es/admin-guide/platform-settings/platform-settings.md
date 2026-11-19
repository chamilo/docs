# Configuración de la plataforma

Identidad y comportamiento a nivel de plataforma: nombre de la institución, zona horaria, política de registro, usuarios en línea y opciones de rendimiento.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Plataforma**. Esta categoría contiene **30 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_my_files`

**Activar la sección «Mis archivos»**

Permite a los usuarios subir archivos a un espacio personal en la plataforma.

*Valor predeterminado: `true`*

### `chamilo_database_version`

**Versión actual del esquema de base de datos utilizado por Chamilo**

Muestra la versión actual de la base de datos para que coincida con la versión del núcleo de Chamilo.

### `cookie_warning`

**Aviso de privacidad sobre cookies**

Si está activada, esta opción muestra un banner en la parte superior de la plataforma que pide a los usuarios que reconozcan que la plataforma utiliza cookies necesarias para ofrecer la experiencia de usuario. El usuario puede aceptar y ocultar el banner fácilmente. Esto permite a Chamilo cumplir la normativa europea sobre cookies web.

*Valor predeterminado: `false`*

### `disable_copy_paste`

**Desactivar copiar y pegar**

Cuando está activada, esta opción desactiva en la medida de lo posible los mecanismos de copiar y pegar. Resulta útil en configuraciones de exámenes restrictivas.

*Valor predeterminado: `false`*

### `donotlistcampus`

**No incluir este campus en chamilo.org**

De forma predeterminada, los portales de Chamilo se registran automáticamente en una lista pública en chamilo.org, utilizando únicamente el título que haya asignado a este portal (ni la URL ni ningún dato privado). Marque esta casilla para evitar que aparezca el título de su portal.

*Valor predeterminado: `false`*

### `generate_random_login`

**Generar nombre de usuario aleatorio**

Al importar usuarios (procesos por lotes), genera automáticamente una cadena aleatoria como nombre de usuario. De lo contrario, el nombre de usuario se generará a partir del nombre y los apellidos, o del prefijo del correo electrónico.

*Valor predeterminado: `false`*

### `hosting_limit_identical_email`

**Limitar el uso del mismo correo electrónico**

Número máximo de cuentas que pueden compartir la misma dirección de correo electrónico. Establezca el valor en 0 para desactivar este límite.

*Valor predeterminado: `0`*

### `hosting_limit_users_per_course`

**Límite global de usuarios por curso**

Define un número máximo global de usuarios (incluidos los docentes) que pueden estar inscritos en un mismo curso de la plataforma. Establezca este valor en 0 para desactivar el límite. Esto ayuda a evitar que los cursos se sobrecarguen en portales abiertos.

*Valor predeterminado: `0`*

### `institution`

**Nombre de la organización**

El nombre de la organización (aparece en el encabezado, a la derecha)

*Valor predeterminado: `Chamilo.org`*


### `institution_address`

**Dirección de la institución**

Dirección

### `institution_url`

**URL de la organización (dirección web)**

La URL de la institución (el enlace que aparece en el encabezado, a la derecha)

*Valor predeterminado: `http://www.chamilo.org`*


### `max_courses_per_user`

**Número máximo de cursos por usuario**

Número máximo de cursos que puede crear un docente o formador. Establezca el valor en 0 para desactivar el límite. Puede anularse por usuario mediante la compra de un servicio de BuyCourses.

*Valor predeterminado: `0`*

### `notification_event`

**Activar la herramienta de notificaciones para un canal de comunicación más eficaz con los estudiantes**

Activa notificaciones emergentes o del sistema para eventos importantes de la plataforma.

*Valor predeterminado: `false`*

### `pdf_img_dpi`

**Resolución de exportación a PDF**

Representa la resolución de los archivos PDF generados (en puntos por pulgada, o dpi). El valor predeterminado es 96. Aumentarlo produce archivos PDF de mejor resolución, pero también incrementa el peso y el tiempo de generación de los archivos.

*Valor predeterminado: `96`*

### `platform_logo_url`

**URL del logotipo alternativo de la plataforma**

Sustituye el logotipo de Chamilo cargando una URL (posiblemente remota). Asegúrese de que sus políticas de seguridad lo permiten.

*Valor predeterminado: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Activar el uso compartido avanzado del portafolio**

Decida quién puede ver las publicaciones y los comentarios del portafolio.

*Valor predeterminado: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostrar las publicaciones del curso base en el curso de sesión**

Decida quién puede ver las publicaciones y los comentarios del portafolio.

*Valor predeterminado: `false`*

### `push_notification_settings`

**Ajustes de notificaciones push (JSON)**

Configuración JSON para la integración de notificaciones push.

### `server_type`

**Tipo de servidor**

Define el tipo de entorno: «prod» (producción normal), «validation» (como producción, pero sin informes estadísticos) o «test» (modo de depuración con herramientas para desarrolladores, como indicadores de cadenas no traducidas).

*Valor predeterminado: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Permitir que los administradores de sesión vean todos los usuarios en todas las URL**

Si está activada, los administradores de sesión pueden buscar y listar usuarios de todas las URL de acceso, independientemente de su URL actual.

*Valor predeterminado: `false`*

### `site_name`

**Nombre del portal de e-learning**

El nombre de su portal Chamilo (aparece en el encabezado)

*Valor predeterminado: `Chamilo site`*


### `timepicker_increment`

**Incremento del selector de hora**

Incremento mínimo de tiempo (en minutos) al seleccionar una fecha y una hora con el widget selector de hora. Por ejemplo, puede no ser útil disponer de incrementos inferiores a 5 o 15 minutos al hablar del envío de una tarea, la disponibilidad de un examen, la hora de inicio de una sesión, etc.

*Valor predeterminado: `15`*

### `timezone`

**Zona horaria predeterminada**

Seleccione la zona horaria predeterminada de este portal. Esto ayudará a establecer la zona horaria (si la función está habilitada) para cada usuario nuevo o para cualquier usuario que aún no haya definido una zona horaria específica. Las zonas horarias permiten mostrar en pantalla toda la información relacionada con el tiempo en la zona horaria específica de cada usuario.

*Valor predeterminado: `Europe/Paris`*


### `unoconv_binaries`

**Binarios del conversor UNO**

Indique la ruta del sistema a la biblioteca del conversor UNO para habilitar algunas funciones adicionales de exportación.

*Valor predeterminado: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Usar el ID externo de la carrera en los diagramas**

Si se utilizan diagramas de carrera, mostrar un campo adicional en lugar del ID interno de la carrera.

*Valor predeterminado: `false`*

### `use_custom_pages`

**Usar páginas personalizadas**

Habilite esta función para configurar páginas de inicio de sesión específicas según el rol

*Valor predeterminado: `false`*

### `use_virtual_keyboard`

**Usar teclado virtual**

Hacer que aparezca un teclado virtual. Esto resulta útil al configurar exámenes restrictivos en un aula física donde los estudiantes no disponen de teclado, a fin de limitar su capacidad de hacer trampas.

*Valor predeterminado: `false`*

### `user_status_show_option`

**Opciones de visualización de roles**

Un array de rol => true/false que define si ese rol debe mostrarse u ocultarse.

### `user_status_show_options_enabled`

**Visualización selectiva de roles**

Habilite el uso de un array para definir qué roles deben mostrarse claramente y cuáles deben ocultarse.

*Valor predeterminado: `false`*

### `personal_files_quota_mb`

**Mis archivos: cuota total de almacenamiento por usuario (MB)**

Tamaño total máximo de los archivos personales de cada usuario. Este límite no se aplica a los documentos del curso, Dropbox ni a los beneficios de BuyCourses.

*Valor predeterminado: `0` (ilimitado)*

Consulte [PR de cuotas de almacenamiento #9358](https://github.com/chamilo/chamilo-lms/pull/9358).