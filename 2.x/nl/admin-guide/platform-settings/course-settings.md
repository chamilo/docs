# Cursusinstellingen

Standaardinstellingen en beleidsregels die van toepassing zijn op cursussen over het hele platform — zichtbaarheid, rechten voor aanmaken, toegestane tools, rechten van leerlingen en vergelijkbare zaken.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cursus**. Deze categorie bevat **45 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `active_tools_on_create`

**Actieve tools bij het aanmaken van een cursus**

Selecteer de tools die *actief* zullen zijn na het aanmaken van een cursus.

*Standaard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Gebruik cursuscategorieën van de bovenste URL**

Bij multi-URL-instellingen kunnen beheerders en docenten categorieën van de bovenste URL toewijzen aan cursussen in de onderliggende URL's.

*Standaard: `false`*

### `allow_course_theme`

**Cursusthema's toestaan**

Maakt cursusthema's mogelijk en biedt de mogelijkheid om het stijlblad dat door een cursus wordt gebruikt te wijzigen naar een van de beschikbare stijlbladen in Chamilo. Wanneer een gebruiker de cursus betreedt, heeft het stijlblad van de cursus voorrang op het eigen stijlblad van de gebruiker en het standaard stijlblad van het platform.

*Standaard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Toegang tot openbare cursussen met algemene voorwaarden**

Met deze optie ingeschakeld, worden de algemene voorwaarden uitgeschakeld zolang de cursus openbaar is, als een cursus openbare zichtbaarheid heeft en algemene voorwaarden bevat.

*Standaard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Toegang tot openbare cursussen blokkeren voor geregistreerde gebruikers**

Toon alleen openbare cursussen. Sta geregistreerde gebruikers niet toe om toegang te krijgen tot cursussen met 'open' zichtbaarheid, tenzij ze zijn ingeschreven voor elk van deze cursussen.

*Standaard: `false`*

### `breadcrumbs_course_homepage`

**Broodkruimel op cursusstartpagina**

De broodkruimel is het horizontale navigatiesysteem met links, meestal linksboven op uw pagina. Deze optie bepaalt wat u wilt weergeven in de broodkruimel op de startpagina's van cursussen.

*Standaard: `course_title`*

### `course_about_teacher_name_hide`

**Verberg docentinformatie op cursusdetailpagina**

Verberg de docentinformatie op de cursusdetailpagina.

*Standaard: `false`*

### `course_category_code_to_use_as_model`

**Beperk cursussjablonen tot één cursuscategorie**

Geef een categoriecode op om te gebruiken als cursussjablonen. Alleen die cursussen worden weergegeven in de vervolgkeuzelijst bij het aanmaken van een cursus, en gebruikers zien de cursussen in deze categorie niet in de cursuscatalogus.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Extra velden om te tonen in cursusinstellingen**

De velden die in deze array zijn gedefinieerd, verschijnen op de pagina met cursusinstellingen.

### `course_creation_by_teacher_extra_fields_to_show`

**Extra velden om te tonen op cursusaanmaakformulier**

De velden die in deze array zijn gedefinieerd, verschijnen als aanvullende velden in het cursusaanmaakformulier.

### `course_creation_donate_link`

**Donatielink op cursusaanmaakpagina**

De pagina waarnaar het donatiebericht moet linken (volledige URL).

### `course_creation_donate_message_show`

**Toon donatiebericht op cursusaanmaakpagina**

Voeg een berichtvenster toe op de cursusaanmaakpagina voor docenten, waarin hen wordt gevraagd om te doneren aan het project.

*Standaard: `false`*

### `course_creation_form_hide_course_code`

**Verwijder cursuscodeveld uit cursusaanmaakformulier**

Als dit niet wordt opgegeven, wordt de cursuscode standaard gegenereerd op basis van de cursustitel. Schakel deze optie in om het codeveld volledig uit het cursusaanmaakformulier te verwijderen.

*Standaard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Maak cursuscategorie verplicht**

Maak bij het aanmaken van een cursus de cursuscategorie een verplichte instelling.

*Standaard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Extra velden verplicht stellen op cursusaanmaakformulier**

De velden die in deze array zijn gedefinieerd, worden verplicht in het cursusaanmaakformulier.

### `course_creation_splash_screen`

**Welkomstscherm voor cursussen**

Toon een welkomstscherm bij het aanmaken van een nieuwe cursus.

*Standaard: `true`*

---
### `course_creation_use_template`

**Sjablooncursus gebruiken voor nieuwe cursussen**

Stel dit in om dezelfde sjablooncursus (geïdentificeerd door het numerieke cursus-ID in de database) te gebruiken voor alle nieuwe cursussen die op het platform worden aangemaakt. Houd er rekening mee dat, indien niet goed gepland, deze instelling een enorme impact kan hebben op het ruimtegebruik. De sjablooncursus wordt gebruikt alsof de docent een kopie van de cursus heeft gemaakt met de back-uptools voor cursussen, dus er wordt geen gebruikersinhoud gekopieerd, alleen materiaal van de docent. Alle andere regels voor cursusback-ups zijn van toepassing. Laat dit leeg (of stel in op 0) om uit te schakelen.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Cursusvelden vooraf invullen met velden van de gebruiker**

Indien niet leeg, zal het proces voor het aanmaken van een cursus bepaalde velden in het gebruikersprofiel opzoeken en deze automatisch invullen voor de cursus. Bijvoorbeeld, een docent die gespecialiseerd is in digitale marketing kan automatisch een vlag "digitale marketing" instellen voor elke cursus die hij/zij aanmaakt.

### `course_hide_tools`

**Tools verbergen voor docenten**

Vink de tools aan die u wilt verbergen voor docenten. Dit zal de toegang tot de tool verbieden.

### `course_images_in_courses_list`

**Aangepaste pictogrammen voor cursussen**

Gebruik cursusafbeeldingen als het cursus pictogram in cursuslijsten (in plaats van het standaard groene schoolbordpictogram).

*Standaard: `true`*

### `course_log_default_extra_fields`

**Standaard extra velden van gebruikers in cursusstatistiekenpagina**

Configureer deze array met de interne ID's van de extra velden die u standaard wilt tonen op de hoofdpagina met cursusstatistieken.

### `course_log_hide_columns`

**Kolommen verbergen in cursuslogs**

Met deze array kunt u configureren welke kolommen u wilt verbergen op de hoofdpagina met cursusstatistieken en in het rapport over de totale tijd.

### `course_sequence_valid_only_in_same_session`

**Voorwaarden alleen valideren binnen dezelfde sessie**

Wanneer ingeschakeld, wordt een cursus alleen als gevalideerd beschouwd als deze binnen de huidige sessie is voltooid. Indien uitgeschakeld, zullen cursussen die in andere sessies zijn voltooid ook afhankelijke cursussen ontgrendelen.

*Standaard: `false`*

### `course_student_info`

**Weergave van cursusinformatie voor studenten**

Toon op de pagina's 'Mijn cursussen'/'Mijn sessies' aanvullende informatie over de score, voortgang en/of het behalen van een certificaat door de student.

### `course_validation`

**Cursusvalidatie**

Wanneer de functie 'Cursusvalidatie' is ingeschakeld, kan een docent niet zelfstandig een cursus aanmaken. Hij/zij vult een cursusaanvraag in. De platformbeheerder beoordeelt de aanvraag en keurt deze goed of wijst deze af.<br />Deze functie is afhankelijk van geautomatiseerde e-mailberichten; stel Chamilo in om toegang te krijgen tot een e-mailserver en gebruik een speciaal e-mailaccount.

*Standaard: `false`*

### `course_validation_terms_and_conditions_url`

**Cursusvalidatie - een link naar de algemene voorwaarden**

Dit is de URL naar het document 'Algemene Voorwaarden' dat geldig is voor het indienen van een cursusaanvraag. Als het adres hier is ingesteld, moet de gebruiker deze algemene voorwaarden lezen en ermee akkoord gaan voordat hij/zij een cursusaanvraag indient.<br />Als u de module 'Algemene Voorwaarden' van Chamilo inschakelt en de URL ervan wilt gebruiken, laat deze instelling dan leeg.

### `courses_default_creation_visibility`

**Standaard zichtbaarheid van cursussen**

Standaard zichtbaarheid van een cursus bij het aanmaken van een nieuwe cursus.

*Standaard: `2`*

### `display_coursecode_in_courselist`

**Cursuscode weergeven in cursusnaam**

Toon de cursuscode in de cursuslijst.

*Standaard: `false`*

### `display_teacher_in_courselist`

**Docent weergeven in cursusnaam**

Toon de docent in de cursuslijst.

*Standaard: `true`*

### `enable_tool_introduction`

**Introductie van tools inschakelen**

Schakel introducties in op de startpagina van elke tool.

*Standaard: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Knop voor uitschrijven tonen op 'Mijn cursussen'**

Voeg een knop toe om uit te schrijven van een cursus op de pagina 'Mijn cursussen'.

*Standaard: `false`*

### `example_material_course_creation`

**Voorbeeldmateriaal bij het aanmaken van een cursus**

Maak automatisch voorbeeldmateriaal aan bij het creëren van een nieuwe cursus.

*Standaard: `true`*

### `hide_course_rating`

**Cursusbeoordeling verbergen**

De functie voor cursusbeoordeling is standaard op verschillende plaatsen beschikbaar. Als u dit niet wilt, schakel dan deze optie in.

*Standaard: `false`*

### `hide_course_sidebar`

**Cursusblok in de zijbalk verbergen**

Verberg de sectie "Cursussen" op schermen waar het linkermenu zichtbaar is.

*Standaard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Marker voor gedeelde cursussen met meerdere URL's tonen**

Voegt een linkpictogram toe aan cursussen die worden gedeeld tussen URL's, zodat gebruikers (met name docenten) weten dat ze extra voorzichtig moeten zijn bij het bewerken van de cursusinhoud.

*Standaard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Alleen cursussen in de taal van de gebruiker tonen**

Als deze optie is ingeschakeld, worden alle cursussen die niet in de taal van de gebruiker zijn ingesteld, verborgen.

*Standaard: `false`*

---
### `profiling_filter_adding_users`

**Gebruikers filteren op profielvelden bij inschrijving voor cursus**

Sta docenten toe om gebruikers te filteren op basis van extra velden op de pagina voor het inschrijven van gebruikers voor hun cursus.

*Standaard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Afhankelijkheden tonen in cursusintroductie**

Bij het gebruik van bronsequenties met cursussen of sessies, toon de afhankelijkheden van de cursus op de startpagina van de cursus.

*Standaard: `false`*


### `scorm_cumulative_session_time`

**Cumulatieve sessietijd voor SCORM**

Wanneer ingeschakeld, zal de sessietijd voor SCORM-leertrajecten cumulatief zijn; anders wordt alleen de tijd vanaf de laatste update meegeteld. Dit is een globale instelling. Het wordt gebruikt bij het aanmaken van een nieuw leertraject, maar kan vervolgens per traject opnieuw worden gedefinieerd.

*Standaard: `true`*


### `send_email_to_admin_when_create_course`

**E-mailwaarschuwing bij cursusaanmaak**

Stuur een e-mail naar de platformbeheerder telkens wanneer een docent een nieuwe cursus aanmaakt.

*Standaard: `false`*


### `show_course_duration`

**Cursusduur tonen**

Toon de cursusduur naast de cursustitel in de cursuscatalogus en de cursuslijst.

*Standaard: `false`*


### `show_navigation_menu`

**Navigatiemenu voor cursus weergeven**

Toon een navigatiemenu dat snelle toegang tot de tools mogelijk maakt.

*Standaard: `false`*


### `show_toolshortcuts`

**Snelkoppelingen naar tools**

Toon de snelkoppelingen naar tools in de banner?

*Standaard: `false`*


### `student_view_enabled`

**Leerlingweergave inschakelen**

Schakel de leerlingweergave in, waarmee een docent of beheerder een cursus kan zien zoals een leerling deze zou zien.

*Standaard: `true`*


### `view_grid_courses`

**Cursussen in rasterweergave bekijken**

Bekijk cursussen in een lay-out met meerdere cursussen per regel. Anders toont de lay-out één cursus per regel.

*Standaard: `true`*