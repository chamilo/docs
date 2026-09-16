# Paramètres du catalogue de cours

Comportement du catalogue de cours (la liste publique où les utilisateurs peuvent naviguer et s'inscrire eux-mêmes).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Catalogue de cours**. Cette catégorie contient **13 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_session_auto_subscription`

**Inscription automatique aux sessions**

Activer l'inscription automatique aux sessions pour les utilisateurs.

*Par défaut : `false`*

### `allow_students_to_browse_courses`

**Autoriser la navigation des étudiants**

Permettre aux étudiants de parcourir et de filtrer le catalogue de cours.

*Par défaut : `true`*

### `course_catalog_display_in_home`

**Afficher le catalogue sur la page d'accueil**

Afficher le bloc du catalogue de cours sur la page d'accueil de la plateforme.

*Par défaut : `false`*

### `course_catalog_hide_private`

**Masquer les cours privés**

Exclure les cours privés de l'affichage du catalogue.

*Par défaut : `true`*

### `course_catalog_published`

**Publier le catalogue de cours**

Rendre le catalogue de cours accessible aux utilisateurs anonymes (le grand public) sans nécessité de se connecter.

*Par défaut : `false`*

### `course_catalog_settings`

**Paramètres du catalogue de cours**

Configuration JSON pour le catalogue de cours : paramètres des liens, filtres, options de tri, et plus encore.

### `course_subscription_in_user_s_session`

**Inscription depuis la vue de session**

Permettre aux utilisateurs de s'inscrire aux cours directement depuis leur page de session.

*Par défaut : `false`*

### `hide_public_link`

**Masquer le lien public**

Supprimer le lien URL public des cartes de cours.

*Par défaut : `false`*

### `only_show_course_from_selected_category`

**Afficher uniquement les catégories correspondantes dans le catalogue de cours**

Lorsqu'il n'est pas vide, seuls les cours des catégories spécifiées apparaîtront dans le catalogue de cours.

### `only_show_selected_courses`

**Uniquement les cours sélectionnés**

Afficher uniquement les cours sélectionnés manuellement dans le catalogue.

*Par défaut : `false`*

### `session_catalog_settings`

**Paramètres du catalogue de sessions**

Configuration JSON pour le catalogue de sessions : filtres et options d'affichage.

### `show_courses_descriptions_in_catalog`

**Afficher les descriptions des cours**

Afficher les descriptions des cours dans la liste du catalogue.

*Par défaut : `false`*

### `show_courses_sessions`

**Afficher les cours et les sessions**

Inclure à la fois les cours et les sessions dans les résultats du catalogue.

*Par défaut : `0`*