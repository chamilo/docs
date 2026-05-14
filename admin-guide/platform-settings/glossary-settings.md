# Woordenlijstinstellingen

Gedrag van de cursus **Woordenlijst**-tool.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Woordenlijst**. Deze categorie bevat **3 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_remove_tags_in_glossary_export`

**HTML-tags verwijderen bij woordenlijstexport**

Wanneer ingeschakeld, worden HTML-tags verwijderd uit de definities van woordenlijsttermen bij het exporteren.

*Standaard: `false`*

### `default_glossary_view`

**Standaardweergave woordenlijst**

Kies welke weergave ('tabel' of 'lijst') standaard wordt gebruikt in de woordenlijsttool.

*Standaard: `table`*

### `show_glossary_in_extra_tools`

**Woordenlijsttermen weergeven in extra tools**

Vanuit hier kunt u configureren hoe woordenlijsttermen worden toegevoegd aan extra tools zoals leerpad en oefeningentool.