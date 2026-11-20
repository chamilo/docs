# Ankündigungen

Das Werkzeug Ankündigungen ermöglicht es Ihnen, Nachrichten an alle in Ihrem Kurs eingeschriebenen Lernenden oder an bestimmte Personen oder Gruppen zu senden.

Über Ankündigungen versendete Nachrichten werden den Lernenden sowohl per E-Mail *als auch* in ihren Chamilo-Posteingang zugestellt.

## Eine Ankündigung erstellen

1. Öffnen Sie das Werkzeug **Ankündigungen** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Ankündigungen" data-size="line"> auf der Kursstartseite
2. Klicken Sie erneut auf das Symbol **Ankündigung hinzufügen** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Ankündigungen" data-size="line">
3. Füllen Sie Folgendes aus:
   * **Empfänger** — Wählen Sie aus, wer die Ankündigung erhält:
     * Alle eingeschriebenen Lernenden
     * Bestimmte Lernende
     * Bestimmte Gruppen
   * **Betreff** — Eine Betreffzeile für die Ankündigung
   * **Beschreibung** — Der Nachrichtentext (unterstützt formatierten Text mit Formatierung, Links und Bildern)
   * **Anhang** — Ein optionaler Anhang, der zusammen mit der E-Mail versendet wird
   * **Versandoptionen** — Ankündigungen werden standardmäßig per E-Mail versendet, Sie können jedoch auch (sofern Sie die Berechtigungen besitzen) festlegen, sie über alle Sitzungen zu senden, die diesen Kurs enthalten, eine Kopie an sich selbst zu senden oder diese Ankündigung an ein Kalenderereignis des Kurses anzuhängen.
     * Wenn Sie **Ereignis im Kurskalender hinzufügen** aktivieren, legen Sie das **Startdatum** und das **Enddatum** des Ereignisses fest. Jeder Klick auf **Erinnerung hinzufügen** fügt eine Zeile hinzu, in der Sie festlegen, wie lange vor dem Ereignis die Erinnerung gesendet wird (in Minuten, Stunden oder Tagen). Die Erinnerungen können später durch Bearbeiten des Ereignisses in der Kursagenda geändert werden.
4. Speichern

Die Schaltfläche **Tags** ermöglicht es Ihnen, eine Reihe von Markierungen zu kennzeichnen, die im **Inhalt** der Ankündigung dynamisch ersetzt werden. Diese sind relativ intuitiv, daher überlassen wir es Ihnen, zu erraten, was sie bewirken.

Die Schaltfläche **Vorschau** ist nicht sehr intuitiv: Sie ermöglicht es Ihnen zu sehen, an wen diese Ankündigung gesendet wird. Dies dient als Bestätigung der oben getroffenen Empfängerauswahl.

## Ankündigungen verwalten

* **Bearbeiten** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Bearbeiten" data-size="line"> — Eine bestehende Ankündigung ändern
* **Löschen** <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Löschen" data-size="line"> — Eine Ankündigung entfernen
* **Sichtbarkeit** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Sichtbarkeit" data-size="line"> — Ankündigungen ausblenden oder anzeigen

Ankündigungen werden in umgekehrter chronologischer Reihenfolge angezeigt (neueste zuerst).

## Konfiguration des Massenversands

Administratoren können einen separaten Mail-Transport für den Versand von Kurs- und Plattformankündigungen konfigurieren. Wenn diese Option aktiviert ist, beeinflusst sie, wie Ankündigungs-E-Mails versendet werden; sie ändert weder den Ankündigungseditor noch die Empfängerauswahl oder den normalen Transport, der für einzelne Benachrichtigungen verwendet wird.

Wenn sich die Zustellung zwischen einzelnen Nachrichten und Ankündigungen unterscheidet, bitten Sie einen Plattformadministrator, **Administration > Konfigurationseinstellungen > Mail > DSN für Massenversand** (`mail.mailer_dsn_massmailing`) zu prüfen. Wenn diese optionale Einstellung leer ist, verwenden Ankündigungen den Haupt-E-Mail-Transport. Siehe [PR #9406 zum Massenversand](https://github.com/chamilo/chamilo-lms/pull/9406).

## Tipps

* **Willkommensnachricht** — Erstellen Sie zu Beginn des Kurses eine Ankündigung, um Lernende willkommen zu heißen und eine Orientierung zu bieten
* **E-Mail-Versand nutzen** — Aktivieren Sie bei zeitkritischen Ankündigungen die E-Mail-Option, damit Lernende die Nachricht auch dann erhalten, wenn sie derzeit nicht auf der Plattform angemeldet sind
* **Gezielte Ankündigungen** — Senden Sie bestimmte Ankündigungen an Gruppen oder Einzelpersonen, wenn die Nachricht nicht für die gesamte Klasse relevant ist