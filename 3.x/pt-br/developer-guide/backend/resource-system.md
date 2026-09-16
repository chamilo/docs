# Sistema de Recursos

O sistema de recursos é um dos conceitos arquiteturais mais importantes do Chamilo 3.0. Ele fornece uma abstração unificada para todo o conteúdo de curso — documentos, exercícios, percursos de aprendizagem, mensagens de fórum e muito mais.

## Conceito Central

Cada item de conteúdo de curso é representado por um **ResourceNode**. Isso confere a todos os tipos de conteúdo um conjunto comum de capacidades:

* **Controle de visibilidade** — Exibir/ocultar para os aprendizes
* **Controle de acesso** — Os *security voters* verificam permissões por meio do ResourceNode
* **Armazenamento de arquivos** — Arquivos anexados são armazenados via ResourceFile
* **Estrutura em árvore** — Os ResourceNodes formam uma árvore (relacionamentos pai-filho)
* **Trilha de auditoria** — Criador, data de criação e rastreamento de modificações

## Entidades Principais

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

A entidade central. Toda entidade de conteúdo tem um relacionamento um-para-um com um ResourceNode.

Campos principais:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | integer | Chave primária |
| `uuid` | UUID v4 | Identificador único para uso na API |
| `title` | string | Título de exibição |
| `creator` | User | O usuário que criou este recurso |
| `resourceFile` | ResourceFile | O arquivo anexado (se houver) |
| `resourceType` | ResourceType | O tipo de recurso (documento, questionário etc.) |
| `parent` | ResourceNode | Pai na árvore de recursos |
| `children` | Collection | ResourceNodes filhos |
| `resourceLinks` | Collection | Vínculos de visibilidade e acesso |

A árvore utiliza a estratégia de **caminho materializado** (*materialized path*) do Gedmo para consultas hierárquicas eficientes.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Armazena os dados reais do arquivo de um recurso:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | integer | Chave primária |
| `title` | string | Nome original do arquivo |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nome original do envio |
| `size` | integer | Tamanho do arquivo em bytes |
| `crop` | string | Dados de recorte (para imagens) |

O armazenamento de arquivos é gerenciado pelo Flysystem, de modo que os arquivos podem estar em disco local, S3, Azure ou GCS, conforme a configuração.

### ResourceLink

Controla a visibilidade e o acesso por contexto. Há 3 tipos principais de contexto:

1. Curso
2. Sessão
3. Grupo (em um curso)

Assim, a entidade ResourceLink reflete a combinação desses 3 tipos de contexto e estabelece uma visibilidade para esse contexto completo:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `course` | Course | A qual curso o recurso pertence |
| `session` | Session | Qual sessão (nulo para o curso base) |
| `group` | CGroup | Qual grupo (nulo para o curso inteiro) |
| `visibility` | integer | Visível, invisível ou excluído |

Isso permite que o mesmo ResourceNode tenha visibilidade diferente em contextos diferentes (por exemplo, visível em uma sessão, mas oculto em outra).

Isso é definido automaticamente ao usar a interface e decidir, por exemplo, que um recurso é específico de uma sessão e ficará visível para todos os grupos em um determinado curso em uma determinada sessão, mas invisível no curso base ou em outra sessão.

Por padrão, recursos visíveis em um curso base também são visíveis em todas as sessões desse curso, mas o tutor do curso pode decidir ocultar um recurso de uma sessão específica. Nesse caso, recuperamos a visibilidade específica desse recurso nessa sessão e vemos que ela tem visibilidade 0, de modo que o item não aparecerá para os aprendizes nessa sessão, enquanto a ausência de visibilidade específica de sessão em outras sessões fará o recurso usar a visibilidade do curso base (e o recurso será exibido aos aprendizes).

## Integração com API Platform

O ResourceNode é exposto como um recurso do API Platform com segurança:

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

As entidades de conteúdo de curso (CDocument, CQuiz, CLp etc.) estendem `AbstractResource` ou implementam `ResourceInterface`, o que lhes confere um relacionamento `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Quando você cria um CDocument, um ResourceNode é criado automaticamente junto com ele, proporcionando gerenciamento unificado de recursos.

## Implicações Práticas

Ao trabalhar com conteúdo de curso:

1. **Criar conteúdo** — Crie tanto a entidade de conteúdo QUANTO o seu ResourceNode
2. **Verificar permissões** — Use os *security voters* do ResourceNode
3. **Gerenciar arquivos** — Anexe arquivos por meio de ResourceFile
4. **Controlar visibilidade** — Crie/modifique ResourceLinks
5. **Construir árvores** — Use o relacionamento pai-filho no ResourceNode para estruturas de pastas (por exemplo, pastas de documentos)