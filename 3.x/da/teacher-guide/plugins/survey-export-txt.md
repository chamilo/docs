# Survey Export TXT

Survey Export TXT <img src="/.gitbook/assets/icons/mdi-file-outline.svg" alt="Survey Export TXT" data-size="line"> eksporterer en surveys resultater til en menneskelæselig almindelig tekstfil — én blok pr. respondent, der opregner hvert spørgsmål, det/de valgte svar og eventuelle fritekstbesvarelser, i stedet for en CSV-fils rækker og kolonner.

## Eksport af en survey

Når funktionen er aktiveret, får listen i kursets **Survey**-værktøj et **Export**-ikon på hver survey-række. Klik på det for at downloade resultaterne som en `.txt`-fil.

## Indholdet af filen

* Anonyme surveys viser "Anonymous" i stedet for identitetsoplysninger; ikke-anonyme surveys indeholder respondentens navn og brugernavn
* Hver respondents svar adskilles af en skillelinje, så filen er nem at læse fra top til bund
* Hvis ingen besvarelser kvalificerer sig til eksport, står det blot i filen i stedet for at fejle

## Tips

* **Bedre til læsning, CSV til analyse** — Brug dette format, når du vil læse besvarelserne direkte; brug [Survey Export CSV](survey-export-csv.md), hvis du planlægger at åbne resultaterne i et regneark