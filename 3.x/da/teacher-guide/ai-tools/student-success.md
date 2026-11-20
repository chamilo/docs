# AI-coach til studerendes succes

**AI-coachen til studerendes succes** hjælper en underviser med at omsætte kursusaktivitet til praktiske anbefalinger for én kursist. Den er tilgængelig fra kursistlisten i kursusets rapporteringsområde, når AI-hjælpere og funktionen **Kursusanalyse** er aktiveret for det pågældende kursus.

> Platformen skal have mindst én tekstbaseret AI-udbyder konfigureret. Se [AI-konfiguration](../../admin-guide/integrations/ai-configuration.md). De relevante platformindstillinger er `ai_helpers.enable_ai_helpers` og `ai_helpers.course_analyser` under **Administration > Konfigurationsindstillinger > AI-hjælpere**.

## Generering af en anbefaling

1. Åbn kursusets rapporteringsområde, og vis **Kursistlisten**.
2. Find kursisten, og klik på handlingen **AI-coach til studerendes succes**.
3. Hvis flere AI-udbydere er tilgængelige, skal du vælge én.
4. Indtast eventuelt **Yderligere instruktioner til AI-coachen**. De giver dig mulighed for at tilføje undervisningskontekst eller bede coachen om at fokusere på en bestemt vanskelighed.
5. Klik på **Analysér brugerens læring**.

Chamilo forbereder først eller genbruger en kursusanalyse og analyserer derefter kursistens aktivitet i den aktuelle kursus- eller kursussessionskontekst.

## Hvad anbefalingen indeholder

Resultatet kan omfatte:

* et kortfattet overordnet resumé;
* **Prioriterede handlinger**;
* foreslåede **Yderligere aktiviteter**;
* anbefalinger om **Rytme** og tempo;
* alternative **Læringsmetodologier**;
* andre anbefalinger, når det er relevant;
* **Evidens**-links fra det godkendte pædagogiske kildekatalog for kursets sprog.

Anbefalingen gemmes i Chamilo for den pågældende kursist og kursuskontekst. Chamilo gemmer også en kopi i underviserens egen indbakke, når oprettelsen af meddelelsen lykkes, så den kan gennemgås senere.

## Privatliv

Før analysen starter, viser Chamilo en privatlivsadvarsel. Direkte profilidentifikatorer udelades fra de kursistdata, der sendes til AI-udbyderen, og AI'en instrueres i ikke at identificere kursisten eller udlede følsomme egenskaber. Læringsaktivitet og kursusindhold kan dog stadig indeholde oplysninger, der indirekte kan identificere nogen. Følg din organisations AI- og privatlivspolitik, før du bruger funktionen.

Den samme analyse af studerendes succes er også tilgængelig for autoriserede MCP-klienter via værktøjet `generate_student_success_feedback`; den genbruger det samme privatlivsfiltrerede analyseforløb.