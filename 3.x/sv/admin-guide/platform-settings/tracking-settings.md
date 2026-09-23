# Spårningsinställningar

Standardvärden relaterade till spårning — vad som registreras, vilka rapporter som exponeras, regler för tidsberäkning.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Spårning**. Denna kategori innehåller **10 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `block_my_progress_page`

**Förhindra åtkomst till 'Min framsteg'**

I specifika implementationer som nätbaserade tentamina kan du vilja förhindra användaråtkomst till sidan 'Min framsteg'.

*Standard: `false`*

### `footer_extra_content`

**Extra innehåll i sidfot**

Du kan lägga till HTML-kod som meta-taggar

### `header_extra_content`

**Extra innehåll i sidhuvud**

Du kan lägga till HTML-kod som meta-taggar

### `meta_description`

**Metabeskrivning**

Detta visar en OpenGraph Description-meta (og:description) i webbplatsens sidhuvuden

### `meta_image_path`

**Sökväg till metabild**

Denna sökväg till metabild är sökvägen till en fil i din Chamilo-katalog (t.ex. home/image.png) som ska visas i ett Twitter-kort eller ett OpenGraph-kort när en länk till din LMS visas. Twitter rekommenderar en bild på 120 x 120 pixlar, som ibland kan beskäras till 120x90.

### `meta_title`

**OpenGraph-metatitel**

Detta visar en OpenGraph Title-meta (og:title) i webbplatsens sidhuvuden

### `meta_twitter_creator`

**Twitter Creator-konto**

Twitter Creator är ett Twitter-konto (t.ex. @ywarnier) som representerar den *person* som skapade webbplatsen. Detta fält är valfritt.

### `meta_twitter_site`

**Twitter Site-konto**

Twitter-webbplatsen är ett Twitter-konto (t.ex. @chamilo_news) som är relaterat till din webbplats. Det är vanligtvis ett mer tillfälligt konto än Twitter Creator-kontot, eller representerar en entitet (i stället för en person). Detta fält krävs om du vill att Twitter-kortets metafält ska visas.

### `my_progress_course_tools_order`

**Ordning på verktyg på sidan 'Min framsteg'**

Ändra ordningen på verktyg som visas på sidan 'Min framsteg' för studerande. Alternativ inkluderar 'quizzes', 'learning_paths' och 'skills'.

### `tracking_skip_generic_data`

**Hoppa över generiska data på den studerandes självspårningssida**

Om sidan 'Min framsteg' tar för lång tid att läsa in kanske du vill ta bort bearbetningen av generisk statistik för användaren. Aktivera i så fall denna inställning.

*Standard: `false`*