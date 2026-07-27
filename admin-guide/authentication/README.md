# Authentication

Chamilo supports multiple authentication methods, from the built-in username/password system to enterprise single sign-on solutions.

## Configuration file

All external authentication methods are configured in `config/authentication.yaml`. A template is provided at `config/authentication.dist.yaml`. The general structure is:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

After editing the file, clear and warm the cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

External login buttons appear on the login page after the cache is refreshed.

## Supported methods

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook, and generic OAuth2 providers
* **[Azure Entra ID](azure-entra-id.md)** — Detailed Azure/Entra ID setup: app registration, group-based role mapping, certificate authentication, and user/group sync commands
* **[LDAP](ldap.md)** — Authenticate against an LDAP or Active Directory server
* **[CAS](cas.md)** — Central Authentication Service (legacy, not functional in 2.x)
* **[SCIM](scim.md)** — Automated user provisioning from external identity providers
* **[SSO Configuration](sso-configuration.md)** — Troubleshooting and cross-method notes

## Default authentication

By default, Chamilo uses its own internal system — users log in with a username and password stored in the Chamilo database. External methods are additive: the standard login form stays available alongside any configured providers.

## Further reference

For full parameter reference and advanced scenarios, see the [External Authentication configuration wiki page](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).
