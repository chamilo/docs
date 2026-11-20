# Papierkörbe für Übungen und Lernpfade

Chamilo 3.1 kann gelöschte Übungsversuche und Tracking-Daten von Lernpfaden archivieren, damit berechtigte Lehrkräfte sie wiederherstellen können, vorbehaltlich der konfigurierten Aufbewahrung und Zugriffskontrollen. Papierkörbe schützen Tracking-Daten; sie ersetzen keine Datenbanksicherungen.

## Einen Übungsversuch wiederherstellen

1. Öffnen Sie die Seite **Berichte** der betroffenen Übung, wobei der richtige Kurs bzw. die richtige Sitzung ausgewählt ist.
2. Wählen Sie **Papierkorb**, um archivierte Versuche anzuzeigen.
3. Identifizieren Sie die lernende Person und den Versuch, den Sie wiederherstellen möchten.
4. Wählen Sie **Wiederherstellen**, bestätigen Sie und aktualisieren Sie den Bericht, um Antworten und Punktzahlen zu prüfen.

Sie benötigen die Berechtigung, Übungsergebnisse zu verwalten. Die Wiederherstellung kann blockiert sein, wenn die Übung durch das Gradebook gesperrt ist oder die Plattform den Zugriff von Lehrkräften auf Ergebnisse einschränkt.

## Den Fortschritt eines Lernpfads wiederherstellen

1. Öffnen Sie den entsprechenden Berichtsbildschirm des Lernpfads für den vorgesehenen Kurs bzw. die vorgesehene Sitzung.
2. Öffnen Sie dessen **Papierkorb**.
3. Wählen Sie den archivierten Fortschritt der lernenden Person und stellen Sie ihn mit **Wiederherstellen** wieder her.
4. Prüfen Sie den wiederhergestellten Lektionsfortschritt und die zugehörigen Übungsversuche.

Wenn ein Übungsversuch Teil eines ausstehenden Lernpfad-Archivs ist, stellen Sie zuerst das Lernpfad-Archiv wieder her. Die einzelne Wiederherstellung ist absichtlich blockiert, um inkonsistenten Fortschritt zu verhindern.

## Aufbewahrung und Bereinigung (Administrierende)

Die Einstellung `tracking.recycle_bin_retention_hours` steuert, wie lange Archive für die Wiederherstellung infrage kommen. Der anfängliche Standardwert beträgt **30 Tage** (720 Stunden). Bestehende Installationen müssen die neue Einstellung über die settings-upsert-Migration des Projekts synchronisieren, bevor die Verwaltungsoberfläche sie anzeigt.

Eine Bereinigung ohne Löschen vorab anzeigen:

```bash
php bin/console chamilo:recycle-bin:purge
```

Das endgültige Löschen erfordert eine ausdrückliche Option:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Der Befehl unterstützt `--hours` (Überschreibung der Aufbewahrung), `--scan-limit`, `--after-lp-id` und `--after-exercise-id` für eine kontrollierte Verarbeitung. Planen Sie ihn erst, nachdem Sie die Aufbewahrungsrichtlinie und die Sicherungsvorkehrungen geprüft haben. Es gibt **keinen impliziten automatischen Bereinigungsplan**, nur weil die Funktion aktiviert ist.

Siehe [Übungen](exercises.md) und [Lernpfade](../adding-content/learning-paths.md). Implementierung: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).