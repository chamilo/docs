# Flersproget indhold

Chamilo lader dig skrive **flere sprogversioner af det samme indhold i ét felt** — et afsnit i kursusbeskrivelsen, et dokument, et testspørgsmål, en spørgeskemaundersøgelse — og hver kursist ser automatisk kun den version, der er skrevet på vedkommendes eget sprog. Dette er funktionen **translate_html**, opkaldt efter den platformindstilling, der styrer den.

Den involverer tre forskellige personer, som hver ser en anden side af den:

* **Din administrator** skal slå funktionen til på hele platformen, før nogen kan bruge den.
* **Du (underviseren)** skriver de forskellige sprogversioner ved hjælp af en knap i den rige teksteditor.
* **Kursisten** har gavn af den uden nogensinde at vide, at den findes — vedkommende ser simpelthen indholdet på sit eget sprog, uden nogen indstilling at finde eller slå til.

## Aktivering af funktionen

Dette er en administratoropgave, ikke en underviseropgave. Under **Administration > Configuration settings > Editor** skal indstillingen **Support multi-language HTML content** (`translate_html`) være aktiveret. Hvis du ikke ser knappen **Lang ISO**, der beskrives nedenfor, i din editorværktøjslinje, er det næsten sikkert derfor — spørg din administrator. Se [Editor Settings](../../admin-guide/platform-settings/editor-settings.md) for den fulde indstillingsreference. Fra v3.0.0 er denne indstilling aktiveret som standard (det var ikke tilfældet før denne version), medmindre du har opgraderet din version fra en tidligere, hvor indstillingen var deaktiveret.

Hvis du slår denne indstilling fra igen, slettes eller ødelægges intet indhold, der allerede er skrevet på denne måde — se [Hvad kursister ser](#what-learners-see) nedenfor.

## Skrivning af flersproget indhold

Funktionen er tilgængelig overalt, hvor du har den fulde rige teksteditor: afsnit i [kursusbeskrivelsen](../creating-your-course/course-description.md), [dokumenter](documents.md), test- og spørgeskemaspørgsmål og mere.

1. Skriv (eller indsæt) indholdet på dit standardsprog, som normalt.
2. Markér den tekst, og klik derefter på knappen **Lang ISO** i editorens værktøjslinje.

![Værktøjslinjen i den rige teksteditor med knappen "Lang ISO" synlig nær starten](../../.gitbook/assets/teacher-multilang-editor.png)

3. Vælg i menuen det sprog, du netop har skrevet på — listen dækker alle sprog, din platform har aktive. Hvis det sprog, du har brug for, ikke er listet, skal du bruge **Custom Chamilo ISO code...** nederst og indtaste det (f.eks. `en_US`, `fr_FR`, `es`).

![Menuen "Lang ISO" åben med alle aktive platformsprog plus "Add translation to..." og en mulighed for brugerdefineret kode](../../.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo omslutter dit udvalg med den sprogtag. Skriv (eller indsæt) nu den næste sprogversion lige efter den, markér den, og gentag med et andet sprog.

Fortsæt med så mange sprog, som du vil dække. Alle ligger i det samme felt — mens du redigerer, ser du alle sprogversioner stablet efter hinanden; først når nogen faktisk *viser* siden, skjuler Chamilo alt undtagen det ene sprog, der gælder for dem (se nedenfor).

### AI-assisteret oversættelse

Hvis din administrator har konfigureret en AI-tekstleverandør, tilbyder den samme **Lang ISO**-menu også **Add translation to...** øverst. Dette sender dit eksisterende indhold til den konfigurerede AI-model og indsætter en ny, automatisk oversat blok på det sprog, du vælger (eller på alle resterende sprog på én gang, hvis din platform tillader det) — du behøver ikke at skrive det selv. Eksisterende sprogblokke lades urørte, og sprog, der allerede er til stede, udelades fra listen, så gentagen brug ikke skaber dubletter.

Som med alt AI-genereret indhold skal du korrekturlæse resultatet — det er en hurtig måde at få et solidt første udkast på et sprog, du måske ikke selv taler, ikke en erstatning for gennemgang.

## Hvad kursister ser

Hver kursist ser præcis én sprogversion: Chamilo prøver først vedkommendes eget grænsefladesprog; hvis ingen af dine blokke matcher det, falder det tilbage til kursets eget sprog, derefter til platformens standardsprog; hvis ingen af disse matcher heller, vises det sprog, du tilfældigvis har skrevet først, i stedet for at lade indholdet stå tomt. Alt dette sker automatisk — der er intet, kursisten skal konfigurere, og intet, du skal konfigurere pr. kursist.

Her er det samme afsnit i kursusbeskrivelsen, som det ses af tre kursister med forskellige grænsefladesprog — intet andet ved kurset er ændret mellem disse tre skærmbilleder, kun seerens eget sprog:

![Det samme afsnit i kursusbeskrivelsen som set af en kursist med engelsk som grænsefladesprog](../../.gitbook/assets/teacher-multilang-en.png)

![Det samme afsnit som set af en kursist med fransk som grænsefladesprog](../../.gitbook/assets/teacher-multilang-fr.png)

![Det samme afsnit som set af en kursist med spansk som grænsefladesprog](../../.gitbook/assets/teacher-multilang-es.png)

### Under the Hood

Hvis du nogensinde åbner **Kildekode**-visningen for et flersproget felt (`<>`-knappen i editorens værktøjslinje), vil du se hver sprogversion indpakket således:

![Kildekode-visningen, der viser en blok, der åbner med lang="en_US" class="mce-translatehtml"](../../.gitbook/assets/teacher-multilang-source-view.png)

Hver version er indpakket i en `<div class="mce-translatehtml" lang="...">` (eller `<span>`, for en kort inline-frase i stedet for en hel blok) — det er denne `lang`-attribut, Chamilo matcher med seerens sprog for at afgøre, hvad der skal vises. Det er værd at kende dette specifikke klassenavn, hvis du nogensinde inspicerer sidens kilde eller fejlfinder indhold, der ser forkert ud: **`mce-translatehtml`** er markøren, du skal kigge efter.

Dette forklarer også, hvorfor deaktivering af `translate_html` i platformindstillingerne ikke ødelægger noget, der allerede er skrevet: indstillingen styrer kun, om **Lang ISO**-forfatterknappen vises i editoren. Filtreringen på *visningssiden*, som er beskrevet ovenfor, kører ubetinget, så tidligere skrevet flersproget indhold forbliver korrekt filtreret for hver seer, selv på en platform, hvor en administrator senere har slået forfatterknappen fra.

## Titler virker ikke på denne måde

En kursustitel, en dokumenttitel, en testtitel — disse er almindelige tekstfelter, ikke rich text, så de kan ikke indeholde den `lang`-mærkede markup, der er beskrevet ovenfor. De forbliver en enkelt, neutral værdi uanset, hvem der kigger på dem, uanset hvor mange sprogversioner du har skrevet ind i indholdet nedenunder.

Den ene undtagelse: hvis din administrator har aktiveret **Gem titler som HTML** (`save_titles_as_html`, også under **Administration > Configuration settings > Editor**) for det specifikke titelfelt, du arbejder med, bliver det felt også et rigtigt HTML-felt, og den samme **Lang ISO**-teknik, der er beskrevet ovenfor, kan anvendes på det. Dette er ualmindeligt og bruges mest til testspørgsmål — de fleste titler på platformen forbliver almindelig tekst.

## Tips

* **Hold kildesproget først** — sæt platformens mest almindelige sprog først i feltet; det er det mest naturlige fallback, hvis du glemmer at mærke et sjældnere sprog senere.
* **Indlejr ikke sprogblokke** — skriv hver version som en separat, sekventiel blok; at indpakke én inde i en anden understøttes ikke, og editoren pakker aktivt indlejrede markører ud, når du indsætter en ny.
* **Et afsnit, der ser tomt ud på ét sprog**, betyder som regel, at der aldrig blev mærket en blok til det (eller dets udvidede kursus-/platformstandard-fallback) — tjek Kildekode-visningen for de sprog, der faktisk er til stede.