# Paramètres des sessions

Valeurs par défaut et comportement pour les **Sessions** — cycle de vie des sessions, fenêtres d'accès des formateurs, visibilité des cours au sein d'une session, et similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sessions**. Cette catégorie contient **68 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_users_by_coach`

**Inscription d'utilisateurs par le formateur**

Les utilisateurs formateurs peuvent créer des utilisateurs sur la plateforme et inscrire des utilisateurs à une session.

*Valeur par défaut : `false`*

### `allow_career_diagram`

**Activer les diagrammes de carrière**

Les diagrammes de carrière permettent d'afficher des diagrammes des carrières, des compétences et des cours.

*Valeur par défaut : `false`*

### `allow_career_users`

**Activer les diagrammes de carrière pour les utilisateurs**

Si les diagrammes de carrière sont activés, les utilisateurs ne peuvent les voir (et uniquement ceux correspondant à leurs études) que si vous activez cette option.

*Valeur par défaut : `false`*

### `allow_coach_to_edit_course_session`

**Autoriser les formateurs à modifier les sessions de cours**

Permettre aux formateurs de modifier à l'intérieur des sessions de cours.

*Valeur par défaut : `true`*

### `allow_delete_user_for_session_admin`

**Les administrateurs de session peuvent supprimer des utilisateurs**

Les administrateurs de session peuvent retirer des utilisateurs de la plateforme lors de la gestion de leurs sessions.

*Valeur par défaut : `false`*

### `allow_disable_user_for_session_admin`

**Les administrateurs de session peuvent désactiver des utilisateurs**

Les administrateurs de session peuvent désactiver des comptes utilisateurs pour empêcher la connexion tout en conservant les enregistrements d'inscription dans leurs sessions.

*Valeur par défaut : `false`*

### `allow_edit_tool_visibility_in_session`

**Autoriser la modification de la visibilité des outils dans les sessions**

Lors de l'utilisation des sessions, le comportement par défaut est d'utiliser la visibilité des outils définie dans le cours de base. Ce paramètre permet de changer cela pour autoriser les formateurs dans les cours de session à adapter la visibilité des outils à leurs besoins.

*Valeur par défaut : `true`*

### `allow_redirect_to_session_after_inscription_about`

**Rediriger vers la session après inscription sur la page 'À propos' de la session**

Rediriger automatiquement les nouveaux utilisateurs vers leur page de session après qu'ils aient complété leur inscription via la page À propos d'une session.

*Valeur par défaut : `false`*

### `allow_search_diagnostic`

**Activer le diagnostic de recherche de sessions**

Permettre aux tuteurs d'obtenir un diagnostic qui leur permettra de rechercher les meilleures sessions pour les apprenants.

*Valeur par défaut : `false`*

### `allow_session_admin_extra_access`

**Les administrateurs de session peuvent accéder à l'import, mise à jour et export en masse des utilisateurs**

Les administrateurs de session peuvent accéder aux fonctionnalités d'import, de mise à jour et d'export en masse des utilisateurs en plus de leurs permissions standard.

*Valeur par défaut : `false`*

### `allow_session_admin_login_as_teacher`

**Les administrateurs de session peuvent se connecter en tant qu'enseignants**

Les administrateurs de session peuvent se connecter en tant qu'enseignants pour prévisualiser le contenu des cours et l'expérience des étudiants au sein de leurs sessions.

*Valeur par défaut : `false`*

### `allow_session_admin_read_careers`

**Les administrateurs de session peuvent voir les carrières**

[inféré] Les administrateurs de session peuvent voir et accéder aux parcours de carrière et aux flux de promotion liés à leurs sessions gérées.

*Valeur par défaut : `false`*

### `allow_session_admins_to_manage_all_sessions`

**Autoriser les administrateurs de session à voir toutes les sessions**

Lorsque cette option n'est pas activée (par défaut), les administrateurs de session ne peuvent voir que les sessions qu'ils ont créées. Cela peut être déroutant dans un environnement ouvert où les administrateurs de session pourraient avoir besoin de partager leur temps de support entre deux sessions.

*Valeur par défaut : `false`*

### `allow_session_course_copy_for_teachers`

**Autoriser la copie de session à session pour les enseignants**

Activez cette option pour permettre aux enseignants de copier leur contenu d'un cours dans une session vers un cours dans une autre session. Par défaut, cette option n'est disponible que pour les administrateurs de la plateforme.

*Valeur par défaut : `false`*

### `allow_teachers_to_create_sessions`

**Autoriser les enseignants à créer des sessions**

Les enseignants peuvent créer, modifier et supprimer leurs propres sessions.

*Valeur par défaut : `false`*

### `allow_tutors_to_assign_students_to_session`

**Les tuteurs peuvent assigner des étudiants à des sessions**

Lorsqu'elle est activée, les formateurs/tuteurs de cours dans les sessions peuvent inscrire de nouveaux utilisateurs à leur session. Cette option n'est autrement disponible que pour les administrateurs et les administrateurs de session.

*Valeur par défaut : `false`*

### `allow_user_session_collapsable`

**Autoriser les utilisateurs à réduire les sessions dans Mes sessions**

Les utilisateurs peuvent réduire les cartes ou groupes de sessions dans la page Mes sessions pour diminuer l'encombrement visuel et améliorer la navigation.

*Valeur par défaut : `false`*

### `assignment_base_course_teacher_access_to_all_session`

**L'enseignant du cours de base peut voir les devoirs de toutes les sessions**

Afficher toutes les publications des apprenants (du cours de base et de toutes les sessions) dans la page work/pending.php du cours de base.

*Valeur par défaut : `false`*

---
### `career_diagram_disclaimer`

**Afficher un avertissement sous le diagramme de carrière**

Ajoutez un avertissement sous le diagramme de carrière. Une variable de langue appelée 'Career diagram disclaimer' doit exister dans votre sous-langue.

*Par défaut : `false`*

### `career_diagram_legend`

**Afficher une légende sous le diagramme de carrière**

Ajoutez une légende de carrière sous le diagramme de carrière. Une variable de langue appelée 'Career diagram legend' doit exister dans votre sous-langue.

*Par défaut : `false`*

### `courses_list_session_title_link`

**Type de lien pour le titre de la session**

Sur la page des cours/sessions, le titre de la session peut être l'un des suivants : 0 = aucun lien (masquer le titre de la session) ; 1 = lier le titre à une page de session spéciale ; 2 = lier au cours s'il n'y a qu'un seul cours ; 3 = le titre de la session rend la liste des cours pliable ; 4 = aucun lien (afficher le titre de la session).

*Par défaut : `1`*

### `default_session_list_view`

**Vue par défaut de la liste des sessions**

Sélectionnez l'onglet par défaut que vous souhaitez voir lors de l'ouverture de la liste des sessions en tant qu'administrateur.

*Par défaut : `all`*

### `drh_can_access_all_session_content`

**Les directeurs des ressources humaines accèdent à tout le contenu des sessions**

Si activé, les directeurs des ressources humaines auront accès à tout le contenu et aux utilisateurs des sessions qu'ils suivent.

*Par défaut : `true`*

### `duplicate_specific_session_content_on_session_copy`

**Activer la copie du contenu spécifique à une session vers une autre session**

Permet la duplication des ressources créées dans la session lors de la duplication de celle-ci.

*Par défaut : `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Ajouter un lien de réinitialisation de mot de passe à la notification par e-mail d'inscription à une session**

Inclure un lien de réinitialisation de mot de passe dans les e-mails de confirmation d'inscription envoyés aux utilisateurs lorsqu'ils sont inscrits à une session.

*Par défaut : `false`*

### `email_template_subscription_to_session_confirmation_username`

**Ajouter le nom d'utilisateur à la notification par e-mail d'inscription à une session**

Inclure le nom d'utilisateur de l'utilisateur dans les e-mails de confirmation d'inscription envoyés lorsqu'ils sont inscrits à une session.

*Par défaut : `false`*

### `enable_auto_reinscription`

**Activer la réinscription automatique**

Activez ou désactivez la réinscription automatique lorsque la validité du cours expire. La tâche cron associée doit également être activée.

*Par défaut : `false`*

### `enable_session_replication`

**Activer la réplication des sessions**

Activez ou désactivez la réplication automatique des sessions. La tâche cron associée doit également être activée.

*Par défaut : `false`*

### `extend_rights_for_coach`

**Étendre les droits pour le coach**

Activer cette option donnera au coach les mêmes permissions que le formateur sur les outils de création.

*Par défaut : `false`*

### `hide_courses_in_sessions`

**Masquer la liste des cours dans les sessions**

Lors de l'affichage du bloc de session sur votre page de cours, masquez la liste des cours à l'intérieur de cette session (affichez-les uniquement dans l'écran spécifique de la session).

*Par défaut : `false`*

### `hide_reporting_session_list`

**Masquer la liste des sessions dans l'outil de rapport**

Les sessions qui incluent le cours sont listées dans l'outil de rapport à l'intérieur du cours lui-même, ce qui peut alourdir considérablement si le même cours est utilisé dans des centaines de sessions. Cette option supprime cette liste.

*Par défaut : `false`*

### `hide_search_form_in_session_list`

**Masquer le formulaire de recherche dans la liste des sessions**

Supprimez le champ de saisie de recherche de la vue de la liste des sessions dans l'interface d'administration.

*Par défaut : `false`*

### `hide_session_graph_in_my_progress`

**Masquer le graphique de session dans Mon progression**

Masquez les graphiques et visualisations de progression de session sur la page Mon progression dans les tableaux de bord des apprenants.

*Par défaut : `false`*

### `hide_tab_list`

**Masquer les onglets sur la page de session**

Supprimez les onglets de navigation de la page de détail de la session pour simplifier l'interface.

### `limit_session_admin_list_users`

**Les administrateurs de session n'ont pas accès à la liste des utilisateurs**

Empêchez les administrateurs de session d'accéder à la liste globale des utilisateurs dans l'interface d'administration.

*Par défaut : `false`*

### `limit_session_admin_role`

**Limiter les permissions des administrateurs de session**

Si activé, les administrateurs de session ne verront que le bloc Utilisateur avec l'option 'Ajouter un utilisateur' et le bloc Sessions avec l'option 'Liste des sessions'.

*Par défaut : `false`*

### `my_courses_session_order`

**Modifier le tri par défaut des sessions dans Mes sessions**

Par défaut, les sessions sont triées par date de début. Modifiez cela en fournissant un tableau de type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Voir mes cours par session**

Activez une page supplémentaire 'Mes cours' où les sessions apparaissent comme faisant partie des cours, plutôt que l'inverse.

*Par défaut : `false`*

### `my_progress_session_show_all_courses`

**Mon progression : afficher les détails des cours dans la session**

Affichez tous les détails de chaque cours dans la session lorsque vous cliquez sur les détails de la session.

*Par défaut : `false`*

### `prevent_session_admins_to_manage_all_users`

**Empêcher les administrateurs de session de gérer tous les utilisateurs**

En activant cette option, les administrateurs de session ne pourront voir, dans la page d'administration, que les utilisateurs qu'ils ont créés.

*Par défaut : `false`*

---
### `remove_session_url`

**Masquer le lien vers la page de session**

Masquer le lien vers la page de session dans la liste des sessions.

*Par défaut : `false`*


### `session_admins_access_all_content`

**Les administrateurs de session peuvent accéder à tout le contenu des cours**

Les administrateurs de session peuvent voir tout le contenu des cours au sein de leurs sessions, y compris les matériels restreints ou archivés.

*Par défaut : `false`*


### `session_admins_edit_courses_content`

**Les administrateurs de session peuvent modifier le contenu des cours**

Les administrateurs de session peuvent modifier le contenu des cours (documents, exercices, outils) dans les cours attribués à leurs sessions.

*Par défaut : `false`*


### `session_automatic_creation_user_id`

**ID du créateur des sessions créées automatiquement**

Définir l'utilisateur à utiliser comme créateur des sessions créées automatiquement (pour éviter d'attribuer chaque session à l'utilisateur '1', qui est souvent l'administrateur du portail).

*Par défaut : `1`*


### `session_classes_tab_disable`

**Désactiver l'ajout de classe dans le cours de session pour les non-administrateurs**

Désactiver l'onglet permettant d'ajouter des classes dans le cours de session pour les non-administrateurs.

*Par défaut : `false`*


### `session_coach_access_after_duration_end`

**Sessions par durée toujours accessibles aux formateurs**

Sinon, les formateurs de session n'ont accès aux sessions par durée que pendant la durée active.

*Par défaut : `false`*


### `session_course_ordering`

**Classement manuel des cours de session**

Activer cette option pour permettre aux administrateurs de session de classer manuellement les cours à l'intérieur d'une session. Si désactivé, les cours sont classés par ordre alphabétique selon le titre du cours.

*Par défaut : `false`*


### `session_course_users_subscription_limited_to_session_users`

**Limiter les inscriptions au cours aux seuls utilisateurs de la session**

Restreindre la liste des étudiants pouvant s'inscrire dans la session de cours. Et désactiver l'inscription des utilisateurs à tous les cours depuis la page de reprise de session.

*Par défaut : `false`*


### `session_courses_read_only_mode`

**Définir le cours en mode lecture seule dans la session**

Permettre aux enseignants de définir certains cours en mode lecture seule lorsqu'ils sont ouverts via des sessions. Dans les propriétés du cours, cochez l'option 'Verrouiller le cours dans la session'.

*Par défaut : `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Rendre obligatoires certains champs supplémentaires dans le formulaire de création de session**

Exiger les champs listés lors de la création de session.


### `session_creation_user_course_extra_field_relation_to_prefill`

**Pré-remplir les champs de session avec les champs utilisateur**

Tableau de relations entre les champs supplémentaires de l'utilisateur et les champs supplémentaires de la session, afin que la session puisse être pré-remplie avec les données correspondant aux données de l'utilisateur.


### `session_days_after_coach_access`

**Nombre de jours d'accès par défaut pour le formateur après la session**

Nombre de jours par défaut pendant lesquels un formateur peut accéder à sa session après la date de fin officielle de la session.


### `session_days_before_coach_access`

**Nombre de jours d'accès par défaut pour le formateur avant la session**

Nombre de jours par défaut pendant lesquels un formateur peut accéder à sa session avant la date de début officielle de la session.


### `session_import_settings`

**Options pour l'importation de sessions**

Tableau d'options à appliquer comme paramètres par défaut lors de l'importation de sessions au format CSV/XML.


### `session_list_order`

**Les sessions prennent en charge le tri manuel**

Activer le réordonnancement manuel des sessions dans la liste d'administration des sessions via un mécanisme de glisser-déposer ou similaire.

*Par défaut : `false`*


### `session_list_show_count_users`

**Afficher le nombre d'utilisateurs dans la liste des sessions**

L'administrateur peut voir le nombre d'utilisateurs dans chaque session. Cela ajoute un poids supplémentaire à la liste des sessions, donc si vous l'utilisez souvent, réfléchissez bien si vous souhaitez le temps d'attente supplémentaire.

*Par défaut : `false`*


### `session_list_view_remaining_days`

**Afficher les jours restants dans Mes Sessions**

Si activé, les dates de session sur la page "Mes Sessions" seront remplacées par le nombre de jours restants.

*Par défaut : `false`*


### `session_model_list_field_ordered_by_id`

**Trier les modèles de session par ID dans le formulaire de création de session**

Trier les modèles de session par leur ID numérique dans le menu déroulant du formulaire de création de session au lieu de les trier alphabétiquement par nom.

*Par défaut : `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Empêcher la vidange des utilisateurs inscrits lors de l'inscription à une session**

Lors de l'utilisation de l'inscription multiple d'apprenants à une session, empêcher le comportement normal qui consiste à désinscrire les utilisateurs qui ne se trouvent pas dans le panneau de droite lors de la soumission. Conserver tous les utilisateurs présents.

*Par défaut : `false`*


### `show_all_sessions_on_my_course_page`

**Afficher toutes les sessions sur la page 'Mes cours'**

Si activé, cette option affiche toutes les sessions de l'utilisateur dans une vue basée sur un calendrier.

*Par défaut : `true`*


### `show_session_coach`

**Afficher le formateur de session**

Afficher le nom du formateur global de la session dans la boîte de titre de la session dans la liste des cours.

*Par défaut : `false`*


### `show_session_data`

**Afficher le titre des données de session**

Afficher le commentaire des données de session.

*Par défaut : `false`*


### `show_session_description`

**Afficher la description de la session**

Afficher la description de la session partout où cette option est implémentée (pages de suivi des sessions, etc.).

*Par défaut : `false`*

---
### `show_simple_session_info`

**Afficher des informations simples sur la session**

Ajoute l'entraîneur et les dates au sous-titre de la session dans la liste des sessions.

*Par défaut : `true`*


### `show_users_in_active_sessions_in_tracking`

**Afficher uniquement les utilisateurs des sessions actives dans le suivi**

Affiche uniquement les utilisateurs des sessions actuellement actives dans les vues de suivi et de rapport des apprenants.

*Par défaut : `false`*


### `tracking_columns`

**Personnaliser les colonnes de suivi des cours-sessions**

Définit un tableau de colonnes pour les rapports suivants : 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Durée des sessions créées automatiquement**

Durée (en jours) des sessions créées automatiquement pour un seul utilisateur. Après expiration, l'utilisateur ne peut plus s'inscrire au même cours (aucune autre session n'est créée).

*Par défaut : `1095`*


### `user_session_display_mode`

**Mode d'affichage de Mes Sessions**

Choisissez comment la page "Mes Sessions" est affichée : sous forme de blocs visuels modernes (vue en cartes) ou sous le style classique de liste.

*Par défaut : `list`*