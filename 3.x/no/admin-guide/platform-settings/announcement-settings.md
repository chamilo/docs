# Innstillinger for kunngjøringer

Oppførselen til verktøyet **Kunngjøringer** i kurset — hvordan kunngjøringer sendes og planlegges.

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Kunngjøringer**. Denne kategorien inneholder **10 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_careers_in_global_announcements`

**Koble globale kunngjøringer til karrierer og promosjoner**

Når dette er aktivert, kan globale kunngjøringer knyttes til karrierer og promosjoner for målrettet distribusjon.

*Standard: `false`*

### `allow_coach_to_edit_announcements`

**Tillat at veiledere alltid kan redigere kunngjøringer**

Tillat at veiledere alltid kan redigere kunngjøringer i aktive eller tidligere sesjoner.

*Standard: `false`*

### `allow_scheduled_announcements`

**Aktiver planlagte kunngjøringer i sesjoner**

Lar sesjonsansvarlige opprette kunngjøringer som utløses på bestemte datoer eller etter/før et visst antall dager fra sesjonens start/slutt. Aktivering av denne funksjonen krever at du setter opp en cron-oppgave.

*Standard: `false`*

### `announcements_hide_send_to_hrm_users`

**Skjul valget for å sende kunngjøringer til HR-brukere**

Fjern avkrysningsboksen for å sende kunngjøringer til brukere med HR-roller (krever fortsatt bekreftelse i kunngjøringsverktøyet).

*Standard: `true`*

### `course_announcement_scheduled_by_date`

**Datobaserte kunngjøringer**

Lar lærere konfigurere kunngjøringer som sendes på bestemte datoer. Dette krever at du setter opp en cron-oppgave på cron/course_announcement.php som kjører minst én gang daglig.

*Standard: `false`*

### `disable_announcement_attachment`

**Deaktiver vedlegg til kunngjøringer**

Selv om vedlegg i denne versjonen håndteres på en elegant måte og ikke multipliseres på disk, kan du likevel ønske å deaktivere vedlegg helt for å unngå overforbruk.

*Standard: `false`*

### `disable_delete_all_announcements`

**Deaktiver knappen for å slette alle kunngjøringer**

Velg «Ja» for å fjerne knappen som sletter alle kunngjøringer, ettersom den kan brukes ved en feiltakelse av lærere.

*Standard: `false`*

### `hide_announcement_sent_to_users_info`

**Skjul «sendt til» i kunngjøringer**

Velg «Ja» for å unngå å vise hvem en kunngjøring er sendt til.

*Standard: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Skjul globale kunngjøringer for anonyme**

Skjul plattformkunngjøringer for anonyme brukere, og vis dem kun for autentiserte brukere.

*Standard: `false`*

### `hide_send_to_hrm_users`

**Skjul valget for å sende en kopi av kunngjøringen til HRM**

I kunngjøringsskjemaet vises normalt et valg som lar lærere sende en kopi av kunngjøringen til brukerens HRM. Sett dette til «Ja» for å fjerne valget (og *ikke* sende kopien).