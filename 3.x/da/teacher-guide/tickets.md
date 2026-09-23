# Supportbilletter

Værktøjet **Tickets** er et indbygget helpdesk-system, der lader brugere indsende supportanmodninger og følge deres behandling. Afhængigt af hvordan din platform er konfigureret, kan du bruge det som **anmoder** (indsende billetter på egne eller dine kursisters vegne) eller som **supportagent** (besvare billetter tildelt din kategori).

## Sådan er systemet organiseret

Billetter tilhører **projekter**, som yderligere er opdelt i **kategorier**. Hver kategori kan have én eller flere supportagenter tildelt. Når en billet indsendes, dirigeres den automatisk til en ledig agent i den valgte kategori.

Standardkategorier omfatter:

| Kategori | Beskrivelse |
|----------|-------------|
| Enrollment | Spørgsmål og problemer om tilmelding til kursus eller session |
| General information | Generelle spørgsmål om platformen |
| Requests and paperwork | Administrative anmodninger og dokumentation |
| Academic Incidents | Problemer relateret til eksamener, opgaver eller opgaver |
| Virtual campus | Tekniske problemer med platformen |
| Online evaluation | Problemer med en specifik kursusvurdering (kræver valg af et kursus) |

## Adgang til billetværktøjet

Hvis din administrator har aktiveret billethovedet, vises et billetikon <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Billet" data-size="line"> i den øverste navigationslinje. Klik på det for at gå direkte til formularen til indsendelse af billetter.

Du kan også tilgå dine billetter fra hovedmenuen under **Support** eller **Tickets**, afhængigt af din platformkonfiguration.

## Indsendelse af en billet

Sådan åbner du en ny supportanmodning:

1. Klik på **New ticket** (eller billetikonet i den øverste linje).
2. Vælg den **kategori**, der bedst matcher dit problem.
3. Hvis kategorien kræver det (for eksempel Online evaluation), skal du vælge det relevante **kursus**.
4. Angiv et **emne** — et kort resumé af problemet.
5. Skriv din **besked**, der beskriver problemet i detaljer.
6. Vedhæft eventuelt filer (skærmbilleder, dokumenter) for at hjælpe supportagenten med at forstå problemet.
7. Klik på **Submit**.

Billetten tildeles et ID og dirigeres til en supportagent. Du modtager en meddelelse, når agenten svarer.

## Opfølgning på dine billetter

Fra billetoversigten kan du se alle billetter, du har indsendt, og deres aktuelle status:

| Status | Betydning |
|--------|---------|
| New | Netop indsendt, endnu ikke gennemgået |
| Pending | Under gennemgang af en supportagent |
| Unconfirmed | Afventer bekræftelse eller yderligere oplysninger |
| Forwarded | Overført til et andet team eller en anden agent |
| Closed | Løst |

Klik på en vilkårlig billet for at læse hele samtaletråden og tilføje et svar.

## Svar på en billet

Når en billet er åben, udveksler du og supportagenten beskeder i samme tråd. Sådan tilføjer du et svar:

1. Åbn billetten fra din liste.
2. Rul ned til svarfeltet nederst.
3. Skriv dit svar og vedhæft filer, hvis det er nødvendigt.
4. Klik på **Send**.

Begge parter modtager meddelelser, når en ny besked tilføjes til tråden.

## Håndtering af billetter som supportagent

Hvis din administrator har tildelt dig én eller flere billetkategorier, vil du se indkommende billetter fra kursister eller kolleger i din kø.

Sådan svarer du på en tildelt billet:

1. Åbn din billetoversigt — tildelte billetter vises sammen med billetter, du selv har indsendt.
2. Klik på en billet for at læse anmoderens besked.
3. Skriv et svar og klik på **Send**. Billettens status opdateres automatisk.
4. Når problemet er løst, skal du ændre status til **Closed**.

Du kan også ændre **prioriteten** for en billet (Low, Normal, High) for at hjælpe med at prioritere din kø.

> Adgang til billetkategorier styres af platformadministratoren. Hvis du skal tilføjes som supportagent for en kategori, skal du kontakte din administrator. Se administratorvejledningens [Tickets Settings](../admin-guide/platform-settings/ticket-settings.md) for konfigurationsmuligheder.