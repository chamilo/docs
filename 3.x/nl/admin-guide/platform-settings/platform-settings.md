# Platforminstellingen

Identiteit en gedrag op platformniveau — naam van de instelling, tijdzone, registratiebeleid, online gebruikers, prestatievlaggen.

Open deze instellingen via **Beheer > Configuratie-instellingen > Platform**. Deze categorie bevat **30 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_my_files`

**Sectie 'Mijn bestanden' inschakelen**

Gebruikers toestaan bestanden te uploaden naar een persoonlijke ruimte op het platform.

*Standaard: `true`*

### `chamilo_database_version`

**Huidige versie van het databaseschema dat door Chamilo wordt gebruikt**

Toont de huidige DB-versie zodat deze overeenkomt met de kernversie van Chamilo.

### `cookie_warning`

**Privacykennisgeving over cookies**

Indien ingeschakeld, toont deze optie een banner bovenaan uw platform waarin gebruikers wordt gevraagd te bevestigen dat het platform cookies gebruikt die nodig zijn om de gebruikerservaring te bieden. De banner kan eenvoudig door de gebruiker worden bevestigd en verborgen. Hiermee kan Chamilo voldoen aan de EU-regelgeving voor webcookies.

*Standaard: `false`*

### `disable_copy_paste`

**Kopiëren en plakken uitschakelen**

Indien ingeschakeld, schakelt deze optie de mechanismen voor kopiëren en plakken zo goed mogelijk uit. Nuttig bij restrictieve exameninstellingen.

*Standaard: `false`*

### `donotlistcampus`

**Deze campus niet vermelden op chamilo.org**

Standaard worden Chamilo-portalen automatisch geregistreerd in een openbare lijst op chamilo.org, uitsluitend met de titel die u aan dit portaal hebt gegeven (niet de URL en geen privégegevens). Vink dit vakje aan om te voorkomen dat de titel van uw portaal verschijnt.

*Standaard: `false`*

### `generate_random_login`

**Willekeurige gebruikersnaam genereren**

Bij het importeren van gebruikers (batchprocessen) automatisch een willekeurige tekenreeks als gebruikersnaam genereren. Anders wordt de gebruikersnaam gegenereerd op basis van de voornaam en achternaam, of het voorvoegsel van het e-mailadres.

*Standaard: `false`*

### `hosting_limit_identical_email`

**Gebruik van identieke e-mailadressen beperken**

Maximumaantal accounts dat hetzelfde e-mailadres mag delen. Stel in op 0 om deze limiet uit te schakelen.

*Standaard: `0`*

### `hosting_limit_users_per_course`

**Globale limiet van gebruikers per cursus**

Definieert een globaal maximumaantal gebruikers (inclusief docenten) dat aan een afzonderlijke cursus op het platform mag worden ingeschreven. Stel deze waarde in op 0 om de limiet uit te schakelen. Dit helpt te voorkomen dat cursussen op open portalen overbelast raken.

*Standaard: `0`*

### `institution`

**Naam van de organisatie**

De naam van de organisatie (verschijnt rechts in de koptekst)

*Standaard: `Chamilo.org`*


### `institution_address`

**Adres van de instelling**

Adres

### `institution_url`

**URL van de organisatie (webadres)**

De URL van de instellingen (de koppeling die rechts in de koptekst verschijnt)

*Standaard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maximumaantal cursussen per gebruiker**

Maximumaantal cursussen dat een docent/trainer kan aanmaken. Stel in op 0 om de limiet uit te schakelen. Kan per gebruiker worden overschreven via een aankoop van de BuyCourses-dienst.

*Standaard: `0`*

### `notification_event`

**Het meldingsinstrument inschakelen voor een impactvoller communicatiekanaal met studenten**

Activeert pop-up- of systeemmeldingen voor belangrijke platformgebeurtenissen.

*Standaard: `false`*

### `pdf_img_dpi`

**Resolutie van PDF-export**

Dit is de resolutie van gegenereerde PDF-bestanden (in dots per inch, of dpi). De standaardwaarde is 96. Een hogere waarde levert PDF-bestanden met een betere resolutie op, maar vergroot ook de bestandsgrootte en de generatietijd.

*Standaard: `96`*

### `platform_logo_url`

**URL voor alternatief platformlogo**

Vervangt het Chamilo-logo door een (mogelijk externe) URL te laden. Zorg ervoor dat dit is toegestaan volgens uw beveiligingsbeleid.

*Standaard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Geavanceerd delen van portfolio inschakelen**

Bepaal wie de berichten en opmerkingen van het portfolio kan bekijken.

*Standaard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Berichten van de basiscursus tonen in de sessiecursus**

Bepaal wie de berichten en opmerkingen van het portfolio kan bekijken.

*Standaard: `false`*

### `push_notification_settings`

**Instellingen voor pushmeldingen (JSON)**

JSON-configuratie voor de integratie van pushmeldingen.

### `server_type`

**Servertype**

Definieert het type omgeving: "prod" (normale productie), "validation" (zoals productie maar zonder rapportagestatistieken) of "test" (debugmodus met ontwikkelaarshulpmiddelen zoals indicatoren voor niet-vertaalde tekenreeksen).

*Standaard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Sessiebeheerders toestaan alle gebruikers op alle URL's te zien**

Indien ingeschakeld, kunnen sessiebeheerders gebruikers van alle toegangs-URL's zoeken en weergeven, ongeacht hun huidige URL.

*Standaard: `false`*

### `site_name`

**Naam van het e-learningportaal**

De naam van uw Chamilo-portaal (verschijnt in de koptekst)

*Standaard: `Chamilo site`*


### `timepicker_increment`

**Increment van de timepicker**

Minimale tijdstap (in minuten) bij het selecteren van een datum en tijd met de timepicker-widget. Het is bijvoorbeeld mogelijk niet zinvol om stappen van minder dan 5 of 15 minuten te gebruiken bij het instellen van de inleverdatum van een opdracht, de beschikbaarheid van een toets, de starttijd van een sessie, enzovoort.

*Standaard: `15`*

### `timezone`

**Standaardtijdzone**

Selecteer de standaardtijdzone voor dit portaal. Hiermee wordt de tijdzone ingesteld (als de functie is ingeschakeld) voor elke nieuwe gebruiker of voor elke gebruiker die nog geen specifieke tijdzone heeft ingesteld. Tijdzones zorgen ervoor dat alle tijdgerelateerde informatie op het scherm wordt weergegeven in de specifieke tijdzone van elke gebruiker.

*Standaard: `Europe/Paris`*


### `unoconv_binaries`

**UNO-converterbinaries**

Geef het systeempad naar de UNO-converterbibliotheek op om enkele extra exportfuncties in te schakelen.

*Standaard: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Externe carrière-ID gebruiken in diagrammen**

Als carrièrediagrammen worden gebruikt, een extra veld weergeven in plaats van de interne carrière-ID.

*Standaard: `false`*

### `use_custom_pages`

**Aangepaste pagina's gebruiken**

Schakel deze functie in om specifieke aanmeldpagina's per rol te configureren

*Standaard: `false`*

### `use_virtual_keyboard`

**Virtueel toetsenbord gebruiken**

Laat een virtueel toetsenbord verschijnen. Dit is nuttig bij het inrichten van beperkte examens in een fysieke ruimte waar studenten geen toetsenbord hebben, om hun mogelijkheden om te frauderen te beperken.

*Standaard: `false`*

### `user_status_show_option`

**Weergaveopties voor rollen**

Een array van rol => true/false die bepaalt of die rol moet worden weergegeven of verborgen.

### `user_status_show_options_enabled`

**Selectieve weergave van rollen**

Inschakelen om een array te gebruiken waarmee wordt bepaald welke rollen duidelijk moeten worden weergegeven en welke moeten worden verborgen.

*Standaard: `false`*

### `personal_files_quota_mb`

**Mijn bestanden: totale opslagquota per gebruiker (MB)**

Maximale totale omvang van de persoonlijke bestanden van elke gebruiker. Deze limiet geldt niet voor cursusdocumenten, Dropbox of BuyCourses-voordelen.

*Standaard: `0` (onbeperkt)*

Zie [opslagquota PR #9358](https://github.com/chamilo/chamilo-lms/pull/9358).