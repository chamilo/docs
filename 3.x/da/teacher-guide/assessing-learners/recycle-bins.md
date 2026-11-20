# Papirkurve til øvelser og læringsstier

Chamilo 3.1 kan arkivere slettede øvelsesforsøg og sporingsdata for læringsstier, så autoriserede undervisere kan gendanne dem, underlagt konfigureret opbevaring og adgangskontrol. Papirkurve beskytter sporingsdata; de er ikke en erstatning for databasesikkerhedskopier.

## Gendan et øvelsesforsøg

1. Åbn den berørte øvelses **Rapportering**-side med det korrekte kursus eller den korrekte session valgt.
2. Vælg **Papirkurv** for at vise arkiverede forsøg.
3. Identificer den lærende og det forsøg, du skal gendanne.
4. Vælg **Gendan**, bekræft, og opdater rapporten for at verificere svar og point.

Du skal have tilladelse til at administrere øvelsesresultater. Gendannelse kan være blokeret, når øvelsen er låst af Karakterbogen, eller platformen begrænser underviseres adgang til resultater.

## Gendan fremskridt i læringsstien

1. Åbn den relevante rapporteringsskærm for læringsstien for det tilsigtede kursus/den tilsigtede session.
2. Åbn dens **Papirkurv**.
3. Vælg den lærendes arkiverede fremskridt, og **gendan** det.
4. Kontrollér det gendannede lektionsfremskridt og tilknyttede øvelsesforsøg.

Når et øvelsesforsøg er en del af et afventende arkiv for en læringssti, skal du først gendanne arkivet for læringsstien. Individuel gendannelse er bevidst blokeret for at forhindre inkonsistent fremskridt.

## Opbevaring og oprydning (administratorer)

Indstillingen `tracking.recycle_bin_retention_hours` styrer, hvor længe arkiver forbliver berettigede til gendannelse. Standardværdien er i første omgang **30 dage** (720 timer). Eksisterende installationer skal synkronisere den nye indstilling via projektets settings-upsert-migrering, før administrationsgrænsefladen kan forventes at vise den.

Vis en forhåndsvisning af en oprydning uden at slette noget:

```bash
php bin/console chamilo:recycle-bin:purge
```

Permanent sletning kræver en eksplicit indstilling:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Kommandoen understøtter `--hours` (tilsidesættelse af opbevaring), `--scan-limit`, `--after-lp-id` og `--after-exercise-id` til kontrolleret behandling. Planlæg den kun, efter at opbevaringspolitik og sikkerhedskopieringsordninger er verificeret. Der er **ingen implicit automatisk oprydningsplan**, blot fordi funktionen er aktiveret.

Se [Øvelser](exercises.md) og [Læringsstier](../adding-content/learning-paths.md). Implementering: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).