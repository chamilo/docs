# Tickets d'assistance

L'outil **Tickets** est un système d'assistance intégré qui permet aux utilisateurs de soumettre des demandes d'assistance et de suivre leur résolution. Selon la configuration de votre plateforme, vous pouvez l'utiliser en tant que **demandeur** (soumettre des tickets pour vous-même ou pour vos apprenants) ou en tant qu'**agent d'assistance** (répondre aux tickets assignés à votre catégorie).

## Organisation du système

Les tickets appartiennent à des **projets**, eux-mêmes subdivisés en **catégories**. Chaque catégorie peut se voir assigner un ou plusieurs agents d'assistance. Lorsqu'un ticket est soumis, il est automatiquement acheminé vers un agent disponible dans la catégorie sélectionnée.

Les catégories par défaut sont les suivantes :

| Catégorie | Description |
|----------|-------------|
| Inscription | Questions et problèmes relatifs à l'inscription à un cours ou à une session |
| Informations générales | Questions générales sur la plateforme |
| Demandes et formalités | Demandes administratives et documentation |
| Incidents académiques | Problèmes liés aux examens, aux devoirs ou aux tâches |
| Campus virtuel | Problèmes techniques liés à la plateforme |
| Évaluation en ligne | Problèmes liés à une évaluation spécifique d'un cours (nécessite la sélection d'un cours) |

## Accéder à l'outil Tickets

Si votre administrateur a activé le lien vers les tickets, une icône de ticket <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line"> apparaît dans la barre de navigation supérieure. Cliquez dessus pour accéder directement au formulaire de soumission d'un ticket.

Vous pouvez également accéder à vos tickets depuis le menu principal, sous **Assistance** ou **Tickets**, selon la configuration de votre plateforme.

## Soumettre un ticket

Pour ouvrir une nouvelle demande d'assistance :

1. Cliquez sur **Nouveau ticket** (ou sur l'icône de ticket dans la barre supérieure).
2. Sélectionnez la **catégorie** qui correspond le mieux à votre problème.
3. Si la catégorie l'exige (par exemple, Évaluation en ligne), sélectionnez le **cours** concerné.
4. Saisissez un **objet** — un bref résumé du problème.
5. Rédigez votre **message** en décrivant le problème en détail.
6. Joignez éventuellement des fichiers (captures d'écran, documents) pour aider l'agent d'assistance à comprendre le problème.
7. Cliquez sur **Soumettre**.

Le ticket reçoit un identifiant et est acheminé vers un agent d'assistance. Vous recevrez une notification lorsque l'agent répondra.

## Suivre vos tickets

Depuis la liste des tickets, vous pouvez consulter tous les tickets que vous avez soumis ainsi que leur statut actuel :

| Statut | Signification |
|--------|---------|
| Nouveau | Vient d'être soumis, pas encore examiné |
| En attente | En cours d'examen par un agent d'assistance |
| Non confirmé | En attente de confirmation ou d'informations complémentaires |
| Transféré | Transmis à une autre équipe ou à un autre agent |
| Fermé | Résolu |

Cliquez sur un ticket pour lire l'intégralité du fil de conversation et ajouter une réponse.

## Identifier le créateur du ticket

Le détail du ticket affiche désormais le **nom complet** et le **nom d'utilisateur** du créateur (lorsqu'ils sont disponibles), ainsi que ses **rôles**. Le nom d'utilisateur permet de distinguer des personnes portant des noms similaires, tandis que les libellés de rôle (par exemple, Apprenant, Enseignant ou Administrateur) apportent un contexte à la demande d'assistance. Le nom du créateur peut renvoyer vers son profil lorsqu'une URL de profil est disponible.

Ces informations sont affichées dans la vue du ticket ; elles n'accordent pas de permissions supplémentaires et ne modifient pas la propriété du ticket. Voir [PR #9403](https://github.com/chamilo/chamilo-lms/pull/9403).

## Répondre à un ticket

Une fois un ticket ouvert, vous et l'agent d'assistance échangez des messages au sein du même fil. Pour ajouter une réponse :

1. Ouvrez le ticket depuis votre liste.
2. Faites défiler jusqu'au champ de réponse en bas de page.
3. Rédigez votre réponse et joignez des fichiers si nécessaire.
4. Cliquez sur **Envoyer**.

Les deux parties reçoivent des notifications lorsqu'un nouveau message est ajouté au fil.

## Traiter les tickets en tant qu'agent d'assistance

Si votre administrateur vous a assigné à une ou plusieurs catégories de tickets, vous verrez dans votre file d'attente les tickets entrants provenant d'apprenants ou de collègues.

Pour répondre à un ticket qui vous a été assigné :

1. Ouvrez votre liste de tickets — les tickets assignés apparaissent aux côtés des tickets que vous avez soumis.
2. Cliquez sur un ticket pour lire le message du demandeur.
3. Rédigez une réponse et cliquez sur **Envoyer**. Le statut du ticket est mis à jour automatiquement.
4. Lorsque le problème est résolu, passez le statut à **Fermé**.

Vous pouvez également modifier la **priorité** d'un ticket (Faible, Normale, Élevée) afin de faciliter le tri de votre file d'attente.

> L'accès aux catégories de tickets est contrôlé par l'administrateur de la plateforme. Si vous devez être ajouté en tant qu'agent d'assistance pour une catégorie, contactez votre administrateur. Consultez les [Paramètres des tickets](../admin-guide/platform-settings/ticket-settings.md) du Guide administrateur pour les options de configuration.