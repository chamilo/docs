# Læringsstier

Læringsstier lar deg opprette strukturerte sekvenser av læringsaktiviteter. En læringssti veileder lærerne dine gjennom en bestemt rekkefølge av dokumenter, øvelser, lenker og andre ressurser, med valgfrie forutsetninger og fremdriftssporing.

Dette verktøyet er uten tvil det mest brukte kursverktøyet, fordi det fungerer som en komponist for mange andre verktøy og i stor grad kan være det ***eneste*** verktøyet som møter lærerne.

## Hvorfor bruke læringsstier?

Læringsstier er nyttige når du vil:

* **Styre rekkefølgen** på innholdskonsum — sikre at lærerne fullfører grunnleggende materiale før de går videre
* **Spore fremdrift** — se nøyaktig hvor hver lærer er i sekvensen
* **Sette forutsetninger** — kreve at lærerne består en øvelse før de får tilgang til neste avsnitt
* **Tildele fullføring** — knytte fullføring av læringssti til karakterboken og sertifikater
* **Pakke innhold** — opprette selvstendige læringsmoduler som lærerne kan arbeide seg gjennom i sitt eget tempo

## Opprette en læringssti

1. Åpne verktøyet **Læringsstier** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Læringsstier" data-size="line"> fra kursets hjemmeside
2. Klikk **Opprett en læringssti**
3. Angi en **tittel** og valgfri beskrivelse
4. Lagre — du blir tatt til redigeringsverktøyet for læringsstier

## Redigeringsverktøyet for læringsstier

![Redigeringsverktøyet for læringsstier med elementtreet til venstre og forhåndsvisning av innhold til høyre](/.gitbook/assets/learning-path-editor.png)

Redigeringsverktøyet har to hovedområder:

* **Venstre panel** — Listen over elementer (trinn) i læringsstien, vist som en trestruktur
* **Høyre panel** — Innholdet i det valgte elementet

### Legge til elementer

Klikk **Legg til et element** og velg hva du vil legge til:

| Elementtype | Beskrivelse |
|-----------|-------------|
| **Seksjon** | En overskrift som grupperer relaterte elementer (som en kapitteltittel). Seksjoner inneholder ikke innhold i seg selv. |
| **Dokument** | En fil eller nettside fra kursets Dokumenter-verktøy |
| **Øvelse** | En quiz eller test fra Øvelser-verktøyet |
| **Lenke** | En ekstern URL |
| **Oppgave** | En studentpublikasjon fra Oppgaver-verktøyet |
| **Forum** | En lenke til et kursforum |
| **Undersøkelse** | En lenke til en undersøkelse |
| **Sertifikat** | En spesiell side for å utløse generering av et fullføringssertifikat eller tildeling av ferdigheter |

### Organisere elementer

* **Dra og slipp** elementer for å endre rekkefølgen
* **Nøst elementer** under seksjoner ved å dra dem mot høyre
* **Slett** elementer du ikke lenger trenger

### Sette forutsetninger

Forutsetninger sikrer at lærerne fullfører visse trinn før de får tilgang til andre:

1. Velg et element i læringsstien
2. Åpne innstillingene for **forutsetninger**
3. Velg hvilke foregående element(er) som må fullføres først
4. For øvelser kan du kreve en **minimumspoengsum** (f.eks. «Må oppnå minst 70 % på Quiz 1 før tilgang til Modul 2»)

## Læreropplevelse

Når en lærer åpner en læringssti:

* Ser de listen over elementer i venstre panel
* Fullførte elementer merkes med et hakemerke
* Elementer med uoppfylte forutsetninger er låst
* Fremdrift spores automatisk — hvis en lærer forlater og kommer tilbake, fortsetter de der de slapp
* En fremdriftslinje viser samlet fullføringsprosent

## SCORM-innhold

Chamilos læringsstiverktøy kan importere **SCORM 1.2**-pakker — den mest utbredte e-læringsstandarden. Last opp en SCORM ZIP-fil, så oppretter Chamilo en læringssti fra den og sporer fremdrift og poeng i henhold til SCORM-spesifikasjonen.

Slik importerer du en SCORM-pakke:

1. I Læringsstier-verktøyet åpner du handlingsmenyen og klikker **Last opp**
2. Last opp ZIP-filen
3. Chamilo pakker ut og oppretter læringsstien automatisk

### CMI5- / xAPI-pakker

CMI5-pakker (den moderne xAPI-baserte etterfølgeren til SCORM) støttes gjennom **XApi**-pluginen. Når pluginen er aktivert av administratoren din, kan du importere en CMI5-pakke, og lærerne kan starte den fra kurset; utsagnene deres videresendes til den konfigurerte Learning Record Store.

## Innholdsforfatterskap med C-Studio

*Tilgjengelig hvis administratoren din har aktivert C-Studio-pluginen.*

C-Studio legger til en innebygd, dra-og-slipp visuell redigerer for å opprette interaktivt innhold direkte inne i en læringssti — et alternativ til å importere en SCORM-pakke når du ikke har (eller ikke vil lære) et separat forfatterverktøy som Articulate eller iSpring. Du bygger innholdet side for side rett i Chamilo, og det lagres og spores som ethvert annet læringsstielement.

### Starte et C-Studio-prosjekt

Når plugin-modulen er aktiv, viser listen over læringsstier en ekstra knapp ved siden av den vanlige handlingsmenyen, merket med et «+» og verktøytipset «Studio Tools»:

![Listen over læringsstier som viser C-Studio-knappen «Studio Tools» ved siden av den vanlige handlingsmenyen](/.gitbook/assets/cstudio-lp-button.png)

Klikk på den for å starte. Du blir bedt om å opprette et nytt prosjekt fra bunnen av eller importere et eksisterende:

![Startskjermen i C-Studio som tilbyr å opprette et nytt prosjekt eller importere et eksisterende](/.gitbook/assets/cstudio-start-screen.png)

Denne skjermen er for øyeblikket bare tilgjengelig på fransk, uavhengig av plattform- eller kursspråket ditt — en kjent begrensning i den plugin-versjonen som er i bruk. Gi prosjektet en tittel, så åpnes det direkte i redigeringsverktøyet.

### Redigeringsverktøyet

![Det visuelle redigeringsverktøyet i C-Studio, som viser side-lerretet, verktøypaletten til høyre og prosjektpanelet til venstre](/.gitbook/assets/cstudio-editor.png)

Redigeringsverktøyet er en visuell side-for-side-bygger:

* **Venstre panel** — prosjektets sider, med et «+» for å legge til flere, og en **Tools**-seksjon nederst (Clean data, Preview, Colors, Options, Quit)
* **Senterlerret** — siden du bygger; klikk på et hvilket som helst element for å redigere det på stedet
* **Høyre panel** — komponentpaletten, som trekkes over på lerretet

Paletten dekker grunnleggende byggeklosser (kolonner, bilder, lyd, titler, tekst, knapper, kort) samt flere interaktive øvelsestyper: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** og **Sort paragraphs**, pluss en **iframe**-blokk for å bygge inn eksternt innhold og en **Quiz**-blokk.

### Språk

C-Studios eget grensesnitt kan som standard være fransk første gang du åpner det, uavhengig av Chamilo-grensesnittspråket eller kursets språk. Hvis det er tilfellet, gå til **File > UI language** og velg språket ditt — redigeringsverktøyet lastes inn på nytt umiddelbart og husker valget ditt etterpå.

![File-menyen åpen, som viser alternativet «UI language»](/.gitbook/assets/cstudio-file-menu.png)

### Lagring og eksport

Bruk **File > Save** mens du arbeider. **File > Export...** pakker prosjektet som en SCORM-fil du kan laste ned, sikkerhetskopiere eller gjenbruke andre steder via **Import...**. **File > Quit** tar deg tilbake til listen over læringsstier, der C-Studio-prosjektet ditt nå vises som et vanlig element.

## Innstillinger for læringssti

Konfigurer hvordan læringsstien oppfører seg:

| Setting | Description |
|---------|-------------|
| **Visibility** | Skjul eller vis læringsstien for lærende |
| **Prerequisites** | Krev at andre læringsstier er fullført før denne |
| **Auto-launch** | Åpne denne læringsstien automatisk når lærende går inn i kurset |
| **Accumulated SCORM time** | Om tid skal akkumuleres på tvers av flere økter |

## Kobling til karakterboken

Du kan ta med fullføring av læringssti som en vurdert aktivitet i karakterboken. Dette gjør at fremgang i læringsstien kan bidra til den lærendes samlede kurskarakter og sertifikatberettigelse.

## Bruk av KI

Hvis administratoren har aktivert KI-assistert generering av læringsstier, finner du et KI-generatoralternativ i rullegardinmenyen for handlinger. Gi KI-en så presis kontekst som du ønsker for læringsstien, be om et antall sider og et omtrentlig antall ord per side, og si deretter om du vil fylle den med tester og starte. Noen minutter senere ser du på en komplett, tekstbasert læringssti.

Rediger dokumentene for å generere illustrasjoner med mer KI, og du har bare noe gjennomgang igjen før du kan dele den med de lærende.

## Tips

* **Start med en oversikt** — Planlegg seksjoner og elementer før du bygger stien
* **Bruk seksjoner som kapitler** — Grupper relaterte elementer under seksjonsoverskrifter for tydelighet
* **Sett forutsetninger for vurderinger** — Krev at de lærende studerer innholdet før de tar en quiz
* **Bland innholdstyper** — Kombiner lesestoff, videoer, interaktive øvelser og eksterne ressurser for en engasjerende læringsopplevelse
* **Sjekk lærendevisningen** — Bruk Student View-funksjonen for å oppleve læringsstien slik en lærende ville gjort
* **Bruk SCORM for interaktivitet** — Hvis du har tilgang til SCORM-forfatterverktøy (som Articulate, iSpring eller lignende), kan du lage rikt interaktivt innhold og importere det til Chamilo. Hvis administratoren har aktivert C-Studio-plugin-modulen, kan du bygge lignende interaktivt innhold direkte i Chamilo i stedet — se [Innholdsforfatterskap med C-Studio](#content-authoring-with-c-studio) ovenfor