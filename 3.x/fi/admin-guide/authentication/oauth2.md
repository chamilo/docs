# OAuth2

OAuth2-todennus määritetään tiedostossa `config/authentication.yaml`. Chamilo sisältää valmiin tuen Azure AD:lle, Keycloakille, Facebookille ja mille tahansa geneeriselle OAuth2-yhteensopivalle palveluntarjoajalle.

## Vaihe 1 — Rekisteröi Chamilo identiteettipalveluntarjoajassasi

Luo sovellus palveluntarjoajan hallintapaneelissa ja aseta **uudelleenohjaus-URI** (redirect URI) arvoon:

```
https://your-chamilo-url/connect/<provider>/check
```

Missä `<provider>` on `azure`, `keycloak`, `facebook` tai geneeriselle palveluntarjoajalle antamasi nimi. Kirjaa muistiin **Client ID** ja **Client Secret**.

## Vaihe 2 — Määritä authentication.yaml

Ota palveluntarjoaja käyttöön ja anna sen tunnisteet. Kaikilla palveluntarjoajilla on nämä yhteiset avaimet:

| Avain | Kuvaus |
|-----|-------------|
| `enabled` | `true` aktivoi |
| `title` | Kirjautumispainikkeessa näytettävä otsikko |
| `client_id` | Identiteettipalveluntarjoajalta |
| `client_secret` | Identiteettipalveluntarjoajalta |
| `allow_create_new_users` | Luo Chamilo-tili automaattisesti ensimmäisellä kirjautumisella |
| `allow_update_user_info` | Synkronoi käyttäjätiedot jokaisella kirjautumisella |
| `force_as_login_method` | Piilota muut menetelmät ja näytä vain tämän palveluntarjoajan painike |
| `force_redirect` | Ohjaa anonyymi vierailija automaattisesti tähän palveluntarjoajaan ilman painikkeen klikkausta |
| `skip_force_redirect_in` | Luettelo URL-fragmenteista, joihin `force_redirect` ei vaikuta |

### Azure AD (Microsoft Entra ID)

Azurella on oma erillinen sivu, joka kattaa sovelluksen rekisteröinnin, ryhmäpohjaisen roolikartoituksen, varmenteella todennuksen ja tilien provisioinnin synkronointikomennot — katso [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Geneerinen OAuth2

Käytä tätä Googlelle, GitLabille tai mille tahansa OAuth2-yhteensopivalle palveluntarjoajalle:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Kenttäkartoitus (miten palveluntarjoajan attribuutit kartoitetaan Chamilon kenttiin `firstname`, `lastname`, `email` jne.) ja roolikartoitus ovat myös määritettävissä. Katso [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) kartoitusavainten täydellisestä luettelosta.

## Valinnainen — Ohjaa jokainen vierailija automaattisesti palveluntarjoajaan

Kaksi avainta ohjaa, kuinka suuren osan kirjautumissivusta vierailija vielä näkee. Ne ovat toisistaan riippumattomia ja vastaavat eri tarpeisiin:

| Avain | Mitä vierailija näkee |
|-----|-----------------------|
| `force_as_login_method: true` | Kirjautumissivu, joka on kutistettu tämän palveluntarjoajan painikkeeseen. Vierailija klikkaa sitä. |
| `force_redirect: true` | Ei kirjautumissivua lainkaan. Selain siirtyy palveluntarjoajaan itsestään. |

Käytä `force_redirect`-asetusta, kun identiteettipalveluntarjoaja omistaa kaikki tilit eikä paikallisella kirjautumislomakkeella ole tarkoitusta:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Vain yksi palveluntarjoaja voi pakottaa uudelleenohjauksen. Jos useampi ilmoittaa sen, ensimmäinen käytössä oleva voittaa. LDAP ei voi ilmoittaa sitä, koska se todentaa paikallisen lomakkeen kautta.

Uudelleenohjaus koskee sivua, jonka selain näyttää, eikä mitään muuta. Nämä pyynnöt pysyvät aina paikallaan:

* API-, SCIM-, MCP- tai XHR-kutsu, joka ei voi seurata selaimelle tarkoitettua kättelyä.
* Kuva, tyylitiedosto tai tiedoston lataus.
* Mikä tahansa kirjoitus (POST, PUT, DELETE), koska selain toistaa uudelleenohjatun kirjoituksen GET-pyyntönä ja pudottaa rungon.
* Palveluntarjoajan kättely itse (`/connect/...`) ja `/logout`, jotka muuten muodostaisivat päättymättömän silmukan.
* Vierailija, jolla on jo istunto, mukaan lukien julkisen kurssin anonyymi tili.

Lisää URL-fragmentti `skip_force_redirect_in`-luetteloon jokaista julkista aluetta varten, jonka on pysyttävä avoimena, esimerkiksi kurssikatalogia.

### Pakotie

Saavuttamaton tarjoaja lukitsisi kaikki tilit ulos, myös paikallisen ylläpitäjän. Lisää mihin tahansa URL-osoitteeseen `skipForcedRedirect=1` päästäksesi silti paikalliseen kirjautumislomakkeeseen:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Valinta säilyy istunnossa, joten seuraavat sivut näyttävät edelleen lomakkeen. Se myös kumoaa `force_as_login_method`-asetuksen kyseiselle istunnolle, jolloin kaikki kirjautumistavat näkyvät taas sivulla. Palauttaaksesi alustan tarjoajalle käytä `?skipForcedRedirect=0` tai sulje selainistunto.

Parametri kuuluu vain `force_redirect`-asetukseen. Kun yksikään tarjoaja ei määritä kyseistä avainta, parametrilla ei ole mitään vaikutusta, ja `force_as_login_method` säilyttää yhden painikkeensa.

Säilytä tämä URL-osoite palautusmuistiinpanoissasi. Testaa se ennen kuin otat `force_redirect`-asetuksen käyttöön tuotannossa.

## Vaihe 3 — Tyhjennä välimuisti ja testaa

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Kirjaudu ulos Chamilosta. Määritetyn tarjoajan painikkeen pitäisi näkyä kirjautumissivulla. Testaa erillisellä tilillä ennen käyttöönottoa kaikille käyttäjille.

## Vinkkejä

* Pidä vakio kirjautumislomake käytössä, jotta ylläpitäjät voivat aina kirjautua, jos OAuth2:ssa on ongelmia. Jos asetat `force_redirect`-asetuksen, opettele sen sijaan `?skipForcedRedirect=1`-URL: se on ainoa tapa palata kyseiseen lomakkeeseen.
* Roolin oletusmääritys on opiskelija; käytä ryhmäkartoitusta (Azure) nostaaksesi käyttäjiä automaattisesti opettaja- tai ylläpitäjärooleihin — katso [Azure Entra ID](azure-entra-id.md) saadaksesi lisätietoja tästä sekä saapuvien käyttäjien yhdistämisestä olemassa oleviin tileihin.