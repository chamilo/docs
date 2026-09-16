# Configuración de correo

Cómo se construye el correo saliente: identidad del remitente, diseño, firma y direcciones de propósito especial.

Acceda a estos ajustes en **Administración > Configuración > Correo**. Esta categoría contiene **17 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_email_editor_for_anonymous`

**Editor de correo electrónico para anónimos**

Permitir que los usuarios anónimos envíen correos electrónicos desde la plataforma. En la era actual de la seguridad de la información, esta no es una opción recomendada.

*Predeterminado: `true`*


### `cron_notification_help_desk`

**Direcciones de correo electrónico para enviar informes de ejecución de cronjobs**

Se indica como un array de direcciones de correo electrónico. Todavía no funciona para todos los cronjobs.

### `mail_content_style`

**Atributos HTML extra del cuerpo del correo electrónico**

Atributos HTML extra que se aplican a la etiqueta body de los correos de notificación generados.

### `mail_header_style`

**Atributos HTML extra de la cabecera del correo electrónico**

Atributos HTML extra que se aplican a la sección de cabecera de los correos de notificación generados.

### `mailer_debug_enable`

**Correo: depuración**

Seleccione si desea activar los registros de depuración del envío de correo electrónico. Le darán más información sobre lo que ocurre al conectar con el servicio de correo, pero no son elegantes y pueden romper el diseño de la página. Úselos solo cuando no haya actividad de usuarios.

*Predeterminado: `false`*


### `mailer_dkim`

**Correo: cabeceras DKIM**

Introduzca un array JSON con la configuración DKIM (véase el ejemplo).

### `mailer_dsn`

**DSN del correo**

El DSN incluye todos los parámetros necesarios para conectar con el servicio de correo. Puede obtener más información en https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Estos son algunos ejemplos de sintaxis DSN admitidas: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Para Microsoft 365, donde SMTP con autenticación básica está en desuso, envíe a través de Microsoft Graph API con `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (codifique en URL cualquier carácter especial del secreto de cliente). Esto requiere un registro de aplicación en Entra ID con el permiso de aplicación `Mail.Send` — véase [Configuración de correo electrónico](../installation/email-configuration.md).

*Predeterminado: `null://null`*


### `mailer_exclude_json`

**Correo: evitar el uso de LD+JSON**

Algunos clientes de correo no comprenden el formato descriptivo LD+JSON y lo muestran al usuario final como una cadena JSON suelta. Si es su caso, puede establecer la variable siguiente en 'false' para desactivar esta cabecera.

*Predeterminado: `false`*


### `mailer_from_email`

**Enviar todos los correos electrónicos desde esta dirección**

Establece la dirección de correo predeterminada usada en el campo «from» de los correos.

### `mailer_from_name`

**Enviar todos los correos electrónicos como originados desde este nombre (organizacional)**

Establece el nombre para mostrar predeterminado usado al enviar correos de la plataforma. p. ej. «Equipo de soporte».

### `mailer_mails_charset`

**Correo: juego de caracteres**

Por si necesita definir el charset a usar al enviar esos correos electrónicos. Déjelo vacío si no está seguro.

*Predeterminado: `UTF-8`*


### `messages_hide_mail_content`

**Ocultar el contenido del correo para llevar a los usuarios a la plataforma**

Prefiera versiones cortas de correo con un enlace al espacio de mensajería de la plataforma para aumentar el compromiso en la plataforma.

*Predeterminado: `false`*


### `notifications_extended_footer_message`

**Pie de página extendido de notificaciones**

Añada un pie de página extra personalizado para los correos de notificación de un idioma concreto, por ejemplo avisos de política de privacidad. Se pueden añadir varios idiomas y párrafos.

### `send_notification_score_in_percentage`

**Enviar la puntuación en porcentaje en la notificación de resultados de pruebas**

Envía las puntuaciones de los ejercicios como porcentajes en lugar de puntos en los correos de notificación de resultados de pruebas.

*Predeterminado: `false`*


### `send_two_inscription_confirmation_mail`

**Enviar 2 correos de registro**

Enviar dos correos separados al registrarse. Uno para el nombre de usuario y otro para la contraseña.

*Predeterminado: `false`*


### `show_user_email_in_notification`

**Mostrar la dirección de correo del remitente en las notificaciones**

Incluye la dirección de correo del remitente junto a su nombre en los correos de mensajes personales y notificaciones.

*Predeterminado: `false`*


### `update_users_email_to_dummy_except_admins`

**Actualizar el correo de los usuarios a un valor ficticio durante las importaciones**

Durante importaciones CSV especiales de usuarios por cron, sustituir automáticamente los correos por el correo ficticio username@example.com.

*Predeterminado: `false`*