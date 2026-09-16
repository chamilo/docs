# Weergave-instellingen

Hoe het platform aan gebruikers wordt weergegeven — lay-out van de startpagina, gravatar, menu's, brandinggedrag en vergelijkbare visuele voorkeuren.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Weergave**. Deze categorie bevat **24 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `accessibility_font_resize`

**Lettergrootte aanpassen voor toegankelijkheid**

Schakel deze optie in om een set opties voor het aanpassen van de lettergrootte rechtsboven op uw campus weer te geven. Dit helpt visueel beperkte gebruikers om de inhoud van hun cursussen gemakkelijker te lezen.

*Standaard: `false`*

### `display_categories_on_homepage`

**Categorieën weergeven op de startpagina**

Met deze optie kunt u cursusCategorieën op de startpagina van het portaal weergeven of verbergen.

*Standaard: `false`*

### `enable_help_link`

**Hulplink inschakelen**

De hulplink bevindt zich in de rechterbovenhoek van het scherm.

*Standaard: `true`*

### `gravatar_enabled`

**Gravatar gebruikersafbeeldingen**

Schakel deze optie in om in de Gravatar-repository te zoeken naar afbeeldingen van de huidige gebruiker, als de gebruiker lokaal geen afbeelding heeft ingesteld. Dit is ideaal om automatisch afbeeldingen op uw site in te vullen, vooral als uw gebruikers actieve internetgebruikers zijn. Gravatar-afbeeldingen kunnen eenvoudig worden geconfigureerd op basis van het e-mailadres van een gebruiker via http://en.gravatar.com/

*Standaard: `false`*

### `gravatar_type`

**Gravatar avatar-type**

Als de Gravatar-optie is ingeschakeld en de gebruiker heeft geen afbeelding ingesteld op Gravatar, kunt u met deze optie het type avatar kiezen dat Gravatar voor elke gebruiker zal genereren. Bekijk voorbeelden van avatar-types op <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>.

*Standaard: `mm`*

### `hide_complete_name_in_whoisonline`

**Volledige gebruikersnaam verbergen in 'wie is online'**

De pagina 'wie is online' (indien ingeschakeld) toont een afbeelding en een naam voor elke momenteel online gebruiker. Schakel deze optie in om de namen te verbergen.

*Standaard: `false`*

### `hide_logout_button`

**Uitlogknop verbergen**

Verberg de uitlogknop. Dit is meestal alleen interessant bij gebruik van een externe in- en uitlogmethode, bijvoorbeeld bij gebruik van Single Sign On.

*Standaard: `false`*

### `hide_main_navigation_menu`

**Hoofdnavigatiemenu verbergen**

Bij gebruik van Chamilo voor een specifiek doel (zoals een groot online examen), wilt u mogelijk afleiding verder verminderen door het zijmenu te verwijderen.

*Standaard: `false`*

### `hide_social_media_links`

**Links naar sociale media verbergen**

Sommige pagina's stellen u in staat om het portaal of een cursus te promoten op sociale netwerken. Schakel deze instelling in om de links te verwijderen.

*Standaard: `false`*

### `order_user_list_by_official_code`

**Gebruikers sorteren op officiële code**

Gebruik de 'officiële code' om de meeste studentenlijsten op het platform te sorteren, in plaats van op achternaam of voornaam.

*Standaard: `false`*

### `pdf_logo_header`

**PDF-headerlogo**

Of de afbeelding op var/themes/[uw-thema]/images/pdf_logo_header.png moet worden gebruikt als PDF-headerlogo voor alle PDF-exporten (in plaats van het normale portaallogo).

### `show_admin_toolbar`

**Beheerderstoolbar weergeven**

Toont een globale toolbar bovenaan de pagina voor de aangewezen gebruikersrollen. Deze toolbar, vergelijkbaar met die van Wordpress en Google, kan complexe acties versnellen en de beschikbare ruimte voor leerinhoud vergroten, maar kan voor sommige gebruikers verwarrend zijn.

*Standaard: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Teruglinks weergeven vanuit categorieën/cursussen**

Toon een link om terug te gaan in de cursushiërarchie. Er is sowieso een link beschikbaar onderaan de lijst.

*Standaard: `false`*

### `show_closed_courses`

**Gesloten cursussen weergeven op inlogpagina en startpagina van het portaal?**

Gesloten cursussen weergeven op de inlogpagina en de startpagina van cursussen? Op de startpagina van het portaal verschijnt een pictogram naast de cursussen om snel in te schrijven voor elke cursus. Dit verschijnt alleen op de startpagina van het portaal wanneer de gebruiker is ingelogd en nog niet is ingeschreven voor het portaal.

*Standaard: `false`*

### `show_email_addresses`

**E-mailadressen weergeven**

E-mailadressen tonen aan gebruikers.

*Standaard: `false`*

### `show_empty_course_categories`

**Lege cursusCategorieën weergeven**

Toon de categorieën van cursussen op de startpagina, zelfs als ze leeg zijn.

*Standaard: `true`*

### `show_hot_courses`

**Populaire cursussen weergeven**

De lijst met populaire cursussen wordt toegevoegd aan de indexpagina.

*Standaard: `true`*

### `show_number_of_courses`

**Aantal cursussen weergeven**

Toon het aantal cursussen in elke categorie in de cursusCategorieën op de startpagina.

*Standaard: `false`*

---
### `show_tabs`

**Hoofdmenu-items**

Vink de items aan die u in het hoofdmenu wilt laten verschijnen.

*Standaard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Hoofdmenu-items per rol**

Definieer de zichtbaarheid van kopteksten per rol.

*Standaard: `{}`*

### `showonline`

**Wie is online**

Toon het aantal personen dat momenteel online is?

*Standaard: `world`*

### `table_default_row`

**Standaard aantal tabelrijen**

Hoeveel rijen moeten standaard in alle tabellen worden weergegeven.

*Standaard: `20`*

### `table_row_list`

**Standaard aangeboden pagineringsnummers in tabellen**

Stel de opties in die u wilt laten verschijnen in de navigatie rond een tabel om minder of meer rijen op één pagina te tonen, bijv. [50, 100, 200, 500].

*Standaard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Tijdslimiet voor Wie is online**

Deze tijdslimiet bepaalt hoeveel minuten na zijn laatste actie een gebruiker als *online* wordt beschouwd.

*Standaard: `30`*