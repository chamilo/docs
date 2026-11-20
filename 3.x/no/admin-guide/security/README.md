# Sikkerhet

**Sikkerhet**-blokken på administrasjonsoversikten samler plattformens innebygde verktøy for sikkerhetsovervåking og revisjon. Den er atskilt fra [Sikkerhetsinnstillinger](../platform-settings/security-settings.md), som konfigurerer sikkerhets*policy* (passordregler, CAPTCHA, HTTP-sikkerhetshoder og så videre) — denne blokken gir deg *rapportene og verktøyene* som overvåker plattformen for mistenkelig aktivitet og uønskede endringer.

![Sikkerhet-blokken på administrasjonsoversikten, med Aktivitetsrevisjon, Innloggingsforsøk, Enkel IDS, Passordstyrkesjekker og Filintegritet](/.gitbook/assets/admin-security-block.png)

Blokken ble introdusert i Chamilo 2.0 med fire verktøy og utvidet i Chamilo 3.0 med et femte, **Filintegritet**.

## Tilgang til Sikkerhet-blokken

Fra administrasjonspanelet vises **Sikkerhet**-blokken sammen med de andre oversiktsblokkene (Brukere, Kurs, Plattformadministrasjon, System og så videre). Klikk på en av lenkene for å åpne det tilhørende verktøyet.

## Hva som finnes i blokken

* **[Aktivitetsrevisjon](activities-audit.md)** — Bla gjennom viktige administrative og plattformhendelser (bruker-, kurs-, økt- og andre endringer) etter hendelsestype
* **[Innloggingsforsøk](login-attempts.md)** — Gå gjennom mislykkede og vellykkede innloggingsforsøk, med diagrammer og en søkbar logg
* **[Enkel IDS](simple-ids.md)** — Se forespørsler som er flagget av Chamilos innebygde, lette inntrengingsdeteksjonssystem
* **[Passordstyrkesjekker](password-strength-checker.md)** — Skann aktive brukere for passord som matcher en liste over vanlige passord
* **[Filintegritet](file-integrity.md)** *(nytt i Chamilo 3.0)* — Oppdag uventede tillegg, endringer, slettinger eller tillatelsesendringer i de installerte filene

## Hvem som har tilgang

Alle fem verktøyene krever tilgang som **Portal Administrator**. Filintegritets skanning, pause og re-baseline-handlinger krever i tillegg tilgang som **Global Administrator**, og pausing av varsler eller etablering av en ny baseline krever at du skriver inn ditt eget passord på nytt — se [Filintegritet](file-integrity.md#actions) for detaljer.