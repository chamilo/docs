# AI-ondersteunde vaardighedenmapping voor cursussen

Chamilo 3.1 kan vaardigheden voorstellen die aan een cursus zijn gekoppeld en geautoriseerde gebruikers deze suggesties laten beoordelen en toepassen op het vaardighedenreferentieel en de Gradebook. Een AI-suggestie wordt **niet automatisch toegepast**; deze moet worden geselecteerd en goedgekeurd.

## Suggesties genereren

1. Open de pagina **AI-ondersteunde vaardighedenmapping** van de betreffende cursus. De applicatieroute is `/course/{courseId}/skills`, waarbij de werkelijke cursus-ID `{courseId}` vervangt.
2. Als de cursus deel uitmaakt van een sessie, open de pagina in de juiste sessiecontext.
3. Kies een beschikbare **AI-provider**.
4. Selecteer **Vaardigheden voorstellen voor deze cursus** en beoordeel de teruggegeven resultaten.

AI-providers moeten beschikbaar zijn en door het platformbeheer zijn geconfigureerd. Suggesties kunnen verwijzen naar vermeldingen van een **Bestaande vaardigheid** of een **Nieuwe vaardigheid** onder een bovenliggende vaardigheid aanbevelen. Elke vermelding kan een beschrijving, criteria en een toelichting op de suggestie bevatten.

## Beoordelen en goedkeuren

1. Lees elke suggestie kritisch en vergelijk deze met de cursusdoelstellingen en de inhoud.
2. Selecteer alleen de geldige vaardigheden via hun selectievakjes.
3. Als u over de vereiste autorisatie beschikt, kies dan **Geselecteerde vaardigheden toevoegen aan referentieel en Gradebook**.
4. Controleer de resulterende vaardigheden en Gradebook-koppelingen in de cursus.

Gebruikers zonder toewijzingsrechten kunnen suggesties beoordelen, maar kunnen ze niet koppelen. Het aanmaken van nieuwe vaardigheden vereist rechten van de platformbeheerder. Suggesties kunnen verlopen; genereer een nieuwe set als de applicatie meldt dat de vorige niet langer geldig zijn.

## Goede praktijk

Door AI gegenereerde vaardigheden zijn kandidaten, geen gezaghebbende curriculumvereisten. Beoordeel de formulering, duplicatie, plaatsing onder de bovenliggende vaardigheid en de criteria vóór goedkeuring. Vermijd het invoeren van vertrouwelijke informatie over lerenden in AI-prompts.

Zie [Vaardigheden en beoordelingen](../../admin-guide/skills/skills-assessments.md) en [AI-toolbox](toolbox-ai.md). Implementatie: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).