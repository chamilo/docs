# Käyttäjäprofiilin asetukset

Mitkä kentät näkyvät käyttäjäprofiilissa, mitä käyttäjä voi muokata ja niihin liittyvät asetukset.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Käyttäjäprofiili**. Tässä kategoriassa on **29 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostossa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa on merkitty tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun haluat muuttaa näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `account_valid_duration`

**Tilin voimassaolo**

Käyttäjätili on voimassa tämän määrän päiviä luonnin jälkeen

*Oletus: `3660`*


### `add_user_course_information_in_mailto`

**Esitäytä sähköposti käyttäjä- ja kurssitiedoilla alatunnisteen yhteydenotossa**

Lisää aihe ja runko mailto:-alatunnisteeseen.

*Oletus: `false`*


### `allow_show_linkedin_url`

**Salli käyttäjän LinkedIn-URL:n näyttäminen**

Lisää linkki käyttäjän sosiaaliseen lohkoon, josta voi avata käyttäjän LinkedIn-profiilin

### `allow_show_skype_account`

**Salli käyttäjän Skype-tilin näyttäminen**

Lisää linkki käyttäjän sosiaaliseen lohkoon, josta voi aloittaa Skype-keskustelun

### `allow_social_map_fields`

**Käyttäjien sijainti kartalla**

Ota käyttöön kartan näyttäminen sosiaalisessa verkostossa, jotta muita käyttäjiä voi paikantaa. Tämä sisältää useita sijainteja (nykyinen ja kohde), jotka on määritettävä osoitteina tai koordinaatteina erillisissä lisäkentissä. Lisäkentät on asetettava tässä taulukkona.

### `allow_teachers_to_classes`

**Salli opettajien hallita luokkia**

Mahdollistaa opettajien hallita luokkaryhmiä ja niiden jäsenyyttä järjestelmässä.

*Oletus: `false`*


### `allow_user_headings`

**Salli käyttäjien profilointi kursseilla**

Voiko opettaja määritellä oppijan profiilikenttiä lisätietojen keräämiseksi?

### `allow_users_to_change_email_with_no_password`

**Salli käyttäjien vaihtaa sähköpostiosoite ilman salasanaa**

Tilin tietoja muutettaessa

*Oletus: `false`*

### `changeable_options`

**Kentät, joita käyttäjät saavat muuttaa profiilissaan**

Valitse kentät, joita käyttäjät voivat muuttaa profiilisivullaan.


### `enable_profile_user_address_geolocalization`

**Ota käyttöön käyttäjän geolokaatio**

Ota käyttöön käyttäjän osoitekenttä ja näytä se kartalla geolokaatio-ominaisuuksilla

### `extended_profile`

**Portfolio**

Jos tämä asetus on päällä, käyttäjä voi täyttää seuraavat (valinnaiset) kentät: 'Oma avoin alue', 'Osaamiseni', 'Tutkintoni', 'Mitä osaan opettaa'

*Oletus: `false`*

### `hide_username_in_course_chat`

**Piilota käyttäjätunnus kurssichatissa**

Kurssichatissa piilota käyttäjätunnus. Näytä vain henkilöiden nimet.

*Oletus: `false`*


### `hide_username_with_complete_name`

**Piilota käyttäjätunnus, kun koko nimi on jo näkyvissä**

Jotkin sisäiset funktiot palauttavat käyttäjätunnuksen palauttaessaan käyttäjän koko nimen. Kun tämä asetus on käytössä, varmistat, ettei käyttäjätunnus näy.

*Oletus: `false`*


### `linkedin_organization_id`

**LinkedIn-organisaation tunnus**

Kun jaat merkin LinkedInissä, LinkedIn antaa asettaa organisaation tunnuksen, joka linkittää organisaatiosi LinkedIn-sivulle (jotta merkkiä myöntävä organisaatio voidaan liittää).

*Oletus: `false`*


### `login_is_email`

**Käytä sähköpostiosoitetta käyttäjätunnuksena**

Käytä sähköpostiosoitetta järjestelmään kirjautumiseen

*Oletus: `false`*

### `my_space_users_items_per_page`

**Oletusmäärä kohteita sivulla mySpacessa**

Sivulla näytettävien tietueiden määrä MySpace-seurantaosioissa (käyttäjät, työtilastot, opiskelijaluettelo).

*Oletus: `10`*


### `pass_reminder_custom_link`

**Mukautettu sivu salasanan muistutukselle**

Aseta oma URL salasanan nollaussivulle. Hyödyllinen, kun käytetään federatiivista tilinhallintajärjestelmää.

### `profile_fields_visibility`

**Profiilisivulla näkyvät kentät**

Taulukko kentistä ja siitä, ovatko ne (boolean) näkyvissä käyttäjän profiilisivulla (toimii myös lisäkenttien otsikoilla).

### `registration_add_helptext_for_2_names`

**Lisää ohje kahden nimen syöttämiseen rekisteröinnissä**

Lisää ohjeteksti, jotta käyttäjät voivat syöttää kaksi nimeä rekisteröintilomakkeessa, kun kaksiosaiset sukunimet ovat yleisiä.

*Oletus: `false`*


### `send_notification_when_user_added`

**Lähetä sähköposti ylläpitäjälle, kun käyttäjä luodaan**

Lähetä sähköposti-ilmoitus ylläpitäjälle, kun käyttäjä luodaan.

### `show_conditions_to_user`

**Näytä erityiset rekisteröintiehdot**

Näytä käyttäjälle useita ehtoja rekisteröitymisen aikana. Anna taulukko, jonka jokainen alkio sisältää 'variable' (sisäinen lisäkentän nimi), 'display_text' (yksinkertainen teksti valintaruudulle), 'text_area' (ehtojen pitkä teksti).

### `show_official_code_whoisonline`

**Virallinen koodi sivulla 'Kuka on linjoilla'**

Näytä virallinen koodi sivulla 'Kuka on linjoilla' käyttäjätunnuksen alla.

*Oletus: `false`*

### `show_terms_if_profile_completed`

**Käyttöehdot vain, jos profiili on täytetty**

Kun tämä asetus on käytössä, käyttöehdot ovat käyttäjän saatavilla vasta, kun näkyviksi asetetut, 'terms_'-alkuiset lisäprofiilikentät on täytetty.

*Oletus: `false`*


### `split_users_upload_directory`

**Jaa käyttäjien lataushakemisto**

Suuren kuormituksen portaaleissa, joissa on rekisteröitynyt paljon käyttäjiä ja he lähettävät kuviaan, lataushakemisto (main/upload/users/) saattaa sisältää liian monta tiedostoa tiedostojärjestelmän käsiteltäväksi (tästä on raportoitu yli 36 000 tiedoston tapauksessa Debian-palvelimella). Tämän asetuksen muuttaminen ottaa käyttöön lataushakemiston hakemistojen yksitasoisen jaon. Perushakemistossa käytetään 9 hakemistoa, ja kaikki myöhemmät käyttäjähakemistot tallennetaan johonkin näistä 9 hakemistosta. Tämän asetuksen muutos ei vaikuta levyllä olevaan hakemistorakenteeseen, mutta se vaikuttaa Chamilo-koodin toimintaan, joten jos muutat tätä asetusta, sinun on luotava uudet hakemistot ja siirrettävä olemassa olevat hakemistot itse palvelimella. Huomaa, että näitä hakemistoja luotaessa ja siirrettäessä käyttäjien 1–9 hakemistot on siirrettävä saman nimisiin alihakemistoihin. Jos et ole varma tästä asetuksesta, on parasta olla ottamatta sitä käyttöön.

*Oletus: `true`*

### `use_users_timezone`

**Ota käyttäjien aikavyöhykkeet käyttöön**

Mahdollistaa käyttäjille oman aikavyöhykkeen valinnan. Kun asetus on määritetty, käyttäjät näkevät tehtävien määräajat ja muut aikaviitteet omalla aikavyöhykkeellään, mikä vähentää virheitä palautushetkellä.

*Oletus: `true`*

### `user_import_settings`

**Käyttäjien tuonnin asetukset**

Taulukko asetuksia, joita käytetään oletusparametreina CSV/XML-käyttäjätuonnissa.

### `user_search_on_extra_fields`

**Hae käyttäjiä lisäkenttien perusteella ylläpitäjien käyttäjäluettelossa**

Sisällytä annetut lisäkentät (lisäkenttien tunnisteiden taulukko) automaattisesti käyttäjähakuihin.

### `user_selected_theme`

**Käyttäjän teeman valinta**

Sallii käyttäjien valita oman visuaalisen teemansa profiilissaan. Tämä muuttaa Chamilon ulkoasua heille, mutta jättää portaalin oletustyylin ennalleen. Jos tietyllä kurssilla tai istunnolla on määritetty oma teema, se on etusijalla käyttäjän määrittelemiin teemoihin nähden.

*Oletus: `false`*

### `visible_options`

**Profiilissa näkyvien kenttien luettelo**

Määrittää, mitkä profiilikentät ovat näkyvissä käyttäjille ja muille.