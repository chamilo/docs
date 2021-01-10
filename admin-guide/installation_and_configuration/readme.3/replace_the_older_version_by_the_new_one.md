# Ersetzen Sie die ältere Version durch die neue

Bevor Sie eine neuere Version “on top of” Ihrer aktuellen Chamilo-Version anwenden, möchten Sie vielleicht ein paar Änderungen am Paket “just in case” vornehmen. Beispielsweise könnten die folgenden Verzeichnisse aus dem Chamilo-Paket**vor** entfernt werden, wenn Sie sie über Ihre aktuelle Installation kopieren:

* home/
* Kurse/
* main/inc/conf/
* main/upload/users/
* main/searchdb/

Diese Verzeichnisse sollen in der neuen Version ungefähr gleich sein und wurden möglicherweise alle durch die Verwendung von Chamilo über das Webinterface geändert. Um einen Dateikolliv zu vermeiden, entfernen Sie sie einfach aus dem Chamilo-Paket und fahren Sie dann fort...

Es gibt nur eine empfohlene Möglichkeit, Ihre Chamilo-Version vorerst zu aktualisieren:

1. Löschen Sie den vorherigen Ordner nicht, da sonst die älteren Konfigurationsdateien verloren gehen.
2. Kopieren Sie einfach das neue Chamilo-Verzeichnis über das alte.
 * Wenn Sie eine GNU/Linux-Distribution verwenden, müssen Sie das gesamte neue Verzeichnis in das alte kopieren, d.h.:

| user @server: sudo cp -r chamilo-1.9.4/\* /var/www/chamilo/ |
| :--- |


1. Dann gehe die Schritte von _ «**2.2.2**Last installation settings\_\_»_ durch.
2. Verbinde dich mit deiner Seite und überprüfe, ob alles da ist.