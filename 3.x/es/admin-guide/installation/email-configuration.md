# Configuración del correo electrónico

Chamilo gestiona ahora la configuración del envío de correos electrónicos desde el panel de administración, en la sección de ajustes de la plataforma (existe una entrada específica para los correos electrónicos). Los correos se envían para la creación de cuentas, el restablecimiento de contraseñas, las notificaciones de cursos, las alertas de mensajes y otros eventos de la plataforma. La entrega de correo se configura mediante el ajuste de configuración `MAILER_DSN`.

## Configuración

Establezca la opción `Mail DSN` en la sección /admin/settings/mail. El formato depende de su transporte de correo electrónico.

### SMTP

La configuración más habitual, adecuada para cualquier servidor SMTP:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Sustituya `username`, `password` y el host por las credenciales de su servidor SMTP.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

El transporte Amazon Mailer de Symfony viene integrado en Chamilo. No se requiere ninguna instalación adicional.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

El transporte Mailjet de Symfony viene integrado en Chamilo. No se requiere ninguna instalación adicional.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

El transporte Brevo de Symfony viene integrado en Chamilo. No se requiere ninguna instalación adicional.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft está retirando SMTP con autenticación básica en Exchange Online, por lo que un DSN simple `smtp://user:password@smtp.office365.com:587` solo funciona mientras el administrador del inquilino mantenga «Authenticated SMTP» habilitado de forma explícita en ese buzón concreto. Envíe a través de Microsoft Graph API en su lugar: no utiliza SMTP en absoluto:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

El transporte Microsoft Graph de Symfony viene integrado en Chamilo. No se requiere ninguna instalación adicional.

Para obtener esos tres valores, en el [centro de administración de Microsoft Entra](https://entra.microsoft.com):

1. Registre una aplicación. Su **Application (client) ID** y su **Directory (tenant) ID** son `CLIENT_ID` y `TENANT_ID`.
2. En *API permissions*, añada el permiso de **aplicación** de Microsoft Graph `Mail.Send` (no el delegado) y, a continuación, conceda el consentimiento de administrador.
3. En *Certificates & secrets*, cree un secreto de cliente. Su **value** (no su ID) es `CLIENT_SECRET`.

Notas:

* Codifique en URL cualquier carácter con un significado especial en una URL que aparezca en el secreto de cliente (`@` como `%40`, `+` como `%2B`, `/` como `%2F`, y así sucesivamente).
* La dirección configurada en **Send all e-mails from this e-mail address** debe ser un buzón real dentro de su inquilino; de lo contrario, Microsoft rechaza el mensaje.
* Añada `&noSave=true` al DSN si no desea que se almacene una copia de cada correo de la plataforma en la carpeta *Sent Items* del remitente.
* Para nubes nacionales, apunte el DSN a los extremos correctos, sin el prefijo `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Advertencia de seguridad:** el permiso de *aplicación* `Mail.Send` permite que la aplicación registrada envíe correo electrónico como **cualquier** buzón del inquilino, no solo el que utiliza Chamilo. Restrínjalo al buzón del remitente con una directiva de acceso de aplicación de Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (desarrollo/plataformas pequeñas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilice una contraseña de aplicación, no su contraseña habitual de Gmail. Esto solo es adecuado para plataformas pequeñas o para desarrollo, ya que Gmail tiene límites de envío.

## Ajustes de correo electrónico de la plataforma

Además del transporte, configure la identidad del remitente en la misma página:

| Ajuste | Descripción |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | El nombre para mostrar asociado a los correos electrónicos del sistema. |
| **Send all e-mails from this e-mail address** | La dirección «De» de todos los correos electrónicos del sistema. Debe ser una dirección válida aceptada por su transporte de correo. Recomendamos utilizar una dirección de «no responder», como `no-reply@yourdomain.com`, para evitar recibir respuestas inútiles a los correos automatizados. |

## Respuestas entrantes a mensajes directos

Chamilo puede permitir que un destinatario responda a una notificación de mensaje directo desde su cliente de correo electrónico habitual y convertir esa respuesta en un mensaje en la bandeja de entrada de Chamilo. Configure lo siguiente en **Administración > Parámetros de configuración > Correo**:

1. Establezca **Permitir respuestas por correo electrónico a los mensajes** (`enable_inbound_mail`) en **Sí**.
2. Establezca **Dirección de correo electrónico entrante** (`inbound_mail_address`) en una dirección base válida, como `replies@example.com`. Chamilo utiliza el direccionamiento con signo más para construir una dirección única, como `replies+TOKEN@example.com`, para cada destinatario.
3. Enrute esos mensajes entrantes de vuelta a Chamilo mediante uno de los métodos siguientes.

### Consulta periódica de un buzón IMAP

Establezca **DSN del buzón entrante** (`inbound_mail_dsn`) en el buzón que recibe las respuestas, por ejemplo:

```text
imaps://user:password@imap.example.com:993/INBOX
```

Codifique en URL los caracteres reservados del nombre de usuario o de la contraseña. A continuación, ejecute el recolector del buzón de forma periódica, por ejemplo cada cinco minutos:

```bash
*/5 * * * * cd /path/to/chamilo && php bin/console chamilo:mail:fetch-inbound --no-interaction
```

El recolector procesa los mensajes no leídos por lotes. Los mensajes fallidos se dejan sin leer de forma predeterminada para que puedan reintentarse; utilice `--mark-failed-seen` solo cuando no desee explícitamente ese comportamiento de reintento.

### Canalización del correo desde el MTA

Un MTA puede, en su lugar, canalizar un mensaje RFC822 sin procesar directamente a Chamilo:

```bash
php bin/console chamilo:mail:process-inbound
```

El comando lee desde STDIN; `--file` puede utilizarse para un mensaje guardado y `--recipient` puede proporcionar el destinatario del sobre SMTP cuando se ha reescrito la cabecera `To`.

Por seguridad, Chamilo acepta la respuesta solo cuando su token identifica a un destinatario de mensaje válido y la dirección `From` del mensaje coincide con la dirección de correo electrónico de ese destinatario en Chamilo. El remitente original y el usuario que responde deben seguir activos. Solo se almacena el texto de la nueva respuesta; el historial citado se elimina cuando es posible.

## Seguimiento de apertura de correos electrónicos

Establezca **Seguir las aperturas de correo electrónico** (`enable_email_open_tracking`) en **Sí** para añadir una pequeña imagen de seguimiento a los correos electrónicos de notificación de mensajes directos. Cuando se solicita esa imagen, Chamilo registra la hora y puede mostrarla en los mensajes **Enviados** del remitente, en **Notificaciones por correo electrónico**.

Una marca de tiempo de seguimiento de apertura solo significa que se solicitó la imagen. Los clientes de correo pueden bloquear las imágenes, precargarlas o actuar como proxy de ellas, por lo que no debe tratarse como prueba de que el destinatario leyó realmente el mensaje.

## Prueba de la entrega de correo electrónico

Tras configurar `MAILER_DSN`, compruebe que los correos electrónicos se entregan: vaya a *Administración* > *Sistema* > *Probador de correo electrónico*, indique un destinatario, un asunto y un cuerpo de correo electrónico y haga clic en **Enviar correo de prueba**.

Si el comando finaliza sin errores pero no se recibe el correo electrónico:

1. Compruebe la carpeta de correo no deseado o spam del destinatario.
2. Verifique que su dominio de envío dispone de los registros DNS adecuados (SPF, DKIM, DMARC).
3. Consulte los registros de envío de su proveedor de correo en busca de rebotes o rechazos.
4. Revise el registro de Chamilo en `var/log/prod.log` en busca de errores del mailer.
5. En los parámetros de configuración del correo electrónico, active *Correo: depuración* (no disponible en 3.0; lo estará próximamente).

## Experimental: cola de correo electrónico (entrega asíncrona)

De forma predeterminada, los correos electrónicos se envían de manera síncrona durante la petición web. Para mejorar el rendimiento, configure la entrega asíncrona mediante Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Con la entrega asíncrona, los correos electrónicos se ponen en cola y los envía un proceso en segundo plano:

```bash
php bin/console messenger:consume async
```

Ejecútelo como un servicio del sistema (por ejemplo, mediante systemd o supervisord) para que permanezca en ejecución.

## Consejos

* **Utilice un servicio de correo electrónico dedicado** (SES, Mailjet, Brevo) para las plataformas de producción. El SMTP directo hacia su propio servidor de correo requiere una configuración cuidadosa para evitar problemas de entregabilidad.
* **Configure los registros DNS SPF, DKIM y DMARC** de su dominio de envío para maximizar las tasas de entrega y evitar que los correos electrónicos se marquen como spam. También puede configurar las cabeceras DKIM desde la página de parámetros de correo electrónico.
* **Utilice la entrega asíncrona** en plataformas con más de unas pocas decenas de usuarios activos: el envío síncrono de correo electrónico puede ralentizar de forma apreciable las peticiones web.