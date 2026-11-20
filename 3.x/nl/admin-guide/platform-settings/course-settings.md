# Cursusinstellingen

Standaardwaarden en beleidsregels die voor cursussen op het platform gelden — zichtbaarheid, aanmaakrechten, toegestane tools, rechten van cursisten en vergelijkbare zaken.

Open deze instellingen via **Beheer > Configuratie-instellingen > Cursus**. Deze categorie bevat **47 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `active_tools_on_create`

**Actieve tools bij het aanmaken van een cursus**

Selecteer de tools die *actief* zijn na het aanmaken van een cursus.

*Standaard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Cursuscategorieën van de bovenste URL gebruiken**

In multi-URL-instellingen kunnen beheerders en docenten categorieën van de bovenste URL toewijzen aan cursussen in de onderliggende URL's.

*Standaard: `false`*

### `allow_course_theme`

**Cursusthema's toestaan**

Staat grafische cursusthema's toe en maakt het mogelijk om het stijlblad van een cursus te wijzigen naar een van de stijlbladen die voor Chamilo beschikbaar zijn. Wanneer een gebruiker de cursus opent, heeft het stijlblad van de cursus voorrang op het eigen stijlblad van de gebruiker en het standaardstijlblad van het platform.

*Standaard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Toegang tot openbare cursussen met algemene voorwaarden**

Als deze optie is ingeschakeld en een cursus openbare zichtbaarheid en algemene voorwaarden heeft, worden die voorwaarden uitgeschakeld zolang de cursus openbaar is.

*Standaard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Toegang van geauthenticeerde gebruikers tot openbare cursussen blokkeren**

Alleen openbare cursussen weergeven. Geregistreerde gebruikers geen toegang geven tot cursussen met de zichtbaarheid 'open', tenzij ze op elk van deze cursussen zijn ingeschreven.

*Standaard: `false`*

### `breadcrumbs_course_homepage`

**Broodkruimelpad van de cursusstartpagina**

Het broodkruimelpad is het horizontale navigatiesysteem met links, meestal linksboven op de pagina. Deze optie bepaalt wat u in het broodkruimelpad op de startpagina's van cursussen wilt weergeven.

*Standaard: `course_title`*

### `course_about_teacher_name_hide`

**Docentinformatie verbergen op de cursusdetailpagina**

Op de cursusdetailpagina de docentinformatie verbergen.

*Standaard: `false`*

### `course_category_code_to_use_as_model`

**Cursussjablonen beperken tot één cursuscategorie**

Geef een categoriecode op die als cursussjablonen moet worden gebruikt. Alleen die cursussen verschijnen in de vervolgkeuzelijst bij het aanmaken van een cursus, en gebruikers zien de cursussen in deze categorie niet in de cursuscatalogus.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Extra velden om weer te geven in de cursusinstellingen**

De velden die in deze array zijn gedefinieerd, verschijnen op de pagina met cursusinstellingen.

### `course_creation_by_teacher_extra_fields_to_show`

**Extra velden om weer te geven op het formulier voor het aanmaken van een cursus**

De velden die in deze array zijn gedefinieerd, verschijnen als extra velden in het formulier voor het aanmaken van een cursus.

### `course_creation_donate_link`

**Donatielink op de pagina voor het aanmaken van een cursus**

De pagina waarnaar het donatiebericht moet verwijzen (volledige URL).

### `course_creation_donate_message_show`

**Donatiebericht weergeven op de pagina voor het aanmaken van een cursus**

Voeg op de pagina voor het aanmaken van een cursus een berichtvak toe voor docenten, waarin hen wordt gevraagd aan het project te doneren.

*Standaard: `false`*

### `course_creation_form_hide_course_code`

**Veld voor cursuscode verwijderen uit het formulier voor het aanmaken van een cursus**

Als deze niet wordt opgegeven, wordt de cursuscode standaard gegenereerd op basis van de cursustitel. Schakel deze optie in om het codeveld volledig uit het formulier voor het aanmaken van een cursus te verwijderen.

*Standaard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Cursuscategorie verplicht maken**

Maak bij het aanmaken van een cursus de cursuscategorie een verplichte instelling.

*Standaard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Extra velden die verplicht zijn op het formulier voor het aanmaken van een cursus**

De velden die in deze array zijn gedefinieerd, zijn verplicht in het formulier voor het aanmaken van een cursus.

### `course_creation_splash_screen`

**Splashscreen voor cursussen**

Een splashscreen weergeven bij het aanmaken van een nieuwe cursus.

*Standaard: `true`*

### `course_creation_use_template`

**Sjablooncursus gebruiken voor nieuwe cursussen**

Stel dit in om dezelfde sjablooncursus (geïdentificeerd door het numerieke cursus-ID in de database) te gebruiken voor alle nieuwe cursussen die op het platform worden aangemaakt. Houd er rekening mee dat deze instelling, indien niet goed gepland, een enorme impact kan hebben op het ruimtegebruik. De sjablooncursus wordt gebruikt alsof de docent een kopie van de cursus heeft gemaakt met de cursusback-uptools, zodat er geen gebruikersinhoud wordt gekopieerd, alleen docentenmateriaal. Alle overige regels voor cursusback-ups zijn van toepassing. Laat leeg (of stel in op 0) om uit te schakelen.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Cursusvelden vooraf invullen met velden van de gebruiker**

Indien niet leeg, zoekt het proces voor het aanmaken van een cursus naar bepaalde velden in het gebruikersprofiel en vult deze automatisch in voor de cursus. Een docent die gespecialiseerd is in digitale marketing kan bijvoorbeeld automatisch een vlag « digitale marketing » instellen voor elke cursus die hij of zij aanmaakt.

### `course_hide_tools`

**Tools verbergen voor docenten**

Vink de tools aan die u voor docenten wilt verbergen. Dit verhindert de toegang tot de tool.

### `course_images_in_courses_list`

**Aangepaste cursuspictogrammen**

Gebruik cursusafbeeldingen als cursuspictogram in cursuslijsten (in plaats van het standaard groene schoolbordpictogram).

*Standaard: `true`*

### `course_log_default_extra_fields`

**Extra gebruikersvelden standaard op de cursusstatistiekenpagina**

Configureer deze array met de interne ID’s van de extra velden die u standaard wilt weergeven op de hoofdpagina met cursusstatistieken.

### `course_log_hide_columns`

**Kolommen verbergen in cursuslogboeken**

Deze array biedt de mogelijkheid om te configureren welke kolommen worden verborgen op de hoofdpagina met cursusstatistieken en in het rapport over de totale tijd.

### `course_sequence_valid_only_in_same_session`

**Voorwaarden alleen valideren binnen dezelfde sessie**

Indien ingeschakeld, wordt een cursus alleen als gevalideerd beschouwd als deze binnen de huidige sessie is behaald. Indien uitgeschakeld, ontgrendelen ook cursussen die in andere sessies zijn behaald de afhankelijke cursussen.

*Standaard: `false`*


### `course_student_info`

**Weergave van cursusinformatie van de student**

Toon op de pagina’s ‘Mijn cursussen’/‘Mijn sessies’ aanvullende informatie over de score, de voortgang en/of het behalen van een certificaat door de student.

### `course_validation`

**Cursusvalidatie**

Wanneer de functie ‘Cursusvalidatie’ is ingeschakeld, kan een docent niet zelfstandig een cursus aanmaken. Hij of zij vult een cursusaanvraag in. De platformbeheerder beoordeelt de aanvraag en keurt deze goed of wijst deze af.<br />Deze functie is afhankelijk van geautomatiseerde e-mailberichten; stel Chamilo in om toegang te hebben tot een e-mailserver en om een specifiek e-mailaccount te gebruiken.

*Standaard: `false`*


### `course_validation_terms_and_conditions_url`

**Cursusvalidatie - een link naar de algemene voorwaarden**

Dit is de URL naar het document ‘Algemene voorwaarden’ dat geldig is voor het indienen van een cursusaanvraag. Als het adres hier is ingesteld, moet de gebruiker deze algemene voorwaarden lezen en ermee akkoord gaan voordat een cursusaanvraag wordt verzonden.<br />Als u de module ‘Algemene voorwaarden’ van Chamilo inschakelt en de URL daarvan wilt gebruiken, laat u deze instelling leeg.

### `courses_default_creation_visibility`

**Standaardzichtbaarheid van cursussen**

Standaardzichtbaarheid van een cursus bij het aanmaken van een nieuwe cursus

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

**Uitschrijfknop weergeven in ‘Mijn cursussen’**

Voeg een knop toe om uit te schrijven voor een cursus op de pagina ‘Mijn cursussen’.

*Standaard: `false`*

### `example_material_course_creation`

**Voorbeeldmateriaal bij het aanmaken van een cursus**

Automatisch voorbeeldmateriaal aanmaken bij het aanmaken van een nieuwe cursus

*Standaard: `true`*


### `hide_course_rating`

**Cursusbeoordeling verbergen**

De functie voor cursusbeoordeling is standaard op verschillende plaatsen aanwezig. Schakel deze optie in als u deze niet wilt.

*Standaard: `false`*

### `hide_course_sidebar`

**Cursusblok in de zijbalk verbergen**

Geef op schermen waar het linkermenu zichtbaar is de sectie « Cursussen » niet weer.

*Standaard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Markering voor gedeelde cursus bij meerdere URL’s weergeven**

Voegt een linkpictogram toe aan cursussen die tussen URL’s worden gedeeld, zodat gebruikers (in het bijzonder docenten) weten dat zij extra voorzichtig moeten zijn bij het bewerken van de cursusinhoud.

*Standaard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Alleen cursussen in de taal van de gebruiker weergeven**

Indien ingeschakeld, verbergt deze optie alle cursussen die niet in de taal van de gebruiker zijn ingesteld.

*Standaard: `false`*

### `profiling_filter_adding_users`

**Gebruikers filteren op profielvelden bij inschrijving voor een cursus**

Docenten toestaan gebruikers te filteren op extra velden op de pagina om gebruikers in te schrijven voor hun cursus.

*Standaard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Afhankelijkheden tonen in de cursusintroductie**

Bij het gebruik van resourcesequencing met cursussen of sessies de afhankelijkheden van de cursus tonen op de startpagina van de cursus.

*Standaard: `false`*

### `scorm_cumulative_session_time`

**Cumulatieve sessietijd voor SCORM**

Indien ingeschakeld, is de sessietijd voor SCORM-leerpaden cumulatief; anders wordt alleen de tijd vanaf de laatste update geteld. Dit is een globale instelling. Ze wordt gebruikt bij het aanmaken van een nieuw leerpad, maar kan daarna per leerpad opnieuw worden gedefinieerd.

*Standaard: `true`*


### `send_email_to_admin_when_create_course`

**E-mailmelding bij het aanmaken van een cursus**

Een e-mail sturen naar de platformbeheerder telkens wanneer een docent een nieuwe cursus aanmaakt

*Standaard: `false`*


### `show_clock_time_spent_can_be_modified_in_course`

**Klok voor bestede tijd kan per cursus worden gewijzigd**

Indien ingeschakeld, kunnen docenten in de cursusinstellingen kiezen of hun cursus cursisten de in de cursus bestede tijd toont, in plaats van de platforminstelling te volgen.

*Standaard: `false`*

### `show_clock_time_spent_on_all_course_page_for_learner`

**Cursisten de in de cursus bestede tijd tonen**

Op elke pagina van een cursus, inclusief de leerpaden, een klok weergeven die cursisten de totale tijd toont die zij in de cursus hebben doorgebracht, zoals geteld door de cursustracking. De klok blijft lopen zolang de cursist actief is en stopt na de maximale inactiviteitstijd die door de tracking in aanmerking wordt genomen.

De klok toont dezelfde tijd als de cursusrapporten: ze begint bij de tijd die al voor de cursist in de cursus is geregistreerd (en in de sessie, wanneer de cursus binnen een sessie wordt gevolgd) en telt vervolgens elke seconde. Na de inactiviteitstijd die is ingesteld in `maximum_inactive_time_to_consider` (Trackinginstellingen) stopt de tracking met tellen en stopt de klok mee, totdat de cursist opnieuw handelt. Docenten, tutoren, coaches en beheerders zien de klok nooit.

*Standaard: `false`*

### `show_course_duration`

**Cursusduur tonen**

De cursusduur weergeven naast de cursustitel in de cursuscatalogus en de cursuslijst.

*Standaard: `false`*

### `show_navigation_menu`

**Cursusnavigatiemenu weergeven**

Een navigatiemenu weergeven dat de toegang tot de tools versnelt

*Standaard: `false`*


### `show_toolshortcuts`

**Snelkoppelingen naar tools**

De snelkoppelingen naar tools in de banner tonen?

*Standaard: `false`*

### `student_view_enabled`

**Cursistenweergave inschakelen**

De cursistenweergave inschakelen, waarmee een docent of beheerder een cursus kan zien zoals een cursist die zou zien

*Standaard: `true`*


### `view_grid_courses`

**Cursussen in een rasterindeling weergeven**

Cursussen weergeven in een indeling met meerdere cursussen per regel. Anders toont de indeling één cursus per regel.

*Standaard: `true`*