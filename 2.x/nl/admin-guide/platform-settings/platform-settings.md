# Platforminstellingen

Identiteit en gedrag op platformniveau — naam van de instelling, tijdzone, registratiebeleid, online gebruikers, prestatievlaggen.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Platform**. Deze categorie bevat **29 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_my_files`

**Sectie 'Mijn Bestanden' inschakelen**

Sta gebruikers toe om bestanden te uploaden naar een persoonlijke ruimte op het platform.

*Standaard: `true`*

### `chamilo_database_version`

**Huidige versie van het databaseschema gebruikt door Chamilo**

Toont de huidige databaseversie die overeenkomt met de Chamilo-kernversie.

### `cookie_warning`

**Cookie-privacy melding**

Indien ingeschakeld, toont deze optie een banner bovenaan uw platform die gebruikers vraagt om te bevestigen dat het platform cookies gebruikt die noodzakelijk zijn voor de gebruikerservaring. De banner kan eenvoudig worden bevestigd en verborgen door de gebruiker. Dit stelt Chamilo in staat om te voldoen aan de EU-regelgeving voor webcookies.

*Standaard: `false`*

### `disable_copy_paste`

**Kopiëren en plakken uitschakelen**

Wanneer ingeschakeld, schakelt deze optie zoveel mogelijk de mechanismen voor kopiëren en plakken uit. Handig bij beperkende examenopstellingen.

*Standaard: `false`*

### `donotlistcampus`

**Deze campus niet vermelden op chamilo.org**

Standaard worden Chamilo-portalen automatisch geregistreerd in een openbare lijst op chamilo.org, waarbij alleen de titel die u aan dit portaal hebt gegeven wordt gebruikt (niet de URL of enige privégegevens). Vink dit vakje aan om te voorkomen dat de titel van uw portaal wordt weergegeven.

*Standaard: `false`*

### `generate_random_login`

**Willekeurige gebruikersnaam genereren**

Bij het importeren van gebruikers (batchprocessen) wordt automatisch een willekeurige tekenreeks voor de gebruikersnaam gegenereerd. Anders wordt de gebruikersnaam gegenereerd op basis van de voor- en achternaam, of het voorvoegsel van het e-mailadres.

*Standaard: `false`*

### `hosting_limit_identical_email`

**Gebruik van identieke e-mails beperken**

Maximaal aantal accounts dat hetzelfde e-mailadres mag delen. Stel in op 0 om deze limiet uit te schakelen.

*Standaard: `0`*

### `hosting_limit_users_per_course`

**Globale limiet van gebruikers per cursus**

Definieert een globaal maximumaantal gebruikers (inclusief docenten) dat mag worden ingeschreven voor een enkele cursus op het platform. Stel deze waarde in op 0 om de limiet uit te schakelen. Dit helpt overbelasting van cursussen in open portalen te voorkomen.

*Standaard: `0`*

### `institution`

**Naam van de organisatie**

De naam van de organisatie (verschijnt in de koptekst aan de rechterkant)

*Standaard: `Chamilo.org`*

### `institution_address`

**Adres van de instelling**

Adres

### `institution_url`

**URL van de organisatie (webadres)**

De URL van de instelling (de link die in de koptekst aan de rechterkant verschijnt)

*Standaard: `http://www.chamilo.org`*

### `max_courses_per_user`

**Maximaal aantal cursussen per gebruiker**

Maximaal aantal cursussen dat een docent/trainer kan aanmaken. Stel in op 0 om de limiet uit te schakelen. Kan per gebruiker worden overschreven via een aankoop van een BuyCourses-service.

*Standaard: `0`*

### `notification_event`

**Notificatietool inschakelen voor een impactvoller communicatiekanaal met studenten**

Activeert pop-up- of systeemmeldingen voor belangrijke platformgebeurtenissen.

*Standaard: `false`*

### `pdf_img_dpi`

**Resolutie voor PDF-export**

Dit vertegenwoordigt de resolutie van gegenereerde PDF-bestanden (in dots per inch, of dpi). De standaardwaarde is 96. Het verhogen hiervan geeft PDF-bestanden met een betere resolutie, maar verhoogt ook het gewicht en de generatietijd van de bestanden.

*Standaard: `96`*

### `platform_logo_url`

**URL voor alternatief platformlogo**

Vervangt het Chamilo-logo door een (mogelijk externe) URL te laden. Zorg ervoor dat dit is toegestaan door uw beveiligingsbeleid.

*Standaard: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Geavanceerd delen van portfolio inschakelen**

Bepaal wie de berichten en opmerkingen van het portfolio kan bekijken.

*Standaard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Berichten van basiscursus tonen in sessiecursus**

Bepaal wie de berichten en opmerkingen van het portfolio kan bekijken.

*Standaard: `false`*

### `push_notification_settings`

**Instellingen voor pushmeldingen (JSON)**

JSON-configuratie voor integratie van pushmeldingen.

### `server_type`

**Servertype**

Definieert het type omgeving: "prod" (normale productie), "validation" (zoals productie maar zonder statistiekenrapportage), of "test" (debugmodus met ontwikkelaarstools zoals indicatoren voor onvertaalde strings).

*Standaard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Sessiebeheerders toegang geven tot alle gebruikers op alle URL's**

Indien ingeschakeld, kunnen sessiebeheerders gebruikers van alle toegangs-URL's zoeken en weergeven, ongeacht hun huidige URL.

*Standaard: `false`*

---
### `site_name`

**Naam van het e-learningportaal**

De naam van uw Chamilo-portaal (verschijnt in de koptekst)

*Standaard: `Chamilo site`*

### `timepicker_increment`

**Tijdskiezer-increment**

Minimale tijdsincrement (in minuten) bij het selecteren van een datum en tijd met de tijdskiezer-widget. Het kan bijvoorbeeld niet nuttig zijn om minder dan 5 of 15 minuten incrementen te hebben bij het bespreken van het indienen van opdrachten, de beschikbaarheid van een test, de starttijd van een sessie, enz.

*Standaard: `15`*

### `timezone`

**Standaard tijdzone**

Selecteer de standaard tijdzone voor dit portaal. Dit helpt om de tijdzone (als de functie is ingeschakeld) in te stellen voor elke nieuwe gebruiker of voor gebruikers die nog geen specifieke tijdzone hebben ingesteld. Tijdzones helpen om alle tijdgerelateerde informatie op het scherm weer te geven in de specifieke tijdzone van elke gebruiker.

*Standaard: `Europe/Paris`*

### `unoconv_binaries`

**UNO-converter binaries**

Geef het systeempad naar de UNO-converterbibliotheek om enkele extra exportfuncties in te schakelen.

*Standaard: `/usr/bin/unoconv`*

### `use_career_external_id_as_identifier_in_diagrams`

**Gebruik extern carrière-ID in diagrammen**

Als u carrière-diagrammen gebruikt, toon dan een extra veld in plaats van het interne carrière-ID.

*Standaard: `false`*

### `use_custom_pages`

**Gebruik aangepaste pagina's**

Schakel deze functie in om specifieke inlogpagina's per rol te configureren.

*Standaard: `false`*

### `use_virtual_keyboard`

**Gebruik virtueel toetsenbord**

Laat een virtueel toetsenbord verschijnen. Dit is nuttig bij het opzetten van beperkende examens in een fysieke ruimte waar studenten geen toetsenbord hebben om hun mogelijkheid tot spieken te beperken.

*Standaard: `false`*

### `user_status_show_option`

**Weergaveopties voor rollen**

Een array van rol => true/false die definieert of die rol moet worden weergegeven of verborgen.

### `user_status_show_options_enabled`

**Selectieve weergave van rollen**

Schakel in om een array te gebruiken om te definiëren welke rollen duidelijk moeten worden weergegeven en welke moeten worden verborgen.

*Standaard: `false`*