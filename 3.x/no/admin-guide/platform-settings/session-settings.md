# Øktinnstillinger

Standardverdier og atferd for **Økter** — øktlivssyklus, veiledernes tilgangsvinduer, kursens synlighet innenfor en økt, og lignende.

Tilgang til disse innstillingene finnes under **Administrasjon > Konfigurasjonsinnstillinger > Økter**. Denne kategorien inneholder **68 innstillinger**, listet nedenfor med tittel og kommentar som følger med i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `add_users_by_coach`

**Tillat veiledere å registrere brukere**

Veiledere kan opprette brukere på plattformen og melde brukere inn i en økt.

*Standard: `false`*

### `allow_career_diagram`

**Aktiver karrierediagrammer**

Karrierediagrammer lar deg vise diagrammer over karrierer, ferdigheter og kurs.

*Standard: `false`*


### `allow_career_users`

**Aktiver karrierediagrammer for brukere**

Hvis karrierediagrammer er aktivert, kan brukere bare se dem (og kun diagrammene som tilsvarer deres studier) hvis du aktiverer dette valget.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Tillat veiledere å redigere inne i kursøkter**

Tillat veiledere å redigere inne i kursøkter

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Øktadministratorer kan slette brukere**

Øktadministratorer kan fjerne brukere fra plattformen når de administrerer økten(e) sine.

*Standard: `false`*


### `allow_disable_user_for_session_admin`

**Øktadministratorer kan deaktivere brukere**

Øktadministratorer kan deaktivere brukerkontoer for å hindre innlogging, samtidig som påmeldingsopplysninger beholdes i økten(e) deres.

*Standard: `false`*


### `allow_edit_tool_visibility_in_session`

**Tillat redigering av verktøysynlighet i økter**

Når økter brukes, er standardatferden å bruke verktøysynligheten som er definert i basiskurset. Denne innstillingen endrer det, slik at veiledere i øktkurs kan tilpasse verktøysynlighet etter behov.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Omdiriger til økt etter registrering på øktens «Om»-side**

Omdiriger automatisk nye brukere til øktsiden deres etter at de har fullført registrering via en økts Om-side.

*Standard: `false`*


### `allow_search_diagnostic`

**Aktiver diagnose for øktsøk**

Tillat veiledere å få en diagnose som gjør det mulig å søke etter de beste øktene for lærende.

*Standard: `false`*


### `allow_session_admin_extra_access`

**Øktadministrator kan få tilgang til masseimport, oppdatering og eksport av brukere**

Øktadministratorer kan få tilgang til funksjonalitet for masseimport, oppdatering og eksport av brukere i tillegg til sine vanlige tillatelser.

*Standard: `false`*


### `allow_session_admin_login_as_teacher`

**Øktadministratorer kan «logge inn som» lærere**

Øktadministratorer kan utgi seg for lærerkontoer for å forhåndsvise kursinnhold og studentopplevelse innenfor økten(e) sine.

*Standard: `false`*


### `allow_session_admin_read_careers`

**Øktadministratorer kan se karrierer**

[inferred] Øktadministratorer kan se og få tilgang til karriereveier og forfremmelsesarbeidsflyter knyttet til øktene de administrerer.

*Standard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Tillat øktadministratorer å se alle økter**

Når dette valget ikke er aktivert (standard), kan øktadministratorer bare se øktene de selv har opprettet. Dette er forvirrende i et åpent miljø der øktadministratorer kan trenge å dele støttetid mellom to økter.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Tillat kopiering fra økt til økt for lærere**

Aktiver dette valget for å la lærere kopiere innholdet sitt fra ett kurs i en økt til et kurs i en annen økt. Som standard er dette valget bare tilgjengelig for plattformadministratorer.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Tillat lærere å opprette økter**

Lærere kan opprette, redigere og slette sine egne økter.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Veiledere kan tildele studenter til økter**

Når dette er aktivert, kan kursveiledere i økter melde nye brukere inn i økten sin. Dette valget er ellers bare tilgjengelig for administratorer og øktadministratorer.

*Standard: `false`*

### `allow_user_session_collabsable`

**Tillat bruker å slå sammen økter i Mine økter**

Brukere kan slå sammen øktkort eller grupper på siden Mine økter for å redusere visuell støy og forbedre navigasjonen.

*Standard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Lærer i basiskurset kan se innleveringer fra alle økter**

Vis alle publikasjoner fra lærende (fra basiskurset og fra alle økter) på work/pending.php-siden i basiskurset.

*Standard: `false`*

### `career_diagram_disclaimer`

**Vis en ansvarsfraskrivelse under karrierediagrammet**

Legg til en ansvarsfraskrivelse under karrierediagrammet. En språkvariabel kalt 'Career diagram disclaimer' må finnes i underspråket ditt.

*Standard: `false`*

### `career_diagram_legend`

**Vis en forklaring under karrierediagrammet**

Legg til en karriereforklaring under karrierediagrammet. En språkvariabel kalt 'Career diagram legend' må finnes i underspråket ditt.

*Standard: `false`*

### `courses_list_session_title_link`

**Type lenke for sesjonstittelen**

På siden for kurs/sesjoner kan sesjonstittelen være én av følgende: 0 = ingen lenke (skjul sesjonstittel) ; 1 = lenk tittelen til en spesiell sesjonsside ; 2 = lenke til kurset hvis det bare er ett kurs ; 3 = sesjonstittelen gjør kurslisten sammenleggbar ; 4 = ingen lenke (vis sesjonstittel).

*Standard: `1`*

### `default_session_list_view`

**Standardvisning for sesjonsliste**

Velg standardfanen du vil se når du åpner sesjonslisten som administrator.

*Standard: `all`*


### `drh_can_access_all_session_content`

**HR-direktører får tilgang til alt sesjonsinnhold**

Hvis aktivert, får personalansvarlige (HR-direktører) tilgang til alt innhold og alle brukere fra sesjonene vedkommende følger.

*Standard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Aktiver kopiering av sesjonsspesifikt innhold til en annen sesjon**

Tillater duplisering av ressurser som ble opprettet i sesjonen når sesjonen dupliseres.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Legg til lenke for tilbakestilling av passord i e-postvarsel om påmelding til sesjon**

Inkluder en lenke for tilbakestilling av passord i bekreftelses-e-poster som sendes til brukere når de meldes på en sesjon.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Legg til brukernavn i e-postvarsel om påmelding til sesjon**

Inkluder brukerens brukernavn i bekreftelses-e-poster som sendes når de meldes på en sesjon.

*Standard: `false`*


### `enable_auto_reinscription`

**Aktiver automatisk reinnmelding**

Aktiver eller deaktiver automatisk reinnmelding når kursgyldigheten utløper. Den relaterte cron-jobben må også være aktivert.

*Standard: `false`*


### `enable_session_replication`

**Aktiver sesjonsreplikering**

Aktiver eller deaktiver automatisk sesjonsreplikering. Den relaterte cron-jobben må også være aktivert.

*Standard: `false`*


### `extend_rights_for_coach`

**Utvid rettigheter for veiledere**

Aktiver dette valget for å gi veiledere de samme tillatelsene som trenere på forfatterverktøy

*Standard: `false`*

### `hide_courses_in_sessions`

**Skjul kursliste i sesjoner**

Når sesjonsblokken vises på kurssiden din, skjul listen over kurs inne i den sesjonen (vis dem bare inne på den spesifikke sesjonsskjermen).

*Standard: `false`*

### `hide_reporting_session_list`

**Skjul sesjonsliste i rapporteringsverktøyet**

Sesjoner som inkluderer kurset, listes i rapporteringsverktøyet inne i selve kurset, noe som kan gi betydelig merbelastning hvis samme kurs brukes i hundrevis av sesjoner. Dette valget fjerner den listen.

*Standard: `false`*


### `hide_search_form_in_session_list`

**Skjul søkeskjema i sesjonslisten**

Fjern søkefeltet fra visningen av sesjonslisten i administrasjonsgrensesnittet.

*Standard: `false`*


### `hide_session_graph_in_my_progress`

**Skjul sesjonsdiagram i Min fremgang**

Skjul diagrammer og visualiseringer av sesjonsfremgang fra siden Min fremgang i læringsdashbordene.

*Standard: `false`*


### `hide_tab_list`

**Skjul faner på sesjonssiden**

Fjern navigasjonsfaner fra sesjonens detaljside for å forenkle grensesnittet.

### `limit_session_admin_list_users`

**Sesjonsadministratorer nektes tilgang til brukerliste**

Hindre sesjonsadministratorer i å få tilgang til den globale brukerlisten i administrasjonsgrensesnittet.

*Standard: `false`*


### `limit_session_admin_role`

**Begrens sesjonsadministratorers tillatelser**

Hvis aktivert, vil sesjonsadministratorene bare se Bruker-blokken med valget «Legg til bruker» og Sesjoner-blokken med valget «Sesjonsliste».

*Standard: `false`*

### `my_courses_session_order`

**Endre standard sortering av sesjon i Mine sesjoner**

Som standard sorteres sesjoner etter startdato. Endre dette ved å oppgi en tabell av typen ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Vis mine kurs etter sesjon**

Aktiver en ekstra side «Mine kurs» der sesjoner vises som del av kurs, i stedet for omvendt.

*Standard: `false`*

### `my_progress_session_show_all_courses`

**Min fremgang: vis kursdetaljer i sesjon**

Vis alle detaljer for hvert kurs i sesjonen når du klikker på sesjonsdetaljer.

*Standard: `false`*


### `prevent_session_admins_to_manage_all_users`

**Hindre sesjonsadministratorer i å administrere alle brukere**

Ved å aktivere dette valget vil sesjonsadministratorer bare kunne se, på administrasjonssiden, brukerne de selv har opprettet.

*Standard: `false`*

### `remove_session_url`

**Skjul lenke til øktside**

Skjul lenken til øktsiden fra øktlisten.

*Standard: `false`*


### `session_admins_access_all_content`

**Øktadministratorer kan få tilgang til alt kursinnhold**

Øktadministratorer kan se alt kursinnhold i sine økter, inkludert begrenset eller arkivert materiale.

*Standard: `false`*

### `session_admins_edit_courses_content`

**Øktadministratorer kan redigere kursinnhold**

Øktadministratorer kan endre kursinnhold (dokumenter, øvelser, verktøy) i kurs som er tildelt deres økter.

*Standard: `false`*

### `session_automatic_creation_user_id`

**Oppretter-ID for automatisk opprettede økter**

Angi brukeren som skal brukes som oppretter av automatisk opprettede økter (for å unngå at hver økt tildeles bruker «1», som ofte er portaladministratoren).

*Standard: `1`*


### `session_classes_tab_disable`

**Deaktiver fane for å legge til klasse i øktkurs for ikke-administratorer**

Deaktiver fanen for å legge til klasser i øktkurs for ikke-administratorer.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Økter etter varighet alltid tilgjengelige for veiledere**

Ellers har øktveiledere bare tilgang til økter etter varighet i den aktive varighetsperioden.

*Standard: `false`*


### `session_course_ordering`

**Manuell rekkefølge for øktkurs**

Aktiver dette valget for å la øktadministratorene sortere kursene i en økt manuelt. Hvis det er deaktivert, sorteres kursene alfabetisk etter kurstittel.

*Standard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Begrens påmeldinger til kurs til kun brukere i økten**

Begrens listen over studenter som kan meldes på i kursøkten. Og deaktiver registrering for brukere i alle kurs fra siden Resume Session.

*Standard: `false`*


### `session_courses_read_only_mode`

**Sett kurs i skrivebeskyttet modus i økt**

La lærere sette enkelte kurs i skrivebeskyttet modus når de åpnes via økter. I kursegenskapene merker du av for valget «Lock course in session».

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Sett obligatoriske ekstra felt i skjemaet for øktopprettelse**

Krev de listede feltene under opprettelse av økt.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Forhåndsutfyll øktfelt med brukerfelt**

Array av relasjoner mellom ekstra brukerfelt og ekstra øktfelt, slik at økten kan forhåndsutfylles med data som matcher brukerens data.

### `session_days_after_coach_access`

**Standard veileder-tilgangsdager etter økt**

Standard antall dager en veileder kan få tilgang til en økt etter den offisielle sluttdatoen for økten

### `session_days_before_coach_access`

**Standard veileder-tilgangsdager før økt**

Standard antall dager en veileder kan få tilgang til en økt før den offisielle startdatoen for økten

### `session_import_settings`

**Valg for øktimport**

Array av valg som skal brukes som standardparametere i CSV/XML-øktimport.

### `session_list_order`

**Økter støtter manuell sortering**

Aktiver manuell omorganisering av økter i administrasjonens øktliste via dra-og-slipp eller lignende mekanisme.

*Standard: `false`*


### `session_list_show_count_users`

**Vis antall brukere i øktlisten**

Administratoren kan se antall brukere i hver økt. Dette gir ekstra belastning på øktlisten, så hvis du bruker det ofte, bør du nøye vurdere om du vil ha den ekstra ventetiden.

*Standard: `false`*


### `session_list_view_remaining_days`

**Vis gjenstående dager i Mine økter**

Hvis aktivert, erstattes øktdatoene på siden «Mine økter» med antall gjenstående dager.

*Standard: `false`*

### `session_model_list_field_ordered_by_id`

**Sorter øktmaler etter id i skjemaet for øktopprettelse**

[inferred] Sorter øktmaler etter deres numeriske ID i nedtrekkslisten i skjemaet for øktopprettelse i stedet for alfabetisk etter navn.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Forhindre tømming av påmeldte brukere ved øktpåmelding**

Når du bruker påmelding av flere lærende til en økt, forhindre normal atferd som er å avmelde brukere som ikke er i høyre panel når du klikker send inn. Behold alle brukere der.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Vis alle økter på siden «Mine kurs»**

Hvis aktivert, viser dette valget alle brukerens økter i kalenderbasert visning.

*Standard: `true`*


### `show_session_coach`

**Vis øktveileder**

Vis navnet på den generelle øktveilederen i økttittelboksen i kurslisten

*Standard: `false`*

### `show_session_data`

**Vis tittel for øktdata**

Vis kommentar for øktdata

*Standard: `false`*

### `show_session_description`

**Vis øktbeskrivelse**

Vis øktbeskrivelsen der dette valget er implementert (sider for øktsporing osv.)

*Standard: `false`*

### `show_simple_session_info`

**Vis enkel øktinformasjon**

Legg til veileder og datoer i øktens undertittel i øktlisten.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Vis kun brukere fra aktive økter i sporing**

Vis kun brukere fra for øyeblikket aktive økter i elevsporing og rapportvisninger.

*Standard: `false`*


### `tracking_columns`

**Tilpass kolonner for kurs-økt-sporing**

Definer en array med kolonner for følgende rapporter: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Varighet for automatisk opprettede økter**

Varighet (i dager) for de automatisk opprettede øktene for én bruker. Etter utløp kan ikke brukeren registrere seg på samme kurs (ingen annen økt opprettes).

*Standard: `1095`*


### `user_session_display_mode`

**Visningsmodus for Mine økter**

Velg hvordan siden «Mine økter» vises: som en moderne visuell blokkvisning (kort) eller den klassiske listestilen.

*Standard: `list`*