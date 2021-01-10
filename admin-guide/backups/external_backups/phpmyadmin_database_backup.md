# phpMyAdmin-Datenbanksicherung

Datenbanken können über die [P](http://fr.wikipedia.org/wiki/PhpMyAdmin) [hpMyAdmin](http://fr.wikipedia.org/wiki/PhpMyAdmin) -Schnittstelle gespeichert werden, indem Sie mit dem Login und dem Passwort verbinden, die während der [LAMP](http://fr.wikipedia.org/wiki/LAMP) -Serverinstallation, der Datenbankinstallation oder der von Ihrem Hosting-Anbieter übermittelten Daten erstellt wurden.

![](../../../.gitbook/assets/phpaccueuil%20%283%29.png)Illustration 15: Verwaltung - phpMyAdmin

Wechseln Sie in der grafischen Oberfläche von phpMyAdmin auf die Registerkarte\_Export\__und wählen Sie die Datenbank aus, die gespeichert werden soll. Es gibt wahrscheinlich einen anderen namens “information\_schema”, den du einfach ignorieren kannst.

Möglicherweise möchten Sie das Ausgabeformat der Sicherungsdatei ändern. Um zu speichern, wählen Sie das gewünschte Format unter den zu exportierenden Datenbanken aus. Im vorliegenden Beispiel haben wir uns für SQL entschieden.

Der Name der gespeicherten Datei kann auch im Abschnitt _Output_ geändert werden. Es kann mit einem der drei angebotenen Formate komprimiert werden. Vergessen Sie nicht, die Option _Save Ausgabe in eine Datei_ auszuwählen, da sie sonst einfach das Backup-Ergebnis auf dem Bildschirm ausgibt, was Ihnen nicht wirklich hilft.

Sie haben nur noch das Herunterladen der Datei übrig. Es wird je nach Konfiguration Ihres Browsers standardmäßig in Ihrem _Downloads_-Verzeichnis oder auf Ihrem Desktop gespeichert.

Das Speichern der Datenbanken über _HPMyAdmin_ ist beendet. Die gespeicherte Datei wird in das SQL-Format \(.sql-Erweiterung\) erstellt und kann später im Falle eines Problems über phpMyAdmin importiert werden.