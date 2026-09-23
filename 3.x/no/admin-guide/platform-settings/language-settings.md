# Språkinnstillinger

Tilgjengelige språk, standard språk, og hvordan Chamilo avgjør hvilket språk som skal vises.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Språk**. Denne kategorien inneholder **13 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_course_multiple_languages`

**Flerspråklige kurs**

Aktiver kurs som administreres på mer enn ett språk. Dette valget legger til en språkvelger på kurssiden slik at brukere enkelt kan bytte, og legger til et ekstra felt «multiple_language» på kurs som muliggjør fjernadministrasjonsprosedyrer.

*Standard: `false`*


### `allow_use_sub_language`

**Tillat definisjon og bruk av underspråk**

Ved å aktivere dette valget kan du definere varianter for hvert av språktermene som brukes i plattformens grensesnitt, i form av et nytt språk basert på og som utvider et eksisterende språk. Du finner dette valget i språkseksjonen i administrasjonspanelet.

*Standard: `false`*

### `auto_detect_language_custom_pages`

**Aktiver automatisk språkdeteksjon på egendefinerte sider**

Hvis du bruker egendefinerte sider, aktiver dette hvis du vil at en språkdetektor der skal vise siden på brukerens nettleserspråk, eller deaktiver for å tvinge språket til å være plattformens standardspråk.

*Standard: `true`*


### `language_by_resource` **v3**

**Språk per ressurs**

Tillat tildeling av et spesifikt språk til individuelle ressurser.

*Standard: `false`*

### `language_flags_by_country`

**Språkflagg**

Bruk landsflagg for språk. Dette er ikke aktivert som standard fordi noen språk ikke er strengt knyttet til et land, noe som kan føre til frustrasjon for enkelte brukere.

*Standard: `false`*


### `language_priority_1`

**Språk med høyest prioritet**

Primært språk som velges når flere språkkilder er satt.

*Standard: `course_lang`*


### `language_priority_2`

**Sekundært prioritetsspråk**

Sekundært reservedsspråk hvis første prioritet er utilgjengelig eller utenfor kontekst.

*Standard: `user_profil_lang`*


### `language_priority_3`

**Tredje prioritetsspråk**

Tertiært reservedsspråk hvis høyere prioriteringer feiler.

*Standard: `user_selected_lang`*


### `language_priority_4`

**Fjerde prioritetsspråk**

Siste reservedsspråk etter prioriteringsrekkefølge.

*Standard: `platform_lang`*


### `platform_language`

**Standard plattformspråk**

Hovedspråk, brukt som standard når ingen brukerspråk er satt.

*Standard: `en`*


### `show_different_course_language`

**Vis kurspråk**

Vis språket hvert kurs er på, ved siden av kurstittelen, i kurslisten på startsiden

*Standard: `true`*


### `show_language_selector_in_menu`

**Språkvelger i hovedmenyen**

Vis en språkvelger i hovedmenyen som umiddelbart oppdaterer brukerens språkpreferanse. Dette kan være nyttig i flerspråklige portaler der lærende må bytte fra ett språk til et annet i læringen.

*Standard: `true`*


### `template_activate_language_filter`

**Flerspråklige dokumentmaler**

Aktiver at dokumentmaler (på plattform- eller kursnivå) kan konfigureres for spesifikke språk.

*Standard: `false`*