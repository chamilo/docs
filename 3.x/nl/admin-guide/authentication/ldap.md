# LDAP

Chamilo kan gebruikers authenticeren tegen een LDAP-server, inclusief Microsoft Active Directory. LDAP wordt geconfigureerd in `config/authentication.yaml`.

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

Twee benaderingen om de gebruiker in de directory te lokaliseren:

**Direct bind** — construeert de DN rechtstreeks vanuit de gebruikersnaam:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — doorzoekt eerst de directory met een serviceaccount en bindt vervolgens als de gevonden gebruiker:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Voor Active Directory gebruikt u `sAMAccountName` als `uid_key` en past u `query_string` aan naar `(sAMAccountName=%s)`.

### Attribute mapping

Koppel LDAP-attributen aan Chamilo-gebruikersvelden onder `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` en `email` zijn verplicht. De gebruiker wordt gekoppeld aan een bestaand Chamilo-account op e-mailadres of gebruikersnaam; als er geen overeenkomst wordt gevonden en `allow_create_new_users` true is, wordt een nieuw account aangemaakt.

## Tips

* **Gebruik LDAPS in productie** — wijzig `ldap://` naar `ldaps://` (poort 636) voor versleutelde verbindingen.
* **Serviceaccount** — het search-bind-account heeft alleen leestoegang tot gebruikersvermeldingen nodig.
* **Eerst testen** — verifieer uw connection string en query met `ldapsearch` voordat u Chamilo configureert.
* **`force_as_login_method: true`** — verbergt andere inlogmethoden en dwingt alle gebruikers via LDAP. Laat dit `false` tijdens het testen, zodat u nog steeds als beheerder kunt inloggen via het standaardformulier.

Voor de volledige parameterreferentie, zie de [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).