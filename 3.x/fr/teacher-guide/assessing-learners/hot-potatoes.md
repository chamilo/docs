# Activités Hot Potatoes

Chamilo 3.1 permet d'importer des activités HTML Hot Potatoes dans l'outil Exercices moderne et d'utiliser des activités individuelles dans les parcours d'apprentissage.

## Importer une activité

1. Ouvrez l'outil **Exercices** du cours et accédez à **Hot Potatoes**.
2. Dans **Importer Hot Potatoes**, sélectionnez un paquet **ZIP** Hot Potatoes ou une exportation **HTML** autonome.
3. Lorsqu'une activité dépend d'images liées, de médias ou d'autres fichiers, incluez ces ressources dans le ZIP.
4. Sélectionnez **Importer** et vérifiez que l'activité importée s'ouvre et s'affiche correctement.

## Gérer et réutiliser les activités

Depuis la liste Hot Potatoes, utilisez **Ouvrir** pour prévisualiser l'activité, **Modifier** pour changer son titre, **Publier** ou **Masquer** pour contrôler la visibilité, et **Supprimer** pour la retirer lorsque cela est autorisé. Le constructeur de parcours d'apprentissage peut inclure des activités Hot Potatoes individuelles parmi ses ressources.

## Examiner les tentatives des apprenants

L'action **Tentatives** affiche les tentatives suivies pour examen par l'enseignant. Les enseignants peuvent attribuer une note en pourcentage examinée, de 0 à 100. L'écran affiche actuellement jusqu'aux 100 dernières tentatives. Utilisez le résultat réellement affiché de l'activité comme élément de preuve à l'appui lors de l'évaluation d'un apprenant.

**La notation automatique et la synchronisation avec le cahier de notes ne sont pas implémentées.** Les scores affichés par un paquet Hot Potatoes lui-même ne doivent pas être considérés comme des notes vérifiées côté serveur. Les résultats examinés par l'enseignant sont stockés séparément.

## Dépannage

Si des médias sont manquants, réexportez l'activité avec toutes les ressources liées dans son ZIP. Si une exportation HTML fonctionne sur un ordinateur local mais pas dans Chamilo, vérifiez les références de fichiers externes ou le contenu intégré incompatible. Testez la visibilité de l'activité avec un compte étudiant ainsi qu'avec un compte enseignant.

Voir [Exercices](exercises.md) et [Parcours d'apprentissage](../adding-content/learning-paths.md). Implémentation : [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).