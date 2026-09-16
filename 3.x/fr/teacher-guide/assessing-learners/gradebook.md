# Évaluations

Les évaluations (auparavant *gradebook*) agrègent les scores des exercices, des travaux et des autres activités notées en une vue unifiée des performances de chaque apprenant. Elles contrôlent également la génération des certificats.

## Fonctionnement des évaluations

Les évaluations sont des systèmes de notation pondérés. Vous définissez :

1. **Quelles activités** contribuent à la note (exercices, travaux, assiduité, etc.)
2. **Le poids** de chaque activité (sa contribution à la note finale)
3. **Le score minimal de certification** (le seuil pour obtenir un certificat)
4. **Un score minimal par activité** — Chaque activité du carnet de notes peut avoir son propre **Score minimal**. Les apprenants qui obtiennent un score inférieur à ce minimum sur une activité clé peuvent se voir empêchés d’atteindre les objectifs et d’obtenir le certificat, même si leur total pondéré global est par ailleurs suffisant.

Les activités peuvent être de 2 types :
* **Activité en présentiel** (ou activité en classe), dont les notes doivent être importées depuis une autre source
* **Activité en ligne** sélectionnée dans le cours, dont les notes sont obtenues par la réalisation de l’activité dans le cours

Chamilo calcule la note globale de chaque apprenant à partir de ces poids.

## Configuration de l’évaluation

1. Ouvrez l’outil **Évaluations** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> depuis la page d’accueil du cours
2. Vous verrez la vue d’ensemble des évaluations, initialement vide

### Ajout d’activités

1. Cliquez sur **Ajouter une activité en ligne**
2. Choisissez le type :
   * **Test** — Lier un exercice spécifique du cours
   * **Travail** — Lier un dossier de publications d’étudiants
   * **Parcours d’apprentissage** — Lier l’achèvement d’un parcours d’apprentissage
   * **Assiduité** — Lier une feuille de présence
   * **Fil de forum** — Lier un fil de forum (qui doit être noté manuellement)
   * **Enquête** — Lier une enquête
3. Sélectionnez l’activité spécifique dans le type choisi
4. Définissez le **Poids** de cette activité (par ex. 30 % pour l’examen de mi-parcours, 40 % pour le projet final)
5. Définissez le **Score minimal** le cas échéant
6. Enregistrez

Le poids total de toutes les activités doit atteindre 100 %.

### Sous-catégories

Pour des schémas de notation complexes, vous pouvez créer des **sous-catégories** afin de regrouper des activités liées :

* **Exemple** : une sous-catégorie « Devoirs » (poids : 30 %) contenant cinq travaux individuels valant chacun 20 % de la sous-catégorie
* Les sous-catégories permettent d’organiser l’évaluation de façon hiérarchique tout en conservant un calcul global simple

## Consultation des notes

![Le tableau d’ensemble du carnet de notes affichant les noms des apprenants, les scores des activités et les totaux pondérés](/.gitbook/assets/gradebook-overview.png)

L’évaluation affiche un tableau avec :

* Le nom de chaque apprenant
* Les scores de chaque activité
* Le total pondéré
* Si l’apprenant est éligible à un certificat

Vous pouvez trier par n’importe quelle colonne pour identifier rapidement les meilleurs résultats ou les apprenants en difficulté.

### Graphiques de distribution des scores

Sous le tableau, et sur la page **Vue graphique**, l’évaluation dessine un diagramme en barres par activité plus un pour le total. Chaque graphique est un diagramme en colonnes : l’axe horizontal liste vos plages de scores du plus bas au plus élevé, et la hauteur de chaque barre est le nombre d’apprenants dans cette plage.

Le graphique **Total** marque également la moyenne de la classe. Un point rouge se situe sur la plage qui contient la moyenne, et la légende donne le pourcentage exact.

Ces graphiques n’apparaissent que lorsque les règles d’affichage des scores sont définies. Si vous voyez le message *To view graph score rule must be enabled*, définissez d’abord vos plages dans les paramètres de notation de l’évaluation.

## Certificats

Pour activer la génération de certificats :

1. Dans les paramètres de l’évaluation, définissez un **score minimal de certification** (par ex. 70 %)
2. Lorsqu’un apprenant atteint ou dépasse ce seuil avec son total pondéré (et qu’il n’a échoué à aucun score minimal par activité), il peut télécharger son certificat
3. Le certificat est généré à partir d’un modèle configuré par l’administrateur de la plateforme

Une fois **Générer les certificats** activé sur la catégorie racine, un champ **Validité du certificat (jours)** apparaît. Laissez-le à `0` pour des certificats qui n’expirent jamais, ou définissez un nombre de jours au-delà duquel le certificat expire — Chamilo peut alors rappeler aux apprenants l’approche de cette date d’expiration, soit automatiquement (cron, configuré par l’administrateur), soit manuellement depuis la liste des certificats.

![La boîte de dialogue d’édition de catégorie avec Générer les certificats activé et le champ Validité du certificat (jours) défini à 365](/.gitbook/assets/gradebook-certificate-validity-field.png)

Voir [Certificats et compétences](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) pour plus de détails.

## Liaison aux compétences

Vous pouvez associer des **compétences** (*skills*) à l’évaluation. Lorsqu’un apprenant atteint les objectifs fixés pour terminer l’évaluation, il peut obtenir un certificat, une compétence, ou les deux. Les compétences sont visibles sur son profil dans l’espace réseau social. Cela constitue un dossier de compétences au fil du temps.

## Exportation des notes

Cliquez sur le bouton **Exporter** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exporter" data-size="line"> pour télécharger les notes sous forme de tableur. Cela est utile pour :

* Partager les notes avec des systèmes administratifs
* Effectuer des analyses complémentaires en dehors de Chamilo
* Conserver des archives hors ligne

## Conseils

* **Planifiez vos pondérations dès le début** — Définissez le barème de notation au commencement du cours afin que les apprenants sachent à quoi s’attendre
* **Utilisez des sous-catégories pour les cours complexes** — Regroupez les devoirs, les quiz et la participation dans des catégories claires
* **Fixez des seuils de réussite pertinents** — Le score de certification doit refléter une véritable compétence, et non seulement la participation
* **Vérifiez régulièrement** — Consultez périodiquement le carnet de notes pour vous assurer que toutes les activités sont correctement liées et que les scores sont bien enregistrés