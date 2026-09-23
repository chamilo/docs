# Säkerhetsinställningar

Inloggningsskydd, lösenordspolicy, innehållssäkerhetsrubriker, tvåfaktorsautentisering och det lätta systemet för intrångsdetektering.

Den här sidan behandlar säkerhets*policy*. För de övervakningsverktyg som bevakar plattformen med hjälp av denna policy (loggar över inloggningsförsök, händelser för intrångsdetektering, skanningar av lösenordsstyrka och kontroller av filintegritet), se [Säkerhet](../security/README.md).

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Säkerhet**. Denna kategori innehåller **32 inställningar**, listade nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `2fa_enable`

**Aktivera 2FA**

Lägg till fält på sidan för lösenordsuppdatering för att aktivera 2FA med en TOTP-autentiseringsapp. När funktionen är inaktiverad globalt ser användarna inga 2FA-fält och uppmanas inte till 2FA vid inloggning, även om de tidigare har aktiverat det.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Åtkomst till personlig fil för alla**

Tillåter åtkomst till alla personliga filer utan begränsning

*Standard: `false`*


### `admins_can_set_users_pass`

**Administratörer kan ange användarlösenord manuellt**

[inferred] När funktionen är aktiverad kan administratörer ange användarlösenord manuellt direkt utan att användarna behöver återställa dem.

### `allow_captcha`

**CAPTCHA**

Aktivera en CAPTCHA på inloggningsformuläret, registreringsformuläret och formuläret för glömt lösenord för att motverka lösenordshammring

*Standard: `false`*

### `allow_online_users_by_status`

**Filtrera användare som kan visas som online**

Begränsar synligheten för onlineanvändare till specifika användarroller.

### `allow_strength_pass_checker`

**Kontroll av lösenordsstyrka**

Aktivera det här alternativet för att lägga till en visuell indikator för lösenordsstyrka när användaren ändrar sitt lösenord. Detta förhindrar INTE att dåliga lösenord läggs till, det fungerar endast som ett visuellt hjälpmedel.

*Standard: `true`*


### `anonymous_autoprovisioning`

**Autoprovisionera fler anonyma användare**

Skapar dynamiskt nya anonyma användare för att hantera hög besökartrafik.

*Standard: `false`*


### `captcha_number_mistakes_to_block_account`

**Tillåtna CAPTCHA-fel**

Antalet gånger en användare kan göra fel i CAPTCHA-rutan innan kontot låses.

### `captcha_time_to_block`

**CAPTCHA-kontolåsningstid**

Om användaren når det maximala antalet tillåtna inloggningsfel (när CAPTCHA används) låses kontot under detta antal minuter.

### `check_password`

**Kontrollera lösenordskrav**

Aktivera validering av lösenordskraven som definieras ovan vid skapande eller uppdatering av lösenord.

*Standard: `false`*


### `file_integrity_check_notify_admins` **v3**

**Mottagare av aviseringar om filintegritetskontroll**

Kommaseparerad lista med e-postadresser som ska aviseras när en filintegritetsskanning upptäcker en ändring. Lämna tomt för att i stället avisera varje global administratör.

### `filter_terms`

**Filtertermer**

Ange en lista med termer, en per rad, som ska filtreras bort från webbsidor och e-postmeddelanden. Dessa termer ersätts med ***.

### `force_renew_password_at_first_login`

**Tvinga lösenordsförnyelse vid första inloggningen**

Detta är en enkel åtgärd för att öka säkerheten på din portal genom att be användarna att omedelbart byta lösenord, så att det som skickades via e-post inte längre är giltigt och de därefter använder ett som de själva har valt och som bara de känner till.

*Standard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Dölj brödsmula om 'inte tillåtet'**

Om användaren inte har behörighet att komma åt en viss sida, dölj även brödsmulan. Detta ökar säkerheten genom att undvika visning av onödig information.

*Standard: `false`*


### `login_max_attempt_before_blocking_account`

**Max antal inloggningsförsök före låsning**

Antal misslyckade inloggningsförsök som tolereras innan användarkontot låses och måste låsas upp av en administratör.

*Standard: `0`*

### `password_requirements`

**Minimala syntaxkrav för lösenord**

Definierar den struktur som krävs för användarlösenord. Exempel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Använd "specials" (plural) för att kräva specialtecken.

### `password_rotation_days`

**Intervall för lösenordsrotation (dagar)**

Antal dagar innan användare måste rotera sitt lösenord (0 = inaktiverat).

*Standard: `0`*


### `prevent_multiple_simultaneous_login`

**Förhindra samtidig inloggning**

Förhindra att användare ansluter med samma konto mer än en gång. Detta är ett bra alternativ på portaler med betalning per åtkomst, men kan vara begränsande under testning eftersom endast en webbläsare kan ansluta med ett givet konto.

*Standard: `false`*

### `proxy_settings`

**Proxyinställningar**

Vissa funktioner i Chamilo ansluter utåt från servern. Till exempel för att kontrollera att ett externt innehåll finns när en länk skapas eller när en inbäddad sida visas i lärstigen. Om din Chamilo-server använder en proxy för att komma ut från sitt nätverk är det här du konfigurerar den.

### `security_block_inactive_users_immediately`

**Blockera inaktiverade användare omedelbart**

Blockera omedelbart användare som har inaktiverats av administratören via användarhanteringen. I annat fall behåller användare som har inaktiverats sina tidigare behörigheter tills de loggar ut.

*Standard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy är en effektiv åtgärd för att skydda din webbplats mot XSS-attacker. Genom att vitlista källor för godkänt innehåll kan du förhindra att webbläsaren läser in skadliga resurser. Den här inställningen är särskilt komplicerad att sätta tillsammans med WYSIWYG-redigerare, men om du lägger till alla domäner som du vill tillåta för iframe-inkludering i child-src-satsen bör det här exemplet fungera för dig. Du kan förhindra att JavaScript körs från externa källor (inklusive inuti SVG-bilder) genom att använda en strikt lista i argumentet 'script-src'. Lämna tomt för att inaktivera. Exempelinställning: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy endast rapportering**

Den här inställningen gör det möjligt att experimentera genom att rapportera men inte verkställa viss Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning skyddar din webbplats mot MiTM-attacker som använder förfalskade X.509-certifikat. Genom att vitlista endast de identiteter som webbläsaren ska lita på skyddas dina användare om en certifikatutfärdare komprometteras.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning endast rapportering**

Den här inställningen gör det möjligt att experimentera genom att rapportera men inte verkställa viss HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy är en ny header som gör det möjligt för en webbplats att styra hur mycket information webbläsaren inkluderar vid navigering bort från ett dokument och bör sättas av alla webbplatser.

*Standard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Sessionscookie samesite**

Aktivera parametern samesite:None för sessionscookien. Mer information: https://www.chromium.org/updates/same-site och https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security är en utmärkt funktion att stödja på din webbplats och stärker din TLS-implementering genom att få User Agent att tvinga fram användning av HTTPS. Rekommenderat värde: 'strict-transport-security: max-age=63072000; includeSubDomains'. Se https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Du kan inkludera suffixet 'preload', men detta har konsekvenser för toppdomänen (TLD), så det bör troligen inte göras lättvindigt. Se https://hstspreload.org/. Lämna tomt för att inaktivera.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options hindrar en webbläsare från att försöka MIME-sniffa innehållstypen och tvingar den att hålla sig till den deklarerade content-type. Det enda giltiga värdet för den här headern är 'nosniff'.

*Standard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options talar om för webbläsaren om du vill tillåta att din webbplats rammas in eller inte. Genom att förhindra att en webbläsare rammar in din webbplats kan du försvara dig mot attacker som clickjacking. Om du definierar en URL här ska den definiera den eller de URL:er från vilka ditt innehåll ska vara synligt, inte de URL:er från vilka din webbplats tar emot innehåll. Om till exempel din huvudsakliga URL (root_web ovan) är https://11.chamilo.org/ ska den här inställningen vara: 'ALLOW-FROM https://11.chamilo.org'. Dessa headers gäller endast sidor där Chamilo ansvarar för genereringen av HTTP-headers (dvs. '.php'-filer). De gäller inte statiska filer. Om du experimenterar med den här funktionen ska du också uppdatera webbserverns konfiguration så att rätt headers läggs till för statiska filer. Se CDN-konfigurationsdokumentationen ovan (sök efter 'add_header') för mer information. Rekommenderat (strängt) värde för den här inställningen, om den är aktiverad: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection anger konfigurationen för det filter mot cross-site scripting som är inbyggt i de flesta webbläsare. Rekommenderat värde '1; mode=block'.

*Standard: `1; mode=block`*


### `user_reset_password`

**Aktivera token för återställning av lösenord**

Det här alternativet gör det möjligt att generera en tidsbegränsad engångstoken som skickas via e-post till användaren för att återställa hans/hennes lösenord.

*Standard: `false`*

### `user_reset_password_token_limit`

**Tidsgräns för token för återställning av lösenord**

Antalet sekunder innan den genererade token automatiskt upphör att gälla och inte längre kan användas (en ny token måste genereras).

*Standard: `3600`*