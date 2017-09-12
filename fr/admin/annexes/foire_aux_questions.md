## Foire aux questions {#foire-aux-questions}

### L&#039;envoi de courriel depuis la plateforme ne fonctionne pas, que faire ? {#l-envoi-de-courriel-depuis-la-plateforme-ne-fonctionne-pas-que-faire}

Sous Windows, il est nécessaire de configurer le fichier _main/inc/conf/mail.conf.php_ pour utiliser un serveur SMTP. Le fichier est assez explicite. Si vous utilisez un serveur SMTP avec authentification, définissez _smtp_auth_ à 1 et définissez l&#039;utilisateur et le mot de passe. Si vous utilisez un serveur SMTP ouvert, définissez _smtp_auth_ à 0.

Sous GNU/Linux, vous pouvez choisir d&#039;utiliser un serveur SMTP comme sous Windows. Alternativement, si votre hébergeur le permet, vous pouvez utiliser un serveur de courriels local. Pour le configurer sous Ubuntu, vous pouvez suivre la documentation sur le blog de BeezNest : [https://beeznest.com/blog/2010/08/02/howto-send-mails-with-php-ubuntu/](https://beeznest.com/blog/2010/08/02/howto-send-mails-with-php-ubuntu/)
