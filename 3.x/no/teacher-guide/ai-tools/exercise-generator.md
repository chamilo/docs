# Øvelsesgenerator

AI-øvelsesgeneratoren hjelper deg med å opprette quisspørsmål automatisk ved hjelp av kunstig intelligens. Du oppgir et emne eller innhold, og KI-en genererer spørsmål som du kan gjennomgå, redigere og legge til i øvelsene dine.

## Tilgang til øvelsesgeneratoren

Øvelsesgeneratoren er tilgjengelig når du oppretter eller redigerer en øvelse, forutsatt at:

1. KI-hjelpere er aktivert på plattformnivå
2. Minst én KI-tekstleverandør er konfigurert

Se etter knappen eller delen **AI Generator** i grensesnittet for oppretting av øvelser.

## Slik genererer du spørsmål

![Skjemaet for AI-øvelsesgeneratoren med felt for emne og antall spørsmål](../../.gitbook/assets/ai-exercise-generator.png)

Generatoren tilbyr to modus, tilgjengelige som faner:

* **Test from topic** — Generer spørsmål fra en tekstlig emnebeskrivelse
* **Test from document** — Generer spørsmål fra et kursdokument (kun tilgjengelig når en dokumentkapabel leverandør er konfigurert). Når denne modusen brukes, blir emnefeltet valgfritt og behandles som et ekstra hint.

1. Åpne skjemaet AI Generator i en øvelse og velg modus
2. Konfigurer genereringsparametrene:
   * **Quiz title** — Tittelen på den resulterende øvelsen
   * **Questions topic** — Beskriv hva spørsmålene skal handle om (eller, i dokumentmodus, et valgfritt hint)
   * **Number of questions** — Hvor mange spørsmål som skal genereres (begrenset til 100)
   * **Question type** — For øyeblikket tilbys kun **Multiple answer**
   * **AI provider** — Velg hvilken KI-leverandør som skal brukes (vises bare når mer enn én er konfigurert)
3. Klikk **Generate**
4. KI-en produserer et sett med spørsmål med svaralternativer og merking av riktige svar. Når KI-offentliggjøring er aktivert, prefikses genererte spørsmål med **\[AI-assisted\]**.

## Gjennomgang og redigering

![KI-genererte spørsmål vist for gjennomgang med mulighet til å redigere, godta eller fjerne hvert enkelt](../../.gitbook/assets/ai-exercise-generator-results.png)

Genererte spørsmål presenteres som **forslag**. Du bør:

* **Gjennomgå hvert spørsmål** for nøyaktighet og relevans
* **Redigere ordlyden** ved behov — juster spørsmål, svaralternativer og tilbakemelding
* **Verifisere riktige svar** — sørg for at KI-en har identifisert de riktige svarene
* **Fjerne uegnede spørsmål** — slett alle som ikke oppfyller dine standarder
* **Justere poengsetting** — sett passende poengverdier for hvert spørsmål

Når du er fornøyd, legger du spørsmålene til i øvelsen.

Merk at til tross for våre spesifikke formatforespørsler vil noen modeller returnere spørsmålstittel prefikset med et nummer. Vi anbefaler ikke å la det nummeret stå, da det vil hindre blanding av spørsmål i tester med tilfeldig valgte spørsmål. Noen ganger får du heller ikke så mange spørsmål som du har bedt om, så sørg for å sjekke det og eventuelt generere flere spørsmål, eller bytte modell hvis du har den muligheten.

## Offentliggjøring av KI-generert innhold

Innhold generert av KI merkes med en offentliggjøringsmerknad som indikerer at det ble opprettet ved hjelp av kunstig intelligens. Denne åpenheten hjelper lærende med å forstå materialets opprinnelse.

## Tips

* **Oppgi spesifikke emner** — Jo mer spesifikk emnebeskrivelsen din er, desto mer relevante blir de genererte spørsmålene.
* **Alltid gjennomgå** — KI-generert innhold kan inneholde feil. Publiser aldri spørsmål uten å gjennomgå dem først.
* **Bruk som utgangspunkt** — Genererte spørsmål er en tidsbesparelse, ikke et ferdig produkt. Rediger dem slik at de matcher din undervisningsstil og kursinnhold.
* **Bland med manuelle spørsmål** — Kombiner KI-genererte spørsmål med manuelt opprettede for best resultat.
* **Prøv ulike leverandører** — Hvis flere KI-leverandører er tilgjengelige, prøv ulike for å se hvilken som produserer de beste spørsmålene for ditt fagområde.