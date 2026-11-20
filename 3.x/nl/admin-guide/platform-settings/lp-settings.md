# Instellingen voor leerpaden

Standaardwaarden en gedrag van het hulpmiddel **Leerpaden** — automatisch starten, standaardweergave, vereisten, SCORM-gedrag en vergelijkbare opties.

Open deze instellingen via **Beheer > Configuratie-instellingen > Leerpaden**. Deze categorie bevat **53 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_all_files_in_lp_export`

**Alle bestanden exporteren bij het exporteren van een leerpad**

Bij het exporteren van een leerpad worden ook alle bestanden en mappen in hetzelfde pad van een HTML-bestand geëxporteerd.

*Standaard: `false`*


### `allow_htaccess_import_from_scorm`

**.htaccess uit SCORM-pakketten toestaan**

Normaal worden alle .htaccess-bestanden gefilterd en verwijderd bij het importeren van inhoud in Chamilo. Met deze functie kan .htaccess worden geïmporteerd als het aanwezig is in een SCORM-pakket.

*Standaard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-import binnen cursusimport**

Schakel in om de mapstructuur van SCORM-pakketten te kopiëren bij het herstellen van een cursus (via het hulpmiddel voor cursusonderhoud).

*Standaard: `false`*


### `allow_lp_chamilo_export`

**Leerpaden exporteren in het Chamilo-back-upformaat**

Maakt het mogelijk om elk van uw leerpaden te exporteren in een Chamilo-cursusback-upformaat.

*Standaard: `false`*


### `allow_lp_return_link`

**Terugkoppeling van leerpaden weergeven**

Schakel deze optie uit om de knop 'Terug naar startpagina' in de leerpaden te verbergen.

*Standaard: `true`*


### `allow_lp_subscription_to_usergroups`

**Inschrijving voor leerpaden voor klassen**

Schakel inschrijving voor leerpaden en leerpadcategorieën voor groepen/klassen in.

*Standaard: `false`*


### `allow_session_lp_category`

**Leerpadcategorieën kunnen in sessies worden beheerd**

[afgeleid] Stel cursisten en docenten in staat leerpaden te organiseren en te beheren per categorie binnen sessiecursussen.

*Standaard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Docenten hebben toegang tot geblokkeerde leerpaden**

Docenten hoeven leerpaden niet volledig te doorlopen om toegang te krijgen tot een leerpad dat door vereisten is geblokkeerd.

*Standaard: `false`*


### `disable_js_in_lp_view`

**JS uitschakelen in de weergave van leerpaden**

Schakel JS-bestanden uit die Chamilo gewoonlijk toevoegt aan HTML-bestanden in het leerpad (tijdens het weergeven ervan).

*Standaard: `false`*


### `disable_my_lps_page`

**Pagina 'Mijn leerpaden' verbergen**

De pagina 'Mijn leerpad' is toegevoegd in 1.11. Gebruik deze optie om deze te verbergen.

*Standaard: `false`*

### `download_files_after_all_lp_finished`

**Downloadknop na het afronden van leerpaden**

Toon de knop voor het downloaden van bestanden nadat alle leerpaden zijn afgerond. Voorbeeld: als ABC de cursuscode is en 1 en 100 de document-id's zijn, kies dan: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bewerken van toetsen die in leerpaden zijn opgenomen**

Maak het bewerken van toetsen mogelijk, ook als ze in een leerpad zijn opgenomen. Standaard wordt bewerken voorkomen als de toets in een leerpad staat, omdat dit de consistentie van de tracking bij veel cursisten kan beïnvloeden als de wijzigingen aan de toets aanzienlijk zijn.

*Standaard: `false`*

### `hide_accessibility_label_on_lp_item`

**Label met vereisten in leerpaden verbergen**

Verberg de tooltip met vereisten bij leerpaditems. Dit is vooral een esthetische keuze.

*Standaard: `true`*

### `hide_lp_time`

**Tijd verbergen in leerpadregistraties**

Verberg de bestede tijd aan leerpaden in rapporten in het algemeen.

*Standaard: `false`*

### `hide_scorm_copy_link`

**SCORM-kopie verbergen**

Verberg het pictogram Leerpad kopiëren in de lijst met leerpaden.

*Standaard: `false`*

### `hide_scorm_export_link`

**SCORM-export verbergen**

Verberg het pictogram SCORM-export in de lijst met leerpaden.

*Standaard: `false`*

### `hide_scorm_pdf_link`

**PDF-export van leerpad verbergen**

Verberg het pictogram PDF-export van leerpad in de lijst met leerpaden.

*Standaard: `true`*

### `lp_allow_export_to_students`

**Cursisten kunnen leerpaden exporteren**

Schakel dit in om cursisten toe te staan leerpaden als SCORM-pakketten te downloaden.

*Standaard: `false`*

### `lp_default_visibility_can_be_modified_in_course` **v3**

**Standaardzichtbaarheid van nieuwe leerpaden kan per cursus worden gewijzigd**

Indien ingeschakeld, kunnen docenten in de cursusinstellingen de zichtbaarheid kiezen die aan nieuwe leerpaden van hun cursus wordt gegeven, in plaats van de platformstandaard.

*Standaard: `false`*

Wanneer dit is ingeschakeld, verschijnt een optie **Standaardzichtbaarheid voor nieuwe leerpaden** in de sectie **Instellingen voor leerpaden** van de cursusinstellingen. Een cursus die geen waarde heeft gekozen, gebruikt `lp_default_visibility_on_creation`.

### `lp_default_visibility_on_creation` **v3**

**Standaardzichtbaarheid van nieuwe leerpaden**

Zichtbaarheid die aan een nieuw leerpad wordt gegeven wanneer een docent het in een cursus aanmaakt. Docenten kunnen de zichtbaarheid van elk leerpad daarna nog wijzigen.

*Standaard: `invisible`*

### `lp_enable_flow`

**Navigeren tussen leerpaden**

Voeg de mogelijkheid toe om een 'volgend' leerpad te selecteren en toon knoppen in het leerpad om van het ene naar het volgende te gaan.

*Standaard: `false`*

### `lp_fixed_encoding`

**Vaste codering in leerpad**

Verminder het resourcegebruik door een controle op de tekstcodering in geïmporteerde leerpaden te negeren.

*Standaard: `false`*

### `lp_item_prerequisite_dates`

**Datumgebaseerde vereisten voor leerpaditems**

Voegt de optie toe om vereisten met begin- en einddatums te definiëren voor leerpaditems.

*Standaard: `false`*

### `lp_menu_location`

**Locatie van het leerpadmenu**

Stel dit in op 'left' of 'right' om de zijde van het leerpadmenu te wijzigen.

*Standaard: `left`*

### `lp_minimum_time`

**Minimale tijd om een leerpad te voltooien**

Voeg een veld voor minimale tijd toe aan leerpaden. Als de gebruiker niet zoveel tijd aan het leerpad heeft besteed, kan het laatste item van het leerpad niet worden voltooid.

*Standaard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Leerpaditem ontgrendelen als het maximum aantal pogingen voor een toetsvereiste is bereikt**

[afgeleid] Ontgrendel automatisch volgende leerpaditems wanneer een cursist het maximum aantal toetspogingen voor een vereiste toets heeft uitgeput.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Vereisten ontgrendelen na de laatste toetspoging**

Stelt gebruikers in staat om in een leerpad verder te gaan nadat alle toetspogingen van een toets die als vereiste voor andere items wordt gebruikt, zijn verbruikt.

*Standaard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Laatste score gebruiken bij toetsvereisten in leerpaden**

Wanneer een toets als vereiste voor een item in het leerpad wordt gebruikt, gebruik dan alleen de laatste poging van de toets als validatie voor de vereiste (standaard wordt de beste poging gebruikt).

*Standaard: `false`*

### `lp_prevents_beforeunload`

**beforeunload-JS-gebeurtenis in leerpad voorkomen**

Dit helpt bij browsercompatibiliteit door te voorkomen dat lastige JS-gebeurtenissen worden uitgevoerd.

*Standaard: `false`*

### `lp_score_as_progress_enable`

**Leerpadscore als voortgang gebruiken**

Dit is nuttig bij het gebruik van SCORM-inhoud met slechts één grote SCO. SCORM communiceert geen voortgang, dus dit is een truc om de score als voortgang te gebruiken. Door deze optie in te schakelen kunt u dit per leerpad configureren.

*Standaard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximale voortgang tonen in plaats van gemiddelde bij leerpadrapportage**

[afgeleid] Bereken de voortgang van het leerpad op basis van de maximale itemvoltooiing in plaats van het gemiddelde van alle items.

*Standaard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximale voortgang versus gemiddelde voor leerpaden op cursusniveau selecteren**

Schakel herdefinitie van de instelling in om de beste voortgang in plaats van gemiddelden te tonen in de rapportage van leerpaden op cursusniveau.

*Standaard: `false`*

### `lp_show_reduced_report`

**Leerpaden: verkort rapport tonen**

Toon in de leerpadentool, wanneer een gebruiker de eigen voortgang bekijkt (via het statistiekenpictogram), een verkorte (minder gedetailleerde) versie van het voortgangsrapport.

*Standaard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Beschikbaarheid van leerpaden aan cursisten tonen**

Toon leerpaden aan cursisten met hun beschikbaarheidsdatums, in plaats van ze te verbergen tot de datum aanbreekt.

*Standaard: `false`*

### `lp_subscription_settings`

**Abonnementsinstellingen voor leerpaden**

Configureer extra opties voor de abonnementsfunctie van leerpaden. Opties omvatten 'allow_add_users_to_lp' en 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Inklapbare items van leerpaden**

[afgeleid] Toon leerpaditems in een inklapbaar accordeonformaat voor verbeterde navigatie en inhoudsorganisatie.

*Standaard: `false`*

### `lp_view_settings`

**Weergave-instellingen voor leerpaden**

Configureer extra opties voor de weergave van leerpaden. Opties omvatten 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' en 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Extra veld als student\_id gebruiken in SCORM-communicatie**

Geef de naam van het extra veld dat als student_id moet worden gebruikt voor alle SCORM-communicatie.

### `scorm_api_username_as_student_id`

**Gebruikersnaam als student\_id gebruiken in SCORM-communicatie**

[afgeleid] Gebruik de gebruikersnaam van de cursist als studentidentificatie in SCORM API-communicatie in plaats van de cursist-ID.

*Standaard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-status autonoom bijwerken**

Als de SCO geen status verzendt, neem dan over en werk de status bij op basis van wat in Chamilo kan worden waargenomen.

*Standaard: `false`*

### `scorm_upload_from_cache`

**SCORM uploaden vanuit de cachemap**

Beheerders toestaan een SCORM-pakket (in zip-vorm) naar de cachemap te uploaden en dit te gebruiken als importbron op de SCORM-uploadpagina.

*Standaard: `false`*

### `show_hidden_exercise_added_to_lp`

**Toetsen uit leerpaden weergeven, ook als ze onzichtbaar zijn**

Verborgen oefeningen weergeven die aan een leerpad zijn toegevoegd in de oefeningenlijst. Als we ons in een sessie bevinden, de toets onzichtbaar is in de basiscursus, deze is opgenomen in een leerpad en de instelling om deze weer te geven niet specifiek op true is gezet, dan wordt deze verborgen.

*Standaard: `true`*

### `show_invisible_exercise_in_lp_list`

**Toetsen weergeven in de lijst van leerpadtoetsen, ook als ze onzichtbaar zijn**

[afgeleid] Verborgen toetsen opnemen in de lijst van beschikbare toetsen bij het bekijken van de inhoud van een leerpad.

*Standaard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Onzichtbare toetsen zichtbaar in leerpaden**

Toetsen die in de toetstool als 'onzichtbaar' zijn gemarkeerd, weergeven wanneer ze in een leerpad zijn opgenomen.

*Standaard: `false`*

### `show_invisible_lp_in_course_home`

**Koppeling naar leerpad op de cursusstartpagina weergeven wanneer het onzichtbaar is**

Als een leerpad op onzichtbaar is ingesteld, maar de docent/begeleider heeft besloten het beschikbaar te maken vanaf de cursusstartpagina, voorkomt deze optie dat Chamilo de koppeling op de cursusstartpagina verbergt.

*Standaard: `false`*

### `show_prerequisite_as_blocked`

**Voorwaarden van het leerpad**

In de lijsten met leerpaden een visueel element weergeven om aan te geven dat andere leerpaden momenteel geblokkeerd zijn door een voorwaarderegel.

*Standaard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Kolom verwerving toevoegen in de opvolging van de cursist**

Kolom toevoegen aan de opvolgingspagina van de cursist om de verwervingsstatus van een cursist voor een leerpad weer te geven.

*Standaard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Zichtbaarheidsinformatie voor leerpaden toevoegen op de opvolgingspagina van de cursist**

[afgeleid] Indicator van de zichtbaarheidsstatus voor leerpaden weergeven op de pagina voor het volgen van de voortgang van de cursist.

*Standaard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informatie over ontgrendeling in de lijst met leerpaden**

Dit voegt een kolom 'ontgrendeld' toe in de lijst met leerpaden als de cursist is ingeschreven voor het betreffende leerpad en er toegang toe heeft.

*Standaard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Percentage-teken verbergen in het gemiddelde van toetsen in leerpaden bij de opvolging van de cursist**

Verbergt het percentagepictogram bij de aanduiding 'Gemiddelde van toetsen in leerpaden' in de opvolging van een student.

*Standaard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Leerpaden waarvoor niet is ingeschreven opnemen op de opvolgingspagina van de cursist**

[afgeleid] Leerpaden weergeven op voortgangspagina's, ook wanneer cursisten er niet voor zijn ingeschreven.

*Standaard: `false`*

### `ticket_lp_quiz_info_add`

**Informatie over leerpaden en toetsen toevoegen aan ticketrapportage**

[afgeleid] Informatie over leerpaden en toetsen opnemen in de rapportage van supporttickets voor een betere probleemopvolging.

*Standaard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Status van leerpaditem uit andere sessies gebruiken**

Gebruikers toestaan voorwaarden in een leerpad te voltooien als het overeenkomstige item al in een andere sessie is voltooid.

*Standaard: `false`*