# Paramètres des forums

Comportement de l'outil **Forums** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Forums**. Cette catégorie contient **16 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police à chasse fixe. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_forum_category_language_filter`

**Filtre de langue des catégories de forum**

Ajoute un filtre de langue à la vue du forum afin de n'afficher que les catégories configurées dans une langue spécifique. Nécessite l'utilisation du champ supplémentaire « language » sur l'entité « forum_category ».

*Valeur par défaut : `false`*

### `allow_forum_post_revisions`

**Révision des messages de forum**

Activez cette option pour permettre de demander une révision ou une traduction de son message dans un forum. Lorsqu'elle est largement configurée, elle peut servir à collaborer avec d'autres utilisateurs dans un forum d'apprentissage des langues.

*Valeur par défaut : `false`*

### `community_managers_user_list`

**Liste des gestionnaires de communauté**

Fournissez un tableau d'identifiants d'utilisateurs qui seront considérés comme gestionnaires de communauté dans le cours spécial désigné comme forum global. Les gestionnaires de communauté disposent de privilèges supplémentaires sur le forum global.

### `default_forum_view`

**Vue de forum par défaut**

Quelle doit être l'option par défaut lors de la création d'un nouveau forum. Tout formateur peut toutefois choisir une vue différente pour chaque forum individuel

*Valeur par défaut : `flat`*

### `display_groups_forum_in_general_tool`

**Afficher les forums de groupe dans le forum général**

Affiche les forums de groupe dans l'outil forum au niveau du cours. Cette option est activée par défaut (dans ce cas, les visibilités individuelles des forums de groupe restent un critère supplémentaire). Si elle est désactivée, les forums de groupe ne seront visibles que via l'outil groupe, qu'ils soient publics ou non.

*Valeur par défaut : `true`*

### `first_reply_min_words`

**Nombre minimum de mots pour la première réponse au forum**

Longueur minimale de la réponse lorsque l'utilisateur n'a aucun message précédent dans le même fil de discussion. Une réponse plus courte est refusée avec un message indiquant ce minimum et le nombre de mots contenus dans la réponse. Seuls les mots du texte sont comptés, pas sa mise en forme. Cela s'applique à tout utilisateur qui répond à un fil de discussion, mais pas au message d'ouverture d'un nouveau fil de discussion. Définissez la valeur à 0 pour accepter des réponses de n'importe quelle longueur.

*Valeur par défaut : `0`*

### `forum_fold_categories`

**Replier les catégories de forum**

Effet visuel permettant de replier et de déplier les catégories de forum.

*Valeur par défaut : `false`*

### `forum_participation_can_be_modified_in_course`

**Les paramètres de participation au forum peuvent être modifiés par cours**

Lorsqu'elle est activée, les enseignants peuvent choisir, dans la section Forum des paramètres du cours, si leur cours masque les réponses du fil de discussion jusqu'à ce que l'apprenant publie un message, affiche la description de la catégorie dans les fils de discussion et combien de messages la barre de progression de la participation attend, au lieu de suivre les paramètres de la plateforme.

*Valeur par défaut : `false`*

### `global_forums_course_id`

**Utiliser un cours comme forum global**

Définissez l'identifiant de cours (numérique) d'un cours réservé pour servir de forum global. Cela remplace le lien « Groupes sociaux » du réseau social par un lien vers le forum de ce cours.

*Valeur par défaut : `0`*

### `hide_forum_post_revision_language`

**Masquer la langue de révision des messages de forum**

Masque la possibilité d'attribuer une langue à une révision de message de forum.

*Valeur par défaut : `false`*

### `show_category_description_in_thread`

**Afficher la description de la catégorie de forum dans les fils de discussion**

Affiche le titre de la catégorie et une description abrégée au-dessus de chaque fil de discussion, avec **Lire la suite** disponible pour une description longue.

*Valeur par défaut : `false`*

### `show_thread_replies_after_participation`

**Afficher les réponses du fil de discussion uniquement après participation**

Pour les apprenants, ne renvoie que le message d'ouverture d'un fil de discussion jusqu'à ce qu'ils contribuent eux-mêmes un message. Les administrateurs, les enseignants, les coachs de session et les tuteurs de groupe voient toujours tous les messages ; les messages en attente de modération comptent pour la participation.

*Valeur par défaut : `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifications de forum également depuis le cours de base**

Activez cette option pour activer les notifications provenant du forum du cours de base, même si le cours est suivi via une session.

*Valeur par défaut : `false`*

### `subsequent_reply_min_words`

**Nombre minimum de mots pour les réponses suivantes au forum**

Longueur minimale de la réponse lorsque l'utilisateur a déjà un message dans le même fil de discussion, afin d'exiger par exemple une première réponse substantielle et d'autoriser des réponses de suivi plus courtes. Une réponse plus courte est refusée avec un message indiquant ce minimum et le nombre de mots contenus dans la réponse. Définissez la valeur à 0 pour accepter des réponses de n'importe quelle longueur.

*Valeur par défaut : `0`*

### `thread_max_posts_for_non_admins`

**Nombre maximal de messages affichés dans un fil de discussion**

Afficher uniquement ce nombre de messages de chaque fil de discussion à tout utilisateur qui n'est pas administrateur de la plateforme, enseignants compris, et à toute personne dans un parcours d'apprentissage. Dans les vues en fils et imbriquées, la limite s'applique aux réponses de chaque message. Les messages sont conservés dans l'ordre de la vue : les premiers, ou les plus récents dans un parcours d'apprentissage, où les messages les plus récents apparaissent en premier. Définir à 0 pour afficher tous les messages. La liste des fils et la recherche dans le forum ne sont pas limitées.

*Valeur par défaut : `0`*

### `thread_participation_progress_posts`

**Messages requis pour terminer un fil de discussion**

Nombre de messages d'apprenant requis pour que la barre de progression atteigne 100 %. Les messages modérés en attente d'approbation sont comptabilisés. Définir à `0` pour masquer la barre. Ce paramètre est distinct de l'exigence d'un seul message pour révéler les autres réponses.

*Valeur par défaut : `0`*