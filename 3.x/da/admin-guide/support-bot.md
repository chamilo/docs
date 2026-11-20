# Supportbot (beslutningstræassistent)

**Supportbotten** er en konfigurerbar hjælpeassistent, der er opbygget ud fra et fast beslutningstræ. Den blev implementeret i [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) til [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Det er **ikke en generativ AI-chatbot**: administratorer skriver spørgsmål og valgbare svar, der guider brugerne til en forklaring, en side eller en supportsag.

## Aktivér den

1. Under **Administration > Konfigurationsindstillinger > Tickets** skal du aktivere `ticket.ticket_support_bot_enabled` (deaktiveret som standard).
2. Åbn **Administration > Supportbot**, og opret et **udkast** til et beslutningstræ. Angiv en titel og mindst én indgangsknude med valgmuligheder.
3. Definér spørgsmålet eller informationen ved hver knude, og knyt valgmulighederne til den næste handling.
4. Publicér et gyldigt træ. Kun et publiceret træ med en gyldig indgangsknude og valgbare valgmuligheder er tilgængeligt for brugerne.

Motoren vælger det publicerede træ for den aktuelle adgangs-URL; tilgængeligheden er derfor afgrænset til portalen. En administrator skal have `ROLE_ADMIN` for at administrere træer.

## Design et supportforløb

Hver valgmulighed kan udføre én af fire handlinger:

| Handling | Resultat |
| --- | --- |
| **Gå til en anden knude** | Fortsæt samtalen ved et andet spørgsmål i samme træ |
| **Åbn et link** | Link til en Chamilo-side via en relativ sti på samme websted, for eksempel `/tickets` |
| **Afslut samtale** | Markér problemet som løst, og vis eventuelt en afsluttende meddelelse |
| **Opret supportsag** | Eskalér samtalen til Tickets-systemet |

Ved eskalering af sager skal du vælge et **Standardsagprojekt** og en kategori, der hører til det projekt. Kategorier, der kræver et kursus, kan ikke bruges til denne eskalering fra supportbotten. Den oprettede sag indeholder brugerens udskrift af beslutningstræet, så supportmedarbejdere kan se de valg, der førte til eskaleringen.

Editoren validerer træstrukturen før publicering. Versionerne **Publiceret** og **Arkiveret** er skrivebeskyttede; brug **Duplikér** til at oprette et nyt redigerbart udkast. Publicering af en erstatning arkiverer den tidligere publicerede version i samme omfang. Fra listen kan administratorer også importere eller eksportere et træ og gennemgå dets samtalehistorik. Et publiceret træ skal arkiveres, før det kan slettes, og et træ med samtalehistorik kan ikke slettes.

## Import af eksempler og gennemgang af samtaler

Åbn **Administration > Supportbot**, og vælg **Importér**. Importdialogen tilbyder **Download JSON-eksempel** og **Download CSV-eksempel**. Download et eksempel, erstat spørgsmålene og valgmulighederne med dine egne, vælg derefter den redigerede `.json`- eller `.csv`-fil, og importér den. Ethvert importeret træ starter som et **nyt udkast**; gennemgå det, og publicér det eksplicit, når det er klar.

Eksemplerne kræver ikke et eksisterende sagprojekt. Hvis dit forløb skal oprette sager, skal du konfigurere det påkrævede projekt og en berettiget kategori efter importen.

I trælisten kan du bruge **Vis samtaler** til at gennemgå samtalelogge for et bestemt træ, herunder træer, hvis samtaleantal er nul. Samtalehistorikker forbliver afgrænset til den relevante bruger og portal. Se [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Sådan får brugerne adgang

Når indstillingen er slået til, og portalen har et gyldigt publiceret træ, ser indloggede brugere en **Supportbot**-kontakt i den fastgjorte chat. De svarer ved at vælge de tilbudte valgmuligheder. Botten kan afslutte samtalen, åbne en side på samme websted eller oprette en sag og vise linket til den. Brugerne kan starte en ny samtale, når en tidligere er afsluttet.

Dette er adskilt fra **AI Tutor**, som svarer på åbne læringsspørgsmål. Supportbotten følger kun de ruter og valgmuligheder, som administratorer har konfigureret.

## Fejlfinding og sikkerhed

* **Ingen bot i chatten:** kontrollér Tickets-indstillingen, at et træ er publiceret for den aktuelle portal, og at dets indgangsknude har valgmuligheder.
* **Kan ikke publicere:** gennemgå manglende knuder, uløste destinationsknuder og ugyldige handlinger i udkastet.
* **Sag kan ikke oprettes:** kontrollér det valgte sagprojekt og kategorien. Brug ikke en sagkategori, der kræver et kursus.
* **Ældre samtaler mangler:** administratorer kan gennemgå samtalehistorikken fra det tilsvarende træ; samtaler er knyttet til en bruger og en adgangs-URL.

For den relaterede indstilling, se [Indstillinger for Tickets](platform-settings/ticket-settings.md).