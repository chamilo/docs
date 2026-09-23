# Inställningar för meddelanden

Beteende för kursverktyget **Meddelanden** — hur meddelanden skickas och schemaläggs.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Meddelanden**. Denna kategori innehåller **10 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_careers_in_global_announcements`

**Koppla globala meddelanden till karriärer och befordringar**

När funktionen är aktiverad kan globala meddelanden kopplas till karriärer och befordringar för riktad distribution.

*Standard: `false`*

### `allow_coach_to_edit_announcements`

**Tillåt handledare att alltid redigera meddelanden**

Tillåt handledare att alltid redigera meddelanden i aktiva eller avslutade sessioner.

*Standard: `false`*

### `allow_scheduled_announcements`

**Aktivera schemalagda meddelanden i sessioner**

Tillåter sessionsansvariga att ange meddelanden som utlöses på specifika datum eller efter/före ett visst antal dagar från sessionens start/slut. Aktivering av denna funktion kräver att du konfigurerar en cron-uppgift.

*Standard: `false`*

### `announcements_hide_send_to_hrm_users`

**Dölj alternativet att skicka meddelanden till HR-användare**

Ta bort kryssrutan för att aktivera sändning av meddelanden till användare med HR-roller (kräver fortfarande bekräftelse i meddelandeverktyget).

*Standard: `true`*

### `course_announcement_scheduled_by_date`

**Datumstyrda meddelanden**

Tillåt lärare att konfigurera meddelanden som skickas på specifika datum. Detta kräver att du konfigurerar en cron-uppgift på cron/course_announcement.php som körs minst en gång dagligen.

*Standard: `false`*

### `disable_announcement_attachment`

**Inaktivera bilagor till meddelanden**

Även om bilagor i den här versionen hanteras på ett elegant sätt och inte multipliceras på disk kan du vilja inaktivera bilagor helt om du vill undvika överdrifter.

*Standard: `false`*

### `disable_delete_all_announcements`

**Inaktivera knappen för att ta bort alla meddelanden**

Välj 'Ja' för att ta bort knappen för att radera alla meddelanden, eftersom den kan användas av misstag av lärare.

*Standard: `false`*

### `hide_announcement_sent_to_users_info`

**Dölj 'skickat till' i meddelanden**

Välj 'Ja' för att undvika att visa till vem ett meddelande har skickats.

*Standard: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Dölj globala meddelanden för anonyma**

Dölj plattformsmeddelanden för anonyma användare och visa dem endast för autentiserade användare.

*Standard: `false`*

### `hide_send_to_hrm_users`

**Dölj alternativet att skicka en kopia av meddelandet till HRM**

I meddelandeformuläret visas normalt ett alternativ som låter lärare skicka en kopia av meddelandet till användarens HRM. Ställ in detta på 'Ja' för att ta bort alternativet (och *inte* skicka kopian).