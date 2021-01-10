# Die Chamilo LMS-Datenbankstruktur heute

Sie können hier auf ein vollständiges Schema der Chamilo 1.9, 1.10 und 1.11 Datenbanken zugreifen: [https://github.com/chamilo/chamilo-lms/wiki/Database-structure](https://github.com/chamilo/chamilo-lms/wiki/Database-structure)

![](https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.png) Hochrangige Ansicht der Chamilo LMS 1.11-Datenbankstruktur

Im Schema steht grün für Schlüsselbenutzerdaten, blau steht für Schlüsselkurse - Daten und Gelb steht für Schlüsselsitzungsdaten. Alle Tabellen, die mit der orangefarbenen Tabelle \(der `c_item_property` -Tabelle\) verknüpft sind, sind Ressourcen, die sich in einem Kurs befinden \(Forum, Dokumente, Aufgaben, Übungen usw.\).

Wir verwenden die kostenlose « Dia » Software, um diese zu erstellen. Wenn Sie sie also verwenden und Anpassungen vornehmen möchten, können Sie das editierbare Modell unter [https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.dia](https://github.com/chamilo/chamilo-lms/blob/1.11.x/tests/history/1.11.0/chamilo-1.11-db.dia) herunterladen