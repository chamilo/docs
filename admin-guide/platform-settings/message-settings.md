---
# Paramètres de messagerie

Comportement du système de **Messagerie / Boîte de réception**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Messagerie**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_message_tool`

**Outil de messagerie interne**

L'activation de l'outil de messagerie interne permet aux utilisateurs d'envoyer des messages à d'autres utilisateurs de la plateforme et de disposer d'une boîte de réception pour la messagerie.

*Par défaut : `true`*

### `allow_send_message_to_all_platform_users`

**Autoriser l'envoi de messages à tous les utilisateurs de la plateforme**

Permet d'envoyer des messages à n'importe quel utilisateur de la plateforme, et pas seulement à vos amis ou aux personnes actuellement en ligne.

*Par défaut : `false`*

### `allow_user_message_tracking`

**Les administrateurs peuvent voir les messages personnels**

Permet aux administrateurs de voir les messages personnels échangés entre un enseignant et un apprenant. Veuillez vous assurer d'inclure une note dans vos conditions générales, car cela pourrait affecter la protection de la vie privée.

*Par défaut : `false`*

### `filter_interactivity_messages`

**Les enseignants peuvent accéder aux messages des apprenants uniquement pendant la période de la session**

Filtre les messages entre un enseignant et un apprenant entre les dates de début et de fin de la session.

*Par défaut : `false`*

### `message_max_upload_filesize`

**Taille maximale des fichiers téléversés dans les messages**

Taille maximale des fichiers téléversés dans l'outil de messagerie (en octets).

*Par défaut : `20971520`*

### `private_messages_about_user`

**Autoriser les messages privés entre enseignants à propos d'un apprenant**

Permet l'échange de messages entre enseignants ou responsables à propos d'un utilisateur depuis la page de suivi de cet utilisateur.

*Par défaut : `false`*

### `private_messages_about_user_visible_to_user`

**Autoriser les apprenants à voir les messages les concernant entre enseignants**

Si l'échange de messages à propos d'un utilisateur est activé, cette option permettra à l'utilisateur concerné de voir ces messages. Cela permet de respecter les règles de transparence auxquelles l'organisation pourrait être soumise.

*Par défaut : `false`*