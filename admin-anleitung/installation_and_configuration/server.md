# Server

Um Chamilo zu installieren, benötigen Sie einen Webserver, einen Datenbankserver und einen [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) -Client \(oder eine andere, vorzugsweise sichere Methode, um Dateien auf den Server hochzuladen, z. B. SFTP, um die Sicherheit Ihres zukünftigen Chamilo-Servers zu gewährleisten\).

Die Plattform funktioniert auf den meisten Betriebssystemen:

* GNU/linux, BSD, UNIX
* Windows \(XP, Vista, 7\)
* Mac OS X

Es wird empfohlen, einen [Wamp](http://fr.wikipedia.org/wiki/WAMP) -Server \([Windows](http://fr.wikipedia.org/wiki/Microsoft_Windows)\) oder die Komponenten eines LAMP-Servers \(Linux\) zu installieren. LAMP gilt für:

* [Linux](http://fr.wikipedia.org/wiki/Linux)
* [Apache](http://fr.wikipedia.org/wiki/Apache_HTTP_Server)
* [MySQL](http://fr.wikipedia.org/wiki/MySQL)
* [PHP5](http://fr.wikipedia.org/wiki/PHP)

Dieser Server muss PHP 5.3 oder Superior und MySQL 5.1 oder superior \(oder alternativ MariaDB\) unterstützen.

Während der Standort- und Datenbankerstellung, sei es online oder lokal, muss der Hosting-Anbieter die Parameter angeben, die während der Installation angefordert werden, d. H.

* der FTP \(oder SFTP\) Servername,
* der Benutzername für diesen Server
* das Passwort für diesen Server
* der Name des SQL-Servers \(falls sich vom FTP-Server unterscheidet\),
* der Name der Datenbank,
* Der Benutzername und das Passwort für diese Datenbank.

Unter GNU/Linux ermöglichen die meisten Distributionen \(Debian, RedHat, Suse, CentOS,...\) die einfache Konfiguration eines LAMP-Servers. In diesem Tutorial werden wir die GNU/Linux-Ubuntu-Distribution, Version 12.04 Long Term Support, als Beispiel verwenden. Obwohl andere Distributionen einwandfrei funktionieren werden, verwendet das Entwicklungsteam von Chamilo Debian oder Ubuntu als bevorzugte Distribution von GNU/Linux für ihre Sicherheit sowie ihr sehr stabiles und intelligentes Verpackungssystem, das die Bekämpfung von Abhängigkeiten verhindert, wenn neue Pakete installiert werden müssen selbst.

Installation von Apache \(in seiner Version 2\):

Nutzer @server: sudo apt-get install apache2-mpm-prefork

MySQL installieren:

user @server: sudo apt-get install mysql-Server

Installieren von PHP5 mit Bindungen für Apache und MySQL und anderen empfohlenen Funktionen:

Benutzer @server: sudo apt-get install libapache2-mod-php5 php5-mysql php5-birne php5-gd php5-xml php5-intl php5-curl

Sie können alle diese Anwendungen auch gleichzeitig mit dem folgenden Befehl installieren:

Benutzer @server: sudo apt-get install apache2-mpm-prefork mysql-Server libapache2-mod-php5 php5-mysql php5-birne php5-gd php5-xml php5-intl php5-curl

Der Installationsprozess wird Sie nach Informationen über die Konfiguration Ihres Systems fragen. Bitte lesen Sie die Anweisungen sorgfältig durch und antworten Sie in voller Urteilsfähigkeit. Wenn Sie es nicht wissen, können Sie die Standardwerte wahrscheinlich aktiviert lassen.

Für diejenigen unter Ihnen, die planen, Chamilo lokal zum Ausführen von Tests oder Updates zu verwenden, empfehlen wir die Installation des _Xdebug_-Moduls und des Tools _Web developer_ in Firefox. Der empfohlene Befehl für die Installation einer vollständigen Entwicklungs-/Testumgebung lautet:

Benutzer @server: sudo apt-get install apache2-mpm-prefork mysql-Server libapache2-mod-php5 php5-mysql php5-birne php5-gd php5-xml php5-intl php5-curlphp5-xdebug php5-dev

Beachten Sie, dass die Verwendung von Xdebug sehr schwerwiegende Folgen für die Effizienz Ihres Portals haben kann. Daher wird dringend empfohlen, es für den Fall, dass Sie_\*\*_ es installiert haben, es beim Wechsel zur Produktion zu deaktivieren \(siehe PHP-Konfiguration in php.ini, xdebug.ini oder in Ihrem VirtualHost\).

Um das Gewicht der verschiedenen Prozesse in Chamilo zu messen, können Sie die von Facebook \(hauptsächlich\) entwickelte XHProf-Bibliothek verwenden. Im Blog von BeezNest finden Sie weitere Informationen zur Konfiguration.

Schließlich empfehlen wir auf einem schnell geladenen Produktionsserver die Verwendung eines PHP-Cache-Speicherverwaltungssystems wie_XCache, APC oder Memcache_ und das schnelle Lesen des Optimierungshandbuchs, der in das Verzeichnis _documentation_ Ihres Chamilo-Pakets eingebettet ist. Verwenden Sie diesen Befehl, um die Installation von Xcache in die Vollinstallation einzubeziehen:

Benutzer @server: sudo apt-get install apache2-mpm-prefork mysql-Server libapache2-mod-php5 php5-mysql php5-birne php5-gd php5-xml php5-intl php5-curl php5-xdebug php5-dev php5-xcache

Erwägen Sie, MemCached zum Speichern von Sitzungen zu verwenden. Beachten Sie jedoch, dass dies zu kniffligen Problemen mit dem Verlust von Sitzungen führen kann, wenn diese nicht ordnungsgemäß konfiguriert sind.

