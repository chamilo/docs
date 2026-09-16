# Paramètres des annonces

Comportement de l'outil **Annonces** du cours — comment les annonces sont envoyées et planifiées.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Annonces**. Cette catégorie contient **9 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_careers_in_global_announcements`

**Lier les annonces globales aux carrières et promotions**

Lorsque cette option est activée, les annonces globales peuvent être associées à des carrières et des promotions pour une distribution ciblée.

*Par défaut : `false`*

### `allow_coach_to_edit_announcements`

**Permettre aux coachs de toujours modifier les annonces**

Permet aux coachs de toujours modifier les annonces dans les sessions actives ou passées.

*Par défaut : `false`*

### `allow_scheduled_announcements`

**Activer les annonces planifiées dans les sessions**

Permet aux gestionnaires de sessions de définir des annonces qui seront déclenchées à des dates spécifiques ou après/avant un certain nombre de jours par rapport au début/fin de la session. L'activation de cette fonctionnalité nécessite la configuration d'une tâche cron.

*Par défaut : `false`*

### `announcements_hide_send_to_hrm_users`

**Masquer l'option d'envoi d'annonces aux utilisateurs RH**

Supprime la case à cocher permettant d'envoyer des annonces aux utilisateurs ayant des rôles RH (nécessite toujours une confirmation dans l'outil des annonces).

*Par défaut : `true`*

### `course_announcement_scheduled_by_date`

**Annonces basées sur la date**

Permet aux enseignants de configurer des annonces qui seront envoyées à des dates spécifiques. Cela nécessite la configuration d'une tâche cron sur cron/course_announcement.php s'exécutant au moins une fois par jour.

*Par défaut : `false`*

### `disable_announcement_attachment`

**Désactiver les pièces jointes aux annonces**

Même si les pièces jointes dans cette version sont gérées de manière élégante et ne se multiplient pas sur le disque, vous pourriez vouloir désactiver complètement les pièces jointes si vous souhaitez éviter les excès.

*Par défaut : `false`*

### `disable_delete_all_announcements`

**Désactiver le bouton pour supprimer toutes les annonces**

Sélectionnez 'Oui' pour supprimer le bouton permettant de supprimer toutes les annonces, car cela peut être utilisé par erreur par les enseignants.

*Par défaut : `false`*

### `hide_announcement_sent_to_users_info`

**Masquer 'envoyé à' dans les annonces**

Sélectionnez 'Oui' pour éviter d'afficher à qui une annonce a été envoyée.

*Par défaut : `false`*

### `hide_send_to_hrm_users`

**Masquer l'option d'envoyer une copie de l'annonce au RH**

Dans le formulaire des annonces, une option apparaît normalement pour permettre aux enseignants d'envoyer une copie de l'annonce au RH de l'utilisateur. Définissez cette option sur 'Oui' pour supprimer cette option (et *ne pas* envoyer la copie).