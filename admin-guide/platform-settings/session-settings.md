# Paramètres des sessions

Valeurs par défaut et comportement des **Sessions** — cycle de vie des sessions, fenêtres d’accès des tuteurs, visibilité des cours au sein d’une session, et assimilés.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sessions**. Cette catégorie contient **68 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_users_by_coach`

**Autoriser les tuteurs à inscrire des utilisateurs**

Les tuteurs peuvent créer des utilisateurs sur la plateforme et les inscrire à une session.

*Par défaut : `false`*

### `allow_career_diagram`

**Activer les diagrammes de parcours**

Les diagrammes de parcours permettent d’afficher des schémas de carrières, de compétences et de cours.

*Par défaut : `false`*


### `allow_career_users`

**Activer les diagrammes de parcours pour les utilisateurs**

Si les diagrammes de parcours sont activés, les utilisateurs ne peuvent les voir (et uniquement les diagrammes correspondant à leurs études) que si vous activez cette option.

*Par défaut : `false`*

### `allow_coach_to_edit_course_session`

**Autoriser les tuteurs à modifier le contenu des cours en session**

Autoriser les tuteurs à modifier le contenu des cours en session

*Par défaut : `true`*

### `allow_delete_user_for_session_admin`

**Les administrateurs de session peuvent supprimer des utilisateurs**

Les administrateurs de session peuvent retirer des utilisateurs de la plateforme lorsqu’ils gèrent leur(s) session(s).

*Par défaut : `false`*


### `allow_disable_user_for_session_admin`

**Les administrateurs de session peuvent désactiver des utilisateurs**

Les administrateurs de session peuvent désactiver des comptes utilisateurs afin d’empêcher la connexion tout en conservant les inscriptions dans leur(s) session(s).

*Par défaut : `false`*


### `allow_edit_tool_visibility_in_session`

**Autoriser la modification de la visibilité des outils dans les sessions**

Lors de l’utilisation des sessions, le comportement par défaut consiste à reprendre la visibilité des outils définie dans le cours de base. Ce paramètre permet aux tuteurs des cours en session d’adapter la visibilité des outils à leurs besoins.

*Par défaut : `true`*

### `allow_redirect_to_session_after_inscription_about`

**Rediriger vers la session après l’inscription depuis la page « À propos » de la session**

Rediriger automatiquement les nouveaux utilisateurs vers la page de leur session après qu’ils ont terminé leur inscription via la page À propos d’une session.

*Par défaut : `false`*


### `allow_search_diagnostic`

**Activer le diagnostic de recherche de sessions**

Permettre aux tuteurs d’obtenir un diagnostic qui les aidera à rechercher les meilleures sessions pour les apprenants.

*Par défaut : `false`*


### `allow_session_admin_extra_access`

**L’administrateur de session peut accéder à l’import, la mise à jour et l’export d’utilisateurs par lots**

Les administrateurs de session peuvent accéder aux fonctions d’import, de mise à jour et d’export d’utilisateurs par lots, en plus de leurs permissions habituelles.

*Par défaut : `false`*


### `allow_session_admin_login_as_teacher`

**Les administrateurs de session peuvent « se connecter en tant que » enseignants**

Les administrateurs de session peuvent usurper l’identité de comptes enseignants afin de prévisualiser le contenu des cours et l’expérience des étudiants dans leur(s) session(s).

*Par défaut : `false`*


### `allow_session_admin_read_careers`

**Les administrateurs de session peuvent consulter les parcours**

[inféré] Les administrateurs de session peuvent consulter et accéder aux parcours de carrière et aux flux de promotion liés aux sessions qu’ils gèrent.

*Par défaut : `false`*


### `allow_session_admins_to_manage_all_sessions`

**Autoriser les administrateurs de session à voir toutes les sessions**

Lorsque cette option n’est pas activée (valeur par défaut), les administrateurs de session ne voient que les sessions qu’ils ont créées. Cela prête à confusion dans un environnement ouvert où les administrateurs de session peuvent devoir partager du temps de support entre deux sessions.

*Par défaut : `false`*

### `allow_session_course_copy_for_teachers`

**Autoriser la copie de session à session pour les enseignants**

Activez cette option pour permettre aux enseignants de copier leur contenu d’un cours d’une session vers un cours d’une autre session. Par défaut, cette option n’est disponible que pour les administrateurs de la plateforme.

*Par défaut : `false`*

### `allow_teachers_to_create_sessions`

**Autoriser les enseignants à créer des sessions**

Les enseignants peuvent créer, modifier et supprimer leurs propres sessions.

*Par défaut : `false`*

### `allow_tutors_to_assign_students_to_session`

**Les tuteurs peuvent inscrire des étudiants aux sessions**

Lorsqu’elle est activée, les tuteurs de cours en session peuvent inscrire de nouveaux utilisateurs à leur session. Cette option n’est autrement disponible que pour les administrateurs et les administrateurs de session.

*Par défaut : `false`*

### `allow_user_session_collapsable`

**Autoriser l’utilisateur à replier les sessions dans Mes sessions**

Les utilisateurs peuvent replier les cartes ou groupes de sessions sur la page Mes sessions afin de réduire l’encombrement visuel et d’améliorer la navigation.

*Par défaut : `false`*


### `assignment_base_course_teacher_access_to_all_session`

**L’enseignant du cours de base peut voir les devoirs de toutes les sessions**

Afficher toutes les publications des apprenants (du cours de base et de toutes les sessions) sur la page work/pending.php du cours de base.

*Par défaut : `false`*

### `career_diagram_disclaimer`

**Afficher un avertissement sous le diagramme de parcours**

Ajoute un avertissement sous le diagramme de parcours. Une variable de langue appelée « Career diagram disclaimer » doit exister dans votre sous-langue.

*Par défaut : `false`*

### `career_diagram_legend`

**Afficher une légende sous le diagramme de parcours**

Ajoute une légende de parcours sous le diagramme de parcours. Une variable de langue appelée « Career diagram legend » doit exister dans votre sous-langue.

*Par défaut : `false`*

### `courses_list_session_title_link`

**Type de lien pour le titre de session**

Sur la page des cours/sessions, le titre de session peut être l’un des suivants : 0 = aucun lien (masquer le titre de session) ; 1 = lier le titre à une page de session spéciale ; 2 = lier au cours s’il n’y a qu’un seul cours ; 3 = le titre de session rend la liste des cours repliable ; 4 = aucun lien (afficher le titre de session).

*Par défaut : `1`*

### `default_session_list_view`

**Vue par défaut de la liste des sessions**

Sélectionnez l’onglet par défaut que vous souhaitez voir à l’ouverture de la liste des sessions en tant qu’administrateur.

*Par défaut : `all`*


### `drh_can_access_all_session_content`

**Les responsables RH accèdent à tout le contenu des sessions**

Si cette option est activée, les responsables des ressources humaines auront accès à tout le contenu et à tous les utilisateurs des sessions qu’ils suivent.

*Par défaut : `true`*

### `duplicate_specific_session_content_on_session_copy`

**Activer la copie du contenu spécifique à une session vers une autre session**

Permet la duplication des ressources qui ont été créées dans la session lors de la duplication de la session.

*Par défaut : `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Ajouter un lien de réinitialisation du mot de passe à la notification par e-mail d’inscription à une session**

Inclut un lien de réinitialisation du mot de passe dans les e-mails de confirmation d’inscription envoyés aux utilisateurs lorsqu’ils sont inscrits à une session.

*Par défaut : `false`*


### `email_template_subscription_to_session_confirmation_username`

**Ajouter le nom d’utilisateur à la notification par e-mail d’inscription à une session**

Inclut le nom d’utilisateur dans les e-mails de confirmation d’inscription envoyés lorsqu’ils sont inscrits à une session.

*Par défaut : `false`*


### `enable_auto_reinscription`

**Activer la réinscription automatique**

Active ou désactive la réinscription automatique à l’expiration de la validité du cours. La tâche cron associée doit également être activée.

*Par défaut : `false`*


### `enable_session_replication`

**Activer la réplication de session**

Active ou désactive la réplication automatique de session. La tâche cron associée doit également être activée.

*Par défaut : `false`*


### `extend_rights_for_coach`

**Étendre les droits des tuteurs**

Activez cette option pour donner aux tuteurs les mêmes permissions que les formateurs sur les outils d’édition.

*Par défaut : `false`*

### `hide_courses_in_sessions`

**Masquer la liste des cours dans les sessions**

Lors de l’affichage du bloc de session sur votre page de cours, masque la liste des cours à l’intérieur de cette session (ne les afficher que dans l’écran spécifique de la session).

*Par défaut : `false`*

### `hide_reporting_session_list`

**Masquer la liste des sessions dans l’outil de reporting**

Les sessions qui incluent le cours sont listées dans l’outil de reporting à l’intérieur du cours lui-même, ce qui peut alourdir considérablement l’affichage si le même cours est utilisé dans des centaines de sessions. Cette option supprime cette liste.

*Par défaut : `false`*


### `hide_search_form_in_session_list`

**Masquer le formulaire de recherche dans la liste des sessions**

Supprime le champ de saisie de recherche de la vue de la liste des sessions dans l’interface d’administration.

*Par défaut : `false`*


### `hide_session_graph_in_my_progress`

**Masquer le graphique de session dans Ma progression**

Dissimule les graphiques et visualisations de progression de session de la page Ma progression dans les tableaux de bord des apprenants.

*Par défaut : `false`*


### `hide_tab_list`

**Masquer les onglets sur la page de session**

Supprime les onglets de navigation de la page de détail de la session afin de simplifier l’interface.

### `limit_session_admin_list_users`

**Les administrateurs de session n’ont pas accès à la liste des utilisateurs**

Empêche les administrateurs de session d’accéder à la liste globale des utilisateurs dans l’interface d’administration.

*Par défaut : `false`*


### `limit_session_admin_role`

**Limiter les permissions des administrateurs de session**

Si cette option est activée, les administrateurs de session ne verront que le bloc Utilisateur avec l’option « Ajouter un utilisateur » et le bloc Sessions avec l’option « Liste des sessions ».

*Par défaut : `false`*

### `my_courses_session_order`

**Modifier le tri par défaut des sessions dans Mes sessions**

Par défaut, les sessions sont triées par date de début. Modifiez cela en fournissant un tableau du type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Afficher mes cours par session**

Active une page « Mes cours » supplémentaire où les sessions apparaissent comme faisant partie des cours, plutôt que l’inverse.

*Par défaut : `false`*

### `my_progress_session_show_all_courses`

**Ma progression : afficher les détails des cours dans la session**

Affiche tous les détails de chaque cours de la session lors d’un clic sur les détails de la session.

*Par défaut : `false`*


### `prevent_session_admins_to_manage_all_users`

**Empêcher les administrateurs de session de gérer tous les utilisateurs**

En activant cette option, les administrateurs de session ne pourront voir, dans la page d’administration, que les utilisateurs qu’ils ont créés.

*Par défaut : `false`*

### `remove_session_url`

**Masquer le lien vers la page de session**

Masquer le lien vers la page de session dans la liste des sessions.

*Par défaut : `false`*


### `session_admins_access_all_content`

**Les administrateurs de session peuvent accéder à tout le contenu des cours**

Les administrateurs de session peuvent consulter tout le contenu des cours au sein de leurs sessions, y compris les ressources restreintes ou archivées.

*Par défaut : `false`*

### `session_admins_edit_courses_content`

**Les administrateurs de session peuvent modifier le contenu des cours**

Les administrateurs de session peuvent modifier le contenu des cours (documents, exercices, outils) dans les cours affectés à leurs sessions.

*Par défaut : `false`*

### `session_automatic_creation_user_id`

**Identifiant du créateur des sessions créées automatiquement**

Définir l’utilisateur à utiliser comme créateur des sessions créées automatiquement (afin d’éviter d’attribuer chaque session à l’utilisateur « 1 », qui est souvent l’administrateur du portail).

*Par défaut : `1`*


### `session_classes_tab_disable`

**Désactiver l’ajout de classe dans un cours de session pour les non-administrateurs**

Désactiver l’onglet d’ajout de classes dans un cours de session pour les non-administrateurs.

*Par défaut : `false`*


### `session_coach_access_after_duration_end`

**Les sessions par durée restent toujours accessibles aux tuteurs**

Sinon, les tuteurs de session n’ont accès aux sessions par durée que pendant la durée active.

*Par défaut : `false`*


### `session_course_ordering`

**Ordre manuel des cours de session**

Activez cette option pour permettre aux administrateurs de session d’ordonner manuellement les cours à l’intérieur d’une session. Si elle est désactivée, les cours sont triés par ordre alphabétique du titre du cours.

*Par défaut : `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limiter les inscriptions au cours aux seuls utilisateurs de la session**

Restreindre la liste des apprenants à inscrire dans le cours de session. Et désactiver l’inscription des utilisateurs à tous les cours depuis la page Résumé de la session.

*Par défaut : `false`*


### `session_courses_read_only_mode`

**Mettre le cours en lecture seule dans la session**

Permettre aux enseignants de mettre certains cours en mode lecture seule lorsqu’ils sont ouverts via des sessions. Dans les propriétés du cours, cochez l’option « Verrouiller le cours dans la session ».

*Par défaut : `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Rendre obligatoires des champs supplémentaires dans le formulaire de création de session**

Exiger les champs listés lors de la création de session.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Préremplir les champs de session avec les champs utilisateur**

Tableau de relations entre les champs supplémentaires utilisateur et les champs supplémentaires de session, afin que la session puisse être préremplie avec des données correspondant à celles de l’utilisateur.

### `session_days_after_coach_access`

**Nombre de jours d’accès tuteur par défaut après la session**

Nombre de jours par défaut pendant lesquels un tuteur peut accéder à une session après la date de fin officielle de la session

### `session_days_before_coach_access`

**Nombre de jours d’accès tuteur par défaut avant la session**

Nombre de jours par défaut pendant lesquels un tuteur peut accéder à une session avant la date de début officielle de la session

### `session_import_settings`

**Options pour l’importation de sessions**

Tableau d’options à appliquer comme paramètres par défaut lors de l’importation de sessions CSV/XML.

### `session_list_order`

**Les sessions prennent en charge le tri manuel**

Activer le réordonnancement manuel des sessions dans la liste des sessions d’administration par glisser-déposer ou un mécanisme similaire.

*Par défaut : `false`*


### `session_list_show_count_users`

**Afficher le nombre d’utilisateurs dans la liste des sessions**

L’administrateur peut voir le nombre d’utilisateurs dans chaque session. Cela alourdit la liste des sessions ; si vous l’utilisez souvent, réfléchissez bien au temps d’attente supplémentaire.

*Par défaut : `false`*


### `session_list_view_remaining_days`

**Afficher les jours restants dans Mes sessions**

Si cette option est activée, les dates de session sur la page « Mes sessions » seront remplacées par le nombre de jours restants.

*Par défaut : `false`*

### `session_model_list_field_ordered_by_id`

**Trier les modèles de session par identifiant dans le formulaire de création de session**

[inféré] Trier les modèles de session par leur identifiant numérique dans la liste déroulante du formulaire de création de session plutôt que par ordre alphabétique du nom.

*Par défaut : `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Empêcher de vider les utilisateurs inscrits lors de l’inscription à une session**

Lors de l’inscription multiple d’apprenants à une session, empêcher le comportement normal qui consiste à désinscrire les utilisateurs absents du panneau de droite au clic sur Envoyer. Conserver tous les utilisateurs.

*Par défaut : `false`*


### `show_all_sessions_on_my_course_page`

**Afficher toutes les sessions sur la page « Mes cours »**

Si cette option est activée, elle affiche toutes les sessions de l’utilisateur dans une vue calendaire.

*Par défaut : `true`*


### `show_session_coach`

**Afficher le tuteur de session**

Afficher le nom du tuteur général de session dans l’encadré du titre de session de la liste des cours

*Par défaut : `false`*

### `show_session_data`

**Afficher le titre des données de session**

Afficher le commentaire des données de session

*Par défaut : `false`*

### `show_session_description`

**Afficher la description de session**

Afficher la description de session partout où cette option est implémentée (pages de suivi des sessions, etc.)

*Par défaut : `false`*

### `show_simple_session_info`

**Afficher des informations de session simplifiées**

Ajoute le tuteur et les dates au sous-titre de la session dans la liste des sessions.

*Par défaut : `true`*


### `show_users_in_active_sessions_in_tracking`

**N’afficher que les utilisateurs des sessions actives dans le suivi**

N’affiche que les utilisateurs des sessions actuellement actives dans les vues de suivi des apprenants et de reporting.

*Par défaut : `false`*


### `tracking_columns`

**Personnaliser les colonnes de suivi cours-session**

Définit un tableau de colonnes pour les rapports suivants : 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durée des sessions créées automatiquement**

Durée (en jours) des sessions à utilisateur unique créées automatiquement. Après expiration, l’utilisateur ne peut plus s’inscrire au même cours (aucune autre session n’est créée).

*Par défaut : `1095`*


### `user_session_display_mode`

**Mode d’affichage de Mes sessions**

Choisit la façon dont la page « Mes sessions » est affichée : vue moderne en blocs visuels (cartes) ou style de liste classique.

*Par défaut : `list`*