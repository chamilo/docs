# Seuranta-asetukset

Seurantaan liittyvät oletukset — mitä tallennetaan, mitä raportteja näytetään, ajanlaskentasäännöt.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Seuranta**. Tässä kategoriassa on **10 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `block_my_progress_page`

**Estä pääsy sivulle ”Oma edistyminen”**

Tietyissä toteutuksissa, kuten verkkotenteissä, saatat haluta estää käyttäjiltä pääsyn sivulle ”Oma edistyminen”.

*Oletus: `false`*

### `footer_extra_content`

**Lisäsisältö alatunnisteessa**

Voit lisätä HTML-koodia, kuten meta-tageja

### `header_extra_content`

**Lisäsisältö ylätunnisteessa**

Voit lisätä HTML-koodia, kuten meta-tageja

### `meta_description`

**Meta-kuvaus**

Tämä näyttää OpenGraph Description -metan (og:description) sivustosi otsakkeissa

### `meta_image_path`

**Meta-kuvan polku**

Tämä meta-kuvan polku on polku tiedostoon Chamilo-hakemistossasi (esim. home/image.png), joka näytetään Twitter-kortissa tai OpenGraph-kortissa, kun näytetään linkki LMS:ääsi. Twitter suosittelee 120 × 120 pikselin kuvaa, joka saatetaan joskus rajata kokoon 120 × 90.

### `meta_title`

**OpenGraph-metaotsikko**

Tämä näyttää OpenGraph Title -metan (og:title) sivustosi otsakkeissa

### `meta_twitter_creator`

**Twitter-luojatili**

Twitter-luoja on Twitter-tili (esim. @ywarnier), joka edustaa *henkilöä*, joka loi sivuston. Tämä kenttä on valinnainen.

### `meta_twitter_site`

**Twitter-sivuston tili**

Twitter-sivusto on Twitter-tili (esim. @chamilo_news), joka liittyy sivustoosi. Se on yleensä tilapäisempi tili kuin Twitter-luojatili tai edustaa organisaatiota (henkilön sijaan). Tämä kenttä on pakollinen, jos haluat Twitter-kortin meta-kenttien näkyvän.

### `my_progress_course_tools_order`

**Työkalujen järjestys sivulla ”Oma edistyminen”**

Muuta oppijoille sivulla ”Oma edistyminen” näytettävien työkalujen järjestystä. Vaihtoehtoja ovat ’quizzes’, ’learning_paths’ ja ’skills’.

### `tracking_skip_generic_data`

**Ohita yleiset tiedot oppijan itse seurannan sivulla**

Jos sivu ”Oma edistyminen” latautuu liian hitaasti, saatat haluta poistaa käyttäjän yleisten tilastojen käsittelyn. Ota tällöin tämä asetus käyttöön.

*Oletus: `false`*