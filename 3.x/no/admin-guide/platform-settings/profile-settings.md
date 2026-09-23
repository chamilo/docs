# Brukerprofilinnstillinger

Hvilke felt som vises på brukerprofilen, hvilke brukeren kan redigere, og relaterte preferanser.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Brukerprofil**. Denne kategorien inneholder **29 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `account_valid_duration`

**Kontogyldighet**

En brukerkonto er gyldig i dette antallet dager etter opprettelse

*Standard: `3660`*


### `add_user_course_information_in_mailto`

**Forhåndsutfyll e-posten med bruker- og kursinfo i bunntekstens kontakt**

Legg til emne og brødtekst i mailto:-bunnteksten.

*Standard: `false`*


### `allow_show_linkedin_url`

**Tillat visning av brukerens LinkedIn-URL**

Legg til en lenke på brukerens sosiale blokk som gjør det mulig å besøke brukerens LinkedIn-profil

### `allow_show_skype_account`

**Tillat visning av brukerens Skype-konto**

Legg til en lenke på brukerens sosiale blokk som gjør det mulig å starte en chat via Skype

### `allow_social_map_fields`

**Brukergeolokalisering på et kart**

Aktiver visning av et kart i det sosiale nettverket slik at du kan lokalisere andre brukere. Dette inkluderer flere posisjoner (nåværende og destinasjon) som må defineres som adresser eller koordinater i separate ekstra felt. De ekstra feltene må settes som en array her.

### `allow_teachers_to_classes`

**Tillat lærere å administrere klasser**

Lar lærere administrere klassegrupper og medlemskap i systemet.

*Standard: `false`*


### `allow_user_headings`

**Tillat brukerprofilering inne i kurs**

Kan en lærer definere felt for læringsprofil for å hente inn tilleggsinformasjon?

### `allow_users_to_change_email_with_no_password`

**Tillat brukere å endre e-post uten passord**

Ved endring av kontoinformasjon

*Standard: `false`*

### `changeable_options`

**Felt brukere har lov til å endre i profilen sin**

Velg feltene brukerne skal kunne endre på profilsiden sin.


### `enable_profile_user_address_geolocalization`

**Aktiver geolokalisering for brukeren**

Aktiver brukerens adressefelt og vis det på et kart ved hjelp av geolokaliseringsfunksjoner

### `extended_profile`

**Portefølje**

Hvis denne innstillingen er på, kan en bruker fylle ut følgende (valgfrie) felt: «Mitt personlige åpne område», «Mine kompetanser», «Mine diplomer», «Hva jeg kan undervise i»

*Standard: `false`*

### `hide_username_in_course_chat`

**Skjul brukernavn i kurschat**

I kurschatten, skjul brukernavnet. Vis bare personenes navn.

*Standard: `false`*


### `hide_username_with_complete_name`

**Skjul brukernavn når fullt navn allerede vises**

Noen interne funksjoner vil returnere brukernavnet når de returnerer brukerens fulle navn. Med dette alternativet aktivert sørger du for at brukernavnet ikke vises.

*Standard: `false`*


### `linkedin_organization_id`

**LinkedIn-organisasjons-ID**

Når et merke deles på LinkedIn, lar LinkedIn deg angi en organisasjons-ID som vil lenke til organisasjonens LinkedIn-side (for å knytte organisasjonen som tildeler merket).

*Standard: `false`*


### `login_is_email`

**Bruk e-post som brukernavn**

Bruk e-postadressen for å logge inn i systemet

*Standard: `false`*

### `my_space_users_items_per_page`

**Standard antall elementer per side i mySpace**

Antall poster som vises per side i MySpace-sporingsseksjonene (brukere, arbeidsstatistikk, studentliste).

*Standard: `10`*


### `pass_reminder_custom_link`

**Egendefinert side for passordpåminnelse**

Angi din egen URL til en side for tilbakestilling av passord. Nyttig ved bruk av et føderert kontoadministrasjonssystem.

### `profile_fields_visibility`

**Felt synlige på profilsiden**

Array av felt og om (boolean) de er synlige eller ikke på brukerens profilside (fungerer også med etiketter for ekstra felt).

### `registration_add_helptext_for_2_names`

**Legg til hjelpetekst for å angi to navn ved registrering**

Legg til hjelpetekst slik at brukere kan oppgi to navn i registreringsskjemaet når doble etternavn er vanlig.

*Standard: `false`*


### `send_notification_when_user_added`

**Send e-post til administrator når bruker opprettes**

Send e-postvarsel til administrator når en bruker opprettes.

### `show_conditions_to_user`

**Vis spesifikke registreringsvilkår**

Vis flere vilkår til brukeren under registreringsprosessen. Oppgi en array der hvert element inneholder 'variable' (internt navn på ekstra felt), 'display_text' (enkel tekst for en avmerkingsboks), 'text_area' (lang tekst med vilkår).

### `show_official_code_whoisonline`

**Offisiell kode på «Hvem er pålogget»**

Vis offisiell kode på siden «Hvem er pålogget», under brukernavnet.

*Standard: `false`*

### `show_terms_if_profile_completed`

**Vilkår og betingelser kun hvis profilen er fullført**

Ved å aktivere dette valget vil vilkår og betingelser kun være tilgjengelige for brukeren når de ekstra profilfeltene som starter med 'terms_' og er satt til synlige, er utfylt.

*Standard: `false`*


### `split_users_upload_directory`

**Del opp brukernes opplastingskatalog**

På portaler med høy belastning, der mange brukere er registrert og sender inn bildene sine, kan opplastingskatalogen (main/upload/users/) inneholde for mange filer til at filsystemet kan håndtere det (det er rapportert med mer enn 36000 filer på en Debian-server). Å endre dette valget vil aktivere en oppdeling på ett nivå av katalogene i opplastingskatalogen. 9 kataloger vil bli brukt i basiskatalogen, og alle påfølgende brukerkataloger vil bli lagret i én av disse 9 katalogene. Endringen av dette valget vil ikke påvirke katalogstrukturen på disken, men vil påvirke oppførselen til Chamilo-koden, så hvis du endrer dette valget, må du opprette de nye katalogene og flytte de eksisterende katalogene selv på serveren. Vær oppmerksom på at når du oppretter og flytter disse katalogene, må du flytte katalogene til brukerne 1 til 9 inn i underkataloger med samme navn. Hvis du er usikker på dette valget, er det best å ikke aktivere det.

*Standard: `true`*

### `use_users_timezone`

**Aktiver brukernes tidssoner**

Aktiver muligheten for at brukere kan velge sin egen tidssone. Når dette er konfigurert, vil brukerne kunne se innleveringsfrister og andre tidsreferanser i sin egen tidssone, noe som vil redusere feil ved innleveringstidspunktet.

*Standard: `true`*

### `user_import_settings`

**Valg for brukerimport**

Tabell med valg som skal brukes som standardparametere ved CSV/XML-brukerimport.

### `user_search_on_extra_fields`

**Søk etter brukere via ekstra felt i brukerliste for administratorer**

Inkluder naturlig de gitte ekstra feltene (tabell med etiketter for ekstra felt) i brukersøkene.

### `user_selected_theme`

**Brukervalg av tema**

Tillat brukere å velge sitt eget visuelle tema i profilen. Dette vil endre utseendet til Chamilo for dem, men vil la portalens standardstil være uendret. Hvis et bestemt kurs eller en bestemt økt har et tildelt tema, vil det ha prioritet over brukervalgte temaer.

*Standard: `false`*

### `visible_options`

**Liste over synlige felt i profilen**

Styrer hvilke profilfelt som er synlige for brukere og andre.