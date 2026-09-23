# Gruppeinnstillinger

Oppførsel for kursverktøyet **Grupper**.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Grupper**. Denne kategorien inneholder **3 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_group_categories`

**Gruppekategorier**

Tillate lærere å opprette kategorier i Grupper-verktøyet?

*Standard: `false`*


### `hide_course_group_if_no_tools_available`

**Skjul kursgruppe hvis ingen verktøy**

Hvis ingen verktøy er tilgjengelig i en gruppe og brukeren ikke er registrert i gruppen selv, skjul gruppen helt i gruppelisten.

*Standard: `false`*


### `show_groups_to_users`

**Vis klasser til brukere**

Vis klassene til brukere. Klasser er en funksjon som lar deg registrere/avregistrere brukergrupper i en økt eller et kurs direkte, og dermed redusere administrativt merarbeid. Når du velger dette alternativet, vil lærende kunne se hvilken klasse de tilhører via sitt sosiale nettverksgrensesnitt.

*Standard: `false`*