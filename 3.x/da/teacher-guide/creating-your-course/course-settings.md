# Kursusindstillinger

Kursusindstillinger giver dig mulighed for at styre, hvordan dit kursus opfører sig — hvem der kan tilgå det, hvordan det vises, og hvilke funktioner der er aktiveret.

For at åbne kursusindstillinger skal du gå ind i dit kursus og klikke på ikonet **Indstillinger** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Indstillinger" data-size="line"> ved siden af knappen **Skift til elevvisning**.

## Generelle indstillinger

### Kursusoplysninger

* **Kursets titel** — Det viste navn på dit kursus
* **Kursets sprog** — Det primære sprog for kursusgrænsefladen
* **Kursuskategori** — Den kategori, som kurset vises under i kataloget
* **Kursusbillede** — Upload et miniaturebillede, der repræsenterer dit kursus i kursusoversigter (størrelsen tilpasses afhængigt af konteksten)

Kursuskoden (den korte, unikke identifikator) angives, når kurset oprettes, og kan ikke redigeres fra denne side.

Som standard vil alle brugere, der går ind i dit kursus, se hele Chamilo-grænsefladen på kursets sprog. Dette er en fordybende funktion. Administratorer kan ændre denne adfærd, men du kan også ændre den med en af de første indstillinger: **Vis kursus på brugerens sprog** (sat til Nej som standard), hvis du mener, at det gør det for svært for dine brugere.

Afdeling og afdelings-URL er forældede felter. De vedligeholdes kun af hensyn til bagudkompatibilitet.

Hvis det er aktiveret, kan du skifte stil inde i dit kursus med indstillingen **Stylesheets** ved at bruge eksisterende stylesheets på din portal. Denne indstilling er ofte deaktiveret af administratorer for et mere integreret globalt design.

### Diskkvote

Hvert kursus har en lagringsgrænse (diskkvote) for uploadede filer. Kvoten angives af platformadministratoren. Du kan se din aktuelle grænse i kursusindstillingerne og det aktuelle forbrug i værktøjet **Dokumenter**.

> Hvis du er ved at løbe tør for plads, skal du kontakte din platformadministrator for at anmode om en forøgelse af kvoten eller fjerne ubrugte filer fra værktøjet Dokumenter.

### Kursussynlighed

![Kursussynlighedsindstillingerne, der viser mulighederne offentlig, åben, registreret og lukket](/.gitbook/assets/course-settings-visibility.png)

Styr, hvem der kan tilgå dit kursus:

| Indstilling | Beskrivelse |
|---------|-------------|
| **Offentlig** | Alle, inklusive anonyme besøgende, kan tilgå kurset |
| **Åben for platformen** | Alle registrerede brugere på platformen kan tilgå kurset |
| **Privat — adgang tildelt af privilegerede brugere** | Kun brugere, der eksplicit er tilmeldt kurset, kan tilgå det |
| **Lukket** | Kurset er låst; ingen kan tilgå det undtagen underviseren |

#### Tilmeldingsindstillinger

Afhængigt af din platformkonfiguration kan du muligvis styre:

* **Tillad selvtilmelding** — Om elever kan tilmelde sig selv via kursuskataloget
* **Tillad selvafmelding** — Om elever kan forlade kurset på egen hånd
* **Tilmeldingsadgangskode** — Kræv en adgangskode til selvtilmelding (nyttigt til at begrænse adgangen til en bestemt gruppe), men sikkerhedsniveauet er lavt, da den samme kursusadgangskode deles mellem alle brugere.

Disse indstillinger dækker kun selvtilmelding. For det fulde overblik — herunder at tilmelde en eksisterende bruger selv eller invitere nogen, der endnu ikke har en platformkonto — se [Tilmelding af brugere](../assessing-learners/subscribing-users.md).

### Dokumentindstillinger

Vælg, om systemsmapperne i værktøjet **Dokumenter** skal vises eller skjules (skjult som standard; du har i de fleste tilfælde ikke rigtig brug for dem, og visning af dem kan forårsage problemer med skjult indhold og elever).

### Indstillinger for e-mailunderretninger

Konfigurer, hvordan kursusaktivitet udløser underretninger:

* **E-mailunderretninger om nyt indhold** — Underret tilmeldte brugere, når du tilføjer nye dokumenter, meddelelser eller andet indhold

### Chatindstillinger

Styr, hvordan værktøjet **Chat** vises.

### Indstillinger for læringssti

* **Aktivér kurstemaer** — Tillad, at læringsstier ændrer udseende (anbefales ikke for en integreret brugeroplevelse)
* **Returlink for læringssti** — Beslut, hvor brugere lander, når de klikker på ikonet **Hjem** i en læringssti: listen over læringsstier, kursets startside, *Mine kurser*, *Mine sessioner* eller portalens startside

### Indstillinger for tematisk fremgang

Konfigurer, hvordan meddelelser om tematisk fremgang vises på kursets startside.

### Forumindstillinger

Styr adfærden i forumværktøjet for dette kursus.

### Indstillinger for opgaver

* **Standardindstilling for synlighed af nyligt indsendte filer** — Beslut, om nye dokumenter, der uploades af elever i værktøjet **Opgaver**, deles med alle andre elever (Nej som standard)
* **Tillad elever at slette deres egne publikationer** — Tillad elever at slette de opgaver, de allerede har uploadet (hvis de vil uploade en rettelse).

### Autolaunch-indstillinger

Et kursus kan indstilles til at have en autolaunch-adfærd, som forkorter vejen for de lærende til de vigtige dele af dit kursus. Hvis det er aktiveret, sendes de lærende, der går ind i dit kursus, direkte til det valgte værktøj og ser ikke kursets startside som et mellemliggende trin. Du kan endda vælge specifikke læringsstier eller øvelser, der skal startes ved ankomst til kurset. I dette tilfælde skal du vælge indstillingen her, og derefter gå til listen over læringsstier eller øvelser og klikke på raketikonet <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Autolaunch" data-size="line"> på det valgte element.

### Indstillinger for AI-hjælpere

Dette afsnit vises kun, hvis din administrator har aktiveret AI-værktøjer på platformen. Det giver dig mulighed for at finjustere udvalget af AI-hjælpetjenester, der er tilgængelige via forskellige værktøjer på din Chamilo-platform. Deaktiver dem, hvis du ikke vil bruge dem, men det ville sandsynligvis være en dårlig idé, da de er meget kraftfulde.

Disse funktioner forklares i afsnittet **AI-værktøjer** i denne vejledning.

### Eksterne værktøjer (LTI)

Hvis det er aktiveret på din platform, giver Learning Tools Integration dig mulighed for at integrere eksterne, kompatible aktiviteter i dette kursus som individuelle ikoner på kursets startside. En gennemgang af LTI ligger uden for denne vejlednings rammer, men det er et kraftfuldt integration system for undervisere.

### Andet

Yderligere afsnit eller indstillinger kan vises på denne side afhængigt af indstillinger og versioner af Chamilo.