# Chattinställningar

Beteende för kursverktyget **Chatt**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Chatt**. Denna kategori innehåller **5 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_global_chat`

**Tillåt global chatt**

Användare kan chatta med varandra

*Standard: `false`*

### `course_chat_restrict_to_coach`

**Begränsa kurschatten till handledare**

Tillåt endast studenter att prata med handledarna i kursen (inte med andra studenter).

*Standard: `false`*

### `hide_chat_video`

**Dölj videochattalternativet i global chatt**

När funktionen är aktiverad inaktiveras videochatt och den är inte tillgänglig i det globala chattverktyget.

*Standard: `true`*

### `save_private_conversations_in_documents`

**Spara privata konversationer i dokument**

Om funktionen är aktiverad speglas 1:1-privatchattmeddelanden i kursens chatthistorikdokument. Rekommenderas att hålla inaktiverad av integritetsskäl.

*Standard: `false`*

### `show_chat_folder`

**Visa historikmappen för chattkonversationer**

Detta visar för läraren mappen som innehåller alla sessioner som har gjorts i chatten; läraren kan göra dem synliga eller inte för deltagare och använda dem som en resurs

*Standard: `true`*