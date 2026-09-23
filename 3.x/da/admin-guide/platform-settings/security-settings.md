# Sikkerhedsindstillinger

Loginbeskyttelse, adgangskodepolitik, content security headers, tofaktorgodkendelse og det letvægts-indbrudsdetektionssystem.

Denne side omhandler sikkerheds*politik*. For de overvågningsværktøjer, der overvåger platformen ud fra denne politik (logfiler over loginforsøg, indbrudsdetektionshændelser, scanning af adgangskodestyrke og kontrol af filintegritet), se [Sikkerhed](../security/README.md).

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Sikkerhed**. Denne kategori indeholder **32 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `2fa_enable`

**Aktivér 2FA**

Tilføj felter på siden til opdatering af adgangskode for at aktivere 2FA med en TOTP-autentificeringsapp. Når funktionen er deaktiveret globalt, vil brugerne ikke se 2FA-felter og vil ikke blive bedt om 2FA ved login, selvom de tidligere har aktiveret det.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Adgang til personlig fil for alle**

Tillader adgang til alle personlige filer uden begrænsning

*Standard: `false`*


### `admins_can_set_users_pass`

**Administratorer kan sætte brugeres adgangskoder manuelt**

[inferred] Når indstillingen er aktiveret, kan administratorer manuelt sætte brugeradgangskoder direkte uden at kræve, at brugerne nulstiller dem.

### `allow_captcha`

**CAPTCHA**

Aktivér en CAPTCHA på loginformularen, tilmeldingsformularen og formularen til glemt adgangskode for at undgå password hammering

*Standard: `false`*

### `allow_online_users_by_status`

**Filtrer brugere, der kan ses som online**

Begrænser synligheden af online brugere til bestemte brugerroller.

### `allow_strength_pass_checker`

**Kontrol af adgangskodestyrke**

Aktivér denne indstilling for at tilføje en visuel indikator for adgangskodestyrke, når brugeren ændrer sin adgangskode. Dette vil IKKE forhindre, at dårlige adgangskoder tilføjes; det fungerer kun som en visuel hjælp.

*Standard: `true`*


### `anonymous_autoprovisioning`

**Auto-provisionér flere anonyme brugere**

Opretter dynamisk nye anonyme brugere for at understøtte høj besøgende-trafik.

*Standard: `false`*


### `captcha_number_mistakes_to_block_account`

**Tilladelse til CAPTCHA-fejl**

Antallet af gange en bruger kan lave en fejl i CAPTCHA-feltet, før vedkommendes konto låses.

### `captcha_time_to_block`

**CAPTCHA-kontolåsningstid**

Hvis brugeren når den maksimale tilladelse for loginfjæl (når CAPTCHA bruges), vil vedkommendes konto blive låst i dette antal minutter.

### `check_password`

**Kontrollér adgangskodekrav**

Aktivér validering af de adgangskodekrav, der er defineret ovenfor, under oprettelse eller opdatering af adgangskode.

*Standard: `false`*


### `file_integrity_check_notify_admins` **v3**

**Modtagere af underretning om filintegritetskontrol**

Kommasepareret liste over e-mailadresser, der skal underrettes, når en filintegritetsscanning registrerer en ændring. Lad feltet være tomt for i stedet at underrette alle globale administratorer.

### `filter_terms`

**Filtrer termer**

Angiv en liste over termer, én pr. linje, der skal filtreres ud af websider og e-mails. Disse termer vil blive erstattet af ***.

### `force_renew_password_at_first_login`

**Gennemtving fornyelse af adgangskode ved første login**

Dette er et enkelt tiltag til at øge sikkerheden på din portal ved at bede brugerne om straks at ændre deres adgangskode, så den, der blev overført via e-mail, ikke længere er gyldig, og de derefter vil bruge en, som de selv har fundet på, og som kun de kender.

*Standard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Skjul brødkrumme, hvis 'ikke tilladt'**

Hvis brugeren ikke har tilladelse til at tilgå en bestemt side, skal brødkrummen også skjules. Dette øger sikkerheden ved at undgå visning af unødvendig information.

*Standard: `false`*


### `login_max_attempt_before_blocking_account`

**Maks. loginforsøg før nedlukning**

Antal mislykkede loginforsøg, der tolereres, før brugerkontoen låses og skal låses op af en administrator.

*Standard: `0`*

### `password_requirements`

**Minimale syntakskrav til adgangskode**

Definerer den krævede struktur for brugeradgangskoder. Eksempel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Brug "specials" (flertal) for at kræve specialtegn.

### `password_rotation_days`

**Interval for rotation af adgangskode (dage)**

Antal dage, før brugerne skal rotere deres adgangskode (0 = deaktiveret).

*Standard: `0`*


### `prevent_multiple_simultaneous_login`

**Forhindr samtidig login**

Forhindr, at brugere forbinder med den samme konto mere end én gang. Dette er en god indstilling på portaler med betaling pr. adgang, men kan være restriktiv under test, da kun én browser kan forbinde med en given konto.

*Standard: `false`*

### `proxy_settings`

**Proxyindstillinger**

Nogle funktioner i Chamilo opretter forbindelse til omverdenen fra serveren. For eksempel for at sikre, at eksternt indhold findes, når der oprettes et link, eller når en indlejret side vises i læringsstien. Hvis din Chamilo-server bruger en proxy for at komme ud af sit netværk, er det her, den skal konfigureres.

### `security_block_inactive_users_immediately`

**Bloker deaktiverede brugere med det samme**

Bloker med det samme brugere, som er blevet deaktiveret af administratoren via brugeradministrationen. Ellers beholder brugere, der er blevet deaktiveret, deres tidligere rettigheder, indtil de logger ud.

*Standard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy er et effektivt middel til at beskytte dit websted mod XSS-angreb. Ved at hvidliste kilder til godkendt indhold kan du forhindre browseren i at indlæse ondsindede ressourcer. Denne indstilling er særligt kompliceret at sætte med WYSIWYG-editorer, men hvis du tilføjer alle de domæner, du vil tillade til iframe-inklusion, i child-src-erklæringen, bør dette eksempel virke for dig. Du kan forhindre JavaScript i at køre fra eksterne kilder (herunder inde i SVG-billeder) ved at bruge en streng liste i argumentet 'script-src'. Lad feltet være tomt for at deaktivere. Eksempelindstilling: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy kun rapportering**

Denne indstilling giver dig mulighed for at eksperimentere ved at rapportere, men ikke håndhæve, en vis Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning beskytter dit websted mod MiTM-angreb, der bruger falske X.509-certifikater. Ved kun at hvidliste de identiteter, som browseren bør stole på, er dine brugere beskyttet, hvis en certifikatudsteder kompromitteres.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning kun rapportering**

Denne indstilling giver dig mulighed for at eksperimentere ved at rapportere, men ikke håndhæve, en vis HTTP Public Key Pinning.

### `security_referrer_policy`

**Sikkerheds-Referrer Policy**

Referrer Policy er en ny header, der giver et websted mulighed for at styre, hvor meget information browseren inkluderer ved navigation væk fra et dokument, og bør sættes af alle websteder.

*Standard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Sessionscookie samesite**

Aktivér parameteren samesite:None for sessionscookien. Mere information: https://www.chromium.org/updates/same-site og https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security er en fremragende funktion at understøtte på dit websted og styrker din implementering af TLS ved at få User Agent til at håndhæve brugen af HTTPS. Anbefalet værdi: 'strict-transport-security: max-age=63072000; includeSubDomains'. Se https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Du kan inkludere suffikset 'preload', men det har konsekvenser for topdomænet (TLD), så det bør sandsynligvis ikke gøres let. Se https://hstspreload.org/. Lad feltet være tomt for at deaktivere.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options forhindrer en browser i at forsøge at MIME-sniffe indholdstypen og tvinger den til at holde sig til den erklærede content-type. Den eneste gyldige værdi for denne header er 'nosniff'.

*Standard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options fortæller browseren, om du vil tillade, at dit websted indrammes eller ej. Ved at forhindre en browser i at indramme dit websted kan du forsvare dig mod angreb som clickjacking. Hvis du definerer en URL her, skal den definere den eller de URL'er, hvorfra dit indhold skal være synligt, ikke de URL'er, hvorfra dit websted accepterer indhold. Hvis din hoved-URL (root_web ovenfor) for eksempel er https://11.chamilo.org/, skal denne indstilling være: 'ALLOW-FROM https://11.chamilo.org'. Disse headers gælder kun for sider, hvor Chamilo er ansvarlig for genereringen af HTTP-headers (dvs. '.php'-filer). De gælder ikke for statiske filer. Hvis du leger med denne funktion, skal du sørge for også at opdatere din webserverkonfiguration, så de rigtige headers tilføjes for statiske filer. Se CDN-konfigurationsdokumentationen ovenfor (søg efter 'add_header') for mere information. Anbefalet (streng) værdi for denne indstilling, hvis den er aktiveret: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection sætter konfigurationen for det filter mod cross-site scripting, der er indbygget i de fleste browsere. Anbefalet værdi '1; mode=block'.

*Standard: `1; mode=block`*


### `user_reset_password`

**Aktivér token til nulstilling af adgangskode**

Denne indstilling gør det muligt at generere et udløbende engangstoken, der sendes via e-mail til brugeren for at nulstille vedkommendes adgangskode.

*Standard: `false`*

### `user_reset_password_token_limit`

**Tidsgrænse for token til nulstilling af adgangskode**

Antallet af sekunder, før det genererede token automatisk udløber og ikke længere kan bruges (et nyt token skal genereres).

*Standard: `3600`*