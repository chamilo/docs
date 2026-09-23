# Plattforminnstillinger

Identitet og atferd på plattformnivå — institusjonsnavn, tidssone, registreringspolicy, brukere pålogget, ytelsesflagg.

Få tilgang til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Plattform**. Denne kategorien inneholder **29 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_my_files`

**Aktiver delen «Mine filer»**

Tillat brukere å laste opp filer til et personlig område på plattformen.

*Standard: `true`*

### `chamilo_database_version`

**Gjeldende versjon av databaseskjemaet som brukes av Chamilo**

Viser gjeldende DB-versjon for å samsvare med Chamilo-kjerneversjonen.

### `cookie_warning`

**Personvernvarsel for informasjonskapsler**

Hvis aktivert, viser dette valget et banner øverst på plattformen som ber brukerne bekrefte at plattformen bruker informasjonskapsler som er nødvendige for å gi brukeropplevelsen. Banneret kan enkelt bekreftes og skjules av brukeren. Dette gjør at Chamilo kan overholde EUs regelverk for informasjonskapsler på nett.

*Standard: `false`*

### `disable_copy_paste`

**Deaktiver kopiering og liming**

Når dette er aktivert, deaktiverer valget kopierings- og limemekanismene så langt det er mulig. Nyttig i restriktive eksamensoppsett.

*Standard: `false`*

### `donotlistcampus`

**Ikke list denne campusen på chamilo.org**

Som standard registreres Chamilo-portaler automatisk i en offentlig liste på chamilo.org, kun med tittelen du ga denne portalen (ikke URL-en eller noen private data). Merk av denne boksen for å unngå at tittelen på portalen din vises.

*Standard: `false`*

### `generate_random_login`

**Generer tilfeldig brukernavn**

Ved import av brukere (batchprosesser) genereres automatisk en tilfeldig streng som brukernavn. Ellers genereres brukernavnet basert på fornavn og etternavn, eller prefikset i e-postadressen.

*Standard: `false`*

### `hosting_limit_identical_email`

**Begrens bruk av identisk e-post**

Maksimalt antall kontoer som tillates å dele samme e-postadresse. Sett til 0 for å deaktivere denne grensen.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Global grense for brukere per kurs**

Definerer et globalt maksimalt antall brukere (lærere inkludert) som tillates å være påmeldt et hvilket som helst enkeltkurs på plattformen. Sett denne verdien til 0 for å deaktivere grensen. Dette bidrar til å unngå overbelastede kurs i åpne portaler.

*Standard: `0`*

### `institution`

**Organisasjonsnavn**

Navnet på organisasjonen (vises i toppteksten til høyre)

*Standard: `Chamilo.org`*


### `institution_address`

**Institusjonsadresse**

Adresse

### `institution_url`

**Organisasjons-URL (nettadresse)**

URL-en til institusjonen (lenken som vises i toppteksten til høyre)

*Standard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maksimalt antall kurs per bruker**

Maksimalt antall kurs en lærer/instruktør kan opprette. Sett til 0 for å deaktivere grensen. Kan overstyres per bruker via et kjøp i BuyCourses-tjenesten.

*Standard: `0`*

### `notification_event`

**Aktiver varslingsverktøyet for en mer treffsikker kommunikasjonskanal med studentene**

Aktiverer sprettopp- eller systemvarsler for viktige plattformhendelser.

*Standard: `false`*

### `pdf_img_dpi`

**Oppløsning for PDF-eksport**

Dette representerer oppløsningen på genererte PDF-filer (i punkter per tomme, eller dpi). Standard er 96. Å øke den gir PDF-filer med bedre oppløsning, men øker også filenes størrelse og genereringstid.

*Standard: `96`*

### `platform_logo_url`

**URL for alternativ plattformlogo**

Erstatter Chamilo-logoen ved å laste en (muligens ekstern) URL. Sørg for at dette er tillatt av sikkerhetspolicyene dine.

*Standard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Aktiver avansert deling i portefølje**

Bestem hvem som kan se innlegg og kommentarer i porteføljen.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Vis innlegg fra basiskurset i sesjonskurs**

Bestem hvem som kan se innlegg og kommentarer i porteføljen.

*Standard: `false`*

### `push_notification_settings`

**Innstillinger for push-varsler (JSON)**

JSON-konfigurasjon for integrasjon av push-varsler.

### `server_type`

**Servertype**

Definerer miljøtypen: "prod" (normal produksjon), "validation" (som produksjon, men uten rapportering av statistikk), eller "test" (feilsøkingsmodus med utviklerverktøy som indikatorer for uoversatte strenger).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Tillat sesjonsadministratorer å se alle brukere på alle URL-er**

Hvis aktivert, kan sesjonsadministratorer søke etter og liste brukere fra alle tilgangs-URL-er, uavhengig av deres gjeldende URL.

*Standard: `false`*

### `site_name`

**Navn på e-læringsportalen**

Navnet på Chamilo-portalen din (vises i toppteksten)

*Standard: `Chamilo site`*


### `timepicker_increment`

**Tidsvelger-intervall**

Minimalt tidsintervall (i minutter) ved valg av dato og tid med tidsvelger-widgeten. For eksempel kan det være unødvendig å ha intervaller på mindre enn 5 eller 15 minutter når det gjelder innlevering av oppgaver, tilgjengelighet av en test, starttid for en sesjon osv.

*Standard: `15`*

### `timezone`

**Standard tidssone**

Velg standard tidssone for denne portalen. Dette bidrar til å sette tidssonen (hvis funksjonen er aktivert) for hver nye bruker eller for brukere som ennå ikke har satt en spesifikk tidssone. Tidssoner gjør at all tidsrelatert informasjon vises på skjermen i den enkelte brukerens tidssone.

*Standard: `Europe/Paris`*


### `unoconv_binaries`

**UNO-konverteringsbinærfiler**

Angi systemstien til UNO-konverteringsbiblioteket for å aktivere noen ekstra eksportfunksjoner.

*Standard: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Bruk ekstern karriere-ID i diagrammer**

Hvis karrierediagrammer brukes, vis et ekstra felt i stedet for den interne karriere-ID-en.

*Standard: `false`*

### `use_custom_pages`

**Bruk tilpassede sider**

Aktiver denne funksjonen for å konfigurere spesifikke innloggingssider per rolle

*Standard: `false`*

### `use_virtual_keyboard`

**Bruk virtuelt tastatur**

Få et virtuelt tastatur til å vises. Dette er nyttig ved restriktive eksamener i et fysisk rom der studentene ikke har tastatur, for å begrense muligheten til å jukse.

*Standard: `false`*

### `user_status_show_option`

**Visningsalternativer for roller**

En array av rolle => true/false som definerer om den aktuelle rollen skal vises eller skjules.

### `user_status_show_options_enabled`

**Selektiv visning av roller**

Aktiver for å bruke en array til å definere hvilke roller som skal vises tydelig, og hvilke som skal skjules.

*Standard: `false`*