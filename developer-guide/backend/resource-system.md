# Sistema de Recursos

O sistema de recursos é um dos conceitos arquitetônicos mais importantes no Chamilo 2.0. Ele fornece uma abstração unificada para todo o conteúdo do curso — documentos, exercícios, caminhos de aprendizagem, postagens no fórum e muito mais.

## Conceito Central

Cada peça de conteúdo do curso é representada por um **ResourceNode**. Isso confere a todos os tipos de conteúdo um conjunto comum de capacidades:

* **Controle de visibilidade** — Mostrar/ocultar para os alunos
* **Controle de acesso** — Eleitores de segurança verificam permissões através do ResourceNode
* **Armazenamento de arquivos** — Arquivos anexados são armazenados via ResourceFile
* **Estrutura em árvore** — ResourceNodes formam uma árvore (relações pai-filho)
* **Rastro de auditoria** — Criador, data de criação, rastreamento de modificações

## Entidades Principais

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

A entidade central. Cada entidade de conteúdo tem uma relação um-para-um com um ResourceNode.

Campos principais:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | integer | Chave primária |
| `uuid` | UUID v4 | Identificador único para uso na API |
| `title` | string | Título exibido |
| `creator` | User | O usuário que criou este recurso |
| `resourceFile` | ResourceFile | O arquivo anexado (se houver) |
| `resourceType` | ResourceType | O tipo de recurso (documento, questionário, etc.) |
| `parent` | ResourceNode | Pai na árvore de recursos |
| `children` | Collection | ResourceNodes filhos |
| `resourceLinks` | Collection | Links de visibilidade e acesso |

A árvore utiliza a estratégia de **materialized path** do Gedmo para consultas hierárquicas eficientes.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Armazena os dados reais do arquivo para um recurso:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | integer | Chave primária |
| `title` | string | Nome original do arquivo |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nome original do upload |
| `size` | integer | Tamanho do arquivo em bytes |
| `crop` | string | Dados de recorte (para imagens) |

O armazenamento de arquivos é gerenciado pelo Flysystem, permitindo que os arquivos estejam no disco local, S3, Azure ou GCS, dependendo da configuração.

### ResourceLink

Controla a visibilidade e o acesso por contexto. Existem 3 tipos principais de contexto:

1. Curso
2. Sessão
3. Grupo (em um curso)

Assim, a entidade ResourceLink reflete a combinação desses 3 tipos de contexto e estabelece uma visibilidade para esse contexto completo:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `course` | Course | A qual curso o recurso pertence |
| `session` | Session | Qual sessão (nulo para curso base) |
| `group` | CGroup | Qual grupo (nulo para todo o curso) |
| `visibility` | integer | Visível, invisível ou excluído |

Isso permite que o mesmo ResourceNode tenha diferentes visibilidades em diferentes contextos (por exemplo, visível em uma sessão, mas oculto em outra).

Isso é definido automaticamente ao usar a interface e decidir, por exemplo, que um recurso é específico de uma sessão, sendo visível para todos os grupos em um determinado curso em uma determinada sessão, mas invisível no curso base ou em outra sessão.

Por padrão, recursos visíveis em um curso base também são visíveis em todas as sessões desse curso, mas o tutor do curso pode decidir ocultar um recurso de uma sessão específica. Nesse caso, recuperaremos a visibilidade específica para esse recurso nesta sessão e veremos que ela tem uma visibilidade de 0, então o item não aparecerá para os alunos nesta sessão, enquanto a falta de visibilidade específica da sessão em outras sessões fará com que o recurso use a visibilidade do curso base (e o recurso será exibido para os alunos).

## Integração com API Platform

ResourceNode é exposto como um recurso da API Platform com segurança:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Como as Entidades de Conteúdo se Conectam

Entidades de conteúdo do curso (CDocument, CQuiz, CLp, etc.) estendem `AbstractResource` ou implementam `ResourceInterface`, o que lhes confere uma relação `resourceNode`:

```php
// Na entidade CDocument:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Quando você cria um CDocument, um ResourceNode é automaticamente criado junto com ele, proporcionando gerenciamento unificado de recursos.

## Implicações Práticas

Ao trabalhar com conteúdo do curso:

1. **Criação de conteúdo** — Crie tanto a entidade de conteúdo quanto seu ResourceNode
2. **Verificação de permissões** — Use os eleitores de segurança do ResourceNode
3. **Gerenciamento de arquivos** — Anexe arquivos através do ResourceFile
4. **Controle de visibilidade** — Crie/modifique ResourceLinks
5. **Construção de árvores** — Use a relação pai-filho no ResourceNode para estruturas de pastas (por exemplo, pastas de documentos)