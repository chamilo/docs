# Reparasjons- og konverteringskommandoer

> **Brytende endring.** Vedlikeholdskommandoene nedenfor skrev tidligere til databasen så snart de ble kjørt. De er nå **skrivebeskyttet (dry-run) som standard** og skriver bare når `--apply` er angitt, etter modellen til `chamilo:migration:repair-quiz-relations-from-legacy`.

| Kommando | Merknader |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | ingen `--expected-count` (én alt-eller-ingenting-operasjon) |

## Hva som er endret for administratorer

1. Kjør kommandoen uten alternativer: den rapporterer hva den ville gjort, skriver ingenting, og skriver ut den nøyaktige
   `--apply --expected-count=N`-linjen som skal brukes.
2. For å skrive, kjør den på nytt med `--apply --expected-count=N`, der N er tallet som ble rapportert av den skrivebeskyttede kjøringen.
   Hvis antallet rader som ville blitt endret, avviker fra N (dataene ble endret i mellomtiden), avviser kommandoen
   og skriver ingenting.
3. `--dry-run` godtas fortsatt (det er nå standard og gjør ingenting); å kombinere det med `--apply` er en feil.
4. Skript og cron-jobber som kjørte disse kommandoene uten argumenter og stolte på at de skrev, må nå sende
   `--apply --expected-count=N`. Avslutningskoder er uendret (0 suksess, 1 feil, 2 ugyldig bruk).

Eksempel:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Ny kommando: `app:repair-user-tag-counters`

Beregner brukstelleren (`tag.count`) for tagger på nytt ut fra relasjonsradene som bruker dem (brukertagger, ekstra felt-
tagger, porteføljetagger). Eldre versjoner lot tellerne drive. Samme modell: kjør den uten alternativer for å liste taggene som har drevet
og få `--apply --expected-count=N`-linjen, og kjør deretter den linjen for å skrive. Ingen migrering er involvert: kjør den
når du vil at tellerne skal synkroniseres på nytt.