# Installationsassistent

Chamilo 2.0 enthält einen webbasierten Installationsassistenten, der Sie durch die Ersteinrichtung führt. Der Assistent startet automatisch, wenn Sie zum ersten Mal auf die Plattform zugreifen.

## Vorbereitung

Stellen Sie sicher, dass die folgenden Voraussetzungen erfüllt sind:

1. Ihr Server erfüllt alle [Serveranforderungen](server-requirements.md).
2. Sie haben eine gepackte Version (zip oder tar.gz) von Chamilo heruntergeladen.
3. Ihr Webserver ist so konfiguriert, dass das Verzeichnis `public/` als Document Root dient.
4. Ihre `.env`-Datei existiert und ist leer (der Assistent wird Sie durch die Datenbankeinrichtung führen).

## Schritt 1: Installationssprache

![Installationsassistent Schritt 1 — Sprachauswahl](/.gitbook/assets/install-step1-language.png)

Im ersten Schritt können Sie die Sprache für den Installationsprozess auswählen. Wählen Sie Ihre bevorzugte Sprache aus dem Dropdown-Menü.

Falls Chamilo eine bestehende Installation erkennt (für ein Upgrade), wird der Migrationsstatus angezeigt und ein Upgrade-Pfad anstelle einer Neuinstallation angeboten.

## Schritt 2: Anforderungsprüfung

![Installationsassistent Schritt 2 — Anforderungsprüfung mit PHP-Version, Erweiterungen und Verzeichnisberechtigungen](/.gitbook/assets/install-step2-requirements.png)

Der Assistent überprüft Ihre Serverumgebung:

* **PHP-Version** ist 8.2 oder höher
* **Erforderliche PHP-Erweiterungen** sind installiert (intl, gd, curl, zip, mbstring, xml, etc.)
* **Empfohlene PHP-Einstellungen** — `date.timezone` ist konfiguriert, angemessene Upload-/Speicherlimits
* **Verzeichnis- und Dateiberechtigungen** — `var/`, `config/` und `public/upload/` sind vom Webserver beschreibbar

Falls Anforderungen nicht erfüllt sind, zeigt der Assistent Warnungen oder Fehler an. Beheben Sie diese, bevor Sie fortfahren.

## Schritt 3: Lizenz

![Installationsassistent Schritt 3 — Lizenzakzeptanz](/.gitbook/assets/install-step3-license.png)

In diesem Schritt wird die GNU/GPLv3-Lizenz angezeigt. Sie müssen das Kontrollkästchen **"Ich akzeptiere"** aktivieren, um fortzufahren.

Optional können Sie den Abschnitt **Kontaktinformationen** erweitern, um Angaben zu Ihrer Organisation (Name, E-Mail, Unternehmen, Land) zu machen. Dies ist freiwillig und hilft der Chamilo-Community zu verstehen, wer die Plattform nutzt, ermöglicht es uns aber auch, Sie *sehr selten* über Veranstaltungen in Ihrer Nähe zu informieren.

## Schritt 4: Datenbankeinstellungen

![Installationsassistent Schritt 4 — Konfiguration der Datenbankverbindung](/.gitbook/assets/install-step4-database.png)

Geben Sie Ihre Datenbankverbindungsdetails ein:

| Feld | Beschreibung |
|-------|-------------|
| **Datenbank-Host** | Der Hostname oder die IP-Adresse Ihres Datenbankservers (z. B. `localhost` oder `127.0.0.1`) |
| **Datenbank-Port** | Standard: 3306 für MySQL/MariaDB |
| **Datenbankname** | Der Name der zu verwendenden Datenbank (nur alphanumerische Zeichen und Unterstriche) |
| **Datenbankbenutzer** | Ein Datenbankbenutzer mit vollen Berechtigungen für die angegebene Datenbank |
| **Datenbankpasswort** | Das Passwort für den Datenbankbenutzer |

Klicken Sie auf **Datenbankverbindung prüfen**, um zu testen. Der Assistent lässt Sie erst weitergehen, wenn die Verbindung erfolgreich ist. Falls die Datenbank bereits existiert, wird eine Warnung angezeigt.

## Schritt 5: Konfigurationseinstellungen

![Installationsassistent Schritt 5 — Administrator-Konto, Portal-Einstellungen und E-Mail-Konfiguration](/.gitbook/assets/install-step5-config.png)

Dieser Schritt kombiniert die Erstellung des Administrator-Kontos, die Portal-Einstellungen und die E-Mail-Konfiguration.

### Administrator-Konto

| Feld | Beschreibung |
|-------|-------------|
| **Login** | Der Benutzername des Administrators |
| **Passwort** | Wählen Sie ein starkes Passwort — dieses Konto hat vollen Zugriff auf die Plattform |
| **Vorname** | Der Vorname des Administrators |
| **Nachname** | Der Nachname des Administrators |
| **E-Mail** | Wird für Systembenachrichtigungen und Passwort-Rücksetzungen verwendet |
| **Telefon** | Optionale Kontaktnummer |

Diese Admin-Details werden von Chamilo auch verwendet, um die Support-Kontaktdaten zu füllen. Stellen Sie sicher, dass Sie diese nach Abschluss der Installation in den Einstellungen neu konfigurieren.

### Portal-Einstellungen

| Feld | Beschreibung |
|-------|-------------|
| **Sprache** | Die Standardsprache der Benutzeroberfläche |
| **Portalname** | Der Name Ihrer Plattform (z. B. "Mein Organisation LMS") |
| **Kurzname des Unternehmens** | Der abgekürzte Name Ihrer Organisation |
| **Unternehmens-URL** | Die Website Ihrer Organisation |
| **Verschlüsselungsmethode** | Passwort-Hashing-Algorithmus — **bcrypt** wird empfohlen |
| **Selbstregistrierung erlauben** | Ja / Nein / Nach Genehmigung |
| **Selbstregistrierung als Trainer erlauben** | Ja / Nein |

### E-Mail-Konfiguration

Im Abschnitt zu den E-Mail-Einstellungen können Sie den Mail-Transport (SMTP, Amazon SES, Mailjet, etc.) konfigurieren und die E-Mail-Zustellung testen. Weitere Informationen finden Sie unter [E-Mail-Konfiguration](email-configuration.md).

Alle diese Einstellungen können später über das Administrationspanel geändert werden.

## Schritt 6: Letzte Überprüfung vor der Installation

![Installationsassistent Schritt 6 — Überprüfung aller Einstellungen vor der Installation](/.gitbook/assets/install-step6-review.png)

In diesem Schritt wird eine Zusammenfassung aller Ihrer Eingaben zur Überprüfung angezeigt:

* Administrator-Zugangsdaten (Passwort ist standardmäßig ausgeblendet — klicken Sie auf das Augensymbol, um es anzuzeigen)
* Portal-Einstellungen
* Datenbankverbindungsdetails

Überprüfen Sie alles sorgfältig und klicken Sie dann auf **Chamilo installieren**, um die Installation auszuführen. Der Assistent erstellt alle Datenbanktabellen, füllt die Ausgangsdaten ein und konfiguriert die Plattform.

## Schritt 7: Installation abgeschlossen

![Installationsassistent Schritt 7 — Abschluss mit Sicherheitshinweisen und Portal-Link](/.gitbook/assets/install-step7-complete.png)

Nach erfolgreichem Abschluss der Installation zeigt der Assistent Folgendes an:

* **Erste Schritte** — Schlägt vor, Ihren ersten Kurs zu erstellen, um die Plattform zu erkunden (als Administrator müssen Sie dies über das Admin-Panel tun)
* **Sicherheitsempfehlungen**:
  * Machen Sie das Verzeichnis `config/` nur lesbar (`chmod 0555`)
  * Löschen Sie das Verzeichnis `public/main/install/`
* Einen **Link zu Ihrem Portal**, um sich mit den gerade erstellten Administrator-Zugangsdaten anzumelden

## Nach der Installation

Nach Abschluss des Assistenten:

* **Entfernen oder beschränken Sie den Zugriff auf den Installer** — Der Assistent sollte nach der Installation nicht mehr zugänglich sein. Chamilo sperrt ihn normalerweise automatisch, überprüfen Sie jedoch, ob ein erneuter Aufruf der Installations-URL zur Anmeldeseite umleitet.
* **E-Mail-Versand konfigurieren** — Siehe [E-Mail-Konfiguration](email-configuration.md).
* **Backups einrichten** — Bevor Sie Inhalte hinzufügen, konfigurieren Sie automatische Datenbank- und Datei-Backups (Chamilo bietet hierfür keine Lösung, aber das Kopieren des `var/`-Ordners und der Datenbank sind die zwei wichtigsten Elemente).
* **Sicherheitseinstellungen überprüfen** — Siehe [Sicherheitseinstellungen](../platform-settings/security-settings.md).

## Fehlerbehebung

| Problem | Lösung |
|---------|--------|
| Leere Seite bei der Installations-URL | Überprüfen Sie die PHP-Fehlerprotokolle. Ändern Sie vorübergehend zu `APP_ENV=dev` in der .env-Datei, um Fehler im Browser anzuzeigen. |
| Datenbankverbindung schlägt fehl | Überprüfen Sie die Zugangsdaten, stellen Sie sicher, dass die Datenbank existiert, und prüfen Sie, ob der Datenbankserver Verbindungen vom Webserver-Host zulässt. |
| Zugriffsverweigerungsfehler | Stellen Sie sicher, dass `var/` vom Webserver-Benutzer beschreibbar ist. |
| Assets werden nicht geladen (kein CSS/JS) | Führen Sie `yarn install && yarn build` aus, um die Frontend-Assets zu kompilieren. |