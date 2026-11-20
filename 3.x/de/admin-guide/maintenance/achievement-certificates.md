# Leistungszertifikate (Stapelgenerierung)

Chamilo kann das Leistungszertifikat eines Kurses automatisch für jede Person erzeugen, die den Kurs
abgeschlossen hat — innerhalb eines Basiskurses und innerhalb jeder Sitzung, die ihn wiederverwendet —, ohne dass eine Lehrkraft
jeden Kurs einzeln öffnen muss. Zwei Konsolenbefehle decken dies ab, einer für einen einzelnen Kurs
und einer für die gesamte Plattform, und keiner von beiden ist ein datenbankintensiver Vorgang, den man ständig überwachen muss:
Beide arbeiten in begrenzten Stapeln, unterstützen einen Probelauf und können bei Unterbrechung sicher fortgesetzt werden.

## Plattformweiter Befehl

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Für jeden Kurs mit einer geeigneten Stammkategorie im Notenbuch — oberste Ebene, keine Unterkategorie,
mit aktivierter Option **Zertifikate erzeugen** — prüft der Befehl jede eingeschriebene Person, die für diese Kategorie
noch kein Zertifikat besitzt, und erzeugt eines für alle, die die
Abschlussanforderung erfüllt haben. Ein Kurs kann **mehr als einen** Kontext beitragen: seine Basiseinschreibung und
getrennt davon einen Kontext je Sitzung, die ihn wiederverwendet, da eine Sitzung eine eigene Stammkategorie
und eine eigene Bestehensschwelle haben kann.

Ein Kurs oder einer seiner Sitzungskontexte wird übersprungen — nicht als Fehler behandelt —, wenn er für die
automatisierte Verarbeitung nicht geeignet ist: keine konfigurierte Abschlussregel, mehr als eine geeignete Stammkategorie
für diesen Kontext (mehrdeutig, erfordert eine manuelle Auswahl) oder fehlender Inhalt für die Zertifikatsbenachrichtigung.
Die Laufzusammenfassung am Ende gibt an, wie viele Kontexte in welchen Fall fallen, sodass nichts
übersprungen wird, ohne sichtbar gemacht zu werden.

### Abschlussquelle

* `--completion-mode=course-rule` (Standard): verwendet die für den Kurs konfigurierte Abschlussregel.
* `--completion-mode=gradebook`: verwendet stattdessen direkt die native Notenbuchbewertung für diesen Kontext.
  In diesem Modus qualifiziert sich nur ein Kontext mit genau einer geeigneten Stammkategorie — einer mit mehreren
  wird übersprungen und gemeldet, um ihn stattdessen einzeln zu verarbeiten (siehe unten).

### Sicherheitsoptionen

| Option                     | Zweck                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Auswerten und berichten, ohne Zertifikate zu erzeugen oder Benachrichtigungen zu senden. Diesen Modus immer zuerst ausführen.                                      |
| `--send-notification`       | Erforderlich für eine echte Ausführung (kein Probelauf). Sendet nach der Erzeugung jedes Zertifikats die für den Kurs konfigurierte interne Nachricht und E-Mail. |
| `--sender-id=<id>`          | Aktive Plattformadministration, die als Absender der Benachrichtigung verwendet wird. Zusammen mit `--send-notification` erforderlich.                            |
| `--limit=<n>`                | Maximale Anzahl der in einem Lauf erzeugten (oder im Probelauf gemeldeten) Zertifikate. `0` = unbegrenzt. Standard `100`.                                    |
| `--scan-limit=<n>`           | Maximale Anzahl der in einem Lauf geprüften Personen, über alle Kurse und Sitzungen hinweg. `0` = unbegrenzt. Standard `1000`.                                 |
| `--batch-size=<n>`           | Personen, die innerhalb eines Kurs-/Sitzungskontexts je Datenbankstapel geladen werden. Standard `25`.                                                     |
| `--course-batch-size=<n>`    | Kurse, die je Datenbankstapel geladen werden. Standard `50`.                                                                                         |
| `--after-course-id=<id>`     | Setzt die Prüfung nach dieser Kurs-ID fort. Nach einem unterbrochenen Lauf sicher wiederverwendbar — ein Kurs erzeugt niemals erneut ein Zertifikat für eine Person, die bereits eines besitzt. |
| `--user-id=<id>`             | Beschränkt den Lauf auf eine Person, geprüft über jeden geeigneten Kurs und jede geeignete Sitzung — nützlich, um das Verhalten vor einem plattformweiten Lauf zu validieren. |
| `--regenerate-empty`         | Verarbeitet auch Personen, deren Zertifikatsdatensatz vorhanden ist, aber keine gespeicherte Zertifikatsdatei enthält — zum Beispiel nach einer Generierung, die auf halbem Weg fehlgeschlagen ist — und erzeugt dieses Zertifikat erneut. Personen mit einem vollständigen Zertifikat werden niemals angetastet. |

### Beispiele

Führen Sie zunächst einen Probelauf für die gesamte Plattform aus, um zu sehen, was erzeugt würde:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Echter Lauf, mit Benachrichtigung der Lernenden; Administrator mit der ID 1 als Absender:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Einen unterbrochenen Lauf nach Kurs 480 fortsetzen:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Zertifikate erneut erzeugen, deren Datensatz vorhanden ist, deren Datei jedoch nie gespeichert wurde (zuerst einen Probelauf ausführen, um sie aufzulisten):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Planung als Cron-Job

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Einen einzelnen Kurs verarbeiten

`chamilo:migration:process-achievement-certificates --course-id=<id>` bietet dieselben Optionen für Probelauf, Benachrichtigung und Paginierung wie der plattformweite Befehl, beschränkt auf den Basiskurs (nicht auf dessen Sitzungen), mit einem expliziten `--category-id`, um die Zuordnung eindeutig zu machen, wenn ein Kurs mehr als eine zulässige Stammkategorie besitzt:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Verwenden Sie den Befehl, um einen einzelnen Kurs vor einem plattformweiten Lauf zu testen oder um einen Kurs zu verarbeiten, den der plattformweite Lauf wegen einer mehrdeutigen Kategorie als übersprungen gemeldet hat.

## Exit-Codes

Beide Befehle beenden sich mit einem Fehlerstatus, wenn während eines echten Laufs mindestens eine Zertifikatserzeugung tatsächlich fehlgeschlagen ist (prüfen Sie `var/log/dev.log` — oder das entsprechende Produktionsprotokoll — auf den zugrunde liegenden Fehler). Kontexte, die aus strukturellen Gründen übersprungen werden (keine Regel, mehrdeutige Kategorie, fehlende Benachrichtigungskonfiguration), führen nicht zu einem Fehler-Exit-Code; sie werden stattdessen in der Zusammenfassung gemeldet.

## Verwandt: Lernende, die bei einem vorausgesetzten Lernpfad unter 100 % bleiben

Wenn die Abschlussregel eines Kurses verlangt, dass ein Lernpfad 100 % erreicht, bleibt ein Lernender, der jeden Schritt abgeschlossen, die abschließende Seite „Congratulations“ des Pfads jedoch nie geöffnet hat, knapp unter 100 % und wird hier nie berechtigt. Siehe [Abschließen hängengebliebener abschließender Elemente eines Lernpfads](learning-path-final-items.md) — führen Sie dies zuerst aus, wenn Lernenden Zertifikate fehlen, die sie Ihrer Erwartung nach erworben haben sollten.

## Ersetzt: das ältere Cron-Skript

`public/main/cron/add_gradebook_certificates.php` wird nicht mehr empfohlen. Es lädt jedes Gradebook-Ergebnis der Plattform in einer einzigen unbegrenzten Abfrage in den Speicher und gibt ihn während der Schleife nie frei, sodass es auf einer Instanz mit einer nicht trivialen Anzahl von Kursen oder Übungen den Speicher erschöpfen kann, und es sendet nie die Benachrichtigung „Sie haben ein Zertifikat erworben“. Verwenden Sie stattdessen `chamilo:gradebook:process-achievement-certificates`.