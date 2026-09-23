# AI-handledare

AI-handledaren är en chattbot integrerad i Chamilo som deltagare kan interagera med för att få omedelbara, AI-genererade svar. Den fungerar i två sammanhang, med olika fokus i vardera:

* **Inuti en kurs** — AI-handledaren är inriktad på den kursen: den besvarar frågor om innehållet, förklarar begrepp som behandlas och vägleder deltagarna genom materialet.
* **Utanför en kurs** (på den allmänna plattformen) — AI-handledaren hanterar i stället generella frågor om plattformens användning, till exempel hur man hittar något eller använder en funktion, snarare än kursinnehåll.

## Så fungerar det

När AI-handledaren är aktiverad för en kurs ser deltagarna ett chattgränssnitt där de kan:

* **Ställa frågor** om kursinnehåll
* **Få förklaringar** av begrepp som behandlas i kursen
* **Få vägledning** utan att vänta på att läraren ska svara

Inuti en kurs använder AI-handledaren den kursens kontext för att ge relevanta svar. Den är utformad för att komplettera din undervisning, inte ersätta den.

## Aktivera AI-handledaren

AI-handledaren kräver konfiguration på två nivåer:

1. **Plattformsnivå** — Administratören måste aktivera AI-hjälpare och konfigurera minst en AI-leverantör (se [AI-konfiguration](../../admin-guide/integrations/ai-configuration.md))
2. **Kursnivå** — AI-handledaren måste aktiveras i kursinställningarna (en enkel på/av-växel). Leverantören som används för chatten är den som administratören har konfigurerat.

## Chattgränssnittet

![AI-handledarens chattgränssnitt som visar en konversation mellan en deltagare och AI:n](../../.gitbook/assets/ai-tutor-chat.png)

AI-handledaren visas som en **dockad chattpanel** i kursen. Deltagare kan:

* Skriva meddelanden och ta emot AI-genererade svar
* Visa sin konversationshistorik
* Återställa konversationen för att börja om

Chattgränssnittet visar utbytet mellan deltagaren och AI:n i ett bekant meddelandeformat.

## Viktigt beteende

* **Begränsad till var den öppnas** — Inuti en kurs svarar AI-handledaren endast om den kursen; öppnad utanför någon kurs växlar den i stället till allmänna frågor om plattformens användning. Plattformsövergripande läge (utanför kurs) är en separat växel som din administratör styr oberoende av den per kurs.
* **Inaktiverad under tentamen** — AI-handledaren inaktiveras automatiskt när en deltagare gör en övning, för att förhindra fusk
* **Konversation per deltagare** — Varje deltagare har sin egen privata konversation med AI-handledaren, och promptkontexten inkluderar endast de senaste meddelandena
* **Leverantörsfelöverlämning** — Om den konfigurerade leverantören misslyckas faller Chamilo tillbaka till en annan tillgänglig leverantör så att chatten fortsätter att fungera

## Som lärare

Du bör vara medveten om att:

* AI-handledaren inte alltid ger perfekta svar — uppmuntra deltagarna att verifiera viktig information
* Du kan granska användningen av AI-handledaren via plattformens spårning
* AI-handledaren är ett komplement till din undervisning, inte en ersättning. Använd den tillsammans med forum, meddelanden och direktmeddelanden för ett heltäckande stöd till deltagarna.

## Tips

* **Sätt förväntningar** — Berätta för deltagarna i början av kursen att en AI-handledare finns tillgänglig och förklara hur den ska användas på ett lämpligt sätt
* **Uppmuntra kritiskt tänkande** — Påminn deltagarna om att tänka kritiskt kring AI-genererade svar
* **Använd för vanliga frågor** — AI-handledaren är särskilt användbar för att hantera vanliga frågor som du annars skulle behöva besvara upprepade gånger