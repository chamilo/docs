# E-Mail-Einstellungen

Wie ausgehende E-Mails aufgebaut werden — Absenderidentität, Layout, Signatur und Adressen für besondere Zwecke.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Mail**. Diese Kategorie enthält **17 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Settings-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor_for_anonymous`

**E-Mail-Editor für anonyme Nutzer**

Erlaubt anonymen Nutzern, E-Mails von der Plattform zu versenden. Angesichts der heutigen Informationssicherheit ist dies keine empfohlene Option.

*Standard: `true`*


### `cron_notification_help_desk`

**E-Mail-Adressen für Berichte zur Ausführung von Cronjobs**

Angegeben als Array von E-Mail-Adressen. Funktioniert noch nicht für alle Cronjobs.

### `mail_content_style`

**Zusätzliche HTML-Body-Attribute für E-Mails**

Zusätzliche HTML-Attribute, die auf das Body-Tag der erzeugten Benachrichtigungs-E-Mails angewendet werden.

### `mail_header_style`

**Zusätzliche HTML-Header-Attribute für E-Mails**

Zusätzliche HTML-Attribute, die auf den Header-Bereich der erzeugten Benachrichtigungs-E-Mails angewendet werden.

### `mailer_debug_enable`

**Mail: Debug**

Wählen Sie, ob die Debug-Protokolle für den E-Mail-Versand aktiviert werden sollen. Diese liefern mehr Informationen darüber, was beim Verbinden mit dem Mail-Dienst geschieht, sind jedoch nicht elegant und können das Seitendesign stören. Nur verwenden, wenn keine Nutzeraktivität stattfindet.

*Standard: `false`*


### `mailer_dkim`

**Mail: DKIM-Header**

Geben Sie ein JSON-Array Ihrer DKIM-Konfigurationseinstellungen ein (siehe Beispiel).

### `mailer_dsn`

**Mail-DSN**

Der DSN enthält vollständig alle Parameter, die zum Verbinden mit dem Mail-Dienst erforderlich sind. Weitere Informationen finden Sie unter https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Hier einige Beispiele unterstützter DSN-Syntaxen: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Für Microsoft 365, wo SMTP mit Basisauthentifizierung ausläuft, senden Sie stattdessen über die Microsoft Graph API mit `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-kodieren Sie Sonderzeichen im Client Secret). Dies erfordert eine Entra-ID-Anwendungsregistrierung mit der Anwendungsberechtigung `Mail.Send` — siehe [E-Mail-Konfiguration](../installation/email-configuration.md).

*Standard: `null://null`*


### `mailer_exclude_json`

**Mail: LD+JSON vermeiden**

Einige E-Mail-Clients verstehen das beschreibende LD+JSON-Format nicht und zeigen es dem Endnutzer als lose JSON-Zeichenkette an. Falls dies bei Ihnen der Fall ist, können Sie die nachstehende Variable auf 'false' setzen, um diesen Header zu deaktivieren.

*Standard: `false`*


### `mailer_from_email`

**Alle E-Mails von dieser E-Mail-Adresse senden**

Setzt die Standard-E-Mail-Adresse, die im Feld „Von“ der E-Mails verwendet wird.

### `mailer_from_name`

**Alle E-Mails als von diesem (organisatorischen) Namen stammend senden**

Setzt den Standard-Anzeigenamen für den Versand von Plattform-E-Mails. z. B. „Support-Team“.

### `mailer_mails_charset`

**Mail: Zeichensatz**

Falls Sie den beim Versand dieser E-Mails zu verwendenden Zeichensatz festlegen müssen. Leer lassen, wenn Sie unsicher sind.

*Standard: `UTF-8`*


### `messages_hide_mail_content`

**E-Mail-Inhalt ausblenden, um Nutzer auf die Plattform zu führen**

Kurze E-Mail-Versionen mit einem Link zum Nachrichtenbereich auf der Plattform bevorzugen, um die plattformbasierte Nutzung zu steigern.

*Standard: `false`*


### `notifications_extended_footer_message`

**Erweiterte Fußzeile für Benachrichtigungen**

Eine benutzerdefinierte zusätzliche Fußzeile für Benachrichtigungs-E-Mails für eine bestimmte Sprache hinzufügen, beispielsweise für Hinweise zur Datenschutzrichtlinie. Mehrere Sprachen und Absätze können hinzugefügt werden.

### `send_notification_score_in_percentage`

**Punktzahl in Prozent in der Testergebnis-Benachrichtigung senden**

Sendet Übungspunktzahlen als Prozentsätze statt als Punkte in den E-Mails zur Testergebnis-Benachrichtigung.

*Standard: `false`*


### `send_two_inscription_confirmation_mail`

**2 Registrierungs-E-Mails senden**

Beim Registrieren zwei getrennte E-Mails senden. Eine für den Benutzernamen, eine weitere für das Passwort.

*Standard: `false`*


### `show_user_email_in_notification`

**E-Mail-Adresse des Absenders in Benachrichtigungen anzeigen**

Fügt die E-Mail-Adresse des Absenders zusammen mit dem Namen in persönlichen Nachrichten und Benachrichtigungs-E-Mails hinzu.

*Standard: `false`*


### `update_users_email_to_dummy_except_admins`

**E-Mail-Adressen von Nutzern beim Import auf Dummy-Wert setzen**

Bei speziellen CSV-Cron-Importen von Nutzern E-Mail-Adressen automatisch durch die Dummy-E-Mail username@example.com ersetzen.

*Standard: `false`*