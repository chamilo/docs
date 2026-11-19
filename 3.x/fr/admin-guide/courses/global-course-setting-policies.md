# Politiques globales des paramètres de cours

Les administrateurs de la plateforme peuvent définir des valeurs par défaut centralisées pour les paramètres de cours et contrôler si les enseignants peuvent les remplacer. Les politiques s'appliquent aux fonctionnalités de cours existantes tout en préservant les configurations spécifiques aux cours compatibles.

## Ouvrir la page des politiques

Sur l'**URL d'accès principale**, ouvrez **Administration > Paramètres > Paramètres de cours**, ou accédez à `/admin/settings/course-settings` sur votre installation. Cette page d'administration est réservée aux administrateurs de plateforme autorisés sur l'URL d'accès principale. N'utilisez pas un portail secondaire pour modifier les politiques globales.

## Configurer une politique

1. Utilisez le champ **Recherche** si vous avez besoin d'une clé de paramètre de cours spécifique.
2. Pour chaque paramètre, vérifiez le nom exact de la variable affiché sous son titre.
3. Cochez ou décochez **Modifiable dans le cours** pour contrôler si les éditeurs de cours peuvent modifier ce paramètre.
4. Choisissez ou saisissez une **Valeur par défaut de la plateforme**. Certains paramètres proposent une liste déroulante de valeurs autorisées ; d'autres acceptent du texte.
5. Enregistrez les modifications et vérifiez le comportement effectif dans un cours de test.

Les paramètres qui réutilisent le même nom de variable dans différentes catégories sont affichés séparément lorsque cela est nécessaire. Ne supposez pas que deux noms visuellement similaires contrôlent la même fonctionnalité de cours.

## Vérifier avec deux rôles

En tant qu'administrateur, confirmez la valeur par défaut enregistrée et si elle est modifiable. En tant qu'enseignant du cours, ouvrez le paramètre de cours correspondant et vérifiez que la valeur effective et la restriction de modification correspondent à la politique. Testez à la fois un cours existant et un nouveau cours lorsque cela est possible.

La modification d'une valeur par défaut globale peut affecter de nombreux cours. Examinez son impact avant de désactiver les remplacements par les enseignants, et consignez les valeurs précédentes de la politique afin qu'elles puissent être restaurées si nécessaire.

Voir [Gestion des cours](managing-courses.md) et [Paramètres de cours](../../teacher-guide/creating-your-course/course-settings.md). Implémentation : [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).