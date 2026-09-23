# Asiakirja-asetukset

Kurssin **Asiakirjat**-työkalun toiminta — lataukset, sallitut tiedostopäätteet, jakaminen ja mallipohjat.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Asiakirjat**. Tässä kategoriassa on **29 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `access_url_specific_files`

**Ota käyttöön URL-kohtaiset tiedostot**

Kun tämä ominaisuus on käytössä usean URL-osoitteen kokoonpanossa, voit siirtyä pää-URL-osoitteeseen ja tarjota URL-kohtaisia versioita mistä tahansa tiedostosta (asiakirjat-työkalussa). Alkuperäinen tiedosto korvataan vaihtoehtoisella, kun sitä tarkastellaan toisesta URL-osoitteesta. Näin voit räätälöidä kutakin URL-osoitetta entistä pidemmälle ja silti hyödyntää samoja kursseja useaan kertaan.

*Oletus: `false`*

### `default_document_quotum`

**Oletusarvoinen kiintolevytila**

Mikä on kurssin käytettävissä oleva levytila? Voit ohittaa kiintiön tietylle kurssille kohdasta: alustan hallinta > Kurssit > muokkaa

*Oletus: `1000`*


### `default_group_quotum`

**Ryhmän käytettävissä oleva levytila**

Mikä on ryhmien asiakirjat-työkalun oletusarvoinen kiintolevytila?

*Oletus: `250`*


### `documents_custom_cloud_link_list`

**Aseta tiukka isäntälista pilvilinkeille**

Asiakirjat-työkalu voi integroida linkkejä pilvessä oleviin tiedostoihin. Pilvipalveluiden lista on rajoitettu kovakoodattuun listaan, mutta voit määritellä ‘links’-taulukon, joka sisältää oman palvelu-/URL-listasi. Tässä määritelty lista korvaa oletuslistan.

### `documents_default_visibility_defined_in_course`

**Asiakirjan näkyvyys määritellään kurssissa**

Kaikkien kurssien asiakirjojen oletusnäkyvyys

*Oletus: `false`*

### `documents_hide_download_icon`

**Piilota asiakirjojen latauskuvake**

Piilota asiakirjat-työkalussa latauskuvake käyttäjiltä.

*Oletus: `false`*


### `enable_x_sendfile_headers`

**Ota käyttöön X-sendfile-otsakkeet**

Ota tämä käyttöön, jos X-sendfile on käytössä verkkopalvelintasolla ja haluat lisätä tarvittavat otsakkeet, jotta selaimet ottavat sen käyttöön.

*Oletus: `false`*

### `group_category_document_access`

**Ota käyttöön jakamisasetukset asiakirjoille ryhmäkategoriassa**

Kun käytössä, ylläpitäjät voivat asettaa asiakirjojen käyttö- ja jakamisoikeudet asiakirjaryhmille kategorian mukaan.

*Oletus: `false`*


### `group_document_access`

**Ota käyttöön jakamisasetukset ryhmän asiakirjoille**

Kun käytössä, asiakirjojen jakamista ja käyttöoikeuksia voidaan määrittää ryhmätasolla.

*Oletus: `false`*


### `pdf_export_watermark_by_course`

**Ota käyttöön vesileiman määrittely kurssikohtaisesti**

Kun tämä vaihtoehto on käytössä, opettajat voivat määritellä oman vesileimansa kurssiensa asiakirjoille.

*Oletus: `false`*


### `pdf_export_watermark_enable`

**Ota vesileima käyttöön PDF-viennissä**

Ottamalla tämän vaihtoehdon käyttöön voit ladata kuvan tai tekstin, joka lisätään automaattisesti vesileimaksi kaikkiin järjestelmän asiakirjojen PDF-vientoihin.

*Oletus: `false`*

### `pdf_export_watermark_text`

**PDF-vesileiman teksti**

Tämä teksti lisätään vesileimaksi asiakirjojen PDF-vientoihin.

### `permanently_remove_deleted_files`

**Poistettuja tiedostoja ei voi palauttaa**

Tiedoston poistaminen asiakirjat-työkalussa poistaa sen pysyvästi. Tiedostoa ei voi palauttaa

*Oletus: `false`*

### `permissions_for_new_directories`

**Uusien hakemistojen käyttöoikeudet**

Mahdollisuus määritellä jokaiselle vastaluodulle hakemistolle annettavat käyttöoikeudet parantaa suojaa hakkereiden hyökkäyksiä vastaan, joissa portaaliin ladataan vaarallista sisältöä. Oletusasetuksen (0770) pitäisi riittää antamaan palvelimellesi kohtuullinen suojataso. Annettu muoto käyttää UNIX-terminologiaa Omistaja-Ryhmä-Muut sekä Luku-Kirjoitus-Suoritus -oikeuksia.

*Oletus: `0770`*


### `permissions_for_new_files`

**Uusien tiedostojen käyttöoikeudet**

Mahdollisuus määritellä jokaiselle vastaluodulle tiedostolle annettavat käyttöoikeudet parantaa suojaa hakkereiden hyökkäyksiä vastaan, joissa portaaliin ladataan vaarallista sisältöä. Oletusasetuksen (0550) pitäisi riittää antamaan palvelimellesi kohtuullinen suojataso. Annettu muoto käyttää UNIX-terminologiaa Omistaja-Ryhmä-Muut sekä Luku-Kirjoitus-Suoritus -oikeuksia. Jos käytät Oogieta, varmista, että LibreOfficen käynnistävä käyttäjä voi kirjoittaa tiedostoja kurssikansioon.

*Oletus: `0660`*


### `send_notification_when_document_added`

**Lähetä ilmoitus opiskelijoille, kun asiakirja lisätään**

Aina kun joku luo uuden kohteen asiakirjat-työkalussa, lähetä ilmoitus käyttäjille.

*Oletus: `false`*

### `show_default_folders`

**Näytä asiakirjatyökalussa kaikki kansiot, jotka sisältävät oletuksena toimitettuja multimediakohteita**

Multimediatiedostokansiot, jotka sisältävät oletuksena toimitettuja tiedostoja ja jotka on järjestetty video-, ääni-, kuva- ja flash-animaatioluokkiin käytettäväksi kursseilla. Vaikka teet ne näkymättömiksi asiakirjatyökalussa, voit silti käyttää näitä resursseja alustan verkkotoimittimessa.

*Oletus: `true`*

### `show_documents_preview`

**Näytä asiakirjan esikatselu**

Asiakirjojen esikatselujen näyttäminen asiakirjatyökalussa välttää uuden sivun lataamisen pelkästään asiakirjan näyttämiseksi, mutta se voi olla epävakaa joissakin vanhemmissa selaimissa tai kapeammilla näytöillä.

*Oletus: `false`*

### `show_users_folders`

**Näytä käyttäjäkansiot asiakirjatyökalussa**

Tämä asetus mahdollistaa opettajille niiden kansioiden näyttämisen tai piilottamisen, jotka järjestelmä luo jokaiselle käyttäjälle, joka vierailee asiakirjatyökalussa tai lähettää tiedoston verkkotoimittimen kautta. Jos näytät nämä kansiot opettajille, he voivat tehdä niistä näkyviä tai näkymättömiä oppijoille ja antaa kullekin oppijalle kurssilla oman paikan, jossa he voivat paitsi tallentaa asiakirjoja myös luoda ja muokata verkkosivuja, viedä PDF-muotoon, piirtää, luoda henkilökohtaisia verkkopohjia, lähettää tiedostoja sekä luoda, siirtää ja poistaa hakemistoja ja tiedostoja ja tehdä suojakopioita kansioistaan. Jokaisella kurssin käyttäjällä on tällöin täydellinen asiakirjahallinta. Muista myös, että kuka tahansa käyttäjä voi kopioida tiedoston, joka on näkyvissä mistä tahansa asiakirjatyökalun kansiosta (olipa hän omistaja tai ei), portfolioonsa tai sosiaalisen verkon henkilökohtaisten asiakirjojen alueelle, josta se on käytettävissä muilla kursseilla.

*Oletus: `true`*

### `students_download_folders`

**Salli oppijoiden ladata hakemistoja**

Salli oppijoiden pakata ja ladata kokonainen hakemisto asiakirjatyökalusta

*Oletus: `true`*


### `students_export2pdf`

**Salli oppijoiden viedä verkkoasiakirjoja PDF-muotoon asiakirja- ja wiki-työkaluissa**

Tämä ominaisuus on oletuksena käytössä, mutta palvelimen ylikuormituksen väärinkäytön tai tiettyjen oppimisympäristöjen tapauksessa sen voi haluta poistaa käytöstä kaikilta kursseilta.

*Oletus: `true`*

### `thematic_pdf_orientation`

**PDF-suunta kurssin edistymiselle**

Kurssin edistymistyökalussa voit tulostaa PDF-tiedoston eri elementeistä. Aseta ‘portrait’ tai ‘landscape’ (tekniset termit) muuttaaksesi sitä.

*Oletus: `landscape`*


### `upload_extensions_blacklist`

**Estolista - asetus**

Estolistaa käytetään tiedostopäätteiden suodattamiseen poistamalla (tai nimeämällä uudelleen) kaikki tiedostot, joiden pääte esiintyy alla olevassa estolistassa. Päätteet tulee merkitä ilman alkavaa pistettä (.) ja erottaa puolipisteellä (;) seuraavasti:  exe;com;bat;scr;php. Tiedostot ilman päätettä hyväksytään. Kirjainkoolla (isot/pienet kirjaimet) ei ole merkitystä.

### `upload_extensions_list_type`

**Suodatustyyppi asiakirjojen latauksissa**

Haluatko käyttää estolista- vai sallittujen listan suodatusta. Katso lisätietoja estolistan tai sallittujen listan kuvauksesta alta.

*Oletus: `blacklist`*


### `upload_extensions_replace_by`

**Korvaava pääte**

Anna pääte, jota haluat käyttää suodattimen havaitsemien vaarallisten päätteiden korvaamiseen. Tarvitaan vain, jos olet valinnut korvaavan suodatuksen.

*Oletus: `dangerous`*


### `upload_extensions_skip`

**Suodatuksen toiminta (ohita/nimeä uudelleen)**

Jos valitset ohittamisen, estolistan tai sallittujen listan kautta suodatetut tiedostot eivät lataudu järjestelmään. Jos valitset uudelleennimeämisen, niiden pääte korvataan päätteiden korvausasetuksessa määritetyllä. Huomaa, että uudelleennimeäminen ei oikeasti suojaa sinua ja voi aiheuttaa nimiristiriitoja, jos samannimisiä mutta eri päätteisiä tiedostoja on useita.

*Oletus: `true`*


### `upload_extensions_whitelist`

**Sallittujen lista - asetus**

Sallittujen listaa käytetään tiedostopäätteiden suodattamiseen poistamalla (tai nimeämällä uudelleen) kaikki tiedostot, joiden pääte *EI* esiinny alla olevassa sallittujen listassa. Sitä pidetään yleensä turvallisempana mutta rajoittavampana suodatustapana. Päätteet tulee merkitä ilman alkavaa pistettä (.) ja erottaa puolipisteellä (;) esimerkiksi seuraavasti:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Tiedostot ilman päätettä hyväksytään. Kirjainkoolla (isot/pienet kirjaimet) ei ole merkitystä.

### `users_copy_files`

**Salli käyttäjien kopioida tiedostoja kurssilta henkilökohtaiseen tiedostoalueeseen**

Sallii käyttäjien kopioida tiedostoja kurssilta henkilökohtaiseen tiedostoalueeseen, joka on näkyvissä sosiaalisen verkon kautta tai HTML-toimittimen kautta, kun he eivät ole kurssilla

*Oletus: `true`*


### `video_features`

**Video-ominaisuudet**

Taulukko lisäominaisuuksista, jotka voit ottaa käyttöön Chamilon videosoittimessa. Vaihtoehtoihin kuuluu 'speed', joka mahdollistaa videon toistonopeuden muuttamisen.