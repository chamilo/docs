# Autentisering

Chamilo støtter flere autentiseringsmetoder, fra det innebygde brukernavn/passord-systemet til bedriftsløsninger for enkel pålogging (single sign-on).

## Konfigurasjonsfil

Alle eksterne autentiseringsmetoder konfigureres i `config/authentication.yaml`. En mal er tilgjengelig i `config/authentication.dist.yaml`. Den generelle strukturen er:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Etter at du har redigert filen, tøm og varm opp hurtigbufferen:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Eksterne innloggingsknapper vises på innloggingssiden etter at hurtigbufferen er oppdatert.

## Støttede metoder

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook og generiske OAuth2-leverandører
* **[Azure Entra ID](azure-entra-id.md)** — Detaljert oppsett for Azure/Entra ID: appregistring, gruppebasert rolletilordning, sertifikatautentisering og kommandoer for synkronisering av brukere/grupper
* **[LDAP](ldap.md)** — Autentiser mot en LDAP- eller Active Directory-server
* **[CAS](cas.md)** — Central Authentication Service (eldre, ikke funksjonell i 3.x)
* **[SCIM](scim.md)** — Automatisert brukerprovisjonering fra eksterne identitetsleverandører
* **[SSO-konfigurasjon](sso-configuration.md)** — Feilsøking og merknader på tvers av metoder

## Standard autentisering

Som standard bruker Chamilo sitt eget interne system — brukere logger inn med et brukernavn og passord lagret i Chamilo-databasen. Eksterne metoder er additive: det vanlige innloggingsskjemaet forblir tilgjengelig sammen med eventuelle konfigurerte leverandører.

## Videre referanse

For fullstendig parameterreferanse og avanserte scenarioer, se [wiki-siden for konfigurasjon av ekstern autentisering](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).