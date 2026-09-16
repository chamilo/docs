# Authentification

Chamilo prend en charge plusieurs méthodes d’authentification, du système intégré identifiant/mot de passe aux solutions d’authentification unique d’entreprise.

## Fichier de configuration

Toutes les méthodes d’authentification externe sont configurées dans `config/authentication.yaml`. Un modèle est fourni dans `config/authentication.dist.yaml`. La structure générale est :

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Après modification du fichier, videz et préchauffez le cache :

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Les boutons de connexion externe apparaissent sur la page de connexion une fois le cache actualisé.

## Méthodes prises en charge

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook et fournisseurs OAuth2 génériques
* **[Azure Entra ID](azure-entra-id.md)** — Configuration détaillée Azure/Entra ID : enregistrement d’application, mapping des rôles par groupes, authentification par certificat et commandes de synchronisation utilisateurs/groupes
* **[LDAP](ldap.md)** — Authentification auprès d’un serveur LDAP ou Active Directory
* **[CAS](cas.md)** — Central Authentication Service (héritage, non fonctionnel en 3.x)
* **[SCIM](scim.md)** — Provisionnement automatisé des utilisateurs depuis des fournisseurs d’identité externes
* **[Configuration SSO](sso-configuration.md)** — Dépannage et notes transversales aux méthodes

## Authentification par défaut

Par défaut, Chamilo utilise son propre système interne — les utilisateurs se connectent avec un identifiant et un mot de passe stockés dans la base de données Chamilo. Les méthodes externes sont additives : le formulaire de connexion standard reste disponible aux côtés des fournisseurs configurés.

## Référence complémentaire

Pour la référence complète des paramètres et les scénarios avancés, consultez la [page wiki de configuration de l’authentification externe](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).