# Ärendeinställningar

Beteende för **ärendesystemet** (helpdesk).

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Ärenden**. Denna kategori innehåller **7 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `show_link_bug_notification`

**Visa länk för att rapportera bugg**

Visa en länk i sidhuvudet för att rapportera en bugg i vår supportplattform (http://support.chamilo.org). När användaren klickar på länken skickas hen till supportplattformen, till en wikisida som beskriver processen för buggarapportering.

*Standard: `false`*


### `show_link_ticket_notification`

**Visa länk för att skapa ärende**

Visa länken för att skapa ärende för användare på höger sida av portalen

*Standard: `false`*


### `ticket_allow_category_edition`

**Tillåt redigering av ärendekategorier**

Tillåt redigering av kategorier av administratörer.

*Standard: `false`*

### `ticket_allow_student_add`

**Tillåt användare att lägga till ärenden**

Tillåter alla användare att lägga till ärenden, inte bara administratörer.

*Standard: `false`*

### `ticket_project_user_roles`

**Åtkomst efter roll till ärendeprojekt**

Tillåt att ärendeprojekt nås av specifika användarroller. Exempel: ['permissions' => [1 => [17]] där project_id = 1, STUDENT_BOSS = 17.

> Denna inställning är obligatorisk för icke-administratörer: utan en rollmappning definierad här kan endast administratörer komma åt supportärenden. För att ge någon annan roll åtkomst till ett ärendeprojekt, lägg till dess roll-ID i denna inställnings behörigheter för det projektet.

### `ticket_send_warning_to_all_admins`

**Skicka varningsmeddelanden för ärenden till administratörer**

Skicka ett meddelande om ett ärende skapades utan kategori eller om en kategori inte har någon administratör tilldelad.

*Standard: `false`*


### `ticket_warn_admin_no_user_in_category`

**Skicka varning till administratörer om ärendekategori saknar ansvarig**

Skicka ett varningsmeddelande (e-post och Chamilo-meddelande) till alla administratörer om det inte finns någon användare tilldelad en kategori.

*Standard: `false`*