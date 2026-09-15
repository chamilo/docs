# Gestion des compétences

Cette page décrit les trois entrées du tableau de bord utilisées pour constituer le catalogue de compétences de la plateforme : l’importation de compétences en masse, la gestion des définitions de compétences elles-mêmes, et l’affectation de chaque compétence à une échelle de niveaux.

## Skills Import

**Skills > Skills import** permet de créer en masse une hiérarchie de compétences à partir d’un fichier CSV ou XML, au lieu de créer les compétences une par une. Chaque ligne doit au minimum contenir un `id`, un `parent_id` (pour construire l’arbre) et un `title`. Un modèle d’exemple est disponible pour servir de base à votre fichier.

## Manage Skills

**Skills > Manage skills** constitue le catalogue principal des compétences : création, modification, activation/désactivation et suppression. Chaque compétence possède un titre, un code court, une description, une icône et, éventuellement, une description des critères (ce qu’un apprenant doit accomplir pour l’obtenir). Les compétences peuvent être imbriquées — une compétence peut avoir des compétences enfants — ce que visualise la [roue des compétences](skills-wheel.md).

## Manage Skills Levels

**Skills > Manage skills levels** est un écran distinct, plus réduit : il dresse la liste des compétences existantes et permet d’affecter chacune à un **profil de niveaux** — un ensemble nommé et ordonné de niveaux (par exemple Bronze/Argent/Or) par rapport auquel la compétence est mesurée. En résumé : utilisez **Manage skills** pour définir ce qu’*est* une compétence, et **Manage skills levels** pour définir l’échelle sur laquelle elle est mesurée.

## Comment les compétences sont attribuées

Une compétence est attribuée à un utilisateur (enregistrée comme compétence délivrée, avec une date) selon l’un des chemins suivants :

* Automatiquement, lorsqu’un apprenant atteint le seuil d’une catégorie du carnet de notes — configuré sur la page [Compétences et évaluations](skills-assessments.md)
* Automatiquement, à l’achèvement de cours spécifiques auxquels la compétence est liée
* Manuellement, par un enseignant (si **Teachers can assign skills** est activé) ou par un administrateur