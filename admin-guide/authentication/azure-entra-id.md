# Azure Entra ID

Microsoft a renommé Azure Active Directory (Azure AD) en **Microsoft Entra ID** en 2023 — il s’agit du même service, et le code ainsi que la configuration de Chamilo y font toujours référence sous le nom `azure`. Cette page couvre les aspects spécifiques à Azure de l’intégration : enregistrement de l’application, mappage des rôles basé sur les groupes, authentification par certificat et les commandes dédiées de synchronisation des utilisateurs/groupes. Pour les clés de configuration partagées par tous les fournisseurs (`enabled`, `title`, `allow_create_new_users`, etc.) et la structure générale de `authentication.yaml`, voir [OAuth2](oauth2.md).

## Enregistrer Chamilo dans Microsoft Entra ID

1. Dans le centre d’administration Entra, créez un **App registration** pour Chamilo.
2. Définissez l’URI de redirection (type de plateforme **Web**) sur :

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Notez l’**Application (client) ID** et le **Directory (tenant) ID** — vous aurez besoin des deux.
4. Sous **Certificates & secrets**, créez soit un secret client, soit chargez un certificat (voir [Authentification par certificat](#certificate-authentication) ci-dessous).
5. Sous **API permissions**, ajoutez les autorisations Microsoft Graph ci-dessous et accordez le consentement administrateur.

| Permission | Type | Nécessaire pour |
|------------|------|-------------|
| `User.Read` | Delegated | Connexion de base |
| `GroupMember.Read.All` | Delegated | Mappage des rôles basé sur les groupes à la connexion |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` ou `Group.Read.All` | Application | `app:azure-sync-users` et `app:azure-sync-usergroups` |

Les autorisations d’application nécessitent le consentement administrateur et ne sont utilisées que par les commandes de synchronisation en console (via le grant `client_credentials`), jamais par la connexion interactive d’un utilisateur.

## Configuration de base

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

### Multi-tenant vs. mono-tenant

La valeur de `tenant` doit correspondre à la façon dont les « types de comptes pris en charge » de l’enregistrement d’application ont été définis :

* Un GUID de tenant spécifique — mono-tenant, seuls les comptes de cette organisation peuvent se connecter
* `organizations` — n’importe quel tenant Entra ID
* `common` — n’importe quel tenant Entra ID plus les comptes Microsoft personnels

## Attributs utilisateur requis

Chaque utilisateur Entra ID qui doit se connecter à Chamilo doit avoir `mail` et `mailNickname` renseignés — la connexion génère une erreur si l’un des deux est vide (ainsi que l’identifiant d’objet Entra immuable, qui est toujours présent). Le mappage des champs de Microsoft Graph vers Chamilo est **fixe** pour Azure (contrairement au fournisseur OAuth2 générique, qui permet de configurer le mappage des champs) :

| Champ Chamilo | Source Microsoft Graph |
|---------------|------------------------|
| Prénom | `givenName` |
| Nom | `surname` |
| E-mail | `mail` |
| Nom d’utilisateur | `userPrincipalName` |
| Téléphone | `telephoneNumber`, puis `businessPhones[0]`, puis `mobilePhone` |
| Actif | `accountEnabled` |
| Langue de l’interface | `preferredLanguage` (mis en correspondance avec une langue Chamilo installée, avec repli sur la langue par défaut de la plateforme) |

Trois champs supplémentaires sont également écrits à chaque connexion réussie : `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) et `azure_uid` (= l’identifiant d’objet Entra). Ils sous-tendent la logique de correspondance des comptes ci-dessous.

## Faire correspondre les connexions aux comptes Chamilo existants

Définissez `existing_user_verification_order` sur une liste de chiffres `1`–`3` séparés par des virgules pour contrôler la façon dont une connexion Entra ID entrante est mise en correspondance avec un compte Chamilo existant :

| Valeur | Correspondance avec |
|-------|------------------|
| `1` | Champ extra `organisationemail` == `mail` Entra |
| `2` | Champ extra `azure_id` == `mailNickname` Entra |
| `3` | Champ extra `azure_uid` == identifiant d’objet Entra |

Les positions sont essayées dans l’ordre indiqué ; la première correspondance active (non supprimée logiquement) l’emporte. Une valeur invalide ou vide revient par défaut à `1,2,3`. Si aucune des positions configurées ne correspond — ce qui est toujours le cas la toute première fois qu’un utilisateur donné se connecte, puisque ces champs extra ne sont renseignés *qu’après* une connexion réussie — Chamilo se rabat sur la correspondance du champ `email` de Chamilo avec `mail` Entra, puis de `username` avec `userPrincipalName`, indépendamment de ce que vous avez configuré.

## Correspondance des rôles basée sur les groupes

Faites correspondre les groupes de sécurité Entra ID aux rôles Chamilo à l’aide de leurs identifiants d’objet (GUID) :

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

À chaque connexion, Chamilo interroge Microsoft Graph `/v1.0/me/memberOf` avec le jeton d’accès de l’utilisateur et compare les groupes renvoyés à ces trois identifiants, dans l’ordre **admin → session_admin → teacher**. La première correspondance l’emporte — un utilisateur présent à la fois dans les groupes admin et teacher n’est promu qu’administrateur. Quiconque n’appartient à aucun groupe configuré conserve son rôle existant (ou le rôle étudiant par défaut, lors de la première connexion). Cela nécessite l’autorisation déléguée `GroupMember.Read.All` indiquée plus haut.

## Authentification par certificat

En alternative à `client_secret`, authentifiez-vous avec un certificat :

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Téléversez le certificat public correspondant sous **Certificates & secrets** dans l’enregistrement de l’application, et copiez son empreinte (affichée en hexadécimal dans le portail) dans `client_certificate_thumbprint`. Lorsque les deux clés sont définies, Chamilo construit une assertion client JWT signée (RS256) au lieu d’envoyer `client_secret` — cela s’applique aussi bien aux connexions interactives qu’à l’authentification application seule des commandes de synchronisation.

## Synchronisation des utilisateurs et des groupes depuis Entra ID

Deux commandes de console provisionnent et maintiennent les comptes Chamilo directement depuis Entra ID, indépendamment de toute connexion interactive. Les deux s’authentifient en mode application seule (`client_credentials`) : elles ont donc besoin des autorisations Graph **application** listées plus haut, et sont destinées à être planifiées dans cron plutôt qu’exécutées manuellement.

### `app:azure-sync-users`

Récupère les utilisateurs depuis Microsoft Graph et provisionne/met à jour les comptes Chamilo correspondants en utilisant le même mappage de champs et la même logique de correspondance de comptes qu’une connexion interactive.

* Par défaut, elle récupère la liste complète des utilisateurs (`/v1.0/users`, paginée). Définissez `script_users_delta: true` pour utiliser `/v1.0/users/delta` à la place — Chamilo persiste le lien delta entre les exécutions, de sorte que les exécutions suivantes ne récupèrent que ce qui a changé.
* Définissez `deactivate_nonexisting_users: true` pour désactiver les comptes Chamilo (dont la source d’authentification est Azure) qui n’apparaissent plus dans l’extraction Entra ID. Cela ne fonctionne qu’en mode extraction complète — le mode delta ne renvoie jamais la liste complète des utilisateurs, donc ce paramètre est ignoré lorsque `script_users_delta` est activé.
* La correspondance des rôles par groupe (ci-dessus) est réappliquée pour chaque utilisateur synchronisé lors de cette exécution, et pas seulement à la connexion.

### `app:azure-sync-usergroups`

Récupère les groupes Entra ID et les reflète sous forme de classes Chamilo (`Usergroup`).

* Récupère la liste complète des groupes (`/v1.0/groups`) ou, avec `script_usergroups_delta: true`, le point de terminaison delta, avec son propre lien delta suivi séparément.
* `group_filter_regex` restreint les groupes synchronisés, en les faisant correspondre au nom d’affichage du groupe.
* **Chaque exécution vide d’abord tous les membres existants de la classe Chamilo correspondante**, puis réinscrit les membres que Graph renvoie actuellement. Les membres ne sont associés qu’aux utilisateurs Chamilo *existants*, selon la même [logique de correspondance des comptes](#matching-logins-to-existing-chamilo-accounts) que pour la connexion — cette commande ne crée jamais de nouveaux comptes utilisateur, et tout membre de groupe qu’elle ne peut pas associer à un compte Chamilo existant est ignoré silencieusement.

## Limitations connues

* **Pas de déconnexion unique.** Se déconnecter de Chamilo ne déconnecte pas l’utilisateur d’Entra ID ni des autres applications connectées. Une clé de configuration `force_logout` existe dans `authentication.yaml` mais n’est pas implémentée actuellement — considérez-la comme réservée, non fonctionnelle.
* **La réinitialisation du mot de passe n’a pas de sens pour les comptes Azure.** L’authentification passant entièrement par Entra ID, Chamilo ne conserve pas de mot de passe local utilisable pour ces comptes.

## Dépannage

* Les échecs de connexion (attributs requis manquants, erreurs de l’API Graph) s’affichent à l’utilisateur sous forme de message flash sur la page de connexion.
* Les commandes de synchronisation consignent les problèmes par enregistrement avec des avertissements et poursuivent le traitement du reste du lot plutôt que d’abandonner à la première erreur — consultez la sortie console de la commande (ou l’endroit où votre cron la capture) après chaque exécution.
* Conservez le formulaire de connexion Chamilo standard activé afin que les administrateurs aient toujours un moyen d’entrer si l’intégration Entra ID se comporte mal.