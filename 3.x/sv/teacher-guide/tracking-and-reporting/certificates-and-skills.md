# Certifikat och färdigheter

Chamilo låter dig tilldela certifikat till deltagare som uppfyller specifika prestationskriterier, och att validera färdigheter kopplade till dessa prestationer.

## Hur certifikat fungerar

Certifikat är kopplade till **Bedömningar** (även kallat Gradebook). När en deltagares betyg når eller överstiger den minimitröskel du definierar blir ett certifikat tillgängligt för nedladdning.

Arbetsflödet är:

1. Konfigurera [Bedömningar](../assessing-learners/gradebook.md) med dina övningar, uppgifter och andra betygsatta aktiviteter
2. Definiera ett **minimipoäng för certifiering** (t.ex. 70 %)
3. När en deltagare når det poängtalet kan de ladda ner sitt certifikat (antingen i själva verktyget Bedömningar, eller från en lärstig om du har konfigurerat det sista steget för det). Som lärare kan du också använda åtgärden **Generera certifikat** i gradebook för att skapa PDF-filerna i batch för alla behöriga deltagare.

## Certifikatmallar

Certifikat använder mallar som definieras av plattformsadministratören. Mallen innehåller vanligtvis:

* Deltagarens namn
* Kursnamnet
* Datum för slutförande
* Uppnått poäng
* En QR-kod eller URL för onlineverifiering

## Certifikatets giltighet och utgång

Certifikat kan ställas in att upphöra efter ett visst antal dagar. I inställningarna för [Bedömningar](../assessing-learners/gradebook.md) för rotkategorin, när **Generera certifikat** är aktiverat, visas fältet **Certifikatets giltighet (dagar)**. Lämna det på `0` (standardvärdet) för certifikat som aldrig upphör, eller ange ett antal dagar för att ett certifikat ska upphöra så många dagar efter att det utfärdades.

Varje certifikats eget utgångsdatum beräknas automatiskt utifrån den inställningen när det genereras (eller regenereras) — du anger det inte certifikat för certifikat. Listan **Certifikat** visar en kolumn **Utgångsdatum** för varje deltagare, med texten **Upphör aldrig** när ingen giltighetsperiod gäller.

Om kategorin inte har någon giltighetsperiod konfigurerad kan du ändå ange (eller ändra) en enskild deltagares utgångsdatum för hand: klicka på pennknappen **Redigera utgångsdatum** bredvid deras post och välj ett datum. Den här knappen är bara tillgänglig när kategorin själv inte har någon giltighetsperiod — när en giltighetsperiod är inställd hanteras utgångsdatum automatiskt och kan inte längre redigeras certifikat för certifikat.

![Certifikatlistan som visar kolumnen Utgångsdatum för tre deltagare](../../.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Påminna deltagare om kommande eller passerad utgång

Öppna listan **Certifikat** för din bedömning och klicka på knappen **Utgående certifikat** <img src="../../.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Utgående certifikat" data-size="line"> för att se vilka deltagares certifikat som har upphört eller är på väg att upphöra. Sidan visar, per deltagare: certifikatets **Utgångsdatum**, dess **Status** (**Utgånget** eller **Utgår snart**) och när en påminnelse om det **Senast skickad påminnelse** (eller **Aldrig**). Använd **Dagar i förväg** för att vidga eller begränsa hur långt in i framtiden "utgår snart" tittar.

![Sidan Utgående certifikat som listar ett utgånget och ett snart utgående certifikat](../../.gitbook/assets/gradebook-certificate-expirations.png)

För att meddela deltagarna själv:

1. Välj de deltagare du vill påminna (eller välj alla)
2. Klicka på **Skicka avisering**
3. Granska förhandsvisningen av e-postmeddelandet som kommer att skickas — separata förhandsvisningar visas för formuleringarna "utgår snart" och "utgånget", beroende på vilka av dina valda deltagare som faller i varje fall
4. Bekräfta genom att klicka på **Skicka avisering** igen i dialogrutan

![Bekräftelsedialogen Skicka avisering som förhandsvisar e-postformuleringarna för utgående och utgångna](../../.gitbook/assets/gradebook-certificate-expiry-notification.png)

Varje deltagare meddelas på sitt eget konfigurerade språk, både via e-post och via ett internt Chamilo-meddelande. Att skicka igen för samma certifikat och samma utgångsdatum är säkert — Chamilo spårar vad som redan skickats per certifikat och skickar inte skräppost till en deltagare med duplicerade påminnelser om du inte uttryckligen skickar om.

Administratörer kan också schemalägga samma påminnelser automatiskt, återkommande, utan att en lärare behöver utlösa dem för hand — se [Inställningar för cron-jobb](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Färdigheter

Färdigheter representerar kompetenser som deltagare förvärvar. I Chamilo:

* Färdigheter kan kopplas till prestationer i gradebook
* När en deltagare får ett certifikat valideras eventuella associerade färdigheter automatiskt
* Färdigheter ackumuleras på deltagarens profil och skapar ett kompetensregister
* Färdigheter kan organiseras hierarkiskt (t.ex. "Dataanalys" under "Forskningsmetoder")
* Färdigheter kan utvärderas vidare av kollegor (360°-utvärdering)

## Visa status för certifikat och färdigheter

Som lärare kan du se:

* Vilka deltagare som har erhållit certifikat i din kurs
* Vilka färdigheter som har validerats
* Deltagarnas framsteg mot certifieringströskeln
* Vilka certifikat som har löpt ut eller snart löper ut, och om en påminnelse redan har skickats för dem

Deltagare kan visa sina egna certifikat och validerade färdigheter från sin profil, och kan öppna Skills Wheel för att se vilka färdigheter som efterfrågas i deras organisation.

## Tips

* **Sätt tydliga förväntningar** — Berätta för deltagarna i början av kursen vad de behöver uppnå för att erhålla ett certifikat
* **Använd meningsfulla färdighetsnamn** — Färdigheter bör beskriva vad deltagaren kan göra, inte bara kursnamnet
* **Kombinera med portföljer** — Uppmuntra deltagare att lägga till sina certifikat i sin portfölj
* **Utöka certifikat** — Be din administratör att aktivera tillägget [Custom Certificate](../plugins/custom-certificate.md) för att frigöra ännu mer kraft i certifikatmallar
* **Ange en giltighetsperiod för efterlevnadsdrivna certifieringar** — Om en certifiering behöver förnyas periodiskt (t.ex. säkerhetsutbildning), ange **Certificate validity (days)** så att deltagarna påminns innan den upphör