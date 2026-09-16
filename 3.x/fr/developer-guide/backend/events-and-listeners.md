# Événements et écouteurs

Chamilo utilise le système d’événements de Symfony pour une communication découplée entre les composants.

## Écouteurs d’événements

Chamilo utilise deux emplacements d’écouteurs :

* **`src/CoreBundle/EventListener/`** — écouteurs du noyau Symfony / HTTP (requête, réponse, exception, connexion/déconnexion, accès cours/session, etc.). Exemples : `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — écouteurs d’entités Doctrine attachés à des entités spécifiques. Exemples : `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Choisissez l’emplacement qui correspond à ce à quoi vous devez réagir : les événements du pipeline HTTP vont dans `EventListener/` ; les crochets du cycle de vie des entités vont dans `Entity/Listener/`.

## Abonnés aux événements

Situés dans `src/CoreBundle/EventSubscriber/` :

Les abonnés aux événements peuvent écouter plusieurs événements :

* **Abonnés de sécurité** — Gèrent les événements de connexion/déconnexion, suivent les tentatives de connexion
* **Abonnés d’API** — Traitement avant/après pour les requêtes d’API
* **Abonnés Doctrine** — Réagissent aux événements du cycle de vie des entités

## Événements du cycle de vie Doctrine

Les entités utilisent `#[ORM\HasLifecycleCallbacks]` pour les événements au niveau de la base de données :

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Création d’écouteurs personnalisés

Pour ajouter un comportement personnalisé :

1. Créez une classe d’écouteur/abonné dans le bundle approprié
2. Marquez-la comme écouteur ou abonné d’événement dans la configuration des services
3. Implémentez la méthode de gestion

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Événements clés

| Événement | Moment du déclenchement |
|-------|--------------|
| `kernel.request` | Chaque requête HTTP |
| `kernel.response` | Avant l’envoi de la réponse HTTP |
| `security.interactive_login` | L’utilisateur se connecte |
| `doctrine.prePersist` | Avant la première sauvegarde d’une entité |
| `doctrine.postUpdate` | Après la mise à jour d’une entité |

## Événements spécifiques à Chamilo

Ces événements sont émis par le code propre de Chamilo et constituent les principaux points d’intégration pour les plugins. Les constantes sont définies dans `Chamilo\CoreBundle\Event\Events`.

| Constante | Chaîne d’événement | Moment du déclenchement |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Après la création d’un cours |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Avant qu’un utilisateur n’accède à un cours |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Avant qu’un utilisateur ne s’inscrive à un cours |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Lorsqu’un utilisateur tente de se réinscrire à une session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Après la validation des identifiants de connexion |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Après la vérification des conditions de connexion supplémentaires |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Lorsque la barre d’outils de l’outil documents est rendue |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Lorsque les boutons d’action par fichier sont rendus |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Lorsqu’un document est ouvert pour consultation |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Lorsque la page de rapport d’exercice rend ses liens d’action |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Après qu’un apprenant a soumis un exercice |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Après chaque réponse à une question |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Après la création d’un parcours d’apprentissage |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Lorsqu’un apprenant ouvre un élément de parcours |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Après qu’un apprenant a terminé un parcours d’apprentissage |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Lorsque le tableau de bord d’administration construit sa liste de blocs |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Après la création d’un compte utilisateur |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Après la mise à jour d’un compte utilisateur |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Après la suppression d’un compte utilisateur |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Après la création d’un élément de portfolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Lorsqu’un corps de notification est mis en forme |

## Exemple de plugin : ajouter un bouton à la visionneuse de documents

Cette section explique comment un plugin utilise un abonné d’événement pour injecter un bouton dans une page Chamilo existante — sans modification du code du noyau.

### Scénario

Un plugin appelé **MyViewer** souhaite ajouter un bouton « Ouvrir dans MyViewer » à côté de chaque document dans le gestionnaire de fichiers du cours. L’événement concerné est `Events::DOCUMENT_ITEM_VIEW`, déclenché par Chamilo chaque fois qu’un document est sur le point d’être affiché, et qui transporte l’entité `CDocument` ainsi qu’une liste de liens mutable.

### Organisation du répertoire du plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### Classe principale du plugin (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

La classe de base `Plugin` fournit `isEnabled()`, `get($settingKey)` et des aides pour l’installation des outils de cours et des paramètres. Le motif singleton (`static $instance`) est la convention standard de Chamilo, car la classe du plugin est également instanciée en dehors du conteneur Symfony (dans les pages PHP héritées).

### Abonné aux événements (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` ajoute du HTML au tableau que le modèle d’affichage des documents de Chamilo rend aux côtés des actions intégrées « Télécharger » et « Aperçu ». L’abonné ne modifie jamais les fichiers du cœur de Chamilo.

### Enregistrement

Aucune inscription manuelle de service n’est nécessaire. Le fichier `config/services.yaml` de Chamilo active globalement l’indicateur `autoconfigure` de Symfony, qui étiquette automatiquement toute classe implémentant `EventSubscriberInterface` comme `kernel.event_subscriber`. Tant que le répertoire du plugin est chargé (via le classmap de Composer ou l’autoload PSR-4), Symfony détecte l’abonné au prochain vidage du cache.

```bash
php bin/console cache:clear
```

### Circulation des données de l’événement

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

Plusieurs plugins peuvent s’abonner indépendamment au même événement ; chacun ajoute aux données partagées sans connaître les autres. L’ordre d’exécution suit le système de priorité de Symfony — passez un entier de priorité comme second élément du tuple du gestionnaire dans `getSubscribedEvents()` si l’ordre importe :

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```