# Paramètres de suivi

Paramètres par défaut liés au suivi — ce qui est enregistré, quels rapports sont exposés, règles de calcul du temps.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Suivi**. Cette catégorie contient **10 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `block_my_progress_page`

**Empêcher l'accès à la page 'Mon progression'**

Dans des implémentations spécifiques comme les examens en ligne, vous pourriez vouloir empêcher l'accès des utilisateurs à la page 'Mon progression'.

*Par défaut : `false`*

### `footer_extra_content`

**Contenu supplémentaire dans le pied de page**

Vous pouvez ajouter du code HTML comme des balises meta.

### `header_extra_content`

**Contenu supplémentaire dans l'en-tête**

Vous pouvez ajouter du code HTML comme des balises meta.

### `meta_description`

**Description meta**

Cela affichera une balise meta de description OpenGraph (og:description) dans les en-têtes de votre site.

### `meta_image_path`

**Chemin de l'image meta**

Ce chemin d'image meta est le chemin vers un fichier dans votre répertoire Chamilo (par exemple, home/image.png) qui devrait apparaître dans une carte Twitter ou une carte OpenGraph lors de l'affichage d'un lien vers votre LMS. Twitter recommande une image de 120 x 120 pixels, qui peut parfois être recadrée à 120x90.

### `meta_title`

**Titre meta OpenGraph**

Cela affichera une balise meta de titre OpenGraph (og:title) dans les en-têtes de votre site.

### `meta_twitter_creator`

**Compte Twitter du créateur**

Le créateur Twitter est un compte Twitter (par exemple, @ywarnier) qui représente la *personne* ayant créé le site. Ce champ est facultatif.

### `meta_twitter_site`

**Compte Twitter du site**

Le site Twitter est un compte Twitter (par exemple, @chamilo_news) lié à votre site. Il s'agit généralement d'un compte plus temporaire que le compte du créateur Twitter, ou il représente une entité (au lieu d'une personne). Ce champ est requis si vous souhaitez que les champs meta de la carte Twitter s'affichent.

### `my_progress_course_tools_order`

**Ordre des outils sur la page 'Mon progression'**

Modifiez l'ordre des outils affichés sur la page 'Mon progression' pour les apprenants. Les options incluent 'quizzes', 'learning_paths' et 'skills'.

### `tracking_skip_generic_data`

**Ignorer les données génériques sur la page de suivi personnel de l'apprenant**

Si la page 'Mon progression' met trop de temps à se charger, vous pourriez vouloir supprimer le traitement des statistiques génériques pour l'utilisateur. Dans ce cas, activez ce paramètre.

*Par défaut : `false`*