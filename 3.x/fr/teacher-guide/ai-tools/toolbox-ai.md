# Boîte à outils IA

La **boîte à outils IA** est un outil de cours qui génère des applications éducatives interactives à partir des consignes d'un enseignant. Chamilo conditionne chaque application générée au format **SCORM 1.2**, afin que la progression, le score et les données de reprise de l'apprenant soient suivis par la plateforme.

> L'administrateur doit activer à la fois `ai_helpers.enable_ai_helpers` et `ai_helpers.toolbox` sous **Administration > Paramètres de configuration > Assistants IA**, et au moins un fournisseur d'IA textuelle doit être configuré.

## Créer une application interactive

1. Ouvrez la **boîte à outils IA** dans le cours.
2. Cliquez sur **Créer**.
3. Saisissez un **Titre** et, éventuellement, une **Description**.
4. Dans **Que doit faire l'application ?**, décrivez l'activité complète souhaitée. Indiquez l'objectif d'apprentissage, les règles, les niveaux, le barème et ce qui doit se produire lorsque l'apprenant termine.
5. Choisissez le **fournisseur d'IA** lorsque plusieurs sont disponibles.
6. Cliquez sur **Générer**.

La première génération est enregistrée comme **version 1**. Elle commence en brouillon, afin que vous puissiez la prévisualiser avant de la rendre visible aux apprenants.

## Améliorer et gérer les versions

Ouvrez les **Paramètres** d'une application pour la gérer. Vous pouvez :

* prévisualiser ou télécharger l'application actuelle ;
* utiliser **Améliorer avec l'IA** pour décrire une modification et générer une nouvelle version ;
* consulter l'**Historique des versions** ;
* prévisualiser, télécharger ou restaurer une version antérieure ;
* publier ou masquer l'application ;
* ouvrir le **Rapport** pour examiner le suivi des apprenants.

La génération d'une amélioration ne supprime pas les versions précédentes. La restauration d'une version antérieure rend à nouveau cette version courante.

## Ajouter une application à un parcours d'apprentissage

Dans le [constructeur de parcours d'apprentissage](../adding-content/learning-paths.md), les enseignants peuvent sélectionner une application générée par la boîte à outils IA comme ressource. L'application doit disposer d'une version générée, mais elle n'a pas besoin d'être publiée avant que l'enseignant l'ajoute au parcours d'apprentissage. Une application non publiée reste indisponible pour les apprenants tant qu'elle n'est pas publiée.

Lorsqu'un enseignant autorisé ouvre le contenu de la boîte à outils en **mode Aperçu**, Chamilo affiche **« La progression et le score ne sont pas enregistrés en mode aperçu. »** Tester l'activité de cette manière ne crée pas de suivi d'apprenant et ne met pas à jour de score. Utilisez l'expérience normale de l'apprenant pour vérifier la progression et les scores SCORM après la publication.

## Validation de la génération et dépannage

Après la génération par l'IA, Chamilo vérifie le code source de l'application générée avant de rendre une version disponible. Cela comprend des contrôles de syntaxe ou de structure JavaScript et des restrictions sur les API de navigateur non sécurisées. Si la validation échoue, Chamilo demande au fournisseur d'IA de **réparer le résultat une seule fois** ; si la version réparée échoue encore, la génération s'arrête avec une erreur. Une validation réussie ne remplace pas le test des règles d'apprentissage de l'activité, de l'accessibilité et du calcul des scores SCORM avant la publication.

Si la génération signale **HTTP 504**, le serveur web ou la passerelle a cessé d'attendre la requête. Cela est différent d'un délai d'expiration imposé par le fournisseur d'IA textuelle. L'erreur peut inclure le temps écoulé approximatif ; essayez une demande d'activité plus simple et demandez à l'administrateur de vérifier les délais d'expiration de la passerelle, de PHP/du serveur web et du fournisseur. Un délai d'expiration ou une erreur de limitation de débit du fournisseur exige de vérifier le modèle configuré et les paramètres du fournisseur. Ne supposez pas que l'application a été enregistrée avec succès après une erreur.

Ces améliorations de validation et de diagnostic ont été introduites dans la [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Expérience de l'apprenant

Les apprenants ne voient que les applications qui ont été publiées. Depuis la boîte à outils, ils peuvent ouvrir une application, reprendre à partir de leur dernier état SCORM et consulter leur **Progression** et leur **Score**. Lorsqu'une nouvelle tentative est autorisée, **Réessayer** lance une nouvelle tentative.

Les applications de la boîte à outils s'exécutent dans l'environnement d'exécution du parcours d'apprentissage, dans une iframe restreinte, et renvoient leur état SCORM à Chamilo. Elles sont gérées depuis la boîte à outils plutôt que depuis la liste habituelle des parcours d'apprentissage.

Les clients MCP autorisés peuvent également créer ou mettre à jour des applications de la boîte à outils lorsque les mêmes paramètres de la boîte à outils IA sont activés.