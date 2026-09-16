# Paramètres des tâches cron

Configuration des tâches planifiées (tâches cron) livrées avec Chamilo.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Tâches cron**. Cette catégorie contient **5 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `cron_remind_course_expiration_activate`

**Cron de rappel d’expiration de cours**

Activer le cron de rappel d’expiration de cours

*Par défaut : `false`*

### `cron_remind_course_expiration_frequency`

**Fréquence du cron de rappel d’expiration de cours**

Nombre de jours avant l’expiration du cours à prendre en compte pour l’envoi du courriel de rappel

### `cron_remind_course_finished_activate`

**Envoyer une notification de fin de cours**

Indique s’il faut envoyer un courriel aux apprenants lorsque leur cours (session) est terminé. Cela nécessite que les tâches cron soient configurées (voir le répertoire main/cron/).

*Par défaut : `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron de rappel d’expiration des certificats**

Activer le cron `app:send-certificate-expiry-reminders`, qui rappelle aux apprenants dont les certificats ont expiré ou sont sur le point d’expirer.

*Par défaut : `false`*

### `cron_certificate_expiry_reminder_days`

**Fenêtre de rappel d’expiration des certificats (jours)**

Nombre de jours par défaut à l’avance pour rechercher les certificats sur le point d’expirer, utilisé sauf si le cron est exécuté avec `--days-ahead`.

*Par défaut : `30`*

## Rappels d’expiration des certificats

Les certificats du carnet de notes peuvent se voir attribuer une période de validité (en jours), configurée par catégorie de carnet de notes — voir [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Une fois qu’un certificat a une date d’expiration, Chamilo peut rappeler à l’apprenant par courriel et message interne à l’approche (ou après le dépassement) de cette date d’expiration.

L’activation de `cron_certificate_expiry_reminder_activate` ci-dessus n’active que la *fonctionnalité* ; le rappel est en réalité envoyé par une commande console que vous devez encore planifier au niveau du système d’exploitation (par ex. via `crontab`), car Chamilo n’exécute pas son propre planificateur en arrière-plan :

```bash
php bin/console app:send-certificate-expiry-reminders
```

Options utiles :

| Option | Effet |
|--------|--------|
| `--days-ahead=N` | Nombre de jours avant l’expiration à inclure (par défaut `cron_certificate_expiry_reminder_days`) |
| `--force` | Envoie réellement les rappels. Sans cette option, la commande se contente de signaler ce qu’elle *enverrait* — sans danger pour vérifier avant de l’intégrer au cron |
| `--resend` | Renvoyer les rappels même pour une paire certificat/date d’expiration déjà notifiée |
| `--access-url-id=N` | Restreindre l’analyse à un portail (installations multi-URL) |
| `--include-unsubscribed-users` | Notifier également les apprenants qui se sont désinscrits des courriels de la plateforme |

Les enseignants peuvent envoyer les mêmes rappels manuellement, sans avoir besoin de ce cron — voir [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).