# Benutzerverwaltung

Diese Seite behandelt die täglichen Aufgaben der Erstellung, Bearbeitung und Verwaltung von Benutzerkonten.

## Benutzerliste

![Die Benutzerliste mit Spalten für Name, E-Mail, Rolle und Status](/.gitbook/assets/admin-user-list.png)

Klicken Sie im Verwaltungsbereich auf **Benutzerliste**, um alle Benutzer der Plattform anzuzeigen. Die Liste zeigt:

* Avatar
* Name
* Benutzername
* E-Mail-Adresse
* Rollen
* Aktiv/Inaktiv-Status
* Registrierungsdatum
* Datum des letzten Logins

Verwenden Sie das Werkzeug **Erweiterte Suche**, um bestimmte Benutzer nach Name, E-Mail, Rolle oder anderen Kriterien zu finden.

## Benutzer erstellen

![Das Benutzererstellungsformular mit Feldern für Name, E-Mail, Benutzername, Passwort, Rolle und Sprache](/.gitbook/assets/admin-user-create-form.png)

1. Klicken Sie im Verwaltungsbereich auf **Benutzer hinzufügen**
2. Füllen Sie die erforderlichen Felder aus:
   * **Vorname** und **Nachname**
   * **E-Mail** — Muss auf der Plattform eindeutig sein
   * **Benutzername** — Der Anmeldename (muss eindeutig sein)
   * **Passwort** — Legen Sie ein anfängliches Passwort fest
   * **Rollen** — Wählen Sie die Plattformrolle(n) des Benutzers (Student, Lehrer, Admin usw.)
   * **Sprache** — Die bevorzugte Benutzeroberflächensprache des Benutzers
3. Füllen Sie optional zusätzliche Felder aus:
   * Offizieller Code (z. B. eindeutige ID in der Organisation)
   * Telefonnummer
   * Ablaufdatum — Automatische Deaktivierung des Kontos nach einem Datum
   * Aktiv/Inaktiv-Status
   * Zusätzliche Profilfelder (falls konfiguriert)
4. Speichern

## Benutzer importieren

![Die Benutzerimportoberfläche zum Hochladen von CSV- oder XML-Dateien mit Benutzerdaten](/.gitbook/assets/admin-user-import.png)

Für die Massenerstellung von Benutzern können Sie Benutzer aus einer Datei importieren:

1. Klicken Sie im Verwaltungsbereich auf **Benutzer importieren**
2. Laden Sie eine **CSV**- oder **XML**-Datei mit Benutzerdaten hoch
3. Ordnen Sie die Dateispalten den Chamilo-Benutzerfeldern zu
4. Wählen Sie, wie mit bestehenden Benutzern umgegangen werden soll (aktualisieren oder überspringen)
5. Importieren

Die Importdatei sollte mindestens Spalten für Vorname, Nachname, E-Mail, Benutzername und Passwort enthalten.

Hinweis: Die Spalte **Status** ist der veraltete Name für **Rolle** und akzeptiert nur wenige Werte, wie 1 für Lehrer, 5 für Student. Eine weitere Feinabstimmung der Rollen kann später nur manuell durch Bearbeitung des Benutzers erfolgen.

## Benutzer exportieren

Klicken Sie auf **Benutzer exportieren**, um die Benutzerliste als CSV- oder XML-Datei herunterzuladen. Sie können filtern, welche Benutzer exportiert werden sollen, nach Rolle, Registrierungsdatum oder anderen Kriterien.

## Benutzer bearbeiten

Klicken Sie in der Benutzerliste auf den Namen eines Benutzers, um dessen Konto zu bearbeiten. Sie können Folgendes ändern:

* Persönliche Informationen (Name, E-Mail, Telefon)
* Rollen
* Passwort (zurücksetzen)
* Aktiv/Inaktiv-Status
* Ablaufdatum
* Zusätzliche Profilfelder

## Benutzer löschen

Wenn Sie Benutzer (meistens Lehrer) löschen, die Inhalte auf der Plattform erstellt haben, kann es sein, dass das System Sie daran hindert, die Benutzer dauerhaft zu löschen, und eine Warnmeldung anzeigt, die erklärt, dass der Benutzer noch mit einigen Ressourcen verknüpft ist. Wenn Sie die Löschung bestätigen, löscht das System die Inhalte nicht, sondern weist sie aus Gründen der Datenkonsistenz einem neutralen Benutzer (wir nennen ihn den "Fallback-Benutzer") zu.

Um dies zu vermeiden, überprüfen Sie die Benutzerdetails, löschen Sie jeden ihrer Kurse einzeln und löschen Sie dann den Benutzer.

## Benutzeraktionen

| Aktion | Beschreibung |
|--------|--------------|
| **Deaktivieren** | Deaktivieren Sie ein Benutzerkonto, ohne es zu löschen. Der Benutzer kann sich nicht einloggen, aber seine Daten bleiben erhalten. |
| **Aktivieren** | Aktivieren Sie ein zuvor deaktiviertes Konto wieder. |
| **Als Benutzer einloggen** | Melden Sie sich als dieser Benutzer auf der Plattform an (Impersonation). Nützlich zur Fehlerbehebung. |
| **Anonymisieren** | Löschen Sie alle persönlichen Informationen des Kontos, wie von der DSGVO der EU definiert. |
| **Löschen** | Führen Sie einen Soft-Delete des Benutzerkontos durch. Verwenden Sie den Reiter **Gelöschte Benutzer**, um das Konto und die zugehörigen Daten dauerhaft zu löschen. |

> **Als Benutzer einloggen** ist eine mächtige Funktion. Verwenden Sie sie verantwortungsbewusst und nur für legitime Supportzwecke.

## Stapeloperationen

Wählen Sie mehrere Benutzer in der Benutzerliste aus, um Stapelaktionen durchzuführen:

* Mehrere Benutzer gleichzeitig aktivieren oder deaktivieren
* Mehrere Benutzer löschen
* Benutzer einem Kurs oder einer Sitzung zuweisen

## Tipps

* **Verwenden Sie den CSV-Import für große Einschreibungen** — Wenn Sie viele Benutzer zu Beginn eines Schulungsprogramms onboarden, bereiten Sie eine CSV-Datei vor und importieren Sie sie in einem Schritt
* **Legen Sie Ablaufdaten fest** — Für temporäre Benutzer (Workshop-Teilnehmer, Testbenutzer) setzen Sie ein Ablaufdatum, um ihre Konten automatisch zu deaktivieren
* **Deaktivieren statt löschen** — Wenn ein Benutzer geht, deaktivieren Sie zunächst sein Konto. Dies bewahrt seine Schulungsdaten. Löschen Sie nur, wenn Sie sicher sind, dass die Daten nicht mehr benötigt werden.