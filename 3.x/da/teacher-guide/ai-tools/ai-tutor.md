# AI-tutor

AI-tutoren er en chatbot integreret i Chamilo, som kursister kan interagere med for at få øjeblikkelige, AI-genererede svar. Den fungerer i to sammenhænge med forskelligt fokus i hver:

* **Inde i et kursus** — AI-tutoren er fokuseret på det pågældende kursus: den besvarer spørgsmål om indholdet, forklarer begreber, som kurset dækker, og vejleder kursisterne gennem materialet.
* **Uden for et kursus** (på den generelle platform) — AI-tutoren håndterer i stedet generiske spørgsmål om brug af platformen, f.eks. hvordan man finder noget eller bruger en funktion, frem for kursusindhold.

## Sådan virker det

Når AI-tutoren er aktiveret for et kursus, ser kursisterne en chatgrænseflade, hvor de kan:

* **Stille spørgsmål** om kursusindhold
* **Få forklaringer** af begreber, der dækkes i kurset
* **Modtage vejledning** uden at vente på, at underviseren svarer

Inde i et kursus bruger AI-tutoren kursets kontekst til at give relevante svar. Den er designet til at supplere din undervisning, ikke erstatte den.

## Aktivering af AI-tutoren

AI-tutoren kræver konfiguration på to niveauer:

1. **Platformniveau** — Administratoren skal aktivere AI-hjælpere og konfigurere mindst én AI-udbyder (se [AI-konfiguration](../../admin-guide/integrations/ai-configuration.md))
2. **Kursusniveau** — AI-tutoren skal aktiveres i kursusindstillingerne (en simpel til/fra-kontakt). Den udbyder, der bruges til chatten, er den, administratoren har konfigureret.

## Chatgrænsefladen

![AI-tutorens chatgrænseflade, der viser en samtale mellem en kursist og AI'en](../../.gitbook/assets/ai-tutor-chat.png)

AI-tutoren vises som et **fastgjort chatpanel** i kurset. Kursister kan:

* Skrive beskeder og modtage AI-genererede svar
* Se deres samtalehistorik
* Nulstille samtalen for at starte forfra

Chatgrænsefladen viser udvekslingen mellem kursisten og AI'en i et velkendt beskedformat.

## Vigtig adfærd

* **Afgrænset til, hvor den åbnes** — Inde i et kursus svarer AI-tutoren kun om det pågældende kursus; åbnes den uden for ethvert kursus, skifter den i stedet til generelle spørgsmål om brug af platformen. Platformens tilstand uden for kurser er en separat kontakt, som din administrator styrer uafhængigt af den kursusspecifikke.
* **Deaktiveret under eksamener** — AI-tutoren deaktiveres automatisk, når en kursist tager en øvelse, for at forhindre snyd
* **Samtale pr. kursist** — Hver kursist har sin egen private samtale med AI-tutoren, og promptkonteksten omfatter kun de seneste beskeder
* **Failover for udbyder** — Hvis den konfigurerede udbyder fejler, falder Chamilo tilbage til en anden tilgængelig udbyder, så chatten fortsætter med at virke

## Som underviser

Du bør være opmærksom på, at:

* AI-tutoren ikke altid giver perfekte svar — opfordr kursister til at verificere vigtig information
* Du kan gennemgå brugen af AI-tutoren via platformens sporing
* AI-tutoren er et supplement til din undervisning, ikke en erstatning. Brug den sammen med fora, meddelelser og direkte beskeder for at yde omfattende støtte til kursisterne.

## Tips

* **Sæt forventninger** — Fortæl kursisterne i begyndelsen af kurset, at der er en AI-tutor tilgængelig, og forklar, hvordan den bruges hensigtsmæssigt
* **Fremkald kritisk tænkning** — Mind kursister om at tænke kritisk over AI-genererede svar
* **Brug til ofte stillede spørgsmål** — AI-tutoren er særligt nyttig til at håndtere almindelige spørgsmål, som du ellers ville skulle besvare gentagne gange