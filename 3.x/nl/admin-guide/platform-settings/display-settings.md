# Weergave-instellingen

Hoe het platform aan gebruikers wordt getoond — lay-out van de startpagina, gravatar, menu's, brandinggedrag en vergelijkbare visuele voorkeuren.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Weergave**. Deze categorie bevat **28 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `accessibility_font_resize`

**Toegankelijkheidsfunctie voor lettergrootte**

Schakel deze optie in om rechtsboven op uw campus een set opties voor het wijzigen van de lettergrootte te tonen. Dit stelt visueel beperkte gebruikers in staat om hun cursusinhoud gemakkelijker te lezen.

*Standaard: `false`*

### `display_categories_on_homepage`

**Categorieën weergeven op de startpagina**

Deze optie toont of verbergt cursuscategorieën op de startpagina van het portaal

*Standaard: `false`*

### `enable_help_link`

**Help-link inschakelen**

De Help-link bevindt zich rechtsboven in het scherm

*Standaard: `true`*

### `gravatar_enabled`

**Gravatar-gebruikersfoto's**

Schakel deze optie in om in de Gravatar-repository te zoeken naar foto's van de huidige gebruiker, als de gebruiker lokaal geen foto heeft ingesteld. Dit is handig om foto's op uw site automatisch in te vullen, vooral als uw gebruikers actieve internetgebruikers zijn. Gravatar-foto's kunnen eenvoudig worden geconfigureerd op basis van het e-mailadres van een gebruiker, op http://en.gravatar.com/

*Standaard: `false`*

### `gravatar_type`

**Gravatar-avatartype**

Als de Gravatar-optie is ingeschakeld en de gebruiker geen foto op Gravatar heeft ingesteld, kunt u met deze optie het type avatar kiezen dat Gravatar voor elke gebruiker genereert. Zie <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> voor voorbeelden van avatartypes.

*Standaard: `mm`*

### `hide_complete_name_in_whoisonline`

**Volledige gebruikersnaam verbergen in 'wie is online'**

De pagina 'wie is online' (indien ingeschakeld) toont een foto en een naam voor elke gebruiker die momenteel online is. Schakel deze optie in om de namen te verbergen.

*Standaard: `false`*

### `hide_home_top_when_connected` **v3**

**Bovenste inhoud op de startpagina verbergen wanneer ingelogd**

Op de startpagina van het platform kunt u met deze optie het introductieblok verbergen (om bijvoorbeeld alleen de aankondigingen te laten staan), voor alle gebruikers die al zijn ingelogd. Het algemene introductieblok blijft zichtbaar voor gebruikers die nog niet zijn ingelogd.

*Standaard: `false`*

### `hide_logout_button`

**Uitlogknop verbergen**

Verberg de uitlogknop. Dit is meestal alleen interessant bij gebruik van een externe inlog-/uitlogmethode, bijvoorbeeld bij Single Sign On van enige aard.

*Standaard: `false`*

### `hide_main_navigation_menu`

**Hoofdnavigatiemenu verbergen**

Wanneer u Chamilo voor een specifiek doel gebruikt (zoals één grootschalig online examen), wilt u wellicht de afleiding nog verder verminderen door het zijmenu te verwijderen.

*Standaard: `false`*

### `hide_social_media_links`

**Links naar sociale media verbergen**

Sommige pagina's laten u het portaal of een cursus op sociale netwerken promoten. Schakel deze instelling in om de links te verwijderen.

*Standaard: `false`*

### `order_user_list_by_official_code`

**Gebruikers ordenen op officiële code**

Gebruik de 'officiële code' om de meeste studentenlijsten op het platform te sorteren, in plaats van hun achternaam of voornaam.

*Standaard: `false`*

### `pdf_logo_header`

**PDF-headerlogo**

Of de afbeelding in var/themes/[your-theme]/images/pdf_logo_header.png als PDF-headerlogo voor alle PDF-exports moet worden gebruikt (in plaats van het normale portaallogo)

### `show_admin_toolbar`

**Beheerderswerkbalk tonen**

Toont een globale werkbalk bovenaan de pagina aan de aangewezen gebruikersrollen. Deze werkbalk, zeer vergelijkbaar met de zwarte werkbalken van Wordpress en Google, kan ingewikkelde acties echt versnellen en de ruimte die u voor de leerinhoud beschikbaar hebt verbeteren, maar kan voor sommige gebruikers verwarrend zijn

*Standaard: `do_not_show`*

### `show_administrator_data` **v3**

**Informatie over de platformbeheerder in de voettekst**

De informatie van de platformbeheerder in de voettekst tonen?

*Standaard: `true`*

### `show_back_link_on_top_of_tree`

**Teruglinks vanuit categorieën/cursussen tonen**

Toon een link om terug te gaan in de cursushiërarchie. Onderaan de lijst is sowieso een link beschikbaar.

*Standaard: `false`*

### `show_closed_courses`

**Gesloten cursussen weergeven op de inlogpagina en de startpagina van het portaal?**

Gesloten cursussen weergeven op de inlogpagina en de startpagina van cursussen? Op de startpagina van het portaal verschijnt een pictogram naast de cursussen om zich snel voor elke cursus in te schrijven. Dit verschijnt alleen op de startpagina van het portaal wanneer de gebruiker is ingelogd en wanneer de gebruiker nog niet op het portaal is ingeschreven.

*Standaard: `false`*

### `show_email_addresses`

**E-mailadressen weergeven**

E-mailadressen aan gebruikers tonen

*Standaard: `false`*

### `show_empty_course_categories`

**Lege cursuscategorieën weergeven**

De cursuscategorieën op de startpagina weergeven, ook als ze leeg zijn

*Standaard: `true`*

### `show_hot_courses`

**Populaire cursussen weergeven**

De lijst met populaire cursussen wordt toegevoegd op de indexpagina

*Standaard: `true`*

### `show_number_of_courses`

**Aantal cursussen weergeven**

Het aantal cursussen in elke categorie weergeven in de cursuscategorieën op de startpagina

*Standaard: `false`*

### `show_tabs`

**Hoofdmenu-items**

Vink de items aan die u in het hoofdmenu wilt laten verschijnen

*Standaard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Hoofdmenu-items per rol**

De zichtbaarheid van kopteksttabbladen per rol definiëren.

*Standaard: `{}`*

### `show_teacher_data` **v3**

**Docentinformatie in de voettekst weergeven**

De docentreferentie (naam en e-mail indien beschikbaar) in de voettekst weergeven?

*Standaard: `true`*

### `show_tutor_data` **v3**

**Gegevens van de sessietutor worden in de voettekst weergegeven.**

De referentie van de sessietutor (naam en e-mail indien beschikbaar) in de voettekst weergeven?

*Standaard: `true`*

### `showonline`

**Wie is online**

Het aantal personen dat online is weergeven?

*Standaard: `world`*

### `table_default_row`

**Standaard aantal tabelrijen**

Hoeveel rijen standaard in alle tabellen moeten worden weergegeven.

*Standaard: `20`*

### `table_row_list`

**Standaard aangeboden pagineringsaantallen in tabellen**

Stel de opties in die u wilt laten verschijnen in de navigatie rond een tabel om minder of meer rijen op één pagina te tonen. bijv. [50, 100, 200, 500].

*Standaard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Tijdslimiet voor Wie is online**

Deze tijdslimiet bepaalt hoeveel minuten na zijn laatste actie een gebruiker als *online* wordt beschouwd

*Standaard: `30`*