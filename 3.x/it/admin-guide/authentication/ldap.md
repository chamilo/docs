# LDAP

Chamilo può autenticare gli utenti rispetto a un server LDAP, incluso Microsoft Active Directory. LDAP è configurato in `config/authentication.yaml`.

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

Due approcci per localizzare l'utente nella directory:

**Direct bind** — costruisce il DN direttamente dal nome utente:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — cerca prima nella directory con un account di servizio, quindi effettua il bind come utente trovato:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Per Active Directory, usare `sAMAccountName` come `uid_key` e adattare `query_string` a `(sAMAccountName=%s)`.

### Attribute mapping

Mappare gli attributi LDAP sui campi utente di Chamilo sotto `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` ed `email` sono obbligatori. L'utente viene associato a un account Chamilo esistente tramite email o nome utente; se non viene trovata alcuna corrispondenza e `allow_create_new_users` è true, viene creato un nuovo account.

## Tips

* **Usare LDAPS in produzione** — passare da `ldap://` a `ldaps://` (porta 636) per connessioni cifrate.
* **Account di servizio** — l'account per il search bind necessita solo di accesso in lettura alle voci utente.
* **Testare prima** — verificare la connection string e la query con `ldapsearch` prima di configurare Chamilo.
* **`force_as_login_method: true`** — nasconde gli altri metodi di accesso e obbliga tutti gli utenti a passare da LDAP. Lasciarlo `false` durante i test in modo da poter ancora accedere come amministratore tramite il modulo standard.

Per il riferimento completo dei parametri, consultare il [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).