# Kursbildsgenerator

AI-kursbildsgeneratorn låter dig skapa en miniatyrbild för din kurs direkt från kursinställningsskärmen, i stället för att själv skaffa eller designa en. Detta är den bild som visas för din kurs i listor och i [kurskatalogen](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Åtkomst till generatorn

Knappen **Generate with AI** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> finns bredvid fältet **Course picture**, förutsatt att:

1. AI-hjälpare är aktiverade på plattformsnivå
2. Minst en AI-leverantör som är konfigurerad på din plattform stöder bildgenerering
3. Funktionen är tillåten i din kurs (se **AI Helpers Settings** i [Kursinställningar](../creating-your-course/course-settings.md))

Öppna kursens **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> och bläddra till fältet **Course picture**:

![Fältet Course picture i kursinställningarna, med en knapp Choose File och en knapp Generate with AI under den](/.gitbook/assets/course-picture-ai-button.png)

## Så här genererar du en bild

1. Klicka på **Generate with AI**
2. En dialogruta öppnas med ett fält **Prompt** förifyllt med en standardbeskrivning; redigera den för att beskriva den illustration du vill ha, eller lämna standardvärdet oförändrat

![Dialogrutan Generate with AI som visar fältet Prompt med dess standardtext, samt knapparna Cancel/Generate](/.gitbook/assets/course-picture-ai-modal.png)

3. Klicka på **Generate** och vänta — bildgenerering kan ta några sekunder
4. Den genererade bilden placeras automatiskt i fältet **Course picture** och ersätter det du eventuellt hade valt där
5. Förhandsgranska den i panelen **Preview** och klicka sedan på formulärets knapp **Save** för att faktiskt tillämpa den på din kurs — att generera bilden sparar den inte i sig

Om du inte gillar resultatet kan du generera igen med en annan prompt så många gånger du vill innan du sparar.

## Vad som ingår i prompten

Utöver det du skriver lägger Chamilo automatiskt till kontext för att hjälpa AI:n att producera en relevant, varumärkesanpassad bild:

* Din kurs titel
* Den första sektionen i kursens [Kursbeskrivning](../creating-your-course/course-description.md), om du har fyllt i en — vilket ger AI:n en känsla för det faktiska ämnet
* Din plattforms färgtema (primär, sekundär, tertiär), så att illustrationen använder färger som stämmer med din portal

Bilden genereras i platt, widescreen-illustrationsstil (16:9), utan läsbar text, logotyper eller fotorealistiska personer — i enlighet med det format som förväntas för en kursminiatyr.

## Tips

* **Fyll i en kursbeskrivning först** — eftersom den matas in i prompten tenderar en kurs med en verklig beskrivning att få en mer relevant illustration än en utan
* **Var specifik om stil, inte innehåll** — kurstiteln och beskrivningen förankrar redan ämnet; använd din prompt för stilsignaler (färgstämning, metafor, komposition) i stället för att beskriva ämnet på nytt
* **Generera om i stället för att nöja dig** — varje klick ger ett nytt försök utan extra steg; prova ett par varianter innan du väljer en
* **Kom ihåg att spara** — knappen fyller bara i bildfältet; navigerar du bort utan att spara går den genererade bilden förlorad
* **Om genereringen misslyckas, fråga din administratör** — en inaktiverad funktion, en okonfigurerad bildleverantör eller en förbrukad månatlig AI-användningskvot ger alla ett felmeddelande här; din administratör kan kontrollera [AI-konfigurationen](../../admin-guide/integrations/ai-configuration.md)