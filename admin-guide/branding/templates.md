# Vorlagen

Chamilo verwendet Vorlagen für Zertifikate, Dokumente und E-Mails. Sie können diese Vorlagen anpassen, um sie an das Branding und die Anforderungen Ihrer Organisation anzupassen.

## Zertifikatsvorlagen

Zertifikatsvorlagen definieren das Layout und den Inhalt von Zertifikaten, die Lernenden verliehen werden, die die Schwellenwerte im Notenbuch erreichen.

### Anpassen einer Zertifikatsvorlage

Zertifikatsvorlagen verwenden HTML und CSS mit Platzhaltervariablen:

| Variable | Ersetzt durch |
|----------|---------------|
| Name des Lernenden | Der vollständige Name des Lernenden |
| Kursname | Der Name des Kurses |
| Datum | Das Datum, an dem das Zertifikat erworben wurde |
| Punktzahl | Die endgültige Punktzahl des Lernenden |
| Barcode | Ein Barcode-Platzhalter (`((certificate_barcode))`), der zur Verifizierung verwendet wird |

### Hochladen einer Vorlage

1. Navigieren Sie zur Verwaltung der Zertifikatsvorlagen
2. Laden Sie die HTML-Vorlage hoch oder bearbeiten Sie sie
3. Verwenden Sie die Platzhaltervariablen an den Stellen, an denen dynamische Inhalte erscheinen sollen
4. Speichern

## Dokumentvorlagen

Lehrkräfte können Dokumentvorlagen verwenden, wenn sie Inhalte im Dokumente-Tool erstellen. Vorlagen bieten ein Ausgangslayout für gängige Dokumenttypen.

### Verwaltung von Dokumentvorlagen

1. Navigieren Sie zur Vorlagenverwaltung im Administrationsbereich
2. Fügen Sie neue Vorlagen hinzu, indem Sie HTML-Dateien hochladen
3. Vorlagen stehen Lehrkräften zur Verfügung, wenn sie neue Dokumente erstellen

## Tipps

* **Fügen Sie Ihr Logo hinzu** — Integrieren Sie das Logo Ihrer Organisation in Zertifikatsvorlagen für einen professionellen Look
* **Testen Sie mit echten Daten** — Vorschau von Zertifikaten mit tatsächlichen Lernendendaten, bevor Sie die Vorlage bereitstellen
* **Halten Sie Vorlagen einfach** — Einfache Designs lassen sich besser drucken und wirken professionell