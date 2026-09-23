# Platformindstillinger

Identitet og adfærd på platformniveau — institutionsnavn, tidszone, registreringspolitik, online brugere, ydelsesflag.

Disse indstillinger findes under **Administration > Konfigurationsindstillinger > Platform**. Denne kategori indeholder **29 indstillinger**, som er oplistet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_my_files`

**Aktivér sektionen 'Mine filer'**

Tillad brugere at uploade filer til et personligt rum på platformen.

*Standard: `true`*

### `chamilo_database_version`

**Aktuel version af databaseskemaet, som Chamilo bruger**

Viser den aktuelle DB-version, så den kan matches med Chamilo-kernens version.

### `cookie_warning`

**Cookie-privatlivsmeddelelse**

Hvis indstillingen er aktiveret, vises et banner øverst på platformen, som beder brugerne om at bekræfte, at platformen bruger cookies, der er nødvendige for at levere brugeroplevelsen. Banneret kan nemt bekræftes og skjules af brugeren. Dette gør det muligt for Chamilo at overholde EU’s regler om webcookies.

*Standard: `false`*

### `disable_copy_paste`

**Deaktivér kopiering og indsættelse**

Når indstillingen er aktiveret, deaktiveres kopierings- og indsættelsesmekanismerne så vidt muligt. Nyttigt i restriktive eksamensopsætninger.

*Standard: `false`*

### `donotlistcampus`

**List ikke dette campus på chamilo.org**

Som standard registreres Chamilo-portaler automatisk i en offentlig liste på chamilo.org, udelukkende med den titel, du har givet portalen (ikke URL’en og ingen private data). Markér dette felt for at undgå, at portalens titel vises.

*Standard: `false`*

### `generate_random_login`

**Generér tilfældigt brugernavn**

Ved import af brugere (batchprocesser) genereres automatisk en tilfældig streng som brugernavn. Ellers genereres brugernavnet ud fra fornavn og efternavn eller præfikset af e-mailadressen.

*Standard: `false`*

### `hosting_limit_identical_email`

**Begræns brug af identiske e-mailadresser**

Maksimalt antal konti, der må dele den samme e-mailadresse. Sæt til 0 for at deaktivere begrænsningen.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Global grænse for brugere pr. kursus**

Definerer et globalt maksimumantal brugere (undervisere medregnet), der må tilmeldes et enkelt kursus på platformen. Sæt værdien til 0 for at deaktivere begrænsningen. Dette hjælper med at undgå overbelastede kurser på åbne portaler.

*Standard: `0`*

### `institution`

**Organisationsnavn**

Organisationens navn (vises i sidehovedet til højre)

*Standard: `Chamilo.org`*


### `institution_address`

**Institutionsadresse**

Adresse

### `institution_url`

**Organisations-URL (webadresse)**

Institutionernes URL (det link, der vises i sidehovedet til højre)

*Standard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maksimalt antal kurser pr. bruger**

Maksimalt antal kurser, en underviser/træner kan oprette. Sæt til 0 for at deaktivere begrænsningen. Kan tilsidesættes pr. bruger via et køb i BuyCourses-tjenesten.

*Standard: `0`*

### `notification_event`

**Aktivér notifikationsværktøjet for en mere virkningsfuld kommunikationskanal med studerende**

Aktiverer popup- eller systemnotifikationer for vigtige platformhændelser.

*Standard: `false`*

### `pdf_img_dpi`

**Opløsning ved PDF-eksport**

Dette angiver opløsningen af genererede PDF-filer (i prikker pr. tomme, eller dpi). Standard er 96. Hvis den øges, får du PDF-filer med bedre opløsning, men filernes størrelse og genereringstid stiger også.

*Standard: `96`*

### `platform_logo_url`

**URL til alternativt platformlogo**

Erstatter Chamilo-logoet ved at indlæse en (eventuelt ekstern) URL. Sørg for, at dette er tilladt ifølge jeres sikkerhedspolitikker.

*Standard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Aktivér avanceret deling af portfolio**

Beslut, hvem der kan se indlæg og kommentarer i portfolioen.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Vis basis-kursusindlæg i sessionskursus**

Beslut, hvem der kan se indlæg og kommentarer i portfolioen.

*Standard: `false`*

### `push_notification_settings`

**Indstillinger for push-notifikationer (JSON)**

JSON-konfiguration til integration af push-notifikationer.

### `server_type`

**Servertype**

Definerer miljøtypen: "prod" (normal produktion), "validation" (som produktion, men uden rapportering af statistik) eller "test" (fejlsøgningstilstand med udviklerværktøjer, f.eks. indikatorer for uoversatte strenge).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Tillad sessionsadministratorer at se alle brugere på alle URL’er**

Hvis indstillingen er aktiveret, kan sessionsadministratorer søge og liste brugere fra alle adgangs-URL’er, uanset deres aktuelle URL.

*Standard: `false`*

### `site_name`

**Navn på e-læringsportal**

Navnet på din Chamilo-portal (vises i sidehovedet)

*Standard: `Chamilo site`*


### `timepicker_increment`

**Tidsvælger-trin**

Minimalt tidsinterval (i minutter) ved valg af dato og tid med tidsvælger-widgetten. Det kan for eksempel være unødvendigt at have intervaller på under 5 eller 15 minutter, når det drejer sig om aflevering af opgaver, tilgængelighed af en test, starttidspunkt for en session osv.

*Standard: `15`*

### `timezone`

**Standardtidszone**

Vælg standardtidszonen for denne portal. Dette hjælper med at angive tidszonen (hvis funktionen er aktiveret) for hver ny bruger eller for enhver bruger, der endnu ikke har angivet en specifik tidszone. Tidszoner hjælper med at vise al tidsrelateret information på skærmen i den enkelte brugers specifikke tidszone.

*Standard: `Europe/Paris`*


### `unoconv_binaries`

**UNO-konverter-binaries**

Angiv systemstien til UNO-konverterbiblioteket for at aktivere nogle ekstra eksportfunktioner.

*Standard: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Brug eksternt karriere-ID i diagrammer**

Hvis du bruger karrierediagrammer, vises et ekstra felt i stedet for det interne karriere-ID.

*Standard: `false`*

### `use_custom_pages`

**Brug tilpassede sider**

Aktivér denne funktion for at konfigurere specifikke login-sider efter rolle

*Standard: `false`*

### `use_virtual_keyboard`

**Brug virtuelt tastatur**

Få et virtuelt tastatur til at vises. Dette er nyttigt, når der oprettes restriktive eksamener i et fysisk lokale, hvor studerende ikke har et tastatur, for at begrænse deres mulighed for at snyde.

*Standard: `false`*

### `user_status_show_option`

**Visningsindstillinger for roller**

Et array af rolle => true/false, der definerer, om den pågældende rolle skal vises eller skjules.

### `user_status_show_options_enabled`

**Selektiv visning af roller**

Aktivér for at bruge et array til at definere, hvilke roller der skal vises tydeligt, og hvilke der skal skjules.

*Standard: `false`*