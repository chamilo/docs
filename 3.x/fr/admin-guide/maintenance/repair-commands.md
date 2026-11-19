# Commandes de réparation et de conversion

> **Changement incompatible.** Les commandes de maintenance ci-dessous écrivaient auparavant dans la base de données dès leur exécution. Elles sont désormais **en lecture seule (dry-run) par défaut** et n’écrivent que lorsque `--apply` est fourni, selon le modèle de `chamilo:migration:repair-quiz-relations-from-legacy`.

| Commande | Notes |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | pas de `--expected-count` (opération unique tout ou rien) |

## Ce qui a changé pour les administrateurs

1. Exécutez la commande sans options : elle indique ce qu’elle ferait, n’écrit rien et affiche la ligne exacte
   `--apply --expected-count=N` à utiliser.
2. Pour écrire, relancez-la avec `--apply --expected-count=N`, où N est le nombre indiqué par l’exécution en lecture seule.
   Si le nombre de lignes qui seraient modifiées diffère de N (les données ont changé entre-temps), la commande refuse
   et n’écrit rien.
3. `--dry-run` est toujours accepté (c’est désormais le comportement par défaut et il ne fait rien) ; le combiner avec `--apply` constitue une erreur.
4. Les scripts et les tâches cron qui exécutaient ces commandes sans arguments et comptaient sur leur écriture doivent désormais passer
   `--apply --expected-count=N`. Les codes de sortie sont inchangés (0 succès, 1 échec, 2 usage invalide).

Exemple :

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Nouvelle commande : `app:repair-user-tag-counters`

Recalcule le compteur d’utilisation (`tag.count`) des étiquettes à partir des lignes de relation qui les utilisent (étiquettes utilisateur, étiquettes de champ supplémentaire,
étiquettes de portfolio). Les versions antérieures laissaient les compteurs dériver. Même modèle : exécutez-la sans options pour lister les étiquettes dérivées
et obtenir la ligne `--apply --expected-count=N`, puis exécutez cette ligne pour écrire. Aucune migration n’est impliquée : exécutez-la
lorsque vous souhaitez resynchroniser les compteurs.