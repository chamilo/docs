# Paramètres de messagerie

Comportement du système de **messagerie / boîte de réception**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Messagerie**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_message_tool`

**Outil de messagerie interne**

L’activation de l’outil de messagerie interne permet aux utilisateurs d’envoyer des messages aux autres utilisateurs de la plateforme et de disposer d’une boîte de réception.

*Par défaut : `true`*

### `allow_send_message_to_all_platform_users`

**Autoriser l’envoi de messages à n’importe quel utilisateur de la plateforme**

Permet d’envoyer des messages à n’importe quel utilisateur de la plateforme, et pas seulement à vos amis ou aux personnes actuellement en ligne.

*Par défaut : `false`*

### `allow_user_message_tracking`

**Les administrateurs peuvent voir les messages personnels**

Autoriser les administrateurs à voir les messages personnels entre un enseignant et un apprenant. Veuillez vous assurer d’inclure une mention dans vos conditions d’utilisation, car cela peut avoir une incidence sur la protection de la vie privée.

*Par défaut : `false`*


### `filter_interactivity_messages`

**Les enseignants n’accèdent aux messages des apprenants que pendant la période de la session**

Filtrer les messages entre un enseignant et un apprenant entre les dates de début et de fin de la session

*Par défaut : `false`*


### `message_max_upload_filesize`

**Taille maximale des fichiers téléversés dans les messages**

Taille maximale des fichiers téléversés dans l’outil de messagerie (en octets)

*Par défaut : `20971520`*

### `private_messages_about_user`

**Autoriser les messages privés entre enseignants au sujet d’un apprenant**

Autoriser l’échange de messages entre enseignants/responsables au sujet d’un utilisateur depuis la page de suivi de cet utilisateur.

*Par défaut : `false`*


### `private_messages_about_user_visible_to_user`

**Autoriser les apprenants à voir les messages les concernant échangés entre enseignants**

Si l’échange de messages au sujet d’un utilisateur est activé, cette option permettra à l’utilisateur concerné de voir ces messages. Cela vise à se conformer aux règles de transparence auxquelles l’organisation peut être tenue.

*Par défaut : `false`*