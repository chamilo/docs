# Cartographie des compétences de cours assistée par l'IA

Chamilo 3.1 peut suggérer des compétences associées à un cours et permettre aux utilisateurs autorisés d'examiner ces suggestions et de les appliquer au référentiel de compétences et au Gradebook. Une suggestion de l'IA n'est **pas appliquée automatiquement** ; elle doit être sélectionnée et approuvée.

## Générer des suggestions

1. Ouvrez la page **Cartographie des compétences assistée par l'IA** du cours concerné. La route de l'application est `/course/{courseId}/skills`, l'identifiant réel du cours remplaçant `{courseId}`.
2. Si le cours fait partie d'une session, ouvrez la page dans le contexte de session approprié.
3. Choisissez un **fournisseur d'IA** disponible.
4. Sélectionnez **Suggérer des compétences pour ce cours** et examinez les résultats renvoyés.

Les fournisseurs d'IA doivent être disponibles et configurés par l'administration de la plateforme. Les suggestions peuvent renvoyer à des entrées de type **Compétence existante** ou recommander une **Nouvelle compétence** sous une compétence parente. Chaque entrée peut inclure sa description, ses critères et une explication de la suggestion.

## Examiner et approuver

1. Lisez chaque suggestion de manière critique et comparez-la aux objectifs et aux contenus du cours.
2. Sélectionnez uniquement les compétences valides à l'aide de leurs cases à cocher.
3. Si vous disposez de l'autorisation requise, choisissez **Ajouter les compétences sélectionnées au référentiel et au Gradebook**.
4. Vérifiez les compétences obtenues et les associations du Gradebook dans le cours.

Les utilisateurs ne disposant pas des privilèges d'affectation peuvent examiner les suggestions, mais ne peuvent pas les rattacher. La création de nouvelles compétences nécessite les permissions d'administrateur de la plateforme. Les suggestions peuvent expirer ; générez un nouvel ensemble si l'application indique que les précédentes ne sont plus valides.

## Bonne pratique

Les compétences générées par l'IA sont des candidates, et non des exigences curriculaires faisant autorité. Examinez la formulation, les doublons, le placement sous la compétence parente et les critères avant approbation. Évitez de saisir des informations confidentielles concernant les apprenants dans les prompts d'IA.

Voir [Compétences et évaluations](../../admin-guide/skills/skills-assessments.md) et [Boîte à outils IA](toolbox-ai.md). Mise en œuvre : [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).