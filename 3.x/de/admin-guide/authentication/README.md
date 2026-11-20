# Authentifizierung

Chamilo unterstützt mehrere Authentifizierungsmethoden, vom integrierten Benutzername-/Passwort-System bis hin zu unternehmensweiten Single-Sign-On-Lösungen.

## Konfigurationsdatei

Alle externen Authentifizierungsmethoden werden in `config/authentication.yaml` konfiguriert. Eine Vorlage befindet sich unter `config/authentication.dist.yaml`. Die allgemeine Struktur lautet:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Nach dem Bearbeiten der Datei den Cache leeren und aufwärmen:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externe Anmeldeschaltflächen erscheinen auf der Anmeldeseite, nachdem der Cache aktualisiert wurde.

## Unterstützte Methoden

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook und generische OAuth2-Anbieter
* **[OAuth 2.1 Authorization Server](oauth-server.md)** — OAuth-Clients, geschützte MCP-Ressourcen, Registrierung und Einwilligung
* **[Azure Entra ID](azure-entra-id.md)** — Detaillierte Einrichtung von Azure/Entra ID: App-Registrierung, gruppenbasierte Rollenzuordnung, Zertifikatsauthentifizierung sowie Befehle zur Benutzer-/Gruppensynchronisierung
* **[LDAP](ldap.md)** — Authentifizierung gegen einen LDAP- oder Active-Directory-Server
* **[CAS](cas.md)** — Central Authentication Service (veraltet, in 3.x nicht funktionsfähig)
* **[SCIM](scim.md)** — Automatisierte Benutzerbereitstellung durch externe Identitätsanbieter
* **[SSO-Konfiguration](sso-configuration.md)** — Fehlerbehebung und methodenübergreifende Hinweise

## Standardauthentifizierung

Standardmäßig verwendet Chamilo sein eigenes internes System — Benutzer melden sich mit einem Benutzernamen und einem Passwort an, die in der Chamilo-Datenbank gespeichert sind. Externe Methoden ergänzen dieses System: Das Standard-Anmeldeformular bleibt neben allen konfigurierten Anbietern verfügbar.

## Weiterführende Informationen

Eine vollständige Parameterreferenz und fortgeschrittene Szenarien finden Sie auf der [Wiki-Seite zur Konfiguration der externen Authentifizierung](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).