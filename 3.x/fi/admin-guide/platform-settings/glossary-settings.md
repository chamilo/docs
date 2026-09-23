# Sanaston asetukset

Kurssin **Sanaston** työkalun toiminta.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Sanasto**. Tässä kategoriassa on **3 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen, jotka toimitetaan alustan asetusten fixture-tiedostoissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_remove_tags_in_glossary_export`

**Poista HTML-tunnisteet sanaston viennistä**

Kun käytössä, HTML-tunnisteet poistetaan sanaston termien määritelmistä viennin yhteydessä.

*Oletus: `false`*

### `default_glossary_view`

**Sanaston oletusnäkymä**

Valitse, mitä näkymää ('table' tai 'list') käytetään oletuksena sanastotyökalussa.

*Oletus: `table`*

### `show_glossary_in_extra_tools`

**Näytä sanaston termit lisätyökaluissa**

Täältä voit määrittää, miten sanaston termit lisätään lisätyökaluihin, kuten oppimispolkuun ja harjoitustyökaluun