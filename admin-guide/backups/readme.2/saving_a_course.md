# Einen Kurs speichern

Der Plattformadministrator kann jeden Kurs von \(unter anderem aus der Verwaltungsoberfläche\) speichern.

1. Gehe zu: « Administration » → « Courses list »:

![](../../../.gitbook/assets/images13%20%288%29.png)
Illustration 18: Administration — Kursblock

1. Klicken Sie auf das CD-Symbol, damit der Kurs exportiert werden kann.

![](../../../.gitbook/assets/graficos33%20%286%29.png)
Illustration 19: Administration — Liste der Kurse — Backup

1. Chamilo schlägt dann vor, « Generate a backup » oder « Import backup information » von Backup zu erhalten. Klicken Sie auf _Backup generieren_.

![](../../../.gitbook/assets/sauvegardecours_-backup%20%281%29.png)
Illustration 20: Verwaltung - Backup

1. Sie können zwischen einem vollständigen Backup und einer bestimmten Auswahl wählen \(je nach Bedarf\). Lassen Sie uns für das Beispiel _Complete_ Backup auswählen.

![](../../../.gitbook/assets/sauvegardegenerer_-backup%20%283%29.png)
Illustration 21: Administration — Backup-Einstellungen

1. Das Backup wird generiert und Sie müssen nur auf die Schaltfläche Zip-Datei klicken, um es herunterzuladen.

![](../../../.gitbook/assets/sauvegardebackup_-ok%20%283%29.png)
Illustration 22: Administration — Backup, Ergebnisse der Backup-Generierung

1. Wenn Sie auf die Schaltfläche _Backup_ generieren klicken, erstellt Chamilo eine Sicherungsdatei, die standardmäßig in ihrem _chamilo/archive_ -Verzeichnis landet. Sie können es also durch direkten Zugriff wiederherstellen, aber das bedeutet, dass auch andere Personen Zugriff darauf haben können. Das bedeutet, dass Sie als Administrator beide einen regulären Prozess haben sollten, um dieses Verzeichnis zu bereinigen \(wir bieten eines im _main/cron_ -Verzeichnis an, aber Sie müssen es ausführen\) **und** dass Sie Ihre Konfiguration festlegen sollten \(über .htaccess oder VirtualHost-Konfiguration\), um eine direkte Navigation innerhalb des _main/archive_ zu vermeiden -Verzeichnis.

Es gibt auch eine andere Möglichkeit, Backups zu generieren...

Klicken Sie als Administrator oder Lehrer auf den Tab „Meine Kurse“ und dann auf einen der verfügbaren Kurse. Dann ist es möglich, ein Backup auf die gleiche Weise zu erstellen, indem Sie auf das Tool _Maintenance_ klicken.

![](../../../.gitbook/assets/administrationmaintenance%20%283%29.png)
Illustration 23: Interface — Tools zur Kursverwaltung

Das Interface ist etwas anders...

![](../../../.gitbook/assets/proprietemaintenance%20%283%29.png)
Illustration 24: Interface — Backup-Optionen für den Kurs

Mit den Backup-Optionen für den Kurs können Sie noch drei weitere Funktionen ausführen:

* **Kurskopie** ermöglicht es Ihnen, einen Kurs ganz oder teilweise in einen anderen \(vorzugsweise leeren\) Kurs zu duplizieren. Der einzige erforderliche Zustand, bevor dies vorliegt, ist ein erster Kurs mit etwas zu kopieren und einen anderen Kurs, der nicht die Elemente des ersten enthält.
* **Leerer Kurs** ermöglicht es Ihnen, den gesamten Inhalt eines Kurses zu leeren. Nehmen wir an, Sie möchten einen neuen Kurs innerhalb desselben “shell” wie den vorherigen starten... klicken Sie einfach auf diesen Link und alle zuvor erstellten Ressourcen sind weg, ohne die Möglichkeit, sie wiederherzustellen. Bevor Sie das tun, möchten Sie möglicherweise das Kurselement durch eine Backup- Operation von _Course wiederherstellen.
* **Löschen** ermöglicht es Ihnen, den gesamten Kurs zu löschen, das bedeutet auch, seine leere Shell zu entfernen. Eine Bestätigung ist erforderlich, aber wenn sie entfernt ist, erwarten Sie nicht, dass sie irgendwo als sichere Kopie verfügbar ist...

**Hinweis**: Wenn Sie die ZIP-Datei des Backups öffnen, werden Sie eine enge Ähnlichkeit mit der Dokumentenhierarchie des Tools _Documents_ feststellen.

Zu Ihrer Information wiegt die Standarddatei .zip für einen Kurs, der ursprünglich mit Beispielinhalt erstellt wurde, etwa 8,9 MB.

Es enthält:

* eine interne Strukturdatei mit dem Namen Kurs\_info.dat
* ein Verzeichnis namens _Document_
* eine Reihe von Dateien und Ordnern, die die Kursdokumente enthalten, alles, was nicht mit den Benutzern verknüpft ist \(Aufgaben und andere Dinge, die vom Benutzer zusammenhängen, werden nicht gespeichert\)

Das _Document_-Verzeichnis hat eine ähnliche Struktur wie in Abbildung 25, die die Struktur des Dokument-Tools wiedergibt, wie in Abbildung 26 gezeigt.

![](../../../.gitbook/assets/structuredoc%20%283%29.png)
Illustration 25: Backup — Struktur der Sicherungsdateien

![](../../../.gitbook/assets/graficos34%20%286%29.png)
Illustration 26: Interface — Dokumentenliste

Diese Dokumente sind der Standardinhalt des Kurses.

Darüber hinaus werden durch das Backup nur Dokumente \(Bilder, Videos usw.\) wiederhergestellt, die sich auf den Kurs beziehen.