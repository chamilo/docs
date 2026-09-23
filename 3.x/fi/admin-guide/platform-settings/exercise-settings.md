# Harjoitukset (testit) -asetukset

**Harjoitukset (testit)** -työkalun oletukset ja toiminta — kysymysten näyttö, pisteytys, yritykset ja vastaavat.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Harjoitukset (testit)**. Tässä kategoriassa on **64 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostossa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `add_exercise_best_attempt_in_report`

**Ota käyttöön parhaan pistemäärän yrityksen näyttö**

Anna lista kursseista ja testien tunnisteista, jotka näyttävät raporteissa minkä tahansa oppijan parhaan pistemäärän yrityksen.

### `allow_coach_feedback_exercises`

**Salli tuutoreiden kommentoida harjoituksia tarkistaessaan**

Salli tuutoreiden muokata palautetta harjoituksia tarkistaessaan

*Oletus: `true`*

### `allow_edit_exercise_in_lp`

**Salli opettajien muokata testejä oppimispoluissa**

Oletuksena Chamilo estää oppimispolkuun sisällytettyjen testien muokkaamisen. Tämä on sen välttämiseksi, että muutokset vaikuttaisivat oppijoihin (aiempiin ja tuleviin) eri tavalla tulosten ja/tai edistymisen osalta oppimispolussa. Tämä asetus antaa opettajien ohittaa tämän rajoituksen.


### `allow_exercise_categories`

**Ota käyttöön testikategoriat**

Testikategoriat eivät ole oletuksena käytössä, koska ne lisäävät monimutkaisuutta. Ota tämä ominaisuus käyttöön, jotta kaikki testikategorioiden hallintaan liittyvät kuvakkeet tulevat näkyviin.

*Oletus: `false`*

### `allow_mandatory_question_in_category`

**Ota käyttöön pakollisten kysymysten valinta**

Ota käyttöön pakollisten kysymysten valinta testissä, kun käytetään satunnaisia kategorioita.

*Oletus: `false`*

### `allow_notification_setting_per_exercise`

**Testin ilmoitusasetukset testitasolla**

Ota käyttöön testin palautusilmoitusten määritys testitasolla kurssitason sijaan. Palautuu kurssitason asetuksiin, jos niitä ei ole määritetty testitasolla.

*Oletus: `false`*

### `allow_quick_question_description_popup`

**Kuvan nopea lisääminen kysymykseen**

Ota käyttöön lisäkuvake testin kysymyslistassa kuvan lisäämiseksi kysymyksen kuvaukseksi. Tämä nopeuttaa huomattavasti kysymysten muokkausta, kun kysymykset ovat otsikossa ja kuvaus sisältää vain kuvan.

*Oletus: `false`*

### `allow_quiz_question_feedback`

**Lisää kysymyksen palaute, jos vastaus on väärä**

Oletuksena Chamilo antaa näyttää palautetta kullekin vastaukselle kysymyksessä. Tällä asetuksella luodaan lisäkenttä ennalta määritetyn palautteen antamiseksi koko kysymykselle. Tämä palaute näkyy vain, jos käyttäjä vastasi väärin.

*Oletus: `false`*

### `allow_quiz_results_page_config`

**Ota käyttöön testitulossivun määritys**

Määritä taulukko asetuksista, jotka haluat soveltaa kaikkiin testitulossivuihin. Asetuksia voivat olla ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ ja mahdollisesti lisää tulevaisuudessa. Etsi koodista ‘getPageConfigurationAttribute’ nähdäksesi, mitä on käytössä.

*Oletus: `false`*

### `allow_quiz_show_previous_button_setting`

**Näytä ’edellinen’-painike testissä kysymysten välillä siirtymiseen**

Aseta tämä arvoon false poistaaksesi ’edellinen’-painikkeen käytöstä kysymyksiin vastattaessa testissä, jolloin käyttäjät pakotetaan aina etenemään eteenpäin.

*Oletus: `false`*

### `allow_teacher_comment_audio`

**Äänipalaute lähetettyihin vastauksiin**

Salli opettajien antaa käyttäjille palautetta äänen avulla (tekstin vaihtoehtona) kuhunkin kysymykseen testissä.

*Oletus: `true`*

### `allow_time_per_question`

**Ota käyttöön aika per kysymys testeissä**

Oletuksena aikaa voi rajoittaa vain per testi. Rajoittaminen per kysymys lisää mahdollisuuksia, ja voit (huolellisesti) yhdistää molemmat.

*Oletus: `false`*

### `block_category_questions`

**Lukitse edellisten kategorioiden kysymykset testissä**

Kun tätä asetusta käytetään, testin määritykseen ilmestyy lisäasetus. Kun käytetään testiä, jossa on useita kysymyskategorioita, ja pyydetään jakoa kategorioittain, tämä antaa käyttäjän siirtyä kysymyksissä kategoria kerrallaan. Kun kategoria on valmis, hän siirtyy seuraavaan kategoriaan eikä voi palata edelliseen kategoriaan.

*Oletus: `false`*

### `block_quiz_mail_notification_general_coach`

**Estä testin ilmoitusten lähettäminen yleiselle tuutorille**

Kun oppijat suorittavat testin, ilmoituksia lähetetään yleensä tuutoreille, mukaan lukien istunnon yleinen tuutori. Ota tämä asetus käyttöön jättääksesi yleisen tuutorin pois näistä ilmoituksista.

*Oletus: `false`*

### `configure_exercise_visibility_in_course`

**Ota käyttöön harjoituksen näkymättömyyden ohitus istunnossa peruskurssin tasolla**

Ottaa käyttöön harjoituksen näkymättömyyden määrityksen istunnossa peruskurssilla, jotta globaali määritys voidaan ohittaa. Jos asetusta ei ole määritetty, käytetään globaalia parametria.

*Oletus: `false`*

### `disable_clean_exercise_results_for_teachers`

**Poista opettajilta käytöstä 'tyhjennä tulokset'**

Poistaa käytöstä vaihtoehdon poistaa testituloksia testiluettelosta. Tätä käytetään usein, kun kursseja hallinnoivat vähemmän huolelliset opettajat, jotta vältetään kriittiset virheet.

*Oletus: `true`*

### `email_alert_manager_on_new_quiz`

**Oletusarvoinen sähköposti-ilmoitusasetus uudesta visailusta**

Määrittää, haluatko kurssivastaavien (opettajien) saavan sähköposti-ilmoituksen, kun opiskelija vastaa visailuun. Tämä on oletusarvo kaikille uusille kursseille, mutta kukin opettaja voi silti muuttaa asetusta omalla kurssillaan.

*Oletus: `true`*

### `enable_quiz_scenario`

**Ota visailuskenaario käyttöön**

Täältä voit luoda harjoituksia, jotka ehdottavat eri kysymyksiä käyttäjän vastausten mukaan.

*Oletus: `true`*

### `exercise_additional_teacher_modify_actions`

**Lisälinkit opettajille testiluettelossa**

Määritä callback-elementit uusien toimintokuvakkeiden luomiseksi opettajille testiluettelon oikealle puolelle taulukon muodossa, esim. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Näytä käyttäjätunnus testitulossivulla**

Näytä käyttäjätunnus (käyttäjätietojen sijaan tai niiden lisäksi) testitulossivulla.

*Oletus: `false`*

### `exercise_category_report_user_extra_fields`

**Lisää käyttäjän lisäkentät harjoituskategorian raporttiin**

Määritä taulukko, jossa on luettelo käyttäjän lisäkentistä, jotka lisätään raporttiin.

### `exercise_category_round_score_in_export`

**Pyöristä pistemäärä testivienneissä**

Kun asetus on käytössä, testipisteet pyöristetään lähimpään kokonaislukuun harjoitusraportteja vietäessä.

*Oletus: `false`*

### `exercise_embeddable_extra_types`

**Upotettavat kysymystyypit**

Oletuksena vain yhden vastauksen ja usean vastauksen kysymykset otetaan huomioon, kun päätetään, voidaanko testi upottaa videoon. Tällä asetuksella voit päättää, että useampia kysymystyyppejä on käytettävissä. Huomaa, että kaikki kysymystyypit eivät sovi hyvin videoille varattuun tilaan. Kysymystyypit ovat saatavilla koodissa tiedostossa question.class.php.

### `exercise_hide_ip`

**Piilota käyttäjän IP-osoite testraporteista**

Oletuksena näytämme käyttäjätiedot ja IP-osoitteen, mutta tätä voidaan pitää henkilötietona, joten tämä asetus mahdollistaa näiden tietojen poistamisen kaikista testraporteista.

*Oletus: `false`*

### `exercise_hide_label`

**Piilota kysymysnauha (oikein/väärin) testituloksissa**

Testituloksissa näkyy oletuksena nauha, joka ilmaisee, oliko vastaus oikein vai väärin. Ota tämä asetus käyttöön poistaaksesi nauhan globaalisti.

*Oletus: `false`*

### `exercise_invisible_in_session`

**Harjoitus näkymätön istunnossa**

Jos harjoitus on näkyvissä peruskurssilla, se näkyy näkymättömänä istunnossa. Jos harjoitus on näkymätön peruskurssilla, se ei näy istunnossa.

*Oletus: `false`*

### `exercise_max_editors_in_page`

**Enimmäismäärä editoreita harjoitustulosten näytössä**

Koska harjoituksessa voi olla suuri määrä kysymyksiä, korjausnäyttö, jossa opettaja voi lisätä kommentteja kuhunkin vastaukseen, voi latautua hyvin hitaasti. Aseta tämä luku arvoon 5, jotta alusta näyttää WYSIWYG-editorit vain tiettyyn vastausten määrään asti näytöllä. Tämä nopeuttaa korjaussivun latautumista huomattavasti, mutta poistaa WYSIWYG-editorit ja jättää vain pelkän tekstieditorin.

*Oletus: `0`*


### `exercise_max_score`

**Harjoitusten enimmäispistemäärä**

Määritä enimmäispistemäärä (yleensä 10, 20 tai 100) kaikille alustan harjoituksille. Tämä määrittää, miten lopulliset tulokset näytetään käyttäjille ja opettajille.

*Oletus: `20`*


### `exercise_min_score`

**Harjoitusten vähimmäispistemäärä**

Määritä vähimmäispistemäärä (yleensä 0) kaikille alustan harjoituksille. Tämä määrittää, miten lopulliset tulokset näytetään käyttäjille ja opettajille.

*Oletus: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Ohita HTML-suodatus testin loppiviesteissä**

Oletetaan, että testien lopussa olevat viestit ovat aina turvallisia. Suodattimen poistaminen mahdollistaa JavaScriptin käytön niissä.

*Oletus: `false`*


### `exercise_score_format`

**Testien pistemäärän muoto**

Valitse seuraavista muodoista käyttäjien pistemäärän näyttämiseen eri raporteissa: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Käytä sen muodon numeerista tunnusta, jota haluat käyttää.

*Oletus: `0`*

### `exercises_disable_new_attempts`

**Poista uudet testiyritykset käytöstä**

Poistaa uudet testiyritykset käytöstä globaalisti. Käytetään yleensä, kun testeissä on yleinen ongelma ja haluat aikaa analysointiin estämättä koko alustaa.

*Oletus: `false`*

### `hide_free_question_score`

**Piilota avointen kysymysten pisteet**

Piilota se, että avoimilla kysymyksillä (mukaan lukien ääni ja merkinnät) on pisteitä, piilottamalla pisteiden näyttö kaikissa oppijalle näkyvissä raporteissa.

*Oletus: `false`*


### `hide_user_info_in_quiz_result`

**Piilota käyttäjätiedot testitulossivulla**

Oletusarvoinen testitulossivu näyttää käyttäjän tietokortin (kuva, nimi jne.), jota voidaan joissakin yhteyksissä pitää henkilötietojen käsittelyn rajojen venyttämisenä. Ota tämä asetus käyttöön poistaaksesi käyttäjän tiedot testituloksista.

*Oletus: `false`*


### `limit_exercise_teacher_access`

**Rajoita opettajien oikeuksia testeihin**

Kun asetus on käytössä, opettajat eivät voi poistaa testejä tai kysymyksiä, muuttaa testien näkyvyyttä, ladata QTI-muotoon, tyhjentää tuloksia jne.

*Oletus: `false`*


### `my_courses_show_pending_exercise_attempts`

**Yleinen keskeneräisten testien luettelo**

Ota käyttöön, jotta loppukäyttäjälle näytetään sivu, jossa on luettelo keskeneräisistä testeistä kaikissa kursseissa.

*Oletus: `false`*


### `question_exercise_html_strict_filtering`

**Ohita HTML-suodatus testikysymyksissä**

Oleta, että testien kysymystekstit ovat aina turvallisia. Suodattimen poistaminen mahdollistaa JavaScriptin käytön niissä.

*Oletus: `false`*


### `question_pagination_length`

**Kysymysten sivutuksen pituus opettajille**

Kysymysten määrä, joka näytetään kullakin sivulla, kun opettajien kysymysten sivutus on käytössä.

*Oletus: `20`*


### `quiz_answer_extra_recording`

**Ota käyttöön vastausten lisätallennus testeissä**

Ota käyttöön kaikkien vastausten (myös tilapäisten) tallennus tauluun track_e_attempt_recording. Tämä ominaisuus on kokeellinen ja voi aiheuttaa ongelmia raportointisivuilla, kun testiä yritetään arvioida.

*Oletus: `false`*


### `quiz_check_all_answers_before_end_test`

**Tarkista kaikki vastaukset ennen testin lähettämistä**

Näytä ponnahdusikkuna, jossa on luettelo vastatuista/vastaamattomista kysymyksistä ennen testin lähettämistä.

*Oletus: `false`*


### `quiz_check_button_enable`

**Lisää vastausten tallennusprosessin tarkistus ennen testiä**

Varmista, että käyttäjät ovat valmiita aloittamaan testin tarjoamalla simulaatio kysymysten tallennusprosessista ennen testiin siirtymistä. Tämä mahdollistaa joidenkin yhteysongelmien varhaisen havaitsemisen ja vähentää käyttäjäkokemuksen kitkaa.

*Oletus: `false`*


### `quiz_confirm_saved_answers`

**Lisää valintaruutu vastausten määrän vahvistusta varten**

Tämä asetus lisää kunkin testin loppuun valintaruudun, jossa käyttäjää pyydetään vahvistamaan tallennettujen vastausten määrä. Tämä tarjoaa paremmat auditointitiedot kriittisissä testeissä.

*Oletus: `false`*


### `quiz_discard_orphan_in_course_export`

**Hylkää orvot kysymykset kurssin viennissä**

Kun kurssia viedään, älä vie kysymyksiä, jotka eivät kuulu mihinkään testiin.

*Oletus: `false`*


### `quiz_generate_certificate_ending`

**Luo todistus testin päättyessä**

Luo todistus, kun tentti päättyy. Tentin on oltava linkitettynä arviointikirjatyökaluun, ja sille on oltava määritettynä läpäisyprosentti.

*Oletus: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Piilota testin yritystaulukko testin aloitussivulla**

Piilota taulukko, joka näyttää kaikki aiemmat yritykset testin aloitussivulla.

*Oletus: `false`*


### `quiz_hide_question_number`

**Piilota kysymyksen numero**

Piilota kysymysten juokseva numerointi testiä suoritettaessa.

*Oletus: `false`*


### `quiz_image_zoom`

**Ota käyttöön testikuvien zoomaus**

Ota tämä ominaisuus käyttöön, jotta käyttäjät voivat zoomata testeissä käytettyjä kuvia.

### `quiz_keep_alive_ping_interval`

**Pidä istunto aktiivisena testeissä**

Pidä istunto aktiivisena lähettämällä säännöllinen ping-signaali palvelimelle x sekunnin välein, määritä tässä. Suosittelemme kerran 300 sekunnin välein.

*Oletus: `0`*


### `quiz_open_question_decimal_score`

**Desimaalipisteet avointen kysymystyyppien arvioinnissa**

Salli opettajan arvioida avoimet, suullisen ilmaisun ja merkintäkysymystyypit desimaalipisteillä.

*Oletus: `false`*


### `quiz_prevent_copy_paste`

**Estä kopiointi ja liittäminen testeissä**

Estä kopiointi-/liittämis-/tallennus-/tulostusnäppäimet ja hiiren oikeat napsautukset harjoituksissa.

*Oletus: `false`*

### `quiz_question_category_destinations` **v3**

**Ota käyttöön progressiiviset mukautuvat testit kategorian kohteen mukaan**

Ota käyttöön progressiiviset mukautuvat testit, joissa kukin kysymyskategoria voi ohjata oppijat toiseen kategoriaan heidän pistemääränsä perusteella.

*Oletus: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Poista kysymykset automaattisesti testiä poistettaessa**

Oletuskäyttäytyminen on tehdä kysymyksistä orpoja, kun ainoa niitä käyttävä testi poistetaan. Kun asetus on käytössä, se varmistaa, että myös kaikki muuten orvoiksi jäävät kysymykset poistetaan.

*Oletus: `false`*


### `quiz_results_answers_report`

**Näytä linkki testitulosten lataamiseen**

Näytä testitulossivulla linkki tulosten lataamiseen tiedostona.

*Oletus: `false`*


### `quiz_show_description_on_results_page`

**Näytä testin kuvaus aina tulossivulla**

Kun asetus on käytössä, testin kuvaus näytetään aina tulossivulla testin suorittamisen jälkeen.

*Oletus: `false`*

### `score_grade_model`

**Pisteiden arvosanamalli**

Määritä taulukko pisterajoista ja väreistä, joita käytetään raporteissa tämän mallin mukaisesti. Näin voit näyttää värejä numeeristen arvosanojen sijaan.

### `send_score_in_exam_notification_mail_to_manager`

**Lisää pistemäärä tentin palautuksen sähköposti-ilmoitukseen**

Lisää oppijan pistemäärä opettajalle tentin palautuksen jälkeen lähetettävään sähköposti-ilmoitukseen.

*Oletus: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Näytä tenttiyritykset kaikista sessioista odottavien tenttien raportissa**

Näytä käyttäjien tenttiyritykset kaikista sessioista, joihin yleisellä tutorilla on pääsy, odottavien tenttien raportissa.

*Oletus: `false`*


### `show_exercise_expected_choice`

**Näytä odotettu valinta tenttituloksissa**

Näytä odotettu valinta ja tila (oikein/väärin) kullekin vastaukselle tenttitulossivulla (jos tentti on määritetty näyttämään tulokset).

*Oletus: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Näytä pistemäärä varmuusastekysymyksille**

Oletuksena Chamilo ei näytä pistemäärää varmuusastekysymystyypeille.

*Oletus: `false`*


### `show_exercise_session_attempts_in_base_course`

**Näytä tenttiyritykset kaikista sessioista peruskurssilla**

Näytä käyttäjien tenttiyritykset kaikista sessioista opettajalle peruskurssilla.

*Oletus: `false`*


### `show_official_code_exercise_result_list`

**Näytä virallinen koodi tenttituloksissa**

Näytetäänkö opiskelijoiden virallinen koodi tenttitulosraporteissa

*Oletus: `false`*

### `show_question_id`

**Näytä kysymysten tunnisteet tenteissä**

Näytä kysymysten sisäiset tunnisteet, jotta käyttäjät voivat merkitä muistiin tiettyihin kysymyksiin liittyviä ongelmia ja raportoida niistä tehokkaammin.

*Oletus: `false`*


### `show_question_pagination`

**Näytä kysymysten sivutus opettajille**

Tenteissä, joissa on paljon kysymyksiä, käytä sivutusta, jos kysymysten määrä ylittää tämän asetuksen. Aseta arvoksi 0, jos et halua käyttää sivutusta.

*Oletus: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Näytä poistetut tentit sivulla 'Oma edistyminen'**

Ota tämä asetus käyttöön, jotta sivulla 'Oma edistyminen' näytetään kaikkien suorittamiesi tenttien tulokset, myös poistettujen.

*Oletus: `false`*