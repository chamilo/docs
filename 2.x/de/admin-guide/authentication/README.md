# Authentifizierung

Chamilo unterstützt verschiedene Authentifizierungsmethoden, vom integrierten Benutzername-/Passwort-System bis hin zu Single-Sign-On-Lösungen für Unternehmen.

## Konfigurationsdatei

Alle externen Authentifizierungsmethoden werden in `config/authentication.yaml` konfiguriert. Eine Vorlage ist unter `config/authentication.dist.yaml` verfügbar. Die allgemeine Struktur lautet:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Nach der Bearbeitung der Datei, leeren und aktualisieren Sie den Cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Externe Login-Schaltflächen erscheinen auf der Anmeldeseite, nachdem der Cache aktualisiert wurde.

## Unterstützte Methoden

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook und generische OAuth2-Anbieter
* **[LDAP](ldap.md)** — Authentifizierung über einen LDAP- oder Active Directory-Server
* **[CAS](cas.md)** — Central Authentication Service (veraltet, nicht funktionsfähig in 2.x)
* **[SCIM](scim.md)** — Automatisierte Benutzerbereitstellung von externen Identitätsanbietern
* **[SSO-Konfiguration](sso-configuration.md)** — Fehlerbehebung und Hinweise zu verschiedenen Methoden

## Standard-Authentifizierung

Standardmäßig verwendet Chamilo sein eigenes internes System — Benutzer melden sich mit einem Benutzernamen und Passwort an, die in der Chamilo-Datenbank gespeichert sind. Externe Methoden sind ergänzend: Das standardmäßige Anmeldeformular bleibt neben den konfigurierten Anbietern verfügbar.

## Weitere Informationen

Für eine vollständige Parameterreferenz und fortgeschrittene Szenarien besuchen Sie die [Wiki-Seite zur Konfiguration der externen Authentifizierung](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).