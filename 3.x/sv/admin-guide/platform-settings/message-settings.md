# Meddelandeinställningar

Beteende för systemet **Meddelanden / Inkorg**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Meddelanden**. Denna kategori innehåller **7 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_message_tool`

**Internt meddelandeverktyg**

Aktivering av det interna meddelandeverktyget gör det möjligt för användare att skicka meddelanden till andra användare på plattformen och att ha en meddelandeinkorg.

*Standard: `true`*

### `allow_send_message_to_all_platform_users`

**Tillåt att skicka meddelanden till valfri plattformsanvändare**

Gör det möjligt att skicka meddelanden till valfri användare på plattformen, inte bara till dina vänner eller personer som för närvarande är online.

*Standard: `false`*

### `allow_user_message_tracking`

**Administratörer kan se personliga meddelanden**

Tillåt administratörer att se personliga meddelanden mellan en lärare och en deltagare. Se till att du inkluderar en notering i dina användarvillkor eftersom detta kan påverka integritetsskyddet.

*Standard: `false`*


### `filter_interactivity_messages`

**Lärare kan endast komma åt deltagares meddelanden inom sessionens tidsram**

Filtrera meddelanden mellan en lärare och en deltagare mellan sessionens start- och slutdatum

*Standard: `false`*


### `message_max_upload_filesize`

**Maximal filstorlek för uppladdning i meddelanden**

Maximal storlek för filuppladdningar i meddelandeverktyget (i byte)

*Standard: `20971520`*

### `private_messages_about_user`

**Tillåt privata meddelanden mellan lärare om en deltagare**

Tillåt utbyte av meddelanden från lärare/chefer om en användare från uppföljningssidan för den användaren.

*Standard: `false`*


### `private_messages_about_user_visible_to_user`

**Tillåt deltagare att se meddelanden om dem mellan lärare**

Om utbyte av meddelanden om en användare är aktiverat gör detta alternativ att den berörda användaren kan se meddelandena. Detta är för att uppfylla transparensregler som organisationen kan behöva följa.

*Standard: `false`*