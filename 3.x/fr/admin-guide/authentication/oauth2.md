# OAuth2

L’authentification OAuth2 se configure dans `config/authentication.yaml`. Chamilo prend nativement en charge Azure AD, Keycloak, Facebook, ainsi que tout fournisseur générique conforme à OAuth2.

## Étape 1 — Enregistrer Chamilo dans votre fournisseur d’identité

Créez une application dans le panneau d’administration de votre fournisseur et définissez l’**URI de redirection** sur :

```
https://your-chamilo-url/connect/<provider>/check
```

Où `<provider>` vaut `azure`, `keycloak`, `facebook`, ou le nom que vous donnez à un fournisseur générique. Notez l’**ID client** et le **secret client**.

## Étape 2 — Configurer authentication.yaml

Activez le fournisseur et renseignez ses identifiants. Tous les fournisseurs partagent ces clés communes :

| Clé | Description |
|-----|-------------|
| `enabled` | `true` pour activer |
| `title` | Libellé affiché sur le bouton de connexion |
| `client_id` | Fourni par votre fournisseur d’identité |
| `client_secret` | Fourni par votre fournisseur d’identité |
| `allow_create_new_users` | Créer automatiquement un compte Chamilo à la première connexion |
| `allow_update_user_info` | Synchroniser les données utilisateur à chaque connexion |
| `force_as_login_method` | Masquer les autres méthodes et n’afficher que le bouton de ce fournisseur |
| `force_redirect` | Envoyer automatiquement un visiteur anonyme vers ce fournisseur, sans bouton à cliquer |
| `skip_force_redirect_in` | Liste des fragments d’URL que `force_redirect` laisse inchangés |

### Azure AD (Microsoft Entra ID)

Azure dispose d’une page dédiée couvrant l’enregistrement de l’application, le mappage des rôles basé sur les groupes, l’authentification par certificat et les commandes de synchronisation du provisionnement des comptes — voir [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 générique

Utilisez cette configuration pour Google, GitLab ou tout fournisseur conforme à OAuth2 :

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Le mappage des champs (comment les attributs du fournisseur correspondent à `firstname`, `lastname`, `email`, etc. de Chamilo) et le mappage des rôles sont également configurables. Consultez le [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) pour la liste complète des clés de mappage.

## Optionnel — Envoyer automatiquement chaque visiteur vers le fournisseur

Deux clés contrôlent la part de la page de connexion encore visible pour le visiteur. Elles sont indépendantes et répondent à des besoins distincts :

| Clé | Ce que voit le visiteur |
|-----|-----------------------|
| `force_as_login_method: true` | La page de connexion, réduite au bouton de ce fournisseur. Le visiteur clique dessus. |
| `force_redirect: true` | Aucune page de connexion. Le navigateur se dirige de lui-même vers le fournisseur. |

Utilisez `force_redirect` lorsque le fournisseur d’identité possède tous les comptes et que le formulaire de connexion local n’a plus d’utilité :

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Un seul fournisseur peut forcer la redirection. Si plusieurs la déclarent, le premier activé l’emporte. LDAP ne peut pas la déclarer, car il s’authentifie via le formulaire local.

La redirection s’applique à une page affichée par le navigateur, et à rien d’autre. Ces requêtes restent toujours à leur place :

* Un appel API, SCIM, MCP ou XHR, qui ne peut pas suivre une poignée de main destinée à un navigateur.
* Une image, une feuille de style ou un téléchargement de fichier.
* Toute écriture (POST, PUT, DELETE), car un navigateur rejoue une écriture redirigée en GET et abandonne le corps.
* La poignée de main du fournisseur elle-même (`/connect/...`) et `/logout`, qui formeraient autrement une boucle infinie.
* Un visiteur qui a déjà une session, y compris le compte anonyme d’un cours public.

Ajoutez un fragment d’URL à `skip_force_redirect_in` pour chaque zone publique qui doit rester accessible, par exemple un catalogue de cours.

### La trappe de secours

Un fournisseur inaccessible verrouillerait tous les comptes, y compris celui de l’administrateur local. Ajoutez `skipForcedRedirect=1` à n’importe quelle URL pour atteindre tout de même le formulaire de connexion local :

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Le choix reste dans la session, de sorte que les pages suivantes continuent d’afficher le formulaire. Cela annule également `force_as_login_method` pour cette session, ce qui replace toutes les méthodes de connexion sur la page. Pour rendre la plateforme au fournisseur, utilisez `?skipForcedRedirect=0`, ou fermez la session du navigateur.

Le paramètre appartient uniquement à `force_redirect`. Tant qu’aucun fournisseur ne déclare cette clé, le paramètre ne fait rien du tout, et `force_as_login_method` conserve son bouton unique.

Conservez cette URL avec vos notes de récupération. Testez-la avant d’activer `force_redirect` en production.

## Étape 3 — Vider le cache et tester

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Déconnectez-vous de Chamilo. Le bouton du fournisseur configuré doit apparaître sur la page de connexion. Testez avec un compte dédié avant de déployer auprès de tous les utilisateurs.

## Conseils

* Conservez le formulaire de connexion standard activé afin que les administrateurs puissent toujours se connecter en cas de problème avec OAuth2. Si vous définissez `force_redirect`, apprenez plutôt l’URL `?skipForcedRedirect=1` : c’est le seul moyen de revenir à ce formulaire.
* L’attribution des rôles est par défaut celle d’étudiant ; utilisez le mappage de groupes (Azure) pour promouvoir automatiquement les utilisateurs vers les rôles enseignant ou administrateur — voir [Azure Entra ID](azure-entra-id.md) pour les détails à ce sujet et pour faire correspondre les utilisateurs entrants aux comptes existants.