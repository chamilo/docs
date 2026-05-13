# Paramètres des flux de travail

Paramètres transversaux des flux de travail — création de cours, validation d'inscription, flux de travail des devoirs, et similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Flux de travail**. Cette catégorie contient **23 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_user_course_subscription_by_course_admin`

**Permettre l'inscription des utilisateurs au cours par l'administrateur du cours**

Activer cette option permettra à l'administrateur du cours d'inscrire des utilisateurs dans un cours.

*Par défaut : `true`*

### `allow_users_to_create_courses`

**Permettre aux non-administrateurs de créer des cours**

Permettre aux non-administrateurs (enseignants) de créer de nouveaux cours sur le serveur.

*Par défaut : `false`*

### `allow_working_time_edition`

**Activer l'édition du temps de travail dans le cours**

Activer cette fonctionnalité pour permettre aux enseignants de mettre à jour manuellement le temps passé dans le cours par les apprenants.

*Par défaut : `false`*

### `course_visibility_change_only_admin`

**Changements de visibilité des cours réservés aux administrateurs**

Supprimer la possibilité pour les non-administrateurs de modifier la visibilité des cours. La visibilité peut poser problème lorsqu'il y a trop d'enseignants à contrôler directement. Forcer les visibilités permet à l'organisation de mieux gérer les catalogues de cours.

*Par défaut : `false`*

### `default_menu_entry_for_course_or_session`

**Entrée de menu par défaut pour les cours**

Définir les sous-éléments par défaut de l'entrée 'Cours' à afficher si l'utilisateur n'est inscrit à aucun cours ni session.

*Par défaut : `my_courses`*

### `disable_user_conditions_sender_id`

**ID interne de l'utilisateur utilisé pour envoyer des notifications de compte désactivé**

Éviter d'être trop personnel avec les utilisateurs en utilisant un compte 'bot' pour envoyer des e-mails aux utilisateurs lorsque leur compte est désactivé pour une raison quelconque.

*Par défaut : `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Désactiver la possibilité de modifier les coachs de session**

Lorsqu'elle est désactivée, les administrateurs n'ont pas de lien pour attribuer rapidement des coachs aux cours de session sur la page d'édition du cours.

*Par défaut : `false`*

### `drh_allow_access_to_all_students`

**Les gestionnaires RH peuvent accéder à tous les étudiants depuis les pages de rapport**

[inféré] Accorder aux gestionnaires RH/DRH l'accès aux pages de rapport pour tous les apprenants de la plateforme.

*Par défaut : `false`*

### `gamification_mode`

**Mode de gamification**

Activer l'obtention d'étoiles dans les parcours d'apprentissage.

### `go_to_course_after_login`

**Aller directement au cours après la connexion**

Lorsqu'un utilisateur est inscrit à un cours, aller directement au cours après la connexion.

*Par défaut : `false`*

### `load_term_conditions_section`

**Charger la section des conditions générales**

L'accord légal apparaîtra lors de la connexion ou lors de l'entrée dans un cours.

*Par défaut : `login`*

### `multiple_url_hide_disabled_settings`

**Masquer les paramètres désactivés dans les sous-URL**

Définir sur oui pour masquer complètement les paramètres dans une sous-URL si le paramètre est désactivé dans l'URL principale (où le champ access_url_changeable = 0).

*Par défaut : `false`*

### `plugin_redirection_enabled`

**Activer le plugin de redirection**

Activer uniquement si vous utilisez le plugin de redirection.

*Par défaut : `false`*

### `redirect_index_to_url_for_logged_users`

**Rediriger index.php vers une URL donnée pour les utilisateurs authentifiés**

Si vous ne souhaitez pas utiliser la page d'index (annonces, cours populaires, etc.), vous pouvez définir ici le script (à partir de la racine du document) vers lequel les utilisateurs seront redirigés lorsqu'ils tentent de charger l'index.

### `send_all_emails_to`

**Envoyer tous les e-mails à**

Fournir une liste d'adresses e-mail auxquelles *tous* les e-mails envoyés depuis la plateforme seront envoyés. Les e-mails sont envoyés à ces adresses en tant que destination visible.

### `session_admin_user_subscription_search_extra_field_to_search`

**Champ utilisateur supplémentaire utilisé pour rechercher et nommer les sessions**

Ce paramètre définit la clé du champ utilisateur supplémentaire (par exemple, "company") qui sera utilisée pour rechercher des utilisateurs et définir le nom de la session lors de l'inscription des étudiants depuis /admin-dashboard/register.

### `teacher_can_select_course_template`

**L'enseignant peut sélectionner un cours comme modèle**

Permettre de choisir un cours comme modèle pour le nouveau cours que l'enseignant est en train de créer.

*Par défaut : `true`*

### `update_student_expiration_x_date`

**Définir une date d'expiration lors de la première connexion**

Tableau définissant les 'jours' et 'mois' pour fixer la date d'expiration du compte lorsque l'utilisateur se connecte pour la première fois.

### `user_edition_extra_field_to_check`

**Définir un champ supplémentaire comme déclencheur pour l'inscription en tant qu'ancien apprenant**

Indiquer ici une étiquette de champ supplémentaire. Si ce champ supplémentaire est mis à jour pour un utilisateur, un processus est déclenché pour vérifier l'accès de cet utilisateur aux cours ayant le même champ supplémentaire donné.

### `user_number_of_days_for_default_expiration_date_per_role`

**Jours d'expiration par défaut par rôle**

Un tableau de rôle => nombre qui représente le nombre de jours avant l'expiration d'un compte, en fonction du rôle.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Désactiver la désinscription des utilisateurs d'un cours/session lors de la désinscription d'un groupe/classe**

[inféré] Lors du retrait d'un utilisateur d'un groupe/classe, ne pas le désinscrire automatiquement des cours ou sessions associés.

*Par défaut : `false`*

### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Désactiver la désinscription des utilisateurs d'un cours lors du retrait d'un cours d'un groupe/classe**

[inféré] Lorsqu'un cours est retiré d'un groupe/classe, ne pas désinscrire automatiquement les utilisateurs de ce cours.

*Par défaut : `false`*

### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Désactiver la désinscription des utilisateurs d'une session lors du retrait d'une session d'un groupe/classe**

[inféré] Lorsqu'une session est retirée d'un groupe/classe, ne pas désinscrire automatiquement les utilisateurs de cette session.

*Par défaut : `false`*