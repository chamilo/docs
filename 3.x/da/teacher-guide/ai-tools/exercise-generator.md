# Øvelsesgenerator

AI-øvelsesgeneratoren hjælper dig med at oprette quizspørgsmål automatisk ved hjælp af kunstig intelligens. Du angiver et emne eller indhold, og AI'en genererer spørgsmål, som du kan gennemgå, redigere og tilføje til dine øvelser.

## Adgang til øvelsesgeneratoren

Øvelsesgeneratoren er tilgængelig, når du opretter eller redigerer en øvelse, forudsat at:

1. AI-hjælpere er aktiveret på platformniveau
2. Mindst én AI-tekstudbyder er konfigureret

Se efter knappen eller sektionen **AI Generator** i grænsefladen til oprettelse af øvelser.

## Sådan genererer du spørgsmål

![Formularen til AI-øvelsesgeneratoren med felter til emne og antal spørgsmål](/.gitbook/assets/ai-exercise-generator.png)

Generatoren tilbyder to tilstande, tilgængelige som faner:

* **Test from topic** — Generér spørgsmål ud fra en tekstuel emnebeskrivelse
* **Test from document** — Generér spørgsmål ud fra et kursusdokument (kun tilgængelig, når en dokumentkapabel udbyder er konfigureret). Når denne tilstand bruges, bliver emnefeltet valgfrit og behandles som et ekstra hint.

1. Åbn formularen AI Generator i en øvelse, og vælg tilstanden
2. Konfigurer genereringsparametrene:
   * **Quiz title** — Titlen på den resulterende øvelse
   * **Questions topic** — Beskriv, hvad spørgsmålene skal handle om (eller, i dokumenttilstand, et valgfrit hint)
   * **Number of questions** — Hvor mange spørgsmål der skal genereres (begrænset til 100)
   * **Question type** — I øjeblikket tilbydes kun **Multiple answer**
   * **AI provider** — Vælg hvilken AI-udbyder der skal bruges (vises kun, når mere end én er konfigureret)
3. Klik på **Generate**
4. AI'en producerer et sæt spørgsmål med svarmuligheder og korrekte svar markeret. Når AI-oplysning er aktiveret, foranstilles genererede spørgsmål med **\[AI-assisted\]**.

## Gennemgang og redigering

![AI-genererede spørgsmål vist til gennemgang med muligheder for at redigere, acceptere eller fjerne hvert enkelt](/.gitbook/assets/ai-exercise-generator-results.png)

Genererede spørgsmål præsenteres som **forslag**. Du bør:

* **Gennemgå hvert spørgsmål** for nøjagtighed og relevans
* **Redigere formuleringen** om nødvendigt — justér spørgsmål, svarmuligheder og feedback
* **Verificere korrekte svar** — sørg for, at AI'en har identificeret de rigtige svar
* **Fjerne uegnede spørgsmål** — slet dem, der ikke lever op til dine standarder
* **Justere scoring** — sæt passende pointværdier for hvert spørgsmål

Når du er tilfreds, tilføjer du spørgsmålene til din øvelse.

Bemærk, at på trods af vores specifikke formatønsker vil nogle modeller returnere spørgsmåls titler foranstillet af et nummer. Vi anbefaler ikke at lade det nummer blive stående, da det vil hæmme blandingen af spørgsmål i tests med tilfældigt udvalgte spørgsmål. Nogle gange får du desuden ikke så mange spørgsmål, som du har bedt om, så sørg for at tjekke det og eventuelt generere flere spørgsmål, eller skift model, hvis du har den mulighed.

## Oplysning om AI-genereret indhold

Indhold genereret af AI mærkes med en oplysningsmeddelelse, der angiver, at det er oprettet ved hjælp af kunstig intelligens. Denne gennemsigtighed hjælper de studerende med at forstå materialets oprindelse.

## Tips

* **Angiv specifikke emner** — Jo mere specifik din emnebeskrivelse er, desto mere relevante bliver de genererede spørgsmål.
* **Gennemgå altid** — AI-genereret indhold kan indeholde fejl. Publicér aldrig spørgsmål uden at have gennemgået dem først.
* **Brug som udgangspunkt** — Genererede spørgsmål er en tidsbesparelse, ikke et færdigt produkt. Redigér dem, så de matcher din undervisningsstil og dit kursusindhold.
* **Bland med manuelle spørgsmål** — Kombinér AI-genererede spørgsmål med manuelt oprettede for de bedste resultater.
* **Prøv forskellige udbydere** — Hvis flere AI-udbydere er tilgængelige, så prøv forskellige for at se, hvilken der producerer de bedste spørgsmål til dit fagområde.