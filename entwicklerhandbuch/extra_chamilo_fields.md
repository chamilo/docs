# Zusätzliche Chamilo-Felder

![](../.gitbook/assets/images29%20%288%29.png)

Wenn Sie sich jemals fragen, wo diese « original\_user\_id » -Werte, die wir im Kapitel Webservices gesehen haben, gespeichert wurden, werfen Sie einen Blick auf die Tabelle « extra\_field ». Sie werden feststellen, dass Benutzer, Kurse und sogar Sitzungen alle zwei « extra » -Tabellen verwenden, die es uns ermöglichen, eine virtuell unbegrenzte Menge zusätzlicher Informationen und Links zu anderen Systemen zu speichern.

Für Benutzer ist es einfach: Sie können Felder über das Administrationsfeld definieren. Klicken Sie einfach auf den letzten Link des Benutzerblocks: « Profiling » und folgen Sie den Anweisungen, um ein neues Feld zu definieren.

Seit 1.10.0 bietet das Admin-Panel die Möglichkeit, zusätzliche Kurs- und Sitzungsfelder zu konfigurieren, und seit 1.11.0 können Sie dies mit jedem unterstützten Element über einen Link am Ende des Plattformblocks tun.

Für Benutzer, Kurse und Sitzungen waren die Felder jedoch bereits in der Chamilo 1.9-Datenbank verfügbar, sodass Sie sie bei Ihren Vorstellungen verwenden können._\*\*_ verwenden. Webservices haben sie bereits beim Erstellen eines neuen Kurses oder einer neuen Session über sie verwendet: Sie erstellen \(oder fügen Daten ein, falls vorhanden\) ein Feld mit dem Namen des Werts, den Sie beispielsweise im Parameter « original\_course\_id\_name » der WSCreateCourse\(\) -Methode gegeben haben.

In jedem Fall können Sie neue Felder manuell direkt von Ihrem Datenbank-Client aus definieren und diese bei Bedarf über Plugins verwenden.

Felddefinitionen werden in der zusätzlichen\_field-Tabelle gespeichert. Die Werte jedes Benutzers, jeden Kurses oder jeder Sitzung für diese Felder werden in der Tabelle extra\_field\_values gespeichert.

Schau sie dir an, sie sind eine großartige Ressource, mit der man arbeiten kann!

