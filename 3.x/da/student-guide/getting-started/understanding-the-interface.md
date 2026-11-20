# Forståelse af grænsefladen

Chamilo 3.0 har en ren, moderne grænseflade, der er designet til at holde navigationen enkel. Denne side forklarer hver del af grænsefladen fra en lærendes synspunkt.

## Den øverste bjælke

Den øverste bjælke er altid synlig øverst på hver side. Den indeholder:

* **Platformlogo** — Klik på det for at vende tilbage til startsiden når som helst.
* **Indbakkeikon** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Indbakke" data-size="line"> — Viser dine beskeder. Et rødt mærke angiver ulæste beskeder. Klik for at åbne din [Indbakke](../inbox.md).
* **Supportbilletikon** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Hvis det er aktiveret af din administrator, giver dette dig adgang til supportbilletsystemet. Ikke alle platforme aktiverer det, så du kan muligvis kun se indbakkeikonet og dit avatar.
* **Dit avatar** — Et cirkulært billede i øverste højre hjørne. Klik på det for at åbne en rullemenu:

![Din avatarmenu med links til Min profil, Mine certifikater, Mine færdigheder og Log ud](/.gitbook/assets/student-avatar-menu.png)

* **Min profil** — Rediger dine personlige oplysninger, skift din adgangskode, og (hvis aktiveret) konfigurer tofaktorgodkendelse
* **Mine certifikater** — Alle certifikater, du har optjent, på tværs af alle dine kurser
* **Mine færdigheder** — Kompetencemærker, du er blevet tildelt
* **Log ud**

## Sidebjælken

Sidebjælken til venstre er din primære navigation. Den kan foldes sammen for at give mere plads til indholdsområdet. Klik på pileknappen ved dens højre kant for at udvide eller folde den sammen. Chamilo husker din præference.

Sidebjælken indeholder følgende links (nogle kan være skjult afhængigt af din platforms konfiguration):

| Menupunkt | Ikon | Beskrivelse |
|-----------|------|-------------|
| **Hjem** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Hjem" data-size="line"> | Vender tilbage til det primære dashboard |
| **Mine kurser** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Kurser" data-size="line"> | Viser alle kurser, du er tilmeldt |
| **Mine sessioner** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessioner" data-size="line"> | Viser dine træningssessioner (aktuelle, tidligere, kommende) |
| **Udforsk flere kurser** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Katalog" data-size="line"> | Gennemse kursuskataloget for at finde og selvtilmelde dig nye kurser |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Din personlige og kursuskalender |
| **Rapportering** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Rapportering" data-size="line"> | Udvider til **Fremskridt** — dit eget overblik over [Mine fremskridt](../my-progress.md) |
| **Socialt netværk** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Socialt netværk" data-size="line"> | Udvider til [Socialt netværk](../social-network.md) og relaterede links, hvis det er aktiveret |
| **Videokonference** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Adgang til live-videosessioner (hvis konfigureret) |

**Rapportering** og **Socialt netværk** er ikke almindelige links — når du klikker på dem, udvides en lille liste over underpunkter direkte i sidebjælken:

![Sidebjælken med Rapportering og Socialt netværk udvidet, der viser deres underpunkter](/.gitbook/assets/student-sidebar-expanded.png)

* Under **Rapportering**: kun **Fremskridt**, som tager dig til [Mine fremskridt](../my-progress.md).
* Under **Socialt netværk**: **Hjem** (den sociale væg), **Beskeder** (en genvej til din [Indbakke](../inbox.md)), **Mine venner**, **Sociale grupper** — og, noget uventet grupperet her også, **Mine filer** (dit personlige fillager) og **Personlige data** (en eksport af de personlige data, platformen opbevarer om dig). Disse to sidste er ikke rigtig "sociale" funktioner; de ligger bare i denne del af sidebjælken.

Hvis din konto har yderligere roller (for eksempel underviser du også i et kursus), kan du se ekstra sidebjælkeelementer — som **Administration** — som en konto, der kun er til lærende, aldrig ser.

Nederst i sidebjælken finder du en **Log ud**-mulighed, så du hurtigt kan logge ud, når du er færdig. Denne mulighed er også tilgængelig fra rullemenuen ved dit avatarikon i øverste højre hjørne.
Hvis platformen administreres via eksterne godkendelsesmetoder, er disse logud-muligheder muligvis ikke tilgængelige.

## Det primære indholdsområde

Det centrale område på skærmen viser indholdet af den aktuelle side. Øverst vil du ofte se et **brødkrummespor**, der viser din aktuelle placering på platformen (for eksempel: Hjem > Rockmusik > Dokumenter). Brug brødkrummerne til at navigere tilbage til en overordnet side.

## Kursets startside

Når du går ind på et kursus, ser du **kursets startside**:

* **Kursets titel** — Vises tydeligt øverst
* **Kursusintroduktion** — En valgfri rich-text-beskrivelse skrevet af din underviser
* **Værktøjsgrid** — Et gitter af ikoner, der repræsenterer de værktøjer, der er tilgængelige i dette kursus (Documents, Exercises, Forums osv.)

Kun de værktøjer, din underviser har gjort synlige, vises i dette gitter — se [Find rundt i et kursus](../courses/course-tools-overview.md) for, hvad hvert enkelt gør. Kontroller til at redigere selve kurset (forhåndsvisning som studerende, visning/skjulning af værktøjer, omrokering af dem) vises kun for undervisere og kursusadministratorer — du ser dem ikke på et kursus, du er tilmeldt som lærende.

## Ikonfarver

Dette er stadig eksperimentelt og ikke helt færdigt i Chamilo 3.0, men vi forsøger at anvende følgende regler for alle knapper og handlingsikoner i grænsefladen:

* **Grøn** til oprettelseshandlinger. Dette omfatter tilføjelse, oprettelse, import, lagring og kopiering af indhold.
* **Blå** til visningshandlinger. Dette omfatter eksport, visning, forhåndsvisning i lister eller i detaljevisninger, søgning og download.
* **Orange** til redigeringshandlinger. Dette omfatter redigering, flytning, konfiguration, aktivering/deaktivering, skjulning og visning.
* **Rød** til sletnings-/fjernelseshandlinger. Dette omfatter sletning, fjernelse, framelding.
* **Grå** til annulleringshandlinger. Bare at lade tingene forblive, som de er.

## Responsivt design

Chamilo 3.0 tilpasser sig forskellige skærmstørrelser. På en mobil enhed eller i et smalt browservindue:

* Sidebaren er skjult som standard og kan åbnes ved at trykke på menuikonet
* Kursuskort vises i en enkelt kolonne i stedet for et gitter
* Tabeller bliver vandret rullebare

Det betyder, at du kan tilgå dine kurser fra en telefon, tablet eller computer, selvom grænsefladen kan se lidt anderledes ud afhængigt af enheden.