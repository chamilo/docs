# Referência de Endpoints

A API Platform gera automaticamente endpoints REST para entidades anotadas com `#[ApiResource]`. O Chamilo expõe mais de 100 recursos.

## Operações Padrão

Para cada recurso da API, as seguintes operações estão tipicamente disponíveis:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listagem (coleção) |
| `POST` | `/api/{resources}` | Criação |
| `GET` | `/api/{resources}/{id}` | Leitura (item único) |
| `PUT` | `/api/{resources}/{id}` | Atualização completa |
| `PATCH` | `/api/{resources}/{id}` | Atualização parcial |
| `DELETE` | `/api/{resources}/{id}` | Exclusão |

Nem todas as operações estão habilitadas para todos os recursos — aplicam-se restrições de segurança.

## Principais Recursos da API

### Recursos da Plataforma

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Contas de usuário |
| Courses | `/api/courses` | Cursos |
| Sessions | `/api/sessions` | Sessões de formação |
| Resource Nodes | `/api/resource_nodes` | Nós de conteúdo unificados |
| Access URLs | `/api/access_urls` | Portais multi-URL |
| Messages | `/api/messages` | Mensagens da plataforma |

### Recursos de Conteúdo do Curso

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documentos do curso |
| Learning Paths | `/api/learning_paths` | Percursos de aprendizagem |
| Glossaries | `/api/glossaries` | Termos de glossário |
| Links | `/api/links` | Links externos |
| Calendar Events | `/api/c_calendar_events` | Eventos da agenda |
| Student Publications | `/api/c_student_publications` | Trabalhos |
| Blogs | `/api/c_blogs` | Blogs do curso |
| Groups | `/api/c_groups` | Grupos do curso |

### Recursos de Acompanhamento

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuração do boletim |
| Gradebook Results | `/api/gradebook_results` | Notas |

## Filtragem e Paginação

A API Platform oferece suporte a:

* **Paginação**: `?page=2&itemsPerPage=30`
* **Filtragem**: `?title=Introduction` (depende dos filtros configurados)
* **Ordenação**: `?order[title]=asc`
* **Busca**: Busca em texto completo nos campos configurados

## Negociação de Conteúdo

A API oferece suporte a vários formatos:

* `application/ld+json` (padrão — JSON-LD)
* `application/json`
* `text/html` (documentação da API)

Defina o cabeçalho `Accept` para escolher o formato da resposta.

## Segurança

Cada endpoint aplica segurança por meio de:

* Autenticação JWT (obrigatória na maioria dos endpoints)
* Voters de segurança do Symfony (permissões no nível do recurso)
* Controle de acesso baseado em papéis (por exemplo, endpoints exclusivos para administradores)