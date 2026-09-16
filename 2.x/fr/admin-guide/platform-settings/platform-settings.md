# Paramètres de la plateforme

Identité et comportement au niveau de la plateforme — nom de l'institution, fuseau horaire, politique d'inscription, utilisateurs en ligne, indicateurs de performance.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Plateforme**. Cette catégorie contient **29 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_my_files`

**Activer la section 'Mes Fichiers'**

Permet aux utilisateurs de téléverser des fichiers dans un espace personnel sur la plateforme.

*Par défaut : `true`*

### `chamilo_database_version`

**Version actuelle du schéma de la base de données utilisé par Chamilo**

Affiche la version actuelle de la base de données pour correspondre à la version du noyau de Chamilo.

### `cookie_warning`

**Notification de confidentialité des cookies**

Si activée, cette option affiche une bannière en haut de votre plateforme qui demande aux utilisateurs de reconnaître que la plateforme utilise des cookies nécessaires pour fournir l'expérience utilisateur. La bannière peut être facilement acceptée et masquée par l'utilisateur. Cela permet à Chamilo de se conformer aux réglementations européennes sur les cookies web.

*Par défaut : `false`*

### `disable_copy_paste`

**Désactiver le copier-coller**

Lorsque cette option est activée, elle désactive autant que possible les mécanismes de copier-coller. Utile dans des configurations d'examens restrictifs.

*Par défaut : `false`*

### `donotlistcampus`

**Ne pas lister ce campus sur chamilo.org**

Par défaut, les portails Chamilo sont automatiquement enregistrés dans une liste publique sur chamilo.org, en utilisant uniquement le titre que vous avez donné à ce portail (pas l'URL ni aucune donnée privée). Cochez cette case pour éviter que le titre de votre portail n'apparaisse.

*Par défaut : `false`*

### `generate_random_login`

**Générer un nom d'utilisateur aléatoire**

Lors de l'importation d'utilisateurs (processus par lots), génère automatiquement une chaîne aléatoire pour le nom d'utilisateur. Sinon, le nom d'utilisateur sera généré sur la base du prénom et du nom de famille, ou du préfixe de l'e-mail.

*Par défaut : `false`*

### `hosting_limit_identical_email`

**Limiter l'utilisation d'e-mails identiques**

Nombre maximum de comptes autorisés à partager la même adresse e-mail. Définissez à 0 pour désactiver cette limite.

*Par défaut : `0`*

### `hosting_limit_users_per_course`

**Limite globale d'utilisateurs par cours**

Définit un nombre maximum global d'utilisateurs (enseignants inclus) autorisés à être inscrits à un seul cours sur la plateforme. Définissez cette valeur à 0 pour désactiver la limite. Cela aide à éviter la surcharge des cours dans les portails ouverts.

*Par défaut : `0`*

### `institution`

**Nom de l'organisation**

Le nom de l'organisation (apparaît dans l'en-tête à droite)

*Par défaut : `Chamilo.org`*

### `institution_address`

**Adresse de l'institution**

Adresse

### `institution_url`

**URL de l'organisation (adresse web)**

L'URL des institutions (le lien qui apparaît dans l'en-tête à droite)

*Par défaut : `http://www.chamilo.org`*

### `max_courses_per_user`

**Nombre maximum de cours par utilisateur**

Nombre maximum de cours qu'un enseignant/formateur peut créer. Définissez à 0 pour désactiver la limite. Peut être outrepassé par utilisateur via un achat de service BuyCourses.

*Par défaut : `0`*

### `notification_event`

**Activer l'outil de notification pour un canal de communication plus impactant avec les étudiants**

Active les notifications contextuelles ou système pour les événements importants de la plateforme.

*Par défaut : `false`*

### `pdf_img_dpi`

**Résolution d'exportation PDF**

Représente la résolution des fichiers PDF générés (en points par pouce, ou dpi). La valeur par défaut est 96. L'augmenter améliorera la résolution des fichiers PDF, mais augmentera également leur poids et le temps de génération.

*Par défaut : `96`*

### `platform_logo_url`

**URL pour un logo alternatif de la plateforme**

Remplace le logo Chamilo en chargeant une URL (éventuellement distante). Assurez-vous que cela est autorisé par vos politiques de sécurité.

*Par défaut : `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Activer le partage avancé du portfolio**

Décidez qui peut voir les publications et commentaires du portfolio.

*Par défaut : `false`*

### `portfolio_show_base_course_post_in_sessions`

**Afficher les publications des cours de base dans les cours de session**

Décidez qui peut voir les publications et commentaires du portfolio.

*Par défaut : `false`*

### `push_notification_settings`

**Paramètres de notification push (JSON)**

Configuration JSON pour l'intégration des notifications push.

### `server_type`

**Type de serveur**

Définit le type d'environnement : "prod" (production normale), "validation" (comme la production mais sans rapport de statistiques), ou "test" (mode débogage avec outils pour développeurs tels que des indicateurs de chaînes non traduites).

*Par défaut : `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Permettre aux administrateurs de session de voir tous les utilisateurs sur toutes les URL**

Si activé, les administrateurs de session peuvent rechercher et lister les utilisateurs de toutes les URL d'accès, indépendamment de leur URL actuelle.

*Par défaut : `false`*

### `site_name`

**Nom du portail e-learning**

Le nom de votre portail Chamilo (apparaît dans l'en-tête)

*Par défaut : `Chamilo site`*

### `timepicker_increment`

**Incrément du sélecteur de temps**

Incrément de temps minimal (en minutes) lors de la sélection d'une date et d'une heure avec le widget timepicker. Par exemple, il peut ne pas être utile d'avoir des incréments inférieurs à 5 ou 15 minutes pour parler de la soumission d'un travail, de la disponibilité d'un test, de l'heure de début d'une session, etc.

*Par défaut : `15`*

### `timezone`

**Fuseau horaire par défaut**

Sélectionnez le fuseau horaire par défaut pour ce portail. Cela aidera à définir le fuseau horaire (si la fonctionnalité est activée) pour chaque nouvel utilisateur ou pour tout utilisateur qui n'a pas encore défini un fuseau horaire spécifique. Les fuseaux horaires permettent d'afficher toutes les informations liées au temps à l'écran dans le fuseau horaire spécifique de chaque utilisateur.

*Par défaut : `Europe/Paris`*

### `unoconv_binaries`

**Binaires du convertisseur UNO**

Indiquez le chemin système vers la bibliothèque de conversion UNO pour activer certaines fonctionnalités d'exportation supplémentaires.

*Par défaut : `/usr/bin/unoconv`*

### `use_career_external_id_as_identifier_in_diagrams`

**Utiliser l'ID de carrière externe dans les diagrammes**

Si vous utilisez des diagrammes de carrière, affichez un champ supplémentaire au lieu de l'ID de carrière interne.

*Par défaut : `false`*

### `use_custom_pages`

**Utiliser des pages personnalisées**

Activez cette fonctionnalité pour configurer des pages de connexion spécifiques par rôle.

*Par défaut : `false`*

### `use_virtual_keyboard`

**Utiliser un clavier virtuel**

Fait apparaître un clavier virtuel. Cela est utile lors de la mise en place d'examens restrictifs dans une salle physique où les étudiants n'ont pas de clavier pour limiter leur capacité à tricher.

*Par défaut : `false`*

### `user_status_show_option`

**Options d'affichage des rôles**

Un tableau de rôle => vrai/faux qui définit si ce rôle doit être affiché ou masqué.

### `user_status_show_options_enabled`

**Affichage sélectif des rôles**

Activez pour utiliser un tableau afin de définir quels rôles doivent être clairement affichés et lesquels doivent être masqués.

*Par défaut : `false`*
