# Hot Potatoes-aktiviteter

Chamilo 3.1 stöder import av Hot Potatoes HTML-aktiviteter till det moderna verktyget Övningar och användning av enskilda aktiviteter i inlärningsvägar.

## Importera en aktivitet

1. Öppna kursens verktyg **Övningar** och gå till **Hot Potatoes**.
2. I **Importera Hot Potatoes** väljer du ett **ZIP**-paket från Hot Potatoes eller en fristående **HTML**-export.
3. Om en aktivitet är beroende av länkade bilder, media eller andra filer ska du inkludera dessa resurser i ZIP-filen.
4. Välj **Importera** och kontrollera att den importerade aktiviteten öppnas och visas korrekt.

## Hantera och återanvända aktiviteter

I listan för Hot Potatoes använder du **Öppna** för att förhandsgranska aktiviteten, **Redigera** för att ändra dess titel, **Publicera** eller **Dölj** för att styra synligheten och **Ta bort** för att ta bort den när det är tillåtet. Byggaren för inlärningsvägar kan inkludera enskilda Hot Potatoes-aktiviteter bland sina resurser.

## Granska deltagarnas försök

Åtgärden **Försök** visar spårade försök för lärargranskning. Lärare kan tilldela ett granskat procentuellt resultat från 0 till 100. Skärmen visar för närvarande upp till de senaste 100 försöken. Använd aktivitetens faktiska renderade resultat som stödjande underlag när du bedömer en deltagare.

**Automatisk poängsättning och synkronisering med betygsboken är inte implementerade.** Poäng som visas av ett Hot Potatoes-paket i sig får inte behandlas som verifierade betyg på serversidan. Lärargranskade resultat lagras separat.

## Felsökning

Om media saknas exporterar du aktiviteten på nytt med alla länkade resurser i dess ZIP-fil. Om en HTML-export fungerar på en lokal dator men inte i Chamilo kontrollerar du externa filreferenser eller inkompatibelt inbäddat innehåll. Testa aktivitetens synlighet både med ett studentkonto och med ett lärarkonto.

Se [Övningar](exercises.md) och [Inlärningsvägar](../adding-content/learning-paths.md). Implementering: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).