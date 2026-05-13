# LDAP

Chamilo peut authentifier les utilisateurs via un serveur LDAP, y compris Microsoft Active Directory. LDAP est configuré dans `config/authentication.yaml`.

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Se connecter avec LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Liaison et recherche

Deux approches pour localiser l'utilisateur dans l'annuaire :

**Liaison directe** — construit le DN directement à partir du nom d'utilisateur :

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Liaison par recherche** — recherche d'abord dans l'annuaire avec un compte de service, puis se lie en tant qu'utilisateur trouvé :

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Pour Active Directory, utilisez `sAMAccountName` comme `uid_key` et ajustez `query_string` à `(sAMAccountName=%s)`.

### Correspondance des attributs

Associez les attributs LDAP aux champs utilisateur de Chamilo sous `data_correspondence` :

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optionnel
          locale: preferredLanguage  # optionnel
```

`firstname`, `lastname` et `email` sont obligatoires. L'utilisateur est associé à un compte Chamilo existant par email ou nom d'utilisateur ; si aucune correspondance n'est trouvée et que `allow_create_new_users` est défini sur true, un nouveau compte est créé.

## Conseils

* **Utilisez LDAPS en production** — remplacez `ldap://` par `ldaps://` (port 636) pour des connexions chiffrées.
* **Compte de service** — le compte de liaison par recherche n'a besoin que d'un accès en lecture aux entrées utilisateur.
* **Testez d'abord** — vérifiez votre chaîne de connexion et votre requête avec `ldapsearch` avant de configurer Chamilo.
* **`force_as_login_method: true`** — masque les autres méthodes de connexion et force tous les utilisateurs à passer par LDAP. Laissez-le à `false` pendant les tests afin de pouvoir toujours vous connecter en tant qu'administrateur via le formulaire standard.

Pour la référence complète des paramètres, consultez le [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).