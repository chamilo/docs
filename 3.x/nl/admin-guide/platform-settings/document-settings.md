# Documenteninstellingen

Gedrag van de cursustool **Documenten** — uploads, toegestane extensies, delen en sjablonen.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Documenten**. Deze categorie bevat **29 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `access_url_specific_files`

**URL-specifieke bestanden inschakelen**

Wanneer deze functie is ingeschakeld in een configuratie met meerdere URL’s, kunt u naar de hoofd-URL gaan en URL-specifieke versies van elk bestand aanleveren (in de documententool). Het oorspronkelijke bestand wordt vervangen door het alternatief wanneer het vanaf een andere URL wordt bekeken. Zo kunt u elke URL verder personaliseren, terwijl u het voordeel behoudt dat dezelfde cursussen meerdere keren worden hergebruikt.

*Standaard: `false`*

### `default_document_quotum`

**Standaard harde-schijfruimte**

Hoeveel schijfruimte is beschikbaar voor een cursus? U kunt het quotum voor een specifieke cursus overschrijven via: platformbeheer > Cursussen > wijzigen

*Standaard: `1000`*


### `default_group_quotum`

**Beschikbare schijfruimte voor groepen**

Wat is de standaard beschikbare harde-schijfruimte voor de documententool van groepen?

*Standaard: `250`*


### `documents_custom_cloud_link_list`

**Strikte hostlijst voor cloudkoppelingen instellen**

De documententool kan koppelingen naar bestanden in de cloud integreren. De lijst van clouddiensten is beperkt tot een hardcoded lijst, maar u kunt de array ‘links’ definiëren die een lijst van uw eigen diensten/URL’s bevat. De hier gedefinieerde lijst vervangt de standaardlijst.

### `documents_default_visibility_defined_in_course`

**Documentzichtbaarheid gedefinieerd in de cursus**

De standaard documentzichtbaarheid voor alle cursussen

*Standaard: `false`*

### `documents_hide_download_icon`

**Downloadpictogram van documenten verbergen**

Verberg in de documententool het downloadpictogram voor gebruikers.

*Standaard: `false`*


### `enable_x_sendfile_headers`

**X-sendfile-headers inschakelen**

Schakel dit in als X-sendfile op webserverniveau is ingeschakeld en u de vereiste headers wilt toevoegen zodat browsers deze oppikken.

*Standaard: `false`*

### `group_category_document_access`

**Deelopties inschakelen voor documenten binnen groepecategorie**

Wanneer ingeschakeld, kunnen beheerders documenttoegang en deelrechten voor documentgroepen per categorie instellen.

*Standaard: `false`*


### `group_document_access`

**Deelopties inschakelen voor groepsdocumenten**

Wanneer ingeschakeld, kunnen documentdeling en toegangsrechten op groepsniveau worden geconfigureerd.

*Standaard: `false`*


### `pdf_export_watermark_by_course`

**Watermerkdefinitie per cursus inschakelen**

Wanneer deze optie is ingeschakeld, kunnen docenten hun eigen watermerk definiëren voor de documenten in hun cursussen.

*Standaard: `false`*


### `pdf_export_watermark_enable`

**Watermerk in PDF-export inschakelen**

Door deze optie in te schakelen, kunt u een afbeelding of tekst uploaden die automatisch als watermerk wordt toegevoegd aan alle PDF-exports van documenten op het systeem.

*Standaard: `false`*

### `pdf_export_watermark_text`

**PDF-watermerktekst**

Deze tekst wordt als watermerk toegevoegd aan de documentexports als PDF.

### `permanently_remove_deleted_files`

**Verwijderde bestanden kunnen niet worden hersteld**

Het verwijderen van een bestand in de documententool verwijdert het definitief. Het bestand kan niet worden hersteld

*Standaard: `false`*

### `permissions_for_new_directories`

**Rechten voor nieuwe mappen**

De mogelijkheid om de rechten in te stellen die aan elke nieuw aangemaakte map worden toegekend, laat u de beveiliging verbeteren tegen aanvallen van hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0770) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te geven. Het gegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Anderen met Lezen-Schrijven-Uitvoeren-rechten.

*Standaard: `0770`*


### `permissions_for_new_files`

**Rechten voor nieuwe bestanden**

De mogelijkheid om de rechten in te stellen die aan elk nieuw aangemaakt bestand worden toegekend, laat u de beveiliging verbeteren tegen aanvallen van hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0550) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te geven. Het gegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Anderen met Lezen-Schrijven-Uitvoeren-rechten. Als u Oogie gebruikt, let erop dat de gebruiker die LibreOffice start, bestanden in de cursusmap kan schrijven.

*Standaard: `0660`*


### `send_notification_when_document_added`

**Melding naar studenten sturen wanneer een document is toegevoegd**

Wanneer iemand een nieuw item in de documententool aanmaakt, stuur dan een melding naar gebruikers.

*Standaard: `false`*

### `show_default_folders`

**Toon in de documententool alle mappen met standaard meegeleverde multimediabronnen**

Mappen met multimediabestanden die standaard worden meegeleverd, georganiseerd in categorieën video, audio, afbeelding en flash-animaties voor gebruik in hun cursussen. Ook als u ze onzichtbaar maakt in de documententool, kunt u deze bronnen nog steeds gebruiken in de webeditor van het platform.

*Standaard: `true`*

### `show_documents_preview`

**Documentvoorbeeld tonen**

Het tonen van voorbeelden van documenten in de documententool voorkomt dat er een nieuwe pagina wordt geladen alleen om een document te tonen, maar kan instabiel zijn in sommige oudere browsers of op schermen met een kleinere breedte.

*Standaard: `false`*

### `show_users_folders`

**Gebruikersmappen tonen in de documententool**

Met deze optie kunt u voor docenten de mappen tonen of verbergen die het systeem aanmaakt voor elke gebruiker die de documententool bezoekt of een bestand via de webeditor verzendt. Als u deze mappen aan de docenten toont, kunnen zij ze zichtbaar maken of niet voor de cursisten en elke cursist een eigen plek in de cursus geven waar zij niet alleen documenten kunnen opslaan, maar ook webpagina’s kunnen maken en bewerken en exporteren naar pdf, tekeningen maken, persoonlijke websjablonen maken, bestanden verzenden, evenals mappen en bestanden aanmaken, verplaatsen en verwijderen en beveiligingskopieën van hun mappen maken. Elke gebruiker van de cursus heeft dan een volledige documentbeheerder. Denk er ook aan dat elke gebruiker een bestand dat zichtbaar is vanuit eender welke map in de documententool (of hij/zij de eigenaar is of niet) kan kopiëren naar zijn/haar portfolio’s of het persoonlijke documentengebied van het sociale netwerk, zodat hij/zij het in andere cursussen kan gebruiken.

*Standaard: `true`*

### `students_download_folders`

**Cursisten toestaan mappen te downloaden**

Cursisten toestaan een volledige map uit de documententool in te pakken en te downloaden

*Standaard: `true`*


### `students_export2pdf`

**Cursisten toestaan webdocumenten naar PDF-formaat te exporteren in de documenten- en wiki-tools**

Deze functie is standaard ingeschakeld, maar bij overbelasting van de server door misbruik, of in specifieke leeromgevingen, wilt u deze mogelijk voor alle cursussen uitschakelen.

*Standaard: `true`*

### `thematic_pdf_orientation`

**PDF-oriëntatie voor cursusvoortgang**

In de tool cursusvoortgang kunt u een PDF van de verschillende elementen afdrukken. Stel ‘portrait’ of ‘landscape’ in (technische termen) om dit te wijzigen.

*Standaard: `landscape`*


### `upload_extensions_blacklist`

**Zwarte lijst - instelling**

De zwarte lijst wordt gebruikt om bestandsextensies te filteren door elk bestand waarvan de extensie in de onderstaande zwarte lijst voorkomt, te verwijderen (of te hernoemen). De extensies moeten zonder de voorafgaande punt (.) en gescheiden door puntkomma’s (;) worden opgegeven, zoals het volgende:  exe;com;bat;scr;php. Bestanden zonder extensie worden geaccepteerd. Hoofd- of kleine letters maken niet uit.

### `upload_extensions_list_type`

**Type filtering bij het uploaden van documenten**

Of u filtering via de zwarte lijst of de witte lijst wilt gebruiken. Zie de beschrijving van de zwarte of witte lijst hieronder voor meer details.

*Standaard: `blacklist`*


### `upload_extensions_replace_by`

**Vervangende extensie**

Voer de extensie in die u wilt gebruiken om de gevaarlijke extensies te vervangen die door het filter zijn gedetecteerd. Alleen nodig als u een filter op vervanging hebt geselecteerd.

*Standaard: `dangerous`*


### `upload_extensions_skip`

**Filtergedrag (overslaan/hernoemen)**

Als u kiest voor overslaan, worden de bestanden die via de zwarte of witte lijst zijn gefilterd niet naar het systeem geüpload. Als u kiest voor hernoemen, wordt hun extensie vervangen door die welke is gedefinieerd in de instelling voor extensievervanging. Let op: hernoemen beschermt u niet echt en kan tot naamconflicten leiden als er meerdere bestanden met dezelfde naam maar verschillende extensies bestaan.

*Standaard: `true`*


### `upload_extensions_whitelist`

**Witte lijst - instelling**

De witte lijst wordt gebruikt om bestandsextensies te filteren door elk bestand waarvan de extensie *NIET* in de onderstaande witte lijst voorkomt, te verwijderen (of te hernoemen). Dit wordt over het algemeen beschouwd als een veiligere maar restrictievere filteraanpak. De extensies moeten zonder de voorafgaande punt (.) en gescheiden door puntkomma’s (;) worden opgegeven, zoals het volgende:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Bestanden zonder extensie worden geaccepteerd. Hoofd- of kleine letters maken niet uit.

### `users_copy_files`

**Gebruikers toestaan bestanden uit een cursus naar hun persoonlijke bestandsruimte te kopiëren**

Staat gebruikers toe bestanden uit een cursus naar hun persoonlijke bestandsruimte te kopiëren, zichtbaar via het sociale netwerk of via de HTML-editor wanneer zij zich buiten een cursus bevinden

*Standaard: `true`*


### `video_features`

**Videofuncties**

Array van extra functies die u voor de videospeler in Chamilo kunt inschakelen. Opties omvatten 'speed', waarmee u de afspeelsnelheid van een video kunt wijzigen.