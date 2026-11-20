# Systemwerkzeuge

Diese Seite behandelt die Wartungs- und Prüfwerkzeuge des Systemblocks.

## Temporäre Dateien bereinigen

**System > Temporäre Dateien bereinigen** zeigt an, wie viele temporäre Upload-Dateien vorhanden sind und wie viel Speicherplatz sie belegen, und ermöglicht anschließend deren Bereinigung — entweder vollständig oder nur Dateien, die älter als ein konfigurierbares Alter sind. Ein Probelaufmodus ermöglicht eine Vorschau dessen, was zuerst gelöscht würde. Dieselbe Aktion entfernt außerdem veraltete Legacy-Build-Dateien und erzeugt kompilierte CSS-Assets neu.

Diese Aktion überspringt bewusst die eigenen Cache-Verzeichnisse von Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` und Cache-Pools) — sie bereinigt nur verstreute Dateien, die an anderer Stelle unter `var/cache/` gelandet sind. Sie übernimmt **keine** Änderung, die Sie in `.env` oder unter `config/` vorgenommen haben (zum Beispiel das Aktivieren der API-Dokumentation — siehe [API-Dokumentation aktivieren](../installation/configuration.md#enable-the-api-documentation)). Dafür benötigen Sie Shell-Zugriff, um `php bin/console cache:clear` auszuführen.

## Systemaktualisierung

**System > Systemaktualisierung** führt den Selbstaktualisierungsablauf von Chamilo direkt aus dem Administrationsbereich aus, als Abfolge einzelner, fortsetzbarer Schritte:

1. **Status** — Meldet die installierte Version und den Speicherort der Aktualisierungs-, Staging- und Sicherungsverzeichnisse sowie den verwendeten vertrauenswürdigen Signaturschlüssel
2. **Prüfung** — Ermittelt, ob eine neuere Version von der konfigurierten Aktualisierungsquelle verfügbar ist
3. **Verifizierung** — Lädt das Aktualisierungspaket und dessen Signatur herunter und prüft sie anhand der Manifest-Prüfsumme und des vertrauenswürdigen öffentlichen Schlüssels
4. **Vorabprüfung** — Validiert Systemanforderungen und Kompatibilität, bevor etwas verändert wird
5. **Staging** — Entpackt das verifizierte Paket in ein isoliertes Staging-Verzeichnis; an der laufenden Installation ändert sich noch nichts
6. **Anwendungsplan** — Erstellt eine Differenz der hinzuzufügenden, zu ersetzenden oder zu entfernenden Dateien auf Grundlage des gestagten Pakets
7. **Dateien anwenden** — Kopiert Dateien an ihren Platz. Dies erfordert eine ausdrückliche Bestätigung und erstellt eine Sicherung jeder überschriebenen Datei sowie eine Sperrdatei, die verhindert, dass eine zweite Aktualisierung gleichzeitig ausgeführt wird
8. **Migrationssicherheit / Prüfungen nach der Anwendung** — Validiert ausstehende Datenbankmigrationen und den Zustand nach der Installation
9. **Nach der Anwendung ausführen** — Führt Konsolenbefehle nach der Anwendung aus (etwa Datenbankmigrationen), jedoch nur, wenn Ihre Serverkonfiguration deren Ausführung über die Benutzeroberfläche zulässt und erst nachdem Sie eine ausdrückliche Bestätigungsphrase eingegeben und bestätigt haben, dass eine Sicherung erstellt wurde

Länger laufende Schritte melden den Fortschritt, sodass die Seite gefahrlos geöffnet bleiben kann, während sie abgeschlossen werden. Die Kombination aus Signaturprüfung, Staging vor der Anwendung, Sicherungen vor dem Überschreiben, einer Parallelitätssperre und eingegebenen Bestätigungen vor Datenbankänderungen soll diesen Ablauf auch ohne Shell-Zugriff sicher ausführbar machen — eine manuelle Sicherung vor dem Start bleibt dennoch gute Praxis; siehe [Sicherungen](../maintenance/backups.md).

## Dateiinformationen

**System > Dateiinformationen** listet jede hochgeladene Ressourcendatei auf, durchsuchbar nach Namen, und zeigt ihren physischen Pfad, ob sie verwaist ist (nicht mit einem Kurs oder einer Sitzung verknüpft) und an wie vielen Stellen auf sie verwiesen wird. Von hier aus können Sie eine verwaiste Datei einer Ressource zuordnen, die Zuordnung aufheben oder sie löschen — nützlich, um Speicher aufzuspüren und zu bereinigen, der keinem Kurs mehr zugeordnet ist.

Um festzustellen, wo eine Datei tatsächlich verwendet wird, öffnen Sie deren Details unter **Dateiinformationen** und prüfen Sie **Dateispeicherorte**. Chamilo listet bekannte Dokument- oder Persönliche-Datei-Speicherorte mit ihren Pfaden und, sofern zutreffend, Links zum Öffnen dieser Speicherorte auf. Die Details zeigen außerdem den physischen Dateipfad separat an. Eine Datei kann mehr als einen Speicherort haben; eine leere Liste bedeutet, dass für diese Ressource kein Dokument- oder Persönliche-Datei-Speicherort gefunden wurde. Prüfen Sie die Speicherorte, bevor Sie eine freigegebene Datei lösen oder dauerhaft löschen. Siehe [PR #9438](https://github.com/chamilo/chamilo-lms/pull/9438).

## Ressourcen nach Typ

**System > Ressourcen nach Typ** ermöglicht die Auswahl eines Ressourcentyps und zeigt über alle Kurse und Sitzungen hinweg eine aggregierte Anzahl und Liste der Elemente dieses Typs, wann sie erstellt wurden und (sofern zutreffend) welche Benutzer ihnen zugeordnet sind. Verwenden Sie dies, um Fragen wie „Wie viele Foren gibt es plattformweit?“ oder „Welche Kurse haben die meisten Dokumente?“ zu beantworten.

## Symbole auflisten

**System > Symbole auflisten** ist ein durchsuchbarer Katalog des integrierten Symbolsatzes von Chamilo, gruppiert nach Kategorie. Er ist vor allem nützlich, wenn Plugins oder Themes entwickelt werden und der genaue Name eines Symbols bestätigt werden muss, wird hier jedoch als allgemeine Referenz bereitgestellt.

## Werkzeuge nur für die Entwicklung

Zwei weitere Einträge können in diesem Block erscheinen, jedoch nur, wenn auf dem Server ein Verzeichnis `tests/` vorhanden ist — was normalerweise nur bei einer Entwicklungs- oder QA-Installation der Fall ist, niemals in der Produktion:

* **Datenfüller** erzeugt große Mengen an fiktiven Benutzern, Kursen und Datensätzen von Online-Benutzern für Last- oder QA-Tests.
* **E-Mail-Tester** sendet eine echte Test-E-Mail über den konfigurierten Mailer der Plattform, um zu bestätigen, dass Ihre SMTP-/Mail-Einstellungen tatsächlich funktionieren, und zeigt gegebenenfalls kürzlich aufgetretene Sendefehler an.

Wenn Sie diese beiden Links nicht sehen, ist das zu erwarten — es bedeutet, dass Ihre Installation kein Verzeichnis `tests/` besitzt, was der normale, korrekte Zustand einer Produktionsplattform ist.