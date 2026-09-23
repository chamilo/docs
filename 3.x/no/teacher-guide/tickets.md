# Supportbilletter

Verktøyet **Tickets** er et innebygd helpdesksystem som lar brukere sende inn supportforespørsler og følge opp behandlingen av dem. Avhengig av hvordan plattformen din er konfigurert, kan du bruke det som **rekvirent** (sende inn billetter på vegne av deg selv eller dine deltakere) eller som **supportagent** (svare på billetter tildelt din kategori).

## Hvordan systemet er organisert

Billetter tilhører **prosjekter**, som videre er delt inn i **kategorier**. Hver kategori kan ha én eller flere supportagenter tildelt. Når en billett sendes inn, rutes den automatisk til en tilgjengelig agent i den valgte kategorien.

Standardkategorier omfatter:

| Kategori | Beskrivelse |
|----------|-------------|
| Enrollment | Spørsmål og problemer om påmelding til kurs eller økt |
| General information | Generelle spørsmål om plattformen |
| Requests and paperwork | Administrative forespørsler og dokumentasjon |
| Academic Incidents | Problemer knyttet til eksamener, innleveringer eller oppgaver |
| Virtual campus | Tekniske problemer med plattformen |
| Online evaluation | Problemer med en spesifikk kursvurdering (krever at et kurs velges) |

## Tilgang til billettverktøyet

Hvis administratoren har aktivert billettlenken, vises et billettikon <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Billett" data-size="line"> i den øverste navigasjonslinjen. Klikk på det for å gå direkte til skjemaet for innsending av billett.

Du kan også nå billettene dine fra hovedmenyen under **Support** eller **Tickets**, avhengig av plattformkonfigurasjonen.

## Sende inn en billett

Slik åpner du en ny supportforespørsel:

1. Klikk **New ticket** (eller billettikonet i den øverste linjen).
2. Velg **kategorien** som passer best til problemet ditt.
3. Hvis kategorien krever det (for eksempel Online evaluation), velg det aktuelle **kurset**.
4. Skriv inn et **emne** — et kort sammendrag av problemet.
5. Skriv **meldingen** din og beskriv problemet i detalj.
6. Du kan valgfritt legge ved filer (skjermbilder, dokumenter) for å hjelpe supportagenten med å forstå saken.
7. Klikk **Submit**.

Billetten tildeles en ID og rutes til en supportagent. Du mottar et varsel når agenten svarer.

## Følge opp billettene dine

Fra billettlisten kan du se alle billetter du har sendt inn og deres nåværende status:

| Status | Betydning |
|--------|---------|
| New | Nettopp sendt inn, ennå ikke gjennomgått |
| Pending | Under gjennomgang av en supportagent |
| Unconfirmed | Venter på bekreftelse eller tilleggsinformasjon |
| Forwarded | Overført til et annet team eller en annen agent |
| Closed | Løst |

Klikk på en billett for å lese hele samtaletråden og legge til et svar.

## Svare på en billett

Når en billett er åpen, utveksler du og supportagenten meldinger i samme tråd. Slik legger du til et svar:

1. Åpne billetten fra listen din.
2. Bla til svarfeltet nederst.
3. Skriv svaret ditt og legg ved filer om nødvendig.
4. Klikk **Send**.

Begge parter mottar varsler når en ny melding legges til i tråden.

## Behandle billetter som supportagent

Hvis administratoren har tildelt deg én eller flere billettkategorier, vil du se innkommende billetter fra deltakere eller kolleger i køen din.

Slik svarer du på en tildelt billett:

1. Åpne billettlisten din — tildelte billetter vises sammen med billetter du selv har sendt inn.
2. Klikk på en billett for å lese rekvirentens melding.
3. Skriv et svar og klikk **Send**. Billettstatusen oppdateres automatisk.
4. Når saken er løst, endre statusen til **Closed**.

Du kan også endre **prioriteten** til en billett (Low, Normal, High) for å hjelpe med å prioritere køen.

> Tilgang til billettkategorier styres av plattformadministratoren. Hvis du trenger å bli lagt til som supportagent for en kategori, kontakt administratoren. Se [Tickets Settings](../admin-guide/platform-settings/ticket-settings.md) i administratorveiledningen for konfigurasjonsvalg.