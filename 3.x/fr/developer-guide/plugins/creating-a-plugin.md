# Création d’un plugin

Ce guide décrit la création d’un plugin Chamilo basique. Pour plus de détails, consultez la [page wiki Plugin development](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Étape 1 : Créer le répertoire du plugin

Créez un répertoire dans `public/plugin/`. Le nom du répertoire doit correspondre à l’identifiant de votre plugin :

```
public/plugin/MyPlugin/
```

## Étape 2 : Définir la classe du plugin

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

### Types de paramètres disponibles

| Type | Description |
|------|-------------|
| `boolean` | Case à cocher activé/désactivé |
| `text` | Saisie de texte sur une seule ligne |
| `select` | Liste déroulante (fournir un tableau `options`) |
| `wysiwyg` | Éditeur de texte enrichi |
| `html` | Champ HTML brut |
| `checkbox` | Case à cocher |
| `user` | Sélecteur d’utilisateur |

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

Accéder aux paramètres à l’exécution :

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Étape 3 : Créer plugin.php

`plugin.php` à la racine du plugin est **obligatoire**. Il doit affecter `$plugin_info` :

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Étape 4 : Créer les scripts d’installation et de désinstallation

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

Implémentez la création/suppression réelle du schéma à l’intérieur de la classe à l’aide du `SchemaTool` de Doctrine.

## Étape 5 : Ajouter les traductions

Créez des fichiers de langue dans `lang/` en utilisant les codes de locale (par ex. `en_US.php`, `fr_FR.php`, `es.php`). Le repli est `en_US.php`.

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

## Étape 6 : Injecter du contenu via les régions d’affichage

Les plugins peuvent injecter du HTML dans 18 régions prédéfinies de l’interface. Le mécanisme qui rend une région dépend de laquelle il s’agit :

* **`course_tool_plugin`** est la seule région rendue en redéfinissant `renderRegion(string $region): string` dans votre classe de plugin. Elle n’est appelée (via `PluginRegionController`) que pour un plugin limité au cours (`is_course_plugin`) lorsqu’une page de cours est ouverte :

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **Les 16 régions générales** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — sont rendues en incluant le `index.php` propre au plugin, et non `renderRegion()`. Le framework définit `$plugin_info['current_region']` avant d’inclure ce fichier, de sorte qu’il peut soit `echo` du HTML directement pour cette région, soit déclarer des modèles Twig à rendre via `$plugin_info['templates']` :

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` est un exemple fonctionnel complet — HelloWorld ne redéfinit pas du tout `renderRegion()` ; chaque région qu’il remplit passe par `index.php`.

* **`menu_administrator`** est un cas particulier réservé aux liens destinés uniquement aux administrateurs, affichés dans le tableau de bord d’administration historique, et non aux deux mécanismes ci-dessus. `Dashboard` et `CleanDeletedFiles` sont de vrais plugins qui l’utilisent.

Quel que soit le mécanisme utilisé, un administrateur doit encore activer la ou les région(s) pour votre plugin via le bouton **Régions** situé à côté de celui-ci sur la page **Gérer les plugins** (voir [Étape 9](#step-9-activate)) — un plugin n’affiche rien dans une région qui n’y a pas été explicitement activée.

## Étape 7 : Réagir aux événements de la plateforme (facultatif)

Les plugins peuvent réagir aux événements de la plateforme via des abonnés d’événements Symfony. Créez un fichier se terminant par `EventSubscriber.php` dans `src/EventSubscriber/` — il est enregistré automatiquement via `PluginEventSubscriberPass`.

Deux conditions, sinon l’abonné est ignoré silencieusement : la classe doit être dans le **namespace global** (le pass la résout à partir du nom de fichier), et vous devez exécuter `composer dump-autoload` après l’avoir ajoutée (`public/plugin` est une entrée classmap). Vérifiez le résultat avec `php bin/console debug:event-dispatcher <event.name>`.

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
        // Plugin classes are not Symfony services — use the create() singleton.
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
        // your logic here
    }
}
```

Consultez `src/CoreBundle/Event/Events.php` pour la liste complète des événements disponibles (utilisateur, cours, session, LP, exercice, portfolio, authentification, et plus encore).

### Nettoyage lors de la suppression d’un cours, d’une session ou d’un utilisateur

Si votre plugin stocke des lignes indexées sur un cours, une session ou un utilisateur, abonnez-vous à `Events::COURSE_DELETED`, `Events::SESSION_DELETED` ou `Events::USER_DELETED`. C’est le seul moyen de nettoyer — les anciennes méthodes `doWhenDeleting*` n’existent plus. Trois règles s’appliquent à ces écouteurs :

* **Agir sur `AbstractEvent::TYPE_PRE`** — l’événement se déclenche avant la suppression de la ligne, le seul moment où votre clé étrangère résout encore et où les données restent lisibles. `USER_DELETED` se déclenche aussi en `TYPE_POST`, donc la vérification n’est pas facultative dans ce cas.
* **Protéger sur l’installation, pas sur l’activation** — utilisez `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Vos lignes survivent à la désactivation du plugin, ou à son activation uniquement sur une autre URL d’accès, et leur clé étrangère bloque la suppression dans les deux cas.
* **Sur `USER_DELETED`, vérifier `$event->isHardDelete()`** — une suppression douce conserve l’utilisateur restaurable, donc ses données doivent survivre.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

Le plugin `StudentFollowUp` est la référence pour les utilisateurs ; `Bbb`, `BuyCourses` et `EmbedRegistry` portent les équivalents cours et session.

## Étape 8 : Hooks de cycle de vie

Surchargez ces méthodes dans votre classe de plugin pour réagir aux actions de la plateforme :

| Méthode | Déclenchée lorsque |
|--------|----------------|
| `install()` | Le plugin est activé |
| `uninstall()` | Le plugin est retiré |
| `performActionsAfterConfigure()` | L’administrateur enregistre le formulaire de configuration |
| `course_settings_updated(array $values)` | Les paramètres au niveau du cours changent |
| `validateCourseSetting(string $variable)` | Un paramètre de cours est enregistré (renvoyer `false` pour refuser) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` et `doWhenDeletingSession()` ont été retirées, ainsi que le déclencheur `AppPlugin::performActionsWhenDeletingItem()` qui les appelait — les surcharger ne fait plus rien. Utilisez plutôt les événements de suppression de l’[Étape 7](#cleaning-up-when-a-course-session-or-user-is-deleted).

## Étape 9 : Activer

Connectez-vous en tant qu’administrateur et allez au bloc **Plateforme** du tableau de bord d’administration, puis **Plugins** — cela ouvre la page **Gérer les plugins**. Trouvez votre plugin et cliquez sur **Installer** ; une fois installé, cliquez sur **Activer** pour l’activer (un plugin activé affiche un bouton **Désactiver** à la place).

## Conseils

* **Suivez les plugins existants comme exemples** — `public/plugin/HelloWorld/` et `public/plugin/TopLinks/` sont de bonnes références simples
* **Utilisez les traductions** — Utilisez toujours le système `lang/` pour le texte destiné à l’utilisateur
* **Nettoyez à la désinstallation** — Supprimez les tables de base de données et les paramètres dans le script de désinstallation
* **Vérifiez l’état d’activation** — Dans les abonnés d’événements, appelez `$this->plugin->isEnabled()` avant d’exécuter la logique. L’exception est le nettoyage à la suppression : protégez sur l’installation, car les lignes survivent à la désactivation du plugin