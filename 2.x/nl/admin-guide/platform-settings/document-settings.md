# Documentinstellingen

Gedrag van de cursus **Documenten**-tool — uploads, toegestane extensies, delen en sjablonen.

Toegang tot deze instellingen via **Beheer > Configuratie-instellingen > Documenten**. Deze categorie bevat **29 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `access_url_specific_files`

**URL-specifieke bestanden inschakelen**

Wanneer deze functie is ingeschakeld op een multi-URL-configuratie, kunt u naar de hoofd-URL gaan en URL-specifieke versies van elk bestand (in de documententool) aanbieden. Het originele bestand wordt vervangen door de alternatieve versie wanneer het vanaf een andere URL wordt bekeken. Dit stelt u in staat om elke URL verder aan te passen, terwijl u profiteert van het hergebruik van dezelfde cursussen.

*Standaard: `false`*

### `default_document_quotum`

**Standaard harde schijfruimte**

Wat is de beschikbare schijfruimte voor een cursus? U kunt de quota voor een specifieke cursus overschrijven via: platformbeheer > Cursussen > wijzigen

*Standaard: `1000`*

### `default_group_quotum`

**Beschikbare schijfruimte voor groepen**

Wat is de standaard beschikbare harde schijfruimte voor de documententool van groepen?

*Standaard: `250`*

### `documents_custom_cloud_link_list`

**Strikte hostlijst instellen voor cloudlinks**

De documententool kan links naar bestanden in de cloud integreren. De lijst met cloudservices is beperkt tot een hardcoded lijst, maar u kunt de ‘links’-array definiëren die een lijst met uw eigen services/URL's zal bevatten. De hier gedefinieerde lijst vervangt de standaardlijst.

### `documents_default_visibility_defined_in_course`

**Documentzichtbaarheid gedefinieerd in cursus**

De standaard documentzichtbaarheid voor alle cursussen

*Standaard: `false`*

### `documents_hide_download_icon`

**Downloadpictogram voor documenten verbergen**

Verberg het downloadpictogram voor gebruikers in de documententool.

*Standaard: `false`*

### `enable_x_sendfile_headers`

**X-sendfile-headers inschakelen**

Schakel dit in als u X-sendfile op webserverniveau hebt ingeschakeld en u de benodigde headers wilt toevoegen zodat browsers deze oppikken.

*Standaard: `false`*

### `group_category_document_access`

**Deelopties inschakelen voor documenten binnen groepscategorie**

Wanneer ingeschakeld, kunnen beheerders toegangs- en deelrechten voor documentgroepen per categorie instellen.

*Standaard: `false`*

### `group_document_access`

**Deelopties inschakelen voor groepsdocumenten**

Wanneer ingeschakeld, kunnen deel- en toegangsrechten op groepsniveau worden geconfigureerd.

*Standaard: `false`*

### `pdf_export_watermark_by_course`

**Watermerkdefinitie per cursus inschakelen**

Wanneer deze optie is ingeschakeld, kunnen docenten hun eigen watermerk definiëren voor de documenten in hun cursussen.

*Standaard: `false`*

### `pdf_export_watermark_enable`

**Watermerk inschakelen bij PDF-export**

Door deze optie in te schakelen, kunt u een afbeelding of tekst uploaden die automatisch als watermerk wordt toegevoegd aan alle PDF-exports van documenten op het systeem.

*Standaard: `false`*

### `pdf_export_watermark_text`

**PDF-watermerktekst**

Deze tekst wordt als watermerk toegevoegd aan de documenten die als PDF worden geëxporteerd.

### `permanently_remove_deleted_files`

**Verwijderde bestanden kunnen niet worden hersteld**

Het verwijderen van een bestand in de documententool verwijdert het permanent. Het bestand kan niet worden hersteld.

*Standaard: `false`*

### `permissions_for_new_directories`

**Rechten voor nieuwe mappen**

De mogelijkheid om de rechteninstellingen te definiëren die aan elke nieuw aangemaakte map worden toegewezen, helpt u de beveiliging te verbeteren tegen aanvallen van hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0770) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te bieden. Het opgegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Anderen met Lees-Schrijf-Uitvoer-rechten.

*Standaard: `0770`*

### `permissions_for_new_files`

**Rechten voor nieuwe bestanden**

De mogelijkheid om de rechteninstellingen te definiëren die aan elk nieuw aangemaakt bestand worden toegewezen, helpt u de beveiliging te verbeteren tegen aanvallen van hackers die gevaarlijke inhoud naar uw portaal uploaden. De standaardinstelling (0550) zou voldoende moeten zijn om uw server een redelijk beschermingsniveau te bieden. Het opgegeven formaat gebruikt de UNIX-terminologie van Eigenaar-Groep-Anderen met Lees-Schrijf-Uitvoer-rechten. Als u Oogie gebruikt, zorg er dan voor dat de gebruiker die LibreOffice start, bestanden kan schrijven in de cursusmap.

*Standaard: `0660`*

### `send_notification_when_document_added`

**Melding sturen naar studenten bij toevoeging van document**

Stuur een melding naar gebruikers telkens wanneer iemand een nieuw item aanmaakt in de documententool.

*Standaard: `false`*

---
### `show_default_folders`

**Toon in de documententool alle mappen met standaard meegeleverde multimediamiddelen**

Mappen met multimediabestanden die standaard worden meegeleverd, georganiseerd in categorieën zoals video, audio, afbeelding en flash-animaties, om te gebruiken in hun cursussen. Hoewel u deze mappen onzichtbaar kunt maken in de documententool, kunt u deze bronnen nog steeds gebruiken in de web-editor van het platform.

*Standaard: `true`*

### `show_documents_preview`

**Toon documentvoorvertoning**

Het tonen van voorvertoningen van documenten in de documententool voorkomt dat een nieuwe pagina wordt geladen om een document te bekijken, maar kan instabiliteit veroorzaken bij sommige oudere browsers of schermen met een kleinere breedte.

*Standaard: `false`*

### `show_users_folders`

**Toon gebruikersmappen in de documententool**

Met deze optie kunt u bepalen of docenten de mappen zien die het systeem genereert voor elke gebruiker die de documententool bezoekt of een bestand verzendt via de web-editor. Als u deze mappen aan docenten toont, kunnen zij deze al dan niet zichtbaar maken voor de leerlingen en elke leerling een specifieke plek in de cursus geven waar ze niet alleen documenten kunnen opslaan, maar ook webpagina's kunnen maken en bewerken, exporteren naar pdf, tekeningen maken, persoonlijke websjablonen maken, bestanden verzenden, en mappen en bestanden aanmaken, verplaatsen, verwijderen en beveiligingskopieën maken van hun mappen. Elke cursusgebruiker heeft een volledige documentbeheerder. Houd er ook rekening mee dat elke gebruiker een bestand dat zichtbaar is in een map in de documententool (ongeacht de eigenaar) kan kopiëren naar zijn/haar portfolio of persoonlijke documentengebied in het sociale netwerk, waardoor het beschikbaar wordt voor gebruik in andere cursussen.

*Standaard: `true`*

### `students_download_folders`

**Sta leerlingen toe om mappen te downloaden**

Sta leerlingen toe om een volledige map uit de documententool te verpakken en te downloaden.

*Standaard: `true`*

### `students_export2pdf`

**Sta leerlingen toe om webdocumenten naar PDF-formaat te exporteren in de documenten- en wiki-tools**

Deze functie is standaard ingeschakeld, maar in geval van overbelasting van de server of misbruik, of in specifieke leeromgevingen, wilt u deze mogelijk uitschakelen voor alle cursussen.

*Standaard: `true`*

### `thematic_pdf_orientation`

**PDF-oriëntatie voor cursusvoortgang**

In de tool voor cursusvoortgang kunt u een PDF afdrukken van de verschillende elementen. Stel ‘portrait’ of ‘landscape’ (technische termen) in om dit te wijzigen.

*Standaard: `landscape`*

### `upload_extensions_blacklist`

**Zwarte lijst - instelling**

De zwarte lijst wordt gebruikt om bestandsextensies te filteren door bestanden te verwijderen (of hernoemen) waarvan de extensie voorkomt in de onderstaande zwarte lijst. De extensies moeten worden vermeld zonder de voorafgaande punt (.) en gescheiden door een puntkomma (;) zoals in het volgende voorbeeld: exe;com;bat;scr;php. Bestanden zonder extensie worden geaccepteerd. Hoofdlettergebruik (hoofdletters/kleine letters) maakt geen verschil.

### `upload_extensions_list_type`

**Type filtering bij het uploaden van documenten**

Of u nu de zwarte lijst of witte lijst filtering wilt gebruiken. Zie de beschrijving van de zwarte lijst of witte lijst hieronder voor meer details.

*Standaard: `blacklist`*

### `upload_extensions_replace_by`

**Vervangende extensie**

Voer de extensie in die u wilt gebruiken om gevaarlijke extensies die door het filter worden gedetecteerd te vervangen. Alleen nodig als u een filter met vervanging hebt geselecteerd.

*Standaard: `dangerous`*

### `upload_extensions_skip`

**Filtergedrag (overslaan/hernoemen)**

Als u ervoor kiest om over te slaan, worden de bestanden die door de zwarte lijst of witte lijst worden gefilterd niet geüpload naar het systeem. Als u ervoor kiest om ze te hernoemen, wordt hun extensie vervangen door de extensie die is gedefinieerd in de instelling voor extensievervanging. Houd er rekening mee dat hernoemen u niet echt beschermt en naamconflicten kan veroorzaken als er meerdere bestanden met dezelfde naam maar verschillende extensies bestaan.

*Standaard: `true`*

### `upload_extensions_whitelist`

**Witte lijst - instelling**

De witte lijst wordt gebruikt om bestandsextensies te filteren door bestanden te verwijderen (of hernoemen) waarvan de extensie *NIET* voorkomt in de onderstaande witte lijst. Dit wordt over het algemeen beschouwd als een veiligere maar meer beperkende benadering van filtering. De extensies moeten worden vermeld zonder de voorafgaande punt (.) en gescheiden door een puntkomma (;) zoals in het volgende voorbeeld: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Bestanden zonder extensie worden geaccepteerd. Hoofdlettergebruik (hoofdletters/kleine letters) maakt geen verschil.

### `users_copy_files`

**Sta gebruikers toe om bestanden van een cursus te kopiëren naar hun persoonlijke bestandsgebied**

Hiermee kunnen gebruikers bestanden van een cursus kopiëren naar hun persoonlijke bestandsgebied, zichtbaar via het sociale netwerk of via de HTML-editor wanneer ze zich buiten een cursus bevinden.

*Standaard: `true`*

### `video_features`

**Videofuncties**

Array van extra functies die u kunt inschakelen voor de videospeler in Chamilo. Opties omvatten 'speed', waarmee u de afspeelsnelheid van een video kunt wijzigen.