# Paramètres des forums

Comportement de l’outil **Forums** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Forums**. Cette catégorie contient **9 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_forum_category_language_filter`

**Filtre de langue des catégories de forum**

Ajoute un filtre de langue à la vue du forum afin de n’afficher que les catégories configurées dans une langue spécifique. Nécessite l’utilisation du champ extra « language » sur l’entité « forum_category ».

*Par défaut : `false`*

### `allow_forum_post_revisions`

**Relecture des messages de forum**

Activez cette option pour permettre de demander une relecture ou une traduction de son message dans un forum. Lorsqu’elle est configurée de façon approfondie, elle peut servir à collaborer avec d’autres utilisateurs dans un forum d’apprentissage des langues.

*Par défaut : `false`*

### `community_managers_user_list`

**Liste des gestionnaires de communauté**

Fournissez un tableau d’identifiants d’utilisateurs qui seront considérés comme gestionnaires de communauté dans le cours spécial désigné comme forum global. Les gestionnaires de communauté disposent de privilèges supplémentaires sur le forum global.

### `default_forum_view`

**Vue de forum par défaut**

Quelle doit être l’option par défaut lors de la création d’un nouveau forum. Tout formateur peut toutefois choisir une vue différente pour chaque forum individuel.

*Par défaut : `flat`*

### `display_groups_forum_in_general_tool`

**Afficher les forums de groupe dans le forum général**

Affiche les forums de groupe dans l’outil forum au niveau du cours. Cette option est activée par défaut (dans ce cas, les visibilités individuelles des forums de groupe restent un critère supplémentaire). Si elle est désactivée, les forums de groupe ne seront visibles que via l’outil groupes, qu’ils soient publics ou non.

*Par défaut : `true`*

### `forum_fold_categories`

**Replier les catégories de forum**

Effet visuel permettant de replier/déplier les catégories de forum.

*Par défaut : `false`*

### `global_forums_course_id`

**Utiliser un cours comme forum global**

Définissez l’identifiant de cours (numérique) d’un cours réservé à l’usage de forum global. Cela remplace le lien « Groupes sociaux » dans le réseau social par un lien vers le forum de ce cours.

*Par défaut : `0`*

### `hide_forum_post_revision_language`

**Masquer la langue de relecture des messages de forum**

Masque la possibilité d’attribuer une langue à une relecture de message de forum.

*Par défaut : `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifications de forum également depuis le cours de base**

Activez cette option pour activer les notifications provenant du forum du cours de base, même si le cours est suivi via une session.

*Par défaut : `false`*