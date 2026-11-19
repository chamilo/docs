# Paramètres des exercices (tests)

Valeurs par défaut et comportement de l'outil **Exercices (tests)** — affichage des questions, notation, tentatives et éléments similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Exercices (tests)**. Cette catégorie contient **66 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_exercise_best_attempt_in_report`

**Activer l'affichage de la tentative au meilleur score**

Fournir une liste d'identifiants de cours et de tests qui afficheront la tentative au meilleur score pour tout apprenant dans les rapports.

### `allow_coach_feedback_exercises`

**Autoriser les tuteurs à commenter lors de la révision des exercices**

Autoriser les tuteurs à modifier les commentaires lors de la révision des exercices

*Valeur par défaut : `true`*

### `allow_edit_exercise_in_lp`

**Autoriser les enseignants à modifier les tests dans les parcours d'apprentissage**

Par défaut, Chamilo vous empêche de modifier les tests inclus dans un parcours d'apprentissage. Cela vise à éviter des modifications qui affecteraient différemment les apprenants (passés et futurs) concernant les résultats et/ou la progression dans le parcours d'apprentissage. Cette option permet aux enseignants de contourner cette restriction.


### `allow_exercise_categories`

**Activer les catégories de tests**

Les catégories de tests ne sont pas activées par défaut, car elles ajoutent un niveau de complexité. Activez cette fonctionnalité pour que toutes les icônes de gestion liées aux catégories de tests apparaissent.

*Valeur par défaut : `false`*

### `allow_mandatory_question_in_category`

**Activer la sélection de questions obligatoires**

Activer la sélection de questions obligatoires dans un test lors de l'utilisation de catégories aléatoires.

*Valeur par défaut : `false`*

### `allow_notification_setting_per_exercise`

**Paramètres de notification des tests au niveau du test**

Activer la configuration des notifications de soumission de test au niveau du test plutôt qu'au niveau du cours. Repli sur les paramètres au niveau du cours s'ils ne sont pas définis au niveau du test.

*Valeur par défaut : `false`*

### `allow_quick_question_description_popup`

**Ajout rapide d'une image à une question**

Activer une icône supplémentaire dans la liste des questions de test pour ajouter une image comme description de la question. Cela accélère considérablement l'édition des questions lorsque les questions figurent dans le titre et que la description ne contient qu'une image.

*Valeur par défaut : `false`*

### `allow_quiz_question_feedback`

**Ajouter un commentaire de question en cas de réponse incorrecte**

Par défaut, Chamilo vous permet d'afficher un commentaire sur chaque réponse d'une question. Avec cette option, un champ supplémentaire est créé pour fournir un commentaire prédéfini à l'ensemble de la question. Ce commentaire n'apparaîtra que si l'utilisateur a répondu incorrectement.

*Valeur par défaut : `false`*

### `allow_quiz_results_page_config`

**Activer la configuration de la page de résultats des tests**

Définir un tableau de paramètres à appliquer à toutes les pages de résultats des tests. Les paramètres peuvent être ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ et éventuellement d'autres à l'avenir. Recherchez ‘getPageConfigurationAttribute’ dans le code pour voir ce qui est utilisé.

*Valeur par défaut : `false`*

### `allow_quiz_show_previous_button_setting`

**Afficher le bouton « précédent » dans le test pour naviguer entre les questions**

Définissez cette option sur false pour désactiver le bouton « précédent » lors de la réponse aux questions d'un test, obligeant ainsi les utilisateurs à toujours avancer.

*Valeur par défaut : `false`*

### `allow_teacher_comment_audio`

**Commentaire audio sur les réponses soumises**

Autoriser les enseignants à fournir un commentaire aux utilisateurs par audio (en alternative au texte) sur chaque question d'un test.

*Valeur par défaut : `true`*

### `allow_time_per_question`

**Activer le temps par question dans les tests**

Par défaut, il n'est possible de limiter le temps que par test. Le limiter par question ajoute une couche supplémentaire de possibilités, et vous pouvez (avec prudence) combiner les deux.

*Valeur par défaut : `false`*

### `block_category_questions`

**Verrouiller les questions des catégories précédentes dans un test**

Lorsque cette option est utilisée, une option supplémentaire apparaît dans la configuration du test. Lors de l'utilisation d'un test comportant plusieurs catégories de questions et demandant une répartition par catégorie, cela permet à l'utilisateur de naviguer entre les questions par catégorie. Une fois une catégorie terminée, il ou elle passe à la catégorie suivante et ne peut pas revenir à la catégorie précédente.

*Valeur par défaut : `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquer l'envoi des notifications de test au tuteur général**

Lorsque les apprenants terminent un test, des notifications sont généralement envoyées aux tuteurs, y compris au tuteur général de la session. Activez cette option pour exclure le tuteur général de ces notifications.

*Valeur par défaut : `false`*

### `configure_exercise_visibility_in_course`

**Activer pour contourner la configuration « Exercice invisible dans la session » au niveau du cours de base**

Permet d’activer la configuration de l’invisibilité de l’exercice dans la session au niveau du cours de base afin de contourner la configuration globale. Si cette option n’est pas définie, le paramètre global est utilisé.

*Valeur par défaut : `false`*

### `disable_clean_exercise_results_for_teachers`

**Désactiver « nettoyer les résultats » pour les enseignants**

Désactive l’option permettant de supprimer les résultats des tests depuis la liste des tests. Cette option est souvent utilisée lorsque des enseignants moins attentifs gèrent des cours, afin d’éviter des erreurs critiques.

*Valeur par défaut : `true`*

### `email_alert_manager_on_new_quiz`

**Paramètre d’alerte par e-mail par défaut pour un nouveau quiz**

Indique si vous souhaitez que les responsables de cours (enseignants) soient notifiés par e-mail lorsqu’un quiz est répondu par un étudiant. Il s’agit de la valeur par défaut attribuée à tous les nouveaux cours, mais chaque enseignant peut encore modifier ce paramètre dans son propre cours.

*Valeur par défaut : `true`*

### `enable_quiz_scenario`

**Activer le scénario de quiz**

À partir de là, vous pourrez créer des exercices qui proposent des questions différentes selon les réponses de l’utilisateur.

*Valeur par défaut : `true`*

### `exercise_additional_teacher_modify_actions`

**Liens supplémentaires pour les enseignants dans la liste des tests**

Configurez des éléments de rappel (callback) afin de générer de nouvelles icônes d’action pour les enseignants, à droite de la liste des tests, sous la forme d’un tableau, par exemple ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Afficher le nom d’utilisateur sur la page des résultats des tests**

Affiche le nom d’utilisateur (à la place des informations de l’utilisateur, ou en plus de celles-ci) sur la page des résultats des tests.

*Valeur par défaut : `false`*

### `exercise_category_report_user_extra_fields`

**Ajouter des champs supplémentaires de l’utilisateur dans le rapport par catégorie d’exercices**

Définissez un tableau contenant la liste des champs supplémentaires de l’utilisateur à ajouter au rapport.

### `exercise_category_round_score_in_export`

**Arrondir le score dans les exportations de tests**

Lorsque cette option est activée, les scores des tests sont arrondis à l’entier le plus proche lors de l’exportation des rapports d’exercices.

*Valeur par défaut : `false`*

### `exercise_default_visibility_can_be_modified_in_course` **v3**

**La visibilité par défaut des nouveaux tests peut être modifiée par cours**

Lorsque cette option est activée, les enseignants peuvent choisir, dans les paramètres du cours, la visibilité attribuée aux nouveaux tests de leur cours, au lieu de la valeur par défaut de la plateforme.

*Valeur par défaut : `false`*

Lorsque cette option est activée, une option **Visibilité par défaut des nouveaux tests** apparaît dans la section **Tests** des paramètres du cours. Un cours qui n’a pas choisi de valeur utilise `exercise_default_visibility_on_creation`.

### `exercise_default_visibility_on_creation` **v3**

**Visibilité par défaut des nouveaux tests**

Visibilité attribuée à un nouveau test lorsqu’un enseignant le crée dans un cours. Les enseignants peuvent ensuite modifier la visibilité de chacun d’eux.

*Valeur par défaut : `visible`*

### `exercise_embeddable_extra_types`

**Types de questions intégrables**

Par défaut, seules les questions à réponse unique et à réponses multiples sont prises en compte pour déterminer si un test peut être intégré dans une vidéo ou non. Avec cette option, vous pouvez décider que davantage de types de questions sont disponibles. Sachez que tous les types de questions ne s’adaptent pas correctement à l’espace réservé aux vidéos. Les types de questions sont disponibles dans le code, dans question.class.php.

### `exercise_hide_ip`

**Masquer l’adresse IP de l’utilisateur dans les rapports de tests**

Par défaut, nous affichons les informations de l’utilisateur ainsi que son adresse IP, mais celles-ci peuvent être considérées comme des données personnelles. Cette option vous permet donc de supprimer ces informations de tous les rapports de tests.

*Valeur par défaut : `false`*

### `exercise_hide_label`

**Masquer le ruban de question (correct/incorrect) dans les résultats des tests**

Dans les résultats des tests, un ruban apparaît par défaut pour indiquer si la réponse était correcte ou incorrecte. Activez cette option pour supprimer le ruban de manière globale.

*Valeur par défaut : `false`*

### `exercise_invisible_in_session`

**Exercice invisible dans la session**

Si un exercice est visible dans le cours de base, il apparaît comme invisible dans la session. Si un exercice est invisible dans le cours de base, il n’apparaît pas dans la session.

*Valeur par défaut : `false`*

### `exercise_max_editors_in_page`

**Nombre maximal d’éditeurs sur l’écran des résultats d’exercice**

En raison du nombre potentiellement très élevé de questions pouvant apparaître dans un exercice, l’écran de correction, qui permet à l’enseignant d’ajouter des commentaires à chaque réponse, peut être très lent à charger. Définissez ce nombre sur 5 pour demander à la plateforme de n’afficher des éditeurs WYSIWYG que jusqu’à un certain nombre de réponses à l’écran. Cela accélérera considérablement le temps de chargement de la page de correction, mais supprimera les éditeurs WYSIWYG et ne laissera qu’un éditeur de texte brut.

*Valeur par défaut : `0`*


### `exercise_max_score`

**Score maximal des exercices**

Définissez un score maximal (généralement 10, 20 ou 100) pour tous les exercices de la plateforme. Cela déterminera la manière dont les résultats finaux sont présentés aux utilisateurs et aux enseignants.

*Valeur par défaut : `20`*


### `exercise_min_score`

**Score minimal des exercices**

Définissez un score minimal (généralement 0) pour tous les exercices de la plateforme. Cela déterminera la manière dont les résultats finaux sont présentés aux utilisateurs et aux enseignants.

*Valeur par défaut : `0`*

### `exercise_result_end_text_html_strict_filtering`

**Contourner le filtrage HTML dans les messages de fin de test**

Considérer que les messages de fin de test sont toujours sûrs. La suppression du filtre permet d'y utiliser JavaScript.

*Valeur par défaut : `false`*


### `exercise_score_format`

**Format des scores des tests**

Sélectionnez l'une des formes suivantes pour l'affichage du score des utilisateurs dans divers rapports : 1 = SCORE_AVERAGE (5 / 10) ; 2 = SCORE_PERCENT (50 %) ; 3 = SCORE_DIV_PERCENT (5 / 10 (50 %)). Utilisez l'identifiant numérique de la forme que vous souhaitez utiliser.

*Valeur par défaut : `0`*

### `exercises_disable_new_attempts`

**Désactiver les nouvelles tentatives de test**

Désactive globalement les nouvelles tentatives de test. Généralement utilisé lorsqu'il existe un problème avec les tests en général et que vous souhaitez disposer d'un peu de temps pour analyser sans bloquer l'ensemble de la plateforme.

*Valeur par défaut : `false`*


### `hide_free_question_score`

**Masquer le score des questions ouvertes**

Masque le fait que les questions ouvertes (y compris audio et annotations) ont un score en masquant l'affichage du score dans tous les rapports destinés aux apprenants.

*Valeur par défaut : `false`*


### `hide_user_info_in_quiz_result`

**Masquer les informations utilisateur sur la page de résultats du test**

La page de résultats de test par défaut affiche une fiche utilisateur (photo, nom, etc.) qui peut, dans certains contextes, être considérée comme poussant les limites du traitement des données personnelles. Activez cette option pour retirer les détails de l'utilisateur des résultats du test.

*Valeur par défaut : `false`*


### `limit_exercise_teacher_access`

**Limiter les permissions des enseignants sur les tests**

Lorsqu'elle est activée, les enseignants ne peuvent ni supprimer les tests ni les questions, ni modifier la visibilité des tests, ni télécharger au format QTI, ni nettoyer les résultats, etc.

*Valeur par défaut : `false`*


### `my_courses_show_pending_exercise_attempts`

**Liste globale des tests en attente**

Active l'affichage, pour l'utilisateur final, d'une page contenant la liste des tests en attente dans tous les cours.

*Valeur par défaut : `false`*


### `question_exercise_html_strict_filtering`

**Contourner le filtrage HTML dans les questions de test**

Considérer que le texte des questions des tests est toujours sûr. La suppression du filtre permet d'y utiliser JavaScript.

*Valeur par défaut : `false`*


### `question_pagination_length`

**Longueur de pagination des questions pour les enseignants**

Nombre de questions à afficher sur chaque page lors de l'utilisation de l'option de pagination des questions pour les enseignants.

*Valeur par défaut : `20`*


### `quiz_answer_extra_recording`

**Activer l'enregistrement supplémentaire des réponses aux tests**

Activer l'enregistrement de toutes les réponses (même temporaires) dans la table track_e_attempt_recording. Cette fonctionnalité est expérimentale et peut créer des problèmes dans les pages de rapports lors de la tentative de notation d'un test.

*Valeur par défaut : `false`*


### `quiz_check_all_answers_before_end_test`

**Vérifier toutes les réponses avant de soumettre le test**

Affiche une fenêtre contextuelle avec la liste des questions répondues/non répondues avant la soumission du test.

*Valeur par défaut : `false`*


### `quiz_check_button_enable`

**Ajouter une vérification du processus d'enregistrement des réponses avant le test**

S'assure que les utilisateurs sont prêts à commencer le test en proposant une simulation du processus d'enregistrement des questions avant d'entrer dans le test. Cela permet une détection précoce de certains problèmes de connexion et réduit les frictions dans l'expérience utilisateur.

*Valeur par défaut : `false`*


### `allow_final_exam_access_rule`

**Conditions d'accès avant un test**

Permet aux enseignants de maintenir un test, tel qu'un examen final, fermé jusqu'à ce que l'apprenant ait passé un temps minimum dans le cours et ait renseigné un champ de profil obligatoire. Les enseignants définissent ces conditions dans les paramètres avancés de chaque test. Tant que ce paramètre est désactivé, les conditions ne sont ni affichées ni appliquées.

Le paramètre est activé automatiquement lorsque la plateforme est mise à niveau avec des tests qui possèdent déjà de telles conditions, et par la commande `chamilo:migration:migrate-final-exam-access` lorsqu'elle les écrit.

*Valeur par défaut : `false`*


### `quiz_confirm_saved_answers`

**Ajouter une case à cocher pour la confirmation du nombre de réponses**

Cette option ajoute une case à cocher à la fin de chaque test demandant à l'utilisateur de confirmer le nombre de réponses enregistrées. Cela fournit de meilleures données d'audit pour les tests critiques.

*Valeur par défaut : `false`*


### `quiz_discard_orphan_in_course_export`

**Ignorer les questions orphelines lors de l'exportation de cours**

Lors de l'exportation d'un cours, ne pas exporter les questions qui ne font partie d'aucun test.

*Valeur par défaut : `false`*


### `quiz_generate_certificate_ending`

**Générer un certificat à la fin du test**

Génère un certificat à la fin d'un test. Le test doit être lié dans l'outil de carnet de notes et avoir un pourcentage de réussite configuré.

*Valeur par défaut : `false`*


### `quiz_hide_attempts_table_on_start_page`

**Masquer le tableau des tentatives sur la page de démarrage du test**

Masque le tableau affichant toutes les tentatives précédentes sur la page de démarrage du test.

*Valeur par défaut : `false`*


### `quiz_hide_question_number`

**Masquer le numéro de question**

Masque la numérotation incrémentale des questions lors du passage d'un test.

*Valeur par défaut : `false`*


### `quiz_image_zoom`

**Activer le zoom des images de test**

Activez cette fonctionnalité pour permettre aux utilisateurs de zoomer sur les images utilisées dans les tests.

### `quiz_keep_alive_ping_interval`

**Maintenir la session active dans les tests**

Maintient la session active en envoyant un signal de ping régulier au serveur toutes les x secondes, définies ici. Nous recommandons une fois toutes les 300 secondes.

*Valeur par défaut : `0`*

### `quiz_open_question_decimal_score`

**Score décimal pour les types de questions ouvertes**

Permettre à l’enseignant de noter les types de questions ouvertes, d’expression orale et d’annotation avec un score décimal.

*Valeur par défaut : `false`*


### `quiz_prevent_copy_paste`

**Bloquer le copier-coller dans les tests**

Bloquer les touches de copier/coller/enregistrer/imprimer et les clics droits dans les exercices.

*Valeur par défaut : `false`*

### `quiz_question_category_destinations` **v3**

**Activer les tests adaptatifs progressifs par destination de catégorie**

Activer les tests adaptatifs progressifs dans lesquels chaque catégorie de questions peut rediriger les apprenants vers une autre catégorie en fonction de leur score.

*Valeur par défaut : `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Supprimer automatiquement les questions lors de la suppression d’un test**

Le comportement par défaut consiste à rendre orphelines les questions lorsque le seul test qui les utilise est supprimé. Lorsque cette option est activée, elle garantit que toutes les questions qui deviendraient autrement orphelines sont également supprimées.

*Valeur par défaut : `false`*


### `quiz_results_answers_report`

**Afficher le lien de téléchargement des résultats du test**

Sur la page des résultats du test, afficher un lien permettant de télécharger les résultats sous forme de fichier.

*Valeur par défaut : `false`*


### `quiz_show_description_on_results_page`

**Toujours afficher la description du test sur la page des résultats**

Lorsque cette option est activée, la description du test est toujours affichée sur la page des résultats après la fin du test.

*Valeur par défaut : `false`*


### `score_grade_model`

**Modèle de notes de score**

Définir un tableau de plages de scores et de couleurs pour afficher les rapports selon ce modèle. Cela permet d’afficher des couleurs plutôt que des notes numériques.

### `send_score_in_exam_notification_mail_to_manager`

**Ajouter le score dans la notification par courriel de soumission du test**

Ajouter le score de l’apprenant à la notification par courriel envoyée à l’enseignant après la soumission d’un test.

*Valeur par défaut : `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Afficher les tentatives de test de toutes les sessions dans le rapport des tests en attente**

Afficher les tentatives de test des utilisateurs de toutes les sessions auxquelles le tuteur général a accès dans le rapport des tests en attente.

*Valeur par défaut : `false`*


### `show_exercise_expected_choice`

**Afficher le choix attendu dans les résultats du test**

Afficher le choix attendu et un statut (correct/incorrect) pour chaque réponse sur la page des résultats du test (si le test a été configuré pour afficher les résultats).

*Valeur par défaut : `false`*


### `show_exercise_question_certainty_ribbon_result`

**Afficher le score pour les questions de degré de certitude**

Par défaut, Chamilo n’affiche pas de score pour les types de questions de degré de certitude.

*Valeur par défaut : `false`*


### `show_exercise_session_attempts_in_base_course`

**Afficher les tentatives de test de toutes les sessions dans le cours de base**

Afficher à l’enseignant, dans le cours de base, les tentatives de test des utilisateurs de toutes les sessions.

*Valeur par défaut : `false`*


### `show_official_code_exercise_result_list`

**Afficher le code officiel dans les résultats des exercices**

Indique s’il faut afficher le code officiel des étudiants dans les rapports de résultats des exercices.

*Valeur par défaut : `false`*

### `show_question_id`

**Afficher les identifiants des questions dans les tests**

Afficher les identifiants internes des questions afin de permettre aux utilisateurs de noter les problèmes concernant des questions précises et de les signaler plus efficacement.

*Valeur par défaut : `false`*


### `show_question_pagination`

**Afficher la pagination des questions pour les enseignants**

Pour les tests comportant de nombreuses questions, utiliser la pagination si le nombre de questions est supérieur à ce paramètre. Définir la valeur à 0 pour empêcher l’utilisation de la pagination.

*Valeur par défaut : `100`*


### `tracking_my_progress_show_deleted_exercises`

**Afficher les tests supprimés dans « Ma progression »**

Activer cette option pour afficher, sur la page « Ma progression », les résultats de tous les tests que vous avez passés, y compris ceux qui ont été supprimés.

*Valeur par défaut : `false`*