# Oppimispolkujen asetukset

**Oppimispolut**-työkalun oletukset ja toiminta — automaattinen käynnistys, oletusnäkymä, esitiedot, SCORM-käyttäytyminen ja vastaavat.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Oppimispolut**. Tässä kategoriassa on **51 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun haluat muuttaa näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `add_all_files_in_lp_export`

**Vie kaikki tiedostot oppimispolkua vietäessä**

Kun LP viedään, kaikki tiedostot ja kansiot samassa polussa html-tiedoston kanssa viedään myös.

*Oletus: `false`*


### `allow_htaccess_import_from_scorm`

**Salli .htaccess SCORM-paketeista**

Normaalisti kaikki .htaccess-tiedostot suodatetaan ja poistetaan, kun sisältöä tuodaan Chamiloon. Tämä ominaisuus sallii .htaccess-tiedoston tuonnin, jos se on SCORM-paketissa.

*Oletus: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-tuonti kurssin tuonnin yhteydessä**

Ota käyttöön SCORM-pakettien hakemistorakenteen kopiointi kurssia palautettaessa (kurssin ylläpitotyökalusta).

*Oletus: `false`*


### `allow_lp_chamilo_export`

**Vie oppimispolut Chamilo-varmuuskopioformaatissa**

Ota käyttöön mahdollisuus viedä mikä tahansa oppimispolku Chamilo-kurssin varmuuskopioformaatissa.

*Oletus: `false`*


### `allow_lp_return_link`

**Näytä oppimispolkujen paluulinkki**

Poista tämä vaihtoehto käytöstä piilottaaksesi «Palaa etusivulle» -painikkeen oppimispoluissa

*Oletus: `true`*


### `allow_lp_subscription_to_usergroups`

**Oppimispolkujen tilaus luokille**

Ota käyttöön oppimispolkujen ja oppimispolkukategorioiden tilaus ryhmille/luokille.

*Oletus: `false`*


### `allow_session_lp_category`

**Oppimispolkukategorioita voidaan hallita sessioissa**

[päätelty] Anna oppijoille ja ohjaajille mahdollisuus järjestää ja hallita oppimispolkuja kategorioittain sessiokursseissa.

*Oletus: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Opettajat voivat käyttää estettyjä oppimispolkuja**

Opettajien ei tarvitse suorittaa oppimispolkuja kokonaan saadakseen pääsyn esitiedoilla estettyyn oppimispolkuun.

*Oletus: `false`*


### `disable_js_in_lp_view`

**Poista JS käytöstä oppimispolkujen näkymässä**

Poista käytöstä JS-tiedostot, jotka Chamilo yleensä lisää HTML-tiedostoihin oppimispolussa (niitä näytettäessä).

*Oletus: `false`*


### `disable_my_lps_page`

**Piilota sivu «Omat oppimispolut»**

Sivu «Oma oppimispolku» lisättiin versiossa 1.11. Käytä tätä vaihtoehtoa sen piilottamiseen.

*Oletus: `false`*

### `download_files_after_all_lp_finished`

**Latauspainike oppimispolkujen suorittamisen jälkeen**

Näytä tiedostojen latauspainike, kun kaikki LP:t on suoritettu. Esimerkki: jos ABC on kurssikoodi ja 1 ja 100 ovat dokumenttien tunnisteita, valitse: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Oppimispolkuihin sisältyvien testien muokkaus**

Ota käyttöön testien muokkaus, vaikka ne olisi sisällytetty oppimispolkuun. Oletuksena muokkaus estetään, jos testi on oppimispolussa, koska se voi vaikuttaa seurannan johdonmukaisuuteen monien oppijoiden kesken, jos testimuutokset ovat merkittäviä.

*Oletus: `false`*

### `hide_accessibility_label_on_lp_item`

**Piilota vaatimusten selite oppimispoluissa**

Piilota esitietojen työkaluvihje oppimispolun kohteissa. Tämä on lähinnä esteettinen valinta.

*Oletus: `true`*

### `hide_lp_time`

**Piilota aika oppimispolkujen tietueista**

Piilota oppimispolkuihin käytetty aika raporteista yleisesti.

*Oletus: `false`*

### `hide_scorm_copy_link`

**Piilota SCORM-kopiointi**

Piilota oppimispolun kopiointikuvake oppimispolkujen luettelosta

*Oletus: `false`*

### `hide_scorm_export_link`

**Piilota SCORM-vienti**

Piilota SCORM-viennin kuvake oppimispolkujen luettelosta

*Oletus: `false`*

### `hide_scorm_pdf_link`

**Piilota oppimispolun PDF-vienti**

Piilota oppimispolun PDF-viennin kuvake oppimispolkujen luettelosta

*Oletus: `true`*

### `lp_allow_export_to_students`

**Oppijat voivat viedä oppimispolkuja**

Ota tämä käyttöön, jotta oppijat voivat ladata oppimispolut SCORM-paketteina.

*Oletus: `false`*

### `lp_enable_flow`

**Siirry oppimispolkujen välillä**

Lisää mahdollisuus valita «seuraava» oppimispolku ja näyttää painikkeet oppimispolun sisällä siirtymiseen yhdestä seuraavaan.

*Oletus: `false`*

### `lp_fixed_encoding`

**Kiinteä merkistökoodaus oppimispolussa**

Vähennä resurssien käyttöä ohittamalla tuoduissa oppimispoluissa tekstin merkistökoodauksen tarkistus.

*Oletus: `false`*

### `lp_item_prerequisite_dates`

**Päivämääräpohjaiset oppimispolun kohteiden esitiedot**

Lisää vaihtoehdon määritellä esitietoja alkamis- ja päättymispäivineen oppimispolun kohteille.

*Oletus: `false`*

### `lp_menu_location`

**Oppimispolun valikon sijainti**

Aseta arvoksi 'left' tai 'right' vaihtaaksesi oppimispolun valikon puolta.

*Oletus: `left`*

### `lp_minimum_time`

**Vähimmäisaika oppimispolun suorittamiseen**

Lisää oppimispolkuihin vähimmäisaikakenttä. Jos käyttäjä ei ole viettänyt oppimispolulla kyseistä aikaa, oppimispolun viimeistä kohdetta ei voi merkitä suoritetuksi.

*Oletus: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Avaa oppimispolun kohde, jos testin ennakkoehdolle on saavutettu enimmäisyritysten määrä**

[inferred] Avaa automaattisesti seuraavat oppimispolun kohteet, kun oppija on käyttänyt ennakkoehtotestin enimmäisyritykset.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Avaa ennakkoehdot viimeisen testiyrituksen jälkeen**

Mahdollistaa käyttäjien jatkamisen oppimispolulla sen jälkeen, kun he ovat käyttäneet kaikki yritykset testissä, joka on muiden kohteiden ennakkoehto.

*Oletus: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Käytä viimeisintä pistemäärää oppimispolun testien ennakkoehdoissa**

Kun testiä käytetään oppimispolun kohteen ennakkoehtona, käytä vain testin viimeisintä yritystä ennakkoehdon validointiin (oletuksena käytetään parasta yritystä).

*Oletus: `false`*

### `lp_prevents_beforeunload`

**Estä beforeunload-JS-tapahtuma oppimispolussa**

Tämä parantaa selainyhteensopivuutta estämällä hankalien JS-tapahtumien suorittamisen.

*Oletus: `false`*

### `lp_score_as_progress_enable`

**Käytä oppimispolun pistemäärää edistymisenä**

Tämä on hyödyllistä, kun käytetään SCORM-sisältöä, jossa on vain yksi suuri SCO. SCORM ei välitä edistymistä, joten tämä on keino käyttää pistemäärää edistymisenä. Tämän asetuksen ottaminen käyttöön mahdollistaa sen määrittämisen oppimispolkukohtaisesti.

*Oletus: `false`*

### `lp_show_max_progress_instead_of_average`

**Näytä oppimispolkujen raportoinnissa keskiarvon sijaan enimmäisedistyminen**

[inferred] Laske oppimispolun edistyminen kohteiden enimmäissuorituksen perusteella kaikkien kohteiden keskiarvon sijaan.

*Oletus: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Valitse oppimispoluille enimmäisedistyminen tai keskiarvo kurssitasolla**

Ota käyttöön asetuksen uudelleenmäärittely, jotta oppimispolkujen raportoinnissa näytetään kurssitasolla keskiarvojen sijaan paras edistyminen.

*Oletus: `false`*

### `lp_show_reduced_report`

**Oppimispolut: näytä supistettu raportti**

Oppimispolkutyökalussa, kun käyttäjä tarkastelee omaa edistymistään (tilastoikonin kautta), näytä lyhennetty (vähemmän yksityiskohtainen) versio edistymisraportista.

*Oletus: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Näytä oppimispolun saatavuus oppijoille**

Näytä oppimispolut oppijoille saatavuuspäivineen sen sijaan, että ne piilotettaisiin, kunnes päivämäärä koittaa.

*Oletus: `false`*

### `lp_subscription_settings`

**Oppimispolkujen tilausasetukset**

Määritä lisäasetuksia oppimispolkujen tilausominaisuudelle. Vaihtoehtoja ovat 'allow_add_users_to_lp' ja 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Oppimispolkujen kohteet taitettavina**

[inferred] Näytä oppimispolun kohteet taitettavassa haitarimuodossa paremman navigoinnin ja sisällön organisoinnin vuoksi.

*Oletus: `false`*

### `lp_view_settings`

**Oppimispolun näyttöasetukset**

Määritä lisäasetuksia oppimispolkujen näyttämiselle. Vaihtoehtoja ovat 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' ja 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Käytä lisäkenttää student\_id-tunnuksena SCORM-viestinnässä**

Anna sen lisäkentän nimi, jota käytetään student_id-tunnuksena kaikessa SCORM-viestinnässä.

### `scorm_api_username_as_student_id`

**Käytä käyttäjänimeä student\_id-tunnuksena SCORM-viestinnässä**

[inferred] Käytä oppijan käyttäjänimeä opiskelijatunnisteena SCORM API -viestinnässä oppijan tunnuksen sijaan.

*Oletus: `false`*

### `scorm_lms_update_sco_status_all_time`

**Päivitä SCO-tila itsenäisesti**

Jos SCO ei lähetä tilaa, ota hallinta ja päivitä tila sen perusteella, mitä Chamilossa voidaan havaita.

*Oletus: `false`*

### `scorm_upload_from_cache`

**Lataa SCORM välimuistihakemistosta**

Salli ylläpitäjien ladata SCORM-paketti (zip-muodossa) välimuistihakemistoon ja käyttää sitä tuontilähteenä SCORM-lataussivulla.

*Oletus: `false`*

### `show_hidden_exercise_added_to_lp`

**Näytä oppimispolkujen testit, vaikka ne olisivat näkymättömiä**

Näytä piilotetut harjoitukset, jotka on lisätty oppimispolkuun, harjoitusluettelossa. Jos ollaan sessiossa, testi on näkymätön peruskurssilla, se sisältyy oppimispolkuun eikä sen näyttämisen asetusta ole nimenomaisesti asetettu todeksi, piilota se.

*Oletus: `true`*

### `show_invisible_exercise_in_lp_list`

**Näytä testit oppimispolun testiluettelossa, vaikka ne olisivat näkymättömiä**

[inferred] Sisällytä piilotetut testit käytettävissä olevien testien luetteloon oppimispolun sisältöä tarkasteltaessa.

*Oletus: `false`*

### `show_invisible_exercise_in_lp_toc`

**Näkymättömät testit näkyvissä oppimispoluissa**

Näytä testityökalussa 'näkymättömiksi' merkityt testit, kun ne on sisällytetty oppimispolkuun.

*Oletus: `false`*

### `show_invisible_lp_in_course_home`

**Näytä oppimispolun linkki kurssin etusivulla, kun se on näkymätön**

Jos oppimispolku on merkitty näkymättömäksi, mutta opettaja/tuutori on päättänyt tehdä sen saataville kurssin etusivulta, tämä asetus estää Chamiloa piilottamasta linkkiä kurssin etusivulla.

*Oletus: `false`*

### `show_prerequisite_as_blocked`

**Oppimispolun esitiedot**

Näytä oppimispolkujen luetteloissa visuaalinen elementti, joka osoittaa, että muut oppimispolut ovat tällä hetkellä estettyinä jonkin esitietosäännön vuoksi.

*Oletus: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Lisää hankintasarake oppijan seurannassa**

Lisää oppijan seurantasivulle sarake, joka näyttää oppijan hankintatilan oppimispolulla.

*Oletus: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Lisää näkyvyystiedot oppimispoluille oppijan seurantasivulle**

[päätelty] Näytä oppimispolkujen näkyvyystilan ilmaisin oppijan edistymisen seurantasivulla.

*Oletus: `false`*

### `student_follow_page_add_LP_subscription_info`

**Avattu-tiedot oppimispolkujen luettelossa**

Tämä lisää 'avattu'-sarakkeen oppimispolkujen luetteloon, jos oppija on tilannut kyseisen oppimispolun ja hänellä on siihen pääsy.

*Oletus: `false`*

### `student_follow_page_hide_lp_tests_average`

**Piilota prosenttimerkki oppimispolkujen testien keskiarvossa oppijan seurannassa**

Piilottaa prosentti-ikonin 'Oppimispolkujen testien keskiarvo' -ilmaisimesta opiskelijan seurannassa

*Oletus: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Sisällytä tilaamattomat oppimispolut oppijan seurantasivulle**

[päätelty] Näytä oppimispolut edistymissivuilla myös silloin, kun oppijat eivät ole tilanneet niitä.

*Oletus: `false`*

### `ticket_lp_quiz_info_add`

**Lisää oppimispolkujen ja testien tiedot tikettiraportointiin**

[päätelty] Sisällytä oppimispolun ja testin tiedot tukitikettien raportointiin paremman ongelmanseurannan mahdollistamiseksi.

*Oletus: `false`*

### `validate_lp_prerequisite_from_other_session`

**Käytä oppimispolun kohteen tilaa muista sessioista**

Salli käyttäjien täyttää oppimispolun esitiedot, jos vastaava kohde on jo suoritettu toisessa sessiossa.

*Oletus: `false`*