# Arviointikirja (arvioinnit) -asetukset

Oletukset, jotka koskevat **Arviointikirja (arvioinnit)** -työkalua — pistemäärän näyttö, desimaalitarkkuus, todistuksen pisterajat ja aggregointi.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Arviointikirja (arvioinnit)**. Tässä kategoriassa on **34 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_gradebook_comments`

**Arviointikirjan kommentit**

Ota arviointikirjan kommentit käyttöön, jotta opettajat voivat lisätä kommentin oppijan kokonaissuorituksesta tässä kurssissa. Kommentti näkyy oppijan PDF-viennissä.

*Oletus: `false`*


### `allow_gradebook_stats`

**Välimuistita tulokset arviointikirjassa**

Sijoita osa suurista keskiarvolaskennoista välimuistikenttiin linkeille ja arvioinneille nopeuden lisäämiseksi (huomattavasti). Mahdollinen haittapuoli on, että arviointikirjan tulostaulukoiden päivittäminen voi kestää jonkin aikaa.

*Oletus: `false`*

### `gradebook_badge_sidebar`

**Arviointikirjan merkkien sivupalkki**

Luo sivupalkin valikkoon lohko, jossa muutama merkki voidaan näyttää odottavana hyväksyntänä. Edellyttää, että arviointikirjat on listattu tähän (numeerisella) ID:llä.

### `gradebook_default_grade_model_id`

**Oletusarviointimalli**

Tämä arvo valitaan oletuksena kurssia luotaessa

### `gradebook_default_weight`

**Oletuspaino arviointikirjassa**

Tätä painoa käytetään oletuksena kaikissa kursseissa

*Oletus: `100`*

### `gradebook_dependency`

**Arviointikirjojen väliset riippuvuudet**

Ottaa käyttöön arviointikirjojen riippuvuusmekanismin, jonka avulla käyttäjät tietävät, mitkä muut kohteet heidän on käytävä ensin läpi arviointikirjan suorittamiseksi.

*Oletus: `false`*


### `gradebook_dependency_mandatory_courses`

**Pakolliset kurssit arviointikirjan riippuvuuksille**

Kun käytetään arviointikirjojen välisiä riippuvuuksia, voit valita luettelon pakollisista kursseista, jotka vaaditaan ennen minkä tahansa riippuvuuksia sisältävän arviointikirjan hyväksymistä.

### `gradebook_detailed_admin_view`

**Näytä lisäsarakkeet arviointikirjassa**

Näytä oppijan näkymässä arviointikirjassa lisäsarakkeet, joissa on kaikkien oppijoiden paras pistemäärä, raporttia katsovan oppijan suhteellinen sijoitus ja koko oppijaryhmän keskiarvo.

*Oletus: `false`*


### `gradebook_display_extra_stats`

**Arviointikirjan lisätilastot**

Lisää lisäsarakkeita arviointikirjan pääraporttiin (1 = sijoitus, 2 = paras pistemäärä, 3 = keskiarvo).

### `gradebook_enable`

**Arvioinnit-työkalun aktivointi**

Arvioinnit-työkalu mahdollistaa organisaation osaamisten arvioinnin yhdistämällä luokka- ja verkkoaktiviteettien arvioinnit suoritusraportteihin. Haluatko aktivoida sen?

*Oletus: `true`*


### `gradebook_enable_grade_model`

**Ota arviointikirjamalli käyttöön**

Mahdollistaa arviointikirjan kategorioiden automaattisen luonnin kurssissa arviointikirjamallien perusteella.

*Oletus: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Ota taidot käyttöön arviointikirjan alakategoriassa**

Taidot myönnetään yleensä koko arviointikirjan suorittamisesta. Ottamalla tämän valinnan käyttöön voit liittää taitoja arviointikirjojen osioihin.

*Oletus: `false`*


### `gradebook_flatview_extrafields_columns`

**Käyttäjän lisäkentät arviointikirjan tasaisessa näkymässä**

Lisää annetut sarakkeet ('variables'-taulukko) arviointikirjan päätulostaulukkoon.

### `gradebook_hide_graph`

**Piilota arviointikirjan kaaviot**

Jos portaalin resurssit ovat rajalliset, dynaamisten arviointikirjakaavioiden generoinnin vähentäminen, kun tuloksia voi olla tuhansia, on hyvä vaihtoehto.

*Oletus: `false`*


### `gradebook_hide_link_to_item_for_student`

**Piilota kohdelinkit oppijoilta arviointikirjassa**

Estä oppijoita napsauttamasta kohteita arviointikirjasta poistamalla linkit kohteista.

*Oletus: `false`*


### `gradebook_hide_pdf_report_button`

**Piilota arviointikirjan painike 'lataa PDF-raportti'**

Poistaa PDF-vientipainikkeen arviointikirjan näkymistä oppijoilta.

*Oletus: `false`*


### `gradebook_hide_table`

**Piilota arviointikirjataulukko oppijoilta**

Vähennä arviointikirjan latausaikaa piilottamalla tulostaulukko (mutta säilytä silti pääsy todistuksiin, taitoihin jne.).

*Oletus: `false`*

### `gradebook_locking_enabled`

**Ota käyttöön arviointien lukitus opettajille**

Kun tämä asetus on käytössä, se mahdollistaa minkä tahansa arvioinnin lukituksen vastaavan kurssin opettajille. Tämä puolestaan estää opettajaa muuttamasta tuloksia arvioinnissa käytetyissä resursseissa: kokeissa, oppimispoluissa, tehtävissä jne. Ainoa rooli, jolla on oikeus avata lukittu arviointi, on ylläpitäjä. Opettajalle ilmoitetaan tästä mahdollisuudesta. Arviointikirjojen lukitseminen ja avaaminen kirjataan järjestelmän tärkeiden toimintojen raporttiin

*Oletus: `false`*

### `gradebook_multiple_evaluation_attempts`

**Salli useat arviointiyritykset arviointikirjassa**

Mahdollistaa kommenttien lisäämisen useisiin arviointiyrityksiin arviointikirjassa ja tulos taulukoissa.

*Oletus: `false`*


### `gradebook_number_decimals`

**Desimaalien määrä**

Mahdollistaa pistemäärässä sallittujen desimaalien määrän asettamisen

*Oletus: `0`*

### `gradebook_pdf_export_settings`

**Arviointikirjan PDF-viennin asetukset**

Muuta oppijoiden PDF-vientiä annettujen asetusten perusteella ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Arviointikirjaraporttien pistemäärätyyli**

Lisää arviointikirjan pistemäärätyylin määritys tasaisessa näkymässä. Katso api.lib.php löytääksesi vaihtoehdot: esimerkit SCORE_DIV = 1, SCORE_PERCENT = 2, jne.

*Oletus: `1`*


### `gradebook_score_display_colorsplit`

**Kynnysarvo**

Kynnysarvo (prosentteina), jonka alapuolella pistemäärät värjätään punaisiksi

*Oletus: `50`*


### `gradebook_score_display_custom`

**Osaamistasojen nimeäminen**

Valitse ruutu ottaaksesi käyttöön osaamistasojen nimeämisen

*Oletus: `false`*


### `gradebook_score_display_custom_standalone`

**Mukautettu pistemäärän näyttö arviointikirjan erillisessä sarakkeessa**

Näyttää mukautetut osaamistasoarvot erillisessä sarakkeessa arviointikirjan tasaisessa näkymässä, kun käytetään mukautettua pistemäärän näyttöä.

*Oletus: `false`*


### `gradebook_score_display_upperlimit`

**Näytä pistemäärän yläraja**

Valitse ruutu näyttääksesi pistemäärän ylärajan

*Oletus: `false`*


### `gradebook_use_apcu_cache`

**Käytä APCu-välimuistia arviointikirjan nopeuttamiseen**

Paranna nopeutta renderöitäessä arviointikirjan opiskelijaraportteja Doctrine APCU -välimuistilla. APCu on valinnainen mutta suositeltu PHP-laajennus.

*Oletus: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Käytä testiasetuksia arvosanojen näyttöön**

Soveltaa harjoituksen pistemäärän näyttöasetuksia (prosentti vs. pisteet) kategorian pistemääriin arviointikirjassa.

*Oletus: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Käytä globaalia pistemäärän näyttöasetusta arviointikirjassa**

Soveltaa globaaleja harjoituksen pistemäärän näyttöasetuksia kokonaispistemäärän laskentoihin arviointikirjassa.

*Oletus: `false`*


### `hide_gradebook_percentage_user_result`

**Piilota prosenttiosuus parhaissa/keskimääräisissä arviointikirjan tuloksissa**

Poistaa prosenttiosuuden näytön parhaista/keskimääräisistä pistemäärätuloksista, jotka näytetään oppijoille arviointikirjassa.

*Oletus: `true`*


### `my_display_coloring`

**Näytä värit pistemäärille arviointikirjassa**

Ottaa käyttöön värikoodauksen pistemäärien paremman näkyvyyden vuoksi arviointikirjassa.

*Oletus: `false`*


### `student_publication_to_take_in_gradebook`

**Arviointikirjaan huomioitava tehtävä**

Tehtävätyökalussa opiskelijat voivat ladata useamman kuin yhden tiedoston. Jos yhdelle tehtävälle on useampi kuin yksi, mikä niistä tulisi huomioida sijoitettaessa heitä arviointikirjassa? Tämä riippuu metodologiastasi. Käytä 'first' korostaaksesi huolellisuutta (kuten ajallaan palauttamista ja oikean työn palauttamista ensin). Käytä 'last' korostaaksesi yhteistyötä ja sopeutuvaa työskentelyä.

*Oletus: `first`*


### `teachers_can_change_grade_model_settings`

**Opettajat voivat muuttaa arviointikirjan malliasetuksia**

Muokattaessa arviointikirjaa

*Oletus: `true`*


### `teachers_can_change_score_settings`

**Opettajat voivat muuttaa arviointikirjan pistemääräasetuksia**

Muokattaessa arviointikirjan asetuksia

*Oletus: `true`*