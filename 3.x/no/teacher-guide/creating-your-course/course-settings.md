# Kursinnstillinger

Kursinnstillinger lar deg styre hvordan kurset ditt oppfører seg — hvem som kan få tilgang, hvordan det vises, og hvilke funksjoner som er aktivert.

For å åpne kursinnstillinger går du inn i kurset og klikker på ikonet **Innstillinger** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Innstillinger" data-size="line"> ved siden av knappen **Bytt til studentvisning**.

## Generelle innstillinger

### Kursinformasjon

* **Kurstittel** — Visningsnavnet på kurset ditt
* **Kursspråk** — Hovedspråket for kursgrensesnittet
* **Kurskategori** — Kategorien kurset vises under i katalogen
* **Kursbilde** — Last opp et miniatyrbilde som representerer kurset i kurslister (størrelsen justeres avhengig av kontekst)

Kurskoden (den korte, unike identifikatoren) settes når kurset opprettes og kan ikke redigeres fra denne siden.

Som standard vil alle brukere som går inn i kurset ditt, se hele Chamilo-grensesnittet på språket til kurset ditt. Dette er en immersiv funksjon. Administratorer kan endre denne atferden, men du kan også endre den med ett av de første valgene: **Vis kurset på brukerens språk** (satt til Nei som standard) hvis du mener at dette gjør det for vanskelig for brukerne dine.

Avdeling og avdelings-URL er utdaterte felt. De vedlikeholdes kun av hensyn til eldre støtte.

Hvis det er aktivert, kan du bytte stil inne i kurset med valget **Stilark**, ved å bruke eksisterende stilark på portalen. Dette valget er ofte deaktivert av administratorer, for et mer integrert globalt design.

### Diskkvote

Hvert kurs har en lagringsgrense (diskkvote) for opplastede filer. Kvoten settes av plattformadministratoren. Du kan se gjeldende grense i kursinnstillingene, og gjeldende bruk i verktøyet **Dokumenter**.

> Hvis du går tom for plass, kontakt plattformadministratoren for å be om økt kvote, eller fjern ubrukte filer fra verktøyet Dokumenter.

### Kurssynlighet

![Kursinnstillinger for synlighet som viser alternativene offentlig, åpen, registrert og stengt](../../.gitbook/assets/course-settings-visibility.png)

Styr hvem som kan få tilgang til kurset ditt:

| Innstilling | Beskrivelse |
|---------|-------------|
| **Offentlig** | Alle, inkludert anonyme besøkende, kan få tilgang til kurset |
| **Åpen for plattformen** | Alle registrerte brukere på plattformen kan få tilgang til kurset |
| **Privat — tilgang gitt av privilegerte brukere** | Bare brukere som er eksplisitt påmeldt kurset, kan få tilgang |
| **Stengt** | Kurset er låst; ingen kan få tilgang unntatt læreren |

#### Påmeldingsinnstillinger

Avhengig av plattformkonfigurasjonen kan du kanskje styre:

* **Tillat selvpåmelding** — Om lærende kan abonnere selv via kurskatalogen
* **Tillat selvavmelding** — Om lærende kan forlate kurset på egen hånd
* **Påmeldingspassord** — Krev et passord for selvpåmelding (nyttig for å begrense tilgang til en spesifikk gruppe), men sikkerhetsnivået er lavt fordi det samme kursadgangspassordet deles mellom alle brukere.

Disse innstillingene dekker bare selvpåmelding. For det fulle bildet — inkludert å melde på en eksisterende bruker selv, eller invitere noen som ennå ikke har en plattformkonto — se [Påmelding av brukere](../assessing-learners/subscribing-users.md).

### Dokumentinnstillinger

Velg om systemmapper skal vises eller skjules i verktøyet **Dokumenter** (skjult som standard; du trenger dem vanligvis ikke, og å vise dem kan forårsake problemer med skjult innhold og lærende).

### Innstillinger for e-postvarsler

Konfigurer hvordan kursaktivitet utløser varsler:

* **E-postvarsler for nytt innhold** — Varsle påmeldte brukere når du legger til nye dokumenter, kunngjøringer eller annet innhold

### Chat-innstillinger

Styr hvordan verktøyet **Chat** vises.

### Innstillinger for læringssti

* **Aktiver kurstemaer** — Tillat at læringsstier endrer utseende (anbefales ikke for en integrert brukeropplevelse)
* **Returlenke for læringssti** — Bestem hvor brukere lander når de klikker på ikonet **Hjem** i en læringssti: listen over læringsstier, kursets hjem, *Mine kurs*, *Mine økter*, eller portalens hjem

### Innstillinger for tematisk fremdrift

Konfigurer hvordan meldingene om tematisk fremdrift vises på kursets hjemmeside.

### Foruminnstillinger

Styr atferden i forumverktøyet i dette kurset.

### Oppgaveinnstillinger

* **Standardinnstilling for synlighet av nylig lastede filer** — Bestem om nye dokumenter som lastes opp av lærende i verktøyet **Oppgaver**, deles med alle andre lærende (Nei som standard)
* **Tillat at lærende sletter egne publikasjoner** — Tillat at lærende sletter oppgavene de allerede har lastet opp (i tilfelle de vil laste opp en rettelse).

### Autolanseringsinnstillinger

Et kurs kan settes opp med autolanseringsatferd, som forkorter veien for lærende til de viktige delene av kurset ditt. Hvis dette er aktivert, sendes lærende som går inn i kurset ditt, direkte til det valgte verktøyet og ser ikke kursets hjemmeside som et mellomtrinn. Du kan til og med velge bestemte læringsstier eller øvelser som skal lanseres ved ankomst til kurset. I så fall må du velge alternativet her, og deretter gå til listen over læringsstier eller øvelser og klikke på rakettikonet <img src="../../.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Autolansering" data-size="line"> på det valgte elementet.

### Innstillinger for AI-hjelpere

Denne delen vises bare hvis administratoren har aktivert AI-verktøy på plattformen. Den lar deg finjustere utvalget av AI-hjelpetjenester som er tilgjengelige gjennom ulike verktøy i Chamilo-plattformen din. Deaktiver dem hvis du ikke vil bruke dem, men det ville sannsynligvis være en dårlig idé, ettersom de er svært kraftige.

Disse funksjonene er forklart i avsnittet **AI-verktøy** i denne veiledningen.

### Eksterne verktøy (LTI)

Hvis dette er aktivert på plattformen din, lar Learning Tools Integration deg integrere eksterne, kompatible aktiviteter i dette kurset, som individuelle ikoner på kursets hjemmeside. Å diskutere LTI ligger utenfor rammen av denne veiledningen, men dette er et kraftig integrasjonssystem for lærere.

### Øvrig

Ytterligere avsnitt eller alternativer kan vises på denne siden avhengig av alternativer og versjoner av Chamilo.