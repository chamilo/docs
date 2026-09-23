# Dokument

Dokumentverktyget är kursens filarkiv. Du kan ladda upp filer, skapa dokument i HTML-format, organisera innehåll i mappar och ge deltagarna tillgång till allt material de behöver.

## Öppna dokumentverktyget

Öppna verktyget **Dokument** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Dokument" data-size="line"> från kursens startsida. Du ser en filbläddrare som visar rotmappen i kursens dokumentbibliotek.

![Filbläddraren för dokument som visar mappar och filer med åtgärdsikoner](/.gitbook/assets/documents-file-browser.png)

## Ladda upp filer

1. Klicka på knappen **Ladda upp** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Ladda upp" data-size="line">
2. Välj en eller flera filer från din dator (du kan dra och släppa filer i uppladdningsområdet)
3. Filerna laddas upp och visas i den aktuella mappen

Chamilo stöder de flesta vanliga filtyper: PDF, kontorsdokument (.docx, .odt), presentationer (.pptx, .odp), kalkylblad (.xlsx, .ods), bilder (PNG, JPG, SVG, GIF), ljudfiler, videofiler (inklusive WEBM), HTML-filer med mera.

Vissa format kan vara förbjudna av portaladministratören via en vitlista/svartlista i säkerhetsavsnittet i administrationen.

För bättre läsbarhet för deltagarna rekommenderar vi att du laddar upp filer som en webbläsare kan visa eller öppna utan extra verktyg. Det gör kursen mer portabel och därmed mer tillgänglig för mobila enheter och mer läsbar för personer med särskilda behov.

## Skapa innehåll

Utöver att ladda upp filer kan du skapa innehåll direkt i Chamilo:

### Webbsidor

1. Klicka på **Nytt dokument**
2. Använd den rika textredigeraren för att skriva innehållet med formatering, bilder, tabeller och länkar
3. Ange en **titel** för sidan
4. Spara

Den rika textredigeraren (TinyMCE) erbjuder funktioner liknande ett ordbehandlingsprogram, bland annat:

* Textformatering (fetstil, kursiv, rubriker, listor)
* Tabeller
* Bilder (ladda upp eller länka till befintliga bilder)
* Inbäddade videor och ljud
* Länkar till andra resurser
* Redigering av HTML-källa för avancerade användare

### Generering av AI-media

När AI-hjälpare är aktiverade på plattformen kan du be AI:n att generera en **bild** eller en **kort video** för att illustrera ett stycke i dokumentet du redigerar. Markera ett stycke, öppna dialogen **Generera AI-media**, så producerar AI:n ett medieobjekt som du kan granska och infoga. Dialogen respekterar behörigheter på kursnivå och visas bara i kurser där generering av AI-media är tillåten.

### Ljudinspelning

Om webbläsaren stöder det kan du spela in ljud direkt i dokumentverktyget — användbart för att skapa ljudinstruktioner eller innehåll för språkinlärning. Detta kräver en HTTPS-konfiguration för Chamilo, eftersom ljudinspelning använder teknik som webbläsaren bara tillåter om anslutningen är säker.

## Organisera med mappar

Håll dokumentbiblioteket organiserat med mappar:

1. Klicka på **Ny mapp** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Ny mapp" data-size="line">
2. Ange ett mappnamn
3. Spara

Du kan skapa nästlade mappar för att bygga en logisk innehållshierarki (t.ex. `Module 1 > Week 1 > Readings`).

### Flytta filer

* Hitta filen i listan
* Klicka på **Flytta** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Flytta" data-size="line">
* Välj destinationsmappen
* Bekräfta

## Hantera dokument

För varje fil eller mapp kan du:

| Åtgärd | Ikon | Beskrivning |
|--------|------|-------------|
| **Redigera** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Redigera" data-size="line"> | Byt namn på filen eller redigera innehållet (för webbsidor) |
| **Ta bort** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Ta bort" data-size="line"> | Ta bort filen eller mappen |
| **Ladda ner** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Ladda ner" data-size="line"> | Ladda ner filen till din dator |
| **Synlighet** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Synlighet" data-size="line"> | Dölj eller visa filen för deltagarna |
| **Ersätt** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Ersätt" data-size="line"> | Ersätt filen med en uppdaterad version |
| **Flytta** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Flytta" data-size="line"> | Flytta till en annan mapp |

Att ersätta en fil är en viktig funktion när du använder dokument för att bygga lärstigar, eftersom ersättningen gör att dokumentet kan uppdateras utan att deltagarna förlorar den sparade förloppet för det dokumentet.

### Massåtgärder

Markera flera filer med kryssrutor och använd sedan verktygsfältet för att ta bort eller ladda ner alla markerade objekt på en gång.

## OnlyOffice-integration

Om din administratör har konfigurerat pluginet **OnlyOffice** kan du redigera Word-, Excel- och PowerPoint-filer (eller LibreOffice) direkt i webbläsaren utan att ladda ner dem. Leta efter alternativet **Redigera med OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> när du visar en fil som stöds.

Dokumenten lagras i Chamilo; OnlyOffice används endast för att **visa** eller redigera dokumenten i webbläsaren, utan att något extra verktyg behövs.

## Molnfiler

Om du använder molnlagring (Azure Blob, AWS S3 eller Google Cloud) för dina filer lagras dessa i molnet, men du kan länka till dem härifrån. Detta är transparent för dig och dina deltagare — dokumentverktyget fungerar på samma sätt oavsett lagringsbackend.

## Tips

* **Organisera tidigt** — Skapa din mappstruktur innan du laddar upp innehåll så att du inte behöver omorganisera senare. Om du har skapat andra kurser med rätt struktur kan du senare använda de kurserna som mall
* **Använd beskrivande filnamn** — Hjälp deltagarna att hitta det de behöver med tydliga, meningsfulla namn
* **Dölj pågående arbete** — Använd synlighetsväxlingen för att dölja dokument som du fortfarande förbereder
* **Länka från lärstigar** — Referera till dokument i dina lärstigar för att skapa guidade lärsekvenser
* **Kontrollera diskutrymmet** — Om din kurs har en lagringsgräns, ta bort föråldrade filer för att frigöra utrymme