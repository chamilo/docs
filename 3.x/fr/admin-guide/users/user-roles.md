# Rôles utilisateurs

Chamilo utilise un système de permissions fondé sur les rôles. Chaque utilisateur se voit attribuer un rôle qui détermine ce qu’il peut voir et faire sur la plateforme.

## Rôles au niveau de la plateforme

Ces rôles contrôlent l’accès aux fonctionnalités à l’échelle de la plateforme :

| Rôle |  Description |
|------|------------|
| **Apprenant (étudiant)** | Le rôle par défaut. Peut s’inscrire aux cours, accéder au contenu pédagogique, rendre des devoirs et passer des exercices. |
| **Enseignant (formateur)** | Peut créer et gérer des cours, ajouter du contenu, noter les étudiants et consulter les rapports au niveau du cours. |
| **Administrateur de sessions** | Peut créer et gérer des sessions (c’est-à-dire des ensembles de cours limités dans le temps), inscrire des utilisateurs aux sessions et affecter des tuteurs. Ne peut pas accéder aux paramètres généraux de la plateforme. |
| **Responsable des ressources humaines (RRH)** | Peut consulter les données de suivi et de reporting pour les utilisateurs qui lui sont assignés. Destiné aux superviseurs qui doivent suivre la formation des employés sans gérer le contenu ni la plateforme. |
| **Administrateur de portail** | Accès complet à toutes les fonctionnalités d’administration de la plateforme. Peut gérer les utilisateurs, les cours, les sessions, les plugins et tous les paramètres. |
| **Administrateur global** | Identique à l’administrateur de portail, mais avec un accès à toutes les URL d’accès dans une configuration multi-URL (c’est-à-dire multi-locataire) — ou, s’il est enregistré sur une URL non racine, limité à la branche de cette URL. Voir [Administrateurs de sous-arbre](../multi-url/access-urls.md#subtree-administrators). |
| **Anonyme** | Un rôle spécial pour les visiteurs non connectés. Peut accéder aux cours et contenus publics si cette option est activée. |

## Rôles au niveau du cours

Au sein d’un cours, les utilisateurs ont des rôles spécifiques :

| Rôle | Description |
|------|-------------|
| **Étudiant** | Rôle de cours par défaut. Peut accéder au contenu, passer des exercices, rendre des devoirs. |
| **Assistant de cours** | Dispose de permissions de gestion limitées au sein du cours. Peut aider à gérer le contenu et modérer les forums. |
| **Enseignant** | Contrôle total du cours : gestion du contenu, des outils, des paramètres et des inscriptions. |

## Rôles au niveau de la session

Au sein d’une session, des rôles supplémentaires existent :

| Rôle | Description |
|------|-------------|
| **Tuteur de session** | Supervise tous les cours d’une session. Peut consulter le suivi sur l’ensemble des cours de la session. |
| **Tuteur de cours** | Enseigne un cours spécifique au sein d’une session. Peut gérer le contenu et suivre les apprenants pour ce cours dans cette session. |

Remarque : Ce rôle s’appelait « coach » dans les versions de Chamilo antérieures à 3.0. À partir de Chamilo 3.0, « coach » a été remplacé par « tuteur » partout dans l’interface et la documentation de la plateforme — un tuteur est une personne qui accompagne les apprenants dans un cours, et non un coach personnel. Les noms de paramètres sous-jacents dans `Configuration settings` contiennent encore « coach » pour des raisons de compatibilité ascendante (par exemple `add_users_by_coach`), mais leurs libellés indiquent désormais « tuteur ».

## Attribution des rôles

Lors de la création ou de la modification d’un compte utilisateur dans le panneau d’administration, vous sélectionnez son rôle au niveau de la plateforme. Les rôles de cours et de session sont attribués lors de l’inscription des utilisateurs aux cours ou aux sessions.

## Hiérarchie des rôles

Les rôles plus privilégiés héritent des capacités des rôles moins privilégiés :

* Un administrateur peut faire tout ce qu’un enseignant peut faire
* Un enseignant peut faire tout ce qu’un étudiant peut faire
* Les rôles au niveau de la session (tuteur) offrent des capacités supplémentaires uniquement au sein de la session qui leur est assignée

## Conseils

* **Appliquez le principe du moindre privilège** — Attribuez aux utilisateurs le rôle minimal dont ils ont besoin pour accomplir leurs tâches
* **Utilisez les administrateurs de sessions pour une gestion déléguée** — Si vous avez des collaborateurs qui doivent gérer des sessions de formation sans administrer l’ensemble de la plateforme, donnez-leur le rôle Administrateur de sessions plutôt qu’un accès administrateur complet
* **Utilisez le RRH pour les superviseurs** — Les responsables des ressources humaines peuvent suivre la progression de la formation sans avoir accès à la modification des cours ou des paramètres de la plateforme
* **Création de rôles** — Chamilo 3.x dispose de la structure interne prête pour la création de nouveaux rôles, mais la fonctionnalité nécessite davantage de tests avant une diffusion large. Elle peut être activée via les [fournisseurs officiels de Chamilo](https://chamilo.org/providers).