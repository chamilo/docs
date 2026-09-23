# Ryhmien asetukset

Kurssin **Ryhmät**-työkalun toiminta.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Ryhmät**. Tässä kategoriassa on **3 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_group_categories`

**Ryhmäkategoriat**

Sallitaanko opettajien luoda kategorioita Ryhmät-työkalussa?

*Oletus: `false`*


### `hide_course_group_if_no_tools_available`

**Piilota kurssiryhmä, jos työkalua ei ole**

Jos ryhmässä ei ole yhtään työkalua käytettävissä eikä käyttäjä ole rekisteröitynyt itse ryhmään, piilota ryhmä kokonaan ryhmäluettelosta.

*Oletus: `false`*


### `show_groups_to_users`

**Näytä luokat käyttäjille**

Näytä luokat käyttäjille. Luokat ovat ominaisuus, jonka avulla voit rekisteröidä/poistaa rekisteröinnin käyttäjäryhmille suoraan istuntoon tai kurssille, mikä vähentää hallinnollista vaivaa. Kun valitset tämän vaihtoehdon, oppijat näkevät sosiaalisen verkon käyttöliittymänsä kautta, mihin luokkaan he kuuluvat.

*Oletus: `false`*