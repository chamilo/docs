# LDAP

Chamilo kan autentisera användare mot en LDAP-server, inklusive Microsoft Active Directory. LDAP konfigureras i `config/authentication.yaml`.

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

Två tillvägagångssätt för att hitta användaren i katalogen:

**Direct bind** — konstruerar DN direkt från användarnamnet:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — söker i katalogen med ett tjänstekonto först och binder därefter som den hittade användaren:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

För Active Directory, använd `sAMAccountName` som `uid_key` och justera `query_string` till `(sAMAccountName=%s)`.

### Attribute mapping

Mappa LDAP-attribut till Chamilo-användarfält under `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` och `email` är obligatoriska. Användaren matchas mot ett befintligt Chamilo-konto via e-postadress eller användarnamn; om ingen matchning hittas och `allow_create_new_users` är true skapas ett nytt konto.

## Tips

* **Använd LDAPS i produktion** — byt `ldap://` till `ldaps://` (port 636) för krypterade anslutningar.
* **Tjänstekonto** — kontot för search bind behöver endast läsbehörighet till användarposter.
* **Testa först** — verifiera anslutningssträngen och frågan med `ldapsearch` innan du konfigurerar Chamilo.
* **`force_as_login_method: true`** — döljer andra inloggningsmetoder och tvingar alla användare genom LDAP. Lämna värdet `false` under testning så att du fortfarande kan logga in som administratör via det vanliga formuläret.

För den fullständiga parameterreferensen, se [wikin](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).