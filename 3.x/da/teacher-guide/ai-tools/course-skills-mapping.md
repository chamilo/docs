# AI-assisteret kortlægning af kursuskompetencer

Chamilo 3.1 kan foreslå kompetencer, der er knyttet til et kursus, og lade autoriserede brugere gennemgå og anvende disse forslag på kompetencereferentiellet og Karakterbogen. Et AI-forslag **anvendes ikke automatisk**; det skal vælges og godkendes.

## Generér forslag

1. Åbn det relevante kursus' side **AI-assisteret kompetencekortlægning**. Applikationens rute er `/course/{courseId}/skills`, hvor det faktiske kursus-id erstatter `{courseId}`.
2. Hvis kurset indgår i en session, skal du åbne siden i den korrekte sessionskontekst.
3. Vælg en tilgængelig **AI-udbyder**.
4. Vælg **Foreslå kompetencer til dette kursus**, og gennemgå de returnerede resultater.

AI-udbydere skal være tilgængelige og konfigureret af platformadministrationen. Forslag kan henvise til poster af typen **Eksisterende kompetence** eller anbefale en **Ny kompetence** under en overordnet kompetence. Hver post kan indeholde sin beskrivelse, kriterier og en forklaring af forslaget.

## Gennemgå og godkend

1. Læs hvert forslag kritisk, og sammenlign det med kursets mål og indhold.
2. Vælg kun de gyldige kompetencer ved hjælp af deres afkrydsningsfelter.
3. Hvis du har den nødvendige autorisation, skal du vælge **Tilføj valgte kompetencer til referentiellet og Karakterbogen**.
4. Kontrollér de resulterende kompetencer og Karakterbog-tilknytninger i kurset.

Brugere uden tildelingsrettigheder kan gennemgå forslag, men kan ikke tilknytte dem. Oprettelse af nye kompetencer kræver rettigheder som platformadministrator. Forslag kan udløbe; generér et nyt sæt, hvis applikationen rapporterer, at de tidligere ikke længere er gyldige.

## God praksis

AI-genererede kompetencer er kandidater, ikke autoritative læseplanskrav. Gennemgå formulering, dubletter, placering under overordnet kompetence og kriterier før godkendelse. Undgå at indtaste fortrolige oplysninger om kursister i AI-prompts.

Se [Kompetencer og vurderinger](../../admin-guide/skills/skills-assessments.md) og [AI-værktøjskasse](toolbox-ai.md). Implementering: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).