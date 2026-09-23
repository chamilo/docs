# Tekoälyavustajien asetukset

Tekoälyavustajien (tekstin luonti, kuvien luonti, videoiden luonti, tekoälytutori, tekoälyarviointi) määritys. Kukin palveluntarjoaja voidaan ottaa käyttöön tehtävätyypeittäin. Katso myös [Tekoälyn määritys](../integrations/ai-configuration.md).

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Tekoälyavustajat**. Tässä kategoriassa on **14 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `ai_providers`

**Tekoälypalveluntarjoajien yhteystiedot**

Määritystiedot yhteyden muodostamiseen ulkoisiin tekoälypalveluihin.

### `content_analyser`

**Sisällön analysoija**

Analysoi oppimateriaaleja oivallusten poimimiseksi tai laadun parantamiseksi.

*Oletus: `false`*

### `course_analyser`

**Kurssin analysoija**

Analysoi kaikki resurssit yhdessä tai useammassa kurssissa ja esikouluttaa tekoälymallin vastaamaan mihin tahansa kysymykseen tästä tai näistä kursseista (varmista, että sisältö voidaan jakaa määritettyjen tekoälypalveluiden kanssa).

*Oletus: `false`*

### `disclose_ai_assistance`

**Ilmoita tekoälyavusta**

Näytä tunniste kaikessa sisällössä tai palautteessa, joka on luotu tai osittain luotu millä tahansa tekoälyjärjestelmällä, jotta käyttäjä näkee, että sisältö on rakennettu jonkin tekoälyjärjestelmän avulla. Tiedot siitä, mitä tekoälyjärjestelmää käytettiin missäkin tapauksessa, säilytetään tietokannassa auditointia varten, mutta ne eivät ole suoraan loppukäyttäjän saatavilla.

*Oletus: `true`*

### `enable_ai_helpers`

**Ota tekoälyavustajatyökalu käyttöön**

Ottaa käyttöön kaikki alustan saatavilla olevat tekoälypohjaiset ominaisuudet.

*Oletus: `false`*

### `exercise_generator`

**Harjoitusten generaattori**

Luo personoituja testejä tekoälyllä kurssisisällön perusteella.

*Oletus: `false`*

### `glossary_terms_generator`

**Sanastojen termien generaattori**

Antaa opettajien pyytää tekoälyn luomia sanastotermejä kurssilleen. Tämä luo 20 termiä kurssin otsikon ja kurssikuvaus-työkalun yleisen kuvauksen perusteella. Jos sitä käytetään useammin kuin kerran, se sulkee pois termit, jotka ovat jo kyseisessä sanastossa (varmista, että sisältö voidaan jakaa määritettyjen tekoälypalveluiden kanssa).

*Oletus: `false`*

### `image_generator`

**Kuvageneraattori**

Luo kuvia kehotteiden tai sisällön perusteella tekoälyllä.

*Oletus: `false`*

### `learning_path_generator`

**Oppimispolkujen generaattori**

Luo personoituja oppimispolkuja tekoälyehdotusten avulla.

*Oletus: `false`*

### `open_answers_grader`

**Avoimien vastausten arvioija**

Arvioi automaattisesti avoimet vastaukset tekoälyllä.

*Oletus: `false`*

### `task_grader`

**Tehtävien arvioija**

Käyttää tekoälyä ladattujen tehtävien arviointiin ja arvosteluun.

*Oletus: `false`*

### `tutor_chatbot`

**Tekoälyn voimin toimiva tutori-chatbot**

Tarjoaa opiskelijoille tekoälypohjaisen tutorointiavustajan.

*Oletus: `false`*

### `video_generator`

**Videogeneraattori**

Luo videoita kehotteiden tai sisällön perusteella tekoälyllä (tämä voi kuluttaa paljon tokeneita).

*Oletus: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Salli tekoälykäännös kaikkiin aktiivisiin kieliin WYSIWYG-editoreissa**

Antaa opettajien luoda käännökset kaikille alustan aktiivisille kielille yhdellä WYSIWYG-toiminnolla. Tämä voi kuluttaa suuren määrän tekoälytokeneita.

*Oletus: `true`*