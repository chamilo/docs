# Vérificateur de robustesse des mots de passe

Le vérificateur de robustesse des mots de passe compare les hachages de mots de passe stockés des utilisateurs actifs à une courte liste de mots de passe couramment utilisés (`123456`, `password`, `qwerty123`, et similaires). Il n’affiche ni ne transmet jamais les mots de passe eux-mêmes — uniquement si le mot de passe actuel d’un utilisateur correspond à l’un des candidats connus comme faibles.

## Accéder au vérificateur de robustesse des mots de passe

Depuis le panneau d’administration, cliquez sur **Sécurité > Vérificateur de robustesse des mots de passe**.

## Lancer une analyse

![La page du vérificateur de robustesse des mots de passe, avec un champ pour les identifiants d’utilisateurs à analyser et un bouton pour lancer l’analyse](/.gitbook/assets/admin-security-password-strength.png)

* Laissez **Identifiants d’utilisateurs à analyser** vide pour analyser tous les utilisateurs actifs, ou saisissez une liste d’identifiants d’utilisateurs séparés par des virgules pour vérifier un sous-ensemble
* Cliquez sur **Lancer l’analyse de robustesse des mots de passe**

L’analyse s’exécute de manière asynchrone en arrière-plan afin de ne pas figer la page, et affiche la progression en direct (utilisateurs vérifiés jusqu’à présent, sur le total, et nombre de mots de passe faibles trouvés). Comme chaque mot de passe candidat doit être comparé au hachage de chaque utilisateur sélectionné, l’analyse de tous les utilisateurs sur une grande plateforme peut prendre un certain temps — la liste des candidats est volontairement courte afin de limiter ce coût.

## Agir sur les résultats

![Les résultats de l’analyse terminée, listant un utilisateur signalé avec les colonnes Nom, Nom d’utilisateur et E-mail, et des actions par ligne pour demander un changement de mot de passe ou forcer une réinitialisation de mot de passe](/.gitbook/assets/admin-security-password-strength-results.png)

Une fois l’analyse terminée, les utilisateurs signalés sont listés avec deux actions disponibles, soit par utilisateur, soit en action groupée pour tous les utilisateurs sélectionnés :

* **Demander un changement de mot de passe** (icône d’enveloppe) — Envoie à l’utilisateur un e-mail lui demandant de changer son mot de passe
* **Forcer la réinitialisation du mot de passe** (icône de réinitialisation) — Invalide immédiatement le mot de passe actuel de l’utilisateur et lui envoie par e-mail un nouveau mot de passe

Les deux actions revérifient les utilisateurs sélectionnés par rapport à la liste des mots de passe faibles avant d’agir, de sorte qu’une requête obsolète ou altérée ne puisse pas servir à réinitialiser un compte qui n’a plus de mot de passe faible.

## Utilisation recommandée

* Exécutez cette analyse périodiquement, en particulier après une importation groupée d’utilisateurs (les comptes importés sont parfois livrés avec des mots de passe par défaut simples)
* Associez-la aux paramètres **Exigences minimales de syntaxe des mots de passe** et **Intervalle de rotation des mots de passe** dans [Paramètres de sécurité](../platform-settings/security-settings.md) afin d’empêcher la définition de mots de passe faibles dès le départ, plutôt que de seulement les détecter après coup