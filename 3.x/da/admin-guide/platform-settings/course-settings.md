# Kursusindstillinger

Standarder og politikker, der gælder for kurser på tværs af platformen — synlighed, oprettelsesrettigheder, tilladte værktøjer, lærertilladelser og lignende.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Kursus**. Denne kategori indeholder **45 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens indstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `active_tools_on_create`

**Aktive værktøjer ved kursusoprettelse**

Vælg de værktøjer, der skal være *aktive* efter oprettelsen af et kursus.

*Standard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Brug kursuskategorier fra top-URL**

I multi-URL-opsætninger tillades administratorer og undervisere at tildele kategorier fra top-URL'en til kurser i underordnede URL'er.

*Standard: `false`*

### `allow_course_theme`

**Tillad kurstemaer**

Tillader grafiske kurstemaer og gør det muligt at ændre det stylesheet, et kursus bruger, til et hvilket som helst af de stylesheets, der er tilgængelige i Chamilo. Når en bruger går ind i kurset, har kursets stylesheet prioritet over brugerens eget stylesheet og platformens standardstylesheet.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Adgang til offentlige kurser med vilkår og betingelser**

Når denne indstilling er aktiveret, deaktiveres vilkår og betingelser for et kursus med offentlig synlighed, så længe kurset er offentligt.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloker autentificerede brugeres adgang til offentlige kurser**

Vis kun offentlige kurser. Tillad ikke registrerede brugere at tilgå kurser med synligheden 'åben', medmindre de er tilmeldt hvert af disse kurser.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Brødkrumme på kursets startside**

Brødkrummen er det vandrette linknavigationssystem, der typisk vises øverst til venstre på siden. Denne indstilling vælger, hvad der skal vises i brødkrummen på kursernes startsider

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Skjul underviseroplysninger på kursusdetaljesiden**

Skjul underviseroplysningerne på kursusdetaljesiden.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Begræns kursusskabeloner til én kursuskategori**

Angiv en kategorikode, der skal bruges som kursusskabeloner. Kun disse kurser vises i rullemenuen ved kursusoprettelse, og brugerne vil ikke se kurserne i denne kategori i kursuskataloget.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Ekstra felter, der skal vises i kursusindstillinger**

De felter, der er defineret i dette array, vises på siden med kursusindstillinger.

### `course_creation_by_teacher_extra_fields_to_show`

**Ekstra felter, der skal vises på formularen til kursusoprettelse**

De felter, der er defineret i dette array, vises som yderligere felter i formularen til kursusoprettelse.

### `course_creation_donate_link`

**Donationslink på siden til kursusoprettelse**

Den side, donationsbeskeden skal linke til (fuld URL).

### `course_creation_donate_message_show`

**Vis donationsbesked på siden til kursusoprettelse**

Tilføj en beskedboks på siden til kursusoprettelse for undervisere, der opfordrer dem til at donere til projektet.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Fjern feltet for kursuskode fra formularen til kursusoprettelse**

Hvis den ikke angives, genereres kursuskoden som standard ud fra kursets titel, så aktiver denne indstilling for at fjerne kodefeltet helt fra formularen til kursusoprettelse.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Gør kursuskategori obligatorisk**

Gør kursuskategorien til et påkrævet felt, når et kursus oprettes.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Ekstra felter, der skal kræves på formularen til kursusoprettelse**

De felter, der er defineret i dette array, vil være obligatoriske i formularen til kursusoprettelse.

### `course_creation_splash_screen`

**Splash-skærm for kurser**

Vis en splash-skærm, når et nyt kursus oprettes.

*Standard: `true`*

### `course_creation_use_template`

**Brug skabelonkursus til nye kurser**

Angiv dette for at bruge det samme skabelonkursus (identificeret ved dets numeriske kursus-ID i databasen) til alle nye kurser, der oprettes på platformen. Bemærk, at denne indstilling, hvis den ikke planlægges korrekt, kan have en massiv indvirkning på pladsforbruget. Skabelonkurset bruges, som hvis underviseren lavede en kopi af kurset med kursusbackupværktøjerne, så intet brugerindhold kopieres, kun underviserens materiale. Alle andre regler for kursusbackup gælder. Lad feltet være tomt (eller sæt det til 0) for at deaktivere.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Udfyld kursusfelter på forhånd med felter fra brugeren**

Hvis feltet ikke er tomt, vil kursusoprettelsesprocessen søge efter visse felter i brugerprofilen og udfylde dem automatisk for kurset. En underviser specialiseret i digital marketing kunne for eksempel automatisk sætte et flag for « digital marketing » på hvert kursus, vedkommende opretter.

### `course_hide_tools`

**Skjul værktøjer for undervisere**

Markér de værktøjer, du vil skjule for undervisere. Dette vil forhindre adgang til værktøjet.

### `course_images_in_courses_list`

**Tilpassede kursusikoner**

Brug kursusbilleder som kursusikon i kursuslister (i stedet for det standard grønne tavleikon).

*Standard: `true`*

### `course_log_default_extra_fields`

**Brugeres ekstra felter som standard på kursusstatistiksiden**

Konfigurér dette array med de interne ID'er for de ekstra felter, du vil vise som standard på den primære kursusstatistikside.

### `course_log_hide_columns`

**Skjul kolonner i kursuslogfiler**

Dette array giver dig mulighed for at konfigurere, hvilke kolonner der skal skjules på den primære kursusstatistikside og i rapporten over samlet tid.

### `course_sequence_valid_only_in_same_session`

**Validér forudsætninger kun inden for samme session**

Når indstillingen er aktiveret, betragtes et kursus kun som valideret, hvis det er bestået inden for den aktuelle session. Hvis den er deaktiveret, vil kurser, der er bestået i andre sessioner, også låse afhængige kurser op.

*Standard: `false`*


### `course_student_info`

**Visning af kursusinformation for studerende**

Vis på siderne ‘Mine kurser’/’Mine sessioner’ yderligere information om den studerendes score, fremgang og/eller erhvervelse af certifikat.

### `course_validation`

**Kursusvalidering**

Når funktionen 'Kursusvalidering' er aktiveret, kan en underviser ikke oprette et kursus alene. Vedkommende udfylder en kursusanmodning. Platformadministratoren gennemgår anmodningen og godkender eller afviser den.<br />Denne funktion er afhængig af automatiseret e-mailbesked; indstil Chamilo til at tilgå en e-mailserver og til at bruge en dedikeret e-mailkonto.

*Standard: `false`*


### `course_validation_terms_and_conditions_url`

**Kursusvalidering – et link til vilkår og betingelser**

Dette er URL'en til dokumentet 'Vilkår og betingelser', som gælder for at indgive en kursusanmodning. Hvis adressen er angivet her, skal brugeren læse og acceptere disse vilkår og betingelser, før en kursusanmodning sendes.<br />Hvis du aktiverer Chamilos modul 'Vilkår og betingelser', og du vil bruge dets URL, skal du lade denne indstilling være tom.

### `courses_default_creation_visibility`

**Standard kursussynlighed**

Standard kursussynlighed ved oprettelse af et nyt kursus

*Standard: `2`*


### `display_coursecode_in_courselist`

**Vis kode i kursusnavn**

Vis kursuskode i kursuslister

*Standard: `false`*


### `display_teacher_in_courselist`

**Vis underviser i kursusnavn**

Vis underviser i kursuslister

*Standard: `true`*


### `enable_tool_introduction`

**Aktivér værktøjsintroduktion**

Aktivér introduktioner på hvert værktøjs startside

*Standard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Vis frameldingsknap i ‘Mine kurser’**

Tilføj en knap til at framelde sig et kursus på siden ‘Mine kurser’.

*Standard: `false`*

### `example_material_course_creation`

**Eksempelmateriale ved kursusoprettelse**

Opret automatisk eksempelmateriale, når et nyt kursus oprettes

*Standard: `true`*


### `hide_course_rating`

**Skjul kursusbedømmelse**

Funktionen til kursusbedømmelse vises som standard flere steder. Hvis du ikke ønsker den, skal du aktivere denne indstilling.

*Standard: `false`*

### `hide_course_sidebar`

**Skjul kursusblokken i sidebjælken**

Når du er på skærme, hvor venstremenuen er synlig, vises sektionen « Kurser » ikke.

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Vis markør for delte kurser ved flere URL'er**

Tilføjer et linkikon til kurser, der er delt mellem URL'er, så brugere (især undervisere) ved, at de skal være særligt omhyggelige, når de redigerer kursusindholdet.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Vis kun kurser på brugerens sprog**

Hvis indstillingen er aktiveret, skjules alle kurser, der ikke er sat til brugerens sprog.

*Standard: `false`*

### `profiling_filter_adding_users`

**Filtrer brugere på profilfelter ved tilmelding til kursus**

Tillad undervisere at filtrere brugerne baseret på ekstra felter på siden til at tilmelde brugere til deres kursus.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Vis afhængigheder i kursusintroduktion**

Når der bruges ressourcesekvensering med kurser eller sessioner, vises kursets afhængigheder på kursets startside.

*Standard: `false`*

### `scorm_cumulative_session_time`

**Kumulativ sessionstid for SCORM**

Når indstillingen er aktiveret, vil sessionstiden for SCORM-læringsstier være kumulativ; ellers tælles den kun fra sidste opdateringstidspunkt. Dette er en global indstilling. Den bruges ved oprettelse af en ny læringssti, men kan derefter omdefineres for hver enkelt.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-mail-advarsel ved kursusoprettelse**

Send en e-mail til platformadministratoren, hver gang en underviser opretter et nyt kursus

*Standard: `false`*


### `show_course_duration`

**Vis kursusvarighed**

Vis kursusvarigheden ved siden af kursets titel i kursuskataloget og kursuslisten.

*Standard: `false`*

### `show_navigation_menu`

**Vis kursusnavigationsmenu**

Vis en navigationsmenu, der giver hurtigere adgang til værktøjerne

*Standard: `false`*


### `show_toolshortcuts`

**Værktøjsgenveje**

Vis værktøjsgenvejene i banneret?

*Standard: `false`*

### `student_view_enabled`

**Aktivér elevvisning**

Aktivér elevvisningen, som giver en underviser eller administrator mulighed for at se et kursus, som en elev ville se det

*Standard: `true`*


### `view_grid_courses`

**Vis kurser i gitterlayout**

Vis kurser i et layout med flere kurser pr. linje. Ellers vises layoutet med ét kursus pr. linje.

*Standard: `true`*