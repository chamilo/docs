# Gestion des sessions

## Création d'une session

![Formulaire de création de session avec les champs pour le nom, les dates, le formateur, la catégorie et la visibilité](/.gitbook/assets/admin-session-create-form.png)

1. Depuis le panneau d'administration, cliquez sur **Créer une session**
2. Remplissez les détails de la session :
   * **Nom de la session** — Un nom descriptif (par exemple, "Intégration Printemps 2026")
   * **Dates de début et de fin** — Période de déroulement de la session (facultatif — les sessions peuvent être sans fin). Il existe 3 ensembles de dates : dates d'affichage, dates de limitation d'accès pour les apprenants et dates de limitation d'accès pour les formateurs
   * **Formateur de la session** — La personne supervisant l'ensemble de la session
   * **Catégorie** — Assignez à une catégorie de session pour l'organisation
   * **Visibilité** — Contrôlez le comportement d'accès et d'affichage
3. **Ajouter des cours** — Sélectionnez un ou plusieurs cours à inclure dans la session
4. **Inscrire des apprenants** — Ajoutez des utilisateurs individuels ou des classes d'utilisateurs
5. **Assigner des formateurs de cours** — Pour chaque cours, assignez un enseignant (formateur de cours)
6. Enregistrez

## Dates des sessions

Les sessions permettent une configuration flexible des dates :

| Date | Objectif |
|------|----------|
| **Début/fin d'affichage** | Quand la session apparaît dans les listes des apprenants |
| **Début/fin d'accès** | Quand les apprenants peuvent réellement accéder au contenu de la session |
| **Début/fin d'accès formateur** | Quand les formateurs peuvent accéder à la session (souvent commence avant et se termine après l'accès des apprenants) |

Cela vous permet de préparer la session avant l'arrivée des apprenants et de maintenir l'accès des formateurs ouvert après la fin de la session pour l'évaluation et les rapports.

## Liste des sessions

![Liste des sessions affichant toutes les sessions avec le nom, les dates, le nombre de cours, le nombre d'apprenants et le statut](/.gitbook/assets/admin-session-list.png)

La liste des sessions affiche toutes les sessions avec :

* Nom de la session
* Dates de début et de fin
* Statut (active, à venir, passée)

Utilisez la recherche et les filtres pour trouver des sessions par nom, date, catégorie ou statut.

## Modification d'une session

Cliquez sur une session pour la modifier :

* Modifier les dates, le nom ou la catégorie
* Ajouter ou supprimer des cours
* Changer les formateurs de cours
* Ajouter ou supprimer des apprenants
* Voir les données de suivi pour la session

## Inscription des utilisateurs

![Interface d'inscription à la session pour ajouter des utilisateurs individuels, des classes ou importer via CSV](/.gitbook/assets/admin-session-enrollment.png)

Vous pouvez inscrire des utilisateurs à une session par :

* **Inscription individuelle** — Recherchez et ajoutez des utilisateurs individuels
* **Inscription de classe** — Ajoutez une classe entière (groupe d'utilisateurs prédéfinis) en une seule fois
* **Importation CSV** — Téléchargez un fichier avec les affectations utilisateur-session

## Accès à la session

Les apprenants accèdent à leurs sessions via **Mes sessions** dans la barre latérale. Les sessions sont organisées en :

* **Sessions actuelles** — Actuellement actives
* **Sessions passées** — Terminées
* **Sessions à venir** — Pas encore commencées

## Conseils

* **Planifiez les dates avec soin** — Assurez-vous que les dates d'accès des formateurs s'étendent au-delà des dates des apprenants pour que les formateurs puissent préparer et faire le suivi
* **Utilisez des classes pour les inscriptions récurrentes** — Si vous inscrivez fréquemment les mêmes groupes, créez des classes et assignez-les aux sessions
* **Gardez les sessions organisées** — Utilisez des catégories et des conventions de nommage claires pour une gestion facile