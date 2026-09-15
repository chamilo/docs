# Paramètres de présence

Valeurs par défaut et comportement de l’outil **Attendance**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Attendance**. Cette catégorie contient **5 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_delete_attendance`

**Présences : activer la suppression**

Le comportement par défaut de Chamilo consiste à masquer les feuilles de présence plutôt qu’à les supprimer, au cas où l’enseignant le ferait par erreur. Activez cette option pour autoriser les enseignants à *vraiment* supprimer les feuilles de présence.

*Par défaut : `true`*

### `attendance_allow_comments`

**Autoriser les commentaires dans les feuilles de présence**

Les enseignants et les étudiants peuvent commenter chaque présence individuelle (pour justifier).

*Par défaut : `false`*

### `attendance_calendar_set_duration` **v3**

**Durée des événements de présence**

Option permettant de définir la durée d’un événement dans la feuille de présence.

*Par défaut : `false`*

### `enable_sign_attendance_sheet`

**Signature des présences**

Activer la prise de signatures pour confirmer sa présence.

*Par défaut : `false`*

### `multilevel_grading`

**Activer la notation multiniveau des présences**

Permet de noter les présences selon plusieurs niveaux au lieu d’un simple système présent/absent.

*Par défaut : `false`*