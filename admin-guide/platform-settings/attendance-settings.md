---
# Paramètres de présence

Paramètres par défaut et comportement de l'outil **Présence**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Présence**. Cette catégorie contient **4 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_delete_attendance`

**Présences : autoriser la suppression**

Le comportement par défaut dans Chamilo est de masquer les feuilles de présence au lieu de les supprimer, au cas où un enseignant le ferait par erreur. Activez cette option pour permettre aux enseignants de *réellement* supprimer les feuilles de présence.

*Par défaut : `true`*

### `attendance_allow_comments`

**Autoriser les commentaires dans les feuilles de présence**

Les enseignants et les étudiants peuvent commenter chaque présence individuelle (pour justifier).

*Par défaut : `false`*

### `enable_sign_attendance_sheet`

**Signature de présence**

Active la prise de signatures pour confirmer sa présence.

*Par défaut : `false`*

### `multilevel_grading`

**Activer l'évaluation multiniveau de la présence**

Permet d'évaluer la présence avec plusieurs niveaux au lieu d'un simple système présent/absent.

*Par défaut : `false`*
---