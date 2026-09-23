# Sivut

Sivut on Chamilon sisäänrakennettu, CMS-tyyppinen työkalu sisältölohkoille, joista muodostuvat portaalin julkiset alueet — etusivu, alatunniste, navigointivalikot ja vastaavat sijoittelut — ilman tarvetta muokata mallitiedostoa.

## Sivujen avaaminen

Hallintapaneelista valitse **Alusta > Sivut**.

## Miten sivut toimivat

Jokaisella sivulla on:

* **Otsikko** ja rich-text-**sisältö**
* **Slug**, joka luodaan automaattisesti otsikosta
* **Käytössä** — onko sivu tällä hetkellä näkyvissä
* **Sijainti** — vedä ja pudota -järjestys sen kategoriassa
* **Kielialue** — sisältö on kielikohtaista: samaan sijoitteluun voi kuulua yksi sivu per kieli, ja sivusto palaa alustan oletuskieleen, jos vierailijan kielelle ei ole sivua
* **Kategoria** — tämä määrittää, *missä* sivu renderöidään (esimerkiksi `index`, `home`, `footer_public` tai `menu_links`); Chamilo luo tarvitsemansa kategoriat automaattisesti

Moni-URL-asennuksessa (moniportaali) sivut rajataan myös käyttö-URL:n mukaan, joten kukin portaali hallinnoi omaa sisältöään.

## Rekisteröitymisen esittelysivu

**Alusta > Rekisteröitymissivun asettaminen** on pikakuvake tähän samaan Sivut-järjestelmään yhtä tiettyä sijoittelua varten: julkisen rekisteröitymislomakkeen yläpuolella näytettävä johdantoteksti. Se on rajoitettu portaalin ylläpitäjille. Napsauttaminen joko:

* Avaa olemassa olevan esittelysivun muokattavaksi, jos sellainen on jo käyttö-URL:llesi ja kielellesi, tai
* Luo sijoittelun lennossa ja vie suoraan sen sisällön luomiseen

Tähän tallentamasi sisältö renderöidään infolaatikkona suoraan rekisteröitymislomakkeen yläpuolelle — luonteva paikka ohjeille, organisaatiollesi ominaisille ehdoille tai kontekstille, joka tulevien käyttäjien tulisi lukea ennen rekisteröitymistä. Jätä se pois käytöstä (tai älä luo sitä lainkaan), niin näytetään pelkkä rekisteröitymislomake ilman johdantotekstiä.