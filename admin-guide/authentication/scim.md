# SCIM

**SCIM** (System for Cross-domain Identity Management) automatisiert die Benutzerbereitstellung – das Erstellen, Aktualisieren und Deaktivieren von Chamilo-Konten basierend auf Änderungen in Ihrem Identitätsanbieter. Im Gegensatz zu OAuth2 oder LDAP übernimmt SCIM die Bereitstellung, nicht die Anmeldung.

| Szenario | SCIM-Aktion |
|----------|-------------|
| Ein neuer Mitarbeiter tritt ein | Erstellt ein Chamilo-Konto |
| Name oder Rolle eines Mitarbeiters ändert sich | Aktualisiert das Chamilo-Konto |
| Ein Mitarbeiter verlässt das Unternehmen | Deaktiviert oder löscht das Chamilo-Konto |

## Konfiguration

### 1. SCIM-Token festlegen

Definieren Sie in Ihrer `.env`-Datei (oder `.env.local`) ein sicheres, zufälliges Token:

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

Leeren und erwärmen Sie den Cache nach der Bearbeitung:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Identitätsanbieter konfigurieren

In Ihrem Identitätsanbieter (Azure AD, Okta, etc.):

1. Fügen Sie Chamilo als SCIM-Anwendung hinzu
2. Setzen Sie die SCIM-Basis-URL auf `https://your-chamilo-url/scim/v2/`
3. Geben Sie das Token aus Schritt 1 als Bearer-Token ein
4. Ordnen Sie die Anbieterattribute den SCIM-Standardfeldern zu (userName, name.givenName, name.familyName, emails)
5. Aktivieren Sie die automatische Bereitstellung

## SCIM-Endpunkte

Chamilo implementiert SCIM 2.0:

| Endpunkt | Methode | Aktion |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Benutzer auflisten |
| `/scim/v2/Users` | POST | Benutzer erstellen |
| `/scim/v2/Users/{id}` | GET | Benutzer abrufen |
| `/scim/v2/Users/{id}` | PUT | Benutzer ersetzen |
| `/scim/v2/Users/{id}` | PATCH | Benutzer aktualisieren |
| `/scim/v2/Users/{id}` | DELETE | Benutzer entfernen |

## Tipps

* **Beginnen Sie mit einer Testgruppe** – stellen Sie zunächst eine kleine Gruppe von Benutzern bereit, bevor Sie SCIM für die gesamte Organisation aktivieren.
* **Kombinieren Sie mit OAuth2** – eine gängige Konfiguration verwendet Azure AD OAuth2 für die Anmeldung und Azure AD SCIM für die Bereitstellung.
* **Überwachen Sie die Logs** – überprüfen Sie sowohl die Chamilo-Logs (`var/log/`) als auch die Bereitstellungslogs Ihres Identitätsanbieters auf Fehler.