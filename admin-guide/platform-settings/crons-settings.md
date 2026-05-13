---
# Paramètres des tâches planifiées (Cron Jobs)

Configuration des tâches planifiées (cron tasks) fournies avec Chamilo.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Tâches planifiées (Cron Jobs)**. Cette catégorie contient **3 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `cron_remind_course_expiration_activate`

**Rappel de l'expiration des cours (cron)**

Activer le cron de rappel de l'expiration des cours

*Par défaut : `false`*

### `cron_remind_course_expiration_frequency`

**Fréquence du cron de rappel de l'expiration des cours**

Nombre de jours avant l'expiration du cours à prendre en compte pour envoyer un courriel de rappel

### `cron_remind_course_finished_activate`

**Envoyer une notification de fin de cours**

Détermine si un courriel doit être envoyé aux étudiants lorsque leur cours (session) est terminé. Cela nécessite que les tâches cron soient configurées (voir le répertoire main/cron/).

*Par défaut : `false`*