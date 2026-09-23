# Øvelser

Værktøjet til øvelser (også kaldet "tests") lader dig oprette quizzer og eksamener med automatisk bedømmelse. Chamilo understøtter et bredt udvalg af spørgsmålstyper, fra simple multiple choice til interaktive hotspot-spørgsmål.

## Oprette en øvelse

1. Åbn værktøjet **Øvelser** <img src="../../.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Øvelser" data-size="line"> fra kursets startside
2. Klik på **Ny øvelse**
3. Indtast en **titel** og en valgfri **beskrivelse**
4. Konfigurer øvelsesindstillingerne (se nedenfor)
5. Gem, og tilføj derefter spørgsmål

## Øvelsesindstillinger

![Panelet med øvelsesindstillinger med valgmuligheder for visning, tid, forsøg og feedback](../../.gitbook/assets/exercise-settings.png)

### Visning og navigation

| Indstilling | Valgmuligheder | Beskrivelse |
|---------|---------|-------------|
| **Spørgsmålsopstilling** | Alle på én side / Ét pr. side | Vis alle spørgsmål på én gang eller ét ad gangen |
| **Skjul spørgsmålstitler** | Ja / Nej | Om spørgsmålstitler skal vises for de studerende |
| **Vis knappen Forrige** | Ja / Nej | Tillad de studerende at gå tilbage til tidligere spørgsmål |
| **Forhindr navigation bagud** | Ja / Nej | Tving de studerende til at svare i rækkefølge uden at gå tilbage |

### Tid og tilgængelighed

| Indstilling | Beskrivelse |
|---------|-------------|
| **Tidsbegrænsning** | Maksimal tid (i minutter) til at gennemføre øvelsen. En nedtællingstimer vises for den studerende |
| **Startdato** | Hvornår øvelsen bliver tilgængelig for de studerende |
| **Slutdato** | Hvornår øvelsen ophører med at være tilgængelig |

### Forsøg og scoring

| Indstilling | Beskrivelse |
|---------|-------------|
| **Maksimalt antal forsøg** | Hvor mange gange en studerende kan tage øvelsen (0 = ubegrænset) |
| **Beståelsesprocent** | Den minimale score for at bestå (f.eks. 70 %). Studerende, der ikke når denne tærskel, ser en fejlmeddelelse |
| **Videregiv negativ scoring** | Om negative point på enkelte spørgsmål reducerer den samlede score til under nul |

### Feedback

| Indstilling | Valgmuligheder |
|---------|---------|
| **Til sidst** | Vis resultater og korrekte svar, efter at den studerende har afleveret |
| **Umiddelbar** | Vis feedback efter hvert spørgsmål (nyttigt til læringsøvelser) |
| **Eksamensmodus** | Vis ingen feedback eller resultater |

### Visning af resultater

Styr, hvad de studerende ser efter at have gennemført øvelsen:

* Vis score og forventede svar
* Vis kun score
* Vis score med opdeling efter kategori
* Vis rangering blandt andre studerende
* Vis kun ved sidste forsøg
* Vis visualisering som radardiagram

### Afslutningsmeddelelser

* **Succesmeddelelse** — Brugerdefineret tekst, der vises, når den studerende består
* **Fejlmeddelelse** — Brugerdefineret tekst, der vises, når den studerende ikke når beståelsesprocenten

### Randomisering af spørgsmål

| Indstilling | Beskrivelse |
|---------|-------------|
| **Tilfældig spørgsmålsrækkefølge** | Bland rækkefølgen af spørgsmål ved hvert forsøg |
| **Tilfældige svar** | Bland svarmulighederne inden for hvert spørgsmål |
| **Tilfældig efter kategori** | Vælg tilfældige spørgsmål fra hver spørgsmålskategori |

Du kan også konfigurere avancerede udvælgelsesstrategier, der kombinerer kategorier og randomisering.

## Spørgsmålstyper

![Oversigt over tilgængelige spørgsmålstyper i grænsefladen til oprettelse af øvelser](../../.gitbook/assets/exercise-question-types.png)

Chamilo tilbyder et rigt sæt af spørgsmålstyper organiseret i flere kategorier:

### Enkeltvalg

* **Multiple choice (ét svar)** — Den studerende vælger ét korrekt svar fra en liste af muligheder
* **Enkelt svar med billeder** — Samme som ovenfor, men svarmulighederne vises som billeder

### Multiple choice

* **Flere svar** — Den studerende vælger ét eller flere korrekte svar
* **Flere svar (rullemenu)** — Svarmulighederne præsenteres som rullemenuer
* **Sandt/falsk** — En række udsagn, som den studerende markerer som sande eller falske
* **Sandt/falsk med sikkerhedsgrad** — Sandt/falsk med et ekstra konfidensniveau, som muliggør mere nuanceret scoring

### Udfyld hullerne

* **Udfyld hullerne** — Den studerende udfylder manglende ord i en tekst. Du definerer hullerne og de accepterede svar, når du opretter spørgsmålet.

### Matching

* **Matching** — Den studerende forbinder elementer fra to kolonner
* **Matching (trækbar)** — Samme koncept, men med en træk-og-slip-grænseflade
* **Trækbar** — Træk elementer til de korrekte positioner

### Åbne svar

* **Frit svar (essay)** — Den studerende skriver et tekstsvar. Kræver manuel bedømmelse (eller AI-assisteret bedømmelse, hvis det er konfigureret)
* **Mundtlig fremstilling** — Den studerende optager et lydsvar med mikrofonen
* **Upload svar** — Den studerende uploader en fil som sit svar

### Hotspot

* **Hotspot** — Den studerende klikker på bestemte områder af et billede for at svare
* **Hotspot-afgrænsning** — Den studerende tegner grænser omkring områder på et billede

### Beregnet

* **Beregnet svar** — Numeriske spørgsmål med en formel og et toleranceinterval. Nyttigt til matematik- og naturfagskurser.

### Speciel

* **Læseforståelse** — Tests baseret på læsning af et afsnit
* **Annotation** — Underviseren uploader et billede, og den studerende annoterer det
* **Svar i Office-dokument** — Når OnlyOffice-pluginet er aktiveret, besvarer den studerende spørgsmålet ved at redigere et indlejret Office-dokument (Word, Excel, PowerPoint). Svaret gemmes som en separat fil under øvelsen, så det kan gennemgås sammen med resten af forsøget.

## Tilføjelse af spørgsmål til en øvelse

1. Åbn øvelsen, og klik på **Tilføj et spørgsmål**
2. Vælg spørgsmålstypen
3. Indtast **spørgsmålsteksten** (understøtter rich text med billeder og formatering)
4. Definer **svarene** og deres scoring:
   * For hver svarmulighed angives, om den er korrekt, og hvor mange point den er værd
   * Du kan tildele negative point til forkerte svar for at modvirke gætteri
5. Tilføj eventuelt **feedback** — forklaringer, der vises for den studerende efter besvarelsen
6. Angiv **sværhedsgrad** og **kategori** (nyttigt til tilfældig udvælgelse og rapportering)
7. Gem

## Spørgsmålskategorier

Du kan organisere spørgsmål i kategorier (f.eks. "Modul 1", "Ordforråd", "Avanceret"). Kategorier er nyttige til:

* Organisering af store spørgsmålsbanker
* Aktivering af tilfældig udvælgelse efter kategori (f.eks. "5 spørgsmål fra Modul 1, 3 fra Modul 2")
* Visning af scorer opdelt efter kategori i rapporter

## Genbrug af spørgsmål

Spørgsmål kan genbruges på tværs af øvelser inden for det samme kursus. Når du tilføjer et spørgsmål, kan du vælge at oprette et nyt eller vælge et eksisterende spørgsmål fra spørgsmålsbanken.

## Import af øvelser

Chamilo understøtter import af øvelser fra eksterne formater:

* **IMS QTI / Common Cartridge** — Den standardiserede e-læringsquizformat
* **Moodle-format** — Importér quizzer fra Moodle-eksporter

For at importere skal du finde indstillingen **Importér** i øvelsesværktøjet og uploade din fil.

## Tips

* **Bland spørgsmålstyper** — Kombiner multiple choice, udfyld tomme felter og åbne spørgsmål for en omfattende vurdering
* **Brug kategorier** — Organisér spørgsmål efter emne for at muliggøre målrettet tilfældig udvælgelse
* **Angiv en beståelsesprocent** — Giv de studerende et klart mål, og knyt det til certifikatgenerering via karakterbogen
* **Brug øjeblikkelig feedback til øvelse** — Opret ikke-bedømte øvelsesopgaver med øjeblikkelig feedback, så de studerende kan lære af deres fejl
* **Randomisér for integritet** — Aktivér tilfældig spørgsmålsrækkefølge og tilfældige svar for at mindske risikoen for afskrift