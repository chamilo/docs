# Letzte Installationseinstellungen

Sobald Chamilo installiert ist, enthält die Erfolgsmeldung auch eine kurze Warnmeldung

« **Security hint**: To protect your site, please change permissions on `main/inc/conf/configuration.php` and `main/install/index.php` \(not their directories\) to read-only \(`chmod 444`\). »

![](../../../.gitbook/assets/dernier-parametre%20%283%29.png)
Illustration 11: Installation — Installationsreport

Es ist in der Tat vorzuziehen, das _`main/install/`_-Verzeichnis vollständig zu entfernen \(der Bestätigungstext ist diesbezüglich nicht wirklich korrekt\):

```bash
user@server: /var/www/chamilo$ sudo rm -rf main/install/
```

Dies wird verhindern, dass jemand \(außer dem _root_-Benutzer\) dieses Verzeichnis sieht und es somit benutzt.

Für die Datei _configuration.php_ sind **0444** die entsprechenden Berechtigungen zum Zuweisen:

```bash
user@server:/var/www/chamilo/$ cd main/inc/conf/
user@server:/var/www/chamilo/main/inc/conf$ sudo chmod 0444 configuration.php
```

Wenn dieser Vorgang abgeschlossen ist, kann mit Chamilo sicher auf den Link _Go zu dem neu erstellten Portal_ Link klicken.