# Eventos e Listeners

O Chamilo utiliza o sistema de eventos do Symfony para comunicação desacoplada entre componentes.

## Event Listeners

O Chamilo utiliza dois locais para listeners:

* **`src/CoreBundle/EventListener/`** — listeners do kernel/HTTP do Symfony (request, response, exception, login/logout, acesso a curso/sessão etc.). Exemplos: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — listeners de entidades Doctrine associados a entidades específicas. Exemplos: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Escolha o local que corresponda ao que você precisa reagir: eventos do pipeline HTTP ficam em `EventListener/`; ganchos do ciclo de vida de entidades ficam em `Entity/Listener/`.

## Event Subscribers

Localizados em `src/CoreBundle/EventSubscriber/`:

Os event subscribers podem escutar vários eventos:

* **Security subscribers** — Tratam eventos de login/logout e rastreiam tentativas de login
* **API subscribers** — Pré/pós-processamento de requisições de API
* **Doctrine subscribers** — Reagem a eventos do ciclo de vida de entidades

## Eventos de ciclo de vida do Doctrine

As entidades usam `#[ORM\HasLifecycleCallbacks]` para eventos no nível do banco de dados:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Criando listeners personalizados

Para adicionar comportamento personalizado:

1. Crie uma classe de listener/subscriber no bundle apropriado
2. Marque-a como event listener ou subscriber na configuração de serviços
3. Implemente o método tratador

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
| `kernel.request` | A cada requisição HTTP |
| `kernel.response` | Antes de enviar a resposta HTTP |
| `security.interactive_login` | O usuário faz login |
| `doctrine.prePersist` | Antes de uma entidade ser salva pela primeira vez |
| `doctrine.postUpdate` | Depois que uma entidade é atualizada |

## Eventos específicos do Chamilo

Esses eventos são disparados pelo próprio código do Chamilo e são os principais pontos de integração para plugins. As constantes estão definidas em `Chamilo\CoreBundle\Event\Events`.

| Constante | String do evento | Quando é disparado |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Depois que um curso é criado |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Antes de um usuário acessar um curso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Antes de um usuário se inscrever em um curso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Quando um usuário tenta reinscrever-se em uma sessão |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Depois que as credenciais de login são validadas |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Depois que condições adicionais de login são verificadas |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Quando a barra de ferramentas da ferramenta de documentos é renderizada |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Quando os botões de ação por arquivo são renderizados |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Quando um documento é aberto para visualização |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Quando a página de relatório de exercícios renderiza seus links de ação |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Depois que um aluno envia um exercício |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Depois que cada questão é respondida |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Depois que um learning path é criado |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Quando um aluno abre um item de LP |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Depois que um aluno conclui um learning path |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Quando o painel administrativo monta sua lista de blocos |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Depois que uma conta de usuário é criada |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Depois que uma conta de usuário é atualizada |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Depois que uma conta de usuário é excluída |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Depois que um item de portfólio é criado |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Quando o corpo de uma notificação é formatado |

## Exemplo de plugin: adicionar um botão ao visualizador de documentos

Esta seção descreve como um plugin usa um event subscriber para injetar um botão em uma página existente do Chamilo — sem necessidade de modificar o código do núcleo.

### Cenário

Um plugin chamado **MyViewer** deseja adicionar um botão "Abrir no MyViewer" ao lado de cada documento no gerenciador de arquivos do curso. O evento relevante é `Events::DOCUMENT_ITEM_VIEW`, disparado pelo Chamilo sempre que um documento está prestes a ser exibido, carregando a entidade `CDocument` e uma lista mutável de links.

### Layout do diretório do plugin

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

A classe base `Plugin` fornece `isEnabled()`, `get($settingKey)` e auxiliares para instalar ferramentas de curso e configurações. O padrão singleton (`static $instance`) é a convenção padrão do Chamilo porque a classe do plugin também é instanciada fora do container Symfony (em páginas PHP legadas).

### Assinante de eventos (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` acrescenta HTML ao array que o template de visualização de documentos do Chamilo renderiza junto às ações internas "Download" e "Preview". O assinante nunca modifica arquivos do núcleo do Chamilo.

### Registro

Não é necessário registro manual de serviços. O `config/services.yaml` do Chamilo habilita globalmente a flag `autoconfigure` do Symfony, que marca automaticamente qualquer classe que implemente `EventSubscriberInterface` como `kernel.event_subscriber`. Desde que o diretório do plugin seja carregado (via classmap do Composer ou autoload PSR-4), o Symfony detecta o assinante na próxima limpeza de cache.

```bash
php bin/console cache:clear
```

### Como os dados do evento fluem

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

Vários plugins podem assinar o mesmo evento de forma independente; cada um acrescenta dados compartilhados sem conhecer os demais. A ordem de execução segue o sistema de prioridade do Symfony — passe um inteiro de prioridade como segundo elemento da tupla do handler em `getSubscribedEvents()` se a ordenação for importante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```