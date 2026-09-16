# Paramètres des exercices (tests)

Paramètres par défaut et comportement de l'outil **Exercices (Tests)** — affichage des questions, notation, tentatives, et autres aspects similaires.

Accédez à ces paramètres via **Administration > Paramètres de configuration > Exercices (Tests)**. Cette catégorie contient **63 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

---
## Paramètres

### `add_exercise_best_attempt_in_report`

**Activer l'affichage de la meilleure tentative dans les rapports**

Fournissez une liste des identifiants de cours et de tests qui afficheront la meilleure tentative de score pour tout apprenant dans les rapports.

### `allow_coach_feedback_exercises`

**Autoriser les coachs à commenter lors de la révision des exercices**

Permettre aux coachs de modifier les commentaires lors de la révision des exercices.

*Par défaut : `true`*

### `allow_edit_exercise_in_lp`

**Autoriser les enseignants à modifier les tests dans les parcours d'apprentissage**

Par défaut, Chamilo empêche la modification des tests inclus dans un parcours d'apprentissage. Cela évite des modifications qui pourraient affecter différemment les apprenants (passés et futurs) en termes de résultats et/ou de progression dans le parcours d'apprentissage. Cette option permet aux enseignants de contourner cette restriction.

### `allow_exercise_categories`

**Activer les catégories de tests**

Les catégories de tests ne sont pas activées par défaut car elles ajoutent un niveau de complexité. Activez cette fonctionnalité pour faire apparaître toutes les icônes de gestion liées aux catégories de tests.

*Par défaut : `false`*

### `allow_mandatory_question_in_category`

**Activer la sélection de questions obligatoires**

Permettre la sélection de questions obligatoires dans un test lors de l'utilisation de catégories aléatoires.

*Par défaut : `false`*

### `allow_notification_setting_per_exercise`

**Paramètres de notification de test au niveau du test**

Activer la configuration des notifications de soumission de test au niveau du test plutôt qu'au niveau du cours. Revient aux paramètres au niveau du cours si non défini au niveau du test.

*Par défaut : `false`*

### `allow_quick_question_description_popup`

**Ajout rapide d'image à une question**

Activer une icône supplémentaire dans la liste des questions de test pour ajouter une image comme description de la question. Cela accélère considérablement l'édition des questions lorsque les questions sont dans le titre et que la description ne contient qu'une image.

*Par défaut : `false`*

### `allow_quiz_question_feedback`

**Ajouter un retour sur la question en cas de réponse incorrecte**

Par défaut, Chamilo permet d'afficher un retour sur chaque réponse d'une question. Avec cette option, un champ supplémentaire est créé pour fournir un retour prédéfini à l'ensemble de la question. Ce retour n'apparaîtra que si l'utilisateur a répondu incorrectement.

*Par défaut : `false`*

### `allow_quiz_results_page_config`

**Activer la configuration de la page de résultats des tests**

Définir un tableau de paramètres que vous souhaitez appliquer à toutes les pages de résultats des tests. Les paramètres peuvent être ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ et potentiellement d'autres à l'avenir. Consultez ‘getPageConfigurationAttribute’ dans le code pour voir ce qui est utilisé.

*Par défaut : `false`*

### `allow_quiz_show_previous_button_setting`

**Afficher le bouton 'précédent' dans le test pour naviguer entre les questions**

Définissez cette option sur false pour désactiver le bouton 'précédent' lors de la réponse aux questions d'un test, obligeant ainsi les utilisateurs à toujours avancer.

*Par défaut : `false`*

### `allow_teacher_comment_audio`

**Retour audio sur les réponses soumises**

Permettre aux enseignants de fournir un retour aux utilisateurs via audio (en alternative au texte) sur chaque question d'un test.

*Par défaut : `true`*

### `allow_time_per_question`

**Activer le temps par question dans les tests**

Par défaut, il est uniquement possible de limiter le temps par test. Limiter le temps par question ajoute une couche supplémentaire de possibilités, et vous pouvez (avec prudence) combiner les deux.

*Par défaut : `false`*

### `block_category_questions`

**Verrouiller les questions des catégories précédentes dans un test**

Lorsque cette option est utilisée, une option supplémentaire apparaîtra dans la configuration du test. Lors de l'utilisation d'un test avec plusieurs catégories de questions et en demandant une distribution par catégorie, cela permettra à l'utilisateur de naviguer dans les questions par catégorie. Une fois qu'une catégorie est terminée, il passe à la catégorie suivante et ne peut pas revenir à la catégorie précédente.

*Par défaut : `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquer l'envoi de notifications de test au coach général**

Les apprenants qui terminent un test envoient généralement des notifications aux coachs, y compris au coach général de la session. Activez cette option pour exclure le coach général de ces notifications.

*Par défaut : `false`*

### `configure_exercise_visibility_in_course`

**Activer pour contourner la configuration de l'exercice invisible en session au niveau du cours de base**

Permettre la configuration de l'invisibilité de l'exercice en session dans le cours de base pour contourner la configuration globale. Si non défini, le paramètre global est utilisé.

*Par défaut : `false`*

### `disable_clean_exercise_results_for_teachers`

**Désactiver 'nettoyer les résultats' pour les enseignants**

Désactiver l'option de suppression des résultats de test dans la liste des tests. Cela est souvent utilisé lorsque des enseignants moins prudents gèrent des cours, pour éviter des erreurs critiques.

*Par défaut : `true`*

### `email_alert_manager_on_new_quiz`

**Paramètre par défaut d'alerte par e-mail pour un nouveau quiz**

Détermine si vous souhaitez que les gestionnaires de cours (enseignants) soient notifiés par e-mail lorsqu'un quiz est répondu par un étudiant. C'est la valeur par défaut attribuée à tous les nouveaux cours, mais chaque enseignant peut encore modifier ce paramètre dans son propre cours.

*Par défaut : `true`*

### `enable_quiz_scenario`

**Activer le scénario de quiz**

À partir de là, vous pourrez créer des exercices qui proposent différentes questions en fonction des réponses de l'utilisateur.

*Par défaut : `true`*

### `exercise_additional_teacher_modify_actions`

**Liens supplémentaires pour les enseignants dans la liste des tests**

Configurer des éléments de rappel pour générer de nouvelles icônes d'action pour les enseignants du côté droit de la liste des tests, sous la forme d'un tableau, par exemple ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Afficher le nom d'utilisateur dans la page de résultats des tests**

Afficher le nom d'utilisateur (au lieu de, ou en plus des informations utilisateur) sur la page de résultats des tests.

*Par défaut : `false`*

### `exercise_category_report_user_extra_fields`

**Ajouter des champs supplémentaires utilisateur dans le rapport de catégorie d'exercice**

Définir un tableau avec la liste des champs supplémentaires utilisateur à ajouter au rapport.

### `exercise_category_round_score_in_export`

**Arrondir le score dans les exportations de tests**

Lorsque cette option est activée, les scores des tests sont arrondis à l'entier le plus proche lors de l'exportation des rapports d'exercices.

*Par défaut : `false`*

### `exercise_embeddable_extra_types`

**Types de questions intégrables**

Par défaut, seules les questions à réponse unique et à réponses multiples sont prises en compte pour décider si un test peut être intégré dans une vidéo ou non. Avec cette option, vous pouvez décider que davantage de types de questions sont disponibles. Sachez que tous les types de questions ne s'intègrent pas bien dans l'espace attribué aux vidéos. Les types de questions sont disponibles dans le code dans question.class.php.

### `exercise_hide_ip`

**Masquer l'adresse IP de l'utilisateur dans les rapports de test**

Par défaut, nous affichons les informations de l'utilisateur et son adresse IP, mais cela peut être considéré comme des données personnelles, donc cette option vous permet de supprimer cette information de tous les rapports de test.

*Par défaut : `false`*

### `exercise_hide_label`

**Masquer le ruban de question (correct/incorrect) dans les résultats des tests**

Dans les résultats des tests, un ruban apparaît par défaut pour indiquer si la réponse était correcte ou incorrecte. Activez cette option pour supprimer le ruban globalement.

*Par défaut : `false`*

### `exercise_invisible_in_session`

**Exercice invisible en session**

Si un exercice est visible dans le cours de base, il apparaît invisible dans la session. Si un exercice est invisible dans le cours de base, il n'apparaît pas dans la session.

*Par défaut : `false`*

### `exercise_max_editors_in_page`

**Nombre maximum d'éditeurs dans l'écran de résultat d'exercice**

En raison du grand nombre de questions qui peuvent apparaître dans un exercice, l'écran de correction, permettant à l'enseignant d'ajouter des commentaires à chaque réponse, peut être très lent à charger. Définissez ce nombre à 5 pour demander à la plateforme de n'afficher les éditeurs WYSIWYG que jusqu'à un certain nombre de réponses à l'écran. Cela accélérera considérablement le temps de chargement de la page de correction, mais supprimera les éditeurs WYSIWYG et laissera uniquement un éditeur de texte brut.

*Par défaut : `0`*

### `exercise_max_score`

**Score maximum des exercices**

Définir un score maximum (généralement 10, 20 ou 100) pour tous les exercices de la plateforme. Cela définira comment les résultats finaux sont affichés aux utilisateurs et aux enseignants.

*Par défaut : `20`*

### `exercise_min_score`

**Score minimum des exercices**

Définir un score minimum (généralement 0) pour tous les exercices de la plateforme. Cela définira comment les résultats finaux sont affichés aux utilisateurs et aux enseignants.

*Par défaut : `0`*

### `exercise_result_end_text_html_strict_filtering`

**Contourner le filtrage HTML dans les messages de fin de test**

Considérer que les messages à la fin des tests sont toujours sûrs. Supprimer le filtre permet d'utiliser du JavaScript à cet endroit.

*Par défaut : `false`*

### `exercise_score_format`

**Format de score des tests**

Sélectionnez parmi les formes suivantes pour l'affichage du score des utilisateurs dans divers rapports : 1 = SCORE_AVERAGE (5 / 10) ; 2 = SCORE_PERCENT (50 %) ; 3 = SCORE_DIV_PERCENT (5 / 10 (50 %)). Utilisez l'ID numérique de la forme que vous souhaitez utiliser.

*Par défaut : `0`*

### `exercises_disable_new_attempts`

**Désactiver les nouvelles tentatives de test**

Désactiver globalement les nouvelles tentatives de test. Généralement utilisé lorsqu'il y a un problème avec les tests en général et que vous souhaitez du temps pour analyser sans bloquer toute la plateforme.

*Par défaut : `false`*

### `hide_free_question_score`

**Masquer le score des questions ouvertes**

Masquer le fait que les questions ouvertes (y compris audio et annotations) ont un score en cachant l'affichage du score dans tous les rapports destinés aux apprenants.

*Par défaut : `false`*

### `hide_user_info_in_quiz_result`

**Masquer les informations utilisateur sur la page de résultats des tests**

La page de résultats des tests par défaut affiche une fiche utilisateur (photo, nom, etc.) qui, dans certains contextes, peut être considérée comme dépassant les limites du traitement des données personnelles. Activez cette option pour supprimer les détails de l'utilisateur des résultats des tests.

*Par défaut : `false`*

### `limit_exercise_teacher_access`

**Limiter les permissions des enseignants sur les tests**

Lorsque cette option est activée, les enseignants ne peuvent pas supprimer des tests ni des questions, modifier la visibilité des tests, télécharger en QTI, nettoyer les résultats, etc.

*Par défaut : `false`*

### `my_courses_show_pending_exercise_attempts`

**Liste globale des tests en attente**

Activer pour afficher à l'utilisateur final une page avec la liste des tests en attente dans tous les cours.

*Par défaut : `false`*

### `question_exercise_html_strict_filtering`

**Contourner le filtrage HTML dans les questions de test**

Considérer que le texte des questions dans les tests est toujours sûr. Supprimer le filtre permet d'utiliser du JavaScript à cet endroit.

*Par défaut : `false`*

### `question_pagination_length`

**Longueur de pagination des questions pour les enseignants**

Nombre de questions à afficher sur chaque page lors de l'utilisation de l'option de pagination des questions pour les enseignants.

*Par défaut : `20`*

### `quiz_answer_extra_recording`

**Activer l'enregistrement supplémentaire des réponses aux tests**

Activer l'enregistrement de toutes les réponses (même temporaires) dans la table track_e_attempt_recording. Cette fonctionnalité est expérimentale et peut créer des problèmes dans les pages de rapport lors de la tentative de notation d'un test.

*Par défaut : `false`*

### `quiz_check_all_answers_before_end_test`

**Vérifier toutes les réponses avant de soumettre le test**

Afficher une fenêtre contextuelle avec la liste des questions répondues/non répondues avant de soumettre le test.

*Par défaut : `false`*

### `quiz_check_button_enable`

**Ajouter une vérification du processus de sauvegarde des réponses avant le test**

S'assurer que les utilisateurs sont prêts à commencer le test en fournissant une simulation du processus de sauvegarde des questions avant d'entrer dans le test. Cela permet une détection précoce de certains problèmes de connexion et réduit les frictions dans l'expérience utilisateur.

*Par défaut : `false`*

### `quiz_confirm_saved_answers`

**Ajouter une case à cocher pour la confirmation du nombre de réponses**

Cette option ajoute une case à cocher à la fin de chaque test demandant à l'utilisateur de confirmer le nombre de réponses sauvegardées. Cela fournit de meilleures données d'audit pour les tests critiques.

*Par défaut : `false`*

### `quiz_discard_orphan_in_course_export`

**Ignorer les questions orphelines lors de l'exportation de cours**

Lors de l'exportation d'un cours, ne pas exporter les questions qui ne font partie d'aucun test.

*Par défaut : `false`*

### `quiz_generate_certificate_ending`

**Générer un certificat à la fin du test**

Générer un certificat à la fin d'un quiz. Le quiz doit être lié à l'outil de carnet de notes et avoir un pourcentage de réussite configuré.

*Par défaut : `false`*

### `quiz_hide_attempts_table_on_start_page`

**Masquer le tableau des tentatives sur la page de démarrage du test**

Masquer le tableau affichant toutes les tentatives précédentes sur la page de démarrage du test.

*Par défaut : `false`*

### `quiz_hide_question_number`

**Masquer le numéro de la question**

Masquer la numérotation incrémentielle des questions lors de la réalisation d'un test.

*Par défaut : `false`*

### `quiz_image_zoom`

**Activer le zoom sur les images des tests**

Activer cette fonctionnalité pour permettre aux utilisateurs de zoomer sur les images utilisées dans les tests.

### `quiz_keep_alive_ping_interval`

**Maintenir la session active dans les tests**

Maintenir la session active en envoyant un signal de ping régulier au serveur toutes les x secondes, définies ici. Nous recommandons une fois toutes les 300 secondes.

*Par défaut : `0`*

### `quiz_open_question_decimal_score`

**Score décimal dans les types de questions ouvertes**

Permettre à l'enseignant d'évaluer les types de questions ouvertes, d'expression orale et d'annotation avec un score décimal.

*Par défaut : `false`*

### `quiz_prevent_copy_paste`

**Bloquer le copier-coller dans les tests**

Bloquer les touches copier/coller/enregistrer/imprimer et les clics droits dans les exercices.

*Par défaut : `false`*

### `quiz_question_delete_automatically_when_deleting_exercise`

**Supprimer automatiquement les questions lors de la suppression d'un test**

Le comportement par défaut est de rendre les questions orphelines lorsque le seul test qui les utilise est supprimé. Lorsque cette option est activée, toutes les questions qui deviendraient autrement orphelines sont également supprimées.

*Par défaut : `false`*

### `quiz_results_answers_report`

**Afficher un lien pour télécharger les résultats des tests**

Sur la page de résultats des tests, afficher un lien pour télécharger les résultats sous forme de fichier.

*Par défaut : `false`*

### `quiz_show_description_on_results_page`

**Toujours afficher la description du test sur la page de résultats**

Lorsque cette option est activée, la description du test est toujours affichée sur la page de résultats après la fin du test.

*Par défaut : `false`*

### `score_grade_model`

**Modèle de notes de score**

Définir un tableau de plages de scores et de couleurs pour afficher les rapports en utilisant ce modèle. Cela permet d'afficher des couleurs plutôt que des notes numériques.

### `send_score_in_exam_notification_mail_to_manager`

**Ajouter le score dans la notification par e-mail de soumission de test**

Ajouter le score de l'apprenant à la notification par e-mail envoyée à l'enseignant après la soumission d'un test.

*Par défaut : `false`*

### `show_exercise_attempts_in_all_user_sessions`

**Afficher les tentatives de test de toutes les sessions dans le rapport des tests en attente**

Afficher les tentatives de test des utilisateurs dans toutes les sessions où le coach général a accès dans le rapport des tests en attente.

*Par défaut : `false`*

### `show_exercise_expected_choice`

**Afficher le choix attendu dans les résultats des tests**

Afficher le choix attendu et un statut (correct/incorrect) pour chaque réponse sur la page de résultats des tests (si le test a été configuré pour afficher les résultats).

*Par défaut : `false`*

### `show_exercise_question_certainty_ribbon_result`

**Afficher le score pour les questions de degré de certitude**

Par défaut, Chamilo n'affiche pas de score pour les types de questions de degré de certitude.

*Par défaut : `false`*

### `show_exercise_session_attempts_in_base_course`

**Afficher les tentatives de test de toutes les sessions dans le cours de base**

Afficher les tentatives de test des utilisateurs dans toutes les sessions à l'enseignant dans le cours de base.

*Par défaut : `false`*

### `show_official_code_exercise_result_list`

**Afficher le code officiel dans les résultats des exercices**

Détermine si le code officiel des étudiants doit être affiché dans les rapports de résultats des exercices.

*Par défaut : `false`*

### `show_question_id`

**Afficher les ID des questions dans les tests**

Afficher les ID internes des questions pour permettre aux utilisateurs de noter les problèmes sur des questions spécifiques et de les signaler plus efficacement.

*Par défaut : `false`*

### `show_question_pagination`

**Afficher la pagination des questions pour les enseignants**

Pour les tests avec de nombreuses questions, utiliser la pagination si le nombre de questions est supérieur à ce paramètre. Définir à 0 pour empêcher l'utilisation de la pagination.

*Par défaut : `100`*

### `tracking_my_progress_show_deleted_exercises`

**Afficher les tests supprimés dans 'Mon progrès'**

Activer cette option pour afficher, sur la page 'Mon progrès', les résultats de tous les tests que vous avez passés, même ceux qui ont été supprimés.

*Par défaut : `false`*