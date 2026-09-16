# Paramètres du Carnet de notes (Évaluations)

Paramètres par défaut appliqués à l'outil **Carnet de notes (Évaluations)** — affichage des scores, précision décimale, seuils de score pour les certificats et agrégation.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Carnet de notes (Évaluations)**. Cette catégorie contient **34 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_gradebook_comments`

**Commentaires dans le carnet de notes**

Active les commentaires dans le carnet de notes afin que les enseignants puissent ajouter un commentaire sur la performance globale de l'apprenant dans ce cours. Le commentaire apparaîtra dans l'export PDF pour l'apprenant.

*Par défaut : `false`*

### `allow_gradebook_stats`

**Mettre en cache les résultats dans le carnet de notes**

Place certaines des calculs lourds des moyennes dans des champs mis en cache pour les liens et les évaluations afin d'augmenter la vitesse (considérablement). L'impact négatif potentiel est que cela peut prendre du temps pour actualiser les tableaux de résultats du carnet de notes.

*Par défaut : `false`*

### `gradebook_badge_sidebar`

**Barre latérale des badges du carnet de notes**

Génère un bloc dans le menu latéral où quelques badges peuvent être affichés comme en attente d'approbation. Nécessite que les carnets de notes soient listés ici, par ID (numérique).

### `gradebook_default_grade_model_id`

**Modèle de notation par défaut**

Cette valeur sera sélectionnée par défaut lors de la création d'un cours.

### `gradebook_default_weight`

**Poids par défaut dans le carnet de notes**

Ce poids sera utilisé par défaut dans tous les cours.

*Par défaut : `100`*

### `gradebook_dependency`

**Dépendances inter-carnets de notes**

Active un mécanisme de dépendances entre carnets de notes qui informe les utilisateurs des autres éléments qu'ils doivent compléter en premier pour finaliser le carnet de notes.

*Par défaut : `false`*

### `gradebook_dependency_mandatory_courses`

**Cours obligatoires pour les dépendances du carnet de notes**

Lors de l'utilisation des dépendances inter-carnets de notes, vous pouvez choisir une liste de cours obligatoires qui seront requis avant d'approuver tout carnet de notes ayant des dépendances.

### `gradebook_detailed_admin_view`

**Afficher des colonnes supplémentaires dans le carnet de notes**

Affiche des colonnes supplémentaires dans la vue étudiant du carnet de notes avec le meilleur score de tous les étudiants, la position relative de l'étudiant consultant le rapport et le score moyen de l'ensemble du groupe d'étudiants.

*Par défaut : `false`*

### `gradebook_display_extra_stats`

**Statistiques supplémentaires du carnet de notes**

Ajoute des colonnes supplémentaires au rapport principal du carnet de notes (1 = classement, 2 = meilleur score, 3 = moyenne).

### `gradebook_enable`

**Activation de l'outil Évaluations**

L'outil Évaluations vous permet d'évaluer les compétences dans votre organisation en fusionnant les évaluations des activités en classe et en ligne dans des rapports de performance. Souhaitez-vous l'activer ?

*Par défaut : `true`*

### `gradebook_enable_grade_model`

**Activer le modèle de carnet de notes**

Permet la création automatique de catégories de carnet de notes dans un cours en fonction des modèles de carnet de notes.

*Par défaut : `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Activer les compétences par sous-catégorie du carnet de notes**

Les compétences sont normalement attribuées pour la complétion d'un carnet de notes entier. En activant cette option, vous permettez aux compétences d'être attachées à des sous-sections des carnets de notes.

*Par défaut : `false`*

### `gradebook_flatview_extrafields_columns`

**Champs supplémentaires utilisateur dans la vue plate du carnet de notes**

Ajoute les colonnes données (tableau 'variables') au tableau principal des résultats dans le carnet de notes.

### `gradebook_hide_graph`

**Masquer les graphiques du carnet de notes**

Si votre portail a des ressources limitées, réduire la génération des graphiques dynamiques du carnet de notes avec potentiellement des milliers de résultats est une bonne option.

*Par défaut : `false`*

### `gradebook_hide_link_to_item_for_student`

**Masquer les liens vers les éléments pour les apprenants dans le carnet de notes**

Évite que les apprenants cliquent sur les éléments du carnet de notes en supprimant les liens sur les éléments.

*Par défaut : `false`*

### `gradebook_hide_pdf_report_button`

**Masquer le bouton 'télécharger le rapport PDF' du carnet de notes**

Supprime le bouton d'export PDF des vues du carnet de notes pour les apprenants.

*Par défaut : `false`*

### `gradebook_hide_table`

**Masquer le tableau du carnet de notes pour les apprenants**

Réduit le temps de chargement du carnet de notes en masquant le tableau des résultats (tout en donnant accès aux certificats, compétences, etc.).

*Par défaut : `false`*

### `gradebook_locking_enabled`

**Activer le verrouillage des évaluations par les enseignants**

Une fois activée, cette option permettra le verrouillage de toute évaluation par les enseignants du cours correspondant. Cela empêchera toute modification des résultats par l'enseignant dans les ressources utilisées pour l'évaluation : examens, parcours d'apprentissage, tâches, etc. Le seul rôle autorisé à déverrouiller une évaluation verrouillée est l'administrateur. L'enseignant sera informé de cette possibilité. Le verrouillage et le déverrouillage des carnets de notes seront enregistrés dans le rapport des activités importantes du système.

*Par défaut : `false`*

### `gradebook_multiple_evaluation_attempts`

**Autoriser plusieurs tentatives d'évaluation dans le carnet de notes**

Permet d'ajouter des commentaires à plusieurs tentatives d'évaluation dans le carnet de notes et les tableaux de résultats.

*Par défaut : `false`*

### `gradebook_number_decimals`

**Nombre de décimales**

Permet de définir le nombre de décimales autorisées dans un score.

*Par défaut : `0`*

### `gradebook_pdf_export_settings`

**Options d'export PDF du carnet de notes**

Modifie l'export PDF pour les apprenants en fonction des paramètres fournis ('hide_score_weight', 'hide_feedback_textarea', ...).

### `gradebook_report_score_style`

**Style de score des rapports du carnet de notes**

Ajoute une configuration de style de score du carnet de notes dans la vue plate. Consultez api.lib.php pour trouver les options : exemples SCORE_DIV = 1, SCORE_PERCENT = 2, etc.

*Par défaut : `1`*

### `gradebook_score_display_colorsplit`

**Seuil**

Le seuil (en %) en dessous duquel les scores seront colorés en rouge.

*Par défaut : `50`*

### `gradebook_score_display_custom`

**Étiquetage des niveaux de compétence**

Cochez la case pour activer l'étiquetage des niveaux de compétence.

*Par défaut : `false`*

### `gradebook_score_display_custom_standalone`

**Affichage personnalisé des scores dans une colonne indépendante du carnet de notes**

Affiche les valeurs de niveau de compétence personnalisées dans une colonne séparée dans la vue plate du carnet de notes lors de l'utilisation de l'affichage personnalisé des scores.

*Par défaut : `false`*

### `gradebook_score_display_upperlimit`

**Afficher la limite supérieure du score**

Cochez la case pour afficher la limite supérieure du score.

*Par défaut : `false`*

### `gradebook_use_apcu_cache`

**Utiliser le cache APCu pour accélérer le carnet de notes**

Améliore la vitesse lors du rendu des rapports d'étudiants du carnet de notes en utilisant le cache Doctrine APCu. APCu est une extension PHP optionnelle mais recommandée.

*Par défaut : `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Utiliser les paramètres de test pour l'affichage des notes**

Applique les paramètres d'affichage des scores d'exercice (pourcentage vs points) aux scores des catégories dans le carnet de notes.

*Par défaut : `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Utiliser le paramètre d'affichage global des scores dans le carnet de notes**

Applique les paramètres globaux d'affichage des scores d'exercice aux calculs de score total dans le carnet de notes.

*Par défaut : `false`*

### `hide_gradebook_percentage_user_result`

**Masquer le pourcentage dans les résultats meilleur/moyen du carnet de notes**

Supprime l'affichage du pourcentage des résultats de score meilleur/moyen montrés aux apprenants dans le carnet de notes.

*Par défaut : `true`*

### `my_display_coloring`

**Afficher des couleurs pour les scores dans le carnet de notes**

Active le codage couleur pour une meilleure visibilité des scores dans le carnet de notes.

*Par défaut : `false`*

### `student_publication_to_take_in_gradebook`

**Devoir pris en compte pour le carnet de notes**

Dans l'outil de devoirs, les étudiants peuvent téléverser plus d'un fichier. S'il y en a plus d'un pour un seul devoir, lequel doit être pris en compte lors de leur classement dans le carnet de notes ? Cela dépend de votre méthodologie. Utilisez 'first' pour mettre l'accent sur l'attention aux détails (comme rendre à temps et rendre le bon travail en premier). Utilisez 'last' pour mettre en avant le travail collaboratif et adaptatif.

*Par défaut : `first`*

### `teachers_can_change_grade_model_settings`

**Les enseignants peuvent modifier les paramètres du modèle de carnet de notes**

Lors de l'édition d'un carnet de notes.

*Par défaut : `true`*

### `teachers_can_change_score_settings`

**Les enseignants peuvent modifier les paramètres de score du carnet de notes**

Lors de l'édition des paramètres du carnet de notes.

*Par défaut : `true`*