# Sicherheitseinstellungen

Anmeldeschutz, Kennwortrichtlinie, Content-Security-Header, Zwei-Faktor-Authentifizierung und das leichtgewichtige Intrusion-Detection-System.

Diese Seite behandelt die Sicherheits*richtlinie*. Zu den Überwachungswerkzeugen, die die Plattform anhand dieser Richtlinie beobachten (Protokolle von Anmeldeversuchen, Ereignisse der Intrusion Detection, Prüfungen der Kennwortstärke und Integritätsprüfungen von Dateien), siehe [Sicherheit](../security/README.md).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Sicherheit**. Diese Kategorie enthält **40 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform ausgeliefert werden (`SettingsCurrentFixtures.php`).

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `2fa_enable`

**2FA aktivieren**

Fügt auf der Seite zur Kennwortaktualisierung Felder hinzu, um 2FA mit einer TOTP-Authenticator-App zu aktivieren. Wenn die Funktion global deaktiviert ist, sehen Benutzer keine 2FA-Felder und werden bei der Anmeldung nicht zur 2FA aufgefordert, selbst wenn sie sie zuvor aktiviert hatten.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Zugriff auf persönliche Dateien für alle**

Ermöglicht den uneingeschränkten Zugriff auf alle persönlichen Dateien

*Standard: `false`*


### `admins_can_set_users_pass`

**Administratoren können Benutzerkennwörter manuell festlegen**

[abgeleitet] Wenn aktiviert, können Administratoren Benutzerkennwörter direkt manuell festlegen, ohne dass Benutzer sie zurücksetzen müssen.

### `allow_captcha`

**CAPTCHA**

Aktiviert ein CAPTCHA im Anmeldeformular, im Registrierungsformular und im Formular für vergessene Kennwörter, um Kennwort-Hammering zu vermeiden

*Standard: `false`*

### `allow_online_users_by_status`

**Benutzer filtern, die als online sichtbar sein können**

Beschränkt die Sichtbarkeit online befindlicher Benutzer auf bestimmte Benutzerrollen.

### `allow_strength_pass_checker`

**Prüfung der Kennwortstärke**

Aktivieren Sie diese Option, um eine visuelle Anzeige der Kennwortstärke hinzuzufügen, wenn der Benutzer sein Kennwort ändert. Dadurch wird NICHT verhindert, dass schwache Kennwörter gesetzt werden; sie dient lediglich als visuelle Hilfe.

*Standard: `true`*


### `anonymous_autoprovisioning`

**Weitere anonyme Benutzer automatisch bereitstellen**

Erstellt dynamisch neue anonyme Benutzer, um hohen Besucherverkehr zu unterstützen.

*Standard: `false`*


### `captcha_number_mistakes_to_block_account`

**Zulässige CAPTCHA-Fehler**

Die Anzahl der Male, die ein Benutzer im CAPTCHA-Feld einen Fehler machen kann, bevor sein Konto gesperrt wird.

### `captcha_time_to_block`

**Sperrdauer des Kontos bei CAPTCHA**

Wenn der Benutzer die maximale Anzahl zulässiger Anmeldefehler erreicht (bei Verwendung des CAPTCHA), wird sein Konto für diese Anzahl von Minuten gesperrt.

### `check_password`

**Kennwortanforderungen prüfen**

Aktiviert die Validierung der oben definierten Kennwortanforderungen bei der Erstellung oder Aktualisierung eines Kennworts.

*Standard: `false`*


### `confidential_reporting_attachments_enabled`

**Vertrauliche Beweisanhänge zulassen**

Steuert, ob Meldende Beweisdateien an eine vertrauliche Meldung anhängen können.

*Standard: `true`*

### `confidential_reporting_enabled`

**Vertrauliche Fürsorge-Meldungen aktivieren**

Aktiviert den Workflow für vertrauliche Meldungen und Untersuchungen. Der private Speicher für Verschlüsselungsschlüssel muss bereit sein, bevor die Funktion aktiviert wird. Siehe [Vertrauliche Meldungen](../security/confidential-reporting.md).

*Standard: `false`*

### `confidential_reporting_min_reporters`

**Mindestanzahl unterschiedlicher Meldender für eine Untersuchung**

Eine Untersuchung wird autorisierten Untersuchenden erst sichtbar, nachdem diese Anzahl unterschiedlicher Meldender Meldungen zur selben Person eingereicht hat. Gültiger Bereich: **2–10**.

*Standard: `2`*

### `confidential_reporting_notifications_enabled`

**Benachrichtigungen zu vertraulichen Untersuchungen anzeigen**

Zeigt einen internen Hinweis auf in Frage kommende Untersuchungen an. **Es werden keine E-Mails oder externen Benachrichtigungen versendet.**

*Standard: `false`*

### `dynamic_client_registration`

**OAuth Dynamic Client Registration über MCP hinaus aktivieren**

Steuert die zusätzliche Validierung des Umfangs der OAuth-Client-Registrierung, wenn der OAuth-Server aktiviert ist. Der ratenbegrenzte Registrierungsendpunkt bleibt für den unterstützten MCP-Registrierungsablauf verfügbar. Diese Einstellung gewährt keinen Zugriff auf beliebige künftige durch OAuth geschützte Ressourcen. Siehe [OAuth-Autorisierungsserver](../authentication/oauth-server.md).

*Standard: `false`*

### `file_integrity_check_notify_admins` **v3**

**Empfänger von Benachrichtigungen zur Dateiintegritätsprüfung**

Durch Kommas getrennte Liste von E-Mail-Adressen, die benachrichtigt werden, wenn eine Dateiintegritätsprüfung eine Änderung erkennt. Leer lassen, um stattdessen jeden globalen Administrator zu benachrichtigen.

### `filter_terms`

**Begriffe filtern**

Geben Sie eine Liste von Begriffen an, einen pro Zeile, die aus Webseiten und E-Mails herausgefiltert werden sollen. Diese Begriffe werden durch *** ersetzt.

### `force_renew_password_at_first_login`

**Passwortänderung bei der ersten Anmeldung erzwingen**

Dies ist eine einfache Maßnahme, um die Sicherheit Ihres Portals zu erhöhen, indem Benutzer aufgefordert werden, ihr Passwort sofort zu ändern. Das per E-Mail übermittelte Passwort ist dann nicht mehr gültig, und sie verwenden anschließend eines, das sie selbst gewählt haben und das nur ihnen bekannt ist.

*Standard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Breadcrumb ausblenden, wenn „nicht erlaubt“**

Wenn der Benutzer keinen Zugriff auf eine bestimmte Seite hat, wird auch der Breadcrumb ausgeblendet. Dies erhöht die Sicherheit, indem die Anzeige unnötiger Informationen vermieden wird.

*Standard: `false`*


### `login_max_attempt_before_blocking_account`

**Maximale Anmeldeversuche vor der Sperrung**

Anzahl der fehlgeschlagenen Anmeldeversuche, die toleriert werden, bevor das Benutzerkonto gesperrt wird und von einem Administrator entsperrt werden muss.

*Standard: `0`*

### `mcp_allowed_roles`

**MCP nach Rollen zulassen**

JSON-Zuordnung der Chamilo-Benutzerrollen, die MCP verwenden dürfen. Ein Benutzer muss mindestens einer aktivierten Rolle entsprechen. Diese Einschränkung gilt auch für zuvor erzeugte API-Schlüssel und bestehende OAuth-Verbindungen. Erkannte Schlüssel sind `ADMIN`, `COURSEMANAGER`, `STUDENT`, `HRM`, `SESSIONADMIN`, `STUDENT_BOSS` und `INVITEE`; ungültiges JSON verweigert MCP für jede Rolle. Bestehende Konfigurationen können weiterhin `DRH` verwenden, wenn `HRM` fehlt; wenn beide Schlüssel vorhanden sind, hat `HRM` Vorrang. Siehe [MCP](../mcp.md).

*Standard: `{"ADMIN":true,"COURSEMANAGER":true,"STUDENT":false,"HRM":false,"SESSIONADMIN":false,"STUDENT_BOSS":false,"INVITEE":false}`*

### `mcp_enabled`

**MCP-Server aktivieren**

Aktiviert den Chamilo-MCP-Endpunkt und die persönliche MCP-API-Schlüsseloberfläche. Wenn deaktiviert, können vorhandene API-Schlüssel, OAuth-Zugriffstoken und JWT-Anmeldeinformationen nicht unter /mcp verwendet werden. Solange die Funktion deaktiviert ist, wird die Schaltfläche **MCP-API-Schlüssel** nicht auf der Seite des sozialen Netzwerks des Benutzers angezeigt. Siehe [MCP](../mcp.md).

*Standard: `false`*

### `password_requirements`

**Minimale Syntaxanforderungen für Passwörter**

Definiert die erforderliche Struktur für Benutzerpasswörter. Beispiel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Verwenden Sie „specials“ (Plural), um Sonderzeichen zu verlangen.

### `password_rotation_days`

**Intervall für die Passwortrotation (Tage)**

Anzahl der Tage, nach denen Benutzer ihr Passwort rotieren müssen (0 = deaktiviert).

*Standard: `0`*


### `prevent_multiple_simultaneous_login`

**Gleichzeitige Anmeldung verhindern**

Verhindert, dass sich Benutzer mit demselben Konto mehr als einmal anmelden. Dies ist eine gute Option für Portale mit bezahltem Zugang, kann jedoch während Tests einschränkend sein, da sich nur ein Browser mit einem bestimmten Konto verbinden kann.

*Standard: `false`*


### `proxy_settings`

**Proxy-Einstellungen**

Einige Funktionen von Chamilo stellen vom Server aus Verbindungen nach außen her. Zum Beispiel, um beim Erstellen eines Links oder beim Anzeigen einer eingebetteten Seite im Lernpfad sicherzustellen, dass ein externer Inhalt existiert. Wenn Ihr Chamilo-Server einen Proxy verwendet, um sein Netzwerk zu verlassen, ist dies der Ort, an dem Sie ihn konfigurieren.

### `remember_me_days`

**Dauer von „Angemeldet bleiben“ (Tage)**

Legt die Dauer persistenter Anmelde-Cookies und ihrer Datenbank-Token fest. Akzeptiert **0–90** Tage; `0` deaktiviert die Option „Angemeldet bleiben“, und das Anmeldeformular zeigt diese Option nur bei HTTPS-Verbindungen an.

*Standard: `14` Tage*

### `security_block_inactive_users_immediately`

**Deaktivierte Benutzer sofort sperren**

Benutzer, die vom Administrator über die Benutzerverwaltung deaktiviert wurden, sofort sperren. Andernfalls behalten deaktivierte Benutzer ihre bisherigen Berechtigungen, bis sie sich abmelden.

*Standard: `false`*


### `security_content_policy`

**Content Security Policy**

Die Content Security Policy ist eine wirksame Maßnahme, um Ihre Website vor XSS-Angriffen zu schützen. Durch das Whitelisting von Quellen genehmigter Inhalte können Sie verhindern, dass der Browser schädliche Ressourcen lädt. Diese Einstellung ist bei WYSIWYG-Editoren besonders kompliziert zu setzen, aber wenn Sie alle Domains, die Sie für die Einbindung von iframes autorisieren möchten, in der Anweisung child-src hinzufügen, sollte dieses Beispiel für Sie funktionieren. Sie können verhindern, dass JavaScript aus externen Quellen ausgeführt wird (einschließlich innerhalb von SVG-Bildern), indem Sie eine strenge Liste im Argument „script-src“ verwenden. Leer lassen, um die Funktion zu deaktivieren. Beispieleinstellung: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy nur melden**

Diese Einstellung ermöglicht es Ihnen, zu experimentieren, indem einige Content-Security-Policy-Regeln gemeldet, aber nicht durchgesetzt werden.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning schützt Ihre Website vor MiTM-Angriffen mit gefälschten X.509-Zertifikaten. Durch das Whitelisting nur der Identitäten, denen der Browser vertrauen soll, sind Ihre Benutzer geschützt, falls eine Zertifizierungsstelle kompromittiert wird.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning nur melden**

Diese Einstellung ermöglicht es Ihnen, zu experimentieren, indem einige HTTP-Public-Key-Pinning-Regeln gemeldet, aber nicht durchgesetzt werden.

### `security_referrer_policy`

**Sicherheitsrichtlinie für den Referrer**

Die Referrer Policy ist ein neuer Header, mit dem eine Website steuern kann, wie viele Informationen der Browser bei der Navigation weg von einem Dokument mitsendet. Sie sollte von allen Websites gesetzt werden.

*Standard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Session-Cookie SameSite**

Aktiviert den Parameter SameSite=None für das Session-Cookie. Weitere Informationen: https://www.chromium.org/updates/same-site und https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security ist eine ausgezeichnete Funktion, die auf Ihrer Website unterstützt werden sollte. Sie stärkt Ihre TLS-Implementierung, indem der User Agent die Verwendung von HTTPS erzwingt. Empfohlener Wert: 'strict-transport-security: max-age=63072000; includeSubDomains'. Siehe https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Sie können das Suffix 'preload' hinzufügen, dies hat jedoch Auswirkungen auf die Top-Level-Domain (TLD) und sollte daher nicht leichtfertig erfolgen. Siehe https://hstspreload.org/. Leer lassen, um die Funktion zu deaktivieren.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options verhindert, dass ein Browser den Inhaltstyp per MIME-Sniffing zu ermitteln versucht, und zwingt ihn, beim deklarierten Content-Type zu bleiben. Der einzige gültige Wert für diesen Header ist 'nosniff'.

*Standard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options teilt dem Browser mit, ob Ihre Website in einem Frame dargestellt werden darf oder nicht. Indem Sie verhindern, dass ein Browser Ihre Website einbettet, können Sie sich gegen Angriffe wie Clickjacking schützen. Wenn hier eine URL angegeben wird, sollte sie die URL(s) definieren, von denen aus Ihr Inhalt sichtbar sein soll, nicht die URLs, von denen Ihre Website Inhalte akzeptiert. Wenn Ihre Haupt-URL (root_web oben) beispielsweise https://11.chamilo.org/ lautet, sollte diese Einstellung wie folgt lauten: 'ALLOW-FROM https://11.chamilo.org'. Diese Header gelten nur für Seiten, bei denen Chamilo für die Erzeugung der HTTP-Header verantwortlich ist (d. h. '.php'-Dateien). Sie gelten nicht für statische Dateien. Wenn Sie mit dieser Funktion experimentieren, stellen Sie sicher, dass Sie auch die Konfiguration Ihres Webservers aktualisieren, um die richtigen Header für statische Dateien hinzuzufügen. Weitere Informationen finden Sie in der CDN-Konfigurationsdokumentation oben (suchen Sie nach 'add_header'). Empfohlener (strenger) Wert für diese Einstellung, sofern aktiviert: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection legt die Konfiguration für den in den meisten Browsern integrierten Filter gegen Cross-Site-Scripting fest. Empfohlener Wert: '1; mode=block'.

*Standard: `1; mode=block`*


### `user_reset_password`

**Token zum Zurücksetzen des Passworts aktivieren**

Diese Option ermöglicht die Erzeugung eines ablaufenden Einmal-Tokens, das per E-Mail an den Benutzer gesendet wird, um sein Passwort zurückzusetzen.

*Standard: `false`*


### `user_reset_password_token_limit`

**Zeitlimit für das Token zum Zurücksetzen des Passworts**

Die Anzahl der Sekunden, nach denen das erzeugte Token automatisch abläuft und nicht mehr verwendet werden kann (ein neues Token muss erzeugt werden).

*Standard: `3600`*