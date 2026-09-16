# Platforminstellingen

Identiteit en gedrag op platformniveau — naam van de instelling, tijdzone, registratiebeleid, online gebruikers, prestatiemarkeringen.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Platform**. Deze categorie bevat **29 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_my_files`

**Sectie 'Mijn bestanden' inschakelen**

Gebruikers toestaan bestanden te uploaden naar een persoonlijke ruimte op het platform.

*Standaard: `true`*

### `chamilo_database_version`

**Huidige versie van het databaseschema dat Chamilo gebruikt**

Toont de huidige DB-versie om overeen te komen met de Chamilo-coreversie.

### `cookie_warning`

**Cookie-privacybericht**

Indien ingeschakeld toont deze optie een banner bovenaan uw platform waarin gebruikers wordt gevraagd te bevestigen dat het platform cookies gebruikt die nodig zijn voor de gebruikerservaring. De banner kan eenvoudig worden bevestigd en verborgen door de gebruiker. Dit stelt Chamilo in staat te voldoen aan de EU-regelgeving voor webcookies.

*Standaard: `false`*

### `disable_copy_paste`

**Kopiëren-plakken uitschakelen**

Indien ingeschakeld schakelt deze optie de kopiëren-plakken-mechanismen zoveel mogelijk uit. Nuttig in restrictieve examensetups.

*Standaard: `false`*

### `donotlistcampus`

**Deze campus niet vermelden op chamilo.org**

Standaard worden Chamilo-portalen automatisch geregistreerd in een openbare lijst op chamilo.org, alleen met de titel die u aan dit portaal hebt gegeven (niet de URL noch privégegevens). Vink dit vakje aan om te voorkomen dat de titel van uw portaal verschijnt.

*Standaard: `false`*

### `generate_random_login`

**Willekeurige gebruikersnaam genereren**

Bij het importeren van gebruikers (batchprocessen) automatisch een willekeurige tekenreeks voor de gebruikersnaam genereren. Anders wordt de gebruikersnaam gegenereerd op basis van voornaam en achternaam, of het voorvoegsel van het e-mailadres.

*Standaard: `false`*

### `hosting_limit_identical_email`

**Gebruik van identieke e-mailadressen beperken**

Maximumaantal accounts dat hetzelfde e-mailadres mag delen. Stel in op 0 om deze limiet uit te schakelen.

*Standaard: `0`*

### `hosting_limit_users_per_course`

**Globale limiet van gebruikers per cursus**

Definieert een globaal maximumaantal gebruikers (inclusief docenten) dat mag worden ingeschreven voor eender welke afzonderlijke cursus op het platform. Stel deze waarde in op 0 om de limiet uit te schakelen. Dit helpt voorkomen dat cursussen overbelast raken in open portalen.

*Standaard: `0`*

### `institution`

**Naam van de organisatie**

De naam van de organisatie (verschijnt in de koptekst rechts)

*Standaard: `Chamilo.org`*


### `institution_address`

**Adres van de instelling**

Adres

### `institution_url`

**URL van de organisatie (webadres)**

De URL van de instellingen (de link die in de koptekst rechts verschijnt)

*Standaard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maximumcursussen per gebruiker**

Maximumaantal cursussen dat een docent/trainer kan aanmaken. Stel in op 0 om de limiet uit te schakelen. Kan per gebruiker worden overschreven via een aankoop van een BuyCourses-dienst.

*Standaard: `0`*

### `notification_event`

**De meldingstool inschakelen voor een impactvoller communicatiekanaal met studenten**

Activeert popup- of systeemmeldingen voor belangrijke platformgebeurtenissen.

*Standaard: `false`*

### `pdf_img_dpi`

**Resolutie van PDF-export**

Dit vertegenwoordigt de resolutie van gegenereerde PDF-bestanden (in dots per inch, of dpi). De standaardwaarde is 96. Verhogen geeft PDF-bestanden met een betere resolutie, maar verhoogt ook het gewicht en de generatietijd van de bestanden.

*Standaard: `96`*

### `platform_logo_url`

**URL voor alternatief platformlogo**

Vervangt het Chamilo-logo door het laden van een (mogelijk externe) URL. Zorg ervoor dat dit is toegestaan door uw beveiligingsbeleid.

*Standaard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Geavanceerd delen van portfolio inschakelen**

Bepaal wie de berichten en reacties van het portfolio kan bekijken.

*Standaard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Berichten van de basiscursus tonen in sessiecursus**

Bepaal wie de berichten en reacties van het portfolio kan bekijken.

*Standaard: `false`*

### `push_notification_settings`

**Instellingen voor pushmeldingen (JSON)**

JSON-configuratie voor integratie van pushmeldingen.

### `server_type`

**Servertype**

Definieert het omgevingstype: "prod" (normale productie), "validation" (zoals productie maar zonder rapportagestatistieken), of "test" (debugmodus met ontwikkelaarshulpmiddelen zoals indicatoren voor onvertaalde tekenreeksen).

*Standaard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Sessiebeheerders toestaan alle gebruikers op alle URL's te zien**

Indien ingeschakeld kunnen sessiebeheerders gebruikers van alle toegangs-URL's zoeken en weergeven, ongeacht hun huidige URL.

*Standaard: `false`*

### `site_name`

**Naam van het e-learningportaal**

De naam van uw Chamilo-portaal (verschijnt in de koptekst)

*Default: `Chamilo site`*


### `timepicker_increment`

**Tijdkiezer-increment**

Minimale tijdstap (in minuten) bij het selecteren van een datum en tijd met de tijdkiezer-widget. Het is bijvoorbeeld mogelijk niet nuttig om stappen van minder dan 5 of 15 minuten te hebben bij het indienen van opdrachten, de beschikbaarheid van een toets, de starttijd van een sessie, enz.

*Default: `15`*

### `timezone`

**Standaardtijdzone**

Selecteer de standaardtijdzone voor dit portaal. Dit helpt de tijdzone in te stellen (als de functie is ingeschakeld) voor elke nieuwe gebruiker of voor elke gebruiker die nog geen specifieke tijdzone heeft ingesteld. Tijdzones helpen alle tijdgerelateerde informatie op het scherm weer te geven in de specifieke tijdzone van elke gebruiker.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**UNO-converterbinaries**

Geef het systeempad naar de UNO-converterbibliotheek om extra exportfuncties in te schakelen.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Extern loopbaan-ID gebruiken in diagrammen**

Als u loopbaandiagrammen gebruikt, toon dan een extra veld in plaats van het interne loopbaan-ID.

*Default: `false`*

### `use_custom_pages`

**Aangepaste pagina's gebruiken**

Schakel deze functie in om specifieke inlogpagina's per rol te configureren

*Default: `false`*

### `use_virtual_keyboard`

**Virtueel toetsenbord gebruiken**

Laat een virtueel toetsenbord verschijnen. Dit is nuttig bij het opzetten van restrictieve examens in een fysieke ruimte waar studenten geen toetsenbord hebben, om hun mogelijkheid tot spieken te beperken.

*Default: `false`*

### `user_status_show_option`

**Weergaveopties voor rollen**

Een array van rol => true/false die definieert of die rol moet worden getoond of verborgen.

### `user_status_show_options_enabled`

**Selectieve weergave van rollen**

Schakel in om een array te gebruiken om te definiëren welke rollen duidelijk moeten worden weergegeven en welke moeten worden verborgen.

*Default: `false`*