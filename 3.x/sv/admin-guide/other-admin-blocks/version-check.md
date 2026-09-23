# Versionskontroll

Versionskontroll talar om för dig om din Chamilo-installation är uppdaterad och — om du väljer att delta — registrerar din plattform hos Chamilo-projektet så att den kan räknas in i aggregerad användningsstatistik.

## Två nivåer av kontroll

**Oregistrerad (standardtillstånd):** Chamilo försöker fortfarande kontakta `version.chamilo.org` för att jämföra din installerade version med den senaste utgåvan, och använder inget mer än själva begäran — inga plattformsdetaljer skickas. Blocket visar ett registreringsformulär som förklarar vad registrering tillför, plus en knapp **"Enable version check"** och en kryssruta **"Hide campus from public platforms list"**.

**Registrerad:** Att klicka på "Enable version check" växlar bara två lokala inställningar — det skickar i sig ingenting. Därefter skickar din plattform, varje gång detta instrumentpanelsblock läses in, en begäran till `version.chamilo.org` som innehåller:

| Data som skickas | Angivet syfte |
|-----------|-----------------|
| Din plattforms URL och webbplatsnamn | Identifierar vilken portal som checkar in |
| Administratörens kontakt-e-post | Explicit så att Chamilo-teamet kan nå administratörer om kritiska säkerhetsproblem |
| Installerad version | För att avgöra om du är uppdaterad |
| Antal kurser, användare, aktiva användare och sessioner | Sammanställs till icke-personlig aggregerad statistik på `stats.chamilo.org` |
| Organisationsnamn och gränssnittsspråk | Endast demografisk aggregering |
| Administratörens namn | Skickas, även om syftet inte är tydligt dokumenterat i koden själv |
| Din servers IP-adress | Används för att uppskatta din plattforms plats för en global karta över installationer |
| Flaggan "Do not list campus", packager och ett unikt instans-ID | Styr om du visas i den offentliga katalogen och identifierar upprepade incheckningar från samma installation |

Om du lämnar **"Hide campus from public platforms list"** omarkerad visas din plattform också i den offentliga community-listan på `version.chamilo.org/community.php`.

## Åtkomst till versionskontroll

Detta block visas direkt på administrationsinstrumentpanelen — ingen separat sida att besöka.

## Bör du aktivera det?

Detta är ett explicit aktivt val, och avvägningen är enkel: i utbyte mot att dela detaljerna ovan får du ett automatiskt meddelande när en ny version (inklusive säkerhetsuppdateringar) är tillgänglig, och du bidrar till Chamilos offentliga adoptionsstatistik. Om du hellre inte vill dela några plattformsdetaljer klickar du helt enkelt inte på "Enable version check" — den grundläggande kontrollen av om du är uppdaterad körs fortfarande utan registrering. Om du vill ha uppdateringsmeddelandet men inte den offentliga listningen, registrera dig och kryssa i "Hide campus from public platforms list."