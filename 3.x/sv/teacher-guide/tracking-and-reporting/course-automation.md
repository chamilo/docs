# Kursautomation (manuella utlösare)

Avsnittet **Automation** i kursrapporteringen låter behöriga lärare konfigurera åtgärder för början och slutet av en kurs. I den nuvarande implementationen av Chamilo 3.1 **utlöses åtgärderna manuellt**: utgå inte från att de körs automatiskt på ett kalenderdatum eller via cron.

## Konfigurera åtgärder

1. Öppna en kurs som lärare eller som en annan användare som får hantera kursrapportering.
2. Öppna **Rapportering** och leta upp avsnittet **Automation**.
3. Välj händelsen (**Kursen öppnas nu** eller **Kursen avslutas nu**) och en åtgärdstyp.
4. Ange det mål som åtgärden kräver och välj sedan **Lägg till åtgärd**.
5. Granska listan **Konfigurerade åtgärder** och ta bort en oönskad post med dess åtgärd **Ta bort**.

Åtgärder som stöds inkluderar att publicera eller dölja kursresurser, skicka enkätsinbjudningar, leverera befintliga intyg och ändra kursens synlighet. Tillgängliga resurser, enkäter, alternativ i Gradebook och synlighetsvärden beror på kursen och den aktuella användarens behörigheter.

## Kör den konfigurerade händelsen

Välj **Kursen öppnas nu** eller **Kursen avslutas nu** och bekräfta åtgärden. Granska det rapporterade resultatet. Chamilo registrerar slutförda körningar, förhindrar dubblettkonfigurationer och hoppar över åtgärder som redan har slutförts framgångsrikt vid senare körningar. Ett andra klick ska inte betraktas som ett sätt att skicka om en slutförd åtgärd.

För leverans av intyg ska du först förbereda och testa det aktuella intyget. För enkätsinbjudningar ska du kontrollera att enkäten är konfigurerad och att de avsedda deltagarna tillhör den aktuella kurs- eller sessionkontexten.

## Viktiga begränsningar

- Det här gränssnittet ger **manuell körning**, inte schemalagd automation.
- Åtgärder utförs inom den aktuella kurs-/sessionkontexten; testa åtkomst och mål för båda kontexterna där det är tillämpligt.
- Framgångsrikt slutförda åtgärder upprepas inte automatiskt vid senare körningar.
- Vid tidpunkten för funktionens PR hade leverans av intyg, ändringar av kurssynlighet och sessionsspecifik körning kodgranskats men inte funktionellt verifierats i den PR:en. Testa dem i din installation innan du förlitar dig på dem i drift.

Se [Kursrapporter](course-reports.md) och [Intyg och kompetenser](certificates-and-skills.md). Implementation: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).