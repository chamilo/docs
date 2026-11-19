# Gestion des compétences

Cette page présente les trois entrées du tableau de bord utilisées pour constituer le catalogue de compétences de la plateforme : l'importation de compétences en masse, la gestion des définitions de compétences elles-mêmes, et l'affectation de chaque compétence à une échelle de niveaux.

## Importation des compétences

**Compétences > Importation des compétences** permet de créer en masse une hiérarchie de compétences à partir d'un fichier CSV ou XML, au lieu de créer les compétences une par une. Chaque ligne doit contenir au minimum un `id`, un `parent_id` (pour construire l'arbre) et un `title`. Un modèle d'exemple est disponible pour servir de base à votre fichier.

## Gérer les compétences

**Compétences > Gérer les compétences** est le catalogue principal des compétences : créer, modifier, activer/désactiver et supprimer des compétences. Chaque compétence possède un titre, un code court, une description, une icône et une description facultative des critères (ce qu'un apprenant doit accomplir pour l'obtenir). Les compétences peuvent être imbriquées — une compétence peut avoir des compétences enfants — ce que visualise la [Roue des compétences](skills-wheel.md).

### Compétences acquérables et compétences structurelles

Lors de la création ou de la modification d'une compétence, utilisez **Acquérable** pour indiquer si les apprenants peuvent réellement l'obtenir. Cette option est activée par défaut. Désactivez-la pour une catégorie parente ou organisationnelle qui n'existe que pour regrouper d'autres compétences : une telle compétence reste dans la hiérarchie, mais ne peut pas être attribuée par affectation manuelle, ni par les flux Exercice, Parcours d'apprentissage ou Cahier de notes. Les relations de compétences existantes et leur historique sont conservés. Ce comportement a été ajouté dans la [PR #9206](https://github.com/chamilo/chamilo-lms/pull/9206) (issue #8179).

## Affectation manuelle des compétences

Lorsque l'affectation manuelle des compétences est disponible pour votre rôle, ouvrez **Attribuer une compétence** pour l'utilisateur, sélectionnez la **Compétence**, choisissez un **Niveau acquis** lorsque des niveaux sont utilisés, et fournissez l'**Argumentation** requise expliquant pourquoi la compétence est attribuée.

Lorsque **Affectation de compétences à l'utilisateur : chargement automatique des sous-compétences** (`manual_assignment_subskill_autoload`) est activé, la liste **Compétence** n'affiche que les compétences du premier niveau de l'arbre. La sélection de l'une d'elles affiche une deuxième liste avec ses sous-compétences, puis une troisième, et ainsi de suite. Arrêtez-vous au niveau de la compétence que vous souhaitez attribuer et laissez la liste suivante vide ; pour remonter d'un niveau, videz la liste. Une compétence qui n'est pas **Acquérable** peut être sélectionnée pour atteindre ses sous-compétences, mais le formulaire indique qu'elle ne peut pas être acquise et ne permet pas de l'enregistrer.

Pour une affectation manuelle existante qui peut être retirée, sélectionnez la compétence et cliquez sur **Retirer**, puis confirmez l'action. Les affectations retirées ne comptent plus comme des compétences acquises. Les affectations dont la source n'autorise pas le retrait manuel n'exposent pas cette action.

Depuis les détails de rapport d'un apprenant, un utilisateur autorisé peut suivre le **badge/lien de compétence** vers les détails de l'affectation, puis utiliser l'action de retrait existante lorsque la compétence a été attribuée manuellement. L'historique des affectations reste disponible après le retrait et la réaffectation ; retirer une compétence n'efface pas sa piste d'audit. Revenez au rapport de l'apprenant à l'aide du lien de navigation disponible.

## Gérer les niveaux de compétences

**Compétences > Gérer les niveaux de compétences** est un écran distinct, plus restreint : il liste les compétences existantes et permet d'affecter chacune à un **profil de niveaux** — un ensemble nommé et ordonné de niveaux (par exemple Bronze/Argent/Or) par rapport auquel la compétence est mesurée. En résumé : utilisez **Gérer les compétences** pour définir ce qu'*est* une compétence, et **Gérer les niveaux de compétences** pour définir l'échelle sur laquelle elle est mesurée.

### Descriptions des niveaux et profils disponibles

Les niveaux individuels d'un profil de niveaux disposent désormais d'un champ **Description**, modifiable depuis **Gérer les niveaux de compétences** en plus du titre du niveau et du titre court. Les jeux de données de niveaux de compétences fournis définissent des échelles d'exemple avec des descriptions pour le **CECR**, le **modèle de Dreyfus**, la **taxonomie de Bloom** et **SFIA**. Sur une installation existante, les profils présents dépendent de l'état des jeux de données et de la mise à niveau ; ne supposez pas que l'ajout du champ crée ou remplace automatiquement les profils existants.

## Comment les compétences sont attribuées

Une compétence est attribuée à un utilisateur (enregistrée comme une compétence délivrée, avec une date) par l'un des chemins suivants :

* Automatiquement, lorsqu'un apprenant atteint le seuil d'une catégorie du cahier de notes — configuré sur la page [Compétences et évaluations](skills-assessments.md)
* Automatiquement, à l'achèvement de cours spécifiques auxquels la compétence est liée
* Manuellement, par un enseignant (si **Les enseignants peuvent attribuer des compétences** est activé) ou un administrateur