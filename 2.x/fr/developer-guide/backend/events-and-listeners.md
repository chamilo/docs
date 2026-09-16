# Événements et Écouteurs

Chamilo utilise le système d'événements de Symfony pour une communication découplée entre les composants.

## Écouteurs d'Événements

Chamilo utilise deux emplacements pour les écouteurs :

* **`src/CoreBundle/EventListener/`** — Écouteurs du noyau Symfony/HTTP (requête, réponse, exception, connexion/déconnexion, accès aux cours/sessions, etc.). Exemples : `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Écouteurs d'entités Doctrine attachés à des entités spécifiques. Exemples : `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Choisissez l'emplacement qui correspond à ce à quoi vous devez réagir : les événements du pipeline HTTP vont dans `EventListener/` ; les crochets du cycle de vie des entités vont dans `Entity/Listener/`.

## Abonnés aux Événements

Situés dans `src/CoreBundle/EventSubscriber/` :

Les abonnés aux événements peuvent écouter plusieurs événements :

* **Abonnés à la sécurité** — Gèrent les événements de connexion/déconnexion, suivent les tentatives de connexion
* **Abonnés API** — Pré/post-traitement pour les requêtes API
* **Abonnés Doctrine** — Réagissent aux événements du cycle de vie des entités

## Événements du Cycle de Vie Doctrine

Les entités utilisent `#[ORM\HasLifecycleCallbacks]` pour les événements au niveau de la base de données :

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Création d'Écouteurs Personnalisés

Pour ajouter un comportement personnalisé :

1. Créez une classe d'écouteur/abonné dans le bundle approprié
2. Marquez-la comme écouteur ou abonné d'événement dans la configuration du service
3. Implémentez la méthode de gestion

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Votre logique ici
    }
}
```

## Événements Clés

| Événement | Quand il se déclenche |
|-----------|-----------------------|
| `kernel.request` | À chaque requête HTTP |
| `kernel.response` | Avant l'envoi de la réponse HTTP |
| `security.interactive_login` | Lorsqu'un utilisateur se connecte |
| `doctrine.prePersist` | Avant qu'une entité ne soit enregistrée pour la première fois |
| `doctrine.postUpdate` | Après la mise à jour d'une entité |

## Événements Spécifiques à Chamilo

Ces événements sont déclenchés par le code propre à Chamilo et constituent les principaux points d'intégration pour les plugins. Les constantes sont définies dans `Chamilo\CoreBundle\Event\Events`.

| Constante | Chaîne d'événement | Quand il se déclenche |
|-----------|--------------------|-----------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Après la création d'un cours |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Avant qu'un utilisateur n'accède à un cours |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Avant qu'un utilisateur ne s'inscrive à un cours |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Lorsqu'un utilisateur tente de se réinscrire à une session |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Après la validation des identifiants de connexion |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Après la vérification des conditions supplémentaires de connexion |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Lorsque la barre d'outils de l'outil de document est rendue |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Lorsque les boutons d'action par fichier sont rendus |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Lorsqu'un document est ouvert pour visualisation |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Lorsque la page de rapport d'exercice rend ses liens d'action |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Après qu'un apprenant soumet un exercice |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Après qu'une question a été répondue |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Après la création d'un parcours d'apprentissage |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Lorsqu'un apprenant ouvre un élément de parcours d'apprentissage |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Après qu'un apprenant complète un parcours d'apprentissage |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Lorsque le tableau de bord administrateur construit sa liste de blocs |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Après la création d'un compte utilisateur |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Après la mise à jour d'un compte utilisateur |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Après la suppression d'un compte utilisateur |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Après la création d'un élément de portfolio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Lorsqu'un corps de notification est formaté |

## Exemple de Plugin : Ajout d'un Bouton au Visualiseur de Documents

Cette section explique comment un plugin utilise un abonné aux événements pour insérer un bouton dans une page existante de Chamilo — aucune modification du code principal n'est requise.

---
### Scénario

Un plugin nommé **MyViewer** souhaite ajouter un bouton "Ouvrir dans MyViewer" à côté de chaque document dans le gestionnaire de fichiers du cours. L'événement pertinent est `Events::DOCUMENT_ITEM_VIEW`, déclenché par Chamilo chaque fois qu'un document est sur le point d'être affiché, transportant l'entité `CDocument` et une liste modifiable de liens.

### Structure du répertoire du plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Déclare $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Page de paramètres du plugin
├── lang/                               # Chaînes de traduction
└── src/
    ├── MyViewerPlugin.php              # Classe principale du plugin (étend Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Abonné aux événements
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

La classe de base `Plugin` fournit `isEnabled()`, `get($settingKey)`, et des aides pour l'installation des outils de cours et des paramètres. Le modèle singleton (`static $instance`) est la convention standard de Chamilo car la classe du plugin est également instanciée en dehors du conteneur Symfony (dans les pages PHP legacy).

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

`addLink()` ajoute du HTML au tableau que le modèle de vue de document de Chamilo rend à côté des actions intégrées "Télécharger" et "Aperçu". L'abonné ne modifie jamais les fichiers principaux de Chamilo.

### Enregistrement

Aucun enregistrement manuel de service n'est nécessaire. Le fichier `config/services.yaml` de Chamilo active le drapeau `autoconfigure` de Symfony globalement, ce qui marque automatiquement toute classe implémentant `EventSubscriberInterface` comme un `kernel.event_subscriber`. Tant que le répertoire du plugin est chargé (via le classmap de Composer ou l'autoload PSR-4), Symfony détecte l'abonné lors du prochain vidage du cache.

```bash
php bin/console cache:clear
```

### Flux des données de l'événement

```
Liste des documents rendue
        │
        ▼
Chamilo déclenche DocumentItemViewEvent (transporte l'entité CDocument + tableau links[] vide)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → ajoute un lien HTML
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → ajoute un bouton "Modifier"
        │   (plusieurs plugins peuvent écouter le même événement)
        ▼
Le modèle rend event->getLinks() à côté des actions de fichier intégrées
```

Plusieurs plugins peuvent s'abonner au même événement de manière indépendante ; chacun ajoute des données au tableau partagé sans connaître les autres. L'ordre d'exécution suit le système de priorité de Symfony — passez un entier de priorité comme deuxième élément du tuple de gestionnaire dans `getSubscribedEvents()` si l'ordre est important :

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // plus élevé = plus tôt
    ];
}
```