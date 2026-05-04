# CAS Settings

Legacy CAS (Central Authentication Service) configuration carried over from Chamilo 1.x. See [CAS](../authentication/cas.md) for the current status of the CAS authenticator in Chamilo 2.x.

Access these settings under **Administration > Configuration settings > CAS**. This category contains **7 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `cas_activate`

**Enable CAS authentication**

Enabling CAS authentication will allow users to authenticate with their CAS credentials.<br/>Go to <a href='settings.php?category=CAS'>Plugin</a> to add a configurable 'CAS Login' button for your Chamilo campus. Or you can force CAS authentication by setting cas[force_redirect] in app/config/auth.conf.php.

### `cas_add_user_activate`

**Enable CAS user addition**

Enable CAS user addition. To create the user account from the LDAP directory, the extldap_config and extldap_user_correspondance tables must be filled in in app/config/auth.conf.php

### `cas_port`

**Main CAS server port**

The port on which to connect to the main CAS server

### `cas_protocol`

**Main CAS server protocol**

The protocol with which we connect to the CAS server

### `cas_server`

**Main CAS server**

This is the main CAS server which will be used for the authentication (IP address or hostname)

### `cas_server_uri`

**Main CAS server URI**

The path to the CAS service

### `update_user_info_cas_with_ldap`

**Update CAS-authenticated user account information from LDAP**

Makes sure the user firstname, lastname and email address are the same as current values in the LDAP directory

