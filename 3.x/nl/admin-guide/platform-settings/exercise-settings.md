# Instellingen voor oefeningen (toetsen)

Standaardwaarden en gedrag van de tool **Oefeningen (toetsen)** — weergave van vragen, scoring, pogingen en vergelijkbare opties.

Open deze instellingen via **Beheer > Configuratie-instellingen > Oefeningen (toetsen)**. Deze categorie bevat **66 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `add_exercise_best_attempt_in_report`

**Weergave van de poging met de beste score inschakelen**

Geef een lijst met cursussen en toets-ID's op waarvoor in de rapporten de poging met de beste score van elke cursist wordt getoond.

### `allow_coach_feedback_exercises`

**Tutors toestaan commentaar te geven bij het nakijken van oefeningen**

Tutors toestaan feedback te bewerken bij het nakijken van oefeningen

*Standaard: `true`*

### `allow_edit_exercise_in_lp`

**Docenten toestaan toetsen in leerpaden te bewerken**

Standaard voorkomt Chamilo dat u toetsen bewerkt die in een leerpad zijn opgenomen. Dit is om wijzigingen te vermijden die cursisten (in het verleden en in de toekomst) verschillend zouden beïnvloeden wat betreft de resultaten en/of de voortgang in het leerpad. Met deze optie kunnen docenten deze beperking omzeilen.


### `allow_exercise_categories`

**Toetscategorieën inschakelen**

Toetscategorieën zijn standaard niet ingeschakeld omdat ze een extra niveau van complexiteit toevoegen. Schakel deze functie in zodat alle beheerpictogrammen voor toetscategorieën worden weergegeven.

*Standaard: `false`*

### `allow_mandatory_question_in_category`

**Selectie van verplichte vragen inschakelen**

Schakel de selectie van verplichte vragen in een toets in bij het gebruik van willekeurige categorieën.

*Standaard: `false`*

### `allow_notification_setting_per_exercise`

**Meldingsinstellingen voor toetsen op toetsniveau**

Schakel de configuratie van meldingen bij het indienen van een toets in op toetsniveau in plaats van op cursusniveau. Als dit niet op toetsniveau is gedefinieerd, wordt teruggevallen op de instellingen op cursusniveau.

*Standaard: `false`*

### `allow_quick_question_description_popup`

**Snel een afbeelding aan een vraag toevoegen**

Schakel een extra pictogram in de lijst met toetsvragen in om een afbeelding als vraagbeschrijving toe te voegen. Dit versnelt het bewerken van vragen aanzienlijk wanneer de vragen in de titel staan en de beschrijving alleen een afbeelding bevat.

*Standaard: `false`*

### `allow_quiz_question_feedback`

**Vraagfeedback toevoegen bij een onjuist antwoord**

Standaard kunt u in Chamilo feedback tonen bij elk antwoord in een vraag. Met deze optie wordt een extra veld aangemaakt om vooraf gedefinieerde feedback voor de hele vraag te geven. Deze feedback verschijnt alleen als de gebruiker onjuist heeft geantwoord.

*Standaard: `false`*

### `allow_quiz_results_page_config`

**Configuratie van de resultatenpagina van toetsen inschakelen**

Definieer een array met instellingen die u op alle resultatenpagina's van toetsen wilt toepassen. Instellingen kunnen ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ zijn en mogelijk meer in de toekomst. Zoek in de code naar ‘getPageConfigurationAttribute’ om te zien wat in gebruik is.

*Standaard: `false`*

### `allow_quiz_show_previous_button_setting`

**Knop 'vorige' in toets tonen om tussen vragen te navigeren**

Stel dit in op false om de knop 'vorige' uit te schakelen bij het beantwoorden van vragen in een toets, zodat gebruikers altijd alleen vooruit kunnen gaan.

*Standaard: `false`*

### `allow_teacher_comment_audio`

**Audiofeedback op ingediende antwoorden**

Docenten toestaan gebruikers feedback te geven via audio (als alternatief voor tekst) bij elke vraag in een toets.

*Standaard: `true`*

### `allow_time_per_question`

**Tijd per vraag in toetsen inschakelen**

Standaard is het alleen mogelijk de tijd per toets te beperken. Beperking per vraag voegt een extra laag mogelijkheden toe, en u kunt beide (zorgvuldig) combineren.

*Standaard: `false`*

### `block_category_questions`

**Vragen van eerdere categorieën in een toets vergrendelen**

Wanneer u deze optie gebruikt, verschijnt een extra optie in de configuratie van de toets. Bij een toets met meerdere vragencategorieën en een verdeling per categorie kan de gebruiker hiermee per categorie door de vragen navigeren. Zodra een categorie is afgerond, gaat hij of zij naar de volgende categorie en kan niet terugkeren naar de vorige categorie.

*Standaard: `false`*

### `block_quiz_mail_notification_general_coach`

**Verzenden van toetsmeldingen naar de algemene tutor blokkeren**

Wanneer cursisten een toets voltooien, worden meldingen doorgaans naar tutors verzonden, inclusief de algemene sessietutor. Schakel deze optie in om de algemene tutor uit deze meldingen weg te laten.

*Standaard: `false`*

### `configure_exercise_visibility_in_course`

**Inschakelen om de configuratie van oefening onzichtbaar in sessie op basiscursusniveau te omzeilen**

Schakel de configuratie van de onzichtbaarheid van de oefening in de sessie in de basiscursus in om de globale configuratie te omzeilen. Indien niet ingesteld, wordt de globale parameter gebruikt.

*Standaard: `false`*

### `disable_clean_exercise_results_for_teachers`

**'Resultaten wissen' uitschakelen voor docenten**

Schakel de optie uit om toetsresultaten te verwijderen uit de toetsenlijst. Dit wordt vaak gebruikt wanneer minder zorgvuldige docenten cursussen beheren, om kritieke fouten te voorkomen.

*Standaard: `true`*

### `email_alert_manager_on_new_quiz`

**Standaardinstelling voor e-mailwaarschuwing bij nieuwe quiz**

Of u wilt dat cursusbeheerders (docenten) per e-mail worden gewaarschuwd wanneer een student een quiz beantwoordt. Dit is de standaardwaarde die aan alle nieuwe cursussen wordt toegekend, maar elke docent kan deze instelling nog steeds wijzigen in zijn of haar eigen cursus.

*Standaard: `true`*

### `enable_quiz_scenario`

**Quizscenario inschakelen**

Hiermee kunt u oefeningen maken die verschillende vragen voorstellen afhankelijk van de antwoorden van de gebruiker.

*Standaard: `true`*

### `exercise_additional_teacher_modify_actions`

**Extra koppelingen voor docenten in de toetsenlijst**

Configureer callback-elementen om nieuwe actiepictogrammen voor docenten te genereren aan de rechterkant van de toetsenlijst, in de vorm van een array, bijv. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Gebruikersnaam tonen op de pagina met toetsresultaten**

Toon de gebruikersnaam (in plaats van, of naast, de gebruikersinformatie) op de pagina met toetsresultaten.

*Standaard: `false`*

### `exercise_category_report_user_extra_fields`

**Extra gebruikersvelden toevoegen aan het rapport per oefeningcategorie**

Definieer een array met de lijst van extra gebruikersvelden die aan het rapport moeten worden toegevoegd.

### `exercise_category_round_score_in_export`

**Score afronden in toetsuitvoer**

Indien ingeschakeld, worden toetsscores afgerond op het dichtstbijzijnde gehele getal bij het exporteren van oefeningrapporten.

*Standaard: `false`*

### `exercise_default_visibility_can_be_modified_in_course` **v3**

**Standaardzichtbaarheid van nieuwe toetsen kan per cursus worden gewijzigd**

Indien ingeschakeld, kunnen docenten in de cursusinstellingen de zichtbaarheid kiezen die aan nieuwe toetsen van hun cursus wordt gegeven, in plaats van de platformstandaard.

*Standaard: `false`*

Wanneer dit is ingeschakeld, verschijnt een optie **Standaardzichtbaarheid voor nieuwe toetsen** in de sectie **Toetsen** van de cursusinstellingen. Een cursus die geen waarde heeft gekozen, gebruikt `exercise_default_visibility_on_creation`.

### `exercise_default_visibility_on_creation` **v3**

**Standaardzichtbaarheid van nieuwe toetsen**

Zichtbaarheid die aan een nieuwe toets wordt gegeven wanneer een docent deze in een cursus aanmaakt. Docenten kunnen de zichtbaarheid van elke toets daarna nog steeds wijzigen.

*Standaard: `visible`*

### `exercise_embeddable_extra_types`

**Insluitbare vraagtypen**

Standaard worden alleen vragen met één antwoord en vragen met meerdere antwoorden in aanmerking genomen bij het bepalen of een toets in een video kan worden ingesloten. Met deze optie kunt u bepalen dat meer vraagtypen beschikbaar zijn. Houd er rekening mee dat niet alle vraagtypen goed passen in de ruimte die aan video's is toegewezen. Vraagtypen zijn beschikbaar in de code in question.class.php.

### `exercise_hide_ip`

**IP-adres van gebruiker verbergen in toetsrapporten**

Standaard tonen we gebruikersinformatie en het IP-adres, maar dit kan als persoonsgegevens worden beschouwd. Met deze optie kunt u deze informatie uit alle toetsrapporten verwijderen.

*Standaard: `false`*

### `exercise_hide_label`

**Vraaglint (juist/onjuist) verbergen in toetsresultaten**

In toetsresultaten verschijnt standaard een lint om aan te geven of het antwoord juist of onjuist was. Schakel deze optie in om het lint globaal te verwijderen.

*Standaard: `false`*

### `exercise_invisible_in_session`

**Oefening onzichtbaar in sessie**

Als een oefening zichtbaar is in de basiscursus, verschijnt deze onzichtbaar in de sessie. Als een oefening onzichtbaar is in de basiscursus, verschijnt deze niet in de sessie.

*Standaard: `false`*

### `exercise_max_editors_in_page`

**Maximum aantal editors op het scherm met oefeningresultaten**

Vanwege het grote aantal vragen dat in een oefening kan voorkomen, kan het correctiescherm, waarmee de docent opmerkingen bij elk antwoord kan toevoegen, zeer traag laden. Stel dit getal in op 5 om het platform te vragen alleen WYSIWYG-editors te tonen tot een bepaald aantal antwoorden op het scherm. Dit versnelt de laadtijd van de correctiepagina aanzienlijk, maar verwijdert de WYSIWYG-editors en laat alleen een editor voor platte tekst over.

*Standaard: `0`*


### `exercise_max_score`

**Maximumscore van oefeningen**

Definieer een maximumscore (doorgaans 10, 20 of 100) voor alle oefeningen op het platform. Dit bepaalt hoe eindresultaten aan gebruikers en docenten worden getoond.

*Standaard: `20`*


### `exercise_min_score`

**Minimumscore van oefeningen**

Definieer een minimumscore (doorgaans 0) voor alle oefeningen op het platform. Dit bepaalt hoe eindresultaten aan gebruikers en docenten worden getoond.

*Standaard: `0`*

### `exercise_result_end_text_html_strict_filtering`

**HTML-filtering omzeilen in eindberichten van toetsen**

Beschouw berichten aan het einde van toetsen altijd als veilig. Het verwijderen van het filter maakt het mogelijk om daar JavaScript te gebruiken.

*Standaard: `false`*


### `exercise_score_format`

**Scoreformaat van toetsen**

Kies tussen de volgende vormen voor de weergave van de score van gebruikers in diverse rapporten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Gebruik de numerieke ID van de vorm die u wilt gebruiken.

*Standaard: `0`*

### `exercises_disable_new_attempts`

**Nieuwe toetspogingen uitschakelen**

Schakel nieuwe toetspogingen globaal uit. Wordt doorgaans gebruikt wanneer er een probleem is met toetsen in het algemeen en u enige tijd wilt om dit te analyseren zonder het hele platform te blokkeren.

*Standaard: `false`*


### `hide_free_question_score`

**Score van open vragen verbergen**

Verberg het feit dat open vragen (inclusief audio en annotaties) een score hebben door de scoreweergave te verbergen in alle rapporten die voor cursisten zichtbaar zijn.

*Standaard: `false`*


### `hide_user_info_in_quiz_result`

**Gebruikersgegevens verbergen op de pagina met toetsresultaten**

De standaardpagina met toetsresultaten toont een gebruikersgegevensblad (foto, naam, enz.) dat in sommige contexten als grensoverschrijdend kan worden beschouwd wat betreft de verwerking van persoonsgegevens. Schakel deze optie in om gebruikersgegevens uit de toetsresultaten te verwijderen.

*Standaard: `false`*


### `limit_exercise_teacher_access`

**Rechten van docenten over toetsen beperken**

Indien ingeschakeld, kunnen docenten geen toetsen of vragen verwijderen, de zichtbaarheid van toetsen wijzigen, naar QTI downloaden, resultaten wissen, enz.

*Standaard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale lijst van openstaande toetsen**

Schakel in om de eindgebruiker een pagina te tonen met de lijst van openstaande toetsen in alle cursussen.

*Standaard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-filtering omzeilen in toetsvragen**

Beschouw de tekst van vragen in toetsen altijd als veilig. Het verwijderen van het filter maakt het mogelijk om daar JavaScript te gebruiken.

*Standaard: `false`*


### `question_pagination_length`

**Pagineringlengte van vragen voor docenten**

Aantal vragen dat op elke pagina wordt getoond bij gebruik van de optie voor paginering van vragen voor docenten.

*Standaard: `20`*


### `quiz_answer_extra_recording`

**Extra registratie van toetsantwoorden inschakelen**

Schakel de registratie van alle antwoorden (ook tijdelijke) in de tabel track_e_attempt_recording in. Deze functie is experimenteel en kan problemen veroorzaken op de rapportagepagina's bij het beoordelen van een toets.

*Standaard: `false`*


### `quiz_check_all_answers_before_end_test`

**Alle antwoorden controleren vóór het indienen van de toets**

Toon een pop-up met de lijst van beantwoorde/onbeantwoorde vragen vóór het indienen van de toets.

*Standaard: `false`*


### `quiz_check_button_enable`

**Controle van het antwoordopslagproces toevoegen vóór de toets**

Zorg ervoor dat gebruikers klaar zijn om de toets te starten door een simulatie van het vraagopslagproces aan te bieden voordat ze de toets betreden. Dit maakt vroegtijdige detectie van sommige verbindingsproblemen mogelijk en vermindert wrijving in de gebruikerservaring.

*Standaard: `false`*


### `allow_final_exam_access_rule`

**Toegangsvoorwaarden vóór een toets**

Hiermee kunnen docenten een toets, zoals een eindexamen, gesloten houden totdat de cursist een minimale tijd in de cursus heeft doorgebracht en een verplicht profielveld heeft ingevuld. Docenten stellen deze voorwaarden in bij de geavanceerde instellingen van elke toets. Zolang deze instelling is uitgeschakeld, worden de voorwaarden noch getoond noch toegepast.

De instelling wordt automatisch ingeschakeld wanneer het platform wordt bijgewerkt met toetsen die dergelijke voorwaarden al bevatten, en door het commando `chamilo:migration:migrate-final-exam-access` wanneer dit ze wegschrijft.

*Standaard: `false`*


### `quiz_confirm_saved_answers`

**Selectievakje toevoegen voor bevestiging van het aantal antwoorden**

Deze optie voegt aan het einde van elke toets een selectievakje toe waarin de gebruiker wordt gevraagd het aantal opgeslagen antwoorden te bevestigen. Dit levert betere auditgegevens op voor kritieke toetsen.

*Standaard: `false`*


### `quiz_discard_orphan_in_course_export`

**Weesvragen negeren bij cursusexport**

Exporteer bij het exporteren van een cursus niet de vragen die geen deel uitmaken van een toets.

*Standaard: `false`*


### `quiz_generate_certificate_ending`

**Certificaat genereren aan het einde van de toets**

Genereer een certificaat bij het beëindigen van een quiz. De quiz moet gekoppeld zijn in het gradebook-hulpmiddel en een slagingspercentage hebben geconfigureerd.

*Standaard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabel met toetspogingen verbergen op de startpagina van de toets**

Verberg de tabel met alle eerdere pogingen op de startpagina van de toets.

*Standaard: `false`*


### `quiz_hide_question_number`

**Vraagnummer verbergen**

Verberg de oplopende nummering van vragen tijdens het afleggen van een toets.

*Standaard: `false`*


### `quiz_image_zoom`

**Inzoomen op toetsafbeeldingen inschakelen**

Schakel deze functie in om gebruikers te laten inzoomen op afbeeldingen die in de toetsen worden gebruikt.

### `quiz_keep_alive_ping_interval`

**Sessie actief houden in toetsen**

Houd de sessie actief door een regelmatig pingsignaal naar de server te sturen om de x seconden, hier gedefinieerd. Wij raden eens per 300 seconden aan.

*Standaard: `0`*

### `quiz_open_question_decimal_score`

**Decimale score bij open vraagtypes**

Sta de docent toe de vraagtypes open vraag, mondelinge expressie en annotatie te beoordelen met een decimale score.

*Default: `false`*


### `quiz_prevent_copy_paste`

**Kopiëren en plakken blokkeren in toetsen**

Blokkeer de toetsen voor kopiëren/plakken/opslaan/afdrukken en rechtermuisklikken in oefeningen.

*Default: `false`*

### `quiz_question_category_destinations` **v3**

**Progressieve adaptieve toetsen op basis van categoriedestinatie inschakelen**

Schakel progressieve adaptieve toetsen in waarbij elke vragencategorie cursisten kan doorverwijzen naar een andere categorie, afhankelijk van hun score.

*Default: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Vragen automatisch verwijderen bij het verwijderen van een toets**

Het standaardgedrag is om vragen te verwezen wanneer de enige toets die ze gebruikt, wordt verwijderd. Indien ingeschakeld, zorgt deze optie ervoor dat alle vragen die anders verweesd zouden raken, eveneens worden verwijderd.

*Default: `false`*


### `quiz_results_answers_report`

**Koppeling tonen om toetsresultaten te downloaden**

Toon op de pagina met toetsresultaten een koppeling om de resultaten als bestand te downloaden.

*Default: `false`*


### `quiz_show_description_on_results_page`

**Toetsbeschrijving altijd tonen op de resultatenpagina**

Indien ingeschakeld, wordt de toetsbeschrijving altijd weergegeven op de resultatenpagina na afronding van de toets.

*Default: `false`*


### `score_grade_model`

**Model voor scorebeoordelingen**

Definieer een reeks scorebereiken en kleuren om rapporten met dit model weer te geven. Hiermee kunt u kleuren tonen in plaats van numerieke cijfers.

### `send_score_in_exam_notification_mail_to_manager`

**Score toevoegen aan de e-mailmelding van een toetsinzending**

Voeg de score van de cursist toe aan de e-mailmelding die naar de docent wordt verzonden nadat een toets is ingediend.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Toetspogingen uit alle sessies tonen in het rapport met toetsen in afwachting**

Toon in het rapport met toetsen in afwachting de toetspogingen van gebruikers in alle sessies waartoe de algemene tutor toegang heeft.

*Default: `false`*


### `show_exercise_expected_choice`

**Verwachte keuze tonen in toetsresultaten**

Toon de verwachte keuze en een status (goed/fout) voor elk antwoord op de pagina met toetsresultaten (als de toets is geconfigureerd om resultaten te tonen).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Score tonen voor vragen met zekerheidsgraad**

Standaard toont Chamilo geen score voor de vraagtypes met zekerheidsgraad.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Toetspogingen uit alle sessies tonen in de basiscursus**

Toon toetspogingen van gebruikers uit alle sessies aan de docent in de basiscursus.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Officiële code tonen in toetsresultaten**

Bepaalt of de officiële code van studenten wordt getoond in de rapporten met toetsresultaten.

*Default: `false`*

### `show_question_id`

**Vraag-ID's tonen in toetsen**

Toon de interne ID's van vragen, zodat gebruikers problemen bij specifieke vragen kunnen noteren en efficiënter kunnen melden.

*Default: `false`*


### `show_question_pagination`

**Paginering van vragen tonen voor docenten**

Gebruik bij toetsen met veel vragen paginering als het aantal vragen hoger is dan deze instelling. Stel in op 0 om paginering te voorkomen.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Verwijderde toetsen tonen in 'Mijn voortgang'**

Schakel deze optie in om op de pagina 'Mijn voortgang' de resultaten te tonen van alle toetsen die u hebt afgelegd, ook de toetsen die zijn verwijderd.

*Default: `false`*