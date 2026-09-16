# Zwei-Faktor-Authentifizierung

Die Zwei-Faktor-Authentifizierung (2FA) fügt dem Anmelden einen zweiten Schritt hinzu — einen 6-stelligen Code aus einer App auf Ihrem Telefon, zusätzlich zu Ihrem Passwort —, sodass die Kenntnis Ihres Passworts allein nicht ausreicht, um auf Ihr Konto zuzugreifen.

Diese Funktion erscheint nur, wenn Ihr Administrator sie plattformweit aktiviert hat. Wenn Sie sie auf Ihrer Kontoseite nicht sehen, wurde sie für Ihre Plattform nicht eingeschaltet.

## 2FA aktivieren

1. Öffnen Sie Ihr **Avatar-Menü** und klicken Sie auf **Mein Profil**.
2. Klicken Sie auf **Passwort ändern**.
3. Geben Sie Ihr **aktuelles Passwort** ein, aktivieren Sie das Kontrollkästchen **Zwei-Faktor-Authentifizierung (2FA) aktivieren** und klicken Sie auf **Einstellungen aktualisieren**.
4. Die Seite wird mit einem QR-Code und der Meldung „Scannen Sie den QR-Code, um 2FA zu aktivieren.“ neu geladen. Scannen Sie ihn mit einer Authenticator-App auf Ihrem Telefon (jede TOTP-kompatible App funktioniert, z. B. Google Authenticator, Microsoft Authenticator oder Authy).

![Das Formular „Passwort ändern“ nach dem Absenden, mit dem zu scannenden QR-Code und dem Feld für den 2FA-Code](/.gitbook/assets/student-2fa-qr-code.png)

5. Geben Sie erneut Ihr aktuelles Passwort sowie den 6-stelligen Code, den Ihre App jetzt anzeigt, in das Feld **2FA-Code** ein und klicken Sie erneut auf **Einstellungen aktualisieren**. Sie sehen eine Bestätigung, dass 2FA aktiviert wurde.

Das bloße Aktivieren des Kontrollkästchens zeigt den QR-Code nicht an — Sie sehen ihn erst nach diesem ersten Absenden, und die Passwortfelder werden bei jedem Neuladen der Seite geleert, sodass Sie Ihr aktuelles Passwort auch bei diesem zweiten Absenden erneut eingeben müssen.

## Anmelden mit aktivierter 2FA

Nachdem Sie wie gewohnt Ihren Benutzernamen und Ihr Passwort eingegeben haben, zeigt das Anmeldeformular auf demselben Bildschirm ein zusätzliches Feld **2FA-Code** — geben Sie den aktuellen 6-stelligen Code aus Ihrer Authenticator-App ein und senden Sie ab (die Schaltfläche lautet an diesem Punkt **Code absenden** statt **Anmelden**).

## Wenn Sie den Zugriff auf Ihre Authenticator-App verlieren

Chamilo erzeugt keine Backup- oder Wiederherstellungscodes für 2FA. Wenn Sie das Gerät mit Ihrer Authenticator-App verlieren, können Sie selbst keinen gültigen Code erzeugen — wenden Sie sich an Ihren Plattformadministrator, der 2FA für Ihr Konto deaktivieren kann, damit Sie sich wieder anmelden und es bei Bedarf auf einem neuen Gerät einrichten können.

## 2FA deaktivieren

Gehen Sie zurück zu **Passwort ändern**, deaktivieren Sie **Zwei-Faktor-Authentifizierung (2FA) aktivieren**, geben Sie Ihr aktuelles Passwort ein und senden Sie ab.

## Tipps

* **Richten Sie es ein, bevor Sie es brauchen** — das Aktivieren von 2FA dauert eine Minute und schützt Ihr Konto spürbar.
* **Halten Sie Ihre Authenticator-App zugänglich** — wenn Sie sie verlieren, sind Sie auf Ihren Administrator angewiesen, um wieder hineinzukommen, da es keine Backup-Codes gibt.
* **Teilen Sie Ihre 2FA-Codes nicht** — jeder mit Ihrem Passwort und einem gültigen Code kann sich als Sie anmelden.