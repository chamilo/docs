# Reparations- og konverteringskommandoer

> **Brydende ændring.** Vedligeholdelseskommandoerne nedenfor skrev tidligere til databasen, så snart de blev kørt. De er nu **skrivebeskyttede (dry-run) som standard** og skriver kun, når `--apply` angives, efter modellen for `chamilo:migration:repair-quiz-relations-from-legacy`.

| Kommando | Bemærkninger |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | ingen `--expected-count` (én alt-eller-intet-operation) |

## Hvad der er ændret for administratorer

1. Kør kommandoen uden indstillinger: den rapporterer, hvad den ville gøre, skriver intet og udskriver den præcise
   `--apply --expected-count=N`-linje, der skal bruges.
2. For at skrive skal du køre den igen med `--apply --expected-count=N`, hvor N er det tal, som den skrivebeskyttede kørsel rapporterede.
   Hvis antallet af rækker, der ville blive ændret, afviger fra N (dataene er ændret i mellemtiden), afviser kommandoen
   og skriver intet.
3. `--dry-run` accepteres stadig (det er nu standard og gør ingenting); at kombinere det med `--apply` er en fejl.
4. Scripts og cron-job, der kørte disse kommandoer uden argumenter og stolede på, at de skrev, skal nu angive
   `--apply --expected-count=N`. Afslutningskoder er uændrede (0 succes, 1 fejl, 2 ugyldig brug).

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

Genberegner brugstælleren (`tag.count`) for tags ud fra de relationsrækker, der bruger dem (brugertags, ekstra felt-
tags, porteføljetags). Ældre versioner lod tællerne komme ud af trit. Samme model: kør den uden indstillinger for at liste de afvigende
tags og få linjen `--apply --expected-count=N`, og kør derefter den linje for at skrive. Der er ingen migrering involveret: kør den,
når du vil have tællerne gensynkroniseret.