# Paramètres du réseau social

Comportement du **réseau social** — amis, groupes, publications sur le mur, albums photo.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Réseau social**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Relations multiples entre utilisateurs

Une paire d'utilisateurs peut avoir **plus d'un type de relation** en même temps. Par exemple, une relation d'amitié peut coexister avec une relation de supervision (`BOSS`) ; l'enregistrement d'un type ne doit pas remplacer l'autre, et l'ajout deux fois de la même relation ne doit pas créer d'enregistrements en double. Cela a été corrigé dans la [PR #9202](https://github.com/chamilo/chamilo-lms/pull/9202) (issue #2246).

Il ne s'agit pas d'un nouveau paramètre du réseau social ni d'une promotion automatique des privilèges utilisateur. Les types de relation, le rôle de l'utilisateur sur la plateforme et les permissions d'accès sont des concepts distincts. Lors de l'investigation de contacts sociaux ou de liens de superviseur manquants après une mise à niveau, vérifiez le type de relation approprié plutôt que de supposer qu'une seule relation peut exister entre deux comptes.

## Paramètres

### `allow_social_tool`

**Outil de réseau social (de type Facebook)**

L'outil de réseau social permet aux utilisateurs de définir des relations avec d'autres utilisateurs et, ce faisant, de définir des groupes d'amis. Combiné à l'outil de messagerie interne, cet outil permet une communication étroite avec les amis, au sein de l'environnement du portail.

*Valeur par défaut : `true`*

### `allow_students_to_create_groups_in_social`

**Autoriser les apprenants à créer des groupes dans le réseau social**

Autoriser les apprenants à créer des groupes dans le réseau social

*Valeur par défaut : `false`*


### `disable_dislike_option`

**Désactiver « Je n'aime pas » pour les publications sociales**

Supprime l'option pouce vers le bas pour les retours sur les publications sociales. Conserve uniquement le pouce vers le haut (j'aime).

*Valeur par défaut : `false`*

### `hide_social_groups_block`

**Masquer le bloc des groupes dans le réseau social**

Supprime la section des groupes de la vue du réseau social.

*Valeur par défaut : `false`*


### `social_enable_messages_feedback`

**J'aime / Je n'aime pas pour les publications sociales**

Permet aux utilisateurs d'ajouter un retour (j'aime ou je n'aime pas) aux publications du mur social.

*Valeur par défaut : `false`*

### `social_make_teachers_friend_all`

**Les enseignants et les administrateurs voient les étudiants comme des amis sur le réseau social**

Fait automatiquement apparaître les formateurs et les administrateurs comme amis de tous les étudiants dans le module de réseau social.

*Valeur par défaut : `false`*


### `social_show_language_flag_in_profile`

**Afficher le drapeau de langue à côté de l'avatar dans le réseau social**

Affiche la préférence linguistique de l'utilisateur sous forme d'icône de drapeau à côté de son avatar dans les profils du réseau social.

*Valeur par défaut : `false`*