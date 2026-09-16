# Ações Personalizadas

Além das operações CRUD padrão, o Chamilo possui um número considerável de controladores de ações de API personalizadas (da ordem de dezenas) que tratam de operações especializadas. A contagem exata varia entre versões — liste `src/CoreBundle/Controller/Api/` para o conjunto atual.

## Localização

As ações personalizadas estão em `src/CoreBundle/Controller/Api/`.

## Ações Personalizadas Notáveis

### Documents

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Enviar um ficheiro ou criar uma pasta/documento de ligação |
| `UpdateDocumentFileAction` | Substituir o ficheiro de um documento |
| `ReplaceDocumentFileAction` | Substituir o ficheiro de um documento, preservando os seus IDs |
| `MoveDocumentAction` | Mover um documento para uma pasta diferente |
| `UpdateVisibilityDocument` | Alternar a visibilidade do documento para os formandos |
| `DownloadAllDocumentsAction` | Descarregar todos os documentos de uma pasta como ZIP |
| `DownloadSelectedDocumentsAction` | Descarregar um conjunto selecionado de documentos como ZIP |
| `DocumentUsageAction` | Listar cursos/sessões em que um documento é utilizado |
| `DocumentLearningPathUsageAction` | Listar percursos de aprendizagem em que um documento é utilizado |

### Glossary

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Criar um termo de glossário |
| `UpdateCGlossaryAction` | Atualizar um termo de glossário |
| `ExportCGlossaryAction` | Exportar o glossário para ficheiro |
| `ImportCGlossaryAction` | Importar o glossário a partir de ficheiro |
| `ExportGlossaryToDocumentsAction` | Exportar o glossário como documento no curso |
| `GetGlossaryCollectionController` | Obter a coleção de glossário com filtragem personalizada |

### Links

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Criar uma ligação externa |
| `UpdateCLinkAction` | Atualizar uma ligação externa |
| `CreateCLinkCategoryAction` | Criar uma categoria de ligações |
| `UpdateCLinkCategoryAction` | Atualizar uma categoria de ligações |
| `CheckCLinkAction` | Verificar se o URL de uma ligação é acessível |
| `ExportCLinksAction` | Exportar ligações para ficheiro |
| `CLinkDetailsController` | Obter detalhes da ligação |
| `CLinkImageController` | Obter ou definir a imagem de pré-visualização de uma ligação |
| `GetLinksCollectionController` | Obter a coleção de ligações com filtragem personalizada |
| `UpdateVisibilityLink` | Alternar a visibilidade da ligação |
| `UpdateVisibilityLinkCategory` | Alternar a visibilidade da categoria de ligações |
| `UpdatePositionLink` | Reordenar ligações |

### Learning Paths

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Criar um percurso de aprendizagem |
| `LpReorderController` | Reordenar itens do percurso de aprendizagem |

### Calendar

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Atualizar um evento do calendário do curso |
| `CalendarMyStudentsScheduleAction` | Obter o horário dos formandos de um formador |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Criar uma publicação de blogue |
| `CreateBlogAttachmentAction` | Anexar um ficheiro a uma publicação de blogue |
| `UpdateVisibilityBlog` | Alternar a visibilidade do blogue |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Enviar um ficheiro para a dropbox (ferramenta de troca de ficheiros) |

### Student Work (Assignments)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Submeter um ficheiro de trabalho |
| `CreateStudentPublicationCommentAction` | Adicionar um comentário a uma submissão |
| `CreateStudentPublicationCorrectionFileAction` | Enviar um ficheiro de correção para uma submissão |

### Personal Files

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Enviar um ficheiro para o espaço de ficheiros pessoais do utilizador |
| `UpdatePersonalFileAction` | Atualizar um ficheiro pessoal |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Gostar de uma publicação social |
| `DislikeSocialPostController` | Remover o gosto de uma publicação social |
| `CreateSocialPostAttachmentAction` | Anexar um ficheiro a uma publicação social |
| `SocialPostAttachmentsController` | Listar anexos de uma publicação social |
| `AbstractFeedbackSocialPostController` | Classe base para ações de feedback de publicações sociais |

### Sessions

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Criar uma sessão e inscrever utilizadores e cursos numa única chamada |

### Users & Access URLs

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Criar um utilizador e associá-lo a um URL de acesso |
| `UserAccessUrlsController` | Listar os URLs de acesso a que um utilizador pertence |
| `UserSkillsController` | Listar competências atribuídas a um utilizador |

### Video Conference

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Tratar callbacks de fornecedores externos de videoconferência |

### Base Classes

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Classe base para ações de envio de ficheiros; trata da análise multipart, da criação do nó de recurso e do armazenamento |

## Implementar uma Ação Personalizada

As ações personalizadas são controladores Symfony padrão referenciados nas definições de operação do API Platform. O atributo `#[ApiResource]` encontra-se na **entidade**, e o parâmetro `controller:` de cada operação aponta para a classe da ação:

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

A própria classe da ação é um controlador invocável simples — os serviços são injetados através dos argumentos do método `__invoke()`:

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
- `deserialize: false` é definido quando a ação lê o pedido diretamente (por exemplo, carregamentos de ficheiros multipart) em vez de deixar o API Platform desserializar um corpo JSON.
- As ações de carregamento de ficheiros normalmente estendem `BaseResourceFileAction`, que trata da análise multipart e da ligação dos nós de recurso.
- A segurança é aplicada através do parâmetro `security:` na operação, e não no interior do controlador.