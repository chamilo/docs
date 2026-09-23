# Sessionsinställningar

Standardvärden och beteende för **Sessions** — sessionens livscykel, handledares åtkomstfönster, kursers synlighet inom en session och liknande.

Åtkomst till dessa inställningar sker under **Administration > Configuration settings > Sessions**. Denna kategori innehåller **68 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:t eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `add_users_by_coach`

**Tillåt handledare att registrera användare**

Handledare får skapa användare på plattformen och anmäla användare till en session.

*Standard: `false`*

### `allow_career_diagram`

**Aktivera karriärdiagram**

Karriärdiagram gör det möjligt att visa diagram över karriärer, färdigheter och kurser.

*Standard: `false`*


### `allow_career_users`

**Aktivera karriärdiagram för användare**

Om karriärdiagram är aktiverade kan användare bara se dem (och endast de diagram som motsvarar deras studier) om du aktiverar det här alternativet.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Tillåt handledare att redigera i kurssessioner**

Tillåt handledare att redigera i kurssessioner

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Sessionsadministratörer kan ta bort användare**

Sessionsadministratörer kan ta bort användare från plattformen när de hanterar sin(a) session(er).

*Standard: `false`*


### `allow_disable_user_for_session_admin`

**Sessionsadministratörer kan inaktivera användare**

Sessionsadministratörer kan inaktivera användarkonton för att förhindra inloggning samtidigt som registreringsuppgifter i deras session(er) behålls.

*Standard: `false`*


### `allow_edit_tool_visibility_in_session`

**Tillåt redigering av verktygssynlighet i sessioner**

När sessioner används är standardbeteendet att använda den verktygssynlighet som definierats i baskursen. Den här inställningen ändrar det så att handledare i sessionskurser kan anpassa verktygssynlighet efter sina behov.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Omdirigera till session efter registrering på sessionens sida "About"**

Omdirigera automatiskt nya användare till deras sessionssida efter att de slutfört registreringen via en sessions About-sida.

*Standard: `false`*


### `allow_search_diagnostic`

**Aktivera sökdiagnos för sessioner**

Tillåt handledare att få en diagnos som gör det möjligt för dem att söka efter de bästa sessionerna för deltagare.

*Standard: `false`*


### `allow_session_admin_extra_access`

**Sessionsadministratör kan komma åt batchimport, uppdatering och export av användare**

Sessionsadministratörer kan komma åt funktioner för batchimport, uppdatering och export av användare utöver sina vanliga behörigheter.

*Standard: `false`*


### `allow_session_admin_login_as_teacher`

**Sessionsadministratörer kan "logga in som" lärare**

Sessionsadministratörer kan efterlikna lärarkonton för att förhandsgranska kursinnehåll och studentupplevelse inom sin(a) session(er).

*Standard: `false`*


### `allow_session_admin_read_careers`

**Sessionsadministratörer kan visa karriärer**

[inferred] Sessionsadministratörer kan visa och komma åt karriärvägar och befordringsflöden kopplade till de sessioner de hanterar.

*Standard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Tillåt sessionsadministratörer att se alla sessioner**

När det här alternativet inte är aktiverat (standard) kan sessionsadministratörer bara se de sessioner de har skapat. Detta är förvirrande i en öppen miljö där sessionsadministratörer kan behöva dela supporttid mellan två sessioner.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Tillåt kopiering från session till session för lärare**

Aktivera det här alternativet för att låta lärare kopiera sitt innehåll från en kurs i en session till en kurs i en annan session. Som standard är det här alternativet endast tillgängligt för plattformsadministratörer.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Tillåt lärare att skapa sessioner**

Lärare kan skapa, redigera och ta bort sina egna sessioner.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Handledare kan tilldela studenter till sessioner**

När det är aktiverat kan kurshandledare i sessioner anmäla nya användare till sin session. Det här alternativet är annars endast tillgängligt för administratörer och sessionsadministratörer.

*Standard: `false`*

### `allow_user_session_collabsable`

**Tillåt användare att fälla ihop sessioner i Mina sessioner**

Användare kan fälla ihop sessionskort eller grupper på sidan Mina sessioner för att minska visuell rörighet och förbättra navigeringen.

*Standard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Baskursens lärare kan se inlämningar från alla sessioner**

Visa alla deltagarpubliceringar (från baskursen och från alla sessioner) på sidan work/pending.php i baskursen.

*Standard: `false`*

### `career_diagram_disclaimer`

**Visa en ansvarsfriskrivning under karriärdiagrammet**

Lägg till en ansvarsfriskrivning under karriärdiagrammet. En språkvariabel med namnet 'Career diagram disclaimer' måste finnas i ditt underspråk.

*Standard: `false`*

### `career_diagram_legend`

**Visa en förklaring under karriärdiagrammet**

Lägg till en karriärförklaring under karriärdiagrammet. En språkvariabel med namnet 'Career diagram legend' måste finnas i ditt underspråk.

*Standard: `false`*

### `courses_list_session_title_link`

**Typ av länk för sessionstiteln**

På sidan för kurser/sessioner kan sessionstiteln vara något av följande: 0 = ingen länk (dölj sessionstitel) ; 1 = länka titeln till en särskild sessionssida ; 2 = länk till kursen om det bara finns en kurs ; 3 = sessionstiteln gör kurslistan hopfällbar ; 4 = ingen länk (visa sessionstitel).

*Standard: `1`*

### `default_session_list_view`

**Standardvy för sessionslista**

Välj den standardflik du vill se när du öppnar sessionslistan som administratör.

*Standard: `all`*


### `drh_can_access_all_session_content`

**HR-chefer får åtkomst till allt sessionsinnehåll**

Om detta är aktiverat får personalchefer åtkomst till allt innehåll och alla användare från de sessioner som de följer.

*Standard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Aktivera kopiering av sessionsspecifikt innehåll till en annan session**

Tillåter duplicering av resurser som skapades i sessionen när sessionen dupliceras.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Lägg till länk för återställning av lösenord i e-postavisering om prenumeration på session**

Inkludera en länk för återställning av lösenord i bekräftelsemejl om prenumeration som skickas till användare när de registreras i en session.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Lägg till användarnamn i e-postavisering om prenumeration på session**

Inkludera användarens användarnamn i bekräftelsemejl om prenumeration som skickas när de registreras i en session.

*Standard: `false`*


### `enable_auto_reinscription`

**Aktivera automatisk ominskrivning**

Aktivera eller inaktivera automatisk ominskrivning när kursens giltighetstid löper ut. Det relaterade cron-jobbet måste också vara aktiverat.

*Standard: `false`*


### `enable_session_replication`

**Aktivera sessionsreplikering**

Aktivera eller inaktivera automatisk sessionsreplikering. Det relaterade cron-jobbet måste också vara aktiverat.

*Standard: `false`*


### `extend_rights_for_coach`

**Utöka rättigheter för handledare**

Aktivera det här alternativet för att ge handledare samma behörigheter som utbildare i författarverktygen

*Standard: `false`*

### `hide_courses_in_sessions`

**Dölj kurslista i sessioner**

När sessionsblocket visas på din kurssida, dölj listan över kurser i den sessionen (visa dem endast på den specifika sessionsskärmen).

*Standard: `false`*

### `hide_reporting_session_list`

**Dölj sessionslista i rapporteringsverktyget**

Sessioner som inkluderar kursen listas i rapporteringsverktyget inuti själva kursen, vilket kan ge avsevärd extra belastning om samma kurs används i hundratals sessioner. Det här alternativet tar bort den listan.

*Standard: `false`*


### `hide_search_form_in_session_list`

**Dölj sökformulär i sessionslistan**

Ta bort sökfältet från sessionslistvyn i administrationsgränssnittet.

*Standard: `false`*


### `hide_session_graph_in_my_progress`

**Dölj sessionsdiagram i Min utveckling**

Dölj diagram och visualiseringar för sessionsframsteg från sidan Min utveckling i deltagarnas instrumentpaneler.

*Standard: `false`*


### `hide_tab_list`

**Dölj flikar på sessionssidan**

Ta bort navigeringsflikar från sessionsdetaljsidan för att förenkla gränssnittet.

### `limit_session_admin_list_users`

**Sessionsadministratörer nekas åtkomst till användarlistan**

Förhindra att sessionsadministratörer kommer åt den globala användarlistan i administrationsgränssnittet.

*Standard: `false`*


### `limit_session_admin_role`

**Begränsa sessionsadministratörers behörigheter**

Om detta är aktiverat ser sessionsadministratörerna endast blocket Användare med alternativet 'Lägg till användare' och blocket Sessioner med alternativet 'Sessionslista'.

*Standard: `false`*

### `my_courses_session_order`

**Ändra standardsorteringen av sessioner i Mina sessioner**

Som standard sorteras sessioner efter startdatum. Ändra detta genom att ange en array av typen ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Visa mina kurser per session**

Aktivera en extra sida 'Mina kurser' där sessioner visas som en del av kurser, snarare än tvärtom.

*Standard: `false`*

### `my_progress_session_show_all_courses`

**Min utveckling: visa kursdetaljer i session**

Visa alla detaljer för varje kurs i sessionen när du klickar på sessionsdetaljer.

*Standard: `false`*


### `prevent_session_admins_to_manage_all_users`

**Förhindra att sessionsadministratörer hanterar alla användare**

Genom att aktivera det här alternativet kan sessionsadministratörer, på administrationssidan, endast se de användare de själva har skapat.

*Standard: `false`*

### `remove_session_url`

**Dölj länk till sessionssidan**

Dölj länken till sessionssidan från sessionslistan.

*Standard: `false`*


### `session_admins_access_all_content`

**Sessionsadministratörer kan komma åt allt kursinnehåll**

Sessionsadministratörer kan visa allt kursinnehåll inom sina sessioner, inklusive begränsat eller arkiverat material.

*Standard: `false`*

### `session_admins_edit_courses_content`

**Sessionsadministratörer kan redigera kursinnehåll**

Sessionsadministratörer kan ändra kursinnehåll (dokument, övningar, verktyg) i kurser som tilldelats deras sessioner.

*Standard: `false`*

### `session_automatic_creation_user_id`

**Skapar-ID för automatiskt skapade sessioner**

Ange den användare som ska användas som skapare av automatiskt skapade sessioner (för att undvika att varje session tilldelas användare '1', som ofta är portaladministratören).

*Standard: `1`*


### `session_classes_tab_disable`

**Inaktivera lägg till klass i sessionskurs för icke-administratörer**

Inaktivera fliken för att lägga till klasser i sessionskurs för icke-administratörer.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Sessioner efter varaktighet alltid tillgängliga för handledare**

I annat fall har sessionshandledare endast åtkomst till sessioner efter varaktighet under den aktiva varaktigheten.

*Standard: `false`*


### `session_course_ordering`

**Manuell ordning av sessionskurser**

Aktivera det här alternativet för att låta sessionsadministratörer ordna kurserna i en session manuellt. Om det är inaktiverat ordnas kurserna alfabetiskt efter kurstitel.

*Standard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Begränsa prenumerationer på kurs till endast sessionens användare**

Begränsa listan över studenter som kan prenumereras i kurssessionen. Och inaktivera registrering för användare i alla kurser från sidan Resume Session.

*Standard: `false`*


### `session_courses_read_only_mode`

**Sätt kurs i skrivskyddat läge i session**

Låt lärare sätta vissa kurser i skrivskyddat läge när de öppnas via sessioner. I kursegenskaperna, kryssa i alternativet 'Lås kurs i session'.

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Sätt extrafält som obligatoriska i formuläret för sessionsskapande**

Kräv de listade fälten vid skapande av session.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Förifyll sessionsfält med användarfält**

Array av relationer mellan extrafält för användare och extrafält för sessioner, så att sessionen kan förifyllas med data som matchar användarens data.

### `session_days_after_coach_access`

**Standardantal dagar för handledaråtkomst efter session**

Standardantal dagar en handledare kan komma åt en session efter det officiella sessionslutdatumet

### `session_days_before_coach_access`

**Standardantal dagar för handledaråtkomst före session**

Standardantal dagar en handledare kan komma åt en session före det officiella sessionsstartdatumet

### `session_import_settings`

**Alternativ för sessionsimport**

Array av alternativ som ska tillämpas som standardparametrar vid CSV/XML-import av sessioner.

### `session_list_order`

**Sessioner stöder manuell sortering**

Aktivera manuell omordning av sessioner i administrationssessionslistan via dra-och-släpp eller liknande mekanism.

*Standard: `false`*


### `session_list_show_count_users`

**Visa antal användare i sessionslistan**

Administratören kan se antalet användare i varje session. Detta lägger extra belastning på sessionslistan, så om du använder den ofta bör du noga överväga om du vill ha den extra väntetiden.

*Standard: `false`*


### `session_list_view_remaining_days`

**Visa återstående dagar i Mina sessioner**

Om det är aktiverat ersätts sessionsdatumen på sidan "Mina sessioner" av antalet återstående dagar.

*Standard: `false`*

### `session_model_list_field_ordered_by_id`

**Sortera sessionsmallar efter id i formuläret för sessionsskapande**

[inferred] Sortera sessionsmallar efter deras numeriska ID i rullgardinsmenyn i formuläret för sessionsskapande i stället för alfabetiskt efter namn.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Förhindra tömning av prenumererade användare vid sessionsprenumeration**

När flera studerande prenumereras på en session, förhindra det normala beteendet som är att avprenumerera användare som inte finns i den högra panelen när man klickar på skicka. Behåll alla användare där.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Visa alla sessioner på sidan 'Mina kurser'**

Om det är aktiverat visar det här alternativet alla användarens sessioner i kalenderbaserad vy.

*Standard: `true`*


### `show_session_coach`

**Visa sessionshandledare**

Visa namnet på den allmänna sessionshandledaren i sessionstitelrutan i kurslistan

*Standard: `false`*

### `show_session_data`

**Visa titel för sessionsdata**

Visa kommentar för sessionsdata

*Standard: `false`*

### `show_session_description`

**Visa sessionsbeskrivning**

Visa sessionsbeskrivningen där det här alternativet är implementerat (sidor för sessionsspårning, etc)

*Standard: `false`*

### `show_simple_session_info`

**Visa enkel sessionsinformation**

Lägg till handledare och datum i sessionens underrubrik i sessionslistan.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Visa endast användare från aktiva sessioner i uppföljning**

Visa endast användare från för närvarande aktiva sessioner i uppföljnings- och rapportvyer för deltagare.

*Standard: `false`*


### `tracking_columns`

**Anpassa kolumner för kurs-session-uppföljning**

Definiera en array av kolumner för följande rapporter: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Varaktighet för automatiskt skapade sessioner**

Varaktighet (i dagar) för de enanvändarsessioner som skapas automatiskt. Efter utgången kan användaren inte registrera sig på samma kurs (ingen annan session skapas).

*Standard: `1095`*


### `user_session_display_mode`

**Visningsläge för Mina sessioner**

Välj hur sidan "Mina sessioner" ska visas: som en modern visuell blockvy (kort) eller i klassisk liststil.

*Standard: `list`*