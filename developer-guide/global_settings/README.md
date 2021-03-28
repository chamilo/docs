# Globale Einstellungen

![](../../.gitbook/assets/images26%20%289%29.png)

Globale Einstellungen in Chamilo sind eine Möglichkeit, ein gewisses Systemverhalten auf Plattforniveaus zu konfigurieren, das sich auf alle Kurse und alle Benutzer auswirkt, falls relevant.

Alle diese Einstellungen werden an einem von zwei Standorten aufbewahrt:

1. die Konfigurationsdatei, wenn wir der Meinung sind, dass diese Einstellung vom Systemadministrator gesteuert werden muss, nicht jedoch vom Chamilo-Administrator \(eine sehr kleine Anzahl von Einstellungen wird dort beibehalten\)
2. die Tabelle settings\_current \(und settings\_option\) \(s\), wenn diese Einstellungen auf der Seite mit den Plattformeinstellungen angezeigt werden sollen

Wie in den ersten Kapiteln angegeben, kann sich die Datenbank nicht zwischen Nebenversionen von Chamilo ändern. Wenn wir also eine optionale Funktion in einer Nebenversion entwickeln, verwenden wir die Konfigurationsdatei häufig, um die Einstellung zu speichern, bis wir zur nächsten Hauptversion gelangen.

Zu vollenden...