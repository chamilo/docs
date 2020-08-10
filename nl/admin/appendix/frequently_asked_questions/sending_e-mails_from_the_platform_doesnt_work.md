### Het verzenden van e-mails vanaf het platform werkt niet {# send-e-mails-from-the-platform-doesn-t-work}

Onder Windows moet u het *hoofdbestand /inc/conf/mail.conf.php configureren* om een SMTP-server te gebruiken. Het bestand is heel begrijpelijk. Als u een SMTP-server met authenticatie gebruikt, configureert u *smtp_auth* op *1* en definieert u een gebruiker en een wachtwoord. Als u een open SMTP-server gebruikt, stelt u *smtp_auth in* op *0* .

Onder GNU / Linux kun je ervoor kiezen om een SMTP-server te gebruiken zoals onder Windows. Als alternatief kunt u, als uw browser dit toestaat, een lokale mailserver gebruiken. Om er een te configureren onder Ubuntu, kun je de documentatie op het BeezNest-blog volgen: [http://beeznest.wordpress.com/?s=](http://beeznest.wordpress.com/?s=exim4) [exim4](http://beeznest.wordpress.com/?s=exim4)
