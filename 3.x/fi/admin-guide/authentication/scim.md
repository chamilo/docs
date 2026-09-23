# SCIM

**SCIM** (System for Cross-domain Identity Management) automatisoi käyttäjien provisionoinnin — Chamilo-tilien luomisen, päivittämisen ja deaktivoinnin identiteetintarjoajassasi tapahtuvien muutosten perusteella. Toisin kuin OAuth2 tai LDAP, SCIM hoitaa provisionoinnin, ei kirjautumista.

| Tilanne | SCIM-toiminto |
|----------|-------------|
| Uusi työntekijä liittyy | Luo Chamilo-tilin |
| Työntekijän nimi tai rooli muuttuu | Päivittää Chamilo-tilin |
| Työntekijä lähtee | Deaktivoi tai poistaa Chamilo-tilin |

## Määritys

### 1. Aseta SCIM-tunnus

Määritä `.env`-tiedostossasi (tai `.env.local`) turvallinen satunnainen tunnus:

```
SCIM_TOKEN=your-secure-random-token
```

Identiteetintarjoajasi käyttää tätä tunnusta autentikoimaan pyyntönsä Chamilon SCIM-päätepisteisiin.

### 2. Ota SCIM käyttöön tiedostossa authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Tyhjennä ja lämmitä välimuisti muokkauksen jälkeen:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Määritä identiteetintarjoajasi

Identiteetintarjoajassasi (Azure AD, Okta jne.):

1. Lisää Chamilo SCIM-sovelluksena
2. Aseta SCIM-perus-URL-osoitteeksi `https://your-chamilo-url/scim/v2/`
3. Syötä vaiheen 1 tunnus bearer-tunnuksena
4. Kartoita tarjoajan attribuutit SCIM-standardikenttiin (userName, name.givenName, name.familyName, emails)
5. Ota automaattinen provisionointi käyttöön

## SCIM-päätepisteet

Chamilo toteuttaa SCIM 2.0:n:

| Päätepiste | Metodi | Toiminto |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Listaa käyttäjät |
| `/scim/v2/Users` | POST | Luo käyttäjä |
| `/scim/v2/Users/{id}` | GET | Hae käyttäjä |
| `/scim/v2/Users/{id}` | PUT | Korvaa käyttäjä |
| `/scim/v2/Users/{id}` | PATCH | Päivitä käyttäjä |
| `/scim/v2/Users/{id}` | DELETE | Poista käyttäjä |

## Vinkkejä

* **Aloita testiryhmällä** — provisionoi pieni joukko käyttäjiä ennen kuin otat SCIM:n käyttöön koko organisaatiolle.
* **Yhdistä OAuth2:een** — yleinen asetus käyttää Azure AD OAuth2:ta kirjautumiseen ja Azure AD SCIM:ää provisionointiin.
* **Seuraa lokeja** — tarkista sekä Chamilon (`var/log/`) että identiteetintarjoajasi provisionointilokit virheiden varalta.