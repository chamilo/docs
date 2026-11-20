# Øvinger

Øvingsverktøyet (også kalt «tester») lar deg lage quizer og eksamener med automatisk vurdering. Chamilo støtter et bredt spekter av spørsmålstyper, fra enkle flervalgsspørsmål til interaktive hotspot-spørsmål.

## Opprette en øving

1. Åpne verktøyet **Øvinger** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Øvinger" data-size="line"> fra kursets startside
2. Klikk **Ny øving**
3. Angi en **tittel** og eventuelt en **beskrivelse**
4. Konfigurer øvingsinnstillingene (se nedenfor)
5. Lagre, og legg deretter til spørsmål

## Øvingsinnstillinger

![Panelet for øvingsinnstillinger med valg for visning, tid, forsøk og tilbakemelding](/.gitbook/assets/exercise-settings.png)

### Visning og navigasjon

| Innstilling | Valg | Beskrivelse |
|---------|---------|-------------|
| **Spørsmålslayout** | Alle på én side / Ett per side | Vis alle spørsmål samtidig eller ett om gangen |
| **Skjul spørsmålstittel** | Ja / Nei | Om spørsmålstittel skal vises for lærende |
| **Vis forrige-knapp** | Ja / Nei | La lærende gå tilbake til tidligere spørsmål |
| **Hindre bakovernavigasjon** | Ja / Nei | Tving lærende til å svare i rekkefølge uten å gå tilbake |

### Tid og tilgjengelighet

| Innstilling | Beskrivelse |
|---------|-------------|
| **Tidsbegrensning** | Maksimal tid (i minutter) for å fullføre øvingen. En nedtellingstimer vises for den lærende |
| **Startdato** | Når øvingen blir tilgjengelig for lærende |
| **Sluttdato** | Når øvingen slutter å være tilgjengelig |

### Forsøk og poenggiving

| Innstilling | Beskrivelse |
|---------|-------------|
| **Maksimalt antall forsøk** | Hvor mange ganger en lærende kan ta øvingen (0 = ubegrenset) |
| **Beståttprosent** | Minimumspoeng for å bestå (f.eks. 70 %). Lærende som ikke når denne terskelen, får en feilmelding |
| **Overfør negativ poenggiving** | Om negative poeng på enkeltspørsmål kan redusere totalpoengsummen under null |

### Tilbakemelding

| Innstilling | Valg |
|---------|---------|
| **Til slutt** | Vis resultater og riktige svar etter at den lærende har sendt inn |
| **Umiddelbart** | Vis tilbakemelding etter hvert spørsmål (nyttig for læringsøvinger) |
| **Eksamensmodus** | Ikke vis noen tilbakemelding eller resultater |

### Visning av resultater

Styr hva lærende ser etter at øvingen er fullført:

* Vis poengsum og forventede svar
* Vis kun poengsum
* Vis poengsum med kategorioversikt
* Vis rangering blant andre lærende
* Vis kun ved siste forsøk
* Vis visualisering med radardiagram

### Fullføringsmeldinger

* **Suksessmelding** — Egendefinert tekst som vises når den lærende består
* **Feilmelding** — Egendefinert tekst som vises når den lærende ikke når beståttprosenten

### Tilfeldig rekkefølge av spørsmål

| Innstilling | Beskrivelse |
|---------|-------------|
| **Tilfeldig spørsmålsrekkefølge** | Stokk rekkefølgen på spørsmålene for hvert forsøk |
| **Tilfeldige svar** | Stokk svaralternativene innen hvert spørsmål |
| **Tilfeldig per kategori** | Velg tilfeldige spørsmål fra hver spørsmålskategori |

Du kan også konfigurere avanserte utvalgsstrategier som kombinerer kategorier og tilfeldig rekkefølge.

## Spørsmålstyper

![Oversikt over tilgjengelige spørsmålstyper i grensesnittet for oppretting av øvinger](/.gitbook/assets/exercise-question-types.png)

Chamilo tilbyr et rikt sett med spørsmålstyper organisert i flere kategorier:

### Enkeltvalg

* **Flervalg (ett svar)** — Den lærende velger ett riktig svar fra en liste med alternativer
* **Ett svar med bilder** — Samme som over, men svaralternativene vises som bilder

### Flervalg

* **Flere svar** — Den lærende velger ett eller flere riktige svar
* **Flere svar (rullegardin)** — Svaralternativene presenteres som rullegardinmenyer
* **Sant/usant** — En rekke påstander som den lærende merker som sanne eller usanne
* **Sant/usant med sikkerhetsgrad** — Sant/usant med et ekstra konfidensnivå, som muliggjør mer nyansert poenggiving

### Fyll inn i hullene

* **Fyll inn i hullene** — Den lærende fyller inn manglende ord i en tekst. Du definerer hullene og godkjente svar når du oppretter spørsmålet.

### Matching

* **Matching** — Den lærende kobler elementer fra to kolonner
* **Matching (dra-og-slipp)** — Samme prinsipp, men med et dra-og-slipp-grensesnitt
* **Dra-og-slipp** — Dra elementer til riktige posisjoner

### Åpne svar

* **Fritt svar (essay)** — Den lærende skriver et tekstsvar. Krever manuell vurdering (eller AI-assistert vurdering hvis det er konfigurert)
* **Muntlig uttrykk** — Den lærende tar opp et lydsvar med mikrofonen
* **Last opp svar** — Den lærende laster opp en fil som svar

### Hotspot

* **Hotspot** — Den lærende klikker på bestemte områder i et bilde for å svare
* **Hotspot-avgrensning** — Den lærende tegner grenser rundt områder på et bilde

### Beregnet

* **Beregnet svar** — Numeriske spørsmål med en formel og toleranseområde. Nyttig for matematikk- og naturfagkurs.

### Spesielt

* **Leseforståelse** — Tester basert på å lese et avsnitt
* **Annotering** — Læreren laster opp et bilde, og eleven annoterer det
* **Svar i Office-dokument** — Når OnlyOffice-tillegget er aktivert, svarer eleven på spørsmålet ved å redigere et innebygd Office-dokument (Word, Excel, PowerPoint). Svaret lagres som en separat fil under øvelsen, slik at det kan gjennomgås sammen med resten av forsøket.

## Legge til spørsmål i en øvelse

1. Åpne øvelsen og klikk **Legg til et spørsmål**
2. Velg spørsmålstype
3. Skriv inn **spørsmålsteksten** (støtter rik tekst med bilder og formatering)
4. Definer **svarene** og poengsettingen:
   * For hvert svaralternativ angir du om det er korrekt og hvor mange poeng det er verdt
   * Du kan tildele negative poeng til feil svar for å motvirke gjetting
5. Legg eventuelt til **tilbakemelding** — forklaringer som vises til eleven etter at det er svart
6. Angi **vanskelighetsgrad** og **kategori** (nyttig for tilfeldig utvalg og rapportering)
7. Lagre

## Spørsmålskategorier

Du kan organisere spørsmål i kategorier (f.eks. «Modul 1», «Ordforråd», «Avansert»). Kategorier er nyttige for:

* Å organisere store spørsmålsbanker
* Å aktivere tilfeldig utvalg etter kategori (f.eks. «5 spørsmål fra Modul 1, 3 fra Modul 2»)
* Å se poeng fordelt på kategori i rapporter

## Gjenbruk av spørsmål

Spørsmål kan gjenbrukes på tvers av øvelser i samme kurs. Når du legger til et spørsmål, kan du velge å opprette et nytt eller velge et eksisterende spørsmål fra spørsmålsbanken.

## Importere øvelser

Chamilo støtter import av øvelser fra eksterne formater:

* **IMS QTI / Common Cartridge** — Standardformatet for e-læringsquizer
* **Moodle-format** — Importer quizer fra Moodle-eksporter

For å importere, se etter **Importer**-valget i øvelsesverktøyet og last opp filen.

## Tips

* **Bland spørsmålstyper** — Kombiner flervalg, fyll inn i blanke felt og åpne spørsmål for en helhetlig vurdering
* **Bruk kategorier** — Organiser spørsmål etter emne for å muliggjøre målrettet tilfeldig utvalg
* **Sett en beståttprosent** — Gi elevene et tydelig mål og knytt det til sertifikatgenerering via karakterboken
* **Bruk umiddelbar tilbakemelding til øving** — Opprett ugraderte øvingsøvelser med umiddelbar tilbakemelding for å hjelpe elevene å lære av feilene sine
* **Tilfeldiggjør for integritet** — Aktiver tilfeldig spørsmålsrekkefølge og tilfeldige svar for å redusere sjansen for avskrift