# Papirkurver for øvelser og læringsstier

Chamilo 3.1 kan arkivere slettede øvelsesforsøk og sporingsdata for læringsstier, slik at autoriserte lærere kan gjenopprette dem, underlagt konfigurerte oppbevarings- og tilgangskontroller. Papirkurver beskytter sporingsdata; de er ikke en erstatning for databasesikkerhetskopier.

## Gjenopprett et øvelsesforsøk

1. Åpne den berørte øvelsens **Rapportering**-side med riktig kurs eller økt valgt.
2. Velg **Papirkurv** for å vise arkiverte forsøk.
3. Identifiser deltakeren og forsøket du må gjenopprette.
4. Velg **Gjenopprett**, bekreft, og oppdater rapporten for å verifisere svar og poengsummer.

Du må ha tillatelse til å administrere øvelsesresultater. Gjenoppretting kan bli blokkert når øvelsen er låst av karakterboken (Gradebook), eller når plattformen begrenser læreres tilgang til resultater.

## Gjenopprett fremdrift i læringssti

1. Åpne den relevante rapporteringsskjermen for læringsstien for det tiltenkte kurset/økten.
2. Åpne dens **Papirkurv**.
3. Velg deltakerens arkiverte fremdrift og **Gjenopprett** den.
4. Kontroller den gjenopprettede leksjonsfremdriften og tilknyttede øvelsesforsøk.

Når et øvelsesforsøk er en del av et ventende arkiv for læringssti, må du gjenopprette arkivet for læringsstien først. Individuell gjenoppretting er bevisst blokkert for å hindre inkonsistent fremdrift.

## Oppbevaring og opprydding (administratorer)

Innstillingen `tracking.recycle_bin_retention_hours` styrer hvor lenge arkiver forblir kvalifisert for gjenoppretting. Standardverdien i utgangspunktet er **30 dager** (720 timer). Eksisterende installasjoner må synkronisere den nye innstillingen gjennom prosjektets settings-upsert-migrering før administrasjonsgrensesnittet kan forventes å vise den.

Forhåndsvis en opprydding uten å slette noe:

```bash
php bin/console chamilo:recycle-bin:purge
```

Permanent sletting krever et eksplisitt alternativ:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Kommandoen støtter `--hours` (overstyring av oppbevaring), `--scan-limit`, `--after-lp-id` og `--after-exercise-id` for kontrollert behandling. Planlegg den bare etter at oppbevaringspolicy og sikkerhetskopieringsordninger er verifisert. Det finnes **ingen implisitt automatisk tidsplan for permanent sletting** bare fordi funksjonen er aktivert.

Se [Øvelser](exercises.md) og [Læringsstier](../adding-content/learning-paths.md). Implementering: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).