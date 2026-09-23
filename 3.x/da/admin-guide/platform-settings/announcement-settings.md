# Indstillinger for meddelelser

Adfærd for kursusværktøjet **Meddelelser** — hvordan meddelelser sendes og planlægges.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Meddelelser**. Denne kategori indeholder **10 indstillinger**, som er anført nedenfor med den titel og kommentar, der leveres i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_careers_in_global_announcements`

**Knyt globale meddelelser til karrierer og promotioner**

Når funktionen er aktiveret, kan globale meddelelser knyttes til karrierer og promotioner med henblik på målrettet distribution.

*Standard: `false`*

### `allow_coach_to_edit_announcements`

**Tillad altid tutorer at redigere meddelelser**

Tillad tutorer altid at redigere meddelelser i aktive eller tidligere sessioner.

*Standard: `false`*

### `allow_scheduled_announcements`

**Aktivér planlagte meddelelser i sessioner**

Giver sessionsadministratorer mulighed for at oprette meddelelser, der udløses på bestemte datoer eller efter/før et antal dage i forhold til sessionens start/slut. Aktivering af denne funktion kræver, at du opsætter en cron-opgave.

*Standard: `false`*

### `announcements_hide_send_to_hrm_users`

**Skjul muligheden for at sende meddelelser til HR-brugere**

Fjern afkrydsningsfeltet, der gør det muligt at sende meddelelser til brugere med HR-roller (kræver stadig bekræftelse i meddelelsesværktøjet).

*Standard: `true`*

### `course_announcement_scheduled_by_date`

**Datobaserede meddelelser**

Tillad undervisere at konfigurere meddelelser, der sendes på bestemte datoer. Dette kræver, at du opsætter en cron-opgave på cron/course_announcement.php, som kører mindst én gang dagligt.

*Standard: `false`*

### `disable_announcement_attachment`

**Deaktivér vedhæftning til meddelelser**

Selvom vedhæftninger i denne version håndteres elegant og ikke multipliceres på disken, kan du ønske at deaktivere vedhæftninger helt, hvis du vil undgå overdrivelser.

*Standard: `false`*

### `disable_delete_all_announcements`

**Deaktivér knappen til at slette alle meddelelser**

Vælg 'Ja' for at fjerne knappen til at slette alle meddelelser, da den kan blive brugt ved en fejl af undervisere.

*Standard: `false`*

### `hide_announcement_sent_to_users_info`

**Skjul 'sendt til' i meddelelser**

Vælg 'Ja' for at undgå at vise, hvem en meddelelse er blevet sendt til.

*Standard: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Skjul globale meddelelser for anonyme**

Skjul platformmeddelelser for anonyme brugere, og vis dem kun for autentificerede brugere.

*Standard: `false`*

### `hide_send_to_hrm_users`

**Skjul muligheden for at sende en kopi af meddelelsen til HRM**

I meddelelsesformularen vises der normalt en mulighed, der lader undervisere sende en kopi af meddelelsen til brugerens HRM. Sæt denne til 'Ja' for at fjerne muligheden (og *ikke* sende kopien).