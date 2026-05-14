# Instellingen voor Cron Jobs

Configuratie van geplande taken (cron-taken) die met Chamilo worden meegeleverd.

Deze instellingen zijn toegankelijk via **Beheer > Configuratie-instellingen > Cron Jobs**. Deze categorie bevat **3 instellingen**, hieronder vermeld met de titel en opmerking zoals opgenomen in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `cron_remind_course_expiration_activate`

**Herinnering aan cursusverloop cron**

Schakel de Herinnering aan cursusverloop cron in

*Standaard: `false`*

### `cron_remind_course_expiration_frequency`

**Frequentie voor de Herinnering aan cursusverloop cron**

Aantal dagen vóór het verlopen van de cursus om een herinneringsmail te sturen

### `cron_remind_course_finished_activate`

**Melding cursus voltooid verzenden**

Of een e-mail naar studenten moet worden verzonden wanneer hun cursus (sessie) is voltooid. Hiervoor moeten cron-taken worden geconfigureerd (zie de map main/cron/).

*Standaard: `false`*