# Autentisering

Chamilo stöder flera autentiseringsmetoder, från det inbyggda användarnamn/lösenord-systemet till företagsmässiga lösningar för enkel inloggning.

## Konfigurationsfil

Alla externa autentiseringsmetoder konfigureras i `config/authentication.yaml`. En mall tillhandahålls i `config/authentication.dist.yaml`. Den allmänna strukturen är:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Efter att du har redigerat filen, rensa och värm cachen:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externa inloggningsknappar visas på inloggningssidan efter att cachen har uppdaterats.

## Stödda metoder

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook och generiska OAuth2-leverantörer
* **[Azure Entra ID](azure-entra-id.md)** — Detaljerad konfiguration av Azure/Entra ID: appregistrering, grupbaserad rollmappning, certifikatautentisering och kommandon för synkronisering av användare/grupper
* **[LDAP](ldap.md)** — Autentisera mot en LDAP- eller Active Directory-server
* **[CAS](cas.md)** — Central Authentication Service (äldre, fungerar inte i 3.x)
* **[SCIM](scim.md)** — Automatiserad användarprovisionering från externa identitetsleverantörer
* **[SSO-konfiguration](sso-configuration.md)** — Felsökning och anmärkningar som gäller flera metoder

## Standardautentisering

Som standard använder Chamilo sitt eget interna system — användare loggar in med ett användarnamn och lösenord som lagras i Chamilo-databasen. Externa metoder är additiva: det vanliga inloggningsformuläret förblir tillgängligt tillsammans med eventuella konfigurerade leverantörer.

## Ytterligare referens

För fullständig parameterreferens och avancerade scenarier, se [wikisidan för konfiguration av extern autentisering](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).