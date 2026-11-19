# Configuración del correo

Cómo se construye el correo saliente: identidad del remitente, diseño, firma y direcciones de uso especial.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Correo**. Esta categoría contiene **22 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_email_editor_for_anonymous`

**Editor de correo electrónico para usuarios anónimos**

Permite a los usuarios anónimos enviar correos electrónicos desde la plataforma. En la actualidad, por motivos de seguridad de la información, esta opción no es recomendable.

*Valor predeterminado: `true`*


### `cron_notification_help_desk`

**Direcciones de correo electrónico para enviar informes de ejecución de cronjobs**

Se indica como un array de direcciones de correo electrónico. Todavía no funciona para todos los cronjobs.

### `mail_content_style`

**Atributos HTML adicionales del cuerpo del correo electrónico**

Atributos HTML adicionales que se aplican a la etiqueta body de los correos de notificación generados.

### `mail_header_style`

**Atributos HTML adicionales de la cabecera del correo electrónico**

Atributos HTML adicionales que se aplican a la sección de cabecera de los correos de notificación generados.

### `mailer_debug_enable`

**Correo: depuración**

Seleccione si desea activar los registros de depuración del envío de correo electrónico. Proporcionan más información sobre lo que ocurre al conectarse al servicio de correo, pero no son elegantes y pueden alterar el diseño de la página. Úselos solo cuando no haya actividad de usuarios.

*Valor predeterminado: `false`*


### `mailer_dkim`

**Correo: cabeceras DKIM**

Introduzca un array JSON con los ajustes de configuración DKIM (véase el ejemplo).

### `mailer_dsn`

**DSN de correo**

El DSN incluye todos los parámetros necesarios para conectarse al servicio de correo. Puede obtener más información en https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Estos son algunos ejemplos de sintaxis DSN admitidas: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Para Microsoft 365, donde SMTP con autenticación básica se está retirando, envíe a través de la API Microsoft Graph con `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (codifique en URL cualquier carácter especial del secreto de cliente). Esto requiere un registro de aplicación en Entra ID con el permiso de aplicación `Mail.Send`; consulte [Configuración del correo electrónico](../installation/email-configuration.md).

*Valor predeterminado: `null://null`*


### `mailer_exclude_json`

**Correo: evitar el uso de LD+JSON**

Algunos clientes de correo electrónico no interpretan el formato descriptivo LD+JSON y lo muestran al usuario final como una cadena JSON suelta. Si este es su caso, puede establecer la variable siguiente en 'false' para desactivar esta cabecera.

*Valor predeterminado: `false`*


### `mailer_from_email`

**Enviar todos los correos electrónicos desde esta dirección de correo electrónico**

Establece la dirección de correo electrónico predeterminada utilizada en el campo «from» de los correos.

### `mailer_from_name`

**Enviar todos los correos electrónicos como originados por este nombre (organizativo)**

Establece el nombre para mostrar predeterminado utilizado al enviar correos de la plataforma. Por ejemplo, «Equipo de soporte».

### `mailer_mails_charset`

**Correo: juego de caracteres**

Por si necesita definir el juego de caracteres que se usará al enviar esos correos electrónicos. Déjelo vacío si no está seguro.

*Valor predeterminado: `UTF-8`*


### `messages_hide_mail_content`

**Ocultar el contenido del correo electrónico para llevar a los usuarios a la plataforma**

Prefiera versiones breves del correo electrónico con un enlace al espacio de mensajería de la plataforma para aumentar la participación basada en la plataforma.

*Valor predeterminado: `false`*


### `enable_email_open_tracking`

**Seguimiento de aperturas de correo electrónico**

Añade una pequeña imagen de seguimiento a los correos de notificación de mensajes y registra cuándo se solicita. Esto solo indica que el correo electrónico puede haberse abierto; no demuestra que se haya leído.

*Valor predeterminado: `false`*

### `enable_inbound_mail`

**Permitir respuestas por correo electrónico a los mensajes**

Permite a los destinatarios de las notificaciones de mensajes directos responder por correo electrónico. Los mensajes entrantes deben ser enrutados por la infraestructura de correo al comando de correo entrante de Chamilo.

*Valor predeterminado: `false`*

### `inbound_mail_address`

**Dirección de correo electrónico entrante**

Dirección base utilizada para el enrutamiento de respuestas, por ejemplo `replies@example.com`. Chamilo añade un token de destinatario único mediante direccionamiento con signo más.

### `inbound_mail_dsn`

**DSN del buzón entrante**

Conexión al buzón utilizada para recoger las respuestas entrantes, por ejemplo `imaps://user:password@imap.example.com:993/INBOX`. Codifique en URL los caracteres reservados de las credenciales.

### `notifications_extended_footer_message`

**Pie de página ampliado de las notificaciones**

Añada un pie de página adicional personalizado para los correos de notificación de un idioma concreto, por ejemplo para avisos de política de privacidad. Se pueden añadir varios idiomas y párrafos.

### `send_notification_score_in_percentage`

**Enviar la puntuación en porcentaje en la notificación de resultados de la prueba**

Envía las puntuaciones de los ejercicios como porcentajes en lugar de puntos en los correos de notificación de resultados de las pruebas.

*Valor predeterminado: `false`*

---
### `send_two_inscription_confirmation_mail`

**Enviar 2 correos electrónicos de registro**

Envía dos correos electrónicos separados al registrarse. Uno para el nombre de usuario y otro para la contraseña.

*Valor predeterminado: `false`*


### `show_user_email_in_notification`

**Mostrar la dirección de correo electrónico del remitente en las notificaciones**

Incluye la dirección de correo electrónico del remitente junto con su nombre en los mensajes personales y en los correos de notificación.

*Valor predeterminado: `false`*


### `update_users_email_to_dummy_except_admins`

**Actualizar el correo electrónico de los usuarios a un valor ficticio durante las importaciones**

Durante las importaciones especiales de usuarios mediante CSV por cron, sustituye automáticamente los correos electrónicos por el correo ficticio username@example.com.

*Valor predeterminado: `false`*

### `mailer_dsn_massmailing`

**DSN de envío masivo**

DSN opcional de Symfony Mailer para la difusión de anuncios de cursos y de la plataforma. Déjelo vacío para usar el transporte de correo principal configurado con `mailer_dsn`. Las notificaciones individuales siguen usando el transporte principal. Configure y pruebe el transporte de correo adicional con su proveedor de correo antes de usarlo para difusiones masivas.

*Valor predeterminado: vacío (transporte principal)*

Consulte [PR #9406 del transporte de correo masivo](https://github.com/chamilo/chamilo-lms/pull/9406).