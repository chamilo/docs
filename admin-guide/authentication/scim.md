# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiseert gebruikersvoorziening — het aanmaken, bijwerken en deactiveren van Chamilo-accounts op basis van wijzigingen in uw identiteitsprovider. In tegenstelling tot OAuth2 of LDAP, behandelt SCIM de voorziening, niet de inlogprocedure.

| Scenario | SCIM-actie |
|----------|------------|
| Een nieuwe medewerker treedt in dienst | Maakt een Chamilo-account aan |
| De naam of rol van een medewerker wijzigt | Werkt het Chamilo-account bij |
| Een medewerker verlaat de organisatie | Deactiveert of verwijdert het Chamilo-account |

## Configuratie

### 1. Stel de SCIM-token in

Definieer een veilige willekeurige token in uw `.env` (of `.env.local`) bestand:

```
SCIM_TOKEN=your-secure-random-token
```

Deze token wordt gebruikt door uw identiteitsprovider om zijn verzoeken aan de SCIM-eindpunten van Chamilo te authenticeren.

### 2. Schakel SCIM in authentication.yaml in

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Wis en verwarm de cache na het bewerken:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configureer uw identiteitsprovider

In uw identiteitsprovider (Azure AD, Okta, enz.):

1. Voeg Chamilo toe als een SCIM-applicatie
2. Stel de SCIM-basis-URL in op `https://your-chamilo-url/scim/v2/`
3. Voer de token uit stap 1 in als de bearer-token
4. Koppel providerattributen aan standaard SCIM-velden (userName, name.givenName, name.familyName, emails)
5. Schakel automatische voorziening in

## SCIM-eindpunten

Chamilo implementeert SCIM 2.0:

| Eindpunt | Methode | Actie |
|----------|---------|-------|
| `/scim/v2/Users` | GET | Lijst gebruikers |
| `/scim/v2/Users` | POST | Maak een gebruiker aan |
| `/scim/v2/Users/{id}` | GET | Haal een gebruiker op |
| `/scim/v2/Users/{id}` | PUT | Vervang een gebruiker |
| `/scim/v2/Users/{id}` | PATCH | Werk een gebruiker bij |
| `/scim/v2/Users/{id}` | DELETE | Verwijder een gebruiker |

## Tips

* **Begin met een testgroep** — voorzie een kleine set gebruikers voordat u SCIM voor de hele organisatie inschakelt.
* **Combineer met OAuth2** — een veelvoorkomende opstelling gebruikt Azure AD OAuth2 voor inloggen en Azure AD SCIM voor voorziening.
* **Controleer logboeken** — bekijk zowel de Chamilo-logboeken (`var/log/`) als de voorzieningslogboeken van uw identiteitsprovider op fouten.