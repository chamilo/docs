# Ações Personalizadas

Além das operações CRUD padrão, o Chamilo possui um número de controladores de ação de API personalizados (da ordem de dezenas) que tratam operações especializadas. A contagem exata varia entre as versões — liste `src/CoreBundle/Controller/Api/` para o conjunto atual.

## Localização

As ações personalizadas estão em `src/CoreBundle/Controller/Api/`.

## Ações Personalizadas Notáveis

### Documentos

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Enviar um arquivo ou criar uma pasta/documento de link |
| `UpdateDocumentFileAction` | Substituir o arquivo de um documento |
| `ReplaceDocumentFileAction` | Substituir o arquivo de um documento, preservando seus IDs |
| `MoveDocumentAction` | Mover um documento para uma pasta diferente |
| `UpdateVisibilityDocument` | Alternar a visibilidade do documento para os alunos |
| `DownloadAllDocumentsAction` | Baixar todos os documentos de uma pasta como um ZIP |
| `DownloadSelectedDocumentsAction` | Baixar um conjunto selecionado de documentos como um ZIP |
| `DocumentUsageAction` | Listar cursos/sessões em que um documento é usado |
| `DocumentLearningPathUsageAction` | Listar percursos de aprendizagem em que um documento é usado |

### Glossário

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Criar um termo de glossário |
| `UpdateCGlossaryAction` | Atualizar um termo de glossário |
| `ExportCGlossaryAction` | Exportar o glossário para arquivo |
| `ImportCGlossaryAction` | Importar o glossário a partir de arquivo |
| `ExportGlossaryToDocumentsAction` | Exportar o glossário como um documento no curso |
| `GetGlossaryCollectionController` | Obter a coleção de glossário com filtragem personalizada |

### Links

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Criar um link externo |
| `UpdateCLinkAction` | Atualizar um link externo |
| `CreateCLinkCategoryAction` | Criar uma categoria de links |
| `UpdateCLinkCategoryAction` | Atualizar uma categoria de links |
| `CheckCLinkAction` | Verificar se a URL de um link está acessível |
| `ExportCLinksAction` | Exportar links para arquivo |
| `CLinkDetailsController` | Obter detalhes do link |
| `CLinkImageController` | Obter ou definir a imagem de pré-visualização de um link |
| `GetLinksCollectionController` | Obter a coleção de links com filtragem personalizada |
| `UpdateVisibilityLink` | Alternar a visibilidade do link |
| `UpdateVisibilityLinkCategory` | Alternar a visibilidade da categoria de links |
| `UpdatePositionLink` | Reordenar links |

### Percursos de Aprendizagem

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Criar um percurso de aprendizagem |
| `LpReorderController` | Reordenar itens do percurso de aprendizagem |

### Calendário

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Atualizar um evento do calendário do curso |
| `CalendarMyStudentsScheduleAction` | Obter a agenda dos alunos de um professor |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Criar uma publicação de blog |
| `CreateBlogAttachmentAction` | Anexar um arquivo a uma publicação de blog |
| `UpdateVisibilityBlog` | Alternar a visibilidade do blog |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Enviar um arquivo para a dropbox (ferramenta de troca de arquivos) |

### Trabalhos dos Alunos (Tarefas)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Enviar um arquivo de tarefa |
| `CreateStudentPublicationCommentAction` | Adicionar um comentário a um envio |
| `CreateStudentPublicationCorrectionFileAction` | Enviar um arquivo de correção para um envio |

### Arquivos Pessoais

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Enviar um arquivo para o espaço de arquivos pessoais do usuário |
| `UpdatePersonalFileAction` | Atualizar um arquivo pessoal |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Curtir uma publicação social |
| `DislikeSocialPostController` | Descurtir uma publicação social |
| `CreateSocialPostAttachmentAction` | Anexar um arquivo a uma publicação social |
| `SocialPostAttachmentsController` | Listar anexos de uma publicação social |
| `AbstractFeedbackSocialPostController` | Classe base para ações de feedback de publicações sociais |

### Sessões

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Criar uma sessão e matricular usuários e cursos em uma única chamada |

### Usuários e URLs de Acesso

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Criar um usuário e associá-lo a uma URL de acesso |
| `UserAccessUrlsController` | Listar as URLs de acesso às quais um usuário pertence |
| `UserSkillsController` | Listar competências atribuídas a um usuário |

### Videoconferência

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Tratar callbacks de provedores externos de videoconferência |

### Classes Base

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Classe base para ações de envio de arquivos; trata o parsing multipart, a criação do nó de recurso e o armazenamento |

## Implementando uma Ação Personalizada

As ações personalizadas são controladores Symfony padrão referenciados nas definições de operação do API Platform. O atributo `#[ApiResource]` fica na **entidade**, e o parâmetro `controller:` de cada operação aponta para a classe da ação:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

A própria classe da ação é um controlador invocável simples — os serviços são injetados por meio dos argumentos do método `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Pontos-chave:
- `deserialize: false` é definido quando a ação lê a requisição diretamente (por exemplo, uploads de arquivos multipart) em vez de deixar o API Platform desserializar um corpo JSON.
- As ações de upload de arquivo normalmente estendem `BaseResourceFileAction`, que trata o parsing multipart e a ligação do nó de recurso.
- A segurança é aplicada por meio do parâmetro `security:` na operação, e não dentro do controlador.