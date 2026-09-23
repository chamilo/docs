# Keskustelualueiden asetukset

Kurssin **Keskustelualueet**-työkalun toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Keskustelualueet**. Tässä kategoriassa on **9 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_forum_category_language_filter`

**Keskustelualuekategorioiden kielisuodatin**

Lisää kielisuodatin keskustelualuenäkymään, jotta näkyvät vain tietylle kielelle määritetyt kategoriat. Edellyttää 'language'-lisäkentän käyttöä 'forum_category'-entiteetissä.

*Oletus: `false`*

### `allow_forum_post_revisions`

**Keskustelualueviestin tarkistus**

Ota tämä asetus käyttöön, jotta omalle keskustelualueviestille voi pyytää tarkistusta tai käännöstä. Laajasti määritettynä sitä voidaan käyttää yhteistyöhön muiden käyttäjien kanssa kieltenoppimisen keskustelualueella.

*Oletus: `false`*

### `community_managers_user_list`

**Yhteisömoderaattoreiden luettelo**

Anna taulukko käyttäjätunnisteista, joita pidetään yhteisömoderaattoreina erityisellä kurssilla, joka on määritetty globaaliksi keskustelualueeksi. Yhteisömoderaattoreilla on lisäoikeuksia globaalilla keskustelualueella.

### `default_forum_view`

**Keskustelualueen oletusnäkymä**

Mikä pitäisi olla oletusvaihtoehto uutta keskustelualuetta luotaessa. Kuka tahansa kouluttaja voi kuitenkin valita eri näkymän jokaiselle yksittäiselle keskustelualueelle

*Oletus: `flat`*

### `display_groups_forum_in_general_tool`

**Näytä ryhmien keskustelualueet yleisessä keskustelualueessa**

Näytä ryhmien keskustelualueet keskustelualuetyökalussa kurssitasolla. Tämä asetus on oletuksena käytössä (tässä tapauksessa ryhmän keskustelualueen yksilölliset näkyvyydet toimivat edelleen lisäkriteerinä). Jos asetus on pois käytöstä, ryhmien keskustelualueet näkyvät vain ryhmätyökalun kautta, olivatpa ne julkisia tai eivät.

*Oletus: `true`*

### `forum_fold_categories`

**Keskustelualuekategorioiden taittaminen**

Visuaalinen tehoste, joka mahdollistaa keskustelualuekategorioiden taittamisen ja avaamisen.

*Oletus: `false`*

### `global_forums_course_id`

**Käytä kurssia globaalina keskustelualueena**

Aseta sen kurssin tunniste (numeerinen), joka on varattu käytettäväksi globaalina keskustelualueena. Tämä korvaa sosiaalisen verkon 'Sosiaaliset ryhmät' -linkin linkillä kyseisen kurssin keskustelualueeseen.

*Oletus: `0`*

### `hide_forum_post_revision_language`

**Piilota keskustelualueviestin tarkistuksen kieli**

Piilota mahdollisuus määrittää kieli keskustelualueviestin tarkistukselle.

*Oletus: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Keskustelualueilmoitukset myös peruskurssilta**

Ota tämä asetus käyttöön, jotta peruskurssin keskustelualueelta tulevat ilmoitukset ovat käytössä, vaikka kurssia seurattaisiin session kautta.

*Oletus: `false`*