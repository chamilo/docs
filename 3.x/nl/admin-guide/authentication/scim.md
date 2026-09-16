# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiseert gebruikersprovisioning — het aanmaken, bijwerken en deactiveren van Chamilo-accounts op basis van wijzigingen in uw identity provider. In tegenstelling tot OAuth2 of LDAP verzorgt SCIM de provisioning, niet het inloggen.

| Scenario | SCIM-actie |
|----------|-------------|
| Een nieuwe medewerker treedt in dienst | Maakt een Chamilo-account aan |
| De naam of rol van een medewerker wijzigt | Werkt het Chamilo-account bij |
| Een medewerker vertrekt | Deactiveert of verwijdert het Chamilo-account |

## Configuratie

### 1. Stel het SCIM-token in

Definieer in uw bestand `.env` (of `.env.local`) een veilig willekeurig token:

```
SCIM_TOKEN=your-secure-random-token
```

Dit token wordt door uw identity provider gebruikt om verzoeken naar de SCIM-eindpunten van Chamilo te authenticeren.

### 2. Schakel SCIM in in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Wis en warm de cache op na het bewerken:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configureer uw identity provider

In uw identity provider (Azure AD, Okta, enz.):

1. Voeg Chamilo toe als SCIM-toepassing
2. Stel de SCIM-basis-URL in op `https://your-chamilo-url/scim/v2/`
3. Voer het token uit stap 1 in als bearer token
4. Koppel providerattributen aan SCIM-standaardvelden (userName, name.givenName, name.familyName, emails)
5. Schakel automatische provisioning in

## SCIM-eindpunten

Chamilo implementeert SCIM 2.0:

| Eindpunt | Methode | Actie |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Gebruikers weergeven |
| `/scim/v2/Users` | POST | Een gebruiker aanmaken |
| `/scim/v2/Users/{id}` | GET | Een gebruiker ophalen |
| `/scim/v2/Users/{id}` | PUT | Een gebruiker vervangen |
| `/scim/v2/Users/{id}` | PATCH | Een gebruiker bijwerken |
| `/scim/v2/Users/{id}` | DELETE | Een gebruiker verwijderen |

## Tips

* **Begin met een testgroep** — voorzie eerst een kleine set gebruikers voordat u SCIM voor de hele organisatie inschakelt.
* **Combineer met OAuth2** — een veelvoorkomende opzet gebruikt Azure AD OAuth2 voor inloggen en Azure AD SCIM voor provisioning.
* **Monitor logs** — controleer zowel Chamilo (`var/log/`) als de provisioninglogs van uw identity provider op fouten.