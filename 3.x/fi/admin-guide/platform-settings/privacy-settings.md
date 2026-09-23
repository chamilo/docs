# Tietosuoja-asetukset

Tietosuoja- ja henkilötietojen suojauksen (GDPR-tyyppiset) hallintatoiminnot — suostumus, tietojen vienti, tilin poistopyynnöt ja vastaavat.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Tietosuoja**. Tässä kategoriassa on **6 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `data_protection_officer_email`

**Tietosuojavastaavan sähköpostiosoite**

Nimetyn tietosuojavastaavan sähköpostiosoite, joka näytetään GDPR-/tietosuojaosioissa.

### `data_protection_officer_name`

**Tietosuojavastaavan nimi**

Nimetyn tietosuojavastaavan koko nimi, joka näytetään henkilötieto- ja tietosuojasivuilla.

### `data_protection_officer_role`

**Tietosuojavastaavan rooli**

Nimetyn tietosuojavastaavan virkanimike tai rooli, joka näytetään nimen rinnalla tietosuojatiedoissa.

### `disable_change_user_visibility_for_public_courses`

**Estä käyttäjätyökalun näyttäminen julkisissa kursseissa**

Estä ketään tekemästä ”käyttäjät”-työkalua näkyväksi julkisella kurssilla.

*Oletus: `true`*

### `disable_gdpr`

**Poista GDPR-ominaisuudet käytöstä**

Jos hallinnoit henkilötietojen suojaa koskevaa ilmoitusta käyttäjille jo muualla, voit turvallisesti poistaa tämän ominaisuuden käytöstä.

*Oletus: `true`*

### `hide_user_field_from_list`

**Piilota kentät kurssin käyttäjäluettelosta**

Oletuksena näytämme kaikki käyttäjätiedot kurssin käyttäjätyökalussa. Tällä taulukolla voit määrittää, mitä kenttiä et halua näyttää. Vaikuttaa vain pääkenttiin (ei lisäkenttiin).