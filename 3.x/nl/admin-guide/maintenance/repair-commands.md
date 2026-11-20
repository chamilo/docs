# Herstel- en conversieopdrachten

> **Incompatibele wijziging.** De onderstaande onderhoudsopdrachten schreven vroeger naar de database zodra ze werden uitgevoerd. Ze zijn nu **standaard alleen-lezen (dry-run)** en schrijven alleen wanneer `--apply` wordt opgegeven, volgens het model van `chamilo:migration:repair-quiz-relations-from-legacy`.

| Opdracht | Opmerkingen |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | geen `--expected-count` (één alles-of-niets-bewerking) |

## Wat er voor beheerders is veranderd

1. Voer de opdracht zonder opties uit: deze rapporteert wat ze zou doen, schrijft niets en toont de exacte
   regel `--apply --expected-count=N` die u moet gebruiken.
2. Om te schrijven, voert u de opdracht opnieuw uit met `--apply --expected-count=N`, waarbij N het aantal is dat door de alleen-lezen uitvoering is gerapporteerd.
   Als het aantal rijen dat zou worden gewijzigd afwijkt van N (de gegevens zijn tussentijds gewijzigd), weigert de opdracht
   en schrijft ze niets.
3. `--dry-run` wordt nog steeds geaccepteerd (dit is nu de standaard en doet niets); combineren met `--apply` is een fout.
4. Scripts en cronjobs die deze opdrachten zonder argumenten uitvoerden en erop rekenden dat ze schreven, moeten nu
   `--apply --expected-count=N` doorgeven. Afsluitcodes zijn ongewijzigd (0 succes, 1 mislukking, 2 ongeldig gebruik).

Voorbeeld:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Nieuwe opdracht: `app:repair-user-tag-counters`

Herberekent de gebruiks­teller (`tag.count`) van tags op basis van de relatierijen die ze gebruiken (gebruikerstags, extra-veld­tags,
portfoliotags). Oudere versies lieten de tellers afwijken. Hetzelfde model: voer de opdracht zonder opties uit om de afwijkende
tags te tonen en de regel `--apply --expected-count=N` te krijgen, en voer die regel vervolgens uit om te schrijven. Er is geen migratie bij betrokken: voer de opdracht uit
wanneer u de tellers opnieuw wilt synchroniseren.