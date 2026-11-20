# Authenticatie

Chamilo ondersteunt meerdere authenticatiemethoden, van het ingebouwde gebruikersnaam-/wachtwoordsysteem tot enterprise-single-sign-on-oplossingen.

## Configuratiebestand

Alle externe authenticatiemethoden worden geconfigureerd in `config/authentication.yaml`. Een sjabloon is beschikbaar op `config/authentication.dist.yaml`. De algemene structuur is:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Na het bewerken van het bestand leegt en warmt u de cache op:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externe aanmeldknoppen verschijnen op de aanmeldpagina nadat de cache is vernieuwd.

## Ondersteunde methoden

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook en generieke OAuth2-providers
* **[OAuth 2.1-autorisatieserver](oauth-server.md)** — OAuth-clients, door MCP beveiligde resources, registratie en toestemming
* **[Azure Entra ID](azure-entra-id.md)** — Gedetailleerde Azure/Entra ID-configuratie: app-registratie, groepsgebaseerde roltoewijzing, certificaatauthenticatie en synchronisatieopdrachten voor gebruikers/groepen
* **[LDAP](ldap.md)** — Authenticeren tegen een LDAP- of Active Directory-server
* **[CAS](cas.md)** — Central Authentication Service (verouderd, niet functioneel in 3.x)
* **[SCIM](scim.md)** — Geautomatiseerde gebruikersprovisioning vanuit externe identiteitsproviders
* **[SSO-configuratie](sso-configuration.md)** — Probleemoplossing en notities over meerdere methoden

## Standaardauthenticatie

Standaard gebruikt Chamilo zijn eigen interne systeem — gebruikers melden zich aan met een gebruikersnaam en wachtwoord die in de Chamilo-database zijn opgeslagen. Externe methoden zijn aanvullend: het standaardaanmeldformulier blijft beschikbaar naast eventueel geconfigureerde providers.

## Verdere referentie

Voor een volledige parameterreferentie en geavanceerde scenario's, zie de [wikipagina over configuratie van externe authenticatie](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).