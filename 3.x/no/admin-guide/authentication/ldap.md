# LDAP

Chamilo kan autentisere brukere mot en LDAP-server, inkludert Microsoft Active Directory. LDAP konfigureres i `config/authentication.yaml`.

## Konfigurasjon

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

### Bind og søk

To tilnærminger for å finne brukeren i katalogen:

**Direkte bind** — konstruerer DN direkte fra brukernavnet:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Søkebind** — søker i katalogen med en tjenestekonto først, og binder deretter som den funne brukeren:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

For Active Directory, bruk `sAMAccountName` som `uid_key` og juster `query_string` til `(sAMAccountName=%s)`.

### Attributtkobling

Koble LDAP-attributter til Chamilo-brukerfelt under `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` og `email` er påkrevd. Brukeren matches mot en eksisterende Chamilo-konto via e-post eller brukernavn; hvis ingen treff finnes og `allow_create_new_users` er true, opprettes en ny konto.

## Tips

* **Bruk LDAPS i produksjon** — bytt `ldap://` til `ldaps://` (port 636) for krypterte tilkoblinger.
* **Tjenestekonto** — søkebind-kontoen trenger kun lesetilgang til brukeroppføringer.
* **Test først** — verifiser tilkoblingsstrengen og spørringen med `ldapsearch` før du konfigurerer Chamilo.
* **`force_as_login_method: true`** — skjuler andre innloggingsmetoder og tvinger alle brukere gjennom LDAP. La den stå som `false` under testing, slik at du fortsatt kan logge inn som administrator via standardskjemaet.

For den fullstendige parameterreferansen, se [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).