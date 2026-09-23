# Kursusbilledgenerator

AI-kursusbilledgeneratoren lader dig oprette et miniaturebillede til dit kursus direkte fra kursusindstillingsskærmen, i stedet for at skaffe eller designe et selv. Dette er det billede, der vises for dit kursus i lister og i [kursuskataloget](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Adgang til generatoren

Knappen **Generate with AI** <img src="../../.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> er tilgængelig ved siden af feltet **Course picture**, forudsat at:

1. AI-hjælpere er aktiveret på platformniveau
2. Mindst én AI-udbyder konfigureret på din platform understøtter billedgenerering
3. Funktionen er tilladt i dit kursus (se **AI Helpers Settings** i [Kursusindstillinger](../creating-your-course/course-settings.md))

Åbn dit kursus' **Settings** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> og rul til feltet **Course picture**:

![Feltet Course picture i kursusindstillinger, med en knap Vælg fil og en knap Generate with AI under den](../../.gitbook/assets/course-picture-ai-button.png)

## Sådan genererer du et billede

1. Klik på **Generate with AI**
2. En dialog åbnes med et felt **Prompt** forudfyldt med en standardbeskrivelse; rediger den for at beskrive den illustration, du ønsker, eller lad standarden stå uændret

![Dialogen Generate with AI, der viser feltet Prompt med dets standardtekst og knapperne Annuller/Generer](../../.gitbook/assets/course-picture-ai-modal.png)

3. Klik på **Generate** og vent — billedgenerering kan tage et par sekunder
4. Det genererede billede placeres automatisk i feltet **Course picture** og erstatter det, du eventuelt havde valgt der
5. Forhåndsvis det i panelet **Preview**, og klik derefter på formularens knap **Save** for faktisk at anvende det på dit kursus — selve genereringen gemmer ikke billedet

Hvis du ikke kan lide resultatet, kan du generere igen med en anden prompt så mange gange, du vil, før du gemmer.

## Hvad der indgår i prompten

Ud over det, du skriver, tilføjer Chamilo automatisk kontekst, så AI'en kan producere et relevant, brandtilpasset billede:

* Dit kursus' titel
* Den første sektion af dit kursus' [Kursusbeskrivelse](../creating-your-course/course-description.md), hvis du har udfyldt en — så AI'en får en fornemmelse af det faktiske emne
* Din platforms farvetema (primær, sekundær, tertiær), så illustrationen bruger farver, der er i overensstemmelse med din portal

Billedet genereres i flad, widescreen (16:9) illustrationsstil, uden læsbar tekst, logoer eller fotorealistiske personer — i overensstemmelse med det format, der forventes til et kursusminiaturebillede.

## Tips

* **Udfyld først en kursusbeskrivelse** — da den indgår i prompten, får et kursus med en rigtig beskrivelse typisk en mere relevant illustration end et uden
* **Vær specifik om stil, ikke indhold** — kursets titel og beskrivelse forankrer allerede emnet; brug din prompt til stilmæssige signaler (farvestemning, metafor, komposition) frem for at beskrive emnet igen
* **Generer igen i stedet for at nøjes** — hvert klik giver et nyt forsøg uden ekstra trin; prøv et par variationer, før du vælger én
* **Husk at gemme** — knappen udfylder kun billedfeltet; navigerer du væk uden at gemme, går det genererede billede tabt
* **Hvis genereringen fejler, spørg din administrator** — en deaktiveret funktion, en ukonfigureret billedudbyder eller en opbrugt månedlig AI-brugskvote giver alle en fejlmeddelelse her; din administrator kan tjekke [AI-konfiguration](../../admin-guide/integrations/ai-configuration.md)