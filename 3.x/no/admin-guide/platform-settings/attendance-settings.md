# Fraværsinnstillinger

Standardverdier og atferd for verktøyet **Attendance**.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Attendance**. Denne kategorien inneholder **5 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_delete_attendance`

**Fravær: aktiver sletting**

Standardatferden i Chamilo er å skjule fraværslister i stedet for å slette dem, i tilfelle læreren gjør det ved en feiltakelse. Aktiver dette valget for å la lærere *virkelig* slette fraværslister.

*Standard: `true`*

### `attendance_allow_comments`

**Tillat kommentarer i fraværslister**

Lærere og studenter kan kommentere hvert enkelt fravær (for å begrunne).

*Standard: `false`*

### `attendance_calendar_set_duration` **v3**

**Varighet for fraværshendelser**

Valg for å definere varigheten for en hendelse i fraværslisten.

*Standard: `false`*

### `enable_sign_attendance_sheet`

**Signering av fravær**

Aktiver innsamling av signaturer for å bekrefte oppmøte.

*Standard: `false`*

### `multilevel_grading`

**Aktiver flernivåvurdering av fravær**

Tillater vurdering av fravær med flere nivåer i stedet for et enkelt til stede/fraværende-system.

*Standard: `false`*