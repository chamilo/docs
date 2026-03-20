# LDAP

Chamilo can authenticate users against an **LDAP** (Lightweight Directory Access Protocol) server, including **Microsoft Active Directory**. This allows users to log in with their organizational credentials.

## How LDAP Authentication Works

1. A user enters their username and password on the Chamilo login page
2. Chamilo sends the credentials to the LDAP server for verification
3. If the LDAP server confirms the credentials are valid, the user is logged in
4. User profile data (name, email) can be synchronized from LDAP

## Configuration

LDAP authentication is configured through the platform settings and/or environment variables:

### Basic Settings

| Setting | Description |
|---------|-------------|
| **LDAP host** | The address of your LDAP server (e.g., `ldap.yourorg.com`) |
| **LDAP port** | The port (389 for LDAP, 636 for LDAPS) |
| **Use SSL/TLS** | Enable encrypted connection to the LDAP server |
| **Base DN** | The base distinguished name for user searches (e.g., `dc=yourorg,dc=com`) |
| **Bind DN** | The account used to search the LDAP directory (e.g., `cn=admin,dc=yourorg,dc=com`) |
| **Bind password** | The password for the bind account |
| **User filter** | The LDAP filter to find users (e.g., `(uid=%username%)` or `(sAMAccountName=%username%)` for AD) |

### Attribute Mapping

Map LDAP attributes to Chamilo user fields:

| Chamilo field | Common LDAP attribute | AD equivalent |
|---------------|----------------------|---------------|
| Username | `uid` | `sAMAccountName` |
| Email | `mail` | `mail` |
| First name | `givenName` | `givenName` |
| Last name | `sn` | `sn` |

### Auto-Registration

When a user authenticates via LDAP for the first time and does not have a Chamilo account, the system can automatically create one using the LDAP attributes.

## Tips

* **Use LDAPS** — Always use SSL/TLS encrypted connections (port 636) in production
* **Use a service account** — The bind account should have read-only access to user entries
* **Test with ldapsearch** — Before configuring Chamilo, verify your LDAP settings work using the `ldapsearch` command-line tool
* **Sync regularly** — Consider setting up periodic synchronization to keep Chamilo user data up to date with LDAP changes
