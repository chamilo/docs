# Dokumentinställningar

Beteende för kursverktyget **Dokument** — uppladdningar, tillåtna filändelser, delning och mallar.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Dokument**. Denna kategori innehåller **29 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra inställningarna på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `access_url_specific_files`

**Aktivera URL-specifika filer**

När den här funktionen är aktiverad i en konfiguration med flera URL:er kan du gå till huvud-URL:en och tillhandahålla URL-specifika versioner av valfri fil (i dokumentverktyget). Originalfilen ersätts av alternativet när den visas från en annan URL. Detta gör att du kan anpassa varje URL ytterligare, samtidigt som du behåller fördelen att återanvända samma kurser många gånger.

*Standard: `false`*

### `default_document_quotum`

**Standardutrymme på hårddisk**

Hur stort diskutrymme är tillgängligt för en kurs? Du kan åsidosätta kvoten för en specifik kurs via: plattformsadministration > Kurser > ändra

*Standard: `1000`*


### `default_group_quotum`

**Tillgängligt diskutrymme för grupp**

Vad är standardutrymmet på hårddisk som är tillgängligt för en grupps dokumentverktyg?

*Standard: `250`*


### `documents_custom_cloud_link_list`

**Ange strikt värdlista för molnlänkar**

Dokumentverktyget kan integrera länkar till filer i molnet. Listan över molntjänster är begränsad till en hårdkodad lista, men du kan definiera arrayen ‘links’ som innehåller en lista över dina egna tjänster/URL:er. Listan som definieras här ersätter standardlistan.

### `documents_default_visibility_defined_in_course`

**Dokumentens synlighet definieras i kursen**

Standardsynlighet för dokument för alla kurser

*Standard: `false`*

### `documents_hide_download_icon`

**Dölj nedladdningsikon för dokument**

I dokumentverktyget, dölj nedladdningsikonen för användare.

*Standard: `false`*


### `enable_x_sendfile_headers`

**Aktivera X-sendfile-huvuden**

Aktivera detta om du har X-sendfile aktiverat på webbservernivå och vill lägga till de nödvändiga huvudena så att webbläsare kan använda det.

*Standard: `false`*

### `group_category_document_access`

**Aktivera delningsalternativ för dokument i gruppkategori**

När detta är aktiverat kan administratörer ställa in dokumentåtkomst och delningsbehörigheter för dokumentgrupper per kategori.

*Standard: `false`*


### `group_document_access`

**Aktivera delningsalternativ för gruppdokument**

När detta är aktiverat kan dokumentdelning och åtkomstbehörigheter konfigureras på gruppnivå.

*Standard: `false`*


### `pdf_export_watermark_by_course`

**Aktivera vattenmärkesdefinition per kurs**

När det här alternativet är aktiverat kan lärare definiera sitt eget vattenmärke för dokumenten i sina kurser.

*Standard: `false`*


### `pdf_export_watermark_enable`

**Aktivera vattenmärke i PDF-export**

Genom att aktivera det här alternativet kan du ladda upp en bild eller en text som automatiskt läggs till som vattenmärke på alla PDF-exporter av dokument i systemet.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-vattenmärkestext**

Denna text läggs till som vattenmärke på dokumentexporter som PDF.

### `permanently_remove_deleted_files`

**Raderade filer kan inte återställas**

Att radera en fil i dokumentverktyget raderar den permanent. Filen kan inte återställas

*Standard: `false`*

### `permissions_for_new_directories`

**Behörigheter för nya kataloger**

Möjligheten att definiera behörighetsinställningarna som tilldelas varje nyskapad katalog gör att du kan förbättra säkerheten mot attacker från hackare som laddar upp farligt innehåll till din portal. Standardinställningen (0770) bör räcka för att ge din server en rimlig skyddsnivå. Det angivna formatet använder UNIX-terminologin Ägare-Grupp-Övriga med Läs-Skriv-Kör-behörigheter.

*Standard: `0770`*


### `permissions_for_new_files`

**Behörigheter för nya filer**

Möjligheten att definiera behörighetsinställningarna som tilldelas varje nyskapad fil gör att du kan förbättra säkerheten mot attacker från hackare som laddar upp farligt innehåll till din portal. Standardinställningen (0550) bör räcka för att ge din server en rimlig skyddsnivå. Det angivna formatet använder UNIX-terminologin Ägare-Grupp-Övriga med Läs-Skriv-Kör-behörigheter. Om du använder Oogie, se till att användaren som startar LibreOffice kan skriva filer i kursmappen.

*Standard: `0660`*


### `send_notification_when_document_added`

**Skicka avisering till studenter när dokument läggs till**

När någon skapar ett nytt objekt i dokumentverktyget, skicka en avisering till användarna.

*Standard: `false`*

### `show_default_folders`

**Visa i dokumentverktyget alla mappar som innehåller multimediaresurser som levereras som standard**

Multimediamappar som innehåller filer som levereras som standard, organiserade i kategorier för video, ljud, bild och flash-animationer att använda i kurserna. Även om du gör dem osynliga i dokumentverktyget kan du fortfarande använda dessa resurser i plattformens webbredigerare.

*Standard: `true`*

### `show_documents_preview`

**Visa dokumentförhandsvisning**

Att visa förhandsvisningar av dokumenten i dokumentverktyget undviker att en ny sida laddas bara för att visa ett dokument, men kan bli instabilt med vissa äldre webbläsare eller skärmar med mindre bredd.

*Standard: `false`*

### `show_users_folders`

**Visa användarmappar i dokumentverktyget**

Det här alternativet gör det möjligt att visa eller dölja för lärare de mappar som systemet skapar för varje användare som besöker dokumentverktyget eller skickar en fil via webbredigeraren. Om du visar dessa mappar för lärarna kan de göra dem synliga eller inte för deltagarna och ge varje deltagare en egen plats i kursen där de inte bara kan lagra dokument, utan också skapa och redigera webbsidor och exportera till pdf, göra teckningar, skapa personliga webbmallar, skicka filer, samt skapa, flytta och ta bort kataloger och filer och göra säkerhetskopior av sina mappar. Varje användare i kursen har då en komplett dokumenthanterare. Kom också ihåg att vilken användare som helst kan kopiera en fil som är synlig från vilken mapp som helst i dokumentverktyget (oavsett om hen är ägare eller inte) till sin portfölj eller sitt personliga dokumentområde i det sociala nätverket, där den blir tillgänglig så att hen kan använda den i andra kurser.

*Standard: `true`*

### `students_download_folders`

**Tillåt deltagare att ladda ner kataloger**

Tillåt deltagare att paketera och ladda ner en hel katalog från dokumentverktyget

*Standard: `true`*


### `students_export2pdf`

**Tillåt deltagare att exportera webbdokument till PDF-format i dokument- och wiki-verktygen**

Den här funktionen är aktiverad som standard, men vid överbelastning av servern, missbruk eller i specifika lärmiljöer kan du vilja inaktivera den för alla kurser.

*Standard: `true`*

### `thematic_pdf_orientation`

**PDF-orientering för kursförlopp**

I verktyget för kursförlopp kan du skriva ut en PDF av de olika elementen. Ange ‘portrait’ eller ‘landscape’ (tekniska termer) för att ändra den.

*Standard: `landscape`*


### `upload_extensions_blacklist`

**Svartlista - inställning**

Svartlistan används för att filtrera filändelser genom att ta bort (eller byta namn på) varje fil vars ändelse finns i svartlistan nedan. Ändelserna ska anges utan inledande punkt (.) och avgränsas med semikolon (;) enligt följande:  exe;com;bat;scr;php. Filer utan ändelse accepteras. Versaler/gemener spelar ingen roll.

### `upload_extensions_list_type`

**Typ av filtrering vid dokumentuppladdningar**

Om du vill använda filtrering med svartlista eller vitlista. Se beskrivningen av svartlista eller vitlista nedan för mer information.

*Standard: `blacklist`*


### `upload_extensions_replace_by`

**Ersättningsändelse**

Ange den ändelse som du vill använda för att ersätta de farliga ändelser som filtret upptäcker. Behövs bara om du har valt ett filter med ersättning.

*Standard: `dangerous`*


### `upload_extensions_skip`

**Filtreringsbeteende (hoppa över/byt namn)**

Om du väljer att hoppa över kommer filerna som filtreras via svartlistan eller vitlistan inte att laddas upp till systemet. Om du väljer att byta namn på dem kommer deras ändelse att ersättas med den som definieras i inställningen för ersättningsändelse. Observera att namnbyte inte verkligen skyddar dig och kan orsaka namnkollision om flera filer med samma namn men olika ändelser finns.

*Standard: `true`*


### `upload_extensions_whitelist`

**Vitlista - inställning**

Vitlistan används för att filtrera filändelser genom att ta bort (eller byta namn på) varje fil vars ändelse *INTE* finns i vitlistan nedan. Det betraktas i allmänhet som ett säkrare men mer restriktivt filtreringsätt. Ändelserna ska anges utan inledande punkt (.) och avgränsas med semikolon (;) enligt följande:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Filer utan ändelse accepteras. Versaler/gemener spelar ingen roll.

### `users_copy_files`

**Tillåt användare att kopiera filer från en kurs till sitt personliga filområde**

Tillåter användare att kopiera filer från en kurs till sitt personliga filområde, synligt via det sociala nätverket eller via HTML-redigeraren när de befinner sig utanför en kurs

*Standard: `true`*


### `video_features`

**Videofunktioner**

Array med extra funktioner som du kan aktivera för videospelaren i Chamilo. Alternativen inkluderar 'speed', som gör det möjligt att ändra uppspelningshastigheten för en video.