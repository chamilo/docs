# Beveiligingsinstellingen

Aanmeldbeveiliging, wachtwoordbeleid, content security headers, tweefactorauthenticatie en het lichtgewicht inbraakdetectiesysteem.

Deze pagina behandelt het beveiligings*beleid*. Voor de monitoringtools die het platform volgens dit beleid bewaken (logs van aanmeldpogingen, inbraakdetectiegebeurtenissen, scans van wachtwoordsterkte en controles van bestandsintegriteit), zie [Beveiliging](../security/README.md).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Beveiliging**. Deze categorie bevat **32 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u die instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `2fa_enable`

**2FA inschakelen**

Voegt velden toe op de pagina voor wachtwoordwijziging om 2FA in te schakelen met een TOTP-authenticator-app. Wanneer dit globaal is uitgeschakeld, zien gebruikers geen 2FA-velden en worden ze bij het aanmelden niet om 2FA gevraagd, ook niet als ze dit eerder hadden ingeschakeld.

*Standaard: `false`*

### `access_to_personal_file_for_all`

**Toegang tot persoonlijk bestand voor iedereen**

Staat toegang tot alle persoonlijke bestanden toe zonder beperking

*Standaard: `false`*


### `admins_can_set_users_pass`

**Beheerders kunnen wachtwoorden van gebruikers handmatig instellen**

[inferred] Wanneer ingeschakeld, kunnen beheerders wachtwoorden van gebruikers rechtstreeks handmatig instellen zonder dat gebruikers ze hoeven te resetten.

### `allow_captcha`

**CAPTCHA**

Schakel een CAPTCHA in op het aanmeldformulier, het inschrijvingsformulier en het formulier voor verloren wachtwoord om wachtwoord-hammering te voorkomen

*Standaard: `false`*

### `allow_online_users_by_status`

**Filter gebruikers die als online zichtbaar zijn**

Beperkt de zichtbaarheid van online gebruikers tot specifieke gebruikersrollen.

### `allow_strength_pass_checker`

**Controle van wachtwoordsterkte**

Schakel deze optie in om een visuele indicator van wachtwoordsterkte toe te voegen wanneer de gebruiker zijn/haar wachtwoord wijzigt. Dit voorkomt NIET dat zwakke wachtwoorden worden toegevoegd; het fungeert alleen als visuele hulp.

*Standaard: `true`*


### `anonymous_autoprovisioning`

**Meer anonieme gebruikers automatisch provisioneren**

Maakt dynamisch nieuwe anonieme gebruikers aan om hoge bezoekersaantallen te ondersteunen.

*Standaard: `false`*


### `captcha_number_mistakes_to_block_account`

**Toegestane CAPTCHA-fouten**

Het aantal keren dat een gebruiker een fout mag maken in het CAPTCHA-vak voordat het account wordt vergrendeld.

### `captcha_time_to_block`

**CAPTCHA-accountvergrendelingstijd**

Als de gebruiker het maximum aantal toegestane aanmeldfouten bereikt (bij gebruik van de CAPTCHA), wordt het account voor dit aantal minuten vergrendeld.

### `check_password`

**Wachtwoordvereisten controleren**

Schakel validatie in van de hierboven gedefinieerde wachtwoordvereisten tijdens het aanmaken of bijwerken van een wachtwoord.

*Standaard: `false`*


### `file_integrity_check_notify_admins` **v3**

**Ontvangers van meldingen over bestandsintegriteitscontrole**

Door komma's gescheiden lijst van e-mailadressen die moeten worden verwittigd wanneer een scan van de bestandsintegriteit een wijziging detecteert. Laat leeg om in plaats daarvan elke globale beheerder te verwittigen.

### `filter_terms`

**Filtertermen**

Geef een lijst van termen, één per regel, die uit webpagina's en e-mails moeten worden gefilterd. Deze termen worden vervangen door ***.

### `force_renew_password_at_first_login`

**Wachtwoordvernieuwing afdwingen bij eerste aanmelding**

Dit is een eenvoudige maatregel om de beveiliging van uw portaal te verhogen door gebruikers te vragen hun wachtwoord onmiddellijk te wijzigen, zodat het wachtwoord dat per e-mail is overgedragen niet langer geldig is en zij vervolgens een wachtwoord gebruiken dat zij zelf hebben bedacht en dat alleen zij kennen.

*Standaard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Broodkruimel verbergen indien 'niet toegestaan'**

Als de gebruiker geen toegang heeft tot een specifieke pagina, verberg dan ook de broodkruimel. Dit verhoogt de beveiliging door te voorkomen dat onnodige informatie wordt weergegeven.

*Standaard: `false`*


### `login_max_attempt_before_blocking_account`

**Max. aanmeldpogingen vóór vergrendeling**

Aantal mislukte aanmeldpogingen dat wordt getolereerd voordat het gebruikersaccount wordt vergrendeld en door een beheerder moet worden ontgrendeld.

*Standaard: `0`*

### `password_requirements`

**Minimale syntaxisvereisten voor wachtwoorden**

Definieert de vereiste structuur voor gebruikerswachtwoorden. Voorbeeld: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Gebruik "specials" (meervoud) om speciale tekens te vereisen.

### `password_rotation_days`

**Interval voor wachtwoordrotatie (dagen)**

Aantal dagen voordat gebruikers hun wachtwoord moeten roteren (0 = uitgeschakeld).

*Standaard: `0`*


### `prevent_multiple_simultaneous_login`

**Gelijktijdige aanmelding voorkomen**

Voorkom dat gebruikers meer dan eens met hetzelfde account verbinden. Dit is een goede optie op portalen met betaling per toegang, maar kan beperkend zijn tijdens testdoeleinden omdat slechts één browser met een gegeven account kan verbinden.

*Standaard: `false`*

### `proxy_settings`

**Proxy-instellingen**

Sommige functies van Chamilo maken vanaf de server verbinding met de buitenwereld. Bijvoorbeeld om te controleren of externe inhoud bestaat bij het aanmaken van een link of het tonen van een ingesloten pagina in het leerpad. Als uw Chamilo-server een proxy gebruikt om het netwerk te verlaten, is dit de plek om die te configureren.

### `security_block_inactive_users_immediately`

**Uitgeschakelde gebruikers onmiddellijk blokkeren**

Blokkeer onmiddellijk gebruikers die door de beheerder via het gebruikersbeheer zijn uitgeschakeld. Anders behouden uitgeschakelde gebruikers hun eerdere rechten totdat ze zich afmelden.

*Standaard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy is een doeltreffende maatregel om uw site te beschermen tegen XSS-aanvallen. Door goedgekeurde bronnen van inhoud op een whitelist te zetten, kunt u voorkomen dat de browser schadelijke assets laadt. Deze instelling is bijzonder ingewikkeld in combinatie met WYSIWYG-editors, maar als u alle domeinen die u wilt toestaan voor iframe-insluiting toevoegt in de child-src-instructie, zou dit voorbeeld voor u moeten werken. U kunt voorkomen dat JavaScript van externe bronnen wordt uitgevoerd (inclusief binnen SVG-afbeeldingen) door een strikte lijst te gebruiken in het argument 'script-src'. Laat leeg om uit te schakelen. Voorbeeldinstelling: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy alleen rapporteren**

Met deze instelling kunt u experimenteren door bepaalde Content Security Policy te rapporteren maar niet af te dwingen.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning beschermt uw site tegen MiTM-aanvallen met valse X.509-certificaten. Door alleen de identiteiten op een whitelist te zetten die de browser mag vertrouwen, zijn uw gebruikers beschermd als een certificeringsinstantie wordt gecompromitteerd.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning alleen rapporteren**

Met deze instelling kunt u experimenteren door bepaalde HTTP Public Key Pinning te rapporteren maar niet af te dwingen.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy is een nieuwe header waarmee een site kan bepalen hoeveel informatie de browser meestuurt bij navigatie weg van een document, en zou door alle sites moeten worden ingesteld.

*Standaard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Samesite voor sessiecookie**

Schakel de parameter samesite:None in voor de sessiecookie. Meer informatie: https://www.chromium.org/updates/same-site en https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standaard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security is een uitstekende functie om op uw site te ondersteunen en versterkt uw implementatie van TLS door de User Agent te laten afdwingen dat HTTPS wordt gebruikt. Aanbevolen waarde: 'strict-transport-security: max-age=63072000; includeSubDomains'. Zie https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. U kunt het achtervoegsel 'preload' toevoegen, maar dit heeft gevolgen voor het topniveaudomein (TLD), dus waarschijnlijk niet lichtvaardig te doen. Zie https://hstspreload.org/. Laat leeg om uit te schakelen.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options voorkomt dat een browser het contenttype probeert te MIME-sniffen en dwingt hem vast te houden aan het opgegeven content-type. De enige geldige waarde voor deze header is 'nosniff'.

*Standaard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options vertelt de browser of u wilt toestaan dat uw site in een frame wordt geplaatst of niet. Door te voorkomen dat een browser uw site in een frame plaatst, kunt u zich verdedigen tegen aanvallen zoals clickjacking. Als u hier een URL definieert, moet die de URL('s) aangeven van waaruit uw inhoud zichtbaar mag zijn, niet de URL's van waaruit uw site inhoud accepteert. Als bijvoorbeeld uw hoofd-URL (root_web hierboven) https://11.chamilo.org/ is, dan moet deze instelling zijn: 'ALLOW-FROM https://11.chamilo.org'. Deze headers gelden alleen voor pagina's waarbij Chamilo verantwoordelijk is voor het genereren van de HTTP-headers (d.w.z. '.php'-bestanden). Ze gelden niet voor statische bestanden. Als u met deze functie experimenteert, zorg er dan voor dat u ook de configuratie van uw webserver bijwerkt om de juiste headers voor statische bestanden toe te voegen. Zie de CDN-configuratiedocumentatie hierboven (zoek naar 'add_header') voor meer informatie. Aanbevolen (strikte) waarde voor deze instelling, indien ingeschakeld: 'SAMEORIGIN'.

*Standaard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection stelt de configuratie in van het filter voor cross-site scripting dat in de meeste browsers is ingebouwd. Aanbevolen waarde '1; mode=block'.

*Standaard: `1; mode=block`*


### `user_reset_password`

**Token voor wachtwoordherstel inschakelen**

Met deze optie kan een eenmalig, verlopend token worden gegenereerd dat per e-mail naar de gebruiker wordt gestuurd om zijn/haar wachtwoord te herstellen.

*Standaard: `false`*

### `user_reset_password_token_limit`

**Tijdslimiet voor wachtwoordhersteltoken**

Het aantal seconden voordat het gegenereerde token automatisch verloopt en niet meer kan worden gebruikt (er moet een nieuw token worden gegenereerd).

*Standaard: `3600`*