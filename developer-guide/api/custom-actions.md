# Ações Personalizadas

Além das operações CRUD padrão, o Chamilo possui vários controladores de ações personalizadas de API (na ordem de dezenas) que lidam com operações especializadas. A contagem exata varia entre as versões — liste `src/CoreBundle/Controller/Api/` para o conjunto atual.

## Localização

As ações personalizadas estão em `src/CoreBundle/Controller/Api/`.

## Ações Personalizadas Notáveis

### Documentos

| Controlador | Finalidade |
|-----------|---------|
| `CreateDocumentFileAction` | Fazer upload de um arquivo ou criar uma pasta/link de documento |
| `UpdateDocumentFileAction` | Substituir o arquivo de um documento |
| `ReplaceDocumentFileAction` | Substituir o arquivo de um documento, preservando seus IDs |
| `MoveDocumentAction` | Mover um documento para uma pasta diferente |
| `UpdateVisibilityDocument` | Alternar a visibilidade do documento para os alunos |
| `DownloadAllDocumentsAction` | Baixar todos os documentos de uma pasta como um ZIP |
| `DownloadSelectedDocumentsAction` | Baixar um conjunto selecionado de documentos como um ZIP |
| `DocumentUsageAction` | Listar cursos/sessões onde um documento é usado |
| `DocumentLearningPathUsageAction` | Listar caminhos de aprendizagem onde um documento é usado |

### Glossário

| Controlador | Finalidade |
|-----------|---------|
| `CreateCGlossaryAction` | Criar um termo de glossário |
| `UpdateCGlossaryAction` | Atualizar um termo de glossário |
| `ExportCGlossaryAction` | Exportar glossário para arquivo |
| `ImportCGlossaryAction` | Importar glossário de um arquivo |
| `ExportGlossaryToDocumentsAction` | Exportar glossário como um documento no curso |
| `GetGlossaryCollectionController` | Obter coleção de glossário com filtragem personalizada |

### Links

| Controlador | Finalidade |
|-----------|---------|
| `CreateCLinkAction` | Criar um link externo |
| `UpdateCLinkAction` | Atualizar um link externo |
| `CreateCLinkCategoryAction` | Criar uma categoria de link |
| `UpdateCLinkCategoryAction` | Atualizar uma categoria de link |
| `CheckCLinkAction` | Verificar se a URL de um link está acessível |
| `ExportCLinksAction` | Exportar links para arquivo |
| `CLinkDetailsController` | Obter detalhes de um link |
| `CLinkImageController` | Obter ou definir uma imagem de pré-visualização de um link |
| `GetLinksCollectionController` | Obter coleção de links com filtragem personalizada |
| `UpdateVisibilityLink` | Alternar a visibilidade de um link |
| `UpdateVisibilityLinkCategory` | Alternar a visibilidade de uma categoria de link |
| `UpdatePositionLink` | Reordenar links |

### Caminhos de Aprendizagem

| Controlador | Finalidade |
|-----------|---------|
| `CreateCLpAction` | Criar um caminho de aprendizagem |
| `LpReorderController` | Reordenar itens de um caminho de aprendizagem |

### Calendário

| Controlador | Finalidade |
|-----------|---------|
| `UpdateCCalendarEventAction` | Atualizar um evento do calendário do curso |
| `CalendarMyStudentsScheduleAction` | Obter o cronograma dos alunos de um professor |

### Blog

| Controlador | Finalidade |
|-----------|---------|
| `CreateCBlogAction` | Criar uma postagem de blog |
| `CreateBlogAttachmentAction` | Anexar um arquivo a uma postagem de blog |
| `UpdateVisibilityBlog` | Alternar a visibilidade do blog |

### Dropbox

| Controlador | Finalidade |
|-----------|---------|
| `CreateDropboxFileAction` | Fazer upload de um arquivo para o dropbox (ferramenta de troca de arquivos) |

### Trabalhos de Estudantes (Tarefas)

| Controlador | Finalidade |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Enviar um arquivo de tarefa |
| `CreateStudentPublicationCommentAction` | Adicionar um comentário a uma submissão |
| `CreateStudentPublicationCorrectionFileAction` | Fazer upload de um arquivo de correção para uma submissão |

### Arquivos Pessoais

| Controlador | Finalidade |
|-----------|---------|
| `CreatePersonalFileAction` | Fazer upload de um arquivo para o espaço de arquivos pessoais do usuário |
| `UpdatePersonalFileAction` | Atualizar um arquivo pessoal |

### Social

| Controlador | Finalidade |
|-----------|---------|
| `LikeSocialPostController` | Curtir uma postagem social |
| `DislikeSocialPostController` | Descurtir uma postagem social |
| `CreateSocialPostAttachmentAction` | Anexar um arquivo a uma postagem social |
| `SocialPostAttachmentsController` | Listar anexos em uma postagem social |
| `AbstractFeedbackSocialPostController` | Classe base para ações de feedback em postagens sociais |

### Sessões

| Controlador | Finalidade |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Criar uma sessão e inscrever usuários e cursos em uma única chamada |

### Usuários e URLs de Acesso

| Controlador | Finalidade |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Criar um usuário e associá-lo a uma URL de acesso |
| `UserAccessUrlsController` | Listar URLs de acesso às quais um usuário pertence |
| `UserSkillsController` | Listar habilidades concedidas a um usuário |

### Videoconferência

| Controlador | Finalidade |
|-----------|---------|
| `VideoConferenceCallbackController` | Lidar com callbacks de provedores externos de videoconferência |

### Classes Base

| Classe | Finalidade |
|-------|---------|
| `BaseResourceFileAction` | Classe base para ações de upload de arquivos; lida com análise multipart, criação de nó de recurso e armazenamento |

---
## Implementando uma Ação Personalizada

Ações personalizadas são controladores padrão do Symfony referenciados nas definições de operação da API Platform. O atributo `#[ApiResource]` reside na **entidade**, e o parâmetro `controller:` de cada operação aponta para a classe de ação:

```php
// Na classe da entidade (por exemplo, src/CourseBundle/Entity/CDocument.php):
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

A própria classe de ação é um controlador invocável simples — os serviços são injetados por meio dos argumentos do método `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... outros serviços injetados
    ): CDocument {
        // Lidar com o upload e retornar a entidade
    }
}
```

Pontos-chave:
- `deserialize: false` é definido quando a ação lê a solicitação diretamente (por exemplo, uploads de arquivos multipart) em vez de permitir que a API Platform desserialize um corpo JSON.
- Ações de upload de arquivos geralmente estendem `BaseResourceFileAction`, que gerencia a análise multipart e a conexão de nós de recursos.
- A segurança é aplicada por meio do parâmetro `security:` na operação, não dentro do controlador.