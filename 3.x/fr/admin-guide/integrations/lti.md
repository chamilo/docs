# LTI 1.3

**LTI** (Learning Tools Interoperability) est une norme qui permet d'intégrer des outils d'apprentissage externes dans Chamilo. La version 1.3 est la version la plus récente et la plus sécurisée de la norme.

Cet outil est également accessible depuis le bloc [Plateforme](../platform/README.md) du tableau de bord d'administration, sous le libellé **Outils externes (LTI)**.

## Ce que permet LTI

Avec LTI, vous pouvez intégrer des outils externes dans les cours Chamilo. Exemples :

* Simulations interactives
* Outils d'évaluation spécialisés
* Outils de création de contenu
* Laboratoires virtuels
* Bibliothèques de contenus tiers

L'outil externe s'affiche de manière transparente dans l'interface de Chamilo.

## Configuration d'un outil LTI

### En tant qu'administrateur

1. Accédez aux paramètres LTI dans le panneau d'administration
2. **Enregistrez l'outil externe** en fournissant :
   * **Nom de l'outil** — Un nom descriptif
   * **URL de connexion** — L'URL d'initiation de connexion OIDC de l'outil externe
   * **URL de redirection** — L'URL de lancement vers laquelle l'outil revient après la connexion
   * **Identifiant client** — Fourni par l'éditeur de l'outil
   * **URL du jeu de clés publiques (URL JWKS)** — Le point de terminaison JWKS de l'outil pour l'échange de clés de sécurité
3. Configurez le **renvoi des notes** — Indique si l'outil peut renvoyer des notes vers Chamilo
4. Enregistrez

### En tant qu'enseignant

Une fois le plugin **ImsLti** activé, les enseignants disposant des droits de modification du cours peuvent configurer des outils externes dans leur cours :

1. Ouvrez la configuration **Outils externes (LTI)** du cours. Le formulaire propre au cours prend en charge à la fois les intégrations **LTI 1.3** et les intégrations héritées **LTI 1.0/1.1** ; choisissez la version correspondant au fournisseur de l'outil.
2. Ajoutez un outil ou sélectionnez un outil réutilisable mis à disposition par votre administrateur. Pour LTI 1.3, saisissez les informations de lancement et d'authentification du fournisseur ; le formulaire prend en charge une URL de jeu de clés publiques ou une clé RSA, ainsi que les services optionnels Assignment and Grade Services (AGS) et Names and Role Provisioning Services (NRPS).
3. Enregistrez l'outil. Selon sa configuration de liaison profonde (deep linking), Chamilo ajoute le raccourci de cours correspondant. Les outils déjà ajoutés sont affichés séparément des outils globaux disponibles.
4. Pour modifier un outil existant, utilisez son action **Modifier** depuis le même contexte de cours. La configuration vérifie que l'outil appartient au cours ; un outil associé à un autre cours ne peut pas être modifié en fournissant son identifiant.

Le formulaire conserve le contexte du cours lors du retour des actions d'ajout ou de modification et affiche les retours de validation sur la page de configuration.

## Sécurité

LTI 1.3 utilise :

* **OAuth 2.0** pour l'authentification
* **JSON Web Tokens (JWT)** pour la signature des messages
* **Paires de clés publique/privée** pour la vérification

Cela signifie que les identifiants ne sont jamais partagés directement entre Chamilo et l'outil externe.

## Renvoi des notes et évaluations

Les outils LTI peuvent renvoyer des notes vers Chamilo, qui peuvent être intégrées aux **Évaluations** (carnet de notes) du cours. Pour LTI 1.3, configurez l'option **Assignment and Grade Services (AGS)** du fournisseur lors de la création ou de la modification de l'outil externe. Une évaluation doit déjà exister pour le cours si vous souhaitez la lier à une évaluation du carnet de notes.

L'action **Ajouter au carnet de notes** du plugin ouvre la vue moderne du carnet de notes dans le **contexte cours/session en cours**. Elle affiche un formulaire d'évaluation avec une liste déroulante **Outil**, au lieu d'utiliser l'ancien formulaire d'évaluation hérité. Sélectionnez un outil LTI disponible, vérifiez le titre et les valeurs de notation, puis enregistrez.

* Un outil n'est proposé que lorsqu'il est affecté au contexte cours/session en cours et qu'il n'est pas déjà lié à une évaluation du carnet de notes.
* Une évaluation du carnet de notes peut être liée à un outil LTI **lors de la création** de l'évaluation, et non en basculant une évaluation existante vers un autre outil.
* Si aucun outil éligible n'est trouvé, le formulaire ne propose pas un outil sans rapport provenant d'un autre cours.

Consultez [Évaluations](../../teacher-guide/assessing-learners/gradebook.md) pour le flux de notation habituel. Les correctifs relatifs au contexte de cours et à l'intégration du carnet de notes sont suivis dans la [PR #9196](https://github.com/chamilo/chamilo-lms/pull/9196) et la [PR #9197](https://github.com/chamilo/chamilo-lms/pull/9197).

## Conseils

* **Vérifiez la compatibilité de l'outil** — Privilégiez LTI 1.3 pour les nouvelles intégrations ; Chamilo expose également la configuration héritée LTI 1.0/1.1 lorsqu'un outil l'exige.
* **Testez dans un bac à sable** — Testez l'intégration LTI dans un cours de test avant de l'utiliser en production
* **Surveillez les performances** — Les outils externes ajoutent des dépendances réseau. Assurez-vous que l'outil est réactif et fiable.