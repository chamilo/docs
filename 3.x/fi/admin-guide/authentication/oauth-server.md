# OAuth 2.1 -valtuutuspalvelin ja MCP-asiakkaat

Chamilo voi toimia **OAuth-valtuutuspalvelimena** asiakkaille, jotka muodostavat yhteyden sen suojattuihin resursseihin. Tämä on eri ominaisuus kuin [OAuth2-kirjautuminen](oauth2.md), jossa Chamilo käyttää ulkoista identiteetin tarjoajaa käyttäjien sisäänkirjautumiseen.

## Käyttöönotto ja määritys

Kohdassa **Hallinta > Määritysasetukset > Tietoturva** ota käyttöön `security.oauth_server_enabled`. MCP-käyttö riippuu myös olemassa olevasta `security.mcp_enabled`-määrityksestä ja käyttäjän sallitusta MCP-roolista.

Palvelin tarjoaa vakiomuotoiset valtuutus-, tunnus-, rekisteröinti- ja peruutusreitit (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) sekä discovery-metatiedot. Tuotantoasiakkaiden kanssa tulee käyttää vain HTTPS:ää.

## Rekisteröi asiakas

Chamilo tukee julkisia PKCE-valtuutuskoodiasiakkaita ja rekisteröityjä luottamuksellisia asiakkaita. Dynaaminen asiakasrekisteröinti (DCR) käyttää reittiä `/oauth/register` ja on nopeusrajoitettu. Asetus `security.dynamic_client_registration` on **oletuksena pois käytöstä**; päätepiste pysyy käytettävissä tuetulle MCP-rekisteröintivirtaukselle, kun taas asetus ohjaa rekisteröinnin hyväksymiä lisäasiakkaan scopeja. Älä oleta, että asetuksen vaihtaminen tekee mielivaltaiset suojatut API:t käytettäviksi.

Rekisteröidyillä asiakkailla on palvelinpuolen **sallittujen resurssien** luettelo. Tällä hetkellä resurssirekisteri määrittää vain **MCP**-resurssin ja `mcp`-scopen. Uudet suojatut resurssit edellyttävät nimenomaista palvelintoteutusta ja käyttöoikeuspäätöksiä, ei pelkästään tunnistamattoman URL-osoitteen lisäämistä pyyntöön. Chamilo validoi RFC 8707 -standardin `resource`-parametrit koko valtuutus- ja tunnusten käsittelyn ajan.

## Käyttäjän suostumus ja auditointi

1. Asiakas aloittaa valtuutuskoodipyynnön PKCE:llä (`S256`) ja pyydetyllä scopella/resurssilla.
2. Käyttäjä tunnistautuu tarvittaessa tavallisella Chamilo-kirjautumisellaan.
3. Chamilo näyttää suostumusnäytöllä asiakkaan identiteetin, rekisteröintitiedot ja pyydettävän käyttöoikeuden.
4. Käyttäjä valitsee **Salli** tai **Kiellä**. Hyväksyntä kirjataan osaksi palvelimen suostumushistoriaa, ja aiempia hyväksyntätietoja voidaan näyttää myöhemmissä pyynnöissä.

Suostumus on sidottu käyttäjälle näytettyyn pyyntöön. Hyväksytty pyyntö ei myönnä muita suojattuja resursseja tai mielivaltaista käyttöoikeutta pyydettyjen oikeuksien ulkopuolella.

## Käyttöönotto ja tietoturvahuomiot

OAuth 2.1 -päivitykset tuovat asiakkaille sallittujen resurssien kentän ja pysyvät asiakassuostumustietueet. Ota käyttöön julkaisun mukana toimitetut **erityiset Chamilo-tietokantamigraatiot** ennen päivitetyn virtauksen käyttöönottoa. Pidä callback-URL-osoitteet ja OAuth-asiakassalaisuudet yksityisinä. Asiakasrekisteröinti ei myönnä rajoittamatonta pääsyä Chamilo-käyttäjiin tai kursseihin.

Toteutusviite: [OAuth-asiakasrekisteröinti ja suostumus, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).