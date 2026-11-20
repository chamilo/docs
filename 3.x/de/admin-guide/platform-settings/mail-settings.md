# E-Mail-Einstellungen

Wie ausgehende E-Mails aufgebaut werden — Absenderidentität, Layout, Signatur und Adressen für besondere Zwecke.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > E-Mail**. Diese Kategorie enthält **22 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor_for_anonymous`

**E-Mail-Editor für anonyme Benutzer**

Anonymen Benutzern erlauben, E-Mails von der Plattform zu senden. Im heutigen Zeitalter der Informationssicherheit ist dies keine empfohlene Option.

*Standard: `true`*


### `cron_notification_help_desk`

**E-Mail-Adressen zum Versand von Ausführungsberichten der Cronjobs**

Als Array von E-Mail-Adressen angegeben. Funktioniert noch nicht für alle Cronjobs.

### `mail_content_style`

**Zusätzliche HTML-Attribute für den E-Mail-Body**

Zusätzliche HTML-Attribute, die auf das Body-Tag generierter Benachrichtigungs-E-Mails angewendet werden.

### `mail_header_style`

**Zusätzliche HTML-Attribute für den E-Mail-Header**

Zusätzliche HTML-Attribute, die auf den Header-Bereich generierter Benachrichtigungs-E-Mails angewendet werden.

### `mailer_debug_enable`

**E-Mail: Debug**

Legen Sie fest, ob Sie die Debug-Protokolle für den E-Mail-Versand aktivieren möchten. Diese liefern Ihnen mehr Informationen darüber, was beim Verbindungsaufbau zum E-Mail-Dienst geschieht, sind jedoch nicht elegant und können das Seitendesign beeinträchtigen. Nur verwenden, wenn keine Benutzeraktivität vorliegt.

*Standard: `false`*


### `mailer_dkim`

**E-Mail: DKIM-Header**

Geben Sie ein JSON-Array Ihrer DKIM-Konfigurationseinstellungen ein (siehe Beispiel).

### `mailer_dsn`

**Mail-DSN**

Der DSN enthält vollständig alle Parameter, die für die Verbindung zum E-Mail-Dienst erforderlich sind. Weitere Informationen finden Sie unter https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Hier einige Beispiele unterstützter DSN-Syntaxen: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Für Microsoft 365, wo SMTP mit Basisauthentifizierung ausläuft, senden Sie stattdessen über die Microsoft Graph API mit `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (Sonderzeichen im Client Secret URL-kodieren). Dies erfordert eine Entra-ID-Anwendungsregistrierung mit der Anwendungsberechtigung `Mail.Send` — siehe [E-Mail-Konfiguration](../installation/email-configuration.md).

*Standard: `null://null`*


### `mailer_exclude_json`

**E-Mail: LD+JSON vermeiden**

Einige E-Mail-Clients verstehen das beschreibende LD+JSON-Format nicht und zeigen es dem Endbenutzer als lose JSON-Zeichenkette an. Wenn dies bei Ihnen der Fall ist, können Sie die untenstehende Variable auf 'false' setzen, um diesen Header zu deaktivieren.

*Standard: `false`*


### `mailer_from_email`

**Alle E-Mails von dieser E-Mail-Adresse senden**

Legt die Standard-E-Mail-Adresse fest, die im Feld „Von“ von E-Mails verwendet wird.

### `mailer_from_name`

**Alle E-Mails als von diesem (organisatorischen) Namen stammend senden**

Legt den Standard-Anzeigenamen fest, der für den Versand von Plattform-E-Mails verwendet wird, z. B. „Support-Team“.

### `mailer_mails_charset`

**E-Mail: Zeichensatz**

Falls Sie den Zeichensatz festlegen müssen, der beim Versand dieser E-Mails verwendet wird. Leer lassen, wenn Sie unsicher sind.

*Standard: `UTF-8`*


### `messages_hide_mail_content`

**E-Mail-Inhalt ausblenden, um Benutzer zur Plattform zu führen**

Kurze E-Mail-Versionen mit einem Link zum Nachrichtenbereich auf der Plattform bevorzugen, um die plattformbasierte Beteiligung zu erhöhen.

*Standard: `false`*


### `enable_email_open_tracking`

**E-Mail-Öffnungen verfolgen**

Fügt Benachrichtigungs-E-Mails zu Nachrichten ein kleines Tracking-Bild hinzu und zeichnet auf, wann es angefordert wird. Dies zeigt lediglich an, dass die E-Mail möglicherweise geöffnet wurde; es beweist nicht, dass sie gelesen wurde.

*Standard: `false`*

### `enable_inbound_mail`

**E-Mail-Antworten auf Nachrichten zulassen**

Empfängern von Benachrichtigungen zu Direktnachrichten erlauben, per E-Mail zu antworten. Eingehende Nachrichten müssen von der E-Mail-Infrastruktur an den Chamilo-Befehl für eingehende E-Mails weitergeleitet werden.

*Standard: `false`*

### `inbound_mail_address`

**Adresse für eingehende E-Mails**

Basisadresse für die Antwortweiterleitung, zum Beispiel `replies@example.com`. Chamilo fügt mithilfe von Plus-Adressierung ein eindeutiges Empfänger-Token hinzu.

### `inbound_mail_dsn`

**DSN des Postfachs für eingehende E-Mails**

Postfachverbindung zum Abrufen eingehender Antworten, zum Beispiel `imaps://user:password@imap.example.com:993/INBOX`. Reservierte Zeichen in Zugangsdaten URL-kodieren.

### `notifications_extended_footer_message`

**Erweiterte Fußzeile für Benachrichtigungen**

Eine benutzerdefinierte zusätzliche Fußzeile für Benachrichtigungs-E-Mails für eine bestimmte Sprache hinzufügen, zum Beispiel für Hinweise zur Datenschutzerklärung. Mehrere Sprachen und Absätze können hinzugefügt werden.

### `send_notification_score_in_percentage`

**Punktzahl in Prozent in der Benachrichtigung zu Testergebnissen senden**

Sendet Übungspunktzahlen in Benachrichtigungs-E-Mails zu Testergebnissen als Prozentsätze statt als Punkte.

*Standard: `false`*

### `send_two_inscription_confirmation_mail`

**Zwei Registrierungs-E-Mails senden**

Bei der Registrierung zwei getrennte E-Mails senden. Eine für den Benutzernamen, eine weitere für das Passwort.

*Standard: `false`*


### `show_user_email_in_notification`

**E-Mail-Adresse des Absenders in Benachrichtigungen anzeigen**

Fügt die E-Mail-Adresse des Absenders zusammen mit dem Namen in persönliche Nachrichten und Benachrichtigungs-E-Mails ein.

*Standard: `false`*


### `update_users_email_to_dummy_except_admins`

**E-Mail-Adressen der Benutzer bei Importen durch Platzhalterwerte ersetzen**

Bei speziellen CSV-Cron-Importen von Benutzern E-Mail-Adressen automatisch durch die Platzhalteradresse username@example.com ersetzen.

*Standard: `false`*

### `mailer_dsn_massmailing`

**DSN für Massenversand**

Optionale Symfony-Mailer-DSN für Kurs- und Plattformankündigungen im Broadcast. Leer lassen, um den mit `mailer_dsn` konfigurierten Haupt-Mail-Transport zu verwenden. Einzelne Benachrichtigungen nutzen weiterhin den Haupttransport. Konfigurieren und testen Sie den zusätzlichen Mail-Transport bei Ihrem Mail-Anbieter, bevor Sie ihn für große Broadcasts einsetzen.

*Standard: leer (Haupttransport)*

Siehe [Mass-Mail-Transport PR #9406](https://github.com/chamilo/chamilo-lms/pull/9406).