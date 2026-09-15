# Paramètres des travaux (Work)

Valeurs par défaut et comportement de l’outil **Travaux (Publications des étudiants)**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Travaux (Work)**. Cette catégorie contient **12 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_compilatio_tool`

**Activer Compilatio**

Compilatio est un service anti-triche qui compare le texte entre deux soumissions et signale s’il existe une forte probabilité que le contenu (généralement des travaux) ne soit pas authentique.

*Par défaut : `false`*

### `allow_my_student_publication_page`

**Activer la page Mes travaux**

[inféré] Activer une page dédiée permettant aux apprenants de consulter et de gérer leurs propres travaux soumis.

*Par défaut : `false`*

### `allow_only_one_student_publication_per_user`

**Les étudiants ne peuvent téléverser qu’un seul travail**

[inféré] Limiter les apprenants à une seule soumission par activité, en empêchant les soumissions multiples.

*Par défaut : `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Rediriger vers la page d’accueil de l’outil Travaux après un téléversement ou un commentaire**

Rediriger vers la liste des travaux après le téléversement d’un travail ou l’ajout d’un commentaire

*Par défaut : `false`*

### `assignment_prevent_duplicate_upload`

**Empêcher les téléversements en double dans les travaux**

[inféré] Empêcher les apprenants de téléverser des fichiers identiques pour une même soumission de travail.

*Par défaut : `false`*

### `block_student_publication_add_documents`

**Empêcher l’ajout de documents aux travaux**

[inféré] Empêcher les apprenants d’ajouter ou de joindre des documents lors de la soumission de travaux.

*Par défaut : `false`*

### `block_student_publication_edition`

**Empêcher la modification des travaux**

[inféré] Empêcher les apprenants de modifier ou de mettre à jour leurs travaux soumis après la soumission initiale.

*Par défaut : `false`*

### `block_student_publication_score_edition`

**Empêcher l’enseignant de modifier les notes des travaux**

[inféré] Empêcher les enseignants de modifier les notes des travaux une fois qu’elles ont été enregistrées.

*Par défaut : `false`*

### `compilatio_tool`

**Paramètres Compilatio**

Configurez ici les détails de connexion à Compilatio.

### `considered_working_time`

**Activer le temps d’effort pour les travaux**

Cela permettra aux enseignants d’indiquer un temps d’effort estimé (au format hh:mm:ss) pour réaliser le travail. Lors de la soumission du travail et de sa validation par l’enseignant (le travail reçoit une note), le temps correspondant sera automatiquement attribué à l’apprenant.

*Par défaut : `work_time`*

### `force_download_doc_before_upload_work`

**Forcer le téléchargement du document avant le téléversement du travail**

Obliger les utilisateurs à télécharger le document fourni dans la définition du travail avant de pouvoir téléverser leur travail.

*Par défaut : `true`*

### `my_courses_show_pending_work`

**Afficher un lien vers les travaux « en attente » depuis la page Mes cours**

[inféré] Afficher un lien ou un compteur de travaux en attente sur la page Mes cours de l’apprenant pour un accès rapide.

*Par défaut : `false`*