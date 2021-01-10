# Schritt 5 von 6: Konfigurationseinstellungen

Jede Einstellung dieses Schritts kann nach der Installation über die Seite Chamilo _Administration_ geändert werden, **ausnahme** für die _Encryption Methode_ und die _Portal URL._

_Die Verschlüsselungsmethode_ ist danach kaum zu ändern, da dies eine erneute Generierung neuer Kennwörter für alle Benutzer und das Senden per E-Mail bedeuten würde. Die Standardoption ist immer die sicherste, daher empfehlen wir Ihnen, es zu verlaufen\*\* wie es ist.

_Portal URL_ könnte aktualisiert werden, aber nur über die Konfigurationsdatei, was sich als schwierig erweisen könnte. Bitte wählen Sie diese beiden mit Bedacht aus.

* _Hauptsprache:_ Standardsprache auf Ihrem Portal.
* _Chamilo URL:_ URL Ihres Chamilo-Portals \(lokal: [http://localhost/chamilo](http://localhost/chamilo); remote: [http://www.mydomain.com/chamilo](http://www.mydomain.com/chamilo)\).
* _E-Mail des Admin:_ E-Mail-Adresse des Portaladministrators \(oder Support-Team\)
* _Der Vorname und der Nachname des Admin:_ werden in der Fußzeile als Link zur E-Mail-Adresse des Administrators angezeigt. Sie können dort beliebige Informationen eingeben, wie zum Beispiel “Support team”.
* _Login und Passwort des Admin:_ **WICHTIG** — ermöglicht es Ihnen, sich später als Administrator mit Ihrem Portal zu verbinden. Eine Möglichkeit besteht darin, hier ein globales funktionales Administratorkonto einzurichten \(mit dem Namen “admin”\) und mehrere Personen dieses Konto verwenden zu lassen. Es wird jedoch empfohlen, für jeden Administrator ein personalisierteres Konto zu erstellen \(also sollte dieses erste Konto Ihnen gehören\), um alle von anderen Administratoren durchgeführten Aktionen verfolgen zu können.
* _Der Name von Portal und der Kurznamen der Organisation:_  sind nur in bestimmten visuellen Themen in der oberen linken Ecke der Seite sichtbar \(auf allen Seiten\).
* _Verschlüsselungsmethode:_ Hashing- und kryptographische Funktionen, die verwendet werden, um die Kennwörter der Benutzer in Ihrer Datenbank zu sichern. Wir empfehlen \(und wählen standardmäßig\) das sicherste in Chamilo: SHA1.
* _Self-registration:_ ermöglicht es dem Benutzer, sich allein zu registrieren; setzt auf _No_ für ein privates Portal.
* _Die Selbstregistrierung als Lehrer:_ ermöglicht es dem Benutzer, sich allein als Lehrer zu registrieren; wird nur berücksichtigt, wenn die vorherige Einstellung auf _Yes_ festgelegt ist. Auf diese Weise können sich neue Benutzer als Lehrer registrieren und so neue Kurse erstellen.

**Hinweis**: Der auf diesem Bildschirm definierte Benutzer hat volle Administrationsberechtigungen. Er kann die Einstellungen auf dieser Seite nachträglich aktualisieren.

