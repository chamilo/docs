# Inställningar för övningar (tester)

Standardvärden och beteende för verktyget **Övningar (tester)** — visning av frågor, poängsättning, försök och liknande.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Övningar (tester)**. Denna kategori innehåller **64 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `add_exercise_best_attempt_in_report`

**Aktivera visning av bästa poängförsök**

Ange en lista med kurs- och test-ID:n som ska visa det bästa poängförsöket för varje lärande i rapporterna.

### `allow_coach_feedback_exercises`

**Tillåt handledare att kommentera vid granskning av övningar**

Tillåt handledare att redigera återkoppling när de granskar övningar

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Tillåt lärare att redigera tester i lärstigar**

Som standard förhindrar Chamilo att du redigerar tester som ingår i en lärstig. Detta för att undvika ändringar som skulle påverka lärande (tidigare och framtida) olika vad gäller resultat och/eller framsteg i lärstigen. Detta alternativ gör det möjligt för lärare att kringgå denna begränsning.


### `allow_exercise_categories`

**Aktivera testkategorier**

Testkategorier är inte aktiverade som standard eftersom de tillför en extra komplexitetsnivå. Aktivera den här funktionen för att visa alla hanteringsikoner relaterade till testkategorier.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Aktivera val av obligatoriska frågor**

Aktivera val av obligatoriska frågor i ett test när slumpmässiga kategorier används.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Aviseringsinställningar för tester på testnivå**

Aktivera konfiguration av aviseringar vid inlämning av tester på testnivå i stället för på kursnivå. Återgår till inställningar på kursnivå om de inte är definierade på testnivå.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Snabb bildtillägg till fråga**

Aktivera en extra ikon i listan över testfrågor för att lägga till en bild som frågebeskrivning. Detta påskyndar redigeringen av frågor avsevärt när frågorna står i titeln och beskrivningen endast innehåller en bild.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Lägg till frågeåterkoppling vid felaktigt svar**

Som standard tillåter Chamilo att du visar återkoppling för varje svarsalternativ i en fråga. Med detta alternativ skapas ett extra fält för att ge fördefinierad återkoppling till hela frågan. Denna återkoppling visas endast om användaren svarade felaktigt.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Aktivera konfiguration av resultatsidan för tester**

Definiera en array med inställningar som du vill tillämpa på alla resultatsidor för tester. Inställningar kan vara ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ och möjligen fler i framtiden. Sök efter ‘getPageConfigurationAttribute’ i koden för att se vad som används.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Visa knappen "föregående" i testet för att navigera mellan frågor**

Sätt detta till false för att inaktivera knappen "föregående" när frågor besvaras i ett test, och därmed tvinga användare att alltid gå framåt.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Ljudåterkoppling till inlämnade svar**

Tillåt lärare att ge återkoppling till användare via ljud (som alternativ till text) för varje fråga i ett test.

*Standard: `true`*

### `allow_time_per_question`

**Aktivera tidsgräns per fråga i tester**

Som standard är det bara möjligt att begränsa tiden per test. Att begränsa den per fråga ger ett extra lager av möjligheter, och du kan (försiktigt) kombinera båda.

*Standard: `false`*

### `block_category_questions`

**Lås frågor från föregående kategorier i ett test**

När detta alternativ används visas ett extra alternativ i testets konfiguration. När ett test med flera frågekategorier används och fördelning per kategori begärs, gör detta att användaren kan navigera frågor per kategori. När en kategori är avslutad går hen vidare till nästa kategori och kan inte återvända till den föregående kategorin.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Blockera sändning av testaviseringar till den allmänna handledaren**

När lärande slutför ett test skickas vanligtvis aviseringar till handledare, inklusive den allmänna sessionshandledaren. Aktivera detta alternativ för att utelämna den allmänna handledaren från dessa aviseringar.

*Standard: `false`*

### `configure_exercise_visibility_in_course`

**Aktivera för att kringgå konfigurationen av osynligt test i session på baskursnivå**

Aktiverar konfigurationen av testets osynlighet i session i baskursen för att kringgå den globala konfigurationen. Om den inte är inställd används den globala parametern.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**Inaktivera "rensa resultat" för lärare**

Inaktiverar möjligheten att ta bort testresultat från testlistan. Detta används ofta när mindre noggranna lärare hanterar kurser, för att undvika allvarliga misstag.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standardinställning för e-postavisering vid nytt quiz**

Om du vill att kursansvariga (lärare) ska meddelas via e-post när ett quiz besvaras av en student. Detta är standardvärdet som ges till alla nya kurser, men varje lärare kan fortfarande ändra inställningen i sin egen kurs.

*Standard: `true`*

### `enable_quiz_scenario`

**Aktivera quizscenario**

Härifrån kan du skapa övningar som föreslår olika frågor beroende på användarens svar.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Ytterligare länkar för lärare i testlistan**

Konfigurera callback-element för att generera nya åtgärdsikoner för lärare till höger i testlistan, i form av en array, t.ex. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Visa användarnamn på sidan för testresultat**

Visa användarnamnet (i stället för, eller tillsammans med, användarinformationen) på sidan för testresultat.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Lägg till extra användarfält i rapporten för övningskategorier**

Definiera en array med listan över extra användarfält som ska läggas till i rapporten.

### `exercise_category_round_score_in_export`

**Avrunda poäng i testexporter**

När detta är aktiverat avrundas testpoäng till närmaste heltal vid export av övningsrapporter.

*Standard: `false`*

### `exercise_embeddable_extra_types`

**Inbäddningsbara frågetyper**

Som standard betraktas endast frågor med ett svar och flersvar när det avgörs om ett test kan bäddas in i en video eller inte. Med det här alternativet kan du besluta att fler frågetyper ska vara tillgängliga. Observera att inte alla frågetyper passar bra i det utrymme som tilldelas videor. Frågetyper finns tillgängliga i koden i question.class.php.

### `exercise_hide_ip`

**Dölj användarens IP från testrapporter**

Som standard visar vi användarinformation och dess IP-adress, men detta kan betraktas som personuppgifter, så det här alternativet gör det möjligt att ta bort denna information från alla testrapporter.

*Standard: `false`*

### `exercise_hide_label`

**Dölj frågeband (rätt/fel) i testresultat**

I testresultat visas som standard ett band som anger om svaret var rätt eller fel. Aktivera det här alternativet för att ta bort bandet globalt.

*Standard: `false`*

### `exercise_invisible_in_session`

**Övning osynlig i session**

Om en övning är synlig i baskursen visas den som osynlig i sessionen. Om en övning är osynlig i baskursen visas den inte i sessionen.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Max antal redigerare på skärmen för övningsresultat**

På grund av det stora antalet frågor som kan förekomma i en övning kan rättningsskärmen, där läraren kan lägga till kommentarer till varje svar, bli mycket långsam att ladda. Ange detta tal till 5 för att be plattformen att endast visa WYSIWYG-redigerare upp till ett visst antal svar på skärmen. Detta snabbar upp laddningstiden för rättningssidan avsevärt, men tar bort WYSIWYG-redigerare och lämnar endast en enkel textredigerare.

*Standard: `0`*


### `exercise_max_score`

**Maximal poäng för övningar**

Definiera en maximal poäng (vanligtvis 10, 20 eller 100) för alla övningar på plattformen. Detta definierar hur slutresultat visas för användare och lärare.

*Standard: `20`*


### `exercise_min_score`

**Minimal poäng för övningar**

Definiera en minimal poäng (vanligtvis 0) för alla övningar på plattformen. Detta definierar hur slutresultat visas för användare och lärare.

*Standard: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Kringgå HTML-filtrering i meddelanden i slutet av test**

Betrakta meddelanden i slutet av tester som alltid säkra. Att ta bort filtret gör det möjligt att använda JavaScript där.

*Standard: `false`*


### `exercise_score_format`

**Format för testpoäng**

Välj mellan följande former för visning av användarnas poäng i olika rapporter: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Använd det numeriska ID:t för den form du vill använda.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Inaktivera nya testförsök**

Inaktivera nya testförsök globalt. Används vanligtvis när det finns ett problem med tester i allmänhet och du vill ha tid att analysera utan att blockera hela plattformen.

*Standard: `false`*

### `hide_free_question_score`

**Dölj poäng för öppna frågor**

Dölj att öppna frågor (inklusive ljud och annoteringar) har poäng genom att dölja poängvisningen i alla rapporter som visas för deltagare.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Dölj användarinformation på sidan för testresultat**

Standardsidan för testresultat visar ett användarblad (foto, namn osv.) som i vissa sammanhang kan uppfattas som att gå för långt i behandlingen av personuppgifter. Aktivera det här alternativet för att ta bort användaruppgifter från testresultaten.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Begränsa lärares behörigheter för tester**

När alternativet är aktiverat kan lärare inte ta bort tester eller frågor, ändra testers synlighet, ladda ner till QTI, rensa resultat osv.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Global lista över väntande tester**

Aktivera för att visa slutanvändaren en sida med listan över väntande tester i alla kurser.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**Förbigå HTML-filtrering i testfrågor**

Betrakta frågetext i tester som alltid säker. Om filtret tas bort blir det möjligt att använda JavaScript där.

*Standard: `false`*


### `question_pagination_length`

**Sidlängd för frågepaginering för lärare**

Antal frågor som ska visas på varje sida när alternativet för frågepaginering för lärare används.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Aktivera extra inspelning av testsvar**

Aktivera inspelning av alla svar (även tillfälliga) i tabellen track_e_attempt_recording. Den här funktionen är experimentell och kan skapa problem på rapportsidorna när ett test ska rättas.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Kontrollera alla svar innan testet skickas in**

Visa en popup med listan över besvarade/obesvarade frågor innan testet skickas in.

*Standard: `false`*


### `quiz_check_button_enable`

**Lägg till kontroll av svars sparprocess före testet**

Säkerställ att användarna är redo att starta testet genom att tillhandahålla en simulering av processen för att spara frågor innan testet påbörjas. Detta möjliggör tidig upptäckt av vissa anslutningsproblem och minskar friktion i användarupplevelsen.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Lägg till kryssruta för bekräftelse av antal svar**

Det här alternativet lägger till en kryssruta i slutet av varje test där användaren ombeds bekräfta antalet sparade svar. Detta ger bättre granskningsdata för kritiska tester.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Uteslut föräldralösa frågor vid kursexport**

När en kurs exporteras, exportera inte de frågor som inte ingår i något test.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Generera intyg vid testets slut**

Generera intyg när ett quiz avslutas. Quizet måste vara kopplat i betygsboksverktyget och ha en godkändprocentsats konfigurerad.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Dölj tabellen över testförsök på testets startsida**

Dölj tabellen som visar alla tidigare försök på testets startsida.

*Standard: `false`*


### `quiz_hide_question_number`

**Dölj frågenummer**

Dölj den löpande numreringen av frågor när ett test genomförs.

*Standard: `false`*


### `quiz_image_zoom`

**Aktivera zoomning av bilder i tester**

Aktivera den här funktionen för att tillåta användare att zooma in på bilder som används i testerna.

### `quiz_keep_alive_ping_interval`

**Håll sessionen aktiv i tester**

Håll sessionen aktiv genom att skicka en regelbunden ping-signal till servern var x:e sekund, definiera här. Vi rekommenderar en gång var 300:e sekund.

*Standard: `0`*


### `quiz_open_question_decimal_score`

**Decimalpoäng i öppna frågetyper**

Tillåt läraren att sätta betyg på frågetyperna öppen, muntlig framställning och annotering med decimalpoäng.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Blockera kopiering och klistring i tester**

Blockera tangenterna för kopiera/klistra in/spara/skriv ut samt högerklick i övningar.

*Standard: `false`*

### `quiz_question_category_destinations` **v3**

**Aktivera progressiva adaptiva tester via kategoridestination**

Aktivera progressiva adaptiva tester där varje frågekategori kan omdirigera deltagare till en annan kategori beroende på deras poäng.

*Standard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Ta automatiskt bort frågor när testet tas bort**

Standardbeteendet är att göra frågor föräldralösa när det enda test som använder dem tas bort. När det här alternativet är aktiverat säkerställs att alla frågor som annars skulle bli föräldralösa också tas bort.

*Standard: `false`*


### `quiz_results_answers_report`

**Visa länk för att ladda ner testresultat**

På sidan för testresultat, visa en länk för att ladda ner resultaten som en fil.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Visa alltid testbeskrivningen på resultatsidan**

När alternativet är aktiverat visas testbeskrivningen alltid på resultatsidan efter att testet har slutförts.

*Standard: `false`*

### `score_grade_model`

**Poängbetygsmodell**

Definiera en array med poängintervall och färger för att visa rapporter med denna modell. Detta gör att du kan visa färger i stället för numeriska betyg.

### `send_score_in_exam_notification_mail_to_manager`

**Lägg till poäng i e-postavisering om inlämnat test**

Lägg till elevens poäng i e-postaviseringen som skickas till läraren efter att ett test har lämnats in.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Visa testförsök från alla sessioner i rapporten över väntande tester**

Visa testförsök från användare i alla sessioner där den allmänna handledaren har åtkomst, i rapporten över väntande tester.

*Default: `false`*


### `show_exercise_expected_choice`

**Visa förväntat val i testresultat**

Visa det förväntade valet och en status (rätt/fel) för varje svar på sidan med testresultat (om testet har konfigurerats att visa resultat).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Visa poäng för frågor om säkerhetsgrad**

Som standard visar Chamilo inte poäng för frågetyperna med säkerhetsgrad.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Visa testförsök från alla sessioner i baskursen**

Visa testförsök från användare i alla sessioner för läraren i baskursen.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Visa officiell kod i övningsresultat**

Om studenternas officiella kod ska visas i rapporterna över övningsresultat

*Default: `false`*

### `show_question_id`

**Visa fråge-ID:n i tester**

Visa frågornas interna ID:n så att användare kan notera problem med specifika frågor och rapportera dem mer effektivt.

*Default: `false`*


### `show_question_pagination`

**Visa sidindelning av frågor för lärare**

För tester med många frågor, använd sidindelning om antalet frågor är högre än denna inställning. Ange 0 för att inte använda sidindelning.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Visa raderade tester i «Min framsteg»**

Aktivera detta alternativ för att visa, på sidan «Min framsteg», resultaten av alla tester du har gjort, även de som har raderats.

*Default: `false`*