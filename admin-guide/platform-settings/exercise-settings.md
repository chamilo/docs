# Paramètres des exercices (tests)

Valeurs par défaut et comportement de l’outil **Exercices (tests)** — affichage des questions, notation, tentatives, etc.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Exercices (tests)**. Cette catégorie contient **64 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_exercise_best_attempt_in_report`

**Activer l’affichage de la meilleure tentative de score**

Fournir une liste d’identifiants de cours et de tests qui afficheront la meilleure tentative de score de tout apprenant dans les rapports.

### `allow_coach_feedback_exercises`

**Autoriser les tuteurs à commenter lors de la relecture des exercices**

Autoriser les tuteurs à modifier le feedback lors de la relecture des exercices

*Par défaut : `true`*

### `allow_edit_exercise_in_lp`

**Autoriser les enseignants à modifier les tests dans les parcours d’apprentissage**

Par défaut, Chamilo vous empêche de modifier les tests inclus dans un parcours d’apprentissage. Cela vise à éviter des changements qui affecteraient différemment les apprenants (passés et futurs) concernant les résultats et/ou la progression dans le parcours. Cette option permet aux enseignants de contourner cette restriction.


### `allow_exercise_categories`

**Activer les catégories de tests**

Les catégories de tests ne sont pas activées par défaut, car elles ajoutent un niveau de complexité. Activez cette fonctionnalité pour faire apparaître toutes les icônes de gestion liées aux catégories de tests.

*Par défaut : `false`*

### `allow_mandatory_question_in_category`

**Activer la sélection de questions obligatoires**

Activer la sélection de questions obligatoires dans un test lors de l’utilisation de catégories aléatoires.

*Par défaut : `false`*

### `allow_notification_setting_per_exercise`

**Paramètres de notification de test au niveau du test**

Activer la configuration des notifications d’envoi de test au niveau du test plutôt qu’au niveau du cours. Recours aux paramètres de cours s’ils ne sont pas définis au niveau du test.

*Par défaut : `false`*

### `allow_quick_question_description_popup`

**Ajout rapide d’image à une question**

Activer une icône supplémentaire dans la liste des questions du test pour ajouter une image comme description de question. Cela accélère considérablement l’édition des questions lorsque celles-ci sont dans le titre et que la description ne contient qu’une image.

*Par défaut : `false`*

### `allow_quiz_question_feedback`

**Ajouter un feedback de question en cas de mauvaise réponse**

Par défaut, Chamilo vous permet d’afficher un feedback sur chaque réponse d’une question. Avec cette option, un champ supplémentaire est créé pour fournir un feedback prédéfini à l’ensemble de la question. Ce feedback n’apparaîtra que si l’utilisateur a mal répondu.

*Par défaut : `false`*

### `allow_quiz_results_page_config`

**Activer la configuration de la page de résultats du test**

Définir un tableau de paramètres à appliquer à toutes les pages de résultats de tests. Les paramètres peuvent être ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ et éventuellement d’autres à l’avenir. Recherchez ‘getPageConfigurationAttribute’ dans le code pour voir ce qui est utilisé.

*Par défaut : `false`*

### `allow_quiz_show_previous_button_setting`

**Afficher le bouton « précédent » dans le test pour naviguer entre les questions**

Définir cette option sur false pour désactiver le bouton « précédent » lors de la réponse aux questions d’un test, forçant ainsi les utilisateurs à toujours avancer.

*Par défaut : `false`*

### `allow_teacher_comment_audio`

**Feedback audio aux réponses soumises**

Autoriser les enseignants à fournir un feedback aux utilisateurs par audio (en alternative au texte) sur chaque question d’un test.

*Par défaut : `true`*

### `allow_time_per_question`

**Activer le temps par question dans les tests**

Par défaut, il n’est possible de limiter le temps que par test. Le limiter par question ajoute une couche supplémentaire de possibilités, et vous pouvez (avec prudence) combiner les deux.

*Par défaut : `false`*

### `block_category_questions`

**Verrouiller les questions des catégories précédentes dans un test**

Lorsque cette option est utilisée, une option supplémentaire apparaît dans la configuration du test. Lors de l’utilisation d’un test avec plusieurs catégories de questions et d’une distribution par catégorie, cela permettra à l’utilisateur de naviguer dans les questions par catégorie. Une fois une catégorie terminée, il ou elle passe à la catégorie suivante et ne peut pas revenir à la catégorie précédente.

*Par défaut : `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquer l’envoi des notifications de test au tuteur général**

Lorsque les apprenants terminent un test, des notifications sont généralement envoyées aux tuteurs, y compris au tuteur général de session. Activez cette option pour omettre le tuteur général de ces notifications.

*Par défaut : `false`*

### `configure_exercise_visibility_in_course`

**Activer le contournement de la configuration « Exercice invisible en session » au niveau du cours de base**

Permet d’activer la configuration de l’invisibilité de l’exercice en session dans le cours de base afin de contourner la configuration globale. Si ce paramètre n’est pas défini, le paramètre global est utilisé.

*Valeur par défaut : `false`*

### `disable_clean_exercise_results_for_teachers`

**Désactiver « nettoyer les résultats » pour les enseignants**

Désactive l’option permettant de supprimer les résultats des tests depuis la liste des tests. Cette option est souvent utilisée lorsque des enseignants moins attentifs gèrent des cours, afin d’éviter des erreurs critiques.

*Valeur par défaut : `true`*

### `email_alert_manager_on_new_quiz`

**Paramètre d’alerte par e-mail par défaut lors d’un nouveau quiz**

Indique si vous souhaitez que les responsables de cours (enseignants) soient notifiés par e-mail lorsqu’un quiz est répondu par un étudiant. Il s’agit de la valeur par défaut attribuée à tous les nouveaux cours, mais chaque enseignant peut encore modifier ce paramètre dans son propre cours.

*Valeur par défaut : `true`*

### `enable_quiz_scenario`

**Activer le scénario de quiz**

À partir d’ici, vous pourrez créer des exercices qui proposent des questions différentes selon les réponses de l’utilisateur.

*Valeur par défaut : `true`*

### `exercise_additional_teacher_modify_actions`

**Liens supplémentaires pour les enseignants dans la liste des tests**

Configurez des éléments de rappel (callback) pour générer de nouvelles icônes d’action destinées aux enseignants, à droite de la liste des tests, sous la forme d’un tableau, par ex. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Afficher le nom d’utilisateur sur la page des résultats de test**

Affiche le nom d’utilisateur (à la place ou en plus des informations utilisateur) sur la page des résultats de test.

*Valeur par défaut : `false`*

### `exercise_category_report_user_extra_fields`

**Ajouter des champs utilisateur supplémentaires dans le rapport par catégorie d’exercice**

Définissez un tableau contenant la liste des champs utilisateur supplémentaires à ajouter au rapport.

### `exercise_category_round_score_in_export`

**Arrondir le score dans les exports de tests**

Lorsque cette option est activée, les scores des tests sont arrondis à l’entier le plus proche lors de l’export des rapports d’exercices.

*Valeur par défaut : `false`*

### `exercise_embeddable_extra_types`

**Types de questions intégrables**

Par défaut, seules les questions à réponse unique et à réponses multiples sont prises en compte pour décider si un test peut être intégré dans une vidéo. Avec cette option, vous pouvez décider que davantage de types de questions sont disponibles. Sachez que tous les types de questions ne s’adaptent pas bien à l’espace attribué aux vidéos. Les types de questions sont disponibles dans le code dans question.class.php.

### `exercise_hide_ip`

**Masquer l’adresse IP de l’utilisateur dans les rapports de tests**

Par défaut, nous affichons les informations de l’utilisateur et son adresse IP, mais cela peut être considéré comme des données personnelles ; cette option vous permet donc de retirer ces informations de tous les rapports de tests.

*Valeur par défaut : `false`*

### `exercise_hide_label`

**Masquer le ruban de question (juste/faux) dans les résultats de test**

Dans les résultats de test, un ruban apparaît par défaut pour indiquer si la réponse était juste ou fausse. Activez cette option pour supprimer le ruban de manière globale.

*Valeur par défaut : `false`*

### `exercise_invisible_in_session`

**Exercice invisible en session**

Si un exercice est visible dans le cours de base, il apparaît invisible dans la session. Si un exercice est invisible dans le cours de base, il n’apparaît pas dans la session.

*Valeur par défaut : `false`*

### `exercise_max_editors_in_page`

**Nombre maximal d’éditeurs sur l’écran de résultats d’exercice**

En raison du très grand nombre de questions pouvant apparaître dans un exercice, l’écran de correction, qui permet à l’enseignant d’ajouter des commentaires à chaque réponse, peut être très lent à charger. Définissez ce nombre à 5 pour demander à la plateforme de n’afficher des éditeurs WYSIWYG que jusqu’à un certain nombre de réponses à l’écran. Cela accélérera considérablement le chargement de la page de correction, mais supprimera les éditeurs WYSIWYG et ne laissera qu’un éditeur de texte brut.

*Valeur par défaut : `0`*


### `exercise_max_score`

**Score maximal des exercices**

Définissez un score maximal (généralement 10, 20 ou 100) pour tous les exercices de la plateforme. Cela déterminera la façon dont les résultats finaux sont présentés aux utilisateurs et aux enseignants.

*Valeur par défaut : `20`*


### `exercise_min_score`

**Score minimal des exercices**

Définissez un score minimal (généralement 0) pour tous les exercices de la plateforme. Cela déterminera la façon dont les résultats finaux sont présentés aux utilisateurs et aux enseignants.

*Valeur par défaut : `0`*


### `exercise_result_end_text_html_strict_filtering`

**Contourner le filtrage HTML dans les messages de fin de test**

Considérez que les messages à la fin des tests sont toujours sûrs. La suppression du filtre permet d’y utiliser du JavaScript.

*Valeur par défaut : `false`*


### `exercise_score_format`

**Format du score des tests**

Choisissez parmi les formes suivantes pour l’affichage du score des utilisateurs dans divers rapports : 1 = SCORE_AVERAGE (5 / 10) ; 2 = SCORE_PERCENT (50 %) ; 3 = SCORE_DIV_PERCENT (5 / 10 (50 %)). Utilisez l’identifiant numérique de la forme que vous souhaitez utiliser.

*Valeur par défaut : `0`*

### `exercises_disable_new_attempts`

**Désactiver les nouvelles tentatives de test**

Désactive globalement les nouvelles tentatives de test. Généralement utilisé lorsqu’il y a un problème avec les tests en général et que vous souhaitez disposer d’un peu de temps pour analyser sans bloquer toute la plateforme.

*Valeur par défaut : `false`*

### `hide_free_question_score`

**Masquer le score des questions ouvertes**

Masquer le fait que les questions ouvertes (y compris audio et annotations) ont un score en masquant l'affichage du score dans tous les rapports destinés aux apprenants.

*Par défaut : `false`*


### `hide_user_info_in_quiz_result`

**Masquer les informations utilisateur sur la page de résultats du test**

La page de résultats du test affiche par défaut une fiche utilisateur (photo, nom, etc.) qui, dans certains contextes, peut être considérée comme allant trop loin dans le traitement des données personnelles. Activez cette option pour retirer les détails utilisateur des résultats du test.

*Par défaut : `false`*


### `limit_exercise_teacher_access`

**Limiter les permissions des enseignants sur les tests**

Lorsqu'elle est activée, les enseignants ne peuvent pas supprimer des tests ni des questions, modifier la visibilité des tests, télécharger vers QTI, nettoyer les résultats, etc.

*Par défaut : `false`*


### `my_courses_show_pending_exercise_attempts`

**Liste globale des tests en attente**

Activer l'affichage, pour l'utilisateur final, d'une page listant les tests en attente dans tous les cours.

*Par défaut : `false`*


### `question_exercise_html_strict_filtering`

**Contourner le filtrage HTML dans les questions de test**

Considérer que le texte des questions dans les tests est toujours sûr. La suppression du filtre rend possible l'utilisation de JavaScript à cet endroit.

*Par défaut : `false`*


### `question_pagination_length`

**Longueur de pagination des questions pour les enseignants**

Nombre de questions à afficher sur chaque page lors de l'utilisation de l'option de pagination des questions pour les enseignants.

*Par défaut : `20`*


### `quiz_answer_extra_recording`

**Activer l'enregistrement supplémentaire des réponses aux tests**

Activer l'enregistrement de toutes les réponses (même temporaires) dans la table track_e_attempt_recording. Cette fonctionnalité est expérimentale et peut créer des problèmes dans les pages de reporting lors de la notation d'un test.

*Par défaut : `false`*


### `quiz_check_all_answers_before_end_test`

**Vérifier toutes les réponses avant de soumettre le test**

Afficher une fenêtre contextuelle avec la liste des questions répondues/non répondues avant de soumettre le test.

*Par défaut : `false`*


### `quiz_check_button_enable`

**Ajouter une vérification du processus d'enregistrement des réponses avant le test**

S'assurer que les utilisateurs sont prêts à commencer le test en proposant une simulation du processus d'enregistrement des questions avant d'entrer dans le test. Cela permet une détection précoce de certains problèmes de connexion et réduit les frictions d'expérience utilisateur.

*Par défaut : `false`*


### `quiz_confirm_saved_answers`

**Ajouter une case à cocher de confirmation du nombre de réponses**

Cette option ajoute une case à cocher à la fin de chaque test demandant à l'utilisateur de confirmer le nombre de réponses enregistrées. Cela fournit de meilleures données d'audit pour les tests critiques.

*Par défaut : `false`*


### `quiz_discard_orphan_in_course_export`

**Écarter les questions orphelines lors de l'export de cours**

Lors de l'export d'un cours, ne pas exporter les questions qui ne font partie d'aucun test.

*Par défaut : `false`*


### `quiz_generate_certificate_ending`

**Générer un certificat à la fin du test**

Générer un certificat à la fin d'un quiz. Le quiz doit être lié dans l'outil carnet de notes et avoir un pourcentage de réussite configuré.

*Par défaut : `false`*


### `quiz_hide_attempts_table_on_start_page`

**Masquer le tableau des tentatives sur la page de démarrage du test**

Masquer le tableau montrant toutes les tentatives précédentes sur la page de démarrage du test.

*Par défaut : `false`*


### `quiz_hide_question_number`

**Masquer le numéro de question**

Masquer la numérotation incrémentale des questions lors de la passation d'un test.

*Par défaut : `false`*


### `quiz_image_zoom`

**Activer le zoom des images dans les tests**

Activer cette fonctionnalité pour permettre aux utilisateurs de zoomer sur les images utilisées dans les tests.

### `quiz_keep_alive_ping_interval`

**Maintenir la session active dans les tests**

Maintenir la session active en envoyant un signal ping régulier au serveur toutes les x secondes, défini ici. Nous recommandons une fois toutes les 300 secondes.

*Par défaut : `0`*


### `quiz_open_question_decimal_score`

**Score décimal pour les types de questions ouvertes**

Permettre à l'enseignant de noter les types de questions ouvertes, d'expression orale et d'annotation avec un score décimal.

*Par défaut : `false`*


### `quiz_prevent_copy_paste`

**Bloquer le copier-coller dans les tests**

Bloquer les touches copier/coller/enregistrer/imprimer et les clics droits dans les exercices.

*Par défaut : `false`*

### `quiz_question_category_destinations` **v3**

**Activer les tests adaptatifs progressifs par destination de catégorie**

Activer les tests adaptatifs progressifs où chaque catégorie de questions peut rediriger les apprenants vers une autre catégorie en fonction de leur score.

*Par défaut : `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Supprimer automatiquement les questions lors de la suppression du test**

Le comportement par défaut consiste à rendre les questions orphelines lorsque le seul test qui les utilise est supprimé. Lorsqu'elle est activée, cette option garantit que toutes les questions qui se retrouveraient autrement orphelines sont également supprimées.

*Par défaut : `false`*


### `quiz_results_answers_report`

**Afficher un lien pour télécharger les résultats du test**

Sur la page de résultats du test, afficher un lien pour télécharger les résultats sous forme de fichier.

*Par défaut : `false`*


### `quiz_show_description_on_results_page`

**Toujours afficher la description du test sur la page de résultats**

Lorsqu'elle est activée, la description du test est toujours affichée sur la page de résultats après la fin du test.

*Par défaut : `false`*

### `score_grade_model`

**Modèle de notes par scores**

Définir un tableau de plages de scores et de couleurs pour afficher les rapports selon ce modèle. Cela permet d’afficher des couleurs plutôt que des notes numériques.

### `send_score_in_exam_notification_mail_to_manager`

**Ajouter le score dans le courriel de notification de soumission de test**

Ajouter le score de l’apprenant au courriel de notification envoyé à l’enseignant après la soumission d’un test.

*Par défaut : `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Afficher les tentatives de test de toutes les sessions dans le rapport des tests en attente**

Afficher les tentatives de test des utilisateurs dans toutes les sessions auxquelles le tuteur général a accès, dans le rapport des tests en attente.

*Par défaut : `false`*


### `show_exercise_expected_choice`

**Afficher le choix attendu dans les résultats du test**

Afficher le choix attendu et un statut (juste/faux) pour chaque réponse sur la page des résultats du test (si le test a été configuré pour afficher les résultats).

*Par défaut : `false`*


### `show_exercise_question_certainty_ribbon_result`

**Afficher le score pour les questions de degré de certitude**

Par défaut, Chamilo n’affiche pas de score pour les types de questions de degré de certitude.

*Par défaut : `false`*


### `show_exercise_session_attempts_in_base_course`

**Afficher les tentatives de test de toutes les sessions dans le cours de base**

Afficher à l’enseignant, dans le cours de base, les tentatives de test des utilisateurs dans toutes les sessions.

*Par défaut : `false`*


### `show_official_code_exercise_result_list`

**Afficher le code officiel dans les résultats des exercices**

Indique s’il faut afficher le code officiel des étudiants dans les rapports de résultats des exercices

*Par défaut : `false`*

### `show_question_id`

**Afficher les identifiants des questions dans les tests**

Afficher les identifiants internes des questions afin de permettre aux utilisateurs de noter les problèmes sur des questions précises et de les signaler plus efficacement.

*Par défaut : `false`*


### `show_question_pagination`

**Afficher la pagination des questions pour les enseignants**

Pour les tests comportant de nombreuses questions, utiliser la pagination si le nombre de questions est supérieur à ce paramètre. Définir à 0 pour empêcher l’utilisation de la pagination.

*Par défaut : `100`*


### `tracking_my_progress_show_deleted_exercises`

**Afficher les tests supprimés dans « Ma progression »**

Activer cette option pour afficher, sur la page « Ma progression », les résultats de tous les tests que vous avez passés, y compris ceux qui ont été supprimés.

*Par défaut : `false`*