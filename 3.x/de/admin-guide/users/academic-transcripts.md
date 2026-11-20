# Akademische Leistungsnachweise

Chamilo kann aus den abgeschlossenen, zertifizierten Kursen einer lernenden Person einen **inoffiziellen akademischen Leistungsnachweis** erstellen und autorisiertem Personal ermöglichen, einen **offiziellen unterzeichneten Leistungsnachweis** auszustellen. Diese Funktion unterscheidet sich von einem einzelnen Kurszertifikat oder dessen optionaler Verifizierung im Sepolia-Testnetz.

## Funktion aktivieren

Aktivieren Sie unter **Administration > Konfigurationseinstellungen > Zertifikate** die Option **Akademische Leistungsnachweise** (`certificate.transcript_enabled`). Sie ist standardmäßig deaktiviert. Prüfen Sie die zusätzlichen Einstellungen zu Programm, Notenskala, Kursstunden, Matrikelnummer, Adresse und Unterzeichner in [Zertifikatseinstellungen](../platform-settings/certificate-settings.md#transcript_enabled).

Der Leistungsnachweis verwendet Zertifikate, die von der **Stammkategorie des Notenbuchs** berechtigter Kurse und Sitzungen erzeugt wurden. Er enthält nur Kurse innerhalb der aktuellen Zugriffs-URL, für die die lernende Person noch eingeschrieben ist. Ein Kurs ohne berechtigtes Zertifikat trägt keine Zeile bei.

Die angezeigte Endnote ist ein Durchschnitt der aufgeführten prozentualen Kurspunktzahlen; der GPA ist der ungewichtete Durchschnitt der zugeordneten Notenpunkte. Beide hängen von den Kursen ab, die zum Zeitpunkt der Ansicht oder der Ausstellung enthalten sind.

## Spalten des Leistungsnachweises

| Spalte | Inhalt |
|--------|---------|
| **Kurs** | Der Kurscode oder der Abteilungsname des Kurses (`transcript_course_code_source`) |
| **Beschreibung** | Der Kurstitel und der Sitzungstitel bei einem Kurs, der in einer Sitzung absolviert wurde |
| **Einschreibung** | Der Zeitpunkt, zu dem sich die lernende Person für den Kurs oder die Sitzung eingeschrieben hat |
| **Erforderliche Stunden** | Der Wert des Kurs-Zusatzfelds, das in `transcript_hours_extra_field` festgelegt ist, oder die Kursdauer |
| **Abschlussdatum** | Das Datum des Zertifikats |
| **Absolvierte Stunden** | Die Zeit, die die lernende Person im Kurs verbracht hat, oder die erforderlichen Stunden, wenn `transcript_completed_hours_are_required_hours` aktiviert ist |
| **Endnote** | Die Punktzahl des Zertifikats |
| **Note** | Der Buchstabe von `transcript_grading_scale`, der dieser Punktzahl entspricht |

## Auf den Leistungsnachweis einer lernenden Person zugreifen

1. Gehen Sie zu **Administration > Benutzer > Benutzerliste** und suchen Sie die lernende Person. Eine Aktion **Leistungsnachweis** steht autorisierten Administratoren und Sitzungsadministratoren zur Verfügung, wenn die Funktion aktiviert ist.
2. Alternativ verwenden Sie die Aktion **Leistungsnachweis** auf der Detailseite der globalen Berichterstattung einer berechtigten lernenden Person.
3. Prüfen Sie Kursliste, Noten, Daten, Stunden, Endnote und GPA der lernenden Person.
4. Wählen Sie **Inoffiziellen Leistungsnachweis herunterladen**, um ein PDF aus den aktuellen Datensätzen der lernenden Person zu erstellen.

Die Seite des Leistungsnachweises ist außerdem direkt unter `/transcript?userId=<user-id>` für Personen verfügbar, die berechtigt sind, auf die Datensätze dieser lernenden Person zuzugreifen. Betrachten Sie die Kenntnis der URL oder der Benutzer-ID nicht als Berechtigung: Der Zugriff wird serverseitig geprüft.

Eine lernende Person kann den **eigenen** Leistungsnachweis ansehen, aber keinen offiziellen ausstellen oder widerrufen. Autorisierte Aussteller sind:

* Plattform-/Portaladministratoren, die innerhalb ihres verwalteten Bereichs für Benutzer und Zugriffs-URLs handeln.
* HR-Manager für Lernende, die sie betreuen.
* Sitzungsadministratoren für Lernende, die in einer von ihnen verwalteten Sitzung registriert sind.

Diese Berechtigungen werden je lernender Person geprüft; eine Mitarbeiterrolle allein gewährt keinen Zugriff auf jeden Leistungsnachweis.

![Der Leistungsnachweis einer lernenden Person aus Sicht eines Administrators, mit den Kursen, der Endnote, dem GPA und der Notenskala, der Liste der offiziellen Leistungsnachweise und dem Signaturbildblock](../../.gitbook/assets/admin-transcript-user.png)

## Einen offiziellen Leistungsnachweis ausstellen und verifizieren

1. Prüfen Sie auf der Seite des Leistungsnachweises einer autorisierten lernenden Person die aktuell angezeigten Kurse, Noten und persönlichen Angaben.
2. Wählen Sie **Offiziellen Leistungsnachweis ausstellen** und bestätigen Sie. Chamilo speichert eine signierte Momentaufnahme der Informationen zu diesem Zeitpunkt.
3. Der neue Eintrag erscheint unter **Offizielle Leistungsnachweise** mit Ausstellungsdatum und Aussteller.
4. Verwenden Sie **Herunterladen** für das offizielle PDF oder **Verifizieren**, um die öffentliche Verifizierungsseite zu öffnen.
5. Bei Bedarf kann ein autorisierter Aussteller diesen offiziellen Leistungsnachweis **Widerrufen**. Die Verifizierungsseite meldet dann, dass er widerrufen wurde.

Jeder ausgestellte Leistungsnachweis wird separat gespeichert: Das Ausstellen einer neueren Version schreibt einen früheren signierten Datensatz nicht stillschweigend um. Verifizierungslinks folgen `/transcripts/verify/<token>` und stellen außerdem eine `.json`-Antwort bereit. Wer über den Verifizierungslink verfügt, kann die Gültigkeit ohne Anmeldung prüfen; halten Sie diese Links angemessen unter Kontrolle, da eine gültige Verifizierung Details des signierten Leistungsnachweises offenlegt. Ungültige oder widerrufene Datensätze werden nicht als gültige Dokumente dargestellt.

![Die öffentliche Verifizierungsseite eines gültigen offiziellen Leistungsnachweises mit seinen Angaben und Kursen](../../.gitbook/assets/admin-transcript-verification.png)

Ein offizieller Leistungsnachweis wird von Chamilo mit dem Signaturschlüssel der Einrichtung digital signiert. **Es handelt sich nicht um eine Blockchain-Transaktion**; die Sepolia-Funktion dokumentiert einen separaten Prozess für Zertifikatsnachweise des Notenbuchs.

## Signaturbild und Angaben zur unterzeichnenden Person

Ein Plattformadministrator kann im Abschnitt **Signatur offizieller Transcripts** auf der Transcript-Seite eines Lernenden ein Signaturbild im Format **PNG oder JPEG** hochladen. Das Bild gehört zur aktuellen Zugriffs-URL und wird in offiziellen PDFs verwendet. Name und Funktion der unterzeichnenden Person stammen aus `certificate.transcript_signatory_name` und `certificate.transcript_signatory_title`.

Nur Plattformadministratoren verwalten das Signaturbild; andere berechtigte Aussteller von Transcripts erhalten diese Berechtigung nicht automatisch. Schützen Sie die Signaturschlüssel der Einrichtung und den privaten Speicher für Signaturbilder im Rahmen der Sicherungs- und Zugriffskontrollverfahren des Portals. Beide werden außerhalb des öffentlichen Webordners in `var/certificate-issuer/` aufbewahrt, zusammen mit dem Schlüssel, der auch die Zertifikatsnachweise des Gradebooks signiert: Nehmen Sie diesen Ordner in Ihre [Sicherungen](../maintenance/backups.md) auf, andernfalls lassen sich bereits ausgestellte Transcripts und Nachweise nicht mehr verifizieren.

## Fehlerbehebung

* **Fehlender Transcript-Link:** Prüfen Sie `certificate.transcript_enabled` und den Geltungsbereich des aktuellen Benutzers.
* **Keine abgeschlossenen Kurse:** Der Lernende benötigt ein qualifizierendes Zertifikat des Stamm-Gradebooks sowie eine passende aktuelle Kurs-/Sitzungseinschreibung unter dieser Zugriffs-URL.
* **Falsche Matrikelnummer, Stunden, Notenbuchstaben oder Programmbezeichnung:** Überprüfen Sie die jeweiligen Einstellungen `certificate.transcript_*`, bevor Sie ein offizielles Transcript ausstellen.
* **Die Verifizierung meldet ein widerrufenes oder ungültiges Ergebnis:** Verwenden Sie den Datensatz nicht erneut als Nachweis eines aktuellen offiziellen Transcripts; berechtigte Mitarbeitende können bei Bedarf ein neues ausstellen.

Siehe auch [Zertifikate und Kompetenzen](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) und [Mein Transcript](../../student-guide/account-and-security/my-transcript.md).