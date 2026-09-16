# Configuración de Correo Electrónico

Chamilo ahora gestiona la configuración de envío de correos electrónicos desde el panel de administración, en la sección de ajustes de la plataforma (hay una entrada específica para correos electrónicos). Los correos se envían para la creación de cuentas, restablecimiento de contraseñas, notificaciones de cursos, alertas de mensajes y otros eventos de la plataforma. La entrega de correos electrónicos se configura a través de un ajuste de configuración `MAILER_DSN`.

## Configuración

Establezca la opción `Mail DSN` en la sección /admin/settings/mail. El formato depende de su transporte de correo electrónico.

### SMTP

La configuración más común, adecuada para cualquier servidor SMTP:

```bash
# Dejar que el sistema decida
native://default

# SMTP básico
smtp://username:password@smtp.example.com:587

# SMTP con TLS (la mayoría de los proveedores)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP sin autenticación (relé local)
smtp://localhost:25
```

Reemplace `username`, `password` y el host con las credenciales de su servidor SMTP.

### Amazon SES

```bash
# Usando interfaz SMTP
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Usando API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

El transporte de correo de Symfony para Amazon viene integrado en Chamilo. No se requiere instalación adicional.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

El transporte de correo de Symfony para Mailjet viene integrado en Chamilo. No se requiere instalación adicional.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

El transporte de correo de Symfony para Brevo viene integrado en Chamilo. No se requiere instalación adicional.

### Gmail (Desarrollo/Plataformas Pequeñas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilice una contraseña de aplicación (App Password), no su contraseña habitual de Gmail. Esto es adecuado solo para plataformas pequeñas o desarrollo, ya que Gmail tiene límites de envío.

## Ajustes de Correo Electrónico de la Plataforma

Además del transporte, configure la identidad del remitente en la misma página:

| Ajuste | Descripción |
|--------|-------------|
| **Enviar todos los correos electrónicos como originados desde este nombre (organizacional)** | El nombre visible asociado con los correos del sistema. |
| **Enviar todos los correos electrónicos desde esta dirección de correo electrónico** | La dirección "De" para todos los correos del sistema. Debe ser una dirección válida aceptada por su transporte de correo. Recomendamos usar una dirección de "no responder" como `no-reply@yourdomain.com` para evitar recibir respuestas innecesarias a correos automáticos. |

## Prueba de Entrega de Correo Electrónico

Después de configurar `MAILER_DSN`, pruebe que los correos electrónicos se entreguen: Vaya a *Administración* > *Sistema* > *Probador de correo electrónico*, especifique un destinatario, un asunto y el cuerpo del correo, y haga clic en **Enviar correo de prueba**.

Si el comando se completa sin errores pero el correo no se recibe:

1. Revise la carpeta de spam o correo no deseado del destinatario.
2. Verifique que su dominio de envío tenga registros DNS adecuados (SPF, DKIM, DMARC).
3. Consulte los registros de envío de su proveedor de correo para detectar rebotes o rechazos.
4. Revise el registro de Chamilo en `var/log/prod.log` para buscar errores del sistema de correo.
5. En los ajustes de configuración de correo electrónico, habilite *Mail: Debug* (no disponible en 2.0, estará disponible pronto).

## Experimental: Cola de Correo Electrónico (Entrega Asíncrona)

Por defecto, los correos electrónicos se envían de manera síncrona durante la solicitud web. Para un mejor rendimiento, configure la entrega asíncrona usando Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Con la entrega asíncrona, los correos electrónicos se ponen en cola y se envían mediante un trabajador en segundo plano:

```bash
php bin/console messenger:consume async
```

Ejecute esto como un servicio del sistema (por ejemplo, a través de systemd o supervisord) para que permanezca en ejecución.

## Consejos

* **Utilice un servicio de correo electrónico dedicado** (SES, Mailjet, Brevo) para plataformas en producción. El uso de SMTP directo a su propio servidor de correo requiere una configuración cuidadosa para evitar problemas de entregabilidad.
* **Configure los registros DNS SPF, DKIM y DMARC** para su dominio de envío para maximizar las tasas de entrega y evitar que los correos sean marcados como spam. También puede configurar encabezados DKIM desde la página de ajustes de correo electrónico.
* **Utilice entrega asíncrona** en plataformas con más de unas pocas docenas de usuarios activos; el envío síncrono de correos electrónicos puede ralentizar notablemente las solicitudes web.