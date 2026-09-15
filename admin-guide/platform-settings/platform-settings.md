# Paramètres de la plateforme

Identité et comportement au niveau de la plateforme — nom de l’institution, fuseau horaire, politique d’inscription, utilisateurs en ligne, indicateurs de performance.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Plateforme**. Cette catégorie contient **29 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_my_files`

**Activer la section « Mes fichiers »**

Autoriser les utilisateurs à téléverser des fichiers dans un espace personnel sur la plateforme.

*Par défaut : `true`*

### `chamilo_database_version`

**Version actuelle du schéma de base de données utilisé par Chamilo**

Affiche la version actuelle de la base de données afin de la faire correspondre à la version du cœur de Chamilo.

### `cookie_warning`

**Notification de confidentialité des cookies**

Si elle est activée, cette option affiche une bannière en haut de votre plateforme demandant aux utilisateurs de reconnaître que la plateforme utilise des cookies nécessaires à l’expérience utilisateur. La bannière peut facilement être acceptée et masquée par l’utilisateur. Cela permet à Chamilo de se conformer à la réglementation européenne sur les cookies web.

*Par défaut : `false`*

### `disable_copy_paste`

**Désactiver le copier-coller**

Lorsqu’elle est activée, cette option désactive autant que possible les mécanismes de copier-coller. Utile dans les configurations d’examens restrictives.

*Par défaut : `false`*

### `donotlistcampus`

**Ne pas lister ce campus sur chamilo.org**

Par défaut, les portails Chamilo sont automatiquement enregistrés dans une liste publique sur chamilo.org, en utilisant uniquement le titre que vous avez donné à ce portail (ni l’URL ni aucune donnée privée). Cochez cette case pour éviter que le titre de votre portail n’apparaisse.

*Par défaut : `false`*

### `generate_random_login`

**Générer un identifiant aléatoire**

Lors de l’importation d’utilisateurs (traitements par lots), générer automatiquement une chaîne aléatoire pour le nom d’utilisateur. Sinon, le nom d’utilisateur sera généré à partir du prénom et du nom, ou du préfixe de l’adresse e-mail.

*Par défaut : `false`*

### `hosting_limit_identical_email`

**Limiter l’utilisation d’adresses e-mail identiques**

Nombre maximal de comptes autorisés à partager la même adresse e-mail. Définir à 0 pour désactiver cette limite.

*Par défaut : `0`*

### `hosting_limit_users_per_course`

**Limite globale d’utilisateurs par cours**

Définit un nombre maximal global d’utilisateurs (enseignants inclus) autorisés à être inscrits à un même cours sur la plateforme. Définir cette valeur à 0 pour désactiver la limite. Cela permet d’éviter la surcharge des cours sur les portails ouverts.

*Par défaut : `0`*

### `institution`

**Nom de l’organisation**

Le nom de l’organisation (apparaît dans l’en-tête à droite)

*Par défaut : `Chamilo.org`*


### `institution_address`

**Adresse de l’institution**

Adresse

### `institution_url`

**URL de l’organisation (adresse web)**

L’URL des institutions (le lien qui apparaît dans l’en-tête à droite)

*Par défaut : `http://www.chamilo.org`*


### `max_courses_per_user`

**Nombre maximal de cours par utilisateur**

Nombre maximal de cours qu’un enseignant/formateur peut créer. Définir à 0 pour désactiver la limite. Peut être outrepassé par utilisateur via un achat de service BuyCourses.

*Par défaut : `0`*

### `notification_event`

**Activer l’outil de notification pour un canal de communication plus impactant avec les étudiants**

Active les notifications contextuelles ou système pour les événements importants de la plateforme.

*Par défaut : `false`*

### `pdf_img_dpi`

**Résolution d’export PDF**

Cela représente la résolution des fichiers PDF générés (en points par pouce, ou dpi). La valeur par défaut est 96. L’augmenter produira des fichiers PDF de meilleure résolution mais augmentera également le poids et le temps de génération des fichiers.

*Par défaut : `96`*

### `platform_logo_url`

**URL du logo alternatif de la plateforme**

Remplace le logo Chamilo en chargeant une URL (éventuellement distante). Assurez-vous que cela est autorisé par vos politiques de sécurité.

*Par défaut : `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Activer le partage avancé du portfolio**

Décider qui peut consulter les publications et les commentaires du portfolio.

*Par défaut : `false`*

### `portfolio_show_base_course_post_in_sessions`

**Afficher les publications du cours de base dans le cours de session**

Décider qui peut consulter les publications et les commentaires du portfolio.

*Par défaut : `false`*

### `push_notification_settings`

**Paramètres des notifications push (JSON)**

Configuration JSON pour l’intégration des notifications push.

### `server_type`

**Type de serveur**

Définit le type d’environnement : « prod » (production normale), « validation » (comme la production mais sans reporting de statistiques), ou « test » (mode débogage avec des outils développeur tels que les indicateurs de chaînes non traduites).

*Par défaut : `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Autoriser les administrateurs de session à voir tous les utilisateurs sur toutes les URL**

Si cette option est activée, les administrateurs de session peuvent rechercher et lister les utilisateurs de toutes les URL d’accès, indépendamment de leur URL actuelle.

*Par défaut : `false`*

### `site_name`

**Nom du portail e-learning**

Le nom de votre portail Chamilo (apparaît dans l’en-tête)

*Default: `Chamilo site`*


### `timepicker_increment`

**Incrément du sélecteur d’heure**

Incrément de temps minimal (en minutes) lors de la sélection d’une date et d’une heure avec le widget timepicker. Par exemple, il peut ne pas être utile d’avoir des incréments inférieurs à 5 ou 15 minutes lorsqu’il s’agit de la remise d’un devoir, de la disponibilité d’un test, de l’heure de début d’une session, etc.

*Default: `15`*

### `timezone`

**Fuseau horaire par défaut**

Sélectionnez le fuseau horaire par défaut pour ce portail. Cela permettra de définir le fuseau horaire (si la fonctionnalité est activée) pour chaque nouvel utilisateur ou pour tout utilisateur n’ayant pas encore défini de fuseau horaire spécifique. Les fuseaux horaires permettent d’afficher à l’écran toutes les informations liées à l’heure dans le fuseau horaire spécifique de chaque utilisateur.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**Binaires du convertisseur UNO**

Indiquez le chemin système vers la bibliothèque de conversion UNO afin d’activer certaines fonctionnalités d’export supplémentaires.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Utiliser l’identifiant externe de parcours dans les diagrammes**

Si vous utilisez des diagrammes de parcours, afficher un champ supplémentaire à la place de l’identifiant interne de parcours.

*Default: `false`*

### `use_custom_pages`

**Utiliser des pages personnalisées**

Activez cette fonctionnalité pour configurer des pages de connexion spécifiques par rôle

*Default: `false`*

### `use_virtual_keyboard`

**Utiliser un clavier virtuel**

Faire apparaître un clavier virtuel. Cela est utile lors de la mise en place d’examens restrictifs dans une salle physique où les étudiants n’ont pas de clavier, afin de limiter leur capacité à tricher.

*Default: `false`*

### `user_status_show_option`

**Options d’affichage des rôles**

Un tableau rôle => true/false qui définit si ce rôle doit être affiché ou masqué.

### `user_status_show_options_enabled`

**Affichage sélectif des rôles**

Activer l’utilisation d’un tableau pour définir quels rôles doivent être clairement affichés et lesquels doivent être masqués.

*Default: `false`*