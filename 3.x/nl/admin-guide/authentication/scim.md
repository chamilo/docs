# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiseert gebruikersprovisioning: het aanmaken, bijwerken en deactiveren van Chamilo-accounts op basis van wijzigingen in uw identiteitsprovider. In tegenstelling tot OAuth2 of LDAP verzorgt SCIM provisioning, niet het inloggen.

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

Dit token wordt door uw identiteitsprovider gebruikt om verzoeken aan de SCIM-eindpunten van Chamilo te authenticeren.

### 2. Schakel SCIM in in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

> **Waarschuwing:** Met `auth_source: platform` kunnen geprovisioneerde gebruikers ook inloggen via het gewone aanmeldformulier. Chamilo geeft hen een willekeurig wachtwoord, zodat zij dit niet kunnen gebruiken tenzij een beheerder er een instelt. Vóór 3.0.2 was het wachtwoord vast: zie [Voorspelbare wachtwoorden van SSO- en SCIM-gebruikers](../installation/upgrading.md#predictable-passwords-of-sso-and-scim-users).

Wis en warm de cache op na het bewerken:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configureer uw identiteitsprovider

In uw identiteitsprovider (Azure AD, Okta, enz.):

1. Voeg Chamilo toe als SCIM-toepassing
2. Stel de SCIM-basis-URL in op `https://your-chamilo-url/scim/v2/`
3. Voer het token uit stap 1 in als bearer-token
4. Koppel providerkenmerken aan standaard SCIM-velden (userName, name.givenName, name.familyName, emails)
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

* **Begin met een testgroep** — provisioneer een kleine groep gebruikers voordat u SCIM voor de hele organisatie inschakelt.
* **Combineer met OAuth2** — een veelgebruikte opzet gebruikt Azure AD OAuth2 voor het inloggen en Azure AD SCIM voor provisioning.
* **Bewaak logboeken** — controleer zowel Chamilo (`var/log/`) als de provisioninglogboeken van uw identiteitsprovider op fouten.