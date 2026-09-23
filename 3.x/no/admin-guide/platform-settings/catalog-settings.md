# Innstillinger for kurskatalog

Oppførsel for kurskatalogen (den offentlige listen der brukere kan bla og selvregistrere seg).

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Kurskatalog**. Denne kategorien inneholder **13 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_session_auto_subscription`

**Automatisk sesjonsabonnement**

Aktiver automatisk abonnement på sesjoner for brukere.

*Standard: `false`*

### `allow_students_to_browse_courses`

**Tillat studentgjennomgang**

Tillat studenter å bla i og filtrere kurskatalogen.

*Standard: `true`*

### `course_catalog_display_in_home`

**Vis katalog på startsiden**

Vis kurskatalogblokken på plattformens startside.

*Standard: `false`*

### `course_catalog_hide_private`

**Skjul private kurs**

Ekskluder private kurs fra katalogvisningen.

*Standard: `true`*

### `course_catalog_published`

**Publiser kurskatalog**

Gjør kurskatalogen tilgjengelig for anonyme brukere (allmennheten) uten innlogging.

*Standard: `false`*

### `course_catalog_settings`

**Innstillinger for kurskatalog**

JSON-konfigurasjon for kurskatalog: lenkeinnstillinger, filtre, sorteringsvalg og mer.

### `course_subscription_in_user_s_session`

**Abonnement i sesjonsvisning**

Tillat brukere å abonnere på kurs direkte fra sesjonssiden sin.

*Standard: `false`*

### `hide_public_link`

**Skjul offentlig lenke**

Fjern den offentlige URL-lenken fra kurskort.

*Standard: `false`*

### `only_show_course_from_selected_category`

**Vis kun samsvarende kategorier i kurskatalogen**

Når den ikke er tom, vises kun kurs fra de angitte kategoriene i kurskatalogen.

### `only_show_selected_courses`

**Kun utvalgte kurs**

Vis kun manuelt utvalgte kurs i katalogen.

*Standard: `false`*

### `session_catalog_settings`

**Innstillinger for sesjonskatalog**

JSON-konfigurasjon for sesjonskatalog: filtre og visningsvalg.

### `show_courses_descriptions_in_catalog`

**Vis kursbeskrivelser**

Vis kursbeskrivelser i kataloglisten.

*Standard: `false`*

### `show_courses_sessions`

**Vis kurs og sesjoner**

Inkluder både kurs og sesjoner i katalogresultater.

*Standard: `0`*