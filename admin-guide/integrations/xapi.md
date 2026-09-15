# xAPI

**xAPI** (Experience API, également connue sous le nom de Tin Can API) est une norme de suivi des expériences d’apprentissage. Chamilo peut à la fois générer et consommer des énoncés xAPI.

## Rôle de xAPI

xAPI suit les activités d’apprentissage sous forme d’**énoncés** au format : « L’acteur a effectué le verbe sur l’objet. » Par exemple :

* « Jane a terminé le module 1 »
* « John a obtenu 85 % à l’examen final »
* « Maria a regardé la vidéo d’introduction »

Ces énoncés sont stockés dans un **Learning Record Store (LRS)**, offrant un enregistrement exhaustif de l’activité d’apprentissage.

## Configuration

1. Dans les paramètres de la plateforme, configurez le **point de terminaison LRS** :
   * **LRS URL** — L’adresse de votre Learning Record Store
   * **LRS authentication** — Identifiants pour l’envoi des données vers le LRS
2. Activez le suivi xAPI pour les activités souhaitées

## Ce que Chamilo suit via xAPI

Chamilo peut générer des énoncés xAPI pour :

* L’accès aux cours et leur achèvement
* Les tentatives d’exercices et les scores
* La progression des éléments de parcours d’apprentissage
* Les éléments de portfolio

D’autres outils (tels que Documents et Forums) ne sont actuellement pas émis comme événements xAPI par le plugin.

## Cas d’usage

* **Suivi inter-plateformes** — Suivre l’activité d’apprentissage à travers plusieurs outils et plateformes dans un seul LRS
* **Analytique avancée** — Utiliser les outils d’analytique du LRS pour produire des insights allant au-delà des rapports intégrés de Chamilo
* **Rapports de conformité** — Générer des pistes d’audit de l’achèvement des formations pour les exigences réglementaires