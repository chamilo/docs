# Övningsgenerator

AI-övningsgeneratorn hjälper dig att automatiskt skapa quizfrågor med hjälp av artificiell intelligens. Du anger ett ämne eller innehåll, och AI:n genererar frågor som du kan granska, redigera och lägga till i dina övningar.

## Åtkomst till övningsgeneratorn

Övningsgeneratorn är tillgänglig när du skapar eller redigerar en övning, förutsatt att:

1. AI-hjälpare är aktiverade på plattformsnivå
2. Minst en AI-textleverantör är konfigurerad

Leta efter knappen eller avsnittet **AI Generator** i gränssnittet för att skapa övningar.

## Så här genererar du frågor

![Formuläret för AI-övningsgeneratorn med fält för ämne och antal frågor](/.gitbook/assets/ai-exercise-generator.png)

Generatorn erbjuder två lägen, tillgängliga som flikar:

* **Test from topic** — Generera frågor från en textuell ämnesbeskrivning
* **Test from document** — Generera frågor från ett kursdokument (endast tillgängligt när en dokumentkapabel leverantör är konfigurerad). När detta läge används blir ämnesfältet valfritt och behandlas som en extra ledtråd.

1. Öppna AI Generator-formuläret i en övning och välj läge
2. Konfigurera genereringsparametrarna:
   * **Quiz title** — Titeln på den resulterande övningen
   * **Questions topic** — Beskriv vad frågorna ska handla om (eller, i dokumentläge, en valfri ledtråd)
   * **Number of questions** — Hur många frågor som ska genereras (begränsat till 100)
   * **Question type** — För närvarande erbjuds endast **Multiple answer**
   * **AI provider** — Välj vilken AI-leverantör som ska användas (visas endast när mer än en är konfigurerad)
3. Klicka på **Generate**
4. AI:n producerar en uppsättning frågor med svarsalternativ och markerade korrekta svar. När AI-redovisning är aktiverad föregås genererade frågor av **\[AI-assisted\]**.

## Granskning och redigering

![AI-genererade frågor visade för granskning med alternativ att redigera, acceptera eller ta bort varje fråga](/.gitbook/assets/ai-exercise-generator-results.png)

Genererade frågor presenteras som **förslag**. Du bör:

* **Granska varje fråga** avseende korrekthet och relevans
* **Redigera formuleringen** vid behov — justera frågor, svarsalternativ och återkoppling
* **Verifiera korrekta svar** — se till att AI:n har identifierat rätt svar
* **Ta bort olämpliga frågor** — radera sådana som inte uppfyller dina krav
* **Justera poängsättning** — ange lämpliga poängvärden för varje fråga

När du är nöjd lägger du till frågorna i din övning.

Observera att trots våra specifika formatförfrågningar kommer vissa modeller att returnera frågetitlar som föregås av ett nummer. Vi rekommenderar inte att du lämnar det numret kvar eftersom det försvårar blandningen av frågor i tester med slumpmässigt valda frågor. Ibland får du dessutom inte lika många frågor som du har begärt, så se till att du kontrollerar det och eventuellt genererar fler frågor, eller byter modell om du har den möjligheten.

## Redovisning av AI-genererat innehåll

Innehåll som genererats av AI märks med ett redovisningsmeddelande som anger att det skapats med artificiell intelligens. Denna transparens hjälper deltagare att förstå materialets ursprung.

## Tips

* **Ange specifika ämnen** — Ju mer specifik din ämnesbeskrivning är, desto mer relevanta blir de genererade frågorna.
* **Granska alltid** — AI-genererat innehåll kan innehålla fel. Publicera aldrig frågor utan att granska dem först.
* **Använd som utgångspunkt** — Genererade frågor är en tidsbesparing, inte en färdig produkt. Redigera dem så att de stämmer med din undervisningsstil och ditt kursinnehåll.
* **Blanda med manuella frågor** — Kombinera AI-genererade frågor med manuellt skapade för bästa resultat.
* **Prova olika leverantörer** — Om flera AI-leverantörer är tillgängliga, prova olika för att se vilken som ger de bästa frågorna för ditt ämnesområde.