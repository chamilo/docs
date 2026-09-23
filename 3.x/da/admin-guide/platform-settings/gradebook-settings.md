# Karakterbog (vurderinger) – indstillinger

Standarder, der anvendes på tværs af værktøjet **Karakterbog (vurderinger)** — visning af score, decimalpræcision, tærskler for certifikatscores og aggregering.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Karakterbog (vurderinger)**. Denne kategori indeholder **34 indstillinger**, der er listet nedenfor med titel og kommentar, som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_gradebook_comments`

**Kommentarer i karakterbogen**

Aktivér kommentarer i karakterbogen, så undervisere kan tilføje en kommentar til den lærendes samlede præstation på dette kursus. Kommentaren vises i PDF-eksporten for den lærende.

*Standard: `false`*


### `allow_gradebook_stats`

**Cache resultater i karakterbogen**

Læg nogle af de store gennemsnitsberegninger i cachede felter for links og evalueringer for at øge hastigheden (betydeligt). Den mulige negative virkning er, at det kan tage noget tid at opdatere karakterbogens resultattabeller.

*Standard: `false`*

### `gradebook_badge_sidebar`

**Sidepanel til karakterbogsbadges**

Generér en blok i sidemenuen, hvor nogle få badges kan vises som afventende godkendelse. Kræver, at karakterbøger er listet her, efter (numerisk) ID.

### `gradebook_default_grade_model_id`

**Standard karaktermodel**

Denne værdi vil være valgt som standard, når et kursus oprettes

### `gradebook_default_weight`

**Standardvægt i karakterbogen**

Denne vægt vil som standard blive brugt på alle kurser

*Standard: `100`*

### `gradebook_dependency`

**Afhængigheder mellem karakterbøger**

Aktiverer en mekanisme for afhængigheder mellem karakterbøger, som lader brugere vide, hvilke andre elementer de først skal gennemgå for at fuldføre karakterbogen.

*Standard: `false`*


### `gradebook_dependency_mandatory_courses`

**Obligatoriske kurser for karakterbogafhængigheder**

Når du bruger afhængigheder mellem karakterbøger, kan du vælge en liste over obligatoriske kurser, der kræves, før en karakterbog med afhængigheder kan godkendes.

### `gradebook_detailed_admin_view`

**Vis ekstra kolonner i karakterbogen**

Vis ekstra kolonner i den studerendes visning af karakterbogen med den bedste score blandt alle studerende, den relative placering af den studerende, der ser rapporten, og gennemsnitsscoren for hele gruppen af studerende.

*Standard: `false`*


### `gradebook_display_extra_stats`

**Ekstra statistik i karakterbogen**

Tilføj ekstra kolonner til karakterbogens hovedrapport (1 = rangering, 2 = bedste score, 3 = gennemsnit).

### `gradebook_enable`

**Aktivering af vurderingsværktøjet**

Vurderingsværktøjet giver dig mulighed for at vurdere kompetencer i din organisation ved at samle evalueringer af klasseundervisning og onlineaktiviteter i præstationsrapporter. Vil du aktivere det?

*Standard: `true`*


### `gradebook_enable_grade_model`

**Aktivér karakterbogsmodel**

Aktiverer automatisk oprettelse af karakterbogskategorier inde i et kursus afhængigt af karakterbogsmodellerne.

*Standard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Aktivér færdigheder pr. underkategori i karakterbogen**

Færdigheder tildeles normalt for at fuldføre en hel karakterbog. Ved at aktivere denne indstilling tillader du, at færdigheder knyttes til underafsnit af karakterbøger.

*Standard: `false`*


### `gradebook_flatview_extrafields_columns`

**Brugerekstrafelter i karakterbogens flade visning**

Tilføj de angivne kolonner ('variables'-array) til hovedresultattabellen i karakterbogen.

### `gradebook_hide_graph`

**Skjul karakterbogsgrafer**

Hvis din portal har begrænsede ressourcer, er det en god mulighed at reducere genereringen af de dynamiske karakterbogsgrafer med potentielt tusindvis af resultater.

*Standard: `false`*


### `gradebook_hide_link_to_item_for_student`

**Skjul elementlinks for lærende i karakterbogen**

Undgå, at lærende klikker på elementer fra karakterbogen, ved at fjerne linksene på elementerne.

*Standard: `false`*


### `gradebook_hide_pdf_report_button`

**Skjul karakterbogsknappen 'download PDF-rapport'**

Fjerner PDF-eksportknappen fra karakterbogsvisninger for lærende.

*Standard: `false`*


### `gradebook_hide_table`

**Skjul karakterbogstabel for lærende**

Reducer indlæsningstiden for karakterbogen ved at skjule resultattabellen (men stadig give adgang til certifikater, færdigheder osv.).

*Standard: `false`*

### `gradebook_locking_enabled`

**Aktivér låsning af vurderinger for undervisere**

Når denne indstilling er aktiveret, kan underviserne på det pågældende kursus låse enhver vurdering. Dette forhindrer til gengæld, at underviseren kan ændre resultater i de ressourcer, der indgår i vurderingen: eksamener, læringsstier, opgaver osv. Den eneste rolle, der har tilladelse til at låse en låst vurdering op, er administratoren. Underviseren vil blive informeret om denne mulighed. Låsning og oplåsning af karakterbøger registreres i systemets rapport over vigtige aktiviteter

*Standard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Tillad flere evalueringsforsøg i karakterbogen**

Gør det muligt at tilføje kommentarer til flere evalueringsforsøg i karakterbogen og resultattabeller.

*Standard: `false`*


### `gradebook_number_decimals`

**Antal decimaler**

Gør det muligt at angive det antal decimaler, der er tilladt i en score

*Standard: `0`*

### `gradebook_pdf_export_settings`

**Indstillinger for PDF-eksport af karakterbog**

Ændr PDF-eksporten for kursister ud fra de angivne indstillinger ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Scorestil i karakterbogsrapporter**

Tilføj konfiguration af scorestil for karakterbogen i den flade visning. Se api.lib.php for at finde indstillingerne: eksempler SCORE_DIV = 1, SCORE_PERCENT = 2, osv.

*Standard: `1`*


### `gradebook_score_display_colorsplit`

**Tærskel**

Tærsklen (i %), under hvilken scorer farves røde

*Standard: `50`*


### `gradebook_score_display_custom`

**Mærkning af kompetenceniveauer**

Markér feltet for at aktivere mærkning af kompetenceniveauer

*Standard: `false`*


### `gradebook_score_display_custom_standalone`

**Tilpasset scorevisning i karakterbogens selvstændige kolonne**

Viser tilpassede kompetenceniveauværdier i en separat kolonne i karakterbogens flade visning, når tilpasset scorevisning anvendes.

*Standard: `false`*


### `gradebook_score_display_upperlimit`

**Vis øvre grænse for score**

Markér feltet for at vise scorens øvre grænse

*Standard: `false`*


### `gradebook_use_apcu_cache`

**Brug APCu-caching til at gøre karakterbogen hurtigere**

Forbedrer hastigheden ved visning af karakterbogsrapporter for kursister ved hjælp af Doctrine APCU-cache. APCu er en valgfri, men anbefalet PHP-udvidelse.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Brug testindstillinger til visning af karakterer**

Anvender visningsindstillinger for øvelsesscore (procent vs. point) på kategoriscorer i karakterbogen.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Brug global indstilling for scorevisning i karakterbogen**

Anvender globale visningsindstillinger for øvelsesscore på beregninger af totalscore i karakterbogen.

*Standard: `false`*


### `hide_gradebook_percentage_user_result`

**Skjul procent i bedste/gennemsnitlige karakterbogsresultater**

Fjerner visning af procent fra bedste/gennemsnitlige scoreresultater, der vises for kursister i karakterbogen.

*Standard: `true`*


### `my_display_coloring`

**Vis farver for scorer i karakterbogen**

Aktiverer farvekodning for bedre synlighed af scorer i karakterbogen.

*Standard: `false`*


### `student_publication_to_take_in_gradebook`

**Opgave, der tælles med i karakterbogen**

I opgaveværktøjet kan kursister uploade mere end én fil. Hvis der er mere end én fil til en enkelt opgave, hvilken skal så tælles med, når de rangeres i karakterbogen? Det afhænger af din metode. Brug 'first' for at lægge vægt på omhu (som at aflevere til tiden og aflevere det rigtige arbejde først). Brug 'last' for at fremhæve samarbejde og tilpasning.

*Standard: `first`*


### `teachers_can_change_grade_model_settings`

**Undervisere kan ændre indstillingerne for karakterbogsmodellen**

Ved redigering af en karakterbog

*Standard: `true`*


### `teachers_can_change_score_settings`

**Undervisere kan ændre indstillingerne for karakterbogsscore**

Ved redigering af karakterbogsindstillingerne

*Standard: `true`*