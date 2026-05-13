# Rôles des utilisateurs

Chamilo utilise un système de permissions basé sur les rôles. Chaque utilisateur se voit attribuer un rôle qui détermine ce qu'il peut voir et faire sur la plateforme.

## Rôles au niveau de la plateforme

Ces rôles contrôlent l'accès aux fonctionnalités globales de la plateforme :

| Rôle | Description |
|------|-------------|
| **Apprenant (Étudiant)** | Rôle par défaut. Peut s'inscrire à des cours, accéder au contenu d'apprentissage, soumettre des devoirs et passer des exercices. |
| **Enseignant (Formateur)** | Peut créer et gérer des cours, ajouter du contenu, noter les étudiants et consulter les rapports au niveau des cours. |
| **Administrateur de sessions** | Peut créer et gérer des sessions (c'est-à-dire des ensembles de cours basés sur le temps), inscrire des utilisateurs aux sessions et assigner des tuteurs. Ne peut pas accéder aux paramètres généraux de la plateforme. |
| **Gestionnaire des ressources humaines (GRH)** | Peut consulter les données de suivi et de rapport pour les utilisateurs assignés. Utilisé pour les superviseurs qui doivent suivre la formation des employés sans gérer le contenu ni la plateforme. |
| **Administrateur du portail** | Accès complet à toutes les fonctionnalités d'administration de la plateforme. Peut gérer les utilisateurs, les cours, les sessions, les plugins et tous les paramètres. |
| **Administrateur global** | Identique à l'Administrateur du portail, mais avec un accès à toutes les URL d'accès dans une configuration multi-URL (c'est-à-dire multi-tenant). |
| **Anonyme** | Un rôle spécial pour les visiteurs non connectés. Peut accéder aux cours et contenus publics si cela est activé. |

## Rôles au niveau des cours

Au sein d'un cours, les utilisateurs ont des rôles spécifiques :

| Rôle | Description |
|------|-------------|
| **Étudiant** | Rôle par défaut dans un cours. Peut accéder au contenu, passer des exercices et soumettre des devoirs. |
| **Assistant de cours** | Dispose de permissions de gestion limitées au sein du cours. Peut aider à gérer le contenu et modérer les forums. |
| **Enseignant** | Contrôle total sur le cours : gérer le contenu, les outils, les paramètres et les inscriptions. |

## Rôles au niveau des sessions

Au sein d'une session, des rôles supplémentaires existent :

| Rôle | Description |
|------|-------------|
| **Tuteur de session** | Supervise tous les cours d'une session. Peut consulter le suivi de tous les cours de la session. |
| **Tuteur de cours** | Enseigne un cours spécifique au sein d'une session. Peut gérer le contenu et suivre les apprenants pour ce cours dans cette session. |

Remarque : Les termes « coach » et « tuteur » ont des significations très proches et dépendent généralement de l'organisation. Nous utilisons ces deux termes de manière interchangeable dans Chamilo 2.0, mais la plupart du temps, nous faisons référence à un tuteur, une personne qui vous aide à apprendre dans le cadre du cours, et non à un coach personnel. Nous pourrions utiliser exclusivement « tuteur » à l'avenir.

## Attribution des rôles

Lors de la création ou de la modification d'un compte utilisateur dans le panneau d'administration, vous sélectionnez leur rôle au niveau de la plateforme. Les rôles de cours et de session sont attribués lors de l'inscription des utilisateurs à des cours ou à des sessions.

## Hiérarchie des rôles

Les rôles avec des privilèges plus élevés héritent des capacités des rôles moins privilégiés :

* Un administrateur peut faire tout ce qu'un enseignant peut faire
* Un enseignant peut faire tout ce qu'un étudiant peut faire
* Les rôles au niveau des sessions (tuteur) offrent des capacités supplémentaires uniquement dans le cadre de la session assignée

## Conseils

* **Appliquez le principe du privilège minimum** — Attribuez aux utilisateurs le rôle minimal nécessaire pour accomplir leurs tâches
* **Utilisez les Administrateurs de sessions pour une gestion déléguée** — Si vous avez du personnel qui doit gérer des sessions de formation mais pas l'ensemble de la plateforme, attribuez-leur le rôle d'Administrateur de sessions au lieu d'un accès administrateur complet
* **Utilisez GRH pour les superviseurs** — Les Gestionnaires des ressources humaines peuvent suivre l'avancement de la formation sans avoir accès à la modification des cours ou des paramètres de la plateforme
* **Création de rôles** — Chamilo 2.x dispose de la structure interne prête pour la création de nouveaux rôles, mais cette fonctionnalité nécessite encore plus de tests avant une diffusion à grande échelle. Elle peut être activée via les [fournisseurs officiels de Chamilo](https://chamilo.org/providers).