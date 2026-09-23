# Dokumentinnstillinger

Oppførsel for kursverktøyet **Dokumenter** — opplastinger, tillatte filendelser, deling og maler.

Gå til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Dokumenter**. Denne kategorien inneholder **29 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `access_url_specific_files`

**Aktiver URL-spesifikke filer**

Når denne funksjonen er aktivert i en konfigurasjon med flere URL-er, kan du gå til hoved-URL-en og legge inn URL-spesifikke versjoner av en hvilken som helst fil (i dokumentverktøyet). Originalfilen erstattes av alternativet når den vises fra en annen URL. Dette gjør at du kan tilpasse hver URL ytterligere, samtidig som du beholder fordelen av å gjenbruke de samme kursene mange ganger.

*Standard: `false`*

### `default_document_quotum`

**Standard harddiskplass**

Hvor mye diskplass er tilgjengelig for et kurs? Du kan overstyre kvoten for et bestemt kurs via: plattformadministrasjon > Kurs > endre

*Standard: `1000`*


### `default_group_quotum`

**Tilgjengelig diskplass for gruppe**

Hva er standard tilgjengelig harddiskplass for dokumentverktøyet til en gruppe?

*Standard: `250`*


### `documents_custom_cloud_link_list`

**Angi streng vertsliste for skylenkere**

Dokumentverktøyet kan integrere lenker til filer i skyen. Listen over skytjenester er begrenset til en hardkodet liste, men du kan definere ‘links’-tabellen som skal inneholde en liste over dine egne tjenester/URL-er. Listen som defineres her, erstatter standardlisten.

### `documents_default_visibility_defined_in_course`

**Dokumentets synlighet definert i kurset**

Standard dokumentsynlighet for alle kurs

*Standard: `false`*

### `documents_hide_download_icon`

**Skjul nedlastingsikon for dokumenter**

I dokumentverktøyet, skjul nedlastingsikonet for brukere.

*Standard: `false`*


### `enable_x_sendfile_headers`

**Aktiver X-sendfile-headere**

Aktiver dette hvis du har X-sendfile aktivert på webservernivå og ønsker å legge til de nødvendige headerne slik at nettlesere plukker det opp.

*Standard: `false`*

### `group_category_document_access`

**Aktiver delingsalternativer for dokument inne i gruppekategori**

Når dette er aktivert, kan administratorer angi dokumenttilgang og delingstillatelser for dokumentgrupper etter kategori.

*Standard: `false`*


### `group_document_access`

**Aktiver delingsalternativer for gruppedokument**

Når dette er aktivert, kan dokumentdeling og tilgangstillatelser konfigureres på gruppenivå.

*Standard: `false`*


### `pdf_export_watermark_by_course`

**Aktiver vannmerkedefinisjon per kurs**

Når dette alternativet er aktivert, kan lærere definere sitt eget vannmerke for dokumentene i kursene sine.

*Standard: `false`*


### `pdf_export_watermark_enable`

**Aktiver vannmerke i PDF-eksport**

Ved å aktivere dette alternativet kan du laste opp et bilde eller en tekst som automatisk legges til som vannmerke på alle PDF-eksporter av dokumenter i systemet.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-vannmerketekst**

Denne teksten legges til som vannmerke på dokumenteksporter som PDF.

### `permanently_remove_deleted_files`

**Slettede filer kan ikke gjenopprettes**

Sletting av en fil i dokumentverktøyet sletter den permanent. Filen kan ikke gjenopprettes

*Standard: `false`*

### `permissions_for_new_directories`

**Tillatelser for nye kataloger**

Muligheten til å definere tillatelsesinnstillingene som skal tildeles hver nylig opprettet katalog, lar deg forbedre sikkerheten mot angrep fra hackere som laster opp farlig innhold til portalen din. Standardinnstillingen (0770) bør være tilstrekkelig til å gi serveren et rimelig beskyttelsesnivå. Det gitte formatet bruker UNIX-terminologien Eier-Gruppe-Andre med Les-Skriv-Kjør-tillatelser.

*Standard: `0770`*


### `permissions_for_new_files`

**Tillatelser for nye filer**

Muligheten til å definere tillatelsesinnstillingene som skal tildeles hver nylig opprettet fil, lar deg forbedre sikkerheten mot angrep fra hackere som laster opp farlig innhold til portalen din. Standardinnstillingen (0550) bør være tilstrekkelig til å gi serveren et rimelig beskyttelsesnivå. Det gitte formatet bruker UNIX-terminologien Eier-Gruppe-Andre med Les-Skriv-Kjør-tillatelser. Hvis du bruker Oogie, må du sørge for at brukeren som starter LibreOffice, kan skrive filer i kursmappen.

*Standard: `0660`*


### `send_notification_when_document_added`

**Send varsling til studenter når dokument legges til**

Når noen oppretter et nytt element i dokumentverktøyet, send en varsling til brukerne.

*Standard: `false`*

### `show_default_folders`

**Vis i dokumentverktøyet alle mapper som inneholder multimedieressurser levert som standard**

Mapper med multimediafiler som inneholder filer levert som standard, organisert i kategoriene video, lyd, bilde og flash-animasjoner til bruk i kursene. Selv om du gjør dem usynlige i dokumentverktøyet, kan du fortsatt bruke disse ressursene i plattformens nettredigerer.

*Standard: `true`*

### `show_documents_preview`

**Vis dokumentforhåndsvisning**

Å vise forhåndsvisninger av dokumentene i dokumentverktøyet unngår lasting av en ny side bare for å vise et dokument, men kan bli ustabilt i noen eldre nettlesere eller på skjermer med mindre bredde.

*Standard: `false`*

### `show_users_folders`

**Vis brukermapper i dokumentverktøyet**

Dette valget lar deg vise eller skjule for lærere mappene som systemet genererer for hver bruker som besøker dokumentverktøyet eller sender en fil via nettredigereren. Hvis du viser disse mappene for lærerne, kan de gjøre dem synlige eller ikke for studentene og gi hver student et eget sted i kurset der de ikke bare kan lagre dokumenter, men også opprette og redigere nettsider og eksportere til pdf, lage tegninger, lage personlige nettmaler, sende filer, samt opprette, flytte og slette mapper og filer og ta sikkerhetskopier av mappene sine. Hver bruker i kurset har da en komplett dokumentbehandler. Husk også at enhver bruker kan kopiere en fil som er synlig fra hvilken som helst mappe i dokumentverktøyet (enten vedkommende eier den eller ikke) til sin portefølje eller sitt personlige dokumentområde i det sosiale nettverket, slik at den blir tilgjengelig for bruk i andre kurs.

*Standard: `true`*

### `students_download_folders`

**Tillat studenter å laste ned mapper**

Tillat studenter å pakke og laste ned en komplett mappe fra dokumentverktøyet

*Standard: `true`*


### `students_export2pdf`

**Tillat studenter å eksportere nettdokumenter til PDF-format i dokument- og wiki-verktøyene**

Denne funksjonen er aktivert som standard, men ved overbelastning av serveren, misbruk, eller i bestemte læringsmiljøer, kan det være ønskelig å deaktivere den for alle kurs.

*Standard: `true`*

### `thematic_pdf_orientation`

**PDF-orientering for kursfremdrift**

I verktøyet for kursfremdrift kan du skrive ut en PDF av de ulike elementene. Sett ‘portrait’ eller ‘landscape’ (tekniske termer) for å endre den.

*Standard: `landscape`*


### `upload_extensions_blacklist`

**Svarteliste – innstilling**

Svartelisten brukes til å filtrere filendelser ved å fjerne (eller gi nytt navn til) enhver fil hvis endelse står i svartelisten nedenfor. Endelsene skal angis uten innledende punktum (.) og skilles med semikolon (;) slik som følgende:  exe;com;bat;scr;php. Filer uten endelse godtas. Store/små bokstaver har ingen betydning.

### `upload_extensions_list_type`

**Type filtrering ved dokumentopplasting**

Om du vil bruke svarteliste- eller hvitlistefiltrering. Se beskrivelsen av svarteliste eller hvitliste nedenfor for mer informasjon.

*Standard: `blacklist`*


### `upload_extensions_replace_by`

**Erstatningsendelse**

Angi endelsen du vil bruke til å erstatte farlige endelser som oppdages av filteret. Trengs bare hvis du har valgt et filter med erstatning.

*Standard: `dangerous`*


### `upload_extensions_skip`

**Filtreringsatferd (hopp over/gi nytt navn)**

Hvis du velger å hoppe over, vil filene som filtreres gjennom svartelisten eller hvitlisten ikke lastes opp til systemet. Hvis du velger å gi dem nytt navn, vil endelsen deres erstattes av den som er definert i innstillingen for erstatningsendelse. Vær oppmerksom på at nytt navn ikke egentlig beskytter deg, og kan forårsake navnekollisjon hvis flere filer med samme navn men ulike endelser finnes.

*Standard: `true`*


### `upload_extensions_whitelist`

**Hvitliste – innstilling**

Hvitlisten brukes til å filtrere filendelser ved å fjerne (eller gi nytt navn til) enhver fil hvis endelse *IKKE* står i hvitlisten nedenfor. Dette regnes generelt som en sikrere, men mer restriktiv tilnærming til filtrering. Endelsene skal angis uten innledende punktum (.) og skilles med semikolon (;) slik som følgende:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Filer uten endelse godtas. Store/små bokstaver har ingen betydning.

### `users_copy_files`

**Tillat brukere å kopiere filer fra et kurs til sitt personlige filområde**

Lar brukere kopiere filer fra et kurs til sitt personlige filområde, synlig via det sosiale nettverket eller via HTML-redigereren når de er utenfor et kurs

*Standard: `true`*


### `video_features`

**Videofunksjoner**

Array av ekstra funksjoner du kan aktivere for videospilleren i Chamilo. Alternativer inkluderer 'speed', som lar deg endre avspillingshastigheten for en video.