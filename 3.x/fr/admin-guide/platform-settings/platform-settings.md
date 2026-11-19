# Paramètres de la plateforme

Identité et comportement au niveau de la plateforme — nom de l’établissement, fuseau horaire, politique d’inscription, utilisateurs en ligne, indicateurs de performance.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Plateforme**. Cette catégorie contient **30 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police à chasse fixe. Utilisez-le lors de scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_my_files`

**Activer la section « Mes fichiers »**

Permet aux utilisateurs de téléverser des fichiers dans un espace personnel sur la plateforme.

*Valeur par défaut : `true`*

### `chamilo_database_version`

**Version actuelle du schéma de base de données utilisé par Chamilo**

Affiche la version actuelle de la base de données afin de la faire correspondre à la version du cœur de Chamilo.

### `cookie_warning`

**Notification de confidentialité relative aux cookies**

Si cette option est activée, une bannière s’affiche en haut de votre plateforme pour demander aux utilisateurs de reconnaître que la plateforme utilise des cookies nécessaires à l’expérience utilisateur. La bannière peut facilement être acceptée et masquée par l’utilisateur. Cela permet à Chamilo de se conformer à la réglementation européenne sur les cookies web.

*Valeur par défaut : `false`*

### `disable_copy_paste`

**Désactiver le copier-coller**

Lorsqu’elle est activée, cette option désactive autant que possible les mécanismes de copier-coller. Utile dans des configurations d’examens restrictives.

*Valeur par défaut : `false`*

### `donotlistcampus`

**Ne pas répertorier ce campus sur chamilo.org**

Par défaut, les portails Chamilo sont automatiquement enregistrés dans une liste publique sur chamilo.org, en utilisant uniquement le titre que vous avez donné à ce portail (ni l’URL ni aucune donnée privée). Cochez cette case pour éviter que le titre de votre portail n’apparaisse.

*Valeur par défaut : `false`*

### `generate_random_login`

**Générer un nom d’utilisateur aléatoire**

Lors de l’importation d’utilisateurs (traitements par lots), génère automatiquement une chaîne aléatoire comme nom d’utilisateur. Sinon, le nom d’utilisateur sera généré à partir du prénom et du nom, ou du préfixe de l’adresse e-mail.

*Valeur par défaut : `false`*

### `hosting_limit_identical_email`

**Limiter l’utilisation d’une même adresse e-mail**

Nombre maximal de comptes autorisés à partager la même adresse e-mail. Définissez la valeur à 0 pour désactiver cette limite.

*Valeur par défaut : `0`*

### `hosting_limit_users_per_course`

**Limite globale d’utilisateurs par cours**

Définit un nombre maximal global d’utilisateurs (enseignants inclus) autorisés à être inscrits à un même cours sur la plateforme. Définissez cette valeur à 0 pour désactiver la limite. Cela permet d’éviter la surcharge des cours sur les portails ouverts.

*Valeur par défaut : `0`*

### `institution`

**Nom de l’organisation**

Le nom de l’organisation (apparaît dans l’en-tête à droite)

*Valeur par défaut : `Chamilo.org`*


### `institution_address`

**Adresse de l’établissement**

Adresse

### `institution_url`

**URL de l’organisation (adresse web)**

L’URL de l’établissement (le lien qui apparaît dans l’en-tête à droite)

*Valeur par défaut : `http://www.chamilo.org`*


### `max_courses_per_user`

**Nombre maximal de cours par utilisateur**

Nombre maximal de cours qu’un enseignant/formateur peut créer. Définissez la valeur à 0 pour désactiver la limite. Peut être remplacé par utilisateur via un achat du service BuyCourses.

*Valeur par défaut : `0`*

### `notification_event`

**Activer l’outil de notification pour un canal de communication plus impactant avec les étudiants**

Active les notifications contextuelles ou système pour les événements importants de la plateforme.

*Valeur par défaut : `false`*

### `pdf_img_dpi`

**Résolution d’exportation PDF**

Représente la résolution des fichiers PDF générés (en points par pouce, ou dpi). La valeur par défaut est 96. L’augmenter produit des fichiers PDF de meilleure résolution, mais augmente également le poids et le temps de génération des fichiers.

*Valeur par défaut : `96`*

### `platform_logo_url`

**URL d’un logo alternatif de la plateforme**

Remplace le logo Chamilo en chargeant une URL (éventuellement distante). Assurez-vous que cela est autorisé par vos politiques de sécurité.

*Valeur par défaut : `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Activer le partage avancé du portfolio**

Détermine qui peut consulter les publications et les commentaires du portfolio.

*Valeur par défaut : `false`*

### `portfolio_show_base_course_post_in_sessions`

**Afficher les publications du cours de base dans le cours de session**

Détermine qui peut consulter les publications et les commentaires du portfolio.

*Valeur par défaut : `false`*

### `push_notification_settings`

**Paramètres des notifications push (JSON)**

Configuration JSON pour l’intégration des notifications push.

### `server_type`

**Type de serveur**

Définit le type d’environnement : « prod » (production normale), « validation » (comme la production, mais sans le rapport de statistiques) ou « test » (mode débogage avec des outils de développement tels que des indicateurs de chaînes non traduites).

*Valeur par défaut : `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Autoriser les administrateurs de session à voir tous les utilisateurs sur toutes les URL**

Si cette option est activée, les administrateurs de session peuvent rechercher et lister les utilisateurs de toutes les URL d’accès, indépendamment de leur URL actuelle.

*Valeur par défaut : `false`*

### `site_name`

**Nom du portail d’apprentissage en ligne**

Le nom de votre portail Chamilo (apparaît dans l’en-tête)

*Valeur par défaut : `Chamilo site`*


### `timepicker_increment`

**Incrément du sélecteur d’heure**

Incrément de temps minimal (en minutes) lors de la sélection d’une date et d’une heure avec le widget de sélection d’heure. Par exemple, il peut ne pas être utile d’avoir des incréments inférieurs à 5 ou 15 minutes lorsqu’il s’agit de la remise d’un devoir, de la disponibilité d’un test, de l’heure de début d’une session, etc.

*Valeur par défaut : `15`*

### `timezone`

**Fuseau horaire par défaut**

Sélectionnez le fuseau horaire par défaut de ce portail. Cela permet de définir le fuseau horaire (si la fonctionnalité est activée) pour chaque nouvel utilisateur ou pour tout utilisateur qui n’a pas encore défini de fuseau horaire spécifique. Les fuseaux horaires permettent d’afficher à l’écran toutes les informations liées au temps dans le fuseau horaire propre à chaque utilisateur.

*Valeur par défaut : `Europe/Paris`*


### `unoconv_binaries`

**Binaires du convertisseur UNO**

Indiquez le chemin système vers la bibliothèque du convertisseur UNO afin d’activer certaines fonctionnalités d’exportation supplémentaires.

*Valeur par défaut : `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Utiliser l’identifiant externe de parcours dans les diagrammes**

Si vous utilisez des diagrammes de parcours, afficher un champ supplémentaire à la place de l’identifiant interne du parcours.

*Valeur par défaut : `false`*

### `use_custom_pages`

**Utiliser des pages personnalisées**

Activez cette fonctionnalité pour configurer des pages de connexion spécifiques selon le rôle

*Valeur par défaut : `false`*

### `use_virtual_keyboard`

**Utiliser un clavier virtuel**

Faire apparaître un clavier virtuel. Cela est utile lors de la mise en place d’examens restrictifs dans une salle physique où les étudiants n’ont pas de clavier, afin de limiter leur capacité à tricher.

*Valeur par défaut : `false`*

### `user_status_show_option`

**Options d’affichage des rôles**

Un tableau rôle => true/false qui définit si ce rôle doit être affiché ou masqué.

### `user_status_show_options_enabled`

**Affichage sélectif des rôles**

Activez cette option pour utiliser un tableau définissant quels rôles doivent être clairement affichés et lesquels doivent être masqués.

*Valeur par défaut : `false`*

### `personal_files_quota_mb`

**Mes fichiers : quota de stockage total par utilisateur (Mo)**

Taille totale maximale des fichiers personnels appartenant à chaque utilisateur. Cette limite ne s’applique pas aux documents de cours, à la boîte de dépôt ni aux avantages BuyCourses.

*Valeur par défaut : `0` (illimité)*

Voir [PR sur les quotas de stockage n° 9358](https://github.com/chamilo/chamilo-lms/pull/9358).