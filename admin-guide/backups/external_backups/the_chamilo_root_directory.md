# Das Chamilo-Root-Verzeichnis

Das Stammverzeichnis ist \(in diesem Zusammenhang\) das Verzeichnis, das die Chamilo-Dateien enthält. Betrachten wir für das Beispiel in diesem Tutorial, dass es in _/var/www/chamilo_ installiert wurde und über [_http://localhost/chamilo/_](http://localhost/chamilo/)\ verfügbar ist (für einen Remote-Server müssen wir FTP o SSH/SFTP\ verwenden).

Um zu speichern, müssen Sie die Dateien über Ihr Terminal komprimieren und in das _/var/www/_ -Verzeichnis gehen.

user @server:cd /var/www

Komprimiere das Verzeichnis mit dem „tar „-Befehl, um eine Datei tar.gz zu generieren:

user @server: /var/www$ sudo tar cvfj /home/you/bkp/backup\_chamilo.tar.gz chamilo/

Es kann praktisch sein, einen Namen anzugeben, der anhand des Datums wie _2010-05-07-backup-chamilo erstellt wurde.\_\_tar.gz_ Wenn Sie eine Reihe von Sicherungsdateien speichern, können Sie diese auf diese Weise einfach nach Datum sortieren.

Diese Sicherungskopie enthält alle Informationen aus den Zugriffen auf die Chamilo-Datenbank und alle ihre Konfigurationen. Dies ist dann nützlich im Falle eines Datenverlusts oder eines unerwünschten Einfalls auf Ihrem Server. Dies ist die einzige zuverlässige Möglichkeit, Ihren Chamilo Server neu aufzubauen, wenn ein größeres Problem auftritt.

Diese Sicherung kann automatisch von einem Scheduling-System \(_cron_-Prozess unter GNU/Linux\) auf dem Server ausgeführt werden, sie kann jedoch manuell ausgeführt werden, falls der Server es nicht richtig macht.

Wenn Sie keinen Zugang zu einem Terminal haben, müssen Sie möglicherweise eine Sicherungskopie über _FTP_ ausführen. Dieser Vorgang kann jedoch (ohne Komprimierung\) **mehr** länger sein.