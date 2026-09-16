# Esquema da Base de Dados

O Chamilo 3.0 mapeia um conjunto alargado de entidades Doctrine para tabelas da base de dados. Os números exactos variam entre versões — consulte os directórios de entidades listados abaixo para o estado actual.

## Localização das entidades

| Bundle | Onde | Prefixo |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Nenhum (p. ex., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (p. ex., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabelas principais

### Utilizador e autenticação

| Tabela | Finalidade |
|-------|---------|
| `user` | Contas de utilizador |
| `access_url` | Portais multi-URL |
| `access_url_rel_user` | Atribuições utilizador-portal |
| `usergroup` | Grupos de utilizadores ao nível da plataforma |

### Cursos

| Tabela | Finalidade |
|-------|---------|
| `course` | Cursos |
| `course_category` | Categorias de cursos |
| `course_rel_user` | Inscrições em cursos |

### Sessões

| Tabela | Finalidade |
|-------|---------|
| `session` | Sessões de formação |
| `session_rel_user` | Inscrições em sessões |
| `session_rel_course` | Cursos nas sessões |
| `session_rel_course_rel_user` | Inscrição do utilizador por sessão-curso |

### Sistema de recursos

| Tabela | Finalidade |
|-------|---------|
| `resource_node` | Abstracção unificada de conteúdos |
| `resource_file` | Anexos de ficheiros |
| `resource_link` | Visibilidade/acesso por contexto |
| `resource_type` | Registo de tipos de recurso |

### Conteúdo do curso (prefixo c_)

| Tabela | Finalidade |
|-------|---------|
| `c_document` | Documentos |
| `c_quiz` | Exercícios/testes |
| `c_quiz_question` | Perguntas de questionário |
| `c_quiz_answer` | Respostas às perguntas |
| `c_lp` | Percursos de aprendizagem |
| `c_lp_item` | Itens de percursos de aprendizagem |
| `c_forum_category` | Categorias de fórum |
| `c_forum_forum` | Fóruns |
| `c_forum_thread` | Tópicos de fórum |
| `c_forum_post` | Mensagens de fórum |
| `c_student_publication` | Trabalhos/submissões |
| `c_survey` | Inquéritos |
| `c_glossary` | Termos de glossário |
| `c_calendar_event` | Eventos de calendário |
| `c_attendance` | Folhas de assiduidade |

### Acompanhamento

| Tabela | Finalidade |
|-------|---------|
| `track_e_login` | Acompanhamento de inícios de sessão |
| `track_e_online` | Acompanhamento de utilizadores em linha |
| `track_e_default` | Acompanhamento genérico de actividade |
| `gradebook_category` | Categorias do livro de notas |
| `gradebook_result` | Notas |

### Definições

| Tabela | Finalidade |
|-------|---------|
| `settings` | Definições da plataforma |
| `settings_options` | Definições das opções de configuração |

## Migrações

As alterações ao esquema da base de dados são geridas através de Doctrine Migrations em `src/CoreBundle/Migrations/`. Execute as migrações com:

```bash
php bin/console doctrine:migrations:migrate
```