# Referência de Endpoints

A API Platform gera automaticamente endpoints REST para entidades anotadas com `#[ApiResource]`. O Chamilo expõe mais de 100 recursos.

## Operações Padrão

Para cada recurso da API, as seguintes operações estão geralmente disponíveis:

| Método | Caminho | Descrição |
|--------|---------|-----------|
| `GET` | `/api/{resources}` | Listar (coleção) |
| `POST` | `/api/{resources}` | Criar |
| `GET` | `/api/{resources}/{id}` | Ler (item único) |
| `PUT` | `/api/{resources}/{id}` | Atualização completa |
| `PATCH` | `/api/{resources}/{id}` | Atualização parcial |
| `DELETE` | `/api/{resources}/{id}` | Excluir |

Nem todas as operações estão habilitadas para todos os recursos — restrições de segurança se aplicam.

## Principais Recursos da API

### Recursos da Plataforma

| Recurso | Caminho | Descrição |
|---------|---------|-----------|
| Usuários | `/api/users` | Contas de usuário |
| Cursos | `/api/courses` | Cursos |
| Sessões | `/api/sessions` | Sessões de treinamento |
| Nós de Recursos | `/api/resource_nodes` | Nós de conteúdo unificados |
| URLs de Acesso | `/api/access_urls` | Portais multi-URL |
| Mensagens | `/api/messages` | Mensagens da plataforma |

### Recursos de Conteúdo de Curso

| Recurso | Caminho | Descrição |
|---------|---------|-----------|
| Documentos | `/api/documents` | Documentos do curso |
| Caminhos de Aprendizagem | `/api/learning_paths` | Caminhos de aprendizagem |
| Glossários | `/api/glossaries` | Termos de glossário |
| Links | `/api/links` | Links externos |
| Eventos de Calendário | `/api/c_calendar_events` | Eventos da agenda |
| Publicações de Estudantes | `/api/c_student_publications` | Tarefas |
| Blogs | `/api/c_blogs` | Blogs do curso |
| Grupos | `/api/c_groups` | Grupos do curso |

### Recursos de Rastreamento

| Recurso | Caminho | Descrição |
|---------|---------|-----------|
| Categorias de Livro de Notas | `/api/gradebook_categories` | Configuração do livro de notas |
| Resultados de Livro de Notas | `/api/gradebook_results` | Notas |

## Filtragem e Paginação

A API Platform suporta:

* **Paginação**: `?page=2&itemsPerPage=30`
* **Filtragem**: `?title=Introduction` (depende dos filtros configurados)
* **Ordenação**: `?order[title]=asc`
* **Pesquisa**: Pesquisa de texto completo em campos configurados

## Negociação de Conteúdo

A API suporta múltiplos formatos:

* `application/ld+json` (padrão — JSON-LD)
* `application/json`
* `text/html` (documentação da API)

Defina o cabeçalho `Accept` para escolher o formato da resposta.

## Segurança

Cada endpoint aplica segurança através de:

* Autenticação JWT (necessária para a maioria dos endpoints)
* Eleitores de segurança do Symfony (permissões no nível de recurso)
* Controle de acesso baseado em papéis (por exemplo, endpoints exclusivos para administradores)