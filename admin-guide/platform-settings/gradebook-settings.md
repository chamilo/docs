# Cijferboek (Beoordelingen) Instellingen

Standaardinstellingen die van toepassing zijn op de **Cijferboek (Beoordelingen)** tool — weergave van scores, decimale precisie, drempelwaarden voor certificaten en aggregatie.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Cijferboek (Beoordelingen)**. Deze categorie bevat **34 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_gradebook_comments`

**Cijferboek opmerkingen**

Schakel opmerkingen in het cijferboek in zodat docenten een opmerking kunnen toevoegen over de algemene prestaties van de leerling in deze cursus. De opmerking verschijnt in de PDF-export voor de leerling.

*Standaard: `false`*

### `allow_gradebook_stats`

**Resultaten in het cijferboek cachen**

Plaats sommige grote berekeningen van gemiddelden in gecachte velden voor de koppelingen en evaluaties om de snelheid aanzienlijk te verhogen. Het mogelijke nadeel is dat het enige tijd kan duren voordat de resultatentabellen van het cijferboek worden vernieuwd.

*Standaard: `false`*

### `gradebook_badge_sidebar`

**Cijferboek badges zijbalk**

Genereer een blok in het zijmenu waarin enkele badges als wachtend op goedkeuring kunnen worden weergegeven. Vereist dat cijferboeken hier worden vermeld, op basis van (numeriek) ID.

### `gradebook_default_grade_model_id`

**Standaard cijfermodel**

Deze waarde wordt standaard geselecteerd bij het aanmaken van een cursus.

### `gradebook_default_weight`

**Standaard gewicht in Cijferboek**

Dit gewicht wordt standaard in alle cursussen gebruikt.

*Standaard: `100`*

### `gradebook_dependency`

**Afhankelijkheden tussen cijferboeken**

Schakelt een mechanisme van cijferboekafhankelijkheden in dat mensen laat weten welke andere items ze eerst moeten doorlopen om het cijferboek te voltooien.

*Standaard: `false`*

### `gradebook_dependency_mandatory_courses`

**Verplichte cursussen voor cijferboekafhankelijkheden**

Bij het gebruik van afhankelijkheden tussen cijferboeken kunt u een lijst met verplichte cursussen kiezen die vereist zijn voordat een cijferboek met afhankelijkheden wordt goedgekeurd.

### `gradebook_detailed_admin_view`

**Toon extra kolommen in cijferboek**

Toon extra kolommen in de studentenweergave van het cijferboek met de beste score van alle studenten, de relatieve positie van de student die het rapport bekijkt en de gemiddelde score van de hele groep studenten.

*Standaard: `false`*

### `gradebook_display_extra_stats`

**Extra statistieken in cijferboek**

Voeg extra kolommen toe aan het hoofdrapport van het cijferboek (1 = rangschikking, 2 = beste score, 3 = gemiddelde).

### `gradebook_enable`

**Activering van de Beoordelingstool**

De Beoordelingstool stelt u in staat om competenties in uw organisatie te beoordelen door klassikale en online activiteitenevaluaties samen te voegen in Prestatieverslagen. Wilt u deze activeren?

*Standaard: `true`*

### `gradebook_enable_grade_model`

**Cijferboekmodel inschakelen**

Schakelt de automatische creatie van cijferboekcategorieën binnen een cursus in, afhankelijk van de cijferboekmodellen.

*Standaard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Vaardigheden per subcategorie van cijferboek inschakelen**

Vaardigheden worden normaal gesproken toegekend voor het voltooien van een volledig cijferboek. Door deze optie in te schakelen, kunt u vaardigheden koppelen aan subsecties van cijferboeken.

*Standaard: `false`*

### `gradebook_flatview_extrafields_columns`

**Extra velden van gebruikers in platte weergave van cijferboek**

Voeg de opgegeven kolommen ('variables' array) toe aan de hoofdresultatentabel in het cijferboek.

### `gradebook_hide_graph`

**Cijferboekgrafieken verbergen**

Als uw portaal beperkte middelen heeft, is het verminderen van de generatie van dynamische cijferboekgrafieken met mogelijk duizenden resultaten een goede optie.

*Standaard: `false`*

### `gradebook_hide_link_to_item_for_student`

**Itemkoppelingen verbergen voor leerlingen in cijferboek**

Voorkom dat leerlingen op items in het cijferboek klikken door de koppelingen op de items te verwijderen.

*Standaard: `false`*

### `gradebook_hide_pdf_report_button`

**Knop 'PDF-rapport downloaden' in cijferboek verbergen**

Verwijdert de PDF-exportknop uit de cijferboekweergaven voor leerlingen.

*Standaard: `false`*

### `gradebook_hide_table`

**Cijferboektabel verbergen voor leerlingen**

Verminder de laadtijd van het cijferboek door de resultatentabel te verbergen (maar nog steeds toegang te geven tot certificaten, vaardigheden, enz.).

*Standaard: `false`*

---
### `gradebook_locking_enabled`

**Vergrendeling van beoordelingen door docenten inschakelen**

Eenmaal ingeschakeld, maakt deze optie het mogelijk voor docenten van de betreffende cursus om beoordelingen te vergrendelen. Dit voorkomt vervolgens elke wijziging van resultaten door de docent binnen de bronnen die in de beoordeling worden gebruikt: examens, leerpaden, taken, enz. De enige rol die bevoegd is om een vergrendelde beoordeling te ontgrendelen, is de beheerder. De docent wordt op de hoogte gesteld van deze mogelijkheid. Het vergrendelen en ontgrendelen van cijferboeken wordt geregistreerd in het rapport van belangrijke activiteiten van het systeem.

*Standaard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Meerdere beoordelingspogingen in cijferboek toestaan**

Maakt het mogelijk om opmerkingen toe te voegen aan meerdere beoordelingspogingen in het cijferboek en resultatentabellen.

*Standaard: `false`*

### `gradebook_number_decimals`

**Aantal decimalen**

Hiermee kunt u het aantal toegestane decimalen in een score instellen.

*Standaard: `0`*

### `gradebook_pdf_export_settings`

**Opties voor PDF-export van cijferboek**

Wijzig de PDF-export voor leerlingen op basis van de opgegeven instellingen ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Scorestijl voor cijferboekrapporten**

Voeg configuratie voor de scorestijl van het cijferboek toe in de platte weergave. Zie api.lib.php voor de opties: voorbeelden SCORE_DIV = 1, SCORE_PERCENT = 2, enz.

*Standaard: `1`*

### `gradebook_score_display_colorsplit`

**Drempelwaarde**

De drempelwaarde (in %) waaronder scores rood worden gekleurd.

*Standaard: `50`*

### `gradebook_score_display_custom`

**Labeling van competentieniveaus**

Vink het vakje aan om labeling van competentieniveaus in te schakelen.

*Standaard: `false`*

### `gradebook_score_display_custom_standalone`

**Aangepaste weergave van scores in een afzonderlijke kolom van het cijferboek**

Toont aangepaste competentieniveauwaarden in een aparte kolom in de platte weergave van het cijferboek bij gebruik van aangepaste scoreweergave.

*Standaard: `false`*

### `gradebook_score_display_upperlimit`

**Bovengrens van score weergeven**

Vink het vakje aan om de bovengrens van de score weer te geven.

*Standaard: `false`*

### `gradebook_use_apcu_cache`

**APCu-caching gebruiken om cijferboek te versnellen**

Verbeter de snelheid bij het genereren van cijferboekrapporten voor studenten met behulp van Doctrine APCU-cache. APCu is een optionele maar aanbevolen PHP-extensie.

*Standaard: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Testinstellingen gebruiken voor weergave van cijfers**

Past de weergave-instellingen voor oefenscores (percentage versus punten) toe op categorieresultaten in het cijferboek.

*Standaard: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Globale instelling voor scoreweergave gebruiken in cijferboek**

Past globale weergave-instellingen voor oefenscores toe op de berekening van de totaalscore in het cijferboek.

*Standaard: `false`*

### `hide_gradebook_percentage_user_result`

**Percentage verbergen in beste/gemiddelde cijferboekresultaten**

Verwijdert de weergave van percentages uit de beste/gemiddelde scoreresultaten die aan leerlingen worden getoond in het cijferboek.

*Standaard: `true`*

### `my_display_coloring`

**Kleuren weergeven voor scores in het cijferboek**

Schakelt kleurcodering in voor betere zichtbaarheid van scores in het cijferboek.

*Standaard: `false`*

### `student_publication_to_take_in_gradebook`

**Opdracht die in het cijferboek wordt meegenomen**

In de opdrachtentool kunnen studenten meer dan één bestand uploaden. Als er meer dan één bestand is voor een enkele opdracht, welke moet dan worden meegenomen bij het rangschikken in het cijferboek? Dit hangt af van uw methodologie. Gebruik 'first' om de nadruk te leggen op aandacht voor detail (zoals op tijd inleveren en eerst het juiste werk inleveren). Gebruik 'last' om collaboratief en adaptief werk te benadrukken.

*Standaard: `first`*

### `teachers_can_change_grade_model_settings`

**Docenten kunnen de instellingen van het cijferboekmodel wijzigen**

Bij het bewerken van een cijferboek.

*Standaard: `true`*

### `teachers_can_change_score_settings`

**Docenten kunnen de score-instellingen van het cijferboek wijzigen**

Bij het bewerken van de cijferboekinstellingen.

*Standaard: `true`*