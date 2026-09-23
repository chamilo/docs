# Dokumenter

Dokumentværktøjet er kursets filarkiv. Du kan uploade filer, oprette dokumenter i HTML-format, organisere indhold i mapper og give kursister adgang til alt det materiale, de har brug for.

## Adgang til dokumentværktøjet

Åbn værktøjet **Dokumenter** <img src="../../.gitbook/assets/icons/mdi-bookshelf.svg" alt="Dokumenter" data-size="line"> fra kursets startside. Du vil se en filbrowser, der viser rodmappe i kursets dokumentbibliotek.

![Filbrowseren for dokumenter, der viser mapper og filer med handlingsikoner](../../.gitbook/assets/documents-file-browser.png)

## Upload af filer

1. Klik på knappen **Upload** <img src="../../.gitbook/assets/icons/mdi-upload.svg" alt="Upload" data-size="line">
2. Vælg en eller flere filer fra din computer (du kan trække og slippe filer i uploadområdet)
3. Filerne uploades og vises i den aktuelle mappe

Chamilo understøtter de fleste almindelige filtyper: PDF, kontordokumenter (.docx, .odt), præsentationer (.pptx, .odp), regneark (.xlsx, .ods), billeder (PNG, JPG, SVG, GIF), lydfiler, videofiler (herunder WEBM), HTML-filer og mere.

Nogle formater kan være forbudt af portaladministratoren via en whitelist/blacklist-filtreringsindstilling i sikkerhedssektionen i administrationen.

For bedre læsbarhed for kursister anbefaler vi at uploade filer, som en browser kan vise eller åbne uden ekstra værktøjer. Det gør kurset mere portabelt og dermed mere tilgængeligt på mobile enheder og mere læsbart for personer med særlige behov.

## Oprettelse af indhold

Ud over at uploade filer kan du oprette indhold direkte i Chamilo:

### Websider

1. Klik på **Nyt dokument**
2. Brug rich-text-editoren til at skrive dit indhold med formatering, billeder, tabeller og links
3. Angiv en **titel** til siden
4. Gem

Rich-text-editoren (TinyMCE) giver funktioner, der minder om et tekstbehandlingsprogram, herunder:

* Tekstformatering (fed, kursiv, overskrifter, lister)
* Tabeller
* Billeder (upload eller link til eksisterende billeder)
* Indlejrede videoer og lyd
* Links til andre ressourcer
* Redigering af HTML-kilde for avancerede brugere

### AI-mediagenerering

Når AI-hjælpere er aktiveret på platformen, kan du bede AI'en om at generere et **billede** eller en **kort video** til at illustrere et afsnit i det dokument, du redigerer. Markér et afsnit, åbn dialogen **Generer AI-medie**, og AI'en producerer et medieelement, som du kan gennemgå og indsætte. Dialogen respekterer tilladelser på kursusniveau og vises kun i kurser, hvor AI-mediagenerering er tilladt.

### Lydoptagelse

Hvis din browser understøtter det, kan du optage lyd direkte i dokumentværktøjet — nyttigt til at oprette lydinstruktioner eller indhold til sprogundervisning. Dette kræver en HTTPS-konfiguration for Chamilo, da lydoptagelse bruger teknologi, som browseren kun tillader, hvis forbindelsen er sikker.

## Organisering med mapper

Hold dokumentbiblioteket organiseret ved hjælp af mapper:

1. Klik på **Ny mappe** <img src="../../.gitbook/assets/icons/mdi-folder-plus.svg" alt="Ny mappe" data-size="line">
2. Angiv et mappenavn
3. Gem

Du kan oprette indlejrede mapper for at opbygge et logisk indholdshierarki (f.eks. `Module 1 > Week 1 > Readings`).

### Flytning af filer

* Find filen i listen
* Klik på **Flyt** <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Flyt" data-size="line">
* Vælg destinationsmappen
* Bekræft

## Administration af dokumenter

For hver fil eller mappe kan du:

| Handling | Ikon | Beskrivelse |
|--------|------|-------------|
| **Rediger** | <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Rediger" data-size="line"> | Omdøb filen eller rediger dens indhold (for websider) |
| **Slet** | <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Slet" data-size="line"> | Fjern filen eller mappen |
| **Download** | <img src="../../.gitbook/assets/icons/mdi-download-box.svg" alt="Download" data-size="line"> | Download filen til din computer |
| **Synlighed** | <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Synlighed" data-size="line"> | Skjul eller vis filen for kursister |
| **Erstat** | <img src="../../.gitbook/assets/icons/mdi-file-replace.svg" alt="Erstat" data-size="line"> | Erstat filen med en opdateret version |
| **Flyt** | <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Flyt" data-size="line"> | Flyt til en anden mappe |

At erstatte en fil er en vigtig funktion, når du bruger dokumenter til at opbygge læringsstier, da erstatning af dokumentet gør det muligt at opdatere dokumentet, uden at kursister mister den fremskridt, der er gemt for det dokument.

### Massehandlinger

Markér flere filer med afkrydsningsfelter, og brug derefter værktøjslinjen til at slette eller downloade alle de valgte elementer på én gang.

## OnlyOffice-integration

Hvis din administrator har konfigureret **OnlyOffice**-pluginnet, kan du redigere Word-, Excel- og PowerPoint-filer (eller LibreOffice) direkte i browseren uden at downloade dem. Se efter indstillingen **Rediger med OnlyOffice** <img src="../../.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line">, når du vises en understøttet fil.

Dokumenter gemmes i Chamilo; OnlyOffice bruges kun til at **vise** eller redigere dokumenterne i browseren, uden behov for noget ekstra værktøj.

## Cloud-filer

Hvis du bruger cloud-lagring (Azure Blob, AWS S3 eller Google Cloud) til dine filer, gemmes disse i skyen, men du kan linke til dem herfra. Dette er gennemsigtigt for dig og dine kursister — dokumentværktøjet fungerer på samme måde uanset lagringsbackend.

## Tips

* **Organiser tidligt** — Opret din mappestruktur, før du uploader indhold, så du ikke skal omorganisere senere. Hvis du har oprettet andre kurser med den rigtige struktur, kan du senere bruge disse kurser som skabelon
* **Brug beskrivende filnavne** — Hjælp kursisterne med at finde det, de har brug for, med klare, meningsfulde navne
* **Skjul arbejde under udarbejdelse** — Brug synlighedskontakten til at skjule dokumenter, du stadig forbereder
* **Link fra læringsstier** — Referér dokumenter i dine læringsstier for at oprette guidede læringsforløb
* **Tjek diskkvoten** — Hvis dit kursus har en lagringsgrænse, skal du fjerne forældede filer for at frigøre plads