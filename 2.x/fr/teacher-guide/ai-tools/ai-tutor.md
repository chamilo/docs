# Tuteur IA

Le Tuteur IA est un chatbot intégré à Chamilo avec lequel les apprenants peuvent interagir pour poser des questions relatives au cours. Il fournit des réponses instantanées et contextuelles grâce à un modèle de langage avancé.

## Fonctionnement

Lorsque le Tuteur IA est activé pour un cours, les apprenants voient une interface de chat où ils peuvent :

* **Poser des questions** sur le contenu du cours
* **Obtenir des explications** sur les concepts abordés dans le cours
* **Recevoir des conseils** sans attendre la réponse de l’enseignant

Le Tuteur IA utilise le contexte du cours pour fournir des réponses pertinentes. Il est conçu pour compléter votre enseignement, et non pour le remplacer.

## Activation du Tuteur IA

Le Tuteur IA nécessite deux niveaux de configuration :

1. **Niveau plateforme** — L’administrateur doit activer les assistants IA et configurer au moins un fournisseur d’IA (voir [Configuration IA](../../admin-guide/integrations/ai-configuration.md))
2. **Niveau cours** — Le Tuteur IA doit être activé dans les paramètres du cours (un simple interrupteur marche/arrêt). Le fournisseur utilisé pour le chat est celui configuré par l’administrateur.

## Interface de Chat

![Interface de chat du Tuteur IA montrant une conversation entre un apprenant et l’IA](/.gitbook/assets/ai-tutor-chat.png)

Le Tuteur IA apparaît sous la forme d’un **panneau de chat ancré** au sein du cours. Les apprenants peuvent :

* Saisir des messages et recevoir des réponses générées par l’IA
* Consulter l’historique de leurs conversations
* Réinitialiser la conversation pour repartir de zéro

L’interface de chat affiche les échanges entre l’apprenant et l’IA dans un format de messagerie familier.

## Comportements Importants

* **Contexte du cours uniquement** — Le Tuteur IA n’est disponible qu’à l’intérieur d’un cours, et non sur la plateforme générale
* **Désactivé pendant les examens** — Le Tuteur IA est automatiquement désactivé lorsqu’un apprenant passe un exercice, afin d’éviter la triche
* **Conversation par apprenant** — Chaque apprenant a sa propre conversation privée avec le Tuteur IA, et le contexte de la requête ne comprend que les messages les plus récents
* **Basculement de fournisseur** — Si le fournisseur configuré échoue, Chamilo bascule sur un autre fournisseur disponible pour que le chat continue de fonctionner

## En Tant qu’Enseignant

Vous devez savoir que :

* Le Tuteur IA peut ne pas toujours donner des réponses parfaites — encouragez les apprenants à vérifier les informations importantes
* Vous pouvez consulter l’utilisation du Tuteur IA via le suivi de la plateforme
* Le Tuteur IA est un complément à votre enseignement, et non un substitut. Utilisez-le en parallèle des forums, des annonces et de la messagerie directe pour un soutien complet aux apprenants.

## Conseils

* **Définir des attentes** — Informez les apprenants dès le début du cours qu’un Tuteur IA est disponible et expliquez comment l’utiliser de manière appropriée
* **Encourager la pensée critique** — Rappelez aux apprenants de réfléchir de manière critique aux réponses générées par l’IA
* **Utiliser pour les questions fréquentes** — Le Tuteur IA est particulièrement utile pour répondre aux questions courantes que vous devriez autrement traiter de manière répétitive