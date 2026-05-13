# Parcours d'apprentissage

Les parcours d'apprentissage vous permettent de créer des séquences structurées d'activités d'apprentissage. Un parcours d'apprentissage guide vos apprenants à travers un ordre spécifique de documents, d'exercices, de liens et d'autres ressources, avec des prérequis optionnels et un suivi de progression.

Cet outil est sans doute le plus utilisé parmi les outils de cours, car il agit comme un compositeur pour de nombreux autres outils et peut très bien être le ***seul*** outil visible pour les apprenants.

## Pourquoi utiliser les parcours d'apprentissage ?

Les parcours d'apprentissage sont utiles lorsque vous souhaitez :

* **Contrôler l'ordre** de consommation du contenu — s'assurer que les apprenants complètent le matériel de base avant de passer à la suite
* **Suivre la progression** — voir exactement où chaque apprenant se situe dans la séquence
* **Définir des prérequis** — exiger que les apprenants réussissent un exercice avant d'accéder à la section suivante
* **Récompenser l'achèvement** — lier l'achèvement du parcours d'apprentissage au carnet de notes et aux certificats
* **Regrouper le contenu** — créer des modules d'apprentissage autonomes que les apprenants peuvent suivre à leur propre rythme

## Créer un parcours d'apprentissage

1. Ouvrez l'outil **Parcours d'apprentissage** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Parcours d'apprentissage" data-size="line"> depuis la page d'accueil du cours
2. Cliquez sur **Créer un parcours d'apprentissage**
3. Entrez un **titre** et une description optionnelle
4. Enregistrez — vous serez redirigé vers l'éditeur de parcours d'apprentissage

## L'éditeur de parcours d'apprentissage

![L'éditeur de parcours d'apprentissage avec l'arborescence des éléments à gauche et l'aperçu du contenu à droite](/.gitbook/assets/learning-path-editor.png)

L'éditeur comporte deux zones principales :

* **Panneau de gauche** — La liste des éléments (étapes) du parcours d'apprentissage, affichée sous forme d'arborescence
* **Panneau de droite** — Le contenu de l'élément sélectionné

### Ajouter des éléments

Cliquez sur **Ajouter un élément** et choisissez ce que vous voulez ajouter :

| Type d'élément | Description |
|----------------|-------------|
| **Section** | Un titre qui regroupe des éléments connexes (comme un titre de chapitre). Les sections ne contiennent pas de contenu elles-mêmes. |
| **Document** | Un fichier ou une page web provenant de l'outil Documents de votre cours |
| **Exercice** | Un quiz ou un test provenant de l'outil Exercices |
| **Lien** | Une URL externe |
| **Devoir** | Une publication d'étudiant provenant de l'outil Devoirs |
| **Forum** | Un lien vers un forum du cours |
| **Sondage** | Un lien vers un sondage |
| **Certificat** | Une page spéciale pour déclencher la génération d'un certificat d'achèvement ou l'attribution de compétences |

### Organiser les éléments

* **Glisser-déposer** les éléments pour les réorganiser
* **Imbriquer les éléments** sous des sections en les déplaçant vers la droite
* **Supprimer** les éléments dont vous n'avez plus besoin

### Définir des prérequis

Les prérequis garantissent que les apprenants complètent certaines étapes avant d'accéder à d'autres :

1. Sélectionnez un élément dans le parcours d'apprentissage
2. Ouvrez ses paramètres de **prérequis**
3. Choisissez quel(s) élément(s) précédent(s) doivent être complétés en premier
4. Pour les exercices, vous pouvez exiger un **score minimum** (par exemple, "Doit obtenir au moins 70 % au Quiz 1 avant d'accéder au Module 2")

## Expérience de l'apprenant

Lorsqu'un apprenant ouvre un parcours d'apprentissage :

* Il voit la liste des éléments dans le panneau de gauche
* Les éléments complétés sont marqués d'une coche
* Les éléments avec des prérequis non satisfaits sont verrouillés
* La progression est suivie automatiquement — si un apprenant quitte et revient, il reprend là où il s'était arrêté
* Une barre de progression affiche le pourcentage d'achèvement global

## Contenu SCORM

L'outil de parcours d'apprentissage de Chamilo peut importer des packages **SCORM 1.2** — la norme d'e-learning la plus largement utilisée. Téléchargez un fichier ZIP SCORM et Chamilo créera un parcours d'apprentissage à partir de celui-ci, en suivant la progression et les scores conformément à la spécification SCORM.

Pour importer un package SCORM :

1. Dans l'outil Parcours d'apprentissage, ouvrez le menu des actions et cliquez sur **Télécharger**
2. Téléchargez le fichier ZIP
3. Chamilo décompresse et crée le parcours d'apprentissage automatiquement

### Packages CMI5 / xAPI

Les packages CMI5 (le successeur moderne de SCORM basé sur xAPI) sont pris en charge via le plugin **XApi**. Une fois le plugin activé par votre administrateur, vous pouvez importer un package CMI5 et les apprenants peuvent le lancer depuis le cours ; leurs déclarations sont transmises au Learning Record Store configuré.

## Paramètres du parcours d'apprentissage

Configurez le comportement du parcours d'apprentissage :

| Paramètre | Description |
|-----------|-------------|
| **Visibilité** | Masquer ou afficher le parcours d'apprentissage aux apprenants |
| **Prérequis** | Exiger l'achèvement d'autres parcours d'apprentissage avant celui-ci |
| **Lancement automatique** | Ouvrir automatiquement ce parcours d'apprentissage lorsque les apprenants entrent dans le cours |
| **Temps SCORM accumulé** | Indiquer si le temps doit être accumulé sur plusieurs sessions |

## Lier au carnet de notes

Vous pouvez inclure l'achèvement du parcours d'apprentissage comme une activité notée dans le carnet de notes. Cela permet à la progression dans le parcours d'apprentissage de contribuer à la note globale du cours de l'apprenant et à son éligibilité au certificat.

## Utiliser l'IA

Si l'administrateur a activé la génération de parcours d'apprentissage assistée par IA, vous trouverez une option de générateur IA dans le menu déroulant des actions. Fournissez à l'IA un contexte aussi précis que possible pour votre parcours d'apprentissage, demandez un nombre de pages et un nombre approximatif de mots par page, puis indiquez si vous souhaitez le remplir de tests et le lancer. Quelques minutes plus tard, vous aurez sous les yeux un parcours d'apprentissage complet basé sur du texte.

Modifiez les documents pour générer des illustrations avec davantage d'IA, et il ne vous restera plus qu'à effectuer une révision avant de le partager avec vos apprenants.

## Conseils

* **Commencez par un plan** — Planifiez vos sections et éléments avant de construire le parcours
* **Utilisez les sections comme des chapitres** — Regroupez les éléments connexes sous des titres de section pour plus de clarté
* **Définissez des prérequis pour les évaluations** — Exigez des apprenants qu'ils étudient le contenu avant de passer un quiz
* **Mélangez les types de contenu** — Combinez des supports de lecture, des vidéos, des exercices interactifs et des ressources externes pour une expérience d'apprentissage engageante
* **Vérifiez la vue apprenant** — Utilisez la fonctionnalité Vue Étudiant pour expérimenter le parcours d'apprentissage comme le ferait un apprenant
* **Utilisez SCORM pour l'interactivité** — Si vous avez accès à des outils de création SCORM (comme Articulate, iSpring ou similaires), créez du contenu interactif riche et importez-le dans Chamilo