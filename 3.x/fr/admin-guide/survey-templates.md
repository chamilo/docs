# Modèles d'enquêtes

Les administrateurs peuvent créer des questionnaires d'enquête réutilisables et les proposer aux enseignants ou les affecter directement à des cours et des sessions. Cette fonctionnalité a été implémentée dans la [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) pour le [ticket #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Créer et maintenir les modèles

1. Dans le panneau d'administration, ouvrez **Modèles d'enquêtes** et choisissez **Créer**.
2. Saisissez un titre et un sous-titre facultatif ; configurez l'anonymat, la disposition des questions, le mélange, la durée, le texte d'introduction et le texte de remerciement.
3. Enregistrez, puis ajoutez ou modifiez les questions réutilisables dans l'éditeur de questions du modèle.
4. Activez **Visible comme modèle** si les enseignants doivent pouvoir le voir et le réutiliser. Un modèle invisible reste disponible pour l'administrateur.

Les modèles appartiennent à l'URL d'accès courante. Seuls les administrateurs de la plateforme peuvent créer, modifier ou supprimer le modèle maître. Les enseignants peuvent utiliser les modèles visibles, mais ne peuvent pas modifier leur définition maître.

## Réutiliser un modèle dans un cours ou une session

Dans un cours ou une session autorisé, un enseignant peut choisir un modèle visible lors de la création d'une nouvelle enquête. Le résultat est une enquête dans ce contexte de cours, et non une modification du modèle maître réutilisable. L'enseignant peut examiner les questions et suivre le processus habituel de publication et d'invitation.

Depuis la liste des modèles d'administration, un administrateur peut au contraire affecter un modèle directement à un **cours** sélectionné et, éventuellement, à l'une des **sessions** de ce cours. Chamilo vérifie que le cours appartient au portail courant et que la session sélectionnée contient effectivement le cours. L'interface enseignant ne peut pas être utilisée pour affecter un modèle au cours ou à la session d'une autre personne.

La nouvelle enquête n'est pas publiée automatiquement du seul fait qu'elle a été créée à partir d'un modèle ; examinez-la avant d'inviter les participants. Consultez [Enquêtes](../teacher-guide/assessing-learners/surveys.md) pour le processus d'enquête standard.

## Masquer les résultats sensibles aux enseignants ou aux tuteurs

Lors de la modification d'une enquête réelle, un administrateur de la plateforme peut activer **Résultats masqués à l'enseignant/tuteur**. Cette restriction propre à chaque enquête est destinée aux questionnaires sensibles, tels que les évaluations du personnel enseignant. Les enseignants et les tuteurs peuvent toujours consulter le nombre de réponses et envoyer des rappels, mais **ne peuvent pas ouvrir les vues de rapport ni exporter les résultats**. Les administrateurs de la plateforme conservent l'accès aux rapports, sous réserve des autres paramètres de la plateforme.

Cette option diffère du champ habituel **Visibilité des résultats** et du paramètre global de la plateforme **Masquer le bouton de rapport d'enquête**. Seul un administrateur peut modifier l'indicateur de résultats restreints.

## Autorisations et périmètre

* **Administrateur :** gérer les modèles, définir la visibilité des modèles, les affecter aux cours/sessions éligibles et contrôler l'accès restreint aux résultats.
* **Enseignant / enseignant de session :** voir et instancier uniquement les modèles visibles dans leur contexte de cours autorisé.
* **URL d'accès :** le catalogue de modèles et l'affectation appliquent l'URL d'accès courante ; les modèles d'autres portails ne peuvent pas être instanciés au-delà de cette limite.

Si les modèles n'apparaissent pas aux enseignants, vérifiez **Visible comme modèle** ainsi que leur contexte de cours/session. Si un modèle ne peut pas être instancié, vérifiez les restrictions globales de création d'enquêtes et le cours ou la session cible prévu.