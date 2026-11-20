# Reparatur- und Konvertierungsbefehle

> **Breaking Change.** Die nachstehenden Wartungsbefehle haben bisher sofort in die Datenbank geschrieben, sobald sie ausgeführt wurden. Sie sind nun **standardmäßig schreibgeschützt (Dry-Run)** und schreiben nur, wenn `--apply` angegeben wird, nach dem Vorbild von `chamilo:migration:repair-quiz-relations-from-legacy`.

| Befehl | Hinweise |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | kein `--expected-count` (einmalige Alles-oder-nichts-Operation) |

## Was sich für Administratoren geändert hat

1. Führen Sie den Befehl ohne Optionen aus: Er meldet, was er tun würde, schreibt nichts und gibt die genaue
   Zeile `--apply --expected-count=N` aus, die zu verwenden ist.
2. Zum Schreiben führen Sie ihn erneut mit `--apply --expected-count=N` aus, wobei N die vom schreibgeschützten Lauf gemeldete Anzahl ist.
   Weicht die Anzahl der Zeilen, die geändert würden, von N ab (die Daten haben sich inzwischen geändert), lehnt der Befehl ab
   und schreibt nichts.
3. `--dry-run` wird weiterhin akzeptiert (es ist nun der Standard und bewirkt nichts); die Kombination mit `--apply` ist ein Fehler.
4. Skripte und Cron-Jobs, die diese Befehle ohne Argumente ausgeführt und sich darauf verlassen haben, dass sie schreiben, müssen nun
   `--apply --expected-count=N` übergeben. Die Exit-Codes bleiben unverändert (0 Erfolg, 1 Fehler, 2 ungültige Verwendung).

Beispiel:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Neuer Befehl: `app:repair-user-tag-counters`

Berechnet den Nutzungszähler (`tag.count`) von Tags anhand der Beziehungszeilen neu, die sie verwenden (Benutzer-Tags, Extrafeld-
Tags, Portfolio-Tags). In älteren Versionen konnten die Zähler abweichen. Dasselbe Modell: Führen Sie ihn ohne Optionen aus, um die abweichenden
Tags aufzulisten und die Zeile `--apply --expected-count=N` zu erhalten, und führen Sie anschließend diese Zeile aus, um zu schreiben. Es ist keine Migration beteiligt: Führen Sie ihn aus,
wenn Sie die Zähler neu synchronisieren möchten.