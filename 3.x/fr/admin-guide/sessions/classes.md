# Classes

Les classes dans Chamilo sont des groupes d'utilisateurs prédéfinis qui peuvent être inscrits dans des sessions en tant qu'unité. Elles simplifient le processus d'inscription lorsque vous formez régulièrement les mêmes groupes de personnes.

> Les classes et les [Groupes d'utilisateurs](../../admin-guide/users/user-groups.md) partagent la même interface. La seule différence est le paramètre **type de groupe** : choisissez « Classe » lors de la création du groupe. Tout le reste — gestion des membres, visibilité et l'interface elle-même — fonctionne de manière identique.

## Création d'une classe

1. Depuis le panneau d'administration, accédez à **Classes** (ou Groupes d'utilisateurs et sélectionnez le type « Classe »)
2. Cliquez sur **Créer une classe**
3. Saisissez un **nom** (par exemple, « Équipe d'ingénierie », « Nouvelles recrues mars 2026 »)
4. Ajoutez des **membres** — recherchez et sélectionnez des utilisateurs
5. Enregistrez

## Utilisation des classes pour l'inscription

Lors de la création ou de la modification d'une session, vous pouvez inscrire une classe entière en une seule fois au lieu d'ajouter les utilisateurs individuellement :

1. Ouvrez les paramètres d'inscription de la session
2. Cliquez sur **Ajouter une classe**
3. Sélectionnez la classe
4. Tous les membres de la classe sont inscrits à la session

## Gestion des classes

* **Modifier** — Modifier le nom de la classe ou mettre à jour les membres
* **Ajouter/retirer des membres** — Maintenir la liste des membres de la classe à jour
* **Supprimer** — Supprimer la classe (n'affecte pas les comptes des membres ni leurs inscriptions existantes)

## API d'intégration

Les administrateurs de la plateforme peuvent utiliser l'[API des inscriptions aux classes](../../developer-guide/api/class-subscriptions.md) pour consulter les membres et remplacer les utilisateurs, les sessions et les cours d'une classe. Contrairement à l'ajout d'un utilisateur dans l'interface d'administration, chaque `PUT` de l'API remplace la liste correspondante **complète**. Lisez toujours les inscriptions actuelles avant d'envoyer une mise à jour.

## Filtrage des membres d'une classe à l'aide des champs supplémentaires

Lors de l'affectation d'utilisateurs à une classe, utilisez les **Champs supplémentaires** pour filtrer les utilisateurs disponibles selon un champ de profil utilisateur recherchable. Choisissez le champ, saisissez ou sélectionnez une valeur, puis ajoutez les utilisateurs correspondants depuis le panneau des utilisateurs disponibles. Selon le type de champ supplémentaire, le filtre peut proposer une saisie de texte ou des choix prédéfinis.

Seuls les champs supplémentaires utilisateur configurés comme recherchables/filtrables sont proposés. Les membres existants de la classe restent dans le panneau des membres sélectionnés pendant que vous filtrez les utilisateurs disponibles ; le filtrage ne doit pas les retirer silencieusement. Vérifiez la liste complète des membres sélectionnés avant d'enregistrer. Voir [PR #9364 sur les filtres d'appartenance aux classes](https://github.com/chamilo/chamilo-lms/pull/9364).

## Conseils

* **Créez des classes pour les cohortes récurrentes** — Si vous dispensez la même formation à différentes équipes, créez une classe pour chaque équipe
* **Mettez à jour avant chaque session** — Vérifiez les membres de la classe avant d'inscrire une classe à une nouvelle session afin de vous assurer que la liste est à jour
* **Combinez avec l'importation CSV** — Importez les membres de la classe depuis un fichier CSV pour les groupes importants