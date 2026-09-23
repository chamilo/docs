# Fremmødeindstillinger

Standardværdier og adfærd for værktøjet **Attendance**.

Tilgå disse indstillinger under **Administration > Configuration settings > Attendance**. Denne kategori indeholder **5 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_delete_attendance`

**Fremmøder: aktivér sletning**

Standardadfærden i Chamilo er at skjule fremmødeark i stedet for at slette dem, i tilfælde af at underviseren gør det ved en fejl. Aktivér denne indstilling for at tillade undervisere at slette fremmødeark *reelt*.

*Standard: `true`*

### `attendance_allow_comments`

**Tillad kommentarer i fremmødeark**

Undervisere og studerende kan kommentere på hvert enkelt fremmøde (til begrundelse).

*Standard: `false`*

### `attendance_calendar_set_duration` **v3**

**Varighed af fremmødehændelser**

Indstilling til at definere varigheden for en hændelse i fremmødearket.

*Standard: `false`*

### `enable_sign_attendance_sheet`

**Underskrift af fremmøde**

Aktivér indsamling af underskrifter for at bekræfte ens fremmøde.

*Standard: `false`*

### `multilevel_grading`

**Aktivér flerniveau-bedømmelse af fremmøde**

Tillader bedømmelse af fremmøde med flere niveauer i stedet for et simpelt til stede/fraværende-system.

*Standard: `false`*