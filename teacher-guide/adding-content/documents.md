# Documenten

De documententool is de bestandsopslag van uw cursus. U kunt bestanden uploaden, documenten in HTML-formaat maken, inhoud in mappen organiseren en leerlingen toegang geven tot alle benodigde materialen.

## Toegang tot de Documententool

Open de **Documenten** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documenten" data-size="line"> tool vanaf de cursusstartpagina. U ziet een bestandsbrowser die de hoofdfolder van de documentbibliotheek van uw cursus weergeeft.

![De documentenbestandsbrowser met mappen en bestanden met actie-iconen](/.gitbook/assets/documents-file-browser.png)

## Bestanden Uploaden

1. Klik op de **Upload** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Upload" data-size="line"> knop
2. Selecteer een of meer bestanden van uw computer (u kunt bestanden naar het uploadgebied slepen en neerzetten)
3. De bestanden worden geüpload en verschijnen in de huidige map

Chamilo ondersteunt de meeste gangbare bestandstypen: PDF, kantoordocumenten (.docx, .odt), presentaties (.pptx, .odp), spreadsheets (.xlsx, .ods), afbeeldingen (PNG, JPG, SVG, GIF), audiobestanden, videobestanden (inclusief WEBM), HTML-bestanden en meer.

Sommige formaten kunnen door de portaalbeheerder worden verboden via een whitelist/blacklist-filterinstelling in de beveiligingssectie van de administratie.

Voor een betere leesbaarheid door leerlingen raden we aan om bestanden te uploaden die een browser kan bekijken of openen zonder extra tools. Dit maakt uw cursus draagbaarder en daardoor toegankelijker voor mobiele apparaten en beter leesbaar voor mensen met speciale behoeften.

## Inhoud Maken

Naast het uploaden van bestanden kunt u ook direct inhoud maken in Chamilo:

### Webpagina's

1. Klik op **Nieuw document**
2. Gebruik de rich-text editor om uw inhoud te schrijven met opmaak, afbeeldingen, tabellen en links
3. Voer een **titel** in voor de pagina
4. Sla op

De rich-text editor (TinyMCE) biedt functies vergelijkbaar met een tekstverwerker, waaronder:

* Tekstopmaak (vet, cursief, koppen, lijsten)
* Tabellen
* Afbeeldingen (uploaden of koppelen aan bestaande afbeeldingen)
* Ingebedde video's en audio
* Links naar andere bronnen
* HTML-bronbewerking voor gevorderde gebruikers

### AI-mediageneratie

Wanneer AI-helpers zijn ingeschakeld op het platform, kunt u de AI vragen om een **afbeelding** of een **korte video** te genereren om een alinea in het document dat u bewerkt te illustreren. Selecteer een alinea, open het dialoogvenster **AI-media genereren**, en de AI zal een media-item produceren dat u kunt bekijken en invoegen. Het dialoogvenster respecteert de cursusrechten en verschijnt alleen in cursussen waar AI-mediageneratie is toegestaan.

### Audio-opname

Als uw browser dit ondersteunt, kunt u direct audio opnemen binnen de documententool — handig voor het maken van audio-instructies of inhoud voor taalonderwijs. Dit vereist een HTTPS-configuratie voor Chamilo, aangezien audio-opname gebruikmaakt van technologie die de browser alleen toestaat als de verbinding beveiligd is.

## Organiseren met Mappen

Houd uw documentbibliotheek georganiseerd met behulp van mappen:

1. Klik op **Nieuwe map** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Nieuwe map" data-size="line">
2. Voer een mapnaam in
3. Sla op

U kunt geneste mappen maken om een logische inhoudshiërarchie op te bouwen (bijvoorbeeld `Module 1 > Week 1 > Lezingen`).

### Bestanden Verplaatsen

* Zoek uw bestand in de lijst
* Klik op **Verplaatsen** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Verplaatsen" data-size="line">
* Selecteer de doelmap
* Bevestig

## Documenten Beheren

Voor elk bestand of elke map kunt u:

| Actie | Icoon | Beschrijving |
|-------|-------|--------------|
| **Bewerken** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Bewerken" data-size="line"> | Hernoem het bestand of bewerk de inhoud (voor webpagina's) |
| **Verwijderen** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Verwijderen" data-size="line"> | Verwijder het bestand of de map |
| **Downloaden** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Downloaden" data-size="line"> | Download het bestand naar uw computer |
| **Zichtbaarheid** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Zichtbaarheid" data-size="line"> | Verberg of toon het bestand voor leerlingen |
| **Vervangen** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Vervangen" data-size="line"> | Vervang het bestand door een bijgewerkte versie |
| **Verplaatsen** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Verplaatsen" data-size="line"> | Verplaats naar een andere map |

Het vervangen van een bestand is een belangrijke functie wanneer u documenten gebruikt om leerpaden te bouwen, omdat het vervangen van het document ervoor zorgt dat het document kan worden vernieuwd zonder dat leerlingen de voortgang die voor dat document is opgeslagen, verliezen.

### Bulkacties

Selecteer meerdere bestanden met behulp van selectievakjes en gebruik vervolgens de werkbalk om alle geselecteerde items in één keer te verwijderen of te downloaden.

---
## OnlyOffice Integratie

Als uw beheerder de **OnlyOffice** plugin heeft geconfigureerd, kunt u Word-, Excel- en PowerPoint-bestanden (of LibreOffice-bestanden) rechtstreeks in de browser bewerken zonder ze te downloaden. Zoek naar de optie **Bewerken met OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> wanneer u een ondersteund bestand bekijkt.

Documenten worden opgeslagen in Chamilo, OnlyOffice wordt alleen gebruikt om de documenten in de browser te **bekijken** of te bewerken, zonder dat er extra hulpmiddelen nodig zijn.

## Cloudbestanden

Als u cloudopslag gebruikt (Azure Blob, AWS S3 of Google Cloud) voor uw bestanden, worden deze in de cloud opgeslagen, maar u kunt ze vanaf hier koppelen. Dit is transparant voor u en uw leerlingen — het documentgereedschap werkt op dezelfde manier, ongeacht de opslagbackend.

## Tips

* **Organiseer vroegtijdig** — Maak uw mapstructuur aan voordat u inhoud uploadt, zodat u later niet hoeft te reorganiseren. Als u andere cursussen hebt gemaakt met de juiste structuur, kunt u die cursussen later als sjabloon gebruiken
* **Gebruik beschrijvende bestandsnamen** — Help leerlingen om te vinden wat ze nodig hebben met duidelijke, betekenisvolle namen
* **Verberg werk in uitvoering** — Gebruik de zichtbaarheidsschakelaar om documenten die u nog aan het voorbereiden bent te verbergen
* **Koppel vanuit leerpaden** — Verwijs naar documenten binnen uw leerpaden om begeleide leervolgordes te creëren
* **Controleer de schijfquota** — Als uw cursus een opslaglimiet heeft, verwijder dan verouderde bestanden om ruimte vrij te maken