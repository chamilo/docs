# Vorlagen

Chamilo verwendet Vorlagen für Zertifikate, Dokumente und E-Mails. Sie können diese Vorlagen an das Corporate Design und die Anforderungen Ihrer Organisation anpassen.

## Zertifikatsvorlagen

Zertifikatsvorlagen legen Layout und Inhalt der Zertifikate fest, die Lernenden verliehen werden, die die Schwellenwerte im Notenbuch erreichen.

### Anpassen einer Zertifikatsvorlage

Zertifikatsvorlagen verwenden HTML und CSS mit Platzhaltervariablen:

| Variable | Wird ersetzt durch |
|----------|-------------|
| Student name | Den vollständigen Namen des Lernenden |
| Course name | Den Namen des Kurses |
| Date | Das Datum, an dem das Zertifikat erworben wurde |
| Score | Die Abschlussnote des Lernenden |
| Barcode | Einen Barcode-Platzhalter (`((certificate_barcode))`) zur Verifizierung |

### Hochladen einer Vorlage

1. Zur Verwaltung der Zertifikatsvorlagen navigieren
2. Die HTML-Vorlage hochladen oder bearbeiten
3. Die Platzhaltervariablen dort einsetzen, wo dynamische Inhalte erscheinen sollen
4. Speichern

## Dokumentvorlagen

Lehrende können Dokumentvorlagen beim Erstellen von Inhalten im Werkzeug Dokumente verwenden. Vorlagen bieten ein Ausgangslayout für gängige Dokumenttypen.

### Verwalten von Dokumentvorlagen

1. Zur Vorlagenverwaltung im Administrationsbereich navigieren
2. Neue Vorlagen durch Hochladen von HTML-Dateien hinzufügen
3. Die Vorlagen stehen Lehrenden zur Verfügung, wenn sie neue Dokumente erstellen

## Tipps

* **Logo einbinden** — Fügen Sie das Logo Ihrer Organisation in Zertifikatsvorlagen ein, um ein professionelles Erscheinungsbild zu erzielen
* **Mit echten Daten testen** — Zertifikate vor der Bereitstellung der Vorlage mit tatsächlichen Lernendendaten in der Vorschau prüfen
* **Vorlagen einfach halten** — Einfache Designs lassen sich besser drucken und wirken professionell