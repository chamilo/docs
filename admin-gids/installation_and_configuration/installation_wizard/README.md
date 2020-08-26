# Installatiewizard

Download de broncode van de downloadpagina van [Chamilo](http://www.chamilo.org/en/download) en pak deze uit \(met een tool zoals 7-zip onder Windows of _tar & gunzip_ onder Linux / MacOS\).

* Als het een server op afstand is \(dwz u bent niet rechtstreeks met de computer verbonden via een toetsenbord en een scherm\), stuur het archief dan via FTP \(of [SSH](http://fr.wikipedia.org/wiki/Secure_Shell)\) naar de online ruimte \(we raden u aan het bestand te verzenden en vervolgens uit te pakken op de server, dit gaat veel sneller en veiliger, maar u kunt ook alle bestanden verzenden die u vindt in de _chamilo_ directory let op, soms wordt de FTP-overdracht onderbroken en kan de installatie niet veilig worden voltooid - zorg ervoor dat alle bestanden zijn overgedragen door het logboek te controleren en ze een tweede keer te verzenden, door de optie _Don't overschrijf bestaande bestanden_ in uw FTP-client\) aan te vinken.
* Als het een lokale installatie is, kopieer dan gewoon de bestanden naar de rootwebmap op uw server \(op Ubuntu, dat wil zeggen in /var/www\).

```
Ex.: user@server:(sudo) mv /home/_user_/Desktop/chamilo /var/www
```

**Opmerking**: misschien wilt u de map een andere naam geven als deze eenmaal is uitgepakt.

Chamilo kan in elke gewenste directory worden geïnstalleerd. Kies de root directory van de site zodat het platform direct toegankelijk is via bijvoorbeeld het «[http://www.mijndomein.com/](http://www.mijndomein.com/) adres.

De map waarin de bestanden worden gekopieerd, moet beschrijfbaar zijn door dezelfde systeemgebruiker die de webserver draait \(d.w.z. _www-data_ op Ubuntu, of _httpd_ of _nobody_ op sommige andere op UNIX gebaseerde besturingssystemen\). Op afstand moet u de machtigingen voor de bestanden en mappen kunnen wijzigen via [FTP](http://fr.wikipedia.org/wiki/FileZilla), [SSH](http://fr.wikipedia.org/wiki/Secure_Shell) of elk ander type toegang.
