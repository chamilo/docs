# Forståelse af grænsefladen

Chamilo 3.0 har en ren, moderne grænseflade designet til at holde navigationen enkel. Denne side forklarer hver del af grænsefladen i detaljer.

## Topbjælken

![Topbjælken med annoterede elementer, herunder logo, indbakke, supportbillet og brugeravatar](../../.gitbook/assets/top-bar-annotated.png)

Topbjælken er altid synlig øverst på hver side. Den indeholder:

* **Platformlogo** — Klik på det for at vende tilbage til startsiden når som helst.
* **Indbakkeikon** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Viser dine beskeder. Et rødt mærke angiver ulæste beskeder. Klik for at åbne din indbakke.
* **Supportbilletikon** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Hvis det er aktiveret af din administrator, giver dette dig adgang til supportbilletsystemet.
* **Din avatar** — Et cirkulært billede i øverste højre hjørne. Klik på det for at åbne en rullemenu med links til din profil, kontoindstillinger og log ud.

## Sidebjælken

Sidebjælken til venstre er din primære navigation. Den kan foldes sammen for at give mere plads til indholdsområdet. Klik på pileknappen ved dens højre kant for at udvide eller folde den sammen. Chamilo husker din præference.

Sidebjælken indeholder følgende links (nogle kan være skjult afhængigt af din platforms konfiguration):

![Sidebjælkens navigationspanel i udvidet tilstand, der viser alle menupunkter](../../.gitbook/assets/sidebar-expanded.png)

| Menupunkt | Ikon | Beskrivelse |
|-----------|------|-------------|
| **Hjem** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Vender tilbage til det primære dashboard |
| **Mine kurser** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Viser alle kurser, du er tilmeldt |
| **Mine sessioner** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Viser dine træningssessioner (aktuelle, tidligere, kommende) |
| **Udforsk flere kurser** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Gennemse kursuskataloget for at finde nye kurser |
| **Agenda** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Din personlige og kursuskalender |
| **Rapportering** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Adgang til sporning af kursister og kursusrapporter |
| **Socialt netværk** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Opret forbindelse til andre brugere, send beskeder, deltag i grupper |
| **Videokonference** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Adgang til live-videosessioner (hvis konfigureret) |
| **Administration** | <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Platformadministration (kun synlig for administratorer) |

Nederst i sidebjælken finder du en **Log ud**-mulighed, så du hurtigt kan logge ud, når du er færdig. Denne mulighed er også tilgængelig fra rullemenuen ved dit avatarikon i øverste højre hjørne.
Hvis platformen administreres via eksterne autentificeringsmetoder, er disse log ud-muligheder muligvis ikke tilgængelige.

## Det primære indholdsområde

Det centrale område på skærmen viser indholdet af den aktuelle side. Øverst vil du ofte se et **brødkrummespor**, der viser din aktuelle placering på platformen (for eksempel: Hjem > Rockmusik > Dokumenter). Brug brødkrummerne til at navigere tilbage til en overordnet side.

## Kursets startside

Når du går ind i et kursus, ser du **kursets startside**. Dette behandles i detaljer i afsnittet [Opret dit kursus](../creating-your-course/), men her er et kort overblik:

* **Kursets titel** — Vises tydeligt øverst
* **Kursusintroduktion** — En valgfri rich-text-beskrivelse, som du kan redigere
* **Værktøjsgitter** — Et gitter af ikoner, der repræsenterer kursusværktøjerne (Dokumenter, Øvelser, Fora osv.)

Som underviser vil du se yderligere kontrolelementer:

* **Kursistvisning** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Skift til denne for at se kurset, som en kursist ville se det
* **Rediger introduktion** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Rediger kursets introduktionstekst
* **Vis alle / Skjul alle** — Skift hurtigt synligheden af alle værktøjer for kursister
* **Sortér** — Aktivér træk og slip for at omarrangere værktøjerne på startsiden

## Ikonfarver

Dette er stadig eksperimentelt og ikke helt færdigt i Chamilo 3.0, men vi forsøger at anvende følgende regler for alle knapper og handlingsikoner i grænsefladen:

* **Grøn** til oprettelseshandlinger. Dette omfatter tilføjelse, oprettelse, import, bedømmelse, gemning og kopiering af indhold.
* **Blå** til visningshandlinger. Dette omfatter eksport, visning, forhåndsvisning i lister eller i detaljevisninger, søgning og download.
* **Orange** til redigeringshandlinger. Dette omfatter redigering, flytning, konfiguration, aktivering/deaktivering, skjulning og visning.
* **Rød** til sletnings-/fjernelseshandlinger. Dette omfatter sletning, fjernelse, afmelding.
* **Grå** til annulleringshandlinger. Bare at lade tingene forblive i status quo.

## Responsivt design

Chamilo 3.0 tilpasser sig forskellige skærmstørrelser. På en mobil enhed eller i et smalt browservindue:

* Sidebjælken er skjult som standard og kan åbnes ved at trykke på menuikonet
* Kursuskort vises i en enkelt kolonne i stedet for et gitter
* Tabeller bliver vandret rullebare

Det betyder, at du og dine kursister kan tilgå platformen fra en telefon, tablet eller computer, men I kan opleve grænsefladen lidt forskelligt.