# Taitojen asetukset

**Skills**-järjestelmän toiminta — taitopuu, myöntämissäännöt, profiili-integraatio.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Skills**. Tässä kategoriassa on **13 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_hr_skills_management`

**Salli HR-taitojen hallinta**

Mahdollistaa HR:lle taitojen hallinnan

*Oletus: `true`*


### `allow_private_skills`

**Piilota taidot oppijoilta**

Jos käytössä, taidot näkyvät vain ylläpitäjille, opettajille (jotka liittyvät käyttäjään kurssin kautta) ja HRM-käyttäjille (jos he liittyvät käyttäjään).

*Oletus: `false`*


### `allow_skill_rel_items`

**Ota käyttöön taitojen linkittäminen kohteisiin**

Tämä ottaa käyttöön keskeisen ominaisuuden, jonka avulla mikä tahansa kohde voidaan linkittää taitoon (ja siten mahdollistaa taidon hankkiminen). Ominaisuus edellyttää silti, että opettaja vahvistaa taidon hankkimisen, joten hankkiminen ei ole automaattista.

*Oletus: `false`*


### `allow_skills_tool`

**Salli Skills-työkalu**

Käyttäjät voivat nähdä taitonsa sosiaalisessa verkostossa ja lohkossa etusivulla.

*Oletus: `true`*

### `allow_teacher_access_student_skills`

**Salli opettajien pääsy oppijoiden taitoihin**

[päätelty] Sallii opettajien tarkastella ja seurata oppijoiden kursseillaan hankkimia taitoja.

*Oletus: `false`*


### `badge_assignation_notification`

**Lähetä ilmoitus oppijalle, kun taito/merkki on hankittu**

[päätelty] Lähetä ilmoituksia oppijoille, kun he hankkivat uuden taidon tai merkkisaavutuksen.

*Oletus: `false`*


### `hide_skill_levels`

**Piilota taitotasojen ominaisuus**

[päätelty] Piilota taitotasohierarkia ja tasojen nimet taitoihin liittyvissä näkymissä.

*Oletus: `false`*


### `manual_assignment_subskill_autoload`

**Taitojen osoittaminen käyttäjälle: alataitojen automaattinen lataus**

Kun taitoja osoitetaan käyttäjälle manuaalisesti, lomake voidaan asettaa tarjoamaan automaattisesti alataidon osoittamista valitsemasi taidon sijaan.

*Oletus: `false`*


### `openbadges_backpack`

**OpenBadges-reppuselaimen URL**

OpenBadges-reppuselainpalvelimen URL, jota käytetään oletuksena kaikille käyttäjille, jotka haluavat viedä merkkinsä. Oletuksena on Mozilla Foundationin avoin ja ilmainen reppuselainvarasto: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Näytä taidon koko nimi taitopyörässä**

Taitopyörässä näytetään taidon nimi, kun sillä on lyhyt koodi.

*Oletus: `false`*


### `skill_levels_names`

**Taitotasojen nimet**

Määritä taitotasojen nimet taulukkona id => name.

### `skills_hierarchical_view_in_user_tracking`

**Näytä taidot hierarkkisena taulukkona**

[päätelty] Näytä oppijan taidot hierarkkisena puurakenteena edistymis- ja raportointisivuilla.

*Oletus: `false`*


### `skills_teachers_can_assign_skills`

**Salli opettajien määrittää, mitkä taidot hankitaan heidän kursseillaan**

Oletuksena vain ylläpitäjät voivat päättää, mitkä taidot voidaan hankkia minkäkin kurssin kautta.

*Oletus: `false`*