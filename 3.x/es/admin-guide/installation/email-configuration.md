# Configuración de correo electrónico

Chamilo gestiona ahora la configuración de envío de correos electrónicos desde el panel de administración, sección de ajustes de la plataforma (hay una entrada específica para correos electrónicos). Los correos se envían para creaciones de cuentas, restablecimientos de contraseña, notificaciones de cursos, alertas de mensajes y otros eventos de la plataforma. La entrega de correo se configura mediante un ajuste de configuración `MAILER_DSN`.

## Configuración

Establezca la opción `Mail DSN` en la sección /admin/settings/mail. El formato depende de su transporte de correo.

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

El transporte Symfony Amazon Mailer viene integrado en Chamilo. No se requiere instalación adicional.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

El transporte Symfony Mailjet viene integrado en Chamilo. No se requiere instalación adicional.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

El transporte Symfony Brevo viene integrado en Chamilo. No se requiere instalación adicional.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft está retirando SMTP con autenticación básica en Exchange Online, por lo que un DSN sencillo `smtp://user:password@smtp.office365.com:587` solo funciona mientras el administrador del inquilino mantenga «Authenticated SMTP» explícitamente habilitado en ese buzón concreto. Envíe a través de la Microsoft Graph API — no utiliza SMTP en absoluto:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

El transporte Symfony Microsoft Graph viene integrado en Chamilo. No se requiere instalación adicional.

Para obtener esos tres valores, en el [centro de administración de Microsoft Entra](https://entra.microsoft.com):

1. Registre una aplicación. Su **Application (client) ID** y **Directory (tenant) ID** son `CLIENT_ID` y `TENANT_ID`.
2. En *API permissions*, añada el permiso de **aplicación** de Microsoft Graph `Mail.Send` (no el delegado) y, a continuación, conceda el consentimiento de administrador.
3. En *Certificates & secrets*, cree un secreto de cliente. Su **valor** (no su ID) es `CLIENT_SECRET`.

Notas:

* Codifique en URL cualquier carácter con significado especial en una URL que aparezca en el secreto de cliente (`@` como `%40`, `+` como `%2B`, `/` como `%2F`, y así sucesivamente).
* La dirección configurada en **Send all e-mails from this e-mail address** debe ser un buzón real dentro de su inquilino; de lo contrario, Microsoft rechaza el mensaje.
* Añada `&noSave=true` al DSN si no desea que se almacene una copia de cada correo de la plataforma en la carpeta *Sent Items* del remitente.
* Para nubes nacionales, apunte el DSN a los endpoints correctos, sin el prefijo `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Advertencia de seguridad:** el permiso de *aplicación* `Mail.Send` permite a la aplicación registrada enviar correo como **cualquier** buzón del inquilino, no solo el que usa Chamilo. Restrínjalo al buzón del remitente con una política de acceso de aplicación de Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (desarrollo / plataformas pequeñas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilice una contraseña de aplicación, no su contraseña habitual de Gmail. Esto es adecuado solo para plataformas pequeñas o desarrollo, ya que Gmail tiene límites de envío.

## Ajustes de correo de la plataforma

Además del transporte, configure la identidad del remitente en la misma página:

| Ajuste | Descripción |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | El nombre para mostrar asociado a los correos del sistema. |
| **Send all e-mails from this e-mail address** | La dirección «From» de todos los correos del sistema. Debe ser una dirección válida aceptada por su transporte de correo. Recomendamos usar una dirección de «no reply» como `no-reply@yourdomain.com` para evitar recibir respuestas inútiles a correos automatizados. |

## Prueba de entrega de correo electrónico

Tras configurar `MAILER_DSN`, compruebe que los correos se entregan: vaya a *Administración* > *Sistema* > *Probador de correo electrónico*, indique un destinatario, un asunto y un cuerpo de mensaje y pulse **Enviar correo de prueba**.

Si el comando finaliza sin errores pero el correo no se recibe:

1. Revise la carpeta de spam/correo no deseado del destinatario.
2. Verifique que el dominio de envío tenga los registros DNS adecuados (SPF, DKIM, DMARC).
3. Consulte los registros de envío de su proveedor de correo en busca de rebotes o rechazos.
4. Revise el registro de Chamilo en `var/log/prod.log` en busca de errores del mailer.
5. En la configuración de correo electrónico, active *Mail: Debug* (no disponible en 3.0; lo estará pronto).

## Experimental: cola de correo electrónico (entrega asíncrona)

Por defecto, los correos se envían de forma síncrona durante la petición web. Para un mejor rendimiento, configure la entrega asíncrona con Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Con la entrega asíncrona, los correos se encolan y los envía un worker en segundo plano:

```bash
php bin/console messenger:consume async
```

Ejecútelo como servicio del sistema (p. ej., mediante systemd o supervisord) para que permanezca en ejecución.

## Consejos

* **Utilice un servicio de correo dedicado** (SES, Mailjet, Brevo) en plataformas de producción. El SMTP directo a su propio servidor de correo exige una configuración cuidadosa para evitar problemas de entregabilidad.
* **Configure los registros DNS SPF, DKIM y DMARC** de su dominio de envío para maximizar las tasas de entrega y evitar que los mensajes se marquen como spam. También puede configurar cabeceras DKIM desde la página de ajustes de correo electrónico.
* **Use la entrega asíncrona** en plataformas con más de unas pocas decenas de usuarios activos: el envío síncrono puede ralentizar de forma notable las peticiones web.