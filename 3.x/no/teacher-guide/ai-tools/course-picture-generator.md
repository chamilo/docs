# Kursbildegenerator

AI-kursbildegeneratoren lar deg lage et miniatyrbilde for kurset ditt direkte fra kursinnstillingene, i stedet for å hente eller designe ett selv. Dette er bildet som vises for kurset ditt i oversikter og i [kurskatalogen](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Åpne generatoren

Knappen **Generate with AI** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> er tilgjengelig ved siden av feltet **Course picture**, forutsatt at:

1. AI-hjelpere er aktivert på plattformnivå
2. Minst én AI-leverandør konfigurert på plattformen din støtter bildegenerering
3. Funksjonen er tillatt i kurset ditt (se **AI Helpers Settings** i [Course Settings](../creating-your-course/course-settings.md))

Åpne kursets **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> og rull til feltet **Course picture**:

![Feltet Course picture i Course Settings, med en Choose File-knapp og en Generate with AI-knapp under](/.gitbook/assets/course-picture-ai-button.png)

## Slik genererer du et bilde

1. Klikk **Generate with AI**
2. En dialog åpnes med et **Prompt**-felt forhåndsutfylt med en standardbeskrivelse; rediger den for å beskrive illustrasjonen du ønsker, eller la standarden stå

![Dialogen Generate with AI som viser Prompt-feltet med standardteksten, og knappene Cancel/Generate](/.gitbook/assets/course-picture-ai-modal.png)

3. Klikk **Generate** og vent — bildegenerering kan ta noen sekunder
4. Det genererte bildet plasseres automatisk i feltet **Course picture** og erstatter det du eventuelt hadde valgt der
5. Forhåndsvis det i panelet **Preview**, og klikk deretter skjemaets **Save**-knapp for faktisk å bruke det på kurset — å generere bildet lagrer det ikke i seg selv

Hvis du ikke liker resultatet, kan du generere på nytt med en annen prompt så mange ganger du vil før du lagrer.

## Hva som inngår i prompten

I tillegg til det du skriver, legger Chamilo automatisk til kontekst for å hjelpe AI-en med å lage et relevant, merkevaretilpasset bilde:

* Kursets tittel
* Første del av kursets [Course Description](../creating-your-course/course-description.md), hvis du har fylt inn én — slik at AI-en får et inntrykk av det faktiske faginnholdet
* Plattformens fargetema (primær, sekundær, tertiær), slik at illustrasjonen bruker farger som samsvarer med portalen din

Bildet genereres i flat, widescreen (16:9) illustrasjonsstil, uten lesbar tekst, logoer eller fotorealistiske personer — i tråd med formatet som forventes for et kursminiatyrbilde.

## Tips

* **Fyll inn en Course Description først** — siden den mates inn i prompten, får et kurs med en reell beskrivelse gjerne en mer relevant illustrasjon enn ett uten
* **Vær spesifikk om stil, ikke innhold** — kurstittel og beskrivelse forankrer allerede emnet; bruk prompten til stilhint (fargestemning, metafor, komposisjon) i stedet for å beskrive temaet på nytt
* **Generer på nytt i stedet for å nøye deg** — hvert klikk gir et nytt forsøk uten ekstra trinn; prøv et par varianter før du velger én
* **Husk å lagre** — knappen fyller bare inn bildefeltet; navigerer du bort uten å lagre, går det genererte bildet tapt
* **Hvis genereringen mislykkes, spør administratoren din** — en deaktivert funksjon, en ukonfigurert bildeleverandør eller en oppbrukt månedlig AI-brukskvote gir alle en feilmelding her; administratoren kan sjekke [AI Configuration](../../admin-guide/integrations/ai-configuration.md)