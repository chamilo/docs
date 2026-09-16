# Preguntas frecuentes

## Enviar e-mails desde la plataforma no funciona <a id="enviar-e-mails-desde-la-plataforma-no-funciona"></a>

Bajo Windows, se requiere configurar el archivo _chamilo/app/config/mail.conf.php_ para usar un servidor SMTP. Es un archivo fácil de entender. Si utiliza un servidor SMTP con autentificación, configurar `smtp_auth` a `1`, y definir un usuario y una contraseña. Si utiliza un servidor SMTP abierto, asignar `smtp_auth` a `0`.

Bajo GNU/Linux, puede optar por utilizar un servidor SMTP de forma semejante a Windows. Para configurar un servidor de correo local bajo Ubuntu puede seguir la documentación del blog de BeezNest: [https://beeznest.com/blog/2010/08/02/howto-send-mails-with-php-ubuntu/](https://beeznest.com/blog/2010/08/02/howto-send-mails-with-php-ubuntu/)

