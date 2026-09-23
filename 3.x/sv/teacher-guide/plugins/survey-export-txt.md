# Undersöknings­export TXT

Undersöknings­export TXT <img src="/.gitbook/assets/icons/mdi-file-outline.svg" alt="Undersöknings­export TXT" data-size="line"> exporterar en undersöknings resultat till en läsbar oformaterad textfil — ett block per respondent, med varje fråga, det eller de valda svaren och eventuellt fritextsvar, i stället för en CSV-fils rader och kolumner.

## Exportera en undersökning

När funktionen är aktiverad får listan i kursens **Undersökning**-verktyg en **Exportera**-ikon på varje undersökningsrad. Klicka på den för att hämta resultaten som en `.txt`-fil.

## Vad filen innehåller

* Anonyma undersökningar visar "Anonymous" i stället för identitetsuppgifter; icke-anonyma undersökningar innehåller respondentens namn och användarnamn
* Varje respondents svar avgränsas med en avdelningslinje, så att filen är lätt att läsa uppifrån och ned
* Om inga svar kvalificerar för export står det helt enkelt så i filen i stället för att exporten misslyckas

## Tips

* **Bättre för läsning, CSV för analys** — Använd det här formatet när du vill läsa igenom svaren direkt; använd [Undersöknings­export CSV](survey-export-csv.md) om du tänker öppna resultaten i ett kalkylblad