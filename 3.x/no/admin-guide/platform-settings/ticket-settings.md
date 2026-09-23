# Innstillinger for saker

Oppførselen til **saks**-systemet (helpdesk).

Gå til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Saker**. Denne kategorien inneholder **7 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `show_link_bug_notification`

**Vis lenke for å rapportere feil**

Vis en lenke i toppteksten for å rapportere en feil i vår støtteplattform (http://support.chamilo.org). Når brukeren klikker på lenken, sendes vedkommende til støtteplattformen, til en wikiside som beskriver prosessen for feilrapportering.

*Standard: `false`*


### `show_link_ticket_notification`

**Vis lenke for oppretting av sak**

Vis lenken for oppretting av sak til brukere på høyre side av portalen

*Standard: `false`*


### `ticket_allow_category_edition`

**Tillat redigering av saks-kategorier**

Tillat at administratorer redigerer kategorier.

*Standard: `false`*

### `ticket_allow_student_add`

**Tillat at brukere legger til saker**

Lar alle brukere legge til saker, ikke bare administratorene.

*Standard: `false`*

### `ticket_project_user_roles`

**Tilgang etter rolle til saksprosjekter**

Tillat at saksprosjekter nås av bestemte brukerroller. Eksempel: ['permissions' => [1 => [17]] der project_id = 1, STUDENT_BOSS = 17.

> Denne innstillingen er obligatorisk for brukere som ikke er administratorer: uten en rollertilordning definert her kan bare administratorer få tilgang til støttesaker. For å gi en annen rolle tilgang til et saksprosjekt, legg til rolle-ID-en i denne innstillingens tillatelser for det prosjektet.

### `ticket_send_warning_to_all_admins`

**Send advarsler om saker til administratorer**

Send en melding hvis en sak ble opprettet uten kategori, eller hvis en kategori ikke har noen administrator tildelt.

*Standard: `false`*


### `ticket_warn_admin_no_user_in_category`

**Send varsel til administratorer hvis saks-kategorien ikke har noen ansvarlig**

Send en advarsel (e-post og Chamilo-melding) til alle administratorer hvis det ikke er tildelt en bruker til en kategori.

*Standard: `false`*