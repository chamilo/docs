
# Das Versenden von E-Mails von der Plattform funktioniert nicht

Unter Windows müssen Sie die _main/inc/conf/mail.conf.php_ -Datei für die Verwendung eines SMTP-Servers konfigurieren. Die Akte ist durchaus verständlich. Wenn Sie einen SMTP-Server mit Authentifizierung verwenden, konfigurieren Sie _smtp\_auth_ nach _1_ und definieren Sie einen Benutzer und ein Kennwort. Wenn Sie einen offenen SMTP-Server verwenden, setzen Sie _smtp\_auth_ auf _0_.

Unter GNU/Linux können Sie einen SMTP-Server wie unter Windows verwenden. Wenn Ihr Browser dies zulässt, können Sie alternativ einen lokalen Mails-Server verwenden. Um eine unter Ubuntu zu konfigurieren, können Sie der Dokumentation im BeezNest-Blog folgen: [http://beeznest.wordpress.com/?s=](http://beeznest.wordpress.com/?s=exim4) [exim4](http://beeznest.wordpress.com/?s=exim4)