# Innstillinger for cron-jobber

Konfigurasjon av planlagte jobber (cron-oppgaver) som følger med Chamilo.

Gå til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Cron-jobber**. Denne kategorien inneholder **5 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `cron_remind_course_expiration_activate`

**Cron for påminnelse om kursutløp**

Aktiver cron for påminnelse om kursutløp

*Standard: `false`*

### `cron_remind_course_expiration_frequency`

**Frekvens for cron for påminnelse om kursutløp**

Antall dager før kurset utløper som skal tas i betraktning for å sende påminnelses-e-post

### `cron_remind_course_finished_activate`

**Send varsel om at kurset er avsluttet**

Om det skal sendes e-post til studenter når kurset (sesjonen) deres er avsluttet. Dette krever at cron-oppgaver er konfigurert (se katalogen main/cron/).

*Standard: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron for påminnelse om sertifikatutløp**

Aktiver cron-en `app:send-certificate-expiry-reminders`, som minner lærende hvis sertifikater har utløpt eller er i ferd med å utløpe.

*Standard: `false`*

### `cron_certificate_expiry_reminder_days`

**Vindu for påminnelse om sertifikatutløp (dager)**

Standard antall dager frem i tid som det skal søkes etter sertifikater som er i ferd med å utløpe, brukt med mindre cron-en kjøres med `--days-ahead`.

*Standard: `30`*

## Påminnelser om sertifikatutløp

Karakterboksertifikater kan gis en gyldighetsperiode (i dager), konfigurert per karakterbok-kategori — se [Sertifikater og ferdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Når et sertifikat har en utløpsdato, kan Chamilo minne den lærende via e-post og intern melding når utløpsdatoen nærmer seg (eller etter at den er passert).

Å aktivere `cron_certificate_expiry_reminder_activate` ovenfor slår bare på *funksjonen*; påminnelsen sendes faktisk av en konsollkommando som du fortsatt må planlegge på OS-nivå (f.eks. via `crontab`), siden Chamilo ikke kjører sin egen bakgrunnsplanlegger:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Nyttige alternativer:

| Alternativ | Effekt |
|--------|--------|
| `--days-ahead=N` | Hvor mange dager før utløp som skal inkluderes (standard er `cron_certificate_expiry_reminder_days`) |
| `--force` | Send faktisk påminnelsene. Uten dette rapporterer kommandoen bare hva den *ville* sendt — trygt å kjøre for å sjekke før du kobler den til cron |
| `--resend` | Send påminnelser på nytt selv for et sertifikat/utløpsdato-par som allerede er varslet |
| `--access-url-id=N` | Begrens søket til én portal (installasjoner med flere URL-er) |
| `--include-unsubscribed-users` | Varsle også lærende som har meldt seg av plattform-e-poster |

Lærere kan sende de samme påminnelsene manuelt, uten å trenge denne cron-en — se [Sertifikater og ferdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).