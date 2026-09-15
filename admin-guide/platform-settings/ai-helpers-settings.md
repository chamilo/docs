# Paramètres des assistants IA

Configuration des assistants IA (génération de texte, génération d’images, génération de vidéos, tuteur IA, notation IA). Chaque fournisseur peut être activé par type de tâche. Voir aussi [Configuration de l’IA](../integrations/ai-configuration.md).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Assistants IA**. Cette catégorie contient **14 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `ai_providers`

**Données de connexion des fournisseurs d’IA**

Données de configuration pour se connecter aux services d’IA externes.

### `content_analyser`

**Analyseur de contenu**

Analyse les supports d’apprentissage afin d’en extraire des informations ou d’en améliorer la qualité.

*Par défaut : `false`*

### `course_analyser`

**Analyseur de cours**

Analyse toutes les ressources d’un ou plusieurs cours et pré-entraîne le modèle d’IA à répondre à toute question sur ce ou ces cours (assurez-vous que le contenu peut être partagé avec les services d’IA configurés).

*Par défaut : `false`*

### `disclose_ai_assistance`

**Divulguer l’assistance de l’IA**

Affiche une étiquette sur tout contenu ou tout retour qui a été généré ou co-généré par un système d’IA, indiquant à l’utilisateur que le contenu a été élaboré avec l’aide d’un système d’IA. Les détails sur le système d’IA utilisé dans chaque cas sont conservés dans la base de données à des fins d’audit, mais ne sont pas directement accessibles à l’utilisateur final.

*Par défaut : `true`*

### `enable_ai_helpers`

**Activer l’outil d’assistant IA**

Active toutes les fonctionnalités alimentées par l’IA disponibles dans la plateforme.

*Par défaut : `false`*

### `exercise_generator`

**Générateur d’exercices**

Génère des tests personnalisés avec l’IA à partir du contenu du cours.

*Par défaut : `false`*

### `glossary_terms_generator`

**Générateur de termes de glossaire**

Permet aux enseignants de demander des termes de glossaire générés par l’IA dans leur cours. Cela génère 20 termes à partir du titre du cours et de la description générale dans l’outil de description du cours. En cas d’utilisation répétée, les termes déjà présents dans ce glossaire sont exclus (assurez-vous que le contenu peut être partagé avec les services d’IA configurés).

*Par défaut : `false`*

### `image_generator`

**Générateur d’images**

Génère des images à partir d’invites ou de contenus à l’aide de l’IA.

*Par défaut : `false`*

### `learning_path_generator`

**Générateur de parcours d’apprentissage**

Génère des parcours d’apprentissage personnalisés à l’aide de suggestions de l’IA.

*Par défaut : `false`*

### `open_answers_grader`

**Correcteur de réponses ouvertes**

Note automatiquement les réponses ouvertes à l’aide de l’IA.

*Par défaut : `false`*

### `task_grader`

**Correcteur de devoirs**

Utilise l’IA pour évaluer et noter les devoirs déposés.

*Par défaut : `false`*

### `tutor_chatbot`

**Chatbot tuteur alimenté par l’IA**

Fournit aux étudiants un assistant de tutorat alimenté par l’IA.

*Par défaut : `false`*

### `video_generator`

**Générateur de vidéos**

Génère des vidéos à partir d’invites ou de contenus à l’aide de l’IA (cela peut consommer de nombreux jetons).

*Par défaut : `false`*

### `wysiwyg_translation_all_languages` **v3**

**Autoriser la traduction par IA vers toutes les langues actives dans les éditeurs WYSIWYG**

Permet aux enseignants de générer des traductions pour toutes les langues actives de la plateforme en une seule action WYSIWYG. Cela peut consommer un grand nombre de jetons d’IA.

*Par défaut : `true`*