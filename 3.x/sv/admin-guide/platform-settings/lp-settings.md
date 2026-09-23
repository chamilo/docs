# Inställningar för lärstigar

Standardvärden och beteende för verktyget **Lärstigar** — autostart, standardvy, förkunskapskrav, SCORM-beteende och liknande.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Lärstigar**. Denna kategori innehåller **51 inställningar**, listade nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `add_all_files_in_lp_export`

**Exportera alla filer vid export av en lärstig**

När en LP exporteras exporteras även alla filer och mappar i samma sökväg som en html.

*Standard: `false`*


### `allow_htaccess_import_from_scorm`

**Tillåt .htaccess från SCORM-paket**

Normalt filtreras och tas alla .htaccess-filer bort vid import av innehåll i Chamilo. Denna funktion tillåter att .htaccess importeras om den finns i ett SCORM-paket.

*Standard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-import vid kursimport**

Aktivera kopiering av katalogstrukturen för SCORM-paket vid återställning av en kurs (från verktyget för kursunderhåll).

*Standard: `false`*


### `allow_lp_chamilo_export`

**Exportera lärstigar i Chamilo-säkerhetskopieringsformat**

Aktivera möjligheten att exportera valfri lärstig i Chamilo-kursens säkerhetskopieringsformat.

*Standard: `false`*


### `allow_lp_return_link`

**Visa återgångslänk för lärstigar**

Inaktivera detta alternativ för att dölja knappen "Återgå till startsidan" i lärstigarna

*Standard: `true`*


### `allow_lp_subscription_to_usergroups`

**Prenumeration på lärstigar för klasser**

Aktivera prenumeration på lärstigar och lärstigskategorier för grupper/klasser.

*Standard: `false`*


### `allow_session_lp_category`

**Lärstigskategorier kan hanteras i sessioner**

[inferred] Gör det möjligt för deltagare och instruktörer att organisera och hantera lärstigar efter kategorier inom sessionskurser.

*Standard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Lärare kan komma åt blockerade lärstigar**

Lärare behöver inte slutföra hela lärstigar för att få åtkomst till en lärstig som är blockerad av förkunskapskrav.

*Standard: `false`*


### `disable_js_in_lp_view`

**Inaktivera JS i visningen av lärstigar**

Inaktivera JS-filer som Chamilo vanligtvis lägger till i HTML-filer i lärstigen (när de visas).

*Standard: `false`*


### `disable_my_lps_page`

**Dölj sidan "Mina lärstigar"**

Sidan "Min lärstig" lades till i 1.11. Använd detta alternativ för att dölja den.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Nedladdningsknapp efter avslutade lärstigar**

Visa knappen för att ladda ner filer efter att alla LP är avslutade. Exempel: om ABC är kurskoden och 1 och 100 är dokument-id, välj: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Redigering av tester som ingår i lärstigar**

Aktivera redigering av tester även om de har inkluderats i en lärstig. Standard är att förhindra redigering om testet ingår i en lärstig, eftersom det kan påverka spårningens konsekvens bland många deltagare om teständringarna är betydande.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Dölj kravetikett i lärstigar**

Dölj verktygstipset för förkunskapskrav på lärstigselement. Detta är främst ett estetiskt val.

*Standard: `true`*

### `hide_lp_time`

**Dölj tid från lärstigsregister**

Dölj tid som spenderats i lärstigar i rapporter i allmänhet.

*Standard: `false`*

### `hide_scorm_copy_link`

**Dölj SCORM-kopiering**

Dölj ikonen för kopiering av lärstig i listan över lärstigar

*Standard: `false`*

### `hide_scorm_export_link`

**Dölj SCORM-export**

Dölj ikonen för SCORM-export i listan över lärstigar

*Standard: `false`*

### `hide_scorm_pdf_link`

**Dölj PDF-export av lärstig**

Dölj ikonen för PDF-export av lärstig i listan över lärstigar

*Standard: `true`*

### `lp_allow_export_to_students`

**Deltagare kan exportera lärstigar**

Aktivera detta för att tillåta deltagare att ladda ner lärstigarna som SCORM-paket.

*Standard: `false`*

### `lp_enable_flow`

**Navigera mellan lärstigar**

Lägg till möjligheten att välja en "nästa" lärstig och visa knappar inne i lärstigen för att gå från en till nästa.

*Standard: `false`*

### `lp_fixed_encoding`

**Fast kodning i lärstig**

Minska resursanvändningen genom att hoppa över en kontroll av textkodningen i importerade lärstigar.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datum baserade förkunskapskrav för lärstigselement**

Lägger till möjligheten att definiera förkunskapskrav med start- och slutdatum för lärstigselement.

*Standard: `false`*

### `lp_menu_location`

**Placering av menyn för lärstig**

Ange detta till 'left' eller 'right' för att ändra vilken sida menyn för lärstigen visas på.

*Standard: `left`*

### `lp_minimum_time`

**Minsta tid för att slutföra lärstig**

Lägg till ett fält för minsta tid i lärstigar. Om användaren inte har tillbringat så mycket tid i lärstigen kan det sista objektet i lärstigen inte slutföras.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lås upp lärstigsobjekt om max antal försök har nåtts för testförkunskap**

[inferred] Lås automatiskt upp efterföljande lärstigsobjekt när en deltagare har förbrukat maximalt antal quizförsök för ett förkunskapstest.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Lås upp förkunskaper efter sista testförsöket**

Tillåter användare att fortsätta i en lärstig efter att ha använt alla quizförsök för ett test som används som förkunskap för andra objekt.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Använd senaste poäng i testförkunskaper för lärstig**

När ett test används som förkunskap för ett objekt i lärstigen, använd endast det senaste försöket av testet som validering av förkunskapen (standard är att använda bästa försöket).

*Standard: `false`*

### `lp_prevents_beforeunload`

**Förhindra JS-händelsen beforeunload i lärstig**

Detta bidrar till webbläsarkompatibilitet genom att förhindra att knepiga JS-händelser körs.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Använd lärstigspoäng som framsteg**

Detta är användbart när SCORM-innehåll med endast ett stort SCO används. SCORM kommunicerar inte framsteg, så detta är ett knep för att använda poängen som framsteg. Om du aktiverar det här alternativet kan du konfigurera det per lärstig.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Visa maxframsteg i stället för genomsnitt för rapportering av lärstigar**

[inferred] Beräkna framsteg i lärstigen baserat på maximal objektslutförande i stället för att ta genomsnittet av alla objekt.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Välj maxframsteg kontra genomsnitt för lärstigar på kursnivå**

Aktivera omdefiniering av inställningen för att visa bästa framsteg i stället för genomsnitt i rapportering av lärstigar på kursnivå.

*Standard: `false`*

### `lp_show_reduced_report`

**Lärstigar: visa reducerad rapport**

Inne i verktyget för lärstigar, när en användare granskar sina egna framsteg (via statistikikonen), visa en förkortad (mindre detaljerad) version av framstegsrapporten.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Visa lärstigens tillgänglighet för deltagare**

Visa lärstigar för deltagare med deras tillgänglighetsdatum, i stället för att dölja dem tills datumet infaller.

*Standard: `false`*

### `lp_subscription_settings`

**Prenumerationsinställningar för lärstigar**

Konfigurera ytterligare alternativ för prenumerationsfunktionen för lärstigar. Alternativen inkluderar 'allow_add_users_to_lp' och 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Fällbara objekt i lärstigar**

[inferred] Visa lärstigsobjekt i hopfällbart dragspelsformat för förbättrad navigering och innehållsorganisation.

*Standard: `false`*

### `lp_view_settings`

**Visningsinställningar för lärstig**

Konfigurera ytterligare alternativ för visningen av lärstigar. Alternativen inkluderar 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' och 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Använd extrafält som student\_id i SCORM-kommunikation**

Ange namnet på extrafältet som ska användas som student_id för all SCORM-kommunikation.

### `scorm_api_username_as_student_id`

**Använd användarnamn som student\_id i SCORM-kommunikation**

[inferred] Använd deltagarens användarnamn som studentidentifierare i SCORM API-kommunikation i stället för deltagar-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**Uppdatera SCO-status autonomt**

Om SCO inte skickar en status, ta över och uppdatera statusen baserat på vad som kan observeras i Chamilo.

*Standard: `false`*

### `scorm_upload_from_cache`

**Ladda upp SCORM från cachekatalog**

Tillåt administratörer att ladda upp ett SCORM-paket (i zip-form) till cachekatalogen och använda det som importkälla på sidan för SCORM-uppladdning.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Visa tester från lärstigar även om de är osynliga**

Visa dolda övningar som har lagts till i en LP i övningslistan. Om vi är i en session, testet är osynligt i baskursen, det ingår i en LP och inställningen för att visa det inte specifikt är satt till true, dölj det då.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Visa tester i listan över lärstigstester även om de är osynliga**

[inferred] Inkludera dolda tester i listan över tillgängliga tester när lärstigens innehåll visas.

*Standard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Osynliga tester synliga i lärstigar**

Gör att tester som markerats som "osynliga" i testverktyget visas när de ingår i en lärstig.

*Standard: `false`*

### `show_invisible_lp_in_course_home`

**Visa länk till lärstig på kurssidan när den är osynlig**

Om en lärstig är inställd som osynlig men läraren/handledaren har valt att göra den tillgänglig från kurssidan, förhindrar detta alternativ att Chamilo döljer länken på kurssidan.

*Standard: `false`*

### `show_prerequisite_as_blocked`

**Lärstigars förkunskapskrav**

Visa på listan över lärstigar ett visuellt element som visar att andra lärstigar för närvarande är blockerade av någon förkunskapsregel.

*Standard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Lägg till kolumn för tillägnande i uppföljning av deltagare**

Lägg till en kolumn på sidan för uppföljning av deltagare som visar en deltagares tillägnandestatus för en lärstig.

*Standard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Lägg till synlighetsinformation för lärstigar på sidan för uppföljning av deltagare**

[inferred] Visa indikator för synlighetsstatus för lärstigar på sidan för uppföljning av deltagarens framsteg.

*Standard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Upplåst information i listan över lärstigar**

Detta lägger till en kolumn "upplåst" i listan över lärstigar om deltagaren är anmäld till den aktuella lärstigen och har åtkomst till den.

*Standard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Dölj procenttecken i genomsnitt för tester i lärstigar i uppföljning av deltagare**

Döljer procentikonen i indikationen "Genomsnitt för tester i lärstigar" vid uppföljning av en student.

*Standard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Inkludera lärstigar som inte är anmälda på sidan för uppföljning av deltagare**

[inferred] Visa lärstigar på framstegssidor även när deltagare inte är anmälda till dem.

*Standard: `false`*

### `ticket_lp_quiz_info_add`

**Lägg till information om lärstigar och tester i ärenderapportering**

[inferred] Inkludera information om lärstigar och tester i rapportering av supportärenden för bättre ärendeuppföljning.

*Standard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Använd status för lärstigselement från andra sessioner**

Tillåt användare att uppfylla förkunskapskrav i en lärstig om motsvarande element redan har slutförts i en annan session.

*Standard: `false`*