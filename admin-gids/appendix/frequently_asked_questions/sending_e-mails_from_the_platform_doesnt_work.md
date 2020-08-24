# Het verzenden van e-mails vanaf het platform werkt niet

Onder Windows moet u het _hoofdbestand /inc/conf/mail.conf.php configureren_ om een SMTP-server te gebruiken. Het bestand is heel begrijpelijk. Als u een SMTP-server met authenticatie gebruikt, configureert u _smtp\_auth_ op _1_ en definieert u een gebruiker en een wachtwoord. Als u een open SMTP-server gebruikt, stelt u _smtp\_auth in_ op _0_ .

Onder GNU / Linux kun je ervoor kiezen om een SMTP-server te gebruiken zoals onder Windows. Als alternatief kunt u, als uw browser dit toestaat, een lokale mailserver gebruiken. Om er een te configureren onder Ubuntu, kun je de documentatie op het BeezNest-blog volgen: [http://beeznest.wordpress.com/?s=](http://beeznest.wordpress.com/?s=exim4) [exim4](http://beeznest.wordpress.com/?s=exim4)

