# Istuntojen asetukset

Oletukset ja toiminta **istunnoille** — istunnon elinkaari, ohjaajien käyttöikkunat, kurssin näkyvyys istunnossa ja vastaavat.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Istunnot**. Tässä kategoriassa on **68 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `add_users_by_coach`

**Salli ohjaajien rekisteröidä käyttäjiä**

Ohjaajat voivat luoda käyttäjiä alustalle ja liittää käyttäjiä istuntoon.

*Oletus: `false`*

### `allow_career_diagram`

**Ota urakaaviot käyttöön**

Urakaaviot mahdollistavat urien, taitojen ja kurssien kaavioiden näyttämisen.

*Oletus: `false`*


### `allow_career_users`

**Ota urakaaviot käyttöön käyttäjille**

Jos urakaaviot ovat käytössä, käyttäjät näkevät ne (ja vain omiin opintoihinsa liittyvät kaaviot) vain, jos otat tämän valinnan käyttöön.

*Oletus: `false`*

### `allow_coach_to_edit_course_session`

**Salli ohjaajien muokata kurssi-istuntojen sisällä**

Salli ohjaajien muokata kurssi-istuntojen sisällä

*Oletus: `true`*

### `allow_delete_user_for_session_admin`

**Istuntojen ylläpitäjät voivat poistaa käyttäjiä**

Istuntojen ylläpitäjät voivat poistaa käyttäjiä alustalta hallitessaan istuntojaan.

*Oletus: `false`*


### `allow_disable_user_for_session_admin`

**Istuntojen ylläpitäjät voivat poistaa käyttäjiä käytöstä**

Istuntojen ylläpitäjät voivat poistaa käyttäjätilit käytöstä estääkseen kirjautumisen säilyttäen samalla ilmoittautumistiedot istunnoissaan.

*Oletus: `false`*


### `allow_edit_tool_visibility_in_session`

**Salli työkalujen näkyvyyden muokkaus istunnoissa**

Istuntoja käytettäessä oletustoiminta on käyttää peruskurssissa määritettyä työkalujen näkyvyyttä. Tämä asetus muuttaa sen niin, että istuntokurssien ohjaajat voivat mukauttaa työkalujen näkyvyyttä tarpeisiinsa.

*Oletus: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Ohjaa istuntoon rekisteröitymisen jälkeen istunnon Tietoja-sivulta**

Ohjaa uudet käyttäjät automaattisesti istuntosivulleen sen jälkeen, kun he ovat suorittaneet rekisteröitymisen istunnon Tietoja-sivun kautta.

*Oletus: `false`*


### `allow_search_diagnostic`

**Ota istuntojen hakudiagnoosi käyttöön**

Salli ohjaajien saada diagnoosi, jonka avulla he voivat etsiä oppijoille parhaita istuntoja.

*Oletus: `false`*


### `allow_session_admin_extra_access`

**Istunnon ylläpitäjä voi käyttää käyttäjien erätuontia, -päivitystä ja -vientiä**

Istuntojen ylläpitäjät voivat käyttää käyttäjien erätuontia, -päivitystä ja -vientiä tavallisten oikeuksiensa lisäksi.

*Oletus: `false`*


### `allow_session_admin_login_as_teacher`

**Istuntojen ylläpitäjät voivat kirjautua opettajina**

Istuntojen ylläpitäjät voivat esiintyä opettajatilinä esikatsellakseen kurssisisältöä ja opiskelijakokemusta istunnoissaan.

*Oletus: `false`*


### `allow_session_admin_read_careers`

**Istuntojen ylläpitäjät voivat tarkastella uria**

[päätelty] Istuntojen ylläpitäjät voivat tarkastella ja käyttää hallitsemiinsa istuntoihin liittyviä urapolkuja ja ylennystyönkulkuja.

*Oletus: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Salli istuntojen ylläpitäjien nähdä kaikki istunnot**

Kun tätä valintaa ei ole otettu käyttöön (oletus), istuntojen ylläpitäjät näkevät vain itse luomansa istunnot. Tämä on hämmentävää avoimessa ympäristössä, jossa istuntojen ylläpitäjien voi olla tarpeen jakaa tukiaikaa kahden istunnon kesken.

*Oletus: `false`*

### `allow_session_course_copy_for_teachers`

**Salli opettajille kopiointi istunnosta toiseen**

Ota tämä valinta käyttöön, jotta opettajat voivat kopioida sisältönsä yhden istunnon kurssista toisen istunnon kurssiin. Oletuksena tämä valinta on käytettävissä vain alustan ylläpitäjille.

*Oletus: `false`*

### `allow_teachers_to_create_sessions`

**Salli opettajien luoda istuntoja**

Opettajat voivat luoda, muokata ja poistaa omia istuntojaan.

*Oletus: `false`*

### `allow_tutors_to_assign_students_to_session`

**Ohjaajat voivat liittää opiskelijoita istuntoihin**

Kun käytössä, istuntojen kurssiohjaajat voivat liittää uusia käyttäjiä istuntoonsa. Muuten tämä valinta on käytettävissä vain ylläpitäjille ja istuntojen ylläpitäjille.

*Oletus: `false`*

### `allow_user_session_collapsable`

**Salli käyttäjän tiivistää istunnot Omat istunnot -sivulla**

Käyttäjät voivat tiivistää istuntokortteja tai -ryhmiä Omat istunnot -sivulla visuaalisen hälyn vähentämiseksi ja navigoinnin parantamiseksi.

*Oletus: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Peruskurssin opettaja näkee tehtävät kaikista istunnoista**

Näytä kaikki oppijoiden julkaisut (peruskurssista ja kaikista istunnoista) peruskurssin work/pending.php-sivulla.

*Oletus: `false`*

### `career_diagram_disclaimer`

**Näytä vastuuvapauslauseke urakaavion alla**

Lisää vastuuvapauslauseke urakaavion alle. Kielimuuttujan nimeltä 'Career diagram disclaimer' on oltava olemassa alikielessäsi.

*Oletus: `false`*

### `career_diagram_legend`

**Näytä selite urakaavion alla**

Lisää uraselite urakaavion alle. Kielimuuttujan nimeltä 'Career diagram legend' on oltava olemassa alikielessäsi.

*Oletus: `false`*

### `courses_list_session_title_link`

**Istunnon otsikon linkkityyppi**

Kurssien/istuntojen sivulla istunnon otsikko voi olla jokin seuraavista: 0 = ei linkkiä (piilota istunnon otsikko) ; 1 = linkitä otsikko erityiseen istuntosivuun ; 2 = linkki kurssiin, jos kursseja on vain yksi ; 3 = istunnon otsikko tekee kurssiluettelosta taitettavan ; 4 = ei linkkiä (näytä istunnon otsikko).

*Oletus: `1`*

### `default_session_list_view`

**Istuntoluettelon oletusnäkymä**

Valitse oletusvälilehti, jonka haluat nähdä avatessasi istuntoluettelon ylläpitäjänä.

*Oletus: `all`*


### `drh_can_access_all_session_content`

**HR-johtajat pääsevät kaikkeen istunnon sisältöön**

Jos käytössä, henkilöstöjohtajat saavat pääsyn kaikkeen sisältöön ja käyttäjiin niissä istunnoissa, joita he seuraavat.

*Oletus: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Ota käyttöön istuntokohtaisen sisällön kopiointi toiseen istuntoon**

Mahdollistaa istunnossa luotujen resurssien monistamisen istuntoa kopioitaessa.

*Oletus: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Lisää salasanan nollauslinkki istuntoon ilmoittautumisen sähköposti-ilmoitukseen**

Sisällytä salasanan nollauslinkki ilmoittautumisen vahvistussähköposteihin, jotka lähetetään käyttäjille, kun heidät ilmoitetaan istuntoon.

*Oletus: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Lisää käyttäjätunnus istuntoon ilmoittautumisen sähköposti-ilmoitukseen**

Sisällytä käyttäjän käyttäjätunnus ilmoittautumisen vahvistussähköposteihin, jotka lähetetään, kun heidät ilmoitetaan istuntoon.

*Oletus: `false`*


### `enable_auto_reinscription`

**Ota automaattinen uudelleenilmoittautuminen käyttöön**

Ota automaattinen uudelleenilmoittautuminen käyttöön tai pois käytöstä, kun kurssin voimassaolo päättyy. Liittyvä cron-työ on myös aktivoitava.

*Oletus: `false`*


### `enable_session_replication`

**Ota istunnon replikointi käyttöön**

Ota automaattinen istunnon replikointi käyttöön tai pois käytöstä. Liittyvä cron-työ on myös aktivoitava.

*Oletus: `false`*


### `extend_rights_for_coach`

**Laajenna tutoreiden oikeuksia**

Ota tämä asetus käyttöön, jotta tutoreille annetaan samat käyttöoikeudet kuin kouluttajilla sisällöntuotantotyökaluissa

*Oletus: `false`*

### `hide_courses_in_sessions`

**Piilota kurssiluettelo istunnoissa**

Kun istuntolohko näytetään kurssisivullasi, piilota kyseisen istunnon kurssiluettelo (näytä ne vain kyseisen istunnon omalla näytöllä).

*Oletus: `false`*

### `hide_reporting_session_list`

**Piilota istuntoluettelo raportointityökalussa**

Kurssin sisältävät istunnot luetellaan raportointityökalussa kurssin sisällä, mikä voi lisätä huomattavasti kuormitusta, jos samaa kurssia käytetään sadoissa istunnoissa. Tämä asetus poistaa kyseisen luettelon.

*Oletus: `false`*


### `hide_search_form_in_session_list`

**Piilota hakulomake istuntoluettelossa**

Poista hakukenttä istuntoluettelon näkymästä hallintakäyttöliittymässä.

*Oletus: `false`*


### `hide_session_graph_in_my_progress`

**Piilota istuntokaavio Omassa edistymisessä**

Piilota istunnon edistymiskaaviot ja visualisoinnit Oppijan kojjen Oma edistyminen -sivulta.

*Oletus: `false`*


### `hide_tab_list`

**Piilota välilehdet istuntosivulla**

Poista navigointivälilehdet istunnon tietosivulta käyttöliittymän yksinkertaistamiseksi.

### `limit_session_admin_list_users`

**Istuntoylläpitäjiltä kielletään pääsy käyttäjäluetteloon**

Estä istuntoylläpitäjiä pääsemästä globaaliin käyttäjäluetteloon hallintakäyttöliittymässä.

*Oletus: `false`*


### `limit_session_admin_role`

**Rajoita istuntoylläpitäjien käyttöoikeuksia**

Jos käytössä, istuntoylläpitäjät näkevät vain Käyttäjä-lohkon 'Lisää käyttäjä' -valinnalla ja Istunnot-lohkon 'Istuntoluettelo' -valinnalla.

*Oletus: `false`*

### `my_courses_session_order`

**Muuta istuntojen oletusjärjestystä Omissa istunnoissa**

Oletuksena istunnot järjestetään alkamispäivän mukaan. Muuta tätä antamalla taulukko tyyppiä ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Näytä omat kurssini istunnoittain**

Ota käyttöön lisäsivu 'Omat kurssit', jossa istunnot näkyvät osana kursseja eikä päinvastoin.

*Oletus: `false`*

### `my_progress_session_show_all_courses`

**Oma edistyminen: näytä kurssin tiedot istunnossa**

Näytä kunkin kurssin kaikki tiedot istunnossa, kun istunnon tietoja napsautetaan.

*Oletus: `false`*


### `prevent_session_admins_to_manage_all_users`

**Estä istuntoylläpitäjiä hallitsemasta kaikkia käyttäjiä**

Kun tämä asetus on käytössä, istuntoylläpitäjät näkevät hallintasivulla vain itse luomansa käyttäjät.

*Oletus: `false`*

### `remove_session_url`

**Piilota linkki istuntosivulle**

Piilota linkki istuntosivulle istuntojen luettelosta.

*Oletus: `false`*


### `session_admins_access_all_content`

**Istuntojen ylläpitäjät voivat käyttää kaikkea kurssisisältöä**

Istuntojen ylläpitäjät voivat tarkastella kaikkea kurssisisältöä istunnoissaan, mukaan lukien rajoitetut tai arkistoidut materiaalit.

*Oletus: `false`*

### `session_admins_edit_courses_content`

**Istuntojen ylläpitäjät voivat muokata kurssisisältöä**

Istuntojen ylläpitäjät voivat muokata kurssisisältöä (asiakirjat, harjoitukset, työkalut) istuntoihinsa liitetyillä kursseilla.

*Oletus: `false`*

### `session_automatic_creation_user_id`

**Automaattisesti luodun istunnon luojan tunnus**

Määritä käyttäjä, jota käytetään automaattisesti luotujen istuntojen luojana (jotta jokaista istuntoa ei liitetä käyttäjään '1', joka on usein portaalin ylläpitäjä).

*Oletus: `1`*


### `session_classes_tab_disable`

**Poista luokan lisääminen istuntokurssille muilta kuin ylläpitäjiltä**

Poista välilehti luokkien lisäämiseksi istuntokurssille muilta kuin ylläpitäjiltä.

*Oletus: `false`*


### `session_coach_access_after_duration_end`

**Keston mukaan määritetyt istunnot ovat aina tutoreiden käytettävissä**

Muussa tapauksessa istuntojen tutoreilla on pääsy keston mukaan määritettyihin istuntoihin vain aktiivisen keston aikana.

*Oletus: `false`*


### `session_course_ordering`

**Istuntokurssien manuaalinen järjestäminen**

Ota tämä asetus käyttöön, jotta istuntojen ylläpitäjät voivat järjestää kurssit istunnon sisällä manuaalisesti. Jos asetus on pois käytöstä, kurssit järjestetään aakkosjärjestyksessä kurssin nimen mukaan.

*Oletus: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Rajoita kurssille ilmoittautuminen vain istunnon käyttäjiin**

Rajoita kurssi-istuntoon ilmoitettavien opiskelijoiden luetteloa. Ja poista käyttäjien ilmoittautuminen kaikille kursseille Käytä istuntoa -sivulta.

*Oletus: `false`*


### `session_courses_read_only_mode`

**Aseta kurssi vain luku -tilaan istunnossa**

Anna opettajien asettaa joitakin kursseja vain luku -tilaan, kun ne avataan istuntojen kautta. Kurssin ominaisuuksissa valitse vaihtoehto 'Lukitse kurssi istunnossa'.

*Oletus: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Aseta pakolliset lisäkentät istunnon luontilomakkeessa**

Vaadi luetellut kentät istuntoa luotaessa.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Esitäytä istuntokentät käyttäjäkentillä**

Taulukko suhteista käyttäjän lisäkenttien ja istunnon lisäkenttien välillä, jotta istunto voidaan esitäyttää käyttäjän tietoja vastaavilla tiedoilla.

### `session_days_after_coach_access`

**Tutorin oletusarvoiset käyttöoikeuspäivät istunnon jälkeen**

Oletusarvoinen päivien määrä, jonka ajan tutori voi käyttää istuntoa virallisen istunnon päättymispäivän jälkeen

### `session_days_before_coach_access`

**Tutorin oletusarvoiset käyttöoikeuspäivät ennen istuntoa**

Oletusarvoinen päivien määrä, jonka ajan tutori voi käyttää istuntoa ennen virallista istunnon alkamispäivää

### `session_import_settings`

**Istunnon tuonnin asetukset**

Taulukko asetuksista, joita käytetään oletusparametreina CSV/XML-istunnon tuonnissa.

### `session_list_order`

**Istunnot tukevat manuaalista järjestämistä**

Ota käyttöön istuntojen manuaalinen uudelleenjärjestäminen hallinnan istuntoluettelossa vetämällä ja pudottamalla tai vastaavalla mekanismilla.

*Oletus: `false`*


### `session_list_show_count_users`

**Näytä käyttäjien määrä istuntoluettelossa**

Ylläpitäjä näkee kunkin istunnon käyttäjien määrän. Tämä lisää istuntoluettelon kuormitusta, joten jos käytät sitä usein, harkitse huolellisesti, haluatko ylimääräisen odotusajan.

*Oletus: `false`*


### `session_list_view_remaining_days`

**Näytä jäljellä olevat päivät Omat istunnot -sivulla**

Jos asetus on käytössä, istuntojen päivämäärät "Omat istunnot" -sivulla korvataan jäljellä olevien päivien määrällä.

*Oletus: `false`*

### `session_model_list_field_ordered_by_id`

**Järjestä istuntomallit tunnuksen mukaan istunnon luontilomakkeessa**

[päätelty] Järjestä istuntomallit numeerisen tunnuksen mukaan istunnon luontilomakkeen avattavassa valikossa aakkosjärjestyksen sijaan nimen mukaan.

*Oletus: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Estä ilmoitettujen käyttäjien tyhjentäminen istuntoon ilmoittauduttaessa**

Kun käytetään useiden oppijoiden ilmoittamista istuntoon, estä tavanomainen toiminta, jossa käyttäjät, jotka eivät ole oikeassa paneelissa, poistetaan ilmoittautumisesta lähetettäessä. Säilytä kaikki käyttäjät siellä.

*Oletus: `false`*


### `show_all_sessions_on_my_course_page`

**Näytä kaikki istunnot 'Omat kurssit' -sivulla**

Jos asetus on käytössä, tämä vaihtoehto näyttää kaikki käyttäjän istunnot kalenteripohjaisessa näkymässä.

*Oletus: `true`*


### `show_session_coach`

**Näytä istunnon tutori**

Näytä yleisen istuntotutorin nimi istunnon otsikkoruudussa kurssiluettelossa

*Oletus: `false`*

### `show_session_data`

**Näytä istuntotietojen otsikko**

Näytä istuntotietojen kommentti

*Oletus: `false`*

### `show_session_description`

**Näytä istunnon kuvaus**

Näytä istunnon kuvaus kaikkialla, missä tämä asetus on toteutettu (istuntojen seurantasivut jne.)

*Oletus: `false`*

### `show_simple_session_info`

**Näytä yksinkertaiset istuntotiedot**

Lisää ohjaaja ja päivämäärät istunnon alaotsikkoon istuntoluettelossa.

*Oletus: `true`*


### `show_users_in_active_sessions_in_tracking`

**Näytä seurannassa vain aktiivisten istuntojen käyttäjät**

Näytä oppijaseurannan ja raportointinäkymien yhteydessä vain tällä hetkellä aktiivisten istuntojen käyttäjät.

*Oletus: `false`*


### `tracking_columns`

**Mukauta kurssi-istunnon seurantasarakkeita**

Määritä saraketaulukko seuraaville raporteille: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Automaattisesti luotujen istuntojen kesto**

Yhden käyttäjän automaattisesti luotujen istuntojen kesto (päivinä). Voimassaolon päätyttyä käyttäjä ei voi ilmoittautua samaan kurssiin (uutta istuntoa ei luoda).

*Oletus: `1095`*


### `user_session_display_mode`

**Omat istunnot -näyttötila**

Valitse, miten sivu ”Omat istunnot” näytetään: nykyaikaisena visuaalisena lohko- (kortti)näkymänä tai klassisena luettelotyylinä.

*Oletus: `list`*