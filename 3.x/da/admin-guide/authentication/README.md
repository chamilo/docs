# Autentificering

Chamilo understøtter flere autentificeringsmetoder, fra det indbyggede brugernavn/adgangskode-system til virksomhedsløsninger til single sign-on.

## Konfigurationsfil

Alle eksterne autentificeringsmetoder konfigureres i `config/authentication.yaml`. En skabelon findes i `config/authentication.dist.yaml`. Den overordnede struktur er:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Efter redigering af filen skal cachen tømmes og opvarmes:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Knapper til eksternt login vises på login-siden, når cachen er opdateret.

## Understøttede metoder

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook og generiske OAuth2-udbydere
* **[Azure Entra ID](azure-entra-id.md)** — Detaljeret opsætning af Azure/Entra ID: appregistring, gruppebaseret rolletilknytning, certifikatautentificering og kommandoer til synkronisering af brugere/grupper
* **[LDAP](ldap.md)** — Autentificering mod en LDAP- eller Active Directory-server
* **[CAS](cas.md)** — Central Authentication Service (ældre, ikke funktionel i 3.x)
* **[SCIM](scim.md)** — Automatiseret brugerprovisionering fra eksterne identitetsudbydere
* **[SSO-konfiguration](sso-configuration.md)** — Fejlfinding og noter på tværs af metoder

## Standardautentificering

Som standard bruger Chamilo sit eget interne system — brugere logger ind med et brugernavn og en adgangskode, der er gemt i Chamilo-databasen. Eksterne metoder er additive: den almindelige loginformular forbliver tilgængelig sammen med eventuelle konfigurerede udbydere.

## Yderligere reference

For fuld parameterreference og avancerede scenarier, se [wiki-siden om konfiguration af ekstern autentificering](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).