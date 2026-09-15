# Paramètres des flux de travail

Interrupteurs transversaux des flux de travail — création de cours, validation des inscriptions, flux de travail des devoirs, et assimilés.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Flux de travail**. Cette catégorie contient **23 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_user_course_subscription_by_course_admin`

**Autoriser l’inscription des utilisateurs au cours par l’administrateur de cours**

Activer cette option permettra à l’administrateur de cours d’inscrire des utilisateurs dans un cours

*Par défaut : `true`*


### `allow_users_to_create_courses`

**Autoriser les non-administrateurs à créer des cours**

Autoriser les non-administrateurs (enseignants) à créer de nouveaux cours sur le serveur

*Par défaut : `false`*


### `allow_working_time_edition`

**Activer l’édition du temps de travail dans le cours**

Activez cette fonctionnalité pour permettre aux enseignants de mettre à jour manuellement le temps passé dans le cours par les apprenants.

*Par défaut : `false`*


### `course_visibility_change_only_admin`

**Modifications de visibilité des cours réservées aux administrateurs**

Retirer la possibilité pour les non-administrateurs de modifier la visibilité du cours. La visibilité peut poser problème lorsqu’il y a trop d’enseignants à contrôler directement. Forcer les visibilités permet à l’organisation de mieux gérer les catalogues de cours.

*Par défaut : `false`*


### `default_menu_entry_for_course_or_session`

**Entrée de menu par défaut pour les cours**

Définir les sous-éléments par défaut de l’entrée « Cours » à afficher si l’utilisateur n’est inscrit à aucun cours ni à aucune session.

*Par défaut : `my_courses`*


### `disable_user_conditions_sender_id`

**Identifiant interne de l’utilisateur utilisé pour envoyer les notifications de compte désactivé**

Éviter d’être trop personnel avec les utilisateurs en utilisant un compte « bot » pour envoyer des e-mails aux utilisateurs lorsque leur compte est désactivé pour une raison quelconque.

*Par défaut : `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Désactiver la possibilité de modifier les tuteurs de cours**

Lorsqu’elle est désactivée, les administrateurs n’ont pas de lien pour attribuer rapidement des tuteurs aux cours de session sur la page d’édition du cours.

*Par défaut : `false`*


### `drh_allow_access_to_all_students`

**Les responsables RH peuvent accéder à tous les étudiants depuis les pages de reporting**

[inféré] Accorder aux responsables RH/DRH l’accès aux pages de reporting pour tous les apprenants de la plateforme.

*Par défaut : `false`*


### `gamification_mode`

**Mode ludification**

Activer l’obtention d’étoiles dans les parcours d’apprentissage

### `go_to_course_after_login`

**Aller directement au cours après la connexion**

Lorsqu’un utilisateur est inscrit à un seul cours, aller directement au cours après la connexion

*Par défaut : `false`*


### `load_term_conditions_section`

**Charger la section des conditions d’utilisation**

L’accord juridique apparaîtra lors de la connexion ou à l’entrée dans un cours.

*Par défaut : `login`*


### `multiple_url_hide_disabled_settings`

**Masquer les paramètres désactivés dans les sous-URL**

Réglez sur oui pour masquer complètement les paramètres dans une sous-URL si le paramètre est désactivé dans l’URL principale (lorsque le champ access_url_changeable = 0)

*Par défaut : `false`*


### `plugin_redirection_enabled`

**Activer le plugin de redirection**

Activer uniquement si vous utilisez le plugin Redirection

*Par défaut : `false`*


### `redirect_index_to_url_for_logged_users`

**Rediriger index.php vers une URL donnée pour les utilisateurs authentifiés**

Si vous ne souhaitez pas utiliser la page d’index (annonces, cours populaires, etc.), vous pouvez définir ici le script (à partir de la racine des documents) vers lequel les utilisateurs seront redirigés lorsqu’ils tentent de charger l’index.

### `send_all_emails_to`

**Envoyer tous les e-mails à**

Indiquez une liste d’adresses e-mail auxquelles *tous* les e-mails envoyés depuis la plateforme seront transmis. Les e-mails sont envoyés à ces adresses en tant que destinataires visibles.

### `session_admin_user_subscription_search_extra_field_to_search`

**Champ utilisateur supplémentaire utilisé pour rechercher et nommer les sessions**

Ce paramètre définit la clé du champ utilisateur supplémentaire (par ex. « company ») qui sera utilisée pour rechercher des utilisateurs et pour définir le nom de la session lors de l’inscription d’étudiants depuis /admin-dashboard/register.

### `teacher_can_select_course_template`

**L’enseignant peut sélectionner un cours comme modèle**

Autoriser le choix d’un cours comme modèle pour le nouveau cours que l’enseignant est en train de créer

*Par défaut : `true`*


### `update_student_expiration_x_date`

**Définir la date d’expiration à la première connexion**

Tableau définissant les « days » et « months » pour fixer la date d’expiration du compte lorsque l’utilisateur se connecte pour la première fois.

### `user_edition_extra_field_to_check`

**Définir un champ supplémentaire comme déclencheur d’inscription en tant qu’ancien apprenant**

Indiquez ici le libellé d’un champ supplémentaire. Si ce champ supplémentaire est mis à jour pour un utilisateur, un processus est déclenché pour vérifier l’accès de cet utilisateur aux cours portant le même champ supplémentaire.

### `user_number_of_days_for_default_expiration_date_per_role`

**Jours d'expiration par défaut par rôle**

Un tableau rôle => nombre qui représente le nombre de jours dont dispose un compte avant expiration, selon le rôle.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Désactiver la désinscription de l'utilisateur du cours/session lors de la désinscription de l'utilisateur du groupe/classe**

[inféré] Lorsqu'on retire un utilisateur d'un groupe/classe, ne pas le désinscrire automatiquement des cours ou sessions associés.

*Par défaut : `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Désactiver la désinscription de l'utilisateur du cours lors du retrait du cours du groupe/classe**

[inféré] Lorsqu'un cours est retiré d'un groupe/classe, ne pas désinscrire automatiquement les utilisateurs de ce cours.

*Par défaut : `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Désactiver la désinscription de l'utilisateur de la session lors du retrait de la session du groupe/classe**

[inféré] Lorsqu'une session est retirée d'un groupe/classe, ne pas désinscrire automatiquement les utilisateurs de cette session.

*Par défaut : `false`*