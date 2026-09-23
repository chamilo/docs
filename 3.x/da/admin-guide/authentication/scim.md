# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiserer brugerprovisionering — oprettelse, opdatering og deaktivering af Chamilo-konti baseret på ændringer i din identitetsudbyder. I modsætning til OAuth2 eller LDAP håndterer SCIM provisionering, ikke login.

| Scenarie | SCIM-handling |
|----------|-------------|
| En ny medarbejder starter | Opretter en Chamilo-konto |
| En medarbejders navn eller rolle ændres | Opdaterer Chamilo-kontoen |
| En medarbejder fratræder | Deaktiverer eller sletter Chamilo-kontoen |

## Konfiguration

### 1. Angiv SCIM-tokenet

I din `.env`-fil (eller `.env.local`) skal du definere et sikkert, tilfældigt token:

```
SCIM_TOKEN=your-secure-random-token
```

Dette token bruges af din identitetsudbyder til at autentificere dens anmodninger til Chamilos SCIM-endepunkter.

### 2. Aktivér SCIM i authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Ryd og varm cachen op efter redigering:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Konfigurér din identitetsudbyder

I din identitetsudbyder (Azure AD, Okta osv.):

1. Tilføj Chamilo som en SCIM-applikation
2. Angiv SCIM-basis-URL'en til `https://your-chamilo-url/scim/v2/`
3. Indtast tokenet fra trin 1 som bearer-token
4. Map udbyderattributter til SCIM-standardfelter (userName, name.givenName, name.familyName, emails)
5. Aktivér automatisk provisionering

## SCIM-endepunkter

Chamilo implementerer SCIM 2.0:

| Endepunkt | Metode | Handling |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List brugere |
| `/scim/v2/Users` | POST | Opret en bruger |
| `/scim/v2/Users/{id}` | GET | Hent en bruger |
| `/scim/v2/Users/{id}` | PUT | Erstat en bruger |
| `/scim/v2/Users/{id}` | PATCH | Opdater en bruger |
| `/scim/v2/Users/{id}` | DELETE | Fjern en bruger |

## Tips

* **Start med en testgruppe** — provisionér et lille sæt brugere, før du aktiverer SCIM for hele organisationen.
* **Kombinér med OAuth2** — en almindelig opsætning bruger Azure AD OAuth2 til login og Azure AD SCIM til provisionering.
* **Overvåg logfiler** — tjek både Chamilo (`var/log/`) og din identitetsudbyders provisioneringslogfiler for fejl.