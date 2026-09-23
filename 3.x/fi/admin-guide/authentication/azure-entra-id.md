# Azure Entra ID

Microsoft uudelleenbrändäsi Azure Active Directoryn (Azure AD) nimeksi **Microsoft Entra ID** vuonna 2023 — kyseessä on sama palvelu, ja Chamilon koodi sekä määritykset viittaavat siihen edelleen nimellä `azure`. Tämä sivu käsittelee integraation Azure-kohtaisia osia: sovelluksen rekisteröintiä, ryhmäpohjaista roolikartoitusta, varmenteella tunnistautumista sekä omistettuja käyttäjä-/ryhmäsynkronointikomentoja. Kaikille tarjoajille yhteisistä määritysavaimista (`enabled`, `title`, `allow_create_new_users` ja niin edelleen) sekä yleisestä `authentication.yaml`-rakenteesta, katso [OAuth2](oauth2.md).

## Chamilon rekisteröinti Microsoft Entra ID:hen

1. Luo Entra-hallintakeskuksessa Chamilolle **App registration**.
2. Aseta uudelleenohjaus-URI (alustatyyppi **Web**) arvoon:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Kirjaa muistiin **Application (client) ID** ja **Directory (tenant) ID** — tarvitset molemmat.
4. Kohdassa **Certificates & secrets** luo joko asiakassalaisuus tai lataa varmenne (katso [Varmenteella tunnistautuminen](#certificate-authentication) alla).
5. Kohdassa **API permissions** lisää alla olevat Microsoft Graph -käyttöoikeudet ja myönnä järjestelmänvalvojan suostumus.

| Käyttöoikeus | Tyyppi | Tarvitaan |
|------------|------|-------------|
| `User.Read` | Delegated | Peruskirjautuminen |
| `GroupMember.Read.All` | Delegated | Ryhmäpohjainen roolikartoitus kirjautumisen yhteydessä |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` tai `Group.Read.All` | Application | `app:azure-sync-users` ja `app:azure-sync-usergroups` |

Application-käyttöoikeudet edellyttävät järjestelmänvalvojan suostumusta, ja niitä käyttävät vain synkronoinnin konsolikomennot (`client_credentials`-grantin kautta), eivät koskaan interaktiivisen käyttäjän kirjautuminen.

## Perusmääritys

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

### Multi-tenant vs. single-tenant

`tenant`-arvon on vastattava sitä, miten sovellusrekisteröinnin "supported account types" on asetettu:

* Tietty tenantin GUID — single-tenant, vain kyseisen organisaation tilit voivat kirjautua
* `organizations` — mikä tahansa Entra ID -tenant
* `common` — mikä tahansa Entra ID -tenant sekä henkilökohtaiset Microsoft-tilit

## Vaaditut käyttäjäattribuutit

Jokaisella Entra ID -käyttäjällä, jonka on kirjauduttava Chamiloon, on oltava kentät `mail` ja `mailNickname` täytettyinä — kirjautuminen antaa virheen, jos jompikumpi on tyhjä (yhdessä muuttumattoman Entra-objektitunnisteen kanssa, joka on aina olemassa). Kenttäkartoitus Microsoft Graphista Chamiloon on Azurelle **kiinteä** (toisin kuin geneerisellä OAuth2-tarjoajalla, jossa kenttäkartoituksen voi määrittää):

| Chamilo-kenttä | Microsoft Graph -lähde |
|---------------|------------------------|
| Etunimi | `givenName` |
| Sukunimi | `surname` |
| Sähköposti | `mail` |
| Käyttäjätunnus | `userPrincipalName` |
| Puhelin | `telephoneNumber`, sitten `businessPhones[0]`, sitten `mobilePhone` |
| Aktiivinen | `accountEnabled` |
| Käyttöliittymän kieli | `preferredLanguage` (sovitetaan asennettuun Chamilo-kieleen, palaten alustan oletukseen) |

Kolme lisäkenttää kirjoitetaan myös jokaisella onnistuneella kirjautumisella: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) ja `azure_uid` (= Entra-objektitunniste). Nämä tukevat alla kuvattua tilien täsmäytyslogiikkaa.

## Kirjautumisten täsmäytys olemassa oleviin Chamilo-tileihin

Aseta `existing_user_verification_order` pilkuilla erotetuksi numeroiden `1`–`3` luetteloksi hallitaksesi, miten saapuva Entra ID -kirjautuminen täsmäytetään olemassa olevaan Chamilo-tiliin:

| Arvo | Täsmäytetään |
|-------|------------------|
| `1` | Lisäkenttä `organisationemail` == Entra `mail` |
| `2` | Lisäkenttä `azure_id` == Entra `mailNickname` |
| `3` | Lisäkenttä `azure_uid` == Entra-objektitunniste |

Sijainnit kokeillaan luetellussa järjestyksessä; ensimmäinen aktiivinen (ei pehmeästi poistettu) osuma voittaa. Virheellinen tai tyhjä arvo olettaa `1,2,3`. Jos mikään määritetyistä sijainneista ei täsmää — mikä on aina tilanne, kun tietty käyttäjä kirjautuu ensimmäistä kertaa, koska nämä lisäkentät täytetään vasta *onnistuneen* kirjautumisen jälkeen — Chamilo palaa täsmäyttämään Chamilon oman `email`-kentän Entra-kenttään `mail` ja sitten `username`-kentän kenttään `userPrincipalName` riippumatta siitä, mitä määritit.

## Ryhmäpohjainen roolikartoitus

Kartoita Entra ID -suojausryhmät Chamilo-rooleihin niiden Object ID:iden (GUID) avulla:

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

Jokaisella kirjautumisella Chamilo kutsuu Microsoft Graphin päätepistettä `/v1.0/me/memberOf` käyttäjän omalla käyttöoikeustunnuksella ja vertaa palautettuja ryhmiä näihin kolmeen tunnisteeseen järjestyksessä **admin → session_admin → teacher**. Ensimmäinen osuma voittaa — käyttäjä, joka kuuluu sekä admin- että teacher-ryhmään, ylennetään vain adminiksi. Kuka tahansa, joka ei kuulu mihinkään määritettyyn ryhmään, säilyttää olemassa olevan roolinsa (tai oletusarvoisen opiskelijaroolin ensimmäisellä kirjautumisella). Tämä edellyttää yllä lueteltua delegoidun `GroupMember.Read.All` -oikeuden käyttöä.

## Varmennepohjainen todennus

Vaihtoehtona `client_secret`-avaimelle voit todentaa varmenteella:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Lataa vastaava julkinen varmenne **Certificates & secrets** -kohtaan sovellusrekisteröinnissä ja kopioi sen sormenjälki (näytetään heksadesimaalina portaalissa) avaimeen `client_certificate_thumbprint`. Kun molemmat avaimet on asetettu, Chamilo muodostaa allekirjoitetun JWT-asiakasväitteen (RS256) sen sijaan, että lähettäisi `client_secret`-avaimen — tämä koskee sekä interaktiivisia kirjautumisia että synkronointikomentojen pelkkää sovellustodennusta.

## Käyttäjien ja ryhmien synkronointi Entra ID:stä

Kaksi konsolikomentoa provisioi ja ylläpitää Chamilo-tilejä suoraan Entra ID:stä, riippumatta siitä, kirjautuuko kukaan interaktiivisesti. Molemmat todentavat pelkällä sovelluksella (`client_credentials`), joten ne tarvitsevat yllä luetellut **sovelluskohtaiset** Graph-oikeudet, ja molemmat on tarkoitettu ajettaviksi cronissa eikä manuaalisesti.

### `app:azure-sync-users`

Hakee käyttäjät Microsoft Graphista ja provisioi/päivittää vastaavat Chamilo-tilit käyttäen samaa kenttäkartoitusta ja tilien täsmäytyslogiikkaa kuin interaktiivinen kirjautuminen.

* Oletuksena se hakee koko käyttäjäluettelon (`/v1.0/users`, sivutettuna). Aseta `script_users_delta: true` käyttääksesi sen sijaan päätepistettä `/v1.0/users/delta` — Chamilo säilyttää delta-linkin ajojen välillä, joten myöhemmät ajot hakevat vain muuttuneet tiedot.
* Aseta `deactivate_nonexisting_users: true` poistaaksesi käytöstä Chamilo-tilit (todennuslähteenä Azure), jotka eivät enää näy Entra ID -haussa. Tämä toimii vain täyden haun tilassa — delta-tila ei koskaan palauta täydellistä käyttäjäluetteloa, joten tätä asetusta ei huomioida, kun `script_users_delta` on käytössä.
* Ryhmäroolikartoitus (yllä) sovelletaan uudelleen jokaiselle synkronoidulle käyttäjälle tämän ajon aikana, ei vain kirjautumisen yhteydessä.

### `app:azure-sync-usergroups`

Hakee Entra ID -ryhmät ja peilaa ne Chamilo-luokiksi (`Usergroup`).

* Hakee koko ryhmäluettelon (`/v1.0/groups`) tai, kun `script_usergroups_delta: true`, delta-päätepisteen, omalla erikseen seurattavalla delta-linkillään.
* `group_filter_regex` rajoittaa synkronoitavia ryhmiä, täsmäytettynä ryhmän näyttönimeen.
* **Jokainen ajo tyhjentää ensin kaikki vastaavan Chamilo-luokan olemassa olevat jäsenet** ja tilaa sitten uudelleen ne jäsenet, jotka Graph tällä hetkellä palauttaa. Jäsenet täsmäytetään *vain olemassa oleviin* Chamilo-käyttäjiin käyttäen samaa [tilien täsmäytyslogiikkaa](#matching-logins-to-existing-chamilo-accounts) kuin kirjautumisessa — tämä komento ei koskaan luo uusia käyttäjätilejä, ja mikä tahansa ryhmän jäsen, jota se ei voi täsmäyttää olemassa olevaan Chamilo-tiliin, ohitetaan hiljaisesti.

## Tunnetut rajoitukset

* **Ei kertakirjautumista ulos.** Chamilosta uloskirjautuminen ei kirjaa käyttäjää ulos Entra ID:stä tai muista yhdistetyistä sovelluksista. `force_logout`-määritysavain on olemassa tiedostossa `authentication.yaml`, mutta sitä ei ole tällä hetkellä toteutettu — käsittele sitä varattuna, ei toimivana.
* **Salasanan nollaus on merkityksetön Azure-tileille.** Koska todennus tapahtuu kokonaan Entra ID:n kautta, Chamilo ei ylläpidä näille tileille käyttökelpoista paikallista salasanaa.

## Vianmääritys

* Kirjautumisvirheet (puuttuvat vaaditut attribuutit, Graph API -virheet) näytetään käyttäjälle flash-viestinä kirjautumissivulla.
* Synkronointikomennot kirjaavat ongelmat tietueittain varoituksina ja jatkavat erän muun osan käsittelyä sen sijaan, että keskeyttäisivät ensimmäiseen virheeseen — tarkista komennon konsolituloste (tai se, mihin cron sen kaappaa) jokaisen ajon jälkeen.
* Pidä Chamilon vakio kirjautumislomake käytössä, jotta ylläpitäjillä on aina pääsy, jos Entra ID -integraatio toimii väärin.