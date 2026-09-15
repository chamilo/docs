# Paramètres du réseau social

Comportement du **réseau social** — amis, groupes, publications sur le mur, albums photo.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Réseau social**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_social_tool`

**Outil de réseau social (de type Facebook)**

L’outil de réseau social permet aux utilisateurs de définir des relations avec d’autres utilisateurs et, ce faisant, de définir des groupes d’amis. Combiné à l’outil de messagerie interne, cet outil permet une communication étroite avec les amis, à l’intérieur de l’environnement du portail.

*Par défaut : `true`*

### `allow_students_to_create_groups_in_social`

**Autoriser les apprenants à créer des groupes dans le réseau social**

Autoriser les apprenants à créer des groupes dans le réseau social

*Par défaut : `false`*


### `disable_dislike_option`

**Désactiver le « dislike » pour les publications sociales**

Supprime l’option pouce vers le bas pour le retour sur les publications sociales. Ne conserve que le pouce vers le haut (like).

*Par défaut : `false`*

### `hide_social_groups_block`

**Masquer le bloc des groupes dans le réseau social**

Retire la section des groupes de la vue du réseau social.

*Par défaut : `false`*


### `social_enable_messages_feedback`

**Like/Dislike pour les publications sociales**

Permet aux utilisateurs d’ajouter un retour (likes ou dislikes) aux publications du mur social.

*Par défaut : `false`*

### `social_make_teachers_friend_all`

**Les enseignants et administrateurs voient les étudiants comme des amis sur le réseau social**

Fait automatiquement apparaître les formateurs et les administrateurs comme amis de tous les étudiants dans le module de réseau social.

*Par défaut : `false`*


### `social_show_language_flag_in_profile`

**Afficher le drapeau de langue à côté de l’avatar dans le réseau social**

Affiche la préférence linguistique de l’utilisateur sous forme d’icône de drapeau à côté de son avatar dans les profils du réseau social.

*Par défaut : `false`*