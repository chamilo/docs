# Læringsstier

Læringsstier lader dig oprette strukturerede sekvenser af læringsaktiviteter. En læringssti guider dine kursister gennem en bestemt rækkefølge af dokumenter, øvelser, links og andre ressourcer, med valgfrie forudsætninger og fremdriftssporing.

Dette værktøj er formentlig det mest anvendte kursusværktøj, fordi det fungerer som en komponist for mange andre værktøjer og i høj grad kan være det ***eneste*** værktøj, kursisterne møder.

## Hvorfor bruge læringsstier?

Læringsstier er nyttige, når du vil:

* **Styre rækkefølgen** af indholdsforbrug — sikre, at kursister gennemfører grundlæggende materiale, før de går videre
* **Spore fremdrift** — se præcis, hvor hver kursist er i sekvensen
* **Angive forudsætninger** — kræve, at kursister består en øvelse, før de får adgang til næste afsnit
* **Tildele gennemførelse** — knytte gennemførelse af læringsstien til karakterbogen og certifikater
* **Pakke indhold** — oprette selvstændige læringsmoduler, som kursister kan arbejde sig igennem i deres eget tempo

## Oprette en læringssti

1. Åbn værktøjet **Læringsstier** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Læringsstier" data-size="line"> fra kursushjemmesiden
2. Klik på **Opret en læringssti**
3. Indtast en **titel** og en valgfri beskrivelse
4. Gem — du bliver taget til redigeringsværktøjet for læringsstien

## Redigeringsværktøjet for læringsstien

![Redigeringsværktøjet for læringsstien med elementtræet til venstre og indholdsforhåndsvisning til højre](/.gitbook/assets/learning-path-editor.png)

Redigeringsværktøjet har to hovedområder:

* **Venstre panel** — Listen over elementer (trin) i læringsstien, vist som en træstruktur
* **Højre panel** — Indholdet af det valgte element

### Tilføje elementer

Klik på **Tilføj et element** og vælg, hvad der skal tilføjes:

| Elementtype | Beskrivelse |
|-----------|-------------|
| **Afsnit** | En overskrift, der grupperer relaterede elementer (som en kapiteltitel). Afsnit indeholder ikke selv indhold. |
| **Dokument** | En fil eller webside fra kursets Dokumenter-værktøj |
| **Øvelse** | En quiz eller test fra Øvelser-værktøjet |
| **Link** | En ekstern URL |
| **Opgave** | En studenterpublikation fra Opgaver-værktøjet |
| **Forum** | Et link til et kursusforum |
| **Spørgeskema** | Et link til et spørgeskema |
| **Certifikat** | En særlig side, der udløser generering af et gennemførelsescertifikat eller tildeling af færdigheder |

### Organisere elementer

* **Træk og slip** elementer for at ændre rækkefølgen
* **Indlejr elementer** under afsnit ved at trække dem til højre
* **Slet** elementer, du ikke længere har brug for

### Angive forudsætninger

Forudsætninger sikrer, at kursister gennemfører visse trin, før de får adgang til andre:

1. Vælg et element i læringsstien
2. Åbn dets indstillinger for **forudsætninger**
3. Vælg, hvilket/hvilke foregående element(er) der først skal være gennemført
4. For øvelser kan du kræve en **minimumsscore** (f.eks. "Skal score mindst 70 % på Quiz 1, før Modul 2 åbnes")

## Kursistoplevelse

Når en kursist åbner en læringssti:

* Ser de listen over elementer i venstre panel
* Gennemførte elementer er markeret med et flueben
* Elementer med uopfyldte forudsætninger er låst
* Fremdrift spores automatisk — hvis en kursist forlader stien og vender tilbage, fortsætter de, hvor de slap
* En fremdriftslinje viser den samlede gennemførelsesprocent

## SCORM-indhold

Chamilos læringsstiværktøj kan importere **SCORM 1.2**-pakker — den mest udbredte e-læringsstandard. Upload en SCORM ZIP-fil, og Chamilo opretter en læringssti ud fra den og sporer fremdrift og scores i henhold til SCORM-specifikationen.

Sådan importerer du en SCORM-pakke:

1. I værktøjet Læringsstier skal du åbne handlingsmenuen og klikke på **Upload**
2. Upload ZIP-filen
3. Chamilo pakker ud og opretter læringsstien automatisk

### CMI5- / xAPI-pakker

CMI5-pakker (den moderne xAPI-baserede efterfølger til SCORM) understøttes via **XApi**-pluginnet. Når pluginnet er aktiveret af din administrator, kan du importere en CMI5-pakke, og kursister kan starte den fra kurset; deres statements videresendes til den konfigurerede Learning Record Store.

## Indholdsforfatterskab med C-Studio

*Tilgængeligt, hvis din administrator har aktiveret C-Studio-pluginnet.*

C-Studio tilføjer en indbygget visuel editor med træk og slip til at oprette interaktivt indhold direkte inde i en læringssti — et alternativ til at importere en SCORM-pakke, når du ikke har (eller ikke vil lære) et separat forfatterværktøj som Articulate eller iSpring. Du bygger indholdet side for side direkte i Chamilo, og det gemmes og spores som ethvert andet element i en læringssti.

### Start af et C-Studio-projekt

Når pluginnet er aktivt, viser listen over læringsstier en ekstra knap ved siden af den sædvanlige handlingsmenu, markeret med et "+" og et værktøjstip med "Studio Tools":

![Listen over læringsstier, der viser C-Studio-knappen "Studio Tools" ved siden af den almindelige handlingsmenu](/.gitbook/assets/cstudio-lp-button.png)

Klik på den for at starte. Du bliver bedt om at oprette et nyt projekt fra bunden eller importere et eksisterende:

![C-Studio-startskærmen, der tilbyder at oprette et nyt projekt eller importere et eksisterende](/.gitbook/assets/cstudio-start-screen.png)

Denne særlige skærm er i øjeblikket kun tilgængelig på fransk, uanset din platforms- eller kursussprog — en kendt begrænsning i den pluginversion, der er i brug. Giv dit projekt en titel, og det åbner direkte i editoren.

### Editoren

![C-Studios visuelle editor, der viser sidecanvas, værktøjspaletten til højre og projektpanelet til venstre](/.gitbook/assets/cstudio-editor.png)

Editoren er en visuel side-for-side-bygger:

* **Venstre panel** — dit projekts sider, med et "+" til at tilføje flere, og en sektion **Tools** nederst (Clean data, Preview, Colors, Options, Quit)
* **Midterste canvas** — den side, du bygger; klik på et hvilket som helst element for at redigere det på stedet
* **Højre panel** — komponentpaletten, der trækkes over på canvas

Paletten dækker grundlæggende byggeklodser (kolonner, billeder, lyd, titler, tekst, knapper, kort) samt flere interaktive øvelsestyper: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** og **Sort paragraphs**, plus en **iframe**-blok til indlejring af eksternt indhold og en **Quiz**-blok.

### Sprog

C-Studios eget interface kan som standard være på fransk, første gang du åbner det, uafhængigt af dit Chamilo-interfacesprog eller kursets sprog. Hvis det er tilfældet, skal du gå til **File > UI language** og vælge dit sprog — editoren genindlæses med det samme og husker dit valg bagefter.

![File-menuen åben, der viser indstillingen "UI language"](/.gitbook/assets/cstudio-file-menu.png)

### Gemning og eksport

Brug **File > Save**, mens du arbejder. **File > Export...** pakker dit projekt som en SCORM-fil, som du kan downloade, sikkerhedskopiere eller genbruge andetsteds via **Import...**. **File > Quit** fører dig tilbage til listen over læringsstier, hvor dit C-Studio-projekt nu vises som et almindeligt element.

## Indstillinger for læringssti

Konfigurer, hvordan læringsstien opfører sig:

| Indstilling | Beskrivelse |
|---------|-------------|
| **Synlighed** | Skjul eller vis læringsstien for kursister |
| **Forudsætninger** | Kræv gennemførelse af andre læringsstier, før denne |
| **Auto-start** | Åbn automatisk denne læringssti, når kursister går ind på kurset |
| **Akkumuleret SCORM-tid** | Om tid skal akkumuleres på tværs af flere sessioner |

## Tilknytning til karakterbogen

Du kan medtage gennemførelse af læringsstien som en bedømt aktivitet i karakterbogen. Det gør det muligt for fremskridt i læringsstien at bidrage til kursistens samlede kursuskarakter og berettigelse til certifikat.

## Brug af AI

Hvis administratoren har aktiveret AI-assisteret generering af læringsstier, finder du en AI-generatorindstilling i rullemenuen med handlinger. Giv AI'en så præcis en kontekst, som du ønsker for din læringssti, bed om et antal sider og et omtrentligt antal ord pr. side, og fortæl den derefter, om du vil udfylde den med tests, og start. Et par minutter senere kigger du ned på en komplet, tekstbaseret læringssti.

Rediger dokumenterne for at generere illustrationer med mere AI, og du har kun noget gennemgang tilbage, før du kan dele den med dine kursister.

## Tips

* **Start med en disposition** — Planlæg dine sektioner og elementer, før du bygger stien
* **Brug sektioner som kapitler** — Gruppér relaterede elementer under sektionsoverskrifter for overskuelighed
* **Sæt forudsætninger for vurderinger** — Kræv, at kursister studerer indholdet, før de tager en quiz
* **Bland indholdstyper** — Kombinér læsemateriale, videoer, interaktive øvelser og eksterne ressourcer for en engagerende læringsoplevelse
* **Tjek kursistvisningen** — Brug funktionen Student View til at opleve læringsstien, som en kursist ville
* **Brug SCORM til interaktivitet** — Hvis du har adgang til SCORM-forfatterværktøjer (som Articulate, iSpring eller lignende), kan du oprette rigt interaktivt indhold og importere det i Chamilo. Hvis din administrator har aktiveret C-Studio-pluginnet, kan du i stedet bygge lignende interaktivt indhold direkte i Chamilo — se [Indholdsforfatterskab med C-Studio](#content-authoring-with-c-studio) ovenfor