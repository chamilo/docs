# Configuración de Correo

Cómo se construyen los correos salientes: identidad del remitente, diseño, firma y direcciones de propósito especial.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Correo**. Esta categoría contiene **18 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_email_editor_for_anonymous`

**Editor de correo electrónico para anónimos**

Permitir a los usuarios anónimos enviar correos electrónicos desde la plataforma. En la actualidad, con las preocupaciones sobre seguridad de la información, esta no es una opción recomendada.

*Predeterminado: `true`*

### `cron_notification_help_desk`

**Direcciones de correo electrónico para enviar informes de ejecución de cronjobs**

Proporcionadas como un arreglo de direcciones de correo electrónico. Aún no funciona para todos los cronjobs.

### `mail_content_style`

**Atributos adicionales del cuerpo HTML del correo electrónico**

Atributos HTML adicionales para aplicar a la etiqueta body de los correos de notificación generados.

### `mail_header_style`

**Atributos adicionales del encabezado HTML del correo electrónico**

Atributos HTML adicionales para aplicar a la sección de encabezado de los correos de notificación generados.

### `mailer_debug_enable`

**Correo: Depuración**

Seleccione si desea habilitar los registros de depuración para el envío de correos electrónicos. Estos le proporcionarán más información sobre lo que sucede al conectarse al servicio de correo, pero no son elegantes y podrían romper el diseño de la página. Úselo solo cuando no haya actividad de usuarios.

*Predeterminado: `false`*

### `mailer_dkim`

**Correo: Encabezados DKIM**

Ingrese un arreglo JSON con las configuraciones de su DKIM (vea el ejemplo).

### `mailer_dsn`

**Correo DSN**

El DSN incluye completamente todos los parámetros necesarios para conectarse al servicio de correo. Puede obtener más información en https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Aquí hay algunos ejemplos de sintaxis DSN compatibles: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Predeterminado: `null://null`*

### `mailer_exclude_json`

**Correo: Evitar usar LD+JSON**

Algunos clientes de correo electrónico no comprenden el formato descriptivo LD+JSON, mostrándolo como una cadena JSON suelta al usuario final. Si este es su caso, puede establecer la variable a continuación en 'false' para deshabilitar este encabezado.

*Predeterminado: `false`*

### `mailer_from_email`

**Enviar todos los correos desde esta dirección de correo electrónico**

Establece la dirección de correo electrónico predeterminada utilizada en el campo "de" de los correos.

### `mailer_from_name`

**Enviar todos los correos como originados desde este nombre (organizacional)**

Establece el nombre de visualización predeterminado utilizado para enviar correos de la plataforma, por ejemplo, "Equipo de soporte".

### `mailer_mails_charset`

**Correo: Conjunto de caracteres**

En caso de que necesite definir el conjunto de caracteres a usar al enviar esos correos electrónicos. Déjelo vacío si no está seguro.

*Predeterminado: `UTF-8`*

### `mailer_xoauth2`

**Correo: Opciones de XOAuth2**

Si utiliza algún servicio de correo electrónico basado en XOAuth2, use esta configuración en JSON para guardar su configuración específica (vea el ejemplo) y seleccione XOAuth2 en la configuración del servicio de correo.

### `messages_hide_mail_content`

**Ocultar contenido del correo para atraer usuarios a la plataforma**

Prefiera versiones cortas de correos electrónicos con un enlace al espacio de mensajería en la plataforma para aumentar el compromiso basado en la plataforma.

*Predeterminado: `false`*

### `notifications_extended_footer_message`

**Pie de página extendido para notificaciones**

Agregue un pie de página personalizado adicional para correos de notificación en un idioma específico, por ejemplo, para avisos de política de privacidad. Se pueden agregar varios idiomas y párrafos.

### `send_notification_score_in_percentage`

**Enviar puntuación en porcentaje en la notificación de resultados de pruebas**

Envía las puntuaciones de ejercicios como porcentajes en lugar de puntos en los correos de notificación de resultados de pruebas.

*Predeterminado: `false`*

### `send_two_inscription_confirmation_mail`

**Enviar 2 correos de registro**

Enviar dos correos electrónicos separados al registrarse. Uno para el nombre de usuario y otro para la contraseña.

*Predeterminado: `false`*

### `show_user_email_in_notification`

**Mostrar la dirección de correo electrónico del remitente en las notificaciones**

Incluye la dirección de correo electrónico del remitente junto con su nombre en los correos de mensajes personales y notificaciones.

*Predeterminado: `false`*

### `update_users_email_to_dummy_except_admins`

**Actualizar correos electrónicos de usuarios a valores ficticios durante importaciones**

Durante importaciones especiales de usuarios mediante CSV en cron, reemplazar automáticamente los correos electrónicos con una dirección ficticia username@example.com.

*Predeterminado: `false`*