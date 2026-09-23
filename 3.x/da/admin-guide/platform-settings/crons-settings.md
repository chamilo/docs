# Indstillinger for cron-jobs

Konfiguration af planlagte jobs (cron-opgaver) der følger med Chamilo.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Cron-jobs**. Denne kategori indeholder **5 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `cron_remind_course_expiration_activate`

**Cron til påmindelse om kursusudløb**

Aktivér cron’en til påmindelse om kursusudløb

*Standard: `false`*

### `cron_remind_course_expiration_frequency`

**Hyppighed for cron til påmindelse om kursusudløb**

Antal dage før kursets udløb, der skal tages i betragtning ved afsendelse af påmindelsesmail

### `cron_remind_course_finished_activate`

**Send notifikation om afsluttet kursus**

Om der skal sendes en e-mail til studerende, når deres kursus (session) er afsluttet. Dette kræver, at cron-opgaver er konfigureret (se mappen main/cron/).

*Standard: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron til påmindelse om certifikatudløb**

Aktivér cron’en `app:send-certificate-expiry-reminders`, som minder lærende, hvis certifikater er udløbet eller er ved at udløbe.

*Standard: `false`*

### `cron_certificate_expiry_reminder_days`

**Vindue for påmindelse om certifikatudløb (dage)**

Standardantal dage frem, der scannes efter certifikater, som er ved at udløbe, medmindre cron’en køres med `--days-ahead`.

*Standard: `30`*

## Påmindelser om certifikatudløb

Gradebook-certifikater kan tildeles en gyldighedsperiode (i dage), konfigureret pr. gradebook-kategori — se [Certifikater og færdigheder](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Når et certifikat har en udløbsdato, kan Chamilo minde den lærende via e-mail og intern besked, når udløbsdatoen nærmer sig (eller efter den er passeret).

Aktivering af `cron_certificate_expiry_reminder_activate` ovenfor slår kun *funktionen* til; påmindelsen sendes faktisk af en konsolkommando, som du stadig skal planlægge på OS-niveau (f.eks. via `crontab`), da Chamilo ikke kører sin egen baggrundsplanlægger:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Nyttige indstillinger:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | How many days ahead of expiry to include (defaults to `cron_certificate_expiry_reminder_days`) |
| `--force` | Actually send the reminders. Without it, the command only reports what it *would* send — safe to run to check before wiring it into cron |
| `--resend` | Re-send reminders even for a certificate/expiry-date pair already notified |
| `--access-url-id=N` | Restrict the scan to one portal (multi-URL installations) |
| `--include-unsubscribed-users` | Also notify learners who unsubscribed from platform e-mails |

Undervisere kan sende de samme påmindelser manuelt uden at have brug for denne cron — se [Certifikater og færdigheder](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).