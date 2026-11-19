# Authentification

Chamilo prend en charge plusieurs méthodes d'authentification, du système intégré nom d'utilisateur/mot de passe aux solutions d'authentification unique d'entreprise.

## Fichier de configuration

Toutes les méthodes d'authentification externes sont configurées dans `config/authentication.yaml`. Un modèle est fourni dans `config/authentication.dist.yaml`. La structure générale est la suivante :

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Après avoir modifié le fichier, videz et préchauffez le cache :

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Les boutons de connexion externe apparaissent sur la page de connexion une fois le cache actualisé.

## Méthodes prises en charge

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook et fournisseurs OAuth2 génériques
* **[Serveur d'autorisation OAuth 2.1](oauth-server.md)** — clients OAuth, ressources protégées MCP, inscription et consentement
* **[Azure Entra ID](azure-entra-id.md)** — Configuration détaillée d'Azure/Entra ID : inscription d'application, mappage des rôles basé sur les groupes, authentification par certificat et commandes de synchronisation des utilisateurs/groupes
* **[LDAP](ldap.md)** — Authentification auprès d'un serveur LDAP ou Active Directory
* **[CAS](cas.md)** — Central Authentication Service (hérité, non fonctionnel dans la version 3.x)
* **[SCIM](scim.md)** — Approvisionnement automatisé des utilisateurs à partir de fournisseurs d'identité externes
* **[Configuration SSO](sso-configuration.md)** — Dépannage et notes transversales aux méthodes

## Authentification par défaut

Par défaut, Chamilo utilise son propre système interne : les utilisateurs se connectent avec un nom d'utilisateur et un mot de passe stockés dans la base de données de Chamilo. Les méthodes externes sont additives : le formulaire de connexion standard reste disponible en parallèle de tout fournisseur configuré.

## Référence complémentaire

Pour la référence complète des paramètres et les scénarios avancés, consultez la [page wiki de configuration de l'authentification externe](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).