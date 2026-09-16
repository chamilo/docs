# Architecture des plugins

## Emplacement des plugins

Les plugins sont stockés dans `public/plugin/`. Chaque plugin possède son propre répertoire :

```
public/plugin/
├── Bbb/                    # Intégration de BigBlueButton
├── Zoom/                   # Intégration de Zoom
├── Onlyoffice/             # Édition de documents OnlyOffice
├── XApi/                   # xAPI/Tin Can
├── ...                     # les plugins fournis sont situés sous public/plugin/
```

## Structure des plugins

Un répertoire de plugin typique contient :

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIS — assigne $plugin_info
├── install.php             # Script d'installation
├── uninstall.php           # Script de désinstallation
├── index.php               # Point d'entrée pour le rendu des régions (si applicable)
├── admin.php               # Interface d'administration (optionnel)
├── lang/                   # Fichiers de traduction (codes de locale : en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Classe principale du plugin (étend Plugin)
│   ├── Entity/                   # Entités Doctrine (découvertes automatiquement)
│   ├── Repository/               # Répertoires Doctrine
│   └── EventSubscriber/          # Abonnés aux événements Symfony (enregistrés automatiquement)
├── templates/              # Modèles Twig
└── resources/              # Ressources CSS/JS
```

## Classe de plugin

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

| Propriété | Type | Effet |
|-----------|------|-------|
| `$isCoursePlugin` | bool | Enregistre le plugin comme un outil de cours |
| `$isAdminPlugin` | bool | Ajoute une page d'interface d'administration |
| `$isMailPlugin` | bool | Intègre le système de messagerie |
| `$addCourseTool` | bool | Ajoute une icône à la page d'accueil du cours |
| `$course_settings` | array | Définit les champs de configuration par cours |

## Cycle de vie des plugins

1. **Installation** — L'administrateur active le plugin, ce qui exécute `install.php`
2. **Configuration** — Les paramètres sont définis et gérés via le panneau d'administration ; stockés dans `access_url_rel_plugin` (prend en charge le multi-tenant)
3. **Exécution** — Le plugin injecte du contenu dans les régions d'affichage ou réagit aux événements de la plateforme
4. **Désactivation** — Le plugin est désactivé mais ses données sont préservées
5. **Désinstallation** — Exécute `uninstall.php` pour nettoyer les données et les tables

## Régions d'affichage

Les plugins injectent du HTML dans 18 régions prédéfinies de l'interface frontend Vue en surchargeant `renderRegion()` :

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Contenu du pied de page de mon plugin</p>';
}
```

Régions disponibles : `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Intégration avec Symfony

### Abonnés aux événements

Les fichiers se terminant par `EventSubscriber.php` placés dans `src/EventSubscriber/` sont automatiquement enregistrés via `PluginEventSubscriberPass`. Ils implémentent `EventSubscriberInterface` et réagissent aux événements définis dans `src/CoreBundle/Event/Events.php`.

Comme la classe de plugin (`MyPluginPlugin`) n'est pas un service Symfony, elle ne peut pas être injectée automatiquement dans le constructeur de l'abonné. Utilisez le singleton `create()` à la place :

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

Les entités Doctrine placées dans `src/Entity/` sont automatiquement découvertes par `PluginEntityPass`. Utilisez les attributs PHP 8 pour le mappage. L'espace de noms doit suivre `Chamilo\PluginBundle\{PluginName}`. Utilisez des préfixes de noms de table uniques (par exemple, `my_plugin_*`) pour éviter les collisions.

### Service PluginHelper

Pour accéder à l'état du plugin depuis les services Symfony de base, injectez `PluginHelper` plutôt que d'instancier directement la classe du plugin :

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

| Méthode | Objectif |
|---------|----------|
| `isPluginEnabled(string $name): bool` | Vérifie si un plugin est installé et actif pour l'URL d'accès actuelle |
| `loadLegacyPlugin(string $name): ?object` | Instancie et retourne le singleton du plugin |
| `getPluginSetting(string $name, string $key): mixed` | Lit une valeur de paramètre unique du plugin |
| `getPluginOverrides(string $name): array` | Obtient les surcharges de `plugin.yaml` (valeurs par défaut + spécifiques à l'URL d'accès) pour un plugin |

## Références aux fichiers de base

| Fichier | Objectif |
|---------|----------|
| `public/main/inc/lib/plugin.class.php` | Classe de base des plugins |
| `public/main/inc/lib/plugin.lib.php` | Gestionnaire de plugins |
| `src/CoreBundle/Entity/Plugin.php` | Entité Doctrine des plugins |
| `src/CoreBundle/Helpers/PluginHelper.php` | Service PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes des événements |
| `public/plugin/HelloWorld/` | Exemple de plugin minimal |
| `public/plugin/TopLinks/` | Exemple de plugin simple |