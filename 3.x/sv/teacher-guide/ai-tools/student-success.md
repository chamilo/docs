# AI-coach för studentframgång

**AI-coach för studentframgång** hjälper en lärare att omvandla kursaktivitet till praktiska rekommendationer för en deltagare. Den är tillgänglig från deltagarlistan i kursens rapporteringsområde när AI-hjälpare och funktionen **Kursanalysator** är aktiverade för den kursen.

> Plattformen måste ha minst en textbaserad AI-leverantör konfigurerad. Se [AI-konfiguration](../../admin-guide/integrations/ai-configuration.md). De relevanta plattformsinställningarna är `ai_helpers.enable_ai_helpers` och `ai_helpers.course_analyser` under **Administration > Konfigurationsinställningar > AI-hjälpare**.

## Generera en rekommendation

1. Öppna kursens rapporteringsområde och visa **Deltagarlistan**.
2. Hitta deltagaren och klicka på åtgärden **AI-coach för studentframgång**.
3. Om flera AI-leverantörer är tillgängliga, välj en.
4. Ange valfritt **Ytterligare instruktioner till AI-coachen**. Dessa låter dig lägga till undervisningskontext eller be coachen att fokusera på en specifik svårighet.
5. Klicka på **Analysera användarens lärande**.

Chamilo förbereder eller återanvänder först en kursanalys och analyserar sedan deltagarens aktivitet i den aktuella kursen eller kurs-sessionskontexten.

## Vad rekommendationen innehåller

Resultatet kan innehålla:

* en kortfattad övergripande sammanfattning;
* **Prioriterade åtgärder**;
* föreslagna **Ytterligare aktiviteter**;
* rekommendationer om **Rytm** och tempo;
* alternativa **Lärandemetoder**;
* andra rekommendationer när det är relevant;
* **Evidens**-länkar från den godkända pedagogiska källkatalogen för kursspråket.

Rekommendationen lagras i Chamilo för den deltagaren och kurskontexten. Chamilo sparar också en kopia i lärarens egen inkorg när meddelandet skapas, så att den kan granskas senare.

## Integritet

Innan analysen startar visar Chamilo en integritetsvarning. Direkta profilidentifierare utelämnas från den deltagardata som skickas till AI-leverantören, och AI:n instrueras att inte identifiera deltagaren eller dra slutsatser om känsliga egenskaper. Lärandeaktivitet och kursinnehåll kan dock fortfarande innehålla information som indirekt kan identifiera någon. Följ din organisations AI- och integritetspolicy innan du använder funktionen.

Samma analys för studentframgång är också tillgänglig för behöriga MCP-klienter via verktyget `generate_student_success_feedback`; den återanvänder samma integritetsfiltrerade analysflöde.