# Paramètres de suivi

Valeurs par défaut liées au suivi — ce qui est enregistré, quels rapports sont exposés, règles de calcul du temps.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Suivi**. Cette catégorie contient **14 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police à chasse fixe. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `block_my_progress_page`

**Empêcher l'accès à « Ma progression »**

Dans des implémentations spécifiques telles que les examens en ligne, vous pouvez souhaiter empêcher l'accès des utilisateurs à la page « Ma progression ».

*Valeur par défaut : `false`*

### `footer_extra_content`

**Contenu supplémentaire dans le pied de page**

Vous pouvez ajouter du code HTML, comme des balises meta

### `header_extra_content`

**Contenu supplémentaire dans l'en-tête**

Vous pouvez ajouter du code HTML, comme des balises meta

### `meta_description`

**Méta-description**

Ceci affichera une méta-description OpenGraph (og:description) dans les en-têtes de votre site

### `meta_image_path`

**Chemin de l'image méta**

Ce chemin d'image méta est le chemin vers un fichier situé dans votre répertoire Chamilo (par ex. home/image.png) qui doit s'afficher dans une carte Twitter ou une carte OpenGraph lors de l'affichage d'un lien vers votre LMS. Twitter recommande une image de 120 x 120 pixels, qui peut parfois être recadrée à 120x90.

### `meta_title`

**Titre méta OpenGraph**

Ceci affichera un titre méta OpenGraph (og:title) dans les en-têtes de votre site

### `meta_twitter_creator`

**Compte Twitter Creator**

Le Twitter Creator est un compte Twitter (par ex. @ywarnier) qui représente la *personne* ayant créé le site. Ce champ est facultatif.

### `meta_twitter_site`

**Compte Twitter du site**

Le site Twitter est un compte Twitter (par ex. @chamilo_news) lié à votre site. Il s'agit généralement d'un compte plus temporaire que le compte Twitter Creator, ou il représente une entité (plutôt qu'une personne). Ce champ est obligatoire si vous souhaitez que les champs méta de la carte Twitter s'affichent.

### `my_progress_course_tools_order`

**Ordre des outils sur la page « Ma progression »**

Modifiez l'ordre des outils affichés sur la page « Ma progression » pour les apprenants. Les options incluent « quizzes », « learning_paths » et « skills ».

### `tracking_skip_generic_data`

**Ignorer les données génériques sur la page d'auto-suivi de l'apprenant**

Si le chargement de la page « Ma progression » prend trop de temps, vous pouvez souhaiter supprimer le traitement des statistiques génériques de l'utilisateur. Dans ce cas, activez ce paramètre.

*Valeur par défaut : `false`*

### `hide_ip_address`

**Masquer l'adresse IP dans les rapports**

Masquez les adresses IP dans les rapports visuels et les exports de rapports. Le paramètre est activé par défaut ; le masquage des valeurs dans les rapports n'efface pas les adresses IP déjà stockées et n'empêche pas l'accès via les procédures autorisées relatives aux données personnelles.

*Valeur par défaut : `true`*

Voir [PR sur la visibilité des IP #9312](https://github.com/chamilo/chamilo-lms/pull/9312).

### `maximum_inactive_time_to_consider`

**Durée d'inactivité maximale à prendre en compte (minutes)**

Une page de cours laissée ouverte peut générer des requêtes automatiques. Après cet intervalle sans action significative de l'utilisateur, la période ne contribue plus au temps d'activité suivi dans le cours. Il s'agit d'une règle de reporting, et non d'un mécanisme de déconnexion automatique.

*Valeur par défaut : `15` minutes*

### `max_time_spent_per_session_threshold`

**Seuil de temps maximal passé par session (minutes)**

Limite la part d'une seule session de connexion comptabilisée comme activité dans les rapports, afin qu'une session ouverte exceptionnellement longue n'augmente pas artificiellement les totaux de temps d'étude. Des sessions de connexion distinctes peuvent toujours contribuer au temps total. Ceci ne met pas fin à la session d'un apprenant.

*Valeur par défaut : `360` minutes*

Voir [PR sur le plafond de temps de session #9445](https://github.com/chamilo/chamilo-lms/pull/9445).

### `recycle_bin_retention_hours`

**Conservation de la corbeille (heures)**

Âge minimal des tentatives d'exercice supprimées et de la progression dans les parcours d'apprentissage avant qu'une purge définitive ne soit autorisée. La commande de nettoyage `chamilo:recycle-bin:purge` effectue un aperçu par défaut ; le nettoyage définitif nécessite `--execute`. Le paramètre ne planifie pas à lui seul un nettoyage automatique.

*Valeur par défaut : `720` heures (30 jours)*

Voir [PR sur les corbeilles d'exercices et de parcours d'apprentissage #9383](https://github.com/chamilo/chamilo-lms/pull/9383).