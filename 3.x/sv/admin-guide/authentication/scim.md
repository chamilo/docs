# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiserar användarprovisionering — skapande, uppdatering och inaktivering av Chamilo-konton baserat på ändringar i din identitetsleverantör. Till skillnad från OAuth2 eller LDAP hanterar SCIM provisionering, inte inloggning.

| Scenario | SCIM-åtgärd |
|----------|-------------|
| En ny medarbetare börjar | Skapar ett Chamilo-konto |
| En medarbetares namn eller roll ändras | Uppdaterar Chamilo-kontot |
| En medarbetare slutar | Inaktiverar eller tar bort Chamilo-kontot |

## Konfiguration

### 1. Ange SCIM-token

I din `.env`-fil (eller `.env.local`), definiera en säker slumpmässig token:

```
SCIM_TOKEN=your-secure-random-token
```

Denna token används av din identitetsleverantör för att autentisera sina begäranden mot Chamilos SCIM-ändpunkter.

### 2. Aktivera SCIM i authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Rensa och värm cachen efter redigering:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Konfigurera din identitetsleverantör

I din identitetsleverantör (Azure AD, Okta, etc.):

1. Lägg till Chamilo som en SCIM-applikation
2. Ange SCIM-bas-URL till `https://your-chamilo-url/scim/v2/`
3. Ange token från steg 1 som bearer-token
4. Mappa leverantörsattribut till SCIM-standardfält (userName, name.givenName, name.familyName, emails)
5. Aktivera automatisk provisionering

## SCIM-ändpunkter

Chamilo implementerar SCIM 2.0:

| Ändpunkt | Metod | Åtgärd |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Lista användare |
| `/scim/v2/Users` | POST | Skapa en användare |
| `/scim/v2/Users/{id}` | GET | Hämta en användare |
| `/scim/v2/Users/{id}` | PUT | Ersätt en användare |
| `/scim/v2/Users/{id}` | PATCH | Uppdatera en användare |
| `/scim/v2/Users/{id}` | DELETE | Ta bort en användare |

## Tips

* **Börja med en testgrupp** — provisionera en liten uppsättning användare innan du aktiverar SCIM för hela organisationen.
* **Kombinera med OAuth2** — en vanlig konfiguration använder Azure AD OAuth2 för inloggning och Azure AD SCIM för provisionering.
* **Övervaka loggar** — kontrollera både Chamilo (`var/log/`) och identitetsleverantörens provisioneringsloggar efter fel.