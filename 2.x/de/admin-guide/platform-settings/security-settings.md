# Sicherheitseinstellungen

Login-Schutz, Passwortrichtlinien, Content-Security-Header, Zwei-Faktor-Authentifizierung und das leichtgewichtige Intrusion-Detection-System.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Sicherheit** zu. Diese Kategorie enthält **31 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `2fa_enable`

**2FA aktivieren**

Fügt Felder auf der Passwortaktualisierungsseite hinzu, um 2FA mit einer TOTP-Authentifizierungs-App zu aktivieren. Wenn dies global deaktiviert ist, sehen Benutzer keine 2FA-Felder und werden beim Login nicht nach 2FA gefragt, selbst wenn sie es zuvor aktiviert hatten.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Zugriff auf persönliche Dateien für alle**

Ermöglicht uneingeschränkten Zugriff auf alle persönlichen Dateien.

*Standard: `false`*

### `admins_can_set_users_pass`

**Administratoren können Benutzerpasswörter manuell festlegen**

[abgeleitet] Wenn aktiviert, können Administratoren Benutzerpasswörter direkt manuell festlegen, ohne dass Benutzer diese zurücksetzen müssen.

### `allow_captcha`

**CAPTCHA**

Aktiviert ein CAPTCHA auf dem Login-Formular, dem Anmeldeformular und dem Formular für verlorene Passwörter, um Passwort-Hammering zu vermeiden.

*Standard: `false`*

### `allow_online_users_by_status`

**Sichtbarkeit von Online-Benutzern filtern**

Beschränkt die Sichtbarkeit von Online-Benutzern auf bestimmte Benutzerrollen.

### `allow_strength_pass_checker`

**Passwortstärkeprüfung**

Aktivieren Sie diese Option, um einen visuellen Indikator für die Passwortstärke hinzuzufügen, wenn der Benutzer sein Passwort ändert. Dies verhindert NICHT, dass schwache Passwörter hinzugefügt werden, es dient nur als visuelle Unterstützung.

*Standard: `true`*

### `anonymous_autoprovisioning`

**Automatische Bereitstellung weiterer anonymer Benutzer**

Erstellt dynamisch neue anonyme Benutzer, um hohen Besuchertraffic zu unterstützen.

*Standard: `false`*

### `captcha_number_mistakes_to_block_account`

**Toleranz für CAPTCHA-Fehler**

Die Anzahl der Fehler, die ein Benutzer bei der CAPTCHA-Eingabe machen darf, bevor sein Konto gesperrt wird.

### `captcha_time_to_block`

**Sperrzeit für CAPTCHA-Konto**

Wenn der Benutzer die maximale Anzahl an Login-Fehlern (bei Verwendung von CAPTCHA) erreicht, wird sein Konto für diese Anzahl von Minuten gesperrt.

### `check_password`

**Passwortanforderungen überprüfen**

Aktiviert die Validierung der oben definierten Passwortanforderungen während der Passworterstellung oder -aktualisierung.

*Standard: `false`*

### `filter_terms`

**Begriffe filtern**

Geben Sie eine Liste von Begriffen an, einen pro Zeile, die aus Webseiten und E-Mails herausgefiltert werden sollen. Diese Begriffe werden durch *** ersetzt.

### `force_renew_password_at_first_login`

**Passworterneuerung bei erster Anmeldung erzwingen**

Dies ist eine einfache Maßnahme, um die Sicherheit Ihres Portals zu erhöhen, indem Benutzer aufgefordert werden, ihr Passwort sofort zu ändern, sodass das per E-Mail übermittelte Passwort nicht mehr gültig ist und sie dann eines verwenden, das sie selbst erstellt haben und das nur sie kennen.

*Standard: `false`*

### `hide_breadcrumb_if_not_allowed`

**Breadcrumb bei 'nicht erlaubt' ausblenden**

Wenn der Benutzer keinen Zugriff auf eine bestimmte Seite hat, wird auch der Breadcrumb ausgeblendet. Dies erhöht die Sicherheit, indem unnötige Informationen nicht angezeigt werden.

*Standard: `false`*

### `login_max_attempt_before_blocking_account`

**Maximale Login-Versuche vor Sperrung**

Anzahl der fehlgeschlagenen Login-Versuche, die toleriert werden, bevor das Benutzerkonto gesperrt wird und von einem Administrator entsperrt werden muss.

*Standard: `0`*

### `password_requirements`

**Minimale Passwortsyntaxanforderungen**

Definiert die erforderliche Struktur für Benutzerpasswörter. Beispiel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Verwenden Sie "specials" (Plural), um Sonderzeichen zu verlangen.

### `password_rotation_days`

**Passwortrotationsintervall (Tage)**

Anzahl der Tage, nach denen Benutzer ihr Passwort ändern müssen (0 = deaktiviert).

*Standard: `0`*

### `prevent_multiple_simultaneous_login`

**Gleichzeitige Anmeldungen verhindern**

Verhindert, dass sich Benutzer mit demselben Konto mehr als einmal verbinden. Dies ist eine gute Option für Portale mit Zugang gegen Bezahlung, kann jedoch während des Testens einschränkend sein, da nur ein Browser mit einem bestimmten Konto verbunden sein kann.

*Standard: `false`*

### `proxy_settings`

**Proxy-Einstellungen**

Einige Funktionen von Chamilo stellen vom Server aus Verbindungen nach außen her, z. B. um sicherzustellen, dass ein externer Inhalt existiert, wenn ein Link erstellt oder eine eingebettete Seite im Lernpfad angezeigt wird. Wenn Ihr Chamilo-Server einen Proxy verwendet, um aus seinem Netzwerk herauszukommen, wäre dies der Ort, um ihn zu konfigurieren.

### `security_block_inactive_users_immediately`

**Deaktivierte Benutzer sofort sperren**

Sperrt Benutzer, die vom Administrator über die Benutzerverwaltung deaktiviert wurden, sofort. Andernfalls behalten deaktivierte Benutzer ihre bisherigen Berechtigungen, bis sie sich abmelden.

*Standard: `false`*

---
### `security_content_policy`

**Content Security Policy**

Die Content Security Policy ist eine effektive Maßnahme, um Ihre Website vor XSS-Angriffen zu schützen. Durch das Whitelisting von Quellen für zugelassene Inhalte können Sie verhindern, dass der Browser schädliche Assets lädt. Diese Einstellung ist besonders kompliziert bei der Verwendung von WYSIWYG-Editoren, aber wenn Sie alle Domains, die Sie für die Einbindung von Iframes autorisieren möchten, in der child-src-Anweisung hinzufügen, sollte dieses Beispiel für Sie funktionieren. Sie können verhindern, dass JavaScript von externen Quellen ausgeführt wird (einschließlich innerhalb von SVG-Bildern), indem Sie eine strikte Liste im 'script-src'-Argument verwenden. Lassen Sie das Feld leer, um diese Funktion zu deaktivieren. Beispiel-Einstellung: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy nur Bericht**

Diese Einstellung ermöglicht es Ihnen, mit der Content Security Policy zu experimentieren, indem Verstöße nur gemeldet, aber nicht durchgesetzt werden.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning schützt Ihre Website vor Man-in-the-Middle-Angriffen (MiTM) durch die Verwendung gefälschter X.509-Zertifikate. Indem Sie nur die Identitäten auf eine Whitelist setzen, denen der Browser vertrauen soll, sind Ihre Benutzer geschützt, falls eine Zertifizierungsstelle kompromittiert wird.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning nur Bericht**

Diese Einstellung ermöglicht es Ihnen, mit HTTP Public Key Pinning zu experimentieren, indem Verstöße nur gemeldet, aber nicht durchgesetzt werden.

### `security_referrer_policy`

**Sicherheits-Referrer-Policy**

Die Referrer Policy ist ein neuer Header, der es einer Website ermöglicht, zu kontrollieren, wie viele Informationen der Browser bei der Navigation weg von einem Dokument mitsendet. Diese Einstellung sollte von allen Websites gesetzt werden.

*Standard: `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**Session-Cookie SameSite**

Aktivieren Sie den Parameter SameSite:None für das Session-Cookie. Weitere Informationen: https://www.chromium.org/updates/same-site und https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security ist eine hervorragende Funktion, die auf Ihrer Website unterstützt werden sollte und Ihre TLS-Implementierung stärkt, indem sie den User Agent dazu zwingt, HTTPS zu verwenden. Empfohlener Wert: 'strict-transport-security: max-age=63072000; includeSubDomains'. Siehe https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Sie können den 'preload'-Suffix hinzufügen, aber dies hat Konsequenzen für die Top-Level-Domain (TLD), daher sollte dies nicht leichtfertig getan werden. Siehe https://hstspreload.org/. Lassen Sie das Feld leer, um diese Funktion zu deaktivieren.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options verhindert, dass ein Browser versucht, den Inhaltstyp zu MIME-sniffen, und zwingt ihn, beim deklarierten Inhaltstyp zu bleiben. Der einzige gültige Wert für diesen Header ist 'nosniff'.

*Standard: `nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options teilt dem Browser mit, ob Sie möchten, dass Ihre Website in einem Frame dargestellt wird oder nicht. Durch das Verhindern des Framings Ihrer Website können Sie sich gegen Angriffe wie Clickjacking schützen. Wenn Sie hier eine URL definieren, sollte diese die URL(s) angeben, von denen aus Ihr Inhalt sichtbar sein soll, nicht die URLs, von denen Ihre Website Inhalte akzeptiert. Zum Beispiel, wenn Ihre Haupt-URL (root_web oben) https://11.chamilo.org/ ist, dann sollte diese Einstellung lauten: 'ALLOW-FROM https://11.chamilo.org'. Diese Header gelten nur für Seiten, bei denen Chamilo für die Generierung der HTTP-Header verantwortlich ist (d.h. '.php'-Dateien). Sie gelten nicht für statische Dateien. Wenn Sie mit dieser Funktion experimentieren, stellen Sie sicher, dass Sie auch die Konfiguration Ihres Webservers aktualisieren, um die richtigen Header für statische Dateien hinzuzufügen. Weitere Informationen finden Sie in der CDN-Konfigurationsdokumentation oben (suchen Sie nach 'add_header'). Empfohlener (strenger) Wert für diese Einstellung, falls aktiviert: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection legt die Konfiguration für den in den meisten Browsern integrierten Cross-Site-Scripting-Filter fest. Empfohlener Wert: '1; mode=block'.

*Standard: `1; mode=block`*

### `user_reset_password`

**Passwort-Rücksetz-Token aktivieren**

Diese Option ermöglicht es, einen zeitlich begrenzten, einmalig nutzbaren Token zu generieren, der per E-Mail an den Benutzer gesendet wird, um sein/ihr Passwort zurückzusetzen.

*Standard: `false`*

### `user_reset_password_token_limit`

**Zeitlimit für Passwort-Rücksetz-Token**

Die Anzahl der Sekunden, bevor der generierte Token automatisch abläuft und nicht mehr verwendet werden kann (ein neuer Token muss generiert werden).

*Standard: `3600`*