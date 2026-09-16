# Controllers

O Chamilo 3.0 utiliza um grande número de controllers (da ordem das dezenas) organizados pelos bundles. A contagem exata varia de versão para versão — trate os nomes abaixo como ilustrativos, não exaustivos.

## Controller Types

### Admin Controllers

Localizados em `src/CoreBundle/Controller/Admin/`. Tratam da administração da plataforma:

* `AdminController` — Dashboard, informações de ficheiros, testes de e-mail
* `UserListController` — CRUD de utilizadores
* `CourseListController` — Gestão de cursos
* `SessionAdminController` — Gestão de sessões
* `SettingsController` — Definições da plataforma
* `SecurityController` — Tentativas de login, eventos IDS
* `PluginsController` — Gestão de plugins
* `RoomController` — Gestão de salas

### API Action Controllers

Ações personalizadas da API Platform em `src/CoreBundle/Controller/Api/`:

Estas estendem o CRUD integrado da API Platform com lógica de negócio personalizada. Exemplos:

* `CreateDocumentFileAction` — Carregamento de ficheiros para documentos
* `CreateStudentPublicationFileAction` — Carregamento de submissão de trabalhos
* `UpdateVisibilityDocument` — Alternar a visibilidade do documento
* `ExportCGlossaryAction` — Exportar glossário
* `MoveDocumentAction` — Mover um documento para uma pasta diferente

Para operações de leitura/escrita que não necessitam de um HTTP controller dedicado — isto é, quando apenas se pretende alterar *como* um item ou uma coleção é obtido ou persistido — prefira um **State Provider** ou um **State Processor** (ver abaixo). Os API Action Controllers devem reservar-se a endpoints que realmente necessitam de lógica ao nível do pedido (carregamentos de ficheiros, formatos de resposta personalizados, fluxos em vários passos).

### AI Controller

`src/CoreBundle/Controller/AiController.php` é o ponto de entrada para endpoints relacionados com IA (geração de perguntas Aiken, geração de percursos de aprendizagem, geração de imagem/vídeo, classificação de respostas abertas, análise de documentos…). O conjunto exato de rotas evolui rapidamente — leia os atributos `#[Route]` do controller para a lista atual em vez de se basear numa cópia aqui.

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` trata do chat em tempo real e do tutor de IA:

* Mensagens entre utilizadores
* Chat do tutor de IA (painel de chat acoplado)
* Histórico de mensagens e polling

## API Platform State Providers & Processors

Nem todos os endpoints da API são suportados por um controller. A API Platform 4 divide o trabalho entre duas interfaces:

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — devolvem dados para operações `GET` (um único item ou uma coleção).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — tratam as escritas para operações `POST`, `PUT`, `PATCH` e `DELETE`.

As implementações do Chamilo encontram-se em `src/CoreBundle/State/` (cerca de 35+ classes). São associadas às entidades através dos argumentos `provider:` e `processor:` das operações `#[ApiResource]`, e não através de rotas.

### When to use them

Recorra a um provider/processor — em vez de um API Action Controller — quando:

* O endpoint segue a forma REST padrão (listar / ler / criar / atualizar / eliminar) mas necessita de montagem de dados ou lógica de persistência personalizada.
* Precisa de filtrar, desnormalizar ou enriquecer o resultado de uma leitura de coleção ou de item (p. ex. respeitando o Access URL atual, o contexto do curso ou as regras de visibilidade).
* Precisa de executar efeitos secundários na escrita (registos de auditoria, geração de ficheiros, atualizações de entidades relacionadas) mantendo o pipeline de normalização, validação e paginação da API Platform.
* Pretende manter a operação descoberta no esquema OpenAPI / Hydra sem registar uma rota personalizada.

Se o endpoint, em vez disso, necessita de acesso bruto ao `Request`, devolve um payload que não é um recurso (download de ficheiro, CSV, redirecionamento) ou orquestra um fluxo em vários passos, um API Action Controller em `src/CoreBundle/Controller/Api/` é mais adequado.

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

`src/CoreBundle/State/DocumentProvider.php` resolve um `CDocument` pela variável de URI e lança `NotFoundHttpException` quando em falta:

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

`src/CoreBundle/State/ColorThemeStateProcessor.php` delega para o `persistProcessor` predefinido do Doctrine e, em seguida, executa efeitos secundários (gera um ficheiro CSS no sistema de ficheiros Flysystem dos temas e associa o tema ao Access URL atual):

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

* **Compor com o processor predefinido.** Decore `ProcessorInterface $persistProcessor` (o integrado do Doctrine) para que a lógica específica do Chamilo seja executada *em torno* da persistência padrão, e não em seu lugar.
* **Os collection providers tratam da sua própria paginação.** Quando um collection provider constrói uma consulta personalizada, deve respeitar `?page`, `?itemsPerPage` e os filtros de pesquisa — o paginador automático da API Platform só entra em ação para o collection provider predefinido do Doctrine.
* **Uma classe por recurso + tipo de operação é comum**, mas um provider pode servir várias operações (veja `UsergroupStateProvider`, reutilizado em quatro operações em `Usergroup`).
* **Convenção de nomenclatura**: `<Entity>StateProvider` / `<Entity>StateProcessor` para handlers ao nível do recurso; `<Entity><Action>Processor` (por exemplo, `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) para operações mais restritas.

## Routing

Os controllers utilizam **atributos PHP 8** para as definições de rotas:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Os recursos da API Platform utilizam atributos `#[ApiResource]` nas entidades, com operações personalizadas a apontar para ações de controllers.

## Traits

Os controllers utilizam traits partilhadas para funcionalidade comum:

* `ControllerTrait` — Acesso a definições, serializer e serviços comuns
* `CourseControllerTrait` — Auxiliares de contexto de curso
* `ResourceControllerTrait` — Operações de nós de recursos