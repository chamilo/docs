# Tuteur IA

Le tuteur IA est un chatbot intégré à Chamilo avec lequel les apprenants peuvent interagir pour obtenir des réponses instantanées générées par l’IA. Il fonctionne dans deux contextes, avec un objectif différent dans chacun :

* **À l’intérieur d’un cours** — le tuteur IA se concentre sur ce cours : il répond aux questions sur son contenu, explique les concepts abordés et guide les apprenants dans le matériel.
* **En dehors d’un cours** (sur la plateforme générale) — le tuteur IA traite plutôt des questions génériques d’utilisation de la plateforme, par exemple comment trouver quelque chose ou utiliser une fonctionnalité, plutôt que le contenu des cours.

## Fonctionnement

Lorsque le tuteur IA est activé pour un cours, les apprenants voient une interface de discussion dans laquelle ils peuvent :

* **Poser des questions** sur le contenu du cours
* **Obtenir des explications** des concepts abordés dans le cours
* **Recevoir des conseils** sans attendre la réponse de l’enseignant

À l’intérieur d’un cours, le tuteur IA utilise le contexte de ce cours pour fournir des réponses pertinentes. Il est conçu pour compléter votre enseignement, non pour le remplacer.

## Activation du tuteur IA

Le tuteur IA nécessite deux niveaux de configuration :

1. **Niveau plateforme** — L’administrateur doit activer les assistants IA et configurer au moins un fournisseur d’IA (voir [Configuration de l’IA](../../admin-guide/integrations/ai-configuration.md))
2. **Niveau cours** — Le tuteur IA doit être activé dans les paramètres du cours (un simple interrupteur marche/arrêt). Le fournisseur utilisé pour le chat est celui configuré par l’administrateur.

## L’interface de discussion

![L’interface de discussion du tuteur IA montrant une conversation entre un apprenant et l’IA](/.gitbook/assets/ai-tutor-chat.png)

Le tuteur IA apparaît sous la forme d’un **panneau de discussion ancré** dans le cours. Les apprenants peuvent :

* Saisir des messages et recevoir des réponses générées par l’IA
* Consulter l’historique de leur conversation
* Réinitialiser la conversation pour recommencer à zéro

L’interface de discussion affiche l’échange entre l’apprenant et l’IA dans un format de messagerie familier.

## Comportement important

* **Limité au lieu d’ouverture** — À l’intérieur d’un cours, le tuteur IA ne répond que sur ce cours ; ouvert en dehors de tout cours, il bascule vers des questions générales d’utilisation de la plateforme. Le mode plateforme (hors cours) est un interrupteur distinct que votre administrateur contrôle indépendamment de celui par cours.
* **Désactivé pendant les examens** — Le tuteur IA est automatiquement désactivé lorsqu’un apprenant passe un exercice, afin d’éviter la triche
* **Conversation par apprenant** — Chaque apprenant a sa propre conversation privée avec le tuteur IA, et le contexte du prompt n’inclut que les messages les plus récents
* **Basculement de fournisseur** — Si le fournisseur configuré échoue, Chamilo bascule vers un autre fournisseur disponible afin que le chat continue de fonctionner

## En tant qu’enseignant

Vous devez savoir que :

* Le tuteur IA ne donne pas toujours des réponses parfaites — encouragez les apprenants à vérifier les informations importantes
* Vous pouvez consulter l’utilisation du tuteur IA via le suivi de la plateforme
* Le tuteur IA est un complément à votre enseignement, non un substitut. Utilisez-le en parallèle des forums, des annonces et de la messagerie directe pour un accompagnement complet des apprenants.

## Conseils

* **Fixez les attentes** — Indiquez aux apprenants dès le début du cours qu’un tuteur IA est disponible et expliquez comment l’utiliser de manière appropriée
* **Encouragez l’esprit critique** — Rappelez aux apprenants de réfléchir de manière critique aux réponses générées par l’IA
* **Utilisez-le pour les questions fréquentes** — Le tuteur IA est particulièrement utile pour traiter les questions courantes auxquelles vous répondriez autrement de façon répétée