# Forstå grensesnittet

Chamilo 3.0 har et rent, moderne grensesnitt utformet for å holde navigasjonen enkel. Denne siden forklarer hver del av grensesnittet i detalj.

## Topplinjen

![Topplinjen med annoterte elementer, inkludert logo, innboks, støttesak og brukeravatar](../../.gitbook/assets/top-bar-annotated.png)

Topplinjen er alltid synlig øverst på hver side. Den inneholder:

* **Plattformlogo** — Klikk på den for å gå tilbake til startsiden når som helst.
* **Innboksikon** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Viser meldingene dine. Et rødt merke indikerer uleste meldinger. Klikk for å åpne innboksen.
* **Ikon for støttesak** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Hvis det er aktivert av administratoren din, gir dette deg tilgang til systemet for støttesaker.
* **Avataren din** — Et sirkulært bilde øverst til høyre. Klikk på det for å åpne en rullegardinmeny med lenker til profilen din, kontoinnstillinger og utlogging.

## Sidemenyen

Sidemenyen til venstre er hovednavigasjonen din. Den kan slås sammen for å gi mer plass til innholdsområdet. Klikk på vekselpilen ved høyre kant for å utvide eller slå den sammen. Chamilo husker valget ditt.

Sidemenyen inneholder følgende lenker (noen kan være skjult avhengig av plattformens konfigurasjon):

![Sidemenyens navigasjonspanel i utvidet tilstand som viser alle menyelementer](../../.gitbook/assets/sidebar-expanded.png)

| Menyelement | Ikon | Beskrivelse |
|-----------|------|-------------|
| **Hjem** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Går tilbake til hoveddashbordet |
| **Mine kurs** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Lister alle kurs du er påmeldt |
| **Mine økter** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Lister opplæringsøktene dine (pågående, tidligere, kommende) |
| **Utforsk flere kurs** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Bla i kurskatalogen for å finne nye kurs |
| **Agenda** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Din personlige kalender og kurskalender |
| **Rapportering** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Tilgang til sporing av deltakere og kursrapporter |
| **Sosialt nettverk** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Koble deg til andre brukere, send meldinger, bli med i grupper |
| **Videokonferanse** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Tilgang til live videoøkter (hvis konfigurert) |
| **Administrasjon** | <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Plattformadministrasjon (synlig kun for administratorer) |

Nederst i sidemenyen finner du et **Logg ut**-valg for å logge ut raskt når du er ferdig. Dette valget er også tilgjengelig fra rullegardinmenyen til avatarikonet øverst til høyre.
Hvis plattformen administreres via eksterne autentiseringsmetoder, er det mulig at disse utloggingsvalgene ikke er tilgjengelige.

## Hovedinnholdsområdet

Det sentrale området på skjermen viser innholdet på den gjeldende siden. Øverst vil du ofte se en **brødsmulesti** som viser hvor du befinner deg i plattformen (for eksempel: Hjem > Rockmusikk > Dokumenter). Bruk brødsmulene til å navigere tilbake til en overordnet side.

## Kursets startside

Når du går inn i et kurs, ser du **kursets startside**. Dette dekkes i detalj i avsnittet [Opprette kurset ditt](../creating-your-course/), men her er en kort oversikt:

* **Kurstittel** — Vises tydelig øverst
* **Kursintroduksjon** — En valgfri riktekstbeskrivelse som du kan redigere
* **Verktøyrutenett** — Et rutenett av ikoner som representerer kursverktøyene (Dokumenter, Øvelser, Forum, osv.)

Som lærer vil du se flere kontroller:

* **Studentvisning** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Slå denne på for å se kurset slik en student ville se det
* **Rediger introduksjon** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Rediger teksten i kursintroduksjonen
* **Vis alle / Skjul alle** — Endre raskt synligheten av alle verktøy for studenter
* **Sorter** — Aktiver dra-og-slipp for å endre rekkefølgen på verktøyene på startsiden

## Ikonfarger

Dette er fortsatt eksperimentelt og ikke helt ferdig i Chamilo 3.0, men vi forsøker å bruke følgende regler for alle knapper og handlingsikoner i grensesnittet:

* **Grønn** for opprettelseshandlinger. Dette inkluderer å legge til, opprette, importere, vurdere, lagre og kopiere innhold.
* **Blå** for visningshandlinger. Dette inkluderer eksport, visning, forhåndsvisning i lister eller detaljvisninger, søk og nedlasting.
* **Oransje** for redigeringshandlinger. Dette inkluderer redigering, flytting, konfigurering, aktivering/deaktivering, skjuling og visning.
* **Rød** for sletting/fjerning. Dette inkluderer sletting, fjerning og avmelding.
* **Grå** for avbrytelseshandlinger. Bare å la ting forbli som de er.

## Responsivt design

Chamilo 3.0 tilpasser seg ulike skjermstørrelser. På en mobil enhet eller i et smalt nettleservindu:

* Sidemenyen er skjult som standard og kan åpnes ved å trykke på menyikonet
* Kurskort vises i én kolonne i stedet for i et rutenett
* Tabeller blir rullbare horisontalt

Dette betyr at du og dine deltakere kan bruke plattformen fra telefon, nettbrett eller datamaskin, men du kan oppleve grensesnittet noe annerledes.