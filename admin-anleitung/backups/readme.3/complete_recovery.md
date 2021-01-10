# Vollständige Wiederherstellung

Dieser Wiederherstellungsvorgang wurde einige Male getestet, Ihre Konfiguration kann jedoch erheblich von diesem Beispiel abweichen. Hier verwenden wir einen lokalen Installationsfall, der phpMyAdmin und ein Backup des Chamilo-Root-Verzeichnisses verwendet. Für einen Remote-Server würde es SSH/ SFTP- oder FTP-Zugriff auf den Server erfordern.

Diese Wiederherstellung kann erforderlich sein, nachdem Sie versehentlich einige oder alle Chamilo-Datenbanken gelöscht haben oder nachdem auf Ihrem Server durch einen Cracker ernsthafte Schäden verursacht wurden.

1. Kopieren Sie die Backup-Datei in das Root-Verzeichnis \(/var/www\) und entpacken Sie sie. Wenn Sie die gleiche Verzeichnisstruktur beibehalten, können Sie einen Teil des vorkonfigurierten Zugriffspfads auf einige Daten nicht verlieren.
2. Importieren Sie die Datenbanksicherung aus phpMyAdmin \(nachdem Sie die vorherige Datenbank entfernt haben, falls sie noch vorhanden war\).
3. Verbinde dich mit deiner Website und überprüfe, ob alles in Ordnung ist.

Das Backup enthält Benutzer, Passwörter, Kurse, Lernpfade und alle Ressourcen Ihres Portals.

Wir empfehlen aktiv, mindestens einmal täglich automatische Backups auf einem anderen Server für kritische Chamilo Server zu erstellen.

