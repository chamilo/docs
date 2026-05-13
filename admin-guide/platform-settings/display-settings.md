# Paramètres d'affichage

Comment la plateforme est affichée aux utilisateurs — mise en page de la page d'accueil, gravatar, menus, comportement de la marque et autres préférences visuelles similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Affichage**. Cette catégorie contient **24 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `accessibility_font_resize`

**Fonctionnalité d'accessibilité pour le redimensionnement de la police**

Activez cette option pour afficher un ensemble d'options de redimensionnement de la police en haut à droite de votre campus. Cela permettra aux personnes malvoyantes de lire plus facilement le contenu de leurs cours.

*Par défaut : `false`*

### `display_categories_on_homepage`

**Afficher les catégories sur la page d'accueil**

Cette option affichera ou masquera les catégories de cours sur la page d'accueil du portail.

*Par défaut : `false`*

### `enable_help_link`

**Activer le lien d'aide**

Le lien d'aide est situé dans la partie supérieure droite de l'écran.

*Par défaut : `true`*

### `gravatar_enabled`

**Photos d'utilisateur Gravatar**

Activez cette option pour rechercher dans le répertoire Gravatar des photos de l'utilisateur actuel, si l'utilisateur n'a pas défini de photo localement. Cela permet de remplir automatiquement les photos sur votre site, en particulier si vos utilisateurs sont des internautes actifs. Les photos Gravatar peuvent être configurées facilement, en fonction de l'adresse e-mail d'un utilisateur, sur http://en.gravatar.com/

*Par défaut : `false`*

### `gravatar_type`

**Type d'avatar Gravatar**

Si l'option Gravatar est activée et que l'utilisateur n'a pas de photo configurée sur Gravatar, cette option vous permet de choisir le type d'avatar que Gravatar générera pour chaque utilisateur. Consultez <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> pour des exemples de types d'avatar.

*Par défaut : `mm`*

### `hide_complete_name_in_whoisonline`

**Masquer le nom complet dans 'qui est en ligne'**

La page 'qui est en ligne' (si activée) affichera une photo et un nom pour chaque utilisateur actuellement en ligne. Activez cette option pour masquer les noms.

*Par défaut : `false`*

### `hide_logout_button`

**Masquer le bouton de déconnexion**

Masquez le bouton de déconnexion. Cela n'est généralement intéressant que lorsque vous utilisez une méthode de connexion/déconnexion externe, par exemple avec un système de Single Sign On.

*Par défaut : `false`*

### `hide_main_navigation_menu`

**Masquer le menu de navigation principal**

Lorsque vous utilisez Chamilo pour un objectif spécifique (comme un examen en ligne massif), vous pourriez vouloir réduire davantage les distractions en supprimant le menu latéral.

*Par défaut : `false`*

### `hide_social_media_links`

**Masquer les liens vers les réseaux sociaux**

Certaines pages vous permettent de promouvoir le portail ou un cours sur les réseaux sociaux. Activez ce paramètre pour supprimer les liens.

*Par défaut : `false`*

### `order_user_list_by_official_code`

**Trier les utilisateurs par code officiel**

Utilisez le 'code officiel' pour trier la plupart des listes d'étudiants sur la plateforme, au lieu de leur nom de famille ou prénom.

*Par défaut : `false`*

### `pdf_logo_header`

**Logo d'en-tête PDF**

Utiliser l'image située à var/themes/[votre-thème]/images/pdf_logo_header.png comme logo d'en-tête PDF pour toutes les exportations PDF (au lieu du logo habituel du portail).

### `show_admin_toolbar`

**Afficher la barre d'outils d'administration**

Affiche une barre d'outils globale en haut de la page pour les rôles d'utilisateur désignés. Cette barre d'outils, très similaire à celles de Wordpress et de Google, peut vraiment accélérer les actions complexes et améliorer l'espace disponible pour le contenu d'apprentissage, mais elle peut être déroutante pour certains utilisateurs.

*Par défaut : `do_not_show`*

### `show_back_link_on_top_of_tree`

**Afficher les liens de retour depuis les catégories/cours**

Affiche un lien pour revenir en arrière dans la hiérarchie des cours. Un lien est de toute façon disponible en bas de la liste.

*Par défaut : `false`*

### `show_closed_courses`

**Afficher les cours fermés sur la page de connexion et la page de démarrage du portail ?**

Afficher les cours fermés sur la page de connexion et la page de démarrage des cours ? Sur la page de démarrage du portail, une icône apparaîtra à côté des cours pour s'inscrire rapidement à chaque cours. Cela n'apparaîtra sur la page de démarrage du portail que lorsque l'utilisateur est connecté et qu'il n'est pas encore inscrit au portail.

*Par défaut : `false`*

### `show_email_addresses`

**Afficher les adresses e-mail**

Afficher les adresses e-mail aux utilisateurs.

*Par défaut : `false`*

### `show_empty_course_categories`

**Afficher les catégories de cours vides**

Afficher les catégories de cours sur la page d'accueil, même si elles sont vides.

*Par défaut : `true`*

### `show_hot_courses`

**Afficher les cours populaires**

La liste des cours populaires sera ajoutée à la page d'index.

*Par défaut : `true`*

### `show_number_of_courses`

**Afficher le nombre de cours**

Afficher le nombre de cours dans chaque catégorie dans les catégories de cours sur la page d'accueil.

*Par défaut : `false`*

### `show_tabs`

**Entrées du menu principal**

Cochez les entrées que vous souhaitez voir apparaître dans le menu principal.

*Par défaut :*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entrées du menu principal par rôle**

Définir la visibilité des onglets d'en-tête par rôle.

*Par défaut : `{}`*

### `showonline`

**Qui est en ligne**

Afficher le nombre de personnes actuellement en ligne ?

*Par défaut : `world`*

### `table_default_row`

**Nombre de lignes par défaut dans les tableaux**

Combien de lignes doivent être affichées par défaut dans tous les tableaux.

*Par défaut : `20`*

### `table_row_list`

**Nombres de pagination par défaut proposés dans les tableaux**

Définissez les options que vous souhaitez voir apparaître dans la navigation autour d'un tableau pour afficher moins ou plus de lignes sur une page. Par exemple [50, 100, 200, 500].

*Par défaut : `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite de temps pour Qui est en ligne**

Cette limite de temps définit pendant combien de minutes après sa dernière action un utilisateur sera considéré comme *en ligne*.

*Par défaut : `30`*