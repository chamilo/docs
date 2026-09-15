# Paramètres du profil utilisateur

Quels champs apparaissent sur le profil utilisateur, lesquels l’utilisateur peut modifier, et les préférences associées.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Profil utilisateur**. Cette catégorie contient **29 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `account_valid_duration`

**Validité du compte**

Un compte utilisateur est valide pendant ce nombre de jours après sa création

*Default: `3660`*


### `add_user_course_information_in_mailto`

**Préremplir le courriel avec les informations utilisateur et cours dans le contact du pied de page**

Ajouter un objet et un corps dans le mailto: du pied de page.

*Default: `false`*


### `allow_show_linkedin_url`

**Autoriser l’affichage de l’URL LinkedIn de l’utilisateur**

Ajouter un lien sur le bloc social de l’utilisateur, permettant de visiter le profil LinkedIn de l’utilisateur

### `allow_show_skype_account`

**Autoriser l’affichage du compte Skype de l’utilisateur**

Ajouter un lien sur le bloc social de l’utilisateur permettant de démarrer une conversation par Skype

### `allow_social_map_fields`

**Géolocalisation des utilisateurs sur une carte**

Activer l’affichage d’une carte dans le réseau social permettant de localiser d’autres utilisateurs. Cela inclut plusieurs positions (actuelle et de destination) qui doivent être définies comme adresses ou coordonnées dans des champs extra distincts. Les champs extra doivent être définis ici sous forme de tableau.

### `allow_teachers_to_classes`

**Autoriser les enseignants à gérer les classes**

Permet aux enseignants de gérer les groupes de classe et leurs membres au sein du système.

*Default: `false`*


### `allow_user_headings`

**Autoriser le profilage des utilisateurs dans les cours**

Un enseignant peut-il définir des champs de profil apprenant pour collecter des informations supplémentaires ?

### `allow_users_to_change_email_with_no_password`

**Autoriser les utilisateurs à changer d’e-mail sans mot de passe**

Lors de la modification des informations du compte

*Default: `false`*

### `changeable_options`

**Champs que les utilisateurs sont autorisés à modifier dans leur profil**

Sélectionnez les champs que les utilisateurs pourront modifier sur leur page de profil.


### `enable_profile_user_address_geolocalization`

**Activer la géolocalisation de l’utilisateur**

Activer le champ d’adresse de l’utilisateur et l’afficher sur une carte à l’aide des fonctionnalités de géolocalisation

### `extended_profile`

**Portfolio**

Si ce paramètre est activé, un utilisateur peut renseigner les champs (facultatifs) suivants : « Mon espace personnel ouvert », « Mes compétences », « Mes diplômes », « Ce que je suis capable d’enseigner »

*Default: `false`*

### `hide_username_in_course_chat`

**Masquer le nom d’utilisateur dans le chat du cours**

Dans le chat du cours, masquer le nom d’utilisateur. N’afficher que les noms des personnes.

*Default: `false`*


### `hide_username_with_complete_name`

**Masquer le nom d’utilisateur lorsque le nom complet est déjà affiché**

Certaines fonctions internes renvoient le nom d’utilisateur lorsqu’elles renvoient le nom complet de l’utilisateur. Avec cette option activée, vous vous assurez que le nom d’utilisateur n’apparaîtra pas.

*Default: `false`*


### `linkedin_organization_id`

**ID d’organisation LinkedIn**

Lors du partage d’un badge sur LinkedIn, LinkedIn vous permet de définir un identifiant d’organisation qui pointera vers la page LinkedIn de votre organisation (pour lier l’organisation attribuant le badge).

*Default: `false`*


### `login_is_email`

**Utiliser l’e-mail comme nom d’utilisateur**

Utiliser l’e-mail pour se connecter au système

*Default: `false`*

### `my_space_users_items_per_page`

**Nombre d’éléments par page par défaut dans mySpace**

Nombre d’enregistrements affichés par page dans les sections de suivi MySpace (utilisateurs, statistiques de travaux, liste des étudiants).

*Default: `10`*


### `pass_reminder_custom_link`

**Page personnalisée pour le rappel de mot de passe**

Définissez votre propre URL vers une page de réinitialisation de mot de passe. Utile lors de l’utilisation d’un système fédéré de gestion des comptes.

### `profile_fields_visibility`

**Champs visibles sur la page de profil**

Tableau de champs et indication (booléen) de leur visibilité ou non sur la page de profil de l’utilisateur (fonctionne également avec les libellés des champs extra).

### `registration_add_helptext_for_2_names`

**Ajouter une aide pour saisir deux noms à l’inscription**

Ajouter un texte d’aide pour que les utilisateurs saisissent deux noms dans le formulaire d’inscription lorsque les doubles noms de famille sont courants.

*Default: `false`*


### `send_notification_when_user_added`

**Envoyer un courriel à l’administrateur lors de la création d’un utilisateur**

Envoyer une notification par e-mail à l’administrateur lorsqu’un utilisateur est créé.

### `show_conditions_to_user`

**Afficher des conditions d’inscription spécifiques**

Afficher plusieurs conditions à l’utilisateur pendant le processus d’inscription. Fournir un tableau dont chaque élément contient « variable » (nom interne du champ extra), « display_text » (texte simple pour une case à cocher), « text_area » (texte long des conditions).

### `show_official_code_whoisonline`

**Code officiel sur « Qui est en ligne »**

Afficher le code officiel sur la page « Qui est en ligne », sous le nom d’utilisateur.

*Default: `false`*

### `show_terms_if_profile_completed`

**Conditions d'utilisation uniquement si le profil est complet**

En activant cette option, les conditions d'utilisation ne seront disponibles pour l'utilisateur que lorsque les champs de profil supplémentaires commençant par « terms_ » et définis comme visibles sont renseignés.

*Par défaut : `false`*


### `split_users_upload_directory`

**Diviser le répertoire de téléversement des utilisateurs**

Sur les portails à forte charge, où de nombreux utilisateurs sont inscrits et envoient leurs photos, le répertoire de téléversement (main/upload/users/) peut contenir trop de fichiers pour que le système de fichiers les gère (cela a été signalé avec plus de 36 000 fichiers sur un serveur Debian). Modifier cette option activera une division à un niveau des répertoires dans le répertoire de téléversement. 9 répertoires seront utilisés dans le répertoire de base et tous les répertoires d'utilisateurs suivants seront stockés dans l'un de ces 9 répertoires. Le changement de cette option n'affectera pas la structure des répertoires sur le disque, mais affectera le comportement du code de Chamilo, donc si vous changez cette option, vous devez créer les nouveaux répertoires et déplacer les répertoires existants vous-même sur le serveur. Sachez que lors de la création et du déplacement de ces répertoires, vous devrez déplacer les répertoires des utilisateurs 1 à 9 dans des sous-répertoires du même nom. Si vous n'êtes pas sûr de cette option, il est préférable de ne pas l'activer.

*Par défaut : `true`*

### `use_users_timezone`

**Activer les fuseaux horaires des utilisateurs**

Active la possibilité pour les utilisateurs de sélectionner leur propre fuseau horaire. Une fois configuré, les utilisateurs pourront voir les échéances des devoirs et d'autres références temporelles dans leur propre fuseau horaire, ce qui réduira les erreurs au moment de la remise.

*Par défaut : `true`*

### `user_import_settings`

**Options pour l'import d'utilisateurs**

Tableau d'options à appliquer comme paramètres par défaut lors de l'import d'utilisateurs CSV/XML.

### `user_search_on_extra_fields`

**Rechercher les utilisateurs par champs supplémentaires dans la liste des utilisateurs pour les administrateurs**

Inclut naturellement les champs supplémentaires indiqués (tableau d'étiquettes de champs supplémentaires) dans les recherches d'utilisateurs.

### `user_selected_theme`

**Sélection du thème par l'utilisateur**

Permet aux utilisateurs de sélectionner leur propre thème visuel dans leur profil. Cela changera l'apparence de Chamilo pour eux, mais laissera intact le style par défaut du portail. Si un cours ou une session spécifique a un thème spécifique assigné, il aura priorité sur les thèmes définis par l'utilisateur.

*Par défaut : `false`*

### `visible_options`

**Liste des champs visibles dans le profil**

Contrôle quels champs de profil sont visibles pour les utilisateurs et les autres.