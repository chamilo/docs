# Sistema de Recursos

O sistema de recursos é um dos conceitos arquitetónicos mais importantes no Chamilo 3.0. Fornece uma abstração unificada para todo o conteúdo de curso — documentos, exercícios, percursos de aprendizagem, mensagens de fórum e muito mais.

## Conceito Central

Cada elemento de conteúdo de curso é representado por um **ResourceNode**. Isto confere a todos os tipos de conteúdo um conjunto comum de capacidades:

* **Controlo de visibilidade** — Mostrar/ocultar aos formandos
* **Controlo de acesso** — Os *voters* de segurança verificam permissões através do ResourceNode
* **Armazenamento de ficheiros** — Os ficheiros anexados são armazenados via ResourceFile
* **Estrutura em árvore** — Os ResourceNodes formam uma árvore (relações pai-filho)
* **Registo de auditoria** — Criador, data de criação, rastreio de modificações

## Entidades Principais

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

A entidade central. Cada entidade de conteúdo tem uma relação um-para-um com um ResourceNode.

Campos principais:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | integer | Chave primária |
| `uuid` | UUID v4 | Identificador único para utilização na API |
| `title` | string | Título de apresentação |
| `creator` | User | O utilizador que criou este recurso |
| `resourceFile` | ResourceFile | O ficheiro anexado (se existir) |
| `resourceType` | ResourceType | O tipo de recurso (documento, questionário, etc.) |
| `parent` | ResourceNode | Pai na árvore de recursos |
| `children` | Collection | ResourceNodes filhos |
| `resourceLinks` | Collection | Ligações de visibilidade e acesso |

A árvore utiliza a estratégia de **caminho materializado** (*materialized path*) do Gedmo para consultas hierárquicas eficientes.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Armazena os dados efetivos do ficheiro de um recurso:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | integer | Chave primária |
| `title` | string | Nome de ficheiro original |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nome original do carregamento |
| `size` | integer | Tamanho do ficheiro em bytes |
| `crop` | string | Dados de recorte (para imagens) |

O armazenamento de ficheiros é gerido pelo Flysystem, pelo que os ficheiros podem estar em disco local, S3, Azure ou GCS, consoante a configuração.

### ResourceLink

Controla a visibilidade e o acesso por contexto. Existem 3 tipos principais de contexto:

1. Course
2. Session
3. Group (num curso)

Assim, a entidade ResourceLink reflete a combinação desses 3 tipos de contexto e estabelece uma visibilidade para esse contexto completo:

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `course` | Course | A que curso o recurso pertence |
| `session` | Session | Qual a sessão (null para o curso base) |
| `group` | CGroup | Qual o grupo (null para o curso inteiro) |
| `visibility` | integer | Visível, invisível ou eliminado |

Isto permite que o mesmo ResourceNode tenha visibilidade diferente em contextos diferentes (por exemplo, visível numa sessão mas oculto noutra).

Isto é definido automaticamente ao utilizar a interface e ao decidir, por exemplo, que um recurso é específico de uma sessão, visível para todos os grupos num determinado curso numa determinada sessão, mas invisível no curso base ou noutra sessão.

Por predefinição, os recursos visíveis num curso base também são visíveis em todas as sessões desse curso, mas o tutor do curso pode decidir ocultar um recurso de uma sessão específica. Nesse caso, recuperamos a visibilidade específica deste recurso nesta sessão e verificamos que tem visibilidade 0, pelo que o item não aparecerá aos formandos nesta sessão, enquanto a ausência de visibilidade específica de sessão noutras sessões fará com que o recurso utilize a visibilidade do curso base (e o recurso será apresentado aos formandos).

## Integração com API Platform

O ResourceNode é exposto como um recurso API Platform com segurança:

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

## Como as Entidades de Conteúdo se Ligam

As entidades de conteúdo de curso (CDocument, CQuiz, CLp, etc.) estendem `AbstractResource` ou implementam `ResourceInterface`, o que lhes confere uma relação `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Quando cria um CDocument, um ResourceNode é automaticamente criado em paralelo, proporcionando gestão unificada de recursos.

## Implicações Práticas

Ao trabalhar com conteúdo de curso:

1. **Criar conteúdo** — Criar tanto a entidade de conteúdo COMO o respetivo ResourceNode
2. **Verificar permissões** — Utilizar os *voters* de segurança do ResourceNode
3. **Gerir ficheiros** — Anexar ficheiros através de ResourceFile
4. **Controlar visibilidade** — Criar/modificar ResourceLinks
5. **Construir árvores** — Utilizar a relação pai-filho no ResourceNode para estruturas de pastas (por exemplo, pastas de documentos)