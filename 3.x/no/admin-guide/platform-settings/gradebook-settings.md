# Karakterbok (vurderinger) – innstillinger

Standardverdier som gjelder for verktøyet **Karakterbok (vurderinger)** — visning av poeng, desimalpresisjon, poengterskler for sertifikater og aggregering.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Karakterbok (vurderinger)**. Denne kategorien inneholder **34 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_gradebook_comments`

**Kommentarer i karakterbok**

Aktiver kommentarer i karakterboken slik at lærere kan legge til en kommentar til den samlede prestasjonen til eleven i dette kurset. Kommentaren vises i PDF-eksporten for eleven.

*Standard: `false`*


### `allow_gradebook_stats`

**Bufre resultater i karakterboken**

Legg noen av de store gjennomsnittsberegningene i bufrede felt for lenker og evalueringer for å øke hastigheten (betydelig). Den potensielle negative virkningen er at det kan ta noe tid å oppdatere resultattabellene i karakterboken.

*Standard: `false`*

### `gradebook_badge_sidebar`

**Sidepanel for merker i karakterbok**

Generer en blokk i sidemenyen der noen merker kan vises som venter på godkjenning. Krever at karakterbøker listes her, etter (numerisk) ID.

### `gradebook_default_grade_model_id`

**Standard karaktermodell**

Denne verdien velges som standard når et kurs opprettes

### `gradebook_default_weight`

**Standard vekt i karakterbok**

Denne vekten brukes som standard i alle kurs

*Standard: `100`*

### `gradebook_dependency`

**Avhengigheter mellom karakterbøker**

Aktiverer en mekanisme for avhengigheter mellom karakterbøker som lar folk vite hvilke andre elementer de må gjennom først for å fullføre karakterboken.

*Standard: `false`*


### `gradebook_dependency_mandatory_courses`

**Obligatoriske kurs for avhengigheter mellom karakterbøker**

Når du bruker avhengigheter mellom karakterbøker, kan du velge en liste over obligatoriske kurs som kreves før du godkjenner en karakterbok som har avhengigheter.

### `gradebook_detailed_admin_view`

**Vis tilleggs kolonner i karakterboken**

Vis tilleggs kolonner i elevvisningen av karakterboken med beste poengsum blant alle elever, den relative posisjonen til eleven som ser på rapporten, og gjennomsnittlig poengsum for hele elevgruppen.

*Standard: `false`*


### `gradebook_display_extra_stats`

**Ekstra statistikk i karakterbok**

Legg til tilleggs kolonner i karakterbokens hovedrapport (1 = rangering, 2 = beste poengsum, 3 = gjennomsnitt).

### `gradebook_enable`

**Aktivering av vurderingsverktøyet**

Vurderingsverktøyet lar deg vurdere kompetanser i organisasjonen ved å slå sammen evalueringer av klasseroms- og nettaktiviteter i prestasjonsrapporter. Vil du aktivere det?

*Standard: `true`*


### `gradebook_enable_grade_model`

**Aktiver karaktermodell**

Aktiverer automatisk oppretting av karakterbok-kategorier inne i et kurs avhengig av karaktermodellene.

*Standard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Aktiver ferdigheter per underkategori i karakterboken**

Ferdigheter tildeles vanligvis for å fullføre en hel karakterbok. Ved å aktivere dette valget kan ferdigheter knyttes til underseksjoner av karakterbøker.

*Standard: `false`*


### `gradebook_flatview_extrafields_columns`

**Ekstra brukerfelt i flat visning av karakterbok**

Legg til de angitte kolonnene ('variables'-tabellen) i hovedresultattabellen i karakterboken.

### `gradebook_hide_graph`

**Skjul diagrammer i karakterbok**

Hvis portalen din har begrensede ressurser, er det et godt valg å redusere genereringen av dynamiske karakterbokdiagrammer med potensielt tusenvis av resultater.

*Standard: `false`*


### `gradebook_hide_link_to_item_for_student`

**Skjul elementlenker for elever i karakterboken**

Unngå at elever klikker på elementer fra karakterboken ved å fjerne lenkene på elementene.

*Standard: `false`*


### `gradebook_hide_pdf_report_button`

**Skjul knappen «last ned PDF-rapport» i karakterboken**

Fjerner PDF-eksportknappen fra karakterbokvisninger for elever.

*Standard: `false`*


### `gradebook_hide_table`

**Skjul karakterboktabell for elever**

Reduser lastetiden for karakterboken ved å skjule resultattabellen (men fortsatt gi tilgang til sertifikater, ferdigheter osv.).

*Standard: `false`*

### `gradebook_locking_enabled`

**Aktiver låsing av vurderinger for lærere**

Når denne er aktivert, kan lærerne i det aktuelle kurset låse enhver vurdering. Dette vil i sin tur hindre at læreren kan endre resultater i ressursene som inngår i vurderingen: eksamener, læringsstier, oppgaver osv. Den eneste rollen som har tillatelse til å låse opp en låst vurdering, er administratoren. Læreren vil bli informert om denne muligheten. Låsing og opplåsing av karakterbøker registreres i systemets rapport over viktige aktiviteter

*Standard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Tillat flere vurderingsforsøk i karakterboken**

Tillater å legge til kommentarer til flere vurderingsforsøk i karakterboken og resultattabeller.

*Standard: `false`*


### `gradebook_number_decimals`

**Antall desimaler**

Lar deg angi hvor mange desimaler som er tillatt i en poengsum

*Standard: `0`*

### `gradebook_pdf_export_settings`

**PDF-eksportvalg for karakterbok**

Endre PDF-eksporten for lærende basert på de angitte innstillingene ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Poengstil i karakterbokrapporter**

Legg til konfigurasjon av poengstil for karakterbok i flat visning. Se api.lib.php for å finne alternativene: eksempler SCORE_DIV = 1, SCORE_PERCENT = 2, osv.

*Standard: `1`*


### `gradebook_score_display_colorsplit`

**Terskel**

Terskelen (i %) under hvilken poengsummer farges røde

*Standard: `50`*


### `gradebook_score_display_custom`

**Merking av kompetansenivåer**

Kryss av i boksen for å aktivere merking av kompetansenivåer

*Standard: `false`*


### `gradebook_score_display_custom_standalone`

**Tilpasset poengvisning i karakterbokens frittstående kolonne**

Viser tilpassede kompetansenivåverdier i en egen kolonne i karakterbokens flatvisning når tilpasset poengvisning brukes.

*Standard: `false`*


### `gradebook_score_display_upperlimit`

**Vis øvre grense for poengsum**

Kryss av i boksen for å vise poengsummens øvre grense

*Standard: `false`*


### `gradebook_use_apcu_cache`

**Bruk APCu-hurtigbuffer for å øke hastigheten på karakterboken**

Forbedrer hastigheten ved visning av studentrapporter i karakterboken ved bruk av Doctrine APCU-hurtigbuffer. APCu er en valgfri, men anbefalt PHP-utvidelse.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Bruk testinnstillinger for visning av karakterer**

Anvender visningsinnstillinger for øvelsespoeng (prosent mot poeng) på kategoripoeng i karakterboken.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Bruk global innstilling for poengvisning i karakterboken**

Anvender globale visningsinnstillinger for øvelsespoeng på beregning av totalpoeng i karakterboken.

*Standard: `false`*


### `hide_gradebook_percentage_user_result`

**Skjul prosent i beste/gjennomsnittlige karakterbokresultater**

Fjerner prosentvisning fra beste/gjennomsnittlige poengresultater som vises til lærende i karakterboken.

*Standard: `true`*


### `my_display_coloring`

**Vis farger for poengsummer i karakterboken**

Aktiverer fargekoding for bedre synlighet av poengsummer i karakterboken.

*Standard: `false`*


### `student_publication_to_take_in_gradebook`

**Oppgave som tas med i karakterboken**

I oppgaveverktøyet kan studenter laste opp mer enn én fil. Dersom det er mer enn én fil for én enkelt oppgave, hvilken skal tas med ved rangering i karakterboken? Dette avhenger av metodikken din. Bruk 'first' for å vektlegge nøyaktighet (som å levere i tide og levere riktig arbeid først). Bruk 'last' for å fremheve samarbeid og tilpasningsdyktig arbeid.

*Standard: `first`*


### `teachers_can_change_grade_model_settings`

**Lærere kan endre innstillingene for karakterbokmodell**

Ved redigering av en karakterbok

*Standard: `true`*


### `teachers_can_change_score_settings`

**Lærere kan endre poenginnstillingene for karakterboken**

Ved redigering av karakterbokinnstillingene

*Standard: `true`*