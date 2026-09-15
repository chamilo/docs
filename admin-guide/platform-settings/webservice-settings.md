# Paramètres des services web

Configuration des services web SOAP / REST hérités (distincts des points de terminaison modernes d’API Platform).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Services web**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_download_documents_by_api_key`

**Autoriser le téléchargement des documents de cours par clé API**

Télécharger des documents en vérifiant la clé API REST d’un utilisateur

*Par défaut : `false`*


### `disable_webservices`

**Désactiver les services web**

Si vous n’utilisez pas les services web, activez cette option pour éviter tout risque de sécurité inutile.

*Par défaut : `false`*


### `messaging_allow_send_push_notification`

**Autoriser les notifications push vers l’application mobile Chamilo Messaging**

Envoyer des notifications push via la console Firebase de Google

*Par défaut : `false`*


### `messaging_gdc_api_key`

**Clé serveur de la console Firebase pour Cloud Messaging**

Clé serveur (jeton héritage) des identifiants du projet

### `messaging_gdc_project_number`

**Identifiant d’expéditeur de la console Firebase pour Cloud Messaging**

Vous devez enregistrer un projet sur <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Activer les services web réservés aux administrateurs**

Certains services web REST sont marqués comme réservés aux administrateurs et sont désactivés par défaut. Activez cette fonctionnalité pour donner accès à ces services web (aux utilisateurs disposant d’identifiants administrateur, évidemment).

*Par défaut : `false`*

### `webservice_return_user_field`

**Champ utilisateur renvoyé par les services web**

Demander aux services web REST (v2.php) de renvoyer un autre identifiant pour les champs liés à l’ID utilisateur. Cela est utile si le système externe ne gère pas vraiment les ID utilisateur tels qu’ils sont dans Chamilo, car cela aide le système externe à faire correspondre les données utilisateur renvoyées avec des données externes connues de Chamilo. Par exemple, si vous utilisez un système d’authentification externe, vous pouvez renvoyer le champ supplémentaire utilisé pour faire correspondre l’utilisateur avec le système d’authentification externe plutôt que user.id.

*Par défaut : `oauth2_id`*