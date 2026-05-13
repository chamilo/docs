---
# xAPI

**xAPI** (Experience API, également connu sous le nom de Tin Can API) est une norme pour le suivi des expériences d'apprentissage. Chamilo peut à la fois générer et consommer des déclarations xAPI.

## Fonctionnement de xAPI

xAPI suit les activités d'apprentissage sous forme de **déclarations** au format : « Acteur a effectué Verbe sur Objet ». Par exemple :

* « Jane a complété le Module 1 »
* « John a obtenu 85 % à l'examen final »
* « Maria a regardé la vidéo d'introduction »

Ces déclarations sont stockées dans un **Learning Record Store (LRS)**, fournissant un enregistrement complet des activités d'apprentissage.

## Configuration

1. Dans les paramètres de la plateforme, configurez le **point de terminaison LRS** :
   * **URL LRS** — L'adresse de votre Learning Record Store
   * **Authentification LRS** — Identifiants pour envoyer des données au LRS
2. Activez le suivi xAPI pour les activités souhaitées

## Ce que Chamilo suit via xAPI

Chamilo peut générer des déclarations xAPI pour :

* L'accès et la complétion des cours
* Les tentatives et scores aux exercices
* La progression dans les éléments du parcours d'apprentissage
* Les éléments du portfolio

D'autres outils (comme les Documents et les Forums) ne sont actuellement pas émis sous forme d'événements xAPI par le plugin.

## Cas d'utilisation

* **Suivi multiplateforme** — Suivre les activités d'apprentissage à travers plusieurs outils et plateformes dans un seul LRS
* **Analyse avancée** — Utiliser les outils d'analyse LRS pour générer des insights allant au-delà des rapports intégrés de Chamilo
* **Rapports de conformité** — Générer des pistes d'audit de la complétion des formations pour répondre aux exigences réglementaires