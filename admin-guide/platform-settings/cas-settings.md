# Paramètres CAS

Configuration CAS héritée (Central Authentication Service) reprise de Chamilo 1.x. Voir [CAS](../authentication/cas.md) pour l'état actuel de l'authentificateur CAS dans Chamilo 3.x.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > CAS**. Cette catégorie contient **7 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `cas_activate`

**Activer l'authentification CAS**

L'activation de l'authentification CAS permettra aux utilisateurs de s'authentifier avec leurs identifiants CAS.<br/>Accédez à <a href='settings.php?category=CAS'>Plugin</a> pour ajouter un bouton configurable « Connexion CAS » pour votre campus Chamilo. Vous pouvez également forcer l'authentification CAS en définissant cas[force_redirect] dans app/config/auth.conf.php.

### `cas_add_user_activate`

**Activer l'ajout d'utilisateurs CAS**

Activer l'ajout d'utilisateurs CAS. Pour créer le compte utilisateur à partir de l'annuaire LDAP, les tables extldap_config et extldap_user_correspondance doivent être renseignées dans app/config/auth.conf.php

### `cas_port`

**Port du serveur CAS principal**

Le port sur lequel se connecter au serveur CAS principal

### `cas_protocol`

**Protocole du serveur CAS principal**

Le protocole avec lequel nous nous connectons au serveur CAS

### `cas_server`

**Serveur CAS principal**

Il s'agit du serveur CAS principal qui sera utilisé pour l'authentification (adresse IP ou nom d'hôte)

### `cas_server_uri`

**URI du serveur CAS principal**

Le chemin vers le service CAS

### `update_user_info_cas_with_ldap`

**Mettre à jour les informations du compte utilisateur authentifié par CAS depuis LDAP**

Garantit que le prénom, le nom et l'adresse e-mail de l'utilisateur correspondent aux valeurs actuelles de l'annuaire LDAP