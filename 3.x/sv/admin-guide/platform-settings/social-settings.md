# Inställningar för socialt nätverk

Beteende för **Socialt nätverk** — vänner, grupper, väggposter, fotoalbum.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Socialt nätverk**. Denna kategori innehåller **7 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_social_tool`

**Verktyg för socialt nätverk (Facebook-liknande)**

Verktyget för socialt nätverk gör det möjligt för användare att definiera relationer med andra användare och därigenom definiera grupper av vänner. Tillsammans med det interna meddelandeverktyget möjliggör detta verktyg tät kommunikation med vänner, inne i portalmiljön.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Tillåt deltagare att skapa grupper i det sociala nätverket**

Tillåt deltagare att skapa grupper i det sociala nätverket

*Standard: `false`*


### `disable_dislike_option`

**Inaktivera "ogilla" för sociala inlägg**

Ta bort alternativet tumme ner för återkoppling på sociala inlägg. Behåll endast tumme upp (gilla).

*Standard: `false`*

### `hide_social_groups_block`

**Dölj gruppblocket i det sociala nätverket**

Tar bort gruppsektionen från vyn för det sociala nätverket.

*Standard: `false`*


### `social_enable_messages_feedback`

**Gilla/Ogilla för sociala inlägg**

Tillåter användare att lägga till återkoppling (gilla eller ogilla) på inlägg på den sociala väggen.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Lärare och administratörer ser studenter som vänner i det sociala nätverket**

Gör automatiskt att instruktörer och administratörer visas som vänner för alla studenter i modulen för socialt nätverk.

*Standard: `false`*


### `social_show_language_flag_in_profile`

**Visa språkflagga bredvid avatar i det sociala nätverket**

Visar användarens språkpreferens som en flaggikon bredvid avataren i profiler i det sociala nätverket.

*Standard: `false`*