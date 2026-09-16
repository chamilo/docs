# Création d'un Plugin

Ce guide vous accompagne dans la création d'un plugin de base pour Chamilo. Pour plus de détails, consultez la [page wiki sur le développement de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Étape 1 : Créer le Répertoire du Plugin

Créez un répertoire dans `public/plugin/`. Le nom du répertoire doit correspondre à l'identifiant de votre plugin :

```
public/plugin/MyPlugin/
```

## Étape 2 : Définir la Classe du Plugin

Créez `src/MyPluginPlugin.php`. La classe étend `Plugin` et suit le modèle singleton :

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Types de Paramètres Disponibles

| Type | Description |
|------|-------------|
| `boolean` | Case à cocher activé/désactivé |
| `text` | Champ de texte sur une seule ligne |
| `select` | Liste déroulante (fournir un tableau `options`) |
| `wysiwyg` | Éditeur de texte enrichi |
| `html` | Champ HTML brut |
| `checkbox` | Case à cocher |
| `user` | Sélecteur d'utilisateur |

Pour les paramètres de type `select` :

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Accéder aux paramètres lors de l'exécution :

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // valeur unique
$all  = $plugin->get_settings();       // tous les paramètres
```

## Étape 3 : Créer plugin.php

Le fichier `plugin.php` à la racine du plugin est **obligatoire**. Il doit assigner `$plugin_info` :

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Étape 4 : Créer les Scripts d'Installation et de Désinstallation

`install.php` :

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php` :

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Implémentez la création/suppression du schéma dans la classe en utilisant `SchemaTool` de Doctrine.

## Étape 5 : Ajouter des Traductions

Créez des fichiers de langue dans `lang/` en utilisant les codes de locale (par exemple, `en_US.php`, `fr_FR.php`, `es_ES.php`). Le fichier de secours est `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Accédez aux traductions via `$plugin->get_lang('key')`.

## Étape 6 : Injecter du Contenu via les Régions d'Affichage

Les plugins peuvent injecter du HTML dans 18 régions prédéfinies de l'interface frontend Vue. Surchargez `renderRegion()` dans votre classe :

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Les régions disponibles incluent : `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Étape 7 : Réagir aux Événements de la Plateforme (Optionnel)

Les plugins peuvent réagir aux événements de la plateforme en utilisant les abonnés aux événements de Symfony. Créez un fichier se terminant par `EventSubscriber.php` dans `src/EventSubscriber/` — il est automatiquement enregistré via `PluginEventSubscriberPass`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Les classes de plugin ne sont pas des services Symfony — utilisez le singleton create().
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // votre logique ici
    }
}
```

Consultez `src/CoreBundle/Event/Events.php` pour la liste complète des événements disponibles (utilisateur, cours, session, LP, exercice, portfolio, authentification, et plus encore).

## Étape 8 : Crochets de Cycle de Vie

Surchargez ces méthodes dans votre classe de plugin pour répondre aux actions de la plateforme :

| Méthode | Déclenchée lorsque |
|--------|---------------------|
| `install()` | Le plugin est activé |
| `uninstall()` | Le plugin est supprimé |
| `performActionsAfterConfigure()` | L'administrateur enregistre le formulaire de configuration |
| `course_settings_updated(array $values)` | Les paramètres au niveau du cours changent |
| `validateCourseSetting(string $variable)` | Un paramètre de cours est enregistré (retournez `false` pour rejeter) |
| `doWhenDeletingUser(int $userId)` | Un utilisateur est supprimé |
| `doWhenDeletingCourse(int $courseId)` | Un cours est supprimé |
| `doWhenDeletingSession(int $sessionId)` | Une session est supprimée |

## Étape 9 : Activer

Connectez-vous en tant qu'administrateur, accédez à **Gérer les plugins**, trouvez votre plugin et cliquez sur **Activer**.

## Conseils

* **Suivez les plugins existants comme exemples** — `public/plugin/HelloWorld/` et `public/plugin/TopLinks/` sont de bonnes références simples
* **Utilisez les traductions** — Utilisez toujours le système `lang/` pour les textes visibles par l'utilisateur
* **Nettoyez lors de la désinstallation** — Supprimez les tables de base de données et les paramètres dans le script de désinstallation
* **Vérifiez l'état d'activation** — Dans les abonnés aux événements, appelez toujours `$this->plugin->isEnabled()` avant d'exécuter une logique