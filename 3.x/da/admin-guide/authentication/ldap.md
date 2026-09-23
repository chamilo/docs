# LDAP

Chamilo kan autentificere brugere mod en LDAP-server, herunder Microsoft Active Directory. LDAP konfigureres i `config/authentication.yaml`.

## Konfiguration

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

### Bind og søgning

To tilgange til at finde brugeren i kataloget:

**Direct bind** — konstruerer DN direkte ud fra brugernavnet:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — søger i kataloget med en servicekonto først og binder derefter som den fundne bruger:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Til Active Directory skal du bruge `sAMAccountName` som `uid_key` og justere `query_string` til `(sAMAccountName=%s)`.

### Attributtilknytning

Tilknyt LDAP-attributter til Chamilo-brugerfelter under `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` og `email` er påkrævede. Brugeren matches med en eksisterende Chamilo-konto via e-mail eller brugernavn; hvis der ikke findes et match, og `allow_create_new_users` er true, oprettes en ny konto.

## Tips

* **Brug LDAPS i produktion** — skift `ldap://` til `ldaps://` (port 636) for krypterede forbindelser.
* **Servicekonto** — search bind-kontoen behøver kun læseadgang til brugerposter.
* **Test først** — verificér din forbindelsesstreng og forespørgsel med `ldapsearch`, før du konfigurerer Chamilo.
* **`force_as_login_method: true`** — skjuler andre loginmetoder og tvinger alle brugere gennem LDAP. Lad den være `false` under test, så du stadig kan logge ind som administrator via den almindelige formular.

Den fulde parameterreference findes på [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).