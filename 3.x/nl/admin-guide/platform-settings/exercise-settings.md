# Oefeningen (toetsen) – instellingen

Standaardwaarden en gedrag van de tool **Oefeningen (toetsen)** — weergave van vragen, scoring, pogingen en dergelijke.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Oefeningen (toetsen)**. Deze categorie bevat **64 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik die bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_exercise_best_attempt_in_report`

**Weergave van de poging met de beste score inschakelen**

Geef een lijst van cursussen en toets-ID’s op waarvoor in de rapporten de poging met de beste score van elke cursist wordt getoond.

### `allow_coach_feedback_exercises`

**Tutors toestaan commentaar te geven bij het nakijken van oefeningen**

Tutors toestaan feedback te bewerken bij het nakijken van oefeningen

*Standaard: `true`*

### `allow_edit_exercise_in_lp`

**Docenten toestaan toetsen in leerpaden te bewerken**

Standaard voorkomt Chamilo dat u toetsen bewerkt die in een leerpad zijn opgenomen. Dit is om te vermijden dat wijzigingen cursisten (in het verleden en in de toekomst) anders zouden beïnvloeden wat betreft resultaten en/of voortgang in het leerpad. Deze optie laat docenten deze beperking omzeilen.


### `allow_exercise_categories`

**Toetscategorieën inschakelen**

Toetscategorieën zijn standaard niet ingeschakeld omdat ze extra complexiteit toevoegen. Schakel deze functie in om alle gerelateerde beheerpictogrammen voor toetscategorieën te tonen.

*Standaard: `false`*

### `allow_mandatory_question_in_category`

**Selectie van verplichte vragen inschakelen**

Schakel de selectie van verplichte vragen in een toets in bij gebruik van willekeurige categorieën.

*Standaard: `false`*

### `allow_notification_setting_per_exercise`

**Meldingsinstellingen voor toetsen op toetsniveau**

Schakel de configuratie van meldingen bij het indienen van toetsen in op toetsniveau in plaats van op cursusniveau. Valt terug op de instellingen op cursusniveau als ze niet op toetsniveau zijn gedefinieerd.

*Standaard: `false`*

### `allow_quick_question_description_popup`

**Snel een afbeelding aan een vraag toevoegen**

Schakel een extra pictogram in de vragenlijst van de toets in om een afbeelding als vraagbeschrijving toe te voegen. Dit versnelt het bewerken van vragen aanzienlijk wanneer de vragen in de titel staan en de beschrijving alleen een afbeelding bevat.

*Standaard: `false`*

### `allow_quiz_question_feedback`

**Vraagfeedback toevoegen bij een onjuist antwoord**

Standaard kunt u in Chamilo feedback tonen bij elk antwoord in een vraag. Met deze optie wordt een extra veld aangemaakt om vooraf gedefinieerde feedback voor de hele vraag te geven. Deze feedback verschijnt alleen als de gebruiker onjuist heeft geantwoord.

*Standaard: `false`*

### `allow_quiz_results_page_config`

**Configuratie van de resultatenpagina van toetsen inschakelen**

Definieer een array van instellingen die u wilt toepassen op alle resultatenpagina’s van toetsen. Instellingen kunnen zijn ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ en mogelijk meer in de toekomst. Zoek in de code naar ‘getPageConfigurationAttribute’ om te zien wat in gebruik is.

*Standaard: `false`*

### `allow_quiz_show_previous_button_setting`

**Knop ‘vorige’ in de toets tonen om tussen vragen te navigeren**

Zet dit op false om de knop ‘vorige’ uit te schakelen bij het beantwoorden van vragen in een toets, zodat gebruikers altijd vooruit moeten gaan.

*Standaard: `false`*

### `allow_teacher_comment_audio`

**Audiofeedback op ingediende antwoorden**

Docenten toestaan feedback aan gebruikers te geven via audio (als alternatief voor tekst) bij elke vraag in een toets.

*Standaard: `true`*

### `allow_time_per_question`

**Tijdslimiet per vraag in toetsen inschakelen**

Standaard is het alleen mogelijk de tijd per toets te beperken. Beperken per vraag voegt een extra laag mogelijkheden toe, en u kunt beide (voorzichtig) combineren.

*Standaard: `false`*

### `block_category_questions`

**Vragen van vorige categorieën in een toets vergrendelen**

Bij gebruik van deze optie verschijnt een extra optie in de configuratie van de toets. Bij een toets met meerdere vraagcategorieën en een verdeling per categorie kan de gebruiker vragen per categorie doorlopen. Zodra een categorie is afgerond, gaat hij/zij naar de volgende categorie en kan hij/zij niet terug naar de vorige categorie.

*Standaard: `false`*

### `block_quiz_mail_notification_general_coach`

**Verzenden van toetsmeldingen naar de algemene tutor blokkeren**

Wanneer cursisten een toets afronden, worden meldingen meestal naar tutors gestuurd, inclusief de algemene sessietutor. Schakel deze optie in om de algemene tutor van deze meldingen uit te sluiten.

*Standaard: `false`*

### `configure_exercise_visibility_in_course`

**Inschakelen om de configuratie van Onzichtbare oefening in sessie op het niveau van de basiscursus te omzeilen**

Schakel de configuratie van de onzichtbaarheid van de oefening in de sessie in de basiscursus in om de globale configuratie te omzeilen. Indien niet ingesteld, wordt de globale parameter gebruikt.

*Standaard: `false`*

### `disable_clean_exercise_results_for_teachers`

**'Resultaten wissen' uitschakelen voor docenten**

Schakel de optie uit om toetsresultaten te verwijderen uit de toetsenlijst. Dit wordt vaak gebruikt wanneer minder zorgvuldige docenten cursussen beheren, om kritieke fouten te voorkomen.

*Standaard: `true`*

### `email_alert_manager_on_new_quiz`

**Standaard e-mailwaarschuwing bij nieuwe quiz**

Of u wilt dat cursusbeheerders (docenten) per e-mail worden geïnformeerd wanneer een student een quiz heeft beantwoord. Dit is de standaardwaarde die aan alle nieuwe cursussen wordt gegeven, maar elke docent kan deze instelling nog steeds in zijn/haar eigen cursus wijzigen.

*Standaard: `true`*

### `enable_quiz_scenario`

**Quizscenario inschakelen**

Vanaf hier kunt u oefeningen maken die verschillende vragen voorstellen, afhankelijk van de antwoorden van de gebruiker.

*Standaard: `true`*

### `exercise_additional_teacher_modify_actions`

**Extra koppelingen voor docenten in de toetsenlijst**

Configureer callback-elementen om nieuwe actiepictogrammen voor docenten aan de rechterkant van de toetsenlijst te genereren, in de vorm van een array, bijv. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Gebruikersnaam tonen op de pagina met toetsresultaten**

Toon de gebruikersnaam (in plaats van, of naast, de gebruikersinformatie) op de pagina met toetsresultaten.

*Standaard: `false`*

### `exercise_category_report_user_extra_fields`

**Extra gebruikersvelden toevoegen in het oefeningencategorierapport**

Definieer een array met de lijst van extra gebruikersvelden die aan het rapport moeten worden toegevoegd.

### `exercise_category_round_score_in_export`

**Score afronden in toetsenexports**

Indien ingeschakeld, worden toetsscores afgerond naar het dichtstbijzijnde gehele getal bij het exporteren van oefeningenrapporten.

*Standaard: `false`*

### `exercise_embeddable_extra_types`

**Insluitbare vraagtypen**

Standaard worden alleen vragen met één antwoord en meerdere antwoorden in overweging genomen bij het beslissen of een toets in een video kan worden ingesloten. Met deze optie kunt u bepalen dat meer vraagtypen beschikbaar zijn. Houd er rekening mee dat niet alle vraagtypen goed in de aan video's toegewezen ruimte passen. Vraagtypen zijn beschikbaar in de code in question.class.php.

### `exercise_hide_ip`

**IP-adres van de gebruiker verbergen in toetsrapporten**

Standaard tonen we gebruikersinformatie en het IP-adres, maar dit kan als persoonsgegevens worden beschouwd, dus met deze optie kunt u deze informatie uit alle toetsrapporten verwijderen.

*Standaard: `false`*

### `exercise_hide_label`

**Vragenlint (goed/fout) verbergen in toetsresultaten**

In toetsresultaten verschijnt standaard een lint om aan te geven of het antwoord goed of fout was. Schakel deze optie in om het lint globaal te verwijderen.

*Standaard: `false`*

### `exercise_invisible_in_session`

**Oefening onzichtbaar in sessie**

Als een oefening zichtbaar is in de basiscursus, verschijnt ze onzichtbaar in de sessie. Als een oefening onzichtbaar is in de basiscursus, verschijnt ze niet in de sessie.

*Standaard: `false`*

### `exercise_max_editors_in_page`

**Maximum aantal editors op het scherm met oefeningresultaten**

Vanwege het grote aantal vragen dat in een oefening kan voorkomen, kan het correctiescherm, waarmee de docent bij elk antwoord opmerkingen kan toevoegen, zeer traag laden. Stel dit aantal in op 5 om het platform te vragen alleen WYSIWYG-editors tot een bepaald aantal antwoorden op het scherm te tonen. Dit versnelt de laadtijd van de correctiepagina aanzienlijk, maar verwijdert WYSIWYG-editors en laat alleen een platte-teksteditor over.

*Standaard: `0`*


### `exercise_max_score`

**Maximumscore van oefeningen**

Definieer een maximumscore (meestal 10, 20 of 100) voor alle oefeningen op het platform. Dit bepaalt hoe eindresultaten aan gebruikers en docenten worden getoond.

*Standaard: `20`*


### `exercise_min_score`

**Minimumscore van oefeningen**

Definieer een minimumscore (meestal 0) voor alle oefeningen op het platform. Dit bepaalt hoe eindresultaten aan gebruikers en docenten worden getoond.

*Standaard: `0`*


### `exercise_result_end_text_html_strict_filtering`

**HTML-filtering in eindberichten van toetsen omzeilen**

Beschouw berichten aan het einde van toetsen altijd als veilig. Het verwijderen van het filter maakt het mogelijk daar JavaScript te gebruiken.

*Standaard: `false`*


### `exercise_score_format`

**Opmaak van toetsscores**

Kies tussen de volgende vormen voor de weergave van de score van gebruikers in verschillende rapporten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Gebruik de numerieke ID van de vorm die u wilt gebruiken.

*Standaard: `0`*

### `exercises_disable_new_attempts`

**Nieuwe toets pogingen uitschakelen**

Schakel nieuwe toets pogingen globaal uit. Wordt meestal gebruikt wanneer er een probleem is met toetsen in het algemeen en u wat tijd wilt om te analyseren zonder het hele platform te blokkeren.

*Standaard: `false`*

### `hide_free_question_score`

**Score van open vragen verbergen**

Verberg dat open vragen (inclusief audio en annotaties) een score hebben door de weergave van de score in alle rapporten voor de cursist te verbergen.

*Standaard: `false`*


### `hide_user_info_in_quiz_result`

**Gebruikersinformatie op de resultatenpagina van de toets verbergen**

De standaard resultatenpagina van de toets toont een gebruikersfiche (foto, naam, enz.) die in sommige contexten als het oprekken van de grenzen van de verwerking van persoonsgegevens kan worden beschouwd. Schakel deze optie in om gebruikersgegevens van de toetsresultaten te verwijderen.

*Standaard: `false`*


### `limit_exercise_teacher_access`

**Rechten van docenten op toetsen beperken**

Wanneer ingeschakeld, kunnen docenten geen toetsen of vragen verwijderen, de zichtbaarheid van toetsen wijzigen, naar QTI downloaden, resultaten wissen, enz.

*Standaard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale lijst van openstaande toetsen**

Schakel in om de eindgebruiker een pagina te tonen met de lijst van openstaande toetsen in alle cursussen.

*Standaard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-filtering in toetsvragen omzeilen**

Beschouw de tekst van vragen in toetsen altijd als veilig. Het verwijderen van het filter maakt het mogelijk daar JavaScript te gebruiken.

*Standaard: `false`*


### `question_pagination_length`

**Paginatielengte van vragen voor docenten**

Aantal vragen dat op elke pagina wordt getoond bij gebruik van de optie voor vraagpaginering voor docenten.

*Standaard: `20`*


### `quiz_answer_extra_recording`

**Extra registratie van toetsantwoorden inschakelen**

Schakel de registratie van alle antwoorden (zelfs tijdelijke) in de tabel track_e_attempt_recording in. Deze functie is experimenteel en kan problemen veroorzaken op de rapportagepagina's bij het beoordelen van een toets.

*Standaard: `false`*


### `quiz_check_all_answers_before_end_test`

**Alle antwoorden controleren vóór het indienen van de toets**

Toon een pop-up met de lijst van beantwoorde/onbeantwoorde vragen vóór het indienen van de toets.

*Standaard: `false`*


### `quiz_check_button_enable`

**Controle van het opslagproces van antwoorden vóór de toets toevoegen**

Zorg dat gebruikers klaar zijn om de toets te starten door een simulatie van het opslagproces van vragen te bieden vóór het betreden van de toets. Dit maakt vroege detectie van sommige verbindingsproblemen mogelijk en vermindert wrijving in de gebruikerservaring.

*Standaard: `false`*


### `quiz_confirm_saved_answers`

**Selectievakje voor bevestiging van het aantal antwoorden toevoegen**

Deze optie voegt aan het einde van elke toets een selectievakje toe waarin de gebruiker het aantal opgeslagen antwoorden bevestigt. Dit levert betere auditgegevens op voor kritieke toetsen.

*Standaard: `false`*


### `quiz_discard_orphan_in_course_export`

**Weesvragen bij cursusexport weglaten**

Exporteer bij het exporteren van een cursus niet de vragen die tot geen enkele toets behoren.

*Standaard: `false`*


### `quiz_generate_certificate_ending`

**Certificaat genereren bij het einde van de toets**

Genereer een certificaat bij het beëindigen van een quiz. De quiz moet gekoppeld zijn in de cijferlijsttool en een slaagpercentage geconfigureerd hebben.

*Standaard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabel met toets pogingen op de startpagina van de toets verbergen**

Verberg de tabel die alle eerdere pogingen toont op de startpagina van de toets.

*Standaard: `false`*


### `quiz_hide_question_number`

**Vraagnummer verbergen**

Verberg de opeenvolgende nummering van vragen tijdens het maken van een toets.

*Standaard: `false`*


### `quiz_image_zoom`

**Inzoomen op toetsafbeeldingen inschakelen**

Schakel deze functie in om gebruikers te laten inzoomen op afbeeldingen die in de toetsen worden gebruikt.

### `quiz_keep_alive_ping_interval`

**Sessie actief houden in toetsen**

Houd de sessie actief door elke x seconden een regelmatig pingsignaal naar de server te sturen, hier gedefinieerd. We raden eens per 300 seconden aan.

*Standaard: `0`*


### `quiz_open_question_decimal_score`

**Decimale score bij open vraagtypes**

Sta de docent toe de vraagtypes open, mondelinge expressie en annotatie te beoordelen met een decimale score.

*Standaard: `false`*


### `quiz_prevent_copy_paste`

**Kopiëren-plakken in toetsen blokkeren**

Blokkeer toetsen voor kopiëren/plakken/opslaan/afdrukken en rechtermuisklikken in oefeningen.

*Standaard: `false`*

### `quiz_question_category_destinations` **v3**

**Progressieve adaptieve toetsen via categoriestemming inschakelen**

Schakel progressieve adaptieve toetsen in waarbij elke vraagcategorie cursisten naar een andere categorie kan doorverwijzen, afhankelijk van hun score.

*Standaard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Vragen automatisch verwijderen bij het verwijderen van de toets**

Het standaardgedrag is dat vragen wees worden wanneer de enige toets die ze gebruikt, wordt verwijderd. Wanneer ingeschakeld, zorgt deze optie ervoor dat alle vragen die anders wees zouden worden, eveneens worden verwijderd.

*Standaard: `false`*


### `quiz_results_answers_report`

**Koppeling om toetsresultaten te downloaden tonen**

Toon op de resultatenpagina van de toets een koppeling om de resultaten als bestand te downloaden.

*Standaard: `false`*


### `quiz_show_description_on_results_page`

**Toetsbeschrijving altijd tonen op de resultatenpagina**

Wanneer ingeschakeld, wordt de toetsbeschrijving altijd weergegeven op de resultatenpagina na afronding van de toets.

*Standaard: `false`*

### `score_grade_model`

**Model voor scorecijfers**

Definieer een array van scorebereiken en kleuren om rapporten met dit model weer te geven. Dit stelt u in staat kleuren te tonen in plaats van numerieke cijfers.

### `send_score_in_exam_notification_mail_to_manager`

**Score toevoegen in e-mailmelding van toetsinzending**

Voeg de score van de leerling toe aan de e-mailmelding die naar de docent wordt verzonden nadat een toets is ingediend.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Toon toetspogingen van alle sessies in het rapport van openstaande toetsen**

Toon toetspogingen van gebruikers in alle sessies waartoe de algemene tutor toegang heeft in het rapport van openstaande toetsen.

*Default: `false`*


### `show_exercise_expected_choice`

**Toon verwachte keuze in toetsresultaten**

Toon de verwachte keuze en een status (juist/onjuist) voor elk antwoord op de pagina met toetsresultaten (als de toets is geconfigureerd om resultaten te tonen).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Toon score voor vragen over zekerheidsgraad**

Standaard toont Chamilo geen score voor de vraagtypen over zekerheidsgraad.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Toon toetspogingen van alle sessies in de basiscursus**

Toon toetspogingen van gebruikers in alle sessies aan de docent in de basiscursus.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Toon officiële code in toetsresultaten**

Of de officiële code van studenten moet worden getoond in de rapporten van toetsresultaten

*Default: `false`*

### `show_question_id`

**Toon vraag-ID's in toetsen**

Toon de interne ID's van vragen zodat gebruikers problemen bij specifieke vragen kunnen noteren en efficiënter kunnen rapporteren.

*Default: `false`*


### `show_question_pagination`

**Toon vraagpaginering voor docenten**

Voor toetsen met veel vragen, gebruik paginering als het aantal vragen hoger is dan deze instelling. Stel in op 0 om paginering te voorkomen.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Toon verwijderde toetsen in 'Mijn voortgang'**

Schakel deze optie in om op de pagina 'Mijn voortgang' de resultaten weer te geven van alle toetsen die u hebt gemaakt, zelfs de toetsen die zijn verwijderd.

*Default: `false`*