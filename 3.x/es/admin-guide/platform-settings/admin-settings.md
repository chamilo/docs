# Configuración de identidad del administrador

Identidad y datos de contacto del administrador de la plataforma. Estos valores aparecen en el pie de página de la plataforma y en algunos correos electrónicos generados por el sistema.

Acceda a estos ajustes en **Administración > Configuración > Identidad del administrador**. Esta categoría contiene **12 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `administrator_email`

**Administrador del portal: correo electrónico**

La dirección de correo electrónico del administrador de la plataforma (aparece en el pie de página a la izquierda)

### `administrator_name`

**Administrador del portal: nombre**

El nombre del administrador de la plataforma (aparece en el pie de página a la izquierda)

### `administrator_phone`

**Administrador del portal: número de teléfono**

El número de teléfono del administrador de la plataforma (aparece en el pie de página a la izquierda)

### `administrator_surname`

**Administrador del portal: apellidos**

Los apellidos del administrador de la plataforma (aparecen en el pie de página a la izquierda)

### `chamilo_latest_news`

**Últimas noticias**

Reciba las últimas noticias de Chamilo, incluidas vulnerabilidades de seguridad y eventos, directamente en su panel de administración. Estas noticias se consultarán en el servidor de noticias de Chamilo cada vez que cargue la página de administración y solo son visibles para los administradores.

*Predeterminado: `true`*

### `chamilo_support`

**Bloque de soporte de Chamilo**

Obtenga consejos profesionales y una forma sencilla de contactar con proveedores de servicios oficiales para soporte profesional, directamente de los creadores de Chamilo. Este bloque aparece en su página de administración, solo es visible para los administradores y se actualiza cada vez que carga la página de administración.

*Predeterminado: `true`*

### `max_anonymous_users`

**Múltiples usuarios anónimos**

Active esta opción para permitir varios usuarios del sistema para usuarios anónimos. Resulta útil cuando se usa esta plataforma como un escaparate público de algunos cursos. Disponer de varios usuarios anónimos permitirá que el seguimiento funcione durante la duración de la experiencia para varios usuarios sin mezclar sus datos (lo que de otro modo podría confundirlos).

*Predeterminado: `0`*

### `redirect_admin_to_courses_list`

**Redirigir al administrador a la lista de cursos**

El comportamiento predeterminado es enviar a los administradores directamente al panel de administración (mientras que profesores y estudiantes se envían a la lista de cursos o a la página de inicio de la plataforma). Actívelo para redirigir también al administrador a su lista de cursos.

*Predeterminado: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificar solo al administrador global de los nuevos usuarios**

Cuando está activado, solo el administrador global recibe notificaciones por correo electrónico sobre los nuevos registros de usuarios, en lugar de todos los administradores.

*Predeterminado: `false`*

### `show_link_request_hrm_user`

**Mostrar enlace para solicitar vínculo entre usuario y RR. HH.**

Muestra un enlace en la página de perfil que permite a los directores de Recursos Humanos solicitar vincularse con una cuenta de usuario.

*Predeterminado: `false`*

### `user_status_option_only_for_admin_enabled`

**Ocultar el rol a los usuarios normales**

Permite ocultar el rol de los usuarios cuando esta opción se establece en true y el siguiente array establece el rol correspondiente en 'true'.

*Predeterminado: `false`*

### `user_status_option_show_only_for_admin`

**Definir qué roles se ocultan a los usuarios normales**

Los roles establecidos en 'true' solo aparecerán para los administradores. Los demás usuarios no podrán verlos.