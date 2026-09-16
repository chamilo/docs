# Systemwerkzeuge

Diese Seite behandelt die Wartungs- und Prüfwerkzeuge des Blocks System.

## Temporäre Dateien bereinigen

**System > Temporäre Dateien bereinigen** zeigt, wie viele temporäre Upload-Dateien vorhanden sind und wie viel Speicherplatz sie belegen, und ermöglicht anschließend deren Löschung — entweder alle oder nur Dateien, die älter als ein konfigurierbares Alter sind. Ein Dry-Run-Modus lässt Sie zuerst eine Vorschau dessen anzeigen, was gelöscht würde. Dieselbe Aktion entfernt außerdem veraltete Legacy-Build-Dateien und regeneriert kompilierte CSS-Assets.

Diese Aktion überspringt bewusst die eigenen Cache-Verzeichnisse von Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` und Cache-Pools) — sie bereinigt nur verirrte Dateien, die anderweitig unter `var/cache/` gelandet sind. Sie übernimmt **nicht** eine Änderung, die Sie in `.env` oder unter `config/` vorgenommen haben (zum Beispiel das Aktivieren der API-Dokumentation — siehe [API-Dokumentation aktivieren](../installation/configuration.md#enable-the-api-documentation)). Dafür benötigen Sie Shell-Zugriff, um `php bin/console cache:clear` auszuführen.

## Systemaktualisierung

**System > Systemaktualisierung** führt den Selbstaktualisierungs-Workflow von Chamilo direkt aus dem Administrationsbereich aus, als Abfolge diskreter, fortsetzbarer Schritte:

1. **Status** — Meldet die installierte Version und wo sich Update-/Staging-/Backup-Verzeichnisse befinden, zusammen mit dem verwendeten vertrauenswürdigen Signaturschlüssel
2. **Prüfen** — Ermittelt, ob von der konfigurierten Update-Quelle eine neuere Version verfügbar ist
3. **Verifizieren** — Lädt das Update-Paket und dessen Signatur herunter und prüft sie gegen die Manifest-Prüfsumme und den vertrauenswürdigen öffentlichen Schlüssel
4. **Preflight** — Validiert Systemanforderungen und Kompatibilität, bevor etwas verändert wird
5. **Stage** — Entpackt das verifizierte Paket in ein isoliertes Staging-Verzeichnis; an der Live-Installation ändert sich noch nichts
6. **Plan anwenden** — Erstellt einen Diff der Dateien, die hinzugefügt, ersetzt oder entfernt werden sollen, basierend auf dem gestagten Paket
7. **Dateien anwenden** — Kopiert Dateien an ihren Platz. Dies erfordert eine ausdrückliche Bestätigung und erstellt ein Backup jeder überschriebenen Datei sowie eine Sperrdatei, die verhindert, dass ein zweites Update gleichzeitig läuft
8. **Migrationssicherheit / Prüfungen nach dem Anwenden** — Validiert ausstehende Datenbankmigrationen und den Zustand nach der Installation
9. **Nach dem Anwenden ausführen** — Führt Konsolenbefehle nach dem Anwenden aus (etwa Datenbankmigrationen), jedoch nur, wenn Ihre Serverkonfiguration deren Ausführung aus der Benutzeroberfläche zulässt, und nur nachdem Sie eine ausdrückliche Bestätigungsphrase eingegeben und bestätigt haben, dass ein Backup erstellt wurde

Langlaufende Schritte melden den Fortschritt, sodass die Seite während der Ausführung sicher geöffnet bleiben kann. Die Kombination aus Signaturprüfung, Staging vor dem Anwenden, Backups vor dem Überschreiben, einer Parallelitätssperre und getippten Bestätigungen vor Datenbankänderungen ist darauf ausgelegt, diesen Workflow ohne Shell-Zugriff sicher ausführbar zu machen — ein manuelles Backup vor dem Start bleibt dennoch gute Praxis; siehe [Backups](../maintenance/backups.md).

## Dateiinformationen

**System > Dateiinformationen** listet jede hochgeladene Ressourcendatei auf, durchsuchbar nach Namen, und zeigt ihren physischen Pfad, ob es sich um eine verwaiste Datei handelt (nicht mit einem Kurs oder einer Sitzung verknüpft) und an wie vielen Stellen sie referenziert wird. Von hier aus können Sie eine verwaiste Datei an eine Ressource anhängen, sie lösen oder löschen — nützlich, um Speicherplatz aufzuspüren und zu bereinigen, der keinem Kurs mehr gehört.

## Ressourcen nach Typ

**System > Ressourcen nach Typ** lässt Sie einen Ressourcentyp wählen und über alle Kurse und Sitzungen hinweg eine aggregierte Anzahl und Liste der Elemente dieses Typs sehen, wann sie erstellt wurden und (sofern zutreffend) welche Benutzer ihnen zugeordnet sind. Nutzen Sie es, um Fragen zu beantworten wie „wie viele Foren gibt es plattformweit“ oder „welche Kurse haben die meisten Dokumente“.

## Symbole auflisten

**System > Symbole auflisten** ist ein durchsuchbarer Katalog des integrierten Symbolsatzes von Chamilo, gruppiert nach Kategorie. Es ist vor allem nützlich, wenn Sie Plugins oder Themes entwickeln und den genauen Namen eines Symbols bestätigen müssen, wird hier aber als allgemeine Referenz bereitgestellt.

## Nur-Entwicklungs-Werkzeuge

Zwei weitere Einträge können in diesem Block erscheinen, jedoch nur, wenn auf dem Server ein Verzeichnis `tests/` vorhanden ist — was normalerweise nur auf einer Entwicklungs- oder QA-Installation der Fall ist, niemals in der Produktion:

* **Datenfüller** erzeugt große Mengen fiktiver Benutzer, Kurse und Online-Benutzer-Datensätze für Last- oder QA-Tests.
* **E-Mail-Tester** sendet eine echte Test-E-Mail über den konfigurierten Mailer der Plattform, um zu bestätigen, dass Ihre SMTP-/Mail-Einstellungen tatsächlich funktionieren, und zeigt gegebenenfalls kürzliche Sendefehler.

Wenn Sie diese beiden Links nicht sehen, ist das erwartet — es bedeutet, dass Ihre Installation kein Verzeichnis `tests/` hat, was der normale, korrekte Zustand für eine Produktionsplattform ist.