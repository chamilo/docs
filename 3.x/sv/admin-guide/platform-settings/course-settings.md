# Kursinställningar

Standardvärden och policyer som gäller för kurser på hela plattformen — synlighet, skapanderättigheter, tillåtna verktyg, deltagarbehörigheter och liknande.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Kurs**. Denna kategori innehåller **45 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `active_tools_on_create`

**Aktiva verktyg vid kurskapande**

Välj de verktyg som ska vara *aktiva* efter att en kurs har skapats.

*Standard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Använd kurskategorier från topp-URL**

I miljöer med flera URL:er, tillåt administratörer och lärare att tilldela kategorier från topp-URL:en till kurser i underordnade URL:er.

*Standard: `false`*

### `allow_course_theme`

**Tillåt kursteman**

Tillåter grafiska teman för kurser och gör det möjligt att ändra den stilmall som används av en kurs till någon av de stilmallar som finns tillgängliga i Chamilo. När en användare går in i kursen har kursens stilmall företräde framför användarens egen stilmall och plattformens standardstilmall.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Åtkomst till publika kurser med villkor**

När detta alternativ är aktiverat, om en kurs har publik synlighet och villkor, inaktiveras dessa villkor så länge kursen är publik.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Blockera autentiserade användares åtkomst till publika kurser**

Visa endast publika kurser. Tillåt inte registrerade användare att komma åt kurser med synligheten "öppen" om de inte är anmälda till var och en av dessa kurser.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Brödsmula på kursens startsida**

Brödsmulan är det horisontella länk-navigeringssystemet, vanligtvis uppe till vänster på sidan. Detta alternativ väljer vad som ska visas i brödsmulan på kursernas startsidor

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Dölj kurslärarinformation på kursens detaljsida**

På kursens detaljsida, dölj lärarinformationen.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Begränsa kursmallar till en kurskategori**

Ange en kategorikod att använda som kursmallar. Endast dessa kurser visas i rullgardinsmenyn vid kurskapande, och användare ser inte kurserna i denna kategori i kurskatalogen.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Extrafält att visa i kursinställningar**

Fälten som definieras i denna array visas på sidan för kursinställningar.

### `course_creation_by_teacher_extra_fields_to_show`

**Extrafält att visa i formuläret för kurskapande**

Fälten som definieras i denna array visas som ytterligare fält i formuläret för kurskapande.

### `course_creation_donate_link`

**Donationslänk på sidan för kurskapande**

Sidan som donationsmeddelandet ska länka till (fullständig URL).

### `course_creation_donate_message_show`

**Visa donationsmeddelande på sidan för kurskapande**

Lägg till en meddelanderuta på sidan för kurskapande för lärare, som ber dem donera till projektet.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Ta bort kurskodfältet från formuläret för kurskapande**

Om den inte anges genereras kurskoden som standard baserat på kurstiteln, så aktivera detta alternativ för att ta bort kodfältet från formuläret för kurskapande helt.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Gör kurskategori obligatorisk**

När en kurs skapas, gör kurskategorin till en obligatorisk inställning.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Extrafält att kräva i formuläret för kurskapande**

Fälten som definieras i denna array blir obligatoriska i formuläret för kurskapande.

### `course_creation_splash_screen`

**Startskärm för kurser**

Visa en startskärm när en ny kurs skapas.

*Standard: `true`*

### `course_creation_use_template`

**Använd mallkurs för nya kurser**

Ange detta för att använda samma mallkurs (identifierad med sitt numeriska kurs-ID i databasen) för alla nya kurser som skapas på plattformen. Observera att om detta inte planeras ordentligt kan inställningen ha en massiv inverkan på diskutrymmet. Mallkursen används som om läraren gjorde en kopia av kursen med verktygen för kursbackup, så inget användarinnehåll kopieras, endast lärarmaterial. Alla övriga regler för kursbackup gäller. Lämna tomt (eller sätt till 0) för att inaktivera.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Förifyll kursfält med fält från användaren**

Om fältet inte är tomt kommer kurskapandeprocessen att söka efter vissa fält i användarprofilen och fylla i dem automatiskt för kursen. Till exempel kan en lärare som är specialiserad på digital marknadsföring automatiskt sätta en flagga för « digital marknadsföring » på varje kurs som hen skapar.

### `course_hide_tools`

**Dölj verktyg för lärare**

Markera de verktyg du vill dölja för lärare. Detta förbjuder åtkomst till verktyget.

### `course_images_in_courses_list`

**Anpassade kursikoner**

Använd kursbilder som kursikon i kurslistor (i stället för den förvalda gröna tavlikonen).

*Standard: `true`*

### `course_log_default_extra_fields`

**Extra användarfält som standard på kursstatistiksidan**

Konfigurera denna array med de interna ID:n för de extrafält du vill visa som standard på den huvudsakliga kursstatistiksidan.

### `course_log_hide_columns`

**Dölj kolumner i kursloggar**

Denna array ger dig möjlighet att konfigurera vilka kolumner som ska döljas på den huvudsakliga kursstatistiksidan och i rapporten för total tid.

### `course_sequence_valid_only_in_same_session`

**Validera förkunskapskrav endast inom samma session**

När detta är aktiverat anses en kurs endast vara validerad om den är godkänd inom den aktuella sessionen. Om det är inaktiverat låser även kurser som godkänts i andra sessioner upp beroende kurser.

*Standard: `false`*


### `course_student_info`

**Visning av kursinformation för studenter**

På sidorna ’Mina kurser’/’Mina sessioner’, visa ytterligare information om studentens poäng, framsteg och/eller certifikatsinhämtning.

### `course_validation`

**Kursvalidering**

När funktionen 'Kursvalidering' är aktiverad kan en lärare inte skapa en kurs på egen hand. Hen fyller i en kursförfrågan. Plattformsadministratören granskar förfrågan och godkänner eller avslår den.<br />Funktionen bygger på automatiska e-postmeddelanden; konfigurera Chamilo så att den kan nå en e-postserver och använda ett dedikerat e-postkonto.

*Standard: `false`*


### `course_validation_terms_and_conditions_url`

**Kursvalidering – en länk till villkoren**

Detta är URL:en till dokumentet 'Villkor' som gäller för att göra en kursförfrågan. Om adressen anges här ska användaren läsa och godkänna dessa villkor innan en kursförfrågan skickas.<br />Om du aktiverar Chamilos modul 'Villkor' och vill att dess URL ska användas, lämna denna inställning tom.

### `courses_default_creation_visibility`

**Standardkursens synlighet**

Standardvärde för kurssynlighet vid skapande av en ny kurs

*Standard: `2`*


### `display_coursecode_in_courselist`

**Visa kod i kursnamn**

Visa kurskod i kurslistor

*Standard: `false`*


### `display_teacher_in_courselist`

**Visa lärare i kursnamn**

Visa lärare i kurslistor

*Standard: `true`*


### `enable_tool_introduction`

**Aktivera verktygsintroduktion**

Aktivera introduktioner på varje verktygs startsida

*Standard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Visa avregistreringsknapp på ’Mina kurser’**

Lägg till en knapp för att avregistrera sig från en kurs på sidan ’Mina kurser’.

*Standard: `false`*

### `example_material_course_creation`

**Exempelmaterial vid kurskapande**

Skapa exempelmaterial automatiskt när en ny kurs skapas

*Standard: `true`*


### `hide_course_rating`

**Dölj kursbetyg**

Funktionen för kursbetyg visas som standard på flera ställen. Om du inte vill ha den, aktivera detta alternativ.

*Standard: `false`*

### `hide_course_sidebar`

**Dölj kursblocket i sidofältet**

På skärmar där vänstermenyn är synlig, visa inte avsnittet « Kurser ».

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Visa markör för delad kurs vid flera URL:er**

Lägger till en länkikon på kurser som delas mellan URL:er, så att användare (särskilt lärare) vet att de måste vara extra försiktiga när de redigerar kursinnehållet.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Visa endast kurser på användarens språk**

Om detta är aktiverat döljer alternativet alla kurser som inte är inställda på användarens språk.

*Standard: `false`*

### `profiling_filter_adding_users`

**Filtrera användare på profilfält vid anmälan till kurs**

Tillåt lärare att filtrera användarna baserat på extrafält på sidan för att anmäla användare till deras kurs.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Visa beroenden i kursintroduktionen**

När resurssekvensering används med kurser eller sessioner, visa kursens beroenden på kursens startsida.

*Standard: `false`*

### `scorm_cumulative_session_time`

**Kumulativ sessionstid för SCORM**

När detta är aktiverat blir sessionstiden för SCORM-inlärningsvägar kumulativ, annars räknas den endast från den senaste uppdateringstidpunkten. Detta är en global inställning. Den används när en ny inlärningsväg skapas men kan därefter omdefinieras för varje enskild.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-postavisering vid kurskapande**

Skicka ett e-postmeddelande till plattformsadministratören varje gång en lärare skapar en ny kurs

*Standard: `false`*


### `show_course_duration`

**Visa kursernas längd**

Visa kursens längd bredvid kurstiteln i kurskatalogen och kurslistan.

*Standard: `false`*

### `show_navigation_menu`

**Visa kursens navigeringsmeny**

Visa en navigeringsmeny som snabbar upp åtkomsten till verktygen

*Standard: `false`*


### `show_toolshortcuts`

**Genvägar till verktyg**

Visa verktygsgenvägarna i bannern?

*Standard: `false`*

### `student_view_enabled`

**Aktivera elevvy**

Aktivera elevvyn, som gör det möjligt för en lärare eller administratör att se en kurs som en elev skulle se den

*Standard: `true`*


### `view_grid_courses`

**Visa kurser i rutnätslayout**

Visa kurser i en layout med flera kurser per rad. Annars visar layouten en kurs per rad.

*Standard: `true`*