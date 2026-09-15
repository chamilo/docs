# Paramètres des annonces

Comportement de l’outil **Annonces** du cours — envoi et planification des annonces.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Annonces**. Cette catégorie contient **10 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou pour modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_careers_in_global_announcements`

**Lier les annonces globales aux filières et promotions**

Lorsque cette option est activée, les annonces globales peuvent être associées à des filières et des promotions pour une diffusion ciblée.

*Par défaut : `false`*

### `allow_coach_to_edit_announcements`

**Autoriser les tuteurs à toujours modifier les annonces**

Autoriser les tuteurs à toujours modifier les annonces dans les sessions actives ou passées.

*Par défaut : `false`*

### `allow_scheduled_announcements`

**Activer les annonces planifiées dans les sessions**

Permet aux gestionnaires de sessions de définir des annonces qui seront déclenchées à des dates précises ou un certain nombre de jours avant/après le début/la fin de la session. L’activation de cette fonctionnalité nécessite la configuration d’une tâche cron.

*Par défaut : `false`*

### `announcements_hide_send_to_hrm_users`

**Masquer l’option d’envoi des annonces aux utilisateurs RH**

Supprime la case à cocher permettant d’envoyer les annonces aux utilisateurs ayant des rôles RH (une confirmation reste nécessaire dans l’outil Annonces).

*Par défaut : `true`*

### `course_announcement_scheduled_by_date`

**Annonces basées sur la date**

Permet aux enseignants de configurer des annonces qui seront envoyées à des dates précises. Cela nécessite la configuration d’une tâche cron sur cron/course_announcement.php s’exécutant au moins une fois par jour.

*Par défaut : `false`*

### `disable_announcement_attachment`

**Désactiver les pièces jointes aux annonces**

Même si, dans cette version, les pièces jointes sont gérées de manière élégante et ne se multiplient pas sur le disque, vous pouvez souhaiter les désactiver entièrement pour éviter les excès.

*Par défaut : `false`*

### `disable_delete_all_announcements`

**Désactiver le bouton de suppression de toutes les annonces**

Sélectionnez « Oui » pour retirer le bouton de suppression de toutes les annonces, car il peut être utilisé par erreur par les enseignants.

*Par défaut : `false`*

### `hide_announcement_sent_to_users_info`

**Masquer « envoyé à » dans les annonces**

Sélectionnez « Oui » pour ne pas afficher à qui une annonce a été envoyée.

*Par défaut : `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Masquer les annonces globales pour les anonymes**

Masque les annonces de la plateforme aux utilisateurs anonymes et ne les affiche qu’aux utilisateurs authentifiés.

*Par défaut : `false`*

### `hide_send_to_hrm_users`

**Masquer l’option d’envoi d’une copie de l’annonce au RH**

Dans le formulaire des annonces, une option apparaît normalement pour permettre aux enseignants d’envoyer une copie de l’annonce au responsable RH de l’utilisateur. Réglez cette option sur « Oui » pour retirer l’option (et *ne pas* envoyer la copie).