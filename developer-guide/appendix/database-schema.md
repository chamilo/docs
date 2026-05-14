# Esquema do Banco de Dados

O Chamilo 2.0 mapeia um grande conjunto de entidades Doctrine para tabelas de banco de dados. As contagens exatas variam entre as versões — consulte os diretórios de entidades listados abaixo para o estado atual.

## Localizações das Entidades

| Bundle | Onde | Prefixo |
|--------|-------|---------|
| CoreBundle | `src/CoreBundle/Entity/` | Nenhum (por exemplo, `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (por exemplo, `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabelas Principais

### Usuário e Autenticação

| Tabela | Finalidade |
|-------|------------|
| `user` | Contas de usuário |
| `access_url` | Portais multi-URL |
| `access_url_rel_user` | Atribuições de usuário-portal |
| `usergroup` | Grupos de usuários em toda a plataforma |

### Cursos

| Tabela | Finalidade |
|-------|------------|
| `course` | Cursos |
| `course_category` | Categorias de cursos |
| `course_rel_user` | Inscrições em cursos |

### Sessões

| Tabela | Finalidade |
|-------|------------|
| `session` | Sessões de treinamento |
| `session_rel_user` | Inscrições em sessões |
| `session_rel_course` | Cursos em sessões |
| `session_rel_course_rel_user` | Inscrição de usuário por sessão-curso |

### Sistema de Recursos

| Tabela | Finalidade |
|-------|------------|
| `resource_node` | Abstração unificada de conteúdo |
| `resource_file` | Anexos de arquivos |
| `resource_link` | Visibilidade/acesso por contexto |
| `resource_type` | Registro de tipo de recurso |

### Conteúdo do Curso (prefixo c_)

| Tabela | Finalidade |
|-------|------------|
| `c_document` | Documentos |
| `c_quiz` | Exercícios/testes |
| `c_quiz_question` | Questões de questionários |
| `c_quiz_answer` | Respostas de questões |
| `c_lp` | Caminhos de aprendizagem |
| `c_lp_item` | Itens de caminhos de aprendizagem |
| `c_forum_category` | Categorias de fórum |
| `c_forum_forum` | Fóruns |
| `c_forum_thread` | Tópicos de fórum |
| `c_forum_post` | Postagens de fórum |
| `c_student_publication` | Tarefas/envios |
| `c_survey` | Pesquisas |
| `c_glossary` | Termos de glossário |
| `c_calendar_event` | Eventos de calendário |
| `c_attendance` | Folhas de presença |

### Rastreamento

| Tabela | Finalidade |
|-------|------------|
| `track_e_login` | Rastreamento de login |
| `track_e_online` | Rastreamento de usuários online |
| `track_e_default` | Rastreamento de atividade genérica |
| `gradebook_category` | Categorias de livro de notas |
| `gradebook_result` | Notas |

### Configurações

| Tabela | Finalidade |
|-------|------------|
| `settings` | Configurações da plataforma |
| `settings_options` | Definições de opções de configuração |

## Migrações

As alterações no esquema do banco de dados são gerenciadas por meio de Doctrine Migrations em `src/CoreBundle/Migrations/`. Execute as migrações com:

```bash
php bin/console doctrine:migrations:migrate
```