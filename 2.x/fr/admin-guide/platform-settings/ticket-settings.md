# Paramètres des Tickets

Comportement du système de **Tickets** (assistance technique).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Tickets**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `show_link_bug_notification`

**Afficher le lien pour signaler un bug**

Affiche un lien dans l'en-tête pour signaler un bug sur notre plateforme de support (http://support.chamilo.org). En cliquant sur le lien, l'utilisateur est redirigé vers la plateforme de support, sur une page wiki qui décrit le processus de signalement de bugs.

*Par défaut : `false`*

### `show_link_ticket_notification`

**Afficher le lien de création de ticket**

Affiche le lien de création de ticket aux utilisateurs sur le côté droit du portail.

*Par défaut : `false`*

### `ticket_allow_category_edition`

**Autoriser l'édition des catégories de tickets**

Permet l'édition des catégories par les administrateurs.

*Par défaut : `false`*

### `ticket_allow_student_add`

**Autoriser les utilisateurs à ajouter des tickets**

Permet à tous les utilisateurs d'ajouter des tickets, et pas seulement aux administrateurs.

*Par défaut : `false`*

### `ticket_project_user_roles`

**Accès par rôle aux projets de tickets**

Permet aux projets de tickets d'être accessibles par des rôles d'utilisateur spécifiques. Exemple : ['permissions' => [1 => [17]] où project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Envoyer des messages d'avertissement sur les tickets aux administrateurs**

Envoie un message si un ticket a été créé sans catégorie ou si une catégorie n'a aucun administrateur assigné.

*Par défaut : `false`*

### `ticket_warn_admin_no_user_in_category`

**Envoyer une alerte aux administrateurs si une catégorie de tickets n'a personne en charge**

Envoie un message d'avertissement (par e-mail et message Chamilo) à tous les administrateurs s'il n'y a pas d'utilisateur assigné à une catégorie.

*Par défaut : `false`*