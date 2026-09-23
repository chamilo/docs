# Betygsbok (bedömningar) – inställningar

Standardvärden som tillämpas i hela verktyget **Betygsbok (bedömningar)** — visning av poäng, decimalprecision, poängtrösklar för intyg och aggregering.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Betygsbok (bedömningar)**. Denna kategori innehåller **34 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_gradebook_comments`

**Kommentarer i betygsboken**

Aktivera kommentarer i betygsboken så att lärare kan lägga till en kommentar till lärandets övergripande prestation i den här kursen. Kommentaren visas i PDF-exporten för läranden.

*Standard: `false`*


### `allow_gradebook_stats`

**Cachelagra resultat i betygsboken**

Lägg en del av de stora beräkningarna av medelvärden i cachelagrade fält för länkar och utvärderingar för att öka hastigheten (avsevärt). Den potentiella negativa effekten är att det kan ta tid att uppdatera betygsbokens resultattabeller.

*Standard: `false`*

### `gradebook_badge_sidebar`

**Sidopanel för märken i betygsboken**

Generera ett block i sidomenyn där några märken kan visas som väntar på godkännande. Kräver att betygsböcker listas här, med (numeriskt) ID.

### `gradebook_default_grade_model_id`

**Standardbetygsmodell**

Detta värde väljs som standard när en kurs skapas

### `gradebook_default_weight`

**Standardvikt i betygsboken**

Denna vikt används som standard i alla kurser

*Standard: `100`*

### `gradebook_dependency`

**Beroenden mellan betygsböcker**

Aktiverar en mekanism för beroenden mellan betygsböcker som låter användare veta vilka andra objekt de först måste gå igenom för att slutföra betygsboken.

*Standard: `false`*


### `gradebook_dependency_mandatory_courses`

**Obligatoriska kurser för beroenden mellan betygsböcker**

När beroenden mellan betygsböcker används kan du välja en lista med obligatoriska kurser som krävs innan någon betygsbok med beroenden kan godkännas.

### `gradebook_detailed_admin_view`

**Visa extra kolumner i betygsboken**

Visa extra kolumner i studentvyn av betygsboken med bästa poäng bland alla studenter, den relativa positionen för den student som tittar på rapporten och medelpoängen för hela studentgruppen.

*Standard: `false`*


### `gradebook_display_extra_stats`

**Extra statistik i betygsboken**

Lägg till extra kolumner i betygsbokens huvudrapport (1 = ranking, 2 = bästa poäng, 3 = medelvärde).

### `gradebook_enable`

**Aktivering av verktyget Bedömningar**

Verktyget Bedömningar gör det möjligt att bedöma kompetenser i din organisation genom att slå samman utvärderingar av klassrums- och onlineaktiviteter till prestationsrapporter. Vill du aktivera det?

*Standard: `true`*


### `gradebook_enable_grade_model`

**Aktivera betygsboksmodell**

Aktiverar automatisk skapande av betygsbokskategorier i en kurs beroende på betygsboksmodellerna.

*Standard: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Aktivera färdigheter per underkategori i betygsboken**

Färdigheter tilldelas normalt för att slutföra en hel betygsbok. Genom att aktivera det här alternativet kan färdigheter knytas till underavsnitt av betygsböcker.

*Standard: `false`*


### `gradebook_flatview_extrafields_columns`

**Användarens extrafält i betygsbokens platta vy**

Lägg till de angivna kolumnerna (arrayen 'variables') i huvudresultattabellen i betygsboken.

### `gradebook_hide_graph`

**Dölj diagram i betygsboken**

Om din portal har begränsade resurser är det ett bra alternativ att minska genereringen av dynamiska betygsboksdiagram med potentiellt tusentals resultat.

*Standard: `false`*


### `gradebook_hide_link_to_item_for_student`

**Dölj objektlänkar för lärande i betygsboken**

Förhindra att lärande klickar på objekt från betygsboken genom att ta bort länkarna på objekten.

*Standard: `false`*


### `gradebook_hide_pdf_report_button`

**Dölj knappen 'ladda ner PDF-rapport' i betygsboken**

Tar bort PDF-exportknappen från betygsboksvisningar för lärande.

*Standard: `false`*


### `gradebook_hide_table`

**Dölj betygsbokstabellen för lärande**

Minska laddningstiden för betygsboken genom att dölja resultattabellen (men fortfarande ge åtkomst till intyg, färdigheter osv.).

*Standard: `false`*

### `gradebook_locking_enabled`

**Aktivera låsning av bedömningar av lärare**

När detta alternativ är aktiverat kan lärarna i den aktuella kursen låsa vilken bedömning som helst. Detta förhindrar i sin tur att läraren ändrar resultat i de resurser som används i bedömningen: tentor, lärstigar, uppgifter osv. Den enda roll som har behörighet att låsa upp en låst bedömning är administratören. Läraren informeras om denna möjlighet. Låsning och upplåsning av betygsböcker registreras i systemets rapport över viktiga aktiviteter

*Standard: `false`*

### `gradebook_multiple_evaluation_attempts`

**Tillåt flera bedömningsförsök i betygsboken**

Gör det möjligt att lägga till kommentarer till flera bedömningsförsök i betygsboken och resultattabeller.

*Standard: `false`*


### `gradebook_number_decimals`

**Antal decimaler**

Gör det möjligt att ange hur många decimaler som tillåts i ett poängvärde

*Standard: `0`*

### `gradebook_pdf_export_settings`

**Alternativ för PDF-export av betygsboken**

Ändra PDF-exporten för deltagare utifrån de angivna inställningarna ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Poängstil i betygsboksrapporter**

Lägg till konfiguration av poängstil för betygsboken i den platta vyn. Se api.lib.php för att hitta alternativen: exempel SCORE_DIV = 1, SCORE_PERCENT = 2, osv.

*Standard: `1`*


### `gradebook_score_display_colorsplit`

**Tröskelvärde**

Tröskelvärdet (i %) under vilket poäng färgas röda

*Standard: `50`*


### `gradebook_score_display_custom`

**Märkning av kompetensnivåer**

Markera rutan för att aktivera märkning av kompetensnivåer

*Standard: `false`*


### `gradebook_score_display_custom_standalone`

**Anpassad poängvisning i betygsbokens fristående kolumn**

Visar anpassade kompetensnivåvärden i en separat kolumn i betygsbokens platta vy när anpassad poängvisning används.

*Standard: `false`*


### `gradebook_score_display_upperlimit`

**Visa övre poänggräns**

Markera rutan för att visa poängens övre gräns

*Standard: `false`*


### `gradebook_use_apcu_cache`

**Använd APCu-cache för att snabba upp betygsboken**

Förbättrar hastigheten vid visning av deltagarrapporter i betygsboken med Doctrine APCU-cache. APCu är ett valfritt men rekommenderat PHP-tillägg.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Använd testinställningar för visning av betyg**

Tillämpar visningsinställningar för övningspoäng (procent mot poäng) på kategoripoäng i betygsboken.

*Standard: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Använd global inställning för poängvisning i betygsboken**

Tillämpar globala visningsinställningar för övningspoäng på beräkningar av totalpoäng i betygsboken.

*Standard: `false`*


### `hide_gradebook_percentage_user_result`

**Dölj procent i bästa/genomsnittliga resultat i betygsboken**

Tar bort procentvisning från bästa/genomsnittliga poängresultat som visas för deltagare i betygsboken.

*Standard: `true`*


### `my_display_coloring`

**Visa färger för poäng i betygsboken**

Aktiverar färgkodning för bättre synlighet av poäng i betygsboken.

*Standard: `false`*


### `student_publication_to_take_in_gradebook`

**Uppgift som räknas i betygsboken**

I verktyget för uppgifter kan deltagare ladda upp mer än en fil. Om det finns mer än en fil för en och samma uppgift, vilken ska då räknas vid rangordning i betygsboken? Detta beror på er metodik. Använd 'first' för att betona noggrannhet (t.ex. att lämna in i tid och lämna in rätt arbete först). Använd 'last' för att lyfta fram samarbete och anpassningsbart arbete.

*Standard: `first`*


### `teachers_can_change_grade_model_settings`

**Lärare kan ändra inställningarna för betygsboksmodellen**

När en betygsbok redigeras

*Standard: `true`*


### `teachers_can_change_score_settings`

**Lärare kan ändra poänginställningarna för betygsboken**

När inställningarna för betygsboken redigeras

*Standard: `true`*