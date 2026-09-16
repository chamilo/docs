# Cronjobs-instellingen

Configuratie van geplande taken (crontaken) die bij Chamilo worden geleverd.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cronjobs**. Deze categorie bevat **5 instellingen**, hieronder weergegeven met de titel en toelichting zoals die in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`) zijn opgenomen.

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u die instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `cron_remind_course_expiration_activate`

**Cron Herinnering cursusverval**

Schakel de cron Herinnering cursusverval in

*Standaard: `false`*

### `cron_remind_course_expiration_frequency`

**Frequentie voor de cron Herinnering cursusverval**

Aantal dagen vóór het vervallen van de cursus waarop een herinneringsmail moet worden verzonden

### `cron_remind_course_finished_activate`

**Melding cursus afgerond verzenden**

Of er een e-mail naar studenten moet worden verzonden wanneer hun cursus (sessie) is afgerond. Dit vereist dat crontaken zijn geconfigureerd (zie de map main/cron/).

*Standaard: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron herinnering certificaatverval**

Schakel de cron `app:send-certificate-expiry-reminders` in, die cursisten herinnert van wie de certificaten zijn vervallen of binnenkort vervallen.

*Standaard: `false`*

### `cron_certificate_expiry_reminder_days`

**Venster herinnering certificaatverval (dagen)**

Standaard aantal dagen vooruit om te scannen op certificaten die binnenkort vervallen, gebruikt tenzij de cron wordt uitgevoerd met `--days-ahead`.

*Standaard: `30`*

## Herinneringen certificaatverval

Aan gradebook-certificaten kan een geldigheidsperiode (in dagen) worden toegekend, geconfigureerd per gradebook-categorie — zie [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Zodra een certificaat een vervaldatum heeft, kan Chamilo de cursist per e-mail en intern bericht herinneren wanneer die vervaldatum nadert (of nadat deze is verstreken).

Het inschakelen van `cron_certificate_expiry_reminder_activate` hierboven schakelt alleen de *functie* in; de herinnering wordt daadwerkelijk verzonden door een consolecommando dat u nog op OS-niveau moet plannen (bijv. via `crontab`), omdat Chamilo geen eigen achtergrondplanner uitvoert:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Nuttige opties:

| Optie | Effect |
|--------|--------|
| `--days-ahead=N` | Hoeveel dagen vóór vervaldatum moet worden meegenomen (standaard `cron_certificate_expiry_reminder_days`) |
| `--force` | Verzend de herinneringen daadwerkelijk. Zonder deze optie rapporteert het commando alleen wat het *zou* verzenden — veilig om uit te voeren om te controleren voordat u het in cron opneemt |
| `--resend` | Herinneringen opnieuw verzenden, ook voor een certificaat/vervaldatum-paar dat al is gemeld |
| `--access-url-id=N` | Beperk de scan tot één portaal (installaties met meerdere URL's) |
| `--include-unsubscribed-users` | Ook cursisten informeren die zich hebben afgemeld voor platform-e-mails |

Docenten kunnen dezelfde herinneringen handmatig verzenden, zonder deze cron — zie [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).