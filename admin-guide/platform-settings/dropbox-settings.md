# Paramètres de la Dropbox

Comportement de l’outil d’échange de fichiers **Dropbox**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Dropbox**. Cette catégorie contient **8 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `dropbox_allow_group`

**Dropbox : autoriser les groupes**

Les utilisateurs peuvent envoyer des fichiers aux groupes

*Par défaut : `true`*

### `dropbox_allow_just_upload`

**Dropbox : téléverser vers son propre espace Dropbox ?**

Autoriser les formateurs et les utilisateurs à téléverser des documents dans leur Dropbox sans s’envoyer les documents à eux-mêmes

*Par défaut : `true`*

### `dropbox_allow_mailing`

**Dropbox : autoriser le publipostage**

Grâce à la fonctionnalité de publipostage, vous pouvez envoyer à chaque apprenant un document personnel

*Par défaut : `false`*

### `dropbox_allow_overwrite`

**Dropbox : les documents peuvent-ils être écrasés**

Le document original peut-il être écrasé lorsqu’un utilisateur ou un formateur téléverse un document portant le nom d’un document déjà existant ? Si vous répondez oui, vous perdez le mécanisme de versionnage.

*Par défaut : `true`*

### `dropbox_allow_student_to_student`

**Dropbox : Apprenant <-> Apprenant**

Autoriser les utilisateurs à envoyer des documents à d’autres utilisateurs (pair à pair). Les utilisateurs pourraient également s’en servir pour des documents moins pertinents (mp3, solutions de tests, …). Si vous désactivez cette option, les utilisateurs ne pourront envoyer des documents qu’au formateur.

*Par défaut : `true`*

### `dropbox_hide_course_coach`

**Dropbox : masquer le tuteur du cours**

Masquer le tuteur de cours de la session dans la Dropbox lorsqu’un document est envoyé par le tuteur aux étudiants

*Par défaut : `false`*

### `dropbox_hide_general_coach`

**Masquer le tuteur général dans la Dropbox**

Masquer le nom du tuteur général dans l’outil Dropbox lorsque le tuteur général a téléversé le fichier

*Par défaut : `false`*


### `dropbox_max_filesize`

**Dropbox : taille maximale d’un document**

Quelle taille (en Mo) un document de la Dropbox peut-il atteindre ?

*Par défaut : `100000000`*