# Documenten

De documententool is de bestandsopslagplaats van uw cursus. U kunt bestanden uploaden, documenten in HTML-formaat aanmaken, inhoud in mappen organiseren en cursisten toegang geven tot alle materialen die zij nodig hebben.

## De documententool openen

Open de tool **Documenten** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documenten" data-size="line"> vanaf de cursushomepagina. U ziet een bestandsbrowser die de hoofdmap van de documentenbibliotheek van uw cursus toont.

![De documentenbestandsbrowser met mappen en bestanden en actiepictogrammen](/.gitbook/assets/documents-file-browser.png)

## Bestanden uploaden

1. Klik op de knop **Uploaden** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Uploaden" data-size="line">
2. Selecteer een of meer bestanden op uw computer (u kunt bestanden naar het uploadgebied slepen)
3. De bestanden worden geüpload en verschijnen in de huidige map

Chamilo ondersteunt de meeste gangbare bestandstypen: PDF, kantoordocumenten (.docx, .odt), presentaties (.pptx, .odp), spreadsheets (.xlsx, .ods), afbeeldingen (PNG, JPG, SVG, GIF), audiobestanden, videobestanden (inclusief WEBM), HTML-bestanden en meer.

Sommige formaten kunnen door de portaalbeheerder worden verboden via een whitelist-/blacklistfilterinstelling in het beveiligingsgedeelte van de administratie.

Voor een betere leesbaarheid voor cursisten raden wij aan bestanden te uploaden die een browser kan bekijken of openen zonder extra hulpmiddelen. Dit maakt uw cursus draagbaarder en daardoor toegankelijker voor mobiele apparaten en beter leesbaar voor mensen met bijzondere behoeften.

## Inhoud aanmaken

Naast het uploaden van bestanden kunt u inhoud rechtstreeks in Chamilo aanmaken:

### Webpagina's

1. Klik op **Nieuw document**
2. Gebruik de rich-text-editor om uw inhoud te schrijven met opmaak, afbeeldingen, tabellen en koppelingen
3. Voer een **titel** in voor de pagina
4. Opslaan

De rich-text-editor (TinyMCE) biedt functies vergelijkbaar met een tekstverwerker, waaronder:

* Tekstopmaak (vet, cursief, koppen, lijsten)
* Tabellen
* Afbeeldingen (uploaden of koppelen naar bestaande afbeeldingen)
* Ingesloten video's en audio
* Koppelingen naar andere bronnen
* HTML-bronbewerking voor gevorderde gebruikers

### AI-mediageneratie

Wanneer AI-helpers op het platform zijn ingeschakeld, kunt u de AI vragen een **afbeelding** of een **korte video** te genereren om een alinea in het document dat u bewerkt te illustreren. Selecteer een alinea, open het dialoogvenster **AI-media genereren**, en de AI produceert een media-item dat u kunt beoordelen en invoegen. Het dialoogvenster houdt rekening met machtigingen op cursusniveau en verschijnt alleen in cursussen waar AI-mediageneratie is toegestaan.

### Audio-opname

Als uw browser dit ondersteunt, kunt u audio rechtstreeks in de documententool opnemen — nuttig voor het maken van audio-instructies of inhoud voor taalonderwijs. Dit vereist een HTTPS-configuratie voor Chamilo, omdat audio-opname technologie gebruikt die de browser alleen toestaat als de verbinding beveiligd is.

## Organiseren met mappen

Houd uw documentenbibliotheek georganiseerd met mappen:

1. Klik op **Nieuwe map** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nieuwe map" data-size="line">
2. Voer een mapnaam in
3. Opslaan

U kunt geneste mappen aanmaken om een logische inhoudshiërarchie op te bouwen (bijv. `Module 1 > Week 1 > Readings`).

### Bestanden verplaatsen

* Zoek uw bestand in de lijst
* Klik op **Verplaatsen** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Verplaatsen" data-size="line">
* Selecteer de doelmap
* Bevestigen

## Documenten beheren

Voor elk bestand of elke map kunt u:

| Actie | Pictogram | Beschrijving |
|--------|------|-------------|
| **Bewerken** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Bewerken" data-size="line"> | Het bestand hernoemen of de inhoud bewerken (voor webpagina's) |
| **Verwijderen** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Verwijderen" data-size="line"> | Het bestand of de map verwijderen |
| **Downloaden** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Downloaden" data-size="line"> | Het bestand naar uw computer downloaden |
| **Zichtbaarheid** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Zichtbaarheid" data-size="line"> | Het bestand voor cursisten verbergen of tonen |
| **Vervangen** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Vervangen" data-size="line"> | Het bestand vervangen door een bijgewerkte versie |
| **Verplaatsen** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Verplaatsen" data-size="line"> | Naar een andere map verplaatsen |

Het vervangen van een bestand is een belangrijke functie wanneer u documenten gebruikt om leerpaden op te bouwen, omdat het vervangen van het document het document laat vernieuwen zonder dat cursisten de voor dat document opgeslagen voortgang verliezen.

### Bulkacties

Selecteer meerdere bestanden met selectievakjes en gebruik vervolgens de werkbalk om alle geselecteerde items in één keer te verwijderen of te downloaden.

## OnlyOffice-integratie

Als uw beheerder de **OnlyOffice**-plugin heeft geconfigureerd, kunt u Word-, Excel- en PowerPoint-bestanden (of LibreOffice) rechtstreeks in de browser bewerken zonder ze te downloaden. Zoek naar de optie **Bewerken met OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> wanneer u een ondersteund bestand bekijkt.

Documenten worden opgeslagen in Chamilo; OnlyOffice wordt alleen gebruikt om de documenten in de browser te **bekijken** of te bewerken, zonder dat extra software nodig is.

## Cloudbestanden

Als u cloudopslag (Azure Blob, AWS S3 of Google Cloud) voor uw bestanden gebruikt, worden deze in de cloud opgeslagen, maar u kunt ze van hieruit koppelen. Dit is transparant voor u en uw cursisten — de documententool werkt op dezelfde manier, ongeacht de opslagbackend.

## Tips

* **Organiseer vroegtijdig** — Maak uw mappenstructuur aan voordat u inhoud uploadt, zodat u later niet hoeft te herorganiseren. Als u andere cursussen met de juiste structuur hebt aangemaakt, kunt u die cursussen later als sjabloon gebruiken
* **Gebruik beschrijvende bestandsnamen** — Help cursisten te vinden wat ze nodig hebben met duidelijke, betekenisvolle namen
* **Verberg werk in uitvoering** — Gebruik de zichtbaarheidsschakelaar om documenten te verbergen die u nog aan het voorbereiden bent
* **Koppel vanuit leerpaden** — Verwijs naar documenten binnen uw leerpaden om begeleide leerreeksen te maken
* **Controleer het schijfquotum** — Als uw cursus een opslaglimiet heeft, verwijder dan verouderde bestanden om ruimte vrij te maken