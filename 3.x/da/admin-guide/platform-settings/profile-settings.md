# Brugerprofilindstillinger

Hvilke felter vises på brugerprofilen, hvilke brugeren kan redigere, og relaterede præferencer.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Brugerprofil**. Denne kategori indeholder **29 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `account_valid_duration`

**Kontogyldighed**

En brugerkonto er gyldig i dette antal dage efter oprettelse

*Standard: `3660`*


### `add_user_course_information_in_mailto`

**Udfyld mailen på forhånd med bruger- og kursusinfo i sidefodens kontakt**

Tilføj emne og brødtekst i mailto:-sidefoden.

*Standard: `false`*


### `allow_show_linkedin_url`

**Tillad visning af brugerens LinkedIn-URL**

Tilføj et link på brugerens sociale blok, så man kan besøge brugerens LinkedIn-profil

### `allow_show_skype_account`

**Tillad visning af brugerens Skype-konto**

Tilføj et link på brugerens sociale blok, så man kan starte en chat via Skype

### `allow_social_map_fields`

**Brugeres geolokalisering på et kort**

Aktivér visning af et kort i det sociale netværk, så du kan lokalisere andre brugere. Dette omfatter flere positioner (nuværende og destination), som skal defineres som adresser eller koordinater i separate ekstra felter. De ekstra felter skal angives som et array her.

### `allow_teachers_to_classes`

**Tillad undervisere at administrere klasser**

Gør det muligt for undervisere at administrere klassegrupper og deres medlemskab i systemet.

*Standard: `false`*


### `allow_user_headings`

**Tillad brugerprofilering inde i kurser**

Kan en underviser definere felter til kursistprofiler for at indhente yderligere oplysninger?

### `allow_users_to_change_email_with_no_password`

**Tillad brugere at ændre e-mail uden adgangskode**

Når kontooplysningerne ændres

*Standard: `false`*

### `changeable_options`

**Felter, som brugere må ændre i deres profil**

Vælg de felter, som brugere kan ændre på deres profilside.


### `enable_profile_user_address_geolocalization`

**Aktivér brugerens geolokalisering**

Aktivér brugerens adressefelt og vis det på et kort ved hjælp af geolokaliseringsfunktioner

### `extended_profile`

**Portefølje**

Hvis denne indstilling er slået til, kan en bruger udfylde følgende (valgfrie) felter: 'Mit personlige åbne område', 'Mine kompetencer', 'Mine diplomer', 'Hvad jeg kan undervise i'

*Standard: `false`*

### `hide_username_in_course_chat`

**Skjul brugernavn i kursuschatten**

I kursuschatten skjules brugernavnet. Kun personernes navne vises.

*Standard: `false`*


### `hide_username_with_complete_name`

**Skjul brugernavn, når det fulde navn allerede vises**

Nogle interne funktioner returnerer brugernavnet, når de returnerer brugerens fulde navn. Med denne indstilling aktiveret sikrer du, at brugernavnet ikke vises.

*Standard: `false`*


### `linkedin_organization_id`

**LinkedIn-organisations-ID**

Når et badge deles på LinkedIn, giver LinkedIn mulighed for at angive et organisations-ID, som linker til din organisations LinkedIn-side (for at knytte den organisation, der tildeler badget).

*Standard: `false`*


### `login_is_email`

**Brug e-mailen som brugernavn**

Brug e-mailen til at logge ind i systemet

*Standard: `false`*

### `my_space_users_items_per_page`

**Standardantal elementer pr. side i mySpace**

Antal poster, der vises pr. side i MySpace-trackingsektionerne (brugere, opgavestatistik, kursistliste).

*Standard: `10`*


### `pass_reminder_custom_link`

**Tilpasset side til adgangskodepåmindelse**

Angiv din egen URL til en side til nulstilling af adgangskode. Nyttigt ved brug af et fødereret kontoadministrationssystem.

### `profile_fields_visibility`

**Felter synlige på profilsiden**

Array af felter og om (boolean) de er synlige eller ej på brugerens profilside (virker også med etiketter for ekstra felter).

### `registration_add_helptext_for_2_names`

**Tilføj hjælp til at angive to navne ved registrering**

Tilføj hjælpetekst, så brugere kan indtaste to navne i registreringsformularen, når dobbelte efternavne er almindelige.

*Standard: `false`*


### `send_notification_when_user_added`

**Send mail til administrator, når bruger oprettes**

Send e-mailnotifikation til administrator, når en bruger oprettes.

### `show_conditions_to_user`

**Vis specifikke registreringsbetingelser**

Vis flere betingelser for brugeren under tilmeldingsprocessen. Angiv et array, hvor hvert element indeholder 'variable' (internt navn på ekstra felt), 'display_text' (simpel tekst til et afkrydsningsfelt), 'text_area' (lang tekst med betingelser).

### `show_official_code_whoisonline`

**Officiel kode på 'Hvem er online'**

Vis officiel kode på siden 'Hvem er online', under brugernavnet.

*Standard: `false`*

### `show_terms_if_profile_completed`

**Vilkår og betingelser kun hvis profilen er fuldstændig**

Ved at aktivere denne indstilling vil vilkår og betingelser kun være tilgængelige for brugeren, når de ekstra profilfelter, der starter med 'terms_' og er sat til synlige, er udfyldt.

*Standard: `false`*


### `split_users_upload_directory`

**Opdel brugernes upload-mappe**

På portaler med høj belastning, hvor mange brugere er registreret og sender deres billeder, kan upload-mappen (main/upload/users/) indeholde for mange filer til, at filsystemet kan håndtere dem (det er rapporteret med mere end 36000 filer på en Debian-server). Ændring af denne indstilling aktiverer en opdeling på ét niveau af mapperne i upload-mappen. 9 mapper vil blive brugt i basismappen, og alle efterfølgende brugermapper vil blive gemt i én af disse 9 mapper. Ændringen af denne indstilling påvirker ikke mappestrukturen på disken, men påvirker Chamilo-kodens adfærd, så hvis du ændrer denne indstilling, skal du selv oprette de nye mapper og flytte de eksisterende mapper på serveren. Vær opmærksom på, at når du opretter og flytter disse mapper, skal du flytte mapperne for brugerne 1 til 9 ind i undermapper med samme navn. Hvis du er usikker på denne indstilling, er det bedst ikke at aktivere den.

*Standard: `true`*

### `use_users_timezone`

**Aktivér brugeres tidszoner**

Aktivér muligheden for, at brugere kan vælge deres egen tidszone. Når det er konfigureret, vil brugerne kunne se afleveringsfrister og andre tidsangivelser i deres egen tidszone, hvilket vil reducere fejl ved afleveringstidspunktet.

*Standard: `true`*

### `user_import_settings`

**Indstillinger for brugerimport**

Array af indstillinger, der skal anvendes som standardparametre ved CSV/XML-brugerimport.

### `user_search_on_extra_fields`

**Søg brugere efter ekstra felter i brugerlisten for administratorer**

Inkludér naturligt de angivne ekstra felter (array af etiketter for ekstra felter) i brugersøgningerne.

### `user_selected_theme`

**Brugervalg af tema**

Tillad brugere at vælge deres eget visuelle tema i deres profil. Dette vil ændre udseendet af Chamilo for dem, men vil lade portalens standardstil være uændret. Hvis et specifikt kursus eller en session har et tildelt specifikt tema, vil det have prioritet over brugerdefinerede temaer.

*Standard: `false`*

### `visible_options`

**Liste over synlige felter i profilen**

Styrer, hvilke profilfelter der er synlige for brugere og andre.