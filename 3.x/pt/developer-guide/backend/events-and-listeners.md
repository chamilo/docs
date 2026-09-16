# Eventos e Listeners

O Chamilo utiliza o sistema de eventos do Symfony para comunicação desacoplada entre componentes.

## Event Listeners

O Chamilo utiliza duas localizações de listeners:

* **`src/CoreBundle/EventListener/`** — listeners do kernel/HTTP do Symfony (pedido, resposta, exceção, login/logout, acesso a curso/sessão, etc.). Exemplos: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — listeners de entidades Doctrine associados a entidades específicas. Exemplos: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Escolha a localização que corresponde ao que precisa de reagir: eventos do pipeline HTTP vão em `EventListener/`; ganchos do ciclo de vida de entidades vão em `Entity/Listener/`.

## Event Subscribers

Localizados em `src/CoreBundle/EventSubscriber/`:

Os event subscribers podem escutar vários eventos:

* **Security subscribers** — Tratam eventos de login/logout, registam tentativas de login
* **API subscribers** — Pré/pós-processamento de pedidos à API
* **Doctrine subscribers** — Reagem a eventos do ciclo de vida das entidades

## Eventos do ciclo de vida Doctrine

As entidades utilizam `#[ORM\HasLifecycleCallbacks]` para eventos ao nível da base de dados:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Criar listeners personalizados

Para adicionar comportamento personalizado:

1. Crie uma classe listener/subscriber no bundle adequado
2. Marque-a como event listener ou subscriber na configuração de serviços
3. Implemente o método de tratamento

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Eventos principais

| Evento | Quando é disparado |
|-------|--------------|
| `kernel.request` | Cada pedido HTTP |
| `kernel.response` | Antes de enviar a resposta HTTP |
| `security.interactive_login` | O utilizador inicia sessão |
| `doctrine.prePersist` | Antes de uma entidade ser guardada pela primeira vez |
| `doctrine.postUpdate` | Depois de uma entidade ser atualizada |

## Eventos específicos do Chamilo

Estes eventos são despachados pelo próprio código do Chamilo e constituem os principais pontos de integração para plugins. As constantes estão definidas em `Chamilo\CoreBundle\Event\Events`.

| Constante | Cadeia do evento | Quando é disparado |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Depois de um curso ser criado |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Antes de um utilizador aceder a um curso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Antes de um utilizador se inscrever num curso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Quando um utilizador tenta reinscrever-se numa sessão |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Depois de as credenciais de login serem validadas |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Depois de condições adicionais de login serem verificadas |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Quando a barra de ferramentas da ferramenta de documentos é renderizada |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Quando os botões de ação por ficheiro são renderizados |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Quando um documento é aberto para visualização |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Quando a página de relatório de exercícios renderiza as suas ligações de ação |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Depois de um formando submeter um exercício |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Depois de cada pergunta ser respondida |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Depois de um percurso de aprendizagem ser criado |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Quando um formando abre um item de LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Depois de um formando concluir um percurso de aprendizagem |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Quando o painel de administração constrói a sua lista de blocos |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Depois de uma conta de utilizador ser criada |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Depois de uma conta de utilizador ser atualizada |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Depois de uma conta de utilizador ser eliminada |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Depois de um item de portefólio ser criado |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Quando o corpo de uma notificação é formatado |

## Exemplo de plugin: adicionar um botão ao visualizador de documentos

Esta secção explica como um plugin utiliza um event subscriber para injetar um botão numa página existente do Chamilo — sem necessidade de modificar o código do núcleo.

### Cenário

Um plugin chamado **MyViewer** pretende adicionar um botão "Abrir no MyViewer" junto a cada documento no gestor de ficheiros do curso. O evento relevante é `Events::DOCUMENT_ITEM_VIEW`, despachado pelo Chamilo sempre que um documento está prestes a ser apresentado, transportando a entidade `CDocument` e uma lista mutável de ligações.

### Estrutura de diretórios do plugin

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

### Classe principal do plugin (`src/MyViewerPlugin.php`)

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

A classe base `Plugin` disponibiliza `isEnabled()`, `get($settingKey)` e auxiliares para instalar ferramentas de curso e definições. O padrão singleton (`static $instance`) é a convenção padrão do Chamilo porque a classe do plugin também é instanciada fora do contentor Symfony (em páginas PHP legadas).

### Subscritor de eventos (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` acrescenta HTML ao array que o modelo de visualização de documentos do Chamilo renderiza juntamente com as ações incorporadas "Transferir" e "Pré-visualizar". O subscritor nunca modifica ficheiros do núcleo do Chamilo.

### Registo

Não é necessário qualquer registo manual de serviços. O `config/services.yaml` do Chamilo ativa globalmente a opção `autoconfigure` do Symfony, que etiqueta automaticamente qualquer classe que implemente `EventSubscriberInterface` como `kernel.event_subscriber`. Desde que o diretório do plugin seja carregado (via classmap do Composer ou autoload PSR-4), o Symfony deteta o subscritor na próxima limpeza de cache.

```bash
php bin/console cache:clear
```

### Como fluem os dados do evento

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

Vários plugins podem subscrever o mesmo evento de forma independente; cada um acrescenta aos dados partilhados sem conhecer os restantes. A ordem de execução segue o sistema de prioridades do Symfony — passe um inteiro de prioridade como segundo elemento do tuplo do manipulador em `getSubscribedEvents()` se a ordenação for relevante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```