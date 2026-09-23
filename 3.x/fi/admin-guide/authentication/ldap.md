# LDAP

Chamilo voi autentikoida käyttäjiä LDAP-palvelinta vastaan, mukaan lukien Microsoft Active Directory. LDAP määritetään tiedostossa `config/authentication.yaml`.

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

Kaksi tapaa käyttäjän paikantamiseen hakemistosta:

**Direct bind** — muodostaa DN:n suoraan käyttäjänimestä:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — hakee hakemistosta ensin palvelutilillä ja sitoo sen jälkeen löydettynä käyttäjänä:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Active Directoryssa käytä `sAMAccountName`-arvoa `uid_key`-avaimena ja muuta `query_string` muotoon `(sAMAccountName=%s)`.

### Attribute mapping

Kartoita LDAP-attribuutit Chamilo-käyttäjäkenttiin kohdassa `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` ja `email` ovat pakollisia. Käyttäjä yhdistetään olemassa olevaan Chamilo-tiliin sähköpostin tai käyttäjänimen perusteella; jos vastaavuutta ei löydy ja `allow_create_new_users` on true, luodaan uusi tili.

## Tips

* **Käytä LDAPS:ää tuotannossa** — vaihda `ldap://` muotoon `ldaps://` (portti 636) salattuja yhteyksiä varten.
* **Palvelutili** — search bind -tilillä tarvitaan vain lukuoikeus käyttäjämerkintöihin.
* **Testaa ensin** — varmista yhteysmerkkijono ja kysely komennolla `ldapsearch` ennen Chamilon määritystä.
* **`force_as_login_method: true`** — piilottaa muut kirjautumistavat ja ohjaa kaikki käyttäjät LDAP:n kautta. Jätä arvoksi `false` testauksen ajaksi, jotta voit edelleen kirjautua ylläpitäjänä tavallisella lomakkeella.

Täydellinen parametriopas on [wikissä](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).