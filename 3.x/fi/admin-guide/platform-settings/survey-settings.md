# Kyselyiden asetukset

**Kyselyt**-työkalun oletukset ja toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Kyselyt**. Tässä kategoriassa on **12 asetusta**, jotka on lueteltu alla otsikoineen ja kommentteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `extend_rights_for_coach_on_survey`

**Laajenna tutoreiden oikeuksia kyselyissä**

Ota tämä asetus käyttöön, jotta tutorit voivat luoda ja muokata kyselyitä

*Oletus: `true`*


### `hide_survey_edition`

**Estä kyselyn muokkaus**

Estä kyselyiden muokkaus kaikilta tässä luetelluilta kyselyiltä (koodin mukaan). Käytä * estääksesi kaikkien kyselyiden muokkauksen.

### `hide_survey_reporting_button`

**Piilota kyselyn raportointipainike**

Mahdollistaa ylläpitäjille kyselyn raportointipainikkeen piilottamisen, jos kyselyitä käytetään opettajien kartoittamiseen.

*Oletus: `false`*


### `show_pending_survey_in_menu`

**Näytä "Odottavat kyselyt" valikossa**

Näytä valikkokohta, jonka kautta käyttäjät pääsevät odottaviin kyselyihinsä.

*Oletus: `false`*


### `show_surveys_base_in_sessions`

**Näytä peruskurssin kyselyt kaikissa istuntokursseissa**

[päätelty] Tee peruskurssin kyselyistä näkyviä ja oppijoiden saatavilla kaikissa liittyvissä istuntokursseissa.

*Oletus: `false`*


### `survey_additional_teacher_modify_actions`

**Lisää lisätoimintoja (linkkeinä) opettajien kyselyluetteloihin**

Lisää toimintoja (yleensä liitännäisiin kytkettyjä) kyselyluetteloon. Käytä taulukkosyntaksia ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Salli opettajien muokata kyselykysymyksiä sen jälkeen, kun opiskelijat ovat vastanneet**

[päätelty] Salli opettajien muuttaa kyselykysymyksiä silloinkin, kun oppijat ovat jo lähettäneet vastauksia.

*Oletus: `false`*


### `survey_anonymous_show_answered`

**Salli opettajien nähdä, kuka on vastannut anonyymeissä kyselyissä**

Salli opettajien nähdä, mitkä oppijat ovat jo vastanneet anonyymiin kyselyyn. Tämä näkyy vasta, kun useampi kuin yksi käyttäjä on vastannut, joten on edelleen vaikeaa tunnistaa, kuka vastasi mitä.

*Oletus: `false`*


### `survey_backwards_enable`

**Ota käyttöön 'edellinen kysymys' -painike kyselyissä**

[päätelty] Ota käyttöön "edellinen kysymys" -navigointipainike, jotta oppijat voivat palata aiempiin kyselykysymyksiin.

*Oletus: `false`*


### `survey_duplicate_order_by_name`

**Järjestä opiskelijan nimen mukaan, kun käytetään kyselyn monistustoimintoa**

Kyselyn monistustoiminto on suunnattu opettajille, ja sen tarkoitus on pyytää opettajia antamaan arvionsa kustakin opiskelijasta järjestyksessä. Tämä asetus järjestää kysymykset oppijan sukunimen mukaan.

*Oletus: `true`*


### `survey_email_sender_noreply`

**Kyselyn sähköpostin lähettäjä (no-reply)**

Pitäisikö kyselykutsuissa käyttää tutorin sähköpostiosoitetta vai pääasetuksissa määritettyä no-reply-osoitetta?

*Oletus: `coach`* (valinta "Kurssin tutorin sähköpostin lähettäjä" — tallennettu arvo on ennallaan aiempiin Chamilo-versioihin nähden, mutta käyttöliittymässä vaihtoehto on merkitty "tutoriksi")


### `survey_mark_question_as_required`

**Merkitse kaikki kyselykysymykset oletuksena 'pakollisiksi'**

[päätelty] Merkitse kaikki uudet kyselykysymykset automaattisesti oletuksena pakollisiksi vastauksiksi.

*Oletus: `false`*