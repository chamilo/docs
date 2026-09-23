# Inställningar för cron-jobb

Konfiguration av schemalagda jobb (cron-uppgifter) som medföljer Chamilo.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Cron-jobb**. Denna kategori innehåller **5 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `cron_remind_course_expiration_activate`

**Påminnelse om kursutgång cron**

Aktivera cron för påminnelse om kursutgång

*Standard: `false`*

### `cron_remind_course_expiration_frequency`

**Frekvens för cron för påminnelse om kursutgång**

Antal dagar före kursens utgång som ska beaktas för att skicka påminnelsemejl

### `cron_remind_course_finished_activate`

**Skicka avisering om avslutad kurs**

Om ett e-postmeddelande ska skickas till studenter när deras kurs (session) är avslutad. Detta kräver att cron-uppgifter är konfigurerade (se katalogen main/cron/).

*Standard: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron för påminnelse om certifikatutgång**

Aktivera cron `app:send-certificate-expiry-reminders`, som påminner deltagare vars certifikat har gått ut eller är på väg att gå ut.

*Standard: `false`*

### `cron_certificate_expiry_reminder_days`

**Fönster för påminnelse om certifikatutgång (dagar)**

Standardantal dagar framåt att skanna efter certifikat som är på väg att gå ut, används om inte cron körs med `--days-ahead`.

*Standard: `30`*

## Påminnelser om certifikatutgång

Gradebook-certifikat kan ges en giltighetsperiod (i dagar), konfigurerad per gradebook-kategori — se [Certifikat och färdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). När ett certifikat har ett utgångsdatum kan Chamilo påminna deltagaren via e-post och internmeddelande när det närmar sig (eller efter att det har passerat) det utgångsdatumet.

Att aktivera `cron_certificate_expiry_reminder_activate` ovan slår bara på *funktionen*; påminnelsen skickas faktiskt av ett konsolkommando som du fortfarande behöver schemalägga på OS-nivå (t.ex. via `crontab`), eftersom Chamilo inte kör en egen bakgrundsschemaläggare:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Användbara alternativ:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | How many days ahead of expiry to include (defaults to `cron_certificate_expiry_reminder_days`) |
| `--force` | Actually send the reminders. Without it, the command only reports what it *would* send — safe to run to check before wiring it into cron |
| `--resend` | Re-send reminders even for a certificate/expiry-date pair already notified |
| `--access-url-id=N` | Restrict the scan to one portal (multi-URL installations) |
| `--include-unsubscribed-users` | Also notify learners who unsubscribed from platform e-mails |

Lärare kan skicka samma påminnelser manuellt, utan att behöva denna cron — se [Certifikat och färdigheter](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).