# Paramètres des parcours d’apprentissage

Valeurs par défaut et comportement de l’outil **Parcours d’apprentissage** — démarrage automatique, vue par défaut, prérequis, comportement SCORM et paramètres similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Parcours d’apprentissage**. Cette catégorie contient **51 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_all_files_in_lp_export`

**Exporter tous les fichiers lors de l’exportation d’un parcours d’apprentissage**

Lors de l’exportation d’un LP, tous les fichiers et dossiers situés dans le même chemin qu’un fichier HTML seront également exportés.

*Par défaut : `false`*


### `allow_htaccess_import_from_scorm`

**Autoriser les fichiers .htaccess provenant des paquets SCORM**

Normalement, tous les fichiers .htaccess sont filtrés et supprimés lors de l’importation de contenu dans Chamilo. Cette fonctionnalité permet d’importer un fichier .htaccess s’il est présent dans un paquet SCORM.

*Par défaut : `false`*


### `allow_import_scorm_package_in_course_builder`

**Import SCORM lors de l’import de cours**

Permet de copier la structure de répertoires des paquets SCORM lors de la restauration d’un cours (depuis l’outil de maintenance du cours).

*Par défaut : `false`*


### `allow_lp_chamilo_export`

**Exporter les parcours d’apprentissage au format de sauvegarde Chamilo**

Active la possibilité d’exporter n’importe lequel de vos parcours d’apprentissage au format de sauvegarde de cours Chamilo.

*Par défaut : `false`*


### `allow_lp_return_link`

**Afficher le lien de retour des parcours d’apprentissage**

Désactivez cette option pour masquer le bouton « Retour à la page d’accueil » dans les parcours d’apprentissage

*Par défaut : `true`*


### `allow_lp_subscription_to_usergroups`

**Inscription aux parcours d’apprentissage pour les classes**

Active l’inscription aux parcours d’apprentissage et aux catégories de parcours pour les groupes/classes.

*Par défaut : `false`*


### `allow_session_lp_category`

**Les catégories de parcours d’apprentissage peuvent être gérées dans les sessions**

[inféré] Permet aux apprenants et aux formateurs d’organiser et de gérer les parcours d’apprentissage par catégories au sein des cours de session.

*Par défaut : `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Les enseignants peuvent accéder aux parcours d’apprentissage bloqués**

Les enseignants n’ont pas besoin de terminer entièrement les parcours d’apprentissage pour accéder à un parcours bloqué par des prérequis.

*Par défaut : `false`*


### `disable_js_in_lp_view`

**Désactiver le JS dans la vue des parcours d’apprentissage**

Désactive les fichiers JS que Chamilo ajoute habituellement aux fichiers HTML dans le parcours d’apprentissage (lors de leur affichage).

*Par défaut : `false`*


### `disable_my_lps_page`

**Masquer la page « Mes parcours d’apprentissage »**

La page « Mes parcours d’apprentissage » a été ajoutée en 1.11. Utilisez cette option pour la masquer.

*Par défaut : `false`*

### `download_files_after_all_lp_finished`

**Bouton de téléchargement après avoir terminé les parcours d’apprentissage**

Affiche un bouton de téléchargement de fichiers après avoir terminé tous les LP. Exemple : si ABC est le code du cours, et 1 et 100 sont les identifiants de documents, choisissez : ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Édition des tests inclus dans les parcours d’apprentissage**

Permet d’éditer les tests même s’ils ont été inclus dans un parcours d’apprentissage. Par défaut, l’édition est empêchée si le test se trouve dans un parcours, car cela peut affecter la cohérence du suivi pour de nombreux apprenants si les modifications du test sont importantes.

*Par défaut : `false`*

### `hide_accessibility_label_on_lp_item`

**Masquer l’étiquette des prérequis dans les parcours d’apprentissage**

Masque l’infobulle des prérequis sur les éléments du parcours d’apprentissage. Il s’agit principalement d’un choix esthétique.

*Par défaut : `true`*

### `hide_lp_time`

**Masquer le temps dans les enregistrements des parcours d’apprentissage**

Masque le temps passé dans les parcours d’apprentissage dans les rapports en général.

*Par défaut : `false`*

### `hide_scorm_copy_link`

**Masquer la copie SCORM**

Masque l’icône Copier le parcours d’apprentissage dans la liste des parcours d’apprentissage

*Par défaut : `false`*

### `hide_scorm_export_link`

**Masquer l’export SCORM**

Masque l’icône Export SCORM dans la liste des parcours d’apprentissage

*Par défaut : `false`*

### `hide_scorm_pdf_link`

**Masquer l’export PDF du parcours d’apprentissage**

Masque l’icône Export PDF du parcours d’apprentissage dans la liste des parcours d’apprentissage

*Par défaut : `true`*

### `lp_allow_export_to_students`

**Les apprenants peuvent exporter les parcours d’apprentissage**

Activez cette option pour permettre aux apprenants de télécharger les parcours d’apprentissage sous forme de paquets SCORM.

*Par défaut : `false`*

### `lp_enable_flow`

**Naviguer entre les parcours d’apprentissage**

Ajoute la possibilité de sélectionner un parcours d’apprentissage « suivant » et d’afficher des boutons à l’intérieur du parcours pour passer de l’un à l’autre.

*Par défaut : `false`*

### `lp_fixed_encoding`

**Encodage fixe dans le parcours d’apprentissage**

Réduit l’utilisation des ressources en ignorant une vérification de l’encodage du texte dans les parcours d’apprentissage importés.

*Par défaut : `false`*

### `lp_item_prerequisite_dates`

**Prérequis d’éléments de parcours d’apprentissage basés sur des dates**

Ajoute l’option de définir des prérequis avec des dates de début et de fin pour les éléments de parcours.

*Par défaut : `false`*

### `lp_menu_location`

**Emplacement du menu du parcours d'apprentissage**

Définissez cette option sur « left » ou « right » pour changer le côté du menu du parcours d'apprentissage.

*Par défaut : `left`*

### `lp_minimum_time`

**Temps minimum pour terminer le parcours d'apprentissage**

Ajoute un champ de temps minimum aux parcours d'apprentissage. Si l'utilisateur n'a pas passé autant de temps sur le parcours d'apprentissage, le dernier élément du parcours d'apprentissage ne peut pas être achevé.

*Par défaut : `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Déverrouiller l'élément du parcours d'apprentissage si le nombre maximal de tentatives est atteint pour le test prérequis**

[inféré] Déverrouille automatiquement les éléments suivants du parcours d'apprentissage lorsqu'un apprenant a épuisé le nombre maximal de tentatives de quiz pour un test prérequis.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Déverrouiller les prérequis après la dernière tentative de test**

Permet aux utilisateurs de poursuivre un parcours d'apprentissage après avoir utilisé toutes les tentatives de quiz d'un test servant de prérequis à d'autres éléments.

*Par défaut : `false`*

### `lp_prerequisite_use_last_attempt_only`

**Utiliser le dernier score dans les prérequis de test du parcours d'apprentissage**

Lorsqu'un test est utilisé comme prérequis pour un élément du parcours d'apprentissage, n'utiliser que la dernière tentative du test comme validation du prérequis (par défaut, la meilleure tentative est utilisée).

*Par défaut : `false`*

### `lp_prevents_beforeunload`

**Empêcher l'événement JS beforeunload dans le parcours d'apprentissage**

Cela améliore la compatibilité des navigateurs en empêchant l'exécution d'événements JS délicats.

*Par défaut : `false`*

### `lp_score_as_progress_enable`

**Utiliser le score du parcours d'apprentissage comme progression**

Utile lors de l'utilisation de contenu SCORM avec un seul SCO volumineux. SCORM ne communique pas la progression, il s'agit donc d'une astuce pour utiliser le score comme progression. L'activation de cette option vous permettra de la configurer pour chaque parcours d'apprentissage.

*Par défaut : `false`*

### `lp_show_max_progress_instead_of_average`

**Afficher la progression maximale au lieu de la moyenne pour le reporting des parcours d'apprentissage**

[inféré] Calculer la progression du parcours d'apprentissage sur la base de l'achèvement maximal des éléments plutôt que de la moyenne de tous les éléments.

*Par défaut : `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Choisir progression maximale ou moyenne pour les parcours d'apprentissage au niveau du cours**

Permettre la redéfinition du paramètre afin d'afficher la meilleure progression au lieu des moyennes dans le reporting des parcours d'apprentissage au niveau d'un cours.

*Par défaut : `false`*

### `lp_show_reduced_report`

**Parcours d'apprentissage : afficher un rapport réduit**

Dans l'outil des parcours d'apprentissage, lorsqu'un utilisateur consulte sa propre progression (via l'icône de statistiques), afficher une version raccourcie (moins détaillée) du rapport de progression.

*Par défaut : `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Afficher la disponibilité des parcours d'apprentissage aux apprenants**

Afficher les parcours d'apprentissage aux apprenants avec leurs dates de disponibilité, plutôt que de les masquer jusqu'à l'arrivée de la date.

*Par défaut : `false`*

### `lp_subscription_settings`

**Paramètres d'inscription aux parcours d'apprentissage**

Configurer des options supplémentaires pour la fonctionnalité d'inscription aux parcours d'apprentissage. Les options comprennent « allow_add_users_to_lp » et « allow_add_users_to_lp_category ».

### `lp_view_accordion`

**Éléments des parcours d'apprentissage repliables**

[inféré] Afficher les éléments du parcours d'apprentissage au format accordéon repliable pour une meilleure navigation et organisation du contenu.

*Par défaut : `false`*

### `lp_view_settings`

**Paramètres d'affichage du parcours d'apprentissage**

Configurer des options supplémentaires pour l'affichage des parcours d'apprentissage. Les options comprennent « show_reporting_icon », « hide_lp_arrow_navigation », « show_toolbar_by_default », « navigation_in_the_middle » et « add_extra_quit_to_home_icon ».

### `scorm_api_extrafield_to_use_as_student_id`

**Utiliser un champ extra comme student\_id dans la communication SCORM**

Indiquer le nom du champ extra à utiliser comme student_id pour toute communication SCORM.

### `scorm_api_username_as_student_id`

**Utiliser le nom d'utilisateur comme student\_id dans la communication SCORM**

[inféré] Utiliser le nom d'utilisateur de l'apprenant comme identifiant étudiant dans la communication de l'API SCORM au lieu de l'identifiant de l'apprenant.

*Par défaut : `false`*

### `scorm_lms_update_sco_status_all_time`

**Mettre à jour le statut du SCO de manière autonome**

Si le SCO n'envoie pas de statut, prendre le relais et mettre à jour le statut en fonction de ce qui peut être observé dans Chamilo.

*Par défaut : `false`*

### `scorm_upload_from_cache`

**Téléverser un SCORM depuis le répertoire cache**

Permettre aux administrateurs de téléverser un paquet SCORM (sous forme zip) dans le répertoire cache et de l'utiliser comme source d'importation sur la page de téléversement SCORM.

*Par défaut : `false`*

### `show_hidden_exercise_added_to_lp`

**Afficher les tests des parcours d'apprentissage même s'ils sont invisibles**

Afficher les exercices masqués qui ont été ajoutés à un LP dans la liste des exercices. Si nous sommes dans une session, que le test est invisible dans le cours de base, qu'il est inclus dans un LP et que le paramètre pour l'afficher n'est pas spécifiquement défini à true, alors le masquer.

*Par défaut : `true`*

### `show_invisible_exercise_in_lp_list`

**Afficher les tests dans la liste des tests du parcours d'apprentissage même s'ils sont invisibles**

[inféré] Inclure les tests masqués dans la liste des tests disponibles lors de la consultation du contenu du parcours d'apprentissage.

*Par défaut : `false`*

### `show_invisible_exercise_in_lp_toc`

**Tests invisibles visibles dans les parcours d'apprentissage**

Faire apparaître les tests marqués comme « invisibles » dans l'outil Tests lorsqu'ils sont inclus dans un parcours d'apprentissage.

*Par défaut : `false`*

### `show_invisible_lp_in_course_home`

**Afficher le lien vers le parcours d'apprentissage sur la page d'accueil du cours lorsqu'il est invisible**

Si un parcours d'apprentissage est défini comme invisible mais que l'enseignant/tuteur a décidé de le rendre disponible depuis la page d'accueil du cours, cette option empêche Chamilo de masquer le lien sur la page d'accueil du cours.

*Par défaut : `false`*

### `show_prerequisite_as_blocked`

**Prérequis des parcours d'apprentissage**

Sur les listes de parcours d'apprentissage, afficher un élément visuel indiquant que d'autres parcours d'apprentissage sont actuellement bloqués par une règle de prérequis.

*Par défaut : `false`*

### `student_follow_page_add_lp_acquisition_info`

**Ajouter une colonne d'acquisition dans le suivi de l'apprenant**

Ajouter une colonne à la page de suivi de l'apprenant pour afficher le statut d'acquisition d'un parcours d'apprentissage par un apprenant.

*Par défaut : `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Ajouter les informations de visibilité des parcours d'apprentissage sur la page de suivi de l'apprenant**

[inféré] Afficher un indicateur de statut de visibilité pour les parcours d'apprentissage sur la page de suivi de la progression de l'apprenant.

*Par défaut : `false`*

### `student_follow_page_add_LP_subscription_info`

**Informations de déverrouillage dans la liste des parcours d'apprentissage**

Cela ajoute une colonne « déverrouillé » dans la liste des parcours d'apprentissage si l'apprenant est inscrit au parcours d'apprentissage donné et y a accès.

*Par défaut : `false`*

### `student_follow_page_hide_lp_tests_average`

**Masquer le signe de pourcentage dans la moyenne des tests des parcours d'apprentissage dans le suivi de l'apprenant**

Masque l'icône de pourcentage dans l'indication « Moyenne des tests dans les parcours d'apprentissage » sur le suivi d'un étudiant

*Par défaut : `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Inclure les parcours d'apprentissage non inscrits sur la page de suivi de l'apprenant**

[inféré] Afficher les parcours d'apprentissage sur les pages de progression même lorsque les apprenants n'y sont pas inscrits.

*Par défaut : `false`*

### `ticket_lp_quiz_info_add`

**Ajouter les informations des parcours d'apprentissage et des tests au reporting des tickets**

[inféré] Inclure les informations des parcours d'apprentissage et des tests dans le reporting des tickets de support pour un meilleur suivi des incidents.

*Par défaut : `false`*

### `validate_lp_prerequisite_from_other_session`

**Utiliser le statut des éléments de parcours d'apprentissage provenant d'autres sessions**

Permettre aux utilisateurs de valider les prérequis d'un parcours d'apprentissage si l'élément correspondant a déjà été achevé dans une autre session.

*Par défaut : `false`*