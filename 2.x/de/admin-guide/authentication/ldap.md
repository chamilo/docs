# LDAP

Chamilo kann Benutzer über einen LDAP-Server authentifizieren, einschließlich Microsoft Active Directory. LDAP wird in `config/authentication.yaml` konfiguriert.

## Konfiguration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Mit LDAP anmelden"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind und Suche

Zwei Ansätze zur Lokalisierung des Benutzers im Verzeichnis:

**Direkter Bind** — erstellt den DN direkt aus dem Benutzernamen:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Such-Bind** — durchsucht das Verzeichnis zunächst mit einem Dienstkonto und bindet dann als gefundener Benutzer:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Für Active Directory verwenden Sie `sAMAccountName` als `uid_key` und passen Sie `query_string` auf `(sAMAccountName=%s)` an.

### Attributzuordnung

Ordnen Sie LDAP-Attribute den Benutzerfeldern von Chamilo unter `data_correspondence` zu:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` und `email` sind erforderlich. Der Benutzer wird mit einem bestehenden Chamilo-Konto anhand der E-Mail-Adresse oder des Benutzernamens abgeglichen; falls keine Übereinstimmung gefunden wird und `allow_create_new_users` auf true gesetzt ist, wird ein neues Konto erstellt.

## Tipps

* **Verwenden Sie LDAPS in der Produktion** — wechseln Sie von `ldap://` zu `ldaps://` (Port 636) für verschlüsselte Verbindungen.
* **Dienstkonto** — das Such-Bind-Konto benötigt nur Lesezugriff auf Benutzereinträge.
* **Zuerst testen** — überprüfen Sie Ihre Verbindungszeichenfolge und Abfrage mit `ldapsearch`, bevor Sie Chamilo konfigurieren.
* **`force_as_login_method: true`** — blendet andere Anmeldemethoden aus und zwingt alle Benutzer zur Nutzung von LDAP. Lassen Sie es während der Testphase auf `false`, damit Sie sich weiterhin als Administrator über das Standardformular anmelden können.

Für die vollständige Parameterreferenz siehe das [Wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).