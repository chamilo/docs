# Närvaroinställningar

Standardvärden och beteende för verktyget **Närvaro**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Närvaro**. Denna kategori innehåller **5 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_delete_attendance`

**Närvaro: aktivera radering**

Standardbeteendet i Chamilo är att dölja närvarolistor i stället för att radera dem, för den händelse att läraren skulle göra det av misstag. Aktivera det här alternativet för att tillåta lärare att *verkligen* radera närvarolistor.

*Standard: `true`*

### `attendance_allow_comments`

**Tillåt kommentarer i närvarolistor**

Lärare och studenter kan kommentera varje enskild närvaro (för att motivera).

*Standard: `false`*

### `attendance_calendar_set_duration` **v3**

**Varaktighet för närvarohändelser**

Alternativ för att definiera varaktigheten för en händelse i närvarolistan.

*Standard: `false`*

### `enable_sign_attendance_sheet`

**Närvarosignering**

Aktivera insamling av underskrifter för att bekräfta närvaro.

*Standard: `false`*

### `multilevel_grading`

**Aktivera flernivåbetygsättning av närvaro**

Tillåter betygsättning av närvaro med flera nivåer i stället för ett enkelt närvarande/frånvarande-system.

*Standard: `false`*