# Paramètres des travaux

Paramètres par défaut et comportement de l'outil **Devoirs (Publications des étudiants)**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Devoirs (Travaux)**. Cette catégorie contient **12 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_compilatio_tool`

**Activer Compilatio**

Compilatio est un service anti-triche qui compare le texte entre deux soumissions et signale s'il y a une forte probabilité que le contenu (généralement des travaux) ne soit pas authentique.

*Par défaut : `false`*

### `allow_my_student_publication_page`

**Activer la page Mes travaux**

[inféré] Active une page dédiée permettant aux apprenants de voir et de gérer leurs travaux soumis.

*Par défaut : `false`*

### `allow_only_one_student_publication_per_user`

**Les étudiants ne peuvent soumettre qu'un seul travail**

[inféré] Restreint les apprenants à soumettre un seul travail par activité, empêchant les soumissions multiples.

*Par défaut : `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Rediriger vers la page d'accueil de l'outil travaux après téléversement ou commentaire**

Redirige vers la liste des travaux après le téléversement d'un travail ou l'ajout d'un commentaire.

*Par défaut : `false`*

### `assignment_prevent_duplicate_upload`

**Empêcher les téléversements en double dans les travaux**

[inféré] Empêche les apprenants de téléverser des fichiers identiques pour la même soumission de travail.

*Par défaut : `false`*

### `block_student_publication_add_documents`

**Empêcher l'ajout de documents aux travaux**

[inféré] Empêche les apprenants d'ajouter ou de joindre des documents lors de la soumission de travaux.

*Par défaut : `false`*

### `block_student_publication_edition`

**Empêcher la modification des travaux**

[inféré] Empêche les apprenants de modifier ou de mettre à jour leurs travaux soumis après la soumission initiale.

*Par défaut : `false`*

### `block_student_publication_score_edition`

**Empêcher l'enseignant de modifier les scores des travaux**

[inféré] Empêche les formateurs de modifier les scores des travaux après leur enregistrement.

*Par défaut : `false`*

### `compilatio_tool`

**Paramètres de Compilatio**

Configurez ici les détails de connexion à Compilatio.

### `considered_working_time`

**Activer l'effort de temps pour les travaux**

Cela permettra aux enseignants d'indiquer une estimation de l'effort de temps (au format hh:mm:ss) nécessaire pour compléter le travail. Lors de la soumission du travail et de l'approbation par l'enseignant (le travail reçoit une note), l'apprenant se verra automatiquement attribuer le temps correspondant.

*Par défaut : `work_time`*

### `force_download_doc_before_upload_work`

**Forcer le téléchargement du document avant le téléversement du travail**

Oblige les utilisateurs à télécharger le document fourni dans la définition du travail avant de pouvoir téléverser leur travail.

*Par défaut : `true`*

### `my_courses_show_pending_work`

**Afficher un lien vers les travaux 'en attente' depuis la page Mes cours**

[inféré] Affiche un lien ou un compteur des travaux en attente sur la page Mes cours de l'apprenant pour un accès rapide.

*Par défaut : `false`*
