# Verschlüsselung ruhender Daten für Benutzerprofilfelder

Chamilo 3.1 kann ausgewählte persönliche Profilfelder optional verschlüsseln, bevor sie in der Datenbank gespeichert werden. Diese erste Implementierung umfasst **Biografie**, **Telefon** und **Adresse**. Die Verschlüsselung ist **standardmäßig deaktiviert** und erfordert einen privaten Verschlüsselungsschlüssel. Sie verschlüsselt nicht alle Benutzerinformationen und ersetzt weder die Sicherheit von Datenträger, Datenbank, Transport noch von Sicherungen.

## Vor dem Aktivieren der Verschlüsselung

Nur eine Plattformadministration mit Serverzugriff sollte die Einführung durchführen. Bestätigen Sie zunächst, dass die Installation die Chamilo-3.1-Migrationen für die Speicherung verschlüsselter Felder enthält, erstellen Sie eine wiederherstellbare Datenbanksicherung und planen Sie eine sichere Sicherung des Verschlüsselungsschlüssels **getrennt von der Datenbank**. Testen Sie Wiederherstellungsverfahren, bevor Sie Produktionsdaten ändern.

Der Schlüssel wird unter `var/data-at-rest/master.key` gespeichert, außerhalb des öffentlichen Web-Stammverzeichnisses. Veröffentlichen Sie ihn niemals, fügen Sie ihn nicht in eine Supportanfrage ein und committen Sie ihn nicht nach Git. Der Verlust des ursprünglichen Schlüssels kann verschlüsselte Daten unlesbar machen. Erzeugen Sie keinen Ersatzschlüssel, wenn bereits Benutzerdaten verschlüsselt sind.

## Schlüssel initialisieren

Führen Sie den Befehl einmal im Vorschaumodus aus:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Wenn gemeldet wird, dass keine verschlüsselten Daten vorhanden sind und der Schlüssel bereitgestellt werden kann, initialisieren Sie ihn ausdrücklich:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Wenn der Befehl einen vorhandenen kompatiblen Schlüssel meldet, wird kein Ersatz vorgenommen. Wenn verschlüsselte Zeilen vorhanden sind, der Schlüssel jedoch fehlt oder nicht übereinstimmt, **stoppen** Sie und stellen Sie den ursprünglichen Schlüssel wieder her.

## Geschützte Felder auswählen

Öffnen Sie **Administration > Einstellungen > Sicherheit** und wählen Sie **Biografie**, **Telefon** und/oder **Adresse** in der Einstellung für verschlüsselte Benutzerfelder aus. Wählen Sie nur die Felder aus, die Sie schützen möchten. Neue Schreibvorgänge in ausgewählte Felder verwenden authentifizierte Verschlüsselung (libsodium XChaCha20-Poly1305); ältere Klartext-Datensätze bleiben lesbar, bis sie ausdrücklich nachträglich verschlüsselt werden.

## Vorhandene Daten prüfen und nachträglich verschlüsseln

Die Befehle zur nachträglichen Verschlüsselung ändern Datensätze nicht ohne `--apply`. Bevorzugen Sie einen einzelnen QA-Benutzer vor einem größeren Stapel:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Nachdem Sie die Verfügbarkeit des Schlüssels, die Feldauswahl, die Sicherungen und das QA-Konto überprüft haben, führen Sie einen gezielten Pilotlauf aus:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Ersetzen Sie `102` durch eine tatsächliche Testbenutzer-ID. Verwenden Sie bei größeren Datenmengen das optionale Argument `--batch-size` (1–500), prüfen Sie die Befehlsausgabe und das Anwendungsverhalten und planen Sie Stapel während eines Wartungsfensters. Führen Sie keine nachträgliche Verschlüsselung der gesamten Datenbank ohne eine getestete Rollback-Strategie durch.

## Betriebliche Einschränkungen

- Dies ist die erste Phase der Verschlüsselung auf Feldebene, keine vollständige Datenbankverschlüsselung.
- Ältere direkte SQL-Integrationen und Exporte können verschlüsselte Werte möglicherweise nicht lesen; überprüfen Sie sie vor der Einführung.
- Eine Datenbanksicherung **ohne** einen entsprechenden wiederherstellbaren Schlüssel ist unzureichend.
- Protokollieren Sie keine Rohinhalte von Feldern und nehmen Sie kein Schlüsselmaterial in Diagnosen auf.
- Das alleinige Zurücksetzen des Anwendungscodes entschlüsselt gespeicherte Werte nicht.

Siehe [Sicherheitseinstellungen](../platform-settings/security-settings.md) für allgemeine Sicherheitsoptionen der Plattform. Implementierung: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).