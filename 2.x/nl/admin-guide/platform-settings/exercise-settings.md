# Instellingen voor Oefeningen (Tests)

Standaardinstellingen en gedrag van de **Oefeningen (Tests)** tool — weergave van vragen, scoring, pogingen en vergelijkbare instellingen.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Oefeningen (Tests)**. Deze categorie bevat **63 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer je deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_exercise_best_attempt_in_report`

**Weergave van beste scorepoging inschakelen**

Geef een lijst van cursus- en test-ID's die de beste scorepoging van elke leerling in de rapporten zullen tonen.

### `allow_coach_feedback_exercises`

**Coaches toestaan om opmerkingen te maken bij beoordeling van oefeningen**

Sta coaches toe om feedback te bewerken tijdens de beoordeling van oefeningen.

*Standaard: `true`*

### `allow_edit_exercise_in_lp`

**Docenten toestaan om tests in leerpaden te bewerken**

Standaard voorkomt Chamilo dat je tests bewerkt die zijn opgenomen in een leerpad. Dit is om wijzigingen te vermijden die leerlingen (verleden en toekomst) verschillend zouden beïnvloeden met betrekking tot resultaten en/of voortgang in het leerpad. Met deze optie kunnen docenten deze beperking omzeilen.

### `allow_exercise_categories`

**Testcategorieën inschakelen**

Testcategorieën zijn standaard niet ingeschakeld omdat ze een extra laag complexiteit toevoegen. Schakel deze functie in om alle beheericonen voor testcategorieën te tonen.

*Standaard: `false`*

### `allow_mandatory_question_in_category`

**Selectie van verplichte vragen inschakelen**

Schakel de selectie van verplichte vragen in een test in bij gebruik van willekeurige categorieën.

*Standaard: `false`*

### `allow_notification_setting_per_exercise`

**Testmeldingsinstellingen op testniveau**

Schakel de configuratie van meldingen voor testinzendingen in op testniveau in plaats van op cursusniveau. Valt terug op cursusniveau-instellingen als deze niet op testniveau zijn gedefinieerd.

*Standaard: `false`*

### `allow_quick_question_description_popup`

**Snelle toevoeging van afbeeldingen aan vragen**

Schakel een extra pictogram in de lijst met testvragen in om een afbeelding als vraagbeschrijving toe te voegen. Dit versnelt het bewerken van vragen aanzienlijk wanneer de vragen in de titel staan en de beschrijving alleen een afbeelding bevat.

*Standaard: `false`*

### `allow_quiz_question_feedback`

**Vraagfeedback toevoegen bij fout antwoord**

Standaard laat Chamilo toe om feedback te tonen op elk antwoord in een vraag. Met deze optie wordt een extra veld gecreëerd om vooraf gedefinieerde feedback te geven op de hele vraag. Deze feedback verschijnt alleen als de gebruiker fout heeft geantwoord.

*Standaard: `false`*

### `allow_quiz_results_page_config`

**Configuratie van testresultatenpagina inschakelen**

Definieer een reeks instellingen die je wilt toepassen op alle resultatenpagina's van tests. Instellingen kunnen zijn: ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ en mogelijk meer in de toekomst. Zoek naar ‘getPageConfigurationAttribute’ in de code om te zien wat er wordt gebruikt.

*Standaard: `false`*

### `allow_quiz_show_previous_button_setting`

**Knop 'vorige' tonen in test om door vragen te navigeren**

Zet dit op false om de knop 'vorige' uit te schakelen bij het beantwoorden van vragen in een test, waardoor gebruikers altijd vooruit moeten gaan.

*Standaard: `false`*

### `allow_teacher_comment_audio`

**Audiofeedback op ingediende antwoorden**

Sta docenten toe om feedback aan gebruikers te geven via audio (als alternatief voor tekst) op elke vraag in een test.

*Standaard: `true`*

### `allow_time_per_question`

**Tijd per vraag in tests inschakelen**

Standaard is het alleen mogelijk om de tijd per test te beperken. Het beperken per vraag voegt een extra laag mogelijkheden toe, en je kunt (voorzichtig) beide combineren.

*Standaard: `false`*

### `block_category_questions`

**Vragen van eerdere categorieën in een test vergrendelen**

Bij gebruik van deze optie verschijnt een extra optie in de configuratie van de test. Bij gebruik van een test met meerdere vraAGCategorieën en het vragen om een verdeling per categorie, stelt dit de gebruiker in staat om vragen per categorie te navigeren. Zodra een categorie is voltooid, gaat hij/zij naar de volgende categorie en kan niet terugkeren naar de vorige categorie.

*Standaard: `false`*

### `block_quiz_mail_notification_general_coach`

**Verzending van testmeldingen naar algemene coach blokkeren**

Leerlingen die een test voltooien, sturen meestal meldingen naar coaches, inclusief de algemene sessiecoach. Schakel deze optie in om de algemene coach uit te sluiten van deze meldingen.

*Standaard: `false`*

---
### `configure_exercise_visibility_in_course`

**Inschakelen om de configuratie van onzichtbare oefeningen in een sessie op basiscursusniveau te omzeilen**

Hiermee kan de configuratie van de onzichtbaarheid van oefeningen in een sessie op basiscursusniveau worden ingeschakeld om de globale configuratie te omzeilen. Als dit niet is ingesteld, wordt de globale parameter gebruikt.

*Standaard: `false`*

### `disable_clean_exercise_results_for_teachers`

**'Resultaten opschonen' uitschakelen voor docenten**

Schakel de optie uit om testresultaten uit de testlijst te verwijderen. Dit wordt vaak gebruikt wanneer minder zorgvuldige docenten cursussen beheren, om kritieke fouten te voorkomen.

*Standaard: `true`*

### `email_alert_manager_on_new_quiz`

**Standaard e-mailwaarschuwingsinstelling bij nieuwe quiz**

Of u wilt dat cursusbeheerders (docenten) per e-mail op de hoogte worden gesteld wanneer een quiz door een student wordt beantwoord. Dit is de standaardwaarde voor alle nieuwe cursussen, maar elke docent kan deze instelling nog steeds aanpassen in zijn/haar eigen cursus.

*Standaard: `true`*

### `enable_quiz_scenario`

**Quizscenario inschakelen**

Vanaf hier kunt u oefeningen maken die verschillende vragen stellen afhankelijk van de antwoorden van de gebruiker.

*Standaard: `true`*

### `exercise_additional_teacher_modify_actions`

**Extra links voor docenten in testlijst**

Configureer callback-elementen om nieuwe actie-iconen voor docenten aan de rechterkant van de testlijst te genereren, in de vorm van een array, bijvoorbeeld ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Gebruikersnaam tonen op testresultatenpagina**

Toon de gebruikersnaam (in plaats van, of naast, de gebruikersinformatie) op de testresultatenpagina.

*Standaard: `false`*

### `exercise_category_report_user_extra_fields`

**Extra gebruikersvelden toevoegen aan oefencategorierapport**

Definieer een array met de lijst van extra gebruikersvelden die aan het rapport moeten worden toegevoegd.

### `exercise_category_round_score_in_export`

**Score afronden bij export van tests**

Wanneer ingeschakeld, worden testscores afgerond naar het dichtstbijzijnde gehele getal bij het exporteren van oefenrapporten.

*Standaard: `false`*

### `exercise_embeddable_extra_types`

**Insluitbare vraagtypen**

Standaard worden alleen vragen met één antwoord en meerdere antwoorden in overweging genomen bij het bepalen of een test in een video kan worden ingesloten. Met deze optie kunt u beslissen dat meer vraagtypen beschikbaar zijn. Houd er rekening mee dat niet alle vraagtypen goed passen in de ruimte die aan video's is toegewezen. Vraagtypen zijn beschikbaar in de code in question.class.php.

### `exercise_hide_ip`

**Gebruikers-IP verbergen in testrapporten**

Standaard tonen we gebruikersinformatie en het bijbehorende IP-adres, maar dit kan als persoonlijke gegevens worden beschouwd. Met deze optie kunt u deze informatie uit alle testrapporten verwijderen.

*Standaard: `false`*

### `exercise_hide_label`

**Vraaglint (juist/fout) verbergen in testresultaten**

In testresultaten verschijnt standaard een lint om aan te geven of het antwoord juist of fout was. Schakel deze optie in om het lint globaal te verwijderen.

*Standaard: `false`*

### `exercise_invisible_in_session`

**Oefening onzichtbaar in sessie**

Als een oefening zichtbaar is in de basiscursus, verschijnt deze als onzichtbaar in de sessie. Als een oefening onzichtbaar is in de basiscursus, verschijnt deze niet in de sessie.

*Standaard: `false`*

### `exercise_max_editors_in_page`

**Maximaal aantal editors op oefenresultatenscherm**

Vanwege het grote aantal vragen dat in een oefening kan voorkomen, kan het correctiescherm, waarmee de docent opmerkingen kan toevoegen aan elk antwoord, erg langzaam laden. Stel dit aantal in op 5 om de platform alleen WYSIWYG-editors te laten tonen tot een bepaald aantal antwoorden op het scherm. Dit versnelt de laadtijd van de correctiepagina aanzienlijk, maar verwijdert WYSIWYG-editors en laat alleen een eenvoudige teksteditor over.

*Standaard: `0`*

### `exercise_max_score`

**Maximale score van oefeningen**

Definieer een maximale score (meestal 10, 20 of 100) voor alle oefeningen op het platform. Dit bepaalt hoe de eindresultaten worden getoond aan gebruikers en docenten.

*Standaard: `20`*

### `exercise_min_score`

**Minimale score van oefeningen**

Definieer een minimale score (meestal 0) voor alle oefeningen op het platform. Dit bepaalt hoe de eindresultaten worden getoond aan gebruikers en docenten.

*Standaard: `0`*

### `exercise_result_end_text_html_strict_filtering`

**HTML-filtering omzeilen in test-eindberichten**

Beschouw berichten aan het einde van tests altijd als veilig. Het verwijderen van de filter maakt het mogelijk om daar JavaScript te gebruiken.

*Standaard: `false`*

### `exercise_score_format`

**Scoreformaat van tests**

Kies tussen de volgende vormen voor de weergave van de score van gebruikers in verschillende rapporten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Gebruik de numerieke ID van de gewenste vorm.

*Standaard: `0`*

### `exercises_disable_new_attempts`

**Nieuwe testpogingen uitschakelen**

Schakel nieuwe testpogingen globaal uit. Meestal gebruikt wanneer er een probleem is met tests in het algemeen en u enige tijd wilt analyseren zonder het hele platform te blokkeren.

*Standaard: `false`*

---
### `hide_free_question_score`

**Score van open vragen verbergen**

Verberg het feit dat open vragen (inclusief audio en annotaties) een score hebben door de scoreweergave te verbergen in alle rapporten die zichtbaar zijn voor leerlingen.

*Standaard: `false`*


### `hide_user_info_in_quiz_result`

**Gebruikersinformatie verbergen op de resultaatpagina van de test**

De standaard resultaatpagina van de test toont een gebruikersgegevensblad (foto, naam, enz.) wat in sommige contexten als een inbreuk op de verwerking van persoonsgegevens kan worden beschouwd. Schakel deze optie in om gebruikersgegevens uit de testresultaten te verwijderen.

*Standaard: `false`*


### `limit_exercise_teacher_access`

**Beperk de rechten van docenten over tests**

Wanneer ingeschakeld, kunnen docenten geen tests of vragen verwijderen, de zichtbaarheid van tests wijzigen, exporteren naar QTI, resultaten opschonen, enz.

*Standaard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale lijst van openstaande tests**

Schakel in om de eindgebruiker een pagina te tonen met een lijst van openstaande tests in alle cursussen.

*Standaard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-filtering in testvragen omzeilen**

Beschouw de tekst van vragen in tests altijd als veilig. Het verwijderen van de filter maakt het mogelijk om daar JavaScript te gebruiken.

*Standaard: `false`*


### `question_pagination_length`

**Paginatielengte van vragen voor docenten**

Aantal vragen dat per pagina wordt getoond bij gebruik van de paginatie-optie voor vragen voor docenten.

*Standaard: `20`*


### `quiz_answer_extra_recording`

**Extra opname van testantwoorden inschakelen**

Schakel de opname in van alle antwoorden (ook tijdelijke) in de tabel track_e_attempt_recording. Deze functie is experimenteel en kan problemen veroorzaken op de rapportagepagina's bij het beoordelen van een test.

*Standaard: `false`*


### `quiz_check_all_answers_before_end_test`

**Controleer alle antwoorden voordat de test wordt ingediend**

Toon een pop-up met de lijst van beantwoorde/onbeantwoorde vragen voordat de test wordt ingediend.

*Standaard: `false`*


### `quiz_check_button_enable`

**Voeg controle van het opslagproces toe vóór de test**

Zorg ervoor dat gebruikers klaar zijn om de test te starten door een simulatie van het opslagproces van vragen te bieden voordat de test begint. Dit maakt vroege detectie van sommige verbindingsproblemen mogelijk en vermindert wrijving in de gebruikerservaring.

*Standaard: `false`*


### `quiz_confirm_saved_answers`

**Voeg een selectievakje toe voor bevestiging van het aantal antwoorden**

Deze optie voegt een selectievakje toe aan het einde van elke test waarin de gebruiker wordt gevraagd het aantal opgeslagen antwoorden te bevestigen. Dit biedt betere auditgegevens voor cruciale tests.

*Standaard: `false`*


### `quiz_discard_orphan_in_course_export`

**Verweesde vragen negeren bij cursusexport**

Bij het exporteren van een cursus worden vragen die geen deel uitmaken van een test niet geëxporteerd.

*Standaard: `false`*


### `quiz_generate_certificate_ending`

**Certificaat genereren bij afronding van de test**

Genereer een certificaat bij het afronden van een quiz. De quiz moet gekoppeld zijn aan het cijferboek en een slagingspercentage hebben ingesteld.

*Standaard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabel met eerdere pogingen verbergen op de startpagina van de test**

Verberg de tabel met alle eerdere pogingen op de startpagina van de test.

*Standaard: `false`*


### `quiz_hide_question_number`

**Vraagnummer verbergen**

Verberg de oplopende nummering van vragen tijdens het maken van een test.

*Standaard: `false`*


### `quiz_image_zoom`

**Zoomen op testafbeeldingen inschakelen**

Schakel deze functie in om gebruikers in staat te stellen in te zoomen op afbeeldingen die in tests worden gebruikt.

### `quiz_keep_alive_ping_interval`

**Sessie actief houden tijdens tests**

Houd de sessie actief door regelmatig een ping-signaal naar de server te sturen, hier te definiëren. We raden aan om dit elke 300 seconden te doen.

*Standaard: `0`*


### `quiz_open_question_decimal_score`

**Decimale score bij open vraagtypen**

Sta docenten toe om open, mondelinge expressie- en annotatievraagtypen te beoordelen met een decimale score.

*Standaard: `false`*


### `quiz_prevent_copy_paste`

**Kopiëren en plakken blokkeren in tests**

Blokkeer kopieer/plak/opslag/afdruktoetsen en rechtermuisklikken in oefeningen.

*Standaard: `false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Vragen automatisch verwijderen bij het verwijderen van een test**

Het standaardgedrag is om vragen wees te maken wanneer de enige test die ze gebruikt wordt verwijderd. Wanneer ingeschakeld, zorgt deze optie ervoor dat alle vragen die anders wees zouden worden, ook worden verwijderd.

*Standaard: `false`*


### `quiz_results_answers_report`

**Link tonen om testresultaten te downloaden**

Toon op de resultaatpagina van de test een link om de resultaten als bestand te downloaden.

*Standaard: `false`*


### `quiz_show_description_on_results_page`

**Testbeschrijving altijd tonen op resultaatpagina**

Wanneer ingeschakeld, wordt de testbeschrijving altijd weergegeven op de resultaatpagina na afronding van de test.

*Standaard: `false`*


### `score_grade_model`

**Model voor cijferbereik**

Definieer een reeks scorebereiken en kleuren om rapporten weer te geven met dit model. Hiermee kunt u kleuren tonen in plaats van numerieke cijfers.

---
### `send_score_in_exam_notification_mail_to_manager`

**Score toevoegen aan e-mailnotificatie van testinzending**

Voeg de score van de leerling toe aan de e-mailnotificatie die naar de docent wordt gestuurd na het indienen van een test.

*Standaard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Toon testpogingen van alle sessies in rapport openstaande tests**

Toon testpogingen van gebruikers in alle sessies waartoe de algemene coach toegang heeft in het rapport van openstaande tests.

*Standaard: `false`*


### `show_exercise_expected_choice`

**Toon verwachte keuze in testresultaten**

Toon de verwachte keuze en een status (juist/fout) voor elk antwoord op de pagina met testresultaten (als de test is ingesteld om resultaten te tonen).

*Standaard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Toon score voor vragen over zekerheidsgraad**

Standaard toont Chamilo geen score voor vraagtypen over zekerheidsgraad.

*Standaard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Toon testpogingen van alle sessies in basiscursus**

Toon testpogingen van gebruikers in alle sessies aan de docent in de basiscursus.

*Standaard: `false`*


### `show_official_code_exercise_result_list`

**Toon officiële code in oefeningsresultaten**

Bepaal of de officiële code van studenten wordt getoond in de rapporten met oefeningsresultaten.

*Standaard: `false`*


### `show_question_id`

**Toon vraag-ID's in tests**

Toon de interne ID's van vragen zodat gebruikers problemen met specifieke vragen kunnen noteren en efficiënter kunnen rapporteren.

*Standaard: `false`*


### `show_question_pagination`

**Toon paginering van vragen voor docenten**

Gebruik paginering voor tests met veel vragen als het aantal vragen hoger is dan deze instelling. Stel in op 0 om paginering te voorkomen.

*Standaard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Toon verwijderde tests in 'Mijn voortgang'**

Schakel deze optie in om op de pagina 'Mijn voortgang' de resultaten van alle tests die je hebt gemaakt te tonen, zelfs de tests die zijn verwijderd.

*Standaard: `false`*