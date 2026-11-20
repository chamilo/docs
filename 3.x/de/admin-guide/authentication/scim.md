# SCIM

**SCIM** (System for Cross-domain Identity Management) automatisiert die Benutzerbereitstellung – das Anlegen, Aktualisieren und Deaktivieren von Chamilo-Konten auf Grundlage von Änderungen in Ihrem Identitätsanbieter. Im Gegensatz zu OAuth2 oder LDAP übernimmt SCIM die Bereitstellung, nicht die Anmeldung.

| Szenario | SCIM-Aktion |
|----------|-------------|
| Ein neuer Mitarbeiter tritt ein | Legt ein Chamilo-Konto an |
| Name oder Rolle eines Mitarbeiters ändern sich | Aktualisiert das Chamilo-Konto |
| Ein Mitarbeiter verlässt das Unternehmen | Deaktiviert oder löscht das Chamilo-Konto |

## Konfiguration

### 1. SCIM-Token festlegen

Definieren Sie in Ihrer Datei `.env` (oder `.env.local`) ein sicheres, zufälliges Token:

```
SCIM_TOKEN=your-secure-random-token
```

Dieses Token wird von Ihrem Identitätsanbieter verwendet, um seine Anfragen an die SCIM-Endpunkte von Chamilo zu authentifizieren.

### 2. SCIM in authentication.yaml aktivieren

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

> **Warnung:** Mit `auth_source: platform` können bereitgestellte Benutzer sich auch über das reguläre Anmeldeformular anmelden. Chamilo vergibt ihnen ein zufälliges Passwort, sodass sie es nicht verwenden können, es sei denn, ein Administrator legt eines fest. Vor 3.0.2 war das Passwort fest vorgegeben: siehe [Vorhersagbare Passwörter von SSO- und SCIM-Benutzern](../installation/upgrading.md#predictable-passwords-of-sso-and-scim-users).

Leeren und wärmen Sie den Cache nach der Bearbeitung:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Identitätsanbieter konfigurieren

In Ihrem Identitätsanbieter (Azure AD, Okta usw.):

1. Fügen Sie Chamilo als SCIM-Anwendung hinzu
2. Setzen Sie die SCIM-Basis-URL auf `https://your-chamilo-url/scim/v2/`
3. Geben Sie das Token aus Schritt 1 als Bearer-Token ein
4. Ordnen Sie Anbieterattribute den SCIM-Standardfeldern zu (userName, name.givenName, name.familyName, emails)
5. Aktivieren Sie die automatische Bereitstellung

## SCIM-Endpunkte

Chamilo implementiert SCIM 2.0:

| Endpunkt | Methode | Aktion |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Benutzer auflisten |
| `/scim/v2/Users` | POST | Benutzer anlegen |
| `/scim/v2/Users/{id}` | GET | Benutzer abrufen |
| `/scim/v2/Users/{id}` | PUT | Benutzer ersetzen |
| `/scim/v2/Users/{id}` | PATCH | Benutzer aktualisieren |
| `/scim/v2/Users/{id}` | DELETE | Benutzer entfernen |

## Tipps

* **Mit einer Testgruppe beginnen** – stellen Sie eine kleine Benutzergruppe bereit, bevor Sie SCIM für die gesamte Organisation aktivieren.
* **Mit OAuth2 kombinieren** – eine gängige Einrichtung verwendet Azure AD OAuth2 für die Anmeldung und Azure AD SCIM für die Bereitstellung.
* **Protokolle überwachen** – prüfen Sie sowohl Chamilo (`var/log/`) als auch die Bereitstellungsprotokolle Ihres Identitätsanbieters auf Fehler.