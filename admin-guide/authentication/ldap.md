# LDAP

Chamilo può autenticare gli utenti tramite un server LDAP, inclusi Microsoft Active Directory. LDAP viene configurato nel file `config/authentication.yaml`.

## Configurazione

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Accedi con LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind e ricerca

Due approcci per localizzare l'utente nella directory:

**Bind diretto** — costruisce il DN direttamente dal nome utente:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Bind di ricerca** — cerca nella directory con un account di servizio prima, poi esegue il bind come utente trovato:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Per Active Directory, utilizzare `sAMAccountName` come `uid_key` e modificare `query_string` in `(sAMAccountName=%s)`.

### Mappatura degli attributi

Mappa gli attributi LDAP ai campi utente di Chamilo sotto `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # opzionale
          locale: preferredLanguage  # opzionale
```

`firstname`, `lastname` ed `email` sono obbligatori. L'utente viene associato a un account Chamilo esistente tramite email o nome utente; se non viene trovato alcun corrispondenza e `allow_create_new_users` è impostato su true, viene creato un nuovo account.

## Suggerimenti

* **Usa LDAPS in produzione** — cambia `ldap://` in `ldaps://` (porta 636) per connessioni crittografate.
* **Account di servizio** — l'account di bind di ricerca necessita solo di accesso in lettura alle voci utente.
* **Test preliminare** — verifica la stringa di connessione e la query con `ldapsearch` prima di configurare Chamilo.
* **`force_as_login_method: true`** — nasconde altri metodi di accesso e obbliga tutti gli utenti a utilizzare LDAP. Lascia impostato su `false` durante i test per poter accedere come amministratore tramite il modulo standard.

Per un riferimento completo ai parametri, consulta il [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).