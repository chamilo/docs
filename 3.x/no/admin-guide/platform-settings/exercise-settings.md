# Øvelser (tester) – innstillinger

Standardverdier og atferd for verktøyet **Øvelser (tester)** — visning av spørsmål, poenggiving, forsøk og lignende.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Øvelser (tester)**. Denne kategorien inneholder **64 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `add_exercise_best_attempt_in_report`

**Aktiver visning av beste poengforsøk**

Oppgi en liste over kurs- og test-ID-er som skal vise det beste poengforsøket for enhver lærende i rapportene.

### `allow_coach_feedback_exercises`

**Tillat at veiledere kommenterer ved gjennomgang av øvelser**

Tillat at veiledere redigerer tilbakemelding når de gjennomgår øvelser

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Tillat at lærere redigerer tester i læringsstier**

Som standard hindrer Chamilo deg i å redigere tester som er inkludert i en læringssti. Dette er for å unngå endringer som ville påvirke lærende (tidligere og fremtidige) ulikt med hensyn til resultater og/eller fremdrift i læringsstien. Dette valget lar lærere omgå denne begrensningen.


### `allow_exercise_categories`

**Aktiver testkategorier**

Testkategorier er ikke aktivert som standard fordi de legger til et kompleksitetsnivå. Aktiver denne funksjonen for å vise alle administrasjonsikoner knyttet til testkategorier.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Aktiver valg av obligatoriske spørsmål**

Aktiver valg av obligatoriske spørsmål i en test når tilfeldige kategorier brukes.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Varslingsinnstillinger for tester på testnivå**

Aktiver konfigurering av varsler om innlevering av tester på testnivå i stedet for kursnivå. Faller tilbake til innstillinger på kursnivå hvis de ikke er definert på testnivå.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Rask bildelegging til spørsmål**

Aktiver et ekstra ikon i listen over testspørsmål for å legge til et bilde som spørsmålsbeskrivelse. Dette akselererer i stor grad redigering av spørsmål når spørsmålene står i tittelen og beskrivelsen bare inneholder et bilde.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Legg til spørsmålstilbakemelding ved feil svar**

Som standard lar Chamilo deg vise tilbakemelding på hvert svar i et spørsmål. Med dette valget opprettes et ekstra felt for å gi forhåndsdefinert tilbakemelding til hele spørsmålet. Denne tilbakemeldingen vises bare hvis brukeren svarte feil.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Aktiver konfigurering av resultatsiden for tester**

Definer en tabell (array) med innstillinger du vil bruke på alle resultatsider for tester. Innstillinger kan være ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ og muligens flere i fremtiden. Søk etter ‘getPageConfigurationAttribute’ i koden for å se hva som er i bruk.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Vis knappen «forrige» i testen for å navigere mellom spørsmål**

Sett denne til false for å deaktivere knappen «forrige» når spørsmål besvares i en test, og dermed tvinge brukere til alltid å gå fremover.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Lydtilbakemelding til innleverte svar**

Tillat at lærere gir tilbakemelding til brukere via lyd (som alternativ til tekst) på hvert spørsmål i en test.

*Standard: `true`*

### `allow_time_per_question`

**Aktiver tidsbegrensning per spørsmål i tester**

Som standard er det bare mulig å begrense tiden per test. Å begrense den per spørsmål gir et ekstra lag med muligheter, og du kan (forsiktig) kombinere begge.

*Standard: `false`*

### `block_category_questions`

**Lås spørsmål fra tidligere kategorier i en test**

Når dette valget brukes, vises et ekstra valg i testens konfigurasjon. Når du bruker en test med flere spørsmålskategorier og ber om fordeling etter kategori, lar dette brukeren navigere spørsmål per kategori. Når en kategori er ferdig, går vedkommende videre til neste kategori og kan ikke gå tilbake til den forrige kategorien.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Blokker sending av testvarsler til den generelle veilederen**

Når lærende fullfører en test, sendes vanligvis varsler til veiledere, inkludert den generelle sesjonsveilederen. Aktiver dette valget for å utelate den generelle veilederen fra disse varslene.

*Standard: `false`*

### `configure_exercise_visibility_in_course`

**Aktiver for å omgå konfigurasjonen av usynlig øvelse i økt på basiskursnivå**

Aktiverer konfigurasjonen av øvelsens usynlighet i økt i basiskurset for å omgå den globale konfigurasjonen. Hvis den ikke er satt, brukes den globale parameteren.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**Deaktiver «rens resultater» for lærere**

Deaktiverer muligheten til å slette testresultater fra testlisten. Dette brukes ofte når mindre forsiktige lærere administrerer kurs, for å unngå kritiske feil.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standard e-postvarsling ved ny quiz**

Om du vil at kursansvarlige (lærere) skal varsles per e-post når en quiz besvares av en student. Dette er standardverdien som gis til alle nye kurs, men hver lærer kan fortsatt endre denne innstillingen i sitt eget kurs.

*Standard: `true`*

### `enable_quiz_scenario`

**Aktiver quiz-scenario**

Herfra kan du opprette øvelser som foreslår ulike spørsmål avhengig av brukerens svar.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Ekstra lenker for lærere i testlisten**

Konfigurer callback-elementer for å generere nye handlingsikoner for lærere til høyre i testlisten, i form av en array, f.eks. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Vis brukernavn på testresultatsiden**

Vis brukernavnet (i stedet for, eller i tillegg til, brukerinformasjonen) på testresultatsiden.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Legg til ekstra brukerfelt i øvelseskategorirapporten**

Definer en array med listen over ekstra brukerfelt som skal legges til rapporten.

### `exercise_category_round_score_in_export`

**Avrund poengsum i testeksporter**

Når aktivert, avrundes testpoeng til nærmeste heltall ved eksport av øvelsesrapporter.

*Standard: `false`*

### `exercise_embeddable_extra_types`

**Innebyggbare spørsmålstyper**

Som standard vurderes bare spørsmål med ett svar og flervalg når det avgjøres om en test kan bygges inn i en video eller ikke. Med dette valget kan du bestemme at flere spørsmålstyper er tilgjengelige. Vær oppmerksom på at ikke alle spørsmålstyper passer godt i plassen som er tildelt videoer. Spørsmålstyper er tilgjengelige i koden i question.class.php.

### `exercise_hide_ip`

**Skjul bruker-IP fra testrapporter**

Som standard viser vi brukerinformasjon og IP-adressen, men dette kan anses som personopplysninger, så dette valget lar deg fjerne denne informasjonen fra alle testrapporter.

*Standard: `false`*

### `exercise_hide_label`

**Skjul spørsmålsbånd (riktig/feil) i testresultater**

I testresultater vises som standard et bånd som indikerer om svaret var riktig eller feil. Aktiver dette valget for å fjerne båndet globalt.

*Standard: `false`*

### `exercise_invisible_in_session`

**Øvelse usynlig i økt**

Hvis en øvelse er synlig i basiskurset, vises den som usynlig i økten. Hvis en øvelse er usynlig i basiskurset, vises den ikke i økten.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Maks redigeringsfelt på øvelsesresultatskjermen**

På grunn av det store antallet spørsmål som kan vises i en øvelse, kan rettingsskjermen, som lar læreren legge til kommentarer til hvert svar, være svært treg å laste. Sett dette tallet til 5 for å be plattformen om kun å vise WYSIWYG-redigeringsfelt opptil et visst antall svar på skjermen. Dette vil øke lastetiden for rettingssiden betraktelig, men fjerner WYSIWYG-redigeringsfelt og etterlater kun en ren tekstredigerer.

*Standard: `0`*


### `exercise_max_score`

**Maksimal poengsum for øvelser**

Definer en maksimal poengsum (vanligvis 10, 20 eller 100) for alle øvelser på plattformen. Dette definerer hvordan sluttresultater vises for brukere og lærere.

*Standard: `20`*


### `exercise_min_score`

**Minimum poengsum for øvelser**

Definer en minimum poengsum (vanligvis 0) for alle øvelser på plattformen. Dette definerer hvordan sluttresultater vises for brukere og lærere.

*Standard: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Omgå HTML-filtrering i meldinger ved testslutt**

Anse meldinger ved slutten av tester som alltid trygge. Å fjerne filteret gjør det mulig å bruke JavaScript der.

*Standard: `false`*


### `exercise_score_format`

**Format for testpoeng**

Velg mellom følgende former for visning av brukernes poengsum i ulike rapporter: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Bruk den numeriske ID-en for formen du vil bruke.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Deaktiver nye testforsøk**

Deaktiver nye testforsøk globalt. Brukes vanligvis når det er et problem med tester generelt og du trenger tid til å analysere uten å blokkere hele plattformen.

*Standard: `false`*

### `hide_free_question_score`

**Skjul poengsum for åpne spørsmål**

Skjul at åpne spørsmål (inkludert lyd og annotasjoner) har en poengsum ved å skjule visningen av poengsum i alle rapporter som vises for lærende.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Skjul brukerinformasjon på resultatsiden for tester**

Standard resultatside for tester viser et brukerdataark (foto, navn osv.) som i enkelte sammenhenger kan anses å tøye grensene for behandling av personopplysninger. Aktiver dette valget for å fjerne brukerdetaljer fra testresultatene.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Begrens læreres rettigheter over tester**

Når dette er aktivert, kan ikke lærere slette tester eller spørsmål, endre synlighet for tester, laste ned til QTI, tømme resultater osv.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Global liste over ventende tester**

Aktiver for å vise sluttbrukeren en side med listen over ventende tester på tvers av alle kurs.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**Hopp over HTML-filtrering i testspørsmål**

Anse at spørsmålstekst i tester alltid er trygg. Å fjerne filteret gjør det mulig å bruke JavaScript der.

*Standard: `false`*


### `question_pagination_length`

**Pagineringlengde for spørsmål for lærere**

Antall spørsmål som vises på hver side når valget for spørsmålspaginering for lærere brukes.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Aktiver ekstra registrering av testsvar**

Aktiver registrering av alle svar (også midlertidige) i tabellen track_e_attempt_recording. Denne funksjonen er eksperimentell og kan skape problemer på rapporteringssidene når man forsøker å vurdere en test.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Kontroller alle svar før innsending av test**

Vis et sprettoppvindu med listen over besvarte/ubesvarte spørsmål før testen sendes inn.

*Standard: `false`*


### `quiz_check_button_enable`

**Legg til kontroll av svarlagringsprosess før test**

Sørg for at brukerne er klare til å starte testen ved å gi en simulering av spørsmålslagringsprosessen før de går inn i testen. Dette gjør det mulig å oppdage enkelte tilkoblingsproblemer tidlig og reduserer friksjon i brukeropplevelsen.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Legg til avkrysningsboks for bekreftelse av antall svar**

Dette valget legger til en avkrysningsboks på slutten av hver test der brukeren bes bekrefte antall lagrede svar. Dette gir bedre revisjonsdata for kritiske tester.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Forkast foreldreløse spørsmål ved kurseksport**

Når et kurs eksporteres, eksporter ikke spørsmål som ikke inngår i noen test.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Generer sertifikat ved avslutning av test**

Generer sertifikat når en quiz avsluttes. Quizen må være knyttet i verktøyet for karakterbok og ha en beståttprosent konfigurert.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Skjul tabell over testforsøk på startsiden for testen**

Skjul tabellen som viser alle tidligere forsøk på startsiden for testen.

*Standard: `false`*


### `quiz_hide_question_number`

**Skjul spørsmålsnummer**

Skjul den inkrementelle nummereringen av spørsmål mens en test tas.

*Standard: `false`*


### `quiz_image_zoom`

**Aktiver zoom av bilder i tester**

Aktiver denne funksjonen for å la brukere zoome inn på bilder som brukes i testene.

### `quiz_keep_alive_ping_interval`

**Hold økten aktiv i tester**

Hold økten aktiv ved å sende et jevnlig ping-signal til serveren hvert x. sekund, definert her. Vi anbefaler én gang hvert 300. sekund.

*Standard: `0`*


### `quiz_open_question_decimal_score`

**Desimalpoengsum i åpne spørsmålstyper**

Tillat læreren å vurdere spørsmålstypene åpen, muntlig uttrykk og annotasjon med desimalpoengsum.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Blokker kopiering og liming i tester**

Blokker tastene for kopier/lim inn/lagre/skriv ut og høyreklikk i øvelser.

*Standard: `false`*

### `quiz_question_category_destinations` **v3**

**Aktiver progressive adaptive tester etter kategoridestinasjon**

Aktiver progressive adaptive tester der hver spørsmålskategori kan omdirigere lærende til en annen kategori avhengig av poengsummen deres.

*Standard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Slett spørsmål automatisk når test slettes**

Standardatferden er å gjøre spørsmål foreldreløse når den eneste testen som bruker dem, slettes. Når dette er aktivert, sørger valget for at alle spørsmål som ellers ville blitt foreldreløse, også slettes.

*Standard: `false`*


### `quiz_results_answers_report`

**Vis lenke for nedlasting av testresultater**

På resultatsiden for testen vises en lenke for å laste ned resultatene som en fil.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Vis alltid testbeskrivelse på resultatsiden**

Når dette er aktivert, vises testbeskrivelsen alltid på resultatsiden etter at testen er fullført.

*Standard: `false`*

### `score_grade_model`

**Karaktermodell for poeng**

Definer en tabell med poengintervaller og farger for å vise rapporter med denne modellen. Dette gjør det mulig å vise farger i stedet for numeriske karakterer.

### `send_score_in_exam_notification_mail_to_manager`

**Legg til poengsum i e-postvarsling om innlevering av test**

Legg til studentens poengsum i e-postvarslingen som sendes til læreren etter at en test er levert.

*Standard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Vis testforsøk fra alle økter i rapporten over ventende tester**

Vis testforsøk fra brukere i alle økter der den generelle veilederen har tilgang, i rapporten over ventende tester.

*Standard: `false`*


### `show_exercise_expected_choice`

**Vis forventet valg i testresultater**

Vis det forventede valget og en status (riktig/feil) for hvert svar på testresultatsiden (hvis testen er konfigurert til å vise resultater).

*Standard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Vis poengsum for spørsmål om sikkerhetsgrad**

Som standard viser ikke Chamilo poengsum for spørsmålstypene om sikkerhetsgrad.

*Standard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Vis testforsøk fra alle økter i basiskurset**

Vis testforsøk fra brukere i alle økter for læreren i basiskurset.

*Standard: `false`*


### `show_official_code_exercise_result_list`

**Vis offisiell kode i øvelsesresultater**

Om studentenes offisielle kode skal vises i rapportene over øvelsesresultater

*Standard: `false`*

### `show_question_id`

**Vis spørsmåls-ID-er i tester**

Vis spørsmålenes interne ID-er slik at brukere kan notere problemer med spesifikke spørsmål og rapportere dem mer effektivt.

*Standard: `false`*


### `show_question_pagination`

**Vis spørsmålspaginering for lærere**

For tester med mange spørsmål, bruk paginering hvis antall spørsmål er høyere enn denne innstillingen. Sett til 0 for å unngå paginering.

*Standard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Vis slettede tester i «Min fremgang»**

Aktiver dette alternativet for å vise, på siden «Min fremgang», resultatene av alle tester du har tatt, også de som er slettet.

*Standard: `false`*