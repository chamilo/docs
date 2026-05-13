# Système de Paramètres

La configuration de Chamilo est gérée à travers un ensemble de schémas de paramètres (environ 40, variant selon les versions) qui définissent chaque aspect configurable de la plateforme. Ils se trouvent dans `src/CoreBundle/Settings/` — la liste exacte à cet endroit est la source de vérité.

## Fonctionnement

Les paramètres sont :

1. **Définis** dans des classes de schéma (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Stockés** dans la base de données (table `settings_current`)
3. **Accessibles** via le service `SettingsManager`
4. **Gérés** à travers l'interface web d'administration

## Schémas de Paramètres

Chaque fichier de schéma définit une catégorie de paramètres. Principaux schémas :

| Schéma | Objectif |
|--------|----------|
| `PlatformSettingsSchema` | Informations sur l'institution, fuseau horaire, type de serveur, fonctionnalités du portail |
| `SecuritySettingsSchema` | Tentatives de connexion, CAPTCHA, politique de mot de passe, en-têtes HTTP, 2FA |
| `RegistrationSettingsSchema` | Auto-inscription, champs obligatoires, abonnement automatique |
| `CourseSettingsSchema` | Paramètres par défaut pour la création de cours, outils, catalogue |
| `SessionSettingsSchema` | Paramètres par défaut des sessions, visibilité |
| `MailSettingsSchema` | Configuration des e-mails, DKIM, notifications |
| `AiHelpersSettingsSchema` | Fournisseurs d'IA, activation/désactivation des fonctionnalités par outil d'IA |
| `ExerciseSettingsSchema` | Notation des quiz, feedback, options des questions |
| `LearningPathSettingsSchema` | Affichage des parcours d'apprentissage, prérequis, paramètres SCORM |
| `DocumentSettingsSchema` | Limites de téléversement, types de fichiers autorisés, stockage |
| `DisplaySettingsSchema` | Onglets de l'interface utilisateur, éléments de la barre latérale, thème |
| `LanguageSettingsSchema` | Langues disponibles, locale par défaut |
| `AdminSettingsSchema` | E-mail de l'administrateur, options spécifiques aux administrateurs |

## Accès aux Paramètres

Dans le code PHP :

```php
// Via le service SettingsManager
$value = $settingsManager->getSetting('platform.site_name');

// Dans le code legacy
$value = api_get_setting('platform.site_name');
```

Dans les templates :

```twig
{# Lire un seul paramètre #}
{{ chamilo_settings_get('platform.site_name') }}

{# Vérifier si un paramètre existe #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Obtenir tous les paramètres sous forme de tableau #}
{% set settings = chamilo_settings_all() %}
```

## Structure des Paramètres

Chaque paramètre possède :

* **Espace de noms** — La catégorie du schéma (par exemple, `platform`, `security`, `ai_helpers`)
* **Variable** — Le nom du paramètre (par exemple, `site_name`, `allow_registration`)
* **Valeur** — La valeur actuelle
* **Type** — Type de données (chaîne, booléen, tableau, etc.)

## Paramètres au Niveau des Cours

Certains paramètres peuvent être redéfinis au niveau des cours. Ces derniers sont définis dans `src/CourseBundle/Settings/` et incluent :

* Paramètres des exercices par cours
* Paramètres des devoirs par cours
* Activation/désactivation des fonctionnalités d'IA par cours

## Paramètres Multi-URL

Dans les configurations multi-URL, certains paramètres peuvent être personnalisés par URL d'accès, permettant différentes configurations de portail à partir de la même installation.

Ces paramètres apparaîtront plusieurs fois dans la table `settings`, avec différentes valeurs de `access_url`. Par défaut, tous les paramètres sont associés à `access_url=1`.

## Ajout d'un Nouveau Paramètre

1. Ajoutez la définition du paramètre à la classe de schéma appropriée
2. Fournissez une valeur par défaut
3. Exécutez les migrations de base de données si nécessaire
4. Accédez au paramètre via `SettingsManager`