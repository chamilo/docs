# Kurssiasetukset

Oletukset ja käytännöt, jotka koskevat kursseja koko alustalla — näkyvyys, luontioikeudet, sallitut työkalut, oppijoiden käyttöoikeudet ja vastaavat.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Kurssi**. Tässä kategoriassa on **45 asetusta**, jotka on lueteltu alla otsikolla ja kommentilla, jotka toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `active_tools_on_create`

**Aktiiviset työkalut kurssin luonnissa**

Valitse työkalut, jotka ovat *aktiivisia* kurssin luonnin jälkeen.

*Oletus:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Käytä kurssikategorioita ylimmästä URL-osoitteesta**

Moni-URL-asetuksissa salli ylläpitäjien ja opettajien määrittää kategorioita ylimmästä URL-osoitteesta alisteisten URL-osoitteiden kursseille.

*Oletus: `false`*

### `allow_course_theme`

**Salli kurssiteemat**

Sallii kurssien graafiset teemat ja mahdollistaa kurssin käyttämän tyylitiedoston vaihtamisen mihin tahansa Chamilossa saatavilla olevaan tyylitiedostoon. Kun käyttäjä siirtyy kurssille, kurssin tyylitiedosto on etusijalla käyttäjän omaan tyylitiedostoon ja alustan oletustyylitiedostoon nähden.

*Oletus: `true`*

### `allow_public_course_with_no_terms_conditions`

**Pääsy julkisiin kursseihin käyttöehdoilla**

Kun tämä vaihtoehto on käytössä, jos kurssilla on julkinen näkyvyys sekä käyttöehdot, nämä ehdot poistetaan käytöstä kurssin ollessa julkinen.

*Oletus: `false`*

### `block_registered_users_access_to_open_course_contents`

**Estä todennettujen käyttäjien pääsy julkisiin kursseihin**

Näytä vain julkiset kurssit. Älä salli rekisteröityneiden käyttäjien päästä kursseille, joiden näkyvyys on 'avoin', elleivät he ole tilanneet kutakin näistä kursseista.

*Oletus: `false`*

### `breadcrumbs_course_homepage`

**Kurssin etusivun murupolku**

Murupolku on vaakasuuntainen linkkinavigointi, yleensä sivun vasemmassa yläkulmassa. Tämä asetus valitsee, mitä haluat näkyvän murupolussa kurssien etusivuilla

*Oletus: `course_title`*

### `course_about_teacher_name_hide`

**Piilota kurssin opettajan tiedot kurssin tietosivulla**

Piilota opettajan tiedot kurssin tietosivulla.

*Oletus: `false`*

### `course_category_code_to_use_as_model`

**Rajoita kurssimallit yhteen kurssikategoriaan**

Anna kategoriakoodi, jota käytetään kurssimalleina. Vain nämä kurssit näkyvät avattavassa valikossa kurssin luonnin yhteydessä, eivätkä käyttäjät näe tämän kategorian kursseja kurssiluettelossa.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Lisäkentät, jotka näytetään kurssiasetuksissa**

Tässä taulukossa määritellyt kentät näkyvät kurssiasetussivulla.

### `course_creation_by_teacher_extra_fields_to_show`

**Lisäkentät, jotka näytetään kurssin luontilomakkeessa**

Tässä taulukossa määritellyt kentät näkyvät lisäkenttinä kurssin luontilomakkeessa.

### `course_creation_donate_link`

**Lahjoituslinkki kurssin luontisivulla**

Sivu, johon lahjoitusviestin tulee linkittää (täydellinen URL).

### `course_creation_donate_message_show`

**Näytä lahjoitusviesti kurssin luontisivulla**

Lisää viestilaatikko kurssin luontisivulle opettajille, jossa heitä pyydetään lahjoittamaan projektille.

*Oletus: `false`*

### `course_creation_form_hide_course_code`

**Poista kurssikoodikenttä kurssin luontilomakkeesta**

Jos sitä ei anneta, kurssikoodi luodaan oletuksena kurssin otsikon perusteella, joten ota tämä asetus käyttöön poistaaksesi koodikentän kokonaan kurssin luontilomakkeesta.

*Oletus: `false`*

### `course_creation_form_set_course_category_mandatory`

**Aseta kurssikategoria pakolliseksi**

Kurssia luotaessa tee kurssikategoriasta pakollinen asetus.

*Oletus: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Lisäkentät, jotka vaaditaan kurssin luontilomakkeessa**

Tässä taulukossa määritellyt kentät ovat pakollisia kurssin luontilomakkeessa.

### `course_creation_splash_screen`

**Aloitusnäyttö kursseille**

Näytä aloitusnäyttö uutta kurssia luotaessa.

*Oletus: `true`*

### `course_creation_use_template`

**Käytä mallikurssia uusille kursseille**

Aseta tämä käyttääksesi samaa mallikurssia (tunnistetaan tietokannan kurssin numeerisella tunnisteella) kaikille alustalla luotaville uusille kursseille. Huomaa, että jos tätä asetusta ei suunnitella asianmukaisesti, sillä voi olla merkittävä vaikutus levytilan käyttöön. Mallikurssia käytetään ikään kuin opettaja olisi kopioinut kurssin kurssin varmuuskopiointityökaluilla, joten käyttäjien sisältöä ei kopioida, vain opettajan materiaali. Kaikki muut kurssin varmuuskopiointisäännöt pätevät. Jätä tyhjäksi (tai aseta arvoksi 0) poistaaksesi käytöstä.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Esitäytä kurssikentät käyttäjän kentillä**

Jos ei ole tyhjä, kurssin luontiprosessi etsii joitakin kenttiä käyttäjäprofiilista ja täyttää ne automaattisesti kurssille. Esimerkiksi digitaaliseen markkinointiin erikoistunut opettaja voisi automaattisesti asettaa « digital marketing » -lipun jokaiselle luomalleen kurssille.

### `course_hide_tools`

**Piilota työkalut opettajilta**

Valitse työkalut, jotka haluat piilottaa opettajilta. Tämä estää pääsyn työkaluun.

### `course_images_in_courses_list`

**Kurssien mukautetut kuvakkeet**

Käytä kurssikuvia kurssikuvakkeena kurssiluetteloissa (oletusarvoisen vihreän liitutaulukuvakkeen sijaan).

*Oletus: `true`*

### `course_log_default_extra_fields`

**Käyttäjän lisäkentät oletuksena kurssin tilastosivulla**

Määritä tähän taulukkoon niiden lisäkenttien sisäiset tunnisteet, jotka haluat näyttää oletuksena kurssin päätilastosivulla.

### `course_log_hide_columns`

**Piilota sarakkeet kurssilokeista**

Tämä taulukko antaa mahdollisuuden määrittää, mitkä sarakkeet piilotetaan kurssin päätilastosivulla ja kokonaisaikaraportissa.

### `course_sequence_valid_only_in_same_session`

**Vahvista esitiedot vain saman session sisällä**

Kun käytössä, kurssi katsotaan vahvistetuksi vain, jos se on suoritettu nykyisessä sessiossa. Jos pois käytöstä, muissa sessioissa suoritetut kurssit avaavat myös riippuvaiset kurssit.

*Oletus: `false`*


### `course_student_info`

**Kurssin opiskelijatietojen näyttö**

Näytä ’Omat kurssit’/’Omat sessiot’ -sivuilla lisätietoja opiskelijan pistemäärästä, edistymisestä ja/tai todistuksen hankkimisesta.

### `course_validation`

**Kurssien validointi**

Kun 'Kurssien validointi' -ominaisuus on käytössä, opettaja ei voi luoda kurssia yksin. Hän täyttää kurssipyynnön. Alustan ylläpitäjä tarkistaa pyynnön ja hyväksyy tai hylkää sen.<br />Tämä ominaisuus perustuu automaattisiin sähköpostiviesteihin; määritä Chamilo käyttämään sähköpostipalvelinta ja erillistä sähköpostitiliä.

*Oletus: `false`*


### `course_validation_terms_and_conditions_url`

**Kurssin validointi – linkki käyttöehtoihin**

Tämä on URL-osoite 'Käyttöehdot'-asiakirjaan, joka on voimassa kurssipyyntöä tehtäessä. Jos osoite on asetettu tähän, käyttäjän tulee lukea ja hyväksyä nämä ehdot ennen kurssipyynnön lähettämistä.<br />Jos otat käyttöön Chamilon 'Käyttöehdot'-moduulin ja haluat käyttää sen URL-osoitetta, jätä tämä asetus tyhjäksi.

### `courses_default_creation_visibility`

**Kurssin oletusnäkyvyys**

Uuden kurssin luonnin oletusnäkyvyys

*Oletus: `2`*


### `display_coursecode_in_courselist`

**Näytä koodi kurssin nimessä**

Näytä kurssikoodi kurssiluetteloissa

*Oletus: `false`*


### `display_teacher_in_courselist`

**Näytä opettaja kurssin nimessä**

Näytä opettaja kurssiluetteloissa

*Oletus: `true`*


### `enable_tool_introduction`

**Ota työkalun esittely käyttöön**

Ota esittelyt käyttöön kunkin työkalun etusivulla

*Oletus: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Näytä irtisanoutumispainike ’Omat kurssit’ -sivulla**

Lisää painike kurssilta irtisanoutumiseen ’Omat kurssit’ -sivulle.

*Oletus: `false`*

### `example_material_course_creation`

**Esimerkkimateriaali kurssin luonnissa**

Luo esimerkkimateriaali automaattisesti uutta kurssia luotaessa

*Oletus: `true`*


### `hide_course_rating`

**Piilota kurssin arviointi**

Kurssin arviointiominaisuus on oletuksena eri paikoissa. Jos et halua sitä, ota tämä asetus käyttöön.

*Oletus: `false`*

### `hide_course_sidebar`

**Piilota kurssit-lohko sivupalkista**

Näytöillä, joilla vasen valikko on näkyvissä, älä näytä « Kurssit » -osiota.

*Oletus: `true`*

### `multiple_access_url_show_shared_course_marker`

**Näytä usean URL:n jaetun kurssin merkki**

Lisää linkkikuvakkeen kursseille, jotka on jaettu URL-osoitteiden kesken, jotta käyttäjät (erityisesti opettajat) tietävät, että kurssisisältöä muokatessa on oltava erityisen varovainen.

*Oletus: `false`*

### `my_courses_show_courses_in_user_language_only`

**Näytä vain käyttäjän kielen kurssit**

Jos käytössä, tämä asetus piilottaa kaikki kurssit, joita ei ole asetettu käyttäjän kielelle.

*Oletus: `false`*

### `profiling_filter_adding_users`

**Suodata käyttäjiä profiilikenttien perusteella kurssille ilmoittautumisessa**

Salli opettajien suodattaa käyttäjiä lisäkenttien perusteella sivulla, jolla käyttäjiä ilmoitetaan heidän kurssilleen.

*Oletus: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Näytä riippuvuudet kurssin esittelyssä**

Kun käytetään resurssien järjestystä kurssien tai sessioiden kanssa, näytä kurssin riippuvuudet kurssin etusivulla.

*Oletus: `false`*

### `scorm_cumulative_session_time`

**Kumulatiivinen istuntoaika SCORM:lle**

Kun käytössä, SCORM-oppimispolkujen istuntoaika on kumulatiivinen; muuten se lasketaan vain viimeisestä päivitysajasta. Tämä on globaali asetus. Sitä käytetään uutta oppimispolkua luotaessa, mutta se voidaan määritellä uudelleen kullekin polulle.

*Oletus: `true`*


### `send_email_to_admin_when_create_course`

**Sähköposti-ilmoitus kurssin luonnista**

Lähetä sähköposti alustan ylläpitäjälle joka kerta, kun opettaja luo uuden kurssin

*Oletus: `false`*


### `show_course_duration`

**Näytä kurssien kesto**

Näytä kurssin kesto kurssin nimen vieressä kurssiluettelossa ja kurssilistassa.

*Oletus: `false`*

### `show_navigation_menu`

**Näytä kurssin navigointivalikko**

Näytä navigointivalikko, joka nopeuttaa työkalujen käyttöä

*Oletus: `false`*


### `show_toolshortcuts`

**Työkalujen pikakuvakkeet**

Näytä työkalujen pikakuvakkeet bannerissa?

*Oletus: `false`*

### `student_view_enabled`

**Ota oppijan näkymä käyttöön**

Ota oppijan näkymä käyttöön, jolloin opettaja tai ylläpitäjä voi nähdä kurssin sellaisena kuin oppija sen näkee

*Oletus: `true`*


### `view_grid_courses`

**Näytä kurssit ruudukkoasettelussa**

Näytä kurssit asettelussa, jossa on useita kursseja rivillä. Muuten asettelu näyttää yhden kurssin rivillä.

*Oletus: `true`*