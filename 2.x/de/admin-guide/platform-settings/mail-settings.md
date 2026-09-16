# E-Mail-Einstellungen

Wie ausgehende E-Mails erstellt werden – Absenderidentität, Layout, Signatur und spezielle Adressen.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > E-Mail** zu. Diese Kategorie enthält **18 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungen (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor_for_anonymous`

**E-Mail-Editor für anonyme Benutzer**

Erlauben Sie anonymen Benutzern, E-Mails von der Plattform aus zu senden. In Zeiten der Informationssicherheit ist dies keine empfohlene Option.

*Standard: `true`*

### `cron_notification_help_desk`

**E-Mail-Adressen für Berichte über die Ausführung von Cronjobs**

Wird als Array von E-Mail-Adressen angegeben. Funktioniert noch nicht für alle Cronjobs.

### `mail_content_style`

**Zusätzliche HTML-Body-Attribute für E-Mails**

Zusätzliche HTML-Attribute, die auf das Body-Tag von generierten Benachrichtigungs-E-Mails angewendet werden.

### `mail_header_style`

**Zusätzliche HTML-Header-Attribute für E-Mails**

Zusätzliche HTML-Attribute, die auf den Header-Bereich von generierten Benachrichtigungs-E-Mails angewendet werden.

### `mailer_debug_enable`

**E-Mail: Debug**

Wählen Sie aus, ob Sie die Debug-Protokolle für den E-Mail-Versand aktivieren möchten. Diese liefern mehr Informationen darüber, was beim Verbinden mit dem E-Mail-Dienst passiert, sind jedoch nicht elegant und könnten das Seitenlayout beeinträchtigen. Verwenden Sie dies nur, wenn keine Benutzeraktivität stattfindet.

*Standard: `false`*

### `mailer_dkim`

**E-Mail: DKIM-Header**

Geben Sie ein JSON-Array mit Ihren DKIM-Konfigurationseinstellungen ein (siehe Beispiel).

### `mailer_dsn`

**E-Mail-DSN**

Der DSN enthält vollständig alle Parameter, die für die Verbindung zum E-Mail-Dienst benötigt werden. Weitere Informationen finden Sie unter https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Hier sind einige Beispiele für unterstützte DSN-Syntaxen: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Standard: `null://null`*

### `mailer_exclude_json`

**E-Mail: LD+JSON vermeiden**

Einige E-Mail-Clients verstehen das beschreibende LD+JSON-Format nicht und zeigen es dem Endbenutzer als lose JSON-Zeichenkette an. Falls dies bei Ihnen der Fall ist, können Sie die untenstehende Variable auf 'false' setzen, um diesen Header zu deaktivieren.

*Standard: `false`*

### `mailer_from_email`

**Alle E-Mails von dieser E-Mail-Adresse senden**

Legt die Standard-E-Mail-Adresse fest, die im "Von"-Feld der E-Mails verwendet wird.

### `mailer_from_name`

**Alle E-Mails als von diesem (organisatorischen) Namen stammend senden**

Legt den Standard-Anzeigenamen fest, der für den Versand von Plattform-E-Mails verwendet wird, z. B. "Support-Team".

### `mailer_mails_charset`

**E-Mail: Zeichensatz**

Falls Sie den zu verwendenden Zeichensatz für den Versand dieser E-Mails definieren müssen. Lassen Sie das Feld leer, wenn Sie unsicher sind.

*Standard: `UTF-8`*

### `mailer_xoauth2`

**E-Mail: XOAuth2-Optionen**

Wenn Sie einen XOAuth2-basierten E-Mail-Dienst verwenden, nutzen Sie diese Einstellung im JSON-Format, um Ihre spezifische Konfiguration zu speichern (siehe Beispiel) und wählen Sie XOAuth2 in der E-Mail-Dienst-Einstellung aus.

### `messages_hide_mail_content`

**E-Mail-Inhalt ausblenden, um Benutzer auf die Plattform zu lenken**

Bevorzugen Sie kurze E-Mail-Versionen mit einem Link zum Nachrichtenbereich auf der Plattform, um die plattformbasierte Interaktion zu erhöhen.

*Standard: `false`*

### `notifications_extended_footer_message`

**Erweiterter Benachrichtigungs-Footer**

Fügen Sie einen benutzerdefinierten zusätzlichen Footer für Benachrichtigungs-E-Mails für eine bestimmte Sprache hinzu, z. B. für Datenschutzhinweise. Mehrere Sprachen und Absätze können hinzugefügt werden.

### `send_notification_score_in_percentage`

**Punktzahl in Prozent in Testergebnis-Benachrichtigungen senden**

Sendet Übungsergebnisse als Prozentsätze anstelle von Punkten in Testergebnis-Benachrichtigungs-E-Mails.

*Standard: `false`*

### `send_two_inscription_confirmation_mail`

**Zwei Registrierungs-E-Mails senden**

Senden Sie bei der Registrierung zwei separate E-Mails. Eine für den Benutzernamen, eine weitere für das Passwort.

*Standard: `false`*

### `show_user_email_in_notification`

**E-Mail-Adresse des Absenders in Benachrichtigungen anzeigen**

Zeigt die E-Mail-Adresse des Absenders zusammen mit seinem Namen in persönlichen Nachrichten und Benachrichtigungs-E-Mails an.

*Standard: `false`*

### `update_users_email_to_dummy_except_admins`

**E-Mail-Adressen von Benutzern während des Imports auf Dummy-Wert aktualisieren**

Während spezieller CSV-Cron-Imports von Benutzern werden E-Mail-Adressen automatisch durch Dummy-E-Mail-Adressen wie username@example.com ersetzt.

*Standard: `false`*