# Schritt 4 von 6: MySQL-Datenbankparameter

Wir überprüfen nun, ob das Datenbankverwaltungssystem \(DBMS\) funktioniert und wie erwartet konfiguriert ist:

![](../../../../.gitbook/assets/images7%20%287%29.png)Illustration 8: Installation — MySQL-Einstellungen

Um die Einstellungsüberprüfung zu ermöglichen, müssen Sie die erforderlichen Felder ausfüllen. Diese Elemente wurden Ihnen wahrscheinlich gegeben, als Sie Ihren Hosting-Service zum ersten Mal gemietet haben, oder Sie haben sie selbst gemacht, als Sie Ihren [LAMP](http://fr.wikipedia.org/wiki/LAMP) -Server lokal konfiguriert haben.

* _Datenbankhost:_ der Name des SQL-Servers. Wenn es sich um eine lokale Installation handelt, ist der MySQL-Server wahrscheinlich auch lokal und sein Name lautet _localhost_.
* _Datenbankbenutzer: _ der Name des Datenbankbenutzers. Wenn es sich um eine lokale Installation handelt, wird der Name wahrscheinlich standardmäßig _root_ sein, aber wir empfehlen die Erstellung eines anderen Benutzers für Ihre Chamilo-Datenbanken, da die Verwendung von _root_ ein erhebliches Sicherheitsrisiko für Ihre anderen Datenbanken auf diesem Server darstellt. In der Regel können Sie über ein Webinterface einen neuen Benutzer erstellen, aber wenn Sie dies im Terminal tun müssen und davon ausgehen, dass Sie einen Benutzer namens “chamilo” mit einem Kennwort “olimahc” wünschen, helfen Ihnen diese 2 Befehle:
 * erteile alle Privilegien für chamilo.\* an chamilo @localhost, identifiziert durch „olimahc“;
 * Flush-Privilegien;
* _Datenbank-Passwort:_ das Passwort, das während der Einstellung/Erstellung der Datenbank zur gleichen Zeit wie der Benutzer gegeben/erstellt wurde. Vor Ort ist das Passwort standardmäßig leer, aber wir empfehlen aus Sicherheitsgründen erneut, hier ein eigenes Passwort zu definieren.
* _Datenbankname:_ der Name der zu erstellenden Datenbank und in der alle Daten von Chamilo gespeichert werden

Seit Chamilo 1.9.0 wurde der Installationsprozess vereinfacht und die Datenbankstruktur wurde migriert, sodass nur eine Datenbank verwendet wird, was den Installationsprozess und die Wartung von Chamilo-Portalen erheblich vereinfacht.

Überprüfen Sie die im Formular eingegebenen Daten und klicken Sie dann auf die Schaltfläche _Datenbankverbindung prüfen_. Wenn eine Fehlermeldung angezeigt wird, überprüfen Sie die Daten erneut. Vielleicht ist dieses Passwort nicht das richtige?

Sobald alles in Ordnung ist \(und der grüne Bestätigungsblock erscheint\), fahren Sie mit dem nächsten Schritt fort.

![](../../../../.gitbook/assets/images9%20%287%29.png)Illustration 9: Prüfung der Installationsdatenbank - OK

Wenn eine Datenbank mit dem gleichen Namen bereits existiert, wird es Ihnen eine Meldung mit gelbem Hintergrund mitteilen, da diese Datenbank mit Ihrer neuen Datenbank überschrieben wird! Um dies zu vermeiden, sollten Sie im vorherigen Formular einen anderen Datenbanknamen verwenden.