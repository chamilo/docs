# Undersøkelse – eksport til TXT

Undersøkelse – eksport til TXT <img src="../../.gitbook/assets/icons/mdi-file-outline.svg" alt="Undersøkelse – eksport til TXT" data-size="line"> eksporterer resultatene fra en undersøkelse til en lesbar ren tekstfil — én blokk per respondent, med hver spørsmål, valgt(e) svar og eventuell fritekst, i stedet for rader og kolonner som i CSV.

## Eksportere en undersøkelse

Når funksjonen er aktivert, får listen i kursets **Undersøkelse**-verktøy et **Eksporter**-ikon på hver undersøkelsesrad. Klikk på det for å laste ned resultatene som en `.txt`-fil.

## Hva filen inneholder

* Anonyme undersøkelser viser «Anonymous» i stedet for identitetsopplysninger; ikke-anonyme undersøkelser inkluderer respondentens navn og brukernavn
* Hver respondents svar skilles med en skillelinje, slik at filen er lett å lese fra topp til bunn
* Hvis ingen svar kvalifiserer for eksport, står det bare i filen i stedet for at eksporten feiler

## Tips

* **Bedre for lesing, CSV for analyse** — Bruk dette formatet når du vil lese gjennom svarene direkte; bruk [Undersøkelse – eksport til CSV](survey-export-csv.md) hvis du planlegger å åpne resultatene i et regneark