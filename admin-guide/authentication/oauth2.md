---
# OAuth2

L'authentification OAuth2 est configurée dans `config/authentication.yaml`. Chamilo inclut un support intégré pour Azure AD, Keycloak, Facebook et tout fournisseur générique conforme à OAuth2.

## Étape 1 — Enregistrer Chamilo auprès de votre fournisseur d'identité

Créez une application dans le panneau d'administration de votre fournisseur et définissez l'**URI de redirection** sur :

```
https://votre-url-chamilo/connect/<fournisseur>/check
```

Où `<fournisseur>` est `azure`, `keycloak`, `facebook`, ou le nom que vous donnez à un fournisseur générique. Notez l'**ID client** et le **Secret client**.

## Étape 2 — Configurer authentication.yaml

Activez le fournisseur et fournissez ses identifiants. Tous les fournisseurs partagent ces clés communes :

| Clé | Description |
|-----|-------------|
| `enabled` | `true` pour activer |
| `title` | Libellé affiché sur le bouton de connexion |
| `client_id` | Provenant de votre fournisseur d'identité |
| `client_secret` | Provenant de votre fournisseur d'identité |
| `allow_create_new_users` | Créer automatiquement un compte Chamilo lors de la première connexion |
| `allow_update_user_info` | Synchroniser les données utilisateur à chaque connexion |
| `force_as_login_method` | Désactiver les autres méthodes et forcer celle-ci |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Se connecter avec Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure prend également en charge le mappage de rôles basé sur les groupes (mapping des ID de groupes Azure aux rôles Chamilo tels que enseignant ou administrateur), les commandes de synchronisation delta des utilisateurs et l'authentification par certificat au lieu d'un secret client. Consultez le [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) pour ces options.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Se connecter avec Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.votreorganisation.com"
        realm: "votre-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Se connecter avec Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 générique

Utilisez ceci pour Google, GitLab ou tout fournisseur conforme à OAuth2 :

```yaml
authentication:
  1:
    oauth2:
      monfournisseur:
        enabled: true
        title: "Se connecter avec MonFournisseur"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://fournisseur.exemple.com/oauth/authorize"
        urlAccessToken: "https://fournisseur.exemple.com/oauth/token"
        urlResourceOwnerDetails: "https://fournisseur.exemple.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Le mappage des champs (comment les attributs du fournisseur sont associés aux champs de Chamilo comme `firstname`, `lastname`, `email`, etc.) et le mappage des rôles sont également configurables. Consultez le [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) pour la liste complète des clés de mappage.

## Étape 3 — Vider le cache et tester

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Déconnectez-vous de Chamilo. Le bouton du fournisseur configuré devrait apparaître sur la page de connexion. Testez avec un compte dédié avant de le déployer pour tous les utilisateurs.

## Conseils

* Gardez le formulaire de connexion standard activé afin que les administrateurs puissent toujours se connecter en cas de problème avec OAuth2.
* Lors de l'utilisation d'Azure avec des utilisateurs existants, configurez `existing_user_verification_order` pour contrôler comment Chamilo associe les utilisateurs entrants aux comptes existants.
* L'attribution de rôle par défaut est étudiant ; utilisez le mappage de groupes pour promouvoir automatiquement les utilisateurs aux rôles d'enseignant ou d'administrateur.