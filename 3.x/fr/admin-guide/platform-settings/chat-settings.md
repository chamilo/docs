# Paramètres du chat

Comportement de l'outil **Chat** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Chat**. Cette catégorie contient **5 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police à chasse fixe. Utilisez-le pour les scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_global_chat`

**Autoriser le chat global**

Les utilisateurs peuvent discuter entre eux

*Valeur par défaut : `false`*

### `course_chat_restrict_to_coach`

**Restreindre le chat du cours aux tuteurs**

Autoriser uniquement les étudiants à parler aux tuteurs du cours (et non aux autres étudiants).

*Valeur par défaut : `false`*

### `hide_chat_video`

**Masquer l'option de visioconférence dans le chat global**

Lorsqu'elle est activée, la fonctionnalité de chat vidéo est désactivée et indisponible dans l'outil de chat global.

*Valeur par défaut : `true`*

La valeur par défaut `true` masque l'action **Démarrer un appel vidéo** dans le **chat flottant de la plateforme**. Définissez-la sur `false` pour activer les appels WebRTC individuels pour les navigateurs pris en charge ; les utilisateurs doivent également avoir accès au chat de la plateforme, être connectés et disposer d'autorisations fonctionnelles pour la caméra et le microphone. Il ne s'agit **pas** de l'intégration de visioconférence de cours BigBlueButton ou Zoom. Voir [Appels vidéo individuels](../../student-guide/video-calls.md) pour le parcours de l'apprenant (ticket [#3777](https://github.com/chamilo/chamilo-lms/issues/3777)).


### `save_private_conversations_in_documents`

**Enregistrer les conversations privées dans les documents**

Si cette option est activée, les messages de chat privé 1:1 seront reproduits dans les documents d'historique du chat du cours. Il est recommandé de la laisser désactivée pour des raisons de confidentialité.

*Valeur par défaut : `false`*

### `show_chat_folder`

**Afficher le dossier d'historique des conversations de chat**

Cela affichera à l'enseignant le dossier contenant toutes les sessions qui ont été réalisées dans le chat ; l'enseignant peut les rendre visibles ou non pour les apprenants et les utiliser comme ressource

*Valeur par défaut : `true`*