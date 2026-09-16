# Foruminstellingen

Gedrag van de cursustool **Forums**.

Toegang tot deze instellingen via **Beheer > Configuratie-instellingen > Forums**. Deze categorie bevat **9 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_forum_category_language_filter`

**Taalfilter voor forumcategorieën**

Voeg een taalfilter toe aan de forumweergave om alleen categorieën te zien die in een specifieke taal zijn geconfigureerd. Vereist het extra veld 'language' op de entiteit 'forum_category'.

*Standaard: `false`*

### `allow_forum_post_revisions`

**Beoordeling van forumberichten**

Schakel deze optie in om het mogelijk te maken een beoordeling of een vertaling van iemands bericht in een forum aan te vragen. Bij uitgebreide configuratie kan dit worden gebruikt om samen te werken met andere gebruikers in een forum voor taalonderwijs.

*Standaard: `false`*

### `community_managers_user_list`

**Lijst van communitymanagers**

Geef een array van gebruikers-ID's op die als communitymanagers worden beschouwd in de speciale cursus die als globaal forum is aangewezen. Communitymanagers hebben extra rechten op het globale forum.

### `default_forum_view`

**Standaard forumweergave**

Wat moet de standaardoptie zijn bij het aanmaken van een nieuw forum. Elke lesgever kan echter voor elk individueel forum een andere weergave kiezen

*Standaard: `flat`*

### `display_groups_forum_in_general_tool`

**Groepsforums weergeven in algemeen forum**

Groepsforums weergeven in de forumtool op cursusniveau. Deze optie is standaard ingeschakeld (in dat geval blijven de individuele zichtbaarheden van groepsforums als extra criterium gelden). Indien uitgeschakeld zijn groepsforums alleen zichtbaar via de groepstool, of ze nu openbaar zijn of niet.

*Standaard: `true`*

### `forum_fold_categories`

**Forumcategorieën invouwen**

Visueel effect om het in- en uitvouwen van forumcategorieën mogelijk te maken.

*Standaard: `false`*

### `global_forums_course_id`

**Cursus gebruiken als globaal forum**

Stel het cursus-ID (numeriek) in van een cursus die is gereserveerd om als globaal forum te gebruiken. Dit vervangt de koppeling 'Sociale groepen' in het sociale netwerk door een koppeling naar het forum van die cursus.

*Standaard: `0`*

### `hide_forum_post_revision_language`

**Taal van forumberichtbeoordeling verbergen**

Verberg de mogelijkheid om een taal toe te wijzen aan een beoordeling van een forumbericht.

*Standaard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forummeldingen ook vanuit de basiscursus**

Schakel deze optie in om meldingen van het forum van de basiscursus in te schakelen, ook wanneer de cursus via een sessie wordt gevolgd.

*Standaard: `false`*