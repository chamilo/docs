# Indstillinger for læringsstier

Standarder og adfærd for værktøjet **Læringsstier** — autostart, standardvisning, forudsætninger, SCORM-adfærd og lignende.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Læringsstier**. Denne kategori indeholder **51 indstillinger**, som er oplistet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `add_all_files_in_lp_export`

**Eksportér alle filer ved eksport af en læringssti**

Når en LP eksporteres, eksporteres alle filer og mapper i samme sti som en html også.

*Standard: `false`*


### `allow_htaccess_import_from_scorm`

**Tillad .htaccess fra SCORM-pakker**

Normalt filtreres og fjernes alle .htaccess-filer, når indhold importeres i Chamilo. Denne funktion tillader, at .htaccess importeres, hvis den findes i en SCORM-pakke.

*Standard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-import i forbindelse med kursusimport**

Aktivér kopiering af mappestrukturen i SCORM-pakker, når et kursus gendannes (fra værktøjet til kursusvedligeholdelse).

*Standard: `false`*


### `allow_lp_chamilo_export`

**Eksportér læringsstier i Chamilo-sikkerhedskopiformat**

Aktivér muligheden for at eksportere enhver af dine læringsstier i et Chamilo-kursussikkerhedskopiformat.

*Standard: `false`*


### `allow_lp_return_link`

**Vis returlink for læringsstier**

Deaktivér denne indstilling for at skjule knappen 'Tilbage til startsiden' i læringsstierne

*Standard: `true`*


### `allow_lp_subscription_to_usergroups`

**Tilmelding til læringsstier for klasser**

Aktivér tilmelding til læringsstier og læringsstikategorier for grupper/klasser.

*Standard: `false`*


### `allow_session_lp_category`

**Læringsstikategorier kan administreres i sessioner**

[inferred] Gør det muligt for kursister og undervisere at organisere og administrere læringsstier efter kategorier i sessionskurser.

*Standard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Undervisere kan tilgå blokerede læringsstier**

Undervisere behøver ikke at gennemføre hele læringsstier for at få adgang til en læringssti, der er blokeret af forudsætninger.

*Standard: `false`*


### `disable_js_in_lp_view`

**Deaktivér JS i visningen af læringsstier**

Deaktivér JS-filer, som Chamilo normalt tilføjer til HTML-filer i læringsstien (mens de vises).

*Standard: `false`*


### `disable_my_lps_page`

**Skjul siden 'Mine læringsstier'**

Siden 'Min læringssti' blev tilføjet i 1.11. Brug denne indstilling til at skjule den.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Downloadknap efter afslutning af læringsstier**

Vis knap til download af filer, når alle LP er afsluttet. Eksempel: hvis ABC er kursuskoden, og 1 og 100 er dokument-id'erne, vælg: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Redigering af tests inkluderet i læringsstier**

Aktivér redigering af tests, selvom de er inkluderet i en læringssti. Standard er at forhindre redigering, hvis testen ligger i en læringssti, fordi det kan påvirke sporingskonsistensen blandt mange kursister, hvis testændringerne er væsentlige.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Skjul kravetiket i læringsstier**

Skjul værktøjstippet om forudsætninger på elementer i læringsstien. Dette er primært et æstetisk valg.

*Standard: `true`*

### `hide_lp_time`

**Skjul tid fra registreringer af læringsstier**

Skjul den tid, der er brugt på læringsstier, i rapporter generelt.

*Standard: `false`*

### `hide_scorm_copy_link`

**Skjul SCORM-kopi**

Skjul ikonet Læringssti-kopi fra listen over læringsstier

*Standard: `false`*

### `hide_scorm_export_link`

**Skjul SCORM-eksport**

Skjul ikonet SCORM-eksport fra listen over læringsstier

*Standard: `false`*

### `hide_scorm_pdf_link`

**Skjul PDF-eksport af læringssti**

Skjul ikonet PDF-eksport af læringssti fra listen over læringsstier

*Standard: `true`*

### `lp_allow_export_to_students`

**Kursister kan eksportere læringsstier**

Aktivér dette for at tillade kursister at downloade læringsstierne som SCORM-pakker.

*Standard: `false`*

### `lp_enable_flow`

**Navigér mellem læringsstier**

Tilføj muligheden for at vælge en 'næste' læringssti og vis knapper inde i læringsstien til at gå fra den ene til den næste.

*Standard: `false`*

### `lp_fixed_encoding`

**Fast kodning i læringssti**

Reducer ressourceforbrug ved at springe et tjek af tekstkodning over i importerede læringsstier.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datobaserede forudsætninger for elementer i læringsstier**

Tilføjer muligheden for at definere forudsætninger med start- og slutdatoer for elementer i læringsstien.

*Standard: `false`*

### `lp_menu_location`

**Placering af menuen for læringsstier**

Angiv denne til 'left' eller 'right' for at ændre, hvilken side menuen for læringsstien vises på.

*Standard: `left`*

### `lp_minimum_time`

**Minimumstid til at fuldføre læringssti**

Tilføj et felt for minimumstid til læringsstier. Hvis brugeren ikke har brugt så meget tid på læringsstien, kan det sidste element i læringsstien ikke fuldføres.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lås læringsstielement op, hvis maksimalt antal forsøg er nået for testforudsætning**

[inferred] Lås automatisk efterfølgende læringsstielementer op, når en kursist har brugt det maksimale antal quizforsøg for en forudsætningstest.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Lås forudsætninger op efter sidste testforsøg**

Giver brugere mulighed for at fortsætte i en læringssti, efter at alle quizforsøg er brugt for en test, der anvendes som forudsætning for andre elementer.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Brug sidste score i testforudsætninger for læringsstier**

Når en test bruges som forudsætning for et element i læringsstien, bruges kun det sidste forsøg på testen som validering af forudsætningen (standard er at bruge det bedste forsøg).

*Standard: `false`*

### `lp_prevents_beforeunload`

**Forhindr beforeunload JS-hændelse i læringssti**

Dette hjælper med browserkompatibilitet ved at forhindre, at vanskelige JS-hændelser udføres.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Brug læringsstiscore som fremskridt**

Dette er nyttigt, når der bruges SCORM-indhold med kun ét stort SCO. SCORM kommunikerer ikke fremskridt, så dette er et trick til at bruge scoren som fremskridt. Aktivering af denne indstilling lader dig konfigurere dette pr. læringssti.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Vis maksimalt fremskridt i stedet for gennemsnit i rapportering af læringsstier**

[inferred] Beregn fremskridt på læringsstien ud fra maksimal elementfuldførelse frem for at tage gennemsnit af alle elementer.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Vælg maksimalt fremskridt vs. gennemsnit for læringsstier på kursusniveau**

Aktivér omdefinering af indstillingen, så det bedste fremskridt vises i stedet for gennemsnit i rapportering af læringsstier på kursusniveau.

*Standard: `false`*

### `lp_show_reduced_report`

**Læringsstier: vis reduceret rapport**

Inde i værktøjet til læringsstier, når en bruger gennemgår sit eget fremskridt (via statistikikonet), vises en forkortet (mindre detaljeret) version af fremskridtsrapporten.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Vis læringsstiers tilgængelighed for kursister**

Vis læringsstier for kursister med deres tilgængelighedsdatoer, i stedet for at skjule dem, indtil datoen indtræffer.

*Standard: `false`*

### `lp_subscription_settings`

**Indstillinger for tilmelding til læringsstier**

Konfigurer yderligere indstillinger for funktionen til tilmelding til læringsstier. Indstillinger omfatter 'allow_add_users_to_lp' og 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Sammenklappelige elementer i læringsstier**

[inferred] Vis læringsstielementer i sammenklappeligt accordion-format for bedre navigation og indholdsorganisering.

*Standard: `false`*

### `lp_view_settings`

**Visningsindstillinger for læringsstier**

Konfigurer yderligere indstillinger for visning af læringsstier. Indstillinger omfatter 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' og 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Brug ekstra felt som student\_id i SCORM-kommunikation**

Angiv navnet på det ekstra felt, der skal bruges som student_id for al SCORM-kommunikation.

### `scorm_api_username_as_student_id`

**Brug brugernavn som student\_id i SCORM-kommunikation**

[inferred] Brug kursistens brugernavn som studentidentifikator i SCORM API-kommunikation i stedet for kursist-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**Opdater SCO-status autonomt**

Hvis SCO'en ikke sender en status, overtages opdateringen, og status opdateres ud fra det, der kan observeres i Chamilo.

*Standard: `false`*

### `scorm_upload_from_cache`

**Upload SCORM fra cache-mappe**

Tillad administratorer at uploade en SCORM-pakke (i zip-form) til cache-mappen og bruge den som importkilde på SCORM-upload-siden.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Vis tests fra læringsstier, selv hvis de er usynlige**

Vis skjulte øvelser, der er tilføjet til en LP, i øvelseslisten. Hvis vi er i en session, testen er usynlig i basiskurset, den er inkluderet i en LP, og indstillingen til at vise den ikke er sat specifikt til true, så skjules den.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Vis tests i listen over tests i læringsstier, selv hvis de er usynlige**

[inferred] Medtag skjulte tests i listen over tilgængelige tests, når indholdet af læringsstien vises.

*Standard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Usynlige tests synlige i læringsstier**

Få tests, der er markeret som 'usynlige' i testværktøjet, til at vises, når de er inkluderet i en læringssti.

*Standard: `false`*

### `show_invisible_lp_in_course_home`

**Vis link til læringssti på kursushjemmesiden, når den er usynlig**

Hvis en læringssti er sat til usynlig, men underviseren/tutoren har besluttet at gøre den tilgængelig fra kursushjemmesiden, forhindrer denne indstilling Chamilo i at skjule linket på kursushjemmesiden.

*Standard: `false`*

### `show_prerequisite_as_blocked`

**Forudsætninger for læringsstier**

Vis på listerne over læringsstier et visuelt element, der viser, at andre læringsstier i øjeblikket er blokeret af en forudsætningsregel.

*Standard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Tilføj erhvervelseskolonne i elevopfølgning**

Tilføj en kolonne på siden til elevopfølgning, der viser en elevs erhvervelsesstatus for en læringssti.

*Standard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Tilføj synlighedsoplysninger for læringsstier på siden til elevopfølgning**

[inferred] Vis indikator for synlighedsstatus for læringsstier på siden til sporing af elevens fremskridt.

*Standard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Oplåst-oplysninger i listen over læringsstier**

Dette tilføjer en kolonne med 'oplåst' i listen over læringsstier, hvis eleven er tilmeldt den pågældende læringssti og har adgang til den.

*Standard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Skjul procenttegn i gennemsnit af tests i læringsstier i elevopfølgning**

Skjuler procentikonet i angivelsen 'Gennemsnit af tests i læringsstier' ved elevsporing

*Standard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Medtag læringsstier, der ikke er tilmeldt, på siden til elevopfølgning**

[inferred] Vis læringsstier på fremskridtssider, også når eleverne ikke er tilmeldt dem.

*Standard: `false`*

### `ticket_lp_quiz_info_add`

**Tilføj oplysninger om læringsstier og tests til ticket-rapportering**

[inferred] Medtag oplysninger om læringsstier og tests i supportticket-rapportering for bedre sporing af problemer.

*Standard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Brug status for læringsstielementer fra andre sessioner**

Tillad brugere at opfylde forudsætninger i en læringssti, hvis det tilsvarende element allerede er gennemført i en anden session.

*Standard: `false`*