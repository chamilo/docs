# Groepsinstellingen

Gedrag van de cursustool **Groepen**.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Groepen**. Deze categorie bevat **3 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_group_categories`

**Groepscategorieën**

Docenten toestaan categorieën aan te maken in de tool Groepen?

*Standaard: `false`*


### `hide_course_group_if_no_tools_available`

**Cursusgroep verbergen als er geen tool is**

Als er geen tool beschikbaar is in een groep en de gebruiker zelf niet bij de groep is ingeschreven, de groep volledig verbergen in de groepenlijst.

*Standaard: `false`*


### `show_groups_to_users`

**Klassen tonen aan gebruikers**

De klassen tonen aan gebruikers. Klassen zijn een functie waarmee u groepen gebruikers rechtstreeks in een sessie of een cursus kunt in- of uitschrijven, waardoor de administratieve last afneemt. Wanneer u deze optie kiest, kunnen cursisten via hun sociale-netwerkinterface zien in welke klas zij zitten.

*Standaard: `false`*