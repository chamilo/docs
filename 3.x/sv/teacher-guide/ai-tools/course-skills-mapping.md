# AI-assisterad kartläggning av kursfärdigheter

Chamilo 3.1 kan föreslå färdigheter som är kopplade till en kurs och låta behöriga användare granska och tillämpa dessa förslag på färdighetsreferensen och Gradebook. Ett AI-förslag **tillämpas inte automatiskt**; det måste väljas och godkännas.

## Generera förslag

1. Öppna den aktuella kursens sida för **AI-assisterad kartläggning av färdigheter**. Applikationsrutten är `/course/{courseId}/skills`, där det faktiska kurs-ID:t ersätter `{courseId}`.
2. Om kursen ingår i en session öppnar du sidan i rätt sessionskontext.
3. Välj en tillgänglig **AI-leverantör**.
4. Välj **Föreslå färdigheter för den här kursen** och granska de returnerade resultaten.

AI-leverantörer måste vara tillgängliga och konfigurerade av plattformsadministrationen. Förslag kan hänvisa till poster av typen **Befintlig färdighet** eller rekommendera en **Ny färdighet** under en överordnad färdighet. Varje post kan innehålla beskrivning, kriterier och en förklaring av förslaget.

## Granska och godkänn

1. Läs varje förslag kritiskt och jämför det med kursens mål och innehåll.
2. Välj endast de giltiga färdigheterna med hjälp av deras kryssrutor.
3. Om du har erforderlig behörighet väljer du **Lägg till valda färdigheter i referensen och Gradebook**.
4. Verifiera de resulterande färdigheterna och Gradebook-kopplingarna i kursen.

Användare utan tilldelningsbehörighet kan granska förslag men inte koppla dem. Att skapa nya färdigheter kräver behörighet som plattformsadministratör. Förslag kan upphöra att gälla; generera en ny uppsättning om applikationen rapporterar att de tidigare inte längre är giltiga.

## God praxis

AI-genererade färdigheter är kandidater, inte auktoritativa läroplanskrav. Granska formulering, dubbletter, placering under överordnad färdighet och kriterier före godkännande. Undvik att ange konfidentiell information om deltagare i AI-prompter.

Se [Färdigheter och bedömningar](../../admin-guide/skills/skills-assessments.md) och [AI-verktygslåda](toolbox-ai.md). Implementering: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).