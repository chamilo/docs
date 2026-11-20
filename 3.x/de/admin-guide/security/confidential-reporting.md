# Vertrauliche Meldung

Chamilo enthält einen optionalen Workflow für **vertrauliche Meldungen**, mit dem Bedenken zu einer anderen Person an autorisierte Untersuchende übermittelt werden können. Dies ist weder das gewöhnliche Support-Ticket-Werkzeug noch ein öffentliches Diskussionsforum.

## Funktion aktivieren

Öffnen Sie **Administration > Konfigurationseinstellungen > Sicherheit** und konfigurieren Sie:

| Einstellung | Standard | Zweck |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Workflow für vertrauliche Meldungen aktivieren |
| `security.confidential_reporting_min_reporters` | `2` | Mindestanzahl unterschiedlicher meldender Personen (2–10), bevor eine Untersuchung sichtbar wird |
| `security.confidential_reporting_attachments_enabled` | `true` | Beweisanhänge zulassen |
| `security.confidential_reporting_notifications_enabled` | `false` | Interne Hinweise für zulässige Untersuchungen anzeigen (keine E-Mails) |

Die Bereitstellung setzt außerdem voraus, dass die Verschlüsselung für vertrauliche Meldungen und der private Speicher des Servers betriebsbereit sind. Chamilo verwendet die kryptografischen PHP-Sodium-Funktionen und einen privaten Verschlüsselungsschlüssel; **bewahren Sie diesen Schlüssel sicher auf und sichern Sie ihn**. Geht er verloren, können gespeicherte Meldungen unlesbar werden. Kopieren Sie den Schlüssel nicht in ein Git-Repository. Aktivieren Sie die Funktion nicht, bevor Sie geprüft haben, dass die Speicherung des privaten Schlüssels und die erforderlichen Datenbankmigrationen funktionsfähig sind.

## Eine Meldung einreichen

1. Melden Sie sich direkt bei Chamilo an und öffnen Sie **Vertrauliche Meldung** (sofern für das Portal aktiviert).
2. Wählen Sie die betroffene Person, geben Sie einen Betreff ein und beschreiben Sie den Vorfall.
3. Fügen Sie Beweise hinzu, sofern Anhänge aktiviert sind.
4. Entscheiden Sie, ob Untersuchende für diese konkrete Meldung Ihren **Namen und Ihre E-Mail-Adresse** sehen dürfen. Diese Erlaubnis kann später widerrufen werden.
5. Senden Sie die Meldung. Verwenden Sie **Meine vertraulichen Meldungen**, um den Fall zu verfolgen und Nachrichten mit einer untersuchenden Person auszutauschen.

Die Identität der meldenden Person wird **Untersuchenden standardmäßig nicht angezeigt**. Dies ist eine Vertraulichkeitskontrolle, keine Zusicherung absoluter Anonymität gegenüber den Betreibenden des Systems.

## Untersuchungsberechtigungen und Schwellenwerte

Untersuchungen erfordern die spezielle Berechtigung `welfare:investigate` sowie eine geeignete Administrator- oder HR-Rolle. Ein Fall steht erst zur Untersuchung zur Verfügung, wenn die konfigurierte Anzahl **unterschiedlicher meldender Personen** für dasselbe Ziel erreicht wurde. Eine untersuchende Person kann keine Meldung über sich selbst untersuchen. Der HR-Zugriff ist auf die Personen beschränkt, denen die HR-Leitung folgt.

Untersuchende greifen über **Vertrauliche Untersuchungen** auf zulässige Fälle zu, prüfen Beweise und tauschen Nachrichten aus. Fälle unterhalb des Schwellenwerts oder ohne Berechtigung werden über die Untersuchungs-API nicht offengelegt. Die administrative **Identitätsübernahme** gewährt keinen Zugriff auf vertrauliche Meldungen.

## Datenschutz und betrieblicher Umgang

Meldungen und beigefügte Beweise enthalten sensible personenbezogene Daten. Beschränken Sie Untersuchungsberechtigungen, begrenzen Sie den Zugriff auf Sicherungen, legen Sie eine angemessene organisatorische Aufbewahrungsrichtlinie fest und testen Sie den Workflow mit getrennten Konten für meldende Person, Zielperson und untersuchende Person. Vermeiden Sie es, vollständige Meldungen in technische Protokolle oder Issue-Tracker zu kopieren.

Implementierung: [Vertrauliche Meldung #9310](https://github.com/chamilo/chamilo-lms/pull/9310).