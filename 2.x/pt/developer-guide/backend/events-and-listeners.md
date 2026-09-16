# Eventos e Listeners

Chamilo utiliza o sistema de eventos do Symfony para comunicação desacoplada entre componentes.

## Listeners de Eventos

Chamilo utiliza dois locais para listeners:

* **`src/CoreBundle/EventListener/`** — Listeners de kernel/HTTP do Symfony (requisição, resposta, exceção, login/logout, acesso a curso/sessão, etc.). Exemplos: `CidReqListener`, `CourseAccessListener`, `LoginSuccessHandler`, `LogoutListener`, `ExceptionListener`, `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — Listeners de entidades Doctrine associados a entidades específicas. Exemplos: `ResourceNodeListener`, `CourseListener`, `SessionListener`, `LanguageListener`, `UserListener`, `MessageListener`.

Escolha o local que corresponde ao que você precisa reagir: eventos do pipeline HTTP vão para `EventListener/`; ganchos de ciclo de vida de entidades vão para `Entity/Listener/`.

## Subscribers de Eventos

Localizados em `src/CoreBundle/EventSubscriber/`:

Subscribers de eventos podem escutar múltiplos eventos:

* **Subscribers de segurança** — Lidam com eventos de login/logout, rastreiam tentativas de login
* **Subscribers de API** — Pré/pós-processamento para requisições de API
* **Subscribers de Doctrine** — Reagem a eventos de ciclo de vida de entidades

## Eventos de Ciclo de Vida do Doctrine

Entidades utilizam `#[ORM\HasLifecycleCallbacks]` para eventos no nível do banco de dados:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Criando Listeners Personalizados

Para adicionar comportamento personalizado:

1. Crie uma classe de listener/subscriber no bundle apropriado
2. Marque-a como um listener ou subscriber de evento na configuração de serviço
3. Implemente o método de manipulação

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Sua lógica aqui
    }
}
```

## Eventos Principais

| Evento | Quando é disparado |
|-------|--------------------|
| `kernel.request` | A cada requisição HTTP |
| `kernel.response` | Antes de enviar a resposta HTTP |
| `security.interactive_login` | Quando o usuário faz login |
| `doctrine.prePersist` | Antes de uma entidade ser salva pela primeira vez |
| `doctrine.postUpdate` | Após uma entidade ser atualizada |

## Eventos Específicos do Chamilo

Esses eventos são disparados pelo próprio código do Chamilo e são os principais pontos de integração para plugins. Constantes são definidas em `Chamilo\CoreBundle\Event\Events`.

| Constante | String do Evento | Quando é disparado |
|----------|------------------|--------------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | Após a criação de um curso |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | Antes de um usuário acessar um curso |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | Antes de um usuário se inscrever em um curso |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | Quando um usuário tenta se reinscrever em uma sessão |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | Após a validação das credenciais de login |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | Após a verificação de condições adicionais de login |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | Quando a barra de ferramentas do documento é renderizada |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | Quando botões de ação por arquivo são renderizados |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | Quando um documento é aberto para visualização |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | Quando a página de relatório de exercícios renderiza seus links de ação |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | Após um aluno enviar um exercício |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | Após cada pergunta ser respondida |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | Após a criação de um caminho de aprendizagem |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | Quando um aluno abre um item de caminho de aprendizagem |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | Após um aluno completar um caminho de aprendizagem |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | Quando o painel de administração constrói sua lista de blocos |
| `Events::USER_CREATED` | `chamilo.event.user_created` | Após a criação de uma conta de usuário |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | Após a atualização de uma conta de usuário |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | Após a exclusão de uma conta de usuário |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | Após a criação de um item de portfólio |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | Quando o corpo de uma notificação é formatado |

## Exemplo de Plugin: Adicionando um Botão ao Visualizador de Documentos

Esta seção explica como um plugin utiliza um subscriber de evento para injetar um botão em uma página existente do Chamilo — sem necessidade de modificação do código principal.

### Cenário

Um plugin chamado **MyViewer** deseja adicionar um botão "Abrir no MyViewer" ao lado de cada documento no gerenciador de arquivos do curso. O evento relevante é `Events::DOCUMENT_ITEM_VIEW`, disparado pelo Chamilo sempre que um documento está prestes a ser exibido, carregando a entidade `CDocument` e uma lista mutável de links.

### Estrutura do diretório do plugin

```
public/plugin/MyViewer/
├── plugin.php                          # Declara $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Página de configurações do plugin
├── lang/                               # Strings de tradução
└── src/
    ├── MyViewerPlugin.php              # Classe principal do plugin (estende Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Assinante de eventos
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

A classe base `Plugin` fornece `isEnabled()`, `get($settingKey)` e auxiliares para instalar ferramentas de curso e configurações. O padrão singleton (`static $instance`) é a convenção padrão do Chamilo porque a classe do plugin também é instanciada fora do contêiner Symfony (em páginas PHP legadas).

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

`addLink()` adiciona HTML ao array que o modelo de visualização de documentos do Chamilo renderiza ao lado das ações integradas "Download" e "Preview". O assinante nunca modifica os arquivos principais do Chamilo.

### Registro

Não é necessário registro manual de serviços. O arquivo `config/services.yaml` do Chamilo habilita o sinalizador `autoconfigure` globalmente, que marca automaticamente qualquer classe que implemente `EventSubscriberInterface` como um `kernel.event_subscriber`. Desde que o diretório do plugin seja carregado (via classmap do Composer ou autoload PSR-4), o Symfony detecta o assinante na próxima limpeza de cache.

```bash
php bin/console cache:clear
```

### Como os dados do evento fluem

```
Lista de documentos renderizada
        │
        ▼
Chamilo dispara DocumentItemViewEvent (carrega entidade CDocument + links[] vazio)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → adiciona link HTML
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → adiciona botão "Editar"
        │   (qualquer número de plugins pode escutar o mesmo evento)
        ▼
Modelo renderiza event->getLinks() ao lado das ações de arquivo integradas
```

Vários plugins podem se inscrever no mesmo evento de forma independente; cada um adiciona aos dados compartilhados sem saber dos outros. A ordem de execução segue o sistema de prioridade do Symfony — passe um inteiro de prioridade como o segundo elemento da tupla do manipulador em `getSubscribedEvents()` se a ordem for importante:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // maior = mais cedo
    ];
}
```