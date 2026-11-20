# Övningar

Verktyget för övningar (även kallat "tester") låter dig skapa quiz och tentor med automatisk rättning. Chamilo stöder ett stort antal frågetyper, från enkla flervalsfrågor till interaktiva hotspot-frågor.

## Skapa en övning

1. Öppna verktyget **Övningar** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Övningar" data-size="line"> från kurssidan
2. Klicka på **Ny övning**
3. Ange en **titel** och valfri **beskrivning**
4. Konfigurera övningsinställningarna (se nedan)
5. Spara och lägg sedan till frågor

## Övningsinställningar

![Panelen för övningsinställningar med alternativ för visning, tid, försök och återkoppling](/.gitbook/assets/exercise-settings.png)

### Visning och navigering

| Inställning | Alternativ | Beskrivning |
|---------|---------|-------------|
| **Frågelayout** | Alla på en sida / En per sida | Visa alla frågor samtidigt eller en i taget |
| **Dölj frågetitlar** | Ja / Nej | Om frågetitlar ska visas för deltagarna |
| **Visa föregående-knapp** | Ja / Nej | Tillåt deltagare att gå tillbaka till föregående frågor |
| **Förhindra bakåtnavigering** | Ja / Nej | Tvinga deltagare att svara i ordning utan att gå tillbaka |

### Tid och tillgänglighet

| Inställning | Beskrivning |
|---------|-------------|
| **Tidsgräns** | Maximal tid (i minuter) för att slutföra övningen. En nedräkningstimer visas för deltagaren |
| **Startdatum** | När övningen blir tillgänglig för deltagarna |
| **Slutdatum** | När övningen slutar vara tillgänglig |

### Försök och poängsättning

| Inställning | Beskrivning |
|---------|-------------|
| **Maximalt antal försök** | Hur många gånger en deltagare kan göra övningen (0 = obegränsat) |
| **Godkänd procent** | Minsta poäng för att bli godkänd (t.ex. 70 %). Deltagare som inte når denna tröskel ser ett underkänt-meddelande |
| **Sprid negativ poängsättning** | Om negativa poäng på enskilda frågor ska sänka totalpoängen under noll |

### Återkoppling

| Inställning | Alternativ |
|---------|---------|
| **I slutet** | Visa resultat och korrekta svar efter att deltagaren skickat in |
| **Omedelbar** | Visa återkoppling efter varje fråga (användbart för lärandeövningar) |
| **Tentamensläge** | Visa ingen återkoppling eller resultat |

### Resultatvisning

Styr vad deltagarna ser efter att ha slutfört övningen:

* Visa poäng och förväntade svar
* Visa endast poäng
* Visa poäng med uppdelning per kategori
* Visa ranking bland andra deltagare
* Visa endast vid sista försöket
* Visa visualisering med radardiagram

### Slutförandemeddelanden

* **Meddelande vid godkänt** — Anpassad text som visas när deltagaren blir godkänd
* **Meddelande vid underkänt** — Anpassad text som visas när deltagaren inte når godkänd procent

### Slumpmässig frågeordning

| Inställning | Beskrivning |
|---------|-------------|
| **Slumpmässig frågeordning** | Blanda frågornas ordning vid varje försök |
| **Slumpmässiga svar** | Blanda svarsalternativen inom varje fråga |
| **Slumpmässigt per kategori** | Välj slumpmässiga frågor från varje frågekategori |

Du kan också konfigurera avancerade urvalsstrategier som kombinerar kategorier och slumpmässighet.

## Frågetyper

![Översikt över tillgängliga frågetyper i gränssnittet för att skapa övningar](/.gitbook/assets/exercise-question-types.png)

Chamilo erbjuder ett rikt utbud av frågetyper organiserade i flera kategorier:

### Enkelt val

* **Flerval (ett svar)** — Deltagaren väljer ett korrekt svar från en lista med alternativ
* **Ett svar med bilder** — Samma som ovan, men svarsalternativen visas som bilder

### Flerval

* **Flera svar** — Deltagaren väljer ett eller flera korrekta svar
* **Flera svar (rullgardin)** — Svarsalternativen presenteras som rullgardinsmenyer
* **Sant/Falskt** — En serie påståenden som deltagaren markerar som sanna eller falska
* **Sant/Falskt med säkerhetsgrad** — Sant/falskt med en extra konfidensnivå, vilket möjliggör mer nyanserad poängsättning

### Fyll i luckorna

* **Fyll i luckorna** — Deltagaren fyller i saknade ord i en text. Du definierar luckorna och godkända svar när du skapar frågan.

### Matchning

* **Matchning** — Deltagaren kopplar ihop objekt från två kolumner
* **Matchning (dra och släpp)** — Samma koncept, men med ett dra-och-släpp-gränssnitt
* **Dra och släpp** — Dra objekt till rätt positioner

### Öppna svar

* **Fritt svar (essä)** — Deltagaren skriver ett textsvar. Kräver manuell rättning (eller AI-assisterad rättning om det är konfigurerat)
* **Muntligt uttryck** — Deltagaren spelar in ett ljudsvar med mikrofonen
* **Ladda upp svar** — Deltagaren laddar upp en fil som sitt svar

### Hotspot

* **Hotspot** — Deltagaren klickar på specifika områden i en bild för att svara
* **Hotspot-avgränsning** — Deltagaren ritar gränser runt områden på en bild

### Beräknad

* **Beräknat svar** — Numeriska frågor med en formel och ett toleransintervall. Användbart för matematik- och naturvetenskapskurser.

### Special

* **Läsförståelse** — Tester baserade på att läsa ett stycke
* **Annotering** — Läraren laddar upp en bild och eleven annoterar den
* **Svar i Office-dokument** — När pluginet OnlyOffice är aktiverat svarar eleven på frågan genom att redigera ett inbäddat Office-dokument (Word, Excel, PowerPoint). Svaret sparas som en separat fil under övningen så att det kan granskas tillsammans med resten av försöket.

## Lägga till frågor i en övning

1. Öppna övningen och klicka på **Lägg till en fråga**
2. Välj frågetyp
3. Ange **frågetexten** (stöder rich text med bilder och formatering)
4. Definiera **svaren** och deras poängsättning:
   * För varje svarsalternativ anger du om det är korrekt och hur många poäng det är värt
   * Du kan tilldela negativa poäng till felaktiga svar för att motverka gissning
5. Lägg valfritt till **återkoppling** — förklaringar som visas för eleven efter att ha svarat
6. Ange **svårighetsnivå** och **kategori** (användbart för slumpmässigt urval och rapportering)
7. Spara

## Frågekategorier

Du kan organisera frågor i kategorier (t.ex. "Modul 1", "Ordförråd", "Avancerat"). Kategorier är användbara för att:

* Organisera stora frågebanker
* Aktivera slumpmässigt urval per kategori (t.ex. "5 frågor från Modul 1, 3 från Modul 2")
* Visa poäng uppdelade per kategori i rapporter

## Återanvändning av frågor

Frågor kan återanvändas i övningar inom samma kurs. När du lägger till en fråga kan du välja att skapa en ny eller välja en befintlig fråga från frågebanken.

## Importera övningar

Chamilo stöder import av övningar från externa format:

* **IMS QTI / Common Cartridge** — Standardformatet för e-learning-quiz
* **Moodle-format** — Importera quiz från Moodle-exporter

För att importera, leta efter alternativet **Importera** i övningsverktyget och ladda upp din fil.

## Tips

* **Blanda frågetyper** — Kombinera flerval, lucktexter och öppna frågor för en heltäckande bedömning
* **Använd kategorier** — Organisera frågor efter ämne för att möjliggöra riktat slumpmässigt urval
* **Ange en godkändprocent** — Ge eleverna ett tydligt mål och koppla det till certifikatgenerering via Gradebook
* **Använd omedelbar återkoppling för övning** — Skapa övningar utan betyg med omedelbar återkoppling så att eleverna kan lära av sina misstag
* **Slumpa för integritet** — Aktivera slumpmässig frågeordning och slumpmässiga svar för att minska risken för avskrift