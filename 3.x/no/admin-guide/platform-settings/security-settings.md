# Sikkerhetsinnstillinger

Innloggingsbeskyttelse, passordpolicy, innholdssikkerhetsoverskrifter, tofaktorautentisering og det lette inntrengingsdeteksjonssystemet.

Denne siden dekker sikkerhets*policy*. For overvåkingsverktøyene som overvåker plattformen ved hjelp av denne policyen (logger for innloggingsforsøk, hendelser for inntrengingsdeteksjon, skanninger av passordstyrke og filintegritetskontroller), se [Sikkerhet](../security/README.md).

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Sikkerhet**. Denne kategorien inneholder **32 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `2fa_enable`

**Aktiver 2FA**

Legg til felt på siden for passordoppdatering for å aktivere 2FA med en TOTP-autentiseringsapp. Når funksjonen er deaktivert globalt, vil ikke brukere se 2FA-felt og vil ikke bli bedt om 2FA ved innlogging, selv om de tidligere har aktivert det.

*Standard: `false`*

### `access_to_personal_file_for_all`

**Tilgang til personlig fil for alle**

Tillater tilgang til alle personlige filer uten restriksjoner

*Standard: `false`*


### `admins_can_set_users_pass`

**Administratorer kan sette brukernes passord manuelt**

[inferred] Når aktivert kan administratorer sette brukerpassord manuelt direkte uten at brukerne må tilbakestille dem.

### `allow_captcha`

**CAPTCHA**

Aktiver en CAPTCHA på innloggingsskjemaet, påmeldingsskjemaet og skjemaet for glemt passord for å unngå passordhamring

*Standard: `false`*

### `allow_online_users_by_status`

**Filtrer brukere som kan vises som pålogget**

Begrenser synligheten av påloggede brukere til bestemte brukerroller.

### `allow_strength_pass_checker`

**Passordstyrkekontroll**

Aktiver dette alternativet for å legge til en visuell indikator for passordstyrke når brukeren endrer passordet sitt. Dette vil IKKE hindre at dårlige passord blir lagt til; det fungerer kun som en visuell hjelp.

*Standard: `true`*


### `anonymous_autoprovisioning`

**Automatisk provisjonering av flere anonyme brukere**

Oppretter dynamisk nye anonyme brukere for å støtte høy besøksbelastning.

*Standard: `false`*


### `captcha_number_mistakes_to_block_account`

**Tillatt antall CAPTCHA-feil**

Antall ganger en bruker kan gjøre feil i CAPTCHA-feltet før kontoen blir låst.

### `captcha_time_to_block`

**CAPTCHA-kontolåsetid**

Hvis brukeren når maksimalt tillatt antall innloggingsfeil (når CAPTCHA brukes), vil kontoen bli låst i dette antallet minutter.

### `check_password`

**Kontroller passordkrav**

Aktiver validering av passordkravene definert ovenfor under opprettelse eller oppdatering av passord.

*Standard: `false`*


### `file_integrity_check_notify_admins` **v3**

**Mottakere av varsler om filintegritetskontroll**

Kommadelt liste over e-postadresser som skal varsles når en filintegritetsskanning oppdager en endring. La feltet stå tomt for å varsle alle globale administratorer i stedet.

### `filter_terms`

**Filtertermer**

Oppgi en liste over termer, én per linje, som skal filtreres ut av nettsider og e-poster. Disse termene vil bli erstattet med ***.

### `force_renew_password_at_first_login`

**Tving passordfornyelse ved første innlogging**

Dette er et enkelt tiltak for å øke sikkerheten på portalen din ved å be brukerne om å endre passordet umiddelbart, slik at det som ble overført via e-post ikke lenger er gyldig, og de deretter bruker et de selv har laget og som bare de kjenner.

*Standard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Skjul brødsmule hvis «ikke tillatt»**

Hvis brukeren ikke har tilgang til en bestemt side, skjul også brødsmulen. Dette øker sikkerheten ved å unngå visning av unødvendig informasjon.

*Standard: `false`*


### `login_max_attempt_before_blocking_account`

**Maksimalt antall innloggingsforsøk før nedlåsing**

Antall mislykkede innloggingsforsøk som tolereres før brukerkontoen låses og må låses opp av en administrator.

*Standard: `0`*

### `password_requirements`

**Minimale syntakskrav til passord**

Definerer den påkrevde strukturen for brukerpassord. Eksempel: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Bruk "specials" (flertall) for å kreve spesialtegn.

### `password_rotation_days`

**Intervall for passordrotasjon (dager)**

Antall dager før brukere må rotere passordet sitt (0 = deaktivert).

*Standard: `0`*


### `prevent_multiple_simultaneous_login`

**Forhindre samtidig innlogging**

Forhindre at brukere kobler til med samme konto mer enn én gang. Dette er et godt alternativ på portaler med betaling per tilgang, men kan være restriktivt under testing siden bare én nettleser kan koble til med en gitt konto.

*Standard: `false`*

### `proxy_settings`

**Proxyinnstillinger**

Enkelte funksjoner i Chamilo vil koble seg til omverdenen fra serveren. For eksempel for å kontrollere at eksternt innhold finnes når man oppretter en lenke eller viser en innbygd side i læringsstien. Hvis Chamilo-serveren din bruker en proxy for å komme ut av nettverket sitt, er dette stedet å konfigurere den.

### `security_block_inactive_users_immediately`

**Blokker deaktiverte brukere umiddelbart**

Blokker umiddelbart brukere som er deaktivert av administratoren via brukeradministrasjonen. Ellers vil brukere som er deaktivert beholde sine tidligere privilegier inntil de logger ut.

*Standard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy er et effektivt tiltak for å beskytte nettstedet ditt mot XSS-angrep. Ved å tillate kilder til godkjent innhold kan du hindre nettleseren i å laste skadelige ressurser. Denne innstillingen er særlig komplisert å sette med WYSIWYG-redigerere, men hvis du legger til alle domenene du vil autorisere for iframe-inkludering i child-src-setningen, bør dette eksempelet fungere for deg. Du kan hindre JavaScript i å kjøre fra eksterne kilder (inkludert inne i SVG-bilder) ved å bruke en streng liste i argumentet 'script-src'. La stå tomt for å deaktivere. Eksempelinnstilling: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy kun rapportering**

Denne innstillingen lar deg eksperimentere ved å rapportere, men ikke håndheve, noe Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning beskytter nettstedet ditt mot MiTM-angrep som bruker falske X.509-sertifikater. Ved å tillate kun identitetene nettleseren skal stole på, er brukerne dine beskyttet dersom en sertifikatutsteder blir kompromittert.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning kun rapportering**

Denne innstillingen lar deg eksperimentere ved å rapportere, men ikke håndheve, noe HTTP Public Key Pinning.

### `security_referrer_policy`

**Sikkerhets-Referrer Policy**

Referrer Policy er en ny header som lar et nettsted styre hvor mye informasjon nettleseren inkluderer ved navigering bort fra et dokument, og bør settes av alle nettsteder.

*Standard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Sesjonsinformasjonskapsel samesite**

Aktiver parameteren samesite:None for sesjonsinformasjonskapselen. Mer informasjon: https://www.chromium.org/updates/same-site og https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security er en utmerket funksjon å støtte på nettstedet ditt og styrker implementeringen av TLS ved at User Agent håndhever bruk av HTTPS. Anbefalt verdi: 'strict-transport-security: max-age=63072000; includeSubDomains'. Se https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Du kan inkludere suffikset 'preload', men dette har konsekvenser for toppnivådomenet (TLD), så det bør sannsynligvis ikke gjøres lettvint. Se https://hstspreload.org/. La stå tomt for å deaktivere.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options hindrer en nettleser i å prøve å MIME-sniffe innholdstypen og tvinger den til å holde seg til den oppgitte content-type. Den eneste gyldige verdien for denne headeren er 'nosniff'.

*Standard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options forteller nettleseren om du vil tillate at nettstedet ditt rammes inn eller ikke. Ved å hindre en nettleser i å ramme inn nettstedet ditt kan du forsvare deg mot angrep som clickjacking. Hvis du definerer en URL her, skal den definere URL-en(e) som innholdet ditt skal være synlig fra, ikke URL-ene som nettstedet ditt godtar innhold fra. For eksempel, hvis hoved-URL-en din (root_web ovenfor) er https://11.chamilo.org/, bør denne innstillingen være: 'ALLOW-FROM https://11.chamilo.org'. Disse headerne gjelder kun sider der Chamilo er ansvarlig for generering av HTTP-headere (dvs. '.php'-filer). De gjelder ikke statiske filer. Hvis du eksperimenterer med denne funksjonen, må du også oppdatere webserverkonfigurasjonen for å legge til de riktige headerne for statiske filer. Se CDN-konfigurasjonsdokumentasjonen ovenfor (søk etter 'add_header') for mer informasjon. Anbefalt (streng) verdi for denne innstillingen, hvis aktivert: 'SAMEORIGIN'.

*Standard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection setter konfigurasjonen for filteret mot krysssteds-skripting som er innebygd i de fleste nettlesere. Anbefalt verdi '1; mode=block'.

*Standard: `1; mode=block`*


### `user_reset_password`

**Aktiver token for tilbakestilling av passord**

Dette valget gjør det mulig å generere et utløpende engangstoken som sendes på e-post til brukeren for å tilbakestille hans/hennes passord.

*Standard: `false`*

### `user_reset_password_token_limit`

**Tidsbegrensning for token for tilbakestilling av passord**

Antall sekunder før det genererte tokenet automatisk utløper og ikke lenger kan brukes (et nytt token må genereres).

*Standard: `3600`*