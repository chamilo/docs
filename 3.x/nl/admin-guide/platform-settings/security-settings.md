# Beveiligingsinstellingen

Aanmeldbeveiliging, wachtwoordbeleid, contentbeveiligingsheaders, tweefactorauthenticatie en het lichtgewicht inbraakdetectiesysteem.

Deze pagina behandelt het beveiligings*beleid*. Voor de monitoringtools die het platform bewaken op basis van dit beleid (logboeken van aanmeldpogingen, inbraakdetectiegebeurtenissen, scans van wachtwoordsterkte en controles van bestandsintegriteit), zie [Beveiliging](../security/README.md).

Open deze instellingen via **Beheer > Configuratie-instellingen > Beveiliging**. Deze categorie bevat **40 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `2fa_enable`

**2FA inschakelen**

Voeg velden toe op de pagina voor het bijwerken van het wachtwoord om 2FA in te schakelen met een TOTP-authenticatorapp. Wanneer dit globaal is uitgeschakeld, zien gebruikers geen 2FA-velden en worden zij bij het aanmelden niet om 2FA gevraagd, ook niet als zij dit eerder hadden ingeschakeld.

*Standaard: `false`*

### `access_to_personal_file_for_all`

**Toegang tot persoonlijk bestand voor iedereen**

Staat toegang tot alle persoonlijke bestanden zonder beperking toe

*Standaard: `false`*


### `admins_can_set_users_pass`

**Beheerders kunnen wachtwoorden van gebruikers handmatig instellen**

[afgeleid] Wanneer dit is ingeschakeld, kunnen beheerders wachtwoorden van gebruikers rechtstreeks handmatig instellen zonder dat gebruikers deze hoeven te resetten.

### `allow_captcha`

**CAPTCHA**

Schakel een CAPTCHA in op het aanmeldformulier, het inschrijfformulier en het formulier voor een vergeten wachtwoord om wachtwoordhammering te voorkomen

*Standaard: `false`*

### `allow_online_users_by_status`

**Filter gebruikers die als online zichtbaar zijn**

Beperkt de zichtbaarheid van online gebruikers tot specifieke gebruikersrollen.

### `allow_strength_pass_checker`

**Controle van wachtwoordsterkte**

Schakel deze optie in om een visuele indicator van de wachtwoordsterkte toe te voegen wanneer de gebruiker zijn of haar wachtwoord wijzigt. Dit voorkomt NIET dat zwakke wachtwoorden worden toegevoegd; het dient alleen als visuele hulp.

*Standaard: `true`*


### `anonymous_autoprovisioning`

**Automatisch extra anonieme gebruikers aanmaken**

Maakt dynamisch nieuwe anonieme gebruikers aan om veel bezoekersverkeer te ondersteunen.

*Standaard: `false`*


### `captcha_number_mistakes_to_block_account`

**Toegestane CAPTCHA-fouten**

Het aantal keren dat een gebruiker een fout mag maken in het CAPTCHA-veld voordat zijn account wordt vergrendeld.

### `captcha_time_to_block`

**Vergrendelingstijd van het account bij CAPTCHA**

Als de gebruiker het maximale aantal toegestane aanmeldfouten bereikt (bij gebruik van de CAPTCHA), wordt zijn of haar account gedurende dit aantal minuten vergrendeld.

### `check_password`

**Wachtwoordvereisten controleren**

Schakel validatie in van de hierboven gedefinieerde wachtwoordvereisten bij het aanmaken of bijwerken van een wachtwoord.

*Standaard: `false`*


### `confidential_reporting_attachments_enabled`

**Vertrouwelijke bewijsbijlagen toestaan**

Bepaalt of melders bewijsbestanden kunnen bijvoegen bij een vertrouwelijke melding.

*Standaard: `true`*

### `confidential_reporting_enabled`

**Vertrouwelijke welzijnsmelding inschakelen**

Schakelt de workflow voor vertrouwelijke melding en onderzoek in. De opslag van de privésleutel voor versleuteling moet gereed zijn voordat dit wordt ingeschakeld. Zie [Vertrouwelijke melding](../security/confidential-reporting.md).

*Standaard: `false`*

### `confidential_reporting_min_reporters`

**Minimumaantal verschillende melders voor een onderzoek**

Een onderzoek wordt pas zichtbaar voor geautoriseerde onderzoekers nadat dit aantal verschillende melders meldingen heeft ingediend over dezelfde persoon. Geldig bereik: **2–10**.

*Standaard: `2`*

### `confidential_reporting_notifications_enabled`

**Meldingen van vertrouwelijke onderzoeken tonen**

Toont een interne aanduiding van in aanmerking komende onderzoeken. **Er worden geen e-mails of externe meldingen verzonden.**

*Standaard: `false`*

### `dynamic_client_registration`

**OAuth Dynamic Client Registration buiten MCP inschakelen**

Bepaalt aanvullende validatie van het registratiebereik van OAuth-clients wanneer de OAuth-server is ingeschakeld. Het rate-limited registratie-eindpunt blijft beschikbaar voor de ondersteunde MCP-registratiestroom. Deze instelling verleent geen toegang tot willekeurige toekomstige door OAuth beveiligde resources. Zie [OAuth Authorization Server](../authentication/oauth-server.md).

*Standaard: `false`*

### `file_integrity_check_notify_admins` **v3**

**Ontvangers van meldingen over bestandsintegriteitscontrole**

Door komma's gescheiden lijst van e-mailadressen die worden gewaarschuwd wanneer een scan van de bestandsintegriteit een wijziging detecteert. Laat leeg om in plaats daarvan elke globale beheerder te waarschuwen.

### `filter_terms`

**Termen filteren**

Geef een lijst met termen, één per regel, die uit webpagina's en e-mails moeten worden gefilterd. Deze termen worden vervangen door ***.

### `force_renew_password_at_first_login`

**Wachtwoordvernieuwing afdwingen bij eerste aanmelding**

Dit is een eenvoudige maatregel om de beveiliging van uw portaal te verhogen door gebruikers te vragen hun wachtwoord onmiddellijk te wijzigen, zodat het wachtwoord dat per e-mail is verzonden niet langer geldig is en zij vervolgens een wachtwoord gebruiken dat zij zelf hebben bedacht en dat alleen zij kennen.

*Standaard: `false`*


### `hide_breadcrumb_if_not_allowed`

**Broodkruimelpad verbergen bij 'niet toegestaan'**

Als de gebruiker geen toegang heeft tot een specifieke pagina, verberg dan ook het broodkruimelpad. Dit verhoogt de beveiliging door het weergeven van onnodige informatie te vermijden.

*Standaard: `false`*


### `login_max_attempt_before_blocking_account`

**Maximaal aantal aanmeldpogingen vóór vergrendeling**

Aantal mislukte aanmeldpogingen dat wordt getolereerd voordat het gebruikersaccount wordt vergrendeld en door een beheerder moet worden ontgrendeld.

*Standaard: `0`*

### `mcp_allowed_roles`

**MCP toestaan per rol**

JSON-toewijzing van Chamilo-gebruikersrollen die MCP mogen gebruiken. Een gebruiker moet overeenkomen met ten minste één ingeschakelde rol. Deze beperking geldt ook voor eerder gegenereerde API-sleutels en bestaande OAuth-verbindingen. Herkende sleutels zijn `ADMIN`, `COURSEMANAGER`, `STUDENT`, `HRM`, `SESSIONADMIN`, `STUDENT_BOSS` en `INVITEE`; ongeldige JSON weigert MCP voor elke rol. Bestaande configuraties kunnen nog steeds `DRH` gebruiken wanneer `HRM` ontbreekt; wanneer beide sleutels bestaan, heeft `HRM` voorrang. Zie [MCP](../mcp.md).

*Standaard: `{"ADMIN":true,"COURSEMANAGER":true,"STUDENT":false,"HRM":false,"SESSIONADMIN":false,"STUDENT_BOSS":false,"INVITEE":false}`*

### `mcp_enabled`

**MCP-server inschakelen**

Schakelt het Chamilo MCP-eindpunt en de interface voor persoonlijke MCP API-sleutels in. Wanneer uitgeschakeld, kunnen bestaande API-sleutels, OAuth-toegangstokens en JWT-referenties niet worden gebruikt op /mcp. Zolang dit is uitgeschakeld, wordt de knop **MCP API-sleutel** niet weergegeven op de sociale-netwerkpagina van de gebruiker. Zie [MCP](../mcp.md).

*Standaard: `false`*

### `password_requirements`

**Minimale syntaxisvereisten voor wachtwoorden**

Definieert de vereiste structuur voor gebruikerswachtwoorden. Voorbeeld: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Gebruik "specials" (meervoud) om speciale tekens te vereisen.

### `password_rotation_days`

**Interval voor wachtwoordrotatie (dagen)**

Aantal dagen voordat gebruikers hun wachtwoord moeten roteren (0 = uitgeschakeld).

*Standaard: `0`*


### `prevent_multiple_simultaneous_login`

**Gelijktijdige aanmelding voorkomen**

Voorkom dat gebruikers meer dan eens met hetzelfde account verbinding maken. Dit is een goede optie voor portalen met betaling per toegang, maar kan beperkend zijn tijdens tests, omdat slechts één browser verbinding kan maken met een bepaald account.

*Standaard: `false`*


### `proxy_settings`

**Proxy-instellingen**

Sommige functies van Chamilo maken vanaf de server verbinding met de buitenwereld. Bijvoorbeeld om te controleren of externe inhoud bestaat bij het aanmaken van een koppeling of het weergeven van een ingesloten pagina in het leerpad. Als uw Chamilo-server een proxy gebruikt om zijn netwerk te verlaten, is dit de plaats om die te configureren.

### `remember_me_days`

**Duur van Onthoud mij (dagen)**

Stelt de duur in van persistente aanmeldcookies en hun databasetokens. Accepteert **0–90** dagen; `0` schakelt de optie Onthoud mij uit, en het aanmeldformulier toont deze optie alleen bij HTTPS-verbindingen.

*Standaard: `14` dagen*

### `security_block_inactive_users_immediately`

**Uitgeschakelde gebruikers onmiddellijk blokkeren**

Blokkeer onmiddellijk gebruikers die door de beheerder via gebruikersbeheer zijn uitgeschakeld. Anders behouden uitgeschakelde gebruikers hun eerdere rechten totdat zij zich afmelden.

*Standaard: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy is een doeltreffende maatregel om uw site te beschermen tegen XSS-aanvallen. Door bronnen van goedgekeurde inhoud op een witte lijst te plaatsen, kunt u voorkomen dat de browser schadelijke bronnen laadt. Deze instelling is bijzonder ingewikkeld in te stellen met WYSIWYG-editors, maar als u alle domeinen toevoegt die u wilt autoriseren voor opname van iframes in de child-src-instructie, zou dit voorbeeld voor u moeten werken. U kunt voorkomen dat JavaScript wordt uitgevoerd vanuit externe bronnen (ook binnen SVG-afbeeldingen) door een strikte lijst te gebruiken in het argument 'script-src'. Laat leeg om uit te schakelen. Voorbeeldinstelling: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy alleen rapporteren**

Met deze instelling kunt u experimenteren door een Content Security Policy te rapporteren maar niet af te dwingen.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning beschermt uw site tegen MiTM-aanvallen met vervalste X.509-certificaten. Door alleen de identiteiten op een witte lijst te plaatsen die de browser moet vertrouwen, zijn uw gebruikers beschermd als een certificeringsinstantie is gecompromitteerd.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning alleen rapporteren**

Met deze instelling kunt u experimenteren door HTTP Public Key Pinning te rapporteren maar niet af te dwingen.

### `security_referrer_policy`

**Beveiligingsbeleid voor verwijzers (Referrer Policy)**

Referrer Policy is een nieuwe header waarmee een site kan bepalen hoeveel informatie de browser meestuurt bij navigatie weg van een document, en moet door alle sites worden ingesteld.

*Standaard: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Samesite van sessiecookie**

Schakel de parameter samesite:None in voor de sessiecookie. Meer informatie: https://www.chromium.org/updates/same-site en https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Standaard: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security is een uitstekende functie om op uw site te ondersteunen en versterkt uw implementatie van TLS doordat de User Agent het gebruik van HTTPS afdwingt. Aanbevolen waarde: 'strict-transport-security: max-age=63072000; includeSubDomains'. Zie https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. U kunt het achtervoegsel 'preload' toevoegen, maar dit heeft gevolgen voor het topniveaudomein (TLD) en moet daarom waarschijnlijk niet lichtvaardig worden gedaan. Zie https://hstspreload.org/. Laat leeg om uit te schakelen.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options voorkomt dat een browser het inhoudstype probeert te MIME-sniffen en dwingt de browser het opgegeven content-type te gebruiken. De enige geldige waarde voor deze header is 'nosniff'.

*Standaard: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options geeft de browser aan of u wilt toestaan dat uw site in een frame wordt geplaatst. Door te voorkomen dat een browser uw site in een frame plaatst, kunt u zich verdedigen tegen aanvallen zoals clickjacking. Als u hier een URL definieert, moet deze de URL('s) aangeven van waaruit uw inhoud zichtbaar moet zijn, niet de URL's waarvan uw site inhoud accepteert. Als uw hoofd-URL (root_web hierboven) bijvoorbeeld https://11.chamilo.org/ is, moet deze instelling zijn: 'ALLOW-FROM https://11.chamilo.org'. Deze headers gelden alleen voor pagina's waarvoor Chamilo verantwoordelijk is voor het genereren van de HTTP-headers (d.w.z. '.php'-bestanden). Ze gelden niet voor statische bestanden. Als u met deze functie experimenteert, zorg er dan ook voor dat u de configuratie van uw webserver bijwerkt om de juiste headers voor statische bestanden toe te voegen. Zie de CDN-configuratiedocumentatie hierboven (zoek naar 'add_header') voor meer informatie. Aanbevolen (strikte) waarde voor deze instelling, indien ingeschakeld: 'SAMEORIGIN'.

*Standaard: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection stelt de configuratie in voor het cross-site scripting-filter dat in de meeste browsers is ingebouwd. Aanbevolen waarde: '1; mode=block'.

*Standaard: `1; mode=block`*


### `user_reset_password`

**Token voor wachtwoordherstel inschakelen**

Met deze optie kan een verlopen token voor eenmalig gebruik worden gegenereerd en per e-mail naar de gebruiker worden verzonden om zijn of haar wachtwoord te herstellen.

*Standaard: `false`*


### `user_reset_password_token_limit`

**Tijdslimiet voor token voor wachtwoordherstel**

Het aantal seconden voordat het gegenereerde token automatisch verloopt en niet meer kan worden gebruikt (er moet een nieuw token worden gegenereerd).

*Standaard: `3600`*