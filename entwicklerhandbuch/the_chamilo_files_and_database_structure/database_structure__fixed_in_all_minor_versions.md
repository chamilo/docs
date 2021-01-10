# Datenbankstruktur: in allen Nebenversionen festgelegt

Eine wichtige Änderung in Chamilo \(im Vergleich zu seinen Vorfahren\) ist, dass wir keine Änderungen der Datenbank oder der Dateistruktur erlauben\*\* zwischen Nebenversionen. Auf der Entwicklerseite bedeutet dies, dass Sie, wenn Sie eine neue Funktion mit neuen Daten entwickeln müssen, die gespeichert werden sollen, Plugins oder zusätzliche Felder \(mehr dazu später\) verwenden müssen, bis sie in die nächste Hauptversion aufgenommen werden können.

Wenn eine Hauptversion \(1.9.0, 1.10.0, 1.11.0, etc\) ohne Ihre Änderungen veröffentlicht wird, werden sie erst in der nächsten Hauptversion eingeschlossen. Deshalb musst du sicherstellen\*\* sicherstellen, dass du uns \(info@chamilo.org oder über einen Pull Request on [https://github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)\) zur Aufnahme kontaktierst, bevor wir in die Alpha-Phase einer neuen Hauptversion eintreten, wenn du möchtest, dass dein Code enthalten sein soll.

Auf Seiten des Administrators bedeutet dies, dass alle Upgrades reibungslos und ohne Änderung ihrer Daten durchgeführt werden, was bedeutet, dass sie sicher sein können, dass kein Problem auftreten wird, das einen Rückzug zu einem früheren Backup erfordern würde. Wenn das Upgrade von 1.9.2 auf 1.9.4 fehlschlagen würde, könnte er die neuen Dateien einfach wieder mit Dateien von Version 1.9.2 überschreiben, und die Dinge werden wieder funktionieren \(das einzige zu speichernde Verzeichnis ist das `home/` -Verzeichnis, wenn alles gemäß dem Installationshandbuch erledigt wurde\).

