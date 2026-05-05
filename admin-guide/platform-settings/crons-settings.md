# Cron Jobs Settings

Configuration of scheduled jobs (cron tasks) shipped with Chamilo.

Access these settings under **Administration > Configuration settings > Cron Jobs**. This category contains **3 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `cron_remind_course_expiration_activate`

**Remind Course Expiration cron**

Enable the Remind Course Expiration cron

*Default: `false`*

### `cron_remind_course_expiration_frequency`

**Frequency for the Remind Course Expiration cron**

Number of days before the expiration of the course to consider to send reminder mail

*Default: `2`*

### `cron_remind_course_finished_activate`

**Send course finished notification**

Whether to send an e-mail to students when their course (session) is finished. This requires cron tasks to be configured (see main/cron/ directory).

*Default: `false`*

