# Woordenlijstinstellingen

Gedrag van de cursustool **Glossary**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Glossary**. Deze categorie bevat **3 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_remove_tags_in_glossary_export`

**HTML-tags verwijderen bij export van de woordenlijst**

Wanneer ingeschakeld worden HTML-tags uit de definities van woordenlijsttermen verwijderd bij het exporteren.

*Standaard: `false`*

### `default_glossary_view`

**Standaardweergave van de woordenlijst**

Kies welke weergave ('table' of 'list') standaard wordt gebruikt in de woordenlijsttool.

*Standaard: `table`*

### `show_glossary_in_extra_tools`

**Woordenlijsttermen weergeven in extra tools**

Vanuit hier kunt u configureren hoe de woordenlijsttermen worden toegevoegd in extra tools zoals de leerpad- en oefeningentool