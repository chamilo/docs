# Rôles utilisateur

Chamilo utilise un système de permissions basé sur les rôles. Chaque utilisateur se voit attribuer un rôle qui détermine ce qu'il peut voir et faire sur la plateforme.

## Rôles au niveau de la plateforme

Ces rôles contrôlent l'accès aux fonctionnalités à l'échelle de la plateforme :

| Rôle |  Description |
|------|------------|
| **Apprenant (Étudiant)** | Le rôle par défaut. Peut s'inscrire à des cours, accéder aux contenus pédagogiques, remettre des travaux et passer des exercices. |
| **Enseignant (Formateur)** | Peut créer et gérer des cours, ajouter du contenu, noter les étudiants et consulter les rapports au niveau du cours. |
| **Administrateur de sessions** | Peut créer et gérer des sessions (c'est-à-dire des ensembles de cours limités dans le temps), inscrire des utilisateurs aux sessions et attribuer des tuteurs. Ne peut pas accéder aux paramètres généraux de la plateforme. |
| **Responsable des ressources humaines (HRM)** | Peut consulter les données de suivi et de reporting des utilisateurs qui lui sont assignés. Utilisé pour les superviseurs qui doivent suivre la formation des employés sans gérer le contenu ni la plateforme. |
| **Administrateur du portail** | Accès complet à toutes les fonctionnalités d'administration de la plateforme. Peut gérer les utilisateurs, les cours, les sessions, les plugins et tous les paramètres. |
| **Administrateur global** | Identique à l'administrateur du portail, mais avec un accès à toutes les URL d'accès dans une configuration multi-URL (c'est-à-dire multi-locataire) — ou, s'il est enregistré sur une URL non racine, limité à la seule branche de cette URL. Voir [Administrateurs de sous-arbre](../multi-url/access-urls.md#subtree-administrators). |
| **Anonyme** | Rôle spécial pour les visiteurs non connectés. Peut accéder aux cours et contenus publics si cette option est activée. |

## Rôles au niveau du cours

Au sein d'un cours, les utilisateurs ont des rôles spécifiques :

| Rôle | Description |
|------|-------------|
| **Étudiant** | Rôle de cours par défaut. Peut accéder au contenu, passer des exercices et remettre des travaux. |
| **Assistant de cours** | Dispose de permissions de gestion limitées au sein du cours. Peut aider à gérer le contenu et modérer les forums. |
| **Enseignant** | Contrôle total du cours : gestion du contenu, des outils, des paramètres et des inscriptions. |

## Rôles au niveau de la session

Au sein d'une session, des rôles supplémentaires existent :

| Rôle | Description |
|------|-------------|
| **Tuteur de session** | Supervise tous les cours d'une session. Peut consulter le suivi de tous les cours de la session. |
| **Tuteur de cours** | Enseigne un cours spécifique au sein d'une session. Peut gérer le contenu et suivre les apprenants pour ce cours dans cette session. |

Remarque : ce rôle s'appelait « coach » dans les versions de Chamilo antérieures à la 3.0. Depuis Chamilo 3.0, « coach » a été remplacé par « tuteur » partout dans l'interface et la documentation de la plateforme — un tuteur est une personne qui accompagne les apprenants tout au long d'un cours, et non un coach personnel. Les noms de paramètres sous-jacents dans `Configuration settings` contiennent toujours « coach » pour des raisons de rétrocompatibilité (par exemple `add_users_by_coach`), mais leurs libellés indiquent désormais « tuteur ».

## Terminologie HRM et compatibilité

Chamilo 3.x utilise **HRM** (Human Resources Manager) à la place de l'ancienne désignation **DRH**. Les relations RH et les affectations de session existantes conservent leurs valeurs enregistrées ; ce changement ne crée pas un rôle différent et n'exige pas de réaffecter les utilisateurs. Certaines intégrations et entrées de configuration plus anciennes peuvent encore utiliser `DRH` ou `ROLE_DRH` ; le rôle actuel est `ROLE_HR`, avec une prise en charge de la compatibilité pour les références héritées.

Pour une nouvelle configuration, utilisez `HRM` dans les paramètres indexés par rôle, tels que `registration.redirect_after_login` et `security.mcp_allowed_roles`. L'ancienne clé `DRH` reste acceptée pour les configurations existantes, mais `HRM` a la priorité lorsque les deux clés sont fournies. Les paramètres canoniques de la plateforme sont `registration.hrm_autosubscribe`, `session.hrm_can_access_all_session_content` et `workflows.hrm_allow_access_to_all_students` ; les anciennes clés `drh_*` restent reconnues pour des raisons de compatibilité.

Voir [Paramètres d'inscription](../platform-settings/registration-settings.md), [Paramètres de session](../platform-settings/session-settings.md) et [Paramètres des workflows](../platform-settings/workflows-settings.md) pour les détails de configuration.

## Attribution des rôles

Lors de la création ou de la modification d'un compte utilisateur dans le panneau d'administration, vous sélectionnez son rôle au niveau de la plateforme. Les rôles de cours et de session sont attribués lors de l'inscription des utilisateurs aux cours ou aux sessions.

## Hiérarchie des rôles

Les rôles à privilèges plus élevés héritent des capacités des rôles à privilèges moindres :

* Un administrateur peut faire tout ce qu'un enseignant peut faire
* Un enseignant peut faire tout ce qu'un étudiant peut faire
* Les rôles au niveau de la session (tuteur) offrent des capacités supplémentaires uniquement au sein de la session qui leur est assignée

## Conseils

* **Appliquez le principe du moindre privilège** — Attribuez aux utilisateurs le rôle minimal dont ils ont besoin pour accomplir leurs tâches
* **Utilisez les administrateurs de sessions** pour la gestion déléguée — Si vous disposez de personnel qui doit gérer des sessions de formation, mais pas l'ensemble de la plateforme, attribuez-leur le rôle d'administrateur de sessions plutôt qu'un accès administrateur complet
* **Utilisez le rôle HRM pour les superviseurs** — Les responsables des ressources humaines peuvent suivre la progression des formations sans avoir accès à la modification des cours ni des paramètres de la plateforme
* **Création de rôles** — Chamilo 3.x dispose de la structure interne nécessaire à la création de nouveaux rôles, mais la fonctionnalité doit encore faire l'objet de tests supplémentaires avant une diffusion large. Elle peut être activée par l'intermédiaire des [fournisseurs officiels de Chamilo](https://chamilo.org/providers).