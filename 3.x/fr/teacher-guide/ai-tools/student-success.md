# Coach IA de réussite étudiante

Le **Coach IA de réussite étudiante** aide un enseignant à transformer l’activité du cours en recommandations pratiques pour un apprenant. Il est accessible depuis la liste des apprenants dans l’espace de rapports du cours lorsque les assistants IA et la fonctionnalité **Analyseur de cours** sont activés pour ce cours.

> La plateforme doit disposer d’au moins un fournisseur d’IA textuelle configuré. Voir [Configuration de l’IA](../../admin-guide/integrations/ai-configuration.md). Les paramètres de plateforme concernés sont `ai_helpers.enable_ai_helpers` et `ai_helpers.course_analyser` sous **Administration > Paramètres de configuration > Assistants IA**.

## Générer une recommandation

1. Ouvrez l’espace de rapports du cours et affichez la **Liste des apprenants**.
2. Trouvez l’apprenant et cliquez sur l’action **Coach IA de réussite étudiante**.
3. Si plusieurs fournisseurs d’IA sont disponibles, sélectionnez-en un.
4. Saisissez éventuellement des **Instructions supplémentaires pour le coach IA**. Elles vous permettent d’ajouter un contexte pédagogique ou de demander au coach de se concentrer sur une difficulté précise.
5. Cliquez sur **Analyser l’apprentissage de l’utilisateur**.

Chamilo prépare d’abord une analyse du cours ou en réutilise une existante, puis analyse l’activité de l’apprenant dans le contexte du cours ou de la session de cours en cours.

## Contenu de la recommandation

Le résultat peut inclure :

* un résumé global concis ;
* des **Actions prioritaires** ;
* des **Activités supplémentaires** suggérées ;
* des recommandations sur le **Rythme** et la cadence ;
* d’autres **Méthodologies d’apprentissage** ;
* d’autres recommandations lorsque cela est pertinent ;
* des liens de **Preuves** issus du catalogue de sources pédagogiques approuvé pour la langue du cours.

La recommandation est enregistrée dans Chamilo pour cet apprenant et ce contexte de cours. Chamilo enregistre également une copie dans la boîte de réception de l’enseignant lorsque la création du message aboutit, afin qu’elle puisse être consultée ultérieurement.

## Confidentialité

Avant le début de l’analyse, Chamilo affiche un avertissement de confidentialité. Les identifiants directs du profil sont omis de la charge utile de l’apprenant envoyée au fournisseur d’IA, et l’IA reçoit pour instruction de ne pas identifier l’apprenant ni d’inférer des caractéristiques sensibles. Toutefois, l’activité d’apprentissage et le contenu du cours peuvent encore contenir des informations susceptibles d’identifier indirectement une personne. Respectez la politique d’IA et de confidentialité de votre organisation avant d’utiliser cette fonctionnalité.

La même analyse de réussite étudiante est également accessible aux clients MCP autorisés via l’outil `generate_student_success_feedback` ; elle réutilise le même flux d’analyse filtré pour la confidentialité.