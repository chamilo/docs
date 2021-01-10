# Installation

Um den Multi-URL-Modus zu konfigurieren, benötigen Sie

* Zugriff auf die Konfiguration Ihres Webservers
* Zugriff auf die Definition Ihrer Domainnamen
* Zugriff auf die Chamilo-Konfigurationsdatei

Der Installationsprozess ist wie folgt

* aktualisiere _app/conf/configuration.php_, indem du den Kommentarmarker vor der Zeile entfernst: _$\_configuration \['multiple\_access\_urls'\] = true; _ \(und stelle sicher, dass es auf true gesetzt ist\)
* fügen Sie ServerAlias-Anweisungen in den VirtualHost Ihres Apache hinzu \(siehe unten\)
* Definieren Sie Domänennamen \(DNS\), damit sie auf Ihren Server verweisen
* \[veraltet\] füge die Zeile “1,1” in deiner _ access\_url\_rel\_user_ -Tabelle hinzu \(diese Zeile ist nicht mehr erforderlich, beginnend mit Chamilo LMS 1.9\).
* Gehe zur Chamilo-Admin-Seite und folge dem Link _Mehrere URL-Portale_
* Definieren Sie Ihre Haupt-URL neu \(ersetzen Sie _localhost_\) und fügen Sie die gewünschten Unterportale hinzu, fügen Sie dann jeweils einen lokalen Administrator hinzu und aktivieren Sie ihn

![](../../../.gitbook/assets/graficos97%20%281%29.png)
Illustration 83: Verwaltung - Multi-URLs

Für zwei verschiedene Multi-URLs und eine administrative, basierend auf der Domain _campusabc.com_, würde der VirtualHost ungefähr so aussehen:

```text
ServerAdmin webmaster@campusabc.com
DocumentRoot /var/www/campusabc.com /
ServerName admin.campusabc.com
ServerAlias pepsi.campusabc.com
ServerAlias cocacola.campusabc.com
... other host settings here ...
```

Vergessen Sie nicht immer zu bedenken, dass Ihr erstes Portal ein generisches Portal, ein Verwaltungsportal sein wird. Sie sollten es vorzugsweise nicht für den direkten Zugriff von Studenten verwenden. Deklarieren Sie etwas wie Admin. \[domain-name\] als erster Host, und deklarieren Sie dann die URLs, die Sie wirklich verwenden werden.