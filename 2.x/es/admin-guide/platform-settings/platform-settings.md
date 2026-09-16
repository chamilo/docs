# Configuración de la Plataforma

Identidad y comportamiento a nivel de plataforma: nombre de la institución, zona horaria, política de registro, usuarios en línea, indicadores de rendimiento.

Accede a estas configuraciones en **Administración > Configuraciones > Plataforma**. Esta categoría contiene **29 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úsalo cuando realices scripts a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_my_files`

**Habilitar la sección 'Mis Archivos'**

Permite a los usuarios subir archivos a un espacio personal en la plataforma.

*Predeterminado: `true`*

### `chamilo_database_version`

**Versión actual del esquema de la base de datos utilizado por Chamilo**

Muestra la versión actual de la base de datos para que coincida con la versión del núcleo de Chamilo.

### `cookie_warning`

**Notificación de privacidad de cookies**

Si está habilitada, esta opción muestra un banner en la parte superior de la plataforma que solicita a los usuarios que reconozcan que la plataforma utiliza cookies necesarias para proporcionar la experiencia de usuario. El banner puede ser aceptado y ocultado fácilmente por el usuario. Esto permite a Chamilo cumplir con las regulaciones de cookies web de la UE.

*Predeterminado: `false`*

### `disable_copy_paste`

**Deshabilitar copiar y pegar**

Cuando está habilitada, esta opción desactiva en la medida de lo posible los mecanismos de copiar y pegar. Útil en configuraciones de exámenes restrictivos.

*Predeterminado: `false`*

### `donotlistcampus`

**No listar este campus en chamilo.org**

Por defecto, los portales de Chamilo se registran automáticamente en una lista pública en chamilo.org, utilizando solo el título que le diste a este portal (no la URL ni datos privados). Marca esta casilla para evitar que el título de tu portal aparezca.

*Predeterminado: `false`*

### `generate_random_login`

**Generar nombre de usuario aleatorio**

Al importar usuarios (procesos por lotes), genera automáticamente una cadena aleatoria para el nombre de usuario. De lo contrario, el nombre de usuario se generará en base al nombre y apellido, o al prefijo del correo electrónico.

*Predeterminado: `false`*

### `hosting_limit_identical_email`

**Limitar el uso de correos electrónicos idénticos**

Número máximo de cuentas permitidas para compartir la misma dirección de correo electrónico. Establece en 0 para deshabilitar este límite.

*Predeterminado: `0`*

### `hosting_limit_users_per_course`

**Límite global de usuarios por curso**

Define un número máximo global de usuarios (incluidos los profesores) que pueden estar inscritos en un solo curso en la plataforma. Establece este valor en 0 para deshabilitar el límite. Esto ayuda a evitar que los cursos se sobrecarguen en portales abiertos.

*Predeterminado: `0`*

### `institution`

**Nombre de la organización**

El nombre de la organización (aparece en el encabezado a la derecha)

*Predeterminado: `Chamilo.org`*

### `institution_address`

**Dirección de la institución**

Dirección

### `institution_url`

**URL de la organización (dirección web)**

La URL de las instituciones (el enlace que aparece en el encabezado a la derecha)

*Predeterminado: `http://www.chamilo.org`*

### `max_courses_per_user`

**Máximo de cursos por usuario**

Número máximo de cursos que un profesor/formador puede crear. Establece en 0 para deshabilitar el límite. Puede ser anulado por usuario mediante la compra de un servicio BuyCourses.

*Predeterminado: `0`*

### `notification_event`

**Habilitar la herramienta de notificación para un canal de comunicación más impactante con los estudiantes**

Activa notificaciones emergentes o del sistema para eventos importantes de la plataforma.

*Predeterminado: `false`*

### `pdf_img_dpi`

**Resolución de exportación a PDF**

Representa la resolución de los archivos PDF generados (en puntos por pulgada, o dpi). El valor predeterminado es 96. Aumentarlo te dará archivos PDF de mejor resolución, pero también aumentará el peso y el tiempo de generación de los archivos.

*Predeterminado: `96`*

### `platform_logo_url`

**URL para logotipo alternativo de la plataforma**

Reemplaza el logotipo de Chamilo cargando una URL (posiblemente remota). Asegúrate de que esto esté permitido por tus políticas de seguridad.

*Predeterminado: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Habilitar compartición avanzada de portafolio**

Decide quién puede ver las publicaciones y comentarios del portafolio.

*Predeterminado: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostrar publicaciones de cursos base en cursos de sesión**

Decide quién puede ver las publicaciones y comentarios del portafolio.

*Predeterminado: `false`*

### `push_notification_settings`

**Configuraciones de notificaciones push (JSON)**

Configuración JSON para la integración de notificaciones push.

### `server_type`

**Tipo de servidor**

Define el tipo de entorno: "prod" (producción normal), "validation" (como producción pero sin reportar estadísticas), o "test" (modo de depuración con herramientas para desarrolladores como indicadores de cadenas no traducidas).

*Predeterminado: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Permitir a los administradores de sesión ver todos los usuarios en todas las URLs**

Si está habilitado, los administradores de sesión pueden buscar y listar usuarios de todas las URLs de acceso, independientemente de su URL actual.

*Predeterminado: `false`*

---
### `site_name`

**Nombre del portal de e-learning**

El nombre de tu portal Chamilo (aparece en el encabezado)

*Predeterminado: `Chamilo site`*

### `timepicker_increment`

**Incremento del selector de tiempo**

Incremento mínimo de tiempo (en minutos) al seleccionar una fecha y hora con el widget de selección de tiempo. Por ejemplo, podría no ser útil tener incrementos menores a 5 o 15 minutos cuando se habla de la entrega de tareas, la disponibilidad de un examen, la hora de inicio de una sesión, etc.

*Predeterminado: `15`*

### `timezone`

**Zona horaria predeterminada**

Selecciona la zona horaria predeterminada para este portal. Esto ayudará a establecer la zona horaria (si la función está habilitada) para cada nuevo usuario o para cualquier usuario que aún no haya configurado una zona horaria específica. Las zonas horarias permiten mostrar toda la información relacionada con el tiempo en pantalla según la zona horaria específica de cada usuario.

*Predeterminado: `Europe/Paris`*

### `unoconv_binaries`

**Binarios del convertidor UNO**

Proporciona la ruta del sistema a la biblioteca del convertidor UNO para habilitar algunas funciones adicionales de exportación.

*Predeterminado: `/usr/bin/unoconv`*

### `use_career_external_id_as_identifier_in_diagrams`

**Usar ID externo de carrera en diagramas**

Si se utilizan diagramas de carrera, muestra un campo adicional en lugar del ID interno de la carrera.

*Predeterminado: `false`*

### `use_custom_pages`

**Usar páginas personalizadas**

Habilita esta función para configurar páginas de inicio de sesión específicas según el rol.

*Predeterminado: `false`*

### `use_virtual_keyboard`

**Usar teclado virtual**

Hace que aparezca un teclado virtual. Esto es útil al configurar exámenes restrictivos en una sala física donde los estudiantes no tienen teclado para limitar su capacidad de hacer trampa.

*Predeterminado: `false`*

### `user_status_show_option`

**Opciones de visualización de roles**

Un arreglo de rol => verdadero/falso que define si ese rol debe mostrarse u ocultarse.

### `user_status_show_options_enabled`

**Visualización selectiva de roles**

Habilita para usar un arreglo que defina qué roles deben mostrarse claramente y cuáles deben ocultarse.

*Predeterminado: `false`*