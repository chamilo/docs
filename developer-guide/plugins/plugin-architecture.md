# Architecture des plugins

## Emplacement des plugins

Les plugins sont stockés dans `public/plugin/`. Chaque plugin possède son propre répertoire :

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Structure d’un plugin

Un répertoire de plugin typique contient :

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## Classe du plugin

Chaque plugin étend la classe de base `Plugin` (`public/main/inc/lib/plugin.class.php`) et suit le modèle singleton :

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Propriétés clés de la classe

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Enregistre le plugin comme outil de cours |
| `$isAdminPlugin` | bool | Ajoute une page d’interface d’administration |
| `$isMailPlugin` | bool | S’intègre au système de messagerie |
| `$addCourseTool` | bool | Ajoute une icône à la page d’accueil du cours |
| `$course_settings` | array | Définit les champs de configuration par cours |

## Cycle de vie du plugin

1. **Installation** — L’administrateur active le plugin, ce qui exécute `install.php`
2. **Configuration** — Les paramètres sont définis et gérés via le panneau d’administration ; stockés dans `access_url_rel_plugin` (prise en charge multi-tenant)
3. **Exécution** — Le plugin injecte du contenu dans les régions d’affichage ou réagit aux événements de la plateforme
4. **Désactivation** — Le plugin est désactivé mais ses données sont conservées
5. **Désinstallation** — Exécute `uninstall.php` pour nettoyer les données et les tables

## Régions d’affichage

Les plugins injectent du HTML dans 18 régions prédéfinies du frontend Vue en redéfinissant `renderRegion()` :

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Régions disponibles : `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Intégration Symfony

### Abonnés aux événements

Les fichiers se terminant par `EventSubscriber.php` placés dans `src/EventSubscriber/` sont enregistrés automatiquement via `PluginEventSubscriberPass`. Ils implémentent `EventSubscriberInterface` et réagissent aux événements définis dans `src/CoreBundle/Event/Events.php`.

Comme la classe du plugin (`MyPluginPlugin`) n’est pas un service Symfony, elle ne peut pas être injectée par autowiring dans le constructeur de l’abonné. Utilisez plutôt le singleton `create()` :

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Entités Doctrine

Les entités Doctrine placées dans `src/Entity/` sont découvertes automatiquement par `PluginEntityPass`. Utilisez les attributs PHP 8 pour le mapping. L’espace de noms doit suivre `Chamilo\PluginBundle\{PluginName}`. Utilisez des préfixes de noms de tables uniques (par ex. `my_plugin_*`) pour éviter les collisions.

### Service PluginHelper

Pour accéder à l’état d’un plugin depuis les services Symfony du cœur, injectez `PluginHelper` plutôt que d’instancier directement la classe du plugin :

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

Méthodes disponibles :

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Vérifier si un plugin est installé et actif pour l’URL d’accès courante |
| `loadLegacyPlugin(string $name): ?object` | Instancier et renvoyer le singleton du plugin |
| `getPluginSetting(string $name, string $key): mixed` | Lire la valeur d’un paramètre unique du plugin |
| `getPluginOverrides(string $name): array` | Obtenir les surcharges `plugin.yaml` (valeurs par défaut + spécifiques à l’URL d’accès) pour un plugin |

## Références des fichiers du cœur

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Classe de base des plugins |
| `public/main/inc/lib/plugin.lib.php` | Gestionnaire de plugins |
| `src/CoreBundle/Entity/Plugin.php` | Entité Doctrine Plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Service PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes d’événements |
| `public/plugin/HelloWorld/` | Plugin d’exemple minimal |
| `public/plugin/TopLinks/` | Plugin d’exemple simple |