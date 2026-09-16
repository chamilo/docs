# LDAP

Chamilo kann Benutzer gegen einen LDAP-Server authentifizieren, einschließlich Microsoft Active Directory. LDAP wird in `config/authentication.yaml` konfiguriert.

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

Zwei Ansätze, um den Benutzer im Verzeichnis zu finden:

**Direct bind** — konstruiert den DN direkt aus dem Benutzernamen:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — durchsucht das Verzeichnis zuerst mit einem Dienstkonto und bindet anschließend als der gefundene Benutzer:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Für Active Directory verwenden Sie `sAMAccountName` als `uid_key` und passen Sie `query_string` auf `(sAMAccountName=%s)` an.

### Attribute mapping

Ordnen Sie LDAP-Attribute den Chamilo-Benutzerfeldern unter `data_correspondence` zu:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` und `email` sind erforderlich. Der Benutzer wird anhand von E-Mail oder Benutzername einem bestehenden Chamilo-Konto zugeordnet; wird keine Übereinstimmung gefunden und ist `allow_create_new_users` wahr, wird ein neues Konto angelegt.

## Tips

* **Use LDAPS in production** — wechseln Sie `ldap://` zu `ldaps://` (Port 636) für verschlüsselte Verbindungen.
* **Service account** — das Konto für den Search Bind benötigt nur Lesezugriff auf Benutzereinträge.
* **Test first** — überprüfen Sie Verbindungszeichenfolge und Abfrage mit `ldapsearch`, bevor Sie Chamilo konfigurieren.
* **`force_as_login_method: true`** — blendet andere Anmeldemethoden aus und zwingt alle Benutzer über LDAP. Lassen Sie den Wert während des Tests auf `false`, damit Sie sich weiterhin als Administrator über das Standardformular anmelden können.

Die vollständige Parameterreferenz finden Sie im [Wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).