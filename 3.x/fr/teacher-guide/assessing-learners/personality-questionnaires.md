# Questionnaires de personnalité

Chamilo 3.1 inclut des questionnaires de type personnalité dans l'outil moderne **Enquêtes**. Ces questionnaires produisent un **profil de préférences**, et non un exercice noté ni une évaluation psychologique clinique.

## Créer un questionnaire

1. Ouvrez l'outil Enquêtes et créez une nouvelle enquête.
2. Dans sa configuration, choisissez le type d'enquête **personnalité**.
3. Ouvrez **Modifier les questions** ou l'éditeur de questions de l'enquête.
4. Définissez les **Catégories de personnalité** avant d'ajouter des questions de personnalité. Chaque option de réponse doit appartenir à une catégorie.
5. Ajoutez des questions, configurez leurs réponses et leurs affectations de catégories, puis enregistrez vos modifications.
6. Prévisualisez l'expérience de l'apprenant avant de diffuser l'enquête.

Quatre types de questions de personnalité sont disponibles :

| Type | Comment les apprenants répondent |
| --- | --- |
| Choix de personnalité | Choisir parmi des options associées à des catégories |
| Accord de personnalité | Indiquer son accord avec les éléments présentés |
| Échelle de personnalité | Évaluer les éléments sur une échelle à cinq points |
| Ordre de personnalité | Classer les options de la plus préférée à la moins préférée |

La configuration inclut la validation des réponses et un calcul des préférences fondé sur les catégories. Vérifiez attentivement les options et les affectations de chaque question : une option associée à la mauvaise catégorie modifie le profil obtenu.

## Consulter les résultats

Après avoir terminé le questionnaire, un apprenant peut voir **Votre profil de personnalité** lorsque l'enquête renvoie des données de profil. La page de rapports d'enquête de l'enseignant peut afficher **Profil de personnalité — tous les apprenants**. Les résultats sont présentés avec des visualisations en barres ou en radar et des scores par catégorie. La duplication d'une enquête conserve la configuration du questionnaire de personnalité.

## Cahier de notes et interprétation

Les questionnaires de personnalité ne peuvent pas être notés via le cahier de notes comme des évaluations ordinaires. Expliquez aux apprenants que les résultats reflètent les réponses aux catégories configurées, et non un diagnostic, un statut de réussite ou d'échec, ni un test de personnalité validé. Examinez les paramètres de confidentialité et de visibilité des rapports avant de collecter des réponses personnelles.

Voir [Enquêtes](surveys.md). Implémentation : [PR #9468](https://github.com/chamilo/chamilo-lms/pull/9468).