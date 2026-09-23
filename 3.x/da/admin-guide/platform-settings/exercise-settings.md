# Øvelser (tests) – indstillinger

Standarder og adfærd for værktøjet **Øvelser (tests)** — visning af spørgsmål, scoring, forsøg og lignende.

Disse indstillinger findes under **Administration > Konfigurationsindstillinger > Øvelser (tests)**. Denne kategori indeholder **64 indstillinger**, som er listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `add_exercise_best_attempt_in_report`

**Aktivér visning af bedste score-forsøg**

Angiv en liste over kurser og tests’ ID’er, der skal vise det bedste score-forsøg for enhver kursist i rapporterne.

### `allow_coach_feedback_exercises`

**Tillad vejledere at kommentere ved gennemgang af øvelser**

Tillad vejledere at redigere feedback, når de gennemgår øvelser

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Tillad undervisere at redigere tests i læringsstier**

Som standard forhindrer Chamilo dig i at redigere tests, der er inkluderet i en læringssti. Dette er for at undgå ændringer, der ville påvirke kursister (tidligere og kommende) forskelligt med hensyn til resultater og/eller fremdrift i læringsstien. Denne indstilling giver undervisere mulighed for at omgå denne begrænsning.


### `allow_exercise_categories`

**Aktivér testkategorier**

Testkategorier er ikke aktiveret som standard, fordi de tilføjer et lag af kompleksitet. Aktivér denne funktion for at få alle administrationsikoner relateret til testkategorier til at vises.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Aktivér valg af obligatoriske spørgsmål**

Aktivér valg af obligatoriske spørgsmål i en test, når der bruges tilfældige kategorier.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Notifikationsindstillinger for tests på testniveau**

Aktivér konfiguration af notifikationer ved aflevering af tests på testniveau i stedet for kursusniveau. Falder tilbage til indstillinger på kursusniveau, hvis de ikke er defineret på testniveau.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Hurtig tilføjelse af billede til spørgsmål**

Aktivér et ekstra ikon i listen over testspørgsmål til at tilføje et billede som spørgsmålsbeskrivelse. Dette accelererer i høj grad redigering af spørgsmål, når spørgsmålene står i titlen, og beskrivelsen kun indeholder et billede.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Tilføj spørgsmålsfeedback ved forkert svar**

Som standard giver Chamilo dig mulighed for at vise feedback på hvert svar i et spørgsmål. Med denne indstilling oprettes et ekstra felt til at give foruddefineret feedback til hele spørgsmålet. Denne feedback vises kun, hvis brugeren svarede forkert.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Aktivér konfiguration af resultatsiden for tests**

Definer et array af indstillinger, du vil anvende på alle resultatsider for tests. Indstillinger kan være ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ og muligvis flere i fremtiden. Søg efter ‘getPageConfigurationAttribute’ i koden for at se, hvad der er i brug.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Vis knappen ‘forrige’ i testen til at navigere mellem spørgsmål**

Sæt denne til false for at deaktivere knappen ‘forrige’, når der besvares spørgsmål i en test, og dermed tvinge brugere til altid at gå fremad.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Lydfeedback til indsendte svar**

Tillad undervisere at give feedback til brugere via lyd (som alternativ til tekst) på hvert spørgsmål i en test.

*Standard: `true`*

### `allow_time_per_question`

**Aktivér tid pr. spørgsmål i tests**

Som standard er det kun muligt at begrænse tiden pr. test. At begrænse den pr. spørgsmål tilføjer et ekstra lag af muligheder, og du kan (forsigtigt) kombinere begge.

*Standard: `false`*

### `block_category_questions`

**Lås spørgsmål fra tidligere kategorier i en test**

Når denne indstilling bruges, vises en ekstra indstilling i testens konfiguration. Når der bruges en test med flere spørgsmålskategorier, og der bedes om fordeling efter kategori, giver dette brugeren mulighed for at navigere i spørgsmål pr. kategori. Når en kategori er afsluttet, går vedkommende videre til næste kategori og kan ikke vende tilbage til den forrige kategori.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloker afsendelse af testnotifikationer til den overordnede vejleder**

Når kursister gennemfører en test, sendes der normalt notifikationer til vejledere, herunder den overordnede sessionsvejleder. Aktivér denne indstilling for at udelade den overordnede vejleder fra disse notifikationer.

*Standard: `false`*

### `configure_exercise_visibility_in_course`

**Aktivér omgåelse af konfigurationen af usynlig øvelse i session på basiskursusniveau**

Aktiverer konfigurationen af øvelsens usynlighed i sessionen i basiskurset, så den globale konfiguration omgås. Hvis den ikke er sat, bruges den globale parameter.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**Deaktiver 'rens resultater' for undervisere**

Deaktiverer muligheden for at slette testresultater fra testlisten. Dette bruges ofte, når mindre omhyggelige undervisere administrerer kurser, for at undgå kritiske fejl.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standardindstilling for e-mailadvisering ved ny quiz**

Om du ønsker, at kursusansvarlige (undervisere) skal adviseres via e-mail, når en quiz besvares af en studerende. Dette er standardværdien, der tildeles alle nye kurser, men hver underviser kan stadig ændre indstillingen i sit eget kursus.

*Standard: `true`*

### `enable_quiz_scenario`

**Aktivér quiz-scenarie**

Herfra kan du oprette øvelser, der stiller forskellige spørgsmål afhængigt af brugerens svar.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Yderligere links til undervisere i testlisten**

Konfigurer callback-elementer til at generere nye handlingsikoner for undervisere til højre i testlisten, i form af et array, f.eks. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Vis brugernavn på testresultatsiden**

Vis brugernavnet (i stedet for eller sammen med brugeroplysningerne) på testresultatsiden.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Tilføj ekstra brugerfelter i øvelseskategorirapporten**

Definer et array med listen over ekstra brugerfelter, der skal tilføjes til rapporten.

### `exercise_category_round_score_in_export`

**Afrund score i testeksport**

Når indstillingen er aktiveret, afrundes testscores til nærmeste heltal ved eksport af øvelsesrapporter.

*Standard: `false`*

### `exercise_embeddable_extra_types`

**Indlejrbare spørgsmålstyper**

Som standard betragtes kun spørgsmål med ét svar og flere svar, når det afgøres, om en test kan indlejres i en video. Med denne indstilling kan du beslutte, at flere spørgsmålstyper er tilgængelige. Vær opmærksom på, at ikke alle spørgsmålstyper passer godt ind i det rum, der er tildelt videoer. Spørgsmålstyper er tilgængelige i koden i question.class.php.

### `exercise_hide_ip`

**Skjul bruger-IP fra testrapporter**

Som standard viser vi brugeroplysninger og IP-adresse, men dette kan betragtes som persondata, så denne indstilling giver dig mulighed for at fjerne disse oplysninger fra alle testrapporter.

*Standard: `false`*

### `exercise_hide_label`

**Skjul spørgsmålsbånd (rigtigt/forkert) i testresultater**

I testresultater vises der som standard et bånd, der angiver, om svaret var rigtigt eller forkert. Aktivér denne indstilling for at fjerne båndet globalt.

*Standard: `false`*

### `exercise_invisible_in_session`

**Øvelse usynlig i session**

Hvis en øvelse er synlig i basiskurset, vises den som usynlig i sessionen. Hvis en øvelse er usynlig i basiskurset, vises den ikke i sessionen.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Maksimalt antal editorer på øvelsesresultatskærmen**

På grund af det store antal spørgsmål, der kan optræde i en øvelse, kan rettelsesskærmen, hvor underviseren kan tilføje kommentarer til hvert svar, være meget langsom at indlæse. Sæt dette tal til 5 for at bede platformen om kun at vise WYSIWYG-editorer op til et vist antal svar på skærmen. Dette vil forkorte indlæsningstiden for rettelsessiden betydeligt, men fjerner WYSIWYG-editorer og efterlader kun en almindelig teksteditor.

*Standard: `0`*


### `exercise_max_score`

**Maksimal score for øvelser**

Definer en maksimal score (typisk 10, 20 eller 100) for alle øvelser på platformen. Dette definerer, hvordan endelige resultater vises for brugere og undervisere.

*Standard: `20`*


### `exercise_min_score`

**Minimal score for øvelser**

Definer en minimal score (typisk 0) for alle øvelser på platformen. Dette definerer, hvordan endelige resultater vises for brugere og undervisere.

*Standard: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Omgå HTML-filtrering i beskeder ved testafslutning**

Betragt beskeder ved afslutningen af tests som altid sikre. Fjernelse af filteret gør det muligt at bruge JavaScript dér.

*Standard: `false`*


### `exercise_score_format`

**Format for testscore**

Vælg mellem følgende former for visning af brugernes score i forskellige rapporter: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Brug det numeriske ID for den form, du vil bruge.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Deaktiver nye testforsøg**

Deaktiver nye testforsøg globalt. Bruges typisk, når der er et problem med tests generelt, og du har brug for tid til at analysere uden at blokere hele platformen.

*Standard: `false`*

### `hide_free_question_score`

**Skjul score for åbne spørgsmål**

Skjul, at åbne spørgsmål (herunder lyd og annotationer) har en score, ved at skjule scorevisningen i alle rapporter, der vises for kursister.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Skjul brugeroplysninger på testsidesiden**

Den standardmæssige testsideside viser et brugerdatablad (foto, navn osv.), som i visse sammenhænge kan anses for at gå tæt på grænsen for behandling af personoplysninger. Aktivér denne indstilling for at fjerne brugeroplysninger fra testresultaterne.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Begræns underviseres rettigheder over tests**

Når indstillingen er aktiveret, kan undervisere ikke slette tests eller spørgsmål, ændre testers synlighed, downloade til QTI, rydde resultater osv.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Global liste over afventende tests**

Aktivér for at vise den endelige bruger en side med listen over afventende tests på tværs af alle kurser.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**Omgå HTML-filtrering i testspørgsmål**

Betragt spørgsmålstekst i tests som altid sikker. Fjernelse af filteret gør det muligt at bruge JavaScript dér.

*Standard: `false`*


### `question_pagination_length`

**Spørgsmålspagineringslængde for undervisere**

Antal spørgsmål, der vises på hver side, når indstillingen for spørgsmålspaginering for undervisere anvendes.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Aktivér ekstra registrering af testsvar**

Aktivér registrering af alle svar (også midlertidige) i tabellen track_e_attempt_recording. Denne funktion er eksperimentel og kan skabe problemer på rapportsiderne, når man forsøger at bedømme en test.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Kontrollér alle svar før indsendelse af test**

Vis en popup med listen over besvarede/ubesvarede spørgsmål, før testen indsendes.

*Standard: `false`*


### `quiz_check_button_enable`

**Tilføj kontrol af svargemningsproces før test**

Sørg for, at brugerne er klar til at starte testen, ved at tilbyde en simulering af spørgsmålsgemningsprocessen, før de går ind i testen. Dette muliggør tidlig opdagelse af visse forbindelsesproblemer og reducerer friktion i brugeroplevelsen.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Tilføj afkrydsningsfelt til bekræftelse af antal svar**

Denne indstilling tilføjer et afkrydsningsfelt i slutningen af hver test, hvor brugeren bedes bekræfte antallet af gemte svar. Dette giver bedre revisionsdata for kritiske tests.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Udelad forældreløse spørgsmål ved kurseksport**

Når et kursus eksporteres, eksporteres de spørgsmål, der ikke indgår i nogen test, ikke.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Generér certifikat ved testafslutning**

Generér certifikat, når en quiz afsluttes. Quizzen skal være knyttet i karakterbogs-værktøjet og have en beståelsesprocent konfigureret.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Skjul tabel over testforsøg på testens startside**

Skjul tabellen, der viser alle tidligere forsøg, på testens startside.

*Standard: `false`*


### `quiz_hide_question_number`

**Skjul spørgsmålsnummer**

Skjul den fortløbende nummerering af spørgsmål, når en test tages.

*Standard: `false`*


### `quiz_image_zoom`

**Aktivér zoom af billeder i tests**

Aktivér denne funktion for at tillade brugere at zoome på billeder, der anvendes i tests.

### `quiz_keep_alive_ping_interval`

**Hold sessionen aktiv i tests**

Hold sessionen aktiv ved at sende et regelmæssigt ping-signal til serveren hvert x. sekund, som defineres her. Vi anbefaler én gang hvert 300. sekund.

*Standard: `0`*


### `quiz_open_question_decimal_score`

**Decimalscore i åbne spørgsmålstyper**

Tillad underviseren at bedømme de åbne, mundtlige og annotationsbaserede spørgsmålstyper med en decimalscore.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Blokér kopiering og indsættelse i tests**

Blokér taster til kopiering/indsættelse/gem/udskriv samt højreklik i øvelser.

*Standard: `false`*

### `quiz_question_category_destinations` **v3**

**Aktivér progressive adaptive tests via kategoridestination**

Aktivér progressive adaptive tests, hvor hver spørgsmålskategori kan omdirigere kursister til en anden kategori afhængigt af deres score.

*Standard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Slet spørgsmål automatisk, når test slettes**

Standardadfærden er at gøre spørgsmål forældreløse, når den eneste test, der bruger dem, slettes. Når indstillingen er aktiveret, sikres det, at alle spørgsmål, der ellers ville blive forældreløse, også slettes.

*Standard: `false`*


### `quiz_results_answers_report`

**Vis link til download af testresultater**

Vis på testsidesiden et link til at downloade resultaterne som en fil.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Vis altid testbeskrivelse på resultatsiden**

Når indstillingen er aktiveret, vises testbeskrivelsen altid på resultatsiden efter testafslutning.

*Standard: `false`*

### `score_grade_model`

**Model for karakterskalaer**

Definer et array af scoreintervaller og farver til visning af rapporter med denne model. Dette giver dig mulighed for at vise farver i stedet for numeriske karakterer.

### `send_score_in_exam_notification_mail_to_manager`

**Tilføj score i e-mailnotifikation om indsendelse af test**

Tilføj den studerendes score til den e-mailnotifikation, der sendes til underviseren, efter at en test er indsendt.

*Standard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Vis testforsøg fra alle sessioner i rapporten over afventende tests**

Vis testforsøg fra brugere i alle sessioner, som den generelle tutor har adgang til, i rapporten over afventende tests.

*Standard: `false`*


### `show_exercise_expected_choice`

**Vis forventet valg i testresultater**

Vis det forventede valg og en status (rigtig/forkert) for hvert svar på siden med testresultater (hvis testen er konfigureret til at vise resultater).

*Standard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Vis score for spørgsmål om sikkerhedsgrad**

Som standard viser Chamilo ikke en score for spørgsmålstyperne om sikkerhedsgrad.

*Standard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Vis testforsøg fra alle sessioner i basiskurset**

Vis testforsøg fra brugere i alle sessioner for underviseren i basiskurset.

*Standard: `false`*


### `show_official_code_exercise_result_list`

**Vis officielt kode i øvelsesresultater**

Om de studerendes officielle kode skal vises i rapporterne over øvelsesresultater

*Standard: `false`*

### `show_question_id`

**Vis spørgsmåls-ID'er i tests**

Vis spørgsmålenes interne ID'er, så brugerne kan notere problemer med specifikke spørgsmål og rapportere dem mere effektivt.

*Standard: `false`*


### `show_question_pagination`

**Vis spørgsmålspaginering for undervisere**

For tests med mange spørgsmål bruges paginering, hvis antallet af spørgsmål er højere end denne indstilling. Sæt til 0 for at undgå paginering.

*Standard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Vis slettede tests i 'Min fremgang'**

Aktivér denne indstilling for at vise, på siden 'Min fremgang', resultaterne af alle tests, du har taget, også dem der er blevet slettet.

*Standard: `false`*