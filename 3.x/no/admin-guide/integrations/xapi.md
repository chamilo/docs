# xAPI

**xAPI** (Experience API, også kjent som Tin Can API) er en standard for sporing av læringsopplevelser. Chamilo kan både generere og konsumere xAPI-utsagn.

## Hva xAPI gjør

xAPI sporer læringsaktiviteter som **utsagn** i formatet: «Aktør utførte Verb på Objekt.» For eksempel:

* «Jane fullførte Modul 1»
* «John fikk 85 % på avsluttende eksamen»
* «Maria så introduksjonsvideoen»

Disse utsagnene lagres i et **Learning Record Store (LRS)** og gir en helhetlig oversikt over læringsaktivitet.

## Konfigurasjon

1. I plattforminnstillingene konfigurerer du **LRS-endepunktet**:
   * **LRS URL** — Adressen til Learning Record Store
   * **LRS-autentisering** — Påloggingsinformasjon for å sende data til LRS
2. Aktiver xAPI-sporing for de ønskede aktivitetene

## Hva Chamilo sporer via xAPI

Chamilo kan generere xAPI-utsagn for:

* Kursadgang og fullføring
* Øvingsforsøk og poengsum
* Fremdrift for elementer i læringsstier
* Porteføljeelementer

Andre verktøy (som Dokumenter og Forum) sendes foreløpig ikke som xAPI-hendelser av programtillegget.

## Bruksområder

* **Sporing på tvers av plattformer** — Spor læringsaktivitet på tvers av flere verktøy og plattformer i ett enkelt LRS
* **Avansert analyse** — Bruk LRS-analyseverktøy til å hente innsikt som går utover Chamilos innebygde rapportering
* **Samsvarsrapportering** — Generer revisjonsspor for gjennomført opplæring i henhold til regulatoriske krav