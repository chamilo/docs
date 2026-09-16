# Zertifikate und Kompetenzen

Chamilo ermöglicht es Ihnen, Lernenden, die bestimmte Leistungskriterien erfüllen, Zertifikate zu verleihen und die mit diesen Leistungen verbundenen Kompetenzen zu validieren.

## Funktionsweise von Zertifikaten

Zertifikate sind mit den **Bewertungen** (auch Gradebook genannt) verknüpft. Wenn die Note eines Lernenden den von Ihnen festgelegten Mindestschwellenwert erreicht oder überschreitet, steht ihm ein Zertifikat zum Herunterladen zur Verfügung.

Der Ablauf ist:

1. Richten Sie die [Bewertungen](../assessing-learners/gradebook.md) mit Ihren Übungen, Aufgaben und anderen benoteten Aktivitäten ein
2. Legen Sie eine **Mindestpunktzahl für die Zertifizierung** fest (z. B. 70 %)
3. Wenn ein Lernender diese Punktzahl erreicht, kann er sein Zertifikat herunterladen (entweder direkt im Bewertungs-Tool oder aus einem Lernpfad, wenn Sie den letzten Schritt entsprechend konfiguriert haben). Als Lehrende können Sie außerdem die Aktion **Zertifikate erzeugen** im Gradebook nutzen, um die PDFs stapelweise für alle berechtigten Lernenden zu erstellen.

## Zertifikatsvorlagen

Zertifikate verwenden Vorlagen, die der Plattformadministrator definiert. Die Vorlage enthält in der Regel:

* Den Namen des Lernenden
* Den Kursnamen
* Das Abschlussdatum
* Die erreichte Punktzahl
* Einen QR-Code oder eine URL zur Online-Verifizierung

## Gültigkeit und Ablauf von Zertifikaten

Zertifikate können so eingestellt werden, dass sie nach einer bestimmten Anzahl von Tagen ablaufen. In den Einstellungen der [Bewertungen](../assessing-learners/gradebook.md) für die Stammkategorie erscheint, sobald **Zertifikate erzeugen** aktiviert ist, das Feld **Gültigkeit des Zertifikats (Tage)**. Lassen Sie den Wert auf `0` (Standard), damit Zertifikate nie ablaufen, oder geben Sie eine Anzahl von Tagen an, nach der ein Zertifikat so viele Tage nach der Ausstellung abläuft.

Das individuelle Ablaufdatum jedes Zertifikats wird beim Erzeugen (oder erneuten Erzeugen) automatisch aus dieser Einstellung berechnet — Sie setzen es nicht Zertifikat für Zertifikat. Die Liste **Zertifikate** zeigt für jeden Lernenden eine Spalte **Ablaufdatum**, mit dem Eintrag **Läuft nie ab**, wenn keine Gültigkeitsdauer gilt.

Wenn für die Kategorie keine Gültigkeitsdauer konfiguriert ist, können Sie das Ablaufdatum eines einzelnen Lernenden trotzdem manuell setzen (oder ändern): klicken Sie neben dem Eintrag auf die Schaltfläche mit dem Stift **Ablaufdatum bearbeiten** und wählen Sie ein Datum. Diese Schaltfläche ist nur verfügbar, wenn die Kategorie selbst keine Gültigkeitsdauer hat — sobald eine Gültigkeitsdauer festgelegt ist, werden Ablaufdaten automatisch verwaltet und können nicht mehr Zertifikat für Zertifikat bearbeitet werden.

![Die Zertifikatsliste mit der Spalte Ablaufdatum für drei Lernende](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Lernende an bevorstehenden oder vergangenen Ablauf erinnern

Öffnen Sie die Liste **Zertifikate** für Ihre Bewertung und klicken Sie auf die Schaltfläche **Ablaufende Zertifikate** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Ablaufende Zertifikate" data-size="line">, um zu sehen, welche Zertifikate von Lernenden abgelaufen sind oder bald ablaufen. Die Seite zeigt je Lernendem: das **Ablaufdatum** des Zertifikats, den **Status** (**Abgelaufen** oder **Läuft bald ab**) sowie, wann zuletzt eine Erinnerung dazu **Letzte Erinnerung gesendet** wurde (oder **Nie**). Mit **Tage im Voraus** können Sie festlegen, wie weit in die Zukunft „läuft bald ab“ reicht.

![Die Seite Ablaufende Zertifikate mit einem abgelaufenen und einem bald ablaufenden Zertifikat](/.gitbook/assets/gradebook-certificate-expirations.png)

Um Lernende selbst zu benachrichtigen:

1. Wählen Sie die Lernenden aus, die Sie erinnern möchten (oder alle)
2. Klicken Sie auf **Benachrichtigung senden**
3. Prüfen Sie die Vorschau der E-Mail, die gesendet wird — es werden getrennte Vorschauen für die Formulierungen „läuft bald ab“ und „abgelaufen“ angezeigt, je nachdem, welche der ausgewählten Lernenden in welchen Fall fallen
4. Bestätigen Sie, indem Sie im Dialog erneut auf **Benachrichtigung senden** klicken

![Der Bestätigungsdialog Benachrichtigung senden mit Vorschau der E-Mail-Formulierungen für bald ablaufende und abgelaufene Zertifikate](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Jeder Lernende wird in seiner konfigurierten Sprache benachrichtigt, sowohl per E-Mail als auch durch eine interne Chamilo-Nachricht. Erneutes Senden für dasselbe Zertifikat und dasselbe Ablaufdatum ist unbedenklich — Chamilo merkt sich, was pro Zertifikat bereits gesendet wurde, und sendet einem Lernenden keine doppelten Erinnerungen, es sei denn, Sie senden ausdrücklich erneut.

Administratoren können dieselben Erinnerungen auch automatisch und wiederkehrend planen, ohne dass Lehrende sie manuell auslösen müssen — siehe [Cron-Job-Einstellungen](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Kompetenzen

Kompetenzen (Skills) stehen für Fähigkeiten, die Lernende erwerben. In Chamilo:

* Kompetenzen können mit Gradebook-Leistungen verknüpft werden
* Wenn ein Lernender ein Zertifikat erhält, werden alle zugehörigen Kompetenzen automatisch validiert
* Kompetenzen sammeln sich im Profil des Lernenden und bilden so einen Kompetenznachweis
* Kompetenzen können hierarchisch organisiert werden (z. B. „Datenanalyse“ unter „Forschungsmethoden“)
* Kompetenzen können zusätzlich von Peers bewertet werden (360°-Evaluation)

## Zertifikats- und Kompetenzstatus einsehen

Als Lehrende können Sie sehen:

* Welche Lernenden in Ihrem Kurs Zertifikate erworben haben
* Welche Kompetenzen validiert wurden
* Den Fortschritt der Lernenden in Richtung der Zertifizierungsschwelle
* Welche Zertifikate abgelaufen sind oder bald ablaufen und ob bereits eine Erinnerung dafür versendet wurde

Lernende können ihre eigenen Zertifikate und validierten Kompetenzen in ihrem Profil einsehen und über das Kompetenzrad prüfen, welche Kompetenzen in ihrer Organisation gefragt sind.

## Tipps

* **Klare Erwartungen setzen** — Teilen Sie den Lernenden zu Beginn des Kurses mit, was sie erreichen müssen, um ein Zertifikat zu erwerben
* **Aussagekräftige Kompetenzbezeichnungen verwenden** — Kompetenzen sollten beschreiben, was die Lernenden können, nicht nur den Kursnamen
* **Mit Portfolios kombinieren** — Ermutigen Sie Lernende, ihre Zertifikate ins Portfolio aufzunehmen
* **Zertifikate erweitern** — Bitten Sie Ihre Administration, das Plugin [Custom Certificate](../plugins/custom-certificate.md) zu aktivieren, um noch mehr Möglichkeiten bei der Zertifikatsvorlagengestaltung zu nutzen
* **Gültigkeitsdauer für compliance-orientierte Zertifizierungen festlegen** — Wenn eine Zertifizierung regelmäßig erneuert werden muss (z. B. Sicherheitsschulung), setzen Sie **Certificate validity (days)**, damit Lernende erinnert werden, bevor sie abläuft