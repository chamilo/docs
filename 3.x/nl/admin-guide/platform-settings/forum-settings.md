# Foruminstellingen

Gedrag van de cursustool **Forums**.

U bereikt deze instellingen via **Beheer > Configuratie-instellingen > Forums**. Deze categorie bevat **16 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_forum_category_language_filter`

**Taalfilter voor forumcategorieën**

Voeg een taalfilter toe aan de forumweergave om alleen categorieën te zien die in een specifieke taal zijn geconfigureerd. Vereist het gebruik van het extra veld 'language' op de entiteit 'forum_category'.

*Standaard: `false`*

### `allow_forum_post_revisions`

**Beoordeling van forumberichten**

Schakel deze optie in om te kunnen vragen om een beoordeling of een vertaling van een eigen bericht in een forum. Bij uitgebreide configuratie kan dit worden gebruikt om samen te werken met andere gebruikers in een forum voor taalverwerving.

*Standaard: `false`*

### `community_managers_user_list`

**Lijst van communitymanagers**

Geef een array van gebruikers-ID's op die worden beschouwd als communitymanagers in de speciale cursus die is aangewezen als globaal forum. Communitymanagers hebben extra rechten in het globale forum.

### `default_forum_view`

**Standaardforumweergave**

Wat de standaardoptie moet zijn bij het aanmaken van een nieuw forum. Elke trainer kan echter een andere weergave kiezen voor elk afzonderlijk forum

*Standaard: `flat`*

### `display_groups_forum_in_general_tool`

**Groepsforums weergeven in het algemene forum**

Groepsforums weergeven in de forumtool op cursusniveau. Deze optie is standaard ingeschakeld (in dat geval blijven de individuele zichtbaarheden van groepsforums als extra criterium gelden). Indien uitgeschakeld, zijn groepsforums alleen zichtbaar via de groepstool, ongeacht of ze openbaar zijn of niet.

*Standaard: `true`*

### `first_reply_min_words`

**Minimumaantal woorden voor eerste forumantwoord**

Minimale antwoordlengte wanneer de gebruiker nog geen eerder bericht heeft in dezelfde forumthread. Een korter antwoord wordt geweigerd met een bericht dat dit minimum en het aantal woorden in het antwoord vermeldt. Alleen de woorden van de tekst tellen mee, niet de opmaak. Dit geldt voor elke gebruiker die op een thread antwoordt, maar niet voor het openingsbericht van een nieuwe thread. Stel in op 0 om antwoorden van elke lengte te accepteren.

*Standaard: `0`*

### `forum_fold_categories`

**Forumcategorieën inklappen**

Visueel effect om forumcategorieën in- en uit te klappen.

*Standaard: `false`*

### `forum_participation_can_be_modified_in_course`

**Instellingen voor forumdeelname kunnen per cursus worden gewijzigd**

Indien ingeschakeld, kunnen docenten in het gedeelte Forum van de cursusinstellingen kiezen of hun cursus threadantwoorden verbergt totdat de cursist een bericht plaatst, de categoriebeschrijving in threads toont en hoeveel berichten de voortgangsbalk voor deelname verwacht, in plaats van de platforminstellingen te volgen.

*Standaard: `false`*

### `global_forums_course_id`

**Cursus gebruiken als globaal forum**

Stel de cursus-ID (numeriek) in van een cursus die is gereserveerd om als globaal forum te worden gebruikt. Dit vervangt de koppeling 'Sociale groepen' in het sociale netwerk door een koppeling naar het forum van die cursus.

*Standaard: `0`*

### `hide_forum_post_revision_language`

**Taal van forumberichtbeoordeling verbergen**

Verberg de mogelijkheid om een taal toe te wijzen aan een beoordeling van een forumbericht.

*Standaard: `false`*

### `show_category_description_in_thread`

**Categoriebeschrijving van het forum in threads weergeven**

Toon de categorietitel en een verkorte beschrijving boven elke thread, met **Lees meer** beschikbaar voor een lange beschrijving.

*Standaard: `false`*

### `show_thread_replies_after_participation`

**Threadantwoorden alleen weergeven na deelname**

Voor cursisten wordt alleen het openingsbericht van een thread getoond totdat zij zelf een bericht bijdragen. Beheerders, docenten, sessiecoaches en groepstutoren zien nog steeds alle berichten; berichten die op moderatie wachten, tellen mee voor deelname.

*Standaard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forummeldingen ook vanuit de basiscursus**

Schakel deze optie in om meldingen vanuit het forum van de basiscursus in te schakelen, ook wanneer de cursus via een sessie wordt gevolgd.

*Standaard: `false`*

### `subsequent_reply_min_words`

**Minimumaantal woorden voor volgende forumantwoorden**

Minimale antwoordlengte wanneer de gebruiker al een bericht heeft in dezelfde forumthread, om bijvoorbeeld een substantieel eerste antwoord te vereisen en kortere vervolgantwoorden toe te staan. Een korter antwoord wordt geweigerd met een bericht dat dit minimum en het aantal woorden in het antwoord vermeldt. Stel in op 0 om antwoorden van elke lengte te accepteren.

*Standaard: `0`*

---
### `thread_max_posts_for_non_admins`

**Maximum aantal berichten dat in een forumthread wordt getoond**

Toon alleen dit aantal berichten van elke forumthread aan elke gebruiker die geen platformbeheerder is, inclusief docenten, en aan iedereen binnen een leerpad. In de threaded en geneste weergaven geldt de limiet voor de antwoorden op elk bericht. De berichten behouden de volgorde van de weergave: de eerste, of de meest recente binnen een leerpad, waar de nieuwste berichten eerst komen. Stel in op 0 om elk bericht te tonen. De threadlijst en de forumzoekfunctie zijn niet beperkt.

*Standaard: `0`*

### `thread_participation_progress_posts`

**Berichten vereist om een forumthread te voltooien**

Aantal berichten van de cursist dat vereist is om de voortgangsbalk 100% te laten bereiken. Gemodereerde berichten die op goedkeuring wachten, tellen mee. Stel in op `0` om de balk te verbergen. Dit staat los van de vereiste van één bericht om andere antwoorden zichtbaar te maken.

*Standaard: `0`*