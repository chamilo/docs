# Vaardighedeninstellingen

Gedrag van het **Vaardigheden**-systeem — vaardighedenboom, toekenningsregels, profielintegratie.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Vaardigheden**. Deze categorie bevat **13 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_hr_skills_management`

**HR-beheer van vaardigheden toestaan**

Staat HR toe vaardigheden te beheren

*Standaard: `true`*


### `allow_private_skills`

**Vaardigheden verbergen voor cursisten**

Indien ingeschakeld, zijn vaardigheden alleen zichtbaar voor beheerders, docenten (gekoppeld aan een gebruiker via een cursus) en HRM-gebruikers (indien gekoppeld aan een gebruiker).

*Standaard: `false`*


### `allow_skill_rel_items`

**Koppelen van vaardigheden aan items inschakelen**

Dit schakelt een belangrijke functie in waarmee elk item kan worden gekoppeld aan (en daarmee de verwerving van) een vaardigheid. De functie vereist nog steeds dat de docent de verwerving van de vaardigheid bevestigt, zodat de verwerving niet automatisch is.

*Standaard: `false`*


### `allow_skills_tool`

**Vaardighedentool toestaan**

Gebruikers kunnen hun vaardigheden zien in het sociale netwerk en in een blok op de startpagina.

*Standaard: `true`*

### `allow_teacher_access_student_skills`

**Docenten toegang geven tot vaardigheden van cursisten**

[afgeleid] Sta docenten toe vaardigheden te bekijken en te volgen die cursisten in hun cursussen hebben verworven.

*Standaard: `false`*


### `badge_assignation_notification`

**Melding naar cursist sturen wanneer een vaardigheid/badge is verworven**

[afgeleid] Stuur meldingen naar cursisten wanneer zij een nieuwe vaardigheid of badge-prestatie verwerven.

*Standaard: `false`*


### `hide_skill_levels`

**Functie vaardigheidsniveaus verbergen**

[afgeleid] Verberg de hiërarchie van vaardigheidsniveaus en niveaulabels in weergaven die met vaardigheden te maken hebben.

*Standaard: `false`*


### `manual_assignment_subskill_autoload`

**Vaardigheden toekennen aan gebruiker: automatisch laden van subvaardigheden**

Bij het handmatig toekennen van vaardigheden aan een gebruiker kan het formulier zo worden ingesteld dat automatisch wordt aangeboden een subvaardigheid toe te kennen in plaats van de geselecteerde vaardigheid.

*Standaard: `false`*


### `openbadges_backpack`

**OpenBadges backpack-URL**

De URL van de OpenBadges-backpackserver die standaard wordt gebruikt voor alle gebruikers die hun badges willen exporteren. Dit is standaard de open en gratis backpack-repository van de Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Volledige vaardigheidsnaam tonen op het vaardighedenwiel**

Op het vaardighedenwiel wordt de naam van de vaardigheid getoond wanneer deze een korte code heeft.

*Standaard: `false`*


### `skill_levels_names`

**Namen van vaardigheidsniveaus**

Definieer namen voor niveaus van vaardigheden als een array van id => naam.

### `skills_hierarchical_view_in_user_tracking`

**Vaardigheden als hiërarchische tabel tonen**

[afgeleid] Toon vaardigheden van cursisten als een hiërarchische boomstructuur op voortgangs- en rapportagepagina's.

*Standaard: `false`*


### `skills_teachers_can_assign_skills`

**Docenten toestaan in te stellen welke vaardigheden via hun cursussen worden verworven**

Standaard kunnen alleen beheerders bepalen welke vaardigheden via welke cursus kunnen worden verworven.

*Standaard: `false`*