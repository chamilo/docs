# LTI 1.3

**LTI** (Learning Tools Interoperability) est une norme qui permet d’intégrer des outils d’apprentissage externes dans Chamilo. La version 1.3 est la plus récente et la plus sécurisée de cette norme.

Cet outil est également accessible depuis le bloc [Plateforme](../platform/README.md) du tableau de bord d’administration, sous **Outils externes (LTI)**.

## Ce que permet LTI

Avec LTI, vous pouvez intégrer des outils externes dans les cours Chamilo. Exemples :

* Simulations interactives
* Outils d’évaluation spécialisés
* Outils de création de contenus
* Laboratoires virtuels
* Bibliothèques de contenus tiers

L’outil externe s’affiche de manière transparente dans l’interface Chamilo.

## Configuration d’un outil LTI

### En tant qu’administrateur

1. Accédez aux paramètres LTI dans le panneau d’administration
2. **Enregistrez l’outil externe** en indiquant :
   * **Nom de l’outil** — Un nom descriptif
   * **URL de connexion** — L’URL d’initiation de connexion OIDC de l’outil externe
   * **URL de redirection** — L’URL de lancement vers laquelle l’outil revient après la connexion
   * **Client ID** — Fourni par l’éditeur de l’outil
   * **URL du jeu de clés publiques (JWKS URL)** — Le point de terminaison JWKS de l’outil pour l’échange des clés de sécurité
3. Configurez le **renvoi des notes** — Indiquez si l’outil peut renvoyer des notes vers Chamilo
4. Enregistrez

### En tant qu’enseignant

Une fois qu’un outil LTI a été enregistré par l’administrateur, les enseignants peuvent l’ajouter à leurs cours :

1. Dans le cours, recherchez l’option d’ajout d’un outil externe
2. Sélectionnez parmi les outils LTI enregistrés
3. L’outil apparaît comme un outil de cours sur la page d’accueil

## Sécurité

LTI 1.3 utilise :

* **OAuth 2.0** pour l’authentification
* **JSON Web Tokens (JWT)** pour la signature des messages
* **Paires de clés publique/privée** pour la vérification

Cela signifie que les identifiants ne sont jamais partagés directement entre Chamilo et l’outil externe.

## Renvoi des notes

Les outils LTI peuvent renvoyer des notes vers Chamilo, qui peuvent être intégrées au carnet de notes du cours. Cette fonctionnalité se configure par outil lors de l’enregistrement.

## Conseils

* **Vérifiez la compatibilité de l’outil** — Assurez-vous que l’outil externe prend en charge LTI 1.3 (et pas seulement les versions antérieures)
* **Testez dans un bac à sable** — Testez l’intégration LTI dans un cours de test avant de l’utiliser en production
* **Surveillez les performances** — Les outils externes ajoutent des dépendances réseau. Assurez-vous que l’outil est réactif et fiable.