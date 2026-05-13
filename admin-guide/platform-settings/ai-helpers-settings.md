# Paramètres des assistants IA

Configuration des assistants IA (génération de texte, génération d'image, génération de vidéo, tuteur IA, évaluation IA). Chaque fournisseur peut être activé par type de tâche. Voir aussi [Configuration IA](../integrations/ai-configuration.md).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Assistants IA**. Cette catégorie contient **13 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `ai_providers`

**Données de connexion des fournisseurs IA**

Données de configuration pour se connecter aux services IA externes.

### `content_analyser`

**Analyseur de contenu**

Analyse les matériels d'apprentissage pour en extraire des informations ou améliorer la qualité.

*Par défaut : `false`*

### `course_analyser`

**Analyseur de cours**

Analyse toutes les ressources d'un ou plusieurs cours et pré-entraîne le modèle IA pour répondre à toute question sur ce ou ces cours (assurez-vous que le contenu peut être partagé avec les services IA configurés).

*Par défaut : `false`*

### `disclose_ai_assistance`

**Divulguer l'assistance IA**

Affiche une étiquette sur tout contenu ou retour d'information généré ou co-généré par un système IA, informant l'utilisateur que le contenu a été créé avec l'aide d'un système IA. Les détails sur le système IA utilisé dans chaque cas sont conservés dans la base de données pour audit, mais ne sont pas directement accessibles à l'utilisateur final.

*Par défaut : `true`*

### `enable_ai_helpers`

**Activer l'outil d'assistance IA**

Active toutes les fonctionnalités alimentées par l'IA disponibles sur la plateforme.

*Par défaut : `false`*

### `exercise_generator`

**Générateur d'exercices**

Génère des tests personnalisés avec l'IA basés sur le contenu du cours.

*Par défaut : `false`*

### `glossary_terms_generator`

**Générateur de termes de glossaire**

Permet aux enseignants de demander des termes de glossaire générés par l'IA dans leur cours. Cela générera 20 termes basés sur le titre du cours et la description générale dans l'outil de description du cours. Si utilisé plusieurs fois, cela exclura les termes déjà présents dans ce glossaire (assurez-vous que le contenu peut être partagé avec les services IA configurés).

*Par défaut : `false`*

### `image_generator`

**Générateur d'images**

Génère des images basées sur des instructions ou du contenu en utilisant l'IA.

*Par défaut : `false`*

### `learning_path_generator`

**Générateur de parcours d'apprentissage**

Génère des parcours d'apprentissage personnalisés en utilisant des suggestions de l'IA.

*Par défaut : `false`*

### `open_answers_grader`

**Évaluateur de réponses ouvertes**

Évalue automatiquement les réponses ouvertes en utilisant l'IA.

*Par défaut : `false`*

### `task_grader`

**Évaluateur de devoirs**

Utilise l'IA pour évaluer et noter les devoirs téléversés.

*Par défaut : `false`*

### `tutor_chatbot`

**Chatbot tuteur alimenté par l'IA**

Fournit aux étudiants un assistant de tutorat alimenté par l'IA.

*Par défaut : `false`*

### `video_generator`

**Générateur de vidéos**

Génère des vidéos basées sur des instructions ou du contenu en utilisant l'IA (cela peut consommer beaucoup de jetons).

*Par défaut : `false`*