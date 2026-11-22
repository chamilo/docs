# CAS Settings

CAS (Central Authentication Service) authentication is supported again in Chamilo 3.1. See [CAS](../authentication/cas.md) for setup, service registration, account protection and optional authentication policies.

Access these settings under **Administration > Configuration settings > CAS**. This category contains **7 settings**, listed below with their current behaviour.

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `cas_activate`

**Enable CAS authentication**

Enable the CAS sign-in button when the server and portal URL are correctly configured. Optional forced-login and redirect policies are configured in the current `config/authentication.yaml`.

### `cas_add_user_activate`

**Enable CAS user addition**

Use `false` to disable automatic account creation, `platform` to create students from CAS attributes, or `extldap` to use the configured LDAP directory over verified LDAPS. Legacy `true` is treated as `platform`.

### `cas_port`

**Main CAS server port**

The port on which to connect to the main CAS server

### `cas_protocol`

**Main CAS server protocol**

Select `CAS1`, `CAS2` (default) or `CAS3`. TLS is required; SAML 1.1 is not supported.

### `cas_server`

**Main CAS server**

CAS server hostname or IP address, without a scheme, port or path.

### `cas_server_uri`

**Main CAS server URI**

The path to the CAS service, for example `/cas`.

### `update_user_info_cas_with_ldap`

**Update CAS-authenticated user account information from LDAP**

Update the first name, last name and e-mail address from the configured LDAP directory over verified LDAPS. CAS does not synchronize roles or passwords.

