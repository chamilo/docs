# Paramètres des Parcours d'Apprentissage

Paramètres par défaut et comportement de l'outil **Parcours d'Apprentissage** — démarrage automatique, vue par défaut, prérequis, comportement SCORM et autres similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Parcours d'Apprentissage**. Cette catégorie contient **51 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

---
## Paramètres

### `add_all_files_in_lp_export`

**Exporter tous les fichiers lors de l'exportation d'un parcours d'apprentissage**

Lors de l'exportation d'un parcours d'apprentissage (LP), tous les fichiers et dossiers situés dans le même chemin qu'un fichier HTML seront également exportés.

*Par défaut : `false`*

### `allow_htaccess_import_from_scorm`

**Autoriser les fichiers .htaccess provenant des packages SCORM**

Normalement, tous les fichiers .htaccess sont filtrés et supprimés lors de l'importation de contenu dans Chamilo. Cette fonctionnalité permet d'importer les fichiers .htaccess s'ils sont présents dans un package SCORM.

*Par défaut : `false`*

### `allow_import_scorm_package_in_course_builder`

**Importation SCORM lors de l'importation d'un cours**

Activez cette option pour copier la structure des répertoires des packages SCORM lors de la restauration d'un cours (via l'outil de maintenance des cours).

*Par défaut : `false`*

### `allow_lp_chamilo_export`

**Exporter les parcours d'apprentissage au format de sauvegarde Chamilo**

Activez la possibilité d'exporter n'importe lequel de vos parcours d'apprentissage au format de sauvegarde de cours Chamilo.

*Par défaut : `false`*

### `allow_lp_return_link`

**Afficher le lien de retour dans les parcours d'apprentissage**

Désactivez cette option pour masquer le bouton « Retour à la page d'accueil » dans les parcours d'apprentissage.

*Par défaut : `true`*

### `allow_lp_subscription_to_usergroups`

**Abonnement aux parcours d'apprentissage pour les classes**

Activez l'abonnement aux parcours d'apprentissage et aux catégories de parcours d'apprentissage pour les groupes/classes.

*Par défaut : `false`*

### `allow_session_lp_category`

**Les catégories de parcours d'apprentissage peuvent être gérées dans les sessions**

Activez la possibilité pour les apprenants et les formateurs d'organiser et de gérer les parcours d'apprentissage par catégories au sein des cours de session.

*Par défaut : `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Les enseignants peuvent accéder aux parcours d'apprentissage bloqués**

Les enseignants n'ont pas besoin de compléter les parcours d'apprentissage pour accéder à un parcours bloqué par des prérequis.

*Par défaut : `false`*

### `disable_js_in_lp_view`

**Désactiver JS dans l'affichage des parcours d'apprentissage**

Désactivez les fichiers JS que Chamilo ajoute généralement aux fichiers HTML dans le parcours d'apprentissage (lors de leur affichage).

*Par défaut : `false`*

### `disable_my_lps_page`

**Masquer la page « Mes parcours d'apprentissage »**

La page « Mes parcours d'apprentissage » a été ajoutée dans la version 1.11. Utilisez cette option pour la masquer.

*Par défaut : `false`*

### `download_files_after_all_lp_finished`

**Bouton de téléchargement après avoir terminé les parcours d'apprentissage**

Affichez un bouton de téléchargement des fichiers après avoir terminé tous les parcours d'apprentissage. Exemple : si ABC est le code du cours, et 1 et 100 sont les identifiants des documents, choisissez : ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Édition des tests inclus dans les parcours d'apprentissage**

Activez l'édition des tests même s'ils ont été inclus dans un parcours d'apprentissage. Par défaut, l'édition est empêchée si le test est dans un parcours d'apprentissage, car cela peut affecter la cohérence du suivi pour de nombreux apprenants si les modifications du test sont significatives.

*Par défaut : `false`*

### `hide_accessibility_label_on_lp_item`

**Masquer l'étiquette des prérequis dans les parcours d'apprentissage**

Masquez l'infobulle des prérequis sur les éléments des parcours d'apprentissage. C'est principalement un choix esthétique.

*Par défaut : `true`*

### `hide_lp_time`

**Masquer le temps passé dans les rapports des parcours d'apprentissage**

Masquez le temps passé sur les parcours d'apprentissage dans les rapports en général.

*Par défaut : `false`*

### `hide_scorm_copy_link`

**Masquer la copie SCORM**

Masquez l'icône de copie du parcours d'apprentissage dans la liste des parcours d'apprentissage.

*Par défaut : `false`*

### `hide_scorm_export_link`

**Masquer l'exportation SCORM**

Masquez l'icône d'exportation SCORM dans la liste des parcours d'apprentissage.

*Par défaut : `false`*

### `hide_scorm_pdf_link`

**Masquer l'exportation PDF des parcours d'apprentissage**

Masquez l'icône d'exportation PDF des parcours d'apprentissage dans la liste des parcours d'apprentissage.

*Par défaut : `true`*

### `lp_allow_export_to_students`

**Les apprenants peuvent exporter les parcours d'apprentissage**

Activez cette option pour permettre aux apprenants de télécharger les parcours d'apprentissage sous forme de packages SCORM.

*Par défaut : `false`*

### `lp_enable_flow`

**Naviguer entre les parcours d'apprentissage**

Ajoutez la possibilité de sélectionner un parcours d'apprentissage « suivant » et affichez des boutons à l'intérieur du parcours d'apprentissage pour passer d'un parcours à l'autre.

*Par défaut : `false`*

### `lp_fixed_encoding`

**Encodage fixe dans les parcours d'apprentissage**

Réduisez l'utilisation des ressources en ignorant une vérification de l'encodage du texte dans les parcours d'apprentissage importés.

*Par défaut : `false`*

### `lp_item_prerequisite_dates`

**Prérequis basés sur des dates pour les éléments des parcours d'apprentissage**

Ajoute l'option de définir des prérequis avec des dates de début et de fin pour les éléments des parcours d'apprentissage.

*Par défaut : `false`*

### `lp_menu_location`

**Emplacement du menu des parcours d'apprentissage**

Définissez cette option sur « left » (gauche) ou « right » (droite) pour changer le côté du menu des parcours d'apprentissage.

*Par défaut : `left`*

### `lp_minimum_time`

**Temps minimum pour compléter un parcours d'apprentissage**

Ajoutez un champ de temps minimum aux parcours d'apprentissage. Si l'utilisateur n'a pas passé autant de temps sur le parcours d'apprentissage, le dernier élément du parcours ne peut pas être complété.

*Par défaut : `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Débloquer un élément de parcours d'apprentissage si le nombre maximum de tentatives est atteint pour un test prérequis**

Débloque automatiquement les éléments suivants du parcours d'apprentissage lorsqu'un apprenant épuise le nombre maximum de tentatives pour un test prérequis.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Débloquer les prérequis après la dernière tentative de test**

Permet aux utilisateurs de continuer dans un parcours d'apprentissage après avoir utilisé toutes les tentatives d'un test utilisé comme prérequis pour d'autres éléments.

*Par défaut : `false`*

### `lp_prerequisite_use_last_attempt_only`

**Utiliser uniquement la dernière tentative pour les prérequis de test dans les parcours d'apprentissage**

Lorsqu'un test est utilisé comme prérequis pour un élément dans le parcours d'apprentissage, utilisez uniquement la dernière tentative du test comme validation pour le prérequis (par défaut, la meilleure tentative est utilisée).

*Par défaut : `false`*

### `lp_prevents_beforeunload`

**Empêcher l'événement JS beforeunload dans les parcours d'apprentissage**

Cela aide à la compatibilité des navigateurs en empêchant l'exécution d'événements JS complexes.

*Par défaut : `false`*

### `lp_score_as_progress_enable`

**Utiliser le score du parcours d'apprentissage comme progression**

Ceci est utile lors de l'utilisation de contenu SCORM avec un seul SCO volumineux. SCORM ne communique pas la progression, donc ceci est une astuce pour utiliser le score comme progression. Activer cette option vous permettra de configurer cela par parcours d'apprentissage.

*Par défaut : `false`*

### `lp_show_max_progress_instead_of_average`

**Afficher la progression maximale au lieu de la moyenne pour les rapports des parcours d'apprentissage**

Calculez la progression du parcours d'apprentissage en fonction de la complétion maximale des éléments plutôt que de faire une moyenne de tous les éléments.

*Par défaut : `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Sélectionner progression maximale ou moyenne pour les parcours d'apprentissage au niveau du cours**

Activez la redéfinition du paramètre pour afficher la meilleure progression au lieu des moyennes dans les rapports des parcours d'apprentissage au niveau du cours.

*Par défaut : `false`*

### `lp_show_reduced_report`

**Parcours d'apprentissage : afficher un rapport réduit**

Dans l'outil des parcours d'apprentissage, lorsqu'un utilisateur consulte sa propre progression (via l'icône des statistiques), affichez une version abrégée (moins détaillée) du rapport de progression.

*Par défaut : `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Afficher la disponibilité des parcours d'apprentissage aux apprenants**

Affichez les parcours d'apprentissage aux apprenants avec leurs dates de disponibilité, plutôt que de les masquer jusqu'à ce que la date arrive.

*Par défaut : `false`*

### `lp_subscription_settings`

**Paramètres d'abonnement aux parcours d'apprentissage**

Configurez des options supplémentaires pour la fonctionnalité d'abonnement aux parcours d'apprentissage. Les options incluent 'allow_add_users_to_lp' et 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Éléments des parcours d'apprentissage pliables**

Affichez les éléments des parcours d'apprentissage dans un format accordéon pliable pour améliorer la navigation et l'organisation du contenu.

*Par défaut : `false`*

### `lp_view_settings`

**Paramètres d'affichage des parcours d'apprentissage**

Configurez des options supplémentaires pour l'affichage des parcours d'apprentissage. Les options incluent 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' et 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Utiliser un champ supplémentaire comme student_id dans la communication SCORM**

Indiquez le nom du champ supplémentaire à utiliser comme student_id pour toutes les communications SCORM.

### `scorm_api_username_as_student_id`

**Utiliser le nom d'utilisateur comme student_id dans la communication SCORM**

Utilisez le nom d'utilisateur de l'apprenant comme identifiant étudiant dans la communication de l'API SCORM au lieu de l'ID de l'apprenant.

*Par défaut : `false`*

### `scorm_lms_update_sco_status_all_time`

**Mettre à jour le statut SCO de manière autonome**

Si le SCO n'envoie pas de statut, prenez le relais et mettez à jour le statut en fonction de ce qui peut être observé dans Chamilo.

*Par défaut : `false`*

### `scorm_upload_from_cache`

**Téléverser SCORM depuis le répertoire de cache**

Permettez aux administrateurs de téléverser un package SCORM (sous forme de fichier zip) dans le répertoire de cache et de l'utiliser comme source d'importation sur la page de téléversement SCORM.

*Par défaut : `false`*

### `show_hidden_exercise_added_to_lp`

**Afficher les tests des parcours d'apprentissage même s'ils sont invisibles**

Affichez les exercices masqués qui ont été ajoutés à un parcours d'apprentissage dans la liste des exercices. Si nous sommes dans une session, que le test est invisible dans le cours de base, qu'il est inclus dans un parcours d'apprentissage et que le paramètre pour l'afficher n'est pas spécifiquement défini sur vrai, alors masquez-le.

*Par défaut : `true`*

### `show_invisible_exercise_in_lp_list`

**Afficher les tests dans la liste des tests des parcours d'apprentissage même s'ils sont invisibles**

Incluez les tests masqués dans la liste des tests disponibles lors de la visualisation du contenu des parcours d'apprentissage.

*Par défaut : `false`*

### `show_invisible_exercise_in_lp_toc`

**Tests invisibles visibles dans les parcours d'apprentissage**

Rendez visibles les tests marqués comme « invisibles » dans l'outil des tests lorsqu'ils sont inclus dans un parcours d'apprentissage.

*Par défaut : `false`*

### `show_invisible_lp_in_course_home`

**Afficher le lien vers le parcours d'apprentissage sur la page d'accueil du cours lorsqu'il est invisible**

Si un parcours d'apprentissage est défini comme invisible mais que l'enseignant ou le coach a décidé de le rendre disponible depuis la page d'accueil du cours, cette option empêche Chamilo de masquer le lien sur la page d'accueil du cours.

*Par défaut : `false`*

### `show_prerequisite_as_blocked`

**Prérequis des parcours d'apprentissage**

Dans les listes de parcours d'apprentissage, affichez un élément visuel pour indiquer que d'autres parcours d'apprentissage sont actuellement bloqués par une règle de prérequis.

*Par défaut : `false`*

### `student_follow_page_add_LP_acquisition_info`

**Ajouter une colonne d'acquisition dans le suivi des apprenants**

Ajoutez une colonne à la page de suivi des apprenants pour afficher l'état d'acquisition par un apprenant sur un parcours d'apprentissage.

*Par défaut : `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Ajouter des informations de visibilité pour les parcours d'apprentissage sur la page de suivi des apprenants**

Affichez un indicateur de statut de visibilité pour les parcours d'apprentissage sur la page de suivi de la progression des apprenants.

*Par défaut : `false`*

### `student_follow_page_add_LP_subscription_info`

**Informations débloquées dans la liste des parcours d'apprentissage**

Cela ajoute une colonne « débloqué » dans la liste des parcours d'apprentissage si l'apprenant est abonné au parcours d'apprentissage donné et y a accès.

*Par défaut : `false`*

### `student_follow_page_hide_lp_tests_average`

**Masquer le signe de pourcentage dans la moyenne des tests des parcours d'apprentissage dans le suivi des apprenants**

Masque l'icône de pourcentage dans l'indication « Moyenne des tests dans les parcours d'apprentissage » sur le suivi d'un étudiant.

*Par défaut : `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Inclure les parcours d'apprentissage non souscrits sur la page de suivi des apprenants**

Affichez les parcours d'apprentissage sur les pages de progression même lorsque les apprenants n'y sont pas abonnés.

*Par défaut : `false`*

### `ticket_lp_quiz_info_add`

**Ajouter des informations sur les parcours d'apprentissage et les tests au rapport des tickets**

Incluez des informations sur les parcours d'apprentissage et les tests dans les rapports des tickets de support pour un meilleur suivi des problèmes.

*Par défaut : `false`*

### `validate_lp_prerequisite_from_other_session`

**Utiliser le statut des éléments de parcours d'apprentissage d'autres sessions**

Permettez aux utilisateurs de compléter les prérequis dans un parcours d'apprentissage si l'élément correspondant a déjà été complété dans une autre session.

*Par défaut : `false`*