# Authentifizierung

Chamilo unterstützt mehrere Authentifizierungsmethoden, vom integrierten Benutzername-/Passwort-System bis hin zu unternehmensweiten Single-Sign-On-Lösungen.

## Konfigurationsdatei

Alle externen Authentifizierungsmethoden werden in `config/authentication.yaml` konfiguriert. Eine Vorlage liegt unter `config/authentication.dist.yaml`. Die allgemeine Struktur lautet:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Nach dem Bearbeiten der Datei Cache leeren und vorwärmen:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externe Anmelde-Schaltflächen erscheinen auf der Anmeldeseite, nachdem der Cache aktualisiert wurde.

## Unterstützte Methoden

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook und generische OAuth2-Anbieter
* **[Azure Entra ID](azure-entra-id.md)** — Detaillierte Azure-/Entra-ID-Einrichtung: App-Registrierung, gruppenbasierte Rollenzuordnung, Zertifikatsauthentifizierung und Benutzer-/Gruppensynchronisationsbefehle
* **[LDAP](ldap.md)** — Authentifizierung gegenüber einem LDAP- oder Active-Directory-Server
* **[CAS](cas.md)** — Central Authentication Service (veraltet, in 3.x nicht funktionsfähig)
* **[SCIM](scim.md)** — Automatisierte Benutzerbereitstellung durch externe Identitätsanbieter
* **[SSO-Konfiguration](sso-configuration.md)** — Fehlerbehebung und Hinweise über Methoden hinweg

## Standardauthentifizierung

Standardmäßig verwendet Chamilo sein eigenes internes System — Benutzer melden sich mit einem Benutzernamen und einem Passwort an, die in der Chamilo-Datenbank gespeichert sind. Externe Methoden sind additiv: Das Standard-Anmeldeformular bleibt neben allen konfigurierten Anbietern verfügbar.

## Weitere Referenz

Für die vollständige Parameterreferenz und fortgeschrittene Szenarien siehe die [Wiki-Seite zur Konfiguration der externen Authentifizierung](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).