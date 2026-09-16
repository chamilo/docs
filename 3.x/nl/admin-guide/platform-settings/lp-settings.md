# Instellingen leerpaden

Standaardwaarden en gedrag van de tool **Leerpaden** — autostart, standaardweergave, vereisten, SCORM-gedrag en vergelijkbaar.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Leerpaden**. Deze categorie bevat **51 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_all_files_in_lp_export`

**Alle bestanden exporteren bij het exporteren van een leerpad**

Bij het exporteren van een LP worden alle bestanden en mappen in hetzelfde pad van een html ook geëxporteerd.

*Standaard: `false`*


### `allow_htaccess_import_from_scorm`

**.htaccess uit SCORM-pakketten toestaan**

Normaal worden alle .htaccess-bestanden gefilterd en verwijderd bij het importeren van inhoud in Chamilo. Deze functie staat toe dat .htaccess wordt geïmporteerd als het aanwezig is in een SCORM-pakket.

*Standaard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-import binnen cursusimport**

Schakel in om de mapstructuur van SCORM-pakketten te kopiëren bij het herstellen van een cursus (via de cursusonderhoudstool).

*Standaard: `false`*


### `allow_lp_chamilo_export`

**Leerpaden exporteren in het Chamilo-back-upformaat**

Schakel de mogelijkheid in om elk van uw leerpaden te exporteren in een Chamilo-cursusback-upformaat.

*Standaard: `false`*


### `allow_lp_return_link`

**Terugkeerlink leerpaden tonen**

Schakel deze optie uit om de knop 'Terug naar startpagina' in de leerpaden te verbergen.

*Standaard: `true`*


### `allow_lp_subscription_to_usergroups`

**Inschrijving op leerpaden voor klassen**

Schakel inschrijving op leerpaden en leerpadcategorieën voor groepen/klassen in.

*Standaard: `false`*


### `allow_session_lp_category`

**Leerpadcategorieën kunnen in sessies worden beheerd**

[afgeleid] Stelt deelnemers en docenten in staat leerpaden per categorie te organiseren en te beheren binnen sessiecursussen.

*Standaard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Docenten kunnen geblokkeerde leerpaden openen**

Docenten hoeven leerpaden niet volledig te doorlopen om toegang te krijgen tot een door vereisten geblokkeerd leerpad.

*Standaard: `false`*


### `disable_js_in_lp_view`

**JS uitschakelen in de weergave van leerpaden**

Schakel JS-bestanden uit die Chamilo gewoonlijk toevoegt aan HTML-bestanden in het leerpad (tijdens de weergave).

*Standaard: `false`*


### `disable_my_lps_page`

**Pagina 'Mijn leerpaden' verbergen**

De pagina 'Mijn leerpad' is toegevoegd in 1.11. Gebruik deze optie om deze te verbergen.

*Standaard: `false`*

### `download_files_after_all_lp_finished`

**Downloadknop na het voltooien van leerpaden**

Toon een knop om bestanden te downloaden nadat alle LP's zijn voltooid. Voorbeeld: als ABC de cursuscode is, en 1 en 100 de document-id's zijn, kies: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bewerken van toetsen die in leerpaden zijn opgenomen**

Schakel het bewerken van toetsen in, ook als ze in een leerpad zijn opgenomen. Standaard wordt bewerking voorkomen als de toets in een leerpad staat, omdat dat de consistentie van de tracking bij veel deelnemers kan beïnvloeden als de toetsaanpassingen ingrijpend zijn.

*Standaard: `false`*

### `hide_accessibility_label_on_lp_item`

**Vereistenlabel in leerpaden verbergen**

Verberg de tooltip met vereisten op leerpaditems. Dit is vooral een esthetische keuze.

*Standaard: `true`*

### `hide_lp_time`

**Tijd uit leerpadregistraties verbergen**

Verberg de in leerpaden doorgebrachte tijd in rapporten in het algemeen.

*Standaard: `false`*

### `hide_scorm_copy_link`

**SCORM Kopiëren verbergen**

Verberg het pictogram Leerpad kopiëren in de lijst met leerpaden

*Standaard: `false`*

### `hide_scorm_export_link`

**SCORM Exporteren verbergen**

Verberg het pictogram SCORM exporteren in de lijst met leerpaden

*Standaard: `false`*

### `hide_scorm_pdf_link`

**PDF-export van leerpad verbergen**

Verberg het pictogram PDF-export van leerpad in de lijst met leerpaden

*Standaard: `true`*

### `lp_allow_export_to_students`

**Deelnemers kunnen leerpaden exporteren**

Schakel dit in om deelnemers toe te staan leerpaden als SCORM-pakketten te downloaden.

*Standaard: `false`*

### `lp_enable_flow`

**Navigeren tussen leerpaden**

Voeg de mogelijkheid toe om een 'volgend' leerpad te selecteren en toon knoppen in het leerpad om van het ene naar het volgende te gaan.

*Standaard: `false`*

### `lp_fixed_encoding`

**Vaste encoding in leerpad**

Verminder resourcegebruik door een controle op de tekstencoding in geïmporteerde leerpaden over te slaan.

*Standaard: `false`*

### `lp_item_prerequisite_dates`

**Datumgebaseerde vereisten voor leerpaditems**

Voegt de optie toe om vereisten met start- en einddatums voor leerpaditems te definiëren.

*Standaard: `false`*

### `lp_menu_location`

**Locatie van het leerpadmenu**

Stel dit in op 'left' of 'right' om de zijde van het leerpadmenu te wijzigen.

*Standaard: `left`*

### `lp_minimum_time`

**Minimale tijd om een leerpad te voltooien**

Voegt een veld voor minimale tijd toe aan leerpaden. Als de gebruiker niet zoveel tijd aan het leerpad heeft besteed, kan het laatste item van het leerpad niet worden voltooid.

*Standaard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Leerpaditem ontgrendelen als het maximale aantal pogingen voor een toetsvoorwaarde is bereikt**

[inferred] Ontgrendelt automatisch volgende leerpaditems wanneer een cursist het maximale aantal toets pogingen voor een voorwaardelijke toets heeft uitgeput.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Voorwaarden ontgrendelen na de laatste toetspoging**

Staat gebruikers toe om in een leerpad verder te gaan nadat ze alle toetspogingen van een toets hebben gebruikt die als voorwaarde voor andere items geldt.

*Standaard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Laatste score gebruiken bij toetsvoorwaarden in leerpaden**

Wanneer een toets als voorwaarde voor een item in het leerpad wordt gebruikt, alleen de laatste poging van de toets gebruiken als validatie voor de voorwaarde (standaard wordt de beste poging gebruikt).

*Standaard: `false`*

### `lp_prevents_beforeunload`

**beforeunload-JS-event in leerpad voorkomen**

Dit helpt bij browsercompatibiliteit door te voorkomen dat lastige JS-events worden uitgevoerd.

*Standaard: `false`*

### `lp_score_as_progress_enable`

**Leerpadscore als voortgang gebruiken**

Dit is nuttig bij SCORM-inhoud met slechts één groot SCO. SCORM communiceert geen voortgang, dus dit is een truc om de score als voortgang te gebruiken. Als u deze optie inschakelt, kunt u dit per leerpad configureren.

*Standaard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximale voortgang in plaats van gemiddelde tonen in rapportage van leerpaden**

[inferred] Bereken de voortgang van het leerpad op basis van de maximale voltooiing van items in plaats van het gemiddelde van alle items.

*Standaard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximale voortgang versus gemiddelde voor leerpaden op cursusniveau selecteren**

Maakt herdefinitie mogelijk van de instelling om de beste voortgang in plaats van gemiddelden te tonen in de rapportage van leerpaden op cursusniveau.

*Standaard: `false`*

### `lp_show_reduced_report`

**Leerpaden: verkort rapport tonen**

Binnen de leerpadentool, wanneer een gebruiker de eigen voortgang bekijkt (via het statistiekenpictogram), een verkorte (minder gedetailleerde) versie van het voortgangsrapport tonen.

*Standaard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Beschikbaarheid van leerpaden aan cursisten tonen**

Toon leerpaden aan cursisten met hun beschikbaarheidsdata, in plaats van ze te verbergen tot de datum is aangebroken.

*Standaard: `false`*

### `lp_subscription_settings`

**Inschrijvingsinstellingen voor leerpaden**

Configureer extra opties voor de inschrijvingsfunctie van leerpaden. Opties omvatten 'allow_add_users_to_lp' en 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Inklapbare items van leerpaden**

[inferred] Toon leerpaditems in inklapbaar accordeonformaat voor verbeterde navigatie en inhoudsorganisatie.

*Standaard: `false`*

### `lp_view_settings`

**Weergave-instellingen voor leerpaden**

Configureer extra opties voor de weergave van leerpaden. Opties omvatten 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' en 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Extra veld als student\_id gebruiken in SCORM-communicatie**

Geef de naam van het extra veld dat als student_id moet worden gebruikt voor alle SCORM-communicatie.

### `scorm_api_username_as_student_id`

**Gebruikersnaam als student\_id gebruiken in SCORM-communicatie**

[inferred] Gebruik de gebruikersnaam van de cursist als studentidentificatie in SCORM-API-communicatie in plaats van de cursist-ID.

*Standaard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-status autonoom bijwerken**

Als de SCO geen status verzendt, de controle overnemen en de status bijwerken op basis van wat in Chamilo kan worden waargenomen.

*Standaard: `false`*

### `scorm_upload_from_cache`

**SCORM uploaden vanuit cachemap**

Staat beheerders toe een SCORM-pakket (in zip-vorm) in de cachemap te uploaden en het als importbron te gebruiken op de SCORM-uploadpagina.

*Standaard: `false`*

### `show_hidden_exercise_added_to_lp`

**Toetsen uit leerpaden weergeven, ook als ze onzichtbaar zijn**

Toon verborgen oefeningen die aan een LP zijn toegevoegd in de oefeningenlijst. Als we in een sessie zijn, de toets onzichtbaar is in de basiscursus, deze in een LP is opgenomen en de instelling om deze te tonen niet specifiek op true is gezet, verberg deze dan.

*Standaard: `true`*

### `show_invisible_exercise_in_lp_list`

**Toetsen in de lijst van leerpadtoetsen weergeven, ook als ze onzichtbaar zijn**

[inferred] Neem verborgen toetsen op in de lijst van beschikbare toetsen bij het bekijken van leerpadinhoud.

*Standaard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Onzichtbare toetsen zichtbaar in leerpaden**

Zorg dat toetsen die in de toetsentool als 'onzichtbaar' zijn gemarkeerd, verschijnen wanneer ze in een leerpad zijn opgenomen.

*Standaard: `false`*

### `show_invisible_lp_in_course_home`

**Koppeling naar leerpad op de cursushomepagina weergeven wanneer onzichtbaar**

Als een leerpad op onzichtbaar is gezet maar de docent/tutor heeft besloten het vanaf de cursushomepagina beschikbaar te maken, voorkomt deze optie dat Chamilo de koppeling op de cursushomepagina verbergt.

*Standaard: `false`*

### `show_prerequisite_as_blocked`

**Vereisten van het leerpad**

Toon op de lijsten van leerpaden een visueel element om aan te geven dat andere leerpaden momenteel geblokkeerd zijn door een vereistenregel.

*Standaard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Kolom verwerving toevoegen in de leerlingopvolging**

Voeg een kolom toe aan de pagina voor leerlingopvolging om de verwervingsstatus van een leerling voor een leerpad weer te geven.

*Standaard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Zichtbaarheidsinformatie voor leerpaden toevoegen op de pagina voor leerlingopvolging**

[afgeleid] Toon een indicator voor de zichtbaarheidsstatus van leerpaden op de pagina voor voortgangsregistratie van de leerling.

*Standaard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Ontgrendelde informatie in de lijst van leerpaden**

Dit voegt een kolom 'ontgrendeld' toe in de lijst van leerpaden als de leerling is ingeschreven voor het betreffende leerpad en er toegang toe heeft.

*Standaard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Procentteken verbergen in het gemiddelde van toetsen in leerpaden in de leerlingopvolging**

Verbergt het pictogram van het percentage bij de aanduiding 'Gemiddelde van toetsen in leerpaden' in de leerlingopvolging.

*Standaard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Niet-ingeschreven leerpaden opnemen op de pagina voor leerlingopvolging**

[afgeleid] Toon leerpaden op voortgangspagina's, ook wanneer leerlingen er niet voor zijn ingeschreven.

*Standaard: `false`*

### `ticket_lp_quiz_info_add`

**Informatie over leerpaden en toetsen toevoegen aan ticketrapportage**

[afgeleid] Neem informatie over leerpaden en toetsen op in de rapportage van supporttickets voor een betere opvolging van problemen.

*Standaard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Itemstatus van leerpaden uit andere sessies gebruiken**

Sta gebruikers toe vereisten in een leerpad te voltooien als het overeenkomstige item al in een andere sessie is voltooid.

*Standaard: `false`*