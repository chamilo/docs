# Paramètres du chat

Comportement de l'outil **Chat** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Chat**. Cette catégorie contient **5 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d'un script via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_global_chat`

**Autoriser le chat global**

Les utilisateurs peuvent discuter entre eux

*Default: `false`*

### `course_chat_restrict_to_coach`

**Restreindre le chat du cours aux tuteurs**

N'autoriser les étudiants qu'à parler aux tuteurs du cours (pas aux autres étudiants).

*Default: `false`*

### `hide_chat_video`

**Masquer l'option de chat vidéo dans le chat global**

Lorsque cette option est activée, la fonctionnalité de chat vidéo est désactivée et indisponible dans l'outil de chat global.

*Default: `true`*

### `save_private_conversations_in_documents`

**Enregistrer les conversations privées dans les documents**

Si cette option est activée, les messages de chat privé 1:1 seront recopiés dans les documents d'historique du chat du cours. Il est recommandé de la laisser désactivée pour des raisons de confidentialité.

*Default: `false`*

### `show_chat_folder`

**Afficher le dossier d'historique des conversations du chat**

Cela affichera à l'enseignant le dossier contenant toutes les sessions réalisées dans le chat ; l'enseignant peut les rendre visibles ou non aux apprenants et les utiliser comme ressource

*Default: `true`*