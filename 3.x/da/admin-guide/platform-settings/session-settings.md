# Sessionsindstillinger

Standarder og adfærd for **Sessions** — sessionens livscyklus, tutorerers adgangsvinduer, kursussynlighed inden for en session og lignende.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Sessions**. Denne kategori indeholder **68 indstillinger**, som er listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `add_users_by_coach`

**Tillad tutorer at registrere brugere**

Tutorer kan oprette brugere på platformen og tilmelde brugere til en session.

*Standard: `false`*

### `allow_career_diagram`

**Aktivér karrierediagrammer**

Karrierediagrammer giver dig mulighed for at vise diagrammer over karrierer, kompetencer og kurser.

*Standard: `false`*


### `allow_career_users`

**Aktivér karrierediagrammer for brugere**

Hvis karrierediagrammer er aktiveret, kan brugere kun se dem (og kun de diagrammer, der svarer til deres studier), hvis du aktiverer denne indstilling.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Tillad tutorer at redigere inde i kurssessioner**

Tillad tutorer at redigere inde i kurssessioner

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Sessionsadministratorer kan slette brugere**

Sessionsadministratorer kan fjerne brugere fra platformen, når de administrerer deres session(er).

*Standard: `false`*


### `allow_disable_user_for_session_admin`

**Sessionsadministratorer kan deaktivere brugere**

Sessionsadministratorer kan deaktivere brugerkonti for at forhindre login, mens tilmeldingsoplysninger i deres session(er) bevares.

*Standard: `false`*


### `allow_edit_tool_visibility_in_session`

**Tillad redigering af værktøjssynlighed i sessioner**

Når sessioner anvendes, er standardadfærden at bruge den værktøjssynlighed, der er defineret i basiskurset. Denne indstilling ændrer det, så tutorer i sessionskurser kan tilpasse værktøjssynligheder efter deres behov.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Omdirigér til session efter registrering på sessionens 'Om'-side**

Omdirigér automatisk nye brugere til deres sessionsside, efter at de har gennemført registrering via en sessions Om-side.

*Standard: `false`*


### `allow_search_diagnostic`

**Aktivér sessionsøgning-diagnose**

Tillad tutorer at få en diagnose, der gør det muligt for dem at søge efter de bedste sessioner til kursister.

*Standard: `false`*


### `allow_session_admin_extra_access`

**Sessionsadministrator kan tilgå batchimport, -opdatering og -eksport af brugere**

Sessionsadministratorer kan tilgå funktionalitet til batchimport, -opdatering og -eksport af brugere ud over deres standardtilladelser.

*Standard: `false`*


### `allow_session_admin_login_as_teacher`

**Sessionsadministratorer kan 'logge ind som' undervisere**

Sessionsadministratorer kan udgive sig for underviserkonti for at forhåndsvise kursusindhold og kursistoplevelsen inden for deres session(er).

*Standard: `false`*


### `allow_session_admin_read_careers`

**Sessionsadministratorer kan se karrierer**

[inferred] Sessionsadministratorer kan se og tilgå karriereforløb og forfremmelsesarbejdsgange knyttet til de sessioner, de administrerer.

*Standard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Tillad sessionsadministratorer at se alle sessioner**

Når denne indstilling ikke er aktiveret (standard), kan sessionsadministratorer kun se de sessioner, de selv har oprettet. Dette er forvirrende i et åbent miljø, hvor sessionsadministratorer kan have behov for at dele supporttid mellem to sessioner.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Tillad kopi fra session til session for undervisere**

Aktivér denne indstilling for at lade undervisere kopiere deres indhold fra et kursus i en session til et kursus i en anden session. Som standard er denne indstilling kun tilgængelig for platformadministratorer.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Tillad undervisere at oprette sessioner**

Undervisere kan oprette, redigere og slette deres egne sessioner.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutorer kan tildele kursister til sessioner**

Når indstillingen er aktiveret, kan kurstutorer i sessioner tilmelde nye brugere til deres session. Denne indstilling er ellers kun tilgængelig for administratorer og sessionsadministratorer.

*Standard: `false`*

### `allow_user_session_collabsable`

**Tillad brugeren at folde sessioner sammen i Mine sessioner**

Brugere kan folde sessionskort eller -grupper sammen på siden Mine sessioner for at reducere visuel støj og forbedre navigationen.

*Standard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Basiskursusunderviser kan se opgaver fra alle sessioner**

Vis alle kursistpublikationer (fra basiskurset og fra alle sessioner) på siden work/pending.php i basiskurset.

*Standard: `false`*

### `career_diagram_disclaimer`

**Vis en ansvarsfraskrivelse under karrierediagrammet**

Tilføj en ansvarsfraskrivelse under karrierediagrammet. En sprogvariabel kaldet 'Career diagram disclaimer' skal findes i dit undersprog.

*Standard: `false`*

### `career_diagram_legend`

**Vis en forklaring under karrierediagrammet**

Tilføj en karriereforklaring under karrierediagrammet. En sprogvariabel kaldet 'Career diagram legend' skal findes i dit undersprog.

*Standard: `false`*

### `courses_list_session_title_link`

**Type af link for sessionstitlen**

På siden for kurser/sessioner kan sessionstitlen være en af følgende: 0 = intet link (skjul sessionstitel) ; 1 = link titel til en særlig sessionsside ; 2 = link til kurset, hvis der kun er ét kursus ; 3 = sessionstitlen gør kursuslisten foldbar ; 4 = intet link (vis sessionstitel).

*Standard: `1`*

### `default_session_list_view`

**Standardvisning af sessionsliste**

Vælg den fane, du som standard vil se, når du åbner sessionslisten som administrator.

*Standard: `all`*


### `drh_can_access_all_session_content`

**HR-direktører har adgang til alt sessionsindhold**

Hvis aktiveret, får HR-direktører adgang til alt indhold og alle brugere fra de sessioner, vedkommende følger.

*Standard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Aktivér kopiering af sessionsspecifikt indhold til en anden session**

Tillader duplikering af ressourcer, der blev oprettet i sessionen, når sessionen duplikeres.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Tilføj link til nulstilling af adgangskode i e-mailmeddelelse om tilmelding til session**

Inkluder et link til nulstilling af adgangskode i bekræftelses-e-mails om tilmelding, der sendes til brugere, når de tilmeldes en session.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Tilføj brugernavn til e-mailmeddelelse om tilmelding til session**

Inkluder brugerens brugernavn i bekræftelses-e-mails om tilmelding, der sendes, når de tilmeldes en session.

*Standard: `false`*


### `enable_auto_reinscription`

**Aktivér automatisk genindskrivning**

Aktivér eller deaktivér automatisk genindskrivning, når kursusgyldigheden udløber. Det relaterede cron-job skal også være aktiveret.

*Standard: `false`*


### `enable_session_replication`

**Aktivér sessionsreplikering**

Aktivér eller deaktivér automatisk sessionsreplikering. Det relaterede cron-job skal også være aktiveret.

*Standard: `false`*


### `extend_rights_for_coach`

**Udvid rettigheder for tutorer**

Aktivér denne indstilling for at give tutorer de samme tilladelser som undervisere på forfatterværktøjer

*Standard: `false`*

### `hide_courses_in_sessions`

**Skjul kursusliste i sessioner**

Når sessionsblokken vises på din kursusside, skjules listen over kurser inde i den pågældende session (vis dem kun inde på den specifikke sessionsskærm).

*Standard: `false`*

### `hide_reporting_session_list`

**Skjul sessionsliste i rapporteringsværktøjet**

Sessioner, der inkluderer kurset, vises i rapporteringsværktøjet inde i selve kurset, hvilket kan tilføje betydelig vægt, hvis det samme kursus bruges i hundredvis af sessioner. Denne indstilling fjerner den liste.

*Standard: `false`*


### `hide_search_form_in_session_list`

**Skjul søgeformular i sessionslisten**

Fjern søgefeltet fra visningen af sessionslisten i administrationsgrænsefladen.

*Standard: `false`*


### `hide_session_graph_in_my_progress`

**Skjul sessionsdiagram i Min fremgang**

Skjul diagrammer og visualiseringer af sessionsfremgang fra siden Min fremgang i kursistdashboards.

*Standard: `false`*


### `hide_tab_list`

**Skjul faner på sessionssiden**

Fjern navigationsfaner fra sessionsdetaljesiden for at forenkle grænsefladen.

### `limit_session_admin_list_users`

**Sessionsadministratorer nægtes adgang til brugerlisten**

Forhindr sessionsadministratorer i at få adgang til den globale brugerliste i administrationsgrænsefladen.

*Standard: `false`*


### `limit_session_admin_role`

**Begræns sessionsadministratorers tilladelser**

Hvis aktiveret, vil sessionsadministratorerne kun se Bruger-blokken med indstillingen 'Tilføj bruger' og Sessioner-blokken med indstillingen 'Sessionsliste'.

*Standard: `false`*

### `my_courses_session_order`

**Ændr standardsorteringen af sessioner i Mine sessioner**

Som standard sorteres sessioner efter startdato. Ændr dette ved at angive et array af typen ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Vis mine kurser efter session**

Aktivér en ekstra side 'Mine kurser', hvor sessioner vises som en del af kurser, snarere end omvendt.

*Standard: `false`*

### `my_progress_session_show_all_courses`

**Min fremgang: vis kursusdetaljer i session**

Vis alle detaljer for hvert kursus i sessionen, når der klikkes på sessionsdetaljer.

*Standard: `false`*


### `prevent_session_admins_to_manage_all_users`

**Forhindr sessionsadministratorer i at administrere alle brugere**

Ved at aktivere denne indstilling vil sessionsadministratorer kun kunne se, på administrationssiden, de brugere, de har oprettet.

*Standard: `false`*

### `remove_session_url`

**Skjul link til sessionsside**

Skjul linket til sessionssiden fra sessionslisten.

*Standard: `false`*


### `session_admins_access_all_content`

**Sessionsadministratorer kan tilgå alt kursusindhold**

Sessionsadministratorer kan se alt kursusindhold i deres sessioner, herunder begrænset eller arkiveret materiale.

*Standard: `false`*

### `session_admins_edit_courses_content`

**Sessionsadministratorer kan redigere kursusindhold**

Sessionsadministratorer kan ændre kursusindhold (dokumenter, øvelser, værktøjer) i kurser, der er tildelt deres sessioner.

*Standard: `false`*

### `session_automatic_creation_user_id`

**Opretter-ID for automatisk oprettede sessioner**

Angiv den bruger, der skal bruges som opretter af automatisk oprettede sessioner (for at undgå at tildele hver session til bruger '1', som ofte er portaladministratoren).

*Standard: `1`*


### `session_classes_tab_disable`

**Deaktiver tilføjelse af klasse i sessionskursus for ikke-administratorer**

Deaktiver fanebladet til at tilføje klasser i sessionskurset for ikke-administratorer.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Sessioner efter varighed er altid tilgængelige for tutorer**

Ellers har sessionstutorer kun adgang til sessioner efter varighed i den aktive varighed.

*Standard: `false`*


### `session_course_ordering`

**Manuel rækkefølge af sessionskurser**

Aktivér denne indstilling for at tillade sessionsadministratorer at sortere kurserne i en session manuelt. Hvis den er deaktiveret, sorteres kurser alfabetisk efter kursets titel.

*Standard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Begræns tilmeldinger til kurset til kun sessionens brugere**

Begræns listen over studerende, der kan tilmeldes i kursets session. Og deaktiver registrering for brugere i alle kurser fra siden Resume Session.

*Standard: `false`*


### `session_courses_read_only_mode`

**Sæt kursus i skrivebeskyttet tilstand i session**

Lad undervisere sætte visse kurser i skrivebeskyttet tilstand, når de åbnes via sessioner. I kursets egenskaber skal du markere indstillingen 'Lock course in session'.

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Angiv obligatoriske ekstra felter i formularen til oprettelse af session**

Kræv de listede felter under oprettelse af session.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Udfyld sessionsfelter på forhånd med brugerfelter**

Array af relationer mellem brugerens ekstra felter og sessionens ekstra felter, så sessionen kan udfyldes på forhånd med data, der matcher brugerens data.

### `session_days_after_coach_access`

**Standardantal dage tutoradgang efter session**

Standardantal dage, en tutor kan tilgå en session efter den officielle sessionsafslutningsdato

### `session_days_before_coach_access`

**Standardantal dage tutoradgang før session**

Standardantal dage, en tutor kan tilgå en session før den officielle sessionsstartdato

### `session_import_settings`

**Indstillinger for sessionimport**

Array af indstillinger, der skal anvendes som standardparametre ved CSV/XML-sessionimport.

### `session_list_order`

**Sessioner understøtter manuel sortering**

Aktivér manuel omrokering af sessioner i administrationens sessionsliste via træk-og-slip eller lignende mekanisme.

*Standard: `false`*


### `session_list_show_count_users`

**Vis antal brugere i sessionslisten**

Administratoren kan se antallet af brugere i hver session. Dette belaster sessionslisten yderligere, så hvis du bruger den ofte, bør du overveje omhyggeligt, om du vil have den ekstra ventetid.

*Standard: `false`*


### `session_list_view_remaining_days`

**Vis resterende dage i Mine sessioner**

Hvis den er aktiveret, erstattes sessionsdatoerne på siden "Mine sessioner" af antallet af resterende dage.

*Standard: `false`*

### `session_model_list_field_ordered_by_id`

**Sortér sessionsskabeloner efter id i formularen til oprettelse af session**

[inferred] Sortér sessionsskabeloner efter deres numeriske ID i rullelisten i formularen til oprettelse af session i stedet for alfabetisk efter navn.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Forhindr tømning af tilmeldte brugere ved sessionstilmelding**

Når flere lærende tilmeldes en session, forhindres den normale adfærd, som er at framelde brugere, der ikke er i det rigtige panel, når der klikkes på send. Behold alle brugere dér.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Vis alle sessioner på siden 'Mine kurser'**

Hvis den er aktiveret, viser denne indstilling alle brugerens sessioner i kalenderbaseret visning.

*Standard: `true`*


### `show_session_coach`

**Vis sessionstutor**

Vis navnet på den generelle sessionstutor i sessionens titelboks i kursuslisten

*Standard: `false`*

### `show_session_data`

**Vis titel for sessionsdata**

Vis kommentar til sessionsdata

*Standard: `false`*

### `show_session_description`

**Vis sessionsbeskrivelse**

Vis sessionsbeskrivelsen, hvor denne indstilling er implementeret (sider til sessionssporing osv.)

*Standard: `false`*

### `show_simple_session_info`

**Vis enkel sessionsinfo**

Tilføj underviser og datoer til sessionens undertitel i sessionslisten.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Vis kun brugere fra aktive sessioner i tracking**

Vis kun brugere fra aktuelt aktive sessioner i elevtracking og rapporteringsvisninger.

*Standard: `false`*


### `tracking_columns`

**Tilpas kolonner til kursus-session-tracking**

Definer et array af kolonner til følgende rapporter: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Varighed for automatisk oprettede sessioner**

Varighed (i dage) for de enkeltbruger-, automatisk oprettede sessioner. Efter udløb kan brugeren ikke tilmelde sig det samme kursus (der oprettes ingen anden session).

*Standard: `1095`*


### `user_session_display_mode`

**Visningstilstand for Mine sessioner**

Vælg, hvordan siden "Mine sessioner" vises: som en moderne visuel blokvisning (kort) eller den klassiske listestil.

*Standard: `list`*