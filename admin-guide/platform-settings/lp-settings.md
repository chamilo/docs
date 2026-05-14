# Instellingen voor Leertrajecten

Standaardinstellingen en gedrag van de **Leertrajecten**-tool — automatisch starten, standaardweergave, vereisten, SCORM-gedrag en vergelijkbare opties.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Leertrajecten**. Deze categorie bevat **51 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_all_files_in_lp_export`

**Exporteer alle bestanden bij het exporteren van een leertraject**

Bij het exporteren van een leertraject worden ook alle bestanden en mappen in hetzelfde pad van een HTML-bestand geëxporteerd.

*Standaard: `false`*

### `allow_htaccess_import_from_scorm`

**Sta .htaccess toe vanuit SCORM-pakketten**

Normaal gesproken worden alle .htaccess-bestanden gefilterd en verwijderd bij het importeren van inhoud in Chamilo. Deze functie maakt het mogelijk om .htaccess te importeren als deze aanwezig is in een SCORM-pakket.

*Standaard: `false`*

### `allow_import_scorm_package_in_course_builder`

**SCORM-import bij cursusimport**

Schakel in om de mapstructuur van SCORM-pakketten te kopiëren bij het herstellen van een cursus (via de cursusonderhoudstool).

*Standaard: `false`*

### `allow_lp_chamilo_export`

**Exporteer leertrajecten in het Chamilo-back-upformaat**

Schakel de mogelijkheid in om uw leertrajecten te exporteren in een Chamilo-cursusback-upformaat.

*Standaard: `false`*

### `allow_lp_return_link`

**Toon terugkeerlink voor leertrajecten**

Schakel deze optie uit om de knop 'Terug naar startpagina' in de leertrajecten te verbergen.

*Standaard: `true`*

### `allow_lp_subscription_to_usergroups`

**Abonnement op leertrajecten voor klassen**

Schakel abonnementen op leertrajecten en leertrajectcategorieën in voor groepen/klassen.

*Standaard: `false`*

### `allow_session_lp_category`

**Leertrajectcategorieën kunnen worden beheerd in sessies**

[afgeleid] Schakel in dat leerlingen en docenten leertrajecten per categorie kunnen organiseren en beheren binnen sessiecursussen.

*Standaard: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Docenten hebben toegang tot geblokkeerde leertrajecten**

Docenten hoeven geen volledige leertrajecten te voltooien om toegang te krijgen tot een leertraject dat door vereisten is geblokkeerd.

*Standaard: `false`*

### `disable_js_in_lp_view`

**Schakel JS uit in de weergave van leertrajecten**

Schakel JS-bestanden uit die Chamilo normaal toevoegt aan HTML-bestanden in het leertraject (tijdens weergave).

*Standaard: `false`*

### `disable_my_lps_page`

**Verberg de pagina 'Mijn leertrajecten'**

De pagina 'Mijn leertraject' is toegevoegd in versie 1.11. Gebruik deze optie om deze te verbergen.

*Standaard: `false`*

### `download_files_after_all_lp_finished`

**Downloadknop na afronding van leertrajecten**

Toon de downloadknop voor bestanden na het afronden van alle leertrajecten. Voorbeeld: als ABC de cursuscode is, en 1 en 100 de document-ID's zijn, kies dan: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bewerking van tests in leertrajecten**

Schakel het bewerken van tests in, zelfs als ze zijn opgenomen in een leertraject. Standaard wordt bewerking voorkomen als de test in een leertraject zit, omdat dit de consistentie van tracking bij veel leerlingen kan beïnvloeden bij significante wijzigingen.

*Standaard: `false`*

### `hide_accessibility_label_on_lp_item`

**Verberg vereistenlabel in leertrajecten**

Verberg de tooltip voor vereisten op leertrajectitems. Dit is voornamelijk een esthetische keuze.

*Standaard: `true`*

### `hide_lp_time`

**Verberg tijd van leertrajectrecords**

Verberg de tijd die aan leertrajecten is besteed in rapportages in het algemeen.

*Standaard: `false`*

### `hide_scorm_copy_link`

**Verberg SCORM-kopie**

Verberg het kopieerpictogram voor leertrajecten in de lijst met leertrajecten.

*Standaard: `false`*

### `hide_scorm_export_link`

**Verberg SCORM-export**

Verberg het exportpictogram voor SCORM in de lijst met leertrajecten.

*Standaard: `false`*

### `hide_scorm_pdf_link`

**Verberg PDF-export van leertrajecten**

Verberg het PDF-exportpictogram voor leertrajecten in de lijst met leertrajecten.

*Standaard: `true`*

### `lp_allow_export_to_students`

**Leerlingen kunnen leertrajecten exporteren**

Schakel dit in om leerlingen toe te staan leertrajecten als SCORM-pakketten te downloaden.

*Standaard: `false`*

### `lp_enable_flow`

**Navigeer tussen leertrajecten**

Voeg de mogelijkheid toe om een 'volgend' leertraject te selecteren en toon knoppen binnen het leertraject om van het ene naar het andere te gaan.

*Standaard: `false`*

### `lp_fixed_encoding`

**Vaste codering in leertraject**

Verminder het gebruik van bronnen door een controle op de tekstcodering in geïmporteerde leertrajecten te negeren.

*Standaard: `false`*

### `lp_item_prerequisite_dates`

**Datumgebaseerde vereisten voor leertrajectitems**

Voegt de optie toe om vereisten met start- en einddatums te definiëren voor leertrajectitems.

*Standaard: `false`*

---
### `lp_menu_location`

**Locatie van het leerpadmenu**

Stel dit in op 'left' of 'right' om de kant van het leerpadmenu te wijzigen.

*Standaard: `left`*

### `lp_minimum_time`

**Minimale tijd om een leerpad te voltooien**

Voeg een veld voor minimale tijd toe aan leerpaden. Als de gebruiker niet zoveel tijd aan het leerpad heeft besteed, kan het laatste item van het leerpad niet worden voltooid.

*Standaard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Leerpaditem ontgrendelen als het maximale aantal pogingen voor een toetsvereiste is bereikt**

[inferred] Automatisch volgende leerpaditems ontgrendelen wanneer een leerling het maximale aantal toetspogingen voor een vereiste toets heeft uitgeput.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Vereisten ontgrendelen na de laatste toetspoging**

Hiermee kunnen gebruikers doorgaan in een leerpad nadat ze alle toetspogingen voor een toets, die als vereiste voor andere items wordt gebruikt, hebben opgebruikt.

*Standaard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Alleen de laatste poging gebruiken voor toetsvereisten in leerpaden**

Wanneer een toets als vereiste voor een item in het leerpad wordt gebruikt, alleen de laatste poging van de toets gebruiken als validatie voor de vereiste (standaard is de beste poging).

*Standaard: `false`*

### `lp_prevents_beforeunload`

**Voorkom beforeunload JS-event in leerpad**

Dit helpt bij browsercompatibiliteit door te voorkomen dat lastige JS-events worden uitgevoerd.

*Standaard: `false`*

### `lp_score_as_progress_enable`

**Leerpadscore gebruiken als voortgang**

Dit is nuttig bij het gebruik van SCORM-inhoud met slechts één grote SCO. SCORM communiceert geen voortgang, dus dit is een truc om de score als voortgang te gebruiken. Het inschakelen van deze optie stelt u in staat dit per leerpad te configureren.

*Standaard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximale voortgang tonen in plaats van gemiddelde voor leerpadrapportage**

[inferred] Bereken de voortgang van het leerpad op basis van de maximale voltooiing van items in plaats van het gemiddelde van alle items.

*Standaard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximale voortgang versus gemiddelde selecteren voor leerpaden op cursusniveau**

Schakel de mogelijkheid in om de instelling voor het tonen van de beste voortgang in plaats van gemiddelden in rapportages van leerpaden op cursusniveau opnieuw te definiëren.

*Standaard: `false`*

### `lp_show_reduced_report`

**Leerpaden: toon verkort rapport**

Binnen de leerpadtool, wanneer een gebruiker zijn eigen voortgang bekijkt (via het statistiekenpictogram), toon een verkorte (minder gedetailleerde) versie van het voortgangsrapport.

*Standaard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Beschikbaarheid van leerpad tonen aan leerlingen**

Toon leerpaden aan leerlingen met hun beschikbaarheidsdata, in plaats van ze te verbergen tot de datum aanbreekt.

*Standaard: `false`*

### `lp_subscription_settings`

**Inschrijvingsinstellingen voor leerpaden**

Configureer aanvullende opties voor de inschrijvingsfunctie van leerpaden. Opties omvatten 'allow_add_users_to_lp' en 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Opvouwbare leerpaditems**

[inferred] Toon leerpaditems in een opvouwbaar accordeonformaat voor verbeterde navigatie en inhoudsorganisatie.

*Standaard: `false`*

### `lp_view_settings`

**Weergave-instellingen voor leerpaden**

Configureer aanvullende opties voor de weergave van leerpaden. Opties omvatten 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' en 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Extra veld gebruiken als student_id in SCORM-communicatie**

Geef de naam van het extra veld dat gebruikt moet worden als student_id voor alle SCORM-communicatie.

### `scorm_api_username_as_student_id`

**Gebruikersnaam gebruiken als student_id in SCORM-communicatie**

[inferred] Gebruik de gebruikersnaam van de leerling als de studentidentificatie in SCORM API-communicatie in plaats van de leerling-ID.

*Standaard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-status autonoom bijwerken**

Als de SCO geen status verzendt, neem het over en werk de status bij op basis van wat in Chamilo kan worden waargenomen.

*Standaard: `false`*

### `scorm_upload_from_cache`

**SCORM uploaden vanuit cachemap**

Sta beheerders toe om een SCORM-pakket (in zip-vorm) te uploaden naar de cachemap en dit te gebruiken als importbron op de SCORM-uploadpagina.

*Standaard: `false`*

### `show_hidden_exercise_added_to_lp`

**Toetsen uit leerpaden tonen, zelfs als ze onzichtbaar zijn**

Toon verborgen oefeningen die aan een leerpad zijn toegevoegd in de oefeningenlijst. Als we in een sessie zijn, de toets onzichtbaar is in de basiscursus, deze is opgenomen in een leerpad en de instelling om deze te tonen niet specifiek op true is ingesteld, verberg deze dan.

*Standaard: `true`*

### `show_invisible_exercise_in_lp_list`

**Toetsen tonen in de lijst met leerpadtoetsen, zelfs als ze onzichtbaar zijn**

[inferred] Voeg verborgen toetsen toe aan de lijst met beschikbare toetsen bij het bekijken van de inhoud van leerpaden.

*Standaard: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Onzichtbare tests zichtbaar in leerpaden**

Maak tests die als 'onzichtbaar' zijn gemarkeerd in de testtool zichtbaar wanneer ze zijn opgenomen in een leerpad.

*Standaard: `false`*

### `show_invisible_lp_in_course_home`

**Link naar leerpad weergeven op cursusstartpagina wanneer onzichtbaar**

Als een leerpad is ingesteld als onzichtbaar, maar de docent/coach heeft besloten om het beschikbaar te maken vanaf de cursusstartpagina, voorkomt deze optie dat Chamilo de link op de cursusstartpagina verbergt.

*Standaard: `false`*

### `show_prerequisite_as_blocked`

**Voorwaarden voor leerpaden**

Toon op de lijst met leerpaden een visueel element om aan te geven dat andere leerpaden momenteel geblokkeerd zijn door een voorwaardelijke regel.

*Standaard: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Kolom voor acquisitiestatus toevoegen aan leerlingopvolging**

Voeg een kolom toe aan de leerlingopvolgingspagina om de acquisitiestatus van een leerling op een leerpad weer te geven.

*Standaard: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Zichtbaarheidsinformatie voor leerpaden toevoegen aan leerlingopvolgingspagina**

[afgeleid] Toon een indicator voor de zichtbaarheidsstatus van leerpaden op de voortgangsvolgpagina van de leerling.

*Standaard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informatie over ontgrendeling in leerpadenlijst**

Dit voegt een kolom 'ontgrendeld' toe aan de leerpadenlijst als de leerling is ingeschreven voor het betreffende leerpad en er toegang toe heeft.

*Standaard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Procentteken verbergen in gemiddelde van tests in leerpaden op leerlingopvolging**

Verbergt het procentteken in de aanduiding 'Gemiddelde van tests in leerpaden' op de volgpagina van een leerling.

*Standaard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Leerpaden opnemen waarvoor niet is ingeschreven op leerlingopvolgingspagina**

[afgeleid] Toon leerpaden op voortgangspagina's, zelfs als leerlingen er niet voor zijn ingeschreven.

*Standaard: `false`*

### `ticket_lp_quiz_info_add`

**Informatie over leerpaden en tests toevoegen aan ticketrapportage**

[afgeleid] Voeg informatie over leerpaden en tests toe aan de rapportage van ondersteuningstickets voor betere probleemopvolging.

*Standaard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Status van leerpaditem uit andere sessies gebruiken**

Sta gebruikers toe om voorwaarden in een leerpad te voltooien als het overeenkomstige item al in een andere sessie is voltooid.

*Standaard: `false`*