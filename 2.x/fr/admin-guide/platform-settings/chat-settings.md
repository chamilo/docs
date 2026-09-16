# Paramètres du Chat

Comportement de l'outil **Chat** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Chat**. Cette catégorie contient **5 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_global_chat`

**Autoriser le chat global**

Les utilisateurs peuvent discuter entre eux

*Par défaut : `false`*

### `course_chat_restrict_to_coach`

**Restreindre le chat de cours aux formateurs**

Permettre uniquement aux étudiants de parler aux tuteurs du cours (et non aux autres étudiants).

*Par défaut : `false`*

### `hide_chat_video`

**Masquer l'option de chat vidéo dans le chat global**

Lorsque cette option est activée, la fonctionnalité de chat vidéo est désactivée et indisponible dans l'outil de chat global.

*Par défaut : `true`*

### `save_private_conversations_in_documents`

**Enregistrer les conversations privées dans les documents**

Si activé, les messages de chat privé 1:1 seront dupliqués dans les documents d'historique du chat du cours. Il est recommandé de laisser cette option désactivée pour des raisons de confidentialité.

*Par défaut : `false`*

### `show_chat_folder`

**Afficher le dossier d'historique des conversations de chat**

Cela permettra à l'enseignant de voir le dossier contenant toutes les sessions qui ont été réalisées dans le chat. L'enseignant peut choisir de les rendre visibles ou non aux apprenants et de les utiliser comme ressource.

*Par défaut : `true`*