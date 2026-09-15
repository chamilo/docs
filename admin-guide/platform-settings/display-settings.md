# Paramètres d’affichage

La façon dont la plateforme est présentée aux utilisateurs — mise en page de la page d’accueil, gravatar, menus, comportement de la marque et préférences visuelles similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Affichage**. Cette catégorie contient **28 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `accessibility_font_resize`

**Fonction d’accessibilité de redimensionnement de la police**

Activez cette option pour afficher un ensemble d’options de redimensionnement de la police en haut à droite de votre campus. Cela permettra aux personnes malvoyantes de lire plus facilement le contenu de leurs cours.

*Par défaut : `false`*

### `display_categories_on_homepage`

**Afficher les catégories sur la page d’accueil**

Cette option affiche ou masque les catégories de cours sur la page d’accueil du portail

*Par défaut : `false`*

### `enable_help_link`

**Activer le lien d’aide**

Le lien Aide se trouve dans la partie supérieure droite de l’écran

*Par défaut : `true`*

### `gravatar_enabled`

**Photos utilisateur Gravatar**

Activez cette option pour rechercher dans le dépôt Gravatar des photos de l’utilisateur courant, si celui-ci n’a pas défini de photo localement. C’est idéal pour préremplir automatiquement les photos sur votre site, en particulier si vos utilisateurs sont actifs sur Internet. Les photos Gravatar se configurent facilement, à partir de l’adresse e-mail d’un utilisateur, sur http://en.gravatar.com/

*Par défaut : `false`*

### `gravatar_type`

**Type d’avatar Gravatar**

Si l’option Gravatar est activée et que l’utilisateur n’a pas de photo configurée sur Gravatar, cette option vous permet de choisir le type d’avatar que Gravatar générera pour chaque utilisateur. Consultez <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> pour des exemples de types d’avatar.

*Par défaut : `mm`*

### `hide_complete_name_in_whoisonline`

**Masquer le nom complet dans « qui est en ligne »**

La page « qui est en ligne » (si elle est activée) affichera une photo et un nom pour chaque utilisateur actuellement en ligne. Activez cette option pour masquer les noms.

*Par défaut : `false`*

### `hide_home_top_when_connected` **v3**

**Masquer le contenu supérieur de la page d’accueil une fois connecté**

Sur la page d’accueil de la plateforme, cette option vous permet de masquer le bloc d’introduction (pour ne laisser que les annonces, par exemple), pour tous les utilisateurs déjà connectés. Le bloc d’introduction général continuera d’apparaître pour les utilisateurs non encore connectés.

*Par défaut : `false`*

### `hide_logout_button`

**Masquer le bouton de déconnexion**

Masquer le bouton de déconnexion. Cela n’est généralement intéressant que lorsque vous utilisez une méthode externe de connexion/déconnexion, par exemple un authentification unique (Single Sign On) de quelque type que ce soit.

*Par défaut : `false`*

### `hide_main_navigation_menu`

**Masquer le menu de navigation principal**

Lorsque vous utilisez Chamilo à une fin spécifique (comme un examen en ligne massif), vous pourriez vouloir réduire encore davantage les distractions en supprimant le menu latéral.

*Par défaut : `false`*

### `hide_social_media_links`

**Masquer les liens vers les réseaux sociaux**

Certaines pages vous permettent de promouvoir le portail ou un cours sur les réseaux sociaux. Activez ce paramètre pour supprimer les liens.

*Par défaut : `false`*

### `order_user_list_by_official_code`

**Trier les utilisateurs par code officiel**

Utiliser le « code officiel » pour trier la plupart des listes d’étudiants sur la plateforme, au lieu de leur nom ou prénom.

*Par défaut : `false`*

### `pdf_logo_header`

**Logo d’en-tête PDF**

Indique s’il faut utiliser l’image située dans var/themes/[your-theme]/images/pdf_logo_header.png comme logo d’en-tête PDF pour toutes les exportations PDF (à la place du logo normal du portail)

### `show_admin_toolbar`

**Afficher la barre d’outils d’administration**

Affiche une barre d’outils globale en haut de la page pour les rôles utilisateurs désignés. Cette barre d’outils, très similaire aux barres noires de Wordpress et de Google, peut vraiment accélérer les actions complexes et améliorer l’espace disponible pour le contenu pédagogique, mais elle peut être déroutante pour certains utilisateurs

*Par défaut : `do_not_show`*

### `show_administrator_data` **v3**

**Informations de l’administrateur de la plateforme dans le pied de page**

Afficher les informations de l’administrateur de la plateforme dans le pied de page ?

*Par défaut : `true`*

### `show_back_link_on_top_of_tree`

**Afficher les liens de retour depuis les catégories/cours**

Afficher un lien pour revenir en arrière dans la hiérarchie des cours. Un lien est de toute façon disponible en bas de la liste.

*Par défaut : `false`*

### `show_closed_courses`

**Afficher les cours fermés sur la page de connexion et la page de démarrage du portail ?**

Afficher les cours fermés sur la page de connexion et la page de démarrage des cours ? Sur la page de démarrage du portail, une icône apparaîtra à côté des cours pour s’y inscrire rapidement. Cela n’apparaîtra sur la page de démarrage du portail que lorsque l’utilisateur est connecté et qu’il n’est pas encore inscrit au portail.

*Par défaut : `false`*

### `show_email_addresses`

**Afficher les adresses e-mail**

Afficher les adresses e-mail aux utilisateurs

*Default: `false`*

### `show_empty_course_categories`

**Afficher les catégories de cours vides**

Afficher les catégories de cours sur la page d'accueil, même si elles sont vides

*Default: `true`*

### `show_hot_courses`

**Afficher les cours populaires**

La liste des cours populaires sera ajoutée à la page d'index

*Default: `true`*

### `show_number_of_courses`

**Afficher le nombre de cours**

Afficher le nombre de cours dans chaque catégorie dans les catégories de cours sur la page d'accueil

*Default: `false`*

### `show_tabs`

**Entrées du menu principal**

Cochez les entrées que vous souhaitez voir apparaître dans le menu principal

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entrées du menu principal par rôle**

Définir la visibilité des onglets d'en-tête par rôle.

*Default: `{}`*

### `show_teacher_data` **v3**

**Afficher les informations de l'enseignant dans le pied de page**

Afficher la référence de l'enseignant (nom et e-mail s'ils sont disponibles) dans le pied de page ?

*Default: `true`*

### `show_tutor_data` **v3**

**Les données du tuteur de la session sont affichées dans le pied de page.**

Afficher la référence du tuteur de la session (nom et e-mail s'ils sont disponibles) dans le pied de page ?

*Default: `true`*

### `showonline`

**Qui est en ligne**

Afficher le nombre de personnes en ligne ?

*Default: `world`*

### `table_default_row`

**Nombre de lignes de tableau par défaut**

Combien de lignes doivent être affichées par défaut dans tous les tableaux.

*Default: `20`*

### `table_row_list`

**Nombres de pagination proposés par défaut dans les tableaux**

Définissez les options que vous souhaitez voir apparaître dans la navigation autour d'un tableau pour afficher moins ou plus de lignes sur une page. p. ex. [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite de temps pour Qui est en ligne**

Cette limite de temps définit pendant combien de minutes après sa dernière action un utilisateur sera considéré comme *en ligne*

*Default: `30`*