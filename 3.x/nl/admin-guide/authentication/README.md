# Authenticatie

Chamilo ondersteunt meerdere authenticatiemethoden, van het ingebouwde gebruikersnaam/wachtwoord-systeem tot enterprise single sign-on-oplossingen.

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

Na het bewerken van het bestand, wis en warm de cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externe inlogknoppen verschijnen op de inlogpagina nadat de cache is vernieuwd.

## Ondersteunde methoden

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook en generieke OAuth2-providers
* **[Azure Entra ID](azure-entra-id.md)** — Gedetailleerde Azure/Entra ID-inrichting: app-registratie, groepsgebaseerde roltoewijzing, certificaatauthenticatie en gebruikers-/groeps-sync-commando's
* **[LDAP](ldap.md)** — Authenticeren tegen een LDAP- of Active Directory-server
* **[CAS](cas.md)** — Central Authentication Service (verouderd, niet functioneel in 3.x)
* **[SCIM](scim.md)** — Geautomatiseerde gebruikersvoorziening vanuit externe identity providers
* **[SSO Configuration](sso-configuration.md)** — Probleemoplossing en notities over methoden heen

## Standaardauthenticatie

Standaard gebruikt Chamilo het eigen interne systeem — gebruikers loggen in met een gebruikersnaam en wachtwoord die in de Chamilo-database zijn opgeslagen. Externe methoden zijn aanvullend: het standaard inlogformulier blijft beschikbaar naast eventueel geconfigureerde providers.

## Verdere referentie

Voor een volledige parameterreferentie en geavanceerde scenario's, zie de [wiki-pagina External Authentication configuration](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).