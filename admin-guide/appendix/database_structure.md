# Datenbank-Struktur

Wenn Sie sich für die Datenbankstruktur von `Chamilo 1.9` interessieren, sehen Sie bitte in unserem Wiki nach den vollständigen Schaltplänen: [http://support.chamilo.org/projects/chamilo-18/wiki/Database\_schema](http://support.chamilo.org/projects/chamilo-18/wiki/Database_schema). Wisse nur, dass es rund 180 Tische mit vielen Verbindungen gibt, also stellen Sie sicher, dass Sie es richtig machen, bevor Sie versuchen, es zu manipulieren. Es gibt verschiedene Mechanismen, um Plugins basierend auf der aktuellen Struktur zu entwickeln, ohne sie zu ändern. Bitte kontaktieren Sie die Entwickler über IRC \(siehe Fußzeile unserer Website\) oder über [http://support.chamilo.org/projects/chamilo-18](http://support.chamilo.org/projects/chamilo-18), wenn Sie sich verloren fühlen.

![](../../.gitbook/assets/images51%20%281%29.png)
Illustration 93: `Chamilo LMS 1.9`-Datenbankstruktur

Die Datenbankstruktur hat sich zwischen Dokeos oder Chamilo LMS 1.8 und `Chamilo LMS 1.9` dramatisch verändert. Wir haben alles in eine einzige Datenbank ohne Tabellenreplikation verschoben, was uns jetzt eine Reihe neuer Möglichkeiten für Interkurs-Mash-ups bietet.

Es ist wichtig zu beachten, dass**Die Datenbankstruktur zwischen den Nebenversionen von Chamilo LMS nicht ändern**. Kein bisschen. Dies beruht auf einer schwer zu verwaltenden, aber sehr nützlichen Entscheidung, die auf Entwicklerebene getroffen wird, um sicherzustellen, dass Benutzer problemlos von einer Version auf eine andere upgraden können, ohne das Risiko zu riskieren, Datenverluste oder Verschlechterung zu verursachen.

Wenn Sie also eine `Chamilo LMS 1.9.0`-Installation haben, können Sie problemlos auf `1.9.2`, `1.9.4` oder `1.9.6` aktualisieren, und Ihre Datenbankstruktur wird sich überhaupt nicht ändern.