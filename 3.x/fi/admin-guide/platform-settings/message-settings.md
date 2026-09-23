# Viestiasetukset

**Viestintä / Saapuneet**-järjestelmän toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Viestintä**. Tässä kategoriassa on **7 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_message_tool`

**Sisäinen viestityökalu**

Sisäisen viestityökalun ottaminen käyttöön mahdollistaa käyttäjien lähettää viestejä muille alustan käyttäjille ja käyttää saapuneet-kansiota.

*Oletus: `true`*

### `allow_send_message_to_all_platform_users`

**Salli viestien lähettäminen mille tahansa alustan käyttäjälle**

Mahdollistaa viestien lähettämisen mille tahansa alustan käyttäjälle, ei vain ystäville tai tällä hetkellä verkossa oleville henkilöille.

*Oletus: `false`*

### `allow_user_message_tracking`

**Ylläpitäjät voivat nähdä henkilökohtaiset viestit**

Salli ylläpitäjien nähdä opettajan ja oppijan väliset henkilökohtaiset viestit. Varmista, että sisällytät huomautuksen käyttöehtoihin, sillä tämä voi vaikuttaa yksityisyyden suojaan.

*Oletus: `false`*


### `filter_interactivity_messages`

**Opettajat voivat käyttää oppijoiden viestejä vain istunnon aikarajojen sisällä**

Suodata opettajan ja oppijan väliset viestit istunnon alku- ja loppupäivämäärien mukaan

*Oletus: `false`*


### `message_max_upload_filesize`

**Viestien enimmäislatauskoko**

Tiedostolatausten enimmäiskoko viestityökalussa (tavuina)

*Oletus: `20971520`*

### `private_messages_about_user`

**Salli opettajien väliset yksityisviestit oppijasta**

Salli opettajien/esimiesten viestien vaihto käyttäjästä kyseisen käyttäjän seurantasivulta.

*Oletus: `false`*


### `private_messages_about_user_visible_to_user`

**Salli oppijoiden nähdä heitä koskevat opettajien väliset viestit**

Jos käyttäjää koskevien viestien vaihto on käytössä, tämä asetus sallii kyseisen käyttäjän nähdä viestit. Tämä on tarkoitettu organisaation mahdollisesti noudatettavien avoimuussääntöjen täyttämiseen.

*Oletus: `false`*