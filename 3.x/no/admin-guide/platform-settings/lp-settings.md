# Innstillinger for læringsstier

Standardverdier og atferd for verktøyet **Læringsstier** — autostart, standardvisning, forutsetninger, SCORM-atferd og lignende.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Læringsstier**. Denne kategorien inneholder **51 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene globalt ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `add_all_files_in_lp_export`

**Eksporter alle filer ved eksport av en læringssti**

Når en LP eksporteres, eksporteres også alle filer og mapper i samme bane som en html.

*Standard: `false`*


### `allow_htaccess_import_from_scorm`

**Tillat .htaccess fra SCORM-pakker**

Normalt filtreres og fjernes alle .htaccess-filer ved import av innhold i Chamilo. Denne funksjonen tillater at .htaccess importeres hvis den finnes i en SCORM-pakke.

*Standard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-import innen kursimport**

Aktiver kopiering av mappestrukturen til SCORM-pakker ved gjenoppretting av et kurs (fra vedlikeholdsverktøyet for kurs).

*Standard: `false`*


### `allow_lp_chamilo_export`

**Eksporter læringsstier i Chamilo-sikkerhetskopiformat**

Aktiver muligheten til å eksportere hvilken som helst av læringsstiene dine i et Chamilo-kurs-sikkerhetskopiformat.

*Standard: `false`*


### `allow_lp_return_link`

**Vis returlenke for læringsstier**

Deaktiver dette valget for å skjule knappen «Tilbake til startsiden» i læringsstiene

*Standard: `true`*


### `allow_lp_subscription_to_usergroups`

**Abonnement på læringsstier for klasser**

Aktiver abonnement på læringsstier og læringsstikategorier for grupper/klasser.

*Standard: `false`*


### `allow_session_lp_category`

**Læringsstikategorier kan administreres i økter**

[inferred] La lærende og instruktører organisere og administrere læringsstier etter kategorier i øktkurs.

*Standard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Lærere kan få tilgang til blokkerte læringsstier**

Lærere trenger ikke å fullføre hele læringsstier for å få tilgang til en læringssti som er blokkert av forutsetninger.

*Standard: `false`*


### `disable_js_in_lp_view`

**Deaktiver JS i visning av læringsstier**

Deaktiver JS-filer som Chamilo vanligvis legger til HTML-filer i læringsstien (mens de vises).

*Standard: `false`*


### `disable_my_lps_page`

**Skjul siden «Mine læringsstier»**

Siden «Min læringssti» ble lagt til i 1.11. Bruk dette valget for å skjule den.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Nedlastingsknapp etter fullførte læringsstier**

Vis knapp for nedlasting av filer etter at alle LP er fullført. Eksempel: hvis ABC er kurskoden, og 1 og 100 er dokument-id-ene, velg: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Redigering av tester inkludert i læringsstier**

Aktiver redigering av tester selv om de er inkludert i en læringssti. Standard er å hindre redigering hvis testen ligger i en læringssti, fordi det kan påvirke sporingskonsistensen blant mange lærende dersom testendringene er vesentlige.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Skjul kravetikett i læringsstier**

Skjul verktøytipset for forutsetninger på elementer i læringsstien. Dette er primært et estetisk valg.

*Standard: `true`*

### `hide_lp_time`

**Skjul tid fra læringsstiregistre**

Skjul tid brukt på læringsstier i rapporter generelt.

*Standard: `false`*

### `hide_scorm_copy_link`

**Skjul SCORM-kopiering**

Skjul ikonet for kopiering av læringssti fra listen over læringsstier

*Standard: `false`*

### `hide_scorm_export_link`

**Skjul SCORM-eksport**

Skjul ikonet for SCORM-eksport fra listen over læringsstier

*Standard: `false`*

### `hide_scorm_pdf_link`

**Skjul PDF-eksport av læringssti**

Skjul ikonet for PDF-eksport av læringssti fra listen over læringsstier

*Standard: `true`*

### `lp_allow_export_to_students`

**Lærende kan eksportere læringsstier**

Aktiver dette for å la lærende laste ned læringsstiene som SCORM-pakker.

*Standard: `false`*

### `lp_enable_flow`

**Naviger mellom læringsstier**

Legg til muligheten til å velge en «neste» læringssti og vis knapper inne i læringsstien for å gå fra én til den neste.

*Standard: `false`*

### `lp_fixed_encoding`

**Fast koding i læringssti**

Reduser ressursbruk ved å hoppe over sjekk av tekstkoding i importerte læringsstier.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datobaserte forutsetninger for læringsstielementer**

Legger til muligheten til å definere forutsetninger med start- og sluttdatoer for learnpath-elementer.

*Standard: `false`*

### `lp_menu_location`

**Plassering av meny for læringssti**

Sett denne til 'left' eller 'right' for å endre hvilken side menyen for læringsstien vises på.

*Standard: `left`*

### `lp_minimum_time`

**Minimumstid for å fullføre læringssti**

Legg til et felt for minimumstid i læringsstier. Hvis brukeren ikke har brukt så mye tid på læringsstien, kan ikke det siste elementet i læringsstien fullføres.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lås opp læringsstielement hvis maksimalt antall forsøk er nådd for testforutsetning**

[inferred] Lås automatisk opp påfølgende læringsstielementer når en student har brukt opp maksimalt antall quizforsøk for en forutsetningstest.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Lås opp forutsetninger etter siste testforsøk**

Lar brukere fortsette i en læringssti etter å ha brukt alle quizforsøk på en test som brukes som forutsetning for andre elementer.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Bruk siste poengsum i testforutsetninger for læringssti**

Når en test brukes som forutsetning for et element i læringsstien, bruk kun siste forsøk på testen som validering av forutsetningen (standard er å bruke beste forsøk).

*Standard: `false`*

### `lp_prevents_beforeunload`

**Forhindre beforeunload JS-hendelse i læringssti**

Dette bidrar til nettleserkompatibilitet ved å forhindre at vanskelige JS-hendelser kjøres.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Bruk poengsum i læringssti som fremdrift**

Dette er nyttig når du bruker SCORM-innhold med bare én stor SCO. SCORM kommuniserer ikke fremdrift, så dette er et triks for å bruke poengsummen som fremdrift. Aktivering av dette valget lar deg konfigurere dette per læringssti.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Vis maksimal fremdrift i stedet for gjennomsnitt i rapportering for læringsstier**

[inferred] Beregn fremdrift i læringssti basert på maksimal elementfullføring i stedet for å ta gjennomsnitt av alle elementer.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Velg maksimal fremdrift kontra gjennomsnitt for læringsstier på kursnivå**

Aktiver omdefinering av innstillingen for å vise beste fremdrift i stedet for gjennomsnitt i rapportering av læringsstier på kursnivå.

*Standard: `false`*

### `lp_show_reduced_report`

**Læringsstier: vis redusert rapport**

Inne i verktøyet for læringsstier, når en bruker gjennomgår sin egen fremdrift (via statistikkikonet), vis en forkortet (mindre detaljert) versjon av fremdriftsrapporten.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Vis tilgjengelighet for læringssti til studenter**

Vis læringsstier til studenter med tilgjengelighetsdatoene, i stedet for å skjule dem til datoen inntreffer.

*Standard: `false`*

### `lp_subscription_settings`

**Innstillinger for abonnement på læringsstier**

Konfigurer tilleggsvalg for funksjonen for abonnement på læringsstier. Valg inkluderer 'allow_add_users_to_lp' og 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Sammenleggbare elementer i læringsstier**

[inferred] Vis læringsstielementer i sammenleggbart trekkspillformat for bedre navigasjon og innholdsorganisering.

*Standard: `false`*

### `lp_view_settings`

**Visningsinnstillinger for læringssti**

Konfigurer tilleggsvalg for visning av læringsstier. Valg inkluderer 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' og 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Bruk ekstra felt som student\_id i SCORM-kommunikasjon**

Oppgi navnet på det ekstra feltet som skal brukes som student_id for all SCORM-kommunikasjon.

### `scorm_api_username_as_student_id`

**Bruk brukernavn som student\_id i SCORM-kommunikasjon**

[inferred] Bruk studentens brukernavn som studentidentifikator i SCORM API-kommunikasjon i stedet for student-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**Oppdater SCO-status autonomt**

Hvis SCO-en ikke sender en status, overta og oppdater statusen basert på det som kan observeres i Chamilo.

*Standard: `false`*

### `scorm_upload_from_cache`

**Last opp SCORM fra cache-katalog**

Tillat administratorer å laste opp en SCORM-pakke (i zip-form) til cache-katalogen og bruke den som importkilde på SCORM-opplastingssiden.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Vis tester fra læringsstier selv om de er usynlige**

Vis skjulte øvelser som ble lagt til en LP i øvelseslisten. Hvis vi er i en økt, testen er usynlig i basiskurset, den er inkludert i en LP og innstillingen for å vise den ikke er satt spesifikt til true, så skjul den.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Vis tester i listen over læringsstitester selv om de er usynlige**

[inferred] Inkluder skjulte tester i listen over tilgjengelige tester når du viser innholdet i læringsstien.

*Standard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Usynlige tester synlige i læringsstier**

Få tester merket som «usynlige» i testverktøyet til å vises når de er inkludert i en læringssti.

*Standard: `false`*

### `show_invisible_lp_in_course_home`

**Vis lenke til læringssti på kursets startside når den er usynlig**

Hvis en læringssti er satt til usynlig, men lærer/veileder har valgt å gjøre den tilgjengelig fra kursets startside, hindrer dette valget Chamilo i å skjule lenken på kursets startside.

*Standard: `false`*

### `show_prerequisite_as_blocked`

**Forutsetninger for læringssti**

Vis et visuelt element i listen over læringsstier som viser at andre læringsstier for øyeblikket er blokkert av en forutsetningsregel.

*Standard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Legg til tilegnelseskolonne i oppfølging av lærende**

Legg til en kolonne på siden for oppfølging av lærende som viser tilegnelsesstatus for en lærende på en læringssti.

*Standard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Legg til synlighetsinformasjon for læringsstier på siden for oppfølging av lærende**

[inferred] Vis indikator for synlighetsstatus for læringsstier på siden for fremdriftssporing av lærende.

*Standard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Opplåst-informasjon i listen over læringsstier**

Dette legger til en «opplåst»-kolonne i listen over læringsstier dersom den lærende er påmeldt den gitte læringsstien og har tilgang til den.

*Standard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Skjul prosenttegn i gjennomsnitt av tester i læringsstier i oppfølging av lærende**

Skjuler prosentikonet i indikasjonen «Gjennomsnitt av tester i læringsstier» i sporing av en student.

*Standard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Inkluder læringsstier som ikke er påmeldt på siden for oppfølging av lærende**

[inferred] Vis læringsstier på fremdriftssider selv når lærende ikke er påmeldt dem.

*Standard: `false`*

### `ticket_lp_quiz_info_add`

**Legg til informasjon om læringsstier og tester i saksrapportering**

[inferred] Inkluder informasjon om læringssti og test i rapportering av supportsaker for bedre sporing av problemer.

*Standard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Bruk status for læringsstielement fra andre økter**

Tillat brukere å fullføre forutsetninger i en læringssti dersom det tilsvarende elementet allerede er fullført i en annen økt.

*Standard: `false`*