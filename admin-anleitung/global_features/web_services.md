# Web-Dienste

Chamilo LMS bietet eine Reihe von Webservices an, die im Laufe der Zeit erweitert wurden. Obwohl die aktuelle Basis nicht gut organisiert ist, sollten Sie im main/webservices/ -Verzeichnis leicht finden, wonach Sie suchen.

Weitere Details zu allen unseren Webservices finden Sie in unserem Wiki: [http://support.chamilo.org/projects/chamilo-18/wiki/Web\_services](http://support.chamilo.org/projects/chamilo-18/wiki/Web_services)

Die aktuellen SOAP-Webservices \(aber wir haben auch einige REST- und XML-RPC-Dienste zur Verfügung\) ermöglichen Ihnen:

* Benutzer erstellen, bearbeiten, aktivieren, deaktivieren und löschen
* Kurse erstellen, bearbeiten, aktivieren, deaktivieren und löschen
* Erstellen und Bearbeiten von Kursbeschreibungen
* Erstellen, Bearbeiten, Aktivieren, Deaktivieren und Löschen von Sitzungen
* Abonnieren oder Abbestellen von Kursen oder Sitzungen
* Abonnieren Sie Kurse für Sitzungen
* Holen Sie sich eine Liste von Kursen

Die bereits implementierten Dienste ermöglichen es Ihnen auch, Ihre eigenen einfach zu erweitern und zu erstellen. Prüfen Sie die main/webservices/registration.soap.php -Datei auf einen Startpunkt. Es gibt mehr strukturierte Skripte, aber die Registrierung. Soap.php ist diejenige, die zu diesem Zeitpunkt die meisten Funktionen implementiert.

Wenn Sie zufällig neue Dienste entwickeln, denken Sie darüber nach, diese unter [http://support.chamilo.org/projects/chamilo-18/issues](http://support.chamilo.org/projects/chamilo-18/issues) mit uns zu teilen \(öffnen Sie ein Problem und reichen Sie einen _Feature_-Vorschlag mit Ihrem Code ein - wir werden “credit” dafür\).

Das Skript _testip.php_ ermöglicht es Ihnen, Ihre eigene IP für den im Wiki beschriebenen Setup-Verfahren zu identifizieren.

