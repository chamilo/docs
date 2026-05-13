# Paramètres des services web

Configuration des anciens services web SOAP / REST (distincts des points de terminaison modernes de l'API Platform).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Services Web**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_download_documents_by_api_key`

**Autoriser le téléchargement de documents de cours par clé API**

Télécharger des documents en vérifiant la clé API REST pour un utilisateur

*Par défaut : `false`*

### `disable_webservices`

**Désactiver les services web**

Si vous n'utilisez pas les services web, activez cette option pour éviter tout risque de sécurité inutile.

*Par défaut : `false`*

### `messaging_allow_send_push_notification`

**Autoriser les notifications push vers l'application mobile de messagerie Chamilo**

Envoyer des notifications push via la console Firebase de Google

*Par défaut : `false`*

### `messaging_gdc_api_key`

**Clé de serveur de la console Firebase pour la messagerie cloud**

Clé de serveur (jeton legacy) provenant des identifiants du projet

### `messaging_gdc_project_number`

**ID d'expéditeur de la console Firebase pour la messagerie cloud**

Vous devez enregistrer un projet sur <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Activer les services web réservés aux administrateurs**

Certains services web REST sont marqués comme réservés aux administrateurs et sont désactivés par défaut. Activez cette fonctionnalité pour donner accès à ces services web (aux utilisateurs disposant des identifiants d'administrateur, évidemment).

*Par défaut : `false`*

### `webservice_return_user_field`

**Champ utilisateur retourné par les services web**

Demander aux services web REST (v2.php) de retourner un autre identifiant pour les champs liés à l'ID utilisateur. Cela est utile si le système externe ne gère pas réellement les ID utilisateurs tels qu'ils sont dans Chamilo, car cela aide le système externe à faire correspondre les données utilisateur retournées avec des données externes connues de Chamilo. Par exemple, si vous utilisez un système d'authentification externe, vous pouvez retourner le champ supplémentaire utilisé pour faire correspondre l'utilisateur avec le système d'authentification externe plutôt que user.id.

*Par défaut : `oauth2_id`*