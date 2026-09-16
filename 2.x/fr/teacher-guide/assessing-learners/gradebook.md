# Évaluations

Les évaluations (anciennement *gradebook* ou carnet de notes) regroupent les scores des exercices, des travaux et d'autres activités notées dans une vue unifiée de la performance de chaque apprenant. Elles contrôlent également la génération de certificats.

## Fonctionnement des Évaluations

Les évaluations sont des systèmes de notation pondérée. Vous définissez :

1. **Quelles activités** contribuent à la note (exercices, travaux, présence, etc.)
2. **Le poids** de chaque activité (sa contribution à la note finale)
3. **Le score minimum de certification** (le seuil pour obtenir un certificat)
4. **Un score minimum par activité** — Chaque activité dans le carnet de notes peut avoir son propre **score minimum**. Les apprenants qui obtiennent un score inférieur à ce minimum pour une activité clé peuvent être empêchés d'atteindre les objectifs et d'obtenir le certificat, même si leur total pondéré global est suffisamment élevé.

Les activités peuvent être de 2 types :
* **Activité en classe** (ou activité en présentiel), où les notes doivent être importées depuis une autre source
* **Activité en ligne** sélectionnée dans le cours, où les notes sont obtenues par la réalisation de l'activité dans le cours

Chamilo calcule la note globale de chaque apprenant en fonction de ces poids.

## Configuration des Évaluations

1. Ouvrez l'outil **Évaluations** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Carnet de notes" data-size="line"> depuis la page d'accueil du cours
2. Vous verrez un aperçu des évaluations, initialement vide

### Ajout d'Activités

1. Cliquez sur **Ajouter une activité en ligne**
2. Choisissez le type :
   * **Test** — Lier un exercice spécifique du cours
   * **Travail** — Lier un dossier de publications des étudiants
   * **Parcours d'apprentissage** — Lier l'achèvement d'un parcours d'apprentissage
   * **Présence** — Lier une feuille de présence
   * **Fil de discussion du forum** — Lier un fil de discussion du forum (qui doit être noté manuellement)
   * **Sondage** — Lier un sondage
3. Sélectionnez l'activité spécifique dans le type choisi
4. Définissez le **Poids** de cette activité (par exemple, 30 % pour l'examen de mi-parcours, 40 % pour le projet final)
5. Définissez le **Score minimum** si applicable
6. Enregistrez

Le poids total de toutes les activités doit atteindre 100 %.

### Sous-catégories

Pour des schémas de notation complexes, vous pouvez créer des **sous-catégories** pour regrouper des activités connexes :

* **Exemple** : Une sous-catégorie "Travaux" (poids : 30 %) contenant cinq travaux individuels valant chacun 20 % de la sous-catégorie
* Les sous-catégories vous permettent d'organiser l'évaluation de manière hiérarchique tout en simplifiant le calcul global

## Consultation des Notes

![Tableau d'aperçu du carnet de notes affichant les noms des apprenants, les scores des activités et les totaux pondérés](/.gitbook/assets/gradebook-overview.png)

L'évaluation affiche un tableau avec :

* Le nom de chaque apprenant
* Les scores pour chaque activité
* Le total pondéré
* Si l'apprenant est éligible pour un certificat

Vous pouvez trier par n'importe quelle colonne pour identifier rapidement les meilleurs performeurs ou les apprenants en difficulté.

## Certificats

Pour activer la génération de certificats :

1. Dans les paramètres d'évaluation, définissez un **score minimum de certification** (par exemple, 70 %)
2. Lorsqu'un apprenant atteint ou dépasse ce seuil avec son total pondéré (et qu'il n'a échoué à aucun score minimum par activité), il peut télécharger son certificat
3. Le certificat est généré à partir d'un modèle configuré par l'administrateur de la plateforme

Voir [Certificats et Compétences](../tracking-and-reporting/certificates-and-skills.md) pour plus de détails.

## Liaison avec les Compétences

Vous pouvez associer des **compétences** à l'évaluation. Lorsqu'un apprenant atteint les objectifs fixés pour compléter l'évaluation, il peut obtenir un certificat, une compétence, ou les deux. Les compétences sont visibles sur son profil dans l'espace de réseau social. Cela permet de constituer un dossier de compétences au fil du temps.

## Exportation des Notes

Cliquez sur le bouton **Exporter** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exporter" data-size="line"> pour télécharger les notes sous forme de feuille de calcul. Cela est utile pour :

* Partager les notes avec des systèmes administratifs
* Effectuer des analyses supplémentaires en dehors de Chamilo
* Conserver des archives hors ligne

## Conseils

* **Planifiez vos poids dès le début** — Définissez le schéma de notation au début du cours pour que les apprenants sachent à quoi s'attendre
* **Utilisez des sous-catégories pour les cours complexes** — Regroupez les travaux, les quiz et la participation dans des catégories claires
* **Définissez des seuils de réussite significatifs** — Le score de certification doit refléter une compétence réelle, et pas seulement une participation
* **Vérifiez régulièrement** — Consultez périodiquement le carnet de notes pour vous assurer que toutes les activités sont correctement liées et que les scores sont bien enregistrés
