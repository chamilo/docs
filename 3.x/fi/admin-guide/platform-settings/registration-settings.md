# Rekisteröintiasetukset

Itsepalvelurekisteröinnin käytäntö ja rekisteröinnin jälkeiset uudelleenohjaukset — mitä uusilta käyttäjiltä kysytään ja minne he päätyvät.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Rekisteröinti**. Tässä kategoriassa on **21 asetusta**, jotka on lueteltu alla otsikolla ja kommentilla sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_double_validation_in_registration`

**Kaksoisvahvistus rekisteröintiprosessissa**

Näytä rekisteröintisivulla yksinkertainen vahvistuspyyntö ennen käyttäjän luomista.

*Oletus: `false`*


### `allow_fields_inscription`

**Rajoita rekisteröinnissä näytettäviä kenttiä**

Jos haluat näyttää vain osan käytettävissä olevista profiilikentistä, voit täydentää taulukon tässä alaelementeillä 'fields' ja 'extra_fields', jotka sisältävät taulukot näytettävien kenttien luetteloineen.

### `allow_invitation_registration` **v3**

**Salli rekisteröityminen kurssikutsulinkkien kautta**

Kun asetus on käytössä, opettaja/ylläpitäjä voi lähettää kurssin Käyttäjät-työkalusta kertakäyttöisen kutsulinkin, jonka avulla rekisteröitymätön henkilö pääsee rekisteröintilomakkeeseen ja voi rekisteröityä, vaikka yleinen itsepalvelurekisteröinti (`allow_registration`) olisi pois käytöstä.

*Oletus: `false`*

Opettajan näkökulma tähän ominaisuuteen on kuvattu kohdassa [Käyttäjien tilaaminen](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email).

### `allow_lostpassword`

**Unohtunut salasana**

Saavatko käyttäjät pyytää unohtunutta salasanaansa?

*Oletus: `true`*

### `allow_registration`

**Rekisteröinti**

Onko rekisteröityminen uutena käyttäjänä sallittu? Voivatko käyttäjät luoda uusia tilejä?

*Oletus: `false`*

### `allow_registration_as_teacher`

**Rekisteröityminen opettajaksi**

Voiko rekisteröityä opettajaksi (oikeudella luoda kursseja)?

*Oletus: `false`*

### `allow_terms_conditions`

**Ota käyttöehdot käyttöön**

Tämä asetus näyttää käyttöehdot uusien käyttäjien rekisteröintilomakkeessa. Se on ensin määritettävä portaalin hallintasivulla.

*Oletus: `false`*


### `drh_autosubscribe`

**Henkilöstöjohtajan automaattinen tilaus**

Henkilöstöjohtajan automaattinen tilaus – ei vielä saatavilla

### `extendedprofile_registration`

**Portfoliokentät rekisteröinnissä**

Mitkä seuraavista portfolion kentistä on oltava käytettävissä käyttäjän rekisteröintiprosessissa? Tämä edellyttää, että portfolio-asetus on käytössä (ks. yllä).

### `extendedprofile_registrationrequired`

**Pakolliset portfoliokentät rekisteröinnissä**

Mitkä seuraavista portfolion kentistä ovat *pakollisia* käyttäjän rekisteröintiprosessissa? Tämä edellyttää, että portfolio-asetus on käytössä ja että kenttä on myös saatavilla rekisteröintilomakkeessa (ks. yllä).

### `extldap_config`

**LDAP-yhteyden määritys**

Taulukko, joka määrittää LDAP-palvelimen isäntänimen ja portin.

### `hide_legal_accept_checkbox`

**Piilota käyttöehtojen hyväksymisen valintaruutu**

Jos arvoksi asetetaan true, "Olen lukenut ja hyväksyn" -valintaruutu poistetaan käyttöehtosivun kulusta.

*Oletus: `false`*


### `platform_unsubscribe_allowed`

**Salli alustalta irtisanoutuminen**

Ottamalla tämän asetuksen käyttöön annat minkä tahansa käyttäjän poistaa oman tilinsä ja siihen liittyvät tiedot pysyvästi alustalta. Tämä on varsin jyrkkä toimenpide, mutta se on tarpeen julkisille portaaleille, joissa käyttäjät voivat rekisteröityä itse. Käyttäjäprofiiliin ilmestyy lisäkohta, josta voi irtisanoutua vahvistuksen jälkeen.

*Oletus: `false`*


### `redirect_after_login`

**Uudelleenohjaus kirjautumisen jälkeen (profiileittain)**

Määritä uudelleenohjaus profiileittain kirjautumisen jälkeen JSON-objektilla, esimerkiksi {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Oletus:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Pakolliset lisäkentät rekisteröinnissä**

Taulukko lisäkenttien tunnisteista, jotka on täytettävä käyttäjän rekisteröinnin aikana.

### `required_profile_fields`

**Pakolliset kentät rekisteröinnissä**

Taulukko profiilikenttien nimistä (email, phone, language, official_code), jotka on annettava rekisteröinnin aikana.

### `send_inscription_msg_to_inbox`

**Lähetä tervetuloviesti sähköpostiin ja saapuneisiin**

Oletuksena tervetuloviesti (tunnuksineen) lähetetään vain sähköpostitse. Ota tämä asetus käyttöön, jotta se lähetetään myös käyttäjän Chamilo-saapuneisiin.

*Oletus: `false`*


### `sessionadmin_autosubscribe`

**Istuntoylläpitäjän automaattinen tilaus**

Istuntoylläpitäjän automaattinen tilaus – ei vielä saatavilla

### `student_autosubscribe`

**Oppijan automaattinen ilmoittautuminen**

Oppijan automaattinen ilmoittautuminen – ei vielä käytettävissä

### `teacher_autosubscribe`

**Opettajan automaattinen ilmoittautuminen**

Opettajan automaattinen ilmoittautuminen – ei vielä käytettävissä

### `user_hide_never_expire_option`

**Piilota käyttäjien 'ei vanhene koskaan' -vaihtoehto**

Poista 'ei vanhene koskaan' -vaihtoehto käyttäjätiliä luotaessa/muokattaessa.

*Oletus: `false`*