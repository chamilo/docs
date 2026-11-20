# KI-assistert kartlegging av kursferdigheter

Chamilo 3.1 kan foreslå ferdigheter knyttet til et kurs og la autoriserte brukere gjennomgå og bruke disse forslagene i ferdighetsreferansen og karakterboken. Et KI-forslag **brukes ikke automatisk**; det må velges og godkjennes.

## Generer forslag

1. Åpne det aktuelle kursets side for **KI-assistert ferdighetskartlegging**. Ruten i applikasjonen er `/course/{courseId}/skills`, der den faktiske kurs-ID-en erstatter `{courseId}`.
2. Hvis kurset er en del av en sesjon, åpner du siden i riktig sesjonskontekst.
3. Velg en tilgjengelig **KI-leverandør**.
4. Velg **Foreslå ferdigheter for dette kurset** og gjennomgå resultatene som returneres.

KI-leverandører må være tilgjengelige og konfigurert av plattformadministrasjonen. Forslag kan vise til oppføringer for **Eksisterende ferdighet** eller anbefale en **Ny ferdighet** under en overordnet ferdighet. Hver oppføring kan inneholde beskrivelse, kriterier og en forklaring av forslaget.

## Gjennomgå og godkjenn

1. Les hvert forslag kritisk og sammenlign det med kursets mål og innhold.
2. Velg bare de gyldige ferdighetene ved hjelp av avmerkingsboksene.
3. Hvis du har nødvendig autorisasjon, velger du **Legg valgte ferdigheter til i ferdighetsreferansen og karakterboken**.
4. Kontroller de resulterende ferdighetene og karakterboktilknytningene i kurset.

Brukere uten tildelingsrettigheter kan gjennomgå forslag, men kan ikke knytte dem til. Oppretting av nye ferdigheter krever rettigheter som plattformadministrator. Forslag kan utløpe; generer et nytt sett hvis applikasjonen rapporterer at de forrige ikke lenger er gyldige.

## God praksis

KI-genererte ferdigheter er kandidater, ikke autoritative læreplan-krav. Gjennomgå formulering, duplisering, plassering under overordnet ferdighet og kriterier før godkjenning. Unngå å legge inn konfidensiell deltakerinformasjon i KI-prompter.

Se [Ferdigheter og vurderinger](../../admin-guide/skills/skills-assessments.md) og [KI-verktøykasse](toolbox-ai.md). Implementering: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).