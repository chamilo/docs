# Papperskorgar för övningar och lärandestigar

Chamilo 3.1 kan arkivera raderade övningsförsök och spårningsdata för lärandestigar så att behöriga lärare kan återställa dem, med förbehåll för konfigurerad kvarhållning och åtkomstkontroller. Papperskorgar skyddar spårningsdata; de ersätter inte säkerhetskopior av databasen.

## Återställ ett övningsförsök

1. Öppna den berörda övningens sida **Rapportering** med rätt kurs eller session vald.
2. Välj **Papperskorg** för att visa arkiverade försök.
3. Identifiera deltagaren och det försök du behöver återställa.
4. Välj **Återställ**, bekräfta och uppdatera rapporten för att verifiera svar och poäng.

Du måste ha behörighet att hantera övningsresultat. Återställning kan blockeras när övningen är låst av Gradebook eller när plattformen begränsar lärares åtkomst till resultat.

## Återställ framsteg i en lärandestig

1. Öppna relevant rapporteringsskärm för lärandestigen för den avsedda kursen/sessionen.
2. Öppna dess **Papperskorg**.
3. Välj deltagarens arkiverade framsteg och **Återställ** dem.
4. Kontrollera de återställda lektionsframstegen och tillhörande övningsförsök.

När ett övningsförsök ingår i ett väntande arkiv för en lärandestig ska du först återställa arkivet för lärandestigen. Individuell återställning blockeras avsiktligt för att förhindra inkonsekventa framsteg.

## Kvarhållning och rensning (administratörer)

Inställningen `tracking.recycle_bin_retention_hours` styr hur länge arkiv förblir berättigade till återställning. Det initiala standardvärdet är **30 dagar** (720 timmar). Befintliga installationer måste synkronisera den nya inställningen via projektets settings-upsert-migrering innan administrationsgränssnittet förväntas visa den.

Förhandsgranska en rensning utan att radera något:

```bash
php bin/console chamilo:recycle-bin:purge
```

Permanent radering kräver ett explicit alternativ:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Kommandot stöder `--hours` (åsidosättning av kvarhållningstid), `--scan-limit`, `--after-lp-id` och `--after-exercise-id` för kontrollerad bearbetning. Schemalägg det endast efter att ha verifierat kvarhållningspolicy och säkerhetskopieringsarrangemang. Det finns **inget implicit automatiskt rensningsschema** enbart för att funktionen är aktiverad.

Se [Övningar](exercises.md) och [Lärandestigar](../adding-content/learning-paths.md). Implementering: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).