# Paramètres des tickets

Comportement du système de **tickets** (assistance).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Tickets**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `show_link_bug_notification`

**Afficher le lien pour signaler un bogue**

Affiche un lien dans l’en-tête pour signaler un bogue sur notre plateforme d’assistance (http://support.chamilo.org). En cliquant sur le lien, l’utilisateur est redirigé vers la plateforme d’assistance, sur une page wiki qui décrit le processus de signalement des bogues.

*Valeur par défaut : `false`*


### `show_link_ticket_notification`

**Afficher le lien de création de ticket**

Affiche le lien de création de ticket aux utilisateurs sur le côté droit du portail

*Valeur par défaut : `false`*


### `ticket_allow_category_edition`

**Autoriser la modification des catégories de tickets**

Autorise la modification des catégories par les administrateurs.

*Valeur par défaut : `false`*

### `ticket_allow_student_add`

**Autoriser les utilisateurs à ajouter des tickets**

Permet à tous les utilisateurs d’ajouter des tickets, et pas uniquement aux administrateurs.

*Valeur par défaut : `false`*

### `ticket_project_user_roles`

**Accès par rôle aux projets de tickets**

Permet d’accéder aux projets de tickets selon des rôles utilisateur spécifiques. Exemple : ['permissions' => [1 => [17]] où project_id = 1, STUDENT_BOSS = 17.

> Ce paramètre est obligatoire pour les utilisateurs non administrateurs : sans correspondance de rôle définie ici, seuls les administrateurs peuvent accéder aux tickets d’assistance. Pour donner à un autre rôle l’accès à un projet de tickets, ajoutez son identifiant de rôle aux permissions de ce paramètre pour ce projet.

### `ticket_send_warning_to_all_admins`

**Envoyer les messages d’avertissement des tickets aux administrateurs**

Envoie un message si un ticket a été créé sans catégorie ou si une catégorie n’a aucun administrateur assigné.

*Valeur par défaut : `false`*


### `ticket_warn_admin_no_user_in_category`

**Alerter les administrateurs si une catégorie de tickets n’a personne en charge**

Envoie un message d’avertissement (e-mail et message Chamilo) à tous les administrateurs s’il n’y a pas d’utilisateur assigné à une catégorie.

*Valeur par défaut : `false`*