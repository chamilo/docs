# Système de paramètres

La configuration de Chamilo est gérée par un ensemble de schémas de paramètres (environ 40, selon les versions) qui définissent chaque aspect configurable de la plateforme. Ils se trouvent dans `src/CoreBundle/Settings/` — la liste exacte qui s’y trouve constitue la source de vérité.

## Fonctionnement

Les paramètres sont :

1. **Définis** dans des classes de schéma (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Stockés** en base de données (table `settings_current`)
3. **Consultés** via le service `SettingsManager`
4. **Gérés** via l’interface d’administration web

## Schémas de paramètres

Chaque fichier de schéma définit une catégorie de paramètres. Schémas principaux :

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Informations de l’établissement, fuseau horaire, type de serveur, fonctionnalités du portail |
| `SecuritySettingsSchema` | Tentatives de connexion, CAPTCHA, politique de mots de passe, en-têtes HTTP, 2FA |
| `RegistrationSettingsSchema` | Auto-inscription, champs obligatoires, abonnement automatique |
| `CourseSettingsSchema` | Valeurs par défaut de création de cours, outils, catalogue |
| `SessionSettingsSchema` | Valeurs par défaut des sessions, visibilité |
| `MailSettingsSchema` | Configuration e-mail, DKIM, notifications |
| `AiHelpersSettingsSchema` | Fournisseurs d’IA, activation des fonctionnalités par outil d’IA |
| `ExerciseSettingsSchema` | Notation des quiz, rétroaction, options des questions |
| `LearningPathSettingsSchema` | Affichage des parcours, prérequis, paramètres SCORM |
| `DocumentSettingsSchema` | Limites de téléversement, types de fichiers autorisés, stockage |
| `DisplaySettingsSchema` | Onglets de l’interface, éléments de la barre latérale, thème |
| `LanguageSettingsSchema` | Langues disponibles, locale par défaut |
| `AdminSettingsSchema` | E-mail de l’administrateur, options spécifiques à l’administration |

## Accès aux paramètres

En code PHP :

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Dans les templates :

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Structure d’un paramètre

Chaque paramètre possède :

* **Namespace** — La catégorie du schéma (par ex. `platform`, `security`, `ai_helpers`)
* **Variable** — Le nom du paramètre (par ex. `site_name`, `allow_registration`)
* **Value** — La valeur actuelle
* **Type** — Le type de données (chaîne, booléen, tableau, etc.)

## Paramètres au niveau du cours

Certains paramètres peuvent être surchargés au niveau du cours. Ils sont définis dans `src/CourseBundle/Settings/` et comprennent :

* Paramètres des exercices par cours
* Paramètres des devoirs par cours
* Activation des fonctionnalités d’IA par cours

## Paramètres multi-URL

Dans les installations multi-URL, certains paramètres peuvent être personnalisés par URL d’accès, ce qui permet des configurations de portail différentes à partir d’une même installation.

Ces paramètres apparaissent plusieurs fois dans la table `settings`, avec des valeurs `access_url` différentes. Par défaut, tous les paramètres sont associés à `access_url=1`.

## Ajouter un nouveau paramètre

1. Ajouter la définition du paramètre à la classe de schéma appropriée
2. Fournir une valeur par défaut
3. Exécuter les migrations de base de données si nécessaire
4. Accéder au paramètre via `SettingsManager`