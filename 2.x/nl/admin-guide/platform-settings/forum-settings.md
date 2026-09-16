# Forum Instellingen

Gedrag van de cursus **Forums** tool.

Toegang tot deze instellingen via **Beheer > Configuratie-instellingen > Forums**. Deze categorie bevat **9 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen fixtures (`SettingsCurrentFixtures.php`).

> De variabelenaam in code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_forum_category_language_filter`

**Taal filter voor forumcategorieën**

Voeg een taalfilter toe aan de forumweergave om alleen categorieën te zien die zijn geconfigureerd in een specifieke taal. Vereist het gebruik van het 'language' extra veld op de 'forum_category' entiteit.

*Standaard: `false`*

### `allow_forum_post_revisions`

**Beoordeling van forumberichten**

Schakel deze optie in om het aanvragen van een beoordeling of vertaling van een eigen bericht in een forum mogelijk te maken. Bij uitgebreide configuratie kan dit worden gebruikt om samen te werken met andere gebruikers in een taal leerforum.

*Standaard: `false`*

### `community_managers_user_list`

**Lijst van community managers**

Geef een array van gebruikers-ID's die worden beschouwd als community managers in de speciale cursus die is aangewezen als globaal forum. Community managers hebben extra privileges op het globale forum.

### `default_forum_view`

**Standaard forumweergave**

Wat moet de standaardoptie zijn bij het aanmaken van een nieuw forum. Elke trainer kan echter een andere weergave kiezen voor elk individueel forum.

*Standaard: `flat`*

### `display_groups_forum_in_general_tool`

**Groepsforums weergeven in algemeen forum**

Toon groepsforums in de forumtool op cursusniveau. Deze optie is standaard ingeschakeld (in dit geval fungeren individuele zichtbaarheden van groepsforums nog steeds als extra criterium). Indien uitgeschakeld, zijn groepsforums alleen zichtbaar via de groepstool, ongeacht of ze openbaar zijn of niet.

*Standaard: `true`*

### `forum_fold_categories`

**Forumcategorieën inklappen**

Visueel effect om het inklappen/uitklappen van forumcategorieën mogelijk te maken.

*Standaard: `false`*

### `global_forums_course_id`

**Cursus gebruiken als globaal forum**

Stel de cursus-ID (numeriek) in van een cursus die gereserveerd is om te gebruiken als globaal forum. Dit vervangt de 'Sociale groepen' link in het sociale netwerk door een link naar het forum van die cursus.

*Standaard: `0`*

### `hide_forum_post_revision_language`

**Taal van forumberichtbeoordeling verbergen**

Verberg de mogelijkheid om een taal toe te wijzen aan een forumberichtbeoordeling.

*Standaard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forum notificaties ook van basiscursus**

Schakel deze optie in om notificaties van het basiscursusforum mogelijk te maken, zelfs als de cursus via een sessie wordt gevolgd.

*Standaard: `false`*