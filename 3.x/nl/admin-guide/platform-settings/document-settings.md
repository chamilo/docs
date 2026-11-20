# Instellingen voor documenten

Gedrag van de cursustool **Documenten** — uploads, toegestane extensies, delen en sjablonen.

Open deze instellingen via **Beheer > Configuratie-instellingen > Documenten**. Deze categorie bevat **30 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `access_url_specific_files`

**URL-specifieke bestanden inschakelen**

Wanneer deze functie is ingeschakeld in een configuratie met meerdere URL's, kunt u naar de hoofd-URL gaan en URL-specifieke versies van elk bestand aanbieden (in de documententool). Het oorspronkelijke bestand wordt vervangen door het alternatief wanneer het vanuit een andere URL wordt bekeken. Zo kunt u elke URL nog verder aanpassen, terwijl u het voordeel behoudt dat dezelfde cursussen meerdere keren worden hergebruikt.

*Standaard: `false`*

### `default_document_quotum`

**Standaard schijfruimte**

Hoeveel schijfruimte is beschikbaar voor een cursus? U kunt het quotum voor een specifieke cursus overschrijven via: platformbeheer > Cursussen > wijzigen

*Standaard: `1000`*


### `default_group_quotum`

**Beschikbare schijfruimte voor groepen**

Wat is de standaard beschikbare schijfruimte voor de documententool van een groep?

*Standaard: `250`*


### `document_default_visibility_can_be_modified_in_course` **v3**

**Standaardzichtbaarheid van nieuwe documenten kan per cursus worden gewijzigd**

Wanneer dit is ingeschakeld, kunnen docenten in de cursusinstellingen de zichtbaarheid kiezen die aan nieuwe documenten van hun cursus wordt gegeven, in plaats van de platformstandaard.

*Standaard: `false`*

Wanneer dit is ingeschakeld, verschijnt in het gedeelte **Documenten** van de cursusinstellingen de optie **Standaardzichtbaarheid voor nieuwe documenten**. Een cursus die geen waarde heeft gekozen, gebruikt `document_default_visibility_on_creation`.

### `document_default_visibility_on_creation` **v3**

**Standaardzichtbaarheid van nieuwe documenten**

Zichtbaarheid die aan een nieuw document, een nieuwe map of een geüpload bestand wordt gegeven wanneer een docent dit in een cursus aanmaakt. Docenten kunnen de zichtbaarheid van elk item daarna nog wijzigen.

*Standaard: `visible`*

### `documents_custom_cloud_link_list`

**Strikte hostlijst voor cloudkoppelingen instellen**

De documententool kan koppelingen naar bestanden in de cloud integreren. De lijst met clouddiensten is beperkt tot een vast gecodeerde lijst, maar u kunt de array ‘links’ definiëren die een lijst met uw eigen diensten/URL's bevat. De hier gedefinieerde lijst vervangt de standaardlijst.

### `documents_hide_download_icon`

**Downloadpictogram voor documenten verbergen**

Verberg in de documententool het downloadpictogram voor gebruikers.

*Standaard: `false`*


### `enable_x_sendfile_headers`

**X-sendfile-headers inschakelen**

Schakel dit in als X-sendfile op webserverniveau is ingeschakeld en u de vereiste headers wilt toevoegen zodat browsers deze oppikken.

*Standaard: `false`*

### `group_category_document_access`

**Deelopties inschakelen voor documenten binnen een groepscategorie**

Wanneer dit is ingeschakeld, kunnen beheerders documenttoegang en deelrechten instellen voor documentgroepen per categorie.

*Standaard: `false`*


### `group_document_access`

**Deelopties inschakelen voor groepsdocumenten**

Wanneer dit is ingeschakeld, kunnen het delen van documenten en toegangsrechten op groepsniveau worden geconfigureerd.

*Standaard: `false`*


### `pdf_export_watermark_by_course`

**Watermerkdefinitie per cursus inschakelen**

Wanneer deze optie is ingeschakeld, kunnen docenten een eigen watermerk definiëren voor de documenten in hun cursussen.

*Standaard: `false`*


### `pdf_export_watermark_enable`

**Watermerk bij PDF-export inschakelen**

Door deze optie in te schakelen kunt u een afbeelding of tekst uploaden die automatisch als watermerk wordt toegevoegd aan alle PDF-exports van documenten op het systeem.

*Standaard: `false`*

### `pdf_export_watermark_text`

**PDF-watermerktekst**

Deze tekst wordt als watermerk toegevoegd aan de documentexports als PDF.

### `permanently_remove_deleted_files`

**Verwijderde bestanden kunnen niet worden hersteld**

Het verwijderen van een bestand in de documententool verwijdert het permanent. Het bestand kan niet worden hersteld

*Standaard: `false`*

### `permissions_for_new_directories`

**Rechten voor nieuwe mappen**

De mogelijkheid om de rechteninstellingen te definiëren die aan elke nieuw aangemaakte map worden toegewezen, stelt u in staat de beveiliging te verbeteren tegen aanvallen door hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0770) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te geven. Het opgegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Overigen met rechten voor Lezen-Schrijven-Uitvoeren.

*Standaard: `0770`*

### `permissions_for_new_files`

**Rechten voor nieuwe bestanden**

De mogelijkheid om de rechteninstellingen te definiëren die aan elk nieuw aangemaakt bestand worden toegewezen, stelt u in staat de beveiliging te verbeteren tegen aanvallen door hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0550) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te geven. Het opgegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Overigen met Lees-Schrijf-Uitvoer-rechten. Als u Oogie gebruikt, let er dan op dat de gebruiker die LibreOffice start bestanden kan schrijven in de cursusmap.

*Standaard: `0660`*


### `send_notification_when_document_added`

**Melding naar studenten sturen wanneer een document is toegevoegd**

Telkens wanneer iemand een nieuw item aanmaakt in de documententool, wordt een melding naar gebruikers gestuurd.

*Standaard: `false`*


### `show_default_folders`

**Toon in de documententool alle mappen met standaard meegeleverde multimediabronnen**

Multimediabestandsmappen met standaard meegeleverde bestanden, georganiseerd in categorieën video, audio, afbeelding en flashanimaties, om in hun cursussen te gebruiken. Hoewel u deze onzichtbaar maakt in de documententool, kunt u deze bronnen nog steeds gebruiken in de webeditor van het platform.

*Standaard: `true`*

### `show_documents_preview`

**Documentvoorbeeld tonen**

Het tonen van voorbeelden van de documenten in de documententool voorkomt dat een nieuwe pagina wordt geladen alleen om een document te tonen, maar kan instabiel zijn bij sommige oudere browsers of schermen met een kleinere breedte.

*Standaard: `false`*

### `show_users_folders`

**Gebruikersmappen tonen in de documententool**

Met deze optie kunt u aan docenten de mappen tonen of verbergen die het systeem genereert voor elke gebruiker die de documententool bezoekt of een bestand verzendt via de webeditor. Als u deze mappen aan de docenten toont, kunnen zij de cursisten zichtbaar maken of niet, en elke cursist een specifieke plek in de cursus geven waar zij niet alleen documenten kunnen opslaan, maar ook webpagina's kunnen aanmaken en bewerken en naar pdf exporteren, tekeningen kunnen maken, persoonlijke websjablonen kunnen maken, bestanden kunnen verzenden, en ook mappen en bestanden kunnen aanmaken, verplaatsen en verwijderen en beveiligingskopieën van hun mappen kunnen maken. Elke gebruiker van de cursus beschikt over een volledige documentbeheerder. Onthoud ook dat elke gebruiker een bestand dat zichtbaar is vanuit een willekeurige map in de documententool (ongeacht of hij of zij de eigenaar is) kan kopiëren naar zijn of haar portfolio's of het persoonlijke documentengebied van het sociale netwerk, waar het beschikbaar is zodat hij of zij het in andere cursussen kan gebruiken.

*Standaard: `true`*

### `students_download_folders`

**Cursisten toestaan mappen te downloaden**

Cursisten toestaan een volledige map vanuit de documententool te verpakken en te downloaden

*Standaard: `true`*


### `students_export2pdf`

**Cursisten toestaan webdocumenten naar PDF-formaat te exporteren in de documenten- en wiki-tools**

Deze functie is standaard ingeschakeld, maar bij misbruik door serveroverbelasting, of in specifieke leeromgevingen, kan het wenselijk zijn deze voor alle cursussen uit te schakelen.

*Standaard: `true`*

### `thematic_pdf_orientation`

**PDF-oriëntatie voor cursusvoortgang**

In de cursusvoortgangstool kunt u een PDF van de verschillende elementen afdrukken. Stel ‘portrait’ of ‘landscape’ (technische termen) in om dit te wijzigen.

*Standaard: `landscape`*


### `upload_extensions_blacklist`

**Zwarte lijst - instelling**

De zwarte lijst wordt gebruikt om bestandsextensies te filteren door elk bestand waarvan de extensie in de onderstaande zwarte lijst voorkomt te verwijderen (of te hernoemen). De extensies moeten zonder de voorafgaande punt (.) worden opgegeven en gescheiden door een puntkomma (;), zoals in het volgende voorbeeld:  exe;com;bat;scr;php. Bestanden zonder extensie worden geaccepteerd. Hoofdletters of kleine letters maken niet uit.

### `upload_extensions_list_type`

**Type filtering bij documentuploads**

Of u filtering via de zwarte lijst of de witte lijst wilt gebruiken. Zie de beschrijving van de zwarte lijst of de witte lijst hieronder voor meer details.

*Standaard: `blacklist`*


### `upload_extensions_replace_by`

**Vervangende extensie**

Voer de extensie in die u wilt gebruiken om de gevaarlijke extensies te vervangen die door het filter zijn gedetecteerd. Alleen nodig als u een filter op basis van vervanging hebt geselecteerd.

*Standaard: `dangerous`*


### `upload_extensions_skip`

**Filtergedrag (overslaan/hernoemen)**

Als u ervoor kiest om over te slaan, worden de bestanden die via de zwarte lijst of de witte lijst zijn gefilterd niet naar het systeem geüpload. Als u ervoor kiest ze te hernoemen, wordt hun extensie vervangen door de extensie die is gedefinieerd in de instelling voor extensievervanging. Let op: hernoemen biedt geen echte bescherming en kan naambotsingen veroorzaken als er meerdere bestanden met dezelfde naam maar verschillende extensies bestaan.

*Standaard: `true`*

### `upload_extensions_whitelist`

**Whitelist - instelling**

De whitelist wordt gebruikt om bestandsextensies te filteren door elk bestand te verwijderen (of te hernoemen) waarvan de extensie *NIET* in de onderstaande whitelist voorkomt. Dit wordt over het algemeen beschouwd als een veiligere, maar restrictievere benadering van filteren. De extensies moeten zonder de voorafgaande punt (.) worden opgegeven en gescheiden door een puntkomma (;), zoals in het volgende voorbeeld:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Bestanden zonder extensie worden geaccepteerd. Hoofdletters of kleine letters maken geen verschil.

### `users_copy_files`

**Gebruikers toestaan bestanden uit een cursus te kopiëren naar uw persoonlijke bestandsgebied**

Stelt gebruikers in staat bestanden uit een cursus te kopiëren naar uw persoonlijke bestandsgebied, zichtbaar via het sociaal netwerk of via de HTML-editor wanneer zij zich buiten een cursus bevinden

*Standaard: `true`*


### `video_features`

**Videofuncties**

Array van extra functies die u kunt inschakelen voor de videospeler in Chamilo. Opties omvatten 'speed', waarmee u de afspeelsnelheid van een video kunt wijzigen.