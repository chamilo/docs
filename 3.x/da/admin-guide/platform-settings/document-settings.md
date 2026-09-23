# Dokumentindstillinger

Adfærd for kursets **Dokumenter**-værktøj — uploads, tilladte filendelser, deling og skabeloner.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Dokumenter**. Denne kategori indeholder **29 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `access_url_specific_files`

**Aktivér URL-specifikke filer**

Når denne funktion er aktiveret i en multi-URL-konfiguration, kan du gå til hoved-URL’en og levere URL-specifikke versioner af enhver fil (i dokumentværktøjet). Den oprindelige fil erstattes af alternativet, når den vises fra en anden URL. Dette giver dig mulighed for at tilpasse hver URL yderligere, samtidig med at du nyder fordelen ved at genbruge de samme kurser mange gange.

*Standard: `false`*

### `default_document_quotum`

**Standard harddiskplads**

Hvor meget diskplads er tilgængelig for et kursus? Du kan tilsidesætte kvoten for et specifikt kursus via: platformadministration > Kurser > rediger

*Standard: `1000`*


### `default_group_quotum`

**Tilgængelig diskplads for grupper**

Hvad er den standard harddiskplads, der er tilgængelig for en gruppes dokumentværktøj?

*Standard: `250`*


### `documents_custom_cloud_link_list`

**Angiv streng værtliste for cloud-links**

Dokumentværktøjet kan integrere links til filer i skyen. Listen over cloud-tjenester er begrænset til en hardkodet liste, men du kan definere arrayet ‘links’, som indeholder din egen liste over tjenester/URL’er. Listen, der defineres her, erstatter standardlisten.

### `documents_default_visibility_defined_in_course`

**Dokumentets synlighed defineret i kurset**

Standard synlighed for dokumenter for alle kurser

*Standard: `false`*

### `documents_hide_download_icon`

**Skjul download-ikon for dokumenter**

I dokumentværktøjet skjules download-ikonet for brugerne.

*Standard: `false`*


### `enable_x_sendfile_headers`

**Aktivér X-sendfile-headere**

Aktivér dette, hvis du har X-sendfile aktiveret på webserverniveau, og du vil tilføje de påkrævede headere, så browsere kan opfange det.

*Standard: `false`*

### `group_category_document_access`

**Aktivér delingsmuligheder for dokumenter i gruppekategori**

Når funktionen er aktiveret, kan administratorer angive dokumentadgang og delingstilladelser for dokumentgrupper efter kategori.

*Standard: `false`*


### `group_document_access`

**Aktivér delingsmuligheder for gruppedokumenter**

Når funktionen er aktiveret, kan dokumentdeling og adgangstilladelser konfigureres på gruppeniveau.

*Standard: `false`*


### `pdf_export_watermark_by_course`

**Aktivér vandmærkedefinition pr. kursus**

Når denne indstilling er aktiveret, kan undervisere definere deres eget vandmærke til dokumenterne i deres kurser.

*Standard: `false`*


### `pdf_export_watermark_enable`

**Aktivér vandmærke i PDF-eksport**

Ved at aktivere denne indstilling kan du uploade et billede eller en tekst, som automatisk tilføjes som vandmærke til alle PDF-eksporter af dokumenter på systemet.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-vandmærketekst**

Denne tekst tilføjes som vandmærke til dokumenteksporter som PDF.

### `permanently_remove_deleted_files`

**Slettede filer kan ikke gendannes**

Sletning af en fil i dokumentværktøjet sletter den permanent. Filen kan ikke gendannes

*Standard: `false`*

### `permissions_for_new_directories`

**Tilladelser for nye mapper**

Muligheden for at definere de tilladelsesindstillinger, der tildeles hver nyoprettet mappe, lader dig forbedre sikkerheden mod angreb fra hackere, der uploader farligt indhold til din portal. Standardindstillingen (0770) bør være tilstrækkelig til at give din server et rimeligt beskyttelsesniveau. Det angivne format bruger UNIX-terminologien Ejer-Gruppe-Andre med Læse-Skrive-Køre-tilladelser.

*Standard: `0770`*


### `permissions_for_new_files`

**Tilladelser for nye filer**

Muligheden for at definere de tilladelsesindstillinger, der tildeles hver nyoprettet fil, lader dig forbedre sikkerheden mod angreb fra hackere, der uploader farligt indhold til din portal. Standardindstillingen (0550) bør være tilstrækkelig til at give din server et rimeligt beskyttelsesniveau. Det angivne format bruger UNIX-terminologien Ejer-Gruppe-Andre med Læse-Skrive-Køre-tilladelser. Hvis du bruger Oogie, skal du sørge for, at den bruger, der starter LibreOffice, kan skrive filer i kursusmappen.

*Standard: `0660`*


### `send_notification_when_document_added`

**Send notifikation til studerende, når dokument tilføjes**

Når nogen opretter et nyt element i dokumentværktøjet, sendes en notifikation til brugerne.

*Standard: `false`*

### `show_default_folders`

**Vis i dokumentværktøjet alle mapper, der indeholder multimedieressourcer leveret som standard**

Multimediefilmapper, der indeholder filer leveret som standard, organiseret i kategorier af video, lyd, billeder og flash-animationer til brug i deres kurser. Selvom du gør dem usynlige i dokumentværktøjet, kan du stadig bruge disse ressourcer i platformens webredigeringsværktøj.

*Standard: `true`*

### `show_documents_preview`

**Vis dokumentforhåndsvisning**

Visning af forhåndsvisninger af dokumenterne i dokumentværktøjet undgår indlæsning af en ny side blot for at vise et dokument, men kan være ustabilt i nogle ældre browsere eller på skærme med mindre bredde.

*Standard: `false`*

### `show_users_folders`

**Vis brugermapper i dokumentværktøjet**

Denne indstilling giver dig mulighed for at vise eller skjule for undervisere de mapper, som systemet opretter for hver bruger, der besøger dokumentværktøjet eller sender en fil via webredigeringsværktøjet. Hvis du viser disse mapper for underviserne, kan de gøre dem synlige eller usynlige for de lærende og give hver lærende et specifikt sted på kurset, hvor de ikke kun kan gemme dokumenter, men også oprette og redigere websider og eksportere til pdf, lave tegninger, oprette personlige webskabeloner, sende filer samt oprette, flytte og slette mapper og filer og tage sikkerhedskopier af deres mapper. Hver bruger på kurset har dermed en komplet dokumenthåndtering. Husk desuden, at enhver bruger kan kopiere en fil, der er synlig fra en hvilken som helst mappe i dokumentværktøjet (uanset om vedkommende er ejer eller ej) til sine porteføljer eller det personlige dokumentområde i det sociale netværk, som derefter vil være tilgængeligt, så vedkommende kan bruge det i andre kurser.

*Standard: `true`*

### `students_download_folders`

**Tillad lærende at downloade mapper**

Tillad lærende at pakke og downloade en komplet mappe fra dokumentværktøjet

*Standard: `true`*


### `students_export2pdf`

**Tillad lærende at eksportere webdokumenter til PDF-format i dokument- og wiki-værktøjerne**

Denne funktion er aktiveret som standard, men i tilfælde af serveroverbelastning ved misbrug, eller i specifikke læringsmiljøer, kan man ønske at deaktivere den for alle kurser.

*Standard: `true`*

### `thematic_pdf_orientation`

**PDF-orientering for kursusfremdrift**

I værktøjet til kursusfremdrift kan du udskrive en PDF af de forskellige elementer. Angiv ‘portrait’ eller ‘landscape’ (tekniske termer) for at ændre den.

*Standard: `landscape`*


### `upload_extensions_blacklist`

**Sortliste - indstilling**

Sortlisten bruges til at filtrere filudvidelser ved at fjerne (eller omdøbe) enhver fil, hvis udvidelse figurerer på sortlisten nedenfor. Udvidelserne skal angives uden det indledende punktum (.) og adskilt af semikolon (;) som følgende:  exe;com;bat;scr;php. Filer uden udvidelse accepteres. Store/små bogstaver har ingen betydning.

### `upload_extensions_list_type`

**Type af filtrering ved dokumentupload**

Om du vil bruge sortliste- eller hvidlistefiltrering. Se beskrivelsen af sortliste eller hvidliste nedenfor for flere detaljer.

*Standard: `blacklist`*


### `upload_extensions_replace_by`

**Erstatningsudvidelse**

Angiv den udvidelse, du vil bruge til at erstatte de farlige udvidelser, der registreres af filteret. Kun nødvendig, hvis du har valgt et filter ved erstatning.

*Standard: `dangerous`*


### `upload_extensions_skip`

**Filtreringsadfærd (spring over/omdøb)**

Hvis du vælger at springe over, vil de filer, der filtreres via sortlisten eller hvidlisten, ikke blive uploadet til systemet. Hvis du vælger at omdøbe dem, vil deres udvidelse blive erstattet af den, der er defineret i indstillingen for udvidelseserstatning. Vær opmærksom på, at omdøbning ikke reelt beskytter dig og kan forårsage navnesammenstød, hvis flere filer med samme navn men forskellige udvidelser findes.

*Standard: `true`*


### `upload_extensions_whitelist`

**Hvidliste - indstilling**

Hvidlisten bruges til at filtrere filudvidelser ved at fjerne (eller omdøbe) enhver fil, hvis udvidelse *IKKE* figurerer på hvidlisten nedenfor. Det betragtes generelt som en sikrere, men mere restriktiv tilgang til filtrering. Udvidelserne skal angives uden det indledende punktum (.) og adskilt af semikolon (;) som følgende:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Filer uden udvidelse accepteres. Store/små bogstaver har ingen betydning.

### `users_copy_files`

**Tillad brugere at kopiere filer fra et kursus til dit personlige filområde**

Tillader brugere at kopiere filer fra et kursus til dit personlige filområde, synligt via det sociale netværk eller via HTML-editoren, når de er uden for et kursus

*Standard: `true`*


### `video_features`

**Videofunktioner**

Array af ekstra funktioner, du kan aktivere for videoafspilleren i Chamilo. Indstillinger omfatter 'speed', som giver dig mulighed for at ændre afspilningshastigheden for en video.