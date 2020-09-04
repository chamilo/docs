# Server

Nota: Deze pagina is verouderd.

Om Chamilo te installeren, heeft u een webserver, een databaseserver en een [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) client \(of een andere, bij voorkeur beveiligde, manier nodig om bestanden naar de server, zoals SFTP, om de veiligheid van uw toekomstige Chamilo-server te garanderen\).

Het platform werkt op de meeste besturingssystemen:

* GNU/Linux, BSD, UNIX
* Windows \(XP, Vista, 7\)
* Mac OS X

Het wordt aanbevolen om een [Wamp](http://fr.wikipedia.org/wiki/WAMP) server \([Windows](http://fr.wikipedia.org/wiki/Microsoft_Windows)\) te installeren, of de componenten van een LAMP-server \(Linux\). LAMP gaat voor:

* [Linux](http://fr.wikipedia.org/wiki/Linux)
* [Apache](http://fr.wikipedia.org/wiki/Apache_HTTP_Server)
* [MySQL](http://fr.wikipedia.org/wiki/MySQL)
* [PHP5](http://fr.wikipedia.org/wiki/PHP)

Deze server moet PHP 5.6 of hoger en MySQL 5.1 of hoger \(of, als alternatief, MariaDB\) ondersteunen.

Tijdens het aanmaken van de site en de database, of het nu online of lokaal is, moet de hostingprovider de parameters opgeven die tijdens de installatie worden gevraagd, d.w.z .:

* de FTP \(of SFTP\) servernaam,
* de gebruikersnaam voor deze server,
* het wachtwoord voor deze server,
* de naam van de SQL-server \(indien verschillend van de FTP-server\),
* de naam van de database,
* de gebruikersnaam en het wachtwoord voor deze database.

Onder GNU/Linux kunt u met de meeste distributies \(Debian, RedHat, Suse, CentOS, ...\) eenvoudig een LAMP-server configureren. In deze tutorial gebruiken we de GNU/Linux Ubuntu-distributie, versie 16.04 Long Term Support als voorbeeld. Hoewel andere distributies prima zullen werken, gebruikt het ontwikkelingsteam van Chamilo Debian of Ubuntu als voorkeursdistributie van GNU/Linux voor hun veiligheid en voor hun zeer stabiele en intelligente pakketsysteem, die vechten tegen afhankelijkheden vermijden wanneer de noodzaak om nieuwe pakketten te installeren zich voordoet. .

MySQL installeren:
```
user@server: sudo apt-get install mysql-server
```
PHP en Apache installeren met bindingen voor Apache en MySQL, en andere aanbevolen functies:
```
user@server: sudo apt-get install libapache2-mod-php php-mysql php-gd php-xml php-intl php-curl php-mbstring php-zip
```

Het installatieproces zal u wat informatie vragen over de configuratie van uw systeem. Lees de instructies aandachtig door en antwoord met volledige beoordelingsvermogen. Als u het niet weet, kunt u de standaardwaarden waarschijnlijk ingeschakeld laten.

Houd er rekening mee dat het gebruik van Xdebug zeer ernstige gevolgen kan hebben voor de efficiëntie van uw portaal, dus het is echt aan te raden om het uit te schakelen wanneer u het naar productie gaat (zie PHP-configuratie in php.ini , xdebug.ini of in uw VirtualHost \).

Om het gewicht van de verschillende processen in Chamilo te meten, kun je de XHProf-bibliotheek gebruiken die \ (voornamelijk \) door Facebook is ontwikkeld. Zie BeezNest's blog voor meer informatie over het configureren ervan.

