# Controllers

O Chamilo 3.0 utiliza um grande número de controllers (da ordem de dezenas) organizados entre os bundles. A contagem exata varia de versão para versão — trate os nomes abaixo como ilustrativos, não exaustivos.

## Controller Types

### Admin Controllers

Localizados em `src/CoreBundle/Controller/Admin/`. Tratam da administração da plataforma:

* `AdminController` — Dashboard, informações de arquivos, teste de e-mail
* `UserListController` — CRUD de usuários
* `CourseListController` — Gestão de cursos
* `SessionAdminController` — Gestão de sessões
* `SettingsController` — Configurações da plataforma
* `SecurityController` — Tentativas de login, eventos do IDS
* `PluginsController` — Gestão de plugins
* `RoomController` — Gestão de salas

### API Action Controllers

Ações personalizadas do API Platform em `src/CoreBundle/Controller/Api/`:

Estas estendem o CRUD nativo do API Platform com lógica de negócio personalizada. Exemplos:

* `CreateDocumentFileAction` — Upload de arquivo para documentos
* `CreateStudentPublicationFileAction` — Upload de envio de tarefa
* `UpdateVisibilityDocument` — Alternar visibilidade do documento
* `ExportCGlossaryAction` — Exportar glossário
* `MoveDocumentAction` — Mover um documento para outra pasta

Para operações de leitura/escrita que não precisam de um HTTP controller dedicado — isto é, quando você só deseja alterar *como* um item ou uma coleção é obtido ou persistido — prefira um **State Provider** ou um **State Processor** (veja abaixo). Os API Action Controllers devem ser reservados para endpoints que realmente precisam de lógica no nível da requisição (uploads de arquivo, formatos de resposta personalizados, fluxos em várias etapas).

### AI Controller

`src/CoreBundle/Controller/AiController.php` é o ponto de entrada para endpoints relacionados a IA (geração de questões Aiken, geração de percursos de aprendizagem, geração de imagem/vídeo, correção de respostas abertas, análise de documentos…). O conjunto exato de rotas evolui rapidamente — leia os atributos `#[Route]` do controller para a lista atual em vez de confiar em uma cópia aqui.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` trata do chat em tempo real e do tutor de IA:

* Mensagens entre usuários
* Chat do tutor de IA (painel de chat acoplado)
* Histórico de mensagens e polling

## API Platform State Providers & Processors

Nem todo endpoint de API é sustentado por um controller. O API Platform 4 divide o trabalho entre duas interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — retornam dados para operações `GET` (um único item ou uma coleção).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — tratam as escritas para operações `POST`, `PUT`, `PATCH` e `DELETE`.

As implementações do Chamilo ficam em `src/CoreBundle/State/` (cerca de 35+ classes). Elas são vinculadas às entidades por meio dos argumentos `provider:` e `processor:` das operações `#[ApiResource]`, e não por rotas.

### When to use them

Recorra a um provider/processor — em vez de um API Action Controller — quando:

* O endpoint segue o formato REST padrão (listar / ler / criar / atualizar / excluir), mas precisa de montagem de dados ou lógica de persistência personalizada.
* Você precisa filtrar, desnormalizar ou enriquecer o resultado da leitura de uma coleção ou de um item (por exemplo, respeitando a Access URL atual, o contexto do curso ou as regras de visibilidade).
* Você precisa executar efeitos colaterais na escrita (logs de auditoria, geração de arquivos, atualizações de entidades relacionadas) mantendo o pipeline de normalização, validação e paginação do API Platform.
* Você deseja manter a operação descoberta no esquema OpenAPI / Hydra sem registrar uma rota personalizada.

Se o endpoint, em vez disso, precisa de acesso bruto a `Request`, retorna um payload que não é um recurso (download de arquivo, CSV, redirecionamento) ou orquestra um fluxo em várias etapas, um API Action Controller em `src/CoreBundle/Controller/Api/` é mais adequado.

### Wiring on the entity

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

### Provider example

`src/CoreBundle/State/DocumentProvider.php` resolve um `CDocument` pela variável de URI e lança `NotFoundHttpException` quando ausente:

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

### Exemplo de processor

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega ao `persistProcessor` padrão do Doctrine e, em seguida, executa efeitos colaterais (gera um arquivo CSS no filesystem Flysystem de temas e vincula o tema à Access URL atual):

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

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Padrões a conhecer

* **Componha com o processor padrão.** Decore `ProcessorInterface $persistProcessor` (o integrado do Doctrine) para que a lógica específica do Chamilo seja executada *em torno* do persist padrão, e não no lugar dele.
* **Providers de coleção fazem a própria paginação.** Quando um collection provider monta uma consulta personalizada, ele deve respeitar `?page`, `?itemsPerPage` e os filtros de busca — o paginador automático da API Platform só entra em ação para o collection provider padrão do Doctrine.
* **Uma classe por recurso + tipo de operação é comum**, mas um provider pode atender a várias operações (veja `UsergroupStateProvider`, reutilizado em quatro operações em `Usergroup`).
* **Convenção de nomenclatura**: `<Entity>StateProvider` / `<Entity>StateProcessor` para handlers de recurso inteiro; `<Entity><Action>Processor` (por exemplo, `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) para operações mais restritas.

## Roteamento

Os controllers usam **atributos do PHP 8** para as definições de rota:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Os recursos da API Platform usam atributos `#[ApiResource]` nas entidades, com operações personalizadas apontando para actions de controller.

## Traits

Os controllers usam traits compartilhadas para funcionalidades comuns:

* `ControllerTrait` — Acesso a configurações, serializer e serviços comuns
* `CourseControllerTrait` — Auxiliares de contexto de curso
* `ResourceControllerTrait` — Operações de resource node