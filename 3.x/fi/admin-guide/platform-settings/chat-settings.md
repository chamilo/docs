# Keskusteluasetukset

Kurssin **Chat**-työkalun toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Chat**. Tässä kategoriassa on **5 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_global_chat`

**Salli globaali chat**

Käyttäjät voivat keskustella keskenään

*Oletus: `false`*

### `course_chat_restrict_to_coach`

**Rajoita kurssichat tutoreihin**

Salli opiskelijoiden keskustella kurssilla vain tutoreiden kanssa (ei muiden opiskelijoiden kanssa).

*Oletus: `false`*

### `hide_chat_video`

**Piilota videokeskusteluvaihtoehto globaalissa chatissa**

Kun asetus on käytössä, videokeskustelutoiminto on pois käytöstä eikä se ole saatavilla globaalissa chat-työkalussa.

*Oletus: `true`*

### `save_private_conversations_in_documents`

**Tallenna yksityiskeskustelut dokumentteihin**

Jos asetus on käytössä, 1:1-yksityisviestit peilataan kurssichatin historiadokumentteihin. Tietosuojan vuoksi suositellaan pitämään pois käytöstä.

*Oletus: `false`*

### `show_chat_folder`

**Näytä chat-keskustelujen historiakansio**

Tämä näyttää opettajalle kansion, joka sisältää kaikki chatissa käydyt istunnot. Opettaja voi tehdä ne näkyviksi tai näkymättömiksi oppijoille ja käyttää niitä resurssina

*Oletus: `true`*