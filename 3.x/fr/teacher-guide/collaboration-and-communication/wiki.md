# Wiki

L'outil wiki vous permet, ainsi qu'à vos apprenants, de créer et de modifier collaborativement des pages web au sein du cours. Il est utile pour les projets de groupe, les bases de connaissances partagées et les exercices d'écriture collaborative.

## Fonctionnement du wiki

Un wiki est un ensemble de pages web interconnectées que toute personne disposant des autorisations peut modifier. Dans Chamilo :

* Chaque cours dispose de son propre wiki
* Les pages peuvent être reliées entre elles à l'aide de liens de type wiki
* Toutes les modifications sont suivies grâce à un historique des révisions
* Les versions précédentes peuvent être comparées et restaurées

## Création d'une page wiki

1. Ouvrez l'outil **Wiki** depuis la page d'accueil du cours
2. Cliquez sur **Ajouter une nouvelle page**
3. Saisissez un **titre de page**
4. Rédigez le contenu de la page à l'aide de l'éditeur de texte enrichi
5. Enregistrez

Pour créer un lien vers une autre page wiki depuis l'éditeur, créez un lien en utilisant le titre de la page cible.

## Modification des pages

Toute personne disposant des droits de modification peut modifier une page wiki :

1. Ouvrez la page que vous souhaitez modifier
2. Cliquez sur le bouton **Modifier** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Modifier" data-size="line">
3. Apportez vos modifications dans l'éditeur
4. Ajoutez éventuellement une entrée **Commentaires** décrivant ce que vous avez modifié
5. Enregistrez

## Édition collaborative avec Etherpad (facultatif)

Lorsqu'un administrateur active l'intégration Etherpad, la modification d'une page Wiki **existante** ouvre un éditeur Etherpad partagé au lieu du champ de texte enrichi habituel. Plusieurs collaborateurs autorisés peuvent travailler simultanément sur la même page.

1. Ouvrez une page Wiki et sélectionnez **Modifier**.
2. Travaillez ensemble dans l'éditeur collaboratif intégré. Vos collaborateurs doivent également disposer de l'autorisation de modifier cette page Wiki.
3. Sélectionnez **Enregistrer** dans Chamilo pour créer une nouvelle révision Wiki à partir du contenu Etherpad actuel.
4. Utilisez l'**Historique des révisions** du Wiki pour comparer ou restaurer les versions enregistrées précédentes.

Les modifications effectuées dans Etherpad ne créent pas automatiquement des révisions Chamilo individuelles. **Enregistrer** constitue l'étape explicite de capture instantanée. L'administrateur doit exposer Etherpad sur la **même origine que Chamilo** (par exemple via un chemin de proxy inverse) afin de prendre en charge des sessions intégrées sécurisées. L'éditeur Wiki ordinaire reste disponible lorsque l'intégration est désactivée. La création d'une nouvelle page utilise le formulaire habituel tant que la page n'est pas associée à un pad collaboratif.

Un administrateur configure `editor.etherpad_enabled`, `editor.etherpad_url` et `editor.etherpad_api_key` sous **Administration > Paramètres de configuration > Éditeur**. Voir [Paramètres de l'éditeur](../../admin-guide/platform-settings/editor-settings.md).

## Historique des révisions

Chaque modification crée une nouvelle révision. Vous pouvez :

* **Consulter l'historique** — Afficher la liste de toutes les révisions avec les horodatages et les auteurs
* **Comparer les versions** — Voir ce qui a changé entre deux révisions
* **Restaurer une version** — Rétablir la page à une révision précédente si nécessaire

## Gestion du wiki

En tant qu'enseignant du cours, vous pouvez :

* **Afficher toutes les pages** — Consulter la liste de toutes les pages wiki du cours
* **Trouver les pages orphelines** — Identifier les pages qui ne sont liées depuis aucune autre page
* **Trouver les pages demandées** — Voir les pages vers lesquelles des liens existent mais qui n'existent pas encore
* **Verrouiller une page pour modification** — Bloquer toutes les modifications d'une page pendant que vous la finalisez
* **Basculer la visibilité** — Masquer une page aux apprenants
* **Supprimer des pages** — Retirer les pages qui ne sont plus nécessaires
* **Suivre les contributions** — Consulter les statistiques par utilisateur : éditeurs les plus actifs, pages les plus modifiées, pages les plus visitées
* **Exporter** — Exporter une page wiki au format PDF, ou l'envoyer dans l'outil Documents

## Conseils

* **Utilisez le wiki pour les projets de groupe** — Attribuez à chaque groupe une page wiki afin de construire collaborativement leur livrable
* **Créez une base de connaissances du cours** — Constituez un wiki de référence avec les concepts clés, et encouragez les apprenants à y contribuer
* **Consultez l'historique des modifications** — L'historique des révisions vous permet d'évaluer les contributions individuelles dans le travail collaboratif