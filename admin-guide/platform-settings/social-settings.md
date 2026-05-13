# Paramètres du réseau social

Comportement du **Réseau Social** — amis, groupes, publications sur le mur, albums photo.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Réseau Social**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_social_tool`

**Outil de réseau social (similaire à Facebook)**

L'outil de réseau social permet aux utilisateurs de définir des relations avec d'autres utilisateurs et, ce faisant, de créer des groupes d'amis. Combiné à l'outil de messagerie interne, cet outil permet une communication étroite avec les amis, à l'intérieur de l'environnement du portail.

*Par défaut : `true`*

### `allow_students_to_create_groups_in_social`

**Permettre aux apprenants de créer des groupes dans le réseau social**

Permet aux apprenants de créer des groupes dans le réseau social.

*Par défaut : `false`*

### `disable_dislike_option`

**Désactiver l'option 'ne pas aimer' pour les publications sociales**

Supprime l'option de pouce vers le bas pour les retours sur les publications sociales. Ne conserve que l'option pouce vers le haut (j'aime).

*Par défaut : `false`*

### `hide_social_groups_block`

**Masquer le bloc des groupes dans le réseau social**

Supprime la section des groupes de la vue du réseau social.

*Par défaut : `false`*

### `social_enable_messages_feedback`

**J'aime/Je n'aime pas pour les publications sociales**

Permet aux utilisateurs d'ajouter des retours (j'aime ou je n'aime pas) aux publications sur le mur social.

*Par défaut : `false`*

### `social_make_teachers_friend_all`

**Les enseignants et administrateurs apparaissent comme amis des étudiants sur le réseau social**

Fait automatiquement apparaître les formateurs et les administrateurs comme amis de tous les étudiants dans le module de réseau social.

*Par défaut : `false`*

### `social_show_language_flag_in_profile`

**Afficher le drapeau de la langue à côté de l'avatar dans le réseau social**

Affiche la préférence linguistique de l'utilisateur sous forme d'icône de drapeau à côté de son avatar dans les profils du réseau social.

*Par défaut : `false`*