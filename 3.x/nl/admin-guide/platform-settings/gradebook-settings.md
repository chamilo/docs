# Cijferboek (Beoordelingen) Instellingen

Standaardwaarden die gelden voor de tool **Cijferboek (Beoordelingen)** — weergave van scores, decimale precisie, drempelwaarden voor certificaatscores en aggregatie.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cijferboek (Beoordelingen)**. Deze categorie bevat **34 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_gradebook_comments`

**Cijferboekcommentaar**

Schakel cijferboekcommentaar in zodat docenten een opmerking kunnen toevoegen bij de algehele prestatie van de lerende in deze cursus. De opmerking verschijnt in de PDF-export voor de lerende.

*Standaard: `false`*


### `allow_gradebook_stats`

**Resultaten in het cijferboek cachen**

Plaats een deel van de grote gemiddeldeberekeningen in gecachte velden voor de koppelingen en evaluaties om de snelheid (aanzienlijk) te verhogen. Het mogelijke nadeel is dat het enige tijd kan duren om de resultaatentabellen van het cijferboek te vernieuwen.

*Standaard: `false`*

### `gradebook_badge_sidebar`

**Zijbalk cijferboekbadges**

Genereer een blok in het zijmenu waarin enkele badges als in afwachting van goedkeuring kunnen worden getoond. Vereist dat cijferboeken hier worden vermeld, op (numerieke) ID.

### `gradebook_default_grade_model_id`

**Standaard cijfermodel**

Deze waarde wordt standaard geselecteerd bij het aanmaken van een cursus

### `gradebook_default_weight`

**Standaardgewicht in Cijferboek**

Dit gewicht wordt standaard in alle cursussen gebruikt

*Standaard: `100`*

### `gradebook_dependency`

**Afhankelijkheden tussen cijferboeken**

Schakelt een mechanisme van cijferboekafhankelijkheden in waardoor gebruikers weten welke andere items ze eerst moeten doorlopen om het cijferboek te voltooien.

*Standaard: `false`*


### `gradebook_dependency_mandatory_courses`

**Verplichte cursussen voor cijferboekafhankelijkheden**

Bij gebruik van afhankelijkheden tussen cijferboeken kunt u een lijst van verplichte cursussen kiezen die vereist zijn voordat een cijferboek met afhankelijkheden kan worden goedgekeurd.

### `gradebook_detailed_admin_view`

**Extra kolommen in het cijferboek tonen**

Toon extra kolommen in de studentweergave van het cijferboek met de beste score van alle studenten, de relatieve positie van de student die het rapport bekijkt en de gemiddelde score van de hele groep studenten.

*Standaard: `false`*


### `gradebook_display_extra_stats`

**Extra statistieken cijferboek**

Voeg extra kolommen toe aan het hoofdrapport van het cijferboek (1 = rangschikking, 2 = beste score, 3 = gemiddelde).

### `gradebook_enable`

**Activering van de tool Beoordelingen**

De tool Beoordelingen stelt u in staat competenties in uw organisatie te beoordelen door evaluaties van klassikale en online activiteiten samen te voegen in prestatierapporten. Wilt u deze activeren?

*Standaard: `true`*


### `gradebook_enable_grade_model`

**Cijferboekmodel inschakelen**

Schakelt het automatisch aanmaken van cijferboekcategorieën in een cursus in, afhankelijk van de cijferboekmodellen.

*Standaard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Vaardigheden per subcategorie van het cijferboek inschakelen**

Vaardigheden worden normaal toegekend voor het voltooien van een volledig cijferboek. Door deze optie in te schakelen, kunt u vaardigheden koppelen aan subsecties van cijferboeken.

*Standaard: `false`*


### `gradebook_flatview_extrafields_columns`

**Extra gebruikersvelden in de platte weergave van het cijferboek**

Voeg de opgegeven kolommen (array 'variables') toe aan de hoofdresultatentabel in het cijferboek.

### `gradebook_hide_graph`

**Cijferboekgrafieken verbergen**

Als uw portal beperkt is in resources, is het verminderen van het genereren van dynamische cijferboekgrafieken met mogelijk duizenden resultaten een goede optie.

*Standaard: `false`*


### `gradebook_hide_link_to_item_for_student`

**Itemkoppelingen voor lerenden in het cijferboek verbergen**

Voorkom dat lerenden op items in het cijferboek klikken door de koppelingen op de items te verwijderen.

*Standaard: `false`*


### `gradebook_hide_pdf_report_button`

**Cijferboekknop 'PDF-rapport downloaden' verbergen**

Verwijdert de PDF-exportknop uit cijferboekweergaven voor lerenden.

*Standaard: `false`*


### `gradebook_hide_table`

**Cijferboektabel voor lerenden verbergen**

Verkort de laadtijd van het cijferboek door de resultaatentabel te verbergen (maar nog steeds toegang te geven tot certificaten, vaardigheden, enz.).

*Standaard: `false`*

### `gradebook_locking_enabled`

**Vergrendelen van beoordelingen door docenten inschakelen**

Eenmaal ingeschakeld, maakt deze optie het mogelijk dat docenten van de betreffende cursus elke beoordeling vergrendelen. Dit voorkomt op zijn beurt dat de docent resultaten wijzigt in de bronnen die in de beoordeling worden gebruikt: examens, leerpaden, taken, enz. De enige rol die gemachtigd is om een vergrendelde beoordeling te ontgrendelen, is de beheerder. De docent wordt van deze mogelijkheid op de hoogte gebracht. Het vergrendelen en ontgrendelen van cijferlijsten wordt vastgelegd in het systeemrapport van belangrijke activiteiten

*Standaard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Meerdere evaluatiepogingen in de cijferlijst toestaan**

Maakt het mogelijk opmerkingen toe te voegen bij meerdere evaluatiepogingen in de cijferlijst en resultaatoverzichten.

*Standaard: `false`*


### `gradebook_number_decimals`

**Aantal decimalen**

Hiermee kunt u het aantal decimalen instellen dat in een score is toegestaan

*Standaard: `0`*

### `gradebook_pdf_export_settings`

**PDF-exportopties voor de cijferlijst**

Wijzig de PDF-export voor deelnemers op basis van de opgegeven instellingen ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Scorestijl in cijferlijstrapporten**

Voeg configuratie van de scorestijl van de cijferlijst toe in de platte weergave. Zie api.lib.php om de opties te vinden: voorbeelden SCORE_DIV = 1, SCORE_PERCENT = 2, enz.

*Standaard: `1`*


### `gradebook_score_display_colorsplit`

**Drempel**

De drempel (in %) waaronder scores rood worden gekleurd

*Standaard: `50`*


### `gradebook_score_display_custom`

**Labeling van competentieniveaus**

Vink het vakje aan om labeling van competentieniveaus in te schakelen

*Standaard: `false`*


### `gradebook_score_display_custom_standalone`

**Aangepaste scoreweergave in de zelfstandige kolom van de cijferlijst**

Toont aangepaste waarden van competentieniveaus in een aparte kolom in de platte weergave van de cijferlijst wanneer aangepaste scoreweergave wordt gebruikt.

*Standaard: `false`*


### `gradebook_score_display_upperlimit`

**Bovengrens van de score weergeven**

Vink het vakje aan om de bovengrens van de score te tonen

*Standaard: `false`*


### `gradebook_use_apcu_cache`

**APCu-caching gebruiken om de cijferlijst te versnellen**

Verbeter de snelheid bij het weergeven van cijferlijstrapporten voor studenten met Doctrine APCU-cache. APCu is een optionele maar aanbevolen PHP-extensie.

*Standaard: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Toetsinstellingen gebruiken voor de weergave van cijfers**

Past de weergave-instellingen van oefenscores (percentage vs. punten) toe op categoriescores in de cijferlijst.

*Standaard: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Globale scoreweergave-instelling gebruiken in de cijferlijst**

Past de globale weergave-instellingen van oefenscores toe op de berekening van de totaalscore in de cijferlijst.

*Standaard: `false`*


### `hide_gradebook_percentage_user_result`

**Percentage verbergen in beste/gemiddelde cijferlijstresultaten**

Verwijdert de weergave van percentages bij de beste/gemiddelde scoreresultaten die aan deelnemers in de cijferlijst worden getoond.

*Standaard: `true`*


### `my_display_coloring`

**Kleuren weergeven voor scores in de cijferlijst**

Schakelt kleurcodering in voor betere zichtbaarheid van scores in de cijferlijst.

*Standaard: `false`*


### `student_publication_to_take_in_gradebook`

**Opdracht die voor de cijferlijst in aanmerking wordt genomen**

In de opdrachten-tool kunnen studenten meer dan één bestand uploaden. Als er meer dan één bestand is voor één opdracht, welk bestand moet dan worden meegenomen bij de rangschikking in de cijferlijst? Dit hangt af van uw methodiek. Gebruik 'first' om de nadruk te leggen op aandacht voor detail (zoals op tijd inleveren en eerst het juiste werk inleveren). Gebruik 'last' om collaboratief en adaptief werk te benadrukken.

*Standaard: `first`*


### `teachers_can_change_grade_model_settings`

**Docenten kunnen de instellingen van het cijferlijstmodel wijzigen**

Bij het bewerken van een cijferlijst

*Standaard: `true`*


### `teachers_can_change_score_settings`

**Docenten kunnen de score-instellingen van de cijferlijst wijzigen**

Bij het bewerken van de cijferlijstinstellingen

*Standaard: `true`*