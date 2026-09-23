# AI-veileder

AI-veilederen er en chatbot integrert i Chamilo som lærende kan samhandle med for å få umiddelbare, AI-genererte svar. Den virker i to kontekster, med ulikt fokus i hver:

* **Inne i et kurs** — AI-veilederen er fokusert på det kurset: den svarer på spørsmål om innholdet, forklarer begreper kurset dekker, og veileder lærende gjennom materialet.
* **Utenfor et kurs** (på den generelle plattformen) — AI-veilederen håndterer i stedet generelle spørsmål om bruk av plattformen, for eksempel hvordan man finner noe eller bruker en funksjon, fremfor kursinnhold.

## Slik virker det

Når AI-veilederen er aktivert for et kurs, ser lærende et chatgrensesnitt der de kan:

* **Stille spørsmål** om kursinnhold
* **Få forklaringer** av begreper som dekkes i kurset
* **Motta veiledning** uten å vente på at læreren svarer

Inne i et kurs bruker AI-veilederen kursets kontekst for å gi relevante svar. Den er utformet for å supplere undervisningen din, ikke erstatte den.

## Aktivere AI-veilederen

AI-veilederen krever konfigurasjon på to nivåer:

1. **Plattformnivå** — Administratoren må aktivere AI-hjelpere og konfigurere minst én AI-leverandør (se [AI-konfigurasjon](../../admin-guide/integrations/ai-configuration.md))
2. **Kursnivå** — AI-veilederen må aktiveres i kursinnstillingene (en enkel av/på-bryter). Leverandøren som brukes til chatten, er den administratoren har konfigurert.

## Chatgrensesnittet

![Chatgrensesnittet til AI-veilederen som viser en samtale mellom en lærende og AI-en](../../.gitbook/assets/ai-tutor-chat.png)

AI-veilederen vises som et **dokket chatpanel** i kurset. Lærende kan:

* Skrive meldinger og motta AI-genererte svar
* Se samtalehistorikken sin
* Tilbakestille samtalen for å starte på nytt

Chatgrensesnittet viser utvekslingen mellom den lærende og AI-en i et kjent meldingsformat.

## Viktig atferd

* **Avgrenset til der den åpnes** — Inne i et kurs svarer AI-veilederen bare om det kurset; åpnet utenfor ethvert kurs, går den over til generelle spørsmål om bruk av plattformen. Modusen for hele plattformen (utenfor kurs) er en egen bryter som administratoren styrer uavhengig av den per kurs.
* **Deaktivert under eksamener** — AI-veilederen deaktiveres automatisk når en lærende tar en øvelse, for å hindre juks
* **Samtale per lærende** — Hver lærende har sin egen private samtale med AI-veilederen, og ledetekstkonteksten omfatter bare de nyeste meldingene
* **Leverandørfailover** — Hvis den konfigurerte leverandøren svikter, faller Chamilo tilbake til en annen tilgjengelig leverandør slik at chatten fortsetter å virke

## Som lærer

Du bør være klar over at:

* AI-veilederen ikke alltid gir perfekte svar — oppfordre lærende til å verifisere viktig informasjon
* Du kan gjennomgå bruk av AI-veilederen via plattformsporing
* AI-veilederen er et supplement til undervisningen din, ikke en erstatning. Bruk den sammen med forum, kunngjøringer og direktemeldinger for omfattende støtte til lærende.

## Tips

* **Sett forventninger** — Fortell lærende ved kursstart at en AI-veileder er tilgjengelig, og forklar hvordan den brukes på en hensiktsmessig måte
* **Oppmuntre til kritisk tenkning** — Minn lærende på å tenke kritisk om AI-genererte svar
* **Bruk til ofte stilte spørsmål** — AI-veilederen er særlig nyttig for å håndtere vanlige spørsmål som du ellers ville svart på gjentatte ganger