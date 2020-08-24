### De Chamilo-hoofdmap {# the-chamilo-root-directory}

De root-directory is (in deze context) de directory die de Chamilo-bestanden bevat. Laten we voor het voorbeeld in deze tutorial eens kijken dat het is geïnstalleerd in */ var/www/chamilo* en beschikbaar is via [*http://localhost/chamilo/*](http://localhost/chamilo/) (voor een externe server hebben we FTP o SSH / SFTP nodig).

Om op te slaan, moet je de bestanden via je terminal comprimeren naar de */var/www/* directory.

gebruiker@server: cd /var/www

Comprimeer de directory met de opdracht "tar" om een tar.gz-bestand te genereren:

gebruiker @ server: /var/ www$ sudo tar cvfj /home/you/bkp/backup_chamilo.tar.gz chamilo /

Het kan praktisch om een naam die is samengesteld met behulp van de datum, zoals _2010-05-07-backup-chamilo._ *tar.gz* te geven. Op deze manier kunt u, als u een reeks back-upbestanden opslaat, ze gemakkelijk op datum sorteren.

Deze back-up kopie bevat alle informatie van de toegang tot de Chamilo-database en al zijn configuraties. Het is dan handig bij verlies van gegevens of een ongewenste inval op uw server. Het is de enige betrouwbare manier om uw Chamilo-server opnieuw op te bouwen als er zich een groot probleem voordoet.

Deze back-up kan automatisch worden uitgevoerd door een planningssysteem ( *cron-* proces onder GNU / Linux) op de server, maar het kan handmatig worden uitgevoerd als de server het niet goed doet.

Als u geen toegang heeft tot een terminal, is het mogelijk dat u een back-up via *FTP* moet uitvoeren. Deze operatie kan echter (zonder compressie) **veel** langer duren.
