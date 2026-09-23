# Tehtävät (Work) -asetukset

**Tehtävät (opiskelijoiden julkaisut)** -työkalun oletukset ja toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Tehtävät (Work)**. Tässä kategoriassa on **12 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne on toimitettu alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_compilatio_tool`

**Ota Compilatio käyttöön**

Compilatio on vilpinestopalvelu, joka vertaa tekstiä kahden palautuksen välillä ja ilmoittaa, jos on suuri todennäköisyys, että sisältö (yleensä tehtävät) ei ole aitoa.

*Oletus: `false`*

### `allow_my_student_publication_page`

**Ota Omat tehtävät -sivu käyttöön**

[päätelty] Ota käyttöön erillinen sivu, jolla oppijat voivat tarkastella ja hallita omia palautettuja tehtäviään.

*Oletus: `false`*

### `allow_only_one_student_publication_per_user`

**Opiskelijat voivat ladata vain yhden tehtävän**

[päätelty] Rajoita oppijat palauttamaan vain yksi tehtävä aktiviteettia kohden, estäen useat palautukset.

*Oletus: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Ohjaa tehtävätyökalun etusivulle latauksen tai kommentin jälkeen**

Ohjaa tehtäväluetteloon tehtävän lataamisen tai kommentin lisäämisen jälkeen

*Oletus: `false`*

### `assignment_prevent_duplicate_upload`

**Estä päällekkäiset lataukset tehtävissä**

[päätelty] Estä oppijoita lataamasta identtisiä tiedostoja samaan tehtäväpalautukseen.

*Oletus: `false`*

### `block_student_publication_add_documents`

**Estä asiakirjojen lisääminen tehtäviin**

[päätelty] Estä oppijoita lisäämästä tai liittämästä asiakirjoja tehtäviä palauttaessaan.

*Oletus: `false`*

### `block_student_publication_edition`

**Estä tehtävien muokkaus**

[päätelty] Estä oppijoita muokkaamasta tai päivittämästä palautettuja tehtäviään alkuperäisen palautuksen jälkeen.

*Oletus: `false`*

### `block_student_publication_score_edition`

**Estä opettajaa muokkaamasta tehtäväpisteitä**

[päätelty] Estä opettajia muuttamasta tehtäväpisteitä sen jälkeen, kun ne on kirjattu.

*Oletus: `false`*

### `compilatio_tool`

**Compilatio-asetukset**

Määritä Compilatio-yhteyden tiedot tässä.

### `considered_working_time`

**Ota käyttöön ajankäyttö tehtäville**

Tämä antaa opettajille mahdollisuuden antaa arvioitu ajankäyttö (muodossa hh:mm:ss) tehtävän suorittamiseen. Kun tehtävä on palautettu ja opettaja on hyväksynyt sen (tehtävälle annetaan pistemäärä), oppijalle merkitään automaattisesti vastaava aika.

*Oletus: `work_time`*

### `force_download_doc_before_upload_work`

**Pakota asiakirjan lataus ennen tehtävän palautusta**

Pakota käyttäjät lataamaan tehtävän määritelmässä annettu asiakirja ennen kuin he voivat ladata tehtävänsä.

*Oletus: `true`*

### `my_courses_show_pending_work`

**Näytä linkki 'odottaviin' tehtäviin Omat kurssit -sivulta**

[päätelty] Näytä linkki tai odottavien tehtävien määrä oppijan Omat kurssit -sivulla nopeaa pääsyä varten.

*Oletus: `false`*