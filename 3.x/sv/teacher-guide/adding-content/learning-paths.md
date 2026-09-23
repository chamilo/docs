# Inlärningsvägar

Inlärningsvägar låter dig skapa strukturerade sekvenser av lärandeaktiviteter. En inlärningsväg guidar dina deltagare genom en specifik ordning av dokument, övningar, länkar och andra resurser, med valfria förkunskapskrav och uppföljning av framsteg.

Detta verktyg är troligen det mest använda kursverktyget, eftersom det fungerar som en kompositör för många andra verktyg och i hög grad kan vara det ***enda*** verktyg som deltagarna möter.

## Varför använda inlärningsvägar?

Inlärningsvägar är användbara när du vill:

* **Styra ordningen** för hur innehållet konsumeras — se till att deltagarna slutför grundläggande material innan de går vidare
* **Följa upp framsteg** — se exakt var varje deltagare befinner sig i sekvensen
* **Ange förkunskapskrav** — kräva att deltagarna klarar en övning innan de får tillgång till nästa avsnitt
* **Tilldela slutförande** — koppla slutförande av inlärningsvägen till betygsboken och intyg
* **Paketera innehåll** — skapa fristående lärandemoduler som deltagarna kan arbeta igenom i sin egen takt

## Skapa en inlärningsväg

1. Öppna verktyget **Inlärningsvägar** <img src="../../.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Inlärningsvägar" data-size="line"> från kursens startsida
2. Klicka på **Skapa en inlärningsväg**
3. Ange en **titel** och valfri beskrivning
4. Spara — du tas till redigeraren för inlärningsvägen

## Redigeraren för inlärningsvägar

![Redigeraren för inlärningsvägar med objektträdet till vänster och förhandsgranskning av innehållet till höger](../../.gitbook/assets/learning-path-editor.png)

Redigeraren har två huvudområden:

* **Vänsterpanel** — Listan över objekt (steg) i inlärningsvägen, visad som en trädstruktur
* **Högerpanel** — Innehållet i det valda objektet

### Lägga till objekt

Klicka på **Lägg till ett objekt** och välj vad som ska läggas till:

| Objekttyp | Beskrivning |
|-----------|-------------|
| **Avsnitt** | En rubrik som grupperar relaterade objekt (som en kapitelrubrik). Avsnitt innehåller inte själva innehållet. |
| **Dokument** | En fil eller webbsida från kursens Dokument-verktyg |
| **Övning** | Ett quiz eller ett test från Övningar-verktyget |
| **Länk** | En extern URL |
| **Uppgift** | En studentpublikation från Uppgifter-verktyget |
| **Forum** | En länk till ett kursforum |
| **Enkät** | En länk till en enkät |
| **Intyg** | En särskild sida för att utlösa generering av ett slutförandeintyg eller tilldelning av färdigheter |

### Organisera objekt

* **Dra och släpp** objekt för att ändra ordning
* **Kapsla objekt** under avsnitt genom att dra dem åt höger
* **Ta bort** objekt som du inte längre behöver

### Ange förkunskapskrav

Förkunskapskrav säkerställer att deltagarna slutför vissa steg innan de får tillgång till andra:

1. Välj ett objekt i inlärningsvägen
2. Öppna dess inställningar för **förkunskapskrav**
3. Välj vilket eller vilka föregående objekt som måste slutföras först
4. För övningar kan du kräva ett **minimipoäng** (t.ex. "Måste ha minst 70 % på Quiz 1 innan tillgång till Modul 2")

## Deltagarupplevelse

När en deltagare öppnar en inlärningsväg:

* Ser de listan över objekt i vänsterpanelen
* Slutförda objekt markeras med en bock
* Objekt med ouppfyllda förkunskapskrav är låsta
* Framsteg spåras automatiskt — om en deltagare lämnar och kommer tillbaka fortsätter de där de slutade
* En förloppsindikator visar den övergripande slutförandeprocenten

## SCORM-innehåll

Chamilos verktyg för inlärningsvägar kan importera **SCORM 1.2**-paket — den mest använda e-lärandestandarden. Ladda upp en SCORM-ZIP-fil så skapar Chamilo en inlärningsväg av den och spårar framsteg och poäng enligt SCORM-specifikationen.

Så här importerar du ett SCORM-paket:

1. I verktyget Inlärningsvägar öppnar du åtgärdsmenyn och klickar på **Ladda upp**
2. Ladda upp ZIP-filen
3. Chamilo packar upp och skapar inlärningsvägen automatiskt

### CMI5- / xAPI-paket

CMI5-paket (den moderna xAPI-baserade efterföljaren till SCORM) stöds via pluginet **XApi**. När pluginet har aktiverats av din administratör kan du importera ett CMI5-paket och deltagarna kan starta det från kursen; deras statements vidarebefordras till den konfigurerade Learning Record Store.

## Innehållsförfattande med C-Studio

*Tillgängligt om din administratör har aktiverat pluginet C-Studio.*

C-Studio lägger till en inbyggd visuell redigerare med dra-och-släpp för att skapa interaktivt innehåll direkt i en inlärningsväg — ett alternativ till att importera ett SCORM-paket när du inte har (eller inte vill lära dig) ett separat författarverktyg som Articulate eller iSpring. Du bygger innehållet sida för sida direkt i Chamilo, och det lagras och spåras som vilket annat objekt i en inlärningsväg som helst.

### Starta ett C-Studio-projekt

När insticksprogrammet är aktivt visar listan över lärstigar en extra knapp bredvid den vanliga åtgärdsmenyn, märkt med ett "+" och ett verktygstips "Studio Tools":

![Listan över lärstigar som visar knappen C-Studio "Studio Tools" bredvid den vanliga åtgärdsmenyn](../../.gitbook/assets/cstudio-lp-button.png)

Klicka på den för att börja. Du ombeds skapa ett nytt projekt från grunden eller importera ett befintligt:

![Startskärmen i C-Studio som erbjuder att skapa ett nytt projekt eller importera ett befintligt](../../.gitbook/assets/cstudio-start-screen.png)

Denna skärm är för närvarande endast tillgänglig på franska, oavsett plattformens eller kursens språk — en känd begränsning i den insticksprogramversion som används. Ge projektet en titel så öppnas det direkt i redigeraren.

### Redigeraren

![Den visuella redigeraren i C-Studio, som visar sidarbetsytan, verktygspaletten till höger och projektpanelen till vänster](../../.gitbook/assets/cstudio-editor.png)

Redigeraren är en visuell sid-för-sid-byggare:

* **Vänsterpanel** — projektets sidor, med ett "+" för att lägga till fler, och ett avsnitt **Tools** längst ned (Clean data, Preview, Colors, Options, Quit)
* **Central arbetsyta** — sidan du bygger; klicka på valfritt element för att redigera det på plats
* **Högerpanel** — komponentpaletten, som dras till arbetsytan

Paletten täcker grundläggande byggstenar (kolumner, bilder, ljud, titlar, text, knappar, kort) samt flera interaktiva övningstyper: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** och **Sort paragraphs**, plus ett **iframe**-block för att bädda in externt innehåll och ett **Quiz**-block.

### Språk

C-Studios eget gränssnitt kan som standard vara franska första gången du öppnar det, oberoende av Chamilo-gränssnittets språk eller kursens språk. Om så är fallet, gå till **File > UI language** och välj ditt språk — redigeraren läses om omedelbart och kommer ihåg ditt val därefter.

![Menyn File öppen, som visar alternativet "UI language"](../../.gitbook/assets/cstudio-file-menu.png)

### Spara och exportera

Använd **File > Save** medan du arbetar. **File > Export...** paketerar projektet som en SCORM-fil som du kan hämta, säkerhetskopiera eller återanvända någon annanstans via **Import...**. **File > Quit** tar dig tillbaka till listan över lärstigar, där ditt C-Studio-projekt nu visas som ett vanligt objekt.

## Inställningar för lärstig

Konfigurera hur lärstigen beter sig:

| Inställning | Beskrivning |
|---------|-------------|
| **Synlighet** | Dölj eller visa lärstigen för deltagare |
| **Förkunskapskrav** | Kräv att andra lärstigar slutförs innan denna |
| **Autostart** | Öppna denna lärstig automatiskt när deltagare går in i kursen |
| **Ackumulerad SCORM-tid** | Om tid ska ackumuleras över flera sessioner |

## Koppling till betygsboken

Du kan inkludera slutförande av lärstig som en bedömd aktivitet i betygsboken. Detta gör att framsteg i lärstigen kan bidra till deltagarens samlade kursbetyg och behörighet till intyg.

## Använda AI

Om administratören har aktiverat AI-assisterad generering av lärstigar hittar du ett AI-generatoralternativ i rullgardinsmenyn för åtgärder. Ge AI:n så precis kontext som du vill att lärstigen ska ha, ange ett antal sidor och ett ungefärligt antal ord per sida, och tala om ifall du vill fylla den med tester och starta. Några minuter senare tittar du på en komplett, textbaserad lärstig.

Redigera dokumenten för att generera illustrationer med mer AI, så har du bara en granskning kvar innan du kan dela den med dina deltagare.

## Tips

* **Börja med en disposition** — Planera avsnitt och objekt innan du bygger stigen
* **Använd avsnitt som kapitel** — Gruppera relaterade objekt under avsnittsrubriker för tydlighet
* **Sätt förkunskapskrav för bedömningar** — Kräv att deltagare studerar innehållet innan de tar ett quiz
* **Blanda innehållstyper** — Kombinera läsmaterial, videor, interaktiva övningar och externa resurser för en engagerande lärupplevelse
* **Kontrollera deltagarvyn** — Använd funktionen Student View för att uppleva lärstigen som en deltagare skulle göra
* **Använd SCORM för interaktivitet** — Om du har tillgång till SCORM-författarverktyg (som Articulate, iSpring eller liknande), skapa rikt interaktivt innehåll och importera det till Chamilo. Om administratören har aktiverat C-Studio-insticksprogrammet kan du bygga liknande interaktivt innehåll direkt i Chamilo i stället — se [Innehållsförfattande med C-Studio](#content-authoring-with-c-studio) ovan