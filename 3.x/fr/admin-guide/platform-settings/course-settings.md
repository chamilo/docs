# Paramètres des cours

Valeurs par défaut et politiques applicables aux cours sur l’ensemble de la plateforme — visibilité, droits de création, outils autorisés, permissions des apprenants, et éléments similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Cours**. Cette catégorie contient **45 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `active_tools_on_create`

**Outils actifs à la création d’un cours**

Sélectionnez les outils qui seront *actifs* après la création d’un cours.

*Par défaut :*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Utiliser les catégories de cours de l’URL principale**

Dans les configurations multi-URL, autoriser les administrateurs et les enseignants à attribuer aux cours des URL enfants des catégories provenant de l’URL principale.

*Par défaut : `false`*

### `allow_course_theme`

**Autoriser les thèmes de cours**

Autorise les thèmes graphiques de cours et permet de changer la feuille de style utilisée par un cours parmi toutes les feuilles de style disponibles dans Chamilo. Lorsqu’un utilisateur entre dans le cours, la feuille de style du cours a priorité sur celle de l’utilisateur et sur la feuille de style par défaut de la plateforme.

*Par défaut : `true`*

### `allow_public_course_with_no_terms_conditions`

**Accès aux cours publics avec conditions générales**

Lorsque cette option est activée, si un cours a une visibilité publique et des conditions générales, ces conditions sont désactivées tant que le cours est public.

*Par défaut : `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquer l’accès des utilisateurs authentifiés aux cours publics**

N’afficher que les cours publics. Ne pas autoriser les utilisateurs inscrits à accéder aux cours de visibilité « ouvert » s’ils ne sont pas inscrits à chacun de ces cours.

*Par défaut : `false`*

### `breadcrumbs_course_homepage`

**Fil d’Ariane de la page d’accueil du cours**

Le fil d’Ariane est le système de navigation par liens horizontaux, généralement en haut à gauche de la page. Cette option détermine ce qui apparaît dans le fil d’Ariane sur les pages d’accueil des cours.

*Par défaut : `course_title`*

### `course_about_teacher_name_hide`

**Masquer les informations de l’enseignant sur la page de détails du cours**

Sur la page de détails du cours, masquer les informations de l’enseignant.

*Par défaut : `false`*

### `course_category_code_to_use_as_model`

**Restreindre les modèles de cours à une catégorie de cours**

Indiquez un code de catégorie à utiliser comme modèles de cours. Seuls ces cours apparaîtront dans la liste déroulante lors de la création d’un cours, et les utilisateurs ne verront pas les cours de cette catégorie dans le catalogue des cours.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Champs supplémentaires à afficher dans les paramètres du cours**

Les champs définis dans ce tableau apparaîtront sur la page des paramètres du cours.

### `course_creation_by_teacher_extra_fields_to_show`

**Champs supplémentaires à afficher dans le formulaire de création de cours**

Les champs définis dans ce tableau apparaîtront comme champs supplémentaires dans le formulaire de création de cours.

### `course_creation_donate_link`

**Lien de don sur la page de création de cours**

La page vers laquelle le message de don doit pointer (URL complète).

### `course_creation_donate_message_show`

**Afficher un message de don sur la page de création de cours**

Ajouter une boîte de message sur la page de création de cours destinée aux enseignants, les invitant à faire un don au projet.

*Par défaut : `false`*

### `course_creation_form_hide_course_code`

**Retirer le champ code de cours du formulaire de création de cours**

S’il n’est pas fourni, le code de cours est généré par défaut à partir du titre du cours ; activez cette option pour retirer complètement le champ code du formulaire de création de cours.

*Par défaut : `false`*

### `course_creation_form_set_course_category_mandatory`

**Rendre la catégorie de cours obligatoire**

Lors de la création d’un cours, rendre la catégorie de cours obligatoire.

*Par défaut : `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Champs supplémentaires à exiger dans le formulaire de création de cours**

Les champs définis dans ce tableau seront obligatoires dans le formulaire de création de cours.

### `course_creation_splash_screen`

**Écran d’accueil pour les cours**

Afficher un écran d’accueil lors de la création d’un nouveau cours.

*Par défaut : `true`*

### `course_creation_use_template`

**Utiliser un cours modèle pour les nouveaux cours**

Définissez cette option pour utiliser le même cours modèle (identifié par son identifiant numérique de cours dans la base de données) pour tous les nouveaux cours créés sur la plateforme. Veuillez noter que, si elle n’est pas correctement planifiée, cette option peut avoir un impact considérable sur l’espace disque. Le cours modèle sera utilisé comme si l’enseignant avait effectué une copie du cours avec les outils de sauvegarde de cours : aucun contenu utilisateur n’est copié, uniquement le matériel enseignant. Toutes les autres règles de sauvegarde de cours s’appliquent. Laissez vide (ou définissez à 0) pour désactiver.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Préremplir les champs de cours avec des champs de l’utilisateur**

S’il n’est pas vide, le processus de création de cours recherchera certains champs dans le profil de l’utilisateur et les remplira automatiquement pour le cours. Par exemple, un enseignant spécialisé en marketing digital pourrait automatiquement définir un indicateur « marketing digital » sur chaque cours qu’il ou elle crée.

### `course_hide_tools`

**Masquer des outils aux enseignants**

Cochez les outils que vous souhaitez masquer aux enseignants. Cela interdira l’accès à l’outil.

### `course_images_in_courses_list`

**Icônes personnalisées des cours**

Utiliser les images de cours comme icône du cours dans les listes de cours (au lieu de l’icône par défaut du tableau vert).

*Par défaut : `true`*

### `course_log_default_extra_fields`

**Champs supplémentaires utilisateur par défaut sur la page des statistiques de cours**

Configurez ce tableau avec les identifiants internes des champs supplémentaires que vous souhaitez afficher par défaut sur la page principale des statistiques de cours.

### `course_log_hide_columns`

**Masquer des colonnes dans les journaux de cours**

Ce tableau vous permet de configurer les colonnes à masquer sur la page principale des statistiques de cours et dans le rapport du temps total.

### `course_sequence_valid_only_in_same_session`

**Valider les prérequis uniquement au sein de la même session**

Lorsqu’elle est activée, un cours n’est considéré comme validé que s’il a été réussi dans la session en cours. Si elle est désactivée, les cours réussis dans d’autres sessions débloqueront également les cours dépendants.

*Par défaut : `false`*


### `course_student_info`

**Affichage des informations étudiant du cours**

Sur les pages « Mes cours » / « Mes sessions », afficher des informations supplémentaires concernant le score, la progression et/ou l’obtention de certificats par l’étudiant.

### `course_validation`

**Validation des cours**

Lorsque la fonctionnalité « Validation des cours » est activée, un enseignant ne peut pas créer un cours seul. Il ou elle remplit une demande de cours. L’administrateur de la plateforme examine la demande et l’approuve ou la refuse.<br />Cette fonctionnalité s’appuie sur la messagerie électronique automatisée ; configurez Chamilo pour accéder à un serveur de messagerie et utiliser un compte de messagerie dédié.

*Par défaut : `false`*


### `course_validation_terms_and_conditions_url`

**Validation des cours - un lien vers les conditions générales**

Il s’agit de l’URL du document « Conditions générales » applicable à la demande de cours. Si l’adresse est définie ici, l’utilisateur doit lire et accepter ces conditions générales avant d’envoyer une demande de cours.<br />Si vous activez le module « Conditions générales » de Chamilo et que vous souhaitez que son URL soit utilisée, laissez ce paramètre vide.

### `courses_default_creation_visibility`

**Visibilité par défaut des cours**

Visibilité par défaut d’un cours lors de la création d’un nouveau cours

*Par défaut : `2`*


### `display_coursecode_in_courselist`

**Afficher le code dans le nom du cours**

Afficher le code du cours dans la liste des cours

*Par défaut : `false`*


### `display_teacher_in_courselist`

**Afficher l’enseignant dans le nom du cours**

Afficher l’enseignant dans la liste des cours

*Par défaut : `true`*


### `enable_tool_introduction`

**Activer l’introduction des outils**

Activer les introductions sur la page d’accueil de chaque outil

*Par défaut : `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Afficher le bouton de désinscription dans « Mes cours »**

Ajouter un bouton pour se désinscrire d’un cours sur la page « Mes cours ».

*Par défaut : `false`*

### `example_material_course_creation`

**Matériel d’exemple à la création de cours**

Créer automatiquement du matériel d’exemple lors de la création d’un nouveau cours

*Par défaut : `true`*


### `hide_course_rating`

**Masquer la notation des cours**

La fonctionnalité de notation des cours est présente par défaut à différents endroits. Si vous n’en voulez pas, activez cette option.

*Par défaut : `false`*

### `hide_course_sidebar`

**Masquer le bloc Cours dans la barre latérale**

Sur les écrans où le menu de gauche est visible, ne pas afficher la section « Cours ».

*Par défaut : `true`*

### `multiple_access_url_show_shared_course_marker`

**Afficher le marqueur de cours partagé multi-URL**

Ajoute une icône de lien aux cours partagés entre URL, afin que les utilisateurs (en particulier les enseignants) sachent qu’ils doivent être particulièrement prudents lors de la modification du contenu du cours.

*Par défaut : `false`*

### `my_courses_show_courses_in_user_language_only`

**N’afficher que les cours dans la langue de l’utilisateur**

Si elle est activée, cette option masquera tous les cours qui ne sont pas définis dans la langue de l’utilisateur.

*Par défaut : `false`*

### `profiling_filter_adding_users`

**Filtrer les utilisateurs selon les champs de profil lors de l’inscription au cours**

Permet aux enseignants de filtrer les utilisateurs en fonction des champs supplémentaires sur la page d’inscription des utilisateurs à leur cours.

*Par défaut : `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Afficher les dépendances dans l’introduction du cours**

Lors de l’utilisation du séquençage des ressources avec des cours ou des sessions, afficher les dépendances du cours sur la page d’accueil du cours.

*Par défaut : `false`*

### `scorm_cumulative_session_time`

**Temps de session cumulatif pour SCORM**

Lorsqu’il est activé, le temps de session des parcours d’apprentissage SCORM sera cumulatif ; sinon, il ne sera comptabilisé qu’à partir de la dernière mise à jour. Il s’agit d’un paramètre global. Il est utilisé lors de la création d’un nouveau parcours d’apprentissage, mais peut ensuite être redéfini pour chacun d’eux.

*Par défaut : `true`*


### `send_email_to_admin_when_create_course`

**Alerte par e-mail à la création d’un cours**

Envoyer un e-mail à l’administrateur de la plateforme chaque fois qu’un enseignant crée un nouveau cours

*Par défaut : `false`*


### `show_course_duration`

**Afficher la durée des cours**

Afficher la durée du cours à côté du titre du cours dans le catalogue des cours et la liste des cours.

*Par défaut : `false`*

### `show_navigation_menu`

**Afficher le menu de navigation du cours**

Afficher un menu de navigation qui accélère l’accès aux outils

*Par défaut : `false`*


### `show_toolshortcuts`

**Raccourcis des outils**

Afficher les raccourcis des outils dans la bannière ?

*Par défaut : `false`*

### `student_view_enabled`

**Activer la vue apprenant**

Activer la vue apprenant, qui permet à un enseignant ou à un administrateur de voir un cours tel qu’un apprenant le verrait

*Par défaut : `true`*


### `view_grid_courses`

**Afficher les cours en grille**

Afficher les cours dans une disposition avec plusieurs cours par ligne. Sinon, la disposition affichera un cours par ligne.

*Par défaut : `true`*