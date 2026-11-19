# Personnaliser les noms et les icônes des outils de cours

Chamilo 3.1 permet aux éditeurs de cours autorisés de personnaliser le **nom** et l’**icône SVG** affichés pour un outil sur la page d’accueil d’un cours. Ces modifications sont limitées au cours et préservent les destinations existantes des outils.

## Personnaliser un outil

1. Ouvrez la page d’accueil du cours en tant qu’utilisateur autorisé à modifier le cours.
2. Activez le mode **Personnaliser** dans la grille des outils.
3. Ouvrez le formulaire de personnalisation de l’outil que vous souhaitez modifier.
4. Saisissez le **Nom** souhaité et, si nécessaire, sélectionnez un fichier SVG d’**Icône**.
5. Sélectionnez **Enregistrer** et vérifiez l’outil mis à jour dans la grille de la page d’accueil.

La personnalisation d’un outil est distincte des modes **Trier**, **Tout afficher** et **Tout masquer** de la grille. Modifier le libellé ou l’icône d’un outil ne crée pas un nouvel outil, ne change pas son URL sous-jacente et n’accorde pas d’accès supplémentaire aux apprenants.

## Exigences SVG et sécurité

Utilisez un fichier SVG provenant d’une source de confiance. Chamilo valide le contenu SVG téléversé et rejette les fichiers non sûrs. Si un fichier est rejeté, simplifiez-le ou réexportez-le sous forme de SVG propre au lieu d’essayer de contourner la validation.

Vérifiez l’icône et le nom obtenus à la fois en tant qu’enseignant et en tant qu’étudiant, et assurez-vous qu’un autre cours reste inchangé. Les étudiants ne peuvent pas personnaliser les outils, sauf s’ils disposent des autorisations requises de modification du cours.

Voir [Page d’accueil du cours](course-homepage.md). Implémentation : [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).