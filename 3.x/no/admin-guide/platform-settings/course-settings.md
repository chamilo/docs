# Kursinnstillinger

Standardverdier og retningslinjer som gjelder for kurs på tvers av plattformen — synlighet, opprettelsesrettigheter, tillatte verktøy, lærertillatelser og lignende.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Kurs**. Denne kategorien inneholder **45 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `active_tools_on_create`

**Aktive verktøy ved kursopprettelse**

Velg verktøyene som skal være *aktive* etter at et kurs er opprettet.

*Standard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Bruk kurskategorier fra topp-URL**

I oppsett med flere URL-er, tillat administratorer og lærere å tilordne kategorier fra topp-URL-en til kurs i underordnede URL-er.

*Standard: `false`*

### `allow_course_theme`

**Tillat kurstemaer**

Tillater grafiske kurstemaer og gjør det mulig å endre stilarket som brukes av et kurs til et hvilket som helst av de tilgjengelige stilarkene i Chamilo. Når en bruker går inn i kurset, vil kursets stilark ha prioritet over brukerens eget stilark og plattformens standardstilark.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Tilgang til offentlige kurs med vilkår og betingelser**

Når dette alternativet er aktivert, og et kurs har offentlig synlighet og vilkår og betingelser, deaktiveres disse vilkårene så lenge kurset er offentlig.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Blokker autentiserte brukeres tilgang til offentlige kurs**

Vis kun offentlige kurs. Ikke tillat registrerte brukere å få tilgang til kurs med synlighet «åpen» med mindre de er påmeldt hvert av disse kursene.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Brødsmule på kursets startside**

Brødsmulen er det horisontale lenkenavigasjonssystemet, vanligvis øverst til venstre på siden. Dette alternativet velger hva som skal vises i brødsmulen på kursenes startsider

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Skjul lærerinformasjon på kursets detaljside**

På kursets detaljside, skjul lærerinformasjonen.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Begrens kursmaler til én kurskategori**

Oppgi en kategorikode som skal brukes som kursmaler. Kun disse kursene vises i nedtrekkslisten ved kursopprettelse, og brukerne vil ikke se kursene i denne kategorien i kurskatalogen.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Ekstra felt som skal vises i kursinnstillinger**

Feltene som er definert i denne tabellen, vises på siden for kursinnstillinger.

### `course_creation_by_teacher_extra_fields_to_show`

**Ekstra felt som skal vises i skjemaet for kursopprettelse**

Feltene som er definert i denne tabellen, vises som tilleggsfelt i skjemaet for kursopprettelse.

### `course_creation_donate_link`

**Donasjonslenke på siden for kursopprettelse**

Siden donasjonsmeldingen skal lenke til (full URL).

### `course_creation_donate_message_show`

**Vis donasjonsmelding på siden for kursopprettelse**

Legg til en meldingsboks på siden for kursopprettelse for lærere, som ber dem donere til prosjektet.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Fjern feltet for kurskode fra skjemaet for kursopprettelse**

Hvis det ikke oppgis, genereres kurskoden som standard basert på kurstittelen, så aktiver dette alternativet for å fjerne kodefeltet fra skjemaet for kursopprettelse helt.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Gjør kurskategori obligatorisk**

Når et kurs opprettes, gjør kurskategorien til en påkrevd innstilling.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Ekstra felt som skal kreves i skjemaet for kursopprettelse**

Feltene som er definert i denne tabellen, vil være obligatoriske i skjemaet for kursopprettelse.

### `course_creation_splash_screen`

**Velkomstskjerm for kurs**

Vis en velkomstskjerm når et nytt kurs opprettes.

*Standard: `true`*

### `course_creation_use_template`

**Bruk mal-kurs for nye kurs**

Sett denne for å bruke samme mal-kurs (identifisert ved kursets numeriske ID i databasen) for alle nye kurs som opprettes på plattformen. Merk at denne innstillingen, hvis den ikke er godt planlagt, kan ha stor innvirkning på lagringsbruk. Mal-kurset brukes som om læreren tok en kopi av kurset med kurs-sikkerhetskopieringsverktøyene, slik at ingen brukerinnhold kopieres, kun lærerens materiell. Alle andre regler for kurs-sikkerhetskopi gjelder. La stå tom (eller sett til 0) for å deaktivere.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Forhåndsutfyll kursfelt med felt fra bruker**

Hvis den ikke er tom, vil kursopprettingsprosessen se etter enkelte felt i brukerprofilen og fylle dem automatisk for kurset. For eksempel kan en lærer som er spesialisert i digital markedsføring automatisk sette et «digital markedsføring»-flagg på hvert kurs vedkommende oppretter.

### `course_hide_tools`

**Skjul verktøy for lærere**

Merk av verktøyene du vil skjule for lærere. Dette vil forby tilgang til verktøyet.

### `course_images_in_courses_list`

**Egendefinerte kursikoner**

Bruk kursbilder som kursikon i kurslister (i stedet for standard grønt tavleikon).

*Standard: `true`*

### `course_log_default_extra_fields`

**Brukerens ekstra felt som standard på kursstatistikk-siden**

Konfigurer denne tabellen med de interne ID-ene til de ekstra feltene du vil vise som standard på hovedsiden for kursstatistikk.

### `course_log_hide_columns`

**Skjul kolonner fra kurslogger**

Denne tabellen gir deg mulighet til å konfigurere hvilke kolonner som skal skjules på hovedsiden for kursstatistikk og i rapporten for total tid.

### `course_sequence_valid_only_in_same_session`

**Valider forutsetninger kun innenfor samme økt**

Når den er aktivert, vil et kurs bare anses som validert hvis det er bestått innenfor gjeldende økt. Hvis den er deaktivert, vil kurs som er bestått i andre økter også låse opp avhengige kurs.

*Standard: `false`*


### `course_student_info`

**Visning av studentinformasjon i kurs**

På sidene «Mine kurs»/«Mine økter», vis tilleggsinformasjon om studentens poengsum, fremdrift og/eller oppnådd sertifikat.

### `course_validation`

**Kursvalidering**

Når funksjonen «Kursvalidering» er aktivert, kan ikke en lærer opprette et kurs alene. Vedkommende fyller ut en kursforespørsel. Plattformadministratoren gjennomgår forespørselen og godkjenner eller avslår den.<br />Denne funksjonen er avhengig av automatisk e-postmeldinger; konfigurer Chamilo til å nå en e-postserver og bruke en dedikert e-postkonto.

*Standard: `false`*


### `course_validation_terms_and_conditions_url`

**Kursvalidering – en lenke til vilkår og betingelser**

Dette er URL-en til dokumentet «Vilkår og betingelser» som gjelder for å sende en kursforespørsel. Hvis adressen er satt her, skal brukeren lese og godta disse vilkårene og betingelsene før en kursforespørsel sendes.<br />Hvis du aktiverer Chamilos modul «Vilkår og betingelser» og vil at dens URL skal brukes, la denne innstillingen stå tom.

### `courses_default_creation_visibility`

**Standard kursynlighet**

Standard kursynlighet ved opprettelse av et nytt kurs

*Standard: `2`*


### `display_coursecode_in_courselist`

**Vis kode i kursnavn**

Vis kurskode i kurslister

*Standard: `false`*


### `display_teacher_in_courselist`

**Vis lærer i kursnavn**

Vis lærer i kurslister

*Standard: `true`*


### `enable_tool_introduction`

**Aktiver verktøyintroduksjon**

Aktiver introduksjoner på hvert verktøys startside

*Standard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Vis avmeldingsknapp i «Mine kurs»**

Legg til en knapp for å melde seg av et kurs på siden «Mine kurs».

*Standard: `false`*

### `example_material_course_creation`

**Eksempelmateriell ved kursopprettelse**

Opprett eksempelmateriell automatisk når et nytt kurs opprettes

*Standard: `true`*


### `hide_course_rating`

**Skjul kursvurdering**

Kursvurderingsfunksjonen vises som standard på ulike steder. Hvis du ikke vil ha den, aktiver dette valget.

*Standard: `false`*

### `hide_course_sidebar`

**Skjul kursblokken i sidemenyen**

På skjermer der venstremenyen er synlig, vis ikke seksjonen «Kurs».

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Vis merke for delt kurs ved flere URL-er**

Legger til et lenkeikon på kurs som er delt mellom URL-er, slik at brukere (særlig lærere) vet at de må være ekstra forsiktige når de redigerer kursinnholdet.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Vis kun kurs på brukerens språk**

Hvis den er aktivert, vil dette valget skjule alle kurs som ikke er satt til brukerens språk.

*Standard: `false`*

### `profiling_filter_adding_users`

**Filtrer brukere på profilfelt ved påmelding til kurs**

Tillat lærere å filtrere brukerne basert på ekstra felt på siden for å melde brukere på kurset sitt.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Vis avhengigheter i kursintroduksjon**

Når ressurssekvensering brukes med kurs eller økter, vis avhengighetene til kurset på kursets hjemmeside.

*Standard: `false`*

### `scorm_cumulative_session_time`

**Kumulativ økttid for SCORM**

Når dette er aktivert, vil økttiden for SCORM-læringsstier være kumulativ; ellers telles den bare fra siste oppdateringstidspunkt. Dette er en global innstilling. Den brukes når en ny læringssti opprettes, men kan deretter omdefineres for hver enkelt.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-postvarsel ved kursopprettelse**

Send en e-post til plattformadministratoren hver gang en lærer oppretter et nytt kurs

*Standard: `false`*


### `show_course_duration`

**Vis kursvarighet**

Vis kursvarigheten ved siden av kurstittelen i kurskatalogen og kurslisten.

*Standard: `false`*

### `show_navigation_menu`

**Vis kursnavigasjonsmeny**

Vis en navigasjonsmeny som gir raskere tilgang til verktøyene

*Standard: `false`*


### `show_toolshortcuts`

**Verktøysnarveier**

Vise verktøysnarveiene i banneret?

*Standard: `false`*

### `student_view_enabled`

**Aktiver elevvisning**

Aktiver elevvisningen, som lar en lærer eller administrator se et kurs slik en elev ville sett det

*Standard: `true`*


### `view_grid_courses`

**Vis kurs i rutenettoppsett**

Vis kurs i et oppsett med flere kurs per linje. Ellers vil oppsettet vise ett kurs per linje.

*Standard: `true`*