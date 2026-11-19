# Paramètres de la boîte de dépôt

Comportement de l'outil d'échange de fichiers **Boîte de dépôt**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Boîte de dépôt**. Cette catégorie contient **10 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `dropbox_allow_group`

**Boîte de dépôt : autoriser les groupes**

Les utilisateurs peuvent envoyer des fichiers à des groupes

*Valeur par défaut : `true`*

### `dropbox_allow_just_upload`

**Boîte de dépôt : téléverser vers son propre espace de dépôt ?**

Autoriser les formateurs et les utilisateurs à téléverser des documents dans leur boîte de dépôt sans se les envoyer à eux-mêmes

*Valeur par défaut : `true`*

### `dropbox_allow_mailing`

**Boîte de dépôt : autoriser l'envoi personnalisé**

Grâce à la fonctionnalité d'envoi personnalisé, vous pouvez envoyer à chaque apprenant un document personnel

*Valeur par défaut : `false`*

### `dropbox_allow_overwrite`

**Boîte de dépôt : les documents peuvent-ils être écrasés**

Le document d'origine peut-il être écrasé lorsqu'un utilisateur ou un formateur téléverse un document portant le nom d'un document qui existe déjà ? Si vous répondez oui, vous perdez le mécanisme de gestion des versions.

*Valeur par défaut : `true`*

### `dropbox_allow_student_to_student`

**Boîte de dépôt : apprenant <-> apprenant**

Autoriser les utilisateurs à envoyer des documents à d'autres utilisateurs (pair à pair). Les utilisateurs pourraient également s'en servir pour des documents moins pertinents (mp3, solutions de tests, ...). Si vous désactivez cette option, les utilisateurs ne peuvent envoyer des documents qu'au formateur.

*Valeur par défaut : `true`*

### `dropbox_hide_course_coach`

**Boîte de dépôt : masquer le tuteur de cours**

Masquer le tuteur de cours de la session dans la boîte de dépôt lorsqu'un document est envoyé par le tuteur aux étudiants

*Valeur par défaut : `false`*

### `dropbox_hide_general_coach`

**Masquer le tuteur général dans la boîte de dépôt**

Masquer le nom du tuteur général dans l'outil Boîte de dépôt lorsque le tuteur général a téléversé le fichier

*Valeur par défaut : `false`*


### `dropbox_max_filesize`

**Boîte de dépôt : taille maximale d'un document**

Quelle taille (en Mo) un document de la boîte de dépôt peut-il atteindre ?

*Valeur par défaut : `100000000`*

### `dropbox_user_quota_mb`

**Boîte de dépôt : quota de stockage total par utilisateur (Mo)**

Taille combinée maximale des fichiers téléversés par un seul utilisateur dans l'ensemble des cours. Les destinataires ne subissent pas une seconde imputation.

*Valeur par défaut : `0` (illimité)*

### `dropbox_course_quota_mb`

**Boîte de dépôt : quota de stockage total par cours (Mo)**

Taille combinée maximale des fichiers de la boîte de dépôt pour un cours, y compris ses sessions. Distinct du quota de cours des Documents.

*Valeur par défaut : `0` (illimité)*

Voir [la PR sur les quotas de stockage n° 9358](https://github.com/chamilo/chamilo-lms/pull/9358).