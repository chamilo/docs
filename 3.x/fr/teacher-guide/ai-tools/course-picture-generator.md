# Générateur d’image de cours

Le générateur d’image de cours par IA vous permet de créer une vignette pour votre cours directement depuis l’écran des paramètres du cours, sans avoir à en trouver ou à en concevoir une vous-même. C’est l’image affichée pour votre cours dans les listes et dans le [catalogue de cours](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Accéder au générateur

Le bouton **Générer avec l’IA** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Générer avec l’IA" data-size="line"> est disponible à côté du champ **Image du cours**, à condition que :

1. Les assistants IA soient activés au niveau de la plateforme
2. Au moins un fournisseur d’IA configuré sur votre plateforme prenne en charge la génération d’images
3. La fonctionnalité soit autorisée dans votre cours (voir **Paramètres des assistants IA** dans [Paramètres du cours](../creating-your-course/course-settings.md))

Ouvrez les **Paramètres** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Paramètres" data-size="line"> de votre cours et faites défiler jusqu’au champ **Image du cours** :

![Le champ Image du cours dans les Paramètres du cours, avec un bouton Choisir un fichier et un bouton Générer avec l’IA en dessous](/.gitbook/assets/course-picture-ai-button.png)

## Comment générer une image

1. Cliquez sur **Générer avec l’IA**
2. Une boîte de dialogue s’ouvre avec un champ **Invite** prérempli d’une description par défaut ; modifiez-la pour décrire l’illustration souhaitée, ou laissez la valeur par défaut telle quelle

![La boîte de dialogue Générer avec l’IA affichant le champ Invite avec son texte par défaut, et les boutons Annuler/Générer](/.gitbook/assets/course-picture-ai-modal.png)

3. Cliquez sur **Générer** et patientez — la génération d’image peut prendre quelques secondes
4. L’image générée est automatiquement placée dans le champ **Image du cours**, en remplaçant tout ce que vous y aviez sélectionné
5. Prévisualisez-la dans le panneau **Aperçu**, puis cliquez sur le bouton **Enregistrer** du formulaire pour l’appliquer réellement à votre cours — générer l’image ne l’enregistre pas à elle seule

Si le résultat ne vous convient pas, vous pouvez générer à nouveau avec une invite différente autant de fois que vous le souhaitez avant d’enregistrer.

## Contenu de l’invite

Au-delà de ce que vous saisissez, Chamilo ajoute automatiquement du contexte pour aider l’IA à produire une image pertinente et cohérente avec l’identité visuelle :

* Le titre de votre cours
* La première section de la [Description du cours](../creating-your-course/course-description.md) de votre cours, si vous en avez renseigné une — afin de donner à l’IA une idée du sujet réel
* Le thème de couleurs de votre plateforme (primaire, secondaire, tertiaire), afin que l’illustration utilise des couleurs cohérentes avec votre portail

L’image est générée dans un style d’illustration plat, au format large (16:9), sans texte lisible, logos ni personnes photoréalistes — conformément au format attendu pour une vignette de cours.

## Conseils

* **Renseignez d’abord une Description du cours** — comme elle alimente l’invite, un cours doté d’une véritable description tend à obtenir une illustration plus pertinente qu’un cours sans description
* **Soyez précis sur le style, pas sur le contenu** — le titre et la description du cours ancrent déjà le sujet ; utilisez votre invite pour des indications de style (ambiance colorée, métaphore, composition) plutôt que pour redécrire le thème
* **Régénérez plutôt que de vous contenter du premier résultat** — chaque clic produit une nouvelle tentative sans étape supplémentaire ; essayez quelques variantes avant d’en choisir une
* **N’oubliez pas d’enregistrer** — le bouton ne fait que renseigner le champ d’image ; si vous quittez la page sans enregistrer, l’image générée est perdue
* **En cas d’échec de la génération, demandez à votre administrateur** — une fonctionnalité désactivée, un fournisseur d’images non configuré ou un quota mensuel d’utilisation de l’IA épuisé produisent tous un message d’erreur ici ; votre administrateur peut consulter la [Configuration de l’IA](../../admin-guide/integrations/ai-configuration.md)