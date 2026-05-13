# Paramètres des Forums

Comportement de l'outil **Forums** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Forums**. Cette catégorie contient **9 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_forum_category_language_filter`

**Filtre de langue pour les catégories de forum**

Ajoute un filtre de langue à la vue du forum pour ne voir que les catégories configurées dans une langue spécifique. Nécessite l'utilisation du champ supplémentaire 'language' sur l'entité 'forum_category'.

*Valeur par défaut : `false`*

### `allow_forum_post_revisions`

**Révision des publications du forum**

Activez cette option pour permettre de demander une révision ou une traduction de sa publication dans un forum. Lorsqu'elle est largement configurée, cette option peut être utilisée pour collaborer avec d'autres utilisateurs dans un forum d'apprentissage des langues.

*Valeur par défaut : `false`*

### `community_managers_user_list`

**Liste des gestionnaires de communauté**

Fournissez un tableau d'identifiants d'utilisateurs qui seront considérés comme gestionnaires de communauté dans le cours spécial désigné comme forum global. Les gestionnaires de communauté disposent de privilèges supplémentaires sur le forum global.

### `default_forum_view`

**Vue par défaut du forum**

Quelle devrait être l'option par défaut lors de la création d'un nouveau forum. Cependant, tout formateur peut choisir une vue différente pour chaque forum individuel.

*Valeur par défaut : `flat`*

### `display_groups_forum_in_general_tool`

**Afficher les forums de groupe dans le forum général**

Affiche les forums de groupe dans l'outil forum au niveau du cours. Cette option est activée par défaut (dans ce cas, les visibilités individuelles des forums de groupe agissent toujours comme un critère supplémentaire). Si désactivée, les forums de groupe ne seront visibles que via l'outil de groupe, qu'ils soient publics ou non.

*Valeur par défaut : `true`*

### `forum_fold_categories`

**Replier les catégories de forum**

Effet visuel pour activer le repli/dépli des catégories de forum.

*Valeur par défaut : `false`*

### `global_forums_course_id`

**Utiliser un cours comme forum global**

Définissez l'identifiant du cours (numérique) d'un cours réservé pour être utilisé comme forum global. Cela remplace le lien 'Groupes sociaux' dans le réseau social par un lien vers le forum de ce cours.

*Valeur par défaut : `0`*

### `hide_forum_post_revision_language`

**Masquer la langue de révision des publications du forum**

Masque la possibilité d'attribuer une langue à une révision de publication dans un forum.

*Valeur par défaut : `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifications de forum également depuis le cours de base**

Activez cette option pour permettre les notifications provenant du forum du cours de base, même si le cours est suivi via une session.

*Valeur par défaut : `false`*
