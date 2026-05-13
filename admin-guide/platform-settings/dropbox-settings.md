---
# Paramètres de Dropbox

Comportement de l'outil d'échange de fichiers **Dropbox**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Dropbox**. Cette catégorie contient **8 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `dropbox_allow_group`

**Dropbox : autoriser les groupes**

Les utilisateurs peuvent envoyer des fichiers à des groupes

*Par défaut : `true`*

### `dropbox_allow_just_upload`

**Dropbox : Téléverser dans son propre espace Dropbox ?**

Permettre aux formateurs et aux utilisateurs de téléverser des documents dans leur Dropbox sans envoyer les documents à eux-mêmes

*Par défaut : `true`*

### `dropbox_allow_mailing`

**Dropbox : Autoriser l'envoi par courriel**

Avec la fonctionnalité d'envoi par courriel, vous pouvez envoyer un document personnel à chaque apprenant

*Par défaut : `false`*

### `dropbox_allow_overwrite`

**Dropbox : Les documents peuvent-ils être écrasés**

Le document original peut-il être écrasé lorsqu'un utilisateur ou un formateur téléverse un document portant le même nom qu'un document existant ? Si vous répondez oui, vous perdez le mécanisme de versionnement.

*Par défaut : `true`*

### `dropbox_allow_student_to_student`

**Dropbox : Apprenant <-> Apprenant**

Permettre aux utilisateurs d'envoyer des documents à d'autres utilisateurs (pair à pair). Les utilisateurs peuvent utiliser cette fonctionnalité pour des documents moins pertinents également (mp3, solutions de tests, ...). Si vous désactivez cette option, les utilisateurs ne pourront envoyer des documents qu'au formateur.

*Par défaut : `true`*

### `dropbox_hide_course_coach`

**Dropbox : masquer le coach de cours**

Masquer le coach de cours de la session dans Dropbox lorsqu'un document est envoyé par le coach aux étudiants

*Par défaut : `false`*

### `dropbox_hide_general_coach`

**Masquer le coach général dans Dropbox**

Masquer le nom du coach général dans l'outil Dropbox lorsque le coach général a téléversé le fichier

*Par défaut : `false`*

### `dropbox_max_filesize`

**Dropbox : Taille maximale d'un fichier**

Quelle peut être la taille maximale (en Mo) d'un document Dropbox ?

*Par défaut : `100000000`*