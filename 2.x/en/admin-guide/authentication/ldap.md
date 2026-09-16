# LDAP

Chamilo can authenticate users against an LDAP server, including Microsoft Active Directory. LDAP is configured in `config/authentication.yaml`.

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind and search

Two approaches for locating the user in the directory:

**Direct bind** — constructs the DN from the username directly:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — searches the directory with a service account first, then binds as the found user:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

For Active Directory, use `sAMAccountName` as `uid_key` and adjust `query_string` to `(sAMAccountName=%s)`.

### Attribute mapping

Map LDAP attributes to Chamilo user fields under `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname`, and `email` are required. The user is matched to an existing Chamilo account by email or username; if no match is found and `allow_create_new_users` is true, a new account is created.

## Tips

* **Use LDAPS in production** — switch `ldap://` to `ldaps://` (port 636) for encrypted connections.
* **Service account** — the search bind account needs only read access to user entries.
* **Test first** — verify your connection string and query with `ldapsearch` before configuring Chamilo.
* **`force_as_login_method: true`** — hides other login methods and forces all users through LDAP. Leave it `false` while testing so you can still log in as an admin via the standard form.

For the full parameter reference, see the [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).
