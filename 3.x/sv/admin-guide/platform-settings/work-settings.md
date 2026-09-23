# Inställningar för uppgifter (Work)

Standardvärden och beteende för verktyget **Uppgifter (Student Publications)**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Uppgifter (Work)**. Denna kategori innehåller **12 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_compilatio_tool`

**Aktivera Compilatio**

Compilatio är en tjänst mot fusk som jämför text mellan två inlämningar och rapporterar om det finns hög sannolikhet att innehållet (vanligtvis uppgifter) inte är äkta.

*Standard: `false`*

### `allow_my_student_publication_page`

**Aktivera sidan Mina uppgifter**

[inferred] Aktivera en dedikerad sida där deltagare kan visa och hantera sina egna inlämnade uppgifter.

*Standard: `false`*

### `allow_only_one_student_publication_per_user`

**Deltagare kan bara ladda upp en uppgift**

[inferred] Begränsa deltagare till att lämna in endast en uppgift per aktivitet, vilket förhindrar flera inlämningar.

*Standard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Omdirigera till uppgiftsverktygets startsida efter uppladdning eller kommentar**

Omdirigera till uppgiftslistan efter uppladdning av en uppgift eller tillägg av en kommentar

*Standard: `false`*

### `assignment_prevent_duplicate_upload`

**Förhindra duplicerade uppladdningar i uppgifter**

[inferred] Blockera deltagare från att ladda upp identiska filer för samma uppgiftsinlämning.

*Standard: `false`*

### `block_student_publication_add_documents`

**Förhindra tillägg av dokument till uppgifter**

[inferred] Förhindra att deltagare lägger till eller bifogar dokument när de lämnar in uppgifter.

*Standard: `false`*

### `block_student_publication_edition`

**Förhindra redigering av uppgifter**

[inferred] Förhindra att deltagare ändrar eller uppdaterar sina inlämnade uppgifter efter den första inlämningen.

*Standard: `false`*

### `block_student_publication_score_edition`

**Förhindra att lärare ändrar uppgiftsbetyg**

[inferred] Förhindra att lärare ändrar uppgiftsbetyg efter att de har registrerats.

*Standard: `false`*

### `compilatio_tool`

**Inställningar för Compilatio**

Konfigurera anslutningsuppgifterna för Compilatio här.

### `considered_working_time`

**Aktivera tidsinsats för uppgifter**

Detta gör det möjligt för lärare att ange en uppskattad tidsinsats (i formatet hh:mm:ss) för att slutföra uppgiften. Vid inlämning av uppgiften och godkännande av läraren (uppgiften ges ett betyg) tilldelas deltagaren automatiskt motsvarande tid.

*Standard: `work_time`*

### `force_download_doc_before_upload_work`

**Tvinga nedladdning av dokument före uppgiftsuppladdning**

Tvinga användare att ladda ner det tillhandahållna dokumentet i uppgiftsdefinitionen innan de kan ladda upp sin uppgift.

*Standard: `true`*

### `my_courses_show_pending_work`

**Visa länk till "väntande" uppgifter från sidan Mina kurser**

[inferred] Visa en länk eller ett antal väntande uppgifter på deltagarens sida Mina kurser för snabb åtkomst.

*Standard: `false`*