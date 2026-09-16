# Configuración de Identidad del Administrador

Detalles de identidad y contacto del administrador de la plataforma. Estos valores aparecen en el pie de página de la plataforma y en algunos correos electrónicos generados por el sistema.

Acceda a estas configuraciones en **Administración > Configuraciones > Identidad del Administrador**. Esta categoría contiene **12 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `administrator_email`

**Administrador del Portal: Correo Electrónico**

La dirección de correo electrónico del Administrador de la Plataforma (aparece en el pie de página a la izquierda)

### `administrator_name`

**Administrador del Portal: Nombre**

El nombre del Administrador de la Plataforma (aparece en el pie de página a la izquierda)

### `administrator_phone`

**Administrador del Portal: Número de Teléfono**

El número de teléfono del Administrador de la Plataforma (aparece en el pie de página a la izquierda)

### `administrator_surname`

**Administrador del Portal: Apellido**

El apellido del Administrador de la Plataforma (aparece en el pie de página a la izquierda)

### `chamilo_latest_news`

**Últimas noticias**

Obtenga las últimas noticias de Chamilo, incluidas vulnerabilidades de seguridad y eventos, directamente en su panel de administración. Estas noticias se verificarán en el servidor de noticias de Chamilo cada vez que cargue la página de administración y solo son visibles para los administradores.

*Predeterminado: `true`*

### `chamilo_support`

**Bloque de soporte de Chamilo**

Obtenga consejos profesionales y una forma fácil de contactar a los proveedores de servicios oficiales para soporte profesional, directamente de los creadores de Chamilo. Este bloque aparece en su página de administración, es visible solo para administradores y se actualiza cada vez que carga la página de administración.

*Predeterminado: `true`*

### `max_anonymous_users`

**Múltiples usuarios anónimos**

Habilite esta opción para permitir múltiples usuarios del sistema para usuarios anónimos. Esto es útil cuando se utiliza esta plataforma como un escaparate público para algunos cursos. Tener múltiples usuarios anónimos permitirá que el seguimiento funcione durante la duración de la experiencia para varios usuarios sin mezclar sus datos (lo que de otra manera podría confundirlos).

*Predeterminado: `0`*

### `redirect_admin_to_courses_list`

**Redirigir al administrador a la lista de cursos**

El comportamiento predeterminado es enviar a los administradores directamente al panel de administración (mientras que los profesores y estudiantes son enviados a la lista de cursos o a la página de inicio de la plataforma). Habilite esta opción para redirigir también al administrador a su lista de cursos.

*Predeterminado: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificar solo al administrador global sobre nuevos usuarios**

Cuando está habilitado, solo el administrador global recibe notificaciones por correo electrónico sobre nuevos registros de usuarios en lugar de todos los administradores.

*Predeterminado: `false`*

### `show_link_request_hrm_user`

**Mostrar enlace para solicitar vínculo entre usuario y HRM**

Muestra un enlace en la página de perfil que permite a los directores de Recursos Humanos solicitar vincularse con una cuenta de usuario.

*Predeterminado: `false`*

### `user_status_option_only_for_admin_enabled`

**Ocultar rol a usuarios normales**

Permite ocultar el rol de los usuarios cuando esta opción está configurada como verdadera y el siguiente arreglo establece el rol correspondiente como 'true'.

*Predeterminado: `false`*

### `user_status_option_show_only_for_admin`

**Definir qué roles están ocultos para usuarios normales**

Los roles configurados como 'true' solo aparecerán para los administradores. Otros usuarios no podrán verlos.