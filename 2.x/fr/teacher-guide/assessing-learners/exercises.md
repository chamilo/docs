# Exercices

L'outil d'exercices (également appelé "tests") vous permet de créer des quiz et des examens avec une correction automatique. Chamilo prend en charge une grande variété de types de questions, allant du simple choix multiple aux questions interactives de type hotspot.

## Créer un exercice

1. Ouvrez l'outil **Exercices** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Exercices" data-size="line"> depuis la page d'accueil du cours
2. Cliquez sur **Nouvel exercice**
3. Saisissez un **titre** et une **description** optionnelle
4. Configurez les paramètres de l'exercice (voir ci-dessous)
5. Enregistrez, puis ajoutez des questions

## Paramètres de l'exercice

![Le panneau des paramètres de l'exercice avec des options pour l'affichage, le temps, les tentatives et le feedback](/.gitbook/assets/exercise-settings.png)

### Affichage et navigation

| Paramètre | Options | Description |
|-----------|---------|-------------|
| **Mise en page des questions** | Toutes sur une page / Une par page | Afficher toutes les questions en même temps ou une à la fois |
| **Masquer les titres des questions** | Oui / Non | Afficher ou non les titres des questions aux apprenants |
| **Afficher le bouton Précédent** | Oui / Non | Permettre aux apprenants de revenir aux questions précédentes |
| **Empêcher la navigation arrière** | Oui / Non | Obliger les apprenants à répondre dans l'ordre sans pouvoir revenir en arrière |

### Temps et disponibilité

| Paramètre | Description |
|-----------|-------------|
| **Limite de temps** | Temps maximum (en minutes) pour compléter l'exercice. Un compte à rebours est affiché à l'apprenant |
| **Date de début** | Date à partir de laquelle l'exercice devient accessible aux apprenants |
| **Date de fin** | Date à laquelle l'exercice n'est plus accessible |

### Tentatives et notation

| Paramètre | Description |
|-----------|-------------|
| **Nombre maximum de tentatives** | Nombre de fois qu'un apprenant peut passer l'exercice (0 = illimité) |
| **Pourcentage de réussite** | Score minimum pour réussir (par exemple, 70 %). Les apprenants qui n'atteignent pas ce seuil voient un message d'échec |
| **Propager la notation négative** | Déterminer si les points négatifs sur des questions individuelles réduisent le score total en dessous de zéro |

### Feedback

| Paramètre | Options |
|-----------|---------|
| **À la fin** | Afficher les résultats et les réponses correctes après que l'apprenant a soumis ses réponses |
| **Immédiat** | Afficher un feedback après chaque question (utile pour les exercices d'apprentissage) |
| **Mode examen** | Ne pas afficher de feedback ni de résultats |

### Affichage des résultats

Contrôlez ce que les apprenants voient après avoir complété l'exercice :

* Afficher le score et les réponses attendues
* Afficher uniquement le score
* Afficher le score avec une répartition par catégorie
* Afficher le classement parmi les autres apprenants
* Afficher uniquement lors de la dernière tentative
* Afficher une visualisation sous forme de graphique radar

### Messages de complétion

* **Message de réussite** — Texte personnalisé affiché lorsque l'apprenant réussit
* **Message d'échec** — Texte personnalisé affiché lorsque l'apprenant n'atteint pas le pourcentage de réussite

### Randomisation des questions

| Paramètre | Description |
|-----------|-------------|
| **Ordre aléatoire des questions** | Mélanger l'ordre des questions à chaque tentative |
| **Réponses aléatoires** | Mélanger les options de réponse au sein de chaque question |
| **Aléatoire par catégorie** | Sélectionner des questions aléatoires dans chaque catégorie de questions |

Vous pouvez également configurer des stratégies de sélection avancées combinant catégories et randomisation.

## Types de questions

![Aperçu des types de questions disponibles dans l'interface de création d'exercices](/.gitbook/assets/exercise-question-types.png)

Chamilo propose un ensemble riche de types de questions organisés en plusieurs catégories :

### Choix unique

* **Choix multiple (réponse unique)** — L'apprenant sélectionne une seule réponse correcte parmi une liste d'options
* **Réponse unique avec images** — Identique au précédent, mais les options de réponse sont affichées sous forme d'images

### Choix multiple

* **Réponse multiple** — L'apprenant sélectionne une ou plusieurs réponses correctes
* **Réponse multiple (menu déroulant)** — Les options de réponse sont présentées sous forme de menus déroulants
* **Vrai/Faux** — Une série d'affirmations que l'apprenant marque comme vraies ou fausses
* **Vrai/Faux avec degré de certitude** — Vrai/Faux avec un niveau de confiance supplémentaire, permettant une notation plus nuancée

### Compléter les blancs

* **Compléter les blancs** — L'apprenant complète les mots manquants dans un texte. Vous définissez les blancs et les réponses acceptées lors de la création de la question.

### Appariement

* **Appariement** — L'apprenant relie des éléments de deux colonnes
* **Appariement (glisser-déposer)** — Même concept, mais avec une interface de glisser-déposer
* **Glisser-déposer** — Glisser des éléments dans les positions correctes

### Réponse ouverte

* **Réponse libre (essai)** — L'apprenant rédige une réponse textuelle. Nécessite une correction manuelle (ou une correction assistée par IA si configurée)
* **Expression orale** — L'apprenant enregistre une réponse audio à l'aide de son microphone
* **Téléverser une réponse** — L'apprenant téléverse un fichier comme réponse

### Hotspot

* **Hotspot** — L'apprenant clique sur des zones spécifiques d'une image pour répondre
* **Délimitation de hotspot** — L'apprenant dessine des contours autour de zones sur une image

### Calculé

* **Réponse calculée** — Questions numériques avec une formule et une plage de tolérance. Utile pour les cours de mathématiques et de sciences.

---
### Spécial

* **Compréhension de lecture** — Tests basés sur la lecture d'un passage
* **Annotation** — L'enseignant télécharge une image et l'apprenant l'annote
* **Réponse dans un document Office** — Lorsque le plugin OnlyOffice est activé, l'apprenant répond à la question en modifiant un document Office intégré (Word, Excel, PowerPoint). Sa réponse est enregistrée sous forme de fichier séparé dans l'exercice afin de pouvoir être examinée avec le reste de sa tentative.

## Ajout de questions à un exercice

1. Ouvrez l'exercice et cliquez sur **Ajouter une question**
2. Sélectionnez le type de question
3. Saisissez le **texte de la question** (prend en charge le texte enrichi avec images et mise en forme)
4. Définissez les **réponses** et leur notation :
   * Pour chaque option de réponse, précisez si elle est correcte et combien de points elle vaut
   * Vous pouvez attribuer des points négatifs aux mauvaises réponses pour décourager les suppositions
5. Ajoutez éventuellement un **retour d'information** — explications montrées à l'apprenant après avoir répondu
6. Définissez le **niveau de difficulté** et la **catégorie** (utile pour la sélection aléatoire et les rapports)
7. Enregistrez

## Catégories de questions

Vous pouvez organiser les questions en catégories (par exemple, "Module 1", "Vocabulaire", "Avancé"). Les catégories sont utiles pour :

* Organiser de grandes banques de questions
* Activer la sélection aléatoire par catégorie (par exemple, "5 questions du Module 1, 3 du Module 2")
* Voir les scores ventilés par catégorie dans les rapports

## Réutilisation des questions

Les questions peuvent être réutilisées dans différents exercices au sein du même cours. Lors de l'ajout d'une question, vous pouvez choisir d'en créer une nouvelle ou de sélectionner une question existante dans la banque de questions.

## Importation d'exercices

Chamilo prend en charge l'importation d'exercices à partir de formats externes :

* **IMS QTI / Common Cartridge** — Le format standard de quiz e-learning
* **Format Moodle** — Importer des quiz à partir d'exportations Moodle

Pour importer, recherchez l'option **Importer** dans l'outil des exercices et téléchargez votre fichier.

## Conseils

* **Mélangez les types de questions** — Combinez les questions à choix multiples, à trous et ouvertes pour une évaluation complète
* **Utilisez des catégories** — Organisez les questions par thème pour permettre une sélection aléatoire ciblée
* **Définissez un pourcentage de réussite** — Donnez aux apprenants un objectif clair et liez-le à la génération de certificats via le carnet de notes (Gradebook)
* **Utilisez un retour immédiat pour la pratique** — Créez des exercices de pratique non notés avec un retour immédiat pour aider les apprenants à apprendre de leurs erreurs
* **Randomisez pour garantir l'intégrité** — Activez l'ordre aléatoire des questions et des réponses pour réduire les risques de copie