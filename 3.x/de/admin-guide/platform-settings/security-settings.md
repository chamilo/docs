# Sicherheitseinstellungen

Anmeldeschutz, Passwortrichtlinie, Content-Security-Header, Zwei-Faktor-Authentifizierung und das schlanke Intrusion-Detection-System.

Diese Seite behandelt die Sicherheits*richtlinie*. Zu den Überwachungswerkzeugen, die die Plattform anhand dieser Richtlinie beobachten (Protokolle der Anmeldeversuche, Ereignisse der Intrusion Detection, Prüfungen der Passwortstärke und Dateiintegritätsprüfungen), siehe [Sicherheit](../security/README.md).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Sicherheit**. Diese Kategorie enthält **32 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Settings-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `2fa_enable`

**2FA aktivieren**

Fügt auf der Seite zur Passwortaktualisierung Felder hinzu, um 2FA mit einer TOTP-Authenticator-App zu aktivieren. Wenn dies global deaktiviert ist, sehen Benutzer keine 2FA-Felder und werden bei der Anmeldung nicht zur 2FA aufgefordert, selbst wenn sie sie zuvor aktiviert hatten.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Zugriff auf persönliche Dateien für alle**

Ermöglicht den uneingeschränkten Zugriff auf alle persönlichen Dateien

*Standard: `false`*


### `admins_can_set_users_pass`

**Administratoren können Benutzerpasswörter manuell setzen**

[inferred] Wenn aktiviert, können Administratoren Benutzerpasswörter direkt manuell setzen, ohne dass Benutzer sie zurücksetzen müssen.

### `allow_captcha`

**CAPTCHA**

Aktiviert ein CAPTCHA auf dem Anmeldeformular, dem Einschreibungsformular und dem Formular für verlorene Passwörter, um Passwort-Hammering zu vermeiden

*Standard: `false`*

### `allow_online_users_by_status`

**Benutzer filtern, die als online sichtbar sind**

Beschränkt die Sichtbarkeit online befindlicher Benutzer auf bestimmte Benutzerrollen.

### `allow_strength_pass_checker`

**Passwortstärke-Prüfer**

Aktivieren Sie diese Option, um einen visuellen Indikator für die Passwortstärke hinzuzufügen, wenn der Benutzer sein Passwort ändert. Dies verhindert NICHT, dass schwache Passwörter gesetzt werden; es dient lediglich als visuelle Hilfe.

*Standard: `true`*


### `anonymous_autoprovisioning`

**Weitere anonyme Benutzer automatisch bereitstellen**

Erstellt dynamisch neue anonyme Benutzer, um hohes Besucheraufkommen zu unterstützen.

*Standard: `false`*


### `captcha_number_mistakes_to_block_account`

**Erlaubte CAPTCHA-Fehler**

Die Anzahl der Male, die ein Benutzer im CAPTCHA-Feld einen Fehler machen kann, bevor sein Konto gesperrt wird.

### `captcha_time_to_block`

**CAPTCHA-Kontosperrzeit**

Wenn der Benutzer die maximale Anzahl erlaubter Anmeldefehler erreicht (bei Verwendung des CAPTCHA), wird sein Konto für diese Anzahl von Minuten gesperrt.

### `check_password`

**Passwortanforderungen prüfen**

Aktiviert die Validierung der oben definierten Passwortanforderungen bei der Passworterstellung oder Passwortaktualisierung.

*Standard: `false`*


### `file_integrity_check_notify_admins` **v3**

**Empfänger der Dateiintegritätsprüfungs-Benachrichtigung**

Kommagetrennte Liste von E-Mail-Adressen, die benachrichtigt werden, wenn ein Dateiintegritätsscan eine Änderung erkennt. Leer lassen, um stattdessen jeden globalen Administrator zu benachrichtigen.

### `filter_terms`

**Filterbegriffe**

Geben Sie eine Liste von Begriffen an, einen pro Zeile, die aus Webseiten und E-Mails herausgefiltert werden sollen. Diese Begriffe werden durch *** ersetzt.

### `force_renew_password_at_first_login`

**Passworterneuerung bei der ersten Anmeldung erzwingen**

Dies ist eine einfache Maßnahme, um die Sicherheit Ihres Portals zu erhöhen, indem Benutzer aufgefordert werden, ihr Passwort sofort zu ändern, sodass das per E-Mail übermittelte Passwort nicht mehr gültig ist und sie anschließend eines verwenden, das sie selbst gewählt haben und das nur sie kennen.

*Standard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Breadcrumb ausblenden, wenn „nicht erlaubt“**

Wenn der Benutzer keinen Zugriff auf eine bestimmte Seite hat, wird auch die Breadcrumb ausgeblendet. Dies erhöht die Sicherheit, indem die Anzeige unnötiger Informationen vermieden wird.

*Standard: `false`*


### `login_max_attempt_before_blocking_account`

**Maximale Anmeldeversuche vor Sperrung**

Anzahl fehlgeschlagener Anmeldeversuche, die toleriert werden, bevor das Benutzerkonto gesperrt wird und von einem Administrator entsperrt werden muss.

*Standard: `0`*

### `password_requirements`

**Minimale Passwort-Syntaxanforderungen**

Definiert die erforderliche Struktur für Benutzerpasswörter. Beispiel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Verwenden Sie „specials“ (Plural), um Sonderzeichen zu verlangen.

### `password_rotation_days`

**Passwortrotationsintervall (Tage)**

Anzahl der Tage, nach denen Benutzer ihr Passwort rotieren müssen (0 = deaktiviert).

*Standard: `0`*


### `prevent_multiple_simultaneous_login`

**Gleichzeitige Anmeldung verhindern**

Verhindert, dass sich Benutzer mehr als einmal mit demselben Konto verbinden. Dies ist eine gute Option bei Portalen mit nutzungsabhängiger Abrechnung, kann aber beim Testen einschränkend sein, da sich nur ein Browser mit einem bestimmten Konto verbinden kann.

*Standard: `false`*

### `proxy_settings`

**Proxy-Einstellungen**

Einige Funktionen von Chamilo stellen vom Server aus Verbindungen nach außen her. Zum Beispiel, um sicherzustellen, dass ein externer Inhalt existiert, wenn ein Link erstellt oder eine eingebettete Seite im Lernpfad angezeigt wird. Wenn Ihr Chamilo-Server einen Proxy verwendet, um aus seinem Netzwerk herauszukommen, ist dies der Ort, um ihn zu konfigurieren.

### `security_block_inactive_users_immediately`

**Deaktivierte Benutzer sofort sperren**

Benutzer, die vom Administrator über die Benutzerverwaltung deaktiviert wurden, sofort sperren. Andernfalls behalten deaktivierte Benutzer ihre bisherigen Rechte, bis sie sich abmelden.

*Standard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy ist eine wirksame Maßnahme, um Ihre Website vor XSS-Angriffen zu schützen. Durch die Whitelist von Quellen genehmigter Inhalte können Sie verhindern, dass der Browser schädliche Assets lädt. Diese Einstellung ist insbesondere mit WYSIWYG-Editoren kompliziert zu setzen, aber wenn Sie alle Domains, die Sie für die Einbindung von Iframes in der child-src-Anweisung zulassen möchten, hinzufügen, sollte dieses Beispiel für Sie funktionieren. Sie können die Ausführung von JavaScript aus externen Quellen (einschließlich innerhalb von SVG-Bildern) verhindern, indem Sie eine strikte Liste im Argument 'script-src' verwenden. Leer lassen, um zu deaktivieren. Beispiel-Einstellung: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy nur berichten**

Diese Einstellung ermöglicht es Ihnen, zu experimentieren, indem einige Content-Security-Policy-Regeln gemeldet, aber nicht durchgesetzt werden.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning schützt Ihre Website vor MiTM-Angriffen mit gefälschten X.509-Zertifikaten. Indem nur die Identitäten auf die Whitelist gesetzt werden, denen der Browser vertrauen soll, sind Ihre Benutzer geschützt, falls eine Zertifizierungsstelle kompromittiert wird.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning nur berichten**

Diese Einstellung ermöglicht es Ihnen, zu experimentieren, indem einige HTTP-Public-Key-Pinning-Regeln gemeldet, aber nicht durchgesetzt werden.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy ist ein neuer Header, der einer Website erlaubt zu steuern, wie viele Informationen der Browser bei der Navigation weg von einem Dokument mitsendet, und sollte von allen Websites gesetzt werden.

*Standard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Session-Cookie SameSite**

Parameter samesite:None für das Session-Cookie aktivieren. Weitere Informationen: https://www.chromium.org/updates/same-site und https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security ist eine ausgezeichnete Funktion zur Unterstützung auf Ihrer Website und stärkt Ihre TLS-Implementierung, indem der User Agent zur Durchsetzung von HTTPS veranlasst wird. Empfohlener Wert: 'strict-transport-security: max-age=63072000; includeSubDomains'. Siehe https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Sie können das Suffix 'preload' einbeziehen, dies hat jedoch Auswirkungen auf die Top-Level-Domain (TLD) und sollte daher nicht leichtfertig erfolgen. Siehe https://hstspreload.org/. Leer lassen, um zu deaktivieren.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options hindert einen Browser daran, den Inhaltstyp per MIME-Sniffing zu erraten, und zwingt ihn, beim deklarierten Content-Type zu bleiben. Der einzige gültige Wert für diesen Header ist 'nosniff'.

*Standard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options teilt dem Browser mit, ob Sie zulassen möchten, dass Ihre Website in einem Frame angezeigt wird oder nicht. Indem Sie verhindern, dass ein Browser Ihre Website in einem Frame einbettet, können Sie sich gegen Angriffe wie Clickjacking schützen. Wenn hier eine URL definiert wird, sollte sie die URL(s) definieren, von denen aus Ihr Inhalt sichtbar sein soll, nicht die URLs, von denen Ihre Website Inhalte akzeptiert. Wenn beispielsweise Ihre Haupt-URL (root_web oben) https://11.chamilo.org/ ist, sollte diese Einstellung lauten: 'ALLOW-FROM https://11.chamilo.org'. Diese Header gelten nur für Seiten, bei denen Chamilo für die Erzeugung der HTTP-Header verantwortlich ist (d. h. '.php'-Dateien). Sie gelten nicht für statische Dateien. Wenn Sie mit dieser Funktion experimentieren, stellen Sie sicher, dass Sie auch die Konfiguration Ihres Webservers aktualisieren, um die richtigen Header für statische Dateien hinzuzufügen. Siehe die CDN-Konfigurationsdokumentation oben (suchen Sie nach 'add_header') für weitere Informationen. Empfohlener (strikter) Wert für diese Einstellung, falls aktiviert: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection setzt die Konfiguration für den in den meisten Browsern integrierten Filter gegen Cross-Site-Scripting. Empfohlener Wert '1; mode=block'.

*Standard: `1; mode=block`*


### `user_reset_password`

**Token zum Zurücksetzen des Passworts aktivieren**

Diese Option ermöglicht die Erzeugung eines ablaufenden Einmal-Tokens, das dem Benutzer per E-Mail gesendet wird, um sein Passwort zurückzusetzen.

*Standard: `false`*

### `user_reset_password_token_limit`

**Zeitlimit für das Passwort-Zurücksetzen-Token**

Die Anzahl der Sekunden, nach denen das generierte Token automatisch abläuft und nicht mehr verwendet werden kann (es muss ein neues Token generiert werden).

*Standard: `3600`*