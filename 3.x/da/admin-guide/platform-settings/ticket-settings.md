# Indstillinger for tickets

Adfærd for **Tickets**-systemet (helpdesk).

Få adgang til disse indstillinger under **Administration > Konfigurationsindstillinger > Tickets**. Denne kategori indeholder **7 indstillinger**, som er listet nedenfor med den titel og den kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `show_link_bug_notification`

**Vis link til at rapportere fejl**

Vis et link i headeren til at rapportere en fejl inde på vores supportplatform (http://support.chamilo.org). Når brugeren klikker på linket, sendes vedkommende til supportplatformen, til en wiki-side, der beskriver processen for fejlrapportering.

*Standard: `false`*


### `show_link_ticket_notification`

**Vis link til oprettelse af ticket**

Vis linket til oprettelse af ticket for brugere i højre side af portalen

*Standard: `false`*


### `ticket_allow_category_edition`

**Tillad redigering af ticket-kategorier**

Tillad at administratorer redigerer kategorier.

*Standard: `false`*

### `ticket_allow_student_add`

**Tillad brugere at oprette tickets**

Tillader alle brugere at oprette tickets, ikke kun administratorerne.

*Standard: `false`*

### `ticket_project_user_roles`

**Adgang efter rolle til ticket-projekter**

Tillad at ticket-projekter tilgås af specifikke brugerroller. Eksempel: ['permissions' => [1 => [17]] hvor project_id = 1, STUDENT_BOSS = 17.

> Denne indstilling er obligatorisk for ikke-administratorer: uden en rollemapping defineret her kan kun administratorer tilgå supporttickets. For at give en anden rolle adgang til et ticket-projekt skal du tilføje rollens ID til denne indstillings permissions for det pågældende projekt.

### `ticket_send_warning_to_all_admins`

**Send advarselsbeskeder om tickets til administratorer**

Send en besked, hvis en ticket blev oprettet uden en kategori, eller hvis en kategori ikke har nogen tildelt administrator.

*Standard: `false`*


### `ticket_warn_admin_no_user_in_category`

**Send advarsel til administratorer, hvis en ticket-kategori ikke har nogen ansvarlig**

Send en advarselsbesked (e-mail og Chamilo-besked) til alle administratorer, hvis der ikke er tildelt en bruger til en kategori.

*Standard: `false`*