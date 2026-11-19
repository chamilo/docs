# Paramètres des sessions

Valeurs par défaut et comportement des **sessions** — cycle de vie des sessions, fenêtres d'accès des tuteurs, visibilité des cours au sein d'une session, et éléments similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sessions**. Cette catégorie contient **68 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_users_by_coach`

**Autoriser les tuteurs à inscrire des utilisateurs**

Les tuteurs peuvent créer des utilisateurs sur la plateforme et inscrire des utilisateurs à une session.

*Valeur par défaut : `false`*

### `allow_career_diagram`

**Activer les diagrammes de carrière**

Les diagrammes de carrière permettent d'afficher des diagrammes de carrières, de compétences et de cours.

*Valeur par défaut : `false`*


### `allow_career_users`

**Activer les diagrammes de carrière pour les utilisateurs**

Si les diagrammes de carrière sont activés, les utilisateurs ne peuvent les voir (et uniquement les diagrammes correspondant à leurs études) que si vous activez cette option.

*Valeur par défaut : `false`*

### `allow_coach_to_edit_course_session`

**Autoriser les tuteurs à modifier le contenu des sessions de cours**

Autoriser les tuteurs à modifier le contenu des sessions de cours

*Valeur par défaut : `true`*

### `allow_delete_user_for_session_admin`

**Les administrateurs de session peuvent supprimer des utilisateurs**

Les administrateurs de session peuvent retirer des utilisateurs de la plateforme lorsqu'ils gèrent leur(s) session(s).

*Valeur par défaut : `false`*


### `allow_disable_user_for_session_admin`

**Les administrateurs de session peuvent désactiver des utilisateurs**

Les administrateurs de session peuvent désactiver des comptes utilisateur afin d'empêcher la connexion tout en conservant les enregistrements d'inscription dans leur(s) session(s).

*Valeur par défaut : `false`*


### `allow_edit_tool_visibility_in_session`

**Autoriser la modification de la visibilité des outils dans les sessions**

Lors de l'utilisation des sessions, le comportement par défaut consiste à utiliser la visibilité des outils définie dans le cours de base. Ce paramètre modifie ce comportement afin de permettre aux tuteurs des cours de session d'adapter la visibilité des outils à leurs besoins.

*Valeur par défaut : `true`*

### `allow_redirect_to_session_after_inscription_about`

**Rediriger vers la session après l'inscription depuis la page « À propos » de la session**

Redirige automatiquement les nouveaux utilisateurs vers leur page de session après qu'ils ont terminé leur inscription via la page À propos d'une session.

*Valeur par défaut : `false`*


### `allow_search_diagnostic`

**Activer le diagnostic de recherche de sessions**

Permet aux tuteurs d'obtenir un diagnostic qui leur permettra de rechercher les meilleures sessions pour les apprenants.

*Valeur par défaut : `false`*


### `allow_session_admin_extra_access`

**L'administrateur de session peut accéder à l'importation, la mise à jour et l'exportation groupées d'utilisateurs**

Les administrateurs de session peuvent accéder aux fonctionnalités d'importation, de mise à jour et d'exportation groupées d'utilisateurs en plus de leurs permissions standard.

*Valeur par défaut : `false`*


### `allow_session_admin_login_as_teacher`

**Les administrateurs de session peuvent se connecter en tant qu'enseignants**

Les administrateurs de session peuvent se connecter sous l'identité de comptes enseignants afin de prévisualiser le contenu des cours et l'expérience des étudiants dans leur(s) session(s).

*Valeur par défaut : `false`*


### `allow_session_admin_read_careers`

**Les administrateurs de session peuvent consulter les carrières**

[déduit] Les administrateurs de session peuvent consulter et accéder aux parcours de carrière et aux flux de promotion liés aux sessions qu'ils gèrent.

*Valeur par défaut : `false`*


### `allow_session_admins_to_manage_all_sessions`

**Autoriser les administrateurs de session à voir toutes les sessions**

Lorsque cette option n'est pas activée (valeur par défaut), les administrateurs de session ne peuvent voir que les sessions qu'ils ont créées. Cela prête à confusion dans un environnement ouvert où les administrateurs de session peuvent avoir besoin de partager leur temps de support entre deux sessions.

*Valeur par défaut : `false`*

### `allow_session_course_copy_for_teachers`

**Autoriser la copie de session à session pour les enseignants**

Activez cette option pour permettre aux enseignants de copier leur contenu d'un cours d'une session vers un cours d'une autre session. Par défaut, cette option n'est disponible que pour les administrateurs de la plateforme.

*Valeur par défaut : `false`*

### `allow_teachers_to_create_sessions`

**Autoriser les enseignants à créer des sessions**

Les enseignants peuvent créer, modifier et supprimer leurs propres sessions.

*Valeur par défaut : `false`*

### `allow_tutors_to_assign_students_to_session`

**Les tuteurs peuvent affecter des étudiants aux sessions**

Lorsqu'elle est activée, les tuteurs de cours dans les sessions peuvent inscrire de nouveaux utilisateurs à leur session. Cette option n'est autrement disponible que pour les administrateurs et les administrateurs de session.

*Valeur par défaut : `false`*

### `allow_user_session_collapsable`

**Autoriser l'utilisateur à réduire les sessions dans Mes sessions**

Les utilisateurs peuvent réduire les cartes ou groupes de sessions sur la page Mes sessions afin de diminuer l'encombrement visuel et d'améliorer la navigation.

*Valeur par défaut : `false`*


### `assignment_base_course_teacher_access_to_all_session`

**L'enseignant du cours de base peut voir les travaux de toutes les sessions**

Affiche toutes les publications des apprenants (du cours de base et de toutes les sessions) dans la page work/pending.php du cours de base.

*Valeur par défaut : `false`*

### `career_diagram_disclaimer`

**Afficher un avertissement sous le diagramme de carrière**

Ajouter un avertissement sous le diagramme de carrière. Une variable de langue nommée « Career diagram disclaimer » doit exister dans votre sous-langue.

*Valeur par défaut : `false`*

### `career_diagram_legend`

**Afficher une légende sous le diagramme de carrière**

Ajouter une légende de carrière sous le diagramme de carrière. Une variable de langue nommée « Career diagram legend » doit exister dans votre sous-langue.

*Valeur par défaut : `false`*

### `courses_list_session_title_link`

**Type de lien pour le titre de la session**

Sur la page des cours/sessions, le titre de la session peut correspondre à l’une des options suivantes : 0 = aucun lien (masquer le titre de la session) ; 1 = lier le titre à une page de session spécifique ; 2 = lien vers le cours s’il n’y a qu’un seul cours ; 3 = le titre de la session rend la liste des cours repliable ; 4 = aucun lien (afficher le titre de la session).

*Valeur par défaut : `1`*

### `default_session_list_view`

**Vue par défaut de la liste des sessions**

Sélectionnez l’onglet par défaut que vous souhaitez voir à l’ouverture de la liste des sessions en tant qu’administrateur.

*Valeur par défaut : `all`*


### `hrm_can_access_all_session_content`

**Les directeurs RH accèdent à tout le contenu des sessions**

Si cette option est activée, les utilisateurs DRH peuvent accéder au contenu et aux utilisateurs des sessions qu’ils suivent. L’ancienne clé `session.drh_can_access_all_session_content` reste reconnue pour des raisons de compatibilité.

*Valeur par défaut : `true`*

### `duplicate_specific_session_content_on_session_copy`

**Activer la copie du contenu propre à une session vers une autre session**

Permet de dupliquer les ressources créées dans la session lors de la duplication de celle-ci.

*Valeur par défaut : `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Ajouter un lien de réinitialisation du mot de passe à la notification par e-mail d’inscription à une session**

Inclure un lien de réinitialisation du mot de passe dans les e-mails de confirmation d’inscription envoyés aux utilisateurs lorsqu’ils sont inscrits à une session.

*Valeur par défaut : `false`*


### `email_template_subscription_to_session_confirmation_username`

**Ajouter le nom d’utilisateur à la notification par e-mail d’inscription à une session**

Inclure le nom d’utilisateur dans les e-mails de confirmation d’inscription envoyés lorsqu’ils sont inscrits à une session.

*Valeur par défaut : `false`*


### `enable_auto_reinscription`

**Activer la réinscription automatique**

Activer ou désactiver la réinscription automatique à l’expiration de la validité du cours. La tâche cron associée doit également être activée.

*Valeur par défaut : `false`*


### `enable_session_replication`

**Activer la réplication des sessions**

Activer ou désactiver la réplication automatique des sessions. La tâche cron associée doit également être activée.

*Valeur par défaut : `false`*


### `extend_rights_for_coach`

**Étendre les droits des tuteurs**

Activez cette option pour accorder aux tuteurs les mêmes permissions que les formateurs sur les outils de création

*Valeur par défaut : `false`*

### `hide_courses_in_sessions`

**Masquer la liste des cours dans les sessions**

Lors de l’affichage du bloc de session sur votre page de cours, masquer la liste des cours de cette session (les afficher uniquement dans l’écran propre à la session).

*Valeur par défaut : `false`*

### `hide_reporting_session_list`

**Masquer la liste des sessions dans l’outil de rapports**

Les sessions qui incluent le cours sont listées dans l’outil de rapports à l’intérieur du cours lui-même, ce qui peut alourdir considérablement l’affichage si le même cours est utilisé dans des centaines de sessions. Cette option supprime cette liste.

*Valeur par défaut : `false`*


### `hide_search_form_in_session_list`

**Masquer le formulaire de recherche dans la liste des sessions**

Supprimer le champ de recherche de la vue de la liste des sessions dans l’interface d’administration.

*Valeur par défaut : `false`*


### `hide_session_graph_in_my_progress`

**Masquer le graphique de session dans Ma progression**

Masquer les graphiques et visualisations de progression des sessions sur la page Ma progression des tableaux de bord des apprenants.

*Valeur par défaut : `false`*


### `hide_tab_list`

**Masquer les onglets sur la page de session**

Supprimer les onglets de navigation de la page de détail de la session afin de simplifier l’interface.

### `limit_session_admin_list_users`

**Les administrateurs de session n’ont pas accès à la liste des utilisateurs**

Empêcher les administrateurs de session d’accéder à la liste globale des utilisateurs dans l’interface d’administration.

*Valeur par défaut : `false`*


### `limit_session_admin_role`

**Limiter les permissions des administrateurs de session**

Si cette option est activée, les administrateurs de session ne verront que le bloc Utilisateur avec l’option « Ajouter un utilisateur » et le bloc Sessions avec l’option « Liste des sessions ».

*Valeur par défaut : `false`*

### `my_courses_session_order`

**Modifier le tri par défaut des sessions dans Mes sessions**

Par défaut, les sessions sont triées par date de début. Modifiez ce tri en fournissant un tableau de type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Afficher mes cours par session**

Activer une page « Mes cours » supplémentaire dans laquelle les sessions apparaissent comme faisant partie des cours, et non l’inverse.

*Valeur par défaut : `false`*

### `my_progress_session_show_all_courses`

**Ma progression : afficher le détail des cours dans la session**

Afficher tous les détails de chaque cours de la session lors d’un clic sur les détails de la session.

*Valeur par défaut : `false`*

### `prevent_session_admins_to_manage_all_users`

**Empêcher les administrateurs de session de gérer tous les utilisateurs**

En activant cette option, les administrateurs de session ne pourront voir, dans la page d'administration, que les utilisateurs qu'ils ont créés.

*Valeur par défaut : `false`*

### `remove_session_url`

**Masquer le lien vers la page de session**

Masquer le lien vers la page de session dans la liste des sessions.

*Valeur par défaut : `false`*


### `session_admins_access_all_content`

**Les administrateurs de session peuvent accéder à tout le contenu des cours**

Les administrateurs de session peuvent consulter tout le contenu des cours de leurs sessions, y compris les documents restreints ou archivés.

*Valeur par défaut : `false`*

### `session_admins_edit_courses_content`

**Les administrateurs de session peuvent modifier le contenu des cours**

Les administrateurs de session peuvent modifier le contenu des cours (documents, exercices, outils) dans les cours affectés à leurs sessions.

*Valeur par défaut : `false`*

### `session_automatic_creation_user_id`

**Identifiant du créateur des sessions créées automatiquement**

Définir l'utilisateur à utiliser comme créateur des sessions créées automatiquement (afin d'éviter d'attribuer chaque session à l'utilisateur « 1 », qui est souvent l'administrateur du portail).

*Valeur par défaut : `1`*


### `session_classes_tab_disable`

**Désactiver l'ajout de classe dans un cours de session pour les non-administrateurs**

Désactiver l'onglet d'ajout de classes dans un cours de session pour les non-administrateurs.

*Valeur par défaut : `false`*


### `session_coach_access_after_duration_end`

**Sessions par durée toujours accessibles aux tuteurs**

Sinon, les tuteurs de session n'ont accès aux sessions par durée que pendant la durée active.

*Valeur par défaut : `false`*


### `session_course_ordering`

**Tri manuel des cours de session**

Activez cette option pour permettre aux administrateurs de session d'ordonner manuellement les cours au sein d'une session. Si elle est désactivée, les cours sont classés par ordre alphabétique selon le titre du cours.

*Valeur par défaut : `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limiter les inscriptions au cours aux seuls utilisateurs de la session**

Restreindre la liste des étudiants à inscrire dans le cours de session. Et désactiver l'inscription des utilisateurs à tous les cours depuis la page Reprendre la session.

*Valeur par défaut : `false`*


### `session_courses_read_only_mode`

**Définir le cours en lecture seule dans la session**

Permettre aux enseignants de définir certains cours en mode lecture seule lorsqu'ils sont ouverts via des sessions. Dans les propriétés du cours, cochez l'option « Verrouiller le cours dans la session ».

*Valeur par défaut : `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Rendre obligatoires des champs supplémentaires dans le formulaire de création de session**

Exiger les champs listés lors de la création de la session.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Préremplir les champs de session avec les champs utilisateur**

Tableau de relations entre les champs supplémentaires utilisateur et les champs supplémentaires de session, afin que la session puisse être préremplie avec des données correspondant à celles de l'utilisateur.

### `session_days_after_coach_access`

**Jours d'accès du tuteur après la session par défaut**

Nombre de jours par défaut pendant lesquels un tuteur peut accéder à une session après la date officielle de fin de session

### `session_days_before_coach_access`

**Jours d'accès du tuteur avant la session par défaut**

Nombre de jours par défaut pendant lesquels un tuteur peut accéder à une session avant la date officielle de début de session

### `session_import_settings`

**Options d'importation de sessions**

Tableau d'options à appliquer comme paramètres par défaut lors de l'importation de sessions CSV/XML.

### `session_list_order`

**Les sessions prennent en charge le tri manuel**

Activer le réordonnancement manuel des sessions dans la liste d'administration des sessions par glisser-déposer ou un mécanisme similaire.

*Valeur par défaut : `false`*


### `session_list_show_count_users`

**Afficher le nombre d'utilisateurs dans la liste des sessions**

L'administrateur peut voir le nombre d'utilisateurs de chaque session. Cela alourdit la liste des sessions ; si vous l'utilisez souvent, évaluez soigneusement si vous acceptez le temps d'attente supplémentaire.

*Valeur par défaut : `false`*


### `session_list_view_remaining_days`

**Afficher les jours restants dans Mes sessions**

Si cette option est activée, les dates de session sur la page « Mes sessions » seront remplacées par le nombre de jours restants.

*Valeur par défaut : `false`*

### `session_model_list_field_ordered_by_id`

**Trier les modèles de session par identifiant dans le formulaire de création de session**

[déduit] Trier les modèles de session par leur identifiant numérique dans la liste déroulante du formulaire de création de session, plutôt que par ordre alphabétique du nom.

*Valeur par défaut : `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Empêcher de vider les utilisateurs inscrits lors de l'inscription à une session**

Lors de l'inscription multiple d'apprenants à une session, empêcher le comportement normal qui consiste à désinscrire les utilisateurs absents du panneau de droite lors du clic sur Envoyer. Conserver tous les utilisateurs.

*Valeur par défaut : `false`*


### `show_all_sessions_on_my_course_page`

**Afficher toutes les sessions sur la page « Mes cours »**

Si cette option est activée, elle affiche toutes les sessions de l'utilisateur dans une vue calendaire.

*Valeur par défaut : `true`*


### `show_session_coach`

**Afficher le tuteur de session**

Afficher le nom du tuteur général de la session dans l'encadré du titre de session de la liste des cours

*Valeur par défaut : `false`*

### `show_session_data`

**Afficher le titre des données de session**

Afficher le commentaire des données de session

*Valeur par défaut : `false`*

### `show_session_description`

**Afficher la description de la session**

Afficher la description de la session partout où cette option est implémentée (pages de suivi des sessions, etc.)

*Par défaut : `false`*

### `show_simple_session_info`

**Afficher les informations simplifiées de la session**

Ajouter le tuteur et les dates au sous-titre de la session dans la liste des sessions.

*Par défaut : `true`*


### `show_users_in_active_sessions_in_tracking`

**N'afficher que les utilisateurs des sessions actives dans le suivi**

N'afficher que les utilisateurs des sessions actuellement actives dans les vues de suivi des apprenants et de rapports.

*Par défaut : `false`*


### `tracking_columns`

**Personnaliser les colonnes de suivi cours-session**

Définir un tableau de colonnes pour les rapports suivants : 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durée des sessions créées automatiquement**

Durée (en jours) des sessions mono-utilisateur créées automatiquement. Après expiration, l'utilisateur ne peut plus s'inscrire au même cours (aucune autre session n'est créée).

*Par défaut : `1095`*


### `user_session_display_mode`

**Mode d'affichage de Mes sessions**

Choisir le mode d'affichage de la page « Mes sessions » : vue moderne en blocs visuels (cartes) ou style de liste classique.

*Par défaut : `list`*