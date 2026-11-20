# Aktivitetsrevisjon

Rapporten Aktivitetsrevisjon lar deg bla gjennom viktige administrative og plattformaktiviteter, filtrert etter hendelsestype. Det er den samme underliggende rapporten som tidligere var tilgjengelig fra **Sporing > Revisjon av administrativ aktivitet**; den er nå også lenket direkte fra Sikkerhet-blokken, siden den primært er et verktøy for sikkerhet og ansvarlighet.

## Tilgang til Aktivitetsrevisjon

Fra administrasjonspanelet klikker du **Sikkerhet > Aktivitetsrevisjon**.

## Hva den viser

![Siden Aktivitetsrevisjon som lister kategorier for hendelsestyper som Kurs, Økt, Bruker, Sosialt, Melding, Ressurs, Wiki og Annet, hver utvidbar til individuelle hendelsestyper](/.gitbook/assets/admin-security-activities-audit.png)

Hendelser er gruppert i kategorier:

* **Kurs** — Opprettelse, sletting og innstillingsendringer for kurs
* **Økt** — Opprettelse, sletting og påmeldingsendringer for økter og øktkategorier
* **Bruker** — Kontoopprettelse, sletting, passordoppdateringer, feltendringer og mer
* **Sosialt** — Opprettelse, sletting og medlemskapsendringer for sosiale grupper
* **Melding** — Endringer og slettinger av meldingsdata
* **Ressurs** — Opprettelse og sletting av ressurser og ressurslenker
* **Wiki** — Visninger av wikisider
* **Annet** — Alt annet, inkludert plugin-aktivitet, låsing av karakterbok, slettinger av øvelsesforsøk, tvungne innloggingsforsøk og innstillingsendringer på plattformnivå

Klikk på en brikke for hendelsestype (for eksempel **Forsøkt tvungen innlogging**) for å filtrere rapporten ned til en tabell med samsvarende oppføringer. Du kan også søke direkte etter nøkkelord ved hjelp av feltet **Søk** over listen over hendelsestyper.

## Bruksområder

* Undersøke hvem som slettet et kurs, en økt eller en brukerkonto, og når
* Bekrefte om en spesifikk administrativ endring (en innstillingsoppdatering, en plugin-installasjon) ble gjort av en forventet administrator
* Følge opp hendelser av typen **Forsøkt tvungen innlogging** sammen med rapporten [Innloggingsforsøk](login-attempts.md)