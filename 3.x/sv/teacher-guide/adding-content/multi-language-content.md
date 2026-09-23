# Flerspråkigt innehåll

Chamilo låter dig skriva **flera språkversioner av samma innehåll i ett enda fält** — en kursbeskrivningssektion, ett dokument, en testfråga, en enkät — och låta varje deltagare automatiskt se endast den version som är skriven på deras eget språk. Detta är funktionen **translate_html**, namngiven efter den plattformsinställning som styr den.

Den involverar tre olika personer, som var och en ser en annan sida av den:

* **Din administratör** måste slå på funktionen för hela plattformen innan någon kan använda den.
* **Du (läraren)** skriver de olika språkversionerna, med hjälp av en knapp i den rika textredigeraren.
* **Deltagaren** drar nytta av den utan att någonsin veta att den finns — de ser helt enkelt innehållet på sitt eget språk, utan någon inställning att hitta eller växla.

## Aktivera funktionen

Detta är en administratörsuppgift, inte en läraruppgift. Under **Administration > Configuration settings > Editor** måste inställningen **Support multi-language HTML content** (`translate_html`) vara aktiverad. Om du inte ser knappen **Lang ISO** som beskrivs nedan i redigerarens verktygsfält är det nästan säkert därför — fråga din administratör. Se [Editor Settings](../../admin-guide/platform-settings/editor-settings.md) för den fullständiga inställningsreferensen. Från v3.0.0 är denna inställning aktiverad som standard (det var inte fallet före denna version) om du inte har uppgraderat din version från en tidigare där inställningen var inaktiverad.

Att stänga av inställningen igen tar inte bort eller förstör något innehåll som redan skrivits på detta sätt — se [Vad deltagare ser](#what-learners-see) nedan.

## Skriva flerspråkigt innehåll

Funktionen är tillgänglig överallt där du har den fullständiga rika textredigeraren: sektioner i [kursbeskrivning](../creating-your-course/course-description.md), [dokument](documents.md), test- och enkätfrågor med mera.

1. Skriv (eller klistra in) innehållet på ditt standardspråk, som vanligt.
2. Markera den texten och klicka sedan på knappen **Lang ISO** i redigerarens verktygsfält.

![Den rika textredigerarens verktygsfält, med knappen "Lang ISO" synlig nära början](/.gitbook/assets/teacher-multilang-editor.png)

3. Välj i menyn det språk du just skrev på — listan täcker varje språk som din plattform har aktivt. Om det du behöver inte finns med, använd **Custom Chamilo ISO code...** längst ned och skriv in det (t.ex. `en_US`, `fr_FR`, `es`).

![Menyn "Lang ISO" öppen, med varje aktivt plattformsspråk plus "Add translation to..." och ett alternativ för anpassad kod](/.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo omsluter din markering med den språktaggen. Skriv (eller klistra in) nästa språks version direkt efter, markera den och upprepa med ett annat språk.

Fortsätt för så många språk du vill täcka. Alla ligger i samma fält — medan du redigerar ser du varje språkversion staplad efter varandra; först när någon faktiskt *visar* sidan döljer Chamilo allt utom det enda språk som gäller för dem (se nedan).

### AI-assisterad översättning

Om din administratör har konfigurerat en AI-textleverantör erbjuder samma **Lang ISO**-meny också **Add translation to...** högst upp. Detta skickar ditt befintliga innehåll till den konfigurerade AI-modellen och infogar ett nytt, automatiskt översatt block på det språk du väljer (eller på alla återstående språk på en gång, om din plattform tillåter det) — du behöver inte skriva det själv. Befintliga språkblock lämnas orörda, och språk som redan finns utesluts från listan, så att använda den upprepade gånger skapar inte dubbletter.

Som med allt AI-genererat innehåll, korrekturläs resultatet — det är ett snabbt sätt att få ett solidt första utkast på ett språk du kanske inte talar själv, inte en ersättning för granskning.

## Vad deltagare ser

Varje deltagare ser exakt en språkversion: Chamilo försöker först med deras eget gränssnittsspråk; om inget av dina block matchar det, faller det tillbaka till kursens eget språk, sedan till plattformens standardspråk; om inget av dessa heller matchar, visas det språk du råkar ha skrivit först i stället för att lämna innehållet tomt. Allt detta sker automatiskt — det finns inget för deltagaren att konfigurera, och inget för dig att konfigurera per deltagare heller.

Här är samma kursbeskrivningssektion, som den ses av tre deltagare med olika gränssnittsspråk — inget annat i kursen ändrades mellan dessa tre skärmbilder, endast visningens eget språk:

![Samma kursbeskrivningssektion som den ses av en deltagare med engelska som gränssnittsspråk](/.gitbook/assets/teacher-multilang-en.png)

![Samma sektion som den ses av en deltagare med franska som gränssnittsspråk](/.gitbook/assets/teacher-multilang-fr.png)

![Samma sektion som den ses av en deltagare med spanska som gränssnittsspråk](/.gitbook/assets/teacher-multilang-es.png)

### Under the Hood

Om du någon gång öppnar **Källkod**-vyn för ett flerspråkigt fält (knappen `<>` i redigerarens verktygsfält) ser du att varje språkversion är innesluten så här:

![Källkodsvyn, som visar ett block som öppnas med lang="en_US" class="mce-translatehtml"](/.gitbook/assets/teacher-multilang-source-view.png)

Varje version är innesluten i en `<div class="mce-translatehtml" lang="...">` (eller `<span>`, för en kort infogad fras i stället för ett helt block) — det är `lang`-attributet som Chamilo matchar mot visningsanvändarens språk för att avgöra vad som ska visas. Det är värt att känna igen just det här klassnamnet om du någonsin granskar sidkällan eller felsöker innehåll som ser fel ut: **`mce-translatehtml`** är markören att leta efter.

Detta förklarar också varför det inte förstör något som redan är skrivet att inaktivera `translate_html` i plattformsinställningarna: inställningen styr bara om **Lang ISO**-knappen för *författande* visas i redigeraren. Filtreringen på *visningssidan* som beskrivs ovan körs ovillkorligt, så tidigare skrivet flerspråkigt innehåll fortsätter att filtreras korrekt för varje visningsanvändare även på en plattform där en administratör senare har stängt av författandeknappen.

## Titlar fungerar inte på det här sättet

En kurs titel, ett dokuments titel, ett tests titel — det här är rena textfält, inte rich text, så de kan inte innehålla den `lang`-märkta märkningen som beskrivs ovan. De förblir ett enda, neutralt värde oavsett vem som tittar på dem, oavsett hur många språkversioner du har skrivit in i innehållet under.

Det enda undantaget: om din administratör har aktiverat **Spara titlar som HTML** (`save_titles_as_html`, även under **Administration > Configuration settings > Editor**) för det specifika titelfält du arbetar med, blir det fältet också ett riktigt HTML-fält, och samma **Lang ISO**-teknik som beskrivs ovan kan tillämpas på det. Detta är ovanligt och används mest för testfrågor — de flesta titlar på plattformen förblir ren text.

## Tips

* **Håll källspråket först** — lägg plattformens vanligaste språk först i fältet; det är det mest naturliga reservalternativet om du glömmer att märka ett mer sällsynt språk senare.
* **Kapsla inte in språkblock** — skriv varje version som ett separat, sekventiellt block; att kapsla in ett inuti ett annat stöds inte och redigeraren packar aktivt upp kapslade markörer när du infogar en ny.
* **Ett avsnitt som ser tomt ut på ett språk** betyder vanligtvis att inget block någonsin har märkts för det (eller dess utökade kurs-/plattformsstandardreserv) — kontrollera källkodsvyn för de språk som faktiskt finns.