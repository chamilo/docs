# Cursusinstellingen

Standaardwaarden en beleidsregels die van toepassing zijn op cursussen op het hele platform — zichtbaarheid, aanmaakrechten, toegestane tools, rechten van cursisten, en vergelijkbare instellingen.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cursus**. Deze categorie bevat **45 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `active_tools_on_create`

**Actieve tools bij het aanmaken van een cursus**

Selecteer de tools die *actief* zullen zijn na het aanmaken van een cursus.

*Standaard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Cursuscategorieën van de bovenliggende URL gebruiken**

In multi-URL-omgevingen toestaan dat beheerders en docenten categorieën van de bovenliggende URL toewijzen aan cursussen in de onderliggende URL's.

*Standaard: `false`*

### `allow_course_theme`

**Cursusthema's toestaan**

Staat grafische thema's voor cursussen toe en maakt het mogelijk om de stylesheet van een cursus te wijzigen naar een van de beschikbare stylesheets van Chamilo. Wanneer een gebruiker de cursus binnenkomt, heeft de stylesheet van de cursus voorrang op de eigen stylesheet van de gebruiker en de standaardstylesheet van het platform.

*Standaard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Toegang tot openbare cursussen met algemene voorwaarden**

Als deze optie is ingeschakeld, worden de algemene voorwaarden van een cursus met openbare zichtbaarheid uitgeschakeld zolang de cursus openbaar is.

*Standaard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Toegang tot openbare cursussen voor geauthenticeerde gebruikers blokkeren**

Alleen openbare cursussen tonen. Geregistreerde gebruikers geen toegang geven tot cursussen met zichtbaarheid 'open', tenzij ze op elk van deze cursussen zijn ingeschreven.

*Standaard: `false`*

### `breadcrumbs_course_homepage`

**Broodkruimelpad op de startpagina van de cursus**

Het broodkruimelpad is het horizontale navigatiesysteem met koppelingen, meestal linksboven op de pagina. Deze optie bepaalt wat er in het broodkruimelpad op de startpagina's van cursussen verschijnt.

*Standaard: `course_title`*

### `course_about_teacher_name_hide`

**Docentinformatie verbergen op de cursusdetailpagina**

Op de cursusdetailpagina de informatie over de docent verbergen.

*Standaard: `false`*

### `course_category_code_to_use_as_model`

**Cursussjablonen beperken tot één cursuscategorie**

Geef een categoriecode op om als cursussjablonen te gebruiken. Alleen die cursussen verschijnen in de keuzelijst bij het aanmaken van een cursus, en gebruikers zien de cursussen in deze categorie niet in de cursuscatalogus.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Extra velden om te tonen in de cursusinstellingen**

De velden die in deze array zijn gedefinieerd, verschijnen op de pagina met cursusinstellingen.

### `course_creation_by_teacher_extra_fields_to_show`

**Extra velden om te tonen op het formulier voor het aanmaken van een cursus**

De velden die in deze array zijn gedefinieerd, verschijnen als extra velden in het formulier voor het aanmaken van een cursus.

### `course_creation_donate_link`

**Donatielink op de pagina voor het aanmaken van een cursus**

De pagina waarnaar het donatiebericht moet linken (volledige URL).

### `course_creation_donate_message_show`

**Donatiebericht tonen op de pagina voor het aanmaken van een cursus**

Een berichtvak toevoegen op de pagina voor het aanmaken van een cursus, waarin docenten worden gevraagd te doneren aan het project.

*Standaard: `false`*

### `course_creation_form_hide_course_code`

**Cursuscodeveld verwijderen uit het formulier voor het aanmaken van een cursus**

Als er geen code wordt opgegeven, wordt de cursuscode standaard gegenereerd op basis van de cursustitel. Schakel deze optie in om het codeveld volledig uit het formulier voor het aanmaken van een cursus te verwijderen.

*Standaard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Cursuscategorie verplicht maken**

Bij het aanmaken van een cursus de cursuscategorie als verplichte instelling instellen.

*Standaard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Extra velden die verplicht zijn op het formulier voor het aanmaken van een cursus**

De velden die in deze array zijn gedefinieerd, zijn verplicht in het formulier voor het aanmaken van een cursus.

### `course_creation_splash_screen`

**Splashscreen voor cursussen**

Een splashscreen tonen bij het aanmaken van een nieuwe cursus.

*Standaard: `true`*

### `course_creation_use_template`

**Sjablooncursus gebruiken voor nieuwe cursussen**

Stel dit in om dezelfde sjablooncursus (geïdentificeerd door het numerieke cursus-ID in de database) te gebruiken voor alle nieuwe cursussen die op het platform worden aangemaakt. Let op: als dit niet goed is gepland, kan deze instelling een enorme impact hebben op het schijfgebruik. De sjablooncursus wordt gebruikt alsof de docent een kopie van de cursus heeft gemaakt met de back-uptools van de cursus, zodat geen gebruikersinhoud wordt gekopieerd, alleen lesmateriaal van de docent. Alle overige regels voor cursusback-ups zijn van toepassing. Laat leeg (of stel in op 0) om uit te schakelen.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Cursusvelden vooraf invullen met velden van de gebruiker**

Als dit niet leeg is, zoekt het aanmaakproces van de cursus naar bepaalde velden in het gebruikersprofiel en vult deze automatisch in voor de cursus. Een docent gespecialiseerd in digitale marketing kan bijvoorbeeld automatisch een vlag « digitale marketing » zetten op elke cursus die hij/zij aanmaakt.

### `course_hide_tools`

**Tools verbergen voor docenten**

Vink de tools aan die u voor docenten wilt verbergen. Dit verbiedt de toegang tot de tool.

### `course_images_in_courses_list`

**Aangepaste cursuspictogrammen**

Gebruik cursusafbeeldingen als cursuspictogram in cursuslijsten (in plaats van het standaard groene schoolbordpictogram).

*Standaard: `true`*

### `course_log_default_extra_fields`

**Extra gebruikersvelden standaard op de cursusstatistiekenpagina**

Configureer deze array met de interne ID's van de extra velden die u standaard wilt tonen op de hoofdpagina met cursusstatistieken.

### `course_log_hide_columns`

**Kolommen verbergen in cursuslogs**

Deze array geeft u de mogelijkheid te configureren welke kolommen u wilt verbergen op de hoofdpagina met cursusstatistieken en in het rapport totale tijd.

### `course_sequence_valid_only_in_same_session`

**Vereisten alleen valideren binnen dezelfde sessie**

Indien ingeschakeld, wordt een cursus alleen als gevalideerd beschouwd als deze binnen de huidige sessie is behaald. Indien uitgeschakeld, ontgrendelen ook in andere sessies behaalde cursussen afhankelijke cursussen.

*Standaard: `false`*


### `course_student_info`

**Weergave van studenteninformatie in de cursus**

Toon op de pagina's ‘Mijn cursussen’/’Mijn sessies’ extra informatie over de score, de voortgang en/of het behalen van een certificaat door de student.

### `course_validation`

**Cursusvalidatie**

Wanneer de functie 'Cursusvalidatie' is ingeschakeld, kan een docent niet zelfstandig een cursus aanmaken. Hij/zij vult een cursusaanvraag in. De platformbeheerder beoordeelt de aanvraag en keurt deze goed of wijst deze af.<br />Deze functie is afhankelijk van geautomatiseerde e-mailberichten; stel Chamilo in om toegang te krijgen tot een e-mailserver en een dedicated e-mailaccount te gebruiken.

*Standaard: `false`*


### `course_validation_terms_and_conditions_url`

**Cursusvalidatie - een link naar de algemene voorwaarden**

Dit is de URL naar het document 'Algemene voorwaarden' dat van toepassing is op het indienen van een cursusaanvraag. Als het adres hier is ingesteld, moet de gebruiker deze voorwaarden lezen en ermee akkoord gaan voordat hij een cursusaanvraag verstuurt.<br />Als u de module 'Algemene voorwaarden' van Chamilo inschakelt en wilt dat de URL daarvan wordt gebruikt, laat deze instelling dan leeg.

### `courses_default_creation_visibility`

**Standaardcursuszichtbaarheid**

Standaardzichtbaarheid van de cursus bij het aanmaken van een nieuwe cursus

*Standaard: `2`*


### `display_coursecode_in_courselist`

**Code weergeven in de cursusnaam**

Cursuscode weergeven in de cursuslijst

*Standaard: `false`*


### `display_teacher_in_courselist`

**Docent weergeven in de cursusnaam**

Docent weergeven in de cursuslijst

*Standaard: `true`*


### `enable_tool_introduction`

**Toolintroductie inschakelen**

Introducties inschakelen op de startpagina van elke tool

*Standaard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Afmeldknop tonen in ‘Mijn cursussen’**

Voeg een knop toe om u af te melden voor een cursus op de pagina ‘Mijn cursussen’.

*Standaard: `false`*

### `example_material_course_creation`

**Voorbeeldmateriaal bij het aanmaken van een cursus**

Automatisch voorbeeldmateriaal aanmaken bij het aanmaken van een nieuwe cursus

*Standaard: `true`*


### `hide_course_rating`

**Cursusbeoordeling verbergen**

De functie voor cursusbeoordeling is standaard op verschillende plaatsen aanwezig. Als u die niet wilt, schakel dan deze optie in.

*Standaard: `false`*

### `hide_course_sidebar`

**Cursusblok in de zijbalk verbergen**

Op schermen waar het linkermenu zichtbaar is, de sectie « Cursussen » niet weergeven.

*Standaard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Markering voor gedeelde cursus bij meerdere URL's tonen**

Voegt een linkpictogram toe aan cursussen die tussen URL's worden gedeeld, zodat gebruikers (in het bijzonder docenten) weten dat ze extra voorzichtig moeten zijn bij het bewerken van de cursusinhoud.

*Standaard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Alleen cursussen in de taal van de gebruiker tonen**

Indien ingeschakeld, verbergt deze optie alle cursussen die niet in de taal van de gebruiker zijn ingesteld.

*Standaard: `false`*

### `profiling_filter_adding_users`

**Gebruikers filteren op profielvelden bij inschrijving voor een cursus**

Sta docenten toe om gebruikers te filteren op extra velden op de pagina om gebruikers in te schrijven voor hun cursus.

*Standaard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Afhankelijkheden tonen in de cursusintroductie**

Wanneer resourcesequencing wordt gebruikt met cursussen of sessies, de afhankelijkheden van de cursus tonen op de startpagina van de cursus.

*Standaard: `false`*

### `scorm_cumulative_session_time`

**Cumulatieve sessietijd voor SCORM**

Indien ingeschakeld, is de sessietijd voor SCORM-leerpaden cumulatief; anders wordt deze alleen geteld vanaf het laatste bijwerktijdstip. Dit is een globale instelling. Ze wordt gebruikt bij het aanmaken van een nieuw leerpad, maar kan daarna per leerpad opnieuw worden gedefinieerd.

*Standaard: `true`*


### `send_email_to_admin_when_create_course`

**E-mailwaarschuwing bij het aanmaken van een cursus**

Stuur een e-mail naar de platformbeheerder telkens wanneer een docent een nieuwe cursus aanmaakt

*Standaard: `false`*


### `show_course_duration`

**Cursusduur tonen**

Toon de cursusduur naast de cursustitel in de cursuscatalogus en de cursuslijst.

*Standaard: `false`*

### `show_navigation_menu`

**Cursusnavigatiemenu weergeven**

Toon een navigatiemenu dat de toegang tot de tools versnelt

*Standaard: `false`*


### `show_toolshortcuts`

**Snelkoppelingen naar tools**

De toolsnelkoppelingen in de banner tonen?

*Standaard: `false`*

### `student_view_enabled`

**Leerlingweergave inschakelen**

Schakel de leerlingweergave in, waarmee een docent of beheerder een cursus kan zien zoals een leerling die zou zien

*Standaard: `true`*


### `view_grid_courses`

**Cursussen in een rasterindeling weergeven**

Cursussen weergeven in een indeling met meerdere cursussen per regel. Anders toont de indeling één cursus per regel.

*Standaard: `true`*