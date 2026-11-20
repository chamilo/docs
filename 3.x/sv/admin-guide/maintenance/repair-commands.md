# Reparations- och konverteringskommandon

> **Brytande ändring.** Underhållskommandona nedan skrev tidigare till databasen så snart de kördes. De är nu **skrivskyddade (dry-run) som standard** och skriver endast när `--apply` anges, enligt modellen för `chamilo:migration:repair-quiz-relations-from-legacy`.

| Kommando | Anmärkningar |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | ingen `--expected-count` (en enda allt-eller-inget-operation) |

## Vad som har ändrats för administratörer

1. Kör kommandot utan alternativ: det rapporterar vad det skulle göra, skriver ingenting och skriver ut den exakta
   raden `--apply --expected-count=N` som ska användas.
2. För att skriva, kör det igen med `--apply --expected-count=N`, där N är det antal som rapporterades av den skrivskyddade körningen.
   Om antalet rader som skulle ändras skiljer sig från N (data har ändrats däremellan) avvisar kommandot
   och skriver ingenting.
3. `--dry-run` accepteras fortfarande (det är nu standard och gör ingenting); att kombinera det med `--apply` är ett fel.
4. Skript och cron-jobb som körde dessa kommandon utan argument och förlitade sig på att de skrev måste nu ange
   `--apply --expected-count=N`. Avslutskoder är oförändrade (0 lyckat, 1 misslyckat, 2 ogiltig användning).

Exempel:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Nytt kommando: `app:repair-user-tag-counters`

Räknar om användningsräknaren (`tag.count`) för taggar utifrån de relationsrader som använder dem (användartaggar, extrafält-
taggar, portföljtaggar). Äldre versioner lät räknarna glida isär. Samma modell: kör det utan alternativ för att lista de avvikande
taggarna och få raden `--apply --expected-count=N`, och kör sedan den raden för att skriva. Ingen migrering är inblandad: kör det
när du vill att räknarna ska synkroniseras om.