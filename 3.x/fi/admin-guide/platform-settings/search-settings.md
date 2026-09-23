# Hakutoiminnot

Kokotekstihakujärjestelmän (Xapian) asetukset.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Haku**. Tässä kategoriassa on **3 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `search_enabled`

**Kokotekstihakutoiminto**

Valitse 'Kyllä' ottaaksesi tämän toiminnon käyttöön. Se on vahvasti riippuvainen PHP:n Xapian-laajennuksesta, joten se ei toimi, jos tätä laajennusta ei ole asennettu palvelimellesi vähintään versiossa 1.x.

*Oletus: `false`*


### `search_prefilter_prefix`

**Erityiskenttä esisuodatukseen**

Tällä valinnalla voit valita erityiskentän, jota käytetään esisuodatustyyppisessä haussa.

### `search_show_unlinked_results`

**Kokotekstihaku: näytä linkittämättömät tulokset**

Kun näytetään kokotekstihaun tuloksia, mitä pitäisi tehdä tuloksille, joihin nykyisellä käyttäjällä ei ole pääsyä?

*Oletus: `true`*