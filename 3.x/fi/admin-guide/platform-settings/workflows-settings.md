# Työnkulkujen asetukset

Poikkileikkaavat työnkulkujen kytkimet — kurssien luonti, ilmoittautumisen validointi, tehtävien työnkulut ja vastaavat.

Avaa nämä asetukset kohdasta **Hallinta > Määritysasetukset > Työnkulut**. Tässä kategoriassa on **23 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostossa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_user_course_subscription_by_course_admin`

**Salli käyttäjän kurssi-ilmoittautuminen kurssin ylläpitäjän toimesta**

Tämän valinnan aktivointi sallii kurssin ylläpitäjän ilmoittaa käyttäjiä kurssille

*Oletus: `true`*


### `allow_users_to_create_courses`

**Salli muiden kuin ylläpitäjien luoda kursseja**

Salli muiden kuin ylläpitäjien (opettajien) luoda uusia kursseja palvelimelle

*Oletus: `false`*


### `allow_working_time_edition`

**Ota käyttöön kurssityöajan muokkaus**

Ota tämä ominaisuus käyttöön, jotta opettajat voivat manuaalisesti päivittää oppijoiden kurssilla viettämää aikaa.

*Oletus: `false`*


### `course_visibility_change_only_admin`

**Kurssin näkyvyyden muutokset vain ylläpitäjille**

Poista muilta kuin ylläpitäjiltä mahdollisuus muuttaa kurssin näkyvyyttä. Näkyvyys voi olla ongelma, kun opettajia on liian monta suoraan hallittavaksi. Näkyvyyksien pakottaminen auttaa organisaatiota hallitsemaan kurssikatalogeja paremmin.

*Oletus: `false`*


### `default_menu_entry_for_course_or_session`

**Oletusvalikkokohta kursseille**

Määritä 'Kurssit'-kohdan oletusalielementit, jotka näytetään, jos käyttäjä ei ole ilmoittautunut millekään kurssille eikä sessioon.

*Oletus: `my_courses`*


### `disable_user_conditions_sender_id`

**Käyttäjän sisäinen tunnus, jota käytetään poistettujen tilien ilmoitusten lähettämiseen**

Vältä liiallista henkilökohtaisuutta käyttäjiä kohtaan käyttämällä 'botti'-tiliä sähköpostien lähettämiseen, kun käyttäjän tili poistetaan käytöstä jostain syystä.

*Oletus: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Poista kurssiohjaajien muokkausmahdollisuus käytöstä**

Kun asetus on pois käytöstä, ylläpitäjillä ei ole linkkiä, jolla voisi nopeasti määrittää ohjaajia session kursseille kurssin muokkaussivulla.

*Oletus: `false`*


### `drh_allow_access_to_all_students`

**HRM voi käyttää kaikkien opiskelijoiden raportointisivuja**

[inferred] Myönnä HR-/DRH-päälliköille pääsy kaikkien oppijoiden raportointisivuille koko alustalla.

*Oletus: `false`*


### `gamification_mode`

**Pelillistämistila**

Aktivoi tähtisaavutukset oppimispoluissa

### `go_to_course_after_login`

**Siirry suoraan kurssille kirjautumisen jälkeen**

Kun käyttäjä on ilmoittautunut yhdelle kurssille, siirry suoraan kurssille kirjautumisen jälkeen

*Oletus: `false`*


### `load_term_conditions_section`

**Lataa käyttöehtojen osio**

Oikeudellinen sopimus näytetään kirjautumisen yhteydessä tai kurssille siirryttäessä.

*Oletus: `login`*


### `multiple_url_hide_disabled_settings`

**Piilota käytöstä poistetut asetukset ali-URL-osoitteissa**

Aseta kyllä, jos haluat piilottaa asetukset kokonaan ali-URL-osoitteessa, kun asetus on poistettu käytöstä pää-URL-osoitteessa (jossa access_url_changeable-kenttä = 0)

*Oletus: `false`*


### `plugin_redirection_enabled`

**Ota uudelleenohjauslisäosa käyttöön**

Ota käyttöön vain, jos käytät Redirection-lisäosaa

*Oletus: `false`*


### `redirect_index_to_url_for_logged_users`

**Uudelleenohjaa index.php annettuun URL-osoitteeseen tunnistautuneille käyttäjille**

Jos et halua käyttää etusivua (ilmoitukset, suositut kurssit jne.), voit määritellä tässä skriptin (dokumenttijuurihakemistosta), johon käyttäjät ohjataan, kun he yrittävät ladata etusivun.

### `send_all_emails_to`

**Lähetä kaikki sähköpostit osoitteeseen**

Anna luettelo sähköpostiosoitteista, joille *kaikki* alustalta lähetetyt sähköpostit lähetetään. Sähköpostit lähetetään näihin osoitteisiin näkyvinä vastaanottajina.

### `session_admin_user_subscription_search_extra_field_to_search`

**Lisäkäyttäjäkenttä, jota käytetään sessioiden hakuun ja nimeämiseen**

Tämä asetus määrittää lisäkäyttäjäkentän avaimen (esim. "company"), jota käytetään käyttäjien hakuun ja session nimen määrittämiseen, kun opiskelijoita rekisteröidään osoitteesta /admin-dashboard/register.

### `teacher_can_select_course_template`

**Opettaja voi valita kurssin malliksi**

Salli valita kurssi malliksi uudelle kurssille, jota opettaja on luomassa

*Oletus: `true`*


### `update_student_expiration_x_date`

**Aseta vanhenemispäivä ensimmäisellä kirjautumisella**

Taulukko, joka määrittää 'days'- ja 'months'-arvot tilin vanhenemispäivän asettamiseksi, kun käyttäjä kirjautuu ensimmäisen kerran.

### `user_edition_extra_field_to_check`

**Aseta lisäkenttä laukaisimeksi rekisteröinnille entisenä oppijana**

Anna tässä lisäkentän tunniste. Jos tätä lisäkenttää päivitetään mille tahansa käyttäjälle, käynnistyy prosessi, joka tarkistaa käyttäjän pääsyn kursseille, joilla on sama annettu lisäkenttä.

### `user_number_of_days_for_default_expiration_date_per_role`

**Oletusarvoiset vanhenemispäivät roolin mukaan**

Taulukko muodossa rooli => luku, joka ilmaisee, montako päivää tili on voimassa ennen vanhenemista roolista riippuen.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Estä käyttäjän poistaminen kurssilta/sessiosta, kun käyttäjä poistetaan ryhmästä/luokasta**

[inferred] Kun käyttäjä poistetaan ryhmästä/luokasta, älä automaattisesti poista häntä liittyviltä kursseilta tai sessioista.

*Oletus: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Estä käyttäjän poistaminen kurssilta, kun kurssi poistetaan ryhmästä/luokasta**

[inferred] Kun kurssi poistetaan ryhmästä/luokasta, älä automaattisesti poista käyttäjiä kyseiseltä kurssilta.

*Oletus: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Estä käyttäjän poistaminen sessiosta, kun sessio poistetaan ryhmästä/luokasta**

[inferred] Kun sessio poistetaan ryhmästä/luokasta, älä automaattisesti poista käyttäjiä kyseisestä sessiosta.

*Oletus: `false`*