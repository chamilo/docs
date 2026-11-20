# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exportiert die Lernenden, die Ihren Kurs bestanden haben, zusammen mit ihrer Notenbuchpunktzahl in die Datei, die eine externe Zertifizierungsstelle importiert: entweder eine Textdatei mit festem Format oder eine Teilnehmerliste als Tabellenkalkulation.

## Den Exportbereich öffnen

Nach der Aktivierung erhält die Symbolleiste des Werkzeugs **Bewertungen** (Notenbuch) Ihres Kurses ein Symbol **Export**. Klicken Sie darauf, um den Bereich **Grading Electronic** auf derselben Seite einzublenden; klicken Sie erneut darauf, um ihn auszublenden.

Der Bereich umfasst drei Felder:

* **Vorschau** — standardmäßig aktiviert. Solange sie aktiviert ist, wird nichts gespeichert: Der Bereich zeigt nur an, was der Export enthalten würde
* **Datumsbereich** — Start- und Enddatum des Kurses. Das Startdatum steht in der Kopfzeile der Textdatei, das Enddatum ist das Datum, an dem die jeweilige lernende Person bestanden hat
* **Kurs-ID** — die Kennung des Kurses bei der Zertifizierungsstelle. Sie ist mit dem Wert des vorherigen Exports vorausgefüllt

## Den Export in der Vorschau anzeigen

Bei aktivierter Option **Vorschau** bietet der Bereich eine einzige Schaltfläche **Vorschau**. Sie listet alle Lernenden des Kurses (oder der Sitzung, in der Sie sich befinden) mit ihrer Punktzahl und dem Status **PASS** oder **SKIP** auf und zeigt den Inhalt der Textdatei. Nur Lernende, die die Bestehenskriterien des Notenbuchs erfüllen, werden mit **PASS** gekennzeichnet; die übrigen werden vom Export ausgeschlossen.

## Die Datei erzeugen

Deaktivieren Sie **Vorschau**, um die Schaltfläche **Vorschau** durch zwei Schaltflächen zu ersetzen:

* **TXT erzeugen** — lädt die Textdatei mit festem Format herunter: eine Kopfzeile mit der Anbieter-ID, der Kurs-ID und dem Startdatum, danach eine Zeile für jede lernende Person, die bestanden hat
* **XLSX erzeugen** — lädt die Teilnehmerliste als Tabellenkalkulation herunter, mit einer Zeile für jede lernende Person, die bestanden hat, und den Spalten **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** und **Comment**

Beide Schaltflächen bewirken neben der Datei dasselbe: Sie speichern die **Kurs-ID** für den nächsten Export und erzeugen, sofern das Notenbuch Zertifikate erstellt, das Zertifikat jeder lernenden Person, die bestanden hat.

## Inhalt der Tabellenkalkulation

* **FireTRAQ ID** — die ID der lernenden Person bei der Zertifizierungsstelle, gelesen aus dem Profilfeld `fcdice_or_acadis_student_id`
* **Score** — die Notenbuchpunktzahl als ganzzahliger Prozentwert (0 bis 100), unabhängig von der Gesamtgewichtung des Notenbuchs
* **Grade** — stets **Pass**, da nur Lernende exportiert werden, die bestanden haben. Die Zelle bietet weiterhin die Optionen **Pass**, **Fail** und **Incomplete**, falls Sie die Datei bearbeiten müssen
* **Date Earned** — das Enddatum des Datumsbereichs
* **Comment** — bleibt leer

## Hinweise

* **Prüfen Sie zuerst die IDs der Lernenden** — Eine lernende Person ohne ID im Profil wird dennoch exportiert, mit leerer **FireTRAQ ID**. Nutzen Sie die Vorschau, um diese Personen vor dem Erzeugen der Datei zu erkennen
* **Die Anbieter-ID und die Kursstunden** stammen aus den Zusatzfeldern des Kurses, die Ihre Administration bei der Installation des Plugins festgelegt hat