# CAS

> **Status in Chamilo 2.x.** CAS configuration entries (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) still exist in the platform settings as a legacy carry-over from Chamilo 1.x, and CAS still appears as a selectable authentication source on the user form — but there is no CAS authenticator wired into the Chamilo 2.x security pipeline. Logging in through CAS does **not** currently work out of the box. If you need SSO on Chamilo 2.x, use [OAuth2](oauth2.md) (Azure / Keycloak / Generic) or [LDAP](ldap.md) instead.

## What CAS would do (1.x behaviour)

CAS (Central Authentication Service) is a single sign-on protocol commonly used in universities and research institutions. In Chamilo 1.x, clicking "Log in with CAS" would redirect the user to a CAS server, validate the returned ticket, and create or match a local account from CAS attributes.

## Migration note

If you are upgrading a Chamilo 1.x portal that used CAS, plan to re-implement that login flow on top of OAuth2 or LDAP for the time being, until the CAS authenticator is restored in a future 2.x release.
