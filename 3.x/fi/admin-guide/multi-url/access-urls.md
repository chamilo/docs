# Käyttö-URL:t

Käyttö-URL:t mahdollistavat sen, että yksi Chamilo-asennus palvelee useita erillisiä portaaleja.

Tähän työkaluun pääsee myös hallintapaneelin [Alusta](../platform/README.md) -lohkosta kohdasta **Määritä useita käyttö-URL:ia**.


## Käyttötapaukset

* **Monivuokralaisasennukset** — Isännöi eri organisaatioille erillisiä koulutusportaaleja yhdellä palvelimella
* **Osastokohtaiset portaalit** — Anna kullekin osastolle oma brändätty portaali (esim. `hr.training.company.com`, `it.training.company.com`)
* **Alueelliset portaalit** — Erilliset portaalit eri alueille tai kielille

## Miten se toimii

Kukin käyttö-URL on erillinen sisäänkäynti samaan Chamilo-asennukseen:

* Käyttäjät voidaan liittää yhteen tai useampaan käyttö-URL:iin
* Kurssit ja istunnot kuuluvat tiettyihin käyttö-URL:eihin
* Alustan asetuksia voidaan mukauttaa käyttö-URL:n mukaan
* Brändäys ja teemat voivat vaihdella URL:n mukaan
* Yhden portaalin käyttäjät eivät näe toisen portaalin käyttäjiä tai kursseja (ellei niitä ole nimenomaisesti jaettu)

## Määritys

### Usean URL:n ottaminen käyttöön

Usean URL:n tuki on otettava käyttöön Chamilon määrityksessä (tyypillisesti ympäristöasetuksissa). Tämä tehdään yleensä alkuperäisen asennuksen yhteydessä.

### Käyttö-URL:n luominen

1. Siirry hallintapaneelista kohtaan **Käyttö-URL:t**
2. Napsauta **Lisää URL**
3. Anna URL (esim. `https://portal2.yoursite.com`) ja kuvaus
4. Voit valinnaisesti valita **Ylä-URL:n**, jotta tämä URL sijoittuu toisen alle — katso [URL-hierarkia](#url-hierarchy) alla
5. Tallenna

### Käyttäjien ja kurssien liittäminen

* **Käyttäjät** — Liitä käyttäjät tiettyihin käyttö-URL:eihin. Käyttäjä voi kuulua useaan URL:iin.
* **Kurssit** — Liitä kurssit tiettyihin käyttö-URL:eihin
* **Istunnot** — Liitä istunnot tiettyihin käyttö-URL:eihin

### URL-kohtaiset asetukset

Kullakin käyttö-URL:lla voi olla omat:

* **Väriteema** — Erilainen visuaalinen brändäys
* **Alustan nimi ja logo** — Oma identiteetti
* **Asetusten ohitukset** — Tiettyjä alustan asetuksia voidaan mukauttaa URL:n mukaan

## URL-hierarkia

Käyttö-URL:t voidaan järjestää ylä-/alatason puuksi tasaisen luettelon sijaan. URL:ia luotaessa tai muokattaessa rajoittamaton globaali ylläpitäjä (katso [Alipuun ylläpitäjät](#subtree-administrators) alla) voi valita minkä tahansa muun URL:n sen **Ylä-URL:ksi**:

![Muokkaa URL:ia -valintaikkuna, jossa Ylä-URL-pudotusvalikko on auki ja listaa muut käyttö-URL:t mahdollisina ylä-URL:ina](../../.gitbook/assets/admin-access-url-parent-select.png)

* Pudotusvalikko ei koskaan tarjoa muokattavana olevaa URL:ia eikä sen omia jälkeläisiä mahdolliseksi ylä-URL:ksi — näin estetään silmukan syntyminen. Taustajärjestelmä tarkistaa tämän uudelleen riippumatta siitä, mitä käyttöliittymä näyttää.
* Jos URL luodaan valitsematta ylä-URL:ia, oletuksena käytetään **vain kirjautumiseen tarkoitettua URL:ia**, jos sellainen on olemassa (katso [URL-kohtaiset asetukset](#per-url-settings) yllä), tai muuten ensimmäistä käyttö-URL:ia — sama oletuskäyttäytyminen kuin ennen tämän ominaisuuden olemassaoloa.
* Puun ylimmän tason URL — se, jolla ei ole ylä-URL:ia — on kyseisen puun **juuri**. Yhdessä Chamilo-asennuksessa voi olla useampi kuin yksi itsenäinen puu.

Kaikkialla, missä käyttö-URL:t listataan — Usean URL:n hallintapaneelissa ja Käyttö-URL:t -hallintasivulla — puu näytetään sisennyksellä, ylä-URL heti omien lastensa edellä (sisarukset aakkosjärjestyksessä), erillisen "Ylä"-sarakkeen sijaan:

![Käyttö-URL-luettelo, jossa juuri-URL ja kaksi lapsi-URL:ia, joista yhdellä on oma lapsi-URL, sisennettynä hierarkian mukaisesti](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Alipuun ylläpitäjät

URL-hierarkia määrää myös, mitä [globaali ylläpitäjä](../users/user-roles.md) voi hallita:

* Puun **juuri**-URL:iin rekisteröity ylläpitäjä on **rajoittamaton**: hän hallitsee jokaista käyttö-URL:ia täsmälleen kuten ennen tämän ominaisuuden olemassaoloa.
* Vain **ei-juuri**-URL:iin rekisteröity ylläpitäjä on **rajattu**: Usean URL:n ja Käyttö-URL:t -sivut näyttävät vain kyseisen URL:n ja sen jälkeläiset, ja Usean URL:n hallintapaneelin kirjautumiskaavio näyttää tekstin "Kirjautumiset (omat URL:si)" tekstin "Kirjautumiset (kaikki URL:t yhteensä)" sijaan.

Laajuudesta riippumatta seuraavat toiminnot on varattu **rajoittamattomalle** globaalille ylläpitäjälle — rajattu ylläpitäjä ei voi suorittaa niitä edes oman alipuunsa URL:ille:

* Uuden käyttö-URL:n luominen
* Käyttö-URL:n oman URL:n, kuvauksen tai ylä-URL:n muokkaaminen
* Käyttö-URL:n aktivointi tai deaktivointi
* Käyttö-URL:n poistaminen (koko asennuksen juuri-URL:ia ei voi poistaa kukaan)
* Itsensä rekisteröiminen kaikkiin käyttö-URL:eihin kerralla

Rajattu ylläpitäjä voi silti hallita kaikkea, mikä on *liitetty* hänen alipuunsa URL:eihin — käyttäjiä, kursseja, istuntoja, brändäystä ja asetuksia — vain ei itse käyttö-URL-tietueita.

## Vinkkejä

* **Päätä ajoissa** — Jos valitset usean URL-osoitteen asetuksen, se kannattaa tehdä Chamilo-projektin alussa, koska ensimmäinen URL-osoite on pidettävä suhteellisen tyhjänä sisällöstä. Usean URL-osoitteen käyttöönotto jälkikäteen on haastavampaa (vaatii manuaalisia tietokantamuutoksia).
* **Suunnittele URL-rakenne** — Päätä URL-skeema ennen käyttö-URL-osoitteiden luomista, sillä URL-osoitteiden muuttaminen myöhemmin vaikuttaa kaikkiin olemassa oleviin linkkeihin ja kirjanmerkkeihin
* **DNS-määritys** — Jokaisen käyttö-URL-osoitteen on osoitettava samaan Chamilo-palvelimeen. Määritä DNS-tietueet sen mukaisesti.
* **Globaali ylläpitäjä** — Käytä globaalin ylläpitäjän roolia hallintaan kaikissa käyttö-URL-osoitteissa. Jos haluat delegoida vain yhden haaran hallinnan, rekisteröi ylläpitäjä juureen kuulumattomaan URL-osoitteeseen — katso [Alipuun ylläpitäjät](#subtree-administrators)