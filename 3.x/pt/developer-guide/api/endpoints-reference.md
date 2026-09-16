# Referência de Endpoints

A API Platform gera automaticamente endpoints REST para entidades anotadas com `#[ApiResource]`. O Chamilo expõe mais de 100 recursos.

## Operações Padrão

Para cada recurso da API, as seguintes operações estão tipicamente disponíveis:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listar (coleção) |
| `POST` | `/api/{resources}` | Criar |
| `GET` | `/api/{resources}/{id}` | Ler (item único) |
| `PUT` | `/api/{resources}/{id}` | Atualização completa |
| `PATCH` | `/api/{resources}/{id}` | Atualização parcial |
| `DELETE` | `/api/{resources}/{id}` | Eliminar |

Nem todas as operações estão ativadas para todos os recursos — aplicam-se restrições de segurança.

## Recursos-Chave da API

### Recursos da Plataforma

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Contas de utilizador |
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
| Glossaries | `/api/glossaries` | Termos do glossário |
| Links | `/api/links` | Ligações externas |
| Calendar Events | `/api/c_calendar_events` | Eventos da agenda |
| Student Publications | `/api/c_student_publications` | Trabalhos |
| Blogs | `/api/c_blogs` | Blogs do curso |
| Groups | `/api/c_groups` | Grupos do curso |

### Recursos de Acompanhamento

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuração do livro de notas |
| Gradebook Results | `/api/gradebook_results` | Notas |

## Filtragem e Paginação

A API Platform suporta:

* **Paginação**: `?page=2&itemsPerPage=30`
* **Filtragem**: `?title=Introduction` (depende dos filtros configurados)
* **Ordenação**: `?order[title]=asc`
* **Pesquisa**: Pesquisa de texto integral nos campos configurados

## Negociação de Conteúdo

A API suporta vários formatos:

* `application/ld+json` (predefinição — JSON-LD)
* `application/json`
* `text/html` (documentação da API)

Defina o cabeçalho `Accept` para escolher o formato da resposta.

## Segurança

Cada endpoint aplica segurança através de:

* Autenticação JWT (obrigatória na maioria dos endpoints)
* Voters de segurança do Symfony (permissões ao nível do recurso)
* Controlo de acesso baseado em papéis (p. ex., endpoints exclusivos de administrador)