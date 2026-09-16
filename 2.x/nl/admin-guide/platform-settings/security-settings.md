# Beveiligingsinstellingen

Loginbescherming, wachtwoordbeleid, beveiligingsheaders voor inhoud, tweestapsverificatie en het lichtgewicht inbraakdetectiesysteem.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Beveiliging**. Deze categorie bevat **31 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `2fa_enable`

**Tweestapsverificatie inschakelen**

Voegt velden toe aan de pagina voor wachtwoordupdates om tweestapsverificatie in te schakelen met een TOTP-authenticatie-app. Wanneer dit globaal is uitgeschakeld, zien gebruikers geen tweestapsverificatievelden en worden ze niet gevraagd om tweestapsverificatie bij het inloggen, zelfs als ze dit eerder hadden ingeschakeld.

*Standaard: `false`*

### `access_to_personal_file_for_all`

**Toegang tot persoonlijke bestanden voor iedereen**

Geeft onbeperkte toegang tot alle persoonlijke bestanden.

*Standaard: `false`*

### `admins_can_set_users_pass`

**Beheerders kunnen gebruikerswachtwoorden handmatig instellen**

[afgeleid] Wanneer ingeschakeld, kunnen beheerders handmatig gebruikerswachtwoorden instellen zonder dat gebruikers deze hoeven te resetten.

### `allow_captcha`

**CAPTCHA**

Schakel een CAPTCHA in op het inlogformulier, inschrijfformulier en formulier voor vergeten wachtwoord om wachtwoordkraken te voorkomen.

*Standaard: `false`*

### `allow_online_users_by_status`

**Filter gebruikers die als online worden gezien**

Beperkt de zichtbaarheid van online gebruikers tot specifieke gebruikersrollen.

### `allow_strength_pass_checker`

**Wachtwoordsterktecontrole**

Schakel deze optie in om een visuele indicator van wachtwoordsterkte toe te voegen wanneer de gebruiker zijn/haar wachtwoord wijzigt. Dit voorkomt NIET dat zwakke wachtwoorden worden toegevoegd, het dient alleen als visuele hulp.

*Standaard: `true`*

### `anonymous_autoprovisioning`

**Automatisch meer anonieme gebruikers aanmaken**

Creëert dynamisch nieuwe anonieme gebruikers om een hoge bezoekersstroom te ondersteunen.

*Standaard: `false`*

### `captcha_number_mistakes_to_block_account`

**Toegestane CAPTCHA-fouten**

Het aantal keren dat een gebruiker een fout mag maken in de CAPTCHA-box voordat zijn account wordt geblokkeerd.

### `captcha_time_to_block`

**Blokkeringstijd voor CAPTCHA-account**

Als de gebruiker het maximale aantal toegestane inlogfouten bereikt (bij gebruik van CAPTCHA), wordt zijn/haar account voor dit aantal minuten geblokkeerd.

### `check_password`

**Controleer wachtwoordvereisten**

Schakel validatie van de hierboven gedefinieerde wachtwoordvereisten in tijdens het aanmaken of bijwerken van een wachtwoord.

*Standaard: `false`*

### `filter_terms`

**Filtertermen**

Geef een lijst van termen, één per regel, die uit webpagina's en e-mails moeten worden gefilterd. Deze termen worden vervangen door ***.

### `force_renew_password_at_first_login`

**Wachtwoordvernieuwing forceren bij eerste inloggen**

Dit is een eenvoudige maatregel om de beveiliging van uw portaal te verhogen door gebruikers te vragen hun wachtwoord onmiddellijk te wijzigen, zodat het wachtwoord dat per e-mail is verzonden niet langer geldig is en ze een wachtwoord gebruiken dat ze zelf hebben bedacht en dat alleen zij kennen.

*Standaard: `false`*

### `hide_breadcrumb_if_not_allowed`

**Broodkruimel verbergen bij 'geen toegang'**

Als de gebruiker geen toegang heeft tot een specifieke pagina, wordt ook de broodkruimel verborgen. Dit verhoogt de beveiliging door het tonen van onnodige informatie te vermijden.

*Standaard: `false`*

### `login_max_attempt_before_blocking_account`

**Maximaal aantal inlogpogingen voor vergrendeling**

Aantal mislukte inlogpogingen dat wordt getolereerd voordat het gebruikersaccount wordt vergrendeld en door een beheerder moet worden ontgrendeld.

*Standaard: `0`*

### `password_requirements`

**Minimale syntactische vereisten voor wachtwoorden**

Definieert de vereiste structuur voor gebruikerswachtwoorden. Voorbeeld: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Gebruik "specials" (meervoud) om speciale tekens te vereisen.

### `password_rotation_days`

**Interval voor wachtwoordrotatie (dagen)**

Aantal dagen voordat gebruikers hun wachtwoord moeten wijzigen (0 = uitgeschakeld).

*Standaard: `0`*

### `prevent_multiple_simultaneous_login`

**Gelijktijdig inloggen voorkomen**

Voorkomt dat gebruikers meer dan één keer met hetzelfde account inloggen. Dit is een goede optie voor portals met betaalde toegang, maar kan beperkend zijn tijdens testen omdat slechts één browser met een bepaald account kan verbinden.

*Standaard: `false`*

### `proxy_settings`

**Proxy-instellingen**

Sommige functies van Chamilo maken verbinding met externe bronnen vanaf de server. Bijvoorbeeld om te controleren of externe inhoud bestaat bij het maken van een link of het tonen van een ingebedde pagina in het leerpad. Als uw Chamilo-server een proxy gebruikt om buiten het netwerk te komen, kunt u dit hier configureren.

### `security_block_inactive_users_immediately`

**Uitgeschakelde gebruikers onmiddellijk blokkeren**

Blokkeert onmiddellijk gebruikers die door de beheerder zijn uitgeschakeld via gebruikersbeheer. Anders behouden uitgeschakelde gebruikers hun eerdere rechten totdat ze uitloggen.

*Standaard: `false`*

---
### `security_content_policy`

**Content Security Policy**

Content Security Policy is een effectieve maatregel om uw site te beschermen tegen XSS-aanvallen. Door bronnen van goedgekeurde inhoud op een witte lijst te zetten, kunt u voorkomen dat de browser schadelijke assets laadt. Deze instelling is bijzonder ingewikkeld om in te stellen met WYSIWYG-editors, maar als u alle domeinen die u wilt autoriseren voor het insluiten van iframes toevoegt aan de child-src-verklaring, zou dit voorbeeld voor u moeten werken. U kunt voorkomen dat JavaScript wordt uitgevoerd vanaf externe bronnen (inclusief binnen SVG-afbeeldingen) door een strikte lijst te gebruiken in het 'script-src'-argument. Laat leeg om uit te schakelen. Voorbeeldinstelling: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy alleen rapportage**

Met deze instelling kunt u experimenteren door te rapporteren zonder sommige Content Security Policy-regels af te dwingen.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning beschermt uw site tegen MiTM-aanvallen met behulp van valse X.509-certificaten. Door alleen de identiteiten op een witte lijst te zetten die de browser moet vertrouwen, zijn uw gebruikers beschermd in het geval dat een certificeringsinstantie wordt gecompromitteerd.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning alleen rapportage**

Met deze instelling kunt u experimenteren door te rapporteren zonder sommige HTTP Public Key Pinning-regels af te dwingen.

### `security_referrer_policy`

**Beleid voor verwijzende bronnen**

Referrer Policy is een nieuwe header die een site in staat stelt te bepalen hoeveel informatie de browser meeneemt bij navigatie weg van een document en zou door alle sites moeten worden ingesteld.

*Standaard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Sessie-cookie samesite**

Schakel de samesite:None-parameter in voor de sessie-cookie. Meer informatie: https://www.chromium.org/updates/same-site en https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standaard: `false`*


### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security is een uitstekende functie om op uw site te ondersteunen en versterkt uw implementatie van TLS door de User Agent te dwingen HTTPS te gebruiken. Aanbevolen waarde: 'strict-transport-security: max-age=63072000; includeSubDomains'. Zie https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. U kunt het 'preload'-achtervoegsel toevoegen, maar dit heeft consequenties voor het topniveaudomein (TLD), dus waarschijnlijk niet lichtzinnig te doen. Zie https://hstspreload.org/. Laat leeg om uit te schakelen.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options voorkomt dat een browser probeert de inhoudstype te MIME-sniffen en dwingt deze om vast te houden aan het gedeclareerde inhoudstype. De enige geldige waarde voor deze header is 'nosniff'.

*Standaard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options vertelt de browser of u wilt toestaan dat uw site wordt ingesloten in een frame of niet. Door te voorkomen dat een browser uw site in een frame plaatst, kunt u zich verdedigen tegen aanvallen zoals clickjacking. Als u hier een URL definieert, moet deze de URL(s) specificeren van waaruit uw inhoud zichtbaar moet zijn, niet de URL's van waaruit uw site inhoud accepteert. Bijvoorbeeld, als uw hoofd-URL (root_web hierboven) https://11.chamilo.org/ is, dan zou deze instelling moeten zijn: 'ALLOW-FROM https://11.chamilo.org'. Deze headers zijn alleen van toepassing op pagina's waar Chamilo verantwoordelijk is voor het genereren van de HTTP-headers (d.w.z. '.php'-bestanden). Het geldt niet voor statische bestanden. Als u met deze functie speelt, zorg er dan voor dat u ook uw webserverconfiguratie bijwerkt om de juiste headers voor statische bestanden toe te voegen. Zie de CDN-configuratiedocumentatie hierboven (zoek naar 'add_header') voor meer informatie. Aanbevolen (strikte) waarde voor deze instelling, indien ingeschakeld: 'SAMEORIGIN'.

*Standaard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection stelt de configuratie in voor het cross-site scripting-filter dat in de meeste browsers is ingebouwd. Aanbevolen waarde '1; mode=block'.

*Standaard: `1; mode=block`*


### `user_reset_password`

**Wachtwoordreset-token inschakelen**

Met deze optie kan een eenmalig bruikbaar token worden gegenereerd dat per e-mail naar de gebruiker wordt gestuurd om zijn/haar wachtwoord te resetten.

*Standaard: `false`*


### `user_reset_password_token_limit`

**Tijdslimiet voor wachtwoordreset-token**

Het aantal seconden voordat het gegenereerde token automatisch verloopt en niet meer kan worden gebruikt (een nieuw token moet worden gegenereerd).

*Standaard: `3600`*