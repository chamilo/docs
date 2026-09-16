# Authentification

Chamilo prend en charge plusieurs méthodes d'authentification, allant du système intégré de nom d'utilisateur/mot de passe aux solutions d'authentification unique (SSO) pour les entreprises.

## Fichier de configuration

Toutes les méthodes d'authentification externes sont configurées dans `config/authentication.yaml`. Un modèle est fourni à `config/authentication.dist.yaml`. La structure générale est la suivante :

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Après avoir modifié le fichier, videz et réchauffez le cache :

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Les boutons de connexion externes apparaissent sur la page de connexion après que le cache a été actualisé.

## Méthodes prises en charge

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook et fournisseurs OAuth2 génériques
* **[LDAP](ldap.md)** — Authentification via un serveur LDAP ou Active Directory
* **[CAS](cas.md)** — Service d'authentification centralisée (obsolète, non fonctionnel dans la version 2.x)
* **[SCIM](scim.md)** — Provisionnement automatisé des utilisateurs à partir de fournisseurs d'identité externes
* **[Configuration SSO](sso-configuration.md)** — Notes de dépannage et informations sur les méthodes croisées

## Authentification par défaut

Par défaut, Chamilo utilise son propre système interne — les utilisateurs se connectent avec un nom d'utilisateur et un mot de passe stockés dans la base de données de Chamilo. Les méthodes externes sont additives : le formulaire de connexion standard reste disponible aux côtés des fournisseurs configurés.

## Références supplémentaires

Pour une référence complète des paramètres et des scénarios avancés, consultez la [page wiki de configuration de l'authentification externe](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).