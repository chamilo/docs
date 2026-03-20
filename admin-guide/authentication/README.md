# Authentication

Chamilo supports multiple authentication methods, from the built-in username/password system to enterprise single sign-on solutions. This section covers how to configure external authentication providers.

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook, and generic OAuth2 providers
* **[LDAP](ldap.md)** — Authenticate against an LDAP or Active Directory server
* **[CAS](cas.md)** — Central Authentication Service
* **[SCIM](scim.md)** — Automatic user provisioning from external identity providers
* **[SSO Configuration](sso-configuration.md)** — General single sign-on settings and troubleshooting

## Default Authentication

By default, Chamilo uses its own internal authentication system. Users log in with a username and password stored in the Chamilo database.

## External Authentication

When you configure an external provider, Chamilo delegates the login process to that provider. The benefits include:

* **Single sign-on** — Users log in once and access Chamilo without entering a separate password
* **Centralized user management** — User accounts are managed in your organization's identity system
* **Security** — Password policies and multi-factor authentication are handled by the identity provider

You can enable multiple authentication methods simultaneously. Users will see buttons for each configured provider on the login page alongside the standard login form.
