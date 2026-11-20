# Groepsinstellingen

Gedrag van de cursustool **Groepen**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Groepen**. Deze categorie bevat **4 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de fixtures voor de instellingen van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_group_categories`

**Groepscategorieën**

Docenten toestaan categorieën aan te maken in de tool Groepen?

*Standaard: `false`*


### `allow_invite_non_friends_to_social_groups`

**Niet-vrienden uitnodigen voor sociale groepen toestaan**

Alleen een platformbeheerder of de beheerder/moderator van een sociale groep kan personen daarvoor uitnodigen (**Sociaal netwerk > Groepen >** de groep **> Vrienden uitnodigen**). Deze instelling bepaalt wie zij kunnen uitnodigen.

* **Uit (standaard)** — de groepsbeheerder of moderator kan alleen de eigen bevestigde vrienden uitnodigen. Het uitnodigingsformulier toont alleen die vrienden, en de server weigert ook elke andere gebruiker, zelfs als die handmatig wordt ingediend: er verschijnt een waarschuwing "Sommige van de geselecteerde gebruikers kunnen niet worden uitgenodigd en zijn overgeslagen". Openstaande vriendschapsverzoeken tellen niet als vrienden.
* **Aan** — zij kunnen ook elke andere gebruiker van het platform uitnodigen. Onder de vriendenlijst van het uitnodigingsformulier verschijnt een extra zoekveld **Gebruikers**.

Dezelfde regel geldt voor het scherm voor groepsuitnodigingen van de nieuwe sociale interface.

Variabele: `group.allow_invite_non_friends_to_social_groups`

**Bestaande installaties:** de instellingenrij wordt aangemaakt door de migratie voor synchronisatie van instellingen opnieuw uit te voeren (`doctrine:migrations:execute 'Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000' --up`). Tot die tijd gedraagt de instelling zich als "Uit" en verschijnt zij niet op de beheerpagina.

*Standaard: `false`*


### `hide_course_group_if_no_tools_available`

**Cursusgroep verbergen als er geen tool is**

Als er geen tool beschikbaar is in een groep en de gebruiker niet is ingeschreven voor de groep zelf, de groep volledig verbergen in de groepenlijst.

*Standaard: `false`*


### `show_groups_to_users`

**Klassen aan gebruikers tonen**

De klassen aan gebruikers tonen. Klassen zijn een functie waarmee u groepen gebruikers rechtstreeks in een sessie of een cursus kunt inschrijven of uitschrijven, waardoor de administratieve last afneemt. Wanneer u deze optie kiest, kunnen cursisten via hun interface voor het sociale netwerk zien in welke klas zij zitten.

*Standaard: `false`*