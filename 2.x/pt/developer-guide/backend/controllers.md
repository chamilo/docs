# Controladores

O Chamilo 2.0 utiliza um grande número de controladores (na ordem de dezenas) organizados pelos bundles. A contagem exata varia de versão para versão — considere os nomes abaixo como ilustrativos, não exaustivos.

## Tipos de Controladores

### Controladores de Administração

Localizados em `src/CoreBundle/Controller/Admin/`. Gerenciam a administração da plataforma:

* `AdminController` — Painel de controle, informações de arquivos, teste de e-mail
* `UserListController` — CRUD de usuários
* `CourseListController` — Gerenciamento de cursos
* `SessionAdminController` — Gerenciamento de sessões
* `SettingsController` — Configurações da plataforma
* `SecurityController` — Tentativas de login, eventos de IDS
* `PluginsController` — Gerenciamento de plugins
* `RoomController` — Gerenciamento de salas

### Controladores de Ações de API

Ações personalizadas da API Platform em `src/CoreBundle/Controller/Api/`:

Estes estendem o CRUD integrado da API Platform com lógica de negócios personalizada. Exemplos:

* `CreateDocumentFileAction` — Upload de arquivos para documentos
* `CreateStudentPublicationFileAction` — Upload de submissão de tarefas
* `UpdateVisibilityDocument` — Alternar visibilidade de documentos
* `ExportCGlossaryAction` — Exportar glossário
* `MoveDocumentAction` — Mover um documento para uma pasta diferente

Para operações de leitura/escrita que não necessitam de um controlador HTTP dedicado — ou seja, quando você só deseja alterar *como* um item ou coleção é obtido ou persistido — prefira um **State Provider** ou **State Processor** (veja abaixo). Os Controladores de Ações de API são mais adequados para endpoints que realmente precisam de lógica no nível da requisição (uploads de arquivos, formatos de resposta personalizados, fluxos de várias etapas).

### Controlador de IA

`src/CoreBundle/Controller/AiController.php` é o ponto de entrada para endpoints relacionados a IA (geração de questões Aiken, geração de caminhos de aprendizagem, geração de imagens/vídeos, avaliação de respostas abertas, análise de documentos...). O conjunto exato de rotas evolui rapidamente — leia os atributos `#[Route]` do controlador para a lista atual, em vez de depender de uma cópia aqui.

### Controlador de Chat

`src/CoreBundle/Controller/ChatController.php` gerencia chat em tempo real e tutor de IA:

* Mensagens entre usuários
* Chat com tutor de IA (painel de chat ancorado)
* Histórico de mensagens e polling

## Provedores e Processadores de Estado da API Platform

Nem todos os endpoints de API são suportados por um controlador. A API Platform 3 divide o trabalho entre duas interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — retornam dados para operações `GET` (um único item ou uma coleção).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — gerenciam escritas para operações `POST`, `PUT`, `PATCH` e `DELETE`.

As implementações do Chamilo estão em `src/CoreBundle/State/` (cerca de 35+ classes). Elas são conectadas às entidades por meio dos argumentos `provider:` e `processor:` das operações `#[ApiResource]`, em vez de por rotas.

### Quando usá-los

Opte por um provedor/processador — em vez de um Controlador de Ações de API — quando:

* O endpoint segue o formato REST padrão (listar / ler / criar / atualizar / excluir), mas precisa de lógica personalizada de montagem ou persistência de dados.
* Você precisa filtrar, desnormalizar ou enriquecer o resultado de uma coleção ou leitura de item (por exemplo, respeitando a URL de Acesso atual, contexto do curso ou regras de visibilidade).
* Você precisa executar efeitos colaterais na escrita (logs de auditoria, geração de arquivos, atualizações de entidades relacionadas) enquanto mantém o pipeline de normalização, validação e paginação da API Platform.
* Você deseja manter a operação detectável no esquema OpenAPI / Hydra sem registrar uma rota personalizada.

Se o endpoint, por outro lado, precisar de acesso bruto ao `Request`, retornar um payload que não seja um recurso (download de arquivo, CSV, redirecionamento) ou orquestrar um fluxo de várias etapas, um Controlador de Ações de API em `src/CoreBundle/Controller/Api/` é uma escolha mais adequada.

### Conexão na entidade

Referencie a classe na operação:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Exemplo de Provedor

`src/CoreBundle/State/DocumentProvider.php` resolve um `CDocument` por variável de URI e lança `NotFoundHttpException` quando ausente:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

---
### Exemplo de Processador

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega para o `persistProcessor` padrão do Doctrine, executando então efeitos colaterais (gera um arquivo CSS no sistema de arquivos Flysystem de temas, vincula o tema à URL de Acesso atual):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …gera colors.css, vincula à AccessUrl atual, atualiza…

        return $colorTheme;
    }
}
```

### Padrões a Conhecer

* **Compor com o processador padrão.** Decore `ProcessorInterface $persistProcessor` (integrado ao Doctrine) para que a lógica específica do Chamilo seja executada *ao redor* da persistência padrão, e não em substituição a ela.
* **Provedores de coleção gerenciam sua própria paginação.** Quando um provedor de coleção constrói uma consulta personalizada, ele deve respeitar `?page`, `?itemsPerPage` e filtros de busca — o paginador automático do API Platform só entra em ação para o provedor de coleção padrão do Doctrine.
* **Uma classe por recurso + tipo de operação é comum**, mas um provedor pode atender a várias operações (veja `UsergroupStateProvider`, reutilizado em quatro operações no `Usergroup`).
* **Convenção de nomenclatura**: `<Entity>StateProvider` / `<Entity>StateProcessor` para manipuladores de recursos amplos; `<Entity><Action>Processor` (por exemplo, `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) para operações mais específicas.

## Roteamento

Controladores utilizam **atributos do PHP 8** para definições de rotas:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Recursos do API Platform utilizam atributos `#[ApiResource]` em entidades, com operações personalizadas apontando para ações de controladores.

## Traits

Controladores utilizam traits compartilhados para funcionalidades comuns:

* `ControllerTrait` — Acesso a configurações, serializador e serviços comuns
* `CourseControllerTrait` — Auxiliares de contexto de curso
* `ResourceControllerTrait` — Operações de nó de recurso