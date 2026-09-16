# Benutzer verwalten

Diese Seite behandelt die alltäglichen Aufgaben zum Anlegen, Bearbeiten und Verwalten von Benutzerkonten.

## Benutzerliste

![Die Benutzerliste mit Konten und den Spalten Name, E-Mail, Rolle und Status](/.gitbook/assets/admin-user-list.png)

Klicken Sie im Administrationsbereich auf **Benutzerliste**, um alle Benutzer der Plattform anzuzeigen. Die Liste zeigt:

* Avatar
* Name
* Benutzername
* E-Mail-Adresse
* Rollen
* Aktiv-/Inaktiv-Status
* Registrierungsdatum
* Datum der letzten Anmeldung

Verwenden Sie das Werkzeug **Erweiterte Suche**, um bestimmte Benutzer nach Name, E-Mail, Rolle oder anderen Kriterien zu finden.

## Einen Benutzer anlegen

![Das Formular zum Anlegen eines Benutzers mit Feldern für Name, E-Mail, Benutzername, Passwort, Rolle und Sprache](/.gitbook/assets/admin-user-create-form.png)

1. Klicken Sie im Administrationsbereich auf **Benutzer hinzufügen**
2. Füllen Sie die Pflichtfelder aus:
   * **Vorname** und **Nachname**
   * **E-Mail** — Muss auf der Plattform eindeutig sein
   * **Benutzername** — Der Anmeldename (muss eindeutig sein)
   * **Passwort** — Legen Sie ein Anfangspasswort fest
   * **Rollen** — Wählen Sie die Plattformrolle(n) des Benutzers (Student, Lehrer, Admin usw.)
   * **Sprache** — Die bevorzugte Oberflächensprache des Benutzers
3. Optional weitere Felder ausfüllen:
   * Offizieller Code (z. B. eindeutige ID in der Organisation)
   * Telefonnummer
   * Ablaufdatum — Das Konto nach einem Datum automatisch deaktivieren
   * Aktiv-/Inaktiv-Status
   * Extra-Profilfelder (falls konfiguriert)
4. Speichern

## Benutzer importieren

![Die Benutzerimport-Oberfläche zum Hochladen von CSV- oder XML-Dateien mit Benutzerdaten](/.gitbook/assets/admin-user-import.png)

Für die Massenerstellung von Benutzern können Sie Benutzer aus einer Datei importieren:

1. Klicken Sie im Administrationsbereich auf **Benutzer importieren**
2. Laden Sie eine **CSV**- oder **XML**-Datei mit Benutzerdaten hoch
3. Ordnen Sie die Dateispalten den Chamilo-Benutzerfeldern zu
4. Wählen Sie, wie mit vorhandenen Benutzern verfahren werden soll (aktualisieren oder überspringen)
5. Importieren

Die Importdatei sollte mindestens Spalten für Vorname, Nachname, E-Mail, Benutzername und Passwort enthalten.

Hinweis: Die Spalte **Status** ist der ältere Name für **Rolle** und akzeptiert nur wenige Werte, z. B. 1 für Lehrer, 5 für Student. Eine feinere Abstimmung der Rollen kann später nur manuell durch Bearbeitung des Benutzers erfolgen.

## Benutzer exportieren

Klicken Sie auf **Benutzer exportieren**, um die Benutzerliste als CSV- oder XML-Datei herunterzuladen. Sie können filtern, welche Benutzer nach Rolle, Registrierungsdatum oder anderen Kriterien exportiert werden.

## Einen Benutzer bearbeiten

Klicken Sie in der Benutzerliste auf den Namen eines Benutzers, um dessen Konto zu bearbeiten. Sie können ändern:

* Persönliche Angaben (Name, E-Mail, Telefon)
* Rollen
* Passwort (zurücksetzen)
* Aktiv-/Inaktiv-Status
* Ablaufdatum
* Extra-Profilfelder

## Einen Benutzer löschen

Beim Löschen von Benutzern (in der Regel Lehrern), die Inhalte auf der Plattform erstellt haben, kann das System Sie daran hindern, die Benutzer dauerhaft zu löschen, und eine Warnmeldung anzeigen, dass der Benutzer noch mit einigen Ressourcen verknüpft ist. Wenn Sie das Löschen bestätigen, löscht das System die Inhalte selbst nicht, sondern hängt sie aus Gründen der Datenkonsistenz an einen neutralen Benutzer an (wir nennen ihn den „Fallback-Benutzer“).

Um dies zu vermeiden, prüfen Sie die Benutzerdetails, löschen Sie jeden ihrer Kurse einzeln und löschen Sie anschließend den Benutzer.

## Benutzeraktionen

| Aktion | Beschreibung |
|--------|-------------|
| **Deaktivieren** | Deaktiviert das Konto eines Benutzers, ohne es zu löschen. Der Benutzer kann sich nicht anmelden, seine Daten bleiben erhalten. |
| **Aktivieren** | Aktiviert ein zuvor deaktiviertes Konto wieder. |
| **Anmelden als** | Meldet sich als dieser Benutzer an der Plattform an (Impersonation). Nützlich zur Fehlerbehebung. |
| **Anonymisieren** | Löscht alle personenbezogenen Daten des Kontos, wie in der DSGVO der EU definiert. |
| **Löschen** | Weiches Löschen des Benutzerkontos. Verwenden Sie den Reiter **Gelöschte Benutzer**, um das Konto und zugehörige Daten dauerhaft zu löschen. |

> **Anmelden als** ist eine mächtige Funktion. Nutzen Sie sie verantwortungsvoll und nur für legitime Supportzwecke.

## Stapeloperationen

Wählen Sie in der Benutzerliste mehrere Benutzer aus, um Stapelaktionen auszuführen:

* Mehrere Benutzer gleichzeitig aktivieren oder deaktivieren
* Mehrere Benutzer löschen
* Benutzer einem Kurs oder einer Session zuweisen

## Tipps

* **CSV-Import für große Einschreibungen nutzen** — Wenn Sie zu Beginn eines Schulungsprogramms viele Benutzer onboarden, bereiten Sie eine CSV-Datei vor und importieren Sie im Stapel
* **Ablaufdaten setzen** — Für temporäre Benutzer (Workshop-Teilnehmer, Testbenutzer) setzen Sie ein Ablaufdatum, um ihre Konten automatisch zu deaktivieren
* **Lieber deaktivieren als löschen** — Wenn ein Benutzer die Plattform verlässt, deaktivieren Sie das Konto zuerst. So bleiben die Schulungsnachweise erhalten. Löschen Sie nur, wenn Sie sicher sind, dass die Daten nicht mehr benötigt werden.