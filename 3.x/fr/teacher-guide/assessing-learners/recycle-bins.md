# Corbeilles des exercices et des parcours d'apprentissage

Chamilo 3.1 peut archiver les tentatives d'exercice supprimées et les données de suivi des parcours d'apprentissage afin que les enseignants autorisés puissent les restaurer, sous réserve des contrôles de conservation et d'accès configurés. Les corbeilles protègent les données de suivi ; elles ne remplacent pas les sauvegardes de base de données.

## Restaurer une tentative d'exercice

1. Ouvrez la page **Rapports** de l'exercice concerné, avec le cours ou la session approprié sélectionné.
2. Sélectionnez **Corbeille** pour afficher les tentatives archivées.
3. Identifiez l'apprenant et la tentative à récupérer.
4. Sélectionnez **Restaurer**, confirmez, puis actualisez le rapport pour vérifier les réponses et les scores.

Vous devez disposer de l'autorisation de gérer les résultats d'exercice. La restauration peut être bloquée lorsque l'exercice est verrouillé par le cahier de notes ou lorsque la plateforme restreint l'accès des enseignants aux résultats.

## Restaurer la progression d'un parcours d'apprentissage

1. Ouvrez l'écran de rapports du parcours d'apprentissage concerné pour le cours ou la session visé.
2. Ouvrez sa **Corbeille**.
3. Sélectionnez la progression archivée de l'apprenant et **Restaurez**-la.
4. Vérifiez la progression de leçon restaurée et les tentatives d'exercice associées.

Lorsqu'une tentative d'exercice fait partie d'une archive de parcours d'apprentissage en attente, restaurez d'abord l'archive du parcours d'apprentissage. La restauration individuelle est volontairement bloquée afin d'éviter une progression incohérente.

## Conservation et nettoyage (administrateurs)

Le paramètre `tracking.recycle_bin_retention_hours` détermine la durée pendant laquelle les archives restent éligibles à la récupération. La valeur initiale par défaut est de **30 jours** (720 heures). Les installations existantes doivent synchroniser le nouveau paramètre au moyen de la migration settings-upsert du projet avant que l'interface d'administration ne l'affiche.

Prévisualiser un nettoyage sans rien supprimer :

```bash
php bin/console chamilo:recycle-bin:purge
```

La suppression définitive exige une option explicite :

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

La commande prend en charge `--hours` (remplacement de la durée de conservation), `--scan-limit`, `--after-lp-id` et `--after-exercise-id` pour un traitement contrôlé. Ne la planifiez qu'après avoir vérifié la politique de conservation et les dispositions de sauvegarde. Il n'existe **aucun calendrier de purge automatique implicite** du seul fait que la fonctionnalité est activée.

Voir [Exercices](exercises.md) et [Parcours d'apprentissage](../adding-content/learning-paths.md). Mise en œuvre : [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).