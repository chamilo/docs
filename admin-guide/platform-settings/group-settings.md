# Groepsinstellingen

Gedrag van de cursus **Groepen** tool.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Groepen**. Deze categorie bevat **3 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_group_categories`

**Groepscategorieën**

Toestaan dat docenten categorieën aanmaken in de Groepen tool?

*Standaard: `false`*

### `hide_course_group_if_no_tools_available`

**Cursusgroep verbergen als geen tool beschikbaar**

Als er geen tool beschikbaar is in een groep en de gebruiker is niet geregistreerd in de groep zelf, verberg de groep dan volledig in de groepenlijst.

*Standaard: `false`*

### `show_groups_to_users`

**Klassen tonen aan gebruikers**

Toon de klassen aan gebruikers. Klassen zijn een functie waarmee u groepen gebruikers direct kunt inschrijven/uitschrijven voor een sessie of cursus, wat administratieve rompslomp vermindert. Wanneer u deze optie selecteert, kunnen leerlingen via hun sociale netwerkinterface zien in welke klas ze zitten.

*Standaard: `false`*