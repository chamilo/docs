# AI-verktygslåda

**AI-verktygslådan** är ett kursverktyg som genererar interaktiva utbildningsapplikationer utifrån en lärares instruktioner. Chamilo paketerar varje genererad applikation som **SCORM 1.2**, så att deltagarens framsteg, poäng och återupptagningsdata spåras av plattformen.

> Administratören måste aktivera både `ai_helpers.enable_ai_helpers` och `ai_helpers.toolbox` under **Administration > Konfigurationsinställningar > AI-hjälpare**, och minst en textbaserad AI-leverantör måste vara konfigurerad.

## Skapa en interaktiv applikation

1. Öppna **AI-verktygslådan** i kursen.
2. Klicka på **Skapa**.
3. Ange en **Titel** och, valfritt, en **Beskrivning**.
4. I **Vad ska applikationen göra?** beskriver du den fullständiga aktivitet du vill ha. Inkludera lärandemålet, regler, nivåer, poängsättning och vad som ska hända när deltagaren är klar.
5. Välj **AI-leverantör** när fler än en är tillgänglig.
6. Klicka på **Generera**.

Den första genereringen lagras som **version 1**. Den börjar som ett utkast, så att du kan förhandsgranska den innan den görs synlig för deltagare.

## Förbättring och versionshantering

Öppna en applikations **Inställningar** för att hantera den. Du kan:

* förhandsgranska eller ladda ner den aktuella applikationen;
* använda **Förbättra med AI** för att beskriva en ändring och generera en ny version;
* granska **Versionshistorik**;
* förhandsgranska, ladda ner eller återställa en tidigare version;
* publicera eller dölja applikationen;
* öppna **Rapportering** för att granska deltagarspårning.

Att generera en förbättring tar inte bort tidigare versioner. Att återställa en tidigare version gör den versionen aktuell igen.

## Lägga till en applikation i en inlärningsväg

I [byggaren för inlärningsvägar](../adding-content/learning-paths.md) kan lärare välja en genererad applikation från AI-verktygslådan som en resurs. Applikationen måste ha en genererad version, men den behöver inte vara publicerad innan läraren lägger till den i inlärningsvägen. En opublicerad applikation är fortfarande inte tillgänglig för deltagare förrän den publiceras.

När en behörig lärare öppnar innehållet i AI-verktygslådan i **förhandsgranskningsläge** visar Chamilo **”Framsteg och poäng sparas inte i förhandsgranskningsläge.”** Att testa aktiviteten på detta sätt skapar inte deltagarspårning och uppdaterar inte någon poäng. Använd den vanliga deltagarupplevelsen för att verifiera SCORM-framsteg och poäng efter publicering.

## Validering av generering och felsökning

Efter AI-generering kontrollerar Chamilo den genererade applikationens källkod innan en version görs tillgänglig. Detta omfattar kontroller av JavaScript-syntax eller struktur samt begränsningar av osäkra webbläsar-API:er. Om valideringen misslyckas ber Chamilo AI-leverantören att **reparera resultatet en gång**; om den reparerade versionen fortfarande misslyckas avbryts genereringen med ett fel. En lyckad validering ersätter inte testning av aktivitetens inlärningsregler, tillgänglighet och SCORM-poängsättning före publicering.

Om genereringen rapporterar **HTTP 504** slutade webbservern eller gatewayen att vänta på begäran. Detta skiljer sig från en tidsgräns som införts av AI-textleverantören. Felet kan innehålla den ungefärliga förflutna tiden; prova en enklare aktivitetsbegäran och be administratören kontrollera tidsgränserna för gateway, PHP/webbserver och leverantör. Ett fel om leverantörens tidsgräns eller hastighetsbegränsning kräver i stället kontroll av den konfigurerade modellen och leverantörsinställningarna. Utgå inte från att applikationen sparades korrekt efter ett fel.

Dessa förbättringar av validering och diagnostik introducerades i [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Deltagarupplevelse

Deltagare ser endast applikationer som har publicerats. Från AI-verktygslådan kan de öppna en applikation, fortsätta från sitt senaste SCORM-tillstånd och se sina **Framsteg** och sin **Poäng**. När ett nytt försök tillåts startar **Försök igen** ett nytt försök.

Applikationer i AI-verktygslådan körs i inlärningsvägens körningsmiljö i en begränsad iframe och rapporterar sitt SCORM-tillstånd tillbaka till Chamilo. De hanteras från AI-verktygslådan snarare än från den vanliga listan över inlärningsvägar.

Behöriga MCP-klienter kan också skapa eller uppdatera applikationer i AI-verktygslådan när samma inställningar för AI-verktygslådan är aktiverade.