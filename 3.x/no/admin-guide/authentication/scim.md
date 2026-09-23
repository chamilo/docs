# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiserer brukerprovisjonering — oppretting, oppdatering og deaktivering av Chamilo-kontoer basert på endringer i identitetsleverandøren din. I motsetning til OAuth2 eller LDAP håndterer SCIM provisjonering, ikke innlogging.

| Scenario | SCIM-handling |
|----------|-------------|
| En ny medarbeider starter | Oppretter en Chamilo-konto |
| En medarbeiders navn eller rolle endres | Oppdaterer Chamilo-kontoen |
| En medarbeider slutter | Deaktiverer eller sletter Chamilo-kontoen |

## Konfigurasjon

### 1. Sett SCIM-tokenet

I filen `.env` (eller `.env.local`) definerer du et sikkert, tilfeldig token:

```
SCIM_TOKEN=your-secure-random-token
```

Dette tokenet brukes av identitetsleverandøren din til å autentisere forespørsler mot Chamilos SCIM-endepunkter.

### 2. Aktiver SCIM i authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Tøm og varm opp hurtigbufferen etter redigering:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Konfigurer identitetsleverandøren

I identitetsleverandøren din (Azure AD, Okta, osv.):

1. Legg til Chamilo som en SCIM-applikasjon
2. Sett SCIM-base-URL til `https://your-chamilo-url/scim/v2/`
3. Angi tokenet fra trinn 1 som bearer-token
4. Tilordne leverandørattributter til SCIM-standardfelt (userName, name.givenName, name.familyName, emails)
5. Aktiver automatisk provisjonering

## SCIM-endepunkter

Chamilo implementerer SCIM 2.0:

| Endepunkt | Metode | Handling |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List brukere |
| `/scim/v2/Users` | POST | Opprett en bruker |
| `/scim/v2/Users/{id}` | GET | Hent en bruker |
| `/scim/v2/Users/{id}` | PUT | Erstatt en bruker |
| `/scim/v2/Users/{id}` | PATCH | Oppdater en bruker |
| `/scim/v2/Users/{id}` | DELETE | Fjern en bruker |

## Tips

* **Start med en testgruppe** — provisjoner et lite sett med brukere før du aktiverer SCIM for hele organisasjonen.
* **Kombiner med OAuth2** — en vanlig oppsett bruker Azure AD OAuth2 for innlogging og Azure AD SCIM for provisjonering.
* **Overvåk logger** — sjekk både Chamilo (`var/log/`) og identitetsleverandørens provisjoneringslogger for feil.