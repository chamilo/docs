# Korjaus- ja muunnoskomennot

> **Yhteensopivuuden rikkova muutos.** Alla olevat ylläpitokomennot kirjoittivat aiemmin tietokantaan heti, kun ne suoritettiin. Ne ovat nyt **oletuksena vain luku -tilassa (dry-run)** ja kirjoittavat vain, kun `--apply` annetaan, mallin `chamilo:migration:repair-quiz-relations-from-legacy` mukaisesti.

| Komento | Huomautukset |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | ei `--expected-count`-valitsinta (yksi kaikki tai ei mitään -toiminto) |

## Mikä muuttui ylläpitäjille

1. Suorita komento ilman valitsimia: se raportoi, mitä se tekisi, ei kirjoita mitään ja tulostaa tarkan
   `--apply --expected-count=N` -rivin käytettäväksi.
2. Kirjoittaaksesi suorita se uudelleen valitsimilla `--apply --expected-count=N`, jossa N on vain luku -ajon raportoima lukumäärä.
   Jos muutettavien rivien määrä poikkeaa N:stä (tiedot ovat muuttuneet välissä), komento kieltäytyy
   eikä kirjoita mitään.
3. `--dry-run` hyväksytään edelleen (se on nyt oletus eikä tee mitään); sen yhdistäminen valitsimeen `--apply` on virhe.
4. Skriptien ja cron-töiden, jotka suorittivat nämä komennot ilman argumentteja ja luottivat niiden kirjoittavan, on nyt annettava
   `--apply --expected-count=N`. Paluukoodit ovat ennallaan (0 onnistuminen, 1 epäonnistuminen, 2 virheellinen käyttö).

Esimerkki:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Uusi komento: `app:repair-user-tag-counters`

Laskee uudelleen tunnisteiden käyttökertoimen (`tag.count`) niitä käyttävistä relaatiotauluista (käyttäjätunnisteet, lisäkenttä-
tunnisteet, portfoliotunnisteet). Vanhemmissa versioissa kertoimet saattoivat ajautua. Sama malli: suorita ilman valitsimia, jotta näet ajautuneet
tunnisteet ja saat `--apply --expected-count=N` -rivin, ja suorita sitten kyseinen rivi kirjoittaaksesi. Migraatiota ei tarvita: suorita komento
silloin, kun haluat synkronoida kertoimet uudelleen.